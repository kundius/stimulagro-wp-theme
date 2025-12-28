import './src/fonts/Montserrat/stylesheet.css'
import './src/styles/tailwindcss.css'
import './src/styles/icons.css'
import './src/styles/main.css'
import './src/styles/header.css'
import './src/styles/template-product.css'

import { initStickyHeader } from './src/scripts/sticky-header'
import fslightbox from 'fslightbox'
import { Mask, MaskInput } from 'maska'
import { initCallButton } from './src/scripts/call-button'
import { initMobileMenu } from './src/scripts/mobile-menu'
import { initCallbackButton } from './src/scripts/callback-button'
import { initPageAnchor } from './src/scripts/page-anchor'
import { initGumatSlideshow } from './src/scripts/gumat-slideshow'

new MaskInput('[data-maska]')

initStickyHeader()
initCallButton()
initMobileMenu()
initCallbackButton()
initPageAnchor()
initGumatSlideshow()
