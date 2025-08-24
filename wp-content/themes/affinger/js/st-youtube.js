;(function (window, document, $, ST, undefined) {
	'use strict';

	function load_youtube_api() {
		var $script;

		$script = $('<script></script>', {src: 'https://www.youtube.com/iframe_api'});

		$('script').eq(0)
			.before($script);
	}

	function on_youtube_iframe_api_ready() {
		var event;

		event = $.Event('youtube:apiready');

		$(window).trigger(event);
	}

	/**
	 * @param {jQuery} $player
	 */
	function resize($player) {
		var width  = $(window).width();
		var height = window.innerHeight;
		var playerWidth;
		var playerHeight;

		var ratio = 16 / 9;

		if (width / ratio < height) {
			playerWidth = Math.ceil(height * ratio);

			$player.width(playerWidth).height(height).css({left: ((width - playerWidth) / 2) + 'px', top: '0'});
		} else {
			playerHeight = Math.ceil(width / ratio);

			$player.width(width).height(playerHeight).css({left: '0', top: ((height - playerHeight) / 2) + 'px'});
		}
	}

	function on_api_ready() {
		$('[data-st-youtube]').each(function (index, element) {
			var $element;
			var $video;
			var defaults;
			var options;

			$element = $(element);
			$video   = $element.find('[data-st-youtube-video]');

			if (!$video.length) {
				return;
			}

			defaults = {
				youtube: {
					videoId   : null,
					playerVars: {
						controls      : 0,
						disablekb     : 1,
						enablejsapi   : 1,
						fs            : 0,
						iv_load_policy: 3,
						loop          : 1,
						modestbranding: 1,
						playsinline   : 1,
					},
					events    : {
						onReady: on_player_ready
					}
				},
				mute   : 1
			};

			options = $element.data('st-youtube-options');
			options = $.extend(true, {}, defaults, options);

			$element.data('options', options);

			new YT.Player($video.attr('id'), options.youtube);
		});
	}

	function on_player_ready(event) {
		var player  = event.target;
		var $iframe = $(player.getIframe());
		var $player = $iframe.closest('[data-st-youtube]');
		var options = $player.data('options');
		var timer;

		resize($player);

		$(window).on('orientationchange resize', function (event) {
			if (timer) {
				clearTimeout(timer);
			}

			timer = setTimeout(function () {
				resize($player);
			}, 100);
		});

		if (options.mute) {
			player.mute();
		}

		player.playVideo();
	}

	function on_ready() {
		$(window).on('youtube:apiready', on_api_ready);

		load_youtube_api();
	}

	window.onYouTubeIframeAPIReady = on_youtube_iframe_api_ready;

	$(on_ready);
}(window, window.document, jQuery, ST));
