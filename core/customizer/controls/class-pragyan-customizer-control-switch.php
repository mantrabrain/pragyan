<?php
defined( 'ABSPATH' ) || exit;


class Pragyan_Customizer_Control_Switch extends WP_Customize_Control
{
    private $attributes = array();

    public $type = 'pragyan_switch';

    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {
        parent::__construct($manager, $id, $args);

        $atts = isset($args['attributes']) ? $args['attributes'] : array();

        $default_atts = array(
            'on' => esc_html__('on', 'pragyan'),
            'off' => esc_html__('off', 'pragyan'),
        );
        $this->attributes = wp_parse_args($atts, $default_atts);


    }

    public function enqueue()
    {
        $css_uri = PRAGYAN_THEME_URI . 'core/customizer/controls/switch/';

        $js_uri = PRAGYAN_THEME_URI . 'core/customizer/controls/switch/';

        wp_enqueue_style('pragyan-control-switch-style', $css_uri . 'switch.css', null, PRAGYAN_THEME_VERSION);

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
        $this->json['attributes'] = $this->attributes;

        $this->json['inputAttrs'] = '';
        foreach ($this->input_attrs as $attr => $value) {
            $this->json['inputAttrs'] .= $attr . '="' . esc_attr($value) . '" ';
        }

    }

    protected function content_template()
    {
        ?>
        <div class="mb-switch-control-wrap">
            <# if ( data.label ) { #>
            <span class="pragyan-switch-label">{{{ data.label }}}</span>
            <# } #>

            <label class="mb-switch-control">
                <input {{{ data.inputAttrs }}} id="{{{ data.id }}}" {{{ data.link }}} type="checkbox" value="0"


                <#

                if ( data.value ) { #> checked="checked" <# }
                if (data.attributes) {
                #>>
                <span class="slider round" data-on="{{data.attributes.on}}"
                      data-off='{{data.attributes.off}}'></span>
                <# } #>
            </label>
        </div>
        <?php
    }

}
