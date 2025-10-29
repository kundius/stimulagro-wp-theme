<section class="block-section problems-section">
  <div class="container">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="problems-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>
    <?php if ($list = $args['fields']['list']): ?>
    <div class="problems-section__grid">
      <?php foreach ($list as $item): ?>
      <div class="problems-item">
        <div class="problems-item__image">
          <?php echo wp_get_attachment_image($item['image'], 'full'); ?>
        </div>
        <div class="problems-item__title">
          <?php echo nl2br($item['title']); ?>
        </div>
        <div class="problems-item__desc">
          <?php echo nl2br($item['desc']); ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
