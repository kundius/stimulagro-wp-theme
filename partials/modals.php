<div id="modal-call" aria-hidden="true" class="modal">
  <div class="modal__overlay" tabindex="-1" data-modal-close>
    <div class="modal__container modal__container--default" role="dialog" aria-modal="true">
        
      <div class="modal__content">
        <button class="modal__close" aria-label="Закрыть" data-modal-close></button>

        <div class="modal__title"><?php echo carbon_get_theme_option('crb_callback_title'); ?></div>

        <div class="modal__desc"><?php echo carbon_get_theme_option('crb_callback_desc'); ?></div>

        <form
          action="<?php echo admin_url('admin-ajax.php') ?>"
          class="modal-form"
          data-feedack-form
          data-feedack-form-goal="<?php echo carbon_get_theme_option('crb_callback_goal'); ?>"
          data-feedack-form-action="feedback_form"
        >
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="<?php echo esc_html(carbon_get_theme_option('crb_callback_title')); ?>">

          <div class="modal-form__errors" data-feedack-form-errors></div>

          <div class="modal-form__field">
            <label class="text-field">
              <span class="text-field__label">Ваш номер телефона<span>*</span></span>
              <input class="text-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
            </label>
          </div>

          <div class="modal-form__field modal-form__field--rules">
            Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
          </div>

          <div class="modal-form__field modal-form__field--submit">
            <button type="submit" class="primary-button primary-button--alt w-full">
              <?php echo carbon_get_theme_option('crb_callback_action'); ?>
            </button>
          </div>

          <div class="modal-form-success">
            <div class="modal-form-success__title">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_title')); ?>
            </div>
            <div class="modal-form-success__desc">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_desc')); ?>
            </div>
            <button type="button" class="control-button w-32" data-feedack-form-reset>Закрыть</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<div id="feedack-modal" aria-hidden="true" class="modal">
  <div class="modal__overlay" tabindex="-1" data-modal-close>
    <div class="modal__container modal__container--default" role="dialog" aria-modal="true">
        
      <div class="modal__content">
        <button class="modal__close" aria-label="Закрыть" data-modal-close></button>

        <div class="modal__title" data-feedack-modal-title>Обратная связь</div>

        <div class="modal__desc" data-feedack-modal-desc></div>

        <form
          action="<?php echo admin_url('admin-ajax.php') ?>"
          class="modal-form"
          data-feedack-form
          data-feedack-form-goal="FEEDBACK_MODAL"
          data-feedack-form-action="feedback_form"
        >
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="Форма обратной связи" data-feedack-modal-subject>

          <div class="modal-form__errors" data-feedack-form-errors></div>

          <div class="modal-form__field">
            <label class="text-field">
              <span class="text-field__label">Ваш номер телефона<span>*</span></span>
              <input class="text-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
            </label>
          </div>

          <div class="modal-form__field modal-form__field--rules">
            Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
          </div>

          <div class="modal-form__field modal-form__field--submit">
            <button type="submit" class="primary-button primary-button--alt w-full" data-feedack-modal-action>Отправить</button>
          </div>

          <div class="modal-form-success">
            <div class="modal-form-success__title">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_title')); ?>
            </div>
            <div class="modal-form-success__desc">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_desc')); ?>
            </div>
            <button type="button" class="control-button w-32" data-feedack-form-reset>Закрыть</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<div id="faq-modal" aria-hidden="true" class="modal">
  <div class="modal__overlay" tabindex="-1" data-modal-close>
    <div class="modal__container modal__container--default" role="dialog" aria-modal="true">
        
      <div class="modal__content">
        <button class="modal__close" aria-label="Закрыть" data-modal-close></button>

        <div class="modal__title"><?php echo carbon_get_theme_option('crb_faq_title'); ?></div>

        <div class="modal__desc"><?php echo carbon_get_theme_option('crb_faq_desc'); ?></div>

        <form
          class="modal-form"
          action="<?php echo admin_url('admin-ajax.php') ?>"
          data-feedack-form
          data-feedack-form-goal="<?php echo carbon_get_theme_option('crb_faq_goal'); ?>"
          data-feedack-form-action="faq_form"
        >
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="<?php echo esc_html(carbon_get_theme_option('crb_faq_title')); ?>">

          <div class="modal-form__errors" data-feedack-form-errors></div>

          <div class="modal-form__field">
            <label class="text-field">
              <span class="text-field__label">Ваше имя</span>
              <input class="text-field__input" type="text" name="your-name" value="" placeholder="">
            </label>
          </div>

          <div class="modal-form__field">
            <label class="text-field">
              <span class="text-field__label">Ваш номер телефона<span>*</span></span>
              <input class="text-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
            </label>
          </div>

          <div class="modal-form__field">
            <label class="textarea-field">
              <span class="textarea-field__label">Ваш вопрос<span>*</span></span>
              <textarea class="textarea-field__input" name="message" placeholder="" required></textarea>
            </label>
          </div>

          <div class="modal-form__field modal-form__field--rules">
            Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
          </div>

          <div class="modal-form__field modal-form__field--submit">
            <button type="submit" class="primary-button primary-button--alt w-full">
              <?php echo carbon_get_theme_option('crb_faq_action'); ?>
            </button>
          </div>

          <div class="modal-form-success">
            <div class="modal-form-success__title">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_title')); ?>
            </div>
            <div class="modal-form-success__desc">
              <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_desc')); ?>
            </div>
            <button type="button" class="control-button w-32" data-feedack-form-reset>Закрыть</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>

<div id="review-modal" aria-hidden="true" class="modal">
  <div class="modal__overlay" tabindex="-1" data-modal-close>
    <div class="modal__container container" role="dialog" aria-modal="true">
        
      <div class="modal__content">
        <button class="modal__close" aria-label="Закрыть" data-modal-close></button>

        <div class="modal__title"><?php echo carbon_get_theme_option('crb_review_form_title'); ?></div>

        <div class="modal__desc"><?php echo carbon_get_theme_option('crb_review_form_desc'); ?></div>

        <form
          class=""
          action="<?php echo admin_url('admin-ajax.php') ?>"
          data-feedack-form
          data-feedack-form-goal="<?php echo carbon_get_theme_option('crb_review_form_goal'); ?>"
          data-feedack-form-action="review_form"
        >
          <input type="hidden" name="submitted" value="">
          <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
          <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
          <input type="hidden" name="subject" value="<?php echo esc_html(carbon_get_theme_option('crb_review_form_title')); ?>">

          <div class="modal-form__errors" data-feedack-form-errors></div>

          <div class="grid gap-4 md:grid-cols-2">
            <label class="text-field">
              <span class="text-field__label">Ваше имя</span>
              <input class="text-field__input" type="text" name="your-name" value="" placeholder="">
            </label>

            <div class="field-rating">
              <span class="field-rating__label">Ваша оценка</span>
              <div class="field-rating__input">
                <input type="radio" id="star5" name="rating" value="5" checked>
                <label for="star5">
                  <span class="icon icon-star"></span>
                </label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4">
                  <span class="icon icon-star"></span>
                </label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3">
                  <span class="icon icon-star"></span>
                </label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2">
                  <span class="icon icon-star"></span>
                </label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1">
                  <span class="icon icon-star"></span>
                </label>
              </div>
            </div>

            <div class="md:col-span-2">
              <label class="textarea-field">
                <span class="textarea-field__label">Ваш отзыв<span>*</span></span>
                <textarea class="textarea-field__input" name="message" placeholder="" required></textarea>
              </label>
            </div>

            <div class="md:col-span-2 py-4">
              <div class="font-bold text-base mb-2">
                Фотографии, если есть
              </div>
              <div class="gallery-field" data-gallery-field>
                <button type="button" class="gallery-field__add" data-gallery-field-add>
                  <span class="gallery-field__add-icon">
                    <span class="icon icon-camera"></span>
                  </span>
                  <span class="gallery-field__add-label">
                    Добавить фото
                  </span>
                </button>
              </div>
            </div>

            <div class="md:col-span-2">
              <div class="field-rules">
                Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
              </div>
            </div>

            <div class="md:col-span-2 flex justify-center">
              <button type="submit" class="primary-button primary-button--alt w-64">
                <?php echo carbon_get_theme_option('crb_faq_action'); ?>
              </button>
            </div>
          </div>

          <div class="modal-form-success">
            <div class="modal-form-success__title">
              <?php echo nl2br(carbon_get_theme_option('crb_review_success_title')); ?>
            </div>
            <div class="modal-form-success__desc">
              <?php echo nl2br(carbon_get_theme_option('crb_review_success_desc')); ?>
            </div>
            <button type="button" class="control-button w-32" data-feedack-form-reset>Закрыть</button>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
