<section class="delivery" data-page-anchor-boundary>
  <div class="container">
    <?php if ($anchor = $args['anchor']): ?>
    <div class="page-anchor" data-page-anchor="<?php echo $anchor; ?>"></div>
    <?php endif; ?>
    <?php if ($title = carbon_get_theme_option('crb_delivery_title')): ?>
    <div class="delivery__title">
      <?php echo nl2br($title); ?>
    </div>
    <?php endif; ?>
    <div class="delivery__map">
      <span class="delivery__marker delivery__marker--1"></span>
      <span class="delivery__marker delivery__marker--2"></span>
    </div>
    <div class="delivery__layout">
      <div class="delivery__layout-left">
        <?php if ($content = carbon_get_theme_option('crb_delivery_content')): ?>
        <div class="delivery__content">
          <?php echo wpautop($content); ?>
        </div>
        <?php endif; ?>
      </div>
      <div class="delivery__layout-right">
        <button type="button" class="button-primary" data-callback-button>
          Связаться с менеджером<span class="button-primary__arrow"></span>
        </button>
      </div>
    </div>
  </div>
</section>
