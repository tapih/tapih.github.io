(function() {
    'use strict';

    // lazy load of images
    // ----
    var imagesCont = document.querySelector('.photos-container');
    imagesCont.style.display = 'none';

    var images = document.querySelectorAll('.photos-container__img');
    var timer;
    for (var i = 0; i < images.length; i++) {
        var src = images[i].getAttribute('data-src');
        images[i].setAttribute('src', src);
        images[i].addEventListener('load', function() {
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout(function() {
                imagesCont.style.display = 'block';
            }, 100);
            this.removeAttribute('data-src');
        });
    }

    // ajax post form
    // ----
    var form = document.querySelector('.contact-form');
    var modal = document.querySelector('.modal');
    var confirmBtn = document.querySelector('.contact-form__btn');
    // show modal when form button clicked
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        e.target.checkValidity();
        modal.style.display = 'block';
        confirmBtn.classList.add('btn--filled');
    });

    // hide modal if outside of modal clicked
    var modalOuter = document.querySelector('.modal__outer');
    modalOuter.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // disable event on inside of modal
    var modalInner = document.querySelector('.modal__inner');
    modalInner.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    // submit on modal
    var readyToSend = true;
    var submitBtn = document.querySelector('.modal__btn--submit');
    submitBtn.addEventListener('click', function(e) {
        if (readyToSend) {
            readyToSend = false;
            var uri = form.getAttribute('action');
            var postContent =
                'name=' +
                form.name.value +
                '&email=' +
                form.email.value +
                '&message=' +
                form.message.value +
                '&csrf_token=' +
                form.csrf_token.value;

            // xhr request
            var xhr = new XMLHttpRequest();
            xhr.open('POST', uri);
            xhr.setRequestHeader(
                'content-type',
                'application/x-www-form-urlencoded; charset=UTF-8',
            );
            xhr.send(postContent);
            xhr.addEventListener(
                'readystatechange',
                function HandleStateChange() {
                    if (this.readyState === 4) {
                        readyToSend = true;
                        modal.style.display = 'none';
                        confirmBtn.classList.remove('btn--filled');
                        console.log(xhr.responseText);
                        console.log(xhr.status);
                        alert('done');
                        this.removeEventListener(
                            'readystatechange',
                            HandleStateChange,
                        );
                        // change modal and close
                    }
                },
            );
        }
    });

    // cancel on modal
    var cancelBtn = document.querySelector('.modal__btn--cancel');
    cancelBtn.addEventListener('click', function(e) {
        modal.style.display = 'none';
        confirmBtn.classList.remove('btn--filled');
    });

    // waypoint
    // ----
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

    // carousel
    // ----
    var swiperDOM = {
        container: document.querySelector('.swiper-container'),
        wrapper: document.querySelector('.swiper-wrapper'),
        slides: document.querySelectorAll('.swiper-slide'),
        pagination: document.querySelector('.swiper-pagination'),
        nextButton: document.querySelector('.swiper-controls__next'),
        prevButton: document.querySelector('.swiper-controls__prev'),
    };

    // params
    var initPage = 1;
    var slidesPerView = 3;
    var margin = 20;
    var numSlides = swiperDOM.slides.length;
    var numPages = Math.ceil(numSlides / slidesPerView);
    swiperDOM.wrapper.setAttribute('data-position', initPage);

    // state
    var swiperState = {};
    var currPage = initPage;
    var sliderWidth;
    var sliderHeight;
    var maxHeightSlide = 1;
    var maxBuf = swiperDOM.slides[0].offsetHeight;
    for (var i = 1; i < numSlides; i++) {
        var h = swiperDOM.slides[i].offsetHeight;
        if (maxBuf < h) {
            maxBuf = h;
            maxHeightSlide = i + 1;
        }
    }

    function updatePosition() {
        swiperDOM.wrapper.style.transform =
            'translateX(-' +
            (sliderWidth + margin * 2) *
                Math.min(
                    (currPage - 1) * slidesPerView,
                    numSlides - slidesPerView,
                ) +
            'px)';
    }

    // initialize: disable button
    if (currPage === 1) {
        swiperDOM.prevButton.classList.add('swiper-controls__prev--disabled');
    } else if (currPage === numPages) {
        swiperDOM.nextButton.classList.add('swiper-controls__next--disabled');
    }

    // initialize: generate pagination dots
    for (var i = 0; i < numPages; i++) {
        var dot = document.createElement('div');
        dot.classList.add('swiper-pagination__dot');
        if (i == initPage - 1) {
            dot.classList.add('swiper-pagination__dot--active');
        }
        swiperDOM.pagination.appendChild(dot);
    }
    swiperDOM.dots = document.querySelectorAll('.swiper-pagination__dot');

    // initialize: move initial position
    function handleResize() {
        sliderWidth =
            swiperDOM.container.offsetWidth / slidesPerView - margin * 2;
        sliderHeight =
            swiperDOM.slides[maxHeightSlide].children[0].offsetHeight;
        for (var i = 0; i < numSlides; i++) {
            swiperDOM.slides[i].children[0].style.width = sliderWidth;
            swiperDOM.slides[i].children[0].style.height = sliderHeight;
        }
        updatePosition();
        return true;
    }
    handleResize();
    window.addEventListener('resize', handleResize);

    function handleClickCommon(pageBeforeClick, pageAfterClick) {
        // update dot color
        swiperDOM.dots[pageBeforeClick - 1].classList.remove(
            'swiper-pagination__dot--active',
        );
        swiperDOM.dots[pageAfterClick - 1].classList.add(
            'swiper-pagination__dot--active',
        );

        // update dot color
        updatePosition();
    }

    swiperDOM.nextButton.addEventListener('click', function() {
        switch (currPage) {
            case numPages:
                return;
            case numPages - 1:
                swiperDOM.nextButton.classList.add(
                    'swiper-controls__next--disabled',
                );
                break;
            case 1:
                swiperDOM.prevButton.classList.remove(
                    'swiper-controls__prev--disabled',
                );
                break;
        }
        handleClickCommon(currPage, currPage + 1);
        currPage++;
        updatePosition();
    });

    swiperDOM.prevButton.addEventListener('click', function() {
        switch (currPage) {
            case 1:
                return;
            case 2:
                swiperDOM.prevButton.classList.add(
                    'swiper-controls__prev--disabled',
                );
                break;
            case numPages:
                swiperDOM.nextButton.classList.remove(
                    'swiper-controls__next--disabled',
                );
                break;
        }
        handleClickCommon(currPage, currPage - 1);
        currPage--;
        updatePosition();
    });
})();
