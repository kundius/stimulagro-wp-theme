<section class="block-section reasons-section">
  <div class="container">
    <div class="reasons-section__headline">
      <?php if ($title = $args['fields']['title']): ?>
      <h2 class="reasons-section__title"><?php echo nl2br($title); ?></h2>
      <?php endif; ?>
      <?php if ($desc = $args['fields']['desc']): ?>
      <div class="reasons-section__desc"><?php echo nl2br($desc); ?></div>
      <?php endif; ?>
    </div>
    <?php if ($list = $args['fields']['list']): ?>
    <div class="reasons-section__grid">
      <?php foreach ($list as $item): ?>
      <div class="reasons-item">
        <div class="reasons-item__headline">
          <div class="reasons-item__title">
            <?php echo nl2br($item['title']); ?>
          </div>
          <div class="reasons-item__image">
            <?php echo wp_get_attachment_image($item['image'], 'full'); ?>
          </div>
        </div>
        <div class="reasons-item__desc">
          <?php echo nl2br($item['desc']); ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
