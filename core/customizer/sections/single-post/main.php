<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'single_post_content_meta_section', array(
	'title' => esc_html__('Content & Metas', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_single_post_section',
	'priority' => 20,
)));

$wp_customize->add_setting(pragyan_get_customizer_id('single_post_author_show'),
	array(
		'default' => $defaults['single_post_author_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(
	new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('single_post_author_show'),
		array(
			'label' => esc_html__('Show/Hide Author', 'pragyan'),
			'section' => 'single_post_content_meta_section'
		)
	));

// Date
$wp_customize->add_setting(pragyan_get_customizer_id('single_post_date_show'),
	array(
		'default' => $defaults['single_post_date_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('single_post_date_show'),
	array(
		'label' => esc_html__('Show/Hide Post Date', 'pragyan'),
		'section' => 'single_post_content_meta_section'
	)
));

// Category
$wp_customize->add_setting(pragyan_get_customizer_id('single_post_category_show'),
	array(
		'default' => $defaults['single_post_category_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('single_post_category_show'),
	array(
		'label' => esc_html__('Show/Hide Category', 'pragyan'),
		'section' => 'single_post_content_meta_section'
	)
));

// Comment
$wp_customize->add_setting(pragyan_get_customizer_id('single_post_comment_show'),
	array(
		'default' => $defaults['single_post_comment_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('single_post_comment_show'),
	array(
		'label' => esc_html__('Show/Hide Comment', 'pragyan'),
		'section' => 'single_post_content_meta_section'
	)
));

// Single Post Post Title
$wp_customize->add_setting(pragyan_get_customizer_id('single_post_post_title_show'),
	array(
		'default' => $defaults['single_post_post_title_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('single_post_post_title_show'),
	array(
		'label' => esc_html__('Show/Hide Post Title', 'pragyan'),
		'section' => 'single_post_content_meta_section'
	)
));
