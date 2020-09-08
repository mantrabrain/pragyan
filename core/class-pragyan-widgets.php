<?php

class Pragyan_Widgets
{
	public function __construct()
	{
		$this->includes();

		add_action('widgets_init', array($this, 'register_sidebar'));
		add_action('widgets_init', array($this, 'init_widgets'));


	}

	public function register_sidebar()
	{
		register_sidebar(array(
			'name' => esc_html__('Left Sidebar', 'pragyan'),
			'id' => 'pragyan_left_sidebar',
			'description' => esc_html__('Add widgets here to appear in your left sidebar on blog posts and archive pages.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'name' => esc_html__('Right Sidebar', 'pragyan'),
			'id' => 'pragyan_right_sidebar',
			'description' => esc_html__('Add widgets here to appear in your right sidebar on blog posts and archive pages.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'name' => esc_html__('Before Home Page Main Content Area', 'pragyan'),
			'id' => 'pragyan_before_home_page_main_content_area',
			'description' => esc_html__('Add widgets here to appear in your home page full width.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'name' => esc_html__('Home Page Main Content Area', 'pragyan'),
			'id' => 'pragyan_home_page_main_content_area',
			'description' => esc_html__('Add widgets here to appear in your home page full width.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'name' => esc_html__('Home Page Sidebar', 'pragyan'),
			'id' => 'pragyan_home_page_sidebar',
			'description' => esc_html__('Add widgets here to appear in your home page full width.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'name' => esc_html__('After Home Page Main Content Area', 'pragyan'),
			'id' => 'pragyan_after_home_page_main_content_area',
			'description' => esc_html__('Add widgets here to appear in your home page full width.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));

		register_sidebar(array(
			'name' => esc_html__('Footer 1', 'pragyan'),
			'id' => 'footer-1',
			'description' => esc_html__('Add widgets here to appear in your footer.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));

		register_sidebar(array(
			'name' => esc_html__('Footer 2', 'pragyan'),
			'id' => 'footer-2',
			'description' => esc_html__('Add widgets here to appear in your footer.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));
		register_sidebar(array(
			'name' => esc_html__('Footer 3', 'pragyan'),
			'id' => 'footer-3',
			'description' => esc_html__('Add widgets here to appear in your footer.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));

		register_sidebar(array(
			'name' => esc_html__('Footer 4', 'pragyan'),
			'id' => 'footer-4',
			'description' => esc_html__('Add widgets here to appear in your footer.', 'pragyan'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		));

	}

	public function init_widgets()
	{

		register_widget('Pragyan_Blog_Post_Widget');

		register_widget('Pragyan_Tabbed_Widget');

		do_action('pragyan_init_widgets');


	}

	public function includes()
	{

		require PRAGYAN_THEME_DIR . '/core/widgets/class-pragyan-widget-base.php';
		require PRAGYAN_THEME_DIR . '/core/widgets/class-pragyan-widget-validation.php';
		require PRAGYAN_THEME_DIR . '/core/widgets/class-pragyan-blog-post.php';
		require PRAGYAN_THEME_DIR . '/core/widgets/class-pragyan-tabbed.php';

		do_action('pragyan_include_widgets');


	}

}

new Pragyan_Widgets();
