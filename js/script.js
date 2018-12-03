/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/js/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/carousel.js":
/*!****************************!*\
  !*** ./src/js/carousel.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = function() {\n    var DOM = {\n      container: document.querySelector('.carousel'),\n      wrapper: document.querySelector('.carousel__wrapper'),\n      slides: document.querySelectorAll('.carousel__slide'),\n      pagination: document.querySelector('.carousel__pagination'),\n      nextButton: document.querySelector('.carousel__next'),\n      prevButton: document.querySelector('.carousel__prev')\n    };\n\n    // params\n    var constants = {};\n    var initPage = 1;\n    var marginMap = { 0: 8, 600: 20 };\n    var slidesPerViewMap = { 0: 1, 1100: 2, 1400: 3 }; // responsive min-width\n    var margin;\n    var slidesPerView;\n    var numSlides = DOM.slides.length;\n    var numPages;\n    function updateResponsive() {\n      var windowWidth = window.innerWidth;\n      for (var k in slidesPerViewMap) {\n        if (windowWidth >= k) {\n          slidesPerView = slidesPerViewMap[k];\n        }\n      }\n      for (var k in marginMap) {\n        if (windowWidth >= k) {\n          margin = marginMap[k];\n        }\n      }\n      numPages = Math.ceil(numSlides / slidesPerView);\n    }\n    updateResponsive();\n    DOM.wrapper.setAttribute('data-position', initPage);\n\n    // state\n    var states = {};\n    var currPage = initPage;\n    var sliderWidth;\n\n    // initialize: disable button\n    if (currPage === 1) {\n      DOM.prevButton.classList.add('carousel__prev--disabled');\n    } else if (currPage === numPages) {\n      DOM.nextButton.classList.add('carousel__next--disabled');\n    }\n\n    // initialize: generate pagination dots\n    for (var i = 0; i < numPages; i++) {\n      var dot = document.createElement('div');\n      dot.classList.add('carousel__dot');\n      if (i == initPage - 1) {\n        dot.classList.add('carousel__dot--active');\n      }\n      DOM.pagination.appendChild(dot);\n    }\n    DOM.dots = document.querySelectorAll('.carousel__dot');\n\n    // initialize: move initial position\n    function updatePosition() {\n      DOM.wrapper.style.transform =\n        'translateX(-' +\n        (sliderWidth + margin * 2) *\n          Math.min((currPage - 1) * slidesPerView, numSlides - slidesPerView) +\n        'px)';\n    }\n\n    function handleResize() {\n      sliderWidth = DOM.container.offsetWidth / slidesPerView - margin * 2;\n      for (var i = 0; i < DOM.slides.length; i++) {\n        var slide = DOM.slides[i];\n        slide.children[0].style.width = sliderWidth + 'px';\n      }\n      updatePosition();\n    }\n    handleResize();\n\n    // add event\n    window.addEventListener('resize', updateResponsive);\n    window.addEventListener('resize', handleResize);\n\n    function handleClickCommon(pageBeforeClick, pageAfterClick) {\n      DOM.dots[pageBeforeClick - 1].classList.remove('carousel__dot--active');\n      DOM.dots[pageAfterClick - 1].classList.add('carousel__dot--active');\n      updatePosition();\n    }\n\n    function moveRight() {\n      switch (currPage) {\n        case numPages:\n          return;\n        case numPages - 1:\n          DOM.nextButton.classList.add('carousel__next--disabled');\n          break;\n        case 1:\n          DOM.prevButton.classList.remove('carousel__prev--disabled');\n          break;\n      }\n      handleClickCommon(currPage, currPage + 1);\n      currPage++;\n      updatePosition();\n    }\n    function moveLeft() {\n      switch (currPage) {\n        case 1:\n          return;\n        case 2:\n          DOM.prevButton.classList.add('carousel__prev--disabled');\n          break;\n        case numPages:\n          DOM.nextButton.classList.remove('carousel__next--disabled');\n          break;\n      }\n      handleClickCommon(currPage, currPage - 1);\n      currPage--;\n      updatePosition();\n    }\n\n    // click\n    DOM.nextButton.addEventListener('click', moveRight);\n    DOM.prevButton.addEventListener('click', moveLeft);\n\n    // touch\n    (function() {\n      var startX, startY;\n      var moveX, moveY;\n      var dist = 30;\n      DOM.container.addEventListener('touchstart', function(e) {\n        e.preventDefault();\n        startX = e.touches[0].pageX;\n        startY = e.touches[0].pageY;\n      });\n      DOM.container.addEventListener('touchmove', function(e) {\n        e.preventDefault();\n        moveX = e.changedTouches[0].pageX;\n        moveY = e.changedTouches[0].pageY;\n      });\n      DOM.container.addEventListener('touchend', function(e) {\n        if (startX > moveX && startX > moveX + dist) {\n          moveRight();\n        } else if (startX < moveX && startX + dist < moveX) {\n          moveLeft();\n        }\n      });\n    })();\n\n    // drag\n    (function() {\n      var startX, startY;\n      var moveX, moveY;\n      var dist = 200;\n      DOM.container.addEventListener('mousedown', function(e) {\n        e.preventDefault();\n        console.log(e);\n        startX = e.pageX;\n        startY = e.pageY;\n      });\n      DOM.container.addEventListener('mouseup', function(e) {\n        e.preventDefault();\n        console.log(e);\n        moveX = e.pageX;\n        moveY = e.pageY;\n        if (startX > moveX && startX > moveX + dist) {\n          moveRight();\n        } else if (startX < moveX && startX + dist < moveX) {\n          moveLeft();\n        }\n      });\n    })();\n  };\n\n\n//# sourceURL=webpack:///./src/js/carousel.js?");

/***/ }),

/***/ "./src/js/disableBgAttach.js":
/*!***********************************!*\
  !*** ./src/js/disableBgAttach.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = function() {\n  if (isIOS()) {\n      var hero = document.querySelector('.hero-wrapper');\n      hero.classList.remove('hero-wrapper--paraxify');\n      var photo = document.querySelector('.about-container__img');\n      hero.classList.remove('about-container__img--paraxify');\n  }\n};\n\nfunction isIOS() {\n  let userAgent = window.navigator.userAgent.toLowerCase();\n  if (userAgent.match(/(iphone|ipod|ipad)/)) {\n    return true;\n  }\n  return false;\n}\n\n\n//# sourceURL=webpack:///./src/js/disableBgAttach.js?");

/***/ }),

/***/ "./src/js/disableIe.js":
/*!*****************************!*\
  !*** ./src/js/disableIe.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = function() {\n  if (isIE()) {\n    var wrapper = document.querySelector('.wrapper');\n    for (var i = 0; i < wrapper.children.length; i++) {\n      wrapper.children[i].style.display = 'none';\n    }\n    wrapper.innerHTML =\n      '<div style=\"font-size: 30px; padding: 50px;\">Internet Explorerには非対応のため他のブラウザで閲覧ください。</div>';\n  }\n};\n\nfunction isIE() {\n  let userAgent = window.navigator.userAgent.toLowerCase();\n  if (userAgent.indexOf('msie') !== -1 || userAgent.indexOf('trident') !== -1) {\n    return true;\n  }\n  return false;\n}\n\n\n//# sourceURL=webpack:///./src/js/disableIe.js?");

/***/ }),

/***/ "./src/js/hamburger.js":
/*!*****************************!*\
  !*** ./src/js/hamburger.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = function() {\n    var hamburger = document.querySelector('.hamburger');\n    var navbar = document.querySelector('.navbar-wrapper');\n    var navbarList = document.querySelector('.navbar-wrapper__list');\n    var navbarItems = document.querySelectorAll('.navbar-wrapper__item>a');\n\n    var hcls = 'hamburger--open';\n    var ncls = 'navbar-wrapper--open';\n    var nlcls = 'navbar-wrapper__list--open';\n    hamburger.addEventListener('click', function() {\n      if (hamburger.classList.contains(hcls)) {\n        hamburger.classList.remove(hcls);\n        navbar.classList.remove(ncls);\n        navbarList.classList.remove(nlcls);\n      } else {\n        hamburger.classList.add(hcls);\n        navbar.classList.add(ncls);\n        navbarList.classList.add(nlcls);\n      }\n    });\n    for (var i = 0; i < navbarItems.length; i++) {\n      var item = navbarItems[i];\n      item.addEventListener('click', function() {\n        hamburger.classList.remove(hcls);\n        navbar.classList.remove(ncls);\n        navbarList.classList.remove(nlcls);\n      });\n    }\n  };\n\n\n//# sourceURL=webpack:///./src/js/hamburger.js?");

/***/ }),

/***/ "./src/js/index.js":
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./disableIe.js */ \"./src/js/disableIe.js\")();\n__webpack_require__(/*! ./disableBgAttach.js */ \"./src/js/disableBgAttach.js\")();\n__webpack_require__(/*! ./waypoint.js */ \"./src/js/waypoint.js\")();\n__webpack_require__(/*! ./lazyLoad.js */ \"./src/js/lazyLoad.js\")();\n__webpack_require__(/*! ./hamburger.js */ \"./src/js/hamburger.js\")();\n__webpack_require__(/*! ./postForm.js */ \"./src/js/postForm.js\")();\n__webpack_require__(/*! ./carousel.js */ \"./src/js/carousel.js\")();\n\n\n//# sourceURL=webpack:///./src/js/index.js?");

/***/ }),

/***/ "./src/js/lazyLoad.js":
/*!****************************!*\
  !*** ./src/js/lazyLoad.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = function() {\n  var imagesCont = document.querySelector('.photos-container');\n  var images = document.querySelectorAll('.photos-container__img');\n  var timer;\n  var interval = 300;\n  imagesCont.style.display = 'none';\n  for (var i = 0; i < images.length; i++) {\n    var img = images[i];\n    var src = img.getAttribute('data-src');\n    img.setAttribute('src', src);\n    img.addEventListener('load', function() {\n      if (timer) {\n        clearTimeout(timer);\n      }\n      timer = setTimeout(function() {\n        imagesCont.style.display = 'block';\n      }, interval);\n      this.removeAttribute('data-src');\n    });\n  }\n};\n\n\n//# sourceURL=webpack:///./src/js/lazyLoad.js?");

/***/ }),

/***/ "./src/js/postForm.js":
/*!****************************!*\
  !*** ./src/js/postForm.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = function() {\n    var DOM = {\n      form: document.querySelector('.contact-form'),\n      modal: document.querySelector('.modal'),\n      modalOuter: document.querySelector('.modal__outer'),\n      modalInner: document.querySelector('.modal__inner'),\n      modalName: document.querySelector('.modal-container__value--name'),\n      modalEmail: document.querySelector('.modal-container__value--email'),\n      modalMessage: document.querySelector('.modal-container__value--message'),\n      modalStateBefore: document.querySelector('.modal__state--before'),\n      modalStateAfter: document.querySelector('.modal__state--after'),\n      spinnerOuter: document.querySelector('.spinner__outer'),\n      spinnerDraw: document.querySelector('.spinner__draw'),\n      spinnerMessage: document.querySelector('.spinner__message'),\n      confirmBtn: document.querySelector('.contact-form__btn'),\n      submitBtn: document.querySelector('.modal__btn--submit'),\n      cancelBtn: document.querySelector('.modal__btn--cancel')\n    };\n    // show modal when form button clicked\n    DOM.form.addEventListener('submit', function(e) {\n      e.preventDefault();\n      e.target.checkValidity();\n      DOM.modal.style.display = 'block';\n      DOM.confirmBtn.classList.add('btn--filled');\n\n      // copy form value\n      DOM.modalName.innerText = DOM.form.name.value;\n      DOM.modalEmail.innerText = DOM.form.email.value;\n      DOM.modalMessage.innerText = DOM.form.message.value;\n    });\n\n    // disable event on inside of modal\n    DOM.modalInner.addEventListener('click', function(e) {\n      e.stopPropagation();\n    });\n\n    function modalClose() {\n      DOM.modal.style.display = 'none';\n      DOM.confirmBtn.classList.remove('btn--filled');\n    }\n\n    // hide modal if outside of modal clicked\n    DOM.modalOuter.addEventListener('click', modalClose);\n\n    // submit on modal\n    var readyToSend = true;\n    DOM.submitBtn.addEventListener('click', function(e) {\n      if (readyToSend) {\n        readyToSend = false;\n        DOM.modalOuter.removeEventListener('click', modalClose); // disable close by clicking outside\n\n        // xhr request\n        var xhr = new XMLHttpRequest();\n        var uri = DOM.form.getAttribute('action');\n        xhr.open('POST', uri);\n        xhr.setRequestHeader(\n          'content-type',\n          'application/x-www-form-urlencoded; charset=UTF-8'\n        );\n        var postContent =\n          'name=' +\n          DOM.form.name.value +\n          '&email=' +\n          DOM.form.email.value +\n          '&message=' +\n          DOM.form.message.value +\n          '&csrf_token=' +\n          DOM.form.csrf_token.value;\n\n        xhr.send(postContent);\n        DOM.modalStateBefore.style.display = 'none';\n        DOM.modalStateAfter.style.display = 'flex';\n\n        var interval = 5000;\n        xhr.addEventListener('readystatechange', function HandleStateChange() {\n          if (this.readyState === 4) {\n            readyToSend = true;\n            if (xhr.status == 200) {\n              DOM.spinnerOuter.classList.add('spinner__outer--success');\n              DOM.spinnerDraw.classList.add('spinner__draw--success');\n              DOM.spinnerMessage.innerText =\n                'Succeed. Refresh in ' + Math.round(interval / 1000) + 's...';\n              setTimeout(function() {\n                window.location.reload(true);\n              }, interval);\n            } else {\n              DOM.spinnerOuter.classList.add('spinner__outer--failed');\n              DOM.spinnerDraw.classList.add('spinner__draw--failed');\n              DOM.spinnerMessage.innerText =\n                'Failed. Refresh in ' + Math.round(interval / 1000) + 's...';\n              setTimeout(function() {\n                window.location.reload(true);\n              }, interval);\n            }\n          }\n        });\n      }\n    });\n\n    // cancel on modal\n    DOM.cancelBtn.addEventListener('click', modalClose);\n  };\n\n\n//# sourceURL=webpack:///./src/js/postForm.js?");

/***/ }),

/***/ "./src/js/waypoint.js":
/*!****************************!*\
  !*** ./src/js/waypoint.js ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = function() {\n  var wp = document.querySelector('#about');\n  var wpTop = wp.offsetTop;\n  var targets = ['navbar-wrapper', 'go-to-top'];\n  window.addEventListener('scroll', function() {\n    for (var i = 0; i < targets.length; i++) {\n      var name = targets[i];\n      var nameWp = name + '--waypoint-on';\n      var e = document.querySelector('.' + name);\n      if (e.classList.contains(nameWp)) {\n        if (window.pageYOffset <= wpTop) {\n          e.classList.remove(nameWp);\n        }\n      } else {\n        if (window.pageYOffset >= wpTop) {\n          e.classList.add(nameWp);\n        }\n      }\n    }\n  });\n};\n\n\n//# sourceURL=webpack:///./src/js/waypoint.js?");

/***/ })

/******/ });