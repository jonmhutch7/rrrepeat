function respondify(){
  $('iframe[src*="spotify.com"]').each( function() {
    $(this).css('width',$(this).parent(1).css('width'));
    // $(this).attr('src',$(this).attr('src'));
  });
}

$(document).ready(function() {

  var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);

  if (iOS) {
    $('.music-links').remove();
  }

  if ($('body').hasClass('home')) {
    $('.cat-item-all').addClass('current-menu-item');
  }

  if (($('body').hasClass('single') && window.innerWidth < 769)) {
    $('iframe[src*="spotify.com"]').height('80px');
    respondify();
  }

  if (window.innerWidth < 600) {
    var width = $('.nav-list-container ul').width();
    $('.nav-list-container ul').css('min-width', width + 5)
  }

  if ($('body').hasClass('page-template-page-list')) {
    $('.main-list .album-art').on('click', function () {
        var iframe = $(this).attr('data-embed');
        var height = $(this).innerHeight();
        var width = $(this).innerWidth();
        $(this).html(iframe);
        $(this).addClass('clicked');
        $(this).removeClass('hover-active');
        $(this).children()[0].height = height;
        $(this).children()[0].width = width;
        return false;
    });

    setTimeout(function() {
      $.each($('.album-art'), function( i, val ) {
        setTimeout(function() {
          $(val).removeClass('hint');
        }, (i * 200));
      });
    }, 2000);
  }

  respondify();

});

$(window).resize(function() {
  respondify();
});

$(function() {
  $.fn.almComplete = function(alm){
    $('iframe[src*="spotify.com"]').height('80px');
    respondify();
  };
});
