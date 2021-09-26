<?php
$sticky_header_enable = (boolean)pragyan_get_option('enable_sticky_header');
$main_header_class = 'main-header';
if ($sticky_header_enable) {
	$main_header_class .= ' pragyan-sticky';
}
?>
<div class="<?php echo esc_attr($main_header_class); ?>">
	<div class="container">

		<?php
		$header_variations = pragyan_get_option('header_variations');
		$top_cart_enable = pragyan_get_option('top_cart_enable');
		$top_search_enable = pragyan_get_option('top_search_enable');
		?>

		<div
			class="row header-menu">
			<?php
			get_template_part('template-parts/header/branding');
			$right_icons = apply_filters('pragyan_main_header_right_icons', array());
			?>
			<div class=" col col-lg-8 pull-right site-navigation-wrap">


				<div class="navigation-section">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<?php wp_nav_menu(array(
							'theme_location' => 'primary',
							'menu_id' => 'primary-menu',
							'menu_class' => 'main-menu',
							'container_class' => 'pragyan-main-menu',
							'fallback_cb' => 'pragyan_fallback_navigation'
						));
						?>
					</nav>
				</div><!-- .navigation-section -->

				<?php if (count($right_icons) > 0) : ?>
					<div class="pragyan-right-header" id="pragyan-right-header">

						<ul>
							<?php foreach ($right_icons as $icon) {
								$pragyan_link = !isset($icon['link']) ? 'javascript:void(0)' : $icon['link'];
								$id_attribute = !isset($icon['id']) ? 'search' : $icon['id'];
								$icon_class = !isset($icon['icon']) ? 'fa fa-search' : $icon['icon'];
								$content = !isset($icon['content']) ? '' : $icon['content'];
								$wrap_class = !isset($icon['wrap_class']) ? '' : $icon['wrap_class'];
								$pragyan_type = !isset($icon['type']) ? 'a' : esc_attr($icon['type']);
								?>
							<li class="<?php echo esc_attr($wrap_class); ?>">
								<<?php echo $pragyan_type ?>
								<?php if ($pragyan_type == 'a') { ?>    href="<?php echo esc_attr($pragyan_link) ?>" <?php } ?>
								id="<?php echo esc_attr($id_attribute); ?>">
								<i class="<?php echo esc_attr($icon_class) ?>"></i>
								<?php if ('' != $content) {
									echo '<span>' . esc_html($content) . '</span>';
								} ?>
								</<?php echo $pragyan_type; ?>>
								</li>
							<?php } ?>
						</ul>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="pragyan-search-box" id="pragyan-search-box">
			<div class="pragyan-search-form">
				<button class="pragyan-close-button">
					<span></span>
					<span></span>
				</button>
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
