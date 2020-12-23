module.exports = function() {
  var carousel = document.querySelector('.carousel')
  var slides = document.querySelectorAll('.carousel__slide')
  function triggerAnimate() {
    for (var i = 0; i < slides.length; i++) {
      if (slides[i].classList.contains('carousel__slide--active')) {
        var pie = slides[i].querySelector('.pie')
        pie.setAttribute('data-animated', '')
      }
    }
  }
  triggerAnimate()
  carousel.addEventListener('slidemove', triggerAnimate)
}
