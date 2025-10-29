<section class="block-section terms-section">
  <div class="container">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="terms-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>

    <?php if ($list = $args['fields']['list']): ?>
    <?php
    $max_rows = 0;
    foreach ($list as $item) {
      foreach ($item['options'] as $n => $item) {
        if ($n > $max_rows) {
          $max_rows = $n;
        }
      }
    }
    
    ?>
    <div class="terms-grid">
      <div class="terms-cards">
        <?php foreach ($list as $item): ?>
        <div class="terms-cards__item"></div>
        <?php endforeach; ?>
      </div>

      <?php foreach ($list as $item): ?>
      <div class="terms-card__title<?php if ($item['_type'] !== 'head'): ?> terms-card__title--colored<?php endif; ?>">
        <?php echo nl2br($item['name']); ?>
      </div>
      <?php endforeach; ?>

      <?php for ($i = 0; $i <= $max_rows; $i++):?>
      <?php foreach ($list as $item): ?>
      <div class="<?php if ($item['_type'] === 'head'): ?>terms-card__head<?php else: ?>terms-card__data<?php endif; ?>">
        <div><?php echo (isset($item['options'][$i]) ? $item['options'][$i]['text'] : ''); ?></div>
      </div>
      <?php endforeach; ?>
      <?php endfor; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
