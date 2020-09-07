<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'footer_copyright_section', array(
	'title' => esc_html__('Copyright', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_footer_section',
	'priority' => 20,
)));

$wp_customize->add_setting(pragyan_get_customizer_id('copyright_text'),
	array(
		'default' => $defaults['copyright_text'],
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(pragyan_get_customizer_id('copyright_text'),
	array(
		'label' => esc_html__('Copyright', 'pragyan'),
		'type' => 'text',
		'section' => 'footer_copyright_section'
	)
);
