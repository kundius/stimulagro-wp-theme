<div class="footer-primary">
  <div class="container">
    <div class="footer-primary__navigation">
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
        'menu_class' => 'footer-primary__menu',
      ]); ?>
    </div>
    <div class="footer-primary__communication">
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

<div id="modal-callback" aria-hidden="true" class="modal">
  <div class="modal__overlay" tabindex="-1" data-modal-close>
    <div class="modal__container modal__container--default" role="dialog" aria-modal="true">

      <div class="modal__dialog">
        <button class="modal__close" aria-label="Закрыть" data-modal-close></button>

        <div class="modal__title">Заказать звонок</div>

        <form
          action="<?php echo admin_url('admin-ajax.php'); ?>"
          class="modal-form"
          data-feedback-form
          data-feedback-form-goal=""
          data-feedback-form-action="feedback_form">
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce(
            'feedback-nonce',
          ); ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="Заказать звонок">

          <div class="modal-form__field">
            <label class="input-field">
              <span class="input-field__label">Ваш номер телефона<span>*</span></span>
              <input class="input-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
            </label>
          </div>

          <div class="modal-form__errors" data-feedback-form-errors></div>

          <div class="modal-form__submit">
            <button type="submit" class="button-primary">
              Отправить сообщение
            </button>
          </div>

          <div class="modal-form__rules">
            <label class="rules-field">
              <input type="checkbox" id="rules" name="rules" required class="rules-field__input" checked>
              <span class="rules-field__checkmark"></span>
              <span class="rules-field__text">
                Прочитал(-а) <a href="" target="_blank">Пользовательское соглашение</a> и принимаю <a href="" target="_blank">Политику обработки персональных данных</a>
              </span>
            </label>
          </div>

          <div class="modal-form-success">
            <div class="modal-form-success__title">
              Сообщение успешно отправлено
            </div>
            <div class="modal-form-success__desc">
              Мы свяжемся с вами в ближайшее время
            </div>
            <button type="button" class="modal-form-success__close" data-feedback-form-reset>Закрыть</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<?php wp_footer(); ?>
