<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

$theme_options_container = null;

add_action('after_setup_theme', function () {
  \Carbon_Fields\Carbon_Fields::boot();
});

add_action('admin_head', function () {
  echo '<style>
    .cf-radio__list {
      margin: 0;
      padding: 0;
    }

    [data-type^="carbon-fields/block"] {
      position: relative;
      z-index: 1;
    }

    [data-type^="carbon-fields/block"].is-hovered {
      z-index: 2;
    }

    [data-type^="carbon-fields/block"]::before {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      right: 0;
      bottom: 0;
      border: .125em solid #6b6d89;
      background: #f0f0f0;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields {
      position: relative;
      padding: 16px 24px;
      z-index: 2;
    }

    .cf-block__fields__title {
      margin: 0;
      font-size: 20px;
      font-weight: 500;
      color: #000;
      line-height: 32px;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2) {
      position: absolute;
      right: 24px;
      top: 16px;
      z-index: 20;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2) .cf-field__head label {
      display: block;
      margin: 0;
      background: var(--wp-components-color-accent, var(--wp-admin-theme-color, #3858e9));
      color: var(--wp-components-color-accent-inverted, #fff);
      outline: 1px solid #0000;
      text-decoration: none;
      text-shadow: none;
      white-space: nowrap;
      height: 32px;
      line-height: 32px;
      padding: 0 12px;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2) .cf-field__body {
      display: none;
      position: absolute;
      right: 8px;
      top: 100%;
      background: #fff;
      border-radius: 4px;
      box-shadow: 0 0 0 1px #ccc, 0 2px 3px #0000000d, 0 4px 5px #0000000a, 0 12px 12px #00000008, 0 16px 16px #00000005;
      box-sizing: border-box;
      width: min-content;
      white-space: nowrap;
      padding: 8px 12px;
      min-width: 160px;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2):hover .cf-field__body {
      display: block;
    }

    [data-type^="carbon-fields/block"] .cf-block__fields > .cf-field.cf-set:nth-child(2) .cf-field__body .cf-set__list {
      padding: 0;
    }
  </style>';
});

function create_block($key, $name, $fields) {
  global $theme_options_container;

  foreach ($fields as $field) {
    // добавить к простым названиям название блока, чтобы в опциях они были уникальны
    $field->set_base_name($key . '_' . $field->get_base_name());
    // добавить условную логику
    $field->set_conditional_logic([[
      'field' => $key . '_block_fields',
      'value' => $field->get_base_name(),
      'compare' => 'INCLUDES'
    ]]);
  }

  // список полей для переключателя
  $edit_fields = [];
  foreach ($fields as $field) {
    $edit_fields[$field->get_base_name()] = $field->get_label();
  }

  $block_fields = array_merge([
    Field::make('html', $key . '_block_name')->set_html('<div class="cf-block__fields__title">' . $name . '</div>'),
    Field::make('set', $key . '_block_fields', 'Редактировать')->set_options($edit_fields)
  ], $fields);
  $theme_options_fields = array_merge([
    // условная логика в опциях применяется тоже, поэтому необходимо список полей добавить и туда
    Field::make('set', $key . '_block_fields', 'Редактировать')
      ->set_options($edit_fields)
      ->set_default_value(array_keys($edit_fields))
      // ->set_conditional_logic([[ 'field' => $key . '_block_fields' ]])
  ], $fields);

  Container::make('theme_options', $name)
    ->set_page_parent($theme_options_container)
    ->add_fields($theme_options_fields);

  Block::make('block_' . $key, $name)
    ->add_fields($block_fields)
    ->set_category('layout')
    ->set_mode('edit')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) use ($key) {
      $block_name = $fields[$key . '_block_name'];
      $block_fields = $fields[$key . '_block_fields'];

      unset($fields[$key . '_block_name']);
      unset($fields[$key . '_block_fields']);

      $args_fields = [];

      foreach ($fields as $field_key => $field_value) {
        $short_key = str_replace($key . '_', '', $field_key);
        if (in_array($field_key, $block_fields)) {
          $args_fields[$short_key] = $field_value;
        } else {
          $args_fields[$short_key] = carbon_get_theme_option($field_key);
        }
      }

      get_template_part('blocks/' . $key, null, [
        'fields' => $args_fields
      ]);
    });
}

add_action('carbon_fields_register_fields', 'register_carbon_fields_blocks');
function register_carbon_fields_blocks()
{
  global $theme_options_container;

  Container::make('post_meta', 'Портфолио')
    ->where('post_type', '=', 'portfolio')
    ->add_fields([
      Field::make('text', 'time', 'Сроки ремонта'),
      Field::make('text', 'area', 'Площадь'),
      Field::make('text', 'price', 'Цена'),
      Field::make('media_gallery', 'gallery', 'Галерея'),
    ]);

  Container::make('post_meta', 'Медиа отзыв')
    ->where('post_type', '=', 'media-review')
    ->add_fields([
      Field::make('textarea', 'address', 'Адрес')->set_rows(2),
      Field::make('rich_text', 'content', 'Содержимое')->set_rows(8),
      Field::make('textarea', 'code', 'Код плеера')->set_rows(4),
      Field::make('image', 'image', 'Изображение'),
    ]);

  Container::make('post_meta', 'Отзыв посетителя')
    ->where('post_type', '=', 'user-review')
    ->add_fields([
      Field::make('text', 'author', 'Автор'),
      Field::make('date', 'date', 'Дата'),
      Field::make('textarea', 'content', 'Содержимое')->set_rows(4),
      Field::make('text', 'rating', 'Рейтинг')->set_help_text('От 1 до 5'),
      Field::make('image', 'avatar', 'Аватар'),
      Field::make('media_gallery', 'gallery', 'Галерея'),
      Field::make('separator', 'reply', 'Ответ'),
      Field::make('date', 'reply_date', 'Дата'),
      Field::make('textarea', 'reply_content', 'Содержимое')->set_rows(4),
      Field::make('media_gallery', 'reply_gallery', 'Галерея')
    ]);

  Container::make('post_meta', 'Цены')
    ->where('post_type', '=', 'prices')
    ->add_fields([
      Field::make('complex', 'options', 'Список работ')
        ->add_fields('title', [
          Field::make('text', 'name', 'Заголовок'),
        ])
        ->add_fields('option', [
          Field::make('text', 'name', 'Название')->set_width(60),
          Field::make('text', 'unit', 'Ед. изм')->set_width(20),
          Field::make('text', 'price', 'Цена')->set_width(20),
        ])
    ]);

  Block::make('contacts_info', 'Контактная информация')
    ->add_fields([
      Field::make('rich_text', 'phone', 'Телефон'),
      Field::make('rich_text', 'address', 'Адрес')
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/contacts-info', null, [
        'fields' => $fields
      ]);
    });

  Block::make('contacts_map', 'Карта')
    ->add_fields([
      Field::make('textarea', 'html', 'Код карты')->set_rows(4)
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/contacts-map', null, [
        'fields' => $fields
      ]);
    });

  Block::make('partnership-form', 'Форма "Партнерство"')
    ->add_fields([
      Field::make('separator', 'partnership-form', 'Форма "Партнерство"')
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/partnership-form', null, [
        'fields' => $fields
      ]);
    });

  Block::make('portfolio-list', 'Список "Портфолио"')
    ->add_fields([
      Field::make('separator', 'portfolio-list', 'Список "Портфолио"')
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/portfolio-list', null, [
        'fields' => $fields
      ]);
    });

  Block::make('actions-list', 'Список "Акции"')
    ->add_fields([
      Field::make('separator', 'actions-list', 'Список "Акции"'),
      Field::make('association', 'category', 'Рубрика')->set_types([
        [
          'type' => 'term',
          'taxonomy' => 'category',
        ]
      ])->set_max(1)
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/actions-list', null, [
        'fields' => $fields
      ]);
    });

  Block::make('sitemap', 'Список "Карта сайта"')
    ->add_fields([
      Field::make('separator', 'sitemap', 'Список "Карта сайта"'),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/sitemap', null, [
        'fields' => $fields
      ]);
    });

  Block::make('user-review-list', 'Список "Отзывы"')
    ->add_fields([
      Field::make('separator', 'user-review-list', 'Список "Отзывы"'),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('partials/user-review-list', null, [
        'fields' => $fields
      ]);
    });

  $theme_options_container = Container::make('theme_options', 'Параметры')
    ->add_tab('Общее', [
      Field::make('text', 'crb_theme_phone', 'Телефон')->set_help_text('Шорткод: {crb_theme_phone}'),
      Field::make('text', 'crb_theme_telegram', 'Telegram')->set_help_text('Шорткод: {crb_theme_telegram}'),
      Field::make('text', 'crb_theme_whatsapp', 'Whatsapp')->set_help_text('Шорткод: {crb_theme_whatsapp}'),
      Field::make('text', 'crb_theme_working_hours_long', 'Время работы подробно')->set_help_text('Шорткод: {crb_theme_working_hours_long}'),
      Field::make('text', 'crb_theme_working_hours_short', 'Время работы кратко')->set_help_text('Шорткод: {crb_theme_working_hours_short}'),
      Field::make('text', 'crb_theme_working_hours_pause', 'Время работы перерыв')->set_help_text('Шорткод: {crb_theme_working_hours_pause}'),
      Field::make('text', 'crb_theme_address', 'Адрес')->set_help_text('Шорткод: {crb_theme_address}'),
      Field::make('image', 'crb_theme_logo', 'Логотип')->set_help_text('Шорткод: {crb_theme_logo}'),
      Field::make('text', 'crb_theme_slogan', 'Слоган')->set_help_text('Шорткод: {crb_theme_slogan}'),
    ])
    ->add_tab('Закреп', [
      Field::make('textarea', 'crb_fixed_message', 'Сообщение')->set_rows(2),
      Field::make('textarea', 'crb_fixed_button', 'Текст кнопки в закрепе')->set_rows(2),
    ])
    ->add_tab('Формы', [
      Field::make('separator', 'crb_callback', 'Заказать звонок'),
      Field::make('text', 'crb_callback_title', 'Заголовок'),
      Field::make('text', 'crb_callback_action', 'Текст кнопки'),
      Field::make('text', 'crb_callback_goal', 'Цель в метрике'),
      Field::make('textarea', 'crb_callback_desc', 'Описание')->set_rows(2),
      Field::make('separator', 'crb_faq', 'Задать вопрос'),
      Field::make('text', 'crb_faq_title', 'Заголовок'),
      Field::make('text', 'crb_faq_action', 'Текст кнопки'),
      Field::make('text', 'crb_faq_goal', 'Цель в метрике'),
      Field::make('textarea', 'crb_faq_desc', 'Описание')->set_rows(2),
      Field::make('separator', 'crb_feedback_success', 'Успешная отправка'),
      Field::make('text', 'crb_feedback_success_title', 'Заголовок'),
      Field::make('textarea', 'crb_feedback_success_desc', 'Описание')->set_rows(2),
    ])
    ->add_tab('Подвал', [
      Field::make('textarea', 'crb_footer_info', 'Информация')->set_rows(2),
      Field::make('textarea', 'crb_footer_copyright', 'Копирайт')->set_rows(2),
    ])
    ->add_tab('Отзывы', [
      Field::make('text', 'crb_review_reply_author', 'Автор ответа'),
      Field::make('image', 'crb_review_reply_avatar', 'Аватар ответа'),
      Field::make('separator', 'crb_review_form', 'Форма'),
      Field::make('text', 'crb_review_form_title', 'Заголовок'),
      Field::make('textarea', 'crb_review_form_desc', 'Описание')->set_rows(2),
      Field::make('text', 'crb_review_form_goal', 'Цель в метрике'),
      Field::make('separator', 'crb_review_success', 'Успешная отправка'),
      Field::make('text', 'crb_review_success_title', 'Заголовок'),
      Field::make('textarea', 'crb_review_success_desc', 'Описание')->set_rows(2),
    ]);

  create_block('intro', 'Интро', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('textarea', 'desc', 'Описание')->set_rows(2),
    Field::make('textarea', 'list', 'Список (строки)')->set_rows(4),
    Field::make('text', 'action', 'Действие'),
    Field::make('image', 'background', 'Фон'),
    Field::make('textarea', 'modal_title', 'Диалог / Заголовок')->set_rows(2),
    Field::make('textarea', 'modal_desc', 'Диалог / Описание')->set_rows(2),
    Field::make('text', 'modal_action', 'Диалог / Действие'),
    Field::make('text', 'modal_goal', 'Диалог / Цель в метрике'),
    Field::make('textarea', 'form_title', 'Форма / Заголовок')->set_rows(2),
    Field::make('complex', 'form_repair_types', 'Форма / Типы ремонта')->add_fields([
      Field::make('text', 'name', 'Форма / Название')->set_width(50),
      Field::make('text', 'price', 'Форма / Цена за м2')->set_width(50),
    ]),
    Field::make('text', 'form_action', 'Форма / Действие'),
    Field::make('text', 'form_goal', 'Форма / Цель в метрике'),
  ]);

  create_block('about', 'О компании', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('textarea', 'subtitle', 'Подзаголовок')->set_rows(2),
    Field::make('rich_text', 'content', 'Текст'),
    Field::make('complex', 'cards', 'Карточки')->add_fields([
      Field::make('image', 'image', 'Изображение')->set_width(50),
      Field::make('text', 'name', 'Название')->set_width(50),
    ]),
  ]);

  create_block('quiz', 'Квиз', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('complex', 'steps', 'Шаги')
      ->set_layout('tabbed-horizontal')
      ->add_fields([
        Field::make('textarea', 'question', 'Вопрос')->set_rows(2),
        Field::make('image', 'image', 'Изображение'),
        Field::make('complex', 'options', 'Варианты')->add_fields([
          Field::make('text', 'name', 'Текст'),
        ]),
      ])
      ->set_header_template('<%= question %>'),
    Field::make('textarea', 'bonus_title', 'Бонусы / Заголовок')->set_rows(2),
    Field::make('complex', 'bonus_list', 'Бонусы / Список')->add_fields([
      Field::make('image', 'image', 'Изображение')->set_width(50),
      Field::make('text', 'name', 'Название')->set_width(50),
    ]),
    Field::make('textarea', 'finish_title', 'Завершение / Заголовок')->set_rows(2),
    Field::make('textarea', 'finish_subtitle', 'Завершение / Подзаголовок')->set_rows(2),
    Field::make('textarea', 'finish_action', 'Завершение / Действие')->set_rows(2),
    Field::make('text', 'finish_goal', 'Завершение / Цель в метрике'),
    Field::make('image', 'finish_image', 'Завершение / Изображение'),
    Field::make('complex', 'finish_options', 'Завершение / Варианты')->add_fields([
      Field::make('text', 'name', 'Текст'),
    ]),
  ]);

  create_block('portfolio', 'Портфолио', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('textarea', 'subtitle', 'Подзаголовок')->set_rows(2),
    Field::make('association', 'items', 'Список')->set_types([
      [
        'type' => 'post',
        'post_type' => 'portfolio',
      ]
    ]),
    Field::make('textarea', 'modal_title', 'Диалог / Заголовок')->set_rows(2),
    Field::make('textarea', 'modal_desc', 'Диалог / Описание')->set_rows(2),
    Field::make('text', 'modal_action', 'Диалог / Действие'),
    Field::make('text', 'modal_goal', 'Диалог / Цель в метрике'),
  ]);

  create_block('comparison', 'Сравнение', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('complex', 'list', 'Список')->add_fields([
      Field::make('image', 'before_image_big', 'Изображение до большое')->set_width(33),
      Field::make('image', 'before_image_small', 'Изображение до маленькое')->set_width(33),
      Field::make('text', 'before_label', 'Подпись до')->set_width(33),
      Field::make('image', 'after_image_big', 'Изображение после большое')->set_width(33),
      Field::make('image', 'after_image_small', 'Изображение после маленькое')->set_width(33),
      Field::make('text', 'after_label', 'Подпись после')->set_width(33),
    ]),
  ]);

  create_block('services', 'Услуги', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('textarea', 'desc', 'Описание')->set_rows(2),
    Field::make('complex', 'list', 'Список')
      ->set_layout('tabbed-horizontal')
      ->add_fields([
        Field::make('textarea', 'sheet', 'Лист')->set_rows(2),
        Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
        Field::make('textarea', 'desc', 'Описание')->set_rows(2),
        Field::make('rich_text', 'content', 'Текст'),
        Field::make('text', 'time', 'Время'),
        Field::make('text', 'price', 'Цена'),
      ])
      ->set_header_template('<%= title %>'),
    Field::make('textarea', 'modal_title', 'Диалог / Заголовок')->set_rows(2),
    Field::make('textarea', 'modal_desc', 'Диалог / Описание')->set_rows(2),
    Field::make('text', 'modal_action', 'Диалог / Действие'),
    Field::make('text', 'modal_goal', 'Диалог / Цель в метрике'),
  ]);

  create_block('terms', 'Сроки', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('complex', 'list', 'Список')
      ->set_layout('tabbed-horizontal')
      ->add_fields('head', 'Заголовки', [
        Field::make('textarea', 'name', 'Название')->set_rows(2),
        Field::make('complex', 'options', 'Опции')->add_fields([
          Field::make('text', 'text', 'Текст'),
        ])
      ])
      ->set_header_template('<%= name %>')
      ->add_fields('data', 'Значения', [
        Field::make('textarea', 'name', 'Название')->set_rows(2),
        Field::make('complex', 'options', 'Опции')->add_fields([
          Field::make('text', 'text', 'Текст'),
        ])
      ])
      ->set_header_template('<%= name %>')
  ]);

  create_block('calc', 'Калькулятор', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('textarea', 'message', 'Сообщение')->set_rows(2),
    Field::make('text', 'goal', 'Цель в метрике'),
    Field::make('complex', 'questions', 'Вопросы')
      ->set_layout('tabbed-horizontal')
      ->add_fields([
        Field::make('select', 'type', 'Тип')->add_options([
          'box' => 'Бокс',
          'button' => 'Кнопка',
        ]),
        Field::make('textarea', 'question', 'Вопрос')->set_rows(2),
        Field::make('complex', 'answers', 'Варианты ответов')->add_fields([
          Field::make('text', 'answer', 'Ответ')->set_width(100),
          Field::make('text', 'repair_price', 'Стоимость ремонта')
            ->set_help_text('Стоимость за кв. м., можно указать в процентах, например: 200%')
            ->set_width(50),
          Field::make('text', 'materials_price', 'Стоимость материалов')
            ->set_help_text('Стоимость за кв. м., можно указать в процентах, например: 200%')
            ->set_width(50)
        ])
      ])
      ->set_header_template('<%= question %>')
  ]);

  create_block('actions', 'Акции', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('association', 'entries', 'Список')->set_types([
      [
        'type' => 'post',
        'post_type' => 'post',
      ]
    ]),
  ]);

  create_block('media-reviews', 'Медиа отзывы', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('radio', 'what', 'Что показывать')->set_options([
      'all' => 'Все',
      'selected' => 'Только выбранные',
    ]),
    Field::make('association', 'entries', 'Список')->set_types([
      [
        'type' => 'post',
        'post_type' => 'media-review',
      ]
    ]),
  ]);

  create_block('reasons', 'Почему понравится', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('textarea', 'desc', 'Описание')->set_rows(4),
    Field::make('complex', 'list', 'Список')->add_fields([
      Field::make('image', 'image', 'Изображение')->set_width(50),
      Field::make('textarea', 'title', 'Заголовок')->set_rows(2)->set_width(50),
      Field::make('textarea', 'desc', 'Описание')->set_rows(4),
    ]),
  ]);

  create_block('measurement', 'Получить замер', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('text', 'action', 'Действие'),
    Field::make('textarea', 'modal_title', 'Диалог / Заголовок')->set_rows(2),
    Field::make('textarea', 'modal_desc', 'Диалог / Описание')->set_rows(2),
    Field::make('text', 'modal_action', 'Диалог / Действие'),
    Field::make('text', 'modal_goal', 'Диалог / Цель в метрике'),
  ]);

  create_block('problems', 'Проблемы', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('complex', 'list', 'Список')->add_fields([
      Field::make('image', 'image', 'Изображение')->set_width(50),
      Field::make('textarea', 'title', 'Заголовок')->set_rows(2)->set_width(50),
      Field::make('textarea', 'desc', 'Описание')->set_rows(4),
    ]),
  ]);

  create_block('experts', 'Эксперты', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('complex', 'list', 'Список')->add_fields([
      Field::make('image', 'image', 'Изображение')->set_width(50),
      Field::make('textarea', 'name', 'Имя')->set_rows(2)->set_width(50),
      Field::make('textarea', 'job', 'Специальность')->set_rows(2)->set_width(50),
      Field::make('textarea', 'experience', 'Стаж')->set_rows(2)->set_width(50),
    ]),
  ]);

  create_block('prices', 'Цены', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('radio', 'what', 'Что показывать')->set_options([
      'all' => 'Все',
      'selected' => 'Только выбранные',
    ]),
    Field::make('association', 'entries', 'Список')->set_types([
      [
        'type' => 'post',
        'post_type' => 'prices',
      ]
    ]),
  ]);

  create_block('estimate', 'Получите смету', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('image', 'example_image', 'Пример сметы / Фото'),
    Field::make('text', 'example_action', 'Пример сметы / Действие'),
    Field::make('image', 'manager_image', 'Менеджер / Фото'),
    Field::make('text', 'manager_name', 'Менеджер / Имя'),
    Field::make('text', 'manager_experience', 'Менеджер / Опыт'),
    Field::make('textarea', 'manager_desc', 'Менеджер / Описание')->set_rows(2),
    Field::make('text', 'form_action', 'Форма / Действие'),
    Field::make('text', 'form_goal', 'Форма / Цель в метрике'),
  ]);

  create_block('hiw', '3 шага', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),

    Field::make('textarea', 'step_1_text_1', 'Шаг 1 / Текст 1')->set_rows(2),
    Field::make('textarea', 'step_1_text_2', 'Шаг 1 / Текст 2')->set_rows(2),
    Field::make('textarea', 'step_1_text_3', 'Шаг 1 / Текст 3')->set_rows(2),
    Field::make('text', 'step_1_action', 'Шаг 1 / Действие'),
    Field::make('textarea', 'step_1_modal_title', 'Шаг 1 / Диалог / Заголовок')->set_rows(2),
    Field::make('textarea', 'step_1_modal_desc', 'Шаг 1 / Диалог / Описание')->set_rows(2),
    Field::make('text', 'step_1_modal_action', 'Шаг 1 / Диалог / Действие'),
    Field::make('text', 'step_1_modal_goal', 'Шаг 1 / Диалог / Цель в метрике'),
    Field::make('textarea', 'step_2_text_1', 'Шаг 2 / Текст 1')->set_rows(2),
    Field::make('textarea', 'step_2_text_2', 'Шаг 2 / Текст 2')->set_rows(2),
    Field::make('textarea', 'step_3_text_1', 'Шаг 3 / Текст 1')->set_rows(2),
    Field::make('textarea', 'step_3_text_2', 'Шаг 3 / Текст 2')->set_rows(2),
  ]);

  create_block('team', 'Команда', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('complex', 'list', 'Список')
      ->set_layout('tabbed-horizontal')
      ->add_fields([
        Field::make('text', 'name', 'Имя'),
        Field::make('image', 'image', 'Фото'),
        Field::make('text', 'job', 'Должность'),
        Field::make('text', 'experience', 'Опыт'),
      ])
      ->set_header_template('<%= name %>'),
  ]);

  create_block('gumat', 'Гумат', [
    Field::make('textarea', 'certificate', 'Сертификат')->set_rows(2),
    Field::make('textarea', 'slogan', 'Слоган')->set_rows(2),
    Field::make('textarea', 'description_1', 'Описание 1')->set_rows(2),
    Field::make('textarea', 'description_2', 'Описание 2')->set_rows(2),
    Field::make('textarea', 'description_3', 'Описание 3')->set_rows(2),
    Field::make('textarea', 'description_4', 'Описание 4')->set_rows(2),
    Field::make('textarea', 'description_5', 'Описание 5')->set_rows(2),
  ]);

  create_block('faq', 'Вопрос-ответ', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('text', 'action', 'Действие'),
    Field::make('complex', 'list', 'Список')->add_fields([
      Field::make('textarea', 'question', 'Вопрос')->set_rows(2),
      Field::make('textarea', 'answer', 'Ответ')->set_rows(2),
    ]),
  ]);

  // create_block('text_block', 'Текстовый блок', [
  //   Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
  //   Field::make('rich_text', 'content', 'Содержимое')->set_rows(2),
  // ]);

  create_block('consultation', 'Консультация', [
    Field::make('textarea', 'title', 'Заголовок')->set_rows(2),
    Field::make('textarea', 'subtitle', 'Подзаголовок')->set_rows(2),
    Field::make('text', 'phone_label', 'Надпись телефона'),
    Field::make('text', 'messenger_label', 'Надпись мессенджеры'),
    Field::make('textarea', 'form_title', 'Форма / Заголовок')->set_rows(2),
    Field::make('rich_text', 'form_desc', 'Форма / Описание'),
    Field::make('text', 'form_action', 'Форма / Действие'),
    Field::make('text', 'form_goal', 'Форма / Цель в метрике'),
  ]);

}
