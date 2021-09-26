<?php
defined('ABSPATH') || exit;

/**
 * Main Pragyan_Footer_Hooks Class.
 *
 * @class Pragyan_Footer_Hooks
 */
class Pragyan_Footer_Hooks
{

	public function __construct()
	{
		add_action('pragyan_before_body_close', array($this, 'go_to_top'));
		add_action('pragyan_before_body_close', array($this, 'footer_responsive_content'));
		add_action('pragyan_footer', array($this, 'footer'));
		add_action('pragyan_top_footer_widget_area', array($this, 'top_footer_widget_area'));
	}

	public function go_to_top()
	{
		$back_to_top_show = (boolean)pragyan_get_option('back_to_top_show');

		if ($back_to_top_show) {
			?>
			<a href="#page" class="back-to-top" id="back-to-top">
				<i class="fa fa-chevron-up" aria-hidden="true"></i>
			</a>
			<?php
		}
	}

	public function footer()
	{

		?>
		<footer id="colophon" class="site-footer">
			<?php
			if (is_active_sidebar('footer-1') ||
				is_active_sidebar('footer-2') ||
				is_active_sidebar('footer-3') ||
				is_active_sidebar('footer-4')) :
				get_template_part('template-parts/footer/top', 'footer');
			endif;
			get_template_part('template-parts/footer/bottom', 'footer');


			?>

		</footer><!-- #colophon -->

		<?php
	}

	public function top_footer_widget_area()
	{

		$footer_widget_area_column = pragyan_get_option('footer_widget_area_column');

		if (is_active_sidebar('footer-1') ||
			is_active_sidebar('footer-2') ||
			is_active_sidebar('footer-3') ||
			is_active_sidebar('footer-4')) :

			$all_templates = pragyan_footer_widget_area_layouts();

			if (!isset($all_templates[$footer_widget_area_column])) {

				$footer_widget_area_column = 'layout_1';
			}

			$footer_widget_area_column = str_replace('_', '-', $footer_widget_area_column);

			get_template_part('template-parts/footer/layouts/' . $footer_widget_area_column);

		endif;

	}

	public function footer_responsive_content()
	{
		get_template_part('template-parts/footer/responsive-content');

	}
}

new Pragyan_Footer_Hooks();
