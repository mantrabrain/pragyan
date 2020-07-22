<?php
if (!function_exists('pragyan_get_recommanded_plugins')) {

	function pragyan_get_recommanded_plugins()
	{
		$plugins = array(

			array(
				'name' => esc_html__('Mantra Brain Starter Sites', 'pragyan'),
				'slug' => 'mantrabrain-starter-sites',
				'required' => false,
			),

		);

		return apply_filters('pragyan_get_recommanded_plugins', $plugins);
	}
}
include_once 'about/class-pragyan-about.php';
include_once 'customizer/section-pro.php';

