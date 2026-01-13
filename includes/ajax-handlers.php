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


/**
 * Ajax обработчик для отправки брифа на email
 */
/**
 * Ajax обработчик для отправки брифа на email
 */
function submit_brief_form() {
    // Проверка nonce для безопасности
    check_ajax_referer('load_more_cases_nonce', 'nonce');
    
    // Получаем данные из POST запроса
    $service = isset($_POST['service']) ? sanitize_text_field($_POST['service']) : '';
    $project_description = isset($_POST['project_description']) ? sanitize_textarea_field($_POST['project_description']) : '';
    $style = isset($_POST['style']) ? sanitize_text_field($_POST['style']) : '';
    $client_name = isset($_POST['client_name']) ? sanitize_text_field($_POST['client_name']) : '';
    $client_email = isset($_POST['client_email']) ? sanitize_email($_POST['client_email']) : '';
    $contact_method = isset($_POST['contact_method']) ? sanitize_text_field($_POST['contact_method']) : '';
    $client_message = isset($_POST['client_message']) ? sanitize_textarea_field($_POST['client_message']) : '';
    
    // Получаем email получателя из настроек темы
    $to_email = carbon_get_theme_option('site_email');
    
    if (empty($to_email)) {
        $to_email = get_option('admin_email'); // Используем email админа, если не указан
    }
    
    // Формируем тему письма
    $subject = 'Новая заявка с сайта: ' . get_bloginfo('name');
    
    // Формируем тело письма
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
    
    // Заголовки письма
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <noreply@' . parse_url(home_url(), PHP_URL_HOST) . '>',
        'Reply-To: ' . $client_name . ' <' . $client_email . '>'
    );
    
    // Сохраняем данные в опции WordPress (как резервную копию)
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
    
    // Получаем существующие заявки
    $all_briefs = get_option('brief_submissions', array());
    $all_briefs[] = $brief_data;
    update_option('brief_submissions', $all_briefs);
    
    // Пытаемся отправить письмо
    $sent = wp_mail($to_email, $subject, $message, $headers);
    
    // Логируем для отладки
    if (!$sent) {
        error_log('Brief form submission - Email failed to send to: ' . $to_email);
        error_log('Brief form submission - Data saved to database');
    }
    
    // Всегда возвращаем успех, так как данные сохранены в БД
    wp_send_json_success(array(
        'message' => 'Заявка успешно отправлена',
        'email_sent' => $sent,
        'saved_to_db' => true
    ));
}

add_action('wp_ajax_submit_brief_form', 'submit_brief_form');
add_action('wp_ajax_nopriv_submit_brief_form', 'submit_brief_form');

add_action('wp_ajax_submit_brief_form', 'submit_brief_form');
add_action('wp_ajax_nopriv_submit_brief_form', 'submit_brief_form');
