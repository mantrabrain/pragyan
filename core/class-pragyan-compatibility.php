<?php

defined('ABSPATH') || exit;


/**
 * Main Pragyan_Compatibility Class.
 *
 * @class Pragyan_Compatibility
 */
class Pragyan_Compatibility
{

	/**
	 * The single instance of the class.
	 *
	 * @var Pragyan_Compatibility
	 * @since 1.0.0
	 */
	protected static $_instance = null;


	/**
	 * Main Pragyan_Compatibility Instance.
	 *
	 * Ensures only one instance of Pragyan_Compatibility is loaded or can be loaded.
	 *
	 * @return Pragyan_Compatibility - Main instance.
	 * @since 1.0.0
	 * @static
	 */

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		self::$_instance->includes();
	}


	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes()
	{


		require_once PRAGYAN_THEME_DIR . '/core/compatibility/class-pragyan-sikshya.php';
		require_once PRAGYAN_THEME_DIR . '/core/compatibility/class-pragyan-learnpress.php';
		require_once PRAGYAN_THEME_DIR . '/core/compatibility/class-pragyan-tutor.php';


	}
}

Pragyan_Compatibility::instance();
