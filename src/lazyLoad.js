module.exports = function() {
  var imagesCont = document.querySelector('.photos-container');
  var images = document.querySelectorAll('.photos-container__img');
  var timer;
  var interval = 300;
  imagesCont.style.display = 'none';
  for (var i = 0; i < images.length; i++) {
    var img = images[i];
    var src = img.getAttribute('data-src');
    img.setAttribute('src', src);
    img.addEventListener('load', function() {
      if (timer) {
        clearTimeout(timer);
      }
      timer = setTimeout(function() {
        imagesCont.style.display = 'block';
      }, interval);
      this.removeAttribute('data-src');
    });
  }
};
