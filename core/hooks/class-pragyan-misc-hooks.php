<?php
defined('ABSPATH') || exit;

/**
 * Main Pragyan_Miscellaneous_Hooks Class.
 *
 * @class Pragyan_Miscellaneous_Hooks
 */
class Pragyan_Miscellaneous_Hooks
{

	public function __construct()
	{
		add_action('wp_head', array($this, 'pingback_header'));
		add_filter('body_class', array($this, 'body_classes'));
	}

	public function body_classes($classes)
	{


		// Add class of hfeed to non-singular pages.
		if (!is_singular()) {
			$classes[] = 'hfeed';
		}

		if (pragyan_is_home_page()) {

			$classes[] = 'pragyan-home-page';
		}

		// Add class if the site title and tagline is hidden.
		if ('blank' === get_header_textcolor()) {
			$classes[] = 'title-tagline-hidden';
		}
		$classes[] = esc_attr(pragyan_get_option('content_layout'));


		return $classes;
	}

	public function pingback_header()
	{
		if (is_singular() && pings_open()) {
			echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
		}
	}



}

new Pragyan_Miscellaneous_Hooks();
