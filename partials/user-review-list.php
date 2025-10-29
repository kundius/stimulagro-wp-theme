<?php
$query_params = [
  'post_type' => 'user-review',
  'orderby' => [
    'is_sticky' => 'DESC',
    'date' => 'DESC',
  ],
  'posts_per_page' => -1
];
$query_posts = new WP_Query($query_params);
?>
<div class="pb-16">
  <?php $i = 0; while ($query_posts->have_posts()): $query_posts->the_post(); ?>
  <div class="<?php if ($i !== 0): ?>border-t pt-6 mt-6<?php endif; ?>">
    <?php get_template_part('partials/user-review-item'); ?>
  </div>
  <?php $i++; endwhile; wp_reset_postdata(); ?>
  <div class="flex justify-center mt-16">
    <button type="button" class="primary-button primary-button--small" data-modal-open="review-modal">
      Добавить отзыв
    </button>
  </div>
</div>
