<?php
/**
 * Page Settings meta box class.
 *
 * @package pragyan
 */

defined('ABSPATH') || exit;

/**
 * Class Pragyan_Meta_Box_Page_Settings
 */
class Pragyan_Meta_Box_Page_Settings
{

	/**
	 * Meta box render content callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	public static function render($post)
	{
		// Add nonce for security and authentication.
		wp_nonce_field('pragyan_nonce_action', 'pragyan_meta_nonce');

		$layout = get_post_meta(get_the_ID(), 'pragyan_base_sidebar_layout', true);

		$sidebar = get_post_meta(get_the_ID(), 'pragyan_single_sidebar', true);

		$pragyan_bottom_header_background_color = get_post_meta(get_the_ID(), 'pragyan_bottom_header_background_color', true);

		$pragyan_bottom_header_background_color = ($pragyan_bottom_header_background_color == '' || is_null($pragyan_bottom_header_background_color)) ? '#202f5b' : $pragyan_bottom_header_background_color;

		global $post;

		// Get WordPress' media upload URL.
		$upload_link = get_upload_iframe_src('image', $post->ID);

		$logo = get_post_meta($post->ID, 'pragyan_single_logo', true);

		$img_src = wp_get_attachment_image_src($logo, 'full');

		$has_img = is_array($img_src);
		?>
		<div id="page-settings-tabs-wrapper">
			<ul class="pragyan-ui-nav">
				<?php
				$page_setting = apply_filters('pragyan_page_setting', array(
					'general' => array(
						'label' => __('General', 'pragyan'),
						'target' => 'page-settings-general',
						'class' => array(),
					),
					'header' => array(
						'label' => __('Header', 'pragyan'),
						'target' => 'page-settings-header',
						'class' => array(),
					)
				));

				foreach ($page_setting as $key => $tab) {
					?>
					<li>
						<a href="#<?php echo esc_html($tab['target']); ?>"><?php echo esc_html($tab['label']); ?></a>
					</li>
					<?php
				}

				?>
			</ul><!-- /.pragyan-ui-nav -->
			<div class="pragyan-ui-content">
				<!-- GENERAL -->
				<div id="page-settings-general">

					<!-- LAYOUT -->
					<div class="options-group">
						<div class="pragyan-ui-desc">
							<label><?php esc_html_e('Sidebar Layout', 'pragyan'); ?></label>
						</div>

						<div class="pragyan-ui-field mnp-layout-template">
							<label class="mnp-label">
								<input type="radio" name="pragyan_base_sidebar_layout"
									   value="" <?php
								checked($layout, ''); ?> />
								<img
									src="<?php echo esc_url(PRAGYA_THEME_URI . '/assets/images/icons/customizer.png'); ?>"/>
							</label>
							<?php $sidebar_content_layouts = pragyan_global_sidebar_layouts();

							foreach ($sidebar_content_layouts as $layout_key => $layout_config) {
								?>
								<label class="mnp-label">
									<input type="radio" name="pragyan_base_sidebar_layout"
										   value="<?php echo esc_attr($layout_key); ?>" <?php checked
									($layout, $layout_key); ?> />
									<img src="<?php echo esc_url($layout_config['image']); ?>"
										 title="<?php echo esc_attr($layout_config['title']); ?>"/>
								</label>
							<?php } ?>
						</div>
					</div>

					<!-- SIDEBAR -->
					<div class="options-group">
						<div class="pragyan-ui-desc">
							<label for="pragyan-sidebar"><?php esc_html_e('Sidebar', 'pragyan'); ?></label>
						</div>
						<div class="pragyan-ui-field">
							<select name="pragyan_single_sidebar" id="pragyan-sidebar">
								<option
									value="" <?php selected($sidebar, ''); ?>><?php esc_html_e('Default', 'pragyan'); ?></option>
								<?php
								global $wp_registered_sidebars;

								foreach ($wp_registered_sidebars as $mnp_sidebar_id => $mnp_sidebars) {
									?>
									<option
										value="<?php echo esc_attr($mnp_sidebars['id']); ?>" <?php selected($sidebar, $mnp_sidebars['id']); ?>><?php
										echo esc_html($mnp_sidebars['name']); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>

					<?php
					/**
					 * Hook for general meta box display.
					 */
					do_action('pragyan_general_page_setting');
					?>
				</div>

				<!-- HEADER -->
				<div id="page-settings-header">
					<!-- LOGO -->
					<div class="options-group">
						<div class="pragyan-ui-desc">
							<label for="mnp-logo"><?php esc_html_e('Logo', 'pragyan'); ?></label>
						</div>
						<div class="pragyan-ui-field" id="mnp-logo-wrapper">

							<div class="mnp-upload-img">
								<?php if ($has_img) : ?>
									<img src="<?php echo esc_url($img_src[0]); ?>" style="max-width:100%;"/>
								<?php endif; ?>
							</div>

							<p class="hide-if-no-js">
								<a class="upload-custom-img <?php echo ($has_img) ? 'hidden' : ''; ?>"
								   href="<?php echo esc_url($upload_link); ?>">
									<?php esc_html_e('Upload Logo', 'pragyan'); ?>
								</a>
								<a class="delete-custom-img <?php echo (!$has_img) ? 'hidden' : ''; ?>"
								   href="#">
									<?php esc_html_e('Remove Logo', 'pragyan'); ?>
								</a>
							</p>

							<input id="mnp-logo" name="pragyan_single_logo" class="mnp-upload-input" type="hidden"
								   value="<?php
								   echo esc_attr($logo); ?>"/>
						</div>
					</div>

					<div class="options-group show-default">
						<div class="pragyan-ui-desc">
							<label
								for="pragyan-menu-item-color"><?php esc_html_e('Background Color', 'pragyan'); ?></label>
						</div>
						<div class="pragyan-ui-field">
							<input class="mnp-color-picker" type="text" name="pragyan_bottom_header_background_color"
								   id="pragyan_bottom_header_background_color"
								   value="<?php echo esc_attr($pragyan_bottom_header_background_color); ?>"
								   data-default-color="#ffffff"/>
						</div>
					</div>
					<?php
					/**
					 * Hook for header meta box display.
					 */
					do_action('pragyan_header_page_setting');
					?>
				</div>

				<?php
				/**
				 * Hook for page settings tab.
				 */
				do_action('pragyan_page_settings');
				?>

			</div>
			<!-- /.pragyan-content -->
			<div class="clear"></div>
		</div>

		<?php
	}

	/**
	 * Save meta box content.
	 *
	 * @param int $post_id Post ID.
	 */
	public static function save($post_id)
	{

		$layout = isset($_POST['pragyan_base_sidebar_layout']) ? sanitize_text_field($_POST['pragyan_base_sidebar_layout']) : ''; // WPCS: CSRF ok.
		$sidebar = isset($_POST['pragyan_single_sidebar']) ? sanitize_text_field($_POST['pragyan_single_sidebar']) : 'default'; // WPCS: CSRF ok.
		$pragyan_bottom_header_background_color = isset($_POST['pragyan_bottom_header_background_color']) ? sanitize_hex_color(wp_unslash($_POST['pragyan_bottom_header_background_color'])) : $pragyan_bottom_header_background_color; // WPCS: CSRF ok.

		$logo = (isset($_POST['pragyan_single_logo'])) ? intval($_POST['pragyan_single_logo']) : ''; // WPCS: CSRF ok.

		// LAYOUT.
		$sidebar_content_layouts = array_keys(pragyan_global_sidebar_layouts());
		if (in_array($layout, $sidebar_content_layouts)) {
			update_post_meta($post_id, 'pragyan_base_sidebar_layout', $layout);
		} else {
			update_post_meta($post_id, 'pragyan_base_sidebar_layout', '');
		}

		// SIDEBAR.
		global $wp_registered_sidebars;

		$all_sidebars = array_keys($wp_registered_sidebars);


		if (in_array($sidebar,
			$all_sidebars)) {
			update_post_meta($post_id, 'pragyan_single_sidebar', $sidebar);
		} else {
			update_post_meta($post_id, 'pragyan_single_sidebar', '');
		}

		// MENU ITEM COLOR.

		update_post_meta($post_id, 'pragyan_bottom_header_background_color', $pragyan_bottom_header_background_color);

		// LOGO.
		update_post_meta($post_id, 'pragyan_single_logo', $logo);

		/**
		 * Hook for page settings data save.
		 */
		do_action('pragyan_page_settings_save', $post_id);

	}

}
