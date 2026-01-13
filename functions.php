<?php
/**
 * ERCO GROUP Theme Functions
 * 
 * @package ERCO_GROUP
 * @since 1.0.0
 */

// Защита от прямого доступа
if (!defined('ABSPATH')) {
    exit;
}

define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

require_once THEME_DIR . '/includes/carbon-fields/init.php';
require_once THEME_DIR . '/includes/enqueue.php';
require_once THEME_DIR . '/includes/custom-post-types.php';
require_once THEME_DIR . '/includes/globals.php';
require_once THEME_DIR . '/includes/ajax-handlers.php';

add_action('after_setup_theme', 'roblox_theme_setup');

function roblox_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}

