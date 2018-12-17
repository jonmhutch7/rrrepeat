<?php /* Template Name: List Page Template */ ?>

<?php get_header(); ?>

<section id="content">
  <div id="inner-content" class="wrap cf">
    <main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
          <header class="article-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </header>
          <section class="entry-content cf" itemprop="articleBody">
            
            <?php if( have_rows('list_items') ): ?>
              <div class="main-list">
                <ul>
                  <?php while ( have_rows('list_items') ) : the_row(); ?>
                    <li class="list-item">
                      <?php 
                        $album_art = get_sub_field('artwork');
                        if (!empty($album_art)) {
                          $album_art_url = $album_art['sizes']['large'];
                        } else {
                          $album_art_url = get_sub_field('artwork_url');
                        }
                        if( !empty($album_art_url) ): 
                      ?>
                        <div class="album-art hover-active hint" data-embed="<?php the_sub_field('embed_code'); ?>">
                          <img src="<?php echo $album_art_url ?>" alt="">
                        </div>
                      <?php endif; ?>
                      <div class="info <?php if( empty($album_art_url) ): ?>no-album-art<?php endif; ?>">
                        <h2>
                          <a href="<?php the_sub_field('songlink_link'); ?>">
                            <?php
                              $post_title = get_sub_field('title');
                              $song_title = trim(substr($post_title, 0, strrpos($post_title, '-', 0))); 
                              $song_artist = str_replace("- ","",trim(substr($post_title, strrpos($post_title, '-', 0), strlen($post_title))));
                            ?>
                          <b><?php echo $song_title ?></b> <?php echo trim($song_artist) ?></a></h2>
                        <p><?php the_sub_field('description'); ?></p>
                       
                      </div>
                    </li>
                  <?php endwhile; ?>
                </ul>
              </div>
            <?php endif; ?>

            <?php if( have_rows('small_list_items') ): ?>
              <div class="small-list">
                <h2>Honorable Mentions</h2>
                <ul>
                  <?php while ( have_rows('small_list_items') ) : the_row(); ?>
                    <li class="list-item">
                      <div class="album-art" data-embed="<?php the_sub_field('embed_code'); ?>">
                        <?php 
                          $album_art= get_sub_field('artwork');
                          $album_art_url = $album_art['sizes']['thumbnail'];
                        ?>
                        <img src="<?php echo $album_art_url ?>" alt="">
                      </div>
                      <div class="info">
                        <h3>
                          <a href="<?php the_sub_field('songlink_link'); ?>">
                            <?php
                              $post_title = get_sub_field('title');
                              $song_title = trim(substr($post_title, 0, strrpos($post_title, '-', 0))); 
                              $song_artist = str_replace("- ","",trim(substr($post_title, strrpos($post_title, '-', 0), strlen($post_title))));
                            ?>
                            <b><?php echo $song_title ?></b> <?php echo trim($song_artist) ?>
                          </a>
                        </h3>
                      </div>
                    </li>
                  <?php endwhile; ?>
                </ul>
              </div>
            <?php endif; ?>
            
            <?php $conclusion_p = get_sub_field('conclusion'); ?>
            <?php if( !empty($conclusion_p) ): ?>
              <p><?php the_sub_field('$conclusion_p'); ?></p>
            <?php endif; ?> 

          </section>
        </article>
      <?php endwhile; else : ?>
        <article id="post-not-found" class="hentry cf">
        Not Found
        </article>
      <?php endif; ?>
    </main>
  </div>
</section>

<?php get_footer(); ?>
