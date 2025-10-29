<?php $code = carbon_get_post_meta(get_the_ID(), 'code'); ?>
<?php $image = carbon_get_post_meta(get_the_ID(), 'image'); ?>
<div class="media-reviews-item">
  <div class="media-reviews-item__title">
    <?php echo get_the_title(get_the_ID()); ?>
  </div>
  <a
    href="<?php if ($code): echo '#video-' . get_the_ID(); else: echo wp_get_attachment_url($image); endif; ?>"
    class="media-reviews-item__pmedia-review"
    data-fslightbox="video"
  >
    <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail-m', ['class' => 'media-reviews-item__image']); ?>
    <span class="media-reviews-item__trigger">
      <?php if ($code): ?>
      <span class="icon icon-circle-play"></span>
      <?php else: ?>
      <span class="icon icon-search"></span>
      <?php endif; ?>
    </span>
  </a>
  <?php if ($code): ?>
  <div class="hidden">
    <div id="video-<?php echo get_the_ID(); ?>">
      <?php echo $code; ?>
    </div>
  </div>
  <?php endif; ?>
</div>
