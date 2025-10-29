<?php
$rating = carbon_get_post_meta(get_the_ID(), 'rating');
$content = carbon_get_post_meta(get_the_ID(), 'content');
$author = carbon_get_post_meta(get_the_ID(), 'author');
$avatar = carbon_get_post_meta(get_the_ID(), 'avatar');
$date = carbon_get_post_meta(get_the_ID(), 'date');
$gallery = carbon_get_post_meta(get_the_ID(), 'gallery');
$reply_content = carbon_get_post_meta(get_the_ID(), 'reply_content');
$reply_date = carbon_get_post_meta(get_the_ID(), 'reply_date');
$reply_gallery = carbon_get_post_meta(get_the_ID(), 'reply_gallery');
$crb_review_reply_author = carbon_get_theme_option('crb_review_reply_author');
$crb_review_reply_avatar = carbon_get_theme_option('crb_review_reply_avatar');
?>
<div class="user-review-item">
  <div class="flex items-center gap-3">
    <div class="flex items-center justify-center text-white uppercase text-2xl font-medium w-11 h-11 shrink-0 rounded-full overflow-hidden border border-gray-300 bg-gray-300">
      <?php if ($avatar): ?>
      <img src="<?php echo wp_get_attachment_image_url($avatar); ?>" alt="" class="w-full h-full object-cover">
      <?php else: ?>
      <?php echo mb_substr($author, 0, 1); ?>
      <?php endif; ?>
    </div>
    <div>
      <div class="text-sm font-bold">
        <?php echo $author; ?>
      </div>
      <div class="text-sm text-gray-300">
        <?php echo wp_date('j F', strtotime($date)); ?>
      </div>
    </div>
  </div>
  <div class="flex gap-0.5 mt-2">
    <?php for ($i = 1; $i <= 5; $i++): ?>
    <span class="icon icon-star <?php if ($i <= $rating): ?>text-yellow-500<?php else: ?>text-gray-300<?php endif; ?>"></span>
    <?php endfor; ?>
  </div>
  <div class="text-base mt-2">
    <?php echo $content; ?>
  </div>
  <?php if ($gallery): ?>
  <div class="flex flex-wrap gap-2 mt-2">
    <?php foreach ($gallery as $item): ?>
    <a href="<?php echo wp_get_attachment_image_url($item, 'full'); ?>" class="flex w-16 h-16 overflow-hidden rounded" data-fslightbox="review-gallery-<?php echo get_the_ID(); ?>">
      <?php echo wp_get_attachment_image($item, 'thumbnail-s'); ?>
    </a>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

  <?php if ($reply_content): ?>
  <div class="pl-12 mt-6">
    <div class="flex items-center gap-3">
      <div class="flex items-center justify-center text-white uppercase text-2xl font-medium w-11 h-11 shrink-0 rounded-full overflow-hidden border border-gray-300 bg-gray-300">
        <?php if ($crb_review_reply_avatar): ?>
        <img src="<?php echo wp_get_attachment_image_url($crb_review_reply_avatar); ?>" alt="" class="w-full h-full object-cover">
        <?php else: ?>
        <?php echo mb_substr($crb_review_reply_author, 0, 1); ?>
        <?php endif; ?>
      </div>
      <div>
        <div class="text-sm font-bold">
          <?php echo $crb_review_reply_author; ?>
        </div>
        <div class="text-sm text-gray-300">
          <?php echo wp_date('j F', strtotime($reply_date)); ?>
        </div>
      </div>
    </div>
    <div class="text-base mt-2">
      <?php echo $reply_content; ?>
    </div>
    <?php if ($reply_gallery): ?>
    <div class="flex flex-wrap gap-2 mt-2">
      <?php foreach ($reply_gallery as $item): ?>
      <a href="<?php echo wp_get_attachment_image_url($item, 'full'); ?>" class="flex w-16 h-16 overflow-hidden rounded" data-fslightbox="review-gallery-<?php echo get_the_ID(); ?>">
        <?php echo wp_get_attachment_image($item, 'thumbnail-s'); ?>
      </a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</div>
