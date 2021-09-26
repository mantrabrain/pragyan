<?php

// Setting enable_theme_style_homepage.
$wp_customize->add_setting(pragyan_get_customizer_id('enable_theme_style_homepage'),
    array(
        'default' => $defaults['enable_theme_style_homepage'],
        'sanitize_callback' => 'pragyan_sanitize_checkbox',

    )
);

$wp_customize->add_control(
    new Pragyan_Customizer_Control_Switch(
        $wp_customize,
        pragyan_get_customizer_id('enable_theme_style_homepage'),
        array(
            'label' => esc_html__('Theme Style Homepage', 'pragyan'),
            'section' => 'static_front_page',
            'priority' => 1,


        )
    )
);
