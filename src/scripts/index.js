import lightGallery from 'lightgallery'
import MicroModal from 'micromodal'

import './drawer'
import './improve-focus'

import 'lightgallery/css/lightgallery-bundle.min.css'
import '../styles/index.scss'
import '../images/back_header.jpg'
import '../images/creator.png'
import '../images/logo.png'

MicroModal.init({
  awaitOpenAnimation: true,
  awaitCloseAnimation: true
})

function throttle(callback, wait, immediate = false) {
  let timeout = null 
  let initialCall = true
  
  return function() {
    const callNow = immediate && initialCall
    const next = () => {
      callback.apply(this, arguments)
      timeout = null
    }
    
    if (callNow) { 
      initialCall = false
      next()
    }

    if (!timeout) {
      timeout = setTimeout(next, wait)
    }
  }
}

const header = document.querySelector('.header')
const scrolltop = document.querySelector('.ui-scrolltop')
if (scrolltop && header) {
  scrolltop.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' })
  })
  const handleScroll = throttle((event) => {
    if (window.scrollY >= 20 && !header.classList.contains('header_fixed')) {
      header.classList.add('header_fixed')
    }
    if (window.scrollY < 20 && header.classList.contains('header_fixed')) {
      header.classList.remove('header_fixed')
    }
    if (window.scrollY >= 400 && !scrolltop.classList.contains('ui-scrolltop_visible')) {
      scrolltop.classList.add('ui-scrolltop_visible')
    }
    if (window.scrollY < 400 && scrolltop.classList.contains('ui-scrolltop_visible')) {
      scrolltop.classList.remove('ui-scrolltop_visible')
    }
  }, 300)
  window.addEventListener('scroll', handleScroll)
}

const gallery = document.getElementById('gallery')
if (gallery) {
  lightGallery(gallery, {
    selector: 'a',
    // plugins: [lgZoom, lgThumbnail],
    speed: 500
  })
}
