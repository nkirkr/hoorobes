<footer class="footer">
  <div class="container">
    <div class="footer__content">
      <div class="footer__left">
        <img
          src="<?php echo esc_url( wp_get_attachment_url( carbon_get_theme_option('site_logo') ) ); ?>"
          alt="Logo"
          class="footer__logo"
        />
        <p class="footer__tagline">
          Ваш мир.<br />
          Ваши правила.<br />
          Наша реализация.
        </p>
      </div>

      <nav class="footer__nav">
        <a href="/" class="footer__nav-link">Главная</a>
        <a href="<?php echo the_permalink(47); ?>" class="footer__nav-link">Услуги</a>
        <a href="<?php echo the_permalink(53); ?>" class="footer__nav-link">Проекты</a>
        <a href="/#about" class="footer__nav-link">О нас</a>
        <a href="/#team" class="footer__nav-link">Команда</a>
      </nav>

      <div class="footer__actions">
        <div class="footer__button-wrapper">
          <button
            type="button"
            class="footer__button button"
            data-modal-open="briefModal"
            aria-label="Оформить заказ"
            >Сделать заказ</button
          >
        </div>
        
        <button class="footer__scroll-top" aria-label="Наверх" type="button">
          <svg
            width="32"
            height="32"
            viewBox="0 0 32 32"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M16 5L7 14L8.4 15.45L15 8.85V27H17V8.85L23.6 15.45L25 14L16 5Z"
              fill="white"
            />
          </svg>
        </button>
        
        <div class="footer__socials">
          <a
            href="<?php echo esc_url($GLOBALS['contacts']['tg']); ?>"
            class="footer__social"
            target="_blank"
            rel="noopener noreferrer"
            >Telegram</a
          >
          <a
            href="<?php echo esc_url($GLOBALS['contacts']['discord']); ?>"
            class="footer__social"
            target="_blank"
            rel="noopener noreferrer"
            >Discord</a
          >
        </div>
      </div>
    </div>

    <div class="footer__line"></div>

    <div class="footer__bottom">
      <div class="footer__links">
        <?php if ( !empty($GLOBALS['contacts']['policy']) ) : ?>
          <a href="<?php echo esc_url($GLOBALS['contacts']['policy']); ?>" class="footer__link" target="_blank" rel="noopener noreferrer"
            >Политика обработки персональных данных</a
          >
        <?php endif; ?>
        <?php if ( !empty($GLOBALS['contacts']['consent']) ) : ?>
          <a href="<?php echo esc_url($GLOBALS['contacts']['consent']); ?>" class="footer__link" target="_blank" rel="noopener noreferrer"
            >Согласие на обработку персональных данных</a
          >
        <?php endif; ?>
      </div>
      
      <div class="footer__socials footer__socials--desktop">
        <a
          href="<?php echo esc_url($GLOBALS['contacts']['tg']); ?>"
          class="footer__social"
          target="_blank"
          rel="noopener noreferrer"
          >Telegram</a
        >
        <a
          href="<?php echo esc_url($GLOBALS['contacts']['discord']); ?>"
          class="footer__social"
          target="_blank"
          rel="noopener noreferrer"
          >Discord</a
        >
      </div>
    </div>
  </div>
</footer>
<?php get_template_part('template-parts/modal'); ?>
    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

