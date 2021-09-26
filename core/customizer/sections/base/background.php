<?php


$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'background_image', array(
	'title' => esc_html__('Background Image', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_base_section',
	'theme_supports' => 'custom-background',
	'priority' => 80,
)));
