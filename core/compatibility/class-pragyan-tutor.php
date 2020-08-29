<?php
defined('ABSPATH') || exit;

if (!class_exists('Tutor')) {
	return;
}

/**
 * Pragyan Tutor Compatibility
 */
if (!class_exists('Pragyan_Tutor')) :

	/**
	 * Pragyan Tutor Compatibility
	 *
	 * @since 1.0.0
	 */
	class Pragyan_Tutor
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

if (apply_filters('pragyan_enable_tutor_integration', true) && class_exists('Tutor')) {
	Pragyan_Tutor::get_instance();
}
