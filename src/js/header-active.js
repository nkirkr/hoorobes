export function initHeaderActive() {
  const navLinks = document.querySelectorAll('.nav__link');
  
  if (!navLinks.length) {
    return;
  }

  const currentPath = window.location.pathname;
  const currentPage = currentPath.split('/').pop() || 'index.html';
  const currentHash = window.location.hash;

  // НЕ удаляем класс active, если он уже есть (добавлен в PHP)
  // Проверяем, есть ли уже активная ссылка
  const hasActiveLink = Array.from(navLinks).some(link => link.classList.contains('active'));

  // Если уже есть активная ссылка (добавлена в PHP), не трогаем её
  // Обработка скролла будет только для главной страницы с якорями
  if (hasActiveLink) {
    // Если мы на главной странице и есть якорные ссылки, инициализируем скролл
    if (currentPage === 'index.html' || currentPage === '' || currentPath === '/') {
      updateActiveOnScroll(navLinks);
    }
    return;
  }

  // Если активной ссылки нет, работаем со старой логикой для .html страниц
  navLinks.forEach(link => {
    const linkPage = link.getAttribute('data-page');
    const linkHref = link.getAttribute('href');

    if (linkHref && linkHref.includes('.html')) {
      // Для ссылок на другие страницы (services.html, projects.html)
      if (linkHref.includes(currentPage) && !linkHref.includes('#')) {
        link.classList.add('active');
      }
    } else if (linkHref && linkHref.startsWith('#')) {
      // Для ссылок только с hash (старый формат)
      if (currentPage === 'index.html' || currentPage === '') {
        if (currentHash && currentHash === linkHref) {
          link.classList.add('active');
        }
      }
    }
  });

  // Обработка скролла только для главной страницы
  if (currentPage === 'index.html' || currentPage === '' || currentPath === '/') {
    updateActiveOnScroll(navLinks);
  }
}

function updateActiveOnScroll(navLinks) {
  const sections = [];
  
  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href) {
      // Извлекаем ID секции из ссылок вида #about или ./index.html#about
      const hashIndex = href.indexOf('#');
      if (hashIndex !== -1) {
        const sectionId = href.substring(hashIndex + 1);
        const section = document.getElementById(sectionId);
        if (section) {
          sections.push({ link, section });
        }
      }
    }
  });

  if (!sections.length) return;

  // Получаем высоту header для offset (если header фиксированный)
  const header = document.querySelector('.header');
  const headerHeight = header ? header.offsetHeight : 0;
  const offset = headerHeight + 100; // Добавляем отступ для лучшей видимости

  function checkActiveSection() {
    const scrollTop = window.scrollY || window.pageYOffset;
    const windowHeight = window.innerHeight;
    
    // Если страница в самом верху, не устанавливаем активное состояние
    if (scrollTop < 50) {
      sections.forEach(({ link }) => {
        link.classList.remove('active');
      });
      return;
    }

    const viewportTop = scrollTop + offset;
    const viewportCenter = scrollTop + windowHeight / 2;
    const viewportBottom = scrollTop + windowHeight;

    let activeSection = null;
    let minDistance = Infinity;

    sections.forEach(({ section }) => {
      const rect = section.getBoundingClientRect();
      const sectionTop = scrollTop + rect.top;
      const sectionBottom = sectionTop + rect.height;

      const isInViewport = (
        sectionTop < viewportBottom &&
        sectionBottom > viewportTop
      );

      const isNearTop = sectionTop <= viewportTop + 200 && sectionBottom >= viewportTop;
      const isNearCenter = sectionTop <= viewportCenter && sectionBottom >= viewportCenter;

      if (isInViewport && (isNearTop || isNearCenter)) {
        const distance = Math.abs(sectionTop - viewportTop);
        if (distance < minDistance) {
          minDistance = distance;
          activeSection = section;
        }
      }
    });

    // Устанавливаем активное состояние только для якорных ссылок
    sections.forEach(({ link, section }) => {
      if (section === activeSection && activeSection !== null) {
        link.classList.add('active');
      } else {
        link.classList.remove('active');
      }
    });
  }

  window.addEventListener('scroll', checkActiveSection, { passive: true });
  
  if (window.location.hash) {
    setTimeout(() => {
      checkActiveSection();
    }, 100);
  } else if (window.scrollY > 50) {
    setTimeout(() => {
      checkActiveSection();
    }, 100);
  } else {
    sections.forEach(({ link }) => {
      link.classList.remove('active');
    });
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', initHeaderActive);
} else {
  initHeaderActive();
}