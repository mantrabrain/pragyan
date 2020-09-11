var pragyan_file_frame;
;(function ($) {

	var PragyanAdmin = {

		init: function () {

			this.initEvent();
		},
		initEvent: function () {

			var $this = this;
			$(document).on('click', 'button.media_upload', function (event) {
				event.preventDefault();
				$this.initWPImageUploader($(this));
			});
			$(document).ready(function () {
				$('#widgets-right .widget:has(.color-picker)').each(function () {
					$this.initColorPicker($(this));
				});
			});
			$(document).on('widget-added widget-updated', function (event, widget) {

				$this.formUpdate($this, widget);
			});


			$(document).on('click', '.custom_media_preview button.remove', function (e) {
				e.preventDefault();
				$this.removeImage($(this));
			});

			$(document).on('click', '.pragyan-icon-picker-wrapper .toggle-icon', function (e) {
				e.preventDefault();
				$this.initIconPicker($(this));
			});

			$(document).on('click', '.pragyan-icon-picker-wrapper .pragyan-icon-list li.icon', function (e) {
				$this.pickIcon($(this));
			});

			$this.repeaterInit();
		},
		initWPImageUploader: function ($this) {

			var file_target_input = $this.parent().find('.custom_media_input');
			var file_target_preview = $this.parent().find('.media_preview_image');
			var remove_btn = $this.parent().find('.remove');

			var agencyEcommerceImage = wp.media.controller.Library.extend({
				defaults: _.defaults({
					id: 'agency-ecommerce-insert-image',
					title: $this.data('uploader_title'),
					allowLocalEdits: false,
					displaySettings: true,
					displayUserSettings: false,
					multiple: false,
					library: wp.media.query({type: 'image'})
				}, wp.media.controller.Library.prototype.defaults)
			});

			// Create the media frame.
			pragyan_file_frame = wp.media.frames.pragyan_file_frame = wp.media({
				button: {
					text: jQuery(this).data('uploader_button_text')
				},
				state: 'agency-ecommerce-insert-image',
				states: [
					new agencyEcommerceImage()
				],
				multiple: false  // Set to true to allow multiple files to be selected
			});

			// When an image is selected, run a callback.
			pragyan_file_frame.on('select', function () {

				// Get the attachment from the modal frame.
				var attachment = pragyan_file_frame.state().get('selection').first().toJSON();
				// Initialize input and preview change.
				file_target_input.val(attachment.url).trigger('change');
				file_target_preview.css({display: 'none'});
				file_target_preview.attr('src', attachment.url).css({display: 'block'});
				remove_btn.show();

			});

			// Finally, open the modal
			pragyan_file_frame.open();

		},
		initColorPicker: function (widget) {
			widget.find('.color-picker').wpColorPicker({
				change: _.throttle(function () { // For Customizer
					$(this).trigger('change');
				}, 3000)
			});
		},
		removeImage: function ($this) {
			var image_field = $this.parent().find('.custom_media_input');
			image_field.val('');
			$this.parent().find('.media_preview_image').css({display: 'none'});
			image_field.trigger('change');
			$this.hide();
		},
		formUpdate: function ($this, widget) {
			$this.initColorPicker(widget);
		},
		initIconPicker($this) {
			$this.closest('.pragyan-icon-picker-wrapper').find('.pragyan-icon-list').slideToggle("slow");

		},
		pickIcon: function ($this) {
			var wrapper = $this.closest('.pragyan-icon-picker-wrapper');
			wrapper.find('.pragyan-icon-list ul li.active').removeClass('active');
			var value = $this.attr('data-icon');
			var old_value = wrapper.find('input.widefat').val();
			wrapper.find('input.widefat').val(value).trigger('change');
			wrapper.find('.selected-icon').removeClass('fa').removeClass(old_value).addClass('fa ' + value);
			$this.addClass('active');
		},
		repeaterInit: function () {

			$(document).on('click', '.mb-repeater .action-btn', function (e) {


				var container = $(this).closest('.mb-repeater-container');

				var number_of_repeater = container.data('repeater-num');

				var len = container.find('.mb-repeater').length;

				if ($(this).hasClass('add')) {

					if (number_of_repeater > len) {

						var repeater_tmpl_clone = container.find('.mb-repeater-tmpl').clone();

						var repeater_tmpl_clone_html = repeater_tmpl_clone.html();

						repeater_tmpl_clone_html = repeater_tmpl_clone_html.replace(/__mb_index__/ig, len);

						container.append('<div class="mb-repeater">' + repeater_tmpl_clone_html + "</div>");

					} else {
						alert('Maximm repeater exceed');
					}

				} else if ($(this).hasClass('remove')) {

					if (len > 1) {

						$(this).closest('.mb-repeater').remove();
					}
				}
				container.find('.mb-repeater:not(:last-child)').find('.action-btn').removeClass('add').addClass('remove');

				if (number_of_repeater <= len) {
					container.find('.mb-repeater:last-child').find('.action-btn').removeClass('add').addClass('remove');
				} else {
					container.find('.mb-repeater:last-child').find('.action-btn').removeClass('remove').addClass('add');

				}

				container.find('input').trigger('change');


			});
		}
	};

	PragyanAdmin.init();


})(jQuery);
