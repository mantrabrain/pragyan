<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'colors', array(
	'title' => esc_html__('Colors', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_base_section',
	'priority' => 40,
)));

