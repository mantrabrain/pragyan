<?php

function pragyan_breadcrumb_trail($args = array())
{

	$breadcrumb = apply_filters('breadcrumb_trail_object', null, $args);

	if (!is_object($breadcrumb))
		$breadcrumb = new Pragyan_Breadcrumb_Trail($args);

	return $breadcrumb->trail();
}

if (!function_exists('pragyan_minify_css')) {

	function pragyan_minify_css($css = '')
	{

		// Return if no CSS
		if (!$css) return;

		// Normalize whitespace
		$css = preg_replace('/\s+/', ' ', $css);

		// Remove ; before }
		$css = preg_replace('/;(?=\s*})/', '', $css);

		// Remove space after , : ; { } */ >
		$css = preg_replace('/(,|:|;|\{|}|\*\/|>) /', '$1', $css);

		// Remove space before , ; { }
		$css = preg_replace('/ (,|;|\{|})/', '$1', $css);

		// Strips leading 0 on decimal values (converts 0.5px into .5px)
		$css = preg_replace('/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css);

		// Strips units if value is 0 (converts 0px to 0)
		$css = preg_replace('/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css);

		// Trim
		$css = trim($css);

		// Return minified CSS
		return $css;

	}
}

function pragyan_footer_widget_area_layouts()
{
	return array(
		'layout_1' => array(
			'image' => esc_url(trailingslashit(get_template_directory_uri()) . 'core/customizer/assets/images/footer-1.png'),
			'name' => esc_html__('12', 'pragyan')
		),
		'layout_2' => array(
			'image' => esc_url(trailingslashit(get_template_directory_uri()) . 'core/customizer/assets/images/footer-2.png'),
			'name' => esc_html__('6-6', 'pragyan')
		),
		'layout_3' => array(
			'image' => esc_url(trailingslashit(get_template_directory_uri()) . 'core/customizer/assets/images/footer-3.png'),
			'name' => esc_html__('4-4-4', 'pragyan')
		),
		'layout_4' => array(
			'image' => esc_url(trailingslashit(get_template_directory_uri()) . 'core/customizer/assets/images/footer-4.png'),
			'name' => esc_html__('3-3-3-3', 'pragyan')
		),
		'layout_5' => array(
			'image' => esc_url(trailingslashit(get_template_directory_uri()) . 'core/customizer/assets/images/footer-5.png'),
			'name' => esc_html__('3-6-3', 'pragyan')
		),
		'layout_6' => array(
			'image' => esc_url(trailingslashit(get_template_directory_uri()) . 'core/customizer/assets/images/footer-6.png'),
			'name' => esc_html__('4-3-2-3', 'pragyan')
		),
	);
}

if (!function_exists('pragyan_global_sidebar_layouts')) :

	function pragyan_global_sidebar_layouts()
	{


		$url = PRAGYAN_THEME_URI . 'assets/images/icons/';

		return array(
			'pragyan_right_sidebar' =>
				array(
					'name' => esc_html__('RIGHT SIDEBAR', 'pragyan'),
					'image' => esc_url($url . 'right-sidebar.png')
				),
			'pragyan_left_sidebar' =>
				array(
					'name' => esc_html__('LEFT SIDEBAR', 'pragyan'),
					'image' => esc_url($url . 'left-sidebar.png')
				),
			'no_sidebar' =>
				array(
					'name' => esc_html__('NO SIDEBAR', 'pragyan'),
					'image' => esc_url($url . 'no-sidebar.png')
				),
			'full_width' =>
				array(
					'name' => esc_html__('FULL WIDTH', 'pragyan'),
					'image' => esc_url($url . 'full-width.png')
				)
		);

	}
endif;
if (!function_exists('pragyan_hover_color')) :
	function pragyan_hover_color($hex, $steps)
	{
		// Steps should be between -255 and 255. Negative = darker, positive = lighter
		$steps = max(-255, min(255, $steps));

		// Normalize into a six character long hex string
		$hex = str_replace('#', '', $hex);
		if (strlen($hex) == 3) {
			$hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
		}

		// Split into three parts: R, G and B
		$color_parts = str_split($hex, 2);
		$return = '#';

		foreach ($color_parts as $color) {
			$color = hexdec($color); // Convert to decimal
			$color = max(0, min(255, $color + $steps)); // Adjust color
			$return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
		}

		return $return;
	}
endif;
