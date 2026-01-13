<!-- Модальное окно брифа -->
<div class="modal" id="briefModal" aria-hidden="true">
  <!-- Overlay (фон с размытием) -->
  <div class="modal__overlay" data-modal-close></div>

  <!-- Модальное окно -->
  <div class="modal__container">
    <!-- Декоративное свечение -->
    <div class="modal__glow"></div>
    <div class="modal__glow modal__glow--secondary"></div>

    <!-- Кнопка закрытия -->
    <button
      class="modal__close"
      data-modal-close
      aria-label="Закрыть модальное окно"
    >
      <span class="modal__close-icon">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/cross.svg' ); ?>" alt="Закрыть" />
      </span>
    </button>

    <!-- Слайдер -->
    <form id="briefForm" class="modal__form-brief">
    <div class="modal__slider">
      <!-- Слайд 1: Приветствие -->
      <div class="modal__slide modal__slide--active" data-slide="1">
        <div class="modal__content">
          <!-- Левая часть - текст и кнопка -->
          <div class="modal__left">
            <h2 class="modal__title">
              <?php echo esc_html(carbon_get_theme_option('brief_welcome_title')); ?>
            </h2>
            <button
              type="button"
              class="modal__button modal__button--start"
              aria-label="Начать заполнение брифа"
            >
              <?php echo esc_html(carbon_get_theme_option('brief_welcome_button')); ?>
            </button>
          </div>

          <!-- Правая часть - изображение -->
          <div class="modal__right">
            <img
              src="<?php echo esc_url( get_template_directory_uri() . '/build/img/modal/main.png' ); ?>"
              alt="Иллюстрация"
              class="modal__image"
            />
          </div>
        </div>
      </div>

      <!-- Слайд 2: Вопрос 1 -->
      <div class="modal__slide" data-slide="2">
        <div class="modal__content">
          <!-- Изображение справа -->
          <div class="modal__image-right">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/modal/main.png' ); ?>" alt="Иллюстрация" />
          </div>

          <!-- Заголовок с иконкой -->
          <div class="modal__header">
            <h2 class="modal__question-title"><?php echo esc_html(carbon_get_theme_option('brief_q1_title')); ?></h2>
            <button type="button" class="modal__help" aria-label="Помощь" title="Помощь">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/help.svg' ); ?>" alt="?" />
            </button>
          </div>

          <!-- Grid кнопок выбора -->
          <div class="modal__options">
            <?php 
            $q1_options = carbon_get_theme_option('brief_q1_options');
            if (!empty($q1_options)) :
                foreach ($q1_options as $option) : ?>
                    <button type="button" class="modal__option" data-option="<?php echo esc_attr($option['slug']); ?>">
                        <?php echo esc_html($option['label']); ?>
                    </button>
                <?php endforeach;
            endif;
            ?>
          </div>

          <!-- Прогресс-бар и навигация -->
          <div class="modal__footer">
            <div class="modal__progress">
              <div class="modal__progress-info">
                <span class="modal__progress-text">Готово: 20%</span>
                <span class="modal__progress-step">Первый вопрос</span>
              </div>
              <div class="modal__progress-bar">
                <div class="modal__progress-fill" style="width: 20%"></div>
              </div>
            </div>

            <div class="modal__navigation">
              <button type="button" class="modal__nav-button modal__nav-button--back">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/back.svg' ); ?>" alt="Назад" />
              </button>
              <button
                type="button"
                class="modal__nav-button modal__nav-button--next"
                disabled
              >
                Далее
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Слайд 3: Вопрос 2 -->
      <div class="modal__slide" data-slide="3">
        <div class="modal__content">
          <!-- Изображение справа -->
          <div class="modal__image-right">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/modal/main.png' ); ?>" alt="Иллюстрация" />
          </div>

          <!-- Заголовок с иконкой -->
          <div class="modal__header">
            <h2 class="modal__question-title"><?php echo esc_html(carbon_get_theme_option('brief_q2_title')); ?></h2>
            <button type="button" class="modal__help" aria-label="Помощь" title="Помощь">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/help.svg' ); ?>" alt="?" />
            </button>
          </div>

          <!-- Textarea для текста -->
          <div class="modal__textarea-wrapper">
            <textarea
              name="project_description"
              class="modal__textarea"
              placeholder="<?php echo esc_attr(carbon_get_theme_option('brief_q2_placeholder')); ?>"
              rows="10"
            ></textarea>
          </div>

          <!-- Прогресс-бар и навигация -->
          <div class="modal__footer">
            <div class="modal__progress">
              <div class="modal__progress-info">
                <span class="modal__progress-text">Готово: 40%</span>
                <span class="modal__progress-step">Второй вопрос</span>
              </div>
              <div class="modal__progress-bar">
                <div class="modal__progress-fill" style="width: 50%"></div>
              </div>
            </div>

            <div class="modal__navigation">
              <button type="button" class="modal__nav-button modal__nav-button--back">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/back.svg' ); ?>" alt="Назад" />
              </button>
              <button
                type="button"
                class="modal__nav-button modal__nav-button--next"
                disabled
              >
                Далее
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Слайд 4: Вопрос 3 -->
      <div class="modal__slide" data-slide="4">
        <div class="modal__content">
          <!-- Изображение справа -->
          <div class="modal__image-right">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/modal/main.png' ); ?>" alt="Иллюстрация" />
          </div>

          <!-- Заголовок с иконкой -->
          <div class="modal__header">
            <h2 class="modal__question-title"><?php echo esc_html(carbon_get_theme_option('brief_q3_title')); ?></h2>
            <button type="button" class="modal__help" aria-label="Помощь" title="Помощь">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/help.svg' ); ?>" alt="?" />
            </button>
          </div>

          <!-- Список radio опций -->
          <div class="modal__radio-options">
            <?php 
            $q3_options = carbon_get_theme_option('brief_q3_options');
            if (!empty($q3_options)) :
                foreach ($q3_options as $option) : ?>
                    <label class="modal__radio-option">
                      <input type="radio" name="style" value="<?php echo esc_attr($option['label']); ?>" class="modal__radio-input" />
                      <span class="modal__radio-button">
                        <span class="modal__radio-text"><?php echo esc_html($option['label']); ?></span>
                        <span class="modal__radio-circle"></span>
                      </span>
                    </label>
                <?php endforeach;
            endif;
            ?>
          </div>

          <!-- Прогресс-бар и навигация -->
          <div class="modal__footer">
            <div class="modal__progress">
              <div class="modal__progress-info">
                <span class="modal__progress-text">Готово: 60%</span>
                <span class="modal__progress-step">Третий вопрос</span>
              </div>
              <div class="modal__progress-bar">
                <div class="modal__progress-fill" style="width: 60%"></div>
              </div>
            </div>

            <div class="modal__navigation">
              <button type="button" class="modal__nav-button modal__nav-button--back">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/back.svg' ); ?>" alt="Назад" />
              </button>
              <button
                type="button"
                class="modal__nav-button modal__nav-button--next"
                disabled
              >
                Далее
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Слайд 5: Вопрос 4 - Контактная информация -->
      <div class="modal__slide" data-slide="5">
        <div class="modal__content">
          <!-- Изображение справа -->
          <div class="modal__image-right">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/modal/main.png' ); ?>" alt="Иллюстрация" />
          </div>

          <!-- Заголовок с иконкой -->
          <div class="modal__header">
            <h2 class="modal__question-title"><?php echo esc_html(carbon_get_theme_option('brief_q4_title')); ?></h2>
            <button type="button" class="modal__help" aria-label="Помощь" title="Помощь">
              <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/help.svg' ); ?>" alt="?" />
            </button>
          </div>

          <!-- Форма контактов -->
          <div class="modal__form">
            <div class="modal__form-fields">
              <input
                type="text"
                name="client_name"
                class="modal__input"
                placeholder="<?php echo esc_attr(carbon_get_theme_option('brief_q4_name_placeholder')); ?>"
                data-name-input
                required
              />
              <input
                type="email"
                name="client_email"
                class="modal__input"
                placeholder="<?php echo esc_attr(carbon_get_theme_option('brief_q4_email_placeholder')); ?>"
                data-email-input
                required
              />
            </div>

            <div class="modal__contact-methods">
              <label class="modal__contact-method">
                <input type="radio" name="contact_method" value="email" checked />
                <span class="modal__contact-label">Email</span>
              </label>
              <label class="modal__contact-method">
                <input type="radio" name="contact_method" value="telegram" />
                <span class="modal__contact-label">Telegram</span>
              </label>
              <label class="modal__contact-method">
                <input type="radio" name="contact_method" value="whatsapp" />
                <span class="modal__contact-label">Whatsapp</span>
              </label>
            </div>

            <textarea
              name="client_message"
              class="modal__textarea modal__textarea--large"
              placeholder="<?php echo esc_attr(carbon_get_theme_option('brief_q4_message_placeholder')); ?>"
              rows="6"
              data-message-input
            ></textarea>
          </div>

          <!-- Прогресс-бар и навигация -->
          <div class="modal__footer">
            <div class="modal__progress">
              <div class="modal__progress-info">
                <span class="modal__progress-text">Готово: 99%</span>
                <span class="modal__progress-step">Завершение</span>
              </div>
              <div class="modal__progress-bar">
                <div class="modal__progress-fill" style="width: 99%"></div>
              </div>
            </div>

            <div class="modal__navigation">
              <button class="modal__nav-button modal__nav-button--back">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/back.svg' ); ?>" alt="Назад" />
              </button>
              <button
                type="submit"
                class="modal__nav-button modal__nav-button--submit"
                disabled
              >
                Отправить
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Слайд 6: Завершение -->
      <div class="modal__slide" data-slide="6">
        <div class="modal__content modal__content--success">
          <div class="modal__left modal__left--success">
            <h2 class="modal__title modal__title--success">
              <?php echo esc_html(carbon_get_theme_option('brief_success_title')); ?>
            </h2>
            <p class="modal__description">
              <?php echo esc_html(carbon_get_theme_option('brief_success_description')); ?>
            </p>
            <div class="modal__social">
              <a
                href="<?php echo esc_url($GLOBALS['contacts']['tg']); ?>"
                class="modal__social-link"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Telegram"
              >
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/tg.svg' ); ?>" alt="Telegram" />
              </a>
              <a
                href="<?php echo esc_url($GLOBALS['contacts']['discord']); ?>"
                class="modal__social-link"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Discord"
              >
                <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/discord.svg' ); ?>" alt="Discord" />
              </a>
            </div>
          </div>
          <div class="modal__right modal__right--success">
            <img
              src="<?php echo esc_url( get_template_directory_uri() . '/build/img/modal/main.png' ); ?>"
              alt="Иллюстрация"
              class="modal__image modal__image--success"
            />
          </div>
        </div>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Тултип помощи (вне модалки) -->
<div class="modal__tooltip-wrapper" id="helpTooltip">
  <div class="modal__tooltip-overlay"></div>
  <div class="modal__tooltip">
    <button class="modal__tooltip-close" aria-label="Закрыть подсказку">
      <img src="<?php echo esc_url( get_template_directory_uri() . '/build/img/svgicons/modal/cross.svg' ); ?>" alt="Закрыть" />
    </button>
    <p class="modal__tooltip-text">
      Вы можете ознакомится<br />
      с информацией об услугах здесь
    </p>
    <a href="./services.html" class="modal__tooltip-button">
      Перейти
    </a>
  </div>
</div>
