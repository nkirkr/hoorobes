export function initServiceGamesLoadMore() {
  const loadMoreBtn = document.querySelector('.service-games__load-more');
  const gamesGrid = document.querySelector('.service-games__grid');

  if (!loadMoreBtn || !gamesGrid) return;

  let currentPage = parseInt(loadMoreBtn.getAttribute('data-page')) || 1;
  let maxPages = parseInt(loadMoreBtn.getAttribute('data-max-pages')) || 1;
  let isLoading = false;

  async function loadMoreGames() {
    if (isLoading) return;

    isLoading = true;
    loadMoreBtn.disabled = true;
    loadMoreBtn.textContent = 'Загрузка...';

    try {
      const formData = new FormData();
      formData.append('action', 'load_more_service_games');
      formData.append('nonce', themeData.nonce);
      formData.append('page', currentPage + 1);

      const response = await fetch(themeData.ajaxUrl, {
        method: 'POST',
        body: formData,
      });

      if (!response.ok) {
        throw new Error('Ошибка загрузки данных');
      }

      const data = await response.json();

      if (data.success && data.html) {
        // Создаем временный контейнер для парсинга HTML
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = data.html;
        const newCards = tempDiv.querySelectorAll('.service-games__card');

        // Добавляем карточки с анимацией
        newCards.forEach((card, index) => {
          card.style.opacity = '0';
          gamesGrid.appendChild(card);

          setTimeout(() => {
            card.style.transition = 'opacity 0.3s ease';
            card.style.opacity = '1';
          }, index * 50);
        });

        currentPage++;
        loadMoreBtn.setAttribute('data-page', currentPage);
        loadMoreBtn.setAttribute('data-max-pages', data.max_pages);
        maxPages = data.max_pages;

        // Скрываем кнопку, если больше нет страниц
        if (currentPage >= maxPages) {
          loadMoreBtn.style.display = 'none';
        }
      } else {
        loadMoreBtn.textContent = 'Больше нет проектов';
        loadMoreBtn.disabled = true;
        setTimeout(() => {
          loadMoreBtn.style.display = 'none';
        }, 1000);
      }

      loadMoreBtn.textContent = 'Загрузить ещё';
    } catch (error) {
      console.error('Ошибка при загрузке проектов:', error);
      loadMoreBtn.textContent = 'Ошибка загрузки';
      setTimeout(() => {
        loadMoreBtn.textContent = 'Загрузить ещё';
        loadMoreBtn.disabled = false;
      }, 2000);
    } finally {
      isLoading = false;
      loadMoreBtn.disabled = false;
    }
  }

  loadMoreBtn.addEventListener('click', loadMoreGames);
}
