<?php

if (!function_exists('pragyan_sanitize_select')):

	/**
	 * Sanitize select.
	 *
	 * @param mixed $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 * @since 1.0.0
	 *
	 */
	function pragyan_sanitize_select($input, $setting)
	{

		// Ensure input is clean.
		$input = sanitize_text_field($input);

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control($setting->id)->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return (array_key_exists($input, $choices) ? $input : $setting->default);

	}

endif;

if (!function_exists('pragyan_switch_sanitization')) {
	function pragyan_switch_sanitization($input)
	{
		if (true === $input) {
			return 1;
		} else {
			return 0;
		}
	}
}

if (!function_exists('pragyan_radio_sanitization')) {
	function pragyan_radio_sanitization($input, $setting)
	{
		//get the list of possible radio box or select options
		$choices = $setting->manager->get_control($setting->id)->choices;

		if (array_key_exists($input, $choices)) {
			return $input;
		} else {
			return $setting->default;
		}
	}
}


if (!function_exists('pragyan_hex_rgba_sanitization')) {
	function pragyan_hex_rgba_sanitization($input, $setting)
	{
		if (empty($input) || is_array($input)) {
			return $setting->default;
		}

		if (false === strpos($input, 'rgba')) {
			// If string doesn't start with 'rgba' then santize as hex color
			$input = sanitize_hex_color($input);
		} else {
			// Sanitize as RGBa color
			$input = str_replace(' ', '', $input);
			sscanf($input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha);
			$input = 'rgba(' . pragyan_in_range($red, 0, 255) . ',' . pragyan_in_range($green, 0, 255) . ',' . pragyan_in_range($blue, 0, 255) . ',' . pragyan_in_range($alpha, 0, 1) . ')';
		}
		return $input;
	}
}

if (!function_exists('pragyan_in_range')) {
	function pragyan_in_range($input, $min, $max)
	{
		if ($input < $min) {
			$input = $min;
		}
		if ($input > $max) {
			$input = $max;
		}
		return $input;
	}
}


if (!function_exists('pragyan_sanitize_slider')) :

	/**
	 * Sanitize slider.
	 *
	 * @param mixed $input The value to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return mixed Sanitized value.
	 * @since 1.0.0
	 *
	 */
	function pragyan_sanitize_slider($input, $setting)
	{

		// Ensure input is clean.
		$input = floatval($input);

		// Get list of choices from the control associated with the setting.
		$input_attrs = $setting->manager->get_control($setting->id)->input_attrs;

		// If the input is a valid key, return it; otherwise, return the default.
		return ($input_attrs['min'] <= $input) && ($input <= $input_attrs['max']) ? $input : $setting->default;

	}

endif;
if (!function_exists('pragyan_sanitize_dropdown_pages')) :

	/**
	 * Sanitize dropdown pages.
	 *
	 * @param int $page_id Page ID.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 *
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 * @since 1.0.0
	 *
	 */
	function pragyan_sanitize_dropdown_pages($page_id, $setting)
	{

		// Ensure $input is an absolute integer.
		$page_id = absint($page_id);

		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ('publish' === get_post_status($page_id) ? $page_id : $setting->default);

	}

endif;
if (!function_exists('pragyan_sanitize_checkbox')):

	/**
	 * Sanitize checkbox.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 * @since 1.0.0
	 *
	 */
	function pragyan_sanitize_checkbox($checked)
	{

		return ((isset($checked) && true === $checked) ? true : false);

	}

endif;
