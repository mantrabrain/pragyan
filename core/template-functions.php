<?php
if (!function_exists('pragyan_entry_meta')) :

	function pragyan_entry_meta()
	{

		if (is_single()) {
			$author_show = (boolean)pragyan_get_option('single_post_author_show');
			$date_show = (boolean)pragyan_get_option('single_post_date_show');
			$category_show = (boolean)pragyan_get_option('single_post_category_show');
			$comment_show = (boolean)pragyan_get_option('single_post_comment_show');
		} else {
			$author_show = (boolean)pragyan_get_option('blog_author_show');
			$date_show = (boolean)pragyan_get_option('blog_date_show');
			$category_show = (boolean)pragyan_get_option('blog_category_show');
			$comment_show = (boolean)pragyan_get_option('blog_comment_show');
		}


		if ($author_show || $date_show || $category_show || $comment_show) : ?>
			<ul class="entry-meta list-inline">

				<?php if ($date_show == true): ?>
					<?php pragyan_posted_date(); ?>
				<?php endif; ?>

				<?php if ($author_show == true): ?>
					<?php if ('post' === get_post_type()): pragyan_posted_author(); endif; ?>
				<?php endif; ?>

				<?php if ($comment_show == true): ?>
					<li class="meta-comment list-inline-item">
						<?php $pragyan_comment_link = get_comments_link();
						$num_comments = get_comments_number();
						if ($num_comments == 0) {
							$comments = esc_html__('No Comments', 'pragyan');
						} elseif ($num_comments > 1) {
							$comments = $num_comments . esc_html__(' Comments', 'pragyan');
						} else {
							$comments = esc_html__('1 Comment', 'pragyan');
						}
						?>

						<a href="<?php echo esc_url($pragyan_comment_link); ?>"><i
								class="fa fa-comment"></i><?php echo esc_html($comments); ?></a>
					</li>
				<?php endif; ?>

				<?php if (has_category() && $category_show == true):
					echo '<li class="meta-categories list-inline-item"><i class="fa fa-folder"></i>';
					the_category(', ');
					echo '</li>';
				endif; ?>
			</ul>
		<?php endif; ?>
		<?php
	}
endif;

function pragyan_author_link()
{
	return sprintf(
		esc_html__('Theme by %s', 'pragyan'),
		'<a href="' . esc_url('https://mantrabrain.com') . '" target="_blank" title="' . esc_attr__('Mantrabrain', 'pragyan') . '" >' . esc_html__('Mantrabrain', 'pragyan') . '</a>'
	);
}

function pragyan_footer_text()
{
	$allowed_tags = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			'class' => array(),
			'target' => array()
		)
	);

	$footer_text = pragyan_get_option('copyright_text') . ' | ' . pragyan_author_link();

	echo wp_kses(apply_filters('pragyan_footer_copyright_text', $footer_text), $allowed_tags);
}

if (!function_exists('pragyan_custom_logo')) {

	function pragyan_custom_logo()
	{
		global $post;

		$post_id = isset($post->ID) ? $post->ID : 0;

		$logo = get_post_meta($post_id, 'pragyan_single_logo', true);


		if (absint($logo) > 0) {

			$img_src = wp_get_attachment_image_src($logo, 'full');

			echo '<a href="' . home_url() . '" class="custom-logo-link" rel="home"><img src="' . $img_src[0] . '" class="custom-logo" alt="' . bloginfo() . '"></a>';

		} else {

			the_custom_logo();

		}
	}

}
if (!function_exists('pragyan_has_custom_logo')) {

	function pragyan_has_custom_logo()
	{
		global $post;

		$post_id = isset($post->ID) ? $post->ID : 0;

		$logo = get_post_meta($post_id, 'pragyan_single_logo', true);


		if (absint($logo) > 0) {

			return true;

		} else {

			if (has_custom_logo()) {

				return true;

			}
		}

		return false;
	}
}

if (!function_exists('pragyan_is_home_page')) {
	function pragyan_is_home_page()
	{
		$home_page = (boolean)pragyan_get_option('enable_theme_style_homepage');

		if ($home_page && (is_home() || is_front_page())) {

			return true;
		}
		return false;
	}
}


if (!function_exists('pragyan_head_callback')):

	function pragyan_head_callback()
	{

		$header_text_color = get_header_textcolor(); ?>
		<?php if (!empty($header_text_color && $header_text_color !== 'blank')): ?>
		<style type="text/css">
			.site-description {
				color: #<?php echo esc_attr($header_text_color); ?>;
			}
		</style>
	<?php endif; ?>
	<?php }

endif;

