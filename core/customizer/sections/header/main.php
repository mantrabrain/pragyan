<?php
$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_main_header_section', array(
	'title' => esc_html__('Main Header', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'header_naviation_panel',
	'priority' => 200,
)));


// Sticky header enable
$wp_customize->add_setting(pragyan_get_customizer_id('enable_sticky_header'),
	array(
		'default' => $defaults['enable_sticky_header'],
		'sanitize_callback' => 'pragyan_switch_sanitization',
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('enable_sticky_header'),
	array(
		'label' => esc_html__('Enable/Disable Sticky Header', 'pragyan'),
		'section' => 'pragyan_main_header_section',
	)
));

// Top search icon
$wp_customize->add_setting(pragyan_get_customizer_id('enable_main_header_search'),
	array(
		'default' => $defaults['enable_main_header_search'],
		'sanitize_callback' => 'pragyan_switch_sanitization',
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('enable_main_header_search'),
	array(
		'label' => esc_html__('Enable/Disable Search', 'pragyan'),
		'section' => 'pragyan_main_header_section',
	)
));

