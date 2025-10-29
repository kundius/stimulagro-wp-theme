<div class="actions-item">
  <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail-l', ['class' => 'actions-item__image']); ?>
  <div class="actions-item__content">
    <div class="actions-item__title">
      <?php echo get_the_title(get_the_ID()); ?>
    </div>
    <div class="actions-item__desc">
      <?php echo get_the_excerpt(get_the_ID()); ?>
    </div>
    <div class="actions-item__more">
      <a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="more-button">
        <span class="more-button__text">Узнать больше</span>
        <span class="more-button__icon">
          <span class="icon icon-arrow-right"></span>
        </span>
      </a>
    </div>
  </div>
</div>
