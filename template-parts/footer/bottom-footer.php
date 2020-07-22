<div class="bottom-footer">
	<div class="container">
		<div class="row footer-wrap">
			<?php
			$class = 'col-md-12 text-center';
			if (has_nav_menu('footer_menu')) {
				$class = 'col-md-6';
			}
			?>
			<div
				class="<?php echo esc_attr($class); ?>">

				<div class="pragyan-site-information">
					<p><?php pragyan_footer_text(); ?></p>
				</div>
			</div>

			<?php if (has_nav_menu('footer_menu')) : ?>
				<div class="col-md-6 text-right text-ml-left">

					<nav class="social-navigation" role="navigation"
						 aria-label="<?php esc_attr_e('Footer Menu', 'pragyan'); ?>">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'footer_menu',
							'container_class' => '',
							'depth' => 1,
						));
						?>
					</nav>
				</div>
			<?php endif; ?>

		</div>
	</div>
</div>
