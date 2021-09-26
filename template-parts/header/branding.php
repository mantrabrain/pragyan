<div class=" col col-md-5 col-lg-4 site-branding-wrap">
	<div class="site-branding d-inline-block">
		<!-- Main Logo -->
		<?php if (pragyan_has_custom_logo()): ?>
			<div class="custom-logo">
				<?php pragyan_custom_logo(); ?>
			</div>
		<?php elseif (is_front_page()) : ?>

			<?php if (!pragyan_has_custom_logo()): ?>
				<h1 class="site-title">
					<a href="<?php echo esc_url(home_url('/')); ?>"
					   rel="home"><?php bloginfo('name'); ?></a></h1>

				<?php $description = get_bloginfo('description', 'display');
				if ($description || is_customize_preview()) :
					?>
					<p class="site-description"><?php echo wp_kses_data($description); ?></p>
				<?php endif; ?>
			<?php endif; ?>
		<?php else : ?>
			<?php if (!pragyan_has_custom_logo()):
				 ?>
				<h1 class="site-title">
					<a href="<?php echo esc_url(home_url('/')); ?>"
					   rel="home">
						<?php bloginfo('name'); ?>
					</a>
				</h1>
				<?php

				$description = get_bloginfo('description', 'display');
				if ($description || is_customize_preview()) :
					?>
					<p class="site-description"><?php echo wp_kses_data($description); ?></p>
				<?php endif;
			endif; ?>

		<?php endif; ?>

	</div><!-- .site-branding -->
</div>
