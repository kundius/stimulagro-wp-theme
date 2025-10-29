<section class="block-section calc-section calc-section--has-title">
  <div class="container">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="calc-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>

    <form
      class="calc"
      data-calc
      action="<?php echo admin_url('admin-ajax.php') ?>"
      data-feedack-form
      data-feedack-form-goal="<?php echo $args['fields']['goal']; ?>"
      data-feedack-form-action="calc_form"
    >
      <input type="hidden" name="submitted" value="">
      <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('feedback-nonce') ?>">
      <input type="hidden" name="page" value="<?php echo esc_html(get_self_link()); ?>">
      <input type="hidden" name="subject" value="<?php echo esc_html($args['fields']['title']); ?>">

      <div class="calc__left">
        <?php if ($questions = $args['fields']['questions']): ?>
        <?php foreach ($questions as $n => $question): ?>
        <div class="calc__field">
          <div class="calc__field-label">
            <?php echo ($n + 1); ?>. <?php echo nl2br($question['question']); ?>
          </div>
          <?php if ($answers = $question['answers']): ?>
          <div class="calc__field-control <?php if ($question['type'] === 'box'): ?>calc__field-radio-box<?php else: ?>calc__field-radio-button<?php endif; ?>">
            <?php foreach ($answers as $k => $answer): ?>
            <label class="<?php if ($question['type'] === 'box'): ?>radio-field<?php else: ?>radio-button<?php endif; ?>">
              <input
                type="radio"
                name="question:<?php echo esc_html($question['question']); ?>"
                data-calc-repair-price="<?php echo $answer['repair_price']; ?>"
                data-calc-materials-price="<?php echo $answer['materials_price']; ?>"
                value="<?php echo esc_html($answer['answer']); ?>"
                <?php if ($k === 0): ?>checked<?php endif; ?>
              >
              <span><?php echo $answer['answer']; ?></span>
            </label>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>

        <div class="calc__field">
          <div class="calc__field-label">
            <?php echo (count($questions) + 1); ?>. Загрузите план квартиры или дома для получения точной сметы ремонта <span>(в формате .doc, .docx, .xlsx, .pdf, .jpeg, .png)</span>
          </div>
          <div class="calc__field-control">
            <div class="attachments-field" data-attachments-field data-attachments-field-count="1">
              <div class="attachments-field__row" data-attachments-field-row>
                <label class="attachment-field" data-attachment-field>
                  <input type="file" name="attachments[]" class="attachment-field__input" data-attachment-field-input />
                  <span class="attachment-field__label control-button">
                    <span data-attachment-field-label>Выберите файл</span>
                    <span class="icon icon-pin"></span>
                  </span>
                </label>

                <button type="button" class="more-button attachments-field__remove" data-attachments-field-remove>
                  <span class="more-button__text">Убрать</span>
                  <span class="more-button__icon">
                    <span class="icon icon-minus"></span>
                  </span>
                </button>

                <button type="button" class="more-button attachments-field__add" data-attachments-field-add>
                  <span class="more-button__text">Добавить ещё</span>
                  <span class="more-button__icon">
                    <span class="icon icon-plus"></span>
                  </span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <div class="calc__field calc__field--area">
          <div class="calc__field-label">
            Площадь помещения (м<sup>2</sup>)
          </div>
          <div class="calc__field-control">
            <div class="range-field" data-range-field>
              <input type="range" name="area" value="25" min="0" max="300" class="range-field__input" data-range-field-input>
              <div class="range-field__display" data-range-field-display="<?php echo esc_html('# м<sup>2</sup>'); ?>"></div>
              <button type="button" class="range-field__plus" data-range-field-plus>+</button>
              <button type="button" class="range-field__minus" data-range-field-minus>-</button>
            </div>
          </div>
        </div>
      </div>

      <div class="calc__right">
        <div class="calc__repair">
          <div class="calc__repair-title">
            Примерная стоимость ремонта
          </div>
          <div class="calc__repair-desc">
            без учета материалов:
          </div>
          <div class="calc__repair-price" data-calc-repair-cost></div>
        </div>
        <div class="calc__materials">
          <div class="calc__materials-title">
            Стоимость <span class="inline-block">черновых материалов</span>
          </div>
          <div class="calc__materials-price" data-calc-materials-cost></div>
        </div>
        <div class="calc__line"></div>
        <?php if ($message = $args['fields']['message']): ?>
        <div class="calc__message"><?php echo nl2br($message); ?></div>
        <?php endif; ?>
        <div class="calc__errors" data-feedack-form-errors></div>
        <div class="calc__phone">
          <label class="text-field">
            <span class="text-field__label">Ваш номер телефона</span>
            <input class="text-field__input" type="text" name="phone" value="" data-maska="+ 7 (###) - ### - ## - ##" placeholder="+ 7 (___)  - ___ - __ - __" required>
          </label>
        </div>
        <div class="calc__rules">
          Нажимая “Отправить”, вы даете согласие на <a href="/privacy-policy" target="_blank">обработку персональных данных</a>
        </div>
        <div class="calc__submit">
          <button type="submit" class="primary-button primary-button--alt">Отправить</button>
        </div>
      </div>

      <div class="calc-success">
        <div class="calc-success__title">
          <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_title')); ?>
        </div>
        <div class="calc-success__desc">
          <?php echo nl2br(carbon_get_theme_option('crb_feedback_success_desc')); ?>
        </div>
        <button type="button" class="calc-success__close w-32" data-feedack-form-reset>Закрыть</button>
      </div>
    </form>
  </div>
</section>
