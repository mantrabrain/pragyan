<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_theme_base_layouts', array(
	'title' => esc_html__('Layouts', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_base_section',
	'priority' => 10,
)));


$wp_customize->add_setting(pragyan_get_customizer_id('global_sidebar'),
	array(
		'default' => $defaults['global_sidebar'],
		'transport' => 'refresh',
		'sanitize_callback' => 'pragyan_radio_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Radio($wp_customize, pragyan_get_customizer_id('global_sidebar'),
	array(
		'label' => esc_html__('Sidebar Layout', 'pragyan'),
		'section' => 'pragyan_theme_base_layouts',
		'choices' => pragyan_global_sidebar_layouts()
	)
));

// Setting Main Layout
$wp_customize->add_setting(pragyan_get_customizer_id('content_layout'),
	array(
		'default' => $defaults['content_layout'],
		'sanitize_callback' => 'pragyan_sanitize_select',

	)
);

$wp_customize->add_control(new Pragyan_Customizer_Control_Buttonset(
		$wp_customize, pragyan_get_customizer_id('content_layout'),
		array(
			'label' => esc_html__('Layout Style', 'pragyan'),
			'section' => 'pragyan_theme_base_layouts',
			'choices' => array(
				'boxed_content_layout' => esc_html__('Boxed', 'pragyan'),
				'full_width_content_layout' => esc_html__('Full Width ', 'pragyan'),
			),
		)
	)
);
