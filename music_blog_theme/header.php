<!doctype html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title(''); ?></title>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <!--[if IE]>
      <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="header">
      <div id="inner-header">
       <a href="<?php echo home_url(); ?>" class="logo" rel="nofollow">
        <img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="rrrepeat" >
       </a>
       <nav class="main-nav">
         <ul>
          <li><a href="">All</a></li>
          <li><a href="">New Music</a></li>
          <li><a href="">Throwback</a></li>
          <li><a href="">Reviews</a></li>
         </ul>
       </nav>
      </div>
      <div class="blur"></div>
    </header>

    <div id="container">
      
