<?php
/**
 * Set our Customizer default options
 */
if (!function_exists('pragyan_get_default_options')) {
	function pragyan_get_default_options($key = '')
	{
		$customizer_defaults = array(

			// Base /Global Options

			'preloader_show' => true,
			'back_to_top_show' => true,
			'breadcrumb_show' => true,
			'error_404_heading' => '',
			'error_404_text' => '',
			'error_404_home_text' => '',
			'global_sidebar' => 'pragyan_right_sidebar',
			'content_layout' => 'full_width_content_layout',
			'before_home_page_main_content_area_background_color' => '',
			'home_page_main_content_area_background_color' => '',
			'after_home_page_main_content_area_background_color' => '',

			'enable_theme_style_homepage' => false,
			//
			'show_pragyan_slider' => true,
			'show_pragyan_services' => true,
			'services_margin_top' => -180,

			'service_section_page_1' => '',
			'service_section_background_1' => '#dd9933',
			'service_section_icon_1' => 'fa fa-check-circle',

			'service_section_page_2' => '',
			'service_section_background_2' => '#81d742',
			'service_section_icon_2' => 'fa fa-university',

			'service_section_page_3' => '',
			'service_section_background_3' => '#8224e3',
			'service_section_icon_3' => 'fa fa-quote-left',

			'service_section_page_4' => '',
			'service_section_background_4' => '#dd3333',
			'service_section_icon_4' => 'fa fa-cloud',

			// Slider
			'slider_section_page_1' => '',
			'slider_section_page_2' => '',
			'slider_section_page_3' => '',
			'slider_section_page_4' => '',
			'slider_section_page_5' => '',

			'slider_section_apply_button_text_1' => esc_html__('Apply Now', 'pragyan'),
			'slider_section_apply_button_text_2' => esc_html__('Apply Now', 'pragyan'),
			'slider_section_apply_button_text_3' => esc_html__('Apply Now', 'pragyan'),
			'slider_section_apply_button_text_4' => esc_html__('Apply Now', 'pragyan'),
			'slider_section_apply_button_text_5' => esc_html__('Apply Now', 'pragyan'),

			'slider_section_apply_button_link_1' => '#',
			'slider_section_apply_button_link_2' => '#',
			'slider_section_apply_button_link_3' => '#',
			'slider_section_apply_button_link_4' => '#',
			'slider_section_apply_button_link_5' => '#',

			'slider_section_learn_more_button_text_1' => esc_html__('Learn More', 'pragyan'),
			'slider_section_learn_more_button_text_2' => esc_html__('Learn More', 'pragyan'),
			'slider_section_learn_more_button_text_3' => esc_html__('Learn More', 'pragyan'),
			'slider_section_learn_more_button_text_4' => esc_html__('Learn More', 'pragyan'),
			'slider_section_learn_more_button_text_5' => esc_html__('Learn More', 'pragyan'),

			'slider_section_learn_more_button_link_1' => '#',
			'slider_section_learn_more_button_link_2' => '#',
			'slider_section_learn_more_button_link_3' => '#',
			'slider_section_learn_more_button_link_4' => '#',
			'slider_section_learn_more_button_link_5' => '#',

			// Header
			'header_top_show' => true,
			'top_email' => 'email@example.com',
			'top_phone' => '123456789',
			'login_register_show' => true,
			'custom_login_link' => '',
			'custom_login_text' => esc_html__('Login', 'pragyan'),
			'custom_logout_text' => esc_html__('Logout', 'pragyan'),
			'custom_register_link' => '',
			'custom_register_text' => esc_html__('Register', 'pragyan'),
			'profile_show' => true,
			'custom_profile_page_link' => '',
			'custom_profile_page_text' => esc_html__('Profile', 'pragyan'),
			'enable_sticky_header' => true,
			'enable_main_header_search' => true,

			// Blog/Archive Page
			'blog_author_show' => true,
			'blog_date_show' => true,
			'blog_category_show' => true,
			'blog_comment_show' => true,

			// Single Post
			'single_post_author_show' => true,
			'single_post_date_show' => true,
			'single_post_category_show' => true,
			'single_post_comment_show' => true,
			'single_post_post_title_show' => true,

			// Footer
			'copyright_text' => esc_html__('Copyright © All rights reserved', 'pragyan'),
			'footer_widget_area_column' => 'layout_4',

		);

		$all_defaults = apply_filters('pragyan_customizer_defaults', $customizer_defaults);

		if ($key == '' && null == $key) {
			return $all_defaults;
		}
		if (isset($all_defaults[$key])) {
			return $all_defaults[$key];
		}
		return '';

	}
}


function pragyan_get_option($key)
{
	$option_key = PRAGYAN_THEME_SETTINGS . '_' . $key;

	$defaults = pragyan_get_default_options();

	$all_options = get_theme_mod(PRAGYAN_THEME_SETTINGS);

	$all_theme_options = wp_parse_args($all_options, $defaults);

	if (isset($all_theme_options[$key])) {
		return $all_theme_options[$key];
	}
	return null;
}

if (!function_exists('pragyan_get_customizer_id')) :

	function pragyan_get_customizer_id($key = '')
	{
		return PRAGYAN_THEME_SETTINGS . '[' . $key . ']';
	}
endif;
