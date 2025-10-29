<section class="block-section consultation-section">
  <div class="container">
    <div class="consultation-section__layout">
      <div class="consultation-section__layout-content">
        <div class="consultation-headline">
          <?php if ($title = $args['fields']['title']): ?>
          <h2 class="consultation-headline__title"><?php echo nl2br($title); ?></h2>
          <?php endif; ?>
          <?php if ($subtitle = $args['fields']['subtitle']): ?>
          <div class="consultation-headline__desc"><?php echo nl2br($subtitle); ?></div>
          <?php endif; ?>
        </div>
        <?php if ($phone = carbon_get_theme_option('crb_theme_phone')): ?>
        <div class="consultation-contact">
          <?php if ($phone_label = $args['fields']['phone_label']): ?>
          <div class="consultation-contact__label"><?php echo nl2br($phone_label); ?></div>
          <?php endif; ?>
          <div class="consultation-contact__content">
            <a href="<?php echo $phone; ?>" class="consultation-phone">
              <span class="consultation-phone__icon">
                <span class="icon icon-phone"></span>
              </span>
              <span class="consultation-phone__value"><?php echo $phone; ?></span>
            </a>
          </div>
        </div>
        <?php endif; ?>
        <div class="consultation-contact">
          <?php if ($messenger_label = $args['fields']['messenger_label']): ?>
          <div class="consultation-contact__label"><?php echo nl2br($messenger_label); ?></div>
          <?php endif; ?>
          <div class="consultation-contact__content">
            <div class="consultation-social">
              <?php if ($telegram = carbon_get_theme_option('crb_theme_telegram')): ?>
              <a href="tg://resolve?domain=<?php echo $telegram; ?>" class="consultation-social__telegram">
                <span class="icon icon-telegram"></span>
              </a>
              <?php endif; ?>
              <?php if ($whatsapp = carbon_get_theme_option('crb_theme_whatsapp')): ?>
              <a href="whatsapp://send?text=Hello&phone=<?php echo $whatsapp; ?>" class="consultation-social__whatsapp">
                <span class="icon icon-whatsapp"></span>
              </a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="consultation-section__layout-form">
        <form
          class="consultation-form"
          action="<?php echo admin_url('admin-ajax.php') ?>"
          data-feedack-form
          data-feedack-form-goal="<?php echo carbon_get_theme_option('form_goal'); ?>"
          data-feedack-form-action="feedback_form"
        >
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="<?php echo esc_html($args['fields']['form_title']); ?>">

          <?php if ($form_title = $args['fields']['form_title']): ?>
          <div class="consultation-form__title"><?php echo nl2br($form_title); ?></div>
          <?php endif; ?>
          <?php if ($form_desc = $args['fields']['form_desc']): ?>
          <div class="consultation-form__list">
            <?php echo wpautop($form_desc); ?>
          </div>
          <?php endif; ?>
          <div class="consultation-form__errors" data-feedack-form-errors></div>
          <div class="consultation-form__phone">
            <label class="text-field">
              <span class="text-field__label">Ваш номер телефона</span>
              <input class="text-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
            </label>
          </div>
          <div class="consultation-form__rules">
            Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
          </div>
          <?php if ($form_action = $args['fields']['form_action']): ?>
          <div class="consultation-form__submit">
            <button type="submit" class="primary-button font-bold w-80">
              <?php echo nl2br($form_action); ?>
            </button>
          </div>
          <?php endif; ?>
          <div class="consultation-form-success">
            <div class="consultation-form-success__title">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_title')); ?>
            </div>
            <div class="consultation-form-success__desc">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_desc')); ?>
            </div>
            <button type="button" class="control-button w-32" data-feedack-form-reset>Закрыть</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
