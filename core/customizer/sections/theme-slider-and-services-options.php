<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_slider_and_services_section', array(
	'title' => esc_html__('Slider & Services', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'priority' => 201,
)));

require_once "slider-and-services/slider.php";
require_once "slider-and-services/services.php";
