<?php get_header(); ?>

<section id="content">
	<div id="inner-content" class="wrap cf">
	<?php if (have_posts()) : ?>
		<?php
			$cat = get_category( get_query_var( 'cat' ) );
			$cat_slug = $cat->slug;

			echo do_shortcode('[ajax_load_more container_type="div" post_type="post" transition="fade" category="'.$cat_slug.'" progress_bar="true" progress_bar_color="0071bc" images_loaded="true" scroll_distance="50"]'); ?>
		<?php else : ?>
			<article id="post-not-found">
				<header class="article-header">
					<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
				</header>
			</article>
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
