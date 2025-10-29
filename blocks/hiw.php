<section class="block-section hiw-section">
  <div class="container">
    <?php if ($args['fields']['title']): ?>
    <h2 class="hiw-section__title">
      <?php echo nl2br($args['fields']['title']); ?>
    </h2>
    <?php endif; ?>
    <div class="hiw-section__grid">
      <div class="hiw-section__grid-cell">
        <div class="hiw-card hiw-card-call">
          <div class="hiw-card__headline">
            <div class="hiw-card__title">
              Шаг
            </div>
            <div class="hiw-card__num">
              1
            </div>
          </div>
          <?php if ($args['fields']['step_1_text_1']): ?>
          <div class="hiw-card-call__label">
            <?php echo nl2br($args['fields']['step_1_text_1']); ?>
          </div>
          <?php endif; ?>
          <?php if ($phone = carbon_get_theme_option('crb_theme_phone')): ?>
          <div class="hiw-card-call__phone">
            <?php echo $phone; ?>
          </div>
          <?php endif; ?>
          <?php if ($args['fields']['step_1_text_2']): ?>
          <div class="hiw-card-call__desc">
            <?php echo nl2br($args['fields']['step_1_text_2']); ?>
          </div>
          <?php endif; ?>
          <?php if ($args['fields']['step_1_text_3']): ?>
          <div class="hiw-card-call__or">
            <?php echo nl2br($args['fields']['step_1_text_3']); ?>
          </div>
          <?php endif; ?>
          <?php if ($args['fields']['step_1_action']): ?>
          <div class="hiw-card-call__order">
            <button
              type="button"
              class="primary-button primary-button--small w-56"
              data-feedback-button
              data-feedback-button-title="<?php echo esc_html($args['fields']['step_1_modal_title']); ?>"
              data-feedback-button-desc="<?php echo esc_html($args['fields']['step_1_modal_desc']); ?>"
              data-feedback-button-action="<?php echo esc_html($args['fields']['step_1_modal_action']); ?>"
              data-feedback-button-goal="<?php echo $args['fields']['step_1_modal_goal']; ?>"
            >
              <?php echo $args['fields']['step_1_action']; ?>
            </button>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="hiw-section__grid-cell">
        <div class="hiw-card hiw-card-visit">
          <div class="hiw-card__headline">
            <div class="hiw-card__title">
              Шаг
            </div>
            <div class="hiw-card__num">
              2
            </div>
          </div>
          <?php if ($args['fields']['step_2_text_1']): ?>
          <div class="hiw-card-visit__desc">
            <?php echo nl2br($args['fields']['step_2_text_1']); ?>
          </div>
          <?php endif; ?>
          <?php if ($step_2_text_2 = $args['fields']['step_2_text_2']): $step_2_text_2 = explode(PHP_EOL, $step_2_text_2); ?>
          <ul class="hiw-card-visit__list">
            <?php foreach ($step_2_text_2 as $item): ?>
            <li><?php echo $item; ?></li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
        </div>
      </div>
      <div class="hiw-section__grid-cell">
        <div class="hiw-card hiw-card-start">
          <div class="hiw-card__headline">
            <div class="hiw-card__title">
              Шаг
            </div>
            <div class="hiw-card__num">
              2
            </div>
          </div>
          <?php if ($args['fields']['step_3_text_1']): ?>
          <div class="hiw-card-start__title">
            <?php echo nl2br($args['fields']['step_3_text_1']); ?>
          </div>
          <?php endif; ?>
          <?php if ($args['fields']['step_3_text_2']): ?>
          <div class="hiw-card-start__desc">
            <?php echo nl2br($args['fields']['step_3_text_2']); ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
