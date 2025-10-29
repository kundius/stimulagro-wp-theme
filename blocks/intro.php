<section class="block-section hero">
  <div class="container">
    <div class="hero__layout">
      <div class="hero__layout-content">
        <?php if ($title = $args['fields']['title']): ?>
        <h1 class="hero__title"><?php echo nl2br($title); ?></h1>
        <?php endif; ?>
        <?php if ($desc = $args['fields']['desc']): ?>
        <div class="hero__desc"><?php echo nl2br($desc); ?></div>
        <?php endif; ?>
        <?php if ($list = $args['fields']['list']): $list = explode(PHP_EOL, $list); ?>
        <ul class="hero__list">
          <?php foreach ($list as $item): ?>
          <li><?php echo $item; ?></li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php if ($action = $args['fields']['action']): ?>
        <div class="hero__button">
          <button
            class="primary-button primary-button--alt primary-button--large text-lg max-md:text-base"
            data-feedback-button
            data-feedback-button-title="<?php echo esc_html($args['fields']['modal_title']); ?>"
            data-feedback-button-desc="<?php echo esc_html($args['fields']['modal_desc']); ?>"
            data-feedback-button-action="<?php echo esc_html($args['fields']['modal_action']); ?>"
            data-feedback-button-goal="<?php echo $args['fields']['modal_goal']; ?>"
          >
            <?php echo $action; ?>
          </button>
        </div>
        <?php endif; ?>
      </div>
      <div class="hero__layout-form">
        <form
          class="hero-form"
          action="<?php echo admin_url('admin-ajax.php') ?>"
          data-hero-form
          data-feedack-form
          data-feedack-form-goal="<?php echo $args['fields']['form_goal']; ?>"
          data-feedack-form-action="hero_form"
        >
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="<?php echo esc_html($args['fields']['title']); ?>">

          <?php if ($form_title = $args['fields']['form_title']): ?>
          <div class="hero-form__title">
            <?php echo $form_title; ?>
          </div>
          <?php endif; ?>
          <?php if ($form_repair_types = $args['fields']['form_repair_types']): ?>
          <div class="hero-form__type">
            <div class="hero-form__type-label">Тип ремонта</div>
            <div class="hero-form__type-controls">
              <?php foreach ($form_repair_types as $key => $item): ?>
              <label class="radio-button">
                <input
                  type="radio"
                  name="type"
                  value="<?php echo $item['name']; ?>"
                  data-hero-form-type-price="<?php echo $item['price']; ?>"
                  <?php if ($key === 0): ?>checked<?php endif; ?>
                >
                <span><?php echo $item['name']; ?></span>
              </label>
              <?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>
          <div class="hero-form__area">
            <div class="hero-form__area-label">Площадь помещения (м<sup>2</sup>)</div>
            <div class="hero-form__area-controls">
              <div class="range-field" data-range-field>
                <input type="range" name="area" value="25" min="0" max="300" class="range-field__input" data-range-field-input>
                <div class="range-field__display" data-range-field-display="<?php echo esc_html('# м<sup>2</sup>'); ?>"></div>
                <button type="button" class="range-field__plus" data-range-field-plus>+</button>
                <button type="button" class="range-field__minus" data-range-field-minus>-</button>
              </div>
            </div>
          </div>
          <div class="hero-form__price">
            <div class="hero-form__price-label">Итого: </div>
            <div class="hero-form__price-value" data-hero-form-price-output></div>
          </div>
          <div class="hero-form__errors" data-feedack-form-errors></div>
          <div class="hero-form__phone">
            <label class="text-field">
              <span class="text-field__label">Ваш номер телефона</span>
              <input class="text-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
            </label>
          </div>
          <div class="hero-form__rules">
            Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
          </div>
          <?php if ($form_action = $args['fields']['form_action']): ?>
          <div class="hero-form__submit">
            <button type="submit" class="primary-button"><?php echo $form_action; ?></button>
          </div>
          <?php endif; ?>
          <div class="hero-form-success">
            <div class="hero-form-success__title">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_title')); ?>
            </div>
            <div class="hero-form-success__desc">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_desc')); ?>
            </div>
            <button type="button" class="control-button w-32" data-feedack-form-reset>Закрыть</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php if ($background = $args['fields']['background']): ?>
    <img src="<?php echo wp_get_attachment_image_url($background, 'full'); ?>" alt="" class="hero__bg">
  <?php else: ?>
    <img src="<?php bloginfo('template_url'); ?>/src/images/bg-intro.jpg" alt="" class="hero__bg">
  <?php endif; ?>
</section>
