import MicroModal from 'micromodal'

export function applyCallButton(el) {
  el.addEventListener('click', (e) => {
    if (window.matchMedia('(min-width: 768px)').matches) {
      e.preventDefault()

      MicroModal.show('modal-callback', {
        awaitOpenAnimation: true,
        awaitCloseAnimation: true,
        closeTrigger: 'data-modal-close'
      })
    }
  })
}

export function initCallButton() {
  const items = document.querySelectorAll('[data-call-button]') || []

  Array.from(items).forEach(applyCallButton)
}
