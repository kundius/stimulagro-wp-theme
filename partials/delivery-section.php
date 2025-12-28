<section class="delivery" data-page-anchor-boundary>
  <div class="container">
    <div class="page-anchor" data-page-anchor="<?php echo carbon_get_theme_option(
      'crb_delivery_anchor',
    ); ?>"></div>
    <?php if ($title = carbon_get_theme_option('crb_delivery_title')): ?>
    <div class="delivery__title">
      <?php echo nl2br($title); ?>
    </div>
    <?php endif; ?>
    <?php get_template_part('partials/delivery-content'); ?>
  </div>
</section>
