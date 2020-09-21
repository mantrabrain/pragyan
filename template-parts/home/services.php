<div class="pragyan-services-section">
	<div class="container">
		<div class="row justify-content-center">

			<?php $total_service_count = 4;


			for ($total_service_count_len = 1; $total_service_count_len <= $total_service_count; $total_service_count_len++) {
				$icon = pragyan_get_option('service_section_icon_' . $total_service_count_len);
				$background = pragyan_get_option('service_section_background_' . $total_service_count_len);
				$pragyan_service_page_id = pragyan_get_option('service_section_page_' . $total_service_count_len);
				?>
				<div
					class="pragyan-single-service col-md-3 col-sm-6 service_section_background_<?php echo esc_attr($total_service_count_len); ?>">
					<div class="pragyan-service-wrapper">
						<?php if ('' != $icon) { ?>
							<div class="icon_alignment">
								<i class="service-icon <?php echo esc_attr($icon) ?>"></i>

							</div> <!-- align icons -->
						<?php }

						if ($pragyan_service_page_id > 0) {
							?>
							<div class="service-content">
								<?php
								$pragyan_service_post = get_post($pragyan_service_page_id);
								?>

								<h3 class="service-title"><a
										href="<?php echo esc_url(get_permalink($pragyan_service_page_id)) ?>">
										<?php echo esc_html($pragyan_service_post->post_title); ?>
									</a>
								</h3>
								<p><?php echo esc_html(get_the_excerpt($pragyan_service_page_id)); ?></p>

							</div>
						<?php } ?>
						<div style="clear:both"></div>
					</div>
					<div style="clear:both"></div>
				</div>
			<?php } ?>

		</div>
	</div>
</div>
