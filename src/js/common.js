'use strict';

global.jQuery = require('jquery');
let svg4everybody = require('svg4everybody'),
  popup = require('jquery-popup-overlay'),
  iMask = require('imask');

jQuery(document).ready(function($) {
  // Toggle nav menu
  let toggleNav = function () {
    let toggle = $('.nav-toggle');
    let nav = $('.nav');
    let closeNav = $('.nav__close');
    let overlay = $('.nav-overlay');

    toggle.on('click', function (e) {
      e.preventDefault();
      toggle.toggleClass('is-active');
      nav.toggleClass('open');
      overlay.toggleClass('is-active');
    });

    closeNav.on('click', function (e) {
      e.preventDefault();
      toggle.removeClass('is-active');
      nav.removeClass('open');
      overlay.removeClass('is-active');
    });

    overlay.on('click', function (e) {
      e.preventDefault();
      toggle.removeClass('is-active');
      nav.removeClass('open');
      $(this).removeClass('is-active');
    });
  };

  // Modal
  let initModal = function() {
    $('.modal').popup({
      transition: 'all 0.3s',
      scrolllock: true,
      onclose: function() {
        $(this).find('label.error').remove();
        $(this).find('.wpcf7-response-output').hide();
      }
    });
  };

  // Input mask
  let inputMask = function() {
    let phoneInputs = $('input[type="tel"]');
    let maskOptions = {
      mask: '+{7} (000) 000-0000'
    };

    if (phoneInputs) {
      phoneInputs.each(function(i, el) {
        IMask(el, maskOptions);
      });
    }
  };

  // Header search
  let toggleHeaderSearch = function() {
    let btnOpen = $('.header-search__toggle');
    let btnClose = $('.header-search__close');
    let search = $('.header-search__wrap');

    btnOpen.click(function(e) {
      e.preventDefault();
      search.addClass('is-active');
    });

    btnClose.click(function(e) {
      e.preventDefault();
      search.removeClass('is-active');
    });
  };

  // Youtube Video Lazy Load
  function findVideos() {
    var videos = document.querySelectorAll('.video');

    for (var i = 0; i < videos.length; i++) {
      setupVideo(videos[i]);
    }
  }

  function setupVideo(video) {
    var link = video.querySelector('.video__link');
    var button = video.querySelector('.video__button');
    var text = video.querySelector('p');
    var id = parseMediaURL(link);

    video.addEventListener('click', function() {
      if (!this.classList.contains('video--dummy')) {
        var iframe = createIframe(id);

        link.remove();
        button.remove();
        if (text) {
          text.remove();
        }
        video.appendChild(iframe);
      }
    });

    var source = "https://img.youtube.com/vi/"+ id +"/maxresdefault.jpg";

    if (!video.querySelector('.video__media')) {
      var image = new Image();
      image.src = source;
      image.classList.add('video__media');

      image.addEventListener('load', function() {
        link.append( image );
      } (video) );
    }

    link.removeAttribute('href');
    video.classList.add('video--enabled');
  }

  function parseMediaURL(media) {
    var regexp = /^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/;
    var url = media.href;
    var match = url.match(regexp);

    return match[5];
  }

  function createIframe(id) {
    var iframe = document.createElement('iframe');

    iframe.setAttribute('allowfullscreen', '');
    iframe.setAttribute('allow', 'autoplay');
    iframe.setAttribute('src', generateURL(id));
    iframe.classList.add('video__media');

    return iframe;
  }

  function generateURL(id) {
    var query = '?rel=0&showinfo=0&autoplay=1';

    return 'https://www.youtube.com/embed/' + id + query;
  }


  toggleNav();
  initModal();
  inputMask();
  toggleHeaderSearch();
  findVideos();

  // SVG
  svg4everybody({});
});