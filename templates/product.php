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

    <div class="bgs">
      <div class="bgs__wave-logo-b">
        <section class="usage">
          <div class="container">
            <div name="02" class="page-anchor">02.</div>
            <div class="usage__title">
              <?php echo nl2br(carbon_get_the_post_meta('usage_title')); ?>
            </div>
            <div class="usage__content">
              <?php echo wpautop(carbon_get_the_post_meta('usage_content')); ?>
            </div>
            <div class="usage__lists">
              <?php if ($specifications = carbon_get_the_post_meta('specifications')): ?>
              <div class="usage__specifications">
                <?php foreach ($specifications as $specification): ?>
                  <div class="usage-specification">
                    <div class="usage-specification__image">
                      <?php echo wp_get_attachment_image($specification['photo'], 'full'); ?>
                    </div>
                    <div class="usage-specification__name">
                      <?php echo nl2br($specification['name']); ?>
                    </div>
                    <div class="usage-specification__content">
                      <?php echo nl2br($specification['content']); ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
              <?php if ($options = carbon_get_the_post_meta('options')): ?>
              <?php foreach ($options as $option): ?>
                <div class="usage-option">
                  <div class="usage-option__image">
                    <?php echo wp_get_attachment_image($option['photo'], 'full'); ?>
                  </div>
                  <div class="usage-option__name">
                    <?php echo nl2br($option['name']); ?>
                  </div>
                  <div class="usage-option__content">
                    <?php echo nl2br($option['content']); ?>
                  </div>
                </div>
              <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <div class="usage__warning">
              <?php echo nl2br(carbon_get_the_post_meta('usage_warning')); ?>
            </div>
          </div>
        </section>
      </div>
      <div class="bgs__white">
        <section class="trials">
          <div class="container">
            <div name="03" class="page-anchor">03.</div>
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
      </div>
      <?php if ($trials_categories = carbon_get_the_post_meta('trials_categories')): ?>
      <?php
      $trials_categories_ids = array_map(fn($value) => $value['id'], $trials_categories);
      $trials_query = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => 4,
        'category__in' => $trials_categories_ids,
      ]);
      ?>
      <?php if ($trials_query->have_posts()): ?>
      <div class="bgs__third">
        <div class="trials-articles">
          <?php while ($trials_query->have_posts()): ?>
            <?php $trials_query->the_post(); ?>
            <article class="article-card">
              <time class="article-card__date" datetime="<?php echo get_the_date('c'); ?>">
                <?php echo get_the_date('d.m.Y'); ?>
              </time>
              <?php if ($thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium')): ?>
              <div class="article-card__image">
                <?php echo $thumbnail; ?>
              </div>
              <?php endif; ?>
              <h3 class="article-card__title"><?php echo esc_html(get_the_title()); ?></h3>
              <p class="article-card__excerpt">
                <?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
              </p>
              <a href="<?php echo esc_url(get_permalink()); ?>" class="article-card__read-more">
                читать далее
              </a>
            </article>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      <?php endif; ?>
      <?php endif; ?>
    </div>

    <?php get_template_part('partials/delivery'); ?>
    <?php get_template_part('partials/feedback'); ?>
    <?php get_template_part('partials/legal'); ?>
    <?php get_template_part('partials/footer'); ?>
  </div>
</body>

</html>
