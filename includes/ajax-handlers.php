<?php

if (!defined('ABSPATH')) {
    exit;
}

function load_more_cases() {
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
            
            $terms = get_the_terms(get_the_ID(), 'case_type');
            $category_slug = '';
            if ($terms && !is_wp_error($terms)) {
                $category_slug = $terms[0]->slug;
            }
            
            $thumbnail_url = wp_get_attachment_url(carbon_get_the_post_meta('case_preview_img'));
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


function filter_cases() {
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
            
            $terms = get_the_terms(get_the_ID(), 'case_type');
            $category_slug = '';
            if ($terms && !is_wp_error($terms)) {
                $category_slug = $terms[0]->slug;
            }
            
            $thumbnail_url = wp_get_attachment_url(carbon_get_the_post_meta('case_preview_img'));
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



function submit_brief_form() {
    check_ajax_referer('load_more_cases_nonce', 'nonce');
    
    $service = isset($_POST['service']) ? sanitize_text_field($_POST['service']) : '';
    $project_description = isset($_POST['project_description']) ? sanitize_textarea_field($_POST['project_description']) : '';
    $style = isset($_POST['style']) ? sanitize_text_field($_POST['style']) : '';
    $client_name = isset($_POST['client_name']) ? sanitize_text_field($_POST['client_name']) : '';
    $client_email = isset($_POST['client_email']) ? sanitize_email($_POST['client_email']) : '';
    $contact_method = isset($_POST['contact_method']) ? sanitize_text_field($_POST['contact_method']) : '';
    $client_message = isset($_POST['client_message']) ? sanitize_textarea_field($_POST['client_message']) : '';
    
    $to_email = carbon_get_theme_option('site_email');
    
    if (empty($to_email)) {
        $to_email = get_option('admin_email'); 
    }
    
    $subject = 'Новая заявка с сайта: ' . get_bloginfo('name');
    
    $message = "Получена новая заявка с сайта\n\n";
    $message .= "===== ИНФОРМАЦИЯ О КЛИЕНТЕ =====\n";
    $message .= "Имя: " . $client_name . "\n";
    $message .= "Email: " . $client_email . "\n";
    $message .= "Предпочитаемый способ связи: " . $contact_method . "\n\n";
    
    $message .= "===== ДЕТАЛИ ПРОЕКТА =====\n";
    if (!empty($service)) {
        $message .= "Интересующая услуга: " . $service . "\n";
    }
    if (!empty($project_description)) {
        $message .= "Описание проекта: " . $project_description . "\n";
    }
    if (!empty($style)) {
        $message .= "Выбранный стиль: " . $style . "\n";
    }
    if (!empty($client_message)) {
        $message .= "\nСообщение от клиента:\n" . $client_message . "\n";
    }
    
    $message .= "\n===== ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ =====\n";
    $message .= "Дата отправки: " . date('d.m.Y H:i:s') . "\n";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <noreply@' . parse_url(home_url(), PHP_URL_HOST) . '>',
        'Reply-To: ' . $client_name . ' <' . $client_email . '>'
    );
    
    $brief_data = array(
        'date' => current_time('mysql'),
        'service' => $service,
        'project_description' => $project_description,
        'style' => $style,
        'client_name' => $client_name,
        'client_email' => $client_email,
        'contact_method' => $contact_method,
        'client_message' => $client_message,
        'ip' => $_SERVER['REMOTE_ADDR']
    );
    

    $all_briefs = get_option('brief_submissions', array());
    $all_briefs[] = $brief_data;
    update_option('brief_submissions', $all_briefs);
    
    $sent = wp_mail($to_email, $subject, $message, $headers);
    
    if (!$sent) {
        error_log('Brief form submission - Email failed to send to: ' . $to_email);
        error_log('Brief form submission - Data saved to database');
    }
    
    wp_send_json_success(array(
        'message' => 'Заявка успешно отправлена',
        'email_sent' => $sent,
        'saved_to_db' => true
    ));
}

add_action('wp_ajax_submit_brief_form', 'submit_brief_form');
add_action('wp_ajax_nopriv_submit_brief_form', 'submit_brief_form');


function load_more_service_games() {
    check_ajax_referer('load_more_cases_nonce', 'nonce');
    
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 6;
    
    $args = array(
        'post_type' => 'cases',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
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
        }
        
        $response['success'] = true;
        $response['html'] = ob_get_clean();
    }
    
    wp_reset_postdata();
    
    wp_send_json($response);
}

add_action('wp_ajax_load_more_service_games', 'load_more_service_games');
add_action('wp_ajax_nopriv_load_more_service_games', 'load_more_service_games');
