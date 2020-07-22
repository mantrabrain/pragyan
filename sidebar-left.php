<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pragyan
 */

$left_sidebar = pragyan_page_sidebar('pragyan_left_sidebar');

if (!is_active_sidebar($left_sidebar)) {
	return;
}
$enable_sidebar_sticky = false;//(boolean)pragyan_get_option('enable_sidebar_sticky');

$sidebar_inner_class = $enable_sidebar_sticky ? 'sticky-sidebar' : 'no-sticky-sidebar';

?>

<aside id="secondary" class="widget-area">
	<div class="<?php echo esc_attr($sidebar_inner_class); ?>>">

		<?php

		dynamic_sidebar($left_sidebar);

		?>
	</div>
</aside><!-- #secondary -->
