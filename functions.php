<?php

/**
 * Pragyan functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mantrabrain
 * @subpackage Pragyan
 * @since 1.0.0
 */

define('PRAGYA_THEME_VERSION', '0.0.3	');
define('PRAGYA_THEME_SETTINGS', 'pragyan');
define('PRAGYA_THEME_OPTION_PANEL', 'pragyan_theme_option_panel');
define('PRAGYA_THEME_DIR', trailingslashit(get_template_directory()));
define('PRAGYA_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
// Theme Core file init

require_once PRAGYA_THEME_DIR . 'core/class-pragyan-core.php';

function Pragyan()
{
    return Pragyan_Core::get_instance();

}

Pragyan();


