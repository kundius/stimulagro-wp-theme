<?php
/*
Template Name: Сертификаты
*/
$certificates_query = new WP_Query([
  'post_type' => 'certificate',
  'posts_per_page' => 4,
]); ?>
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

        <div class="page-section__content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <?php if ($certificates_query->have_posts()): ?>
    <div class="certificates-list">
      <?php while ($certificates_query->have_posts()): ?>
      <?php $certificates_query->the_post(); ?>
      <article class="certificates-card">
        <?php if ($thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full')): ?>
        <div class="certificates-card__image">
          <img src="<?php echo $thumbnail; ?>" />
        </div>
        <a href="<?php echo $thumbnail; ?>" class="certificates-card__link" data-fslightbox="gallery" target="_blank">
          <span class="certificates-card__link-icon">
            <span class="icon icon-search"></span>
          </span>
        </a>
        <?php endif; ?>
        <div class="certificates-card__title"><?php echo esc_html(get_the_title()); ?></div>
      </article>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <?php echo get_pagination($certificates_query); ?>
    <?php endif; ?>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
