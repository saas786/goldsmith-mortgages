import 'alpinejs';

/**
 * Header Menu
 */
function headerTransitions () {
  let header = document.getElementById('header');

  if (header) {
    // let height = header.getBoundingClientRect().height;
    let height = 0;

    if (window.scrollY > height) {
      header.classList.add('h-[100px]');
      header.classList.remove('h-[150px]');
    } else {
      header.classList.add('h-[150px]');
      header.classList.remove('h-[100px]');
    }
  }
}

headerTransitions();

document.addEventListener('scroll', () => {
  headerTransitions();
});

/**
 * Scroll to Top
 */
const scroll_to_top_button = document.getElementById('scroll-to-top-button');

const toggleScrollToTopButton = () => {
  let y = window.scrollY;

  if (y > 0) {
    scroll_to_top_button.classList.add('opacity-100');
    scroll_to_top_button.classList.remove('opacity-0');
  } else {
    scroll_to_top_button.classList.add('opacity-0');
    scroll_to_top_button.classList.remove('opacity-100');
  }
};

window.addEventListener('scroll', toggleScrollToTopButton);

const scrollToTop = () => {
  const scrolled = document.documentElement.scrollTop || document.body.scrollTop;

  if (scrolled > 0) {
    window.scrollTo(0, 0);
  }
};

scroll_to_top_button.onclick = e => {
  e.preventDefault();
  scrollToTop();
};
