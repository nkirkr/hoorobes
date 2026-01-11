<section class="services-catalog">
	<picture class="services-catalog__bg">
		<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/services/line.png' ); ?>" alt="" aria-hidden="true" />
	</picture>

	<div class="container">
		<div class="services-catalog__header">
			<h2 class="services-catalog__title">Наши услуги</h2>
			<div class="services-catalog__navigation services-catalog__navigation--desktop">
				<button class="services-catalog__nav-btn services-catalog__nav-btn--prev" aria-label="Предыдущая услуга">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
				</button>
				<button class="services-catalog__nav-btn services-catalog__nav-btn--next" aria-label="Следующая услуга">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
				</button>
			</div>
		</div>

		<div class="services-catalog__grid">
			<?php
				$services_query = new WP_Query(array(
				'post_type' => 'services',
				'posts_per_page' => -1,
				'orderby' => 'menu_order',
				'order' => 'ASC'
				));

				if ($services_query->have_posts()) :
				while ($services_query->have_posts()) : $services_query->the_post();
					$photo = carbon_get_the_post_meta('service_preview_img');
					$photo_url = wp_get_attachment_image_url($photo, 'full');
					$price = carbon_get_the_post_meta('service_price');
					$descr = carbon_get_the_post_meta('service_exceprt');
			?>
				<article class="service-card">
					<div class="service-card__image">
						<img src="<?php echo esc_url($photo_url); ?>" alt="<?php the_title_attribute(); ?>" />
						<div class="service-card__price">
							<?php echo esc_html($price); ?>
						</div>
					</div>

					<div class="service-card__content">
						<div class="service-card__text">
							<h3 class="service-card__name"><?php the_title(); ?></h3>
							<p class="service-card__description"><?php echo wp_kses_post($descr); ?></p>
						</div>

						<a href="./service-page.html" class="service-card__button">
							<span class="service-card__button-text"><?php the_title(); ?></span>
							<span class="service-card__button-icon">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none">
									<path d="M3.125 10H16.875" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
									<path d="M11.25 4.375L16.875 10L11.25 15.625" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</span>
						</a>
					</div>
				</article>
			<?php
				endwhile;
				wp_reset_postdata();
				endif;
			?>

		</div>

		<!-- Навигация для мобильных -->
		<div class="services-catalog__navigation services-catalog__navigation--mobile">
			<button class="services-catalog__nav-btn services-catalog__nav-btn--prev" aria-label="Предыдущая услуга">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
			</button>
			<button class="services-catalog__nav-btn services-catalog__nav-btn--next" aria-label="Следующая услуга">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/all/arrow-active.svg' ); ?>" alt="" aria-hidden="true" />
			</button>
		</div>
	</div>
</section>
