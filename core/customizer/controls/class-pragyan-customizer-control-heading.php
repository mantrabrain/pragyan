<?php
defined( 'ABSPATH' ) || exit;


/**
 * A text control with validation for CSS units.
 */
class Pragyan_Customizer_Control_Heading extends WP_Customize_Control
{


    /**
     * The control type.
     *
     * @access public
     * @var string
     */
    public $type = 'pragyan-heading';


    /**
     * Enqueue our scripts and styles
     */
    public function enqueue()
    {

        $css_uri = PRAGYAN_THEME_URI . 'core/customizer/controls/heading/';

        wp_enqueue_style('pragyan-heading-control-css', $css_uri . 'heading.css', array(), PRAGYAN_THEME_VERSION);


    }

    /**
     * An Underscore (JS) template for this control's content (but not its container).
     *
     * Class variables for this control class are available in the `data` JS object;
     * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
     *
     * @see WP_Customize_Control::print_template()
     *
     * @access protected
     */
    protected function render_content()
    {
        ?>


        <div class="pragyan-heading-wrapper wp-ui-highlight">
            <label class="customizer-text">
                <?php if (!empty($this->label)) { ?>
                    <span class="customize-control-title wp-ui-text-highlight"><?php echo esc_html($this->label) ?></span>
                <?php } ?>
                <?php if (!empty($this->description)) { ?>
                    <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php } ?>
            </label>
        </div>
        <?php
    }
}
