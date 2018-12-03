module.exports = function() {
  if (isIOS()) {
      var hero = document.querySelector('.hero-wrapper');
      hero.classList.remove('hero-wrapper--paraxify');
      var photo = document.querySelector('.about-container__img');
      hero.classList.remove('about-container__img--paraxify');
  }
};

function isIOS() {
  let userAgent = window.navigator.userAgent.toLowerCase();
  if (userAgent.match(/(iphone|ipod|ipad)/)) {
    return true;
  }
  return false;
}
