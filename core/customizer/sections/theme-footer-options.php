<?php
$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_footer_section', array(
	'title' => esc_html__('Footer', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'priority' => 600,
)));

require_once "footer/widget-area.php";
require_once "footer/copyright.php";
