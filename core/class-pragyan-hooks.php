<?php

defined( 'ABSPATH' ) || exit;

/**
 * Main Pragyan_Hooks Class.
 *
 * @class Pragyan_Hooks
 */
class Pragyan_Hooks
{

    /**
     * The single instance of the class.
     *
     * @var Pragyan_Hooks
     * @since 1.0.0
     */
    protected static $_instance = null;


    /**
     * Main Pragyan_Hooks Instance.
     *
     * Ensures only one instance of Pragyan_Hooks is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     * @return Pragyan_Hooks - Main instance.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        self::$_instance->includes();

        return self::$_instance;
    }

    /**
     * Include required core files used in admin and on the frontend.
     */
    public function includes()
    {
        include_once PRAGYAN_THEME_DIR . 'core/hooks/class-pragyan-header-hooks.php';
        include_once PRAGYAN_THEME_DIR . 'core/hooks/class-pragyan-template-hooks.php';
        include_once PRAGYAN_THEME_DIR . 'core/hooks/class-pragyan-misc-hooks.php';
        include_once PRAGYAN_THEME_DIR . 'core/hooks/class-pragyan-footer-hooks.php';


    }


}

Pragyan_Hooks::instance();
