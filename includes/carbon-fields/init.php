<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'erco_load_carbon_fields');
function erco_load_carbon_fields() {
    require_once(THEME_DIR . '/vendor/autoload.php');

    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'erco_register_custom_fields');
function erco_register_custom_fields() {
    require_once THEME_DIR . '/includes/carbon-fields/theme-options.php';
    require_once THEME_DIR . '/includes/carbon-fields/post-meta.php';
}
