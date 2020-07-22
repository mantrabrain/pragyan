<?php
if (!function_exists('pragyan_is_service_enabled')) {
	function pragyan_is_service_enabled()
	{
		$show_pragyan_services = (boolean)pragyan_get_option('show_pragyan_services');
		if ($show_pragyan_services) {
			return true;
		}
		return false;
	}
}
