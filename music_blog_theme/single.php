<?php get_header(); ?>

<div id="inner-content" class="wrap cf">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
		<div class="album-art">
			
			<header class="article-header">
				<span class="category-name">
					<?php
						$cats = get_the_category();
						$cat_name = $cats[0]->name;
						echo $cat_name;
					?>
				</span>
				<h1>
					<?php the_title(); ?>
				</h1>
				<?php
					$author_id = $post->post_author;
					$handle = get_field('twitter_handle', 'user_' . $author_id);
				?>
				<div class="author-name">
					<a target="_blank" href="https://twitter.com/<?php echo $handle; ?>">
						<b>by</b> <?php echo get_the_author_meta( 'first_name' ); ?> <?php echo get_the_author_meta( 'last_name' ); ?>
					</a>
				</div>
			</header>
			<div class="music-embed">
				<?php
					$platform = get_field('embed_from');
					if ($platform == 'Soundcloud') {
						echo get_field('soundcloud_article_embed');
					} else {
						echo get_field('spotify_embed');
					}
				?>		
			</div>
			<?php $spotify = get_field('spotify_link'); ?>
			<?php if (!empty($spotify)) : ?>
				<div class="music-links">
					<iframe height="100" src="https://song.link/embed?url=<?php echo $spotify; ?>" frameborder="0" allowtransparency allowfullscreen></iframe>
				</div>
			<?php endif; ?>
		</div>
		<div class="scrolling-container">
			<section class="article-body">
				<?php the_content(); ?>
			</section>

			<?php
				$contrib_one = get_field('contributor_one');
				$contrib_two = get_field('contributor_two');
			?>

			<?php if (!empty($contrib_one) or !empty($contrib_two)) : ?>
				<section class="contributors">
					<span class="from-contribs">Contributors</span>

					<?php 
						$contribtext = get_field('contributor_one_text');
						if (!empty($contribtext)) 
					: ?>
					<div class="contrib-one">
						<p>
								<b>"</b><?php echo $contribtext ?><b>"</b>
						</p>
						<div class="author-item contributor">
							<?php
								$userId = $contrib_one['ID'];
								$user_info = get_userdata($userId);
								$firstName = $user_info->first_name;
								$lastName = $user_info->last_name;
								$handle = get_field('twitter_handle', 'user_'.$userId);
							?>
							<div class="author-name">
								<a target="_blank" href="https://twitter.com/<?php echo $handle; ?>">
										 <?php	echo $firstName; ?> <?php echo $lastName; ?>
								</a>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php 
						$contribtext = get_field('contributor_two_text');
						if (!empty($contribtext)) 
					: ?>
					<div class="contrib-two">
						<p>
								<b>"</b><?php echo $contribtext ?><b>"</b>
						</p>
						<div class="author-item contributor">
							<?php
								$userId = $contrib_two['ID'];
								$user_info = get_userdata($userId);
								$firstName = $user_info->first_name;
								$lastName = $user_info->last_name;
								$handle = get_field('twitter_handle', 'user_'.$userId);
							?>
							<div class="author-name">
								<a target="_blank" href="https://twitter.com/<?php echo $handle; ?>">
										 <?php	echo $firstName; ?> <?php echo $lastName; ?>
								</a>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</section>
			<?php endif; ?>

			<?php 
				$orig_post = $post;
				global $post;
				$tags = wp_get_post_tags($post->ID);
				if ($tags) {
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
						$args=array(
							'tag__in' => $tag_ids,
							'post__not_in' => array($post->ID),
							'posts_per_page'=>4, // Number of related posts that will be shown.
							'caller_get_posts'=>1
						);
						$my_query = new wp_query( $args );
						if( $my_query->have_posts() ) {
							echo '<div class="related-posts"><ul><h2>More music like this...</h2>';
							while( $my_query->have_posts() ) {
								$my_query->the_post(); ?>
									<li>
										<div class="related-thumb">
											<a href="<? the_permalink()?>" title="<?php the_title(); ?>">
												<?php 
													$album_art= get_field('album_art');
													$album_art_url = $album_art['sizes']['thumbnail'];
												?>
												<img src="<?php echo $album_art_url ?>" />
											</a>
										</div>
										<div class="related-content">
											<a href="<? the_permalink()?>" title="<?php the_title(); ?>">
												<?php
													$thetitle = $post->post_title; /* or you can use get_the_title() */
													$getlength = strlen($thetitle);
													$thelength = 27;
													echo substr($thetitle, 0, $thelength);
													if ($getlength > $thelength) echo "...";
												?>	
											</a>
										</div>
									</li>
							<? }
							echo '</ul></div>';
						}
					}
				
				$post = $orig_post;
				wp_reset_query(); 
			?>

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
						<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
				</footer>
			</article>
	<?php endif; ?>
</div>


<?php get_footer(); ?>
