<?php
if (!function_exists('pragyan_get_color_css')) {

	function pragyan_get_color_css()
	{

		$css = '';

		global $post;

		$post_id = isset($post->ID) ? $post->ID : 0;

		$header_background_color = get_post_meta($post_id, 'pragyan_bottom_header_background_color', true);


		if ('' != $header_background_color && '#ffffff' != $header_background_color) {
			$css .= '.main-header, .pragyan-search-box{background-color:' . esc_attr($header_background_color) . '} ';
		}
		$services_margin_top = pragyan_get_option('services_margin_top');

		if ($services_margin_top != '-180') {
			$css .= '.pragyan-services-section{margin-top:' . esc_attr($services_margin_top) . 'px} ';
		}
		$pragyan_service_section_background_1 = (pragyan_get_option('service_section_background_1'));
		$pragyan_service_section_background_2 = (pragyan_get_option('service_section_background_2'));
		$pragyan_service_section_background_3 = (pragyan_get_option('service_section_background_3'));
		$pragyan_service_section_background_4 = (pragyan_get_option('service_section_background_4'));
		if ($pragyan_service_section_background_1 != '') {
			$css .= ' .pragyan-single-service.service_section_background_1:hover{background-color:' . esc_attr(pragyan_hover_color($pragyan_service_section_background_1, -50)) . '}';
			$css .= ' .pragyan-single-service.service_section_background_1{background-color:' . esc_attr($pragyan_service_section_background_1) . '}';
		}
		if ($pragyan_service_section_background_2 != '') {
			$css .= ' .pragyan-single-service.service_section_background_2:hover{background-color:' . esc_attr(pragyan_hover_color($pragyan_service_section_background_2, -50)) . '}';
			$css .= ' .pragyan-single-service.service_section_background_2{background-color:' . esc_attr($pragyan_service_section_background_2) . '}';
		}
		if ($pragyan_service_section_background_3 != '') {
			$css .= ' .pragyan-single-service.service_section_background_3:hover{background-color:' . esc_attr(pragyan_hover_color($pragyan_service_section_background_3, -50)) . '}';
			$css .= ' .pragyan-single-service.service_section_background_3{background-color:' . esc_attr($pragyan_service_section_background_3) . '}';
		}
		if ($pragyan_service_section_background_4 != '') {
			$css .= ' .pragyan-single-service.service_section_background_4:hover{background-color:' . esc_attr(pragyan_hover_color($pragyan_service_section_background_4, -50)) . '}';
			$css .= ' .pragyan-single-service.service_section_background_4{background-color:' . esc_attr($pragyan_service_section_background_4) . '}';
		}

		if (pragyan_is_home_page()) {
			$before_home_page_main_content_area_background_color = pragyan_get_option('before_home_page_main_content_area_background_color');
			$home_page_main_content_area_background_color = pragyan_get_option('home_page_main_content_area_background_color');
			$after_home_page_main_content_area_background_color = pragyan_get_option('after_home_page_main_content_area_background_color');
			if ('' != $before_home_page_main_content_area_background_color) {
				$css .= '.pragyan-before-home-page-main-content-area{background-color:' . esc_attr($before_home_page_main_content_area_background_color) . '} ';
			}
			if ('' != $home_page_main_content_area_background_color) {
				$css .= '.pragyan-home-page-main-content-area{background-color:' . esc_attr($home_page_main_content_area_background_color) . '} ';
			}
			if ('' != $after_home_page_main_content_area_background_color) {
				$css .= '.pragyan-after-home-page-main-content-area{background-color:' . esc_attr($after_home_page_main_content_area_background_color) . '} ';

			}

		}

		return $css;


	}
}
if (!function_exists('pragyan_get_all_dynamic_css')) :

	function pragyan_get_all_dynamic_css()
	{
		$all_dynamic_css = pragyan_get_color_css();

		$all_dynamic_css = apply_filters('pragyan_all_dynamic_css', $all_dynamic_css);

		$all_dynamic_css_min = pragyan_minify_css($all_dynamic_css);

		return $all_dynamic_css_min;
	}


endif;
if (!function_exists('pragyan_dynamic_css')) :

	function pragyan_dynamic_css()
	{
		$all_dynamic_css = pragyan_get_all_dynamic_css();
		?>

		<style type="text/css" class="pragyan-dynamic-css">

			<?php echo wp_strip_all_tags($all_dynamic_css) ; ?>

		</style>

		<?php
	}

endif;

$load_dynamic_css = apply_filters('pragyan_theme_dynamic_css_enable', true);

if ($load_dynamic_css) {
	add_action('wp_head', 'pragyan_dynamic_css', 10);
}

