<?php
/**
 * ブロック追加用スタイル
 *
 */

$st_is_ex    = st_is_ver_ex();
$st_is_af    = st_is_ver_af();
$st_is_st    = st_is_ver_st();
$st_is_ex_af = st_is_ver_ex_af();

add_action( 'init', function() {
	// グループ core/group
	register_block_style(
		'core/group',
		array(
			'name'         => 'st-group-bg-diagonal',
			'label'        => '斜線',
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'st-group-bg-grid',
			'label'        => 'グリッド',
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'st-group-bg-dot',
			'label'        => 'ドット',
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'st-group-line',
			'label'        => 'ライン',
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'st-group-line-bold',
			'label'        => 'ライン（太）',
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'st-group-corner-brackets',
			'label'        => '角括弧',
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'         => 'st-group-square-brackets',
			'label'        => 'かぎ括弧',
		)
	);

	// 見出し core/heading
	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-naked',
			'label'        => 'カスタム',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-line',
			'label'        => 'ライン',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-bubble',
			'label'        => 'ふきだし',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-diagonal',
			'label'        => '斜線',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-count',
			'label'        => 'カウント',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-attention',
			'label'        => '注意',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-check',
			'label'        => 'チェック',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-question',
			'label'        => '質問',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-answer',
			'label'        => '答え',
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'st-heading-custom-step',
			'label'        => 'ステップ',
		)
	);

	if ( st_is_ver_ex_af() ):
		register_block_style(
			'core/heading',
			array(
				'name'         => 'st-heading-custom-ranking',
				'label'        => 'ランキング',
			)
		);
	endif;
} );

if  ( isset( $GLOBALS['wp_version'] ) && version_compare( $GLOBALS['wp_version'], '5.8-alpha', '>=' )
   || isset( $GLOBALS["stdata622"] ) && ( $GLOBALS["stdata622"] ) === 'yes' ){ // 段落スタイルを有効にする

add_action( 'init', function() {
	// 段落
	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-pen',
			'label'        => 'カスタム',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-memo-txt',
			'label'        => 'メモ',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-link',
			'label'        => 'リンク',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-check',
			'label'        => 'チェック',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-point',
			'label'        => 'ポイント',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-info-circle',
			'label'        => 'インフォ',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-bigginer',
			'label'        => '初心者',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-attention',
			'label'        => '注意',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-attention-gray',
			'label'        => '注意（グレー）',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-circle-o',
			'label'        => 'マル',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-times',
			'label'        => 'バツ',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-thumbs-o-up',
			'label'        => 'Like',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-thumbs-o-down',
			'label'        => 'Bad',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-code',
			'label'        => 'Code',
		)
	);


	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-memo',
			'label'        => '付箋',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-dotline',
			'label'        => '囲みドット',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-bubble',
			'label'        => 'ふきだし',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-marumozi',
			'label'        => 'まるもじ',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-button',
			'label'        => '簡易ボタン',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-kaiwa',
			'label'        => '簡易会話A',
		)
	);

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'st-paragraph-kaiwa-b',
			'label'        => '簡易会話B',
		)
	);
} );

if( isset( $GLOBALS["stdata543"] ) && ( $GLOBALS["stdata543"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-pen' );
	});
endif;

if( isset( $GLOBALS["stdata544"] ) && ( $GLOBALS["stdata544"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-memo-txt' );
	});
endif;

if( isset( $GLOBALS["stdata545"] ) && ( $GLOBALS["stdata545"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-link' );
	});
endif;

if( isset( $GLOBALS["stdata546"] ) && ( $GLOBALS["stdata546"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-check' );
	});
endif;

if( isset( $GLOBALS["stdata547"] ) && ( $GLOBALS["stdata547"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-point' );
	});
endif;

if( isset( $GLOBALS["stdata548"] ) && ( $GLOBALS["stdata548"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-info-circle' );
	});
endif;

if( isset( $GLOBALS["stdata549"] ) && ( $GLOBALS["stdata549"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-bigginer' );
	});
endif;

if( isset( $GLOBALS["stdata550"] ) && ( $GLOBALS["stdata550"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-attention' );
	});
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-attention-gray' );
	});
endif;

if( isset( $GLOBALS["stdata551"] ) && ( $GLOBALS["stdata551"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-circle-o' );
	});
endif;

if( isset( $GLOBALS["stdata552"] ) && ( $GLOBALS["stdata552"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-times' );
	});
endif;

if( isset( $GLOBALS["stdata553"] ) && ( $GLOBALS["stdata553"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-thumbs-o-up' );
	});
endif;

if( isset( $GLOBALS["stdata554"] ) && ( $GLOBALS["stdata554"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-thumbs-o-down' );
	});
endif;

if( isset( $GLOBALS["stdata555"] ) && ( $GLOBALS["stdata555"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-code' );
	});
endif;

if( isset( $GLOBALS["stdata558"] ) && ( $GLOBALS["stdata558"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-memo' );
	});
endif;

if( isset( $GLOBALS["stdata559"] ) && ( $GLOBALS["stdata559"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-dotline' );
	});
endif;

if( isset( $GLOBALS["stdata560"] ) && ( $GLOBALS["stdata560"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-bubble' );
	});
endif;

if( isset( $GLOBALS["stdata561"] ) && ( $GLOBALS["stdata561"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-marumozi' );
	});
endif;

if( isset( $GLOBALS["stdata556"] ) && ( $GLOBALS["stdata556"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-button' );
	});
endif;

if( isset( $GLOBALS["stdata567"] ) && ( $GLOBALS["stdata567"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-kaiwa' );
	});
endif;

if( isset( $GLOBALS["stdata568"] ) && ( $GLOBALS["stdata568"] ) === 'yes' ): // 削除
	add_action( 'init', function() {
		unregister_block_style( 'core/paragraph', 'st-paragraph-kaiwa-b' );
	});
endif;

}

add_action( 'init', function() {
	// 画像 core/image
	register_block_style(
		'core/image',
		array(
			'name'         => 'st-photo-shadow',
			'label'        => 'シャドウ',
		)
	);

	register_block_style(
		'core/image',
		array(
			'name'         => 'st-eyecatch-width',
			'label'        => 'ワイド',
		)
	);
} );

add_action( 'init', function() {
	// リスト core/list
	register_block_style(
		'core/list',
		array(
			'name'         => 'st-check',
			'label'        => '簡易チェック',
		)
	);

	register_block_style(
		'core/list',
		array(
			'name'         => 'st-check-border',
			'label'        => '簡易チェック+ドット下線',
		)
	);
} );

add_action( 'init', function() {
	unregister_block_style( 'core/list', 'st-check' );
});

add_action( 'init', function() {
	unregister_block_style( 'core/list', 'st-check-border' );
});

add_action( 'init', function() {
	// ソースコード core/code
	register_block_style(
		'core/code',
		array(
			'name'         => 'st-wide-background',
			'label'        => 'ワイド（黒）',
		)
	);

	// 引用 core/quote
	register_block_style(
		'core/quote',
		array(
			'name'        => 'st-quote-line',
			'label'       => 'ライン',
		)
	);

	// Table
	register_block_style(
		'core/table',
		array(
			'name'         => 'st-centertable',
			'label'        => '中央寄せ',
		)
	);

	register_block_style(
		'core/table',
		array(
			'name'         => 'st-table-no-line',
			'label'        => 'ラインなし',
		)
	);

	register_block_style(
		'core/table',
		array(
			'name'         => 'st-table-line',
			'label'        => 'ラインのみ',
		)
	);

	register_block_style(
		'core/table',
		array(
			'name'         => 'st-table-line-2',
			'label'        => 'ラインのみ2',
		)
	);
} );

// タブ st-blocks/tabs
add_action( 'init', function() {
	register_block_style(
		'st-blocks/tabs',
		array(
			'name'         => 'st-square',
			'label'        => 'スクエア',
		)
	);

	register_block_style(
		'st-blocks/tabs',
		array(
			'name'         => 'st-bubble',
			'label'        => 'ふきだし',
		)
	);

	register_block_style(
		'st-blocks/tabs',
		array(
			'name'         => 'st-tab',
			'label'        => 'タブ',
		)
	);

	register_block_style(
		'st-blocks/tabs',
		array(
			'name'        => 'st-border',
			'label'       => 'ボーダー',
		)
	);
} );

// FAQ st-blocks/faq
add_action( 'init', function() {
	register_block_style(
		'st-blocks/faq',
		array(
			'name'         => 'st-square',
			'label'        => 'スクエア',
		)
	);

	register_block_style(
		'st-blocks/faq',
		array(
			'name'         => 'st-rounded-square',
			'label'        => '角丸',
		)
	);

	register_block_style(
		'st-blocks/faq',
		array(
			'name'         => 'st-circle',
			'label'        => '丸',
		)
	);
} );

if ( ! function_exists( 'st_get_default_block_pattern_category' ) ) {
	/**
	 * デフォルトカテゴリーを取得する。
	 *
	 * @return array|object|WP_Error|WP_Term|null
	 */
	function st_get_default_block_pattern_category() {
		return get_term_by( 'slug', 'default', 'st_block_pattern_category' );
	}
}

if ( ! function_exists( 'st_create_default_block_pattern_category' ) ) {
	/**
	 * デフォルトカテゴリーを作成する．
	 *
	 * @return array<string, int>|false
	 */
	function st_create_default_block_pattern_category() {
		$taxonomy_key          = 'st_block_pattern_category';
		$default_category_slug = 'default';
		$ids                   = term_exists( $default_category_slug, $taxonomy_key );

		if ( $ids === null ) {
			$ids = wp_insert_term( __( 'Uncategorized' ), $taxonomy_key, array( 'slug' => $default_category_slug ) );
		}

		if ( ! is_array( $ids ) ) {
			return false;
		}

		return array_map( 'intval', $ids );
	}
}

/**
 * ユーザーブロックパターン (WP 5.5+)
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-patterns/ License: GPLv2 or later
 */
function st_register_block_patterns() {
	// ブロックパターンメンテナンス用 カスタム投稿タイプ
	$post_type_labels = array(
		'name'                     => 'マイブロック',
		'singular_name'            => 'マイブロック',
		'add_new'                  => '新規追加',
		'add_new_item'             => '新規マイブロックを追加',
		'edit_item'                => 'マイブロックの編集',
		'new_item'                 => '新規マイブロック',
		'view_item'                => 'マイブロックを表示',
		'view_items'               => 'マイブロックの表示',
		'search_items'             => 'マイブロックを検索',
		'not_found'                => 'マイブロックが見つかりませんでした。',
		'not_found_in_trash'       => 'ゴミ箱内にマイブロックが見つかりませんでした。',
		'all_items'                => 'マイブロック一覧',
		'attributes'               => 'マイブロックの属性',
		'filter_items_list'        => 'マイブロックの絞り込み',
		'items_list_navigation'    => 'マイブロックリストナビゲーション',
		'items_list'               => 'マイブロックリスト',
		'item_published'           => 'マイブロックを公開しました。',
		'item_published_privately' => 'マイブロックを限定公開しました。',
		'item_reverted_to_draft'   => 'マイブロックを下書きに戻しました。',
		'item_scheduled'           => 'マイブロックを予約しました。',
		'item_updated'             => 'マイブロックを更新しました。',
	);

	$post_type_args = array(
		'labels'          => $post_type_labels,
		'description'     => 'ブロックパターンメンテナンス用',
		'public'          => false,
		'hierarchical'    => false,
		'show_ui'         => true,
		'menu_position'   => 5,
		'capability_type' => 'post',
		'supports'        => array(
			'title',
			'editor',
			'author',
		),
		'query_var'       => false,
		'show_in_rest'    => true,
		'menu_icon'       => 'dashicons-screenoptions',
	);

	register_post_type( 'st_block_pattern', $post_type_args );

	// ブロックパターンメンテナンス用 ブロックパターンカテゴリー
	$taxonomy_labels = [
		'name'                       => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'              => _x( 'Category', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Categories', 'affinger' ),
		'popular_items'              => '人気のカテゴリー',
		'all_items'                  => __( 'All Categories', 'affinger' ),
		'edit_item'                  => __( 'Edit Category', 'affinger' ),
		'view_item'                  => __( 'View Category', 'affinger' ),
		'update_item'                => __( 'Update Category', 'affinger' ),
		'add_new_item'               => __( 'Add New Category', 'affinger' ),
		'new_item_name'              => __( 'New Category Name', 'affinger' ),
		'separate_items_with_commas' => 'カテゴリーが複数ある場合はコンマで区切ってください',
		'add_or_remove_items'        => 'カテゴリーの追加もしくは削除',
		'choose_from_most_used'      => 'よく使われているカテゴリーから選択',
		'not_found'                  => __( 'No categories found.', 'affinger' ),
		'no_terms'                   => __( 'No categories', 'affinger' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'affinger' ),
		'items_list'                 => __( 'Categories list', 'affinger' ),
		'most_used'                  => _x( 'Most Used', 'categories' ),
		'back_to_items'              => __( '&larr; Back to Ctegories', 'affinger' ),
	];

	$taxonomy_args = [
		'labels'                => $taxonomy_labels,
		'public'                => false,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'show_in_rest'          => true,
	];;

	register_taxonomy( 'st_block_pattern_category', 'st_block_pattern', $taxonomy_args );

	// ブロックパターンカテゴリー追加
	st_create_default_block_pattern_category();

	$built_in_category_slugs = array( 'header', 'text', 'columns', 'buttons', 'gallery' );
	$categories              = get_terms( array( 'taxonomy' => 'st_block_pattern_category', 'get' => 'all' ) );

	if ( ! is_wp_error( $categories ) && $categories ) {
		// コアのブロックパターンカテゴリーと同じ場合は除外
		$categories = array_filter(
			$categories,
			function ( $category ) use ( $built_in_category_slugs ) {
				return ! in_array( $category->slug, $built_in_category_slugs, true );
			}
		);

		// ブロックパターンカテゴリー追加
		foreach ( $categories as $category ) {
			register_block_pattern_category( $category->slug, array( 'label' => $category->name ) );
		}
	}

	// ブロックパターン追加
	$query_args = array(
		'post_type'     => array( 'st_block_pattern' ),
		'post_status'   => array( 'publish' ),
		'nopaging'      => true,
		'no_found_rows' => true,
		// 'order' => 'DESC',
		// 'orderby' => 'date',
	);

	$pattern_query = new WP_Query( $query_args );

	// The Loop
	if ( ! $pattern_query->have_posts() ) {
		return;
	}

	$default_category = st_get_default_block_pattern_category();

	foreach ( $pattern_query->get_posts() as $post ) {
		$the_id               = $post->ID;
		$exclude_from_pattern = (bool) get_post_meta( $the_id, 'exclude_from_pattern', true );

		if ( $exclude_from_pattern ) {
			continue;
		}

		// ブロックHTML
		$the_content = $post->post_content;

		if ( $the_content === '' ) {
			continue;
		}

		// ブロックパターンタイトル
		$the_title = get_the_title( $the_id );
		$the_title = ( $the_title !== '' ) ? $the_title : '無題ブロックパターン';

		// ブロックパターンカテゴリー
		$the_category_slugs = array();
		$the_categories     = get_the_terms( $the_id, 'st_block_pattern_category' );

		// カテゴリーがない場合はデフォルトカテゴリーに分類する
		if ( is_wp_error( $the_categories ) || ! $the_categories ) {
			$the_categories = [ $default_category ];
		}

		foreach ( $the_categories as $category ) {
			$the_category_slugs[] = $category->slug;
		}

		// ブロックパターン追加
		register_block_pattern(
			'st/block-pattern-' . $the_id, // ブロックパターン名
			array(
				'title'      => $the_title, // ブロックパターンのタイトル
				'content'    => $the_content, // ブロックHTML
				'categories' => $the_category_slugs, // ブロックパターンカテゴリー
			)
		);
	}
}

add_action( 'init', 'st_register_block_patterns' );

if ( ! function_exists( 'st_save_post_st_block_pattern' ) ) {
	/**
	 * マイブロックを保存する。
	 *
	 * @param int $post_id
	 */
	function st_save_post_st_block_pattern( $post_id ) {
		$post_status = get_post_status( $post_id );

		if ( $post_status === false || $post_status === 'auto-draft' ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		// カスタムフィールド
		$exclude_from_pattern = (string) (int) (bool) filter_input( INPUT_POST, 'exclude_from_pattern' );

		update_post_meta( $post_id, 'exclude_from_pattern', $exclude_from_pattern );

		// マイブロックに常にカテゴリーを設定する。
		//
		// カテゴリーが設定されていないと WP 5.6+ でブロックエディターでエラーが発生する。
		// 未設定の場合はデフォルトカテゴリーを作成・設定する。
		$taxonomy_key = 'st_block_pattern_category';
		$terms        = get_the_terms( $post_id, $taxonomy_key );

		if ( $terms !== false ) {
			return;
		}

		$ids = st_create_default_block_pattern_category();

		if ( $ids === false ) {
			return;
		}

		$default_category_id = (int) $ids['term_id'];

		wp_set_post_terms( $post_id, array( $default_category_id ), $taxonomy_key );
	}
}

add_action( 'save_post_st_block_pattern', 'st_save_post_st_block_pattern' );

if ( ! function_exists( 'st_pattern_menu' ) ) {
	/** パターンメニューを追加 / 調整 */
	function st_pattern_menu() {
		add_menu_page(
			'パターン',
			'パターン',
			'manage_options',
			'edit.php?post_type=wp_block',
			'',
			'dashicons-screenoptions',
			6
		);

		// 「外観」の「パターン」メニューを削除する (WP 6.5 以上)。
		remove_submenu_page( 'themes.php', 'edit.php?post_type=wp_block' );
	}
}

add_action( 'admin_menu', 'st_pattern_menu' );

if ( ! function_exists( 'st_is_st_block_pattern_list_screen' ) ) {
	/**
	 * マイブロック一覧画面かどうかを返す
	 *
	 * @return bool
	 */
	function st_is_st_block_pattern_list_screen() {
		if ( ! is_admin() ) {
			return false;
		}

		if ( ! function_exists( 'get_current_screen' ) ) {
			return false;
		}

		$screen = get_current_screen();

		if ( ! $screen || $screen->id === null ) {
			return false;
		}

		return ( $screen->id === 'edit-st_block_pattern' );
	}
}

if ( ! function_exists( 'st_manage_st_block_pattern_posts_columns' ) ) {
	/**
	 * カラムを追加する
	 *
	 * @param array<string, string> $posts_columns
	 *
	 * @return array<string, string>
	 */
	function st_manage_st_block_pattern_posts_columns( $posts_columns ) {
		$rest_columns = [];

		foreach ( array( 'date', 'postid' ) as $column ) {
			if ( ! array_key_exists( $column, $posts_columns ) ) {
				continue;
			}

			$rest_columns[ $column ] = $posts_columns[ $column ];

			unset( $posts_columns[ $column ] );
		}

		$posts_columns['shortcode'] = 'ショートコード';
		$posts_columns['exclude_from_pattern'] = 'パターン';

		$posts_columns = array_merge( $posts_columns, $rest_columns );

		return $posts_columns;
	}
}

add_filter( 'manage_st_block_pattern_posts_columns', 'st_manage_st_block_pattern_posts_columns' );

if ( ! function_exists( 'st_manage_st_block_pattern_posts_custom_column' ) ) {
	/**
	 * カラムを出力する
	 *
	 * @param string $column_name
	 * @param int $post_id
	 *
	 * @return void
	 */
	function st_manage_st_block_pattern_posts_custom_column( $column_name, $post_id ) {
		switch ( $column_name ) {
			case 'shortcode':
				echo sprintf( '<code>[st-myblock id="%s"]</code>', $post_id );

				break;

			case 'exclude_from_pattern':
				$exclude_from_pattern = (bool) get_post_meta($post_id, 'exclude_from_pattern', true);
				?>

				<?php if ( $exclude_from_pattern ): ?>
					<span data-st-block-pattern-post-column="exclude_from_pattern" data-st-block-pattern-post-column-value="1">非表示</span>
				<?php else: ?>
					<span data-st-block-pattern-post-column="exclude_from_pattern" data-st-block-pattern-post-column-value="0"></span>
				<?php endif; ?>

				<?php

				break;

			default:
				break;
		}
	}
}

add_action( 'manage_st_block_pattern_posts_custom_column', 'st_manage_st_block_pattern_posts_custom_column', 10, 2 );

if ( ! function_exists( 'st_st_block_pattern_quick_edit_custom_box' ) ) {
	/**
	 * @param string $column_name
	 * @param string $post_type
	 * @param string $taxonomy
	 *
	 * @return void
	 */
	function st_st_block_pattern_quick_edit_custom_box( $column_name, $post_type, $taxonomy ) {
		switch ( $column_name ) {
			case 'exclude_from_pattern':
				?>

				<fieldset class="inline-edit-col-left">
					<div class="inline-edit-col">
						<label class="inline-edit-exclude_from_pattern">
							<input data-st-block-pattern-quick-edit="exclude_from_pattern" type="checkbox"
							       name="exclude_from_pattern" value="1">
							<span class="checkbox-title">パターンに追加しない</span>
						</label>
					</div>
				</fieldset>

				<?php
				break;

			default:
				break;
		}
	}
}

add_action( 'quick_edit_custom_box', 'st_st_block_pattern_quick_edit_custom_box', 10, 3 );

if ( ! function_exists( 'st_admin_enqueue_quick_edit_scripts' ) ) {
	/**
	 * @param string $hook
	 */
	function st_admin_enqueue_quick_edit_scripts( $hook ) {
		$post_type = (string) filter_input( INPUT_GET, 'post_type' );

		if ( $hook !== 'edit.php' || $post_type !== 'st_block_pattern' ) {
			return;
		}

		wp_enqueue_script(
			'st-admin-quick-edit-script',
			get_theme_file_uri( 'js/admin-quick-edit.js' ),
			[
				'jquery',
				'inline-edit-post',
			],
			false,
			true
		);
	}
}

add_action( 'admin_enqueue_scripts', 'st_admin_enqueue_quick_edit_scripts' );

if ( ! function_exists( 'st_display_st_block_pattern_term_filter' ) ) {
	/**
	 * マイブロックカテゴリーのフィルターを出力する
	 *
	 * @param string $post_type
	 *
	 * @return void
	 */
	function st_display_st_block_pattern_term_filter( $post_type ) {
		global $wp_query;

		if ( ! st_is_st_block_pattern_list_screen() || ! $wp_query->is_main_query() ) {
			return;
		}

		$list_cats = function ( $element ) {
			return mb_strimwidth( $element, 0, 40, '...', 'UTF-8' );
		};

		add_filter( 'list_cats', $list_cats );

		$taxonomy_name = 'st_block_pattern_category';
		$taxonomy      = get_taxonomy( $taxonomy_name );

		$taxonomy_dropdown = wp_dropdown_categories(
			array(
				'show_option_all' => $taxonomy->labels->all_items,
				'taxonomy'        => $taxonomy_name,
				'name'            => $taxonomy_name,
				'orderby'         => 'name',
				'selected'        => $wp_query->query[ $taxonomy_name ] ?? 0,
				'hierarchical'    => true,
				'depth'           => 0,
				'show_count'      => false,
				'hide_empty'      => false,
				'echo'            => false,
				'value_field'     => 'slug',
			)
		);

		if ( preg_match( '!</option>!', $taxonomy_dropdown ) ) {
			echo $taxonomy_dropdown;
		}

		remove_filter( 'list_cats', $list_cats );
	}
}

add_action( 'restrict_manage_posts', 'st_display_st_block_pattern_term_filter' );

if ( ! function_exists( 'st_handle_st_block_pattern_term_filter' ) ) {
	/**
	 * マイブロックカテゴリーのフィルターで絞り込みを行う
	 *
	 * @param WP_Query $query
	 *
	 * @return WP_Query
	 */
	function st_handle_st_block_pattern_term_filter( WP_Query $query ) {
		if ( ! st_is_st_block_pattern_list_screen() || ! $query->is_main_query() ) {
			return $query;
		}

		$taxonomy_name = 'st_block_pattern_category';

		if ( ! isset( $query->query_vars[ $taxonomy_name ] ) ) {
			return;
		}

		$term = get_term_by( 'slug', $query->get( $taxonomy_name ), $taxonomy_name );

		if ( $term === false ) {
			unset( $query->query_vars[ $taxonomy_name ] );
		}

		return $query;
	}
}

add_action( 'parse_query', 'st_handle_st_block_pattern_term_filter' );

if ( ! function_exists( 'st_pre_get_st_block_pattern' ) ) {
	/**
	 * ID を検索対象にする
	 *
	 * @param WP_QUery $query
	 *
	 * @return void
	 */
	function st_pre_get_st_block_pattern( WP_QUery $query ) {
		if ( ! st_is_st_block_pattern_list_screen() || ! $query->is_main_query() ) {
			return;
		}

		$s = trim( $query->get( 's', '' ) );

		if ( $s !== '' && ctype_digit( $s ) ) {
			$query->set( 'p', (int) $s );

			$query->set( 's', '' );
		}
	}
}

add_action( 'pre_get_posts', 'st_pre_get_st_block_pattern' );

if ( ! function_exists( 'st_myblock_shortcode' ) ) {
	/**
	 * [st-myblock] ショートコード
	 *
	 * @param array<string, string>|string $atts
	 * @param string|null $content
	 * @param string $tag
	 *
	 * @return string
	 */
	function st_myblock_shortcode( $atts, $content = null, $tag = '' ) {
		$defaults = array(
			'id'              => '',

			// ブロックエディター (REST 経由のアクセス) ではデフォルトで編集リンクを出力しないようにする。
			'_show_edit_link' => defined('REST_REQUEST') && REST_REQUEST ? '0' : '1',
		);

		$atts = shortcode_atts( $defaults, $atts, 'st-myblock' );
		$atts = array_map( 'trim', $atts );

		$id              = (int) $atts['id'];
		$_show_edit_link = (bool) $atts['_show_edit_link'];

		$block_pattern_query = new WP_Query( array(
			'post_type'           => 'st_block_pattern',
			'p'                   => $id,
			'posts_per_page'      => 1,
			'nopaging'            => true,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		) );

		if ( ! $block_pattern_query->have_posts() ) {
			return '';
		}

		$show_edit_link = false;

		if ( is_user_logged_in() ) {
			// 編集リンクを表示する権限グループ
			$edit_link_roles = array(
				'administrator',
				'editor',
			);

			$current_user   = wp_get_current_user();
			$show_edit_link = ( get_option( 'st-data591', 'yes' ) === 'yes' );
			$show_edit_link = $show_edit_link && ( _st_any_in_array( $edit_link_roles, $current_user->roles ) );
			$show_edit_link = $show_edit_link && current_user_can( 'edit_post', $id );
		}

		// 無限ループを回避する。
		$cache_key   = hash( 'sha256', serialize( array( $id, $_show_edit_link, $show_edit_link ) ) );
		$cache_value = wp_cache_get( $cache_key );

		if ( $cache_value !== false ) {
			return $cache_value;
		}

		ob_start();
		?>

		<?php while ( $block_pattern_query->have_posts() ): $block_pattern_query->the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

		<?php if ( $_show_edit_link && $show_edit_link ): ?>
			<div class="st-edit-link">
				<button class="st-edit-link-button"
				        type="button"
				        onclick="window.open('<?= get_edit_post_link( $id ); ?>'); return false;"
				        title="<?= esc_attr( get_the_title( $id ) ); ?>">
					[パターン編集]
				</button>
			</div>
		<?php endif; ?>

		<?php
		$content = ob_get_clean();

		wp_cache_set( $cache_key, $content );

		return $content;
	}
}

add_shortcode( 'st-myblock', 'st_myblock_shortcode' );

if ( ! function_exists( 'st_display_st_block_pattern_shortcode_meta_box' ) ) {
	/**
	 * マイブロックのショートコードメタボックスを表示する
	 *
	 * @param WP_Post $post
	 * @param mixed[] $args
	 */
	function st_display_st_block_pattern_shortcode_meta_box( WP_Post $post, array $args ) {
		?>

		<p>
			以下のショートコードを表示したい箇所に記入してください。<br><br>
			<code>[st-myblock id="<?php echo esc_html( get_the_ID( $post ) ); ?>"]</code>
		</p>

		<?php
	}
}

if ( ! function_exists( 'st_display_st_block_pattern_settings_meta_box' ) ) {
	/**
	 * マイブロックの設定メタボックスを表示する
	 *
	 * @param WP_Post $post
	 * @param mixed[] $args
	 */
	function st_display_st_block_pattern_settings_meta_box( WP_Post $post, array $args ) {
		$exclude_from_pattern = (bool) get_post_meta($post->ID, 'exclude_from_pattern', true);
		?>

		<label>
			<input name="exclude_from_pattern" type="checkbox" value="1" <?php checked( $exclude_from_pattern ); ?>>
			パターンに追加しない
		</label>

		<?php
	}
}

if ( ! function_exists( 'st_add_block_pattern_meta_boxes' ) ) {
	/**
	 * マイブロックのメタボックスを追加する
	 *
	 * @return void
	 */
	function st_add_st_block_pattern_meta_boxes() {
		add_meta_box(
			'st-block-pattern-shortcode',
			'ショートコード',
			'st_display_st_block_pattern_shortcode_meta_box',
			'st_block_pattern',
			'side'
		);

		add_meta_box(
			'st-block-pattern-settings',
			'設定',
			'st_display_st_block_pattern_settings_meta_box',
			'st_block_pattern',
			'side'
		);
	}
}

add_action( 'add_meta_boxes_st_block_pattern', 'st_add_st_block_pattern_meta_boxes' );

if ( ! function_exists( 'st_block_type_metadata' ) ) {
	/**
	 * ブロックタイプのメタデータを変更する。
	 *
	 * @param string[] $metadata
	 *
	 * @return string[]
	 */
	function st_block_type_metadata( array $metadata ) {
		if ( isset( $metadata['supports']['typography'] ) ) {
			// タイポグラフィの設定を無効化する。
			unset( $metadata['supports']['typography']['__experimentalFontFamily'] );
			unset( $metadata['supports']['typography']['__experimentalFontStyle'] );
			unset( $metadata['supports']['typography']['__experimentalFontWeight'] );
			unset( $metadata['supports']['typography']['__experimentalLetterSpacing'] );
			unset( $metadata['supports']['typography']['__experimentalTextDecoration'] );
			unset( $metadata['supports']['typography']['__experimentalTextTransform'] );
		}

		return $metadata;
	}
}

add_filter( 'block_type_metadata', 'st_block_type_metadata' );
