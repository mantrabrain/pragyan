<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_blog_archive_content_meta_section', array(
	'title' => esc_html__('Content & Metas', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_blog_archive_section',
	'priority' => 20,
)));

// Author
$wp_customize->add_setting(pragyan_get_customizer_id('blog_author_show'),
	array(
		'default' => $defaults['blog_author_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('blog_author_show'),
	array(
		'label' => esc_html__('Show/Hide Author', 'pragyan'),
		'section' => 'pragyan_blog_archive_content_meta_section'
	)
));

// Date
$wp_customize->add_setting(pragyan_get_customizer_id('blog_date_show'),
	array(
		'default' => $defaults['blog_date_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('blog_date_show'),
	array(
		'label' => esc_html__('Show/Hide Post Date', 'pragyan'),
		'section' => 'pragyan_blog_archive_content_meta_section'
	)
));

// Category
$wp_customize->add_setting(pragyan_get_customizer_id('blog_category_show'),
	array(
		'default' => $defaults['blog_category_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('blog_category_show'),
	array(
		'label' => esc_html__('Show/Hide Category', 'pragyan'),
		'section' => 'pragyan_blog_archive_content_meta_section'
	)
));

// Comment
$wp_customize->add_setting(pragyan_get_customizer_id('blog_comment_show'),
	array(
		'default' => $defaults['blog_comment_show'],
		'sanitize_callback' => 'pragyan_switch_sanitization'
	)
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('blog_comment_show'),
	array(
		'label' => esc_html__('Show/Hide Comment', 'pragyan'),
		'section' => 'pragyan_blog_archive_content_meta_section'
	)
));

