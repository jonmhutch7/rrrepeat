<?php get_header(); ?>

<section id="content">
	<div id="inner-content" class="wrap cf">

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">
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
				?>
				<div class="author-name">
						<b>by</b> <?php echo get_the_author_meta( 'first_name', $author_id ); ?> <?php echo get_the_author_meta( 'last_name', $author_id ); ?>
				</div>
			</header>
			<div class="album-art">
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
				<?php $streaming_service_link = get_field('streaming_service_link'); ?>
				<?php if (!empty($streaming_service_link)) : ?>
					<div class="music-links">
						<iframe height="100" src="https://song.link/embed?url=<?php echo $streaming_service_link; ?>" frameborder="0" allowtransparency allowfullscreen></iframe>
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
			</div>
		</article>
		
	</div>
</section>

<?php get_footer(); ?>
