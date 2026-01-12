<?php

if (!defined('ABSPATH')) {
    exit;
}


function roblox_register_post_types() {
    
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
        'rewrite'      => array('slug' => 'team'),
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
        'rewrite'      => array('slug' => 'reviews'),
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
        'rewrite'      => array('slug' => 'services'),
        'show_in_rest' => true,
    ));

    register_post_type('cases', array(
        'labels' => array(
            'name'               => 'Кейсы',
            'singular_name'      => 'Кейс',
            'add_new'            => 'Добавить кейс',
            'add_new_item'       => 'Добавить новый кейс',
            'edit_item'          => 'Редактировать кейс',
            'new_item'           => 'Новый кейс',
            'view_item'          => 'Просмотреть кейс',
            'search_items'       => 'Искать кейсы',
            'not_found'          => 'Кейсы не найдены',
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-portfolio',
        'supports'     => array('title'),
        'rewrite'      => array('slug' => 'portfolio'),
        'show_in_rest' => true,
    ));
    
}
add_action('init', 'roblox_register_post_types');


function roblox_register_taxonomies() {
    
    register_taxonomy('case_type', 'cases', array(
        'labels' => array(
            'name'          => 'Категории игр',
            'singular_name' => 'Категория игр',
        ),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'rewrite'           => array('slug' => 'case-category'),
        'show_in_rest'      => true,
    ));
    
}
add_action('init', 'roblox_register_taxonomies');

