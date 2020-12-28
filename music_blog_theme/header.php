<!DOCTYPE html>

<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' rel='stylesheet' type='text/css'>

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
      
