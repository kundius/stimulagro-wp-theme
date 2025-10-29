<?php
$category = 0;
if (isset($args['fields']['category']) && isset($args['fields']['category'][0])) {
  if (is_string($args['fields']['category'][0])) {
    $category = $args['fields']['category'][0];
  } else {
    $category = $args['fields']['category'][0]['id'];
  }
}
$query_params = [
  'post_type' => 'post',
  'orderby' => [
    'is_sticky' => 'DESC',
    'date' => 'DESC',
  ],
  'paged' => get_query_var('paged') ?: 1,
  'cat' => $category
];
$articles = new WP_Query($query_params);
?>

<div
  class="pb-32 max-md:pb-20"
  data-category-list
  data-category-list-max-page="<?php echo $articles->max_num_pages; ?>"
  data-category-list-current-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>"
  data-category-list-id="<?php echo $category; ?>"
>
  <div class="grid grid-cols-3 gap-5 max-lg:gap-4 max-lg:grid-cols-2 max-md:grid-cols-1" data-category-list-wrap>
    <?php
    while ($articles->have_posts()) { 
      $articles->the_post();
      get_template_part('partials/actions-item');
    }
    wp_reset_postdata();
    ?>
  </div>

  <?php if ($articles->max_num_pages > 1) : ?>
  <button type="button" class="flex mx-auto mt-24 max-md:mt-16 primary-button font-bold text-lg w-56" data-category-list-load>Показать ещё</button>
  <?php endif; ?>
</div>
