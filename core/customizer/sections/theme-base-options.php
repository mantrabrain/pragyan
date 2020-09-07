<?php

///pragyan_section_base_options
$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_base_section', array(
	'title' => esc_html__('Base (Global)', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'priority' => 100,
)));
require_once 'base/layouts.php';
require_once 'base/logo.php';
require_once 'base/colors.php';
require_once 'base/preloader.php';
require_once 'base/back-top-top.php';
require_once 'base/breadcrumb.php';
require_once 'base/breadcrumb.php';
require_once 'base/404.php';
require_once 'base/sidebar.php';


