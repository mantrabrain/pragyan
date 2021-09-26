<?php
defined('ABSPATH') || exit;

/**
 * Main Pragyan_Header_Hooks Class.
 *
 * @class Pragyan_Header_Hooks
 */
class Pragyan_Header_Hooks
{

	public function __construct()
	{

		add_action('pragyan_after_page_start', array($this, 'preloader'), 10);
		add_action('pragyan_after_page_start', array($this, 'header'), 11);
		add_action('pragyan_main_header_right_icons', array($this, 'header_icons'));
		add_action('pragyan_main_header_right_icons', array($this, 'hamburger_menu_icon'), 20);
		add_filter('pragyan_top_header_left_items', array($this, 'top_header_left_items'));

	}

	public function top_header_left_items($items = array())
	{
		$top_email = sanitize_text_field(pragyan_get_option('top_email'));
		$top_phone = sanitize_text_field(pragyan_get_option('top_phone'));
		$items[] = array(
			'class' => '',
			'icon' => 'fa fa-envelope',
			'link' => 'mailto:' . esc_attr($top_email),
			'content' => $top_email
		);
		$items[] = array(
			'class' => '',
			'icon' => 'fas fa-phone-alt',
			'link' => 'tel:' . esc_attr($top_phone),
			'content' => $top_phone
		);
		return $items;


	}


	public function preloader()
	{
		$enable_preloader = (boolean)pragyan_get_option('preloader_show');

		if ($enable_preloader): ?>
			<div id="pragyan-preloader">
				<div class="pragyan-preloader">
					<span></span>
					<span></span>
				</div>
			</div>
		<?php endif;
	}

	public function header()
	{

		$header_top_show = (boolean)pragyan_get_option('header_top_show');
		?>
		<header id="header"
				class="header-sections">

			<?php
			do_action('pragyan_before_top_header');

			if ($header_top_show):
				get_template_part('template-parts/header/top', 'header');
			endif;
			do_action('pragyan_after_top_header');

			do_action('pragyan_mid_header');

			do_action('pragyan_before_main_header');

			get_template_part('template-parts/header/main', 'header');

			do_action('pragyan_after_main_header');


			?>
		</header>

		<?php

		if (!is_home() && !is_front_page()) {
			get_template_part('template-parts/header/page');
		}
	}

	public function header_icons($icons)
	{
		if ((boolean)pragyan_get_option('enable_main_header_search')) {
			$icons[] = array(
				'link' => 'javascript:void(0)',
				'id' => 'search',
				'icon' => 'fa fa-search'
			);
		}
		return $icons;

	}


	public function hamburger_menu_icon($items)
	{


		array_unshift($items, array(
			'class' => '',
			'wrap_class' => 'pragyan-mobile-navigation-menu-icon',
			'icon' => 'fa fa-bars',
			'link' => '#',
			'id' => 'pragyan-mobile-navigation-menu-icon',
			'content' => '',
			'type' => 'button'
		));


		return $items;
	}
}

new Pragyan_Header_Hooks();
