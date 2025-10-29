<form
  class="partnership-form"
  action="<?php echo admin_url('admin-ajax.php') ?>"
  data-feedack-form
  data-feedack-form-goal="partnership"
  data-feedack-form-action="partnership_form"
>
  <input type="hidden" name="submitted" value="">
  <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
  <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
  <input type="hidden" name="subject" value="Партнерство">

  <div class="partnership-form__title">Партнерство</div>
  <div class="partnership-form__errors" data-feedack-form-errors></div>
  <div class="partnership-form__grid">
    <div class="partnership-form__grid-cell">
      <label class="text-field">
        <span class="text-field__label">Как вас зовут?<span>*</span></span>
        <input class="text-field__input" type="text" name="your-name" value="" placeholder="" required>
      </label>
    </div>
    <div class="partnership-form__grid-cell">
      <label class="text-field">
        <span class="text-field__label">Введите Ваш номер телефона<span>*</span></span>
        <input class="text-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
      </label>
    </div>
    <div class="partnership-form__grid-cell">
      <label class="text-field">
        <span class="text-field__label">Ваша Электронная почта<span>*</span></span>
        <input class="text-field__input" type="text" name="email" value="" placeholder="" required>
      </label>
    </div>
    <div class="partnership-form__grid-cell">
      <label class="text-field">
        <span class="text-field__label">Город<span>*</span></span>
        <input class="text-field__input" type="text" name="city" value="" placeholder="" required>
      </label>
    </div>
    <div class="partnership-form__grid-cell">
      <label class="text-field">
        <span class="text-field__label">Название компании</span>
        <input class="text-field__input" type="text" name="company-name" value="" placeholder="">
      </label>
    </div>
    <div class="partnership-form__grid-cell">
      <label class="text-field">
        <span class="text-field__label">Сайт компании</span>
        <input class="text-field__input" type="text" name="company-site" value="" placeholder="">
      </label>
    </div>
    <div class="partnership-form__grid-cell partnership-form__grid-cell--full">
      <label class="textarea-field">
        <span class="textarea-field__label">Специализация в деятельности<span>*</span></span>
        <textarea class="textarea-field__input" name="message" placeholder="Преимущественно работаем с теми, кто может выполнять все работы под ключ" required></textarea>
      </label>
    </div>
  </div>
  <div class="partnership-form__submit">
    <button type="submit" class="primary-button">Отправить</button>
  </div>
  <div class="partnership-form__footer">
    <div class="partnership-form__footer-cell">
      <div class="partnership-form__rules">
        (<span>*</span>) - поля, обязательные для заполнения
      </div>
    </div>
    <div class="partnership-form__footer-cell">
      <div class="partnership-form__rules">
        Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
      </div>
    </div>
  </div>
  <div class="partnership-form-success">
    <div class="partnership-form-success__title">
      <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_title')); ?>
    </div>
    <div class="partnership-form-success__desc">
      <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_desc')); ?>
    </div>
    <button type="button" class="control-button w-32" data-feedack-form-reset>Закрыть</button>
  </div>
</form>
