<section class="block-section services-section">
  <div class="container">
    <div class="services-section__headline">
      <?php if ($title = $args['fields']['title']): ?>
      <h2 class="services-section__title">
        <?php echo nl2br($title); ?>
      </h2>
      <?php endif; ?>
      <?php if ($desc = $args['fields']['desc']): ?>
      <div class="services-section__desc">
        <?php echo nl2br($desc); ?>
      </div>
      <?php endif; ?>
    </div>
    <?php if ($list = $args['fields']['list']): ?>
    <div class="services-section__grid-wrap">
      <div class="services-section__grid">
        <?php foreach ($list as $item): ?>
        <div class="services-section__grid-cell">
          <div class="services-card">
            <?php if ($sheet = $item['sheet']): ?>
            <div class="services-card__sheet"><?php echo nl2br($sheet); ?></div>
            <?php endif; ?>
            <?php if ($title = $item['title']): ?>
            <div class="services-card__title"><?php echo nl2br($title); ?></div>
            <?php endif; ?>
            <?php if ($desc = $item['desc']): ?>
            <div class="services-card__desc"><?php echo nl2br($desc); ?></div>
            <?php endif; ?>
            <?php if ($content = $item['content']): ?>
            <div class="services-card__list">
              <div class="services-card__list-inner">
                <?php echo wpautop($content); ?>
              </div>
            </div>
            <?php endif; ?>
            <?php if ($time = $item['time']): ?>
            <div class="services-card__time"><?php echo $time; ?></div>
            <?php endif; ?>
            <?php if ($price = $item['price']): ?>
            <div class="services-card__price"><?php echo $price; ?></div>
            <?php endif; ?>
            <div class="services-card__order">
              <button
                type="button"
                class="primary-button primary-button--small primary-button--alt w-52 max-md:w-48"
                data-feedback-button
                data-feedback-button-title="<?php echo esc_html($args['fields']['modal_title']); ?>"
                data-feedback-button-desc="<?php echo esc_html($args['fields']['modal_desc']); ?>"
                data-feedback-button-action="<?php echo esc_html($args['fields']['modal_action']); ?>"
                data-feedback-button-subject="<?php echo esc_html($args['fields']['modal_title'] . ' / ' . $item['title']); ?>"
                data-feedback-button-goal="<?php echo $args['fields']['modal_goal']; ?>"
              >Заказать</button>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
