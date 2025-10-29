<section class="block-section portfolio">
  <div class="container container--large">

    <div class="portfolio__headline">
      <?php if ($title = $args['fields']['title']): ?>
      <h2 class="portfolio__title">
        <?php echo $title; ?>
      </h2>
      <?php endif; ?>
      <?php if ($subtitle = $args['fields']['subtitle']): ?>
      <div class="portfolio__desc">
        <?php echo $subtitle; ?>
      </div>
      <?php endif; ?>
    </div>

    <?php if ($items = $args['fields']['items']): ?>
    <div class="portfolio__items">
      <div class="portfolio-embla" data-portfolio-embla>
        <div class="portfolio-embla__viewport" data-portfolio-embla-viewport>
          <div class="portfolio-embla__container">
            <?php foreach ($items as $item): ?>
            <?php $post = get_post($item['id']); ?>
            <?php setup_postdata($post); ?>
            <div class="portfolio-embla__slide">
              <?php get_template_part('partials/portfolio-item'); ?>
            </div>
            <?php endforeach; wp_reset_postdata(); ?>
          </div>
        </div>

        <button class="portfolio-embla__nav portfolio-embla__nav--prev" type="button" data-portfolio-embla-prev></button>
        <button class="portfolio-embla__nav portfolio-embla__nav--next" type="button" data-portfolio-embla-next></button>
      </div>
    </div>
    <?php endif; ?>

  </div>
</section>
