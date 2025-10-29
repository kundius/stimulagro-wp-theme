<div class="header" data-sticky-header data-mobile-menu-state="closed">
  <div class="container header__container">
    <button type="button" class="header-toggle" data-drawer-open="nav">
      <span class="icon icon-menu"></span>
    </button>

    <?php wp_nav_menu([
      'theme_location' => 'menu-main-left',
      'container' => null,
      'menu_class' => 'header-nav header-nav--left',
    ]); ?>

    <?php wp_nav_menu([
      'theme_location' => 'menu-main-right',
      'container' => null,
      'menu_class' => 'header-nav header-nav--right',
    ]); ?>

    <a href="/" class="header-logo">
      <img src="<?php bloginfo('template_url'); ?>/assets/logo.png" alt="" />
    </a>

    <a
      href="tel:<?php echo carbon_get_theme_option('crb_theme_phone'); ?>"
      class="header-call"
      data-call-button>
      <span class="header-call__icon">
        <span class="icon icon-phone-circle"></span>
      </span>
      <span class="header-call__text">
        Свяжитесь с нами
      </span>
    </a>
  </div>
</div>

<a href="" class="header-instruction">
  <span class="header-instruction__icon">
    <span class="icon icon-instruction"></span>
  </span>
  <span class="header-instruction__text">
    Инструкция по применению
  </span>
</a>

<div class="header-anchor" data-sticky-header-anchor></div>