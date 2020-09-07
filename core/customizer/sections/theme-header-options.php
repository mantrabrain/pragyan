<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'header_naviation_panel', array(
	'title' => esc_html__('Header', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'priority' => 200,
)));
require_once 'header/top.php';
require_once 'header/main.php';
require_once 'header/page.php';

