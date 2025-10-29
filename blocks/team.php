<section class="block-section team-section">
  <div class="container">
    <?php if ($title = $args['fields']['title']): ?>
    <h2 class="team-section__title"><?php echo nl2br($title); ?></h2>
    <?php endif; ?>
    <?php if ($list = $args['fields']['list']): ?>
    <div class="team-section__grid">
      <?php foreach ($list as $item): ?>
      <div class="team-card">
        <?php if ($image = $item['image']): ?>
        <div class="team-card__image">
          <?php echo wp_get_attachment_image($image, 'full'); ?>
        </div>
        <?php endif; ?>
        <div class="team-card__body">
          <?php if ($name = $item['name']): ?>
          <div class="team-card__name">
            <?php echo $name; ?>
          </div>
          <?php endif; ?>
          <?php if ($job = $item['job']): ?>
          <div class="team-card__job">
            <?php echo $job; ?>
          </div>
          <?php endif; ?>
          <?php if ($experience = $item['experience']): ?>
          <div class="team-card__experience">
            <?php echo $experience; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
