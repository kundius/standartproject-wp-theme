const isVisible = elem => !!elem && !!( elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length )

;(function() {
  const drawer = document.querySelector('.js-drawer')
  const toggle = document.querySelector('.js-drawer-toggle')
  let opened = false

  if (!drawer || !toggle) return

  const outsideClickListener = e => {
    if (!drawer.contains(e.target) && isVisible(drawer)) {
      close()
    }
  }

  const close = () => {
    drawer.classList.remove('drawer_opened')
    toggle.classList.remove('header__toggle_close')
    document.removeEventListener('click', outsideClickListener)
    opened = false
  }

  const open = () => {
    drawer.classList.add('drawer_opened')
    toggle.classList.add('header__toggle_close')
    document.addEventListener('click', outsideClickListener)
    opened = true
  }

  toggle.addEventListener('click', (e) => {
    e.stopPropagation()
    if (opened) {
      close()
    } else {
      open()
    }
  })

  const nextButtons = drawer.querySelectorAll('[data-next]')

  for (let i = 0; i < nextButtons.length; i++) {
    const arrow = nextButtons[i]
    arrow.addEventListener('click', () => {
      const drawerParents = drawer.querySelectorAll(`[data-parent]`)
      if (drawerParents) {
        for (let k = 0; k < drawerParents.length; k++) {
          const drawerParent = drawerParents[k]
          if (drawerParent.dataset.parent !== 'root') {
            drawerParent.classList.remove('drawer-screen_opened')
          }
        }
      }
      drawer.querySelector(`[data-parent="${arrow.dataset.next}"]`).classList.add('drawer-screen_opened')
    })
  }

})()
