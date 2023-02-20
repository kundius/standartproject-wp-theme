const menus = document.querySelectorAll('.drawer-menu') || []

menus.forEach(function (menu) {
  const items = menu.querySelectorAll('.menu-item-has-children') || []

  items.forEach((item) => {
    const close = () => {
      item.classList.remove('menu-item-opened')
    }

    const open = () => {
      item.classList.add('menu-item-opened')
    }
    
    const toggle = () => {
      if (item.classList.contains('menu-item-opened')) {
        close()
      } else {
        open()
      }
    }

    const link = item.querySelector('a')
    const handler = document.createElement('span')
    handler.classList.add('menu-toggle')
    link.appendChild(handler)

    handler.addEventListener('click', (e) => {
      e.preventDefault()
      e.stopPropagation()
      toggle()
    })

    link.addEventListener('click', (e) => {
      if (!item.classList.contains('menu-item-opened')) {
        e.preventDefault()
        open()
      }
    })
  })
})

const drawers = document.querySelectorAll('.drawer') || []

drawers.forEach(function (drawer) {
  let timer
  const openEl = document.querySelectorAll('.header__toggle') || []
  const closeEl = document.querySelectorAll('.drawer__close, .drawer__overlay') || []

  openEl.forEach((el) => {
    el.addEventListener('click', (e) => {
      e.preventDefault()
      drawer.style.display = 'block'
      setTimeout(() => {
        drawer.classList.add('drawer_opened')
      }, 0)
    })
  })

  closeEl.forEach((el) => {
    el.addEventListener('click', (e) => {
      e.preventDefault()
      drawer.classList.remove('drawer_opened')
      if (timer) {
        clearTimeout(timer)
      }
      timer = setTimeout(() => {
        drawer.style.display = 'none'
      }, 500)
    })
  })
})
