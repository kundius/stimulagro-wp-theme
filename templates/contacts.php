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

    <section class="page-section">
      <div class="container page-section__container">
        <h1 class="page-section__title">
          <?php the_title(); ?>
        </h1>

        <div class="page-section__content">
          <?php the_content(); ?>
        </div>

        <?php get_template_part('partials/legal'); ?>
      </div>
    </section>

    <div class="bgs2">
      <div class="container">
        <?php get_template_part('partials/delivery'); ?>

        <div class="my-16">
          <?php get_template_part('partials/feedback'); ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
