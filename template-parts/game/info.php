<section class="game-info">
  <!-- Фоновое изображение -->
  <div class="game-info__bg"></div>

  <div class="container">
    <div class="game-info__content">
      <div class="game-info__card">

        <div class="game-info__photo-blur game-info__photo-blur--1"></div>
        <div class="game-info__photo-blur game-info__photo-blur--2"></div>

        <div class="game-info__photo-content">
          <div class="game-info__logo-box" styles="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/build/img/home/dawn.webp' ); ?>)">
            <img
              src="<?php echo esc_url( wp_get_attachment_url( carbon_get_the_post_meta('case_inner_card_img') ) ); ?>"
              alt="Фон игры"
            />
          </div>

          <div class="game-info__client-info">
            <h3 class="game-info__client-title"><?php echo esc_html( carbon_get_the_post_meta('case_client')); ?></h3>
            <p class="game-info__client-description">
              <?php echo esc_html( carbon_get_the_post_meta('case_client_descr')); ?>
            </p>
          </div>

          <div class="game-info__date-badge">
            <span><strong>Дата:</strong> <?php echo esc_html( carbon_get_the_post_meta('case_date')); ?></span>
          </div>
        </div>
      </div>

      <div class="game-info__description">
        <h1 class="game-info__title"><?php the_title(); ?></h1>
        <div class="game-info__text">
          <?php echo wpautop( carbon_get_the_post_meta('case_descr') ); ?>
        </div>
        <?php
          $btn = carbon_get_the_post_meta('case_btn');
          $btn_text = !empty($btn) ? $btn : 'Играть в игру';
        ?>
        <a href="<?php echo esc_url( carbon_get_the_post_meta('case_link') ); ?>" class="game-info__button button" aria-label="Играть в игру" target="_blank" rel="noopener noreferrer">
          <?php echo esc_html($btn_text); ?>
        </a>
      </div>
    </div>

    <?php
    $stats_list = carbon_get_the_post_meta('case_stats');

    if (!empty($stats_list)) : ?>
      <div class="game-info__stats">
        <?php foreach ($stats_list as $item) : 
          $title = $item['title'];  
          $descr = $item['descr'];  
        ?>
          <div class="game-info__stat">
            <div class="game-info__stat-value"><?php echo esc_html($title); ?></div>
            <div class="game-info__stat-label">
              <?php echo esc_html($descr); ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
