<?php
defined('ABSPATH') || exit;


final class Pragyan_Core
{
	private static $instance = null;

	public static function get_instance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self;
		}

		return self::$instance;

	}

	public function __construct()
	{
		$this->hooks();
		$this->includes();

	}

	public function hooks()
	{
		add_action('after_setup_theme', array($this, 'setup'));
		add_filter('excerpt_length', array($this, 'pragyan_excerpt_length'), 999);

		add_action('wp_head', array($this, 'pragyan_pingback_header'));
		add_filter('get_header_image_tag', array($this, 'pragyan_header_image_tag'), 10, 3);


	}

	function setup()
	{

		//Make theme available for translation.
		load_theme_textdomain('pragyan', get_template_directory() . '/languages');
		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');
		add_theme_support('woocommerce');

		//Let WordPress manage the document title.
		add_theme_support('title-tag');

		//Enable support for Post Thumbnails on posts and pages.
		add_theme_support('post-thumbnails');
		add_image_size('pragyan-featured-image', 1450, 480, true);
		add_image_size('pragyan-blog-image', 1140, 710, true);
		add_image_size('pragyan-thumbnail-avatar', 100, 100, true);
		add_image_size('pragyan_blog_image_360x210', 360, 210, true);

		// Set the default content width.
		$GLOBALS['content_width'] = 525;

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'pragyan'),
			'footer_menu' => esc_html__('Footer Menu', 'pragyan'),
		));

		//Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support('html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Enable support for Post Formats.
		add_theme_support('post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		));

		// Add theme support for Custom Logo.
		add_theme_support('custom-logo', array(
			'width' => 250,
			'height' => 250,
			'flex-height' => true,
			'flex-width' => true,
		));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		// Add support for Block Styles.
		add_theme_support('wp-block-styles');

		// Add support for full and wide align images.
		add_theme_support('align-wide');

		// Enqueue editor styles.
		add_editor_style('style-editor.css');

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		 */
		add_editor_style(array('assets/css/editor-style.css'));

		// Load regular editor styles into the new block-based editor.
		add_theme_support('editor-styles');

		// Add support for responsive embeds.
		add_theme_support('responsive-embeds');

		// Add theme support for Custom Background.
		$args = array(
			'default-color' => '#ffffff',
			'default-image' => '',
		);

		add_theme_support('custom-background', $args);

		$args = array(
			'width' => 1450,
			'flex-height' => true,
			'flex-width' => true,
			'height' => 480,
			'default-text-color' => '',
			'default-image' => '',
			'wp-head-callback' => 'pragyan_head_callback',
		);
		add_theme_support('custom-header', $args);
	}


	function pragyan_excerpt_length($length)
	{
		if (is_admin()) {
			return $length;
		}
		$excerpt = get_theme_mod('exc_lenght', '45');

		return $excerpt;
	}

	function pragyan_pingback_header()
	{
		if (is_singular() && pings_open()) {
			printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
		}
	}


	function pragyan_header_image_tag($html, $header, $attr)
	{
		if (isset($attr['sizes'])) {
			$html = str_replace($attr['sizes'], '100vw', $html);
		}
		return $html;
	}


	public function includes()
	{

		/**
		 * Implement the Custom Header feature.
		 */
		require PRAGYAN_THEME_DIR . '/core/functions.php';


		// Classes
		require PRAGYAN_THEME_DIR . '/core/class-pragyan-assets.php';
		require PRAGYAN_THEME_DIR . '/core/class-pragyan-compatibility.php';

		require PRAGYAN_THEME_DIR . '/core/class-pragyan-customizer.php';
		require PRAGYAN_THEME_DIR . '/core/class-pragyan-widgets.php';
		require PRAGYAN_THEME_DIR . '/core/class-pragyan-hooks.php';

		// Vendors

		require PRAGYAN_THEME_DIR . '/core/vendor/breadcrumb-trail/class-pragyan-breadcrumb-trail.php';


		require PRAGYAN_THEME_DIR . '/core/dynamic-style.php';
		require PRAGYAN_THEME_DIR . '/core/misc-functions.php';
		require PRAGYAN_THEME_DIR . '/core/template-tags.php';
		require PRAGYAN_THEME_DIR . '/core/template-functions.php';
		require PRAGYAN_THEME_DIR . '/core/option-functions.php';


		if (is_admin()) {
			// Meta boxes.
			require PRAGYAN_THEME_DIR . '/core/meta-boxes/class-pragyan-meta-box-page-settings.php';
			require PRAGYAN_THEME_DIR . '/core/meta-boxes/class-pragyan-meta-box.php';
			require PRAGYAN_THEME_DIR . '/core/info/class-pragyan-theme-information.php';

			// TGMPA

			require_once PRAGYAN_THEME_DIR . 'core/vendor/tgmpa/class-tgm-plugin-activation.php';
			require_once PRAGYAN_THEME_DIR . 'core/vendor/tgmpa/tgmpa-pragyan.php';

		}

	}


}
