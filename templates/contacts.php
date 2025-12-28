<?php
/*
Template Name: Контакты
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

    <div class="page-section">
      <div class="container">
        <h1 class="page-section__title">
          <?php the_title(); ?>
        </h1>

        <div class="page-section__content">
          <?php the_content(); ?>
        </div>

        <?php get_template_part('partials/legal-list'); ?>
      </div>
    </div>

    <section class="delivery pt-16">
      <div class="container">
        <?php if ($title = carbon_get_theme_option('crb_delivery_title')): ?>
        <div class="delivery__title">
          <?php echo nl2br($title); ?>
        </div>
        <?php endif; ?>
        <?php get_template_part('partials/delivery-content'); ?>
      </div>
    </section>

    <section class="feedback-section pb-16">
      <div class="container">
        <?php get_template_part('partials/feedback-form'); ?>
      </div>
    </section>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
