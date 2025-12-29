<?php

define('DISALLOW_FILE_EDIT', true);

add_filter('excerpt_length', function () {
  return 15;
});

// add_image_size('thumbnail-s', 120, 120, true);
// add_image_size('thumbnail-m', 600, 400, true);
// add_image_size('thumbnail-l', 1024, 1024, true);
// add_image_size('large-crop', 1024, 1024, true);

// Add the theme support basic elements
add_theme_support('align-wide');
add_theme_support('title-tag');
add_theme_support('responsive-embeds');
add_theme_support('editor-styles');
add_theme_support('wp-block-styles');
add_theme_support('post-thumbnails');
add_theme_support('html5', [
  'comment-list',
  'comment-form',
  'search-form',
  'gallery',
  'caption',
  'script',
  'style',
]);

add_shortcode('partial', function ($atts, $content = null) {
  ob_start();
  get_template_part('partials/' . $atts[0]);
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
});

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

// Array
// (
//     [name] => small_garant_2.jpg
//     [full_path] => small_garant_2.jpg
//     [type] => image/jpeg
//     [tmp_name] => /tmp/phpagipea
//     [error] => 0
//     [size] => 317550
// )
function create_attachment_from_upload($upload, $post_id = 0)
{
  require_once ABSPATH . 'wp-admin/includes/media.php';
  require_once ABSPATH . 'wp-admin/includes/file.php';
  require_once ABSPATH . 'wp-admin/includes/image.php';

  $attachment_id = media_handle_sideload($upload, $post_id);

  if (is_wp_error($attachment_id)) {
    @unlink($file_array['tmp_name']);
    return $attachment_id;
  }

  return $attachment_id;
}

function get_pagination($query)
{
  $links = paginate_links([
    'prev_text' => '<span class="icon icon-arrow-left"></span>',
    'next_text' => '<span class="icon icon-arrow-right"></span>',
    'total' => $query->max_num_pages,
    'current' => max(1, get_query_var('paged')),
  ]);

  if ($links) {
    return '<div class="pagination">' . $links . '</div>';
  }
}
