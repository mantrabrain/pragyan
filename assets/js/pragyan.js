(function ($) {


	var pragyanTheme = {
		init: function () {
			this.initPreloader();
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
			$('#search').on('click', function () {
				$('.pragyan-search-box').fadeIn(600);
			});
			$('.pragyan-closebtn').on('click', function () {
				$('.pragyan-search-box').fadeOut(600);
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
				var nav = $(this).closest('.pragyan-mobile-navigation-menu');
				nav.removeClass('opened-nav');
			});
			$('body').on('click', '.pragyan-mobile-navigation-menu-icon>a', function () {
				var linked_panel = '.pragyan-mobile-navigation-menu';
				if ($(this).hasClass('open')) {
					$(this).removeClass('open');
					$(linked_panel).removeClass('opened-nav');

				} else {
					$(this).addClass('open');
					$(linked_panel).addClass('opened-nav');

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
		}
	};

	$(function () {
		pragyanTheme.init();
	});
})(jQuery);
