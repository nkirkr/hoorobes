<div class="mobile-menu-overlay"></div>
<div class="mobile-menu">
  <nav class="mobile-menu__nav">
    <a href="<?php echo the_permalink(47); ?>" class="mobile-menu__link">Услуги</a>
    <a href="<?php echo the_permalink(53); ?>" class="mobile-menu__link">Кейсы</a>
    <a href="/#about" class="mobile-menu__link">О&#160;нас</a>
    <a href="/#team" class="mobile-menu__link">Команда</a>
  </nav>

  <button class="mobile-menu__button button" data-modal-open="briefModal" aria-label="Начать проект">
    <span class="button__text">Начать проект</span>
  </button>

  <div class="mobile-menu__socials">
    <a href="<?php echo esc_url($GLOBALS['contacts']['tg']); ?>" class="mobile-menu__social" aria-label="Telegram" target="_blank" rel="nofollow noopener">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/tg.svg'); ?>" alt="Telegram" width="32" height="32" />
    </a>
    <a href="<?php echo esc_url($GLOBALS['contacts']['discord']); ?>" class="mobile-menu__social" aria-label="Discord" target="_blank" rel="nofollow noopener">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/discord.svg' ); ?>" alt="Discord" width="32" height="32" />
    </a>
  </div>
</div>