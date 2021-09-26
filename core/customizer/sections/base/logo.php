<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'title_tagline', array(
	'title' => esc_html__('Logo & Site Identity', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_base_section',
	'priority' => 20,
)));
