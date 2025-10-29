<?php

$nav_menu = [
    'menu-main-left' => 'Основное меню / Левое',
    'menu-main-right' => 'Основное меню / Правое',
    'menu-footer' => 'Меню в подвале'
];
register_nav_menus($nav_menu);

add_filter('walker_nav_menu_start_el', 'add_button_for_empty', 10, 4);
function add_button_for_empty($item_output, $item, $depth, $args)
{
  $pattern = '/<a\b(?![^>]*\bhref\b)([^>]*)>(.*?)<\/a>/is';

  $result = preg_replace_callback($pattern, function ($matches) {
    return '<button' . $matches[1] . '>' . $matches[2] . '</button>';
  }, $item_output);

  return $result;
}
