'use strict';
(function() {
    var wp = document.querySelector('#about');
    var wpTop = wp.offsetTop;
    window.addEventListener('scroll', function() {
        var targets = ['header-wrapper', 'go-to-top'];
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

    tns({
        container: '.slider',
        mode: 'carousel',
        nav: true,
        navPosition: 'bottom',
        controls: true,
        controlsText: [
            // '<i class="icon ion-md-arrow-dropleft"></i>',
            // '<i class="icon ion-md-arrow-dropright"></i>',
            '',
            '',
        ],
        slideBy: 'page',
        mouseDrag: true,
        loop: false,
        items: 2,
        responsive: {
            // min-width
            1600: {
                items: 3,
            },
        },
    });
})();
