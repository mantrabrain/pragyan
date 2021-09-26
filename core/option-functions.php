<?php
// Customizer option function
if (!function_exists('pragyan_base_sidebar_layout')) {
	function pragyan_base_sidebar_layout()
	{
		global $post;

		if (isset($post->ID) && (is_single() || is_page()) || (isset($post->post_type) && ($post->post_type == 'page' || $post->post_type == 'post'))) {

			$base_sidebar_layout = get_post_meta($post->ID, 'pragyan_base_sidebar_layout', true);


			$base_sidebar_layout = $base_sidebar_layout == '' || is_null($base_sidebar_layout) ? pragyan_get_option('global_sidebar') : $base_sidebar_layout;

		} else {


			$base_sidebar_layout = pragyan_get_option('global_sidebar');

		}

		return $base_sidebar_layout;
	}
}

if (!function_exists('pragyan_page_sidebar')) {
	function pragyan_page_sidebar($default)
	{
		global $post;

		if (isset($post->ID) && (is_single() || is_page())) {

			$sidebar = get_post_meta($post->ID, 'pragyan_single_sidebar', true);

			global $wp_registered_sidebars;

			$all_sidebars = array_keys($wp_registered_sidebars);

			$sidebar = $sidebar == '' || is_null($sidebar) || !in_array($sidebar, $all_sidebars) ? $default : $sidebar;

		} else {
			$sidebar = $default;
		}


		return $sidebar;
	}
}
if (!function_exists('pragyan_bottom_header_background')) {
	function pragyan_bottom_header_background($default)
	{
		global $post;

		if (isset($post->ID) && (is_single() || is_page())) {

			$color = get_post_meta($post->ID, 'pragyan_bottom_header_background_color', true);

			$color = $color == '' || is_null($color) ? $default : $color;

		} else {
			$color = $default;
		}


		return $color;
	}
}

