import AOS from 'aos'
import Cookies from 'js-cookie'

import { modal } from './modal'

AOS.init()

const bannerSection = document.querySelector('.banner-section');
const bannerClose = document.querySelector('.banner__close');

if (bannerSection && bannerClose) {
  if (!Cookies.get('banner-hidden')) {
    bannerSection.classList.add('banner-section_visible')
  }
  bannerClose.addEventListener('click', () => {
    bannerSection.classList.remove('banner-section_visible')
    Cookies.set('banner-hidden', 'hidden')
  })
}

const callbackOrModalItems = document.querySelectorAll('.js-callback-or-modal') || [];
callbackOrModalItems.forEach(function (item) {
  item.addEventListener('click', (e) => {
    if (window.matchMedia("(min-width: 640px)").matches) {
      e.preventDefault();
      modal.open("#modal-callback");
    }
  });
});

const contactsAddresses = document.querySelectorAll('.contacts-addresses') || [];
contactsAddresses.forEach(function (wrapper) {
  const contentItems = wrapper.querySelectorAll('.contacts-addresses__content-item') || [];
  const mapItems = wrapper.querySelectorAll('.contacts-addresses__map-item') || [];
  const controls = wrapper.querySelectorAll('.contacts-addresses__control') || [];

  controls.forEach(function (control, i) {
    control.addEventListener('click', (e) => {
      contentItems.forEach((item) => item.classList.remove('_active'))
      mapItems.forEach((item) => item.classList.remove('_active'))

      contentItems[control.dataset.index].classList.add('_active')
      mapItems[control.dataset.index].classList.add('_active')
    });
  })
});

const geography = document.querySelectorAll('.geography') || [];
geography.forEach(function (wrapper) {
  const tabs = wrapper.querySelectorAll('.geography-headline__tab') || [];
  const panes = wrapper.querySelectorAll('.geography-tabs__item') || [];

  tabs.forEach(function (tab, i) {
    tab.addEventListener('click', (e) => {
      tabs.forEach((item) => item.classList.remove('_active'))
      panes.forEach((item) => item.classList.remove('_active'))

      tabs[i].classList.add('_active')
      panes[i].classList.add('_active')
    });
  })
});

const leadershipItems = document.querySelectorAll('.leadership-item') || [];
leadershipItems.forEach(function (leadershipItem) {
  const show = leadershipItem.querySelector('.leadership-item__show');

  if (!show) return

  let opened = 0;

  show.addEventListener('click', (e) => {
    if (opened) {
      leadershipItem.classList.remove('_opened')
      opened = false
    } else {
      leadershipItem.classList.add('_opened')
      opened = true
    }
  });

  leadershipItem.addEventListener('mouseleave', (e) => {
    leadershipItem.classList.remove('_opened')
    opened = false
  });
});
