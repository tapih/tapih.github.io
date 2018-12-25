module.exports = function() {
  const imagesContainer = document.querySelector('.photos-container');
  const boxes = document.querySelectorAll('.photos-container__img');
  const interval = 300;
  var timer;
  imagesContainer.style.display = 'none';
  for (let box of boxes) {
    const src = box.getAttribute('data-src');
    const alt = box.getAttribute('data-alt');
    const img = document.createElement('img');
    img.setAttribute('src', src);
    img.setAttribute('alt', alt);
    box.appendChild(img);
    img.addEventListener('load', function() {
      if (timer) {
        clearTimeout(timer);
      }
      timer = setTimeout(function() {
        // show images
        imagesContainer.style.display = 'block';
      }, interval);
    });
  }
};
