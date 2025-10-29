<section class="block-section gumat-section">
  <div class="container">
    <div class="gumat-section__wrap">
      <div class="gumat-section__inner">
        <div class="gumat-section__image-1"></div>
        <div class="gumat-section__image-2"></div>
        <div class="gumat-section__image-3"></div>
        <?php if ($certificate = $args['fields']['certificate']): ?>
          <div class="gumat-section__certificate"><?php echo nl2br($certificate); ?></div>
        <?php endif; ?>
        <?php if ($slogan = $args['fields']['slogan']): ?>
          <div class="gumat-section__slogan"><?php echo nl2br($slogan); ?></div>
        <?php endif; ?>
        <?php if ($description_1 = $args['fields']['description_1']): ?>
          <div class="gumat-section__description_1">
            <span class="gumat-section__description_1-misc-1"></span>
            <span class="gumat-section__description_1-misc-2"></span>
            <span class="gumat-section__description_1-misc-3"></span>
            <?php echo nl2br($description_1); ?>
          </div>
        <?php endif; ?>
        <?php if ($description_2 = $args['fields']['description_2']): ?>
          <div class="gumat-section__description_2">
            <span class="gumat-section__description_2-misc-1"></span>
            <span class="gumat-section__description_2-misc-2"></span>
            <span class="gumat-section__description_2-misc-3"></span>
            <?php echo nl2br($description_2); ?>
          </div>
        <?php endif; ?>
        <?php if ($description_3 = $args['fields']['description_3']): ?>
          <div class="gumat-section__description_3">
            <span class="gumat-section__description_3-misc-1"></span>
            <span class="gumat-section__description_3-misc-2"></span>
            <span class="gumat-section__description_3-misc-3"></span>
            <?php echo nl2br($description_3); ?>
          </div>
        <?php endif; ?>
        <?php if ($description_4 = $args['fields']['description_4']): ?>
          <div class="gumat-section__description_4">
            <span class="gumat-section__description_4-misc-1"></span>
            <span class="gumat-section__description_4-misc-2"></span>
            <span class="gumat-section__description_4-misc-3"></span>
            <?php echo nl2br($description_4); ?>
          </div>
        <?php endif; ?>
        <?php if ($description_5 = $args['fields']['description_5']): ?>
          <div class="gumat-section__description_5">
            <span class="gumat-section__description_5-misc-1"></span>
            <span class="gumat-section__description_5-misc-2"></span>
            <span class="gumat-section__description_5-misc-3"></span>
            <?php echo nl2br($description_5); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>