<?php

class Pragyan_Blog_Post_Widget extends Pragyan_Widget_Base
{

	/**
	 * Register widget with WordPress.
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname' => 'pragyan_blog_post_widget',
			'description' => __('Displays posts from selected categories in carousel layouts.', 'pragyan')
		);
		parent::__construct('pragyan_blog_post_widget', __('Pragyan::Blog Post', 'pragyan'), $widget_ops);
	}


	public function widget_fields()
	{


		$fields = array(

			'widget_title' => array(
				'name' => 'widget_title',
				'title' => esc_html__('Title', 'pragyan'),
				'type' => 'text',
				'default' => esc_html__('Blog Post', 'pragyan'),

			),
			'category' => array(
				'name' => 'category',
				'title' => esc_html__('Category', 'pragyan'),
				'type' => 'dropdown_categories'

			),
			'number_of_posts' => array(
				'name' => 'number_of_posts',
				'title' => esc_html__('Number of Posts', 'pragyan'),
				'type' => 'number',
				'default' => 3

			),
		);

		return $fields;
	}

	/**
	 * Front-end display of widget.
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 * @see WP_Widget::widget()
	 *
	 */
	function widget($args, $instance_arg)
	{
		$instance = Pragyan_Widget_Validation::instance()->validate($instance_arg, $this->widget_fields());

		$category = isset($instance['category']) ? $instance['category'] : 0;

		$pragyan_post_count = apply_filters('pragyan_blog_post_default_posts_count', $instance['number_of_posts']);

		$pragyan_block_args = array(
			'cat' => array($category),
			'posts_per_page' => absint($pragyan_post_count)
		);

		echo $args['before_widget'];
		?>
		<div class="pragyan-blog-post-wrap">

			<?php echo $args['before_title'] . $instance['widget_title'] . $args['after_title']; ?>

			<div class="pragyan-blog-post-inner">
				<?php
				$pragyan_block_query = new WP_Query($pragyan_block_args);
				if ($pragyan_block_query->have_posts()) {
					echo '<ul class="row pragyan-blog-post">';
					while ($pragyan_block_query->have_posts()) {
						$pragyan_block_query->the_post();
						?>
						<li class="col-4 item">
							<div class="pragyan-blog-post-content-wrap">
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="post-wrapper">
										<div class='post-formats-wrapper'>
											<?php the_post_thumbnail('pragyan-blog-image'); ?>
										</div>
										<div class="entry-content">
											<header class="entry-header">
													<?php pragyan_entry_meta(); ?>
													<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
											</header>
											<!-- .entry-header -->
											<div class="entry-summary">
												<?php
												the_excerpt();
												?>
											</div><!-- .entry-summary -->
											<div class="blog-btn pragyan-main-btn">
												<a href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e('Read More', 'pragyan'); ?></a>
											</div>
										</div><!-- .entry-content -->
									</div>
								</article><!-- #post-## -->
							</div><!-- .pragyan-blog-post-content-wrap -->
						</li>
						<?php
					}

					echo '</ul>';
				}
				wp_reset_postdata();

				?>
			</div><!-- .pragyan-blog-post-inner -->
		</div><!--- .pragyan-blog-post-wrap -->
		<?php
		echo $args['after_widget'];
	}


}
