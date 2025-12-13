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
  Container::make('theme_options', 'Параметры')
    ->add_tab('Общее', [Field::make('text', 'crb_theme_phone', 'Телефон')])
    ->add_tab('Подвал', [
      Field::make('textarea', 'crb_footer_info', 'Информация')->set_rows(2),
      Field::make('textarea', 'crb_footer_copyright', 'Копирайт')->set_rows(2),
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
      Field::make('textarea', 'about_title', 'Заголовок')->set_rows(2),
      Field::make('image', 'about_image', 'Изображение'),
      Field::make('rich_text', 'about_primary_content', 'Описание основное'),
      Field::make('rich_text', 'about_secondary_content', 'Описание дополнительное'),
    ])
    ->add_tab('Уникальный продукт', [Field::make('rich_text', 'unique_content', 'Описание')]);
}
