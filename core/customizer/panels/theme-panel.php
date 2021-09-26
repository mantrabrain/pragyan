<?php

$wp_customize->add_panel(new Pragyan_Customizer_Panel($wp_customize, PRAGYAN_THEME_OPTION_PANEL, array(
    'priority' => 10,
    'title' => esc_html__('Theme Options', 'pragyan'),
    'capabitity' => 'edit_theme_options',
)));
