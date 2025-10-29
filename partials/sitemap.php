<?php
$links_query = new WP_Query([
  'post_type' => ['post', 'page'],
  'paged' => get_query_var('paged') ?: 1,
	'posts_per_page' => 40,
]);
$pagination = [
  'prev_text' => '',
  'next_text' => '',
  'total' => $links_query->max_num_pages,
  'current' => max(1, get_query_var('paged'))
];
?>
<?php if ($links_query->have_posts()): ?>
  <div class="my-10 grid grid-cols-2 gap-x-6 gap-y-3 max-lg:grid-cols-1">
    <?php while ($links_query->have_posts()): ?>
      <?php $links_query->the_post(); ?>
      <div>
        <a href="<?php the_permalink() ?>" class=""><?php the_permalink() ?></a>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
  <?php if ($links = paginate_links($pagination)): ?>
  <div class="my-10 flex flex-wrap justify-center text-base gap-4">
    <?php echo $links; ?>
  </div>
  <?php endif; ?>
<?php else: ?>
  <p>Извините, ничего не найдено.</p>
<?php endif ?>
