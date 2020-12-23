module.exports = function() {
  if (isIOS()) {
    var hero = document.querySelector('.hero-wrapper')
    hero.classList.add('hero-wrapper--scroll')
    var photo = document.querySelector('.about-container__img-box')
    hero.classList.add('about-container__img-box--scroll')
    var pies = document.querySelectorAll('.pie__center')
    for (var i = 0; i < pies.length; i++) {
      pies[i].classList.add('pie__center--disabled')
    }
  }
}

function isIOS() {
  let userAgent = window.navigator.userAgent.toLowerCase()
  if (userAgent.match(/(iphone|ipod|ipad|android)/)) {
    return true
  }
  return false
}
