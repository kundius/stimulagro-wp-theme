<?php
add_action('init', 'register_post_types');

function register_post_types()
{
  register_post_type('portfolio', [
    'label' => null,
    'labels' => [
      'name' => 'Портфолио',
      'singular_name' => 'Портфолио',
      'add_new' => 'Добавить Портфолио',
      'add_new_item' => 'Добавить Портфолио',
      'edit_item' => 'Редактировать Портфолио',
      'new_item' => 'Новая Портфолио',
      'view_item' => 'Смотреть Портфолио',
      'search_items' => 'Искать Портфолио',
      'not_found' => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon' => '',
      'menu_name' => 'Портфолио',
    ],
    'description' => '',
    'public' => false,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title'],
    'taxonomies' => ['post_tag'],
    'query_var' => false,
    'show_ui' => true,
  ]);

  register_post_type('media-review', [
    'label' => null,
    'labels' => [
      'name' => 'Отзыв',
      'singular_name' => 'Отзыв',
      'add_new' => 'Добавить Отзыв',
      'add_new_item' => 'Добавить Отзыв',
      'edit_item' => 'Редактировать Отзыв',
      'new_item' => 'Новая Отзыв',
      'view_item' => 'Смотреть Отзыв',
      'search_items' => 'Искать Отзыв',
      'not_found' => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon' => '',
      'menu_name' => 'Медиа отзывы',
    ],
    'description' => '',
    'public' => false,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title', 'thumbnail'],
    'query_var' => false,
    'show_ui' => true,
  ]);

  register_post_type('user-review', [
    'label' => null,
    'labels' => [
      'name' => 'Отзыв',
      'singular_name' => 'Отзыв',
      'add_new' => 'Добавить Отзыв',
      'add_new_item' => 'Добавить Отзыв',
      'edit_item' => 'Редактировать Отзыв',
      'new_item' => 'Новая Отзыв',
      'view_item' => 'Смотреть Отзыв',
      'search_items' => 'Искать Отзыв',
      'not_found' => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon' => '',
      'menu_name' => 'Отзывы посетителей',
    ],
    'description' => '',
    'public' => false,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title'],
    'query_var' => false,
    'show_ui' => true,
  ]);

  register_post_type('prices', [
    'label' => null,
    'labels' => [
      'name' => 'Цены',
      'singular_name' => 'Цены',
      'add_new' => 'Добавить Цены',
      'add_new_item' => 'Добавить Цены',
      'edit_item' => 'Редактировать Цены',
      'new_item' => 'Новая Цены',
      'view_item' => 'Смотреть Цены',
      'search_items' => 'Искать Цены',
      'not_found' => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon' => '',
      'menu_name' => 'Цены',
    ],
    'description' => '',
    'public' => false,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title'],
    'query_var' => false,
    'show_ui' => true,
  ]);
}
