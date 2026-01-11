<section class="services-hero">
	<!-- SVG фон под bg.png -->
	<div class="services-hero__bg-svg">
		<div class="services-hero__bg-svg-image"></div>
	</div>

	<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/services/bg.png' ); ?>" alt="" class="services-hero__bg" aria-hidden="true" />

	<div class="container">
		<div class="services-hero__content">
			<div class="services-hero__text">
				<h1 class="services-hero__title"><?php echo esc_html( carbon_get_the_post_meta('services_title') ); ?></h1>
				<p class="services-hero__description">
					<?php echo esc_html( carbon_get_the_post_meta('services_subtitle') ); ?>
				</p>
				<p class="services-hero__price"><?php echo esc_html( carbon_get_the_post_meta('services_price') ); ?></p>
				<button type="button" class="services-hero__button button" data-modal-open="briefModal" aria-label="Заказать услугу">
					<?php echo esc_html( carbon_get_the_post_meta('services_btn') ); ?>
				</button>
			</div>

			<div class="services-hero__image">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/services/avatar.png' ); ?>" alt="Персонаж игры" />
			</div>
		</div>

		<div class="services-hero__process">
			<!-- SVG фон -->
			<div class="services-hero__process__bg">
				<div class="services-hero__process__bg-image"></div>
			</div>

			<h2 class="services-hero__process-title"><?php echo esc_html( carbon_get_the_post_meta('process_title') ); ?></h2>

			<?php

			$steps = carbon_get_the_post_meta('process_list');

			if (!empty($steps)) : ?>

			<div class="services-hero__steps">
				
				<?php foreach ($steps as $index => $step) : 
					$title = $step['title'];
					$descr = $step['descr'];
					$icon = wp_get_attachment_url($step['icon']);
                  	$number = $index + 1;	
				?>
				<article class="services-step">
					<div class="services-step__number">
						<span><?php echo $number; ?></span>
					</div>

					<div class="services-step__icon">
						<img src="<?php echo esc_url($icon); ?>" alt="" aria-hidden="true" />
					</div>

					<h3 class="services-step__heading"><?php echo esc_html($title); ?></h3>

					<p class="services-step__description">
						<?php echo wp_kses_post($descr); ?>
					</p>
				</article>

				<?php endforeach; ?>

				<div class="services-hero__arrow services-hero__arrow--1">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/services/line-1.svg' ); ?>" alt="" aria-hidden="true" />
				</div>
				<div class="services-hero__arrow services-hero__arrow--2">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/services/line-2.svg' ); ?>" alt="" aria-hidden="true" />
				</div>
			</div>

			<?php endif; ?>
		</div>
	</div>
</section>
