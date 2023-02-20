
const markers = document.querySelectorAll('.map-marker') || [];
const contents = document.querySelectorAll('.geography-map__content') || [];
const overlay = document.querySelector('.geography-map__overlay');

let active = null;

const show = (index) => {
  if (active) {
    close(active)
  }

  active = index

  const content = document.querySelector(`.geography-map__content[data-index="${index}"]`)
  const marker = document.querySelector(`.map-marker[data-index="${index}"]`)

  content.classList.add('_visible')
  overlay.classList.add('_visible')

  if (window.matchMedia('(min-width: 640px)').matches) {
    const bounding = marker.getBoundingClientRect()
    content.style.left = `${bounding.left}px`
    content.style.top = `${bounding.top}px`
  }

  window.addEventListener('scroll', onScroll)
  document.addEventListener('mouseup', onMouseUp)
}

const close = (index) => {
  const content = document.querySelector(`.geography-map__content[data-index="${index}"]`)
  content.classList.remove('_visible')
  overlay.classList.remove('_visible')
  window.removeEventListener('scroll', onScroll)
  document.removeEventListener('mouseup', onMouseUp)
}

const onScroll = () => {
  close(active)
}

const onMouseUp = (e) => {
  const content = document.querySelector(`.geography-map__content[data-index="${active}"]`)

  if (!content.contains(e.target)) {
    close(active)
  }
}

markers.forEach(function (marker) {
  marker.addEventListener('click', (e) => {
    show(marker.dataset.index)
  })
})
