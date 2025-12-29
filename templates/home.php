<?php
/*
Template Name: Главная
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

    <a href="<?php the_permalink(63); ?>" class="header-instruction">
      <span class="header-instruction__icon">
        <span class="icon icon-instruction"></span>
      </span>
      <span class="header-instruction__text">
        Инструкция по применению
      </span>
    </a>

    <?php if ($intro_slider = carbon_get_the_post_meta('intro_slider')): ?>
    <section class="gumat-section">
      <div class="container">
        <div class="gumat-slideshow" data-gumat-slideshow>
          <div class="gumat-slideshow__viewport" data-gumat-slideshow-viewport>
            <div class="gumat-slideshow__container">
              <?php foreach ($intro_slider as $slide): ?>
              <div class="gumat-slideshow__sldie">
                <div class="gumat-product">
                  <div class="gumat-product__image-1"></div>
                  <div class="gumat-product__image-2"></div>
                  <?php if ($certificate = $slide['certificate']): ?>
                  <div class="gumat-product__certificate"><?php echo nl2br($certificate); ?></div>
                  <?php endif; ?>
                  <div class="gumat-product__image-3"></div>
                  <?php if ($description_1 = $slide['description_1']): ?>
                  <div class="gumat-product__description_1">
                  <span class="gumat-product__description_1-misc-1"></span>
                  <span class="gumat-product__description_1-misc-2"></span>
                  <span class="gumat-product__description_1-misc-3"></span>
                  <?php echo nl2br($description_1); ?>
                  </div>
                  <?php endif; ?>
                  <?php if ($description_2 = $slide['description_2']): ?>
                  <div class="gumat-product__description_2">
                  <span class="gumat-product__description_2-misc-1"></span>
                  <span class="gumat-product__description_2-misc-2"></span>
                  <span class="gumat-product__description_2-misc-3"></span>
                  <?php echo nl2br($description_2); ?>
                  </div>
                  <?php endif; ?>
                  <?php if ($description_3 = $slide['description_3']): ?>
                  <div class="gumat-product__description_3">
                  <span class="gumat-product__description_3-misc-1"></span>
                  <span class="gumat-product__description_3-misc-2"></span>
                  <span class="gumat-product__description_3-misc-3"></span>
                  <?php echo nl2br($description_3); ?>
                  </div>
                  <?php endif; ?>
                  <?php if ($description_4 = $slide['description_4']): ?>
                  <div class="gumat-product__description_4">
                  <span class="gumat-product__description_4-misc-1"></span>
                  <span class="gumat-product__description_4-misc-2"></span>
                  <span class="gumat-product__description_4-misc-3"></span>
                  <?php echo nl2br($description_4); ?>
                  </div>
                  <?php endif; ?>
                  <?php if ($description_5 = $slide['description_5']): ?>
                  <div class="gumat-product__description_5">
                  <span class="gumat-product__description_5-misc-1"></span>
                  <span class="gumat-product__description_5-misc-2"></span>
                  <span class="gumat-product__description_5-misc-3"></span>
                  <?php echo nl2br($description_5); ?>
                  </div>
                  <?php endif; ?>
                  <?php if ($slogan = $slide['slogan']): ?>
                  <div class="gumat-product__slogan"><?php echo nl2br($slogan); ?></div>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="gumat-slideshow__dots" data-gumat-slideshow-dots></div>
          <button class="gumat-slideshow__control" type="button" data-gumat-slideshow-prev></button>
          <button class="gumat-slideshow__control" type="button" data-gumat-slideshow-next></button>
        </div>
      </div>
    </section>
    <?php endif; ?>

    <section class="about" data-page-anchor-boundary>
      <div class="container">
        <div class="page-anchor" data-page-anchor="<?php echo carbon_get_the_post_meta(
          'about_anchor',
        ); ?>"></div>
        <?php if ($about_title = carbon_get_the_post_meta('about_title')): ?>
        <div class="about__title">
          <?php echo nl2br($about_title); ?>
        </div>
        <?php endif; ?>
        <div class="about__layout">
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

    <section class="trials" data-page-anchor-boundary>
      <div class="container">
        <div class="page-anchor" data-page-anchor="<?php echo carbon_get_the_post_meta(
          'trials_anchor',
        ); ?>"></div>
        <div class="trials__title">
          <?php echo nl2br(carbon_get_the_post_meta('trials_title')); ?>
        </div>
        <div class="trials__grid">
          <div class="trials__grid-text-1">
            <div class="trials__text">
              <?php echo wpautop(carbon_get_the_post_meta('trials_text_1')); ?>
            </div>
          </div>
          <div class="trials__grid-text-2">
            <div class="trials__text">
              <?php echo wpautop(carbon_get_the_post_meta('trials_text_2')); ?>
            </div>
          </div>
          <div class="trials__grid-text-3">
            <div class="trials__text">
              <?php echo wpautop(carbon_get_the_post_meta('trials_text_3')); ?>
            </div>
          </div>
          <?php if ($trials_image = carbon_get_the_post_meta('trials_image')): ?>
          <div class="trials__grid-image">
            <div class="trials__image">
              <?php echo wp_get_attachment_image($trials_image, 'full'); ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <?php if ($trials_title_alt = carbon_get_the_post_meta('trials_title_alt')): ?>
        <div class="trials__title-alt">
          <?php echo nl2br($trials_title_alt); ?>
        </div>
        <?php endif; ?>
        <?php if ($trials_more_link = carbon_get_the_post_meta('trials_more_link')): ?>
        <div class="trials__more">
          <a href="<?php echo esc_url($trials_more_link); ?>" class="button-primary">
            Подробнее<span class="button-primary__arrow"></span>
          </a>
        </div>
        <?php endif; ?>
      </div>
    </section>

    <?php $certificates_query = new WP_Query([
      'post_type' => 'certificate',
      'posts_per_page' => 4,
    ]); ?>
    <?php if ($certificates_query->have_posts()): ?>
    <section class="certificates">
      <div class="page-anchor" data-page-anchor="Сертификаты"></div>
      <div class="certificates__title">Сертификаты</div>
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
      <div class="certificates__more">
        <a href="#" class="button-primary">
          Смотреть все<span class="button-primary__arrow"></span>
        </a>
      </div>
    </section>
    <?php endif; ?>

    <div class="bgs2">
      <div class="container">
        <div class="my-16">
          <?php get_template_part('partials/delivery', null, [
            'anchor' => carbon_get_theme_option('crb_delivery_anchor'),
          ]); ?>
        </div>
        <div class="my-16">
          <?php get_template_part('partials/feedback'); ?>
        </div>
        <div class="my-16">
          <?php get_template_part('partials/legal'); ?>
        </div>
      </div>
    </div>

    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
