<?php


class Pragyan_Tabbed_Widget extends Pragyan_Widget_Base
{

	/**
	 * Register widget with WordPress.
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname' => 'pragyan_tabbed_widget',
			'description' => __('A widget shows recent posts and comment in tabbed layout.', 'pragyan')
		);
		parent::__construct('pragyan_tabbed_widget', __('Pragyan::Tabbed', 'pragyan'), $widget_ops);
	}

	public function widget_fields()
	{


		$fields = array(

			'latest_post_tab_title' => array(
				'name' => 'latest_post_tab_title',
				'title' => esc_html__('Posts', 'pragyan'),
				'type' => 'text',
				'default' => esc_html__('Latest Posts', 'pragyan'),

			),
			'latest_post_count' => array(
				'name' => 'latest_post_count',
				'title' => esc_html__('Number of Posts', 'pragyan'),
				'type' => 'number',
				'default' => 3,

			),
			'recent_comment_tab_title' => array(
				'name' => 'recent_comment_tab_title',
				'title' => esc_html__('Comments', 'pragyan'),
				'type' => 'text',
				'default' => esc_html__('Comments', 'pragyan'),

			),
		);

		return $fields;
	}

	function widget($args, $instance_arg)
	{


		$instance = Pragyan_Widget_Validation::instance()->validate($instance_arg, $this->widget_fields());

		echo $args['before_widget'];
		?>
		<div class="pragyan-tabbed-widget-wrap">

			<ul class="widget-tabs">
				<li class="active"
					data-id="pragyan_latest_posts_tab_content"><?php echo esc_html($instance['latest_post_tab_title']); ?>
				</li>
				<li data-id="pragyan_recent_comments_tab_content"><?php echo esc_html($instance['recent_comment_tab_title']); ?></li>
			</ul><!-- .widget-tabs -->

			<div class="pragyan-tab-content">
				<div class="pragyan_latest_posts_tab_content content active">
					<?php
					$pragyan_post_count = apply_filters('pragyan_latest_tabbed_posts_count', $instance['latest_post_count']);
					$latest_args = array(
						'posts_per_page' => $pragyan_post_count
					);
					$latest_query = new WP_Query($latest_args);
					if ($latest_query->have_posts()) {
						while ($latest_query->have_posts()) {
							$latest_query->the_post();
							?>
							<div class="pragyan-tabbed-post-wrap ">
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
							</div><!-- .pragyan-tabbed-post-wrap -->
							<?php
						}
					}
					wp_reset_postdata();
					?>
				</div><!-- #latest -->

				<div class="pragyan_recent_comments_tab_content content">
					<ul>
						<?php
						$pragyan_comments_count = apply_filters('pragyan_comment_tabbed_posts_count', 5);
						$pragyan_tabbed_comments = get_comments(array('number' => $pragyan_comments_count));
						foreach ($pragyan_tabbed_comments as $comment) {
							?>
							<li class="pragyan-tabbed-comment-wrap">
								<?php
								$title = get_the_title($comment->comment_post_ID);
								echo '<div class="avatar">' . get_avatar($comment, '55') . '</div>';
								?>
								<div class="pragyan-tabbed-comment-wrap-details">
									<strong><?php echo strip_tags($comment->comment_author); ?></strong>
									<?php esc_html_e('&nbsp;commented on', 'pragyan'); ?>
									<a href="<?php echo esc_url(get_permalink($comment->comment_post_ID)); ?>"
									   rel="external nofollow"
									   title="<?php echo esc_attr($title); ?>"> <?php echo esc_html($title); ?></a>: <?php echo wp_html_excerpt($comment->comment_content, 50); ?>
								</div>
							</li>
							<?php
						}
						?>
					</ul>
				</div><!-- #comments -->
			</div>

		</div>
		<?php
		echo $args['after_widget'];
	}
}
