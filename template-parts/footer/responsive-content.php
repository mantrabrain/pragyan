<div class="pragyan-mobile-navigation-menu" id="pragyan-mobile-navigation-menu">
	<button class="pragyan-mobile-navigation-close"><span
			class="fas fa-times"></span></button>
	<?php wp_nav_menu(array(
		'theme_location' => 'primary',
		'menu_id' => 'primary-menu',
		'menu_class' => 'main-menu pragyan-main-menu',
		'container_class' => 'pragyan-main-menu',
		'fallback_cb' => 'pragyan_fallback_navigation'
	));
	?>
</div>
