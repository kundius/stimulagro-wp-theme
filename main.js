import './src/fonts/Montserrat/stylesheet.css'
import './src/styles/tailwindcss.css'
import './src/styles/fonts.css'
import './src/styles/main.css'
import './src/styles/header.css'
import './src/styles/home.css'
import './src/styles/gumat.css'

import { initStickyHeader } from './src/scripts/sticky-header'
import fslightbox from 'fslightbox'
import { Mask, MaskInput } from 'maska'
import { initCallButton } from './src/scripts/call-button'
import { initModal } from './src/scripts/modal'

new MaskInput('[data-maska]')

initStickyHeader()
initModal()
initCallButton()
