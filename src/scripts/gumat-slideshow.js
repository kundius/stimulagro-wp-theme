import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'
import { addDotBtnsAndClickHandlers } from './EmblaCarouselDotButton'

export function applyGumatSlideshow(root) {
  const viewportNode = root.querySelector('[data-gumat-slideshow-viewport]')

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  const prevBtnNode = root.querySelector('[data-gumat-slideshow-prev]')
  const nextBtnNode = root.querySelector('[data-gumat-slideshow-next]')
  if (prevBtnNode && nextBtnNode) {
    const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
      emblaApi,
      prevBtnNode,
      nextBtnNode
    )
    emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
  }

  const dotsNode = root.querySelector('[data-gumat-slideshow-dots]')
  if (dotsNode) {
    const removeDotsClickHandlers = addDotBtnsAndClickHandlers(emblaApi, dotsNode)
    emblaApi.on('destroy', removeDotsClickHandlers)
  }
}

export function initGumatSlideshow() {
  const nodes = Array.from(document.querySelectorAll('[data-gumat-slideshow]'))
  nodes.forEach(applyGumatSlideshow)
}
