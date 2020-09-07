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

$pragyan_theme = wp_get_theme('pragyan');

define('PRAGYAN_THEME_VERSION', $pragyan_theme->get('Version'));
define('PRAGYAN_THEME_SETTINGS', 'pragyan');
define('PRAGYAN_THEME_OPTION_PANEL', 'pragyan_theme_option_panel');
define('PRAGYAN_THEME_DIR', trailingslashit(get_template_directory()));
define('PRAGYAN_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
// Theme Core file init

require_once PRAGYAN_THEME_DIR . 'core/class-pragyan-core.php';

function Pragyan()
{
	return Pragyan_Core::get_instance();

}

Pragyan();


