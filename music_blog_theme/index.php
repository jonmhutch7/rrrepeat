<?php get_header(); ?>

<div class="featured">
	<a href="http://rrrepeat.com/rrrepeat-sxsw-2018-review" rel="bookmark" title="rrrepeat sxsw 2018 review">
		<span class="overlay"></span>
		<h2>rrrepeat sxsw 2018 review</h2>
		<h2>rrrepeat sxsw 2018 review</h2>
	</a>
</div>

<section id="content">
	<div id="inner-content" class="wrap cf">
		

		<?php if (have_posts()) : ?>
			<?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" transition="fade" progress_bar="true" progress_bar_color="0071bc" images_loaded="true" scroll_distance="50"]'); ?>
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
