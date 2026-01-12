<svg width="0" height="0" style="position: absolute;">
  <defs>
    <filter id="liquid-glass-play-button">
      <feTurbulence
        type="fractalNoise"
        baseFrequency="0.015"
        numOctaves="2"
        result="noise"
      />
      <feDisplacementMap in="SourceGraphic" in2="noise" scale="8" />
    </filter>
  </defs>
</svg>

<section class="game-hero">
  <?php 
  $poster = carbon_get_the_post_meta('case_poster');
  $poster_url = $poster ? wp_get_attachment_image_url($poster, 'full') : get_template_directory_uri() . '/build/img/game/hero.webp';
  ?>
  <img
    src="<?php echo esc_url($poster_url); ?>"
    alt="Превью видео игры"
    class="game-hero__preview"
  />

  <div class="game-hero__overlay"></div>

  <?php
  $video = carbon_get_the_post_meta('case_video');
  $video_url = wp_get_attachment_url( $video ); 
  if (!empty($video_url)) : ?>

  <a
    href="<?php echo esc_url($video_url); ?>"
    data-fancybox="game-video"
    class="game-hero__play-button"
    aria-label="Воспроизвести видео"
  >
    <svg
      class="game-hero__play-icon"
      width="40"
      height="48"
      viewBox="0 0 40 48"
      fill="none"
      aria-hidden="true"
    >
      <path
        d="M2 2L38 24L2 46V2Z"
        fill="white"
        stroke="white"
        stroke-width="3"
        stroke-linejoin="round"
      />
    </svg>
  </a>

  <?php endif; ?>
</section>
