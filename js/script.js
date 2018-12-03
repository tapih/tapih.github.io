(function() {
  'use strict';
  // var userAgent = window.navigator.userAgent.toLowerCase();
  // console.log(userAgent);

  // lazy load of images
  // ----
  (function() {
    var imagesCont = document.querySelector('.photos-container');
    var images = document.querySelectorAll('.photos-container__img');
    var timer;
    var interval = 300;
    imagesCont.style.display = 'none';
    for (var img of images) {
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
  })();

  // waypoint
  // ----
  (function() {
    var wp = document.querySelector('#about');
    var wpTop = wp.offsetTop;
    var targets = ['navbar-wrapper', 'go-to-top'];
    window.addEventListener('scroll', function() {
      for (var name of targets) {
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
  })();

  // hamburger
  // ----
  (function() {
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
    for (var item of navbarItems) {
      item.addEventListener('click', function() {
        hamburger.classList.remove(hcls);
        navbar.classList.remove(ncls);
        navbarList.classList.remove(nlcls);
      });
    }
  })();

  // ajax post form
  // ----
  (function() {
    var DOM = {
      form: document.querySelector('.contact-form'),
      modal: document.querySelector('.modal'),
      modalOuter: document.querySelector('.modal__outer'),
      modalInner: document.querySelector('.modal__inner'),
      modalName: document.querySelector('.modal-container__value--name'),
      modalEmail: document.querySelector('.modal-container__value--email'),
      modalMessage: document.querySelector('.modal-container__value--message'),
      modalStateBefore: document.querySelector('.modal__state--before'),
      modalStateAfter: document.querySelector('.modal__state--after'),
      spinnerOuter: document.querySelector('.spinner__outer'),
      spinnerDraw: document.querySelector('.spinner__draw'),
      spinnerMessage: document.querySelector('.spinner__message'),
      confirmBtn: document.querySelector('.contact-form__btn'),
      submitBtn: document.querySelector('.modal__btn--submit'),
      cancelBtn: document.querySelector('.modal__btn--cancel')
    };
    // show modal when form button clicked
    DOM.form.addEventListener('submit', function(e) {
      e.preventDefault();
      e.target.checkValidity();
      DOM.modal.style.display = 'block';
      DOM.confirmBtn.classList.add('btn--filled');

      // copy form value
      DOM.modalName.innerText = DOM.form.name.value;
      DOM.modalEmail.innerText = DOM.form.email.value;
      DOM.modalMessage.innerText = DOM.form.message.value;
    });

    // disable event on inside of modal
    DOM.modalInner.addEventListener('click', function(e) {
      e.stopPropagation();
    });

    function modalClose() {
      DOM.modal.style.display = 'none';
      DOM.confirmBtn.classList.remove('btn--filled');
    }

    // hide modal if outside of modal clicked
    DOM.modalOuter.addEventListener('click', modalClose);

    // submit on modal
    var readyToSend = true;
    DOM.submitBtn.addEventListener('click', function(e) {
      if (readyToSend) {
        readyToSend = false;
        DOM.modalOuter.removeEventListener('click', modalClose); // disable close by clicking outside

        // xhr request
        var xhr = new XMLHttpRequest();
        var uri = DOM.form.getAttribute('action');
        xhr.open('POST', uri);
        xhr.setRequestHeader(
          'content-type',
          'application/x-www-form-urlencoded; charset=UTF-8'
        );
        var postContent =
          'name=' +
          DOM.form.name.value +
          '&email=' +
          DOM.form.email.value +
          '&message=' +
          DOM.form.message.value +
          '&csrf_token=' +
          DOM.form.csrf_token.value;

        xhr.send(postContent);
        DOM.modalStateBefore.style.display = 'none';
        DOM.modalStateAfter.style.display = 'flex';

        var interval = 5000;
        xhr.addEventListener('readystatechange', function HandleStateChange() {
          if (this.readyState === 4) {
            readyToSend = true;
            if (xhr.status == 200) {
              DOM.spinnerOuter.classList.add('spinner__outer--success');
              DOM.spinnerDraw.classList.add('spinner__draw--success');
              DOM.spinnerMessage.innerText =
                'Succeed. Refresh in ' + Math.round(interval / 1000) + 's...';
              setTimeout(function() {
                window.location.reload(true);
              }, interval);
            } else {
              DOM.spinnerOuter.classList.add('spinner__outer--failed');
              DOM.spinnerDraw.classList.add('spinner__draw--failed');
              DOM.spinnerMessage.innerText =
                'Failed. Refresh in ' + Math.round(interval / 1000) + 's...';
              setTimeout(function() {
                window.location.reload(true);
              }, interval);
            }
          }
        });
      }
    });

    // cancel on modal
    DOM.cancelBtn.addEventListener('click', modalClose);
  })();

  // carousel
  // ----
  (function() {
    var DOM = {
      container: document.querySelector('.carousel'),
      wrapper: document.querySelector('.carousel__wrapper'),
      slides: document.querySelectorAll('.carousel__slide'),
      pagination: document.querySelector('.carousel__pagination'),
      nextButton: document.querySelector('.carousel__next'),
      prevButton: document.querySelector('.carousel__prev')
    };

    // params
    var constants = {};
    var initPage = 1;
    // var margin = 20;
    var marginMap = { 0: 8, 600: 20 };
    var slidesPerViewMap = { 0: 1, 1100: 2, 1400: 3 }; // responsive min-width
    var margin;
    var slidesPerView;
    function updateResponsive() {
      var windowWidth = window.innerWidth;
      for (var k in slidesPerViewMap) {
        if (windowWidth >= k) {
          slidesPerView = slidesPerViewMap[k];
        }
      }
      for (var k in marginMap) {
        if (windowWidth >= k) {
          margin = marginMap[k];
        }
      }
    }
    updateResponsive();
    var numSlides = DOM.slides.length;
    var numPages = Math.ceil(numSlides / slidesPerView);
    DOM.wrapper.setAttribute('data-position', initPage);

    // state
    var states = {};
    var currPage = initPage;
    var sliderWidth;

    function updatePosition() {
      DOM.wrapper.style.transform =
        'translateX(-' +
        (sliderWidth + margin * 2) *
          Math.min((currPage - 1) * slidesPerView, numSlides - slidesPerView) +
        'px)';
    }

    // initialize: disable button
    if (currPage === 1) {
      DOM.prevButton.classList.add('carousel__prev--disabled');
    } else if (currPage === numPages) {
      DOM.nextButton.classList.add('carousel__next--disabled');
    }

    // initialize: generate pagination dots
    for (var i = 0; i < numPages; i++) {
      var dot = document.createElement('div');
      dot.classList.add('carousel__dot');
      if (i == initPage - 1) {
        dot.classList.add('carousel__dot--active');
      }
      DOM.pagination.appendChild(dot);
    }
    DOM.dots = document.querySelectorAll('.carousel__dot');

    // initialize: move initial position
    function handleResize() {
      sliderWidth = DOM.container.offsetWidth / slidesPerView - margin * 2;
      for (var slide of DOM.slides) {
        slide.children[0].style.width = sliderWidth;
      }
      updatePosition();
    }
    handleResize();

    // add event
    window.addEventListener('resize', updateResponsive);
    window.addEventListener('resize', handleResize);

    function handleClickCommon(pageBeforeClick, pageAfterClick) {
      // update dot color
      DOM.dots[pageBeforeClick - 1].classList.remove('carousel__dot--active');
      DOM.dots[pageAfterClick - 1].classList.add('carousel__dot--active');

      // update dot color
      updatePosition();
    }

    function moveRight() {
      switch (currPage) {
        case numPages:
          return;
        case numPages - 1:
          DOM.nextButton.classList.add('carousel__next--disabled');
          break;
        case 1:
          DOM.prevButton.classList.remove('carousel__prev--disabled');
          break;
      }
      handleClickCommon(currPage, currPage + 1);
      currPage++;
      updatePosition();
    }
    function moveLeft() {
      switch (currPage) {
        case 1:
          return;
        case 2:
          DOM.prevButton.classList.add('carousel__prev--disabled');
          break;
        case numPages:
          DOM.nextButton.classList.remove('carousel__next--disabled');
          break;
      }
      handleClickCommon(currPage, currPage - 1);
      currPage--;
      updatePosition();
    }

    // click
    DOM.nextButton.addEventListener('click', moveRight);
    DOM.prevButton.addEventListener('click', moveLeft);

    // touch
    (function() {
      var startX, startY;
      var moveX, moveY;
      var dist = 30;
      DOM.container.addEventListener('touchstart', function(e) {
        e.preventDefault();
        startX = e.touches[0].pageX;
        startY = e.touches[0].pageY;
      });
      DOM.container.addEventListener('touchmove', function(e) {
        e.preventDefault();
        moveX = e.changedTouches[0].pageX;
        moveY = e.changedTouches[0].pageY;
      });
      DOM.container.addEventListener('touchend', function(e) {
        if (startX > moveX && startX > moveX + dist) {
          moveRight();
        } else if (startX < moveX && startX + dist < moveX) {
          moveLeft();
        }
      });
    })();

    // drag
    (function() {
      var startX, startY;
      var moveX, moveY;
      var dist = 200;
      DOM.container.addEventListener('mousedown', function(e) {
        e.preventDefault();
        console.log(e);
        startX = e.pageX;
        startY = e.pageY;
      });
      DOM.container.addEventListener('mouseup', function(e) {
        e.preventDefault();
        console.log(e);
        moveX = e.pageX;
        moveY = e.pageY;
        if (startX > moveX && startX > moveX + dist) {
          moveRight();
        } else if (startX < moveX && startX + dist < moveX) {
          moveLeft();
        }
      });
    })();
  })();
})();
