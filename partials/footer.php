<div class="footer-primary">
  <div class="container">
    <div class="flex justify-between items-center">
      <div class="flex items-center gap-2">
        <a href="/" class="footer-primary__logo">
          <img src="<?php bloginfo('template_url'); ?>/assets/logo.png" alt="" />
        </a>
        <div class="footer-primary__copyright">
          <?php echo nl2br(carbon_get_theme_option('crb_footer_copyright')); ?>
        </div>
      </div>
      <?php wp_nav_menu([
        'theme_location' => 'footer-primary-menu',
        'container' => null,
        'menu_class' => 'footer-primary__nav',
      ]); ?>
    </div>
    <div class="flex justify-between items-start mt-10">
      <div class="footer-primary__contacts">
        <div class="footer-phone">
          <div class="footer-phone__icon">
            <span class="icon icon-phone"></span>
          </div>
          <div class="footer-phone__value">
            <?php echo carbon_get_theme_option('crb_theme_phone'); ?>
          </div>
        </div>
        <div class="footer-email">
          <div class="footer-email__icon">
            <span class="icon icon-envelope"></span>
          </div>
          <div class="footer-email__value">
            <?php echo carbon_get_theme_option('crb_theme_email'); ?>
          </div>
        </div>
        <div class="footer-address">
          <div class="footer-address__icon">
            <span class="icon icon-marker"></span>
          </div>
          <div class="footer-address__value">
            <?php echo nl2br(carbon_get_theme_option('crb_theme_address')); ?>
          </div>
        </div>
      </div>
      <?php if ($groups = carbon_get_theme_option('crb_footer_groups')): ?>
      <div class="footer-social">
        <div class="footer-social__title">
          Мы в соцсетях:
        </div>
        <div class="footer-social__list">
          <?php foreach ($groups as $group): ?>
          <a href="<?php echo $group['link']; ?>" class="footer-social__item">
            <?php echo $group['icon']; ?>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<div class="footer-secondary">
  <div class="container">
    <div class="footer-secondary__container">
      <div class="footer-secondary__counters">
        <?php echo carbon_get_theme_option('crb_footer_counters'); ?>
      </div>
      <?php wp_nav_menu([
        'theme_location' => 'footer-secondary-menu',
        'container' => null,
        'menu_class' => 'footer-secondary__nav',
      ]); ?>
      <a href="https://domenart-studio.ru/" class="footer-secondary__creator" target="_blank">
        <img src="<?php bloginfo(
          'template_url',
        ); ?>/assets/creator.png" alt="creator" width="138" height="30" />
      </a>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
