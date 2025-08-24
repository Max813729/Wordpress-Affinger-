/**
 * @var {Object} ST
 * @var {boolean} ST.affiliate_manager_enabled
 * @var {boolean} ST.af_cpt_enabled
 * @var {boolean} ST.tag_plugin_enabled
 * @var {boolean} ST.st_countdown_enabled
 */

;(function (window, document, $, tinymce, ST, undefined) {
	'use strict';

	var Plugin;

	/**
	 * 選択状態かどうかを取得
	 */
	function isSelected(editor) {
		var range = editor.selection.getRng();

		return Math.abs(range.endOffset - range.startOffset) > 0;
	}

	/**
	 * テキストとしてコンテンツを囲う
	 */
	function _wrapAsText(editor, before, after) {
	    return function () {
			var selected = isSelected(editor);
			var content;
			var newConotent;
			var range;
			var afterLength;
			var position;
			var node;

			content     = selected ? editor.selection.getContent({format: 'text'}) : '';
			newConotent = before + content + after;

			editor.execCommand('mceInsertContent', false, newConotent);

			if (selected) {
				return;
			}

			range       = editor.selection.getRng();
			afterLength = after.length - (after.match(/[\uD800-\uDBFF][\uDC00-\uDFFF]/g) || []).length;
			position    = range.endOffset - afterLength;
			node        = range.startContainer;

			range.setStart(node, position);
			range.setEnd(node, position);
			editor.selection.setRng(range);
		};
	}

	/**
	 * HTMLとしてコンテンツを囲う
	 */
	function _wrapAsHtml(editor, before, after) {
		return function () {
			var content = '';
			var newContent;

			if (isSelected(editor)) {
				var node = editor.selection.getNode();

				content = editor.selection.getContent();
				content = (content === node.innerHTML) ? node.outerHTML : content;
			}

			newContent = before + content + after;

			editor.execCommand('mceInsertContent', false, newContent);
		};
	}

	/**
	 * テキストとしてコンテンツを挿入/置換
	 */
	function _setAsText(editor, content) {
		return function () {
			editor.execCommand('mceInsertContent', false, content);
		};
	}

	/**
	 * HTMLとしてコンテンツを挿入/置換
	 */
	function _setAsHtml(editor, content) {
		return function () {
			editor.selection.setContent(content);
		};
	}

	/**
	 * コールバックファクトリを生成
	 */
	function createCallbackFactory(editor, func) {
		return function () {
			var args = Array.prototype.slice.call(arguments);

			args.unshift(editor);

			return func.apply(null, args);
		};
	}

	/**
	 * リストボックスの項目定義を取得
	 */
	function getListItemDefinition(editor) {
		var setAsHtml  = createCallbackFactory(editor, _setAsHtml);
		var setAsText  = createCallbackFactory(editor, _setAsText);
		var wrapAsHtml = createCallbackFactory(editor, _wrapAsHtml);
		var wrapAsText = createCallbackFactory(editor, _wrapAsText);

		var listItems = {
			// ボタン追加時は以下に追加する
			// function.php 側の修正は不要
			//
			// メニューの定義 (ボタンを子メニューにいれる場合):
			//
			// 'メニュー名': {    //
			//     text    : 'メニューのテキスト',
			//     icon    : false または 'アイコン名 (code 等)',
			//     menu    : {
			//         // **ボタンの定義** の内容
			//         // ...
			//     }
			//     enabled : 有効にするかどうか (false またはコールバック / 省略時は true)
			// },
			//
			// ボタンの定義:
			//
			// 'ボタン名': {
			//     text    : 'ボタンのテキスト',
			//     icon    : false または 'アイコン名 (code 等)',
			//     callback: コールバック
			//               HTMLとして挿入/置換する場合    : setAsHtml('挿入/置換する内容L')
			//               テキストとして挿入/置換する場合: setAsText('挿入/置換する内容')
			//               HTMLとして囲い込む場合         : wrapAsHtml('前に挿入する内容', '後ろに挿入する内容')
			//               テキストとして囲い込む場合     : wrapAsText('前に挿入する内容', '後ろに挿入する内容')
			//
			//               選択範囲のHTMLタグ等は除去する場合は、テキストとして挿入/置換/囲い込みを行うコールバックを使う
			//               (その他の細かい挙動はTinyMCEの仕様に基づく)
			//     enabled: 有効にするかどうか (false またはコールバック / 省略時は true)
			// },
			'st_button_text_parts'     : {
				text    : 'テキストパーツ',
				icon    : 'st-svg-font',
				menu: {
				'st_button_clipmemo'     : {
					text    : 'クリップメモ',
					icon    : 'st-svg-paperclip',
					menu: {
						'st_button_clipmemo_default' : {
							text    : 'メモ',
							icon    : false,
							tooltip : 'メモ',
							callback: wrapAsText('[st-cmemo webicon="st-svg-file-text-o" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_external_link' : {
							text    : '外部リンク',
							icon    : false,
							tooltip : '外部リンク',
							callback: wrapAsText('[st-cmemo webicon="st-svg-external-link" iconcolor="#BDBDBD" bgcolor="#fafafa" color="#757575" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_bookmark' : {
							text    : 'ブックマーク',
							icon    : false,
							tooltip : 'ブックマーク',
							callback: wrapAsText('[st-cmemo webicon="st-svg-bookmark" iconcolor="#BDBDBD" bgcolor="#fafafa" color="#757575" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_info' : {
							text    : 'おしらせ',
							icon    : false,
							tooltip : 'おしらせ',
							callback: wrapAsText('[st-cmemo webicon="st-svg-bullhorn" iconcolor="#FFEB3B" bgcolor="#FFFDE7" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_question' : {
							text    : 'はてな',
							icon    : false,
							tooltip : 'はてな',
							callback: wrapAsText('[st-cmemo webicon="st-svg-question-circle" iconcolor="#4FC3F7" bgcolor="#E1F5FE" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_comment' : {
							text    : 'コメント',
							icon    : false,
							tooltip : 'コメント',
							callback: wrapAsText('[st-cmemo webicon="st-svg-comments" iconcolor="#F48FB1" bgcolor="#FCE4EC" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_code' : {
							text    : 'コード',
							icon    : false,
							tooltip : 'コード',
							callback: wrapAsText('[st-cmemo webicon="st-svg-code" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize="150"]', '[/st-cmemo]')
						},'st_button_clipmemo_point' : {
							text    : 'ポイント',
							icon    : false,
							tooltip : 'ポイント',
							callback: wrapAsText('[st-cmemo webicon="st-svg-lightbulb-o" iconcolor="#FFA726" bgcolor="#FFF3E0" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_user' : {
							text    : 'ユーザー',
							icon    : false,
							tooltip : 'ユーザー',
							callback: wrapAsText('[st-cmemo webicon="st-svg-user" iconcolor="#4FC3F7" bgcolor="#E1F5FE" color="#000000" bordercolor="" borderwidth="" iconsize="150"]', '[/st-cmemo]')
						},'st_button_clipmemo_bigginer' : {
							text    : '初心者',
							icon    : false,
							tooltip : '初心者',
							callback: wrapAsText('[st-cmemo webicon="st-svg-bigginer_l" iconcolor="#9CCC65" bgcolor="#F1F8E9" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_exclamation' : {
							text    : '注意文',
							icon    : false,
							tooltip : '注意文',
							callback: wrapAsText('[st-cmemo webicon="st-svg-exclamation-circle" iconcolor="#ef5350" bgcolor="#ffebee" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_exclamation_gray' : {
							text    : '注意文（グレー）',
							icon    : false,
							tooltip : '注意文（グレー）',
							callback: wrapAsText('[st-cmemo webicon="st-svg-exclamation-circle" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide' : {
							text    : '[?] ガイド※使用不可',
							icon    : false,
							tooltip : '[?] ガイド※使用不可',
							callback: wrapAsText('[st-cmemo webicon="Webアイコン" iconcolor="アイコンの色" bgcolor="背景色" color="文字色" bordercolor="ボーダー色" borderwidth="枠線の太さ（px）" iconsize="アイコンサイズ（%）"]ここにテキスト', '[/st-cmemo]')
						},
					},
				},
				'st_button_clipmemo_guide_text'     : {
					text    : 'クリップメモ（テキスト）',
					icon    : 'st-svg-paperclip',
					menu: {
						'st_button_clipmemo_guide_memo' : {
							text    : 'メモ',
							icon    : false,
							tooltip : 'メモ',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-memo" webicon="st-svg-pencil" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide_sankou' : {
							text    : '参考',
							icon    : false,
							tooltip : '参考',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-sankou" webicon="st-svg-quote-left" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide_kanren' : {
							text    : '関連',
							icon    : false,
							tooltip : '関連',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-kanren" webicon="st-svg-file-text-o" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide_attention' : {
							text    : '注意',
							icon    : false,
							tooltip : '注意',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-attention" webicon="st-svg-exclamation-circle" iconcolor="#ef5350" bgcolor="#ffebee" color="#000000" bordercolor="#ffcdd2" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide_point' : {
							text    : 'Check',
							icon    : false,
							tooltip : 'Check',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-point" webicon="st-svg-check" iconcolor="#FF8F00" bgcolor="#FFF8E1" color="#000000" bordercolor="#FFE082" borderwidth="" iconsize="150"]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide_next' : {
							text    : '次へ進む',
							icon    : false,
							tooltip : '次へ進む',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-next" webicon="st-svg-arrow-right faa-horizontal animated" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize="150"]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide_prev' : {
							text    : '前に戻る',
							icon    : false,
							tooltip : '前に戻る',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-prev" webicon="st-svg-arrow-left" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize="150"]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide_question' : {
							text    : '質問',
							icon    : false,
							tooltip : '質問',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-question" webicon="st-svg-quora" iconcolor="#29B6F6" bgcolor="#E1F5FE" color="#000000" bordercolor="#81D4FA" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
						'st_button_clipmemo_guide_answer' : {
							text    : '回答',
							icon    : false,
							tooltip : '回答',
							callback: wrapAsText('[st-cmemo myclass="st-text-guide st-text-guide-answer" webicon="st-svg-font" iconcolor="#919191" bgcolor="#fafafa" color="#000000" bordercolor="" borderwidth="" iconsize=""]', '[/st-cmemo]')
						},
					},
				},
				'st_button_minihukidashi': {
					text    : 'ミニふきだし',
					icon    : 'st-svg-commenting',
					menu: {
							'st_button_minihukidashi_default' : {
								text    : '基本',
								icon    : false,
								tooltip : '基本',
								callback: wrapAsText('[st-minihukidashi webicon="" fontsize="" fontweight="" bgcolor="#f3f3f3" color="#000000" margin="0 0 20px 0" radius="" position="" myclass="" add_boxstyle=""]', '[/st-minihukidashi]')
							},
							'st_button_minihukidashi_orange' : {
								text    : 'オレンジ',
								icon    : false,
								tooltip : 'オレンジ',
								callback: wrapAsText('[st-minihukidashi webicon="" fontsize="" fontweight="" bgcolor="#FFB74D" color="#fff" margin="0 0 20px 0" radius="" position="" myclass="" add_boxstyle=""]', '[/st-minihukidashi]')
							},
							'st_button_minihukidashi_pink' : {
								text    : 'ピンク',
								icon    : false,
								tooltip : 'ピンク',
								callback: wrapAsText('[st-minihukidashi webicon="" fontsize="" fontweight="" bgcolor="#F48FB1" color="#fff" margin="0 0 20px 0" radius="" position="" myclass="" add_boxstyle=""]', '[/st-minihukidashi]')
							},
							'st_button_minihukidashi_blue' : {
								text    : 'ブルー',
								icon    : false,
								tooltip : 'ブルー',
								callback: wrapAsText('[st-minihukidashi webicon="" fontsize="" fontweight="" bgcolor="#4FC3F7" color="#fff" margin="0 0 20px 0" radius="" position="" myclass="" add_boxstyle=""]', '[/st-minihukidashi]')
							},
							'st_button_minihukidashi_green' : {
								text    : 'グリーン',
								icon    : false,
								tooltip : 'グリーン',
								callback: wrapAsText('[st-minihukidashi webicon="" fontsize="" fontweight="" bgcolor="#7CB342" color="#fff" margin="0 0 20px 0" radius="" position="" myclass="" add_boxstyle=""]', '[/st-minihukidashi]')
							},
							'st_button_minihukidashi_red' : {
								text    : 'レッド',
								icon    : false,
								tooltip : 'レッド',
								callback: wrapAsText('[st-minihukidashi webicon="" fontsize="" fontweight="" bgcolor="#f44336" color="#fff" margin="0 0 20px 0" radius="" position="" myclass="" add_boxstyle=""]', '[/st-minihukidashi]')
							},
							'st_button_minihukidashi_mybox' : {
								text    : '+ マイボックス',
								icon    : false,
								tooltip : '+ マイボックス',
								callback: wrapAsHtml('[st-div class="" margin="0 0 15px 0" padding="0 0 0 0" add_style=""][st-minihukidashi webicon="e" fontsize="" fontweight="bold" bgcolor="#f3f3f3" color="" margin="0" radius="" position="" myclass="" add_boxstyle=""]ふきだしテキスト[/st-minihukidashi][/st-div][st-mybox title="" webicon="" color="" bordercolor="" bgcolor="#f3f3f3" borderwidth="" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="0 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_minihukidashi_guide' : {
								text    : '[?] ガイド※使用不可',
								icon    : false,
								tooltip : '[?] ガイド※使用不可',
								callback: wrapAsText('[st-minihukidashi webicon="Webアイコン" fontsize="文字サイズ（%）" fontweight="文字の太さ（bold）" bgcolor="背景色" color="文字色" margin="余白（上 右 下 左）" radius="角の丸み" position="吹き出し位置（on）" myclass="CSSクラス" add_boxstyle="全体を囲むdivに追加するCSS"]ここにテキスト', '[/st-minihukidashi]')
							},
						},
					},
					'st_button_clipmemo_composite'     : {
						text    : '複合',
						icon    : 'dashicons-art',
						menu: {
							'st_button_clipmemo_orangememo' : {
								text    : '自由なメモ',
								icon    : false,
								tooltip : '自由なメモ',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom:-5px;">[st-minihukidashi webicon="" fontsize="80" fontweight="" bgcolor="#FFC107" color="#fff" margin="0 0 0 -6px"]自由なメモ[/st-minihukidashi]</div>[st-cmemo webicon="st-svg-file-text-o" iconcolor="#FFC107" bgcolor="#FFFDE7" color="#000000" iconsize="200"]', '[/st-cmemo]')
							},
							'st_button_clipmemo_kokopoint' : {
								text    : 'ココがポイント',
								icon    : false,
								tooltip : 'ココがポイント',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom:-5px;">[st-minihukidashi webicon="" fontsize="80" fontweight="" bgcolor="#3F51B5" color="#fff" margin="0 0 0 -6px"]ココがポイント[/st-minihukidashi]</div>[st-cmemo webicon="st-svg-hand-o-right" iconcolor="#3F51B5" bgcolor="#E8EAF6" color="#000000" iconsize="200"]', '[/st-cmemo]')
							},
							'st_button_clipmemo_kokoosusume' : {
								text    : 'ココがおすすめ',
								icon    : false,
								tooltip : 'ココがおすすめ',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom:-5px;">[st-minihukidashi webicon="" fontsize="80" fontweight="" bgcolor="#3F51B5" color="#fff" margin="0 0 0 -6px"]ココがおすすめ[/st-minihukidashi]</div>[st-cmemo webicon="st-svg-thumbs-o-up" iconcolor="#3F51B5" bgcolor="#E8EAF6" color="#000000" iconsize="200"]', '[/st-cmemo]')
							},
							'st_button_clipmemo_kokodame' : {
								text    : 'ココがダメ',
								icon    : false,
								tooltip : 'ココがダメ',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom:-5px;">[st-minihukidashi webicon="" fontsize="80" fontweight="" bgcolor="#3F51B5" color="#fff" margin="0 0 0 -6px"]ココがダメ[/st-minihukidashi]</div>[st-cmemo webicon="st-svg-thumbs-o-down" iconcolor="#3F51B5" bgcolor="#E8EAF6" color="#000000" iconsize="200"]', '[/st-cmemo]')
							},
							'st_button_clipmemo_kokochumoku' : {
								text    : 'ココに注意',
								icon    : false,
								tooltip : 'ココに注意',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom:-5px;">[st-minihukidashi webicon="" fontsize="80" fontweight="" bgcolor="#ef5350" color="#fff" margin="0 0 0 -6px"]ココに注意[/st-minihukidashi]</div>[st-cmemo webicon="st-svg-exclamation-circle" iconcolor="#ef5350" bgcolor="#ffebee" color="#000000" iconsize="200"]', '[/st-cmemo]')
							},
							'st_button_clipmemo_saranikuwasiku' : {
								text    : 'もっと詳しく',
								icon    : false,
								tooltip : 'もっと詳しく',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom:-5px;">[st-minihukidashi webicon="" fontsize="80" fontweight="" bgcolor="#66BB6A" color="#fff" margin="0 0 0 -8px"]さらに詳しく[/st-minihukidashi]</div>[st-cmemo webicon="st-svg-search" iconcolor="#66BB6A" bgcolor="#E8F5E9" color="#000000" iconsize="200"]', '[/st-cmemo]')
							},
							'st_button_clipmemo_comment_woman' : {
								text    : '女性コメント',
								icon    : false,
								tooltip : '女性コメント',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom:-5px;">[st-minihukidashi webicon="" fontsize="80" fontweight="" bgcolor="#F06292" color="#fff" margin="0 0 0 -9px"]◯才女性[/st-minihukidashi]</div>[st-cmemo webicon="st-svg-user" iconcolor="#F06292" bgcolor="#FCE4EC" color="#000000" iconsize="200"]', '[/st-cmemo]')
							},
							'st_button_clipmemo_comment_man' : {
								text    : '男性コメント',
								icon    : false,
								tooltip : '男性コメント',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom:-5px;">[st-minihukidashi webicon="" fontsize="80" fontweight="" bgcolor="#42A5F5" color="#fff" margin="0 0 0 -9px"]◯才男性[/st-minihukidashi]</div>[st-cmemo webicon="st-svg-user" iconcolor="#42A5F5" bgcolor="#E3F2FD" color="#000000" iconsize="200"]', '[/st-cmemo]')
							},
						},
					},
					'st_button_mybox_composite'     : {
						text    : '複合（アイコンなし）',
						icon    : 'dashicons-art',
						menu: {
							'st_button_mybox_orangememo' : {
								text    : '自由なメモ',
								icon    : false,
								tooltip : '自由なメモ',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom: -20px;">[st-minihukidashi webicon="st-svg-file-text-o" fontsize="90" fontweight="bold" bgcolor="#FFC107" color="#fff" margin="0 0 0 0"]自由なメモ[/st-minihukidashi]</div>[st-mybox title="" webicon="" color="#757575" bordercolor="" bgcolor="#FFFDE7" borderwidth="0" borderradius="5" titleweight="bold" fontsize=""]', '[/st-mybox]')
							},
							'st_button_mybox_kokopoint' : {
								text    : 'ココがポイント',
								icon    : false,
								tooltip : 'ココがポイント',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom: -20px;">[st-minihukidashi webicon="st-svg-hand-o-right" fontsize="90" fontweight="bold" bgcolor="#3F51B5" color="#fff" margin="0 0 0 0"]ココがポイント[/st-minihukidashi]</div>[st-mybox title="" webicon="" color="#757575" bordercolor="" bgcolor="#E8EAF6" borderwidth="0" borderradius="5" titleweight="bold" fontsize=""]', '[/st-mybox]')
							},
							'st_button_mybox_kokoosusume' : {
								text    : 'ココがおすすめ',
								icon    : false,
								tooltip : 'ココがおすすめ',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom: -20px;">[st-minihukidashi webicon="st-svg-circle-o" fontsize="90" fontweight="bold" bgcolor="#3F51B5" color="#fff" margin="0 0 0 0"]ココがおすすめ[/st-minihukidashi]</div>[st-mybox title="" webicon="" color="#757575" bordercolor="" bgcolor="#E8EAF6" borderwidth="0" borderradius="5" titleweight="bold" fontsize=""]', '[/st-mybox]')
							},
							'st_button_mybox_kokodame' : {
								text    : 'ココがダメ',
								icon    : false,
								tooltip : 'ココがダメ',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom: -20px;">[st-minihukidashi webicon="st-svg-times" fontsize="90" fontweight="bold" bgcolor="#3F51B5" color="#fff" margin="0 0 0 0"]ココがダメ[/st-minihukidashi]</div>[st-mybox title="" webicon="" color="#757575" bordercolor="" bgcolor="#E8EAF6" borderwidth="0" borderradius="5" titleweight="bold" fontsize=""]', '[/st-mybox]')
							},
							'st_button_mybox_kokochumoku' : {
								text    : 'ココに注意',
								icon    : false,
								tooltip : 'ココに注意',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom: -20px;">[st-minihukidashi webicon="st-svg-exclamation-circle" fontsize="90" fontweight="bold" bgcolor="#ef5350" color="#fff" margin="0 0 0 0"]ココに注意[/st-minihukidashi]</div>[st-mybox title="" webicon="" color="#757575" bordercolor="" bgcolor="#ffebee" borderwidth="0" borderradius="5" titleweight="bold" fontsize=""]', '[/st-mybox]')
							},
							'st_button__mybox_saranikuwasiku' : {
								text    : 'もっと詳しく',
								icon    : false,
								tooltip : 'もっと詳しく',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom: -20px;">[st-minihukidashi webicon="st-svg-search" fontsize="90" fontweight="bold" bgcolor="#66BB6A" color="#fff" margin="0 0 0 0"]もっと詳しく[/st-minihukidashi]</div>[st-mybox title="" webicon="" color="#757575" bordercolor="" bgcolor="#E8F5E9" borderwidth="0" borderradius="5" titleweight="bold" fontsize=""]', '[/st-mybox]')
							},
							'st_button_mybox_question' : {
								text    : 'はてなマーク',
								icon    : false,
								tooltip : 'はてなマーク',
								callback: wrapAsHtml('<div class="st-editor-margin" style="margin-bottom: -20px;">[st-minihukidashi webicon="st-svg-question-circle" fontsize="90" fontweight="bold" bgcolor="#03A9F4" color="#fff" margin="0 0 0 0"]つまづきポイント[/st-minihukidashi]</div>[st-mybox title="" webicon="" color="#757575" bordercolor="" bgcolor="#E1F5FE" borderwidth="0" borderradius="5" titleweight="bold" fontsize=""]', '[/st-mybox]')
							},
						},
					},
					'st_button_marumozi': {
						text    : 'まるもじ（小）',
						icon    : 'st-svg-circle',
						menu: {
							'st_button_marumozi_default': {
								text    : '基本',
								icon    : false,
								callback: wrapAsText('[st-marumozi webicon="" bgcolor="#f3f3f3" bordercolor="" color="#000000" radius="30" margin="0 10px 0 0" myclass=""]', '[/st-marumozi]')
							},
							'st_button_marumozi_orange': {
								text    : 'オレンジ',
								icon    : false,
								callback: wrapAsText('[st-marumozi webicon="" bgcolor="#FFB74D" bordercolor="" color="#fff" radius="30" margin="0 10px 0 0" myclass=""]', '[/st-marumozi]')
							},
							'st_button_marumozi_pink': {
								text    : 'ピンク',
								icon    : false,
								callback: wrapAsText('[st-marumozi webicon="" bgcolor="#F48FB1" bordercolor="" color="#fff" radius="30" margin="0 10px 0 0" myclass=""]', '[/st-marumozi]')
							},
							'st_button_marumozi_blue': {
								text    : 'ブルー',
								icon    : false,
								callback: wrapAsText('[st-marumozi webicon="" bgcolor="#4FC3F7" bordercolor="" color="#fff" radius="30" margin="0 10px 0 0" myclass=""]', '[/st-marumozi]')
							},
							'st_button_marumozi_exclamation': {
								text    : 'うすい注意',
								icon    : false,
								callback: wrapAsText('[st-marumozi webicon="st-svg-exclamation-circle" bgcolor="#ffebee" bordercolor="" color="#ef5350" radius="30" margin="0 10px 0 0" myclass=""]', '[/st-marumozi]')
							},
							'st_button_marumozi_exclamation_b': {
								text    : '注意',
								icon    : false,
								callback: wrapAsText('[st-marumozi webicon="st-svg-exclamation-circle" bgcolor="#ef5350" bordercolor="" color="#fff" radius="30" margin="0 10px 0 0" myclass=""]', '[/st-marumozi]')
							},
							'st_button_marumozi_guide': {
								text    : '[?] ガイド※使用不可',
								icon    : false,
								callback: wrapAsText('[st-marumozi webicon="Webアイコン" bgcolor="背景色" bordercolor="ボーダー色" color="文字色" radius="角丸（px）" margin="余白（上 右 下 左）" myclass="CSSクラス"]ここにテキスト', '[/st-marumozi]')
							},
						},
					},
					'st_button_marumozi_big': {
						text    : 'まるもじ（大）',
						icon    : 'st-svg-circle',
						menu: {
							'st_button_marumozi_big_default': {
								text    : '基本',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="" bgcolor="#f3f3f3" bordercolor="" color="#000000" radius="30" margin="0 10px 10px 0" myclass=""]', '[/st-marumozi-big]')
							},
							'st_button_marumozi_big_orange': {
								text    : 'オレンジ',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="" bgcolor="#FFB74D" bordercolor="" color="#fff" radius="30" margin="0 10px 10px 0" myclass=""]', '[/st-marumozi-big]')
							},
							'st_button_marumozi_big_pink': {
								text    : 'ピンク',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="" bgcolor="#F48FB1" bordercolor="" color="#fff" radius="30" margin="0 10px 10px 0" myclass=""]', '[/st-marumozi-big]')
							},
							'st_button_marumozi_big_blue': {
								text    : 'ブルー',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="" bgcolor="#4FC3F7" bordercolor="" color="#fff" radius="30" margin="0 10px 10px 0" myclass=""]', '[/st-marumozi-big]')
							},
							'st_button_marumozi_big_question': {
								text    : 'はてな',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="st-svg-question-circle" bgcolor="#4FC3F7" bordercolor="" color="#fff" radius="30" margin="0 10px 10px 0" myclass=""]', '[/st-marumozi-big]')
							},
							'st_button_marumozi_big_check': {
								text    : 'チェック',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="st-svg-check-circle" bgcolor="#FFB74D" bordercolor="" color="#fff" radius="30" margin="0 10px 10px 0" myclass=""]', '[/st-marumozi-big]')
							},
							'st_button_marumozi_big_exclamation': {
								text    : 'うすい注意',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="st-svg-exclamation-circle" bgcolor="#ffebee" bordercolor="" color="#ef5350" radius="30" margin="0 10px 10px 0" myclass=""]', '[/st-marumozi-big]')
							},
							'st_button_marumozi_big_exclamation_b': {
								text    : '注意',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="st-svg-exclamation-circle" bgcolor="#ef5350" bordercolor="" color="#fff" radius="30" margin="0 10px 10px 0" myclass=""]', '[/st-marumozi-big]')
							},
							'st_button_marumozi_big_guide': {
								text    : '[?] ガイド※使用不可',
								icon    : false,
								callback: wrapAsText('[st-marumozi-big webicon="Webアイコン" bgcolor="背景色" bordercolor="ボーダー色" color="文字色" radius="角丸（px）" margin="余白（上 右 下 左）" myclass="CSSクラス"]ここにテキスト', '[/st-marumozi-big]')
							},
						},
					},
					'st_design_html5'   : {
						text    : 'HTML（カスタム）',
						icon   : 'st-svg-code',
						menu: {
							'st_button_ruby': {
								text    : 'ルビ（ふりがな）',
								icon    : false,
								tooltip : 'ルビ',
								callback: wrapAsText('<ruby>', '<rt>ふりがな</rt></ruby>'),
								enabled: ST.Version.is_ex_af()
							},
							'st_button_p': {
								text    : 'Pタグ',
								icon    : false,
								tooltip : 'P',
								callback: wrapAsText('[st-p add_style=""]', '[/st-p]')
							},
							'st_button_span': {
								text    : 'spanタグ',
								icon    : false,
								tooltip : 'span',
								callback: wrapAsText('[st-span add_style=""]', '[/st-span]')
							},
						},
					},
					'st_design_font'   : {
						text    : 'カスタムフォント',
						icon   : 'st-svg-percent',
						menu: {
							'st_design_font_default'   : {
								text    : 'デフォルト',
								icon    : false,
								callback: wrapAsText('[st-designfont myclass="" webicon="" fontsize="150" fontweight="bold" color="#000" textshadow="" webfont="" margin="0 0 20px 0"]', '[/st-designfont]')
							},
							'st_design_font_sirokage'   : {
								text    : '白影',
								icon    : false,
								callback: wrapAsText('[st-designfont myclass="" webicon="" fontsize="150" fontweight="bold" color="#fff" textshadow="#424242" webfont="on" margin="0 0 20px 0"]', '[/st-designfont]')
							},
						},
					},
					'st_button_step'   : {
						text    : 'ステップ',
						icon   : 'st-svg-list-ol',
						callback: wrapAsText('[st-step step_no="1"]', '[/st-step]')
					},
					'st_button_point'   : {
						text    : 'ポイント',
						icon   : 'st-svg-product-hunt',
						callback: wrapAsText('[st-point fontsize="" fontweight="bold" bordercolor=""]', '[/st-point]')
					},
					'st_button_label_c': {
						text    : 'ラベル',
						icon   : 'st-svg-pencil-square',
						callback: wrapAsHtml('[st-label label="おすすめ" bgcolor="#FBC02D" color="#FFFFFF"]<p>', '</p>[/st-label]')
					},
					'st_button_marquee': {
						text    : '流れる文字（marquee風）',
						icon   : 'st-svg-newspaper-o',
						callback: wrapAsHtml('<div class="st-marquee"><p>', '</p></div>')
					},
				},
			},
			'st_button_boxdesign'        : {
				text    : 'ボックスデザイン',
				icon    : 'st-svg-inbox',
				menu: {
					'st_button_flex': {
						text    : 'バナー風ボックス',
						icon    : false,
						menu: {
								'st_button_flex_default' : {
									text    : '基本',
									icon    : false,
									tooltip : '基本',
									callback: wrapAsHtml('[st-flexbox url="" rel="nofollow" target="" webicon="" title="タイトル" width="" height="" color="#fff" fontsize="200" radius="0" shadow="#424242" bordercolor="#ccc" borderwidth="1" bgcolor="#ccc" backgroud_image="" blur="on" left="" margin_bottom="0" myclass=""]<p>', '</p>[/st-flexbox]')
								},
								'st_button_flex_no_bgcolor' : {
									text    : '背景なし（高さ400px）',
									icon    : false,
									tooltip : '背景なし（高さ400px）',
									callback: wrapAsHtml('[st-flexbox url="" rel="nofollow" target="" webicon="" title="タイトル" width="" height="400" color="#fff" fontsize="200" radius="0" shadow="#424242" bordercolor="" borderwidth="0" bgcolor="" backgroud_image="" blur="" left="" margin_bottom="0" myclass=""]<p>', '</p>[/st-flexbox]')
								},
								'st_button_flex_left' : {
									text    : '左寄せ',
									icon    : false,
									tooltip : '左寄せ',
									callback: wrapAsHtml('[st-flexbox url="" rel="nofollow" target="" webicon="" title="タイトル" width="" height="" color="#fff" fontsize="120" radius="0" shadow="#424242" bordercolor="#ccc" borderwidth="1" bgcolor="#29B6F6" backgroud_image="" blur="" left="on" margin_bottom="0" myclass=""]<p>', '</p>[/st-flexbox]')
								},
								'st_button_flex_guide' : {
									text    : '[?] ガイド※使用不可',
									icon    : false,
									tooltip : '[?] ガイド※使用不可',
									callback: wrapAsHtml('[st-flexbox url="リンク先URL" rel="nofollow" target="リンクを新しく開く（target）" webicon="Webアイコン" title="タイトル" width="幅（%）" height="高さ（px）" color="文字色" fontsize="文字サイズ（%）" radius="角丸（px）" shadow="タイトルの影色" bordercolor="枠線カラー" borderwidth="枠線の太さ（px）" bgcolor="背景色" backgroud_image="背景画像のURL" blur="背景画像のぼかし" left="左寄せ（on）" margin_bottom="下の余白（px）" myclass="任意のクラス名"]<p>ここに自由なテキスト', '</p>[/st-flexbox]')
								},
							},
					},
					'st_button_mybox'        : {
						text    : 'マイボックス',
						icon    : false,
						menu: {
							'st_button_mybox_default' : {
								text    : '基本',
								icon    : false,
								tooltip : '基本',
								callback: wrapAsHtml('[st-mybox title="ポイント" webicon="st-svg-check-circle" color="#757575" bordercolor="#BDBDBD" bgcolor="#ffffff" borderwidth="2" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_square' : {
								text    : 'しかく（枠のみ）',
								icon    : false,
								tooltip : 'しかく（枠のみ）',
								callback: wrapAsHtml('[st-mybox title="" webicon="" color="#757575" bordercolor="#ccc" bgcolor="#ffffff" borderwidth="2" borderradius="2" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_circle' : {
								text    : 'まるみ',
								icon    : false,
								tooltip : 'まるみ',
								callback: wrapAsHtml('[st-mybox title="" webicon="" color="#757575" bordercolor="#BDBDBD" bgcolor="#f3f3f3" borderwidth="0" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_sankou' : {
								text    : '参考',
								icon    : false,
								tooltip : '参考',
								callback: wrapAsHtml('[st-mybox title="参考" webicon="st-svg-file-text-o" color="#757575" bordercolor="" bgcolor="#fafafa" borderwidth="0" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_kanren' : {
								text    : '関連',
								icon    : false,
								tooltip : '関連',
								callback: wrapAsHtml('[st-mybox title="関連" webicon="st-svg-file-text-o" color="#757575" bordercolor="" bgcolor="#fafafa" borderwidth="0" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_memo' : {
								text    : 'メモ',
								icon    : false,
								tooltip : 'メモ',
								callback: wrapAsHtml('[st-mybox title="メモ" webicon="st-svg-file-text-o" color="#757575" bordercolor="" bgcolor="#fafafa" borderwidth="0" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_point' : {
								text    : 'ポイント',
								icon    : false,
								tooltip : 'ポイント',
								callback: wrapAsHtml('[st-mybox title="ポイント" webicon="st-svg-check-circle" color="#FFD54F" bordercolor="#FFD54F" bgcolor="#FFFDE7" borderwidth="2" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_exclamation_point' : {
								text    : '注意ポイント',
								icon    : false,
								tooltip : '注意ポイント',
								callback: wrapAsHtml('[st-mybox title="注意ポイント" webicon="st-svg-exclamation-circle" color="#ef5350" bordercolor="#ef9a9a" bgcolor="#ffebee" borderwidth="2" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_exclamation_question' : {
								text    : 'はてな',
								icon    : false,
								tooltip : 'はてな',
								callback: wrapAsHtml('[st-mybox title="はてな" webicon="st-svg-question-circle" color="#03A9F4" bordercolor="#B3E5FC" bgcolor="#E1F5FE" borderwidth="2" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_minihukidashi' : {
								text    : '+ ミニふきだし',
								icon    : false,
								tooltip : '+ ミニふきだし',
								callback: wrapAsHtml('[st-div class="" margin="0 0 15px 0" padding="0 0 0 0" add_style=""][st-minihukidashi webicon="e" fontsize="" fontweight="bold" bgcolor="#f3f3f3" color="" margin="0" radius="5" position="" add_boxstyle=""]ふきだしテキスト[/st-minihukidashi][/st-div][st-mybox title="" webicon="" color="" bordercolor="#f3f3f3" bgcolor="" borderwidth="5" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="0 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_sc' : {
								text    : 'ShortCode',
								icon    : false,
								tooltip : '内包するショートコードを展開しない',
								callback: wrapAsHtml('[st-scbox title="" webicon="" color="#000" bordercolor="" bgcolor="#fafafa" borderwidth="" borderradius="0" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-scbox]'),
								enabled: ST.Version.is_ex_af()
							},
							'st_button_mybox_guide' : {
								text    : '[?] ガイド※使用不可',
								icon    : false,
								tooltip : '[?] ガイド※使用不可',
								callback: wrapAsHtml('[st-mybox title="見出し" webicon="Webアイコン" color="見出し色" bordercolor="枠線カラー" bgcolor="背景色" borderwidth="枠線の太さ（px）" borderradius="角丸（px）" titleweight="見出しの太さ（bold）" fontsize="見出しのフォントサイズ" myclass="オリジナルクラス" margin="マージン"]<p>ここにテキスト', '</p>[/st-mybox]')
							},
						},
					},
					'st_button_mybox_intitle'     : {
						text    : 'マイボックス（+CSSクラス）',
						icon    : false,
						menu: {
							'st_button_mybox_intitle_default' : {
								text    : 'メモ',
								icon    : false,
								tooltip : 'メモ',
								callback: wrapAsHtml('[st-mybox title="メモ" webicon="st-svg-file-text-o" color="#727272" bordercolor="#ff0000" bgcolor="#FAFAFA" borderwidth="0" borderradius="5" titleweight="bold" title_bordercolor="" fontsize="" myclass="st-mybox-class st-title-under" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_intitle_memo_titleborder' : {
								text    : 'メモ（下線のみ）',
								icon    : false,
								tooltip : 'メモ（下線のみ）',
								callback: wrapAsHtml('[st-mybox title="メモ" webicon="st-svg-file-text-o" color="#727272" bordercolor="#ff0000" bgcolor="#FAFAFA" borderwidth="0" borderradius="5" titleweight="bold" title_bordercolor="#757575" fontsize="" myclass="st-mybox-class st-title-under" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_intitle_memo_border' : {
								text    : 'メモ（枠のみ）',
								icon    : false,
								tooltip : 'メモ（枠のみ）',
								callback: wrapAsHtml('[st-mybox title="メモ" webicon="st-svg-file-text-o" color="#727272" bordercolor="#f3f3f3" bgcolor="" borderwidth="3" borderradius="5" titleweight="bold" title_bordercolor="" fontsize="" myclass="st-mybox-class st-title-under" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_intitle_memo_titleborder_border' : {
								text    : 'メモ（枠・下線あり）',
								icon    : false,
								tooltip : 'メモ（枠・下線あり）',
								callback: wrapAsHtml('[st-mybox title="メモ" webicon="st-svg-file-text-o" color="#727272" bordercolor="#f3f3f3" bgcolor="" borderwidth="3" borderradius="5" titleweight="bold" title_bordercolor="#757575" fontsize="" myclass="st-mybox-class st-title-under" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_intitle_attention_titleborder' : {
								text    : '注意（下線のみ）',
								icon    : false,
								tooltip : '注意（下線のみ）',
								callback: wrapAsHtml('[st-mybox title="ここに注意" webicon="st-svg-exclamation-circle" color="#ef5350" bordercolor="#f3f3f3" bgcolor="#ffebee" borderwidth="" borderradius="5" titleweight="bold" title_bordercolor="#ef5350" fontsize="" myclass="st-mybox-class st-title-under" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
							},
							'st_button_mybox_intitle_item' : {
								text    : '必要なモノ',
								icon    : false,
								tooltip : '必要なモノ',
								callback: setAsHtml('[st-mybox title="必要なモノ" webicon="st-svg-file-text-o" color="#757575" bordercolor="#f3f3f3" bgcolor="" borderwidth="3" borderradius="5" titleweight="bold" title_bordercolor="#757575" fontsize="" myclass="st-mybox-class st-title-under st-list-circle" margin="25px 0 25px 0"]<ul><li>ダミーテキスト</li><li>ダミーテキスト</li><li>ダミーテキスト</li></ul>[/st-mybox]')
							},
							'st_button_mybox_intitle_item_dot' : {
								text    : '必要なモノ（ドット下線）',
								icon    : false,
								tooltip : '必要なモノ（ドット下線）',
								callback: setAsHtml('[st-mybox title="必要なモノ" webicon="st-svg-file-text-o" color="#757575" bordercolor="#f3f3f3" bgcolor="" borderwidth="3" borderradius="5" titleweight="bold" title_bordercolor="#757575" fontsize="" myclass="st-mybox-class st-title-under st-list-border st-list-circle" margin="25px 0 25px 0"]<ul><li>ダミーテキスト</li><li>ダミーテキスト</li><li>ダミーテキスト</li></ul>[/st-mybox]')
							},
							'st_button_mybox_intitle_check' : {
								text    : 'チェックリスト',
								icon    : false,
								tooltip : 'チェックリスト',
								callback: setAsHtml('[st-mybox title="チェックリスト" webicon="st-svg-file-text-o" color="#757575" bordercolor="#f3f3f3" bgcolor="" borderwidth="3" borderradius="5" titleweight="bold" title_bordercolor="#757575" fontsize="" myclass="st-mybox-class st-title-under st-list-check" margin="25px 0 25px 0"]<ul><li>ダミーテキスト</li><li>ダミーテキスト</li><li>ダミーテキスト</li></ul>[/st-mybox]')
							},
							'st_button_mybox_intitle_check_dot' : {
								text    : 'チェックリスト（ドット下線）',
								icon    : false,
								tooltip : 'チェックリスト（ドット下線）',
								callback: setAsHtml('[st-mybox title="チェックリスト" webicon="st-svg-file-text-o" color="#757575" bordercolor="#f3f3f3" bgcolor="" borderwidth="3" borderradius="5" titleweight="bold" title_bordercolor="#757575" fontsize="" myclass="st-mybox-class st-title-under st-list-border st-list-check" margin="25px 0 25px 0"]<ul><li>ダミーテキスト</li><li>ダミーテキスト</li><li>ダミーテキスト</li></ul>[/st-mybox]')
							},
							'st_button_mybox_intitle_flow' : {
								text    : '簡単な流れ',
								icon    : false,
								tooltip : '簡単な流れ',
								callback: setAsHtml('[st-mybox title="簡単な流れ" webicon="st-svg-list-ol" color="#757575" bordercolor="#f3f3f3" bgcolor="" borderwidth="3" borderradius="5" titleweight="bold" title_bordercolor="#757575" fontsize="" myclass="st-mybox-class st-title-under st-list-no" margin="25px 0 25px 0"]<ul><li>ダミーテキスト</li><li>ダミーテキスト</li><li>ダミーテキスト</li></ul>[/st-mybox]')
							},
							'st_button_mybox_intitle_flow_dot' : {
								text    : '簡単な流れ（ドット下線）',
								icon    : false,
								tooltip : '簡単な流れ（ドット下線）',
								callback: setAsHtml('[st-mybox title="簡単な流れ" webicon="st-svg-list-ol" color="#757575" bordercolor="#f3f3f3" bgcolor="" borderwidth="3" borderradius="5" titleweight="bold" title_bordercolor="#757575" fontsize="" myclass="st-mybox-class st-title-under st-list-no st-list-border" margin="25px 0 25px 0"]<ul><li>ダミーテキスト</li><li>ダミーテキスト</li><li>ダミーテキスト</li></ul>[/st-mybox]')
							},
						},
					},
					'st_button_freebox_group'      : {
						text    : 'タイトル付きフリーボックス',
						icon    : false,
						menu	: {
							'st_button_freebox_base'      : {
								text    : '基本',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox title="見出し（全角15文字）" webicon="" bordercolor="" color="" bgcolor="" borderwidth="" borderradius="" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox]')
							},
							'st_button_freebox_attention'      : {
								text    : '注意',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox title="注意" webicon="st-svg-exclamation-circle faa-flash animated" bordercolor="#f44336" color="" bgcolor="#ffebee" borderwidth="" borderradius="5" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox]')
							},
							'st_button_freebox_question'      : {
								text    : 'はてな',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox title="はてな" webicon="st-svg-question-circle faa-ring animated" bordercolor="#03A9F4" color="#fff" bgcolor="#E1F5FE" borderwidth="" borderradius="5" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox]')
							},
							'st_button_freebox_point'      : {
								text    : 'ポイント',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox title="ポイント" webicon="st-svg-check-circle faa-ring animated" bordercolor="#FFC107" color="" bgcolor="#FFFDE7" borderwidth="" borderradius="5" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox]')
							},
							'st_button_freebox_memo'      : {
								text    : 'メモ',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox title="メモ" webicon="st-svg-file-text-o faa-float animated" bordercolor="#757575" color="" bgcolor="#FAFAFA" borderwidth="" borderradius="5" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox]')
							},
							'st_button_freebox_base_intitle'      : {
								text    : '基本（タイトル幅100%）',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox-intitle title="見出し（全角15文字）" webicon="" bordercolor="" color="" bgcolor="" borderwidth="" borderradius="" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox-intitle]')
							},
							'st_button_freebox_attention_intitle'      : {
								text    : '注意（タイトル幅100%）',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox-intitle title="注意" webicon="st-svg-exclamation-circle faa-flash animated" bordercolor="#f44336" color="" bgcolor="#ffebee" borderwidth="" borderradius="5" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox-intitle]')
							},
							'st_button_freebox_question_intitle'      : {
								text    : 'はてな（タイトル幅100%）',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox-intitle title="はてな" webicon="st-svg-question-circle faa-ring animated" bordercolor="#03A9F4" color="#fff" bgcolor="#E1F5FE" borderwidth="" borderradius="5" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox-intitle]')
							},
							'st_button_freebox_point_intitle'      : {
								text    : 'ポイント（タイトル幅100%）',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox-intitle title="ポイント" webicon="st-svg-check-circle faa-ring animated" bordercolor="#FFC107" color="" bgcolor="#FFFDE7" borderwidth="" borderradius="5" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox-intitle]')
							},
							'st_button_freebox_memo_intitle'      : {
								text    : 'メモ（タイトル幅100%）',
								icon    : false,
								callback: wrapAsHtml('[st-midasibox-intitle title="メモ" webicon="st-svg-file-text-o faa-float animated" bordercolor="#757575" color="" bgcolor="#FAFAFA" borderwidth="" borderradius="5" titleweight="bold" myclass=""]<p>', '</p>[/st-midasibox-intitle]')
							},
						},
					},
					'st_button_memobox'     : {
						text    : 'メモボックス',
						icon    : false,
						callback: wrapAsHtml('<div class="st-memobox2"><p class="st-memobox-title">メモ</p><p>', '</p></div><br>')
					},
					'st_button_slidebox'     : {
						text    : 'スライドボックス',
						icon    : false,
						callback: wrapAsHtml('[st-slidebox webicon="" text="+ クリックして下さい" myclass="" bgcolor="" color="#1a1a1a" margin_bottom="20"]<p>','</p>[/st-slidebox]')
					},
					'st_button_square_checkbox'   : {
						text    : 'チェックボックス（番号なしリスト）',
						icon    : false,
						callback: wrapAsHtml('[st-square-checkbox bgcolor="" bordercolor="" fontweight="" borderwidth="3"]<div>', '</div>[/st-square-checkbox]')
					},
					'st_button_blackboard'   : {
						text    : 'こんな方におすすめ (v)',
						icon    : false,
						callback: setAsHtml('<div class="st-blackboard"><p class="st-blackboard-title-box"><span class="st-blackboard-title">こんな方におすすめ</span></p><ul class="st-blackboard-list st-no-ck-off"><li>これはダミーのテキストです</li><li>これはダミーのテキストです</li></ul></div><br>')
					},
					'st_button_blackboard_checkbox'   : {
						text    : 'こんな方におすすめ [v]',
						icon    : false,
						callback: setAsHtml('<div class="st-blackboard square-checkbox"><p class="st-blackboard-title-box"><span class="st-blackboard-title">こんな方におすすめ</span></p><ul class="st-blackboard-list st-no-ck-off"><li>これはダミーのテキストです</li><li>これはダミーのテキストです</li></ul></div><br>')
					},
					'st_button_guidemap'   : {
						text    : 'ガイドマップメニュー',
						icon    : false,
						callback: setAsHtml('<div class="st-link-guide st-link-guide-post"><ul class="st-link-guide-menu"><li><a href="#">ダミーリンク</a></li><li><a href="#">ダミーリンク</a></li><li><a href="#">ダミーリンク</a></li></div><br>')
					},
					'st_pre'   : {
						text    : 'pre',
						icon    : false,
						callback: wrapAsHtml('[st-pre myclass="" text="html" webicon=""]<p>', '</p>[/st-pre]')
					},
					'st_pre_terminal'   : {
						text    : 'pre: terminal',
						icon    : false,
						callback: wrapAsHtml('[st-pre myclass="st-terminal" text="command" webicon="st-svg-terminal"]<p>', '</p>[/st-pre]')
					},
					'st_pre_shortcode'   : {
						text    : 'pre: shortcode',
						icon    : false,
						callback: wrapAsHtml('[st-pre-sc myclass="" text="shortcode" webicon=""]<p>', '</p>[/st-pre-sc]'),
						enabled: ST.Version.is_ex_af()
					},
				},
			},
			'st_button_originalbutton_group_c': {
				text    : 'カスタムボタン',
				icon   : 'st-svg-toggle-on',
				menu: {
				'st_button_originalbutton_c': {
					text    : 'ノーマル',
					icon    : false,
					menu: {
							'st_button_originalbutton_default': {
								text    : '基本',
								icon    : false,
								callback: setAsText('[st-mybutton class="" url="#" title="ボタン" rel="" webicon="" target="" color="#000000" bgcolor="#FFF" bgcolor_top="" bordercolor="#CCC" borderwidth="3" borderradius="0" fontsize="" fontweight="" width="100" webicon_after=""" shadow="" ref="" beacon=""]')
							},
							'st_button_originalbutton_kuwasiku': {
								text    : '詳しくはコチラ（オレンジ）',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="詳しくはコチラ" rel="" webicon="" target="" color="#fff" bgcolor="#FFD54F" bgcolor_top="#ffdb69" bordercolor="#FFEB3B" borderwidth="1" borderradius="5" fontsize="" fontweight="bold" width="" webicon_after="st-svg-angle-right" shadow="#FFB300" ref="on" beacon=""]')
							},
							'st_button_originalbutton_kuwasiku_red': {
								text    : '詳しくはコチラ（レッド）',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="詳しくはコチラ" rel="" webicon="" target="_blank" color="#fff" bgcolor="#e53935" bgcolor_top="#f44336" bordercolor="#e57373" borderwidth="1" borderradius="5" fontsize="" fontweight="bold" width="" webicon_after="st-svg-angle-right" shadow="#c62828" ref="on" beacon=""]')
							},
							'st_button_originalbutton_kuwasiku_green': {
								text    : '詳しくはコチラ（グリーン）',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="詳しくはコチラ" rel="" webicon="" target="_blank" color="#fff" bgcolor="#43A047" bgcolor_top="#66BB6A" bordercolor="#81C784" borderwidth="1" borderradius="5" fontsize="" fontweight="bold" width="" webicon_after="st-svg-angle-right" shadow="#388E3C" ref="on" beacon=""]')
							},
							'st_button_originalbutton_kuwasiku_blue': {
								text    : '詳しくはコチラ（ブルー）',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="詳しくはコチラ" rel="" webicon="" target="_blank" color="#fff" bgcolor="#039BE5" bgcolor_top="#29B6F6" bordercolor="#4FC3F7" borderwidth="1" borderradius="5" fontsize="" fontweight="bold" width="" webicon_after="st-svg-angle-right" shadow="#039BE5" ref="on" beacon=""]')
							},
							'st_button_originalbutton_contact': {
								text    : 'お問合せ',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="お問合せ" rel="" webicon="st-svg-envelope" target="" color="#fff" bgcolor="#03A9F4" bgcolor_top="#14b4fc" bordercolor="#039BE5" borderwidth="1" borderradius="5" fontsize="" fontweight="" width="90" webicon_after=""" shadow="#039BE5" ref="on" beacon=""]')
							},
							'st_button_originalbutton_orange': {
								text    : 'もっと詳しく（オレンジ）',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="もっと詳しく" rel="" webicon="" target="" color="#fff" bgcolor="#FFD54F" bgcolor_top="#ffdb69" bordercolor="#FFEB3B" borderwidth="1" borderradius="30" fontsize="85" fontweight="" width="90" webicon_after="st-svg-angle-right" shadow="" ref="on" beacon=""]')
							},
							'st_button_originalbutton_pink': {
								text    : 'もっと詳しく（ピンク）',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="もっと詳しく" rel="" webicon="" target="" color="#fff" bgcolor="#F48FB1" bgcolor_top="#f6a6c1" bordercolor="#F48FB1" borderwidth="1" borderradius="30" fontsize="85" fontweight="" width="90" webicon_after="st-svg-angle-right" shadow="" ref="on" beacon=""]')
							},
							'st_button_originalbutton_blue': {
								text    : 'もっと詳しく（ブルー）',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="もっと詳しく" rel="" webicon="" target="" color="#fff" bgcolor="#4FC3F7" bgcolor_top="#67cbf8" bordercolor="#4FC3F7" borderwidth="1" borderradius="30" fontsize="85" fontweight="" width="90" webicon_after="st-svg-angle-right" shadow="" ref="on" beacon=""]')
							},
							'st_button_originalbutton_under': {
								text    : '人気ランキング',
								icon    : false,
								callback: setAsText('[st-mybutton url="#" title="人気ランキング" rel="" webicon="st-svg-oukan" target="" color="#fff" bgcolor="#FBC02D" bgcolor_top="#fbc846" bordercolor="#FBC02D" borderwidth="1" borderradius="5" fontsize="110" fontweight="bold" width="90" webicon_after=""" shadow="" ref="on" beacon=""]'),
								enabled: ST.Version.is_ex_af()
							},
							'st_button_originalbutton_ranking_under': {
								text    : 'ランキングはコチラ',
								icon    : false,
								callback: setAsText('[st-mybutton class="" url="#ranking" title="ランキングはコチラ" rel="" webicon="st-svg-angle-double-down" target="" color="#1a1a1a" bgcolor="#fdef4e" bgcolor_top="" bordercolor="#fceb1c" borderwidth="1" borderradius="" fontsize="95" fontweight="" width="" webicon_after=""" shadow="" ref="" beacon=""]'),
								enabled: ST.Version.is_ex_af()
							},
							'st_button_originalbutton_guide': {
								text    : '[?] ガイド※使用不可',
							icon    : false,
							callback: setAsText('[st-mybutton class="追加クラス" url="リンク先URL" title="ボタンテキスト" rel="nofollow" webicon="Webアイコン（前）" target="リンク先を新しく開く(blank)" color="文字色" bgcolor="背景色（下）" bgcolor_top="背景色（上）" bordercolor="枠線カラー" borderwidth="枠線の太さ（px）" borderradius="角丸（px）" fontsize="文字サイズ（%）" fontweight="文字の太さ（bold）" width="幅（%）" webicon_after="Webアイコン（後）" shadow="ボタンの影色" ref="光る演出（on）" beacon="計測用img"]')
							},
						},
					},
					'st_button_originalbutton_radius_c': {
					text    : '角丸',
					icon    : false,
					menu: {
							'st_button_originalbutton_radius_default': {
								text    : '基本',
								icon    : false,
								callback: setAsText('[st-mybutton class="" url="#" title="角丸ボタン" rel="" webicon="" target="" color="#424242" bgcolor="" bgcolor_top="" bordercolor="#CCC" borderwidth="5" borderradius="30" fontsize="" fontweight="bold" width="" webicon_after="st-svg-chevron-right" shadow="" ref="" beacon=""]')
							},
							'st_button_originalbutton_radius_kuwasiku': {
								text    : '詳しくはコチラ（オレンジ）',
								icon    : false,
								callback: setAsText('[st-mybutton class="" url="#" title="角丸ボタン" rel="" webicon="" target="" color="#FFB74D" bgcolor="" bgcolor_top="" bordercolor="#FFB74D" borderwidth="5" borderradius="30" fontsize="" fontweight="bold" width="" webicon_after="st-svg-chevron-right" shadow="" ref="" beacon=""]')
							},
							'st_button_originalbutton_radius_kuwasiku_red': {
								text    : '詳しくはコチラ（レッド）',
								icon    : false,
								callback: setAsText('[st-mybutton class="" url="#" title="角丸ボタン" rel="" webicon="" target="" color="#ef5350" bgcolor="" bgcolor_top="" bordercolor="#ef5350" borderwidth="5" borderradius="30" fontsize="" fontweight="bold" width="" webicon_after="st-svg-chevron-right" shadow="" ref="" beacon=""]')
							},
							'st_button_originalbutton_radius_kuwasiku_green': {
								text    : '詳しくはコチラ（グリーン）',
								icon    : false,
								callback: setAsText('[st-mybutton class="" url="#" title="角丸ボタン" rel="" webicon="" target="" color="#9CCC65" bgcolor="" bgcolor_top="" bordercolor="#9CCC65" borderwidth="5" borderradius="30" fontsize="" fontweight="bold" width="" webicon_after="st-svg-chevron-right" shadow="" ref="" beacon=""]')
							},
							'st_button_originalbutton_radius_kuwasiku_blue': {
								text    : '詳しくはコチラ（ブルー）',
								icon    : false,
								callback: setAsText('[st-mybutton class="" url="#" title="角丸ボタン" rel="" webicon="" target="" color="#4FC3F7" bgcolor="" bgcolor_top="" bordercolor="#4FC3F7" borderwidth="5" borderradius="30" fontsize="" fontweight="bold" width="" webicon_after="st-svg-chevron-right" shadow="" ref="" beacon=""]')
							},
						},
					},
					'st_button_originalbutton_mini_c': {
					text    : 'ミニ',
					icon    : false,
					menu: {
							'st_button_originalbutton_mini_default': {
								text    : '基本',
								icon    : false,
								callback: setAsText('[st-mybutton-mini url="#" title="ボタン" rel="" webicon="" target="" color="#000000" bgcolor="#f3f3f3" bgcolor_top="" bordercolor="" borderwidth="" borderradius="3" fontsize="" fontweight="" webicon_after=""" shadow="#BDBDBD" ref="" beacon=""]')
							},
							'st_button_originalbutton_mini_kuwasiku': {
								text    : '詳しくはコチラ（オレンジ）',
								icon    : false,
								callback: setAsText('[st-mybutton-mini url="#" title="詳しくはコチラ" rel="" webicon="" target="" color="#fff" bgcolor="#FFB74D" bgcolor_top="" bordercolor="" borderwidth="" borderradius="5" fontsize="" fontweight="" webicon_after="st-svg-angle-right" shadow="#FFB300" ref="" beacon=""]')
							},
							'st_button_originalbutton_mini_kuwasiku_red': {
								text    : '詳しくはコチラ（レッド）',
								icon    : false,
								callback: setAsText('[st-mybutton-mini url="#" title="詳しくはコチラ" rel="" webicon="" target="_blank" color="#fff" bgcolor="#ef5350" bgcolor_top="" bordercolor="" borderwidth="" borderradius="5" fontsize="" fontweight="" webicon_after="st-svg-angle-right" shadow="#f44336" ref="" beacon=""]')
							},
							'st_button_originalbutton_mini_kuwasiku_green': {
								text    : '詳しくはコチラ（グリーン）',
								icon    : false,
								callback: setAsText('[st-mybutton-mini url="#" title="詳しくはコチラ" rel="" webicon="" target="_blank" color="#fff" bgcolor="#9CCC65" bgcolor_top="" bordercolor="" borderwidth="" borderradius="5" fontsize="" fontweight="" webicon_after="st-svg-angle-right" shadow="#8BC34A" ref="" beacon=""]')
							},
							'st_button_originalbutton_mini_kuwasiku_blue': {
								text    : '詳しくはコチラ（ブルー）',
								icon    : false,
								callback: setAsText('[st-mybutton-mini url="#" title="詳しくはコチラ" rel="" webicon="" target="_blank" color="#fff" bgcolor="#4FC3F7" bgcolor_top="" bordercolor="" borderwidth="" borderradius="5" fontsize="" fontweight="" webicon_after="st-svg-angle-right" shadow="#03A9F4" ref="" beacon=""]')
							},
						},
					},
					'st_button_originalbutton_mc_c': {
						text    : 'MCボタン',
						icon    : false,
						menu: {
							'st_button_originalbutton_mc_orange': {
								text: 'オレンジ',
								icon    : false,
								callback: setAsText('[st-mcbutton url="#" title="今すぐ申し込む" rel="" webicon="" target="" color="#fff" bgcolor="#FFD54F" bgcolor_top="#ffdb69" bordercolor="#FFEB3B" borderwidth="1" borderradius="5" fontweight="bold" fontsize="120" width="90" webicon_after="st-svg-chevron-right" shadow="#FFB300" ref="on" mcbox_bg="#fafafa" mcbox_color="" mcbox_title="太字のテキスト" beacon=""]※マイクロコピーを書いてみよう[/st-mcbutton]')
							},
							'st_button_originalbutton_mc_red': {
								text: 'レッド',
								icon    : false,
								callback: setAsText('[st-mcbutton url="#" title="今すぐ申し込む" rel="" webicon="" target="" color="#fff" bgcolor="#e53935" bgcolor_top="#f44336" bordercolor="#e57373" borderwidth="1" borderradius="5" fontweight="bold" fontsize="120" width="90" webicon_after="st-svg-chevron-right" shadow="#c62828" ref="on" mcbox_bg="#fafafa" mcbox_color="" mcbox_title="太字のテキスト" beacon=""]※マイクロコピーを書いてみよう[/st-mcbutton]')
							},
							'st_button_originalbutton_mc_green': {
								text: 'グリーン',
								icon    : false,
								callback: setAsText('[st-mcbutton url="#" title="今すぐ申し込む" rel="" webicon="" target="" color="#fff" bgcolor="#43A047" bgcolor_top="#66BB6A" bordercolor="#81C784" borderwidth="1" borderradius="5" fontweight="bold" fontsize="120" width="90" webicon_after="st-svg-chevron-right" shadow="#388E3C" ref="on" mcbox_bg="#fafafa" mcbox_color="" mcbox_title="太字のテキスト" beacon=""]※マイクロコピーを書いてみよう[/st-mcbutton]')
							},
							'st_button_originalbutton_mc_blue': {
								text: 'ブルー',
								icon    : false,
								callback: setAsText('[st-mcbutton url="#" title="今すぐ申し込む" rel="" webicon="" target="" color="#fff" bgcolor="#039BE5" bgcolor_top="#29B6F6" bordercolor="#4FC3F7" borderwidth="1" borderradius="5" fontweight="bold" fontsize="120" width="90" webicon_after="st-svg-chevron-right" shadow="#039BE5" ref="on" mcbox_bg="#fafafa" mcbox_color="" mcbox_title="太字のテキスト" beacon=""]※マイクロコピーを書いてみよう[/st-mcbutton]')
							},
						},
						enabled: ST.Version.is_ex_af()
					},
					'st_box_btn_c': {
					text    : 'ボックスメニュー',
					icon    : false,
					menu: {
							'st_box_btn': {
								text    : '基本（4列）',
								icon    : false,
								tooltip : '基本（4列）',
								callback: setAsText('[st-box-btn myclass="" pc_show="4" margin="0 0 20px 0" type=""]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューA" subtext="" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューB" subtext="" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューC" subtext="" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューD" subtext="" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[/st-box-btn]')
							},
							'st_box_btn_sub': {
								text    : 'サブあり（4列）',
								icon    : false,
								tooltip : 'サブあり（4列）',
								callback: setAsHtml('[st-box-btn myclass="" pc_show="4" margin="0 0 20px 0" type=""]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューA" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューB" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューC" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューD" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[/st-box-btn]')
							},
							'st_box_btn_vertical': {
								text    : '縦並びタイプ',
								icon    : false,
								tooltip : '縦並びタイプ',
								callback: setAsText('[st-box-btn myclass="" pc_show="4" margin="0 0 20px 0" type="vertical"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューA" subtext="" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューB" subtext="" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューC" subtext="" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューD" subtext="" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[/st-box-btn]')
							},
							'st_box_btn_vertical_sub': {
								text    : '縦並びタイプ（サブあり）',
								icon    : false,
								tooltip : '縦並びタイプ（サブあり）',
								callback: setAsText('[st-box-btn myclass="" pc_show="4" margin="0 0 20px 0" type="vertical"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューA" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューB" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューC" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューD" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"]<br>[/st-box-btn]')
							},
							'st_box_btn_vertical_one': {
								text    : '縦並びタイプ（単品）',
								icon    : false,
								tooltip : 'ボタンバナー風デザイン',
								callback: setAsText('[st-box-btn myclass="" pc_show="1" margin="0 0 10px 0" type="vertical"][st-box-btn-list icon_image="" webicon="st-svg-wordpress" icon_size="" text="メニューA" subtext="サブテキスト" url="" target="" rel="" bgcolor="" color="" fontsize="90" fontweight="bold"][/st-box-btn]')
							},
						},
					},
					'st_btnlink_main': {
						text    : 'ボタンA',
						icon    : false,
						tooltip : 'ボタンA',
						callback: setAsHtml('<div class="rankstlink-r2"><p><a href="#">ボタンA</a></p></div><br>')
					},
					'st_btnlink_sub': {
						text    : 'ボタンB',
						icon    : false,
						tooltip : 'ボタンB',
						callback: setAsHtml('<div class="rankstlink-l2"><p><a href="#">ボタンB</a></p></div><br>')
					},
					'st_btnlink_back': {
						text    : '前のページ（履歴）に戻る',
						icon    : false,
						callback: setAsText('[st-back-btn text="前のページに戻る" webicon="st-svg-reply"]'),
						enabled: ST.Version.is_ex()
					},
				},
			},
			'st_kaiwa': {
				text   : '会話ふきだし',
				icon   : 'dashicons-format-chat',
				menu: {
					'st_button_kaiwa_1'  : {
						text    : '会話1（ r]で反対向き）',
						icon    : false,
						callback: wrapAsText('[st-kaiwa1]', '[/st-kaiwa1]')
					},
					'st_button_kaiwa_2'  : {
						text    : '会話2',
						icon    : false,
						callback: wrapAsText('[st-kaiwa2]', '[/st-kaiwa2]')
					},
					'st_button_kaiwa_3'  : {
						text    : '会話3',
						icon    : false,
						callback: wrapAsText('[st-kaiwa3]', '[/st-kaiwa3]')
					},
					'st_button_kaiwa_4'  : {
						text    : '会話4',
						icon    : false,
						callback: wrapAsText('[st-kaiwa4]', '[/st-kaiwa4]')
					},
					'st_button_kaiwa_5'  : {
						text    : '会話5',
						icon    : false,
						callback: wrapAsText('[st-kaiwa5]', '[/st-kaiwa5]')
					},
					'st_button_kaiwa_6'  : {
						text    : '会話6',
						icon    : false,
						callback: wrapAsText('[st-kaiwa6]', '[/st-kaiwa6]')
					},
					'st_button_kaiwa_7'  : {
						text    : '会話7',
						icon    : false,
						callback: wrapAsText('[st-kaiwa7]', '[/st-kaiwa7]')
					},
					'st_button_kaiwa_8'  : {
						text    : '会話8',
						icon    : false,
						callback: wrapAsText('[st-kaiwa8]', '[/st-kaiwa8]')
					}
				}
			},
			'st_button_ranking'   : {
				text    : 'ランキング',
				icon    : 'st-svg-oukan',
				menu: {
					'st_button_ranking_1' : {
						text    : 'ランキング1位（基本）',
						icon    : false,
						tooltip : 'ランキング1位（基本）',
						callback: wrapAsText('[st-rank rankno="1" bgcolor="" color="#000" bordercolor="#ccc" radius="" star=""]', '[/st-rank]')
					},
					'st_button_ranking_2' : {
						text    : 'ランキング2位',
						icon    : false,
						tooltip : 'ランキング2位',
						callback: wrapAsText('[st-rank rankno="2" bgcolor="" color="#000" bordercolor="#ccc" radius="" star=""]', '[/st-rank]')
					},
					'st_button_ranking_3' : {
						text    : 'ランキング3位',
						icon    : false,
						tooltip : 'ランキング3位',
						callback: wrapAsText('[st-rank rankno="3" bgcolor="" color="#000" bordercolor="#ccc" radius="" star=""]', '[/st-rank]')
					},
					'st_button_ranking_4' : {
						text    : 'ランキング4位以下',
						icon    : false,
						tooltip : 'ランキング4位以下',
						callback: wrapAsText('[st-rank rankno="4" bgcolor="" color="#000" bordercolor="#ccc" radius="" star=""]', '[/st-rank]')
					},
					'st_button_ranking_guide' : {
						text    : '[?] ガイド※使用不可',
						icon    : false,
						tooltip : '[?] ガイド※使用不可',
						callback: wrapAsText('[st-rank rankno="ランキング（1～3又は空）" bgcolor="背景色" color="文字色" bordercolor="枠線カラー" radius="角丸（px）" star="スター（5,4,3,2,1）"]ここにテキスト', '[/st-rank]')
					},
					'st_button_st_af_cpt' : {
						text    : 'ID',
						icon    : false,
						tooltip : 'ID',
						callback: wrapAsText('[st_af id="', '"]'),
						enabled : function (definition, definitions) {
							// いずれかのタグ管理プラグイン (計測あり・なし) が有効の場合
							return (typeof ST !== 'undefined' && ST.tag_plugin_enabled);
							}
					},
					'st_button_st_af_slug' : {
						text    : 'Slug',
						icon    : false,
						tooltip : 'Slug',
						callback: wrapAsText('[st_af name="', '"]'),
						enabled : function (definition, definitions) {
							// いずれかのタグ管理プラグイン (計測あり・なし) が有効の場合
							return (typeof ST !== 'undefined' && ST.tag_plugin_enabled);
							}
					},
					'st_button_st_rankgroup' : {
						text    : 'RANK',
						icon    : false,
						tooltip : 'RANK',
						callback: wrapAsText('[st-rankgroup id="', '" label="" name=""]'),
						enabled : function (definition, definitions) {
							// いずれかのタグ管理プラグイン (計測あり・なし) が有効の場合
							return (typeof ST !== 'undefined' && ST.tag_plugin_enabled);
						}
					},
				},
				enabled: ST.Version.is_ex_af()
			},
			'st_layout': {
				text   : 'レイアウト',
				icon: 'dashicons-grid-view',
				menu: {
					'st_button_responbox_allsize' : {
						text    : '全サイズ',
						icon    : false,
						menu: {
							'st_button_responbox30s' : {
								text    : '左右30:70%',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responbox30 smart30"><div class="lbox"><p>このテキストは最後に消して下さい（30%）</p></div><div class="rbox"><p>このテキストは最後に消して下さい（70%）</p></div></div><br>')
							},
							'st_button_responbox50s' : {
								text    : '左右50%',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responbox50 smart50"><div class="lbox"><p>このテキストは最後に消して下さい（50%）</p></div><div class="rbox"><p>このテキストは最後に消して下さい（50%）</p></div></div><br>')
							},
							'st_button_responboxfree': {
								text    : '左右free%',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responboxfree smartfree"><div class="lbox" style="width:50%"><p>このテキストは最後に消して下さい（%）</p></div><div class="rbox" style="width:50%"><p>このテキストは最後に消して下さい（%）</p></div></div><br>')
							},
							'st_button_kintou'       : {
								text    : '均等横並び',
								icon    : false,
								callback: setAsHtml('<div class="kintou"><ul><li>横並びコンテンツ</li><li>横並びコンテンツ</li><li>横並びコンテンツ</li></ul></div><br>')
							},
						},
					},
					'st_button_responbox_pc_tab'  : {
						text    : 'PCとTab（959px以上）',
						icon    : false,
						menu: {
							'st_button_responbox33'  : {
								text    : '3分割',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responbox33"><div class="lbox"><p>このテキストは最後に消して下さい（33%）</p></div><div class="lbox"><p>このテキストは最後に消して下さい（33%）</p></div><div class="lbox"><p>このテキストは最後に消して下さい（33%）</p></div></div><br>')
							},
							'st_button_responbox30'    : {
								text    : '左右30:70%',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responbox30"><div class="lbox"><p>このテキストは最後に消して下さい（30%）</p></div><div class="rbox"><p>このテキストは最後に消して下さい（70%）</p></div></div><br>')
							},
							'st_button_responbox70'    : {
								text    : '左右70:30%',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responbox70"><div class="lbox"><p>このテキストは最後に消して下さい（70%）</p></div><div class="rbox"><p>このテキストは最後に消して下さい（30%）※スマホ（599px以下）ではこちらが上になります</p></div></div><br>')
							},
							'st_button_responbox'    : {
								text    : '左右40:60%',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responbox"><div class="lbox"><p>このテキストは最後に消して下さい（40%）</p></div><div class="rbox"><p>このテキストは最後に消して下さい（60%）</p></div></div><br>')
							},
							'st_button_responbox60'    : {
								text    : '左右60:40%',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responbox60"><div class="lbox"><p>このテキストは最後に消して下さい（60%）</p></div><div class="rbox"><p>このテキストは最後に消して下さい（40%）※スマホ（599px以下）ではこちらが上になります</p></div></div><br>')
							},
							'st_button_responbox50'  : {
								text    : '左右50%',
								icon    : false,
								callback: setAsHtml('<div class="clearfix responbox50"><div class="lbox"><p>このテキストは最後に消して下さい（50%）</p></div><div class="rbox"><p>このテキストは最後に消して下さい（50%）</p></div></div><br>')
							},
						},
					},
					'st_button_div'       : {
						text    : 'DIV',
						icon    : false,
						menu: {
							'st_button_div_default'       : {
								text    : 'メイン',
								icon    : false,
								callback: wrapAsHtml('[st-div class="" margin="0 0 20px 0" padding="0 0 0 0" add_style=""]<p>', '</p>[/st-div]')
							},
							'st_button_div_sub'       : {
								text    : 'サブ',
								icon    : false,
								callback: wrapAsHtml('[st-div-a class="" margin="0 0 20px 0" padding="0 0 0 0" add_style=""]<p>', '</p>[/st-div-a]')
							},
						},
					},
					'st_background_wide'       : {
						text    : '背景ワイド',
						icon    : false,
						callback: wrapAsHtml('[st-wide-background myclass="" backgroud_image="" bgcolor="#fafafa" align="" add_style=""]<p>', '</p>[/st-wide-background]')
					},
					'st_tab_btn': {
						text   : 'タブ（切替ボタン）',
						icon: false,
						menu: {
							'st_tab_btn2'       : {
								text    : '2つ',
								icon    : false,
								callback: setAsHtml('[st-tab-content memo="全体を包むボックスです" type="button" myclass="st-radius"]<br>[st-input-tab webicon="" text="タブ1" bgcolor="" bordercolor="" color="" fontweight="" checked="checked"]<br>[st-input-tab webicon="" text="タブ2" bgcolor="" bordercolor="" color="" fontweight="" checked=""]<br>[st-tab-main bgcolor="" bordercolor=""]<p>タブ1のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor=""]<p>タブ2のコンテンツ</p>[/st-tab-main]<br>[/st-tab-content]')
							},
							'st_tab_btn3'       : {
								text    : '3つ',
								icon    : false,
								callback: setAsHtml('[st-tab-content memo="全体を包むボックスです" type="button" myclass="st-radius"]<br>[st-input-tab webicon="" text="タブ1" bgcolor="" bordercolor="" color="" fontweight="" checked="checked"]<br>[st-input-tab webicon="" text="タブ2" bgcolor="" bordercolor="" color="" fontweight="" checked=""]<br>[st-input-tab webicon="" text="タブ3" bgcolor="" bordercolor="" color="" fontweight="" checked=""]<br>[st-tab-main bgcolor="" bordercolor=""]<p>タブ1のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor=""]<p>タブ2のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor=""]<p>タブ3のコンテンツ</p>[/st-tab-main]<br>[/st-tab-content]')
							},
							'st_tab_btn4'       : {
								text    : '4つ',
								icon    : false,
								callback: setAsHtml('[st-tab-content memo="全体を包むボックスです" type="button" myclass="st-radius"]<br>[st-input-tab webicon="" text="タブ1" bgcolor="" bordercolor="" color="" fontweight="" checked="checked"]<br>[st-input-tab webicon="" text="タブ2" bgcolor="" bordercolor="" color="" fontweight="" checked=""]<br>[st-input-tab webicon="" text="タブ3" bgcolor="" bordercolor="" color="" fontweight="" checked=""]<br>[st-input-tab webicon="" text="タブ4" bgcolor="" bordercolor="" color="" fontweight="" checked=""]<br>[st-tab-main bgcolor="" bordercolor=""]<p>タブ1のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor=""]<p>タブ2のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor=""]<p>タブ3のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor=""]<p>タブ4のコンテンツ</p>[/st-tab-main]<br>[/st-tab-content]')
							},
						},
					},
					'st_tab': {
						text   : 'タブ',
						icon: false,
						menu: {
							'st_button_tab2'       : {
								text    : '2つ',
								icon    : false,
								callback: setAsHtml('[st-tab-content memo="全体を包むボックスです" myclass=""]<br>[st-input-tab webicon="" text="タブ1" bgcolor="#fff" bordercolor="" color="#1a1a1a" fontweight="" width="45" value="1" checked="checked"]<br>[st-input-tab webicon="" text="タブ2" bgcolor="#fff" bordercolor="" color="#1a1a1a" fontweight="" width="45" value="2" checked=""]<br>[st-tab-main bgcolor="" bordercolor="" value="1"]<p>タブ1のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor="" value="2"]<p>タブ2のコンテンツ</p>[/st-tab-main]<br>[/st-tab-content]')
							},
							'st_button_tab3'       : {
								text    : '3つ',
								icon    : false,
								callback: setAsHtml('[st-tab-content memo="全体を包むボックスです" myclass=""]<br>[st-input-tab webicon="" text="タブ1" bgcolor="#fff" bordercolor="" color="#1a1a1a" fontweight="" width="30" value="1" checked="checked"]<br>[st-input-tab webicon="" text="タブ2" bgcolor="#fff" bordercolor="" color="#1a1a1a" fontweight="" width="30" value="2" checked=""]<br>[st-input-tab text="タブ3" bgcolor="#fff" bordercolor="" color="#1a1a1a" fontweight="" width="30" value="3" checked=""]<br>[st-tab-main bgcolor="" bordercolor="" value="1"]<p>タブ1のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor="" value="2"]<p>タブ2のコンテンツ</p>[/st-tab-main][st-tab-main bgcolor="" bordercolor="" value="3"]<p>タブ3のコンテンツ</p>[/st-tab-main]<br>[/st-tab-content]')
							},
						},
						enabled: ST.Version.is_ex_af()
					},
					'st_timeline': {
						text   : 'タイムライン',
						icon: false,
						menu: {
							'st_timeline_top'       : {
								text    : '基本',
								icon    : false,
								callback: setAsHtml('[st-timeline myclass="" add_style=""]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[/st-timeline]')
							},
							'st_timeline_center'       : {
								text    : 'センター',
								icon    : false,
								callback: setAsHtml('[st-timeline myclass="" add_style=""]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[/st-timeline]')
							},
							'st_timeline_top_step'       : {
								text    : '基本（ステップ）',
								icon    : false,
								callback: setAsHtml('[st-timeline myclass="" add_style=""]<br>[st-timeline-list text="step.1" myclass="" fontsize="" fontweight="bold" color="#9E9E9E" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="step.2" myclass="" fontsize="" fontweight="bold" color="#9E9E9E" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="step.3" myclass="" fontsize="" fontweight="bold" color="#9E9E9E" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[/st-timeline]')
							},
							'st_timeline_center_step'       : {
								text    : 'センター（ステップ）',
								icon    : false,
								callback: setAsHtml('[st-timeline myclass="" add_style=""]<br>[st-timeline-list text="step.1" myclass="" fontsize="" fontweight="bold" color="#9E9E9E" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="step.2" myclass="" fontsize="" fontweight="bold" color="#9E9E9E" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="step.3" myclass="" fontsize="" fontweight="bold" color="#9E9E9E" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[/st-timeline]')
							},
							'st_timeline_card'       : {
								text    : 'ブログカード',
								icon    : false,
								callback: setAsHtml('[st-timeline myclass="" add_style=""]<br>[st-timeline-list myclass="" bgcolor="" center="on"][st-card myclass="" id="記事ID" pc_height="" name="" bgcolor="" color="" readmore="on" thumbnail="on"][/st-timeline-list]<br>[st-timeline-list myclass="" bgcolor="" center="on"][st-card myclass="" id="記事ID" pc_height="" name="" bgcolor="" color="" readmore="on" thumbnail="on"][/st-timeline-list]<br>[st-timeline-list myclass="" bgcolor="" center="on"][st-card myclass=""  id="記事ID" pc_height="" name="" bgcolor="" color="" readmore="on" thumbnail="on"][/st-timeline-list]<br>[/st-timeline]')
							},
						},
					},
					'st_timeline_count': {
						text   : 'タイムライン（カウント）',
						icon: false,
						menu: {
							'st_timeline_top_count'       : {
								text    : '基本',
								icon    : false,
								callback: setAsHtml('[st-timeline myclass="st-timeline-count" add_style=""]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center=""]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[/st-timeline]')
							},
							'st_timeline_center_count'       : {
								text    : 'センター',
								icon    : false,
								callback: setAsHtml('[st-timeline myclass="st-timeline-count" add_style=""]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[st-timeline-list text="ここに見出しテキスト" url="" myclass="" fontsize="" fontweight="bold" color="" bgcolor="" center="on"]<p>ここにコンテンツ</p>[/st-timeline-list]<br>[/st-timeline]')
							},
							'st_timeline_card_count'       : {
								text    : 'ブログカード',
								icon    : false,
								callback: setAsHtml('[st-timeline myclass="st-timeline-count" add_style=""]<br>[st-timeline-list myclass="" bgcolor="" center="on"][st-card myclass="" id="記事ID" pc_height="" name="" bgcolor="" color="" readmore="on" thumbnail="on"][/st-timeline-list]<br>[st-timeline-list myclass="" bgcolor="" center="on"][st-card myclass="" id="記事ID" pc_height="" name="" bgcolor="" color="" readmore="on" thumbnail="on"][/st-timeline-list]<br>[st-timeline-list myclass="" bgcolor="" center="on"][st-card myclass=""  id="記事ID" pc_height="" name="" bgcolor="" color="" readmore="on" thumbnail="on"][/st-timeline-list]<br>[/st-timeline]')
							},
						},
					},
					'st_table_sc': {
						text   : 'table',
						icon: false,
						menu: {
							'st_button_table_simple'       : {
								text    : 'table（シンプル）',
								icon    : false,
								callback: setAsText('[st-table]<br>[st-tr]<br>[st-td]テキスト[/st-td]<br>[/st-tr]<br>[/st-table]')
							},
							'st_button_table'       : {
								text    : 'table（属性あり）',
								icon    : false,
								callback: setAsText('[st-table width="100" bordercolor=""]<br>[st-tr bgcolor="" color="" fontweight="" center=""]<br>[st-td width="" bordercolor="" bgcolor="" color="" fontweight="" center="" colspan=""]テキスト[/st-td]<br>[st-td width="" bordercolor="" bgcolor="" color="" fontweight="" center="" colspan=""]テキスト[/st-td]<br>[/st-tr]<br>[/st-table]')
							},
						},
						enabled: ST.Version.is_ex()
					},
					'st_ex_wide': {
						text   : 'ワイドデザイン forEX',
						icon: false,
						menu: {
							'st_button_lp_wide'       : {
								text    : 'ワイド（1カラム・LP用）',
								icon    : false,
								callback: wrapAsHtml('[st-widecolumn myclass="" bgcolor="" add_style="" shadow="on"]<p>', '</p>[/st-widecolumn]')
							},
							'st_button_lp_wide_color'       : {
								text    : 'ワイドカラー（1カラム・LP用）',
								icon    : false,
								callback: wrapAsHtml('[st-widecolumn myclass="" bgcolor="#fafafa" add_style="" shadow="on"]<p>', '</p>[/st-widecolumn]')
							},
							'st_button_lp_wide_eyecatch'       : {
								text    : 'ワイドアイキャッチ（左右影あり）',
								icon    : false,
								callback: wrapAsHtml('<div class="st-lp-wide-eyecatch">', '</div>')
							},
						},
						enabled: ST.Version.is_ex()
					},
				},
			},
			'st_shortcode': {
				text   : 'その他パーツ',
				icon: 'dashicons-editor-code',
				menu: {
					'st_googleicon': {
						text   : 'Googleアイコン',
						icon    : false,
						menu: {
							'st_button_googleicon_desktop_mac'  : {
								text    : 'Mac',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="desktop_mac" fontsize="" color=""]')
							},
							'st_button_googleicon_phone_iphone'  : {
								text    : 'iPhone',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="phone_iphone" fontsize="" color=""]')
							},
							'st_button_googleicon_tablet_mac'  : {
								text    : 'tablet',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="tablet_mac" fontsize="" color=""]')
							},
							'st_button_googleicon_timer'  : {
								text    : 'タイマー',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="timer" fontsize="" color=""]')
							},
							'st_button_googleicon_location_on'  : {
								text    : 'MAP',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="location_on" fontsize="" color=""]')
							},
							'st_button_googleicon_directions_bike'  : {
								text    : '自転車',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="directions_bike" fontsize="" color=""]')
							},
							'st_button_googleicon_directions_run'  : {
								text    : '走る',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="directions_run" fontsize="" color=""]')
							},
							'st_button_googleicon_directions_car'  : {
								text    : '車',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="directions_car" fontsize="" color=""]')
							},
							'st_button_googleicon_directions_transit'  : {
								text    : '電車',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="directions_transit" fontsize="" color=""]')
							},
							'st_button_googleicon_subway'  : {
								text    : '地下鉄',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="subway" fontsize="" color=""]')
							},
							'st_button_googleicon_flight'  : {
								text    : '飛行機',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="flight" fontsize="" color=""]')
							},
							'st_button_googleicon_local_parking'  : {
								text    : '駐車場',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="local_parking" fontsize="" color=""]')
							},
							'st_button_googleicon_restaurant'  : {
								text    : 'レストラン',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="restaurant" fontsize="" color=""]')
							},
							'st_button_googleicon_store_mall_directory'  : {
								text    : 'ストア',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="store_mall_directory" fontsize="" color=""]')
							},
							'st_button_googleicon_cake'  : {
								text    : 'ケーキ',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="cake" fontsize="" color=""]')
							},
							'st_button_googleicon_smoking_rooms'  : {
								text    : 'タバコ',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="smoking_rooms" fontsize="" color=""]')
							},
							'st_button_googleicon_arrow_back'  : {
								text    : '矢印（左）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="arrow_back" fontsize="" color=""]')
							},
							'st_button_googleicon_arrow_downward'  : {
								text    : '矢印（下）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="arrow_downward" fontsize="" color=""]')
							},
							'st_button_googleicon_arrow_forward'  : {
								text    : '矢印（右）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="arrow_forward" fontsize="" color=""]')
							},
							'st_button_googleicon_arrow_upward'  : {
								text    : '矢印（上）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="arrow_upward" fontsize="" color=""]')
							},
							'st_button_googleicon_radio_button_unchecked'  : {
								text    : 'マル',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="radio_button_unchecked" fontsize="" color=""]')
							},
							'st_button_googleicon_close'  : {
								text    : 'バツ',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="close" fontsize="" color=""]')
							},
							'st_button_googleicon_mood'  : {
								text    : '顔（笑顔）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="mood" fontsize="" color=""]')
							},
							'st_button_googleicon_mood_bad'  : {
								text    : '顔（悪い）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="mood_bad" fontsize="" color=""]')
							},
							'st_button_googleicon_sentiment_satisfied'  : {
								text    : '顔（満足）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="sentiment_satisfied" fontsize="" color=""]')
							},
							'st_button_googleicon_sentiment_very_dissatisfied'  : {
								text    : '顔（不満）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="sentiment_very_dissatisfied" fontsize="" color=""]')
							},
							'st_button_googleicon_thumb_up_alt'  : {
								text    : '手（Like）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="thumb_up_alt" fontsize="" color=""]')
							},
							'st_button_googleicon_thumb_down_alt'  : {
								text    : '手（Bad）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="thumb_down_alt" fontsize="" color=""]')
							},
							'st_button_googleicon_error'  : {
								text    : '!（error）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="error" fontsize="" color=""]')
							},
							'st_button_googleicon_new_releases'  : {
								text    : '!（new）',
								icon    : false,
								callback: setAsText('[st-google-icon googleicon="new_releases" fontsize="" color=""]')
							},
						},
					},
					'st_button_star'            : {
						text    : 'スター',
						icon    : false,
						menu: {
							'st_button_star_5'            : {
								text    : 'スター（5）',
								icon    : false,
								callback: setAsText('[star5]')
							},
 							'st_button_star_45'            : {
								text    : 'スター（4.5）',
								icon    : false,
								callback: setAsText('[star45]')
							},
							'st_button_star_4'            : {
								text    : 'スター（4）',
								icon    : false,
								callback: setAsText('[star4]')
							},
							'st_button_star_35'            : {
								text    : 'スター（3.5）',
								icon    : false,
								callback: setAsText('[star35]')
							},
							'st_button_star_3'            : {
								text    : 'スター（3）',
								icon    : false,
								callback: setAsText('[star3]')
							},
							'st_button_star_2'            : {
								text    : 'スター（2）',
								icon    : false,
								callback: setAsText('[star2]')
							},
							'st_button_star_1'            : {
								text    : 'スター（1）',
								icon    : false,
								callback: setAsText('[star1]')
							},
						},
					},
					'st_countdown_timer'            : {
						text    : 'カウントダウン',
						icon    : false,
						menu: {
							'st_countdown_timer_base'            : {
								text    : '基本',
								icon    : false,
								callback: setAsText('[st-countdown year="" month="" day="" time="00:00" show_timer="1" invert="0"]終了しました[/st-countdown]')
							},
 							'st_countdown_timer_daily'            : {
								text    : '日ループ',
								icon    : false,
								callback: setAsText('[st-countdown time="00:00" interval="daily" /]')
							},
							'st_countdown_timer_monthly'            : {
								text    : '月ループ',
								icon    : false,
								callback: setAsText('[st-countdown day="1" time="00:00" interval="monthly" /]')
							},
						},
						enabled : function (definition, definitions) {
							return (typeof ST !== 'undefined' && ST.st_countdown_enabled);
						}
					},
					'st_button_date'   : {
						text    : '年月（自動更新）',
						icon    : false,
						tooltip : '年月（自動更新）',
						callback: setAsText('[st-date]'),
						enabled: ST.Version.is_ex()
					},
					'st_button_user_comment_box'   : {
						text    : '画像付きコメント',
						icon    : false,
						tooltip : '画像付きコメント',
						callback: setAsText('[st-user-comment-box title="タイトル" user_text="◯代男性" color="" star="5"]画像（60×60）[/st-user-comment-box]'),
						enabled: ST.Version.is_ex_af()
					},
					'st_button_adsense'   : {
						text    : 'アドセンス',
						icon    : false,
						tooltip : 'アドセンス',
						callback: setAsText('[adsense]')
					},
					'st_button_originalsc': {
						text    : 'オリジナルショートコード',
						icon    : false,
						tooltip : 'オリジナルショートコード',
						callback: setAsText('[originalsc]')
					},
					'st_button_youtubeid' : {
						text    : 'YouTube',
						icon    : false,
						tooltip : 'YouTube',
						callback: wrapAsText('[youtube id=', ']')
					},
					'st_button_triangle'             : {
						text    : '三角（下矢印）',
						icon    : false,
						callback: setAsText('[st-under-t color="#000"]')
					},
					'st_button_st_slidelist'          : {
						text    : 'スクロールナビ',
						icon    : false,
						callback: setAsHtml('<div id="st_listnavi_wrapper"><ul class="st-sc-listnavi-box"><li class="st-sc-listnavi"><a href="#">ダミーリンク</a></li><li class="st-sc-listnavi"><a href="#">ダミーリンク</a></li><li class="st-sc-listnavi"><a href="#">ダミーリンク</a></li></ul></div><br>'),
						enabled: ST.Version.is_ex_af()
					},
					'st_button_st_toc_custom'          : {
						text    : '目次(カスタム)',
						icon    : false,
						callback: setAsHtml('<div id="st_toc_container" class="only-toc" ><p class="st_toc_title">目次</p><ul class="st_toc_list"><li><a href="#">メニュー1</a></li><li><a href="#">メニュー2</a></li><li><a href="#">メニュー3</a></li></ul></div><br>')
					},
					'st_button_st_no_lazy_load' : {
						text    : '遅延除外（LazyLoad）',
						icon    : false,
						tooltip : '遅延除外（LazyLoad）',
						callback: wrapAsHtml('[st-no-lazy-load]<p>', '</p>[/st-no-lazy-load]'),
						enabled : function (definition, definitions) {
							// Affinger LazyLoad プラグインの [st-no-lazy-load] が存在する場合
							return (typeof ST !== 'undefined' && ST.st_no_lazy_load_exists);
						}
					},
					'st_button_st_af_cpt' : {
						text    : 'ID',
						icon    : false,
						tooltip : 'ID',
						callback: wrapAsText('[st_af id="', '"]'),
						enabled : function (definition, definitions) {
						return (typeof ST !== 'undefined' && ST.tag_plugin_enabled);
							}
					},
					'st_button_st_af_slug' : {
						text    : 'Slug',
						icon    : false,
						tooltip : 'Slug',
						callback: wrapAsText('[st_af name="', '"]'),
						enabled : function (definition, definitions) {
							return (typeof ST !== 'undefined' && ST.tag_plugin_enabled);
							}
					},
					'st_button_st_rankgroup' : {
						text    : 'RANK',
						icon    : false,
						tooltip : 'RANK',
						callback: wrapAsText('[st-rankgroup id="', '" label="" name=""]'),
						enabled : function (definition, definitions) {
							return (typeof ST !== 'undefined' && ST.tag_plugin_enabled);
						}
					},
				},
			},
			'st_button_postgroup_sc' : {
				text    : '記事一覧 / カード',
				icon    : 'st-svg-list',
				menu: {
					'st_button_postgroup' : {
						text    : '記事一覧',
						icon    : false,
						callback: setAsText('[st-postgroup id="" rank=""]')
					},
					'st_button_catgroup' : {
						text    : 'カテゴリー記事一覧',
						icon    : false,
						callback: setAsText('[st-catgroup cat="0" page="5" order="desc" orderby="id" child="on" slide="off" slides_to_show="3,3,2" slide_date="" slide_more="ReadMore" slide_center="off"]')
					},
					'st_button_catgroup_slide' : {
						text    : 'カテゴリー記事一覧（スライドショー）',
						icon    : false,
						callback: setAsText('[st-catgroup cat="0" page="5" order="desc" orderby="id" child="on" slide="on" slides_to_show="3,3,1" slide_date="" slide_more="ReadMore" slide_center="on" fullsize_type=""]')
					},
					'st_button_catgroup_slide_img_class' : {
						text    : 'スライドショー画像のみ（※クラス）',
						icon    : false,
						callback: wrapAsHtml('<div class="st-slider-img">','</div>')
					},
					'st_button_osusume' : {
						text    : 'おすすめ記事一覧',
						icon    : false,
						callback: setAsText('[st-osusume]')
					},
					'st_button_blogcard_type' : {
						text    : 'ブログカード',
						icon    : false,
						menu: {
							'st_button_blogcard_type_text_sankou'  : {
								text    : '参考',
								icon    : false,
								callback: wrapAsText('[st-card myclass="st-no-shadow" id="', '" label="参考" pc_height="" name="" bgcolor="#cccccc" color="#ffffff" webicon="st-svg-file-text-o" readmore="on" thumbnail="on" type="text"]')
							},
							'st_button_blogcard_type_text_minihukidashi'  : {
								text    : 'CHECK（ふきだし）',
								icon    : false,
								callback: wrapAsText('[st-div class="" margin="0 0 -5px -5px" padding="0 0 0 0" add_style=""][st-minihukidashi webicon="st-svg-check" fontsize="" fontweight="bold" bgcolor="#FFECB3" color="" margin="0 0 0 0" radius="30" position="" add_boxstyle=""]こちらもCHECK[/st-minihukidashi][/st-div][st-card myclass="st-card-minihukidashi" id="', '" label="" pc_height="" name="" bgcolor="#cccccc" color="" webicon="" readmore="on" thumbnail="on" type=""]')
							},
						},
					},
				},
				enabled: !ST.Version.is_ex()
			},
			'st_button_postgroup_sc_ex' : {
				text    : '記事一覧 / カード',
				icon    : 'st-svg-list',
				menu: {
					'st_button_postgroup' : {
						text    : '記事一覧',
						icon    : false,
						callback: setAsText('[st-postgroup id="" rank="" slide="off" slides_to_show="3,3,2" slide_date="" slide_more="ReadMore" slide_center="off" type=""]')
					},
					'st_button_postgroup_slide' : {
						text    : '記事一覧（スライドショー）',
						icon    : false,
						callback: setAsText('[st-postgroup id="" rank="" slide="on" slides_to_show="3,3,2" slide_date="" slide_more="ReadMore" slide_center="on" fullsize_type=""]')
					},
					'st_button_catgroup' : {
						text    : 'カテゴリー記事一覧',
						icon    : false,
						callback: setAsText('[st-catgroup cat="0" page="5" order="desc" orderby="id" child="on" slide="off" slides_to_show="3,3,2" slide_date="" slide_more="ReadMore" slide_center="off" type=""]')
					},
					'st_button_catgroup_loop' : {
						text    : 'カテゴリー記事一覧（読込）',
						icon    : false,
						callback: setAsText('[st-catgroup cat="0" page="3" order="desc" orderby="id" child="on" slide_more="もっと見る" load_more="on" type=""]')
					},
					'st_button_catgroup_slide' : {
						text    : 'カテゴリー記事一覧（スライドショー）',
						icon    : false,
						callback: setAsText('[st-catgroup cat="0" page="5" order="desc" orderby="id" child="on" slide="on" slides_to_show="3,3,1" slide_date="" slide_more="ReadMore" slide_center="on" fullsize_type=""]')
					},
					'st_button_taggroup' : {
						text    : 'タグ記事一覧',
						icon    : false,
						callback: setAsText('[st-taggroup tag="0" page="5" order="desc" orderby="id" slide="off" slides_to_show="3,3,2" slide_date="" slide_more="ReadMore" slide_center="off" type=""]')
					},
					'st_button_taggroup_loop' : {
						text    : 'タグ記事一覧（読込）',
						icon    : false,
						callback: setAsText('[st-taggroup tag="0" page="3" order="desc" orderby="id" slide_more="もっと見る" load_more="on" type=""]')
					},
					'st_button_taggroup_slide' : {
						text    : 'タグ記事一覧（スライドショー）',
						icon    : false,
						callback: setAsText('[st-taggroup tag="0" page="5" order="desc" orderby="id" slide="on" slides_to_show="3,3,1" slide_date="" slide_more="ReadMore" slide_center="on" fullsize_type=""]')
					},
					'st_button_osusume' : {
						text    : 'おすすめ記事一覧',
						icon    : false,
						callback: setAsText('[st-osusume]')
					},
					'st_button_blogcard_type' : {
						text    : 'ブログカード',
						icon    : false,
						menu: {
							'st_button_blogcard_type_text_sankou'  : {
								text    : '参考',
								icon    : false,
								callback: wrapAsText('[st-card myclass="" id="', '" label="参考" pc_height="" name="" bgcolor="#cccccc" color="#ffffff" webicon="st-svg-file-text-o" readmore="on" thumbnail="on" type="text"]')
							},
							'st_button_blogcard_type_text_minihukidashi'  : {
								text    : 'CHECK（ふきだし）',
								icon    : false,
								callback: wrapAsText('[st-div class="" margin="0 0 -5px -5px" padding="0 0 0 0" add_style=""][st-minihukidashi webicon="st-svg-check" fontsize="" fontweight="bold" bgcolor="#FFECB3" color="" margin="0 0 0 0" radius="30" position="" add_boxstyle=""]こちらもCHECK[/st-minihukidashi][/st-div][st-card myclass="st-card-minihukidashi" id="', '" label="" pc_height="" name="" bgcolor="#cccccc" color="" webicon="" readmore="on" thumbnail="on" type=""]')
							},
							'st_button_blogcard_type_no_thumbnail' : {
								text    : 'サムネイルなし',
								icon    : false,
								callback: wrapAsText('[st-card myclass="" id="', '" label="" pc_height="" name="" bgcolor="" color="" webicon="" readmore="on" thumbnail="off" type=""]')
							},
							'st_button_blogcard_type_no_shadow'  : {
								text    : '影なし',
								icon    : false,
								callback: wrapAsText('[st-card myclass="st-no-shadow" id="', '" label="" pc_height="" name="" bgcolor="" color="" webicon="" readmore="on" thumbnail="on" type=""]')
							},
						},
					},
				},
				enabled: ST.Version.is_ex()
			},
			'st_button_bunki' : {
				text    : '条件表示',
				icon    : 'st-svg-eye',
				menu: {
					'st_button_commentout'          : {
						text    : 'コメントアウト',
						icon    : false,
						callback: wrapAsText('[st-out]', '[/st-out]')
					},
					'st_button_commentout_memo'          : {
						text    : 'エディタ用メモ',
						icon    : false,
						callback: setAsText('[st-comment-out memo="メモ"]')
					},
					'st_button_smanone'         : {
						text    : 'PC閲覧時のみ表示',
						icon    : false,
						callback: wrapAsText('[pc]', '[/pc]')
					},
					'st_button_pcnone'          : {
						text    : 'PC閲覧時のみ非表示',
						icon    : false,
						callback: wrapAsText('[nopc]', '[/nopc]')
					},
					'st_button_amp'          : {
						text    : 'AMPページのみ表示',
						icon    : false,
						callback: wrapAsText('[st-amp]', '[/st-amp]')
					},
					'st_button_no_amp'          : {
						text    : 'AMPページのみ非表示',
						icon    : false,
						callback: wrapAsText('[st-no-amp]', '[/st-no-amp]')
					},
					'st_button_frontonly'          : {
						text    : 'フロントページのみ表示',
						icon    : false,
						callback: wrapAsText('[frontonly]', '[/frontonly]')
					},
					'st_button_nofrontonly'          : {
						text    : 'フロントページのみ非表示',
						icon    : false,
						callback: wrapAsText('[no-frontonly]', '[/no-frontonly]')
					},
					'st_button_catonly'          : {
						text    : '指定したカテゴリーIDのみ非表示',
						icon    : false,
						callback: wrapAsText('[catonly cat="0"]', '[/catonly]')
					},
					'st_button_loginonly'          : {
						text    : 'ログイン時のみ表示',
						icon    : false,
						callback: wrapAsText('[login-only]', '[/login-only]')
					},
					'st_button_logoutonly'          : {
						text    : 'ログアウト時のみ表示',
						icon    : false,
						callback: wrapAsText('[logout-only]', '[/logout-only]')
					},
				},
			},
			'st_shortcode_support': {
				text   : 'ショートコード補助',
				icon   : 'st-svg-shortcode',
				menu: {
					'st_webicon': {
						text   : 'Webアイコン（クラス）',
						icon    : false,
						menu: {
							'st_button_webicon_file'  : {
								text    : 'メモ',
								icon    : 'st-svg-file-text-o',
								callback: setAsText('st-svg-file-text-o')
							},
							'st_button_webicon_check_normal'  : {
								text    : 'チェック',
								icon    : 'st-svg-check',
								callback: setAsText('st-svg-check')
							},
							'st_button_webicon_check'  : {
								text    : 'チェック (v)',
								icon    : 'st-svg-check-circle',
								callback: setAsText('st-svg-check-circle')
							},
							'st_button_webicon_checkbox'  : {
								text    : 'チェック [v]',
								icon    : 'st-svg-checkbox',
								callback: setAsText('st-svg-checkbox')
							},
							'st_button_webicon_exclamation'  : {
								text    : '注意',
								icon    : 'st-svg-exclamation-circle',
								callback: setAsText('st-svg-exclamation-circle')
							},
							'st_button_webicon_question'  : {
								text    : 'はてな',
								icon    : 'st-svg-question-circle',
								callback: setAsText('st-svg-question-circle')
							},
							'st_button_webicon_search'  : {
								text    : '虫メガネ',
								icon    : 'st-svg-search',
								callback: setAsText('st-svg-search')
							},
							'st_button_webicon_search_plus'  : {
								text    : '虫メガネ(+)',
								icon    : 'st-svg-search-plus',
								callback: setAsText('st-svg-search-plus')
							},
							'st_button_webicon_chevron_right'  : {
								text    : '矢印右',
								icon    : 'st-svg-chevron-right',
								callback: setAsText('st-svg-chevron-right')
							},
							'st_button_webicon_chevron_downn'  : {
								text    : '矢印下',
								icon    : 'st-svg-chevron-down',
								callback: setAsText('st-svg-chevron-down')
							},
							'st_button_webicon_chevron_doubleright'  : {
								text    : '矢印右2',
								icon    : 'st-svg-angle-double-right',
								callback: setAsText('st-svg-angle-double-right')
							},
							'st_button_webicon_chevron_doubledownn'  : {
								text    : '矢印下2',
								icon    : 'st-svg-angle-double-down',
								callback: setAsText('st-svg-angle-double-down')
							},
							'st_button_webicon_chevron_angle_right'  : {
								text    : '矢印右3',
								icon    : 'st-svg-angle-right',
								callback: setAsText('st-svg-angle-right')
							},
							'st_button_webicon_chevron_angle_down'  : {
								text    : '矢印下3',
								icon    : 'st-svg-angle-down',
								callback: setAsText('st-svg-angle-down')
							},
							'st_button_webicon_heart'  : {
								text    : 'ハート',
								icon    : 'st-svg-heart',
								callback: setAsText('st-svg-heart')
							},
							'st_button_webicon_user'  : {
								text    : 'ユーザー',
								icon    : 'st-svg-user',
								callback: setAsText('st-svg-user')
							},
							'st_button_webicon_comments'  : {
								text    : 'コメント',
								icon    : 'st-svg-comments',
								callback: setAsText('st-svg-comments')
							},
							'st_button_webicon_lightbulb'  : {
								text    : '電球',
								icon    : 'st-svg-lightbulb-o',
								callback: setAsText('st-svg-lightbulb-o')
							},
							'st_button_webicon_bullhorn'  : {
								text    : 'おしらせ',
								icon    : 'st-svg-bullhorn',
								callback: setAsText('st-svg-bullhorn')
							},
							'st_button_webicon_mail'  : {
								text    : 'メール',
								icon    : 'st-svg-envelope',
								callback: setAsText('st-svg-envelope')
							},
							'st_button_webicon_code'  : {
								text    : 'コード',
								icon    : 'st-svg-code',
								callback: setAsText('st-svg-code')
							},
							'st_button_webicon_gift'  : {
								text    : 'ギフト',
								icon    : 'st-svg-gift',
								callback: setAsText('st-svg-gift')
							},
							'st_button_webicon_diamond'  : {
								text    : 'ダイヤモンド',
								icon    : 'st-svg-diamond',
								callback: setAsText('st-svg-diamond')
							},
							'st_button_webicon_download'  : {
								text    : 'ダウンロード',
								icon    : 'st-svg-download',
								callback: setAsText('st-svg-download')
							},
							'st_button_webicon_twitter'  : {
								text    : 'Twitter',
								icon    : 'st-svg-twitter',
								callback: setAsText('st-svg-twitter')
							},
							'st_button_webicon_facebook'  : {
								text    : 'Facebook',
								icon    : 'st-svg-facebook-square',
								callback: setAsText('st-svg-facebook-square')
							},
							'st_button_webicon_youtube'  : {
								text    : 'YouTube',
								icon    : 'st-svg-youtube-play',
								callback: setAsText('st-svg-youtube-play')
							},
							'st_button_webicon_amazon'  : {
								text    : 'amazon',
								icon    : 'st-svg-amazon',
								callback: setAsText('st-svg-amazon')
							},
							'st_button_webicon_oukan'  : {
								text    : '王冠',
								icon    : 'st-svg-oukan',
								callback: setAsText('st-svg-oukan')
							},
							'st_button_webicon_bigginer'  : {
								text    : '初心者',
								icon    : 'st-svg-bigginer_l',
								callback: setAsText('st-svg-bigginer_l')
							},
						},
					},
					'st_webicon_animation': {
						text   : 'アニメーション（クラス）',
						icon    : false,
						menu: {
							'st_button_webicon_animation_wrench'  : {
								text    : '45°揺れ',
								icon    : false,
								callback: setAsText(' st-wrench animated')
							},
							'st_button_webicon_animation_ring'  : {
								text    : 'ベル揺れ',
								icon    : false,
								callback: setAsText(' st-ring animated')
							},
							'st_button_webicon_animation_horizontal'  : {
								text    : '横揺れ',
								icon    : false,
								callback: setAsText(' st-horizontal animated')
							},
							'st_button_webicon_animation_vertical'  : {
								text    : '縦揺れ',
								icon    : false,
								callback: setAsText(' st-vertical animated')
							},
							'st_button_webicon_animation_flash'  : {
								text    : '点滅',
								icon    : false,
								callback: setAsText(' st-flash animated')
							},
							'st_button_webicon_animation_bounce'  : {
								text    : 'バウンド',
								icon    : false,
								callback: setAsText(' st-bounce animated')
							},
							'st_button_webicon_animation_rotation'  : {
								text    : '回転',
								icon    : false,
								callback: setAsText(' st-rotation animated')
							},
							'st_button_webicon_animation_float'  : {
								text    : 'ふわふわ',
								icon    : false,
								callback: setAsText(' st-float animated')
							},
							'st_button_webicon_animation_pulse'  : {
								text    : '大小',
								icon    : false,
								callback: setAsText(' st-pulse animated')
							},
							'st_button_webicon_animation_shake-s'  : {
								text    : 'シェイク',
								icon    : false,
								callback: setAsText(' st-shake-s animated')
							},
							'st_button_webicon_animation_shake'  : {
								text    : 'シェイク（強）',
								icon    : false,
								callback: setAsText(' st-shake animated')
							},
							'st_button_webicon_animation_tada'  : {
								text    : '拡大（ゆれ）',
								icon    : false,
								callback: setAsText(' st-tada animated')
							},
							'st_button_webicon_animation_passing'  : {
								text    : '過ぎる',
								icon    : false,
								callback: setAsText(' st-passing animated')
							},
							'st_button_webicon_animation_file'  : {
								text    : '戻る',
								icon    : false,
								callback: setAsText(' st-passing-reverse animated')
							},
							'st_button_webicon_animation_burst'  : {
								text    : 'バースト',
								icon    : false,
								callback: setAsText(' st-burst animated')
							},
							'st_button_webicon_animation_falling'  : {
								text    : '落ちる',
								icon    : false,
								callback: setAsText(' st-falling animated')
							},
						}
					},
					'st_htmlcolorcode': {
						text   : 'HTMLカラーコード',
						icon    : false,
						menu: {
							'st_button_htmlcolorcode_white'  : {
								text    : '白（#ffffff）',
								icon    : false,
								callback: setAsText('#ffffff')
							},
							'st_button_htmlcolorcode_red'  : {
								text    : '赤濃（#e53935）',
								icon    : false,
								callback: setAsText('#e53935')
							},
							'st_button_htmlcolorcode_red2'  : {
								text    : '赤（#f44336）',
								icon    : false,
								callback: setAsText('#f44336')
							},
							'st_button_htmlcolorcode_red3'  : {
								text    : '赤薄（#ffebee）',
								icon    : false,
								callback: setAsText('#ffebee')
							},
							'st_button_htmlcolorcode_blue'  : {
								text    : '青濃（#039BE5）',
								icon    : false,
								callback: setAsText('#039BE5')
							},
							'st_button_htmlcolorcode_blue2'  : {
								text    : '青（#03A9F4）',
								icon    : false,
								callback: setAsText('#03A9F4')
							},
							'st_button_htmlcolorcode_blue3'  : {
								text    : '青薄（#E1F5FE）',
								icon    : false,
								callback: setAsText('#E1F5FE')
							},
							'st_button_htmlcolorcode_green'  : {
								text    : '緑濃（#43A047）',
								icon    : false,
								callback: setAsText('#43A047')
							},
							'st_button_htmlcolorcode_green2'  : {
								text    : '緑（#4CAF50）',
								icon    : false,
								callback: setAsText('#4CAF50')
							},
							'st_button_htmlcolorcode_green3'  : {
								text    : '緑薄（#E8F5E9）',
								icon    : false,
								callback: setAsText('#E8F5E9')
							},
							'st_button_htmlcolorcode_orange'  : {
								text    : '橙濃（#FFB300）',
								icon    : false,
								callback: setAsText('#FFB300')
							},
							'st_button_htmlcolorcode_orange2'  : {
								text    : '橙（#FFC107）',
								icon    : false,
								callback: setAsText('#FFC107')
							},
							'st_button_htmlcolorcode_orange3'  : {
								text    : '橙薄（#FFF3E0）',
								icon    : false,
								callback: setAsText('#FFF3E0')
							},
							'st_button_htmlcolorcode_black'  : {
								text    : '黒濃（#212121）',
								icon    : false,
								callback: setAsText('#212121')
							},
							'st_button_htmlcolorcode_black2'  : {
								text    : '黒（#424242）',
								icon    : false,
								callback: setAsText('#424242')
							},
							'st_button_htmlcolorcode_black3'  : {
								text    : '黒薄（#FAFAFA）',
								icon    : false,
								callback: setAsText('#FAFAFA')
							},
							'st_button_htmlcolorcode_yellow'  : {
								text    : '黄薄（#FFFDE7）',
								icon    : false,
								callback: setAsText('#FFFDE7')
							},
						},
					},
					'st_htmlcolorcode_bland': {
						text   : 'HTMLカラーコード（ブランド)',
						icon    : false,
						menu: {
							'st_button_htmlcolorcode_twitter'  : {
								text    : 'Twitter（#40a2f5)',
								icon    : 'st-svg-twitter',
								callback: setAsText('#40a2f5')
							},
							'st_button_htmlcolorcode_facebook'  : {
								text    : 'Facebook（#415c9d)',
								icon    : 'st-svg-facebook-square',
								callback: setAsText('#415c9d')
							},
							'st_button_htmlcolorcode_hateb'  : {
								text    : 'hatena（#3290e1)',
								icon    : 'st-svg-hateb',
								callback: setAsText('#3290e1')
							},
							'st_button_htmlcolorcode_wp'  : {
								text    : 'WordPress（#2d88c0)',
								icon    : 'st-svg-wordpress',
								callback: setAsText('#2d88c0')
							},
							'st_button_htmlcolorcode_amazon'  : {
								text    : 'amazon（#eb9100)',
								icon    : 'st-svg-amazon',
								callback: setAsText('#eb9100')
							},
							'st_button_htmlcolorcode_line'  : {
								text    : 'LINE（#39b900)',
								icon    : false,
								callback: setAsText('#39b900')
							},
						},
					},
					'st_fixed_phrase': {
						text   : '定型文',
						icon    : false,
						menu: {
							'st_fixed_phrase_banzai'  : {
								text    : '＼ バンザイ ／',
								icon    : false,
								callback: setAsText('＼ バンザイ ／')
							},
							'st_fixed_phrase_kousiki'  : {
								text    : '詳細は公式サイトにて',
								icon    : false,
								callback: setAsText('※時期により内容が異なる場合がございます。詳細は公式サイトにてご確認下さいませ。')
							},
							'st_fixed_phrase_copyright'  : {
								text    : '無断利用禁止',
								icon    : false,
								callback: setAsText('※掲載されている文字、写真、イラスト等は著作権の対象となっています。無断利用を固く禁止しております。')
							},
							'st_fixed_phrase_damy'  : {
								text    : 'ダミーテキスト',
								icon    : false,
								callback: setAsText('これはダミーのテキストですこれはダミーのテキストですこれはダミーのテキストですこれはダミーのテキストですこれはダミーのテキストですこれはダミーのテキストです')
							},
						},
					},

				}
			}
		};

		if (ST.st_rich_animation_enabled) {
			listItems['st_rich_animation'] = {
				text: 'リッチアニメ',
				icon: 'st-svg-magic',
				menu: {
					'st_button_st_rich_animation_bt'  : {
						text    : '下上',
						icon    : false,
						callback: wrapAsHtml('[st-rich-animation type="bt" delay="0" duration="1000" offset="200"]<p>', '</p>[/st-rich-animation]')
					},
					'st_button_st_rich_animation_tb'  : {
						text    : '上下',
						icon    : false,
						callback: wrapAsHtml('[st-rich-animation type="tb" delay="0" duration="1000" offset="200"]<p>', '</p>[/st-rich-animation]')
					},
					'st_button_st_rich_animation_rl'  : {
						text    : '右左',
						icon    : false,
						callback: wrapAsHtml('[st-rich-animation type="rl" delay="0" duration="1000" offset="200"]<p>', '</p>[/st-rich-animation]')
					},
					'st_button_st_rich_animation_lr'  : {
						text    : '左右',
						icon    : false,
						callback: wrapAsHtml('[st-rich-animation type="lr" delay="0" duration="1000" offset="200"]<p>', '</p>[/st-rich-animation]')
					},
					'st_button_st_rich_animation_bs'  : {
						text    : '大小',
						icon    : false,
						callback: wrapAsHtml('[st-rich-animation type="bs" delay="0" duration="1000" offset="200"]<p>', '</p>[/st-rich-animation]')
					},
					'st_button_st_rich_animation_sb'  : {
						text    : '小大',
						icon    : false,
						callback: wrapAsHtml('[st-rich-animation type="sb" delay="0" duration="1000" offset="200"]<p>', '</p>[/st-rich-animation]')
					},
					'st_button_st_rich_animation_fade': {
						text    : 'フェード',
						icon    : false,
						callback: wrapAsHtml('[st-rich-animation type="fade" delay="0" duration="1000" offset="200"]<p>', '</p>[/st-rich-animation]')
					},
				},
			};
		}

		return listItems;
	}

	/**
	 * ボタン定義を取得
	 */
	function getButtonDefinition(editor) {
		var setAsHtml  = createCallbackFactory(editor, _setAsHtml);
		var setAsText  = createCallbackFactory(editor, _setAsText);
		var wrapAsHtml = createCallbackFactory(editor, _wrapAsHtml);
		var wrapAsText = createCallbackFactory(editor, _wrapAsText);

		return {
			// ボタン追加時は以下に追加する
			// function.php の st_tiny_mce_visual_buttons() 内にもボタン名を追加する
			//
			// 'ボタン名': {
			//     text    : 'ボタンのテキスト',
			//     icon    : false または 'アイコン名 (code 等)',
			//     tooltip : 'ツールチップの内容',
			//     callback: コールバック
			//               HTMLとして挿入/置換する場合    : setAsHtml('挿入/置換する内容L')
			//               テキストとして挿入/置換する場合: setAsText('挿入/置換する内容')
			//               HTMLとして囲い込む場合         : wrapAsHtml('前に挿入する内容', '後ろに挿入する内容')
			//               テキストとして囲い込む場合     : wrapAsText('前に挿入する内容', '後ろに挿入する内容')
			//
			//               選択範囲のHTMLタグ等は除去する場合は、テキストとして挿入/置換/囲い込みを行うコールバックを使う
			//               (その他の細かい挙動はTinyMCEの仕様に基づく)
			//     enabled: 有効にするかどうか (false またはコールバック / 省略時は true)
			// },

			'st_button_huto'   : {
				text    : '太字',
				icon    : false,
				tooltip : '太字',
				callback: wrapAsHtml('<span class="huto">', '</span>')
			},
			'st_button_hutoaka': {
				text    : '太赤',
				icon    : false,
				tooltip : '太赤',
				callback: wrapAsHtml('<span class="hutoaka">', '</span>')
			},
			'st_button_mycolor': {
				text    : '太字',
				icon    : 'st-svg-user-circle',
				tooltip : '太字',
				callback: wrapAsHtml('<span class="st-mycolor">', '</span>')
			},
			'st_button_mymarker': {
				text    : '細マ',
				icon    : 'st-svg-user-circle',
				tooltip : '細マ',
				callback: wrapAsHtml('<span class="st-mymarker-s">', '</span>')
			},
			'st_button_count': {
				text    : 'CT',
				icon    : false,
				tooltip : 'カウント',
				callback: wrapAsText('<span class="st-count">', '</span>')
			},
			'st_button_br': {
				text    : 'BR',
				icon    : false,
				tooltip : '改行（599px以下）',
				callback: setAsText('[st-br line_height="3em"]')
			},
			'st_button_photoline': {
				text    : '写真枠',
				icon    : false,
				tooltip : '写真枠',
				callback: wrapAsHtml('<span class="photoline">', '</span>')
			},
			'st_button_kadomaru_bg': {
				text    : 'マイボックス',
				icon    : false,
				tooltip : 'マイボックス',
				callback: wrapAsHtml('[st-mybox title="" webicon="" color="#757575" bordercolor="#f3f3f3" bgcolor="#f3f3f3" borderwidth="0" borderradius="5" titleweight="bold" fontsize="" myclass="st-mybox-class" margin="25px 0 25px 0"]<p>', '</p>[/st-mybox]')
			},
			'st_btnlink_custom_main': {
				text    : 'ボタン',
				icon    : false,
				tooltip : 'ボタン',
				callback: setAsText('[st-mybutton url="#" title="詳しくはコチラ" rel="" webicon="" target="_blank" color="#fff" bgcolor="#e53935" bgcolor_top="#f44336" bordercolor="#e57373" borderwidth="1" borderradius="5" fontsize="" fontweight="bold" width="" webicon_after="st-svg-angle-right" shadow="#c62828" ref="on"]')
			},
			'st_button_blogcard' : {
				text    : 'カード',
				icon    : false,
				tooltip : 'カード',
				callback: wrapAsText('[st-card myclass="" id="', '" label="" pc_height="" name="" bgcolor="" color="" webicon="" readmore="on" thumbnail="on" type=""]')
			},
			'st_button_st_toc' : {
				text    : '目次',
				icon    : 'st-svg-bookmark',
				tooltip : '目次',
				callback: setAsHtml('<p>[st_toc]<p>'),
				enabled : function (definition, definitions) {
					// 目次プラグインが有効の場合
					return (typeof ST !== 'undefined' && ST.st_toc_enabled);
				}
			}
		};
	}

	/**
	 * ボタンを登録
	 */
	function registerButtons(editor, definition) {
		for (var key in definition) {
			if (!Object.prototype.hasOwnProperty.call(definition, key)) {
				continue;
			}

			// enabled?
			if (Object.prototype.hasOwnProperty.call(definition[key], 'enabled')) {
				var enabled = (typeof definition[key].enabled === 'function')
					? definition[key].enabled(definition[key], definition)
					: definition[key].enabled;

				if (!enabled) {
					continue;
				}
			}

			editor.addButton(key, {
				type   : 'button',
				text   : definition[key].text,
				icon   : definition[key].icon,
				tooltip: definition[key].tooltip,
				onclick: definition[key].callback
			});
		}
	}

	/**
	 * リストボックスの values プロパティを生成
	 */
	function generateListBoxValues(definition) {
		var values = [];

		for (var key in definition) {
			if (!Object.prototype.hasOwnProperty.call(definition, key)) {
				continue;
			}

			// enabled?
			if (Object.prototype.hasOwnProperty.call(definition[key], 'enabled')) {
				var enabled = (typeof definition[key].enabled === 'function')
					? definition[key].enabled(definition[key], definition)
					: definition[key].enabled;

				if (!enabled) {
					continue;
				}
			}

			// menu?
			if (Object.prototype.hasOwnProperty.call(definition[key], 'menu')) {
				var menu = generateListBoxValues(definition[key].menu);

				values.push({
					text   : definition[key].text,
					icon   : definition[key].icon,
					tooltip: definition[key].tooltip,
					menu   : menu
				});

				continue;
			}

			values.push({
				text   : definition[key].text,
				icon   : definition[key].icon,
				tooltip: definition[key].tooltip,
				value  : key
			});
		}

		return values;
	}

	/**
	 * リストボックスを登録
	 */
	function registerListItems(editor, definition) {
		editor.addButton('st_listbox_1', {
			type        : 'listbox',
			text        : 'タグ',	// リストボックスのテキスト
			icon        : false,	// リストボックスのアイコン
			values      : generateListBoxValues(definition),
			onPostRender: function () {
				this.value(this.settings.values[0].value);
			},
			onselect    : function (event) {
				var value = (typeof event.control !== 'undefined' && typeof event.control.value === 'function')
					? event.control.value() /* For TinyMCE 4.7.11+. */
					: this.value();

				tinyMCE.execCommand(value, false);
				this.value(null);
			}
		});
	}

	/**
	 * コマンドを登録
	 */
	function registerCommands(editor, definition) {
		for (var key in definition) {
			if (!Object.prototype.hasOwnProperty.call(definition, key)) {
				continue;
			}

			// enabled?
			if (Object.prototype.hasOwnProperty.call(definition[key], 'enabled')) {
				var enabled = (typeof definition[key].enabled === 'function')
					? definition[key].enabled(definition[key], definition)
					: definition[key].enabled;

				if (!enabled) {
					continue;
				}
			}

			// menu?
			if (Object.prototype.hasOwnProperty.call(definition[key], 'menu')) {
				registerCommands(editor, definition[key].menu);

				continue;
			}

			editor.addCommand(key, definition[key].callback);
		}
	}

	/**
	 * プラグイン
	 */
	Plugin = {
		init: function (editor, url) {
			var listItems = getListItemDefinition(editor);
			var buttons   = getButtonDefinition(editor);

			registerCommands(editor, listItems);
			registerCommands(editor, buttons);

			registerListItems(editor, listItems);
			registerButtons(editor, buttons);
		}
	};

	tinymce.create('tinymce.plugins.st', Plugin);
	tinymce.PluginManager.add('st_plugin', tinymce.plugins.st);
}(window, window.document, jQuery, tinymce, ST));
