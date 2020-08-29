<?php
defined('ABSPATH') || exit;

if (!class_exists('Learnpress')) {
	return;
}

/**
 * Pragyan Learnpress Compatibility
 */
if (!class_exists('Pragyan_Learnpress')) :

	/**
	 * Pragyan Learnpress Compatibility
	 *
	 * @since 1.0.0
	 */
	class Pragyan_Learnpress
	{

		/**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;


		/**
		 * Initiator
		 */
		public static function get_instance()
		{
			if (!isset(self::$instance)) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct()
		{


		}

	}

endif;

if (apply_filters('pragyan_enable_learnpress_integration', true) && class_exists('LearnPress')) {
	Pragyan_Learnpress::get_instance();
}
