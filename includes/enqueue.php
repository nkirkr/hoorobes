<?php

if (!defined('ABSPATH')) {
    exit;
}

function roblox_enqueue_scripts() {
    wp_enqueue_style(
        'roblox-styles',
        THEME_URI . '/build/css/main.css',
        array(),
        null
    );
    
    wp_enqueue_script(
        'roblox-script',
        THEME_URI . '/build/js/index.bundle.js',
        array(),
        null,
        true
    );

    wp_localize_script('roblox-script', 'themeData', array(
        'themeUrl' => get_template_directory_uri()
    ));
}
add_action('wp_enqueue_scripts', 'roblox_enqueue_scripts');
