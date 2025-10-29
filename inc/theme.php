<?php

define( 'DISALLOW_FILE_EDIT', true );

add_filter('excerpt_length', function () {
    return 15;
});

add_image_size('thumbnail-s', 120, 120, true);
add_image_size('thumbnail-m', 600, 400, true);
add_image_size('thumbnail-l', 1024, 1024, true);
add_image_size('large-crop', 1024, 1024, true);

// Add the theme support basic elements
add_theme_support('align-wide');
add_theme_support('title-tag');
add_theme_support('responsive-embeds');
add_theme_support('editor-styles');
add_theme_support('wp-block-styles');
add_theme_support('post-thumbnails');
add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'script', 'style']);

add_shortcode('partial', function ($atts, $content = null) {
    ob_start();
    get_template_part('partials/' . $atts[0]);
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
});

function get_icon($name, $size = 24)
{
    $output = '<svg viewBox="0 0 24px 24px" width="' . $size . '" height="' . $size . '" class="sprite-icon">';
    $output .= '<use href="' . get_bloginfo('template_url') . '/dist/assets/sprite.svg?123#' . $name . '"></use>';
    $output .= '</svg>';
    return $output;
}

function icon($name, $size = '1em')
{
    echo get_icon($name, $size);
}

function is_new_year()
{
  if (date('m') === '12' && date('d') >= '12') {
    return true;
  }
  if (date('m') === '01' && date('d') <= '10') {
    return true;
  }
  return false;
}

function ssc($text) {
  $search = [
    '{crb_theme_phone}',
    '{crb_theme_telegram}',
    '{crb_theme_whatsapp}',
    '{crb_theme_working_hours_long}',
    '{crb_theme_working_hours_short}',
    '{crb_theme_working_hours_pause}',
    '{crb_theme_address}',
    '{crb_theme_site_name}',
    '{crb_theme_slogan}',
  ];
  $replace = [
    carbon_get_theme_option('crb_theme_phone') ?: '',
    carbon_get_theme_option('crb_theme_telegram') ?: '',
    carbon_get_theme_option('crb_theme_whatsapp') ?: '',
    carbon_get_theme_option('crb_theme_working_hours_long') ?: '',
    carbon_get_theme_option('crb_theme_working_hours_short') ?: '',
    carbon_get_theme_option('crb_theme_working_hours_pause') ?: '',
    carbon_get_theme_option('crb_theme_address') ?: '',
    carbon_get_theme_option('crb_theme_site_name') ?: '',
    carbon_get_theme_option('crb_theme_slogan') ?: '',
  ];
  return str_replace($search, $replace, $text);
}

function start_output_buffer() {
  if (is_admin()) {
    return;
  }
  ob_start();
}
add_action('template_redirect', 'start_output_buffer');

function apply_full_html_replacements() {
  $html = ob_get_clean();
  echo ssc($html);
}
add_action('wp_footer', 'apply_full_html_replacements');

// Array
// (
//     [name] => small_garant_2.jpg
//     [full_path] => small_garant_2.jpg
//     [type] => image/jpeg
//     [tmp_name] => /tmp/phpagipea
//     [error] => 0
//     [size] => 317550
// )
function create_attachment_from_upload($upload, $post_id = 0) {
    require_once(ABSPATH . 'wp-admin/includes/media.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');

    $attachment_id = media_handle_sideload($upload, $post_id);

    if (is_wp_error($attachment_id)) {
        @unlink($file_array['tmp_name']);
        return $attachment_id;
    }

    return $attachment_id;
}
