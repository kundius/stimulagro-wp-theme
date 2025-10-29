<section class="block-section estimate-section">
  <div class="container container--large">
    <div class="estimate-section__layout">
      <div class="estimate-section__content">
        <?php if ($title = $args['fields']['title']): ?>
        <h2 class="estimate-section__title"><?php echo nl2br($title); ?></h2>
        <?php endif; ?>
        <div class="estimate-section__expert">
          <div class="estimate-expert">
            <?php if ($manager_image = $args['fields']['manager_image']): ?>
            <div class="estimate-expert__image">
              <?php echo wp_get_attachment_image($manager_image, 'full'); ?>
            </div>
            <?php endif; ?>
            <div class="estimate-expert__body">
              <?php if ($manager_name = $args['fields']['manager_name']): ?>
              <div class="estimate-expert__name">
                <?php echo $manager_name; ?>
              </div>
              <?php endif; ?>
              <?php if ($manager_experience = $args['fields']['manager_experience']): ?>
              <div class="estimate-expert__experience">
                <?php echo $manager_experience; ?>
              </div>
              <?php endif; ?>
              <?php if ($manager_desc = $args['fields']['manager_desc']): ?>
              <div class="estimate-expert__desc"><?php echo nl2br($manager_desc); ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="estimate-section__example-wrap">
          <?php if ($example_image = $args['fields']['example_image']): ?>
          <a href="<?php echo wp_get_attachment_image_url($example_image, 'full'); ?>" class="estimate-section__example-link" data-fslightbox="estimate">
            <span><?php echo $args['fields']['example_action']; ?></span>
          </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="estimate-section__form">
        <form
          class="estimate-form"
          action="<?php echo admin_url('admin-ajax.php') ?>"
          data-feedack-form
          data-feedack-form-goal="<?php echo carbon_get_theme_option('form_goal'); ?>"
          data-feedack-form-action="feedback_form"
        >
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="<?php echo esc_html($args['fields']['title']); ?>">

          <div class="estimate-form__errors" data-feedack-form-errors></div>
          <div class="estimate-form__phone">
            <label class="text-field text-field--centered">
              <span class="text-field__label">Ваш номер телефона</span>
              <input class="text-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
            </label>
          </div>
          <div class="estimate-form__rules">
            Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
          </div>
          <?php if ($form_action = $args['fields']['form_action']): ?>
          <div class="estimate-form__submit">
            <button type="submit" class="primary-button primary-button--alt">
              <?php echo nl2br($form_action); ?>
            </button>
          </div>
          <div class="estimate-form-success">
            <div class="estimate-form-success__title">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_title')); ?>
            </div>
            <div class="estimate-form-success__desc">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_desc')); ?>
            </div>
            <button type="button" class="control-button w-32" data-feedack-form-reset>Закрыть</button>
          </div>
          <?php endif; ?>
        </form>
      </div>
    </div>
  </div>
</section>
