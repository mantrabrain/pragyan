<?php

$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'pragyan_blog_archive_section', array(
	'title' => esc_html__('Blog/Archive', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'priority' => 300,
)));

require_once "blog-archive/blog-page.php";
