module.exports = function() {
  if (isIOS()) {
      var hero = document.querySelector('.hero-wrapper');
      hero.classList.add('hero-wrapper--scroll');
      var photo = document.querySelector('.about-container__img-box');
      hero.classList.add('about-container__img-box--scroll');
  }
};

function isIOS() {
  let userAgent = window.navigator.userAgent.toLowerCase();
  if (userAgent.match(/(iphone|ipod|ipad)/)) {
    return true;
  }
  return false;
}
