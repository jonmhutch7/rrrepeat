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
			</header>
			<img src="<?php the_field('album_art') ?>" alt="<?php the_title(); ?>">
		</div>
		<div class="scrolling-container">
				<div class="music-embed">
					<?php
						echo get_field('embed_iframe');
					?>
				</div>
				<section class="article-body">
					<div class="author-item">
						<?php 
							$img = get_field('image', 'user_1');
							$handle = get_field('twitter_handle', 'user_1');
						?>
						<span class="author-img"><img src="<?php echo $img['sizes']['thumbnail'] ?>" alt=""></span>
						<div class="author-info">
							<span class="author-name"><?php the_author(); ?></span>
							<span class="author-twitter"><a target="_blank" href="https://twitter.com/<?php echo $handle; ?>">@<?php echo $handle; ?></a></span>
						</div>
					</div>
					<?php the_content(); ?>
				</section>
			<?php if (in_category('3')) : ?>
				<section class="contributors">
					<span class="from-contribs">Our Contributors</span>
					<div class="contrib-one">
						<p>
							<?php	the_field('contributor_one_text') ?>
						</p>
						<div class="author-item contributor">
							<?php
								$user = get_field('contributor_one');
								$userId = $user['ID'];
								$userName = $user['display_name'];
								$img = get_field('image', 'user_'.$userId);
								$handle = get_field('twitter_handle', 'user_'.$userId);
							?>
							<span class="author-img"><img src="<?php echo $img['sizes']['thumbnail'] ?>" alt=""></span>
							<div class="author-info">
								<span class="author-name"><?php	echo $userName; ?></span>
								<span class="author-twitter"><a target="_blank" href="https://twitter.com/<?php echo $handle; ?>">@<?php echo $handle; ?></a></span>
							</div>
						</div>
					</div>
					<div class="contrib-two">
						<p>
							<?php	the_field('contributor_two_text') ?>
						</p>
						<div class="author-item contributor">
							<?php
								$user = get_field('contributor_two');
								$userId = $user['ID'];
								$userName = $user['display_name'];
								$img = get_field('image', 'user_'.$userId);
								$handle = get_field('twitter_handle', 'user_'.$userId);
							?>
							<span class="author-img"><img src="<?php echo $img['sizes']['thumbnail'] ?>" alt=""></span>
							<div class="author-info">
								<span class="author-name"><?php	echo $userName; ?></span>
								<span class="author-twitter"><a target="_blank" href="https://twitter.com/<?php echo $handle; ?>">@<?php echo $handle; ?></a></span>
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
