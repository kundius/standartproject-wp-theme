import Swiper, { Navigation, Pagination } from "swiper";

const projectSwiper = new Swiper(".project-swiper", {
  // configure Swiper to use modules
  modules: [Navigation],
  navigation: {
    nextEl: ".project-gallery__next",
    prevEl: ".project-gallery__prev",
  },
  autoHeight: true,
});

const projectRelatedSwiper = new Swiper(".project-related-swiper", {
  // configure Swiper to use modules
  modules: [Navigation],
  navigation: {
    nextEl: ".project-related-swiper-next",
    prevEl: ".project-related-swiper-prev",
  },
  slidesPerView: 1,
  spaceBetween: 32,
  autoHeight: true,
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 32,
    },
    960: {
      slidesPerView: 3,
      spaceBetween: 32,
    },
  },
});

const articleRelatedSwiper = new Swiper(".article-related-swiper", {
  // configure Swiper to use modules
  modules: [Navigation],
  navigation: {
    nextEl: ".article-related-swiper-next",
    prevEl: ".article-related-swiper-prev",
  },
  slidesPerView: 1,
  spaceBetween: 32,
  autoHeight: true,
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 32,
    },
    960: {
      slidesPerView: 3,
      spaceBetween: 32,
    },
  },
});

const teamSwiper = new Swiper(".team-swiper", {
  // configure Swiper to use modules
  modules: [Navigation],
  navigation: {
    nextEl: ".team-swiper-next",
    prevEl: ".team-swiper-prev",
  },
  slidesPerView: 1,
  spaceBetween: 20,
  autoHeight: true,
  breakpoints: {
    640: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    960: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
});
