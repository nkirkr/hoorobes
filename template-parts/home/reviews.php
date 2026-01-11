<section class="reviews">
  <div class="container">
    <h2 class="reviews__title">Отзывы о нашей работе</h2>
  </div>

  <div class="reviews__wrapper">
    <div class="reviews__track">
      <?php
        $reviews_query = new WP_Query(array(
          'post_type' => 'reviews',
          'posts_per_page' => -1,
          'orderby' => 'menu_order',
          'order' => 'ASC'
        ));

        if ($reviews_query->have_posts()) :
          while ($reviews_query->have_posts()) : $reviews_query->the_post();
            $photo = carbon_get_the_post_meta('photo');
            $name = carbon_get_the_post_meta('name');
            $photo_url = $photo ? wp_get_attachment_image_url($photo, 'full') : get_template_directory_uri() . '/build/img/home/reviewer.webp';
            $text = carbon_get_the_post_meta('review_text');
            $company = carbon_get_the_post_meta('company');
      ?>
      <article class="review-card">
        <img
          src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/quote.svg' ); ?>"
          alt="Отзыв"
          class="review-card__quote"
          aria-hidden="true"
        />

        <p class="review-card__text">
          <?php echo wp_kses_post($text); ?>
        </p>

        <div class="review-card__author">
          <img
            src="<?php echo esc_url($photo_url); ?>"
            alt="<?php echo esc_html($name); ?>"
            class="review-card__avatar"
            loading="lazy"
          />
          <div class="review-card__info">
            <p class="review-card__company"><?php echo esc_html($company); ?></p>
            <p class="review-card__name"><?php echo esc_html($name); ?></p>
          </div>
        </div>
      </article>

      <?php
        endwhile;
        wp_reset_postdata();
        endif;
      ?>
    </div>
  </div>

  <div class="container">
    <!-- Navigation (только мобильные) -->
    <div class="reviews__navigation">
      <button class="reviews__nav-btn reviews__nav-btn--prev" aria-label="Предыдущий слайд">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build//img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
      </button>
      <button class="reviews__nav-btn reviews__nav-btn--next" aria-label="Следующий слайд">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build//img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
      </button>
    </div>
  </div>

  <!-- Dawn arc -->
  <div class="reviews__dawn">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/home/dawn.png' ); ?>" alt="" aria-hidden="true" />
  </div>
</section>
