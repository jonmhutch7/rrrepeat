<?php get_header(); ?>

<section id="content">
	<div id="inner-content" class="wrap cf">
			<?php if ( have_posts() ) : ?>
		
			<!-- Add the pagination functions here. -->
		
			<!-- Start of the main loop. -->
			<?php while ( have_posts() ) : the_post(); ?>
		
			<article class="home-article" role="article">
			<?php 
				$album_art= get_field('album_art');
				$album_art_url = $album_art['sizes']['medium_large'];
			?>
			<header class="article-header with-background" style="background-image: url('<?php echo $album_art_url ?>')">
				<div class="max-width-container">
					<span class="date">
						<?php
							$cats = get_the_category();
							$cat_name = $cats[0]->name;
							echo $cat_name;
						?>
						- 
						<?php echo get_the_date('F j, Y'); ?>
					</span>
					
					<h1>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</h1>

					<div class="music-embed">
						<?php
							$platform = get_field('embed_from');
							
							if ($platform == 'Soundcloud') {
								echo get_field('home_page_embed');
							} else {
								echo get_field('spotify_embed');
							}

						?>
					</div>
				</div>
			</header>

			<section class="article-body home-page">
				<?php the_excerpt(); ?>
			</section>

			<div class="continue">
				<a href="<?php the_permalink() ?>">Continue Reading</a>
			</div>

		</article>
		
			<?php endwhile; ?>
			<!-- End of the main loop -->
		
			<!-- Add the pagination functions here. -->
		
		
			<?php the_posts_pagination( array(
							'mid_size'  => 2,
							'prev_text' => __( 'Back', 'textdomain' ),
							'next_text' => __( 'Next', 'textdomain' ),
						) ); ?>
		
		<?php else : ?>
		
		<?php _e('Sorry, no posts matched your criteria.'); ?>
		
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
