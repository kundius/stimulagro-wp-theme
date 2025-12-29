<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Block;

add_action('after_setup_theme', function () {
  \Carbon_Fields\Carbon_Fields::boot();
});

add_action('carbon_fields_register_fields', 'register_carbon_fields_blocks');
function register_carbon_fields_blocks()
{
  Container::make('post_meta', 'SEO')
    ->where('post_type', '=', 'page')
    ->or_where('post_type', '=', 'post')
    ->add_fields([
      Field::make('text', 'crb_seo_title', 'Заголовок'),
      Field::make('text', 'crb_seo_keywords', 'Ключевые слова'),
      Field::make('textarea', 'crb_seo_description', 'Описание'),
    ]);

  Container::make('theme_options', 'Параметры')
    ->add_tab('Общее', [
      Field::make('text', 'crb_theme_phone', 'Телефон'),
      Field::make('text', 'crb_theme_email', 'E-mail'),
      Field::make('textarea', 'crb_theme_address', 'Адерс')->set_rows(2),
    ])
    ->add_tab('Подвал', [
      Field::make('textarea', 'crb_footer_counters', 'Счетчики')->set_rows(2),
      Field::make('textarea', 'crb_footer_copyright', 'Копирайт')->set_rows(2),
      Field::make('complex', 'crb_footer_groups', 'Соцсети')->add_fields([
        Field::make('text', 'link', 'Ссылка'),
        Field::make('textarea', 'icon', 'Код иконки')->set_rows(2),
      ]),
    ])
    ->add_tab('Поставки', [
      Field::make('text', 'crb_delivery_anchor', 'Якорь'),
      Field::make('textarea', 'crb_delivery_title', 'Заголовок')->set_rows(2),
      Field::make('rich_text', 'crb_delivery_content', 'Содержание'),
      Field::make('complex', 'crb_delivery_address', 'Адреса')->add_fields([
        Field::make('rich_text', 'address', 'Адрес')->set_rows(2),
        Field::make('rich_text', 'contacts', 'Контакты')->set_rows(2),
      ]),
    ]);

  Container::make('post_meta', 'Продукт')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'templates/product.php')
    ->add_tab('Начальный экран', [
      Field::make('textarea', 'intro_certificate', 'Сертификат')->set_rows(2),
      Field::make('textarea', 'intro_slogan', 'Слоган')->set_rows(2),
      Field::make('textarea', 'intro_description_1', 'Описание 1')->set_rows(2),
      Field::make('textarea', 'intro_description_2', 'Описание 2')->set_rows(2),
      Field::make('textarea', 'intro_description_3', 'Описание 3')->set_rows(2),
      Field::make('textarea', 'intro_description_4', 'Описание 4')->set_rows(2),
      Field::make('textarea', 'intro_description_5', 'Описание 5')->set_rows(2),
    ])
    ->add_tab('О продукте', [
      Field::make('text', 'about_anchor', 'Якорь'),
      Field::make('textarea', 'about_title', 'Заголовок')->set_rows(2),
      Field::make('image', 'about_image', 'Изображение'),
      Field::make('rich_text', 'about_primary_content', 'Описание основное'),
      Field::make('rich_text', 'about_secondary_content', 'Описание дополнительное'),
    ])
    ->add_tab('Уникальность', [Field::make('rich_text', 'unique_content', 'Описание')])
    ->add_tab('Использование', [
      Field::make('text', 'usage_anchor', 'Якорь'),
      Field::make('textarea', 'usage_title', 'Заголовок')->set_rows(2),
      Field::make('rich_text', 'usage_content', 'Описание'),
      Field::make('textarea', 'usage_warning', 'Предупреждение')->set_rows(2),
      Field::make('complex', 'options', 'Опции')->add_fields([
        Field::make('image', 'photo', 'Фото')->set_help_text('Изображение размером 300х200'),
        Field::make('textarea', 'name', 'Название')->set_rows(2),
        Field::make('textarea', 'content', 'Значение')->set_rows(2),
      ]),
      Field::make('complex', 'specifications', 'Характеристики')->add_fields([
        Field::make('image', 'photo', 'Фото')->set_help_text('Изображение размером 128х64'),
        Field::make('textarea', 'name', 'Название')->set_rows(2),
        Field::make('textarea', 'content', 'Значение')->set_rows(2),
      ]),
    ])
    ->add_tab('Испытания', [
      Field::make('text', 'trials_anchor', 'Якорь'),
      Field::make('textarea', 'trials_title', 'Заголовок')->set_rows(2),
      Field::make('textarea', 'trials_title_alt', 'Дполнительный заголовок')->set_rows(2),
      Field::make('text', 'trials_more_link', 'Ссылка подробнее'),
      Field::make('image', 'trials_image', 'Фото'),
      Field::make('rich_text', 'trials_text_1', 'Описание 1'),
      Field::make('rich_text', 'trials_text_2', 'Описание 2'),
      Field::make('rich_text', 'trials_text_3', 'Описание 3'),
      Field::make('association', 'trials_categories', 'Рубрики')->set_types([
        [
          'type' => 'term',
          'taxonomy' => 'category',
        ],
      ]),
    ]);

  Container::make('post_meta', 'Главная')
    ->where('post_type', '=', 'page')
    ->where('post_template', '=', 'templates/home.php')
    ->add_tab('Начальный экран', [
      Field::make('complex', 'intro_slider', 'Слайдер')->add_fields([
        Field::make('textarea', 'certificate', 'Сертификат')->set_rows(2),
        Field::make('textarea', 'slogan', 'Слоган')->set_rows(2),
        Field::make('textarea', 'description_1', 'Описание 1')->set_rows(2),
        Field::make('textarea', 'description_2', 'Описание 2')->set_rows(2),
        Field::make('textarea', 'description_3', 'Описание 3')->set_rows(2),
        Field::make('textarea', 'description_4', 'Описание 4')->set_rows(2),
        Field::make('textarea', 'description_5', 'Описание 5')->set_rows(2),
      ]),
    ])
    ->add_tab('О компании', [
      Field::make('text', 'about_anchor', 'Якорь'),
      Field::make('textarea', 'about_title', 'Заголовок')->set_rows(2),
      Field::make('image', 'about_image', 'Изображение'),
      Field::make('rich_text', 'about_primary_content', 'Описание основное'),
      Field::make('rich_text', 'about_secondary_content', 'Описание дополнительное'),
    ])
    ->add_tab('Уникальность', [Field::make('rich_text', 'unique_content', 'Описание')])
    ->add_tab('Испытания', [
      Field::make('text', 'trials_anchor', 'Якорь'),
      Field::make('textarea', 'trials_title', 'Заголовок')->set_rows(2),
      Field::make('textarea', 'trials_title_alt', 'Дполнительный заголовок')->set_rows(2),
      Field::make('text', 'trials_more_link', 'Ссылка подробнее'),
      Field::make('image', 'trials_image', 'Фото'),
      Field::make('rich_text', 'trials_text_1', 'Описание 1'),
      Field::make('rich_text', 'trials_text_2', 'Описание 2'),
      Field::make('rich_text', 'trials_text_3', 'Описание 3'),
      Field::make('association', 'trials_categories', 'Рубрики')->set_types([
        [
          'type' => 'term',
          'taxonomy' => 'category',
        ],
      ]),
    ]);

  Block::make('warning', 'Внимание')
    ->add_fields([
      Field::make('separator', 'separator', 'Внимание'),
      Field::make('textarea', 'content', 'Содержимое')->set_rows(2),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('blocks/warning', null, [
        'fields' => $fields,
      ]);
    });

  Block::make('usage', 'Внесение')
    ->add_fields([
      Field::make('separator', 'separator', 'Внесение'),
      Field::make('complex', 'options', 'Опции')->add_fields([
        Field::make('image', 'photo', 'Фото')->set_help_text('Изображение размером 300х200'),
        Field::make('textarea', 'name', 'Название')->set_rows(2),
        Field::make('textarea', 'content', 'Значение')->set_rows(2),
      ]),
      Field::make('complex', 'specifications', 'Характеристики')->add_fields([
        Field::make('image', 'photo', 'Фото')->set_help_text('Изображение размером 128х64'),
        Field::make('textarea', 'name', 'Название')->set_rows(2),
        Field::make('textarea', 'content', 'Значение')->set_rows(2),
      ]),
    ])
    ->set_category('layout')
    ->set_mode('edit')
    ->set_icon('shortcode')
    ->set_render_callback(function ($fields, $attributes, $inner_blocks) {
      get_template_part('blocks/usage', null, [
        'fields' => $fields,
      ]);
    });
}
