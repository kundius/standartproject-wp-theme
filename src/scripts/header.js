function initHeader() {
  const toggle = document.querySelector(".header__toggle");
  const header = document.querySelector(".header");

  if (!toggle || !header) return;

  let opened = false

  toggle.addEventListener("click", function () {
    if (opened) {
      opened = false
      header.classList.remove('_opened')
      toggle.classList.remove('_opened')
    } else {
      opened = true
      header.classList.add('_opened')
      toggle.classList.add('_opened')
    }
  });
}

initHeader();
