export function initProjectsFilters() {
  const filtersContainer = document.querySelector('.projects__filters');
  
  if (!filtersContainer) return;

  const filterButtons = filtersContainer.querySelectorAll('.projects__filter');
  const dropdownItems = document.querySelectorAll('.projects__dropdown-item');
  const projectsGrid = document.querySelector('.projects__grid');
  const loadMoreBtn = document.querySelector('.projects__load-more');

  // Клиентская фильтрация (скрывает/показывает уже загруженные карточки)
  function filterProjects(category) {
    const projectCards = document.querySelectorAll('.project-card');
    
    projectCards.forEach((card) => {
      const cardCategory = card.getAttribute('data-category');
      
      if (category === 'all' || cardCategory === category) {
        card.style.display = 'flex';
        card.style.opacity = '0';
        
        setTimeout(() => {
          card.style.transition = 'opacity 0.3s ease';
          card.style.opacity = '1';
        }, 10);
      } else {
        card.style.opacity = '0';
        setTimeout(() => {
          card.style.display = 'none';
        }, 300);
      }
    });

    // Обновляем кнопку "Загрузить ещё" для работы с текущим фильтром
    if (loadMoreBtn) {
      loadMoreBtn.setAttribute('data-current-filter', category);
    }
  }

  function syncMobileDropdown(category) {
    const dropdownText = document.querySelector('.projects__dropdown-text');
    
    dropdownItems.forEach((item) => {
      const itemCategory = item.getAttribute('data-filter');
      
      if (itemCategory === category) {
        item.classList.add('projects__dropdown-item--active');
        if (dropdownText) {
          dropdownText.textContent = item.textContent.trim();
        }
      } else {
        item.classList.remove('projects__dropdown-item--active');
      }
    });
  }

  function syncDesktopFilters(category) {
    filterButtons.forEach((btn) => {
      const btnCategory = btn.getAttribute('data-filter');
      if (btnCategory === category) {
        btn.classList.add('projects__filter--active');
      } else {
        btn.classList.remove('projects__filter--active');
      }
    });
  }

  // Обработчики для desktop фильтров
  filterButtons.forEach((button) => {
    button.addEventListener('click', () => {
      const category = button.getAttribute('data-filter');
      
      filterButtons.forEach((btn) => {
        btn.classList.remove('projects__filter--active');
      });

      button.classList.add('projects__filter--active');

      filterProjects(category);
      syncMobileDropdown(category);
    });
  });

  // Обработчики для mobile фильтров
  dropdownItems.forEach((item) => {
    item.addEventListener('click', () => {
      const category = item.getAttribute('data-filter');
      
      dropdownItems.forEach((dropItem) => {
        dropItem.classList.remove('projects__dropdown-item--active');
      });

      item.classList.add('projects__dropdown-item--active');

      filterProjects(category);
      syncDesktopFilters(category);
    });
  });

  // Инициализируем фильтр при загрузке
  filterProjects('all');
}
