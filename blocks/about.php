<section class="block-section about">
  <div class="container">
    <div class="about__layout">
      <div class="about__layout-content">
        <div class="about__headline">
          <?php if ($title = $args['fields']['title']): ?>
          <h2 class="about__headline-primary">
            <?php echo nl2br($title); ?>
          </h2>
          <?php endif; ?>
          <?php if ($subtitle = $args['fields']['subtitle']): ?>
          <div class="about__headline-secondary">
            <?php echo $subtitle; ?>
          </div>
          <?php endif; ?>
        </div>
        <?php if ($content = $args['fields']['content']): ?>
        <div class="about__cotent">
          <?php echo nl2br($content); ?>
        </div>
        <?php endif; ?>
      </div>
      <?php if ($cards = $args['fields']['cards']): ?>
      <div class="about__layout-services">
        <div class="about__services">
          <?php foreach ($cards as $card): ?>
          <div class="about-service">
            <?php if ($image = $card['image']): ?>
            <div class="about-service__icon" style="--image-url: url(<?php echo wp_get_attachment_url($image); ?>)">
            </div>
            <?php endif; ?>
            <div class="about-service__title">
              <?php echo $card['name']; ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
