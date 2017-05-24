<?php get_header(); ?>
<div id="inner-content" class="wrap cf">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<article class="home-article" role="article">
					<?php 
						$album_art= get_field('album_art');
					?>
					<header class="article-header with-background" style="background-image: url('<?php echo $album_art ?>')">
						<div class="max-width-container">
							<span class="date"><?php the_date(); ?></span>
							
							<h1>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php the_title(); ?>
								</a>
							</h1>
							<div class="info">
								<span class="category-name">
									<?php
										$cats = get_the_category();
										$cat_name = $cats[0]->name;
										echo $cat_name;
									?>
								</span>
								<span>from</span>
								<span class="author-name"><a target="_blank" href="https://twitter.com/<?php echo get_field('twitter_handle', 'user_1'); ?>"><?php the_author(); ?></a></span>
							</div>
							<div class="music-embed"><?php
									$platform = get_field('embed_from');
									if ($platform == 'Soundcloud') {
										echo get_field('home_page_embed');
									} else {
										echo get_field('embed_code');
									}
								?></div>
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

			<?php else : ?>

					<article id="post-not-found" class="hentry cf">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
						</footer>
					</article>

			<?php endif; ?>

</div>

<?php get_footer(); ?>
