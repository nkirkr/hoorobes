<?php


add_action('init', 'create_global_variable');
function create_global_variable() {
    global $contacts;

    $contacts = [
        'discord' => carbon_get_theme_option('site_discord'),
        'tg' => carbon_get_theme_option('site_tg'),
    ];
}