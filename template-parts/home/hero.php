<svg width="0" height="0" style="position: absolute;">
  <defs>
    <filter id="liquid-glass-card" x="0%" y="0%" width="100%" height="100%">
      <feTurbulence
        type="fractalNoise"
        baseFrequency="0.009 0.009"
        numOctaves="2"
        seed="85"
        result="noise"
      />
      <feGaussianBlur in="noise" stdDeviation="0.03" result="blur" />
      <feDisplacementMap
        in="SourceGraphic"
        in2="blur"
        scale="12"
        xChannelSelector="R"
        yChannelSelector="G"
      />
    </filter>
  </defs>
</svg>

<section class="hero" id="hero">
  <!-- Фоновое изображение -->
  <div class="hero__bg">
    <div class="hero__bg-image"></div>
  </div>

  <div class="container">
    <div class="hero__content">
      <p class="hero__subtitle"><?php echo esc_html( carbon_get_the_post_meta('upper_title') ); ?></p>

      <h1 class="hero__title">
        <?php echo wp_kses_post( carbon_get_the_post_meta('title') ); ?>
      </h1>

      <p class="hero__description"><?php echo esc_html( carbon_get_the_post_meta('subtitle') ); ?></p>

      <div class="hero__buttons">
        <a
          href="<?php echo the_permalink(47); ?>"
          class="hero__button button button--primary"
          aria-label="Начать проект"
        >
          <span class="button__text"><?php echo esc_html( carbon_get_the_post_meta('hero_btn_1') ); ?></span>
        </a>
        <a
          href="selection.html"
          class="hero__button button button--secondary"
          aria-label="Подобрать услугу"
        >
          <span class="button__text"><?php echo esc_html( carbon_get_the_post_meta('hero_btn_2') ); ?></span>
        </a>
      </div>

      <div class="hero__slider">
        <div class="swiper hero-swiper">
          <div class="swiper-wrapper">

            <?php
              $cards = carbon_get_the_post_meta('projects_cards');
              
              if (!empty($cards)) : ?>

              <?php foreach ($cards as $index => $card) : 
                  $image = wp_get_attachment_url($card['card']);
                  $slide_number = $index + 1;
              ?>

                <div class="swiper-slide">
                  <div class="hero-card">
                    <img
                      src="<?php echo esc_url($image); ?>"
                      alt="Проект <?php echo $slide_number; ?>"
                      loading="lazy"
                      width="292"
                      height="368"
                    />
                  </div>
                </div>

              <?php endforeach; ?>

              <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="hero__stats">
        <h3 class="hero__stats-title"><?php echo esc_html( carbon_get_the_post_meta('stats_title') ); ?></h3>
        
        <div class="hero__stats-grid">
           
          <?php 
            $stats_list = carbon_get_the_post_meta('stats_list');

            if (!empty($stats_list)) : ?>

            <?php foreach ($stats_list as $stats_item) : 
                $image = wp_get_attachment_url($stats_item['image']);
                $title = $stats_item['title'];
                $descr = $stats_item['descr'];
            ?>
              <div class="hero__stat-card">
                <div class="hero__stat-image">
                  <img src="<?php echo esc_url($image); ?>" alt="" loading="lazy" />
                </div>
                <div class="hero__stat-number"><?php echo esc_html($title); ?></div>
                <div class="hero__stat-text"><?php echo esc_html($descr); ?></div>
              </div>
            
              <?php endforeach; ?>

              <?php endif; ?>
          
        </div>
      </div>
    </div>
  </div>

  <!-- Декоративная арка -->
  <picture class="hero__dawn">
    <source srcset="<?php echo esc_url( get_template_directory_uri() . '/build/img/home/dawn.webp' ); ?>" type="image/webp" />
    <img
      src="<?php echo esc_url( get_template_directory_uri() . '/build/img/home/dawn.png' ); ?>"
      alt=""
      loading="eager"
      width="1440"
      height="385"
      aria-hidden="true"
    />
  </picture>
</section>
