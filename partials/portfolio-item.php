<div class="portfolio-item">
  <?php if ($gallery = carbon_get_post_meta(get_the_ID(), 'gallery')): ?>
  <?php
    $first = $gallery[0];
    $rest = array_slice($gallery, 1);
  ?>
  <div class="portfolio-item__gallery">
    <div class="portfolio-gallery" data-portfolio-gallery>
      <div class="portfolio-gallery__main">
        <a href="<?php echo wp_get_attachment_url($first); ?>" data-fslightbox="gallery-<?php echo get_the_ID(); ?>">
          <img src="<?php echo wp_get_attachment_image_url($first, 'thumbnail-m'); ?>" alt="">
        </a>
      </div>
      <div class="portfolio-gallery__carousel">
        <div class="portfolio-gallery__carousel-viewport" data-portfolio-gallery-viewport>
          <div class="portfolio-gallery__carousel-container">
            <?php foreach ($rest as $rest_item): ?>
            <div class="portfolio-gallery__carousel-slide">
              <a href="<?php echo wp_get_attachment_url($rest_item); ?>" data-fslightbox="gallery-<?php echo get_the_ID(); ?>">
                <img src="<?php echo wp_get_attachment_image_url($rest_item, 'thumbnail-s'); ?>" alt="">
              </a>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <button class="portfolio-gallery__nav portfolio-gallery__nav--prev" type="button" data-portfolio-gallery-prev></button>
        <button class="portfolio-gallery__nav portfolio-gallery__nav--next" type="button" data-portfolio-gallery-next></button>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class="portfolio-item__title">
    <?php echo get_the_title(get_the_ID()); ?>
  </div>
  <div class="flex items-start justify-between mt-3 max-lg:flex-col md:gap-2 md:mt-4">
    <div class="flex flex-wrap gap-1 items-start max-md:-mx-1.5">
      <div class="portfolio-item__detail">
        Сроки ремонта: <?php echo carbon_get_post_meta(get_the_ID(), 'time'); ?>
      </div>
      <div class="portfolio-item__detail">
        Площадь: <?php echo carbon_get_post_meta(get_the_ID(), 'area'); ?>
      </div>
    </div>
    <div class="portfolio-item__price">
      <div class="portfolio-item__price-label">Цена: </div>
      <div class="portfolio-item__price-value"><?php echo carbon_get_post_meta(get_the_ID(), 'price'); ?></div>
    </div>
  </div>
  <div class="mt-3 max-md:mt-2">
    <button
      type="button"
      class="control-button"
      data-feedback-button
      data-feedback-button-subject="<?php echo esc_html(carbon_get_theme_option('portfolio_modal_title') . ' / ' . get_the_title(get_the_ID())); ?>"
      data-feedback-button-title="<?php echo esc_html(carbon_get_theme_option('portfolio_modal_title')); ?>"
      data-feedback-button-desc="<?php echo esc_html(carbon_get_theme_option('portfolio_modal_desc')); ?>"
      data-feedback-button-action="<?php echo esc_html(carbon_get_theme_option('portfolio_modal_action')); ?>"
      data-feedback-button-goal="<?php echo carbon_get_theme_option('portfolio_modal_goal'); ?>"
    >
      <?php echo carbon_get_theme_option('portfolio_modal_action'); ?>
    </button>
  </div>
</div>
