import MicroModal from 'micromodal'

export function initModal() {
  const triggers = document.querySelectorAll('[data-modal-open]') || []

  Array.from(triggers).forEach((trigger) => {
    trigger.addEventListener('click', e => {
      e.preventDefault()
      MicroModal.show(trigger.dataset.modalOpen, {
        awaitOpenAnimation: true,
        awaitCloseAnimation: true,
        closeTrigger: 'data-modal-close'
      })
    })
  })
}
