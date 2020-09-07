<?php
defined( 'ABSPATH' ) || exit;

if (!class_exists('WP_Customize_Control'))
    return;

/**
 * Class to create a custom tags control
 */

/**
 * Slider Custom Control
 *
 * @author Mantrabrain <http://mantrabrain.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.html
 * @link https://github.com/mantrabrain
 */
class Pragyan_Customizer_Control_Slider extends WP_Customize_Control
{
    /**
     * The type of control being rendered
     */
    public $type = 'pragyan_slider';

    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $script_uri = PRAGYAN_THEME_URI . 'core/customizer/controls/slider/';

        wp_enqueue_script('pragyan-slider-control-js', $script_uri . 'slider.js', array('jquery'), PRAGYAN_THEME_VERSION, true);

        wp_enqueue_style('pragyan-slider-control-css', $script_uri . 'slider.css', array(), PRAGYAN_THEME_VERSION);


    }
    public function to_json()
    {
        parent::to_json();

        if (isset($this->default)) {
            $this->json['default'] = $this->default;
        } else {
            $this->json['default'] = $this->setting->default;
        }
        $this->json['value'] = $this->value();
        $this->json['choices'] = $this->choices;
        $this->json['link'] = $this->get_link();
        $this->json['id'] = $this->id;

        $this->json['inputAttrs'] = '';
        $this->json['input_attrs'] = $this->input_attrs;
        foreach ($this->input_attrs as $attr => $value) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr($value) . '" ';
        }

    }
    public function content_template()
    {
        ?>
        <div class="pragyan-slider-control">
            <#
			if ( data.label ) { #>
            <span class="customize-control-title">{{{ data.label }}}</span>
            <# } #>
            <# if ( data.description ) { #>
            <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <div class="pragyan-slider-control-wrap">
                <input type="number"
                       {{{ data.inputAttrs }}}
                       id="{{{ data.id }}}"
                       {{{ data.link }}}
                />
                <div class="pragyan-slider" data-min="{{{ data.input_attrs.min }}}"
                     data-max="{{{ data.input_attrs.max }}}"
                     data-step="{{{ data.input_attrs.step }}}"
                     data-default="{{{ data.default }}}"
                ></div>
                <span class="pragyan-slider-reset dashicons dashicons-image-rotate"
                      data-reset="{{{ data.value }}}"></span>

            </div>
        </div>
        <?php
    }

}
