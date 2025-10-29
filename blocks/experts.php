<section class="block-section experts-section">
  <div class="container container--large">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="experts-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>
    <?php if ($list = $args['fields']['list']): ?>
    <div class="experts__items">
      <div class="experts-embla" data-experts-embla>
        <div class="experts-embla__wrap">
          <div class="experts-embla__viewport" data-experts-embla-viewport>
            <div class="experts-embla__container">
              <?php foreach ($list as $item): ?>
              <div class="experts-embla__slide">
                <div class="experts-item">
                  <div class="experts-item__image">
                    <?php echo wp_get_attachment_image($item['image'], 'full'); ?>
                  </div>
                  <div class="experts-item__name"><?php echo nl2br($item['name']); ?></div>
                  <div class="experts-item__job"><?php echo nl2br($item['job']); ?></div>
                  <div class="experts-item__experience"><?php echo nl2br($item['experience']); ?></div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <button class="experts-embla__nav experts-embla__nav--prev" type="button" data-experts-embla-prev></button>
          <button class="experts-embla__nav experts-embla__nav--next" type="button" data-experts-embla-next></button>
        </div>
        <div class="experts-carousel__dots" data-experts-carousel-dots></div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
