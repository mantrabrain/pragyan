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

		public function __construct()
		{

			add_action('wp_enqueue_scripts', array($this, 'scripts'));


		}

		public function scripts()
		{

			wp_enqueue_style('pragyan-learnpress', get_template_directory_uri() . '/assets/css/learnpress.css', array(), PRAGYAN_THEME_VERSION);
		}

	}

endif;

if (apply_filters('pragyan_enable_learnpress_integration', true) && class_exists('LearnPress')) {
	Pragyan_Learnpress::get_instance();
}
