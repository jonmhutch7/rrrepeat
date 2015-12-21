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

  respondify();

});

$(window).resize(function() {
  respondify();
});

