export function initMobileMenu() {
  const state = document.querySelector('[data-mobile-menu-state]')
  const toggle = document.querySelector('[data-mobile-menu-toggle]')

  if (toggle) {
    toggle.addEventListener('click', () => {
      state.setAttribute(
        'data-mobile-menu-state',
        state.dataset.mobileMenuState === 'closed' ? 'opened' : 'closed'
      )
    })
  }
}
