<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    
<svg width="0" height="0" style="position: absolute;">
  <defs>
    <filter
      id="liquid-glass-header"
      x="-50%"
      y="-50%"
      width="200%"
      height="200%"
    >
      <feTurbulence
        type="fractalNoise"
        baseFrequency="0.015 0.015"
        numOctaves="3"
        seed="7"
        result="turbulence"
      />
      <feGaussianBlur in="turbulence" stdDeviation="1" result="smoothNoise" />
      <feDisplacementMap
        in="SourceGraphic"
        in2="smoothNoise"
        scale="8"
        xChannelSelector="R"
        yChannelSelector="G"
        result="distorted"
      />
      <feGaussianBlur in="distorted" stdDeviation="0.2" />
    </filter>
  </defs>
</svg>

<header class="header" role="banner">
  <div class="container">
    <div class="header__content">
      <a href="/" class="header__logo" aria-label="Главная страница">
        <img
          src="<?php echo esc_url( wp_get_attachment_url( carbon_get_theme_option('site_logo') ) ); ?>"
          alt="Логотип компании"
          width="50"
          height="50"
        />
      </a>

      <nav
        class="header__nav nav"
        role="navigation"
        aria-label="Основная навигация"
      >
        <a href="<?php echo the_permalink(47); ?>" class="nav__link <?php echo (is_page(47) || is_singular('services')) ? 'active' : ''; ?>" data-page="services">
          <span class="nav__link-blur"></span>
          <span class="nav__link-text">Услуги</span>
        </a>
        <a href="<?php echo the_permalink(53); ?>" class="nav__link <?php echo (is_page(53) || is_singular('cases')) ? 'active' : ''; ?>" data-page="projects">
          <span class="nav__link-blur"></span>
          <span class="nav__link-text">Кейсы</span>
        </a>
        <a href="/#about" class="nav__link" data-page="about">
          <span class="nav__link-blur"></span>
          <span class="nav__link-text">О нас</span>
        </a>
        <a href="/#team" class="nav__link" data-page="team">
          <span class="nav__link-blur"></span>
          <span class="nav__link-text">Команда</span>
        </a>
      </nav>

      <div class="header__button-wrapper">
        <button
          class="header__button button"
          data-modal-open="briefModal"
          aria-label="Оформить заказ"
        >
          <span class="button__text">Сделать заказ</span>
        </button>
      </div>

      <button
        class="header__menu-toggle"
        aria-label="Открыть меню"
        aria-expanded="false"
      >
        <div class="header__menu-icon">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </button>
    </div>
  </div>
</header>

<?php get_template_part('template-parts/mob-menu'); ?>