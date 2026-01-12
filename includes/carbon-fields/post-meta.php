<?php

if (!defined('ABSPATH')) {
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', __('Информация об услуге', 'ercogroup-theme'))
    ->show_on_page(8)
    ->add_tab('Первый блок', [
        Field::make('text', 'upper_title', 'Текст над заголовком'),
        Field::make('text', 'title', 'Заголовок')->set_help_text('Чтобы выделить слово, оберните его в тег &lt;span&gt;{слово}&lt;/span&gt;'),
        Field::make('text', 'subtitle', 'Подзаголовок'),
        Field::make('complex', 'projects_cards', 'Карточки проектов')
        ->add_fields([
            Field::make('image', 'card', 'Карточка')
        ]),
    ])
    ->add_tab('Блок со статистикой', [
        Field::make('text', 'stats_title', 'Заголовок'),
        Field::make('complex', 'stats_list', 'Пункты статистики')
        ->add_fields([
            Field::make('image', 'image', 'Изображение')->set_width(33),
            Field::make('text', 'title', 'Заголовок')->set_width(33),
            Field::make('text', 'descr', 'Описание')->set_width(33),
        ])->set_max(4),
    ])
    ->add_tab('Игры, которые сделали', [
        Field::make('text', 'made_title', 'Заголовок'),
        
        // Левая колонка
        Field::make('separator', 'made_separator_left', 'Левая колонка (2 карточки)'),
        Field::make('image', 'made_card_1_image', 'Изображение')->set_width(50),
        Field::make('text', 'made_card_1_title', 'Название')->set_width(50),
        
        Field::make('image', 'made_card_4_image', ' Изображение')->set_width(50),
        Field::make('text', 'made_card_4_title', 'Название')->set_width(50),
        
        // Центральная колонка
        Field::make('separator', 'made_separator_center', 'Центральная колонка (2 карточки)'),
        Field::make('image', 'made_card_2_image', 'Изображение')->set_width(50),
        Field::make('text', 'made_card_2_title', 'Название')->set_width(50),
        
        Field::make('image', 'made_card_6_image', 'Изображение')->set_width(50),
        Field::make('text', 'made_card_6_title', 'Название')->set_width(50),
        
        // Правая колонка
        Field::make('separator', 'made_separator_right', 'Правая колонка (3 карточки)'),
        Field::make('image', 'made_card_3_image', 'Изображение')->set_width(50),
        Field::make('text', 'made_card_3_title', 'Название')->set_width(50),
        
        Field::make('image', 'made_card_5_image', 'Изображение')->set_width(50),
        Field::make('text', 'made_card_5_title', 'Название')->set_width(50),
        
        Field::make('image', 'made_card_7_image', 'Изображение')->set_width(50),
        Field::make('text', 'made_card_7_title', 'Название')->set_width(50),
    ])
    ->add_tab('Про нас', [
        Field::make('image', 'about_image', 'Изображение'),
        Field::make('text', 'about_title', 'Заголовок')->set_width(33),
        Field::make('textarea', 'about_paragraph_1', 'Текст – абзац 1')->set_width(33),
        Field::make('textarea', 'about_paragraph_2', 'Текст – абзац 2')->set_width(33),
        Field::make('complex', 'about_list', 'Пункты статистики')
        ->add_fields([
            Field::make('text', 'title', 'Заголовок')->set_width(50),
            Field::make('text', 'descr', 'Описание')->set_width(50),
        ])->set_max(3),
        Field::make('complex', 'about_avatars', 'Аватары')
        ->add_fields([
            Field::make('image', 'avatar', 'Аватар')->set_width(50),
        ])
        ->set_width(50)
        ->set_max(4),
        Field::make('text', 'about_count', 'Количество сотрудников')
        ->set_help_text('Выводится рядом с аватарами в верхней части блока')
        ->set_width(50),
    ]);

Container::make('post_meta', __('Информация об услуге', 'ercogroup-theme'))
    ->show_on_page(47)
    ->add_tab('Интро', [
        Field::make('text', 'services_title', 'Заголовок'),
        Field::make('textarea', 'services_subtitle', 'Подзаголовок'),
        Field::make('text', 'services_price', 'Строка с ценой'),
        Field::make('text', 'services_btn', 'Текст кнопки'),
    ])
    ->add_tab('Процесс разработки', [
        Field::make('text', 'process_title', 'Заголовок'),
        Field::make('complex', 'process_list', '3 этапа разработки')
        ->add_fields([
            Field::make('text', 'title', 'Заголовок')->set_width(33),
            Field::make('text', 'descr', 'Описание')->set_width(33),
            Field::make('image', 'icon', 'Иконка')->set_width(33),
        ])->set_max(3),
    ]);


Container::make('post_meta', 'Дополнительные поля')
->show_on_post_type('team')
->add_fields([
    Field::make('text', 'role', 'Позиция'),
    Field::make('image', 'photo', 'Фото'),
    Field::make('textarea', 'descr', 'Описание')
]);

Container::make('post_meta', 'Дополнительные поля')
->show_on_post_type('reviews')
->add_fields([
    Field::make('textarea', 'review_text', 'Текст отзыва'),
    Field::make('image', 'photo', 'Фото автора'),
    Field::make('text', 'name', 'Имя сотрудника'),
    Field::make('text', 'company', 'Название компании')
]);

Container::make('post_meta', 'Дополнительные поля')
->show_on_post_type('services')
->add_tab('Карточка', [
    Field::make('text', 'service_exceprt', 'Краткое описание'),
    Field::make('image', 'service_preview_img', 'Изображение'),
])
->add_tab('Внутренняя страница', [
    Field::make('image', 'service_inner_img', 'Изображение'),
])
->add_tab('Общее', [
    Field::make('text', 'service_price', 'Цена'),
]);

Container::make('post_meta', 'Дополнительные поля')
->show_on_post_type('cases')
// ->add_tab('Карточка', [
//     Field::make('text', 'service_exceprt', 'Краткое описание'),
//     Field::make('image', 'service_preview_img', 'Изображение'),
// ])
->add_tab('Первый блок', [
    Field::make('image', 'case_poster', 'Обложка видео')->set_width(50),
    Field::make( 'file', 'case_video', 'Видео' )
    ->set_type( 'video' )
    ->set_width(50),
]);
// ->add_tab('Общее', [
//     Field::make('text', 'service_price', 'Цена'),
// ]);