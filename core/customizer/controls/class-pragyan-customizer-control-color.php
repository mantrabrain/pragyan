<?php
defined( 'ABSPATH' ) || exit;

if (!class_exists('Pragyan_Customizer_Control_Color')) :
	/**
	 */
	class Pragyan_Customizer_Control_Color extends WP_Customize_Control
	{

		/**
		 * The control type.
		 *
		 * @var string
		 */
		public $type = 'pragyan-color';

		/**
		 * Add support for showing the opacity value on the slider handle.
		 *
		 * @var boolean
		 */
		public $opacity;

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue()
		{

			$control_uri = PRAGYAN_THEME_URI . 'core/customizer/controls/color/';

			// Control type.
			$pragyan_type = str_replace('pragyan-', '', $this->type);

			// Enqueue WordPress color picker styles.
			wp_enqueue_style('wp-color-picker');

			// Enqueue control stylesheet.
			wp_enqueue_style(
				'pragyan-' . $pragyan_type . '-control-style',
				$control_uri. $pragyan_type  . '.css',
				false,
				PRAGYAN_THEME_VERSION,
				'all'
			);

			// Enqueue our control script.
			wp_enqueue_script(
				'pragyan-' . $pragyan_type . '-js',
				$control_uri. $pragyan_type  . '.js',
				array('jquery', 'customize-base', 'wp-color-picker'),
				PRAGYAN_THEME_VERSION,
				true
			);

			$customizer_localized = array(
				'color_palette' => array('#ffffff', '#000000', '#e4e7ec', '#3857F1', '#f7b40b', '#e04b43', '#30373e', '#8a63d4'),

			);
			wp_localize_script(
				'pragyan-' . $pragyan_type . '-js',
				'pragyan_customizer_localized',
				$customizer_localized
			);
		}

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json()
		{
			parent::to_json();

			if (isset($this->default)) {
				$this->json['default'] = $this->default;
			} else {
				$this->json['default'] = $this->setting->default;
			}
			$this->json['opacity'] = (false === $this->opacity || 'false' === $this->opacity) ? 'false' : 'true';
			$this->json['value'] = $this->value();
			$this->json['choices'] = $this->choices;
			$this->json['link'] = $this->get_link();
			$this->json['id'] = $this->id;

			$this->json['inputAttrs'] = '';
			foreach ($this->input_attrs as $attr => $value) {
				$this->json['inputAttrs'] .= $attr . '="' . esc_attr($value) . '" ';
			}
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 */
		protected function content_template()
		{
			?>
			<div class="pragyan-color-wrapper pragyan-control-wrapper">

				<# if ( data.label ) { #>
				<div class="customize-control-title">
					<span>{{{ data.label }}}</span>

				</div>
				<# } #>
				<# if ( data.description ) { #>
				<div class="customize-control-description">
					<span>{{{ data.description }}}</span>
				</div>
				<# } #>

				<div>
					<input class="pragyan-color-control" type="text" value="{{ data.value }}"
						   data-show-opacity="{{ data.opacity }}" data-default-color="{{ data.default }}"/>
				</div>

			</div><!-- END .pragyan-toggle-wrapper -->
			<?php
		}

	}
endif;
