<?php get_header(); ?>

<div id="inner-content" class="wrap cf">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article class="home-article" role="article">
		<?php 
			$album_art= get_field('album_art');
		?>
		<header class="article-header with-background" style="background-image: url('<?php echo $album_art ?>')">
			<div class="max-width-container">
				<span class="category-name">
					<?php
						$cats = get_the_category();
						$cat_name = $cats[0]->name;
						echo $cat_name;
					?>
				</span>
				<h1>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h1>
				<div class="music-embed">
					<?php
						echo get_field('embed_iframe');
					?>
				</div>
			</div>
		</header>

		<section class="article-body home-page">
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
						<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
				</footer>
			</article>

	<?php endif; ?>
</div>


<?php get_footer(); ?>
