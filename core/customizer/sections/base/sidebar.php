<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'global_sidebar_section', array(
	'title' => esc_html__('Sidebar', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_base_section',
	'priority' => 100,
)));

// Before Home Page Main Content Area
$wp_customize->add_setting(
	'pragyan_before_home_page_main_content_area_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',

	)
);

$wp_customize->add_control(
	new Pragyan_Customizer_Control_Heading(
		$wp_customize,
		'pragyan_before_home_page_main_content_area_heading',
		array(
			'label' => esc_html__('Before Home Page Main Content Area', 'pragyan'),
			'section' => 'global_sidebar_section',


		)
	)
);

// Background Color
$wp_customize->add_setting(pragyan_get_customizer_id('before_home_page_main_content_area_background_color'),
	array(
		'default' => $defaults['before_home_page_main_content_area_background_color'],
		'sanitize_callback' => 'pragyan_hex_rgba_sanitization',
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Color($wp_customize, pragyan_get_customizer_id('before_home_page_main_content_area_background_color'),
	array(
		'label' => esc_html__('Background Color', 'pragyan'),
		'section' => 'global_sidebar_section',
		'show_opacity' => true,
	)
));


//  Home Page Main Content Area
$wp_customize->add_setting(
	'pragyan_home_page_main_content_area_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',

	)
);

$wp_customize->add_control(
	new Pragyan_Customizer_Control_Heading(
		$wp_customize,
		'pragyan_home_page_main_content_area_heading',
		array(
			'label' => esc_html__('Home Page Main Content Area', 'pragyan'),
			'section' => 'global_sidebar_section',


		)
	)
);

// Background Color
$wp_customize->add_setting(pragyan_get_customizer_id('home_page_main_content_area_background_color'),
	array(
		'default' => $defaults['home_page_main_content_area_background_color'],
		'sanitize_callback' => 'pragyan_hex_rgba_sanitization',
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Color($wp_customize, pragyan_get_customizer_id('home_page_main_content_area_background_color'),
	array(
		'label' => esc_html__('Background Color', 'pragyan'),
		'section' => 'global_sidebar_section',
		'show_opacity' => true,
	)
));

//after main content
$wp_customize->add_setting(
	'pragyan_after_home_page_main_content_area_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',

	)
);

$wp_customize->add_control(
	new Pragyan_Customizer_Control_Heading(
		$wp_customize,
		'pragyan_after_home_page_main_content_area_heading',
		array(
			'label' => esc_html__('After Home Page Main Content Area', 'pragyan'),
			'section' => 'global_sidebar_section',


		)
	)
);

// Background Color
$wp_customize->add_setting(pragyan_get_customizer_id('after_home_page_main_content_area_background_color'),
	array(
		'default' => $defaults['after_home_page_main_content_area_background_color'],
		'sanitize_callback' => 'pragyan_hex_rgba_sanitization',
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Color($wp_customize, pragyan_get_customizer_id('after_home_page_main_content_area_background_color'),
	array(
		'label' => esc_html__('Background Color', 'pragyan'),
		'section' => 'global_sidebar_section',
		'show_opacity' => true,
	)
));

