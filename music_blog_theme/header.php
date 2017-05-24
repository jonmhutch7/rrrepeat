<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if (function_exists('is_tag') && is_tag()) { echo 'Tag Archive for &quot;'.$tag.'&quot; - '; } elseif (is_archive()) { wp_title(''); echo ' Archive - '; } elseif (is_search()) { echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; } elseif (!(is_404()) && (is_single()) || (is_page())) { wp_title(''); echo ' - '; } elseif (is_404()) { echo 'Not Found - '; } bloginfo('name'); ?>
    </title>
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
      
