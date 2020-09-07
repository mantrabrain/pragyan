<?php

defined( 'ABSPATH' ) || exit;

class Pragyan_Customizer_Control_Radio extends WP_Customize_Control
{
	/**
	 * The type of control being rendered
	 */
	public $type = 'image_radio_button';

	/**
	 * Enqueue our scripts and styles
	 */
	public function enqueue()
	{
		$css_uri = PRAGYAN_THEME_URI . 'core/customizer/controls/radio/';

		wp_enqueue_style('pragyan-radio-control-css', $css_uri . 'radio.css', array(), PRAGYAN_THEME_VERSION);

	}

	/**
	 * Render the control in the customizer
	 */
	public function render_content()
	{
		?>
		<div class="image_radio_button_control">
			<?php if (!empty($this->label)) { ?>
				<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<?php } ?>
			<?php if (!empty($this->description)) { ?>
				<span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
			<?php } ?>
			<div class="image_radio_button_control_wrap">
				<?php foreach ($this->choices as $key => $value) { ?>
					<label class="radio-button-label">
						<input type="radio" name="<?php echo esc_attr($this->id); ?>"
							   value="<?php echo esc_attr($key); ?>" <?php $this->link(); ?> <?php checked(esc_attr($key), $this->value()); ?>/>
						<img src="<?php echo esc_attr($value['image']); ?>"
							 alt="<?php echo esc_attr($value['name']); ?>"
							 title="<?php echo esc_attr($value['name']); ?>"/>
					</label>
				<?php } ?>
			</div>
		</div>
		<?php
	}
}
