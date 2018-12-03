module.exports = function() {
  var wp = document.querySelector('#about');
  var wpTop = wp.offsetTop;
  var targets = ['navbar-wrapper', 'go-to-top'];
  window.addEventListener('scroll', function() {
    for (var i = 0; i < targets.length; i++) {
      var name = targets[i];
      var nameWp = name + '--waypoint-on';
      var e = document.querySelector('.' + name);
      if (e.classList.contains(nameWp)) {
        if (window.pageYOffset <= wpTop) {
          e.classList.remove(nameWp);
        }
      } else {
        if (window.pageYOffset >= wpTop) {
          e.classList.add(nameWp);
        }
      }
    }
  });
};
