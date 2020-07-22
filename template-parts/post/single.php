<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrapper">
		<?php if (has_post_thumbnail()) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('full'); ?>
			</div>
		<?php endif; ?>

		<div class="entry-content">
			<header class="entry-header">
				<?php
				pragyan_entry_meta();

				if (!is_singular()) { ?>
					<?php the_title(sprintf('<h2 class="entry-title">', esc_url(get_permalink())), '</h2>'); ?>
				<?php } ?>
			</header>
			<?php
			/* translators: %s: Name of current post */
			the_content(sprintf(
				__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'pragyan'),
				get_the_title()
			));

			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'pragyan'),
				'after' => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after' => '</span>',
			));
			?>
			<?php
			if (is_single()) {
				pragyan_entry_footer();
			}
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
