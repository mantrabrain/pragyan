<?php
$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'header_image', array(
	'title' => esc_html__('Page Header', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'header_naviation_panel',
	'priority' => 300,
)));
