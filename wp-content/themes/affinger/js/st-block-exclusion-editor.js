(function (window, document, wp, undefined) {
	'use strict'

	wp.domReady(function () {
		var block_types = [
			'core/site-logo',
			'core/site-tagline',
			'core/site-title',
			'core/query',
			'core/post-title',
			'core/post-content',
			'core/post-date',
			'core/post-excerpt',
			'core/post-featured-image',
			'core/loginout',
			'core/comment',
			'core/comments',
			'core/leatest-posts',
			'core/legacy-widget',
			'core/page-list',
			'core/posts-list',
			'core/post-terms',
			'core/query-title',
			'core/verse',

			// WP 5.9+
			'core/navigation',
			'core/post-author',
			'core/post-navigation-link',
			'core/post-comments',
			'core/term-description',

			// WP 6.0+
			'core/avatar',
			'core/read-more',
			'core/comments-query-loop',
			'core/post-comments-form',
			'core/post-author-biography',

			// WP 6.2+
			'core/post-author-name',
			'core/social-links',
		];

		block_types.forEach(function (block_type) {
			if (wp.blocks.getBlockType(block_type) !== undefined) {
				wp.blocks.unregisterBlockType(block_type);
			}
		});
	});

}(window, window.document, wp));
