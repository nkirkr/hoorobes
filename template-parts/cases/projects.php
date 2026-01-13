<svg width="0" height="0" style="position: absolute;">
  <defs>
    <filter
      id="liquid-glass-filters"
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
      />
      <feDisplacementMap in="SourceGraphic" scale="8" />
    </filter>
  </defs>
</svg>

<section class="projects">
  <!-- Фоновое изображение -->
  <div class="projects__bg">
    <div class="projects__bg-image"></div>
  </div>

  <div class="container">
    <h1 class="projects__title">Работали над проектами</h1>

    <?php 
    // Получаем все термины таксономии case_type
    $case_types = get_terms(array(
        'taxonomy' => 'case_type',
        'hide_empty' => false,
    ));
    ?>

    <div class="projects__filters-wrapper projects__filters-wrapper--desktop">
      <div class="projects__filters">
        <button
          class="projects__filter projects__filter--active"
          data-filter="all"
        >
          Все
        </button>
        <?php if (!empty($case_types) && !is_wp_error($case_types)) : ?>
          <?php foreach ($case_types as $term) : ?>
            <button 
              class="projects__filter" 
              data-filter="<?php echo esc_attr($term->slug); ?>"
              data-term-id="<?php echo esc_attr($term->term_id); ?>"
            >
              <?php echo esc_html($term->name); ?>
            </button>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="projects__filters-wrapper projects__filters-wrapper--mobile">
      <div class="projects__dropdown">
        <button class="projects__dropdown-toggle" type="button">
          <span class="projects__dropdown-text">Все</span>
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            class="projects__dropdown-icon"
          >
            <path
              d="M3 6L8 11L13 6"
              stroke="white"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
        <div class="projects__dropdown-menu">
          <button
            class="projects__dropdown-item projects__dropdown-item--active"
            data-filter="all"
          >
            Все
          </button>
          <?php if (!empty($case_types) && !is_wp_error($case_types)) : ?>
            <?php foreach ($case_types as $term) : ?>
              <button 
                class="projects__dropdown-item" 
                data-filter="<?php echo esc_attr($term->slug); ?>"
                data-term-id="<?php echo esc_attr($term->term_id); ?>"
              >
                <?php echo esc_html($term->name); ?>
              </button>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="projects__grid">
      <?php
      // Запрос для получения постов cases
      $paged = 1;
      $posts_per_page = 9; // Количество постов на странице
      
      $args = array(
          'post_type' => 'cases',
          'posts_per_page' => $posts_per_page,
          'paged' => $paged,
          'orderby' => 'date',
          'order' => 'DESC',
      );

      $cases_query = new WP_Query($args);

      if ($cases_query->have_posts()) :
          while ($cases_query->have_posts()) : $cases_query->the_post();
              // Получаем категории поста
              $terms = get_the_terms(get_the_ID(), 'case_type');
              $category_slug = '';
              if ($terms && !is_wp_error($terms)) {
                  $category_slug = $terms[0]->slug;
              }
              
              // Получаем изображение
              $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
              if (!$thumbnail_url) {
                  $thumbnail_url = THEME_URI . '/build/img/projects/project.png';
              }
              ?>
              <article class="project-card" data-category="<?php echo esc_attr($category_slug); ?>">
                <img
                  src="<?php echo esc_url($thumbnail_url); ?>"
                  alt="<?php echo esc_attr(get_the_title()); ?>"
                  class="project-card__image"
                  loading="lazy"
                />
                <div class="project-card__overlay"></div>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="project-card__button">
                  <span class="project-card__name"><?php echo esc_html(get_the_title()); ?></span>
                  <span class="project-card__icon">
                    <img src="<?php echo THEME_URI; ?>/build/img/svgicons/projects/arrow.svg" alt="Arrow" />
                  </span>
                </a>
              </article>
              <?php
          endwhile;
      else :
          ?>
          <p>Кейсы не найдены.</p>
          <?php
      endif;

      wp_reset_postdata();
      ?>
    </div>

    <?php if ($cases_query->max_num_pages > 1) : ?>
      <button 
        class="projects__load-more" 
        aria-label="Загрузить больше проектов"
        data-page="1"
        data-max-pages="<?php echo esc_attr($cases_query->max_num_pages); ?>"
      >
        Загрузить ещё
      </button>
    <?php endif; ?>
  </div>

</section>
