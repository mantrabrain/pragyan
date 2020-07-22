<?php


class Pragyan_CTA_Widget extends Pragyan_Widget_Base
{

	/**
	 * Register widget with WordPress.
	 */
	public function __construct()
	{
		$widget_ops = array(
			'classname' => 'pragyan_cta_widget',
			'description' => __('Call to action widget', 'pragyan')
		);
		parent::__construct('pragyan_cta_widget', __('Pragyan::CTA', 'pragyan'), $widget_ops);
		add_action('wp_head', array($this, 'add_inline_css'));
	}

	public function widget_fields()
	{


		$fields = array(

			'widget_title' => array(
				'name' => 'widget_title',
				'title' => esc_html__('Title', 'pragyan'),
				'type' => 'text',
				'default' => '',

			),

			'cta_heading' => array(
				'name' => 'cta_heading',
				'title' => esc_html__('CTA Heading', 'pragyan'),
				'type' => 'text',
				'default' => 'CTA Heading'

			),
			'cta_background' => array(
				'name' => 'cta_background',
				'title' => esc_html__('CTA Background', 'pragyan'),
				'type' => 'image'

			),
			'is_parallax' => array(
				'name' => 'is_parallax',
				'title' => esc_html__('Make parallax?', 'pragyan'),
				'type' => 'checkbox',
				'default' => false

			),
			'description' => array(
				'name' => 'description',
				'title' => esc_html__('Description Text', 'pragyan'),
				'type' => 'text',
				'default' => 'This is Simple Description text for cta'

			),
			'button_url' => array(
				'name' => 'button_url',
				'title' => esc_html__('Button URL', 'pragyan'),
				'type' => 'url',
				'default' => ''

			),
			'button_text' => array(
				'name' => 'button_text',
				'title' => esc_html__('Button Text', 'pragyan'),
				'type' => 'text',
				'default' => 'Button'

			),
			'button_target' => array(
				'name' => 'button_target',
				'title' => esc_html__('Open in new tab', 'pragyan'),
				'type' => 'checkbox',
				'default' => true

			),
			'min_height' => array(
				'name' => 'min_height',
				'title' => esc_html__('Minimum Height', 'pragyan'),
				'type' => 'number',
				'default' => ''

			),
		);

		return $fields;
	}

	public function add_inline_css()
	{
		$raw_instances = $this->get_settings();
		$raw_instance = isset($raw_instances[$this->number]) ? $raw_instances[$this->number] : array();
		$instance = Pragyan_Widget_Validation::instance()->validate($raw_instance, $this->widget_fields());
		?>
		<style>
			#<?php echo $this->id ?> .pragyan-cta-content.pragyan-full-width:before {
				background-image: url("<?php echo $instance['cta_background'] ?>");
			}
			<?php
			if(absint($instance['min_height'])>0){ ?>
			#<?php echo $this->id ?> .pragyan-cta-content {
				min-height: <?php echo absint($instance['min_height']) ?>px;
			}
			<?php } ?>
		</style>
		<?php
	}

	function widget($args, $instance_arg)
	{


		$instance = Pragyan_Widget_Validation::instance()->validate($instance_arg, $this->widget_fields());

		echo $args['before_widget'];

		?>
		<div class="pragyan-cta-wrapper">

			<?php echo $args['before_title'] . $instance['widget_title'] . $args['after_title']; ?>

			<?php

			$is_full_width = true;
			$cta_css = !empty($instance['cta_background']) ? 'background-image:url(\'' . $instance['cta_background'] . '\');' : '';
			$content_class = 'pragyan-cta-content ';
			$content_class .= (boolean)$instance['is_parallax'] ? 'parallax ' : '';
			$content_class .= $is_full_width ? 'pragyan-full-width' : '';
			?>
			<div
				class="<?php echo esc_attr($content_class); ?>"
				data-image="<?php echo esc_attr($instance['cta_background']); ?>"
				style="<?php echo esc_attr($cta_css) ?>">

				<div class="row justify-content-center">
					<div class="col-12">
						<?php
						if (!empty($instance['cta_heading'])) {
							?><h3 class="pragyan-cta-heading"><?php echo esc_html($instance['cta_heading']) ?></h3>
							<?php
						}
						?>
						<p><?php echo esc_html($instance['description']); ?></p>
						<?php
						if (!empty($instance['button_url'])) {
							?>
							<a class="button button-primary cta-button"
							   href="<?php echo esc_url($instance['button_url']); ?>"
							   target="<?php echo esc_attr($instance['button_target']); ?>"><?php echo esc_html($instance['button_text']) ?></a>
							<?php
						}
						?>

					</div>
				</div>
			</div>
		</div><!-- .pragyan-ads-wrapper -->
		<?php

		echo $args['after_widget'];
	}
}
