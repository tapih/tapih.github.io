module.exports = function() {
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
    var marginMap = { 0: 8, 600: 20 };
    var slidesPerViewMap = { 0: 1, 1100: 2, 1400: 3 }; // responsive min-width
    var margin;
    var slidesPerView;
    var numSlides = DOM.slides.length;
    var numPages;
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
      numPages = Math.ceil(numSlides / slidesPerView);
    }
    updateResponsive();
    DOM.wrapper.setAttribute('data-position', initPage);

    // state
    var states = {};
    var currPage = initPage;
    var sliderWidth;

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
    function updatePosition() {
      DOM.wrapper.style.transform =
        'translateX(-' +
        (sliderWidth + margin * 2) *
          Math.min((currPage - 1) * slidesPerView, numSlides - slidesPerView) +
        'px)';
    }

    function handleResize() {
      sliderWidth = DOM.container.offsetWidth / slidesPerView - margin * 2;
      for (var i = 0; i < DOM.slides.length; i++) {
        var slide = DOM.slides[i];
        slide.children[0].style.width = sliderWidth + 'px';
      }
      updatePosition();
    }
    handleResize();

    // add event
    window.addEventListener('resize', updateResponsive);
    window.addEventListener('resize', handleResize);

    function handleClickCommon(pageBeforeClick, pageAfterClick) {
      DOM.dots[pageBeforeClick - 1].classList.remove('carousel__dot--active');
      DOM.dots[pageAfterClick - 1].classList.add('carousel__dot--active');
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
  };
