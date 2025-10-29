<section class="block-section comparison-section">
  <div class="container container--large">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="comparison-section__title">
      <?php echo $title; ?>
    </h2>
    <?php endif; ?>
    <?php if ($list = $args['fields']['list']): ?>
    <div class="comparison-carousel" data-comparison-carousel>
      <div class="comparison-carousel__viewport" data-comparison-carousel-viewport>
        <div class="comparison-carousel__container">
          <?php foreach ($list as $item): ?>
          <div class="comparison-carousel__slide">
            <div class="comparison" style="--progress: 30%" data-comparison>
              <div class="comparison__before">
                <div class="comparison__before-label"><?php echo $item['before_label']; ?></div>
                <img src="<?php echo wp_get_attachment_url($item['before_image_big']); ?>" alt="" class="comparison__after-image max-md:hidden">
                <img src="<?php echo wp_get_attachment_url($item['before_image_small']); ?>" alt="" class="comparison__after-image md:hidden">
              </div>
              <div class="comparison__after">
                <div class="comparison__after-label"><?php echo $item['after_label']; ?></div>
                <img src="<?php echo wp_get_attachment_url($item['after_image_big']); ?>" alt="" class="comparison__after-image max-md:hidden">
                <img src="<?php echo wp_get_attachment_url($item['after_image_small']); ?>" alt="" class="comparison__after-image md:hidden">
              </div>
              <input class="comparison__range" type="range" name="progress" value="300" min="0" max="1000">
              <div class="comparison__handle"></div>
              <div class="comparison__line"></div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <button class="comparison-carousel__nav comparison-carousel__nav--prev" type="button" data-comparison-carousel-prev></button>
      <button class="comparison-carousel__nav comparison-carousel__nav--next" type="button" data-comparison-carousel-next></button>
    </div>
    <?php endif; ?>
  </div>
</section>
