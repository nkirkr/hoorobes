<?php

// Защита от прямого доступа
if (!defined('ABSPATH')) {
    exit;
}


function erco_register_post_types() {
    
    register_post_type('team', array(
        'labels' => array(
            'name'               => 'Команда',
            'singular_name'      => 'Сотрудник',
            'add_new'            => 'Добавить сотрудника',
            'add_new_item'       => 'Добавить нового сотрудника',
            'edit_item'          => 'Редактировать сотрудника',
            'new_item'           => 'Новый сотрудник',
            'view_item'          => 'Просмотреть сотрудника',
            'search_items'       => 'Искать сотрудников',
            'not_found'          => 'Сотрудники не найдены',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-admin-users',
        'supports'     => array('title'),
        'rewrite'      => array('slug' => 'komanda'),
        'show_in_rest' => true,
    ));

    register_post_type('reviews', array(
        'labels' => array(
            'name'               => 'Отзывы',
            'singular_name'      => 'Отзыв',
            'add_new'            => 'Добавить отзыв',
            'add_new_item'       => 'Добавить новый отзыв',
            'edit_item'          => 'Редактировать отзыв',
            'new_item'           => 'Новый отзыв',
            'view_item'          => 'Просмотреть отзыв',
            'search_items'       => 'Искать отзывы',
            'not_found'          => 'Отзывы не найдены',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-admin-comments',
        'supports'     => array('title'),
        'rewrite'      => array('slug' => 'otzyvy'),
        'show_in_rest' => true,
    ));

    register_post_type('services', array(
        'labels' => array(
            'name'               => 'Услуги',
            'singular_name'      => 'Услуга',
            'add_new'            => 'Добавить услугу',
            'add_new_item'       => 'Добавить новую услугу',
            'edit_item'          => 'Редактировать услугу',
            'new_item'           => 'Новая услуга',
            'view_item'          => 'Просмотреть услугу',
            'search_items'       => 'Искать услуги',
            'not_found'          => 'Услуги не найдены',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-hammer',
        'supports'     => array('title'),
        'rewrite'      => array('slug' => 'uslugi'),
        'show_in_rest' => true,
    ));
    
}
add_action('init', 'erco_register_post_types');


function erco_register_taxonomies() {
    
    // Пример: Категории услуг
    register_taxonomy('service_category', 'services', array(
        'labels' => array(
            'name'          => 'Категории услуг',
            'singular_name' => 'Категория услуг',
        ),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'service-category'),
        'show_in_rest'      => true,
    ));
    
}
add_action('init', 'erco_register_taxonomies');

