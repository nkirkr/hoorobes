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
          $card_1_case = carbon_get_the_post_meta('made_card_1_case');
          $case_1_url = !empty($card_1_case) ? get_permalink($card_1_case[0]['id']) : '#';
          if ($card_1_image): ?>
          <a href="<?php echo esc_url($case_1_url); ?>" class="full-width-link"></a>
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
          $card_4_case = carbon_get_the_post_meta('made_card_4_case');
          $case_4_url = !empty($card_4_case) ? get_permalink($card_4_case[0]['id']) : '#';
          if ($card_4_image): ?>
          <a href="<?php echo esc_url($case_4_url); ?>" class="full-width-link"></a>
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
          $card_2_case = carbon_get_the_post_meta('made_card_2_case');
          $case_2_url = !empty($card_2_case) ? get_permalink($card_2_case[0]['id']) : '#';
          if ($card_2_image): ?>
          <a href="<?php echo esc_url($case_2_url); ?>" class="full-width-link"></a>
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
          $card_6_case = carbon_get_the_post_meta('made_card_6_case');
          $case_6_url = !empty($card_6_case) ? get_permalink($card_6_case[0]['id']) : '#';
          if ($card_6_image): ?>
          <a href="<?php echo esc_url($case_6_url); ?>" class="full-width-link"></a>
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
          $card_3_case = carbon_get_the_post_meta('made_card_3_case');
          $case_3_url = !empty($card_3_case) ? get_permalink($card_3_case[0]['id']) : '#';
          if ($card_3_image): ?>
          <a href="<?php echo esc_url($case_3_url); ?>" class="full-width-link"></a>
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
          $card_5_case = carbon_get_the_post_meta('made_card_5_case');
          $case_5_url = !empty($card_5_case) ? get_permalink($card_5_case[0]['id']) : '#';
          if ($card_5_image): ?>
          <a href="<?php echo esc_url($case_5_url); ?>" class="full-width-link"></a>
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
          $card_7_case = carbon_get_the_post_meta('made_card_7_case');
          $case_7_url = !empty($card_7_case) ? get_permalink($card_7_case[0]['id']) : '#';
          if ($card_7_image): ?>
          <a href="<?php echo esc_url($case_7_url); ?>" class="full-width-link"></a>
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