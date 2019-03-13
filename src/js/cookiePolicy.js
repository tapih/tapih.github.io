module.exports = function() {
    if (!localStorage.getItem(gaAcceptedField)) {
        const container = document.querySelector('.cookie-policy');
        const acceptBtn = document.querySelector('.cookie-policy__btn--accept');
        const declineBtn = document.querySelector('.cookie-policy__btn--decline');

        function showContainer() {
            container.style.display = 'block';
        }
        function hideContainer() {
            container.style.display = 'none';
        }

        showContainer();
        acceptBtn.addEventListener('click', function() {
            localStorage.setItem(gaAcceptedField, 'accepted');
            enableTracking();
            hideContainer();
        });
        declineBtn.addEventListener('click', function() {
            hideContainer();
        });
    }
}
