<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'error_404_section', array(
	'title' => esc_html__('404 Page', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_base_section',
	'priority' => 80,
)));

$wp_customize->add_setting(pragyan_get_customizer_id('error_404_heading'),
	array(
		'default' => $defaults['error_404_heading'],
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(pragyan_get_customizer_id('error_404_heading'),
	array(
		'label' => esc_html__('404 Title', 'pragyan'),
		'type' => 'text',
		'section' => 'error_404_section'
	)
);
$wp_customize->add_setting(pragyan_get_customizer_id('error_404_text'),
	array(
		'default' => $defaults['error_404_text'],
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(pragyan_get_customizer_id('error_404_text'),
	array(
		'label' => esc_html__('404 Text', 'pragyan'),
		'type' => 'text',
		'section' => 'error_404_section'

	)
);

$wp_customize->add_setting(pragyan_get_customizer_id('error_404_home_text'),
	array(
		'default' => $defaults['error_404_home_text'],
 		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(pragyan_get_customizer_id('error_404_home_text'),
	array(
		'label' => esc_html__('Go Home Text', 'pragyan'),
		'type' => 'text',
		'section' => 'error_404_section'
	)
);
