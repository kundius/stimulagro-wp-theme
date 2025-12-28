<?php if ($addresses = carbon_get_theme_option('crb_delivery_address')): ?>
<div class="legal">
  <?php foreach ($addresses as $address): ?>
  <div class="legal__cell">
    <div class="legal__content">
      <?php echo wpautop($address['address']); ?>
    </div>
    <div class="legal__contacts">
      <?php echo wpautop($address['contacts']); ?>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>
