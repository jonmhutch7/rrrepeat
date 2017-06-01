function respondify(){
  $('iframe[src*="spotify.com"]').each( function() {
    $(this).css('width',$(this).parent(1).css('width'));
    $(this).attr('src',$(this).attr('src'));
  });
}

$(document).ready(function() {

  if ($('body').hasClass('home')) {
    $('.cat-item-all').addClass('current-menu-item');
  }

  if ($('body').hasClass('home') || $('body').hasClass('category') || ($('body').hasClass('single') && window.innerWidth < 769)) {
    $('iframe[src*="spotify.com"]').height('80px');
  }

  if (window.innerWidth < 600) {
    var width = $('.nav-list-container ul').width();
    $('.nav-list-container ul').css('min-width', width + 5)
  }

  respondify();

});

$(window).resize(function() {
  respondify();
});
