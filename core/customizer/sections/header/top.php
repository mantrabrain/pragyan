<?php


$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_top_header_section', array(
	'title' => esc_html__('Top Header', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'header_naviation_panel',
	'priority' => 100,
)));

// Header top show/hide
$wp_customize->add_setting(pragyan_get_customizer_id('header_top_show'),
	array(
		'default' => $defaults['header_top_show'],
		'transport' => 'refresh',
		'sanitize_callback' => 'pragyan_switch_sanitization',
	)
);
$wp_customize->add_control(
	new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('header_top_show'),
		array(
			'label' => esc_html__('Show/Hide Top Header', 'pragyan'),
			'section' => 'pragyan_top_header_section',
		)
	));

// Top email
$wp_customize->add_setting(pragyan_get_customizer_id('top_email'),
	array(
		'default' => $defaults['top_email'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(pragyan_get_customizer_id('top_email'),
	array(
		'label' => esc_html__('Email', 'pragyan'),
		'type' => 'text',
		'section' => 'pragyan_top_header_section',
	)
);
// Top phone
$wp_customize->add_setting(pragyan_get_customizer_id('top_phone'),
	array(
		'default' => $defaults['top_phone'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(pragyan_get_customizer_id('top_phone'),
	array(
		'label' => esc_html__('Phone', 'pragyan'),
		'type' => 'text',
		'section' => 'pragyan_top_header_section',
	)
);

$wp_customize->add_setting(
	'pragyan_top_header_login_register_section_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',

	)
);

$wp_customize->add_control(
	new Pragyan_Customizer_Control_Heading(
		$wp_customize,
		'pragyan_top_header_login_register_section_heading',
		array(
			'label' => esc_html__('Login/Register', 'pragyan'),
			'section' => 'pragyan_top_header_section',


		)
	)
);
// Login/Register show/hide
$wp_customize->add_setting(pragyan_get_customizer_id('login_register_show'),
	array(
		'default' => $defaults['login_register_show'],
		'transport' => 'refresh',
		'sanitize_callback' => 'pragyan_switch_sanitization',
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('login_register_show'),
	array(
		'label' => esc_html__('Login/Register', 'pragyan'),
		'section' => 'pragyan_top_header_section',
	)
));


// Custom login link
$wp_customize->add_setting(pragyan_get_customizer_id('custom_login_link'),
	array(
		'default' => $defaults['custom_login_link'],
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(pragyan_get_customizer_id('custom_login_link'),
	array(
		'label' => esc_html__('Login Link', 'pragyan'),
		'section' => 'pragyan_top_header_section',
		'type' => 'url',
	)
);

// Custom login link
$wp_customize->add_setting(pragyan_get_customizer_id('custom_login_text'),
	array(
		'default' => $defaults['custom_login_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(pragyan_get_customizer_id('custom_login_text'),
	array(
		'label' => esc_html__('Login Text', 'pragyan'),
		'section' => 'pragyan_top_header_section',
		'type' => 'text',
	)
);

$wp_customize->add_setting(pragyan_get_customizer_id('custom_logout_text'),
	array(
		'default' => $defaults['custom_logout_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(pragyan_get_customizer_id('custom_logout_text'),
	array(
		'label' => esc_html__('Logout Text', 'pragyan'),
		'section' => 'pragyan_top_header_section',
		'type' => 'text',
	)
);
// Custom register link
$wp_customize->add_setting(pragyan_get_customizer_id('custom_register_link'),
	array(
		'default' => $defaults['custom_register_link'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(pragyan_get_customizer_id('custom_register_link'),
	array(
		'label' => esc_html__('Register Link', 'pragyan'),
		'section' => 'pragyan_top_header_section',
		'type' => 'url',
	)
);

// Custom register link
$wp_customize->add_setting(pragyan_get_customizer_id('custom_register_text'),
	array(
		'default' => $defaults['custom_register_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(pragyan_get_customizer_id('custom_register_text'),
	array(
		'label' => esc_html__('Register Text', 'pragyan'),
		'section' => 'pragyan_top_header_section',
		'type' => 'url',
	)
);

$wp_customize->add_setting(
	'pragyan_top_header_profile_section_heading',
	array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',

	)
);

$wp_customize->add_control(
	new Pragyan_Customizer_Control_Heading(
		$wp_customize,
		'pragyan_top_header_profile_section_heading',
		array(
			'label' => esc_html__('Profile', 'pragyan'),
			'section' => 'pragyan_top_header_section',


		)
	)
);

$wp_customize->add_setting(pragyan_get_customizer_id('profile_show'),
	array(
		'default' => $defaults['profile_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization',
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('profile_show'),
	array(
		'label' => esc_html__('Profile', 'pragyan'),
		'section' => 'pragyan_top_header_section',
	)
));
// Profile link
$wp_customize->add_setting(pragyan_get_customizer_id('custom_profile_page_link'),
	array(
		'default' => $defaults['custom_profile_page_link'],
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(pragyan_get_customizer_id('custom_profile_page_link'),
	array(
		'label' => esc_html__('Profile Page Link', 'pragyan'),
		'section' => 'pragyan_top_header_section',
		'type' => 'url',
	)
);
// Profile link
$wp_customize->add_setting(pragyan_get_customizer_id('custom_profile_page_text'),
	array(
		'default' => $defaults['custom_profile_page_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(pragyan_get_customizer_id('custom_profile_page_text'),
	array(
		'label' => esc_html__('Profile Page Text', 'pragyan'),
		'section' => 'pragyan_top_header_section',
		'type' => 'url',
	)
);
