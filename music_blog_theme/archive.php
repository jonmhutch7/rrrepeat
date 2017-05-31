<?php get_header(); ?>

<div id="inner-content" class="wrap cf">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part( 'list', 'article' ); ?>
	<?php endwhile; ?>
	<?php else : ?>
		<article id="post-not-found">
			<header class="article-header">
				<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
			</header>
		</article>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
