<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_single_post_section', array(
	'title' => esc_html__('Single Post', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'priority' => 500,
)));

require_once "single-post/main.php";
