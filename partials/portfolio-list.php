<?php
$current_tag = get_query_var('tag');
$terms = get_terms([
  'taxonomy' => 'post_tag',
  'hide_empty' => true
]);
$posts_query = new WP_Query([
  'post_type' => 'portfolio',
  'tag' => $current_tag ?: null
]);
?>

<?php if ($terms && !is_wp_error($terms)): ?>
<ul class="portfolio-tags">
  <li<?php if (!$current_tag): ?> class="active"<?php endif; ?>>
    <a href="<?php the_permalink() ?>">Все</a>
  </li>
  <?php foreach ($terms as $term): ?>
  <li<?php if ($current_tag === $term->slug): ?> class="active"<?php endif; ?>>
    <a href="<?php the_permalink() ?>?tag=<?php echo $term->slug ?>"><?php echo $term->name ?></a>
  </li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>

<div
  class="pb-32 max-md:pb-20"
  data-portfolio-list
  data-portfolio-list-max-page="<?php echo $posts_query->max_num_pages; ?>"
  data-portfolio-list-current-page="<?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>"
  data-portfolio-list-current-tag="<?php echo $current_tag; ?>"
>
  <div class="portfolio-grid" data-portfolio-list-wrap>
    <?php
    while ($posts_query->have_posts()) { 
      $posts_query->the_post();
      get_template_part('partials/portfolio-item');
    }
    wp_reset_postdata();
    ?>
  </div>

  <?php if ($posts_query->max_num_pages > 1) : ?>
  <button type="button" class="flex mx-auto mt-24 max-md:mt-16 primary-button font-bold text-lg w-56" data-portfolio-list-load>Показать ещё</button>
  <?php endif; ?>
</div>
