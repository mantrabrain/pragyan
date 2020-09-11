(function ($) {
	var pragyanLastFocusableEl;

	var pragyanTheme = {
		init: function () {
			this.initPreloader();
			this.initEvents();
			this.initScrollToTop();
			this.initSearchBox();
			this.initNavigationMenu();
			this.initAccessibility();
			this.initSticky();
			this.initStickyMenu();
			this.initCarousel();
			this.widgetsSettings();
			this.tabbedWidget();

		},
		initPreloader: function () {
			$(window).on('load', function () {
				$('.preloader').delay(500).fadeOut(500);

				// Preloader two
				$('#pragyan-preloader').fadeOut();

				// Icon Preloader
				$('.pragyan_image_preloader').fadeOut('slow');
			});
		},
		initSticky: function () {

			$(window).load(function () {
				if ($('.sticky-sidebar').length < 1) {
					return;
				}
				var after_height = 0;

				var site_content_row = $('.site-content-row')[0],
					wp_adminBar = $('#wpadminbar').outerHeight(),
					doc_width = $(window).outerWidth(),
					top_spacing = 20 + wp_adminBar;

				if (site_content_row) {
					var page_height = $('body.theme-body').outerHeight(),
						page_before_height = $('body.theme-body').offset().top,
						total_page_height = page_height + page_before_height,
						before_content_height = $('.site-content-row').offset().top,
						content_height = $('.site-content-row').outerHeight();
					after_height = total_page_height - before_content_height - content_height;
				}

				if (doc_width >= 992) {
					if (wp_adminBar) {
						$('.sticky-sidebar').sticky({topSpacing: top_spacing, bottomSpacing: after_height});
					} else {
						$('.sticky-sidebar').sticky({topSpacing: 20, bottomSpacing: after_height});
					}
				}
			});
		},

		initStickyMenu: function () {
			$(window).load(function () {

				var wpAdminBar = jQuery('#wpadminbar');
				if (wpAdminBar.length) {
					jQuery('.main-header.pragyan-sticky').sticky({
						topSpacing: wpAdminBar.height(),
						zIndex: 99
					});
				} else {
					jQuery('.main-header.pragyan-sticky').sticky({
						topSpacing: 0,
						zIndex: 99
					});
				}
			});
		},

		initScrollToTop: function () {

		},
		initSearchBox: function () {
			$('#search').on('click, focus', function () {
				$('.pragyan-search-box').fadeIn(600);
				var id = 'pragyan-search-box';
				$('#' + id).addClass('pragyan-searchbox-open');
				$(document).trigger('pragyan_focus_inside_element', [id, '#pragyan-search-box input.search-field', 'pragyan-searchbox-open']);

			});
			$('.pragyan-close-button').on('click', function () {
				$('.pragyan-search-box').fadeOut(600);
				var id = '#pragyan-search-box';
				$(id).removeClass('pragyan-searchbox-open');

			});
		},
		initNavigationMenu: function () {
			var nav = $('.pragyan-mobile-navigation-menu');
			var submenu_link = nav.find('.main-menu li.menu-item-has-children>a');
			submenu_link.append('<button type="button" class="icon pragyan-mobile-nav-toggle"><span class="fa fa-angle-down"></span></button>');
			$('body').on('click', '.pragyan-mobile-nav-toggle', function (e) {
				e.preventDefault();
				var sub_menu = $(this).closest('li.menu-item').find(' > ul.sub-menu');
				sub_menu.slideToggle(function () {
					if ($(this).closest('li').hasClass('open')) {
						$(this).closest('li').removeClass('open');
					} else {
						$(this).closest('li').addClass('open');
					}
				});

			});
			$('body').on('click', '.pragyan-mobile-navigation-close', function () {
				$('#pragyan-mobile-navigation-menu-icon').trigger('click').focus();
			});
			$('body').on('click', '.pragyan-mobile-navigation-menu-icon>#pragyan-mobile-navigation-menu-icon', function (e) {
				e.preventDefault();
				var linked_panel = '.pragyan-mobile-navigation-menu';
				if ($(this).hasClass('open')) {
 					$(this).removeClass('open');
					$(linked_panel).removeClass('opened-nav');

				} else {
 					$(this).addClass('open');
					$(linked_panel).addClass('opened-nav');
					$(document).trigger('pragyan_focus_inside_element', ['pragyan-mobile-navigation-menu', '.pragyan-mobile-navigation-close', 'opened-nav']);


				}
			});
		},
		initAccessibility: function () {
			var main_menu_container = $('#site-navigation ul.main-menu');
			main_menu_container.find('li.menu-item').focusin(function () {
				if (!$(this).hasClass('focus')) {
					$(this).addClass('focus');
				}
			});
			main_menu_container.find('li.menu-item').focusout(function () {
				$(this).removeClass('focus');

			});
		},

		initCarousel: function () {
			$('#pragyan-slider').owlCarousel({
				loop: true,
				margin: 10,
				responsiveClass: true,
				nav: true,
				dots: false,
				responsive: {
					0: {
						items: 1
					}
				}
			});
			$('#pragyan-slider').removeClass('before-init');

		},
		widgetsSettings: function () {
			var cta_content = $('.pragyan-cta-content.pragyan-full-width');
			$.each(cta_content, function () {
				var background_image = $(this).attr('data-image');
				if (background_image !== '' && undefined !== background_image) {

					$(this).closest('.pragyan-cta-wrapper').find('.pragyan-cta-content.pragyan-full-width:after').css('background-image', 'url(' + background_image + ')');
				}
			});
		},
		tabbedWidget: function () {
			var wrap = $('.pragyan-tabbed-widget-wrap');
			wrap.find('ul.widget-tabs li').on('click', function () {
				var data_id = $(this).attr('data-id');
				var inside_wrap = $(this).closest('.pragyan-tabbed-widget-wrap');
				if (!$(this).hasClass('active')) {
					inside_wrap.find('.pragyan-tab-content').find('.content').removeClass('active');
					inside_wrap.find('.widget-tabs').find('li').removeClass('active');
					$(this).addClass('active');
					inside_wrap.find('.' + data_id).addClass('active');

				}
			});
		},
		trapFocus: function (element, open_class) {
			var focusableEls = element.querySelectorAll('a[href]:not([disabled]), button:not([disabled]), textarea:not([disabled]), input[type="text"]:not([disabled]), input[type="radio"]:not([disabled]), input[type="checkbox"]:not([disabled]), select:not([disabled])'),
				firstFocusableEl = focusableEls[0];
			pragyanLastFocusableEl = focusableEls[focusableEls.length - 1];
			var KEYCODE_TAB = 9;

			element.addEventListener('keydown', function (e) {
				var isTabPressed = (e.key === 'Tab' || e.keyCode === KEYCODE_TAB);

				if (!isTabPressed) {
					return;
				}
				if (!element.classList.contains(open_class)) {
					element.removeEventListener('keydown', this);
					return;

				}

				if (e.shiftKey) /* shift + tab */ {
					if (document.activeElement === firstFocusableEl) {
						pragyanLastFocusableEl.focus();
						e.preventDefault();
					}
				} else /* tab */ {
					if (document.activeElement === pragyanLastFocusableEl) {
						firstFocusableEl.focus();
						e.preventDefault();
					}
				}

			});
		},

		initEvents: function () {
			var _this = this;
			$(document).on('pragyan_focus_inside_element', function (event, parent_id, focusable_el, trap_class) {
				$('#' + parent_id).find(focusable_el).focus();
				var el = document.getElementById(parent_id);
				_this.trapFocus(el, trap_class);

			});
		}
	};

	$(function () {
		pragyanTheme.init();
	});
})(jQuery);
