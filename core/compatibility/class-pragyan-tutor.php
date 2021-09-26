<?php
defined('ABSPATH') || exit;

if (!class_exists('\TUTOR\Tutor')) {

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

		public function __construct()
		{

			add_action('wp_enqueue_scripts', array($this, 'scripts'));


		}

		public function scripts()
		{

			wp_enqueue_style('pragyan-tutor', get_template_directory_uri() . '/assets/css/tutor.css', array(), PRAGYAN_THEME_VERSION);
		}


	}

endif;

if (apply_filters('pragyan_enable_tutor_integration', true) && class_exists('\TUTOR\Tutor')) {
	Pragyan_Tutor::get_instance();
}
