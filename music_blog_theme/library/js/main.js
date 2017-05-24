function respondify(){
  $('iframe[src*="embed.spotify.com"]').each( function() {
    $(this).css('width',$(this).parent(1).css('width'));
    $(this).attr('src',$(this).attr('src'));
  });
}

$(document).ready(function() {
  $('.mobile-menu-button').click(function(){
      $('nav.main-nav ul').toggleClass('nav-toggle');
  });

  if ($('body').hasClass('home')) {
    $('.cat-item-all').addClass('current-menu-item');
  }

  if ($('body').hasClass('home') || $('body').hasClass('category') || ($('body').hasClass('single') && window.innerWidth < 769)) {
    $('iframe[src*="embed.spotify.com"]').height('80px');
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

// <iframe width="100%" height="450" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/254453711&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
// <iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/254453711&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>