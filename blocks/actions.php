<section class="block-section actions-section">
  <div class="container container--large">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="actions-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>

    <?php if ($entries = $args['fields']['entries']): ?>
    <div class="actions-carousel" data-actions-carousel>
      <div class="actions-carousel__wrap">
        <div class="actions-carousel__viewport" data-actions-carousel-viewport>
          <div class="actions-carousel__container">
            <?php foreach ($entries as $item): ?>
            <?php $post = get_post($item['id']); ?>
            <?php setup_postdata($post); ?>
            <div class="actions-carousel__slide">
              <?php get_template_part('partials/actions-item'); ?>
            </div>
            <?php endforeach; wp_reset_postdata(); ?>
          </div>
        </div>
        <button class="actions-carousel__nav actions-carousel__nav--prev" type="button" data-actions-carousel-prev></button>
        <button class="actions-carousel__nav actions-carousel__nav--next" type="button" data-actions-carousel-next></button>
      </div>
      <div class="actions-carousel__dots" data-actions-carousel-dots></div>
    </div>
    <?php endif; ?>
  </div>
</section>
