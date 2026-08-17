document.addEventListener('DOMContentLoaded', () => {
  const currentPath = window.location.pathname.replace(/\/$/, '') || '/';
  document.querySelectorAll('.library-navbar .nav-link').forEach((link) => {
    const href = (link.getAttribute('href') || '').replace(/\/$/, '') || '/';
    if (href !== '/logout' && (currentPath === href || (href !== '/' && currentPath.startsWith(href + '/')))) {
      link.classList.add('active');
      link.setAttribute('aria-current', 'page');
    }
  });

  const toggle = document.querySelector('[data-toggle-password]');
  const password = document.querySelector('#senha');
  if (toggle && password) {
    toggle.addEventListener('click', () => {
      const showing = password.type === 'text';
      password.type = showing ? 'password' : 'text';
      toggle.textContent = showing ? 'Mostrar' : 'Ocultar';
      toggle.setAttribute('aria-pressed', String(!showing));
    });
  }

  document.querySelectorAll('.quick-card').forEach((card, index) => {
    card.style.animation = `reveal .55s ${index * 70 + 150}ms ease both`;
  });
});
