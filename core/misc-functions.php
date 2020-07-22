<?php
if (!function_exists('pragyan_before_content')) {
    function pragyan_before_content()
    {
        do_action('pragyan_before_content');
    }
}
if (!function_exists('pragyan_content')) {
    function pragyan_content()
    {
        do_action('pragyan_content');
    }
}
if (!function_exists('pragyan_after_content')) {
    function pragyan_after_content()
    {
        do_action('pragyan_after_content');
    }
}
