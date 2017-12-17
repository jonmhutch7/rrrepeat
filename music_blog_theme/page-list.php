<?php /* Template Name: List Page Template */ ?>

<?php get_header(); ?>

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
              <ul>
                <?php while ( have_rows('list_items') ) : the_row(); ?>
                  <li class="list-item">
                    <div class="album-art hint" data-embed="<?php the_sub_field('embed_code'); ?>">
                      <?php 
                        $album_art= get_sub_field('artwork');
                        $album_art_url = $album_art['sizes']['large'];
                      ?>
                      <img src="<?php echo $album_art_url ?>" alt="">
                    </div>
                    <div class="info">
                      <h2>
                        <?php
                          $post_title = get_sub_field('title');
                          $song_title = trim(substr($post_title, 0, strrpos($post_title, '-', 0))); 
                          $song_artist = trim(substr($post_title, strrpos($post_title, '-', 0), strlen($post_title)));
                        ?>
                        <b><?php echo $song_title ?></b> <?php echo trim($song_artist) ?></h2>
                      <p><?php the_sub_field('description'); ?></p>
                    </div>
                  </li>
                <?php endwhile; ?>
              </ul>
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

<?php get_footer(); ?>
