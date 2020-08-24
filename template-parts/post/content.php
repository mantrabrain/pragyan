<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<div class='post-formats-wrapper'>
			<?php the_post_thumbnail('pragyan-blog-image'); ?>
		</div>
		<div class="entry-content">
			<header class="entry-header">
					<?php pragyan_entry_meta(); ?>
					<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
			</header>
			<!-- .entry-header -->
			<div class="entry-summary">
				<?php
				the_excerpt();
				?>
			</div><!-- .entry-summary -->
			<div class="blog-btn pragyan-main-btn">
				<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More', 'pragyan'); ?></a>
			</div>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->

