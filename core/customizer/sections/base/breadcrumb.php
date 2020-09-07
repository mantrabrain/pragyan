<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_breadcrumb_section', array(
	'title' => esc_html__('Breadcrumb', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_base_section',
	'priority' => 50,
)));


$wp_customize->add_setting(pragyan_get_customizer_id('breadcrumb_show'),
	array(
		'default' => $defaults['breadcrumb_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization',
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('breadcrumb_show'),
	array(
		'label' => esc_html__('Breadcrumb', 'pragyan'),
		'section' => 'pragyan_breadcrumb_section',
	)
));
