<?php


$wp_customize->add_section(new Pragyan_Customizer_Section(
	$wp_customize,
	'back_to_top_section', array(
	'title' => esc_html__('Back to Top', 'pragyan'),
	'panel' => PRAGYAN_THEME_OPTION_PANEL,
	'section' => 'pragyan_base_section',
	'priority' => 50,
)));

$wp_customize->add_setting(pragyan_get_customizer_id('back_to_top_show'),
    array(
        'default' => $defaults['back_to_top_show'],
        'transport' => 'refresh',
        'sanitize_callback' => 'pragyan_switch_sanitization',
    )
);
$wp_customize->add_control(new Pragyan_Customizer_Control_Switch ($wp_customize, pragyan_get_customizer_id('back_to_top_show'),
    array(
        'label' => esc_html__('Back to Top', 'pragyan'),
        'section' => 'back_to_top_section',
    )
));

