<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Ajax обработчик для загрузки постов cases
 */
function load_more_cases() {
    // Проверка nonce для безопасности
    check_ajax_referer('load_more_cases_nonce', 'nonce');
    
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
    $posts_per_page = 9;
    
    $args = array(
        'post_type' => 'cases',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Если выбрана конкретная категория, добавляем фильтр
    if ($category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'case_type',
                'field' => 'slug',
                'terms' => $category,
            ),
        );
    }
    
    $cases_query = new WP_Query($args);
    
    $response = array(
        'success' => false,
        'posts' => array(),
        'max_pages' => $cases_query->max_num_pages,
    );
    
    if ($cases_query->have_posts()) {
        ob_start();
        
        while ($cases_query->have_posts()) {
            $cases_query->the_post();
            
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
        }
        
        $response['success'] = true;
        $response['html'] = ob_get_clean();
    }
    
    wp_reset_postdata();
    
    wp_send_json($response);
}

add_action('wp_ajax_load_more_cases', 'load_more_cases');
add_action('wp_ajax_nopriv_load_more_cases', 'load_more_cases');


/**
 * Ajax обработчик для фильтрации постов cases
 */
function filter_cases() {
    // Проверка nonce для безопасности
    check_ajax_referer('load_more_cases_nonce', 'nonce');
    
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
    $posts_per_page = 9;
    
    $args = array(
        'post_type' => 'cases',
        'posts_per_page' => $posts_per_page,
        'paged' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    // Если выбрана конкретная категория, добавляем фильтр
    if ($category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'case_type',
                'field' => 'slug',
                'terms' => $category,
            ),
        );
    }
    
    $cases_query = new WP_Query($args);
    
    $response = array(
        'success' => false,
        'posts' => array(),
        'max_pages' => $cases_query->max_num_pages,
    );
    
    if ($cases_query->have_posts()) {
        ob_start();
        
        while ($cases_query->have_posts()) {
            $cases_query->the_post();
            
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
        }
        
        $response['success'] = true;
        $response['html'] = ob_get_clean();
    }
    
    wp_reset_postdata();
    
    wp_send_json($response);
}

add_action('wp_ajax_filter_cases', 'filter_cases');
add_action('wp_ajax_nopriv_filter_cases', 'filter_cases');
