module.exports = function() {
    var hamburger = document.querySelector('.hamburger');
    var navbar = document.querySelector('.navbar-wrapper');
    var navbarList = document.querySelector('.navbar-wrapper__list');
    var navbarItems = document.querySelectorAll('.navbar-wrapper__item>a');

    var hcls = 'hamburger--open';
    var ncls = 'navbar-wrapper--open';
    var nlcls = 'navbar-wrapper__list--open';
    hamburger.addEventListener('click', function() {
      if (hamburger.classList.contains(hcls)) {
        hamburger.classList.remove(hcls);
        navbar.classList.remove(ncls);
        navbarList.classList.remove(nlcls);
      } else {
        hamburger.classList.add(hcls);
        navbar.classList.add(ncls);
        navbarList.classList.add(nlcls);
      }
    });
    for (var i = 0; i < navbarItems.length; i++) {
      var item = navbarItems[i];
      item.addEventListener('click', function() {
        hamburger.classList.remove(hcls);
        navbar.classList.remove(ncls);
        navbarList.classList.remove(nlcls);
      });
    }
  };
