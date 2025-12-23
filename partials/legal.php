<?php if ($addresses = carbon_get_theme_option('crb_delivery_address')): ?>
<section class="legal">
  <div class="container">
    <div class="legal__layout">
      <?php foreach ($addresses as $address): ?>
      <div class="legal__layout-cell">
        <div class="legal__content">
          <?php echo wpautop($address['address']); ?>
        </div>
        <div class="legal__contacts">
          <?php echo wpautop($address['contacts']); ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>
