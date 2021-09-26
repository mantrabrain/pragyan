<div class="header-top">
	<div class="container">
		<?php

		$login_register_show = (boolean)pragyan_get_option('login_register_show');
		$profile_show = (boolean)pragyan_get_option('profile_show');
		$custom_profile_page_link = (boolean)pragyan_get_option('custom_profile_page_link');
		$custom_profile_page_text = pragyan_get_option('custom_profile_page_text');
		$custom_login_link = pragyan_get_option('custom_login_link');
		$custom_login_text = pragyan_get_option('custom_login_text');
		$custom_register_link = pragyan_get_option('custom_register_link');


		$pragyan_top_header_left_items = apply_filters('pragyan_top_header_left_items', array());


		if (count($pragyan_top_header_left_items) > 0) {
			?>

			<div class="header-left">

				<ul class="contact-info list-inline">

					<?php foreach ($pragyan_top_header_left_items as $item) {
						$class = 'list-inline-item';
						$class .= isset($item['class']) ? ' ' . $item['class'] : '';
						$icon = isset($item['icon']) ? $item['icon'] : '';
						$info_link = isset($item['link']) ? $item['link'] : '';
						$content = isset($item['content']) ? $item['content'] : '';
						?>
						<li class="<?php echo esc_attr($class); ?>">
							<?php if ('' != $icon) { ?>
								<i class="<?php echo esc_attr($icon); ?>"></i>
							<?php }

							echo '' != $info_link ? '<a href="' . esc_url($info_link) . '">' : '<span>';

							echo esc_html($content);

							echo '' != $info_link ? '</a>' : '</span>';

							?>
						</li>
					<?php } ?>

				</ul>
			</div><!-- .header-left -->
		<?php } ?>
		<div class="header-right">

			<?php if ($profile_show) : ?>
				<?php
				if (is_user_logged_in()) : ?>

					<div class="pragyan-custom-user-profile">
						<ul>
							<?php if (!'' == ($custom_profile_page_text)) : ?>
							<li class="profile">
								<a href="<?php echo esc_url($custom_profile_page_link); ?>">
									<?php echo esc_html($custom_profile_page_text); ?>
								</a>
							<li>
								<?php endif; ?>
							<li class="top-seperator">|</li>
						</ul>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ($login_register_show) : ?>
				<?php
				if (is_user_logged_in()) : ?>

					<div class="login-register logout">
						<ul>
							<li class="logouthide">
								<a href="<?php echo esc_url(wp_logout_url(home_url('/'))); ?>">
									<?php echo esc_html(pragyan_get_option('custom_logout_text')); ?>
								</a>
							<li>
						</ul>
					</div>
				<?php else : ?>
					<div class="login-register">
						<ul>
							<?php if ('' != ($custom_login_text)) : ?>
								<li>
									<a href="<?php echo esc_url($custom_login_link); ?>">
										<?php echo esc_html($custom_login_text); ?>
									</a>
								</li>
							<?php endif; ?>
							<li class="top-seperator">|</li>
							<?php if (!empty($custom_register_link)) : ?>
								<li>
									<a href="<?php echo esc_url($custom_register_link); ?>">
										<?php echo esc_html(pragyan_get_option('custom_register_text')); ?>

									</a>
								</li>
							<?php endif; ?>

						</ul>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div><!-- .header-right -->
	</div>
</div>
