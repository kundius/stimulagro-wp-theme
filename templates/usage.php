<?php
/*
Template Name: Испытания
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
      <div class="container page-section__container">
        <h1 class="page-section__title">
          <?php the_title(); ?>
        </h1>

        <?php if ($content = get_the_content()): ?>
        <div class="page-section__content">
          <?php the_content(); ?>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
