<section class="block-section media-reviews-section">
  <div class="container">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="media-reviews-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>

    <?php if ($args['fields']['what'] === 'all'): ?>

    <?php
    $posts_query = new WP_Query([
      'post_type' => 'media-review',
      'posts_per_page' => -1
    ]);
    ?>
    <?php if ($posts_query->have_posts()): ?>
    <div class="media-reviews-section__grid">
      <?php while ($posts_query->have_posts()): $posts_query->the_post(); ?>
      <?php get_template_part('partials/media-reviews-item'); ?>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>

    <?php else: ?>

    <?php if ($entries = $args['fields']['entries']): ?>
    <div class="media-reviews-section__grid">
      <?php foreach ($entries as $item): ?>
      <?php $post = get_post($item['id']); ?>
      <?php setup_postdata($post); ?>
      <?php get_template_part('partials/media-reviews-item'); ?>
      <?php endforeach; wp_reset_postdata(); ?>
    </div>
    <?php endif; ?>
    
    <?php endif; ?>

    <?php if ($args['fields']['what'] !== 'all'): ?>
    <div class="media-reviews-section__more">
      <a href="/reviews" class="control-button">
        <span>Показать ещё</span>
        <span class="icon icon-chevron-right"></span>
      </a>
    </div>
    <?php endif; ?>
  </div>
</section>
