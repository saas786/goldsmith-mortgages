import Swiper from 'swiper/bundle';

let swiper_one = new Swiper('.swiper-one', {
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  speed: 300,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-custom-pagination',
    clickable: true,
  },
});
