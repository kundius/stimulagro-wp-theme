export function initPageAnchor() {
  const items = document.querySelectorAll('[data-page-anchor]') || []

  const navItems = []

  items.forEach((item, i) => {
    const n = String(i + 1).padStart(2, '0')
    const base = [n, '.']
    item.innerHTML = base.join(' ')
    if (item.dataset.pageAnchor) {
      base.push(item.dataset.pageAnchor)
    }
    const boundary = item.closest('[data-page-anchor-boundary]')
    navItems.push({
      title: base.join(' '),
      boundary: boundary || item
    })
  })

  const navEl = document.createElement('div')
  navEl.classList.add('sticky-nav')

  navItems.forEach((item) => {
    const itemEl = document.createElement('button')
    itemEl.classList.add('sticky-nav__item')
    itemEl.setAttribute('type', 'button')
    const itemSpanEl = document.createElement('span')
    itemSpanEl.innerHTML = item.title
    itemEl.appendChild(itemSpanEl)
    navEl.appendChild(itemEl)
    item.anchor = itemEl
    itemEl.addEventListener('click', (e) => {
      e.preventDefault()
      item.boundary.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      })
    })
  })

  document.body.appendChild(navEl)

  function deactivateAllAnchors() {
    navItems.forEach((item) => item.anchor.classList.remove('active'))
  }

  function activateAnchorForBoundary(boundary) {
    const foundItem = navItems.find((item) => item.boundary == boundary)
    if (foundItem) {
      foundItem.anchor.classList.add('active')
    }
  }

  let activeBoundaries = new Set()

  const observer = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (entry.isIntersecting) {
          activeBoundaries.add(entry.target)
        } else {
          activeBoundaries.delete(entry.target)
        }
      }

      if (activeBoundaries.size === 0) {
        deactivateAllAnchors()
      } else {
        deactivateAllAnchors()
        const sorted = Array.from(activeBoundaries).sort(
          (a, b) => a.getBoundingClientRect().top - b.getBoundingClientRect().top
        )
        activateAnchorForBoundary(sorted[0])
      }
    },
    {
      threshold: 0.1,
      rootMargin: '-96px 0px 0px 0px'
    }
  )

  navItems.forEach((item) => observer.observe(item.boundary))
}
