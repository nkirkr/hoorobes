<section class="service-page-hero">
  <!-- Фоновое изображение -->
  <div class="service-page-hero__bg">
    <div class="service-page-hero__bg-image"></div>
  </div>

  <div class="container">
    <h1 class="service-page-hero__title"><?php the_title(); ?></h1>

    <div class="service-page-hero__card">
      <svg width="0" height="0" style="position: absolute">
        <defs>
          <filter
            id="liquid-glass-service"
            x="-50%"
            y="-50%"
            width="200%"
            height="200%"
          >
            <feTurbulence
              type="fractalNoise"
              baseFrequency="0.015 0.015"
              numOctaves="3"
              seed="5"
            />
            <feDisplacementMap in="SourceGraphic" scale="8" />
          </filter>
        </defs>
      </svg>

      <div class="service-page-hero__glass"></div>

      <div class="service-page-hero__image">
        <img
          src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('service_inner_img') ) ); ?>"
          alt="<?php the_title_attribute(); ?>"
          loading="lazy"
        />
      </div>
    </div>

    <div class="service-page-hero__description">
      <?php echo wpautop( carbon_get_the_post_meta( 'service_inner_text' ) ); ?>
    </div>

    <?php
        $btn = carbon_get_the_post_meta('service_inner_btn');
        $btn_text = !empty($btn) ? $btn : 'Заказать услугу';
    ?>
    <button
      type="button"
      class="service-page-hero__button button"
      data-modal-open="briefModal"
      aria-label="Заказать услугу"
    >
      <?php echo esc_html($btn_text); ?>
    </button>

    <?php 
    $service_stats = carbon_get_the_post_meta('service_stats');
      if (!empty($service_stats)) : 
    ?>
      <div class="service-page-hero__stats">
        <?php foreach($service_stats as $service_item): 
          $title = $service_item['title'];
          $descr = $service_item['descr'];
        ?>
          <div class="service-page-hero__stat">
            <p class="service-page-hero__stat-number"><?php echo esc_html($title); ?></p>
            <p class="service-page-hero__stat-text">
              <?php echo esc_html($descr); ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
