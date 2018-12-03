module.exports = function() {
  if (isIE()) {
    var wrapper = document.querySelector('.wrapper');
    for (var i = 0; i < wrapper.children.length; i++) {
      wrapper.children[i].style.display = 'none';
    }
    wrapper.innerHTML =
      '<div style="font-size: 30px; padding: 50px;">Internet Explorerには非対応のため他のブラウザで閲覧ください。</div>';
  }
};

function isIE() {
  let userAgent = window.navigator.userAgent.toLowerCase();
  if (userAgent.indexOf('msie') !== -1 || userAgent.indexOf('trident') !== -1) {
    return true;
  }
  return false;
}
