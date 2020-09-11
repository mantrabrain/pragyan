<?php
$header_background_image = apply_filters('pragyan_breadcrumb_background_image', '');

?>
<section class="pragyan-page-header" id="breadcrumbs">
	<div class="container">
		<?php

		?>

		<?php if (function_exists('is_woocommerce') && is_woocommerce()) { ?>

			<h2 class="page-title"><?php woocommerce_page_title(); ?></h2>

		<?php } elseif (function_exists('tribe_events') && tribe_is_month() && is_archive()) { ?>

			<h2 class="page-title"><?php echo esc_html__('Events Calendar', 'pragyan'); ?></h2>

		<?php } elseif (function_exists('tribe_events') && is_single() && is_singular('tribe_events')) { ?>

			<h2 class="page-title"><?php single_post_title(); ?></h2>

		<?php } elseif (is_page() || is_single()) { ?>

			<h2 class="page-title"><?php echo esc_html(get_the_title()); ?></h2>

		<?php } elseif (is_search()) { ?>

			<h2 class="page-title"><?php printf(__('Search Results for: %s', 'pragyan'), '<span>' . get_search_query() . '</span>'); ?></h2>

		<?php } elseif (is_404()) { ?>

			<h2 class="page-title"><?php echo esc_html__('Page Not Found: 404', 'pragyan'); ?></h2>

		<?php } elseif (is_home()) { ?>

			<h2 class="page-title"><?php single_post_title(); ?></h2>

		<?php } else {
			if (is_archive()) {
				the_archive_title('<h2 class="page-title">', '</h2>');
			}
			?>

			<?php if (is_single()) { ?>
				<h2 class="page-title"><?php single_post_title(); ?></h2>
			<?php }

		}
		$show_breadcrumb = (boolean)pragyan_get_option('breadcrumb_show');
		?>
		<?php if ($show_breadcrumb): ?>
			<div class="header-breadcrumb">
				<?php
				pragyan_breadcrumb_trail(
					array('show_browse'=>false)
				); ?>
			</div>
		<?php endif; ?>


	</div>
</section>
