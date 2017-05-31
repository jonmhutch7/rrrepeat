<article class="home-article" role="article">
	<?php 
		$album_art= get_field('album_art');
	?>
	<header class="article-header with-background" style="background-image: url('<?php echo $album_art ?>')">
		<div class="max-width-container">
			<span class="date">
				<?php
					$cats = get_the_category();
					$cat_name = $cats[0]->name;
					echo $cat_name;
				?>
				- 
				<?php the_date(); ?>
			</span>
			
			<h1>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>

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