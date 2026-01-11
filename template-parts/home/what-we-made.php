<section class="what-we-made" id="what-we-made">
  <!-- Фоновое изображение -->
  <div class="what-we-made__bg">
    <div class="what-we-made__bg-image"></div>
  </div>

  <div class="container">
    <h2 class="what-we-made__title"><?php echo esc_html( carbon_get_the_post_meta('made_title') ); ?></h2>

    <div class="what-we-made__grid">
      <!-- Левая колонка -->
      <div class="what-we-made__column what-we-made__column--left">
        <article class="game-card game-card-1">
          <?php 
          $card_1_image = carbon_get_the_post_meta('made_card_1_image');
          if ($card_1_image): ?>
            <img
              src="<?php echo esc_url( wp_get_attachment_image_url($card_1_image, 'full') ); ?>"
              alt="<?php echo esc_attr( carbon_get_the_post_meta('made_card_1_title') ); ?>"
              loading="lazy"
            />
          <?php endif; ?>
        </article>

        <article class="game-card game-card-4">
          <?php 
          $card_4_image = carbon_get_the_post_meta('made_card_4_image');
          if ($card_4_image): ?>
            <img
              src="<?php echo esc_url( wp_get_attachment_image_url($card_4_image, 'full') ); ?>"
              alt="<?php echo esc_attr( carbon_get_the_post_meta('made_card_4_title') ); ?>"
              loading="lazy"
            />
          <?php endif; ?>
        </article>
      </div>

      <!-- Центральная колонка -->
      <div class="what-we-made__column what-we-made__column--center">
        <article class="game-card game-card-2">
          <?php 
          $card_2_image = carbon_get_the_post_meta('made_card_2_image');
          if ($card_2_image): ?>
            <img
              src="<?php echo esc_url( wp_get_attachment_image_url($card_2_image, 'full') ); ?>"
              alt="<?php echo esc_attr( carbon_get_the_post_meta('made_card_2_title') ); ?>"
              loading="lazy"
            />
          <?php endif; ?>
        </article>

        <article class="game-card game-card-6">
          <?php 
          $card_6_image = carbon_get_the_post_meta('made_card_6_image');
          if ($card_6_image): ?>
            <img
              src="<?php echo esc_url( wp_get_attachment_image_url($card_6_image, 'full') ); ?>"
              alt="<?php echo esc_attr( carbon_get_the_post_meta('made_card_6_title') ); ?>"
              loading="lazy"
            />
          <?php endif; ?>
        </article>
      </div>

      <!-- Правая колонка -->
      <div class="what-we-made__column what-we-made__column--right">
        <article class="game-card game-card-3">
          <?php 
          $card_3_image = carbon_get_the_post_meta('made_card_3_image');
          if ($card_3_image): ?>
            <img
              src="<?php echo esc_url( wp_get_attachment_image_url($card_3_image, 'full') ); ?>"
              alt="<?php echo esc_attr( carbon_get_the_post_meta('made_card_3_title') ); ?>"
              loading="lazy"
            />
          <?php endif; ?>
        </article>

        <article class="game-card game-card-5">
          <?php 
          $card_5_image = carbon_get_the_post_meta('made_card_5_image');
          if ($card_5_image): ?>
            <img
              src="<?php echo esc_url( wp_get_attachment_image_url($card_5_image, 'full') ); ?>"
              alt="<?php echo esc_attr( carbon_get_the_post_meta('made_card_5_title') ); ?>"
              loading="lazy"
            />
          <?php endif; ?>
        </article>

        <article class="game-card game-card-7">
          <?php 
          $card_7_image = carbon_get_the_post_meta('made_card_7_image');
          if ($card_7_image): ?>
            <img
              src="<?php echo esc_url( wp_get_attachment_image_url($card_7_image, 'full') ); ?>"
              alt="<?php echo esc_attr( carbon_get_the_post_meta('made_card_7_title') ); ?>"
              loading="lazy"
            />
          <?php endif; ?>
        </article>
      </div>
    </div>
  </div>
</section>