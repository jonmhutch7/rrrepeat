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
        $image = get_field('album_art');
        $title = get_the_title();
        $type = "article";
        $description = strip_tags($title). ". New Music from rrrepeat. So good it's on repeat. If you'd like to contribute, connect with us on Facebook or Twitter.";
      } else if (in_category('weekly')) {
        $image = get_field('album_art');
        $date = the_date('F S Y');
        $type = "article";
        $description = "Weekly Roundup from rrrepeat, ".$date.". So good it's on repeat. If you'd like to contribute, connect with us on Facebook or Twitter.";
      } else if (in_category('reviews')) {
        $image = get_field('album_art');
        $title = get_the_title();
        $type = "article";
        $description = strip_tags($title). ". Album reviews from rrrepeat. So good it's on repeat. If you'd like to contribute, connect with us on Facebook or Twitter. ";
      } else if (in_category('throwback')) {
        $image = get_field('album_art');
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
              ) ); ?>
              <span class="float-desktop">
                <li class="about">
                  <a href="/about">
                    About
                  </a>
                </li>
                <li class="social-icon">
                  <a href="https://www.facebook.com/rrrepeat" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/facebook.png" alt="rrrepeat" />
                  </a>
                </li>
                <li class="social-icon">
                  <a href="https://www.twitter.com/rrrepeatblog" target="_blank"> 
                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/twitter.png" alt="rrrepeat" />
                  </a>
                </li>
              </span>
            </ul>
          </div>
       </nav>
      </div>
    </header>

    <section id="content">
      
