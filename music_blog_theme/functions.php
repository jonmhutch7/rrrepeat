<?php

  function login_css() { wp_enqueue_style( 'login_css', get_template_directory_uri() . '/library/css/login.css', false ); }
  add_action( 'login_enqueue_scripts', 'login_css', 10 );

  function login_url() { return home_url(); }
  add_filter( 'login_headerurl', 'login_url' );

  function login_title() { return get_option( 'blogname' ); }
  add_filter( 'login_headertitle', 'login_title' );

  function head_cleanup() {
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    remove_action( 'wp_head', 'wp_generator' );
    add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 9999 );
    add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 9999 );
    add_action( 'template_redirect', 'digitalnomad_remove_date_archives' );
  }

  function digitalnomad_remove_date_archives() {

    //if we are on date archive page
    if ( is_date() ) {
        // theme sets alternatine archive page with table like list of all posts
        $archive_page = get_option( 'digitalnomad_archive_page' );
        if ( $archive_page ) {
            // redirs to alternatine archive page if configured (good for SEO)
            wp_redirect( esc_url( get_page_link( $archive_page ) ) );
            die();
        } else {
            // otherwise error 404 is displayed
            global $wp_query;
            $wp_query->set_404();
        }
    }
  }
  

  function rw_title( $title, $sep, $seplocation ) {
    global $page, $paged;
    if ( is_feed() ) return $title;
    if ( 'right' == $seplocation ) {
      $title .= get_bloginfo( 'name' );
    } else {
      $title = get_bloginfo( 'name' ) . $title;
    }
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
      $title .= " {$sep} {$site_description}";
    }
    if ( $paged >= 2 || $page >= 2 ) {
      $title .= " {$sep} " . sprintf( __( 'Page %s', 'dbt' ), max( $paged, $page ) );
    }
    return $title;
  }

  function rss_version() { return ''; }

  function remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
      $src = remove_query_arg( 'ver', $src );
    return $src;
  }

  function gallery_style($css) {
    return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
  }

  function load_scripts_and_styles() {
    if (!is_admin()) {
      wp_register_style( 'main-stylesheet', get_stylesheet_directory_uri() . '/library/css/style.css', array(), '', 'all' );
      wp_enqueue_style( 'main-stylesheet' );
      wp_register_script( 'main-js', get_stylesheet_directory_uri() . '/library/js/scripts.js');
      wp_enqueue_script( 'main-js' );
    }
  }

  /* THEME SUPPORT */
  function theme_support() {
    add_theme_support('automatic-feed-links');
    add_theme_support( 'post-formats',
      array(
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
      )
    );
    add_theme_support( 'html5', array(
      'search-form'
    ));
  }

  function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
  }

  function launch_custom_actions() {
    add_action( 'init', 'head_cleanup' );
    // add_filter( 'wp_title', 'rw_title', 10, 3 );
    add_filter( 'the_generator', 'rss_version' );
    add_filter( 'gallery_style', 'gallery_style' );
    add_action( 'wp_enqueue_scripts', 'load_scripts_and_styles', 999 );
    theme_support();
    add_filter( 'the_content', 'filter_ptags_on_images' );
  }

  add_action( 'after_setup_theme', 'launch_custom_actions' );


  /************* OEMBED SIZE OPTIONS *************/

  if ( ! isset( $content_width ) ) {
  	$content_width = 680;
  }

  /************* THUMBNAIL SIZE OPTIONS *************/
  add_image_size( 'thumb-600', 600, 150, true );
  add_image_size( 'thumb-300', 300, 100, true );

  add_filter( 'image_size_names_choose', 'custom_image_sizes' );

  function custom_image_sizes( $sizes ) {
      return array_merge( $sizes, array(
          'thumb-600' => __('600px by 150px'),
          'thumb-300' => __('300px by 100px'),
      ) );
  }

// Remove the admin bar from the front end
// add_filter( 'show_admin_bar', '__return_false' );


// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );


// Put post thumbnails into rss feed
function wpfme_feed_post_thumbnail($content) {
  global $post;
  if(has_post_thumbnail($post->ID)) {
    $content = '' . $content;
  }
  return $content;
}
add_filter('the_excerpt_rss', 'wpfme_feed_post_thumbnail');
add_filter('the_content_feed', 'wpfme_feed_post_thumbnail');


//create a permalink after the excerpt
function new_excerpt_more( $more ) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt_length( $length ) {
  return 45;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//custom excerpt length
function wpfme_custom_excerpt_length( $length ) {
  //the amount of words to return
  return 20;
}
add_filter( 'excerpt_length', 'wpfme_custom_excerpt_length');


// Call Googles HTML5 Shim, but only for users on old versions of IE
function wpfme_IEhtml5_shim () {
  global $is_IE;
  if ($is_IE)
  echo '<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->';
}
add_action('wp_head', 'wpfme_IEhtml5_shim');

add_filter( 'category_rewrite_rules', 'vipx_filter_category_rewrite_rules' );
function vipx_filter_category_rewrite_rules( $rules ) {
    $categories = get_categories( array( 'hide_empty' => false ) );

    if ( is_array( $categories ) && ! empty( $categories ) ) {
        $slugs = array();
        foreach ( $categories as $category ) {
            if ( is_object( $category ) && ! is_wp_error( $category ) ) {
                if ( 0 == $category->category_parent ) {
                    $slugs[] = $category->slug;
                } else {
                    $slugs[] = trim( get_category_parents( $category->term_id, false, '/', true ), '/' );
                }
            }
        }

        if ( ! empty( $slugs ) ) {
            $rules = array();

            foreach ( $slugs as $slug ) {
                $rules[ '(' . $slug . ')/feed/(feed|rdf|rss|rss2|atom)?/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')/(feed|rdf|rss|rss2|atom)/?$' ] = 'index.php?category_name=$matches[1]&feed=$matches[2]';
                $rules[ '(' . $slug . ')(/page/(\d+)/?)?$' ] = 'index.php?category_name=$matches[1]&paged=$matches[3]';
            }
        }
    }
    return $rules;
}


?>
