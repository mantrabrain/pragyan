<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_slider_section', array(
	'title' => esc_html__('Slider', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_slider_and_services_section',
	'priority' => 20,
)));

$wp_customize->add_setting(pragyan_get_customizer_id('show_pragyan_slider'),
	array(
		'default' => $defaults['show_pragyan_slider'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(
	new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('show_pragyan_slider'),
		array(
			'label' => esc_html__('Show/Hide Slider', 'pragyan'),
			'section' => 'pragyan_slider_section'
		)
	));


// Service settings
$slider_number = 5;
if ($slider_number > 0) {
	for ($i = 1; $i <= $slider_number; $i++) {
		$wp_customize->add_setting("pragyan_slider_section_heading_{$i}",
			array(
				'default' => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new Pragyan_Customizer_Control_Heading($wp_customize, "pragyan_slider_section_heading_{$i}",
				array(
					'label' => __('Slider', 'pragyan') . ' # ' . $i,
					'section' => 'pragyan_slider_section',
				)
			)
		);


		$wp_customize->add_setting(pragyan_get_customizer_id("slider_section_page_{$i}"),
			array(
				'default' => $defaults["slider_section_page_{$i}"],
				'sanitize_callback' => 'pragyan_sanitize_dropdown_pages',
			)
		);
		$wp_customize->add_control(pragyan_get_customizer_id("slider_section_page_{$i}"),
			array(
				'label' => __('Select Page', 'pragyan'),
				'section' => 'pragyan_slider_section',
				'type' => 'dropdown-pages',
			)
		);

		//Apply Button
		$wp_customize->add_setting(pragyan_get_customizer_id("slider_section_apply_button_text_{$i}"),
			array(
				'default' => $defaults["slider_section_apply_button_text_{$i}"],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(pragyan_get_customizer_id("slider_section_apply_button_text_{$i}"),
			array(
				'label' => __('Apply Button Text', 'pragyan'),
				'section' => 'pragyan_slider_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting(pragyan_get_customizer_id("slider_section_apply_button_link_{$i}"),
			array(
				'default' => $defaults["slider_section_apply_button_link_{$i}"],
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(pragyan_get_customizer_id("slider_section_apply_button_link_{$i}"),
			array(
				'label' => __('Apply Button Link', 'pragyan'),
				'section' => 'pragyan_slider_section',
				'type' => 'url',
			)
		);
		// Learn More Button
		$wp_customize->add_setting(pragyan_get_customizer_id("slider_section_learn_more_button_text_{$i}"),
			array(
				'default' => $defaults["slider_section_learn_more_button_text_{$i}"],
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(pragyan_get_customizer_id("slider_section_learn_more_button_text_{$i}"),
			array(
				'label' => __('Learn More Button Text', 'pragyan'),
				'section' => 'pragyan_slider_section',
				'type' => 'text',
			)
		);

		$wp_customize->add_setting(pragyan_get_customizer_id("slider_section_learn_more_button_link_{$i}"),
			array(
				'default' => $defaults["slider_section_learn_more_button_link_{$i}"],
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(pragyan_get_customizer_id("slider_section_learn_more_button_link_{$i}"),
			array(
				'label' => __('Learn More Button Link', 'pragyan'),
				'section' => 'pragyan_slider_section',
				'type' => 'url',
			)
		);


	} // End for loop.
}
