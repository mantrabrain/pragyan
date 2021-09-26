<?php

class Pragyan_Section_Pro_Customizer
{

	public function __construct()
	{
		add_action('customize_register', array($this, 'pro_customizer'));
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);


	}

	public function pro_customizer($manager)
	{

		require_once "control/section-pro.php";
		// Register custom section types.
		$manager->register_section_type('Pragyan_Customizer_Control_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Pragyan_Customizer_Control_Section_Pro(
				$manager,
				'pragyan-pro',
				array(
					'pro_text' => esc_html__('Get More Features in Pragyan Pro', 'pragyan'),
					'pro_url' => 'https://mantrabrain.com/downloads/pragyan-pro/?utm_source=pragyan-customizer&utm_medium=view-pro&utm_campaign=upgrade',
					'priority' => 0
				)
			)
		);
	}


	public function enqueue_control_scripts()
	{
		$script_uri = PRAGYAN_THEME_URI . 'core/info/customizer/control/';

		wp_enqueue_script('pragyan-customizer-pro-control-js', $script_uri . 'pro.js', array('customize-controls'));
		wp_enqueue_style('pragyan-customizer-pro-control-css', $script_uri . 'pro.css');

	}


}

if (!class_exists('Pragyan_Pro')) {
	new Pragyan_Section_Pro_Customizer();
}


