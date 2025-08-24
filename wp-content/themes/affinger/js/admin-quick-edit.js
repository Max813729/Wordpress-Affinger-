(function (window, document, $, undefined) {
	'use strict';

	function on_ready() {
		var _inlineEditPostEdit;

		if (!inlineEditPost) {
			return;
		}

		_inlineEditPostEdit = inlineEditPost.edit;

		inlineEditPost.edit = function (id) {
			var post_id;
			var $edit_row;
			var $post_row;
			var exclude_from_pattern;

			_inlineEditPostEdit.apply(this, arguments);

			post_id = 0;

			if (typeof id === 'object') {
				post_id = parseInt(this.getId(id));
			}

			if (post_id === 0) {
				return;
			}

			$edit_row = $('#edit-' + post_id);
			$post_row = $('#post-' + post_id);

			exclude_from_pattern = $post_row.find('[data-st-block-pattern-post-column="exclude_from_pattern"]')
				.eq(0)
				.attr('data-st-block-pattern-post-column-value');

			if (typeof exclude_from_pattern !== 'undefined') {
				$edit_row.find('[data-st-block-pattern-quick-edit="exclude_from_pattern"]')
					.filter('[value="' + exclude_from_pattern + '"]')
					.prop('checked', true);
			}
		};
	}

	$(on_ready);
}(window, window.document, jQuery));
