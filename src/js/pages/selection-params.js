/**
 * Калькулятор подбора услуги
 * Логика: каждый ответ добавляет +1 балл к определенной услуге
 */
export function initSelectionParams() {
  const paramButtons = document.querySelectorAll('.selection__param-btn');
  const resultButton = document.querySelector('.selection__result-btn');
  
  if (!paramButtons.length) return;

  // Баллы для каждой услуги
  const scores = {
    building: 0,
    scripting: 0,
    modeling: 0,
    animating: 0,
    graphic_design: 0,
    clothing: 0,
    interface: 0,
    sfx: 0,
    vfx: 0
  };

  // Хранилище выбранных ответов по вопросам
  const userAnswers = {};

  // Получаем все вопросы для валидации
  const allQuestions = new Set();
  paramButtons.forEach((button) => {
    const questionId = button.getAttribute('data-question');
    if (questionId !== null) {
      allQuestions.add(questionId);
    }
  });

  const totalQuestions = allQuestions.size;

  // Функция для проверки, все ли вопросы отвечены
  function validateSelection() {
    return Object.keys(userAnswers).length >= totalQuestions;
  }

  // Функция для обновления состояния кнопки результата
  function updateResultButton() {
    if (!resultButton) return;
    
    const isValid = validateSelection();
    
    if (isValid) {
      resultButton.disabled = false;
      resultButton.classList.remove('disabled');
    } else {
      resultButton.disabled = true;
      resultButton.classList.add('disabled');
    }
  }

  // Функция для получения результата
  function getResult() {
    // Находим услугу с максимальным количеством баллов
    const sortedServices = Object.entries(scores)
      .sort((a, b) => b[1] - a[1]);
    
    const winnerSlug = sortedServices[0][0];
    const winnerScore = sortedServices[0][1];

    // Получаем данные услуги из переданных PHP данных
    const servicesData = window.calcServicesData || {};
    const serviceInfo = servicesData[winnerSlug] || {
      name: winnerSlug,
      description: 'Описание услуги',
      link: '#'
    };

    return {
      slug: winnerSlug,
      score: winnerScore,
      name: serviceInfo.name,
      description: serviceInfo.description,
      link: serviceInfo.link,
      allScores: scores
    };
  }

  // Обработчик выбора ответа
  paramButtons.forEach((button) => {
    button.addEventListener('click', () => {
      const questionId = button.getAttribute('data-question');
      const serviceKey = button.getAttribute('data-service');
      
      // Находим все кнопки в том же вопросе
      const questionButtons = document.querySelectorAll(
        `.selection__param-btn[data-question="${questionId}"]`
      );
      
      // Если уже был выбран ответ на этот вопрос, убираем старый балл
      if (userAnswers[questionId]) {
        const previousService = userAnswers[questionId];
        if (scores[previousService] !== undefined) {
          scores[previousService]--;
        }
      }
      
      // Убираем активный класс со всех кнопок в вопросе
      questionButtons.forEach((btn) => {
        btn.classList.remove('active');
      });
      
      // Добавляем активный класс к текущей кнопке
      button.classList.add('active');
      
      // Сохраняем выбранный ответ
      userAnswers[questionId] = serviceKey;
      
      // Добавляем балл к услуге
      if (scores[serviceKey] !== undefined) {
        scores[serviceKey]++;
      }
      
      // Обновляем состояние кнопки результата
      updateResultButton();
      
      // Для отладки
      console.log('Баллы:', scores);
      console.log('Ответы:', userAnswers);
    });
  });

  // Обработчик для кнопки результата
  if (resultButton) {
    resultButton.addEventListener('click', (e) => {
      // Проверяем валидность перед открытием модалки
      if (!validateSelection()) {
        e.preventDefault();
        e.stopPropagation();
        
        // Показываем уведомление
        alert('Пожалуйста, ответьте на все вопросы');
        return false;
      }

      // Получаем результат
      const result = getResult();
      
      // Обновляем модалку с информацией об услуге
      updateResultModal(result);
      
      console.log('Результат:', result);
    });

    // Инициализация: кнопка должна быть отключена изначально
    updateResultButton();
  }
}

/**
 * Обновляет содержимое модального окна с результатом
 */
function updateResultModal(result) {
  const titleElement = document.getElementById('selectionResultTitle');
  const descriptionElement = document.getElementById('selectionResultDescription');
  const linkElement = document.getElementById('selectionResultLink');
  
  if (titleElement) {
    titleElement.textContent = result.name;
  }
  
  if (descriptionElement) {
    descriptionElement.textContent = result.description || 'Эта услуга идеально подходит для ваших задач.';
  }
  
  if (linkElement && result.link) {
    linkElement.href = result.link;
    // Скрываем кнопку "Подробнее" если нет ссылки
    if (!result.link || result.link === '#') {
      linkElement.style.display = 'none';
    } else {
      linkElement.style.display = 'inline-flex';
    }
  }
}
