<?php
defined('ABSPATH') || exit;


/**
 * Main Pragyan_Customizer Class.
 *
 * @class Pragyan_Customizer
 */
class Pragyan_Customizer
{

	/**
	 * The single instance of the class.
	 *
	 * @var Pragyan_Customizer
	 * @since 1.0.0
	 */
	protected static $_instance = null;


	/**
	 * Main Pragyan_Customizer Instance.
	 *
	 * Ensures only one instance of Pragyan_Customizer is loaded or can be loaded.
	 *
	 * @return Pragyan_Customizer - Main instance.
	 * @since 1.0.0
	 * @static
	 */

	public static function instance()
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new self();
		}
		self::$_instance->includes();
		self::$_instance->hooks();

		return self::$_instance;
	}

	public function hooks()
	{

		// Get our Customizer defaults

		// Register our Panels
		add_action('customize_register', array($this, 'register_panel'), 10);
		add_action('customize_register', array($this, 'register_control'), 10);

		add_action('customize_register', array($this, 'pragyan_add_customizer_panels'));


		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'));

		add_action('customize_register', array($this, 'move_default_options'));


	}

	public function register_panel($wp_customize)
	{
		require_once PRAGYAN_THEME_DIR . 'core/customizer/class-pragyan-customizer-panel.php';
		require_once PRAGYAN_THEME_DIR . 'core/customizer/class-pragyan-customizer-section.php';

		$wp_customize->register_panel_type('Pragyan_Customizer_Panel');
		$wp_customize->register_section_type('Pragyan_Customizer_Section');

	}


	public function enqueue_control_scripts()
	{
		wp_enqueue_script('pragyan-customize-controls', trailingslashit(get_template_directory_uri()) . '/assets/js/customize-controls.js', array(), 1.0, true);

		wp_enqueue_script('pragyan-theme-extend-customizer-js', get_template_directory_uri() . '/core/customizer/assets/js/extend-customizer.js', array(), '', true);
		wp_enqueue_style('pragyan-theme-extend-customizer-css', get_template_directory_uri() . '/core/customizer/assets/css/extend-customizer.css', array(), PRAGYAN_THEME_VERSION);

	}

	public function move_default_options($wp_customize)
	{

		$wp_customize->get_section('static_front_page')->priority = 10;
		$wp_customize->get_setting('custom_logo')->transport = 'refresh';


	}

	public function register_control($wp_customize)
	{


		require_once PRAGYAN_THEME_DIR . 'core/customizer/controls/class-pragyan-customizer-control-switch.php';
		require_once PRAGYAN_THEME_DIR . 'core/customizer/controls/class-pragyan-customizer-control-slider.php';
		require_once PRAGYAN_THEME_DIR . 'core/customizer/controls/class-pragyan-customizer-control-heading.php';
		require_once PRAGYAN_THEME_DIR . 'core/customizer/controls/class-pragyan-customizer-control-color.php';
		require_once PRAGYAN_THEME_DIR . 'core/customizer/controls/class-pragyan-customizer-control-radio.php';
		require_once PRAGYAN_THEME_DIR . 'core/customizer/controls/class-pragyan-customizer-control-buttonset.php';

		$wp_customize->register_control_type('Pragyan_Customizer_Control_Switch');
		$wp_customize->register_control_type('Pragyan_Customizer_Control_Slider');
		$wp_customize->register_control_type('Pragyan_Customizer_Control_Color');
		$wp_customize->register_control_type('Pragyan_Customizer_Control_Buttonset');


	}

	//Customizer Panel
	public function pragyan_add_customizer_panels($wp_customize)
	{


		$defaults = pragyan_get_default_options();

		require_once get_template_directory() . '/core/customizer/panels/theme-panel.php';


		require_once get_template_directory() . '/core/customizer/sections/theme-home-page-options.php';
		require_once get_template_directory() . '/core/customizer/sections/theme-base-options.php';

		require_once get_template_directory() . '/core/customizer/sections/theme-header-options.php';
		require_once get_template_directory() . '/core/customizer/sections/theme-slider-and-services-options.php';

		require_once get_template_directory() . '/core/customizer/sections/theme-footer-options.php';

		require_once get_template_directory() . '/core/customizer/sections/theme-blog-archive-options.php';
		require_once get_template_directory() . '/core/customizer/sections/theme-single-post-options.php';
		require_once get_template_directory() . '/core/customizer/sections/theme-single-page-options.php';


	}


	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes()
	{
		require_once get_template_directory() . '/core/customizer/core.php';
		require_once get_template_directory() . '/core/customizer/sanitization.php';
		require_once get_template_directory() . '/core/customizer/active-callback/others.php';


	}
}

Pragyan_Customizer::instance();
