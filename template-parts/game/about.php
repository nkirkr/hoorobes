<section class="game-about">
  <!-- Фоновое изображение -->
  <div class="game-about__bg">
    <div class="game-about__bg-image"></div>
  </div>

  <div class="container">
    <?php
    $banner = carbon_get_the_post_meta('case_banner_img');
    $banner_url = $banner ? wp_get_attachment_url($banner) : get_template_directory_uri() . '/build/img/game/hero.webp';
;
    if (!empty($banner_url)): ?>
      <div class="game-about__hero">
        <img
          src="<?php echo esc_url($banner_url); ?>"
          alt="О игре"
          class="game-about__hero-image"
        />
        <div class="game-about__hero-overlay"></div>
      </div>
    <?php endif; ?>

    <div class="game-about__description">
      <?php echo wpautop( carbon_get_the_post_meta('case_banner_descr') ); ?>
    </div>
    <?php
        $banner_btn = carbon_get_the_post_meta('case_banner_btn');
        $banner_btn_text = !empty($banner_btn) ? $banner_btn : 'Играть в игру';
    ?>
    <div class="game-about__button-wrapper">
      <a href="<?php echo esc_url( carbon_get_the_post_meta('case_link') ); ?>" class="game-about__button button" aria-label="Играть в игру" target="_blank" rel="noopener noreferrer">
        <?php echo esc_html($banner_btn_text); ?>
      </a>
    </div>
  </div>


  <?php
  $gallery = carbon_get_the_post_meta('case_slider');
  if (!empty($gallery)): ?>

    <div class="game-about__slider">
      <div class="game-about__slider-track">
      <?php foreach ($gallery as $slide) : 
        $image = wp_get_attachment_url($slide['image']);  
      ?>
        
        <div class="game-about__slide">
          <img src="<?php echo esc_url($image); ?>" alt="Скриншот игры" />
        </div>

        <?php endforeach; ?>

        <?php foreach ($gallery as $slide) : 
          $image = wp_get_attachment_url($slide['image']);  
        ?>

        <div class="game-about__slide">
          <img src="<?php echo esc_url($image); ?>" alt="Скриншот игры" />
        </div>

        <?php endforeach; ?>
        <?php foreach ($gallery as $slide) : 
          $image = wp_get_attachment_url($slide['image']);  
        ?>

        <div class="game-about__slide">
          <img src="<?php echo esc_url($image); ?>" alt="Скриншот игры" />
        </div>

        <?php endforeach; ?>

      </div>
    </div>

  <?php endif; ?>
  

  <div class="container">
    <div class="game-about__navigation">
      <button
        class="game-about__nav game-about__nav--prev"
        aria-label="Предыдущий слайд"
      >
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>"
          alt=""
          aria-hidden="true"
        />
      </button>
      <button
        class="game-about__nav game-about__nav--next"
        aria-label="Следующий слайд"
      >
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>"
          alt=""
          aria-hidden="true"
        />
      </button>
    </div>
  </div>
</section>
