<?php
defined( 'ABSPATH' ) || exit;

/**
 * Main Pragyan_Template_Hooks Class.
 *
 * @class Pragyan_Template_Hooks
 */
class Pragyan_Template_Hooks
{

	public function __construct()
	{
		add_action('pragyan_before_content', array($this, 'before_content'));
		add_action('pragyan_content', array($this, 'main_content'));
		add_action('pragyan_after_content', array($this, 'after_content'));
		add_action('pragyan_before_main_content_loop', array($this, 'before_main_content_loop'));
		add_action('pragyan_after_main_content_loop', array($this, 'after_main_content_loop'));


	}

	public function before_main_content_loop()
	{

		if (is_404()) {
			return;
		}
		$blog_sidebar = pragyan_base_sidebar_layout();

		if ('pragyan_left_sidebar' == $blog_sidebar):
			?>
			<div class="col-md-4">
				<?php
					get_sidebar('left');
				?>
			</div>
		<?php
		endif;

	}

	public function after_main_content_loop()
	{


		if (is_404()) {
			return;
		}
		$blog_sidebar = pragyan_base_sidebar_layout();

		if ('pragyan_right_sidebar' == $blog_sidebar):

			?>
			<div class="col-md-4">
				<?php
				get_sidebar(); ?>
			</div>
		<?php
		endif;

	}

	public function before_content()
	{
		?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php if(!pragyan_is_home_page()){ ?>
				<div class="container">
					<div class="row justify-content-center">
		<?php }
	}

	public function main_content()
	{
		$home_page = (boolean)pragyan_get_option('enable_theme_style_homepage');

		if (is_404()) {
			$this->page_404();
			return;
		}elseif (pragyan_is_home_page()) {
			 $this->homepage();
			 return;
		}

		$global_sidebar = pragyan_base_sidebar_layout();

		do_action('pragyan_before_main_content_loop');

		$content_class = 'col-md-8 content-wrapper';

		switch($global_sidebar){
			case "full_width":
				$content_class = 'col-md-12 content-wrapper';
				break;

		}
		?>


		<div class="<?php echo esc_attr($content_class); ?>">


			<?php

			if (have_posts()) : ?>
				<?php
				/* Start the Loop */
				while (have_posts()) : the_post();

					if (is_single() && !is_page()) {

						get_template_part('template-parts/post/single');

					} else if (is_page() || (get_post_type() !='post')) {
						get_template_part('template-parts/page/content', 'page');

					} else {

						get_template_part('template-parts/post/content', get_post_type());


					}
				endwhile;

				if (is_single()) {
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;

				} else {
					the_posts_pagination(array(
						'prev_text' => '<i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i>',
						'next_text' => '<i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>',
					));
				}

			else :

				get_template_part('template-parts/post/content', 'none');

			endif; ?>

		</div>

		<?php

		do_action('pragyan_after_main_content_loop');


	}

	public function after_content()
	{
		if(!pragyan_is_home_page()){

			echo '</div><!-- .row -->';

			echo '</div><!-- .container -->';
		}

		echo '</main><!-- #main -->';

		echo '</div><!-- #primary -->';
	}

	public function page_404()
	{

		$error_404_heading = pragyan_get_option('error_404_heading');

		$error_404_text = pragyan_get_option('error_404_text');

		$error_404_link_text = pragyan_get_option('error_404_home_text');

		?>
		<div class="col-md-12">
			<section class="error-404  text-center">
				<div class="page-content">
				   <h2 class="error-404-heading"><?php echo esc_html($error_404_heading); ?></h2>
					<p class="text-404"><?php echo esc_html($error_404_text); ?></p>
					<div class="go-home"><a href="<?php echo esc_url(get_home_url('/')); ?>"
											class="pragyan-color"><?php echo esc_html($error_404_link_text); ?></a>
					</div>
				</div><!-- .page-content -->
			</section>
		</div>
		<?php

	}
	public function homepage(){
		$show_pragyan_slider= (boolean)pragyan_get_option('show_pragyan_slider');
		$show_pragyan_services= (boolean)pragyan_get_option('show_pragyan_services');

		if($show_pragyan_slider){
		get_template_part('template-parts/home/slider');
		}
		if($show_pragyan_services){
		get_template_part('template-parts/home/services');
		}
		get_template_part('template-parts/home/before-main-content');
		get_template_part('template-parts/home/main-content');
		get_template_part('template-parts/home/after-main-content');
	}

}

new Pragyan_Template_Hooks();
