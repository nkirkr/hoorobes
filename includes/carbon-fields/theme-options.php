<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;


Container::make('theme_options', __('Общие настройки', 'ercogroup-theme'))
    ->add_tab(__('Контакты', 'ercogroup-theme'), array(
        Field::make('image', 'site_logo', 'Лого в шапке')
    ));



