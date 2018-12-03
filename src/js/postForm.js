module.exports = function() {
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
  };
