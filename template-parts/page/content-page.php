<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-inner-wrap">
    	<?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
		<?php endif; ?>
        <div class="entry-content">
            <?php
                the_content();

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pragyan' ),
                    'after'  => '</div>',
                ) );
            ?>
        </div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->
