<?php
// Posted author
if (!function_exists('pragyan_posted_author')) :
	/**
	 * Prints HTML with meta information for the current author
	 */
	function pragyan_posted_author()
	{

		// Get the author name; wrap it in a link.
		$byline = sprintf(

			'<span class="author vcard">

		<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '"><i class="fas fa-user-alt"></i>' . esc_html(get_the_author()) . '</a></span>'
		);

		// Finally, let's write all of this to the page.
		echo '<li class="byline list-inline-item"> ' . $byline . '</li>';
	}
endif;

// Posted date
if (!function_exists('pragyan_posted_date')) :
	/**
	 * Prints HTML with meta information for the current date
	 */
	function pragyan_posted_date()
	{
		// Finally, let's write all of this to the page.
		echo '<li class="posted-on list-inline-item">' . pragyan_time_link() . '</li>';
	}
endif;


if (!function_exists('pragyan_time_link')) :
	/**
	 * Gets a nicely formatted string for the published date.
	 */
	function pragyan_time_link()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		$archive_year = get_the_time('Y');
		$archive_month = get_the_time('m');
		$archive_day = get_the_time('d');

		$time_string = sprintf($time_string,
			get_the_date(DATE_W3C),
			get_the_date(),
			get_the_modified_date(DATE_W3C),
			get_the_modified_date()
		);

		// Wrap the time string in a link, and preface it with 'Posted on'.
		return sprintf(
		/* translators: %s: post date */
			__('<span class="screen-reader-text">Posted on</span> %s', 'pragyan'),
			'<a href="' . esc_url(get_day_link($archive_year, $archive_month, $archive_day)) . '" rel="bookmark"><i class="fa fa-clock"></i>' . $time_string . '</a>'
		);
	}
endif;


if (!function_exists('pragyan_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function pragyan_entry_footer()
	{

		/* translators: used between list items, there is a space after the comma */
		$separate_meta = __(', ', 'pragyan');

		// Get Tags for posts.
		$tags_list = get_the_tag_list('');

		// We don't want to output .pragyan-entry-footer if it will be empty, so make sure its not.


		if ('post' === get_post_type()) {
			echo '<footer class="pragyan-entry-footer">';
			if ($tags_list) {

				echo '<div class="cat-tags-links">';

				if ($tags_list && !is_wp_error($tags_list)) {
					echo '<span class="tags-links"><span class="screen-reader-text">' . esc_html__('Post Tags', 'pragyan') . '</span>' . '</span>' . $tags_list;
				}

				echo '</div>';
			}
			if (get_edit_post_link()) {
				pragyan_edit_link();
			}
			echo '</footer> <!-- .pragyan-entry-footer -->';

		}

	}
endif;


if (!function_exists('pragyan_edit_link')) :
	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function pragyan_edit_link()
	{
		edit_post_link(
			sprintf(
			/* translators: %s: Name of current post */
				__('Edit<span class="screen-reader-text"> "%s"</span>', 'pragyan'),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

