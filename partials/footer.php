<div class="footer">
  <div class="container">
    <div class="footer-layout">
      <div class="footer-layout__contacts">
        <div class="footer-contacts">
          <div class="footer-contacts__title">
            Контактная информация
          </div>
          <div class="footer-contacts__text">
            Наш телефон: {crb_theme_phone}<br />
            <br />
            {crb_theme_working_hours_short},<br />
            {crb_theme_working_hours_pause}
          </div>
          <div class="footer-contacts__call">
            <button type="button" class="control-button" data-modal-open="modal-call">
              <span>Заказать звонок</span>
              <span class="icon icon-phone"></span>
            </button>
          </div>
          <?php if ($address = carbon_get_theme_option('crb_theme_address')): ?>
          <div class="footer-contacts__address">
            <strong>Адрес офиса:</strong><br />
            <?php echo $address; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      
      <?php
      wp_nav_menu([
        'menu' => 'Меню в подвале',
        'container' => null,
        'menu_class' => 'footer-menu',
      ]);
      ?>
    </div>
  </div>
</div>

<div class="footer-bottom">
  <div class="container footer-bottom__container">
    <div class="footer-bottom__copyright">
      <?php echo nl2br(carbon_get_theme_option('crb_footer_copyright')); ?>
    </div>
    <div class="footer-bottom__links">
      <a href="#">Политика конфиденциальности</a>
    </div>
    <div class="footer-bottom__info">
      <?php echo nl2br(carbon_get_theme_option('crb_footer_info')); ?>
    </div>
  </div>
</div>

<div class="drawer" data-drawer="nav">
  <div class="drawer__body">
    <button class="drawer__close" data-drawer-close>
      закрыть меню
      <span class="icon icon-close"></span>
    </button>
    <div class="drawer__content">
      <div class="drawer__nav" data-drawer-nav></div>

      <?php if (is_multisite()): ?>
      <div class="drawer__region">
        <div class="drawer-region">
          <div class="drawer-region__label">Ваш регион:</div>
          <div class="drawer-region__select">
            <div class="drawer-region-select" data-city-select role="combobox" aria-expanded="false" aria-haspopup="true" aria-label="Выбор города">
              <button class="drawer-region-select__trigger" data-city-select-trigger>
                <span><?php echo get_blog_details(get_current_blog_id())->blogname; ?></span>
              </button>
              <div class="drawer-region-select__list" role="listbox" data-city-select-listbox>
                <?php $sites = get_sites([ 'site__not_in' => get_current_blog_id() ]); ?>
                <?php foreach ($sites as $site): ?>
                <a href="<?php echo get_site_url($site->blog_id); ?>" role="option" tabindex="-1">
                  <?php echo get_blog_details($site->blog_id)->blogname; ?>
                </a>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>

      <div class="drawer__contacts">
        <div class="drawer-social">
          <?php if ($telegram = carbon_get_theme_option('crb_theme_telegram')): ?>
          <a href="tg://resolve?domain=<?php echo $telegram; ?>" class="drawer-social__telegram">
            <span class="icon icon-telegram"></span>
          </a>
          <?php endif; ?>
          <?php if ($whatsapp = carbon_get_theme_option('crb_theme_whatsapp')): ?>
          <a href="whatsapp://send?text=Hello&phone=<?php echo $whatsapp; ?>" class="drawer-social__whatsapp">
            <span class="icon icon-whatsapp"></span>
          </a>
          <?php endif; ?>
        </div>
        
        <a href="tel:<?php echo carbon_get_theme_option('crb_theme_phone'); ?>" class="drawer-phone">
          <span class="drawer-phone__number"><?php echo carbon_get_theme_option('crb_theme_phone'); ?></span>
          <span class="drawer-phone__time"><?php echo carbon_get_theme_option('crb_theme_working_hours_short'); ?></span>
        </a>
      </div>
    </div>
  </div>
  <div class="drawer__overlay" data-drawer-close></div>
</div>

<?php get_template_part('partials/modals'); ?>

<?php wp_footer(); ?>
