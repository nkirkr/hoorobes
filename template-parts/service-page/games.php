<section class="service-games">
  <div class="service-games__slider">
    <div class="service-games__slider-track">
      <?php
      // Запрос для слайдера - все кейсы
      $slider_query = new WP_Query(array(
          'post_type' => 'cases',
          'posts_per_page' => -1,
          'orderby' => 'date',
          'order' => 'DESC',
      ));

      if ($slider_query->have_posts()) :
          while ($slider_query->have_posts()) : $slider_query->the_post();
              $thumbnail_url = wp_get_attachment_url(carbon_get_the_post_meta('case_preview_img'));
              $excerpt = carbon_get_the_post_meta('case_excerpt');
              if (empty($excerpt)) {
                  $excerpt = get_the_excerpt();
              }
      ?>
        <div class="service-games__slide">
          <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
          <div class="service-games__slide-text">
            <h3 class="service-games__slide-title"><?php echo esc_html(get_the_title()); ?></h3>
            <p class="service-games__slide-desc"><?php echo esc_html($excerpt); ?></p>
          </div>
        </div>
      <?php
          endwhile;
          wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>

  <div class="container">
    <div class="service-games__navigation">
      <button
        class="service-games__nav service-games__nav--prev"
        aria-label="Предыдущий слайд"
      >
        <img
          src="./img/svgicons/all/arrow-active.svg"
          alt=""
          aria-hidden="true"
        />
      </button>
      <button
        class="service-games__nav service-games__nav--next"
        aria-label="Следующий слайд"
      >
        <img
          src="./img/svgicons/all/arrow-active.svg"
          alt=""
          aria-hidden="true"
        />
      </button>
    </div>
  </div>

  <div class="container">
    <h2 class="service-games__title">наши работы</h2>

    <div class="service-games__grid">
      <?php
      $paged = 1;
      $posts_per_page = 6; 
      
      $grid_query = new WP_Query(array(
          'post_type' => 'cases',
          'posts_per_page' => $posts_per_page,
          'paged' => $paged,
          'orderby' => 'date',
          'order' => 'DESC',
      ));

      if ($grid_query->have_posts()) :
          while ($grid_query->have_posts()) : $grid_query->the_post();
              $thumbnail_url = wp_get_attachment_url(carbon_get_the_post_meta('case_preview_img'));
              $excerpt = carbon_get_the_post_meta('case_excerpt');
              if (empty($excerpt)) {
                  $excerpt = get_the_excerpt();
              }
      ?>
        <article class="service-games__card">
          <div class="service-games__card-image">
            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
          </div>
          <div class="service-games__card-text">
            <h3 class="service-games__card-title"><?php echo esc_html(get_the_title()); ?></h3>
            <p class="service-games__card-desc"><?php echo esc_html($excerpt); ?></p>
          </div>
        </article>
      <?php
          endwhile;
      else :
      ?>
        <p>Кейсы не найдены.</p>
      <?php
      endif;
      ?>
    </div>

    <?php if ($grid_query->max_num_pages > 1) : ?>
      <button 
        class="service-games__load-more" 
        aria-label="Загрузить больше игр"
        data-page="1"
        data-max-pages="<?php echo esc_attr($grid_query->max_num_pages); ?>"
      >
        Загрузить ещё
      </button>
    <?php endif; ?>
    
    <?php wp_reset_postdata(); ?>
  </div>
</section>
