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

    <div class="contacts-section">
      <div class="container">
        <div class="page-anchor" data-page-anchor="<?php the_title(); ?>"></div>
        <h1 class="contacts-section__title">
          <?php the_title(); ?>
        </h1>
        <div class="contacts-section__content">
          <?php the_content(); ?>
        </div>

        <?php get_template_part('partials/legal-list'); ?>
      </div>
    </div>

    <?php get_template_part('partials/delivery-section'); ?>

    <section class="feedback-section pt-4 pb-8">
      <div class="container">
        <?php get_template_part('partials/feedback-form'); ?>
      </div>
    </section>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
