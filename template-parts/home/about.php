<svg width="0" height="0" style="position: absolute;">
  <defs>
    <filter
      id="liquid-glass-about"
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

<section class="about" id="about">
  <!-- Фоновое изображение -->
  <div class="about__bg">
    <div class="about__bg-image"></div>
  </div>

  <div class="container">
    <div class="about__wrapper">
      <div class="about__image-wrapper">
        <div class="about__image-card">
          <img
            src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('about_image') ) ); ?>"
            alt="О компании Hooroobes"
            class="about__image"
            loading="lazy"
          />
        </div>
      </div>

      <div class="about__content">
        <div class="about__team">
          <div class="about__avatars">
            <?php
              $about_avatars = carbon_get_the_post_meta('about_avatars');

            if ($about_avatars) : ?>

            <?php foreach ($about_avatars as $avatar) : ?>
              <img
                src="<?php echo esc_url( wp_get_attachment_url($avatar['avatar']) ); ?>"
                alt="Член команды"
                class="about__avatar"
                loading="lazy"
              />
            <?php endforeach; ?>
            <?php endif; ?>
            <div class="about__avatar about__avatar--more">
              <img
                src="<?php echo esc_url( get_template_directory_uri() . '/build/img/home/ava-5.png' ); ?>"
                alt="Член команды"
                loading="lazy"
              />
            </div>
          </div>
          <span class="about__team-count"><?php echo esc_html( carbon_get_the_post_meta('about_count') ); ?></span>
        </div>

        <h2 class="about__title"><?php echo esc_html( carbon_get_the_post_meta('about_title') ); ?></h2>

        <p class="about__text">
          <?php echo esc_html( carbon_get_the_post_meta('about_paragraph_1') ); ?>
        </p>

        <p class="about__text">
          <?php echo esc_html( carbon_get_the_post_meta('about_paragraph_2') ); ?>
        </p>

        <?php
          $about_stats = carbon_get_the_post_meta('about_list');

          if ($about_stats) : ?>
            <div class="about__stats">

              <?php foreach ($about_stats as $about_item) :
                  $title = $about_item['title'];
                  $descr = $about_item['descr'];
                ?>
                <div class="about__stat-item">
                  <span class="about__stat-number"><?php echo esc_html($title); ?></span>
                  <span class="about__stat-label"><?php echo esc_html($descr); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          
          <?php endif; ?>
        <div class="about__button-wrapper">
          <a
            href="<?php echo the_permalink(47); ?>"
            class="about__button button"
            aria-label="Начать проект"
          >
            <?php echo esc_html( carbon_get_the_post_meta('about_btn') ); ?>
          </a>
        </div>
      </div>
    </div>
  </div>

</section>
