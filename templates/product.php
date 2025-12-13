<?php
/*
Template Name: Продукт
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebSite">

<head>
  <?php get_template_part('partials/head'); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <div class="flex flex-col min-h-screen">
    <?php get_template_part('partials/header'); ?>

    <section class="gumat">
      <div class="container">
        <div class="gumat__wrap">
          <div class="gumat__inner">
            <div class="gumat__image-1"></div>
            <div class="gumat__image-2"></div>
            <div class="gumat__image-3"></div>
            <?php if ($certificate = carbon_get_the_post_meta('intro_certificate')): ?>
            <div class="gumat__certificate"><?php echo nl2br($certificate); ?></div>
            <?php endif; ?>
            <?php if ($slogan = carbon_get_the_post_meta('intro_slogan')): ?>
            <div class="gumat__slogan"><?php echo nl2br($slogan); ?></div>
            <?php endif; ?>
            <?php if ($description_1 = carbon_get_the_post_meta('intro_description_1')): ?>
            <div class="gumat__description_1">
              <span class="gumat__description_1-misc-1"></span>
              <span class="gumat__description_1-misc-2"></span>
              <span class="gumat__description_1-misc-3"></span>
              <?php echo nl2br($description_1); ?>
            </div>
            <?php endif; ?>
            <?php if ($description_2 = carbon_get_the_post_meta('intro_description_2')): ?>
            <div class="gumat__description_2">
              <span class="gumat__description_2-misc-1"></span>
              <span class="gumat__description_2-misc-2"></span>
              <span class="gumat__description_2-misc-3"></span>
              <?php echo nl2br($description_2); ?>
            </div>
            <?php endif; ?>
            <?php if ($description_3 = carbon_get_the_post_meta('intro_description_3')): ?>
            <div class="gumat__description_3">
              <span class="gumat__description_3-misc-1"></span>
              <span class="gumat__description_3-misc-2"></span>
              <span class="gumat__description_3-misc-3"></span>
              <?php echo nl2br($description_3); ?>
            </div>
            <?php endif; ?>
            <?php if ($description_4 = carbon_get_the_post_meta('intro_description_4')): ?>
            <div class="gumat__description_4">
              <span class="gumat__description_4-misc-1"></span>
              <span class="gumat__description_4-misc-2"></span>
              <span class="gumat__description_4-misc-3"></span>
              <?php echo nl2br($description_4); ?>
            </div>
            <?php endif; ?>
            <?php if ($description_5 = carbon_get_the_post_meta('intro_description_5')): ?>
            <div class="gumat__description_5">
              <span class="gumat__description_5-misc-1"></span>
              <span class="gumat__description_5-misc-2"></span>
              <span class="gumat__description_5-misc-3"></span>
              <?php echo nl2br($description_5); ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="about">
      <div class="container">
        <div name="01" class="page-anchor">01.</div>
        <?php if ($about_title = carbon_get_the_post_meta('about_title')): ?>
        <div class="about__title">
          <?php echo nl2br($about_title); ?>
        </div>
        <?php endif; ?>
        <div class="grid grid-cols-2">
          <?php if ($about_image = carbon_get_the_post_meta('about_image')): ?>
          <div class="about__image">
            <div class="about__image-wrapper">
              <?php echo wp_get_attachment_image($about_image, 'full'); ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if ($about_primary_content = carbon_get_the_post_meta('about_primary_content')): ?>
          <div class="about__primary-content">
            <?php echo wpautop($about_primary_content); ?>
          </div>
          <?php endif; ?>
        </div>
        <?php if (
          $about_secondary_content = carbon_get_the_post_meta('about_secondary_content')
        ): ?>
        <div class="about__secondary-content">
          <?php echo wpautop($about_secondary_content); ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="unique">
      <div class="container">
        <?php if ($unique_content = carbon_get_the_post_meta('unique_content')): ?>
        <div class="unique__content">
          <?php echo wpautop($unique_content); ?>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
