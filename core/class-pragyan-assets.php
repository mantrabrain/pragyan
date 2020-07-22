<?php
defined('ABSPATH') || exit;

class Pragyan_Assets
{
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'scripts'));
		add_action('admin_enqueue_scripts', array($this, 'admin_styles'));
		add_action('enqueue_block_editor_assets', array($this, 'block_editor_styles'));


	}

	public function block_editor_styles()
	{

		// Block styles.
		wp_enqueue_style('pragyan-block-editor-style', get_template_directory_uri() . '/assets/css/editor-blocks.css', array(), PRAGYA_THEME_VERSION);

	}

	public function admin_styles($hook)
	{
		wp_enqueue_style('pragyan-customizer', get_template_directory_uri() . '/core/customizer/assets/css/customizer.css', '', PRAGYA_THEME_VERSION);

		wp_enqueue_media();

		if (is_admin()) {
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_script('wp-color-picker');
		}
		if ('widgets.php' === $hook) {

			wp_enqueue_script('underscore');

			wp_enqueue_style('pragyan-admin', get_template_directory_uri() . '/assets/admin/css/admin.css', array(), PRAGYA_THEME_VERSION);

			wp_enqueue_style('pragyan-admin-font-awesome', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.css', array(), PRAGYA_THEME_VERSION);

			wp_enqueue_media();

			wp_enqueue_script('pragyan-admin', get_template_directory_uri() . '/assets/admin/js/admin.js', array('jquery'), PRAGYA_THEME_VERSION);

		}
	}


	public function scripts()
	{


		// Theme stylesheet.
		wp_enqueue_style('pragyan-style', get_stylesheet_uri());
		// Theme block stylesheet.
		wp_enqueue_style('pragyan-block-style', get_template_directory_uri() . '/assets/css/blocks.css', array('pragyan-style'), PRAGYA_THEME_VERSION);
		if (is_rtl()) {
			wp_enqueue_style('bootstrap-rtl', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap-rtl.min.css');
		}
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.css', array(), '4.0.0');
		wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.min.css', '4.7.0');


		wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/vendor/owl-carousel/owl.carousel.css', array(), PRAGYA_THEME_VERSION);

		wp_enqueue_style('pragyan-theme', get_template_directory_uri() . '/assets/css/pragyan.css', array(), PRAGYA_THEME_VERSION);

		wp_enqueue_script('pragyan-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), PRAGYA_THEME_VERSION, true);

		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), '4.1.3', true);

		wp_enqueue_script('jquery-sticky', get_template_directory_uri() . '/assets/vendor/sticky/jquery.sticky.js', array('jquery'), PRAGYA_THEME_VERSION, true);

		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/vendor/owl-carousel/owl.carousel.js', array('jquery'), PRAGYA_THEME_VERSION, true);

		wp_enqueue_script('pragyan-theme-script', get_template_directory_uri() . '/assets/js/pragyan.js', array('jquery', 'jquery-sticky', 'owl-carousel'), PRAGYA_THEME_VERSION, true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}


}

new Pragyan_Assets();
