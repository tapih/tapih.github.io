'use strict';
tns({
    container: '.slider',
    mode: 'carousel',
    items: 3,
    nav: true,
    mouseDrag: true,
    autoWidth: true,
    gutter: 50,
    edgePadding: 20,
    navPosition: 'bottom',
    controls: false,
});

window.addEventListener('scroll', function() {
    var wp = document.querySelector('.about-wrapper');
    var targets = ['header-wrapper', 'go-to-top'];
    for (var i = 0; i < targets.length; i++) {
        var name = targets[i];
        var nameWp = name + '--waypoint-on';
        var e = document.querySelector('.' + name);
        if (e.classList.contains(nameWp)) {
            if (window.pageYOffset < wp.offsetHeight) {
                e.classList.remove(nameWp);
            }
        } else {
            if (window.pageYOffset > wp.offsetHeight) {
                e.classList.add(nameWp);
            }
        }
    }
});
