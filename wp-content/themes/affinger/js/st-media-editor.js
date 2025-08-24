;(function (window, document, $, wp, undefined) {
	'use strict';

	if (typeof wp === 'undefined' || !wp.media || !wp.media.editor) {
		return;
	}

	/**
	 * @param {jQuery} $button
	 *
	 * @returns {jQuery}
	 */
	function get$Target($button) {
		var target  = $button.attr('data-st-media-target');
		var $target = $('[name="' + target.replace(/[ !"#$%&'()*+,./:;<=>?@[\\\]^`{|}~]/g, '\\$&') + '"]');

		return $target;
	}

	/**
	 * @param {jQuery} $button
	 *
	 * @returns {jQuery}
	 */
	function get$Preview($button) {
		var target   = $button.attr('data-st-media-target');
		var $preview = $('[data-st-media-preview][data-st-media-target="' + target.replace(/[ !"#$%&'()*+,./:;<=>?@[\\\]^`{|}~]/g, '\\$&') + '"]');

		return $preview;
	}

	/**
	 * @param {jQuery} $button
	 */
	function handleEditorButton($button) {
		var $target  = get$Target($button);
		var $preview = get$Preview($button);

		wp.media.editor.send.attachment = function (props, attachment) {
			var type = $button.attr('data-st-media-type');
			var value;
			var thumbnail_url;
			var $img;

			switch (type) {
				case 'id':
					value = attachment.id;

					break;

				case 'url':
				default:
					if (typeof props.size !== 'undefined' && typeof attachment.sizes[props.size]) {
						value = attachment.sizes[props.size].url;
					} else {
						value = attachment.url;
					}
			}

			if (typeof attachment.sizes['thumbnail'] !== 'undefined') {
				thumbnail_url = attachment.sizes['thumbnail'].url;
			} else {
				thumbnail_url = attachment.url;
			}

			if ($target.length) {
				$target.val(value);
			}

			if ($preview.length) {
				$img = $('<img>', {src: thumbnail_url});

				$preview.empty().append($img);
			}
		};

		wp.media.editor.open($button);
	}

	/**
	 * @param {jQuery} $button
	 */
	function handleResetButton($button) {
		var $target  = get$Target($button);
		var $preview = get$Preview($button);

		if ($target.length) {
			$target.val('');
		}

		if ($preview.length) {
			$preview.empty();
		}
	}

	/**
	 * @param {jQuery} $button
	 */
	function initializeEditorButton($button) {
		$button.on('click', function (event) {
			event.preventDefault();
			event.stopPropagation();

			handleEditorButton($button);
		});
	}

	/**
	 * @param {jQuery} $button
	 */
	function initializeResetButton($button) {
		$button.on('click', function (event) {
			event.preventDefault();
			event.stopPropagation();

			handleResetButton($button);
		});
	}

	function onReady() {
		$('[data-st-media-editor-button]').each(function () {
			initializeEditorButton($(this));
		});

		$('[data-st-media-reset-button]').each(function () {
			initializeResetButton($(this));
		});
	}

	$(onReady);
}(window, window.document, jQuery, wp));
