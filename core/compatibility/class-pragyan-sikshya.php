<?php
defined('ABSPATH') || exit;

if (!class_exists('Sikshya')) {
	return;
}

/**
 * Pragyan Sikshya Compatibility
 */
if (!class_exists('Pragyan_Sikshya')) :

	/**
	 * Pragyan Sikshya Compatibility
	 *
	 * @since 1.0.0
	 */
	class Pragyan_Sikshya
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

			add_action('wp_enqueue_scripts', array($this, 'scripts'));


		}

		public function scripts()
		{

			wp_enqueue_style('pragyan-sikshya', get_template_directory_uri() . '/assets/css/sikshya.css', array(), PRAGYAN_THEME_VERSION);
		}

	}

endif;

if (apply_filters('pragyan_enable_sikshya_integration', true) && class_exists('Sikshya')) {
	Pragyan_Sikshya::get_instance();
}
