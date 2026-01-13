export function initProjectsLoadMore() {
  const loadMoreBtn = document.querySelector('.projects__load-more');
  const projectsGrid = document.querySelector('.projects__grid');

  if (!loadMoreBtn || !projectsGrid) return;

  let currentPage = parseInt(loadMoreBtn.getAttribute('data-page')) || 1;
  let maxPages = parseInt(loadMoreBtn.getAttribute('data-max-pages')) || 1;
  let isLoading = false;
  let currentFilter = 'all';

  function getCurrentFilter() {
    const activeFilter = document.querySelector('.projects__filter--active');
    return activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
  }

  // Обновление состояния при изменении фильтра
  const filterButtons = document.querySelectorAll('.projects__filter, .projects__dropdown-item');
  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      currentFilter = getCurrentFilter();
      currentPage = 1;
      loadMoreBtn.setAttribute('data-page', '1');
      
      // Показываем кнопку снова при смене фильтра
      if (loadMoreBtn) {
        loadMoreBtn.style.display = 'block';
      }
    });
  });

  async function loadMoreProjects() {
    if (isLoading) return;

    isLoading = true;
    loadMoreBtn.disabled = true;
    loadMoreBtn.textContent = 'Загрузка...';

    try {
      const formData = new FormData();
      formData.append('action', 'load_more_cases');
      formData.append('nonce', themeData.nonce);
      formData.append('page', currentPage + 1);
      formData.append('category', currentFilter);

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
        const newCards = tempDiv.querySelectorAll('.project-card');

        // Добавляем карточки с анимацией
        newCards.forEach((card, index) => {
          card.style.opacity = '0';
          projectsGrid.appendChild(card);

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

  loadMoreBtn.addEventListener('click', loadMoreProjects);
}

