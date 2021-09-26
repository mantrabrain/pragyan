<div id="pragyan-slider" class="pragyan-slider before-init">
	<?php
	$total_slider_count = 5;


	for ($total_slider_count_len = 1; $total_slider_count_len <= $total_slider_count; $total_slider_count_len++) {
		$apply_button_text = pragyan_get_option('slider_section_apply_button_text_' . $total_slider_count_len);
		$apply_button_link = pragyan_get_option('slider_section_apply_button_link_' . $total_slider_count_len);

		$learn_more_button_text = pragyan_get_option('slider_section_learn_more_button_text_' . $total_slider_count_len);
		$learn_more_button_link = pragyan_get_option('slider_section_learn_more_button_link_' . $total_slider_count_len);

		$pragyan_slider_page_id = absint(pragyan_get_option('slider_section_page_' . $total_slider_count_len));

		$slider_image = get_the_post_thumbnail_url($pragyan_slider_page_id, 'full');

		if ($pragyan_slider_page_id > 0) {
			?>
			<div class="slide-item"
				 style="background-image: url(<?php echo esc_attr($slider_image) ?>); background-size: cover; background-position: center center; ">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 content-column">
							<div class="content-box text-left">
								<h2 class="slider-title"><?php echo esc_html(get_the_title($pragyan_slider_page_id)) ?></h2>
								<div
									class="slider-content"><?php echo esc_html(get_the_excerpt($pragyan_slider_page_id)) ?></div>
								<div class="button-wrap">
									<?php if ($apply_button_text != '') { ?>
										<div class="button-left"><a href="<?php echo esc_url($apply_button_link) ?>"
																	target="_blank"
																	class="pragyan-slider-button"><?php echo esc_html($apply_button_text); ?></a>
										</div>
									<?php } ?>
									<?php if ($learn_more_button_text != '') { ?>
										<div class="button-right"><a target="_blank"
																	 href="<?php echo esc_url($learn_more_button_link) ?>"
																	 class="pragyan-slider-button"><?php
												echo esc_html($learn_more_button_text);
												?></a>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }
	} ?>
</div>
