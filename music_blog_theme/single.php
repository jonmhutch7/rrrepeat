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
			<div class="music-links">
				<?php
					$apple = get_field('apple_music_link');
					$spotify = get_field('spotify_link');
					$youtube = get_field('youtube_link');
					$google = get_field('google_play_link');
					$soundcloud = get_field('soundcloud_link');
				?>

				<ul>
					<li><h2>Find it on:</h2></li>
					<?php if (!empty($apple)) : ?>
						<li>
							<a target="_blank" href="<?php echo $apple; ?>">Apple Music</a>
						</li>
					<?php endif; ?>
					<?php if (!empty($spotify)) : ?>
						<li>
							<a target="_blank" href="<?php echo $spotify; ?>">Spotify</a>
						</li>
					<?php endif; ?>
					<?php if (!empty($youtube)) : ?>
						<li>
							<a target="_blank" href="<?php echo $youtube; ?>">Youtube</a>
						</li>
					<?php endif; ?>
					<?php if (!empty($google)) : ?>
						<li>
							<a target="_blank" href="<?php echo $google; ?>">Google Play</a>
						</li>
					<?php endif; ?>
					<?php if (!empty($soundcloud)) : ?>
						<li>
							<a target="_blank" href="<?php echo $soundcloud; ?>">Soundcloud</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
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
					<div class="contrib-one">
						<p>
							<?php the_field('contributor_one_text') ?>
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
									<b>-</b> <?php	echo $firstName; ?> <?php	echo $lastName; ?>
								</a>
							</div>
						</div>
					</div>
					<div class="contrib-two">
						<p>
							<?php the_field('contributor_two_text') ?>
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
									<b>-</b> <?php	echo $firstName; ?> <?php	echo $lastName; ?>
								</a>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>
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
