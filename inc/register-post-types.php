<?php
add_action('init', 'register_post_types');

function register_post_types()
{
  register_post_type('certificate', [
    'label' => null,
    'labels' => [
      'name' => 'Сертификаты',
      'singular_name' => 'Сертификат',
      'add_new' => 'Добавить сертификат',
      'add_new_item' => 'Добавить сертификат',
      'edit_item' => 'Редактировать сертификат',
      'new_item' => 'Новый сертификат',
      'view_item' => 'Смотреть сертификат',
      'search_items' => 'Искать сертификаты',
      'not_found' => 'Не найдено',
      'not_found_in_trash' => 'Не найдено в корзине',
      'parent_item_colon' => '',
      'menu_name' => 'Сертификаты',
    ],
    'description' => '',
    'public' => true,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title', 'thumbnail'],
    'taxonomies' => [],
    'hierarchical' => false,
    'has_archive' => false,
    'rewrite' => true,
    'query_var' => true,
    'show_ui' => true,
  ]);
}
