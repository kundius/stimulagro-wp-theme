
<div class="usage__lists">
  <?php if ($specifications = $args['fields']['specifications']): ?>
  <div class="usage__specifications">
    <?php foreach ($specifications as $specification): ?>
      <div class="usage-specification">
        <div class="usage-specification__image">
          <?php echo wp_get_attachment_image($specification['photo'], 'full'); ?>
        </div>
        <div class="usage-specification__name">
          <?php echo nl2br($specification['name']); ?>
        </div>
        <div class="usage-specification__content">
          <?php echo nl2br($specification['content']); ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
  <?php if ($options = $args['fields']['options']): ?>
  <?php foreach ($options as $option): ?>
    <div class="usage-option">
      <div class="usage-option__image">
        <?php echo wp_get_attachment_image($option['photo'], 'full'); ?>
      </div>
      <div class="usage-option__name">
        <?php echo nl2br($option['name']); ?>
      </div>
      <div class="usage-option__content">
        <?php echo nl2br($option['content']); ?>
      </div>
    </div>
  <?php endforeach; ?>
  <?php endif; ?>
</div>
