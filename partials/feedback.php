<section class="feedback">
  <div class="container">
    <div class="feedback__main">
      <div class="feedback__content">
        <div class="feedback__title">
          Есть вопросы<br>
          или предложения?
        </div>
        <div class="feedback__desc">
          Пишите, обязательно ответим
        </div>
      </div>
      <form
        class="feedback__form"
        action="<?php echo admin_url('admin-ajax.php'); ?>"
        data-feedback-form
        data-feedback-form-goal=""
        data-feedback-form-action="feedback_form">
        <input type="hidden" name="submitted" value="">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce'); ?>">
        <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
        <input type="hidden" name="subject" value="Заказать звонок">

        <div class="feedback__fields">
          <div class="feedback__field">
            <div class="input-field">
              <label for="name" class="input-field__label">Имя</label>
              <input type="text" id="name" name="name" class="input-field__input">
            </div>
          </div>
          <div class="feedback__field">
            <div class="input-field">
              <label for="phone" class="input-field__label">Ваш телефон*</label>
              <input type="text" id="phone" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required class="input-field__input">
            </div>
          </div>
          <div class="feedback__field feedback__field--wide">
            <div class="input-field">
              <label for="message" class="input-field__label">Ваше вопрос</label>
              <textarea id="message" name="message" class="input-field__textarea"></textarea>
            </div>
          </div>
        </div>
        <div class="feedback__submit">
          <button type="submit" class="button-primary">
            Отправить сообщение
          </button>
        </div>
        <div class="feedback__rules">
          <label class="rules-field">
            <input type="checkbox" id="rules" name="rules" required class="rules-field__input" checked>
            <span class="rules-field__checkmark"></span>
            <span class="rules-field__text">
              Прочитал(-а) <a href="" target="_blank">Пользовательское соглашение</a> и принимаю <a href="" target="_blank">Политику обработки персональных данных</a>
            </span>
          </label>
        </div>
        <div class="feedback-form-success">
          <div class="feedback-form-success__title">
            Сообщение успешно отправлено
          </div>
          <div class="feedback-form-success__desc">
            Мы свяжемся с вами в ближайшее время
          </div>
          <button type="button" class="feedback__form-success__close" data-feedback-form-reset>Закрыть</button>
        </div>
      </form>
    </div>
  </div>
</section>
