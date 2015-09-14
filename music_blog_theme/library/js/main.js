$(document).ready(function() {
  $('.mobile-menu-button').click(function(){
      $('nav.main-nav ul').toggleClass('nav-toggle');
  });

  $('.location-marker.Kuwait').hover(
    function() {
      $(".location-container.Kuwait").addClass('hover');
      $(".location-container.Oman, .location-container.California").removeClass('hover');
    }, function() {
    	return false;
    }
  );
  $('.location-marker.Oman').hover(
    function() {
      $(".location-container.Oman").addClass('hover');
      $(".location-container.Kuwait, .location-container.California").removeClass('hover');
    }, function() {
    	return false;
    }
  );
  $('.location-marker.California').hover(
    function() {
      $(".location-container.California").addClass('hover');
      $(".location-container.Oman, .location-container.Kuwait").removeClass('hover');
    }, function() {
    	return false;
    }
  );

  $('span.metric').click(function() {
    $('img.imperial, div.imperial').hide();
    $('img.metric, div.metric').show();
    $('span.imperial').removeClass('active');
    $(this).addClass('active');
  });

  $('span.imperial').click(function() {
    $('img.metric, div.metric').hide();
    $('img.imperial, div.imperial').show();
    $('span.metric').removeClass('active');
    $(this).addClass('active');
  });

  $('li.tab').click(function(e) {
    var tab = $(e.currentTarget).attr('data-label');

    $('article.main-content, .sidebar').addClass('hidden');
    $('article.' + tab +', .sidebar.' + tab).removeClass('hidden');

    $('.tab').removeClass('active');
    $(e.currentTarget).addClass('active');
  });

  $('select#country-selector').on('change', function() {
    var value = $('select#country-selector option:selected').val();
    
    $('div.job-container').hide();

    if (value == 'Kuwait') {
      $('div.job-container.Kuwait').show();
    }

    if (value == 'USA') {
      $('div.job-container.USA').show();
    }

    if (value == 'Oman') {
      $('div.job-container.Oman').show();
    }

    if (value == 'all') {
      $('div.job-container').show();
    }

  });

  $('.download-info img, .download-info .media-label').on('click', function(e) {
    var el = $(e.currentTarget);
    var parent = el.parent().parent();
    $(parent).children('.download-form-container').toggleClass('show-form');
  });

  $('.faq-title').on('click', function(e) {
    var el = $(e.currentTarget);
    var parent = el.parent();

    parent.find('.faq-text').toggleClass('show');

  });

});