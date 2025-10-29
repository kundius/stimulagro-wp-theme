<section class="block-section measurement-section">
  <div class="container">
    <div class="measurement-section__title">
      <?php if ($title = $args['fields']['title']): ?>
      <h2 class="measurement-section__title-inner"><?php echo nl2br($title); ?></h2>
      <?php endif; ?>
    </div>
    <?php if ($action = $args['fields']['action']): ?>
    <div class="measurement-section__order">
      <button
        type="button"
        class="primary-button primary-button--alt primary-button--large"
        data-feedback-button
        data-feedback-button-title="<?php echo esc_html($args['fields']['modal_title']); ?>"
        data-feedback-button-desc="<?php echo esc_html($args['fields']['modal_desc']); ?>"
        data-feedback-button-action="<?php echo esc_html($args['fields']['modal_action']); ?>"
        data-feedback-button-goal="<?php echo $args['fields']['modal_goal']; ?>"
      >
        <?php echo nl2br($action); ?>
      </button>
    </div>
    <?php endif; ?>
  </div>
</section>
