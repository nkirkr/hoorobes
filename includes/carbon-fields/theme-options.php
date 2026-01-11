<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('theme_options', __('Общие настройки', 'ercogroup-theme'))
    ->add_tab('Лого', [
        Field::make('image', 'site_logo', 'Лого в шапке')
    ])
    ->add_tab('Контакты', [
        Field::make('text', 'site_discord', 'Discord'),
        Field::make('text', 'site_tg', 'Telegram')
    ]);



