(function (window, document, $, undefined) {
	'use strict';

	/**
	 * @param {Function} callback
	 * @param {number} delay
	 *
	 * @returns {Function}
	 */
	function debounce(callback, delay) {
		var timeoutId;
		var result;

		delay = delay || 500;

		return function () {
			var args    = arguments;
			var context = this;

			if (timeoutId) {
				clearTimeout(timeoutId);
			}

			timeoutId = setTimeout(function () {
				timeoutId = null;

				result = callback.apply(context, args);
			}, delay);

			return result;
		};
	}

	/**
	 * @returns {jQuery}
	 */
	function get_$nav() {
		return $('[data-st-nav]');
	}

	/**
	 * @param {jQuery} $nav
	 *
	 * @returns {jQuery}
	 */
	function get_$primary($nav) {
		$nav = $nav || get_$nav();

		return $nav.find('[data-st-nav-primary]');
	}

	/**
	 * @param {jQuery} $nav
	 *
	 * @returns {jQuery}
	 */
	function get_$secondary($nav) {
		$nav = $nav || get_$nav();

		return $nav.find('[data-st-nav-secondary]');
	}

	/**
	 * スマホスライドメニューの「表示パターン」: 「スクロール追尾」 (+ スマホ「ヘッダーメニュー（横列）」メニューの固定表示)
	 *
	 * @returns {Function}
	 */
	function create_tracked_header_updater() {
		var previous_scroll_top = 0;

		return function () {
			var $html               = $('html');
			var $nav                = get_$nav();
			var $primary            = get_$primary($nav);
			var $secondary          = get_$secondary($nav);
			var primary_height      = $primary.height();
			var scroll_top          = $(window).scrollTop();
			var is_secondary_active = ($secondary.length && scroll_top > primary_height);
			var is_scrolled_down    = (scroll_top > previous_scroll_top);
			var $nav_element;
			var nav_element_height;

			$nav_element       = is_secondary_active ? $secondary : $primary;
			nav_element_height = $nav_element.outerHeight();

			if (is_scrolled_down) {
				if ($(window).scrollTop() >= 200) {
					$nav_element.css('top', (nav_element_height * -1) + 'px');
				}
			} else {
				$nav_element.css('top', '0');
			}

			if (is_secondary_active) {
				$primary.removeClass('is-active');
				$html.removeClass('is-primary-nav-active');
				$secondary.addClass('is-active');
				$html.addClass('is-secondary-nav-active');
			} else {
				$primary.addClass('is-active');
				$html.addClass('is-primary-nav-active');
				$secondary.removeClass('is-active');
				$html.removeClass('is-secondary-nav-active');
			}

			previous_scroll_top = scroll_top;
		};
	}

	/**
	 * スマホスライドメニューの「表示パターン」: 「固定」 + スマホ「ヘッダーメニュー（横列）」メニューの固定表示
	 *
	 * @returns {Function}
	 */
	function create_fixed_header_updater() {
		return function () {
			var $html               = $('html');
			var $nav                = get_$nav();
			var $primary            = get_$primary($nav);
			var $secondary          = get_$secondary($nav);
			var primary_height      = $primary.height();
			var scroll_top          = $(window).scrollTop();
			var is_secondary_active = (scroll_top > primary_height);

			if (is_secondary_active) {
				$primary.removeClass('is-active');
				$html.removeClass('is-primary-nav-active');
				$secondary.addClass('is-active');
				$html.addClass('is-secondary-nav-active');
			} else {
				$primary.addClass('is-active');
				$html.addClass('is-primary-nav-active');
				$secondary.removeClass('is-active');
				$html.removeClass('is-secondary-nav-active');
			}
		};
	}

	/**
	 * @returns {Function|null}
	 */
	function create_updater() {
		var $nav       = get_$nav();
		var type       = $nav.attr('data-st-nav-type');
		var $secondary = get_$secondary($nav);
		var updater    = null;

		switch (type) {
			case 'tracked':
				updater = create_tracked_header_updater();

				break;

			case 'fixed':
				updater = ($secondary.length) ? create_fixed_header_updater() : null;
				break;

			default:
				// Do nothing.

				break;
		}

		return updater;
	}

	function initialize() {
		var update = create_updater();
		var conditionalUpdate;
		var debouncedUpdate;

		conditionalUpdate = function () {
			var $html = $('html');
			
			if ($html.hasClass('s-navi-active') || $html.hasClass('s-navi-search-active')) {
				return;
			}

			update();
		}

		if (typeof update === 'function') {
			debouncedUpdate = debounce(update);

			update();

			$(window).on('scroll', conditionalUpdate);
			$(window).on('orientationchange resize', debouncedUpdate);
		}
	}

	function on_ready() {
		initialize();
	}

	$(on_ready);
}(window, window.document, jQuery));
