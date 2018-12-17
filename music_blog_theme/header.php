<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' - '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' | '; } elseif (is_404()) { echo 'Not Found - '; } if (is_home()) { bloginfo('name'); echo ' | '; bloginfo('description'); } else { bloginfo('name'); } ?></title>
    </title>
    
    <?php 

      if (is_home()) { 
        $type = "blog";
        $description = "Blog for music listeners by music listeners. So good it's on repeat. If you'd like to contribute, connect with us on Facebook or Twitter.";
        $image = get_template_directory_uri(). "/library/images/poster.jpg";
      } else if (in_category('new-music')) {
        $album_art= get_field('album_art');
        $image = $album_art['sizes']['medium_large'];
        $title = get_the_title();
        $type = "article";
        $description = strip_tags($title). ". New Music from rrrepeat. So good it's on repeat. If you'd like to contribute, connect with us on Facebook or Twitter.";
      } else if (is_page('rrrepeat-best-albums-of-2017')) {
        $image = 'http://rrrepeat.com/wp-content/uploads/2017/12/best-2017-social.png';
        $date = the_date('F S Y');
        $type = "article";
        $description = "Some newcomers join the heavyweights like Kendrick Lamar and King Krule. This is the best of 2017.";
      } else if (in_category('reviews')) {
        $album_art= get_field('album_art');
        $image = $album_art['sizes']['medium_large'];
        $title = get_the_title();
        $type = "article";
        $description = strip_tags($title). ". Album reviews from rrrepeat. So good it's on repeat. If you'd like to contribute, connect with us on Facebook or Twitter. ";
      } else if (in_category('throwback')) {
        $album_art= get_field('album_art');
        $image = $album_art['sizes']['medium_large'];
        $title = get_the_title();
        $type = "article";
        $description = strip_tags($title). ". Throwbacks to the music that started it all from rrrepeat. So good it's on repeat. If you'd like to contribute, connect with us on Facebook or Twitter";
      } else {
        $image = get_template_directory_uri(). "/library/images/poster.jpg";
        $type = "article";
        $description = "Blog for music listeners by music listeners. So good it's on repeat. If you'd like to contribute, connect with us on Facebook or Twitter.";
      }
    ?>

    <meta name="description" content="<?php echo $description ?>">
    
    <meta property="og:url"                content="<?php echo 'http://'. $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />
    <meta property="og:type"               content="<?php echo $type ?>" />
    <meta property="og:title"              content="<?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' - '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' | '; } elseif (is_404()) { echo 'Not Found - '; } if (is_home()) { bloginfo('name'); echo ' | '; bloginfo('description'); } else { bloginfo('name'); } ?>" />
    <meta property="og:description"        content="<?php echo $description ?>" />
    <meta property="og:image"              content="<?php echo $image ?>" />

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>
    <!--[if IE]>
      <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
    <!-- Facebook Pixel Code -->
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '154676365255196');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=154676365255196&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
  </head>

  <body <?php body_class(); ?>>
    <header class="header">
      <div id="inner-header">
      
       <nav class="main-nav">
          <a href="<?php echo home_url(); ?>" class="logo" rel="nofollow">
            <img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="rrrepeat" >
          </a>
          <div class="nav-list-container">
            <ul>
              <?php wp_list_categories( array(
                  'orderby' => 'name',
                  'show_option_all' => 'All',
                  'title_li' => __( '' ),
                  'exclude' => array( 4,62 )
              ) ); ?>
              <span class="float-desktop">
                <li class="about">
                  <a href="/about">
                    About
                  </a>
                </li>
                <li class="social-icon">
                  <a href="https://open.spotify.com/user/rrrepeat" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/spotify.png" alt="Rrrepeat Spotify" />
                  </a>
                </li>
                <li class="social-icon">
                  <a href="https://www.facebook.com/rrrepeat" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/facebook.png" alt="Rrrepeat Facebook" />
                  </a>
                </li>
                <li class="social-icon">
                  <a href="https://www.twitter.com/rrrepeatblog" target="_blank"> 
                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/twitter.png" alt="Rrrepeat Twitter" />
                  </a>
                </li>
              </span>
            </ul>
          </div>
       </nav>
      </div>
    </header>
      
