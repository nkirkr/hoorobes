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
        Field::make('text', 'site_tg', 'Telegram'),
        Field::make('text', 'site_email', 'Почта для отправки заявок')
    ])
    ->add_tab('Документы', [
        Field::make('file', 'policy', 'Политика обработки персональных данных')
            ->set_value_type('url'),
        Field::make('file', 'obrabotka', 'Согласие на обработку персональных данных')
            ->set_value_type('url'),
    ])
    ->add_tab('Бриф', [
        Field::make('text', 'brief_welcome_title', 'Заголовок приветствия')
            ->set_default_value('Заполним небольшой бриф перед началом'),
        
        Field::make('text', 'brief_welcome_button', 'Текст кнопки "Начать"')
            ->set_default_value('Начать'),

        Field::make('text', 'brief_q1_title', 'Вопрос 1: Заголовок')
            ->set_default_value('Какая услуга вас интересует?'),
        
        Field::make('complex', 'brief_q1_options', 'Вопрос 1: Варианты ответов')
            ->add_fields([
                Field::make('text', 'label', 'Название опции'),
                Field::make('text', 'slug', 'Значение (латиницей)'),
            ])
            ->set_default_value([
                ['label' => 'Разработка игры', 'slug' => 'game'],
                ['label' => 'Дизайн', 'slug' => 'design'],
                ['label' => 'Анимация', 'slug' => 'animation'],
                ['label' => '3D моделирование', 'slug' => 'modeling'],
                ['label' => 'Консультация', 'slug' => 'consulting'],
                ['label' => 'Поддержка', 'slug' => 'support'],
                ['label' => 'Маркетинг', 'slug' => 'marketing'],
                ['label' => 'Звук', 'slug' => 'sound'],
                ['label' => 'Сюжет', 'slug' => 'story'],
                ['label' => 'Оптимизация', 'slug' => 'optimization'],
                ['label' => 'Тестирование', 'slug' => 'testing'],
                ['label' => 'Другое', 'slug' => 'other'],
            ]),

        Field::make('text', 'brief_q2_title', 'Вопрос 2: Заголовок')
            ->set_default_value('Опишите ваш проект'),
        
        Field::make('text', 'brief_q2_placeholder', 'Вопрос 2: Placeholder')
            ->set_default_value('Напишите сообщение'),

        Field::make('text', 'brief_q3_title', 'Вопрос 3: Заголовок')
            ->set_default_value('Выберите стиль'),
        
        Field::make('complex', 'brief_q3_options', 'Вопрос 3: Варианты ответов')
            ->add_fields([
                Field::make('text', 'label', 'Название опции'),
            ])
            ->set_default_value([
                ['label' => 'Реалистичный'],
                ['label' => 'Мультяшный'],
                ['label' => 'Пиксельный'],
                ['label' => 'Минималистичный'],
                ['label' => 'Другой'],
            ]),

        Field::make('text', 'brief_q4_title', 'Вопрос 4: Заголовок')
            ->set_default_value('Остался последний шаг'),
        
        Field::make('text', 'brief_q4_name_placeholder', 'Placeholder для имени')
            ->set_default_value('Имя'),
        
        Field::make('text', 'brief_q4_email_placeholder', 'Placeholder для email')
            ->set_default_value('Email'),
        
        Field::make('text', 'brief_q4_message_placeholder', 'Placeholder для сообщения')
            ->set_default_value('Напишите сообщение'),

        Field::make('text', 'brief_success_title', 'Заголовок успешной отправки')
            ->set_default_value('Ваша заявка отправлена'),
        
        Field::make('textarea', 'brief_success_description', 'Описание успешной отправки')
            ->set_default_value('Мы с вами свяжемся в течении 20 минут. Если у вас остались вопросы, то напишите нам в удобной для вам мессенджер'),
    ])
    // В theme-options.php добавляем вкладку "Калькулятор"

->add_tab('Подбор услуги – Услуги', [
    // Список услуг, к которым привязываются баллы
    Field::make('complex', 'calc_services', 'Услуги калькулятора')
        ->add_fields([
            Field::make('text', 'name', 'Название услуги (для отображения)'),
            Field::make('text', 'slug', 'Ключ (латиницей)'),
        ])
        ->set_default_value([
            ['name' => 'Building', 'slug' => 'building'],
            ['name' => 'Scripting', 'slug' => 'scripting'],
            ['name' => 'Modeling', 'slug' => 'modeling'],
            ['name' => 'Animating', 'slug' => 'animating'],
            ['name' => 'Graphic Design', 'slug' => 'graphic_design'],
            ['name' => 'Clothing & Accessories', 'slug' => 'clothing'],
            ['name' => 'Interface', 'slug' => 'interface'],
            ['name' => 'SFX', 'slug' => 'sfx'],
            ['name' => 'VFX', 'slug' => 'vfx'],
        ])
])
    ->add_tab('Подбор услуги – Вопросы', [
        Field::make('complex', 'calc_questions', 'Вопросы')
            ->add_fields([
                Field::make('text', 'question', 'Текст вопроса'),
                Field::make('complex', 'answers', 'Варианты ответов')
                    ->add_fields([
                        Field::make('text', 'text', 'Текст ответа'),
                        Field::make('select', 'service', 'Услуга (+1 балл)')
                            ->set_options([
                                'building' => 'Building',
                                'scripting' => 'Scripting',
                                'modeling' => 'Modeling',
                                'animating' => 'Animating',
                                'graphic_design' => 'Graphic Design',
                                'clothing' => 'Clothing & Accessories',
                                'interface' => 'Interface',
                                'sfx' => 'SFX',
                                'vfx' => 'VFX',
                            ])
                    ])
            ])
    ]);



