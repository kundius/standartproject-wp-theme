;(function() {
  const body = document.querySelector('body')

  const showFocus = () => {
    body.classList.remove('ui-focus-disabled')
  }

  const hideFocus = () => {
    body.classList.add('ui-focus-disabled')
  }

  const handleTabPress = (e) => {
    if (e.which == 27) {
      hideFocus()
    }
    if (e.which == 9) {
      showFocus()
    }
  }

  hideFocus()

  body.addEventListener('keyup', handleTabPress)
  
})()
