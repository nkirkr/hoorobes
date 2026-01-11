<section class="team" id="team">
  <svg width="0" height="0" style="position: absolute;">
    <defs>
      <filter id="liquid-glass-team" x="-50%" y="-50%" width="200%" height="200%">
        <feTurbulence type="fractalNoise" baseFrequency="0.015 0.015" numOctaves="3" seed="7" />
        <feDisplacementMap in="SourceGraphic" scale="8" />
      </filter>
    </defs>
  </svg>

  <div class="container">
    <div class="team__header">
      <h2 class="team__title">Наша команда</h2>
      <div class="team__navigation team__navigation--desktop">
        <button class="team__nav-btn team__nav-btn--prev" aria-label="Предыдущий слайд">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
        </button>
        <button class="team__nav-btn team__nav-btn--next" aria-label="Следующий слайд">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
        </button>
      </div>
    </div>

    <div class="team-swiper swiper">
      <div class="swiper-wrapper">
        <?php
        $team_query = new WP_Query(array(
          'post_type' => 'team',
          'posts_per_page' => -1,
          'orderby' => 'menu_order',
          'order' => 'ASC'
        ));

        if ($team_query->have_posts()) :
          while ($team_query->have_posts()) : $team_query->the_post();
            $name = get_the_title();
            $role = carbon_get_the_post_meta('role');
            $photo = carbon_get_the_post_meta('photo');
            $photo_url = $photo ? wp_get_attachment_image_url($photo, 'medium') : get_template_directory_uri() . '/build/img/home/teammate.png';
            $description = carbon_get_the_post_meta('descr');
        ?>
        <div class="swiper-slide">
          <div class="team-card">
            <div class="team-card__inner">
              <!-- Лицевая сторона -->
              <div class="team-card__front">
                <!-- Жидкое стекло подложка -->
                <div class="team-card__glass"></div>
                
                <!-- Фото -->
                <div class="team-card__image">
                  <img src="<?php echo esc_url($photo_url); ?>" alt="<?php echo esc_attr($name); ?>" loading="lazy" />
                </div>
                
                <!-- Черное поле с именем и должностью -->
                <div class="team-card__info">
                  <div class="team-card__text-wrapper">
                    <h3 class="team-card__name"><?php echo esc_html($name); ?></h3>
                    <?php if ($role) : ?>
                      <p class="team-card__position"><?php echo esc_html($role); ?></p>
                    <?php endif; ?>
                  </div>
                  <button class="team-card__toggle" aria-label="Показать подробнее">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/plus.svg' ); ?>" alt="" aria-hidden="true" />
                  </button>
                </div>
              </div>

              <div class="team-card__back">
                <div class="team-card__header">
                  <div class="team-card__title-wrapper">
                    <h3 class="team-card__name"><?php echo esc_html($name); ?></h3>
                    <?php if ($role) : ?>
                      <p class="team-card__position"><?php echo esc_html($role); ?></p>
                    <?php endif; ?>
                  </div>
                  <button class="team-card__toggle" aria-label="Скрыть подробности">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/minus.svg' ); ?>" alt="" aria-hidden="true" />
                  </button>
                </div>
                <?php if ($description) : ?>
                  <p class="team-card__description"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>

    <!-- Mobile Navigation -->
    <div class="team__navigation team__navigation--mobile">
      <button class="team__nav-btn team__nav-btn--prev" aria-label="Предыдущий слайд">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
      </button>
      <button class="team__nav-btn team__nav-btn--next" aria-label="Следующий слайд">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
      </button>
    </div>
  </div>

  <!-- Декоративный blur -->
  <div class="team__blur"></div>
</section>

