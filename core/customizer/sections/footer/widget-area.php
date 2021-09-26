<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'footer_widget_area_section', array(
	'title' => esc_html__('Widget Area', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_footer_section',
	'priority' => 20,
)));

// Footer widget area
$wp_customize->add_setting(pragyan_get_customizer_id('footer_widget_area_column'),
	array(
		'default' => $defaults['footer_widget_area_column'],
		'sanitize_callback' => 'pragyan_radio_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Radio($wp_customize, pragyan_get_customizer_id('footer_widget_area_column'),
	array(
		'label' => esc_html__('Footer Widget Column', 'pragyan'),
		'section' => 'footer_widget_area_section',
		'choices' => pragyan_footer_widget_area_layouts()
	)
));
