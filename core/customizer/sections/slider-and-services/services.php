<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_services_section', array(
	'title' => esc_html__('Services', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_slider_and_services_section',
	'priority' => 20,
)));

$wp_customize->add_setting(pragyan_get_customizer_id('show_pragyan_services'),
	array(
		'default' => $defaults['show_pragyan_services'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(
	new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('show_pragyan_services'),
		array(
			'label' => esc_html__('Show/Hide Services', 'pragyan'),
			'section' => 'pragyan_services_section'
		)
	));

//Services Page Margin
$wp_customize->add_setting(pragyan_get_customizer_id('services_margin_top'),
	array(
		'default' => $defaults['services_margin_top'],
		'sanitize_callback' => 'pragyan_sanitize_slider',
	)
);

$wp_customize->add_control(
	new Pragyan_Customizer_Control_Slider(
		$wp_customize,
		pragyan_get_customizer_id('services_margin_top'),
		array(
			'label' => esc_html__('Margin Top', 'pragyan'),
			'section' => 'pragyan_services_section',
			'active_callback' => 'pragyan_is_service_enabled',
			'input_attrs' => array(
				'min' => -500,
				'max' => 500,
				'step' => 1
			),
		)
	)
);

// Service settings
$services_number = 4;
if ($services_number > 0) {
	for ($i = 1; $i <= $services_number; $i++) {
		$wp_customize->add_setting("pragyan_service_section_heading_{$i}",
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new Pragyan_Customizer_Control_Heading($wp_customize, "pragyan_service_section_heading_{$i}",
				array(
					'label' => __('Service', 'pragyan') . ' #' . $i,
					'section' => 'pragyan_services_section',
				)
			)
		);


		$wp_customize->add_setting(pragyan_get_customizer_id("service_section_page_{$i}"),
			array(
				'default' => $defaults["service_section_page_{$i}"],
				'sanitize_callback' => 'pragyan_sanitize_dropdown_pages',
			)
		);
		$wp_customize->add_control(pragyan_get_customizer_id("service_section_page_{$i}"),
			array(
				'label' => __('Select Page', 'pragyan'),
				'section' => 'pragyan_services_section',
				'type' => 'dropdown-pages',
			)
		);

		$wp_customize->add_setting(pragyan_get_customizer_id("service_section_background_{$i}"),
			array(
				'default' => $defaults["service_section_background_{$i}"],
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new Pragyan_Customizer_Control_Color(
				$wp_customize,
				pragyan_get_customizer_id("service_section_background_{$i}"),
				array(
					'label' => __('Background Color', 'pragyan'),
					'section' => 'pragyan_services_section',

				))
		);

		// Setting featured_slider_enable_overlay.
		$wp_customize->add_setting(pragyan_get_customizer_id("service_section_icon_{$i}"),
			array(
				'default' => $defaults["service_section_icon_{$i}"],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(pragyan_get_customizer_id("service_section_icon_{$i}"),
			array(
				'label' => __('Service ICON (font awesome icon)', 'pragyan'),
				'section' => 'pragyan_services_section',
				'type' => 'text',
			)
		);

	} // End for loop.
}
