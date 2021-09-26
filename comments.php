<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( '1' === $comments_number ) {
				/* translators: %s: post title */
				printf( _x( '1 Comment %s', '', 'pragyan' ), '' );
			} else {
				printf(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s Comment %2$s',
						'%1$s Comments %2$s',
						$comments_number,
						'',
						'pragyan'
					),
					number_format_i18n( $comments_number ),
					''
				);
			}
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => '<i class="fa fa-reply-all"></i> '. esc_html__( 'Reply', 'pragyan' ),
				) );
			?>
		</ol>

		<?php the_comments_pagination( array(
			'prev_text' => '<i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Previous', 'pragyan' ) . '</span>',
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next', 'pragyan' ) . '</span><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>',
		) );

	endif;

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'pragyan' ); ?></p>
	<?php
	endif;
	comment_form();
	?>

</div><!-- #comments -->

<?php


