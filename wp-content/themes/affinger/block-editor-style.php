@chaset "UTF-8";

@font-face {
	font-family: stsvg;
	src:  url('st_svg/fonts/stsvg.eot?plodre');
	src:  url('st_svg/fonts/stsvg.eot?plodre#iefix') format('embedded-opentype'),
	url('st_svg/fonts/stsvg.ttf?plodre') format('truetype'),
	url('st_svg/fonts/stsvg.woff?plodre') format('woff'),
	url('st_svg/fonts/stsvg.svg?plodre#stsvg') format('svg');
	font-weight: normal;
	font-style: normal;
	font-display: block;
}

/* キャプション */
.editor-styles-wrapper figcaption {
	text-align: center;
	color: #757575;
	font-size: .9rem;
}

/* スペーサー */
.editor-styles-wrapper .wp-block-spacer {
	background: #fafafa;
}

/* カウンター */
.editor-styles-wrapper .is-root-container {
	/**
	* カウンター
	*
	* カウント countcnt
	* ステップ stepcnt
	* 画像ブロック imgcounter
	* ランキング ranknumber-h2, ranknumber-h3, ranknumber-h4
	*/
	counter-reset: countcnt stepcnt imgcountcnt ranknumber-h2 ranknumber-h3 ranknumber-h4;
}

/* カラムブロック */
.editor-styles-wrapper .wp-block-columns.is-layout-flex.gap-0 {
	gap: 0;
}

/* WP 6.6: ポップオーバー */
.version-6-6 .edit-post-layout.has-metaboxes .edit-post-visual-editor {
    z-index: 99;
}

<?php
/**
 * ブロックエディター用スタイル
 */

$st_is_ex    = st_is_ver_ex();
$st_is_af    = st_is_ver_af();
$st_is_st    = st_is_ver_st();
$st_is_ex_af = st_is_ver_ex_af();
// カラーパレット
$patterncolors     = st_get_kantan_colors();
// プリセットカラー
$preset_colors  = st_get_preset_colors( st_get_preset_name() );

$key_patterncolor      = $preset_colors['basecolor'];
$main_patterncolor     = $preset_colors['maincolor'];
$sub_patterncolor      = $preset_colors['subcolor'];
$text_patterncolor     = $preset_colors['textcolor'];

function _st_block_editor_style_scope_root_styles( $component_selector ) {
	?>
	.editor-styles-wrapper <?php echo $component_selector; ?> p:not([class*=" is-style-st-paragraph-"]):not(.has-background) {
		padding: 0;
	}
	<?php
}
?>

/* 基本カラー */
.keycolor {
	color: <?php echo $key_patterncolor; ?>;
}
.editor-styles-wrapper .maincolor {
	color: <?php echo $main_patterncolor; ?>;
}
.editor-styles-wrapper .subcolor {
	color: <?php echo $sub_patterncolor; ?>;
}
.editor-styles-wrapper .textcolor {
	color: <?php echo $text_patterncolor; ?>;
}

.editor-styles-wrapper .keycolor-bc {
	background: <?php echo $key_patterncolor; ?>;
}
.editor-styles-wrapper .maincolor-bc {
	background: <?php echo $main_patterncolor; ?>;
}
.editor-styles-wrapper .subcolor-bc {
	background: <?php echo $sub_patterncolor; ?>;
}
.editor-styles-wrapper .textcolor-bc {
	background: <?php echo $text_patterncolor; ?>;
}

.block-editor-writing-flow {
	height: auto;
}

.editor-styles-wrapper,
.editor-post-title__block .editor-post-title__input {
	font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue,Hiragino Kaku Gothic ProN', 'メイリオ', meiryo, sans-serif !important;
	counter-reset: stcnt;
}

.editor-styles-wrapper .wp-block-image div {
	max-width: 100%!important;
}

/* bugs */
.branch-5-6 .block-editor-media-flow__url-input {
	overflow: hidden;
}

/** 調整 5.8~ */

/* ウィジェットブロック */
.wp-block-widget-area h2,
.wp-block-widget-area h3,
.wp-block-widget-area h4,
.wp-block-widget-area h5 {
	margin: inherit!important;
	padding: inherit!important;
	background: inherit!important;
	font-size: inherit!important;
	font-weight: inherit!important;
	border: inherit!important;
	color: inherit!important;
}

.wp-block-widget-area h2:before,
.wp-block-widget-area h3:before,
.wp-block-widget-area h4:before,
.wp-block-widget-area h5:before,
.wp-block-widget-area h2:after,
.wp-block-widget-area h3:after,
.wp-block-widget-area h4:after,
.wp-block-widget-area h5:after {
	content: inherit!important;
}

/* グループブロックのワイド */
:root .editor-styles-wrapper .block-editor-block-list__layout.is-root-container > .wp-block[data-align=full] {
    margin-left: 0;
    margin-right: 0;
}

/* 幅広・ワイドを子要素で重複させない */
.alignwide .alignwide,
.alignfull .alignwide,
.alignwide .alignwide,
.alignfull .alignwide {
	margin-left: inherit;
	margin-right: inherit;
}

/* 埋込URLのwidth */
.wpview {
    box-sizing: border-box;
}

/* 英数字がスマホで改行されない */
.editor-styles-wrapper .wp-block {
	word-break: break-all;
	margin-bottom: 20px;
}

.editor-styles-wrapper .wp-block li {
    margin-bottom: 0;
}

/* float解除 */
.wp-block {
	clear: both;
}

/* プリセットサイズ */
.components-custom-select-control__item {
	font-size: 13px!important;
}

.editor-styles-wrapper ol.wp-block-footnotes li, /* 脚注 */
.editor-styles-wrapper .has-small-font-size {
	font-size: .8em!important;
	line-height: 1.5!important;
}
@media print, screen and (max-width: 599px) {
	.editor-styles-wrapper ol.wp-block-footnotes li, /* 脚注 */
	.editor-styles-wrapper .has-small-font-size {
		font-size: .9em!important;
		line-height: 1.5!important;
	}
}

.editor-styles-wrapper .has-large-font-size {
	font-size: 1.5em!important;
	line-height: 1.5!important;
}

.editor-styles-wrapper .has-huge-font-size {
	font-size: 3em!important;
	line-height: 1.5!important;
}

.editor-styles-wrapper ol.has-huge-font-size,
.editor-styles-wrapper ul.has-huge-font-size {
	font-size: 1.5em!important;
	line-height: 1.5!important;
}

.editor-styles-wrapper .has-small-font-size li {
	font-size: 1em!important;
	line-height: 1.5!important;
}
@media print, screen and (max-width: 599px) {
	.editor-styles-wrapper .has-small-font-size li {
		font-size: .95em!important;
		line-height: 1.5!important;
	}
}

.editor-styles-wrapper .has-large-font-size li {
	font-size: 1em!important;
	line-height: 1.5!important;
}

/* has-large-font-sizeと同じに */
.editor-styles-wrapper .has-huge-font-size li {
	font-size: 1em!important;
	line-height: 1.5!important;
}

/* dashicons */
.editor-styles-wrapper .dashicons,
.editor-styles-wrapper .dashicons-before:before {
    width: inherit;
    height: inherit;
    font-size: inherit;
    vertical-align: inherit;
}

/* Google Material Icons */
.editor-styles-wrapper [class^="material-icons-"],
.editor-styles-wrapper [class*=" material-icons-"] {
	font-family: 'Material Icons';
	font-weight: normal;
	font-style: normal;
	/* font-size: 24px;	Preferred icon size */
	display: inline-block;
	line-height: 1;
	text-transform: none;
	letter-spacing: normal;
	word-wrap: normal;
	white-space: nowrap;
	direction: ltr;

	/* Support for all WebKit browsers. */
	-webkit-font-smoothing: antialiased;
	/* Support for Safari and Chrome. */
	text-rendering: optimizeLegibility;

	/* Support for Firefox. */
	-moz-osx-font-smoothing: grayscale;

	/* Support for IE. */
	font-feature-settings: 'liga';
}

/* 選択中のアイコンを反転 */
.components-dropdown-menu__menu .components-dropdown-menu__menu-item.is-active span,
.components-dropdown-menu__menu .components-menu-item.is-active span,
.components-dropdown-menu__menu .components-dropdown-menu__menu-item.is-active i,
.components-dropdown-menu__menu .components-menu-item.is-active i {
    color: #fff;
    background: #1e1e1e;
    box-shadow: 0 0 0 1px #1e1e1e;
    border-radius: 1px;
}

<?php if ( trim ( $GLOBALS[ 'stdata433' ] ) !== '' ): // 投稿画面の幅 ?>
	.editor-post-title,
	.branch-5-4 .block-editor-block-list__layout,
	.editor-styles-wrapper .block-editor-block-list__layout.is-root-container {
		<?php if ( isset ( $GLOBALS[ 'stdata433' ] ) && $GLOBALS[ 'stdata433' ] > 200 ): // 投稿画面の幅
			$wp_block_width = intval( $GLOBALS[ 'stdata433' ] );
			$wp_block_max_width = $wp_block_width + 280 + 160 + 100; // 投稿画面の幅 + ブロックメニュー右 + メニュー左 + 調整幅
		else:
			$wp_block_width = '90%';
			$wp_block_max_width = '';
		endif;
		?>
		max-width: <?php echo $wp_block_width; ?>px;
		min-width: 200px;
		margin-left: auto;
		margin-right: auto;
	}

	<?php if ( $wp_block_max_width ): // 投稿画面の幅指定より画面が小さい場合 ?>
		@media print, screen and (max-width: <?php echo $wp_block_max_width; ?>px ) {
			.editor-post-title,
			.branch-5-4 .block-editor-block-list__layout,
			.editor-styles-wrapper .block-editor-block-list__layout.is-root-container {
				max-width: 90%;
				box-sizing: border-box;
				margin-left: auto;
				margin-right: auto;
			}
		}
	<?php endif; ?>

<?php else: ?>

	.editor-post-title,
	.branch-5-4 .block-editor-block-list__layout,
	.editor-styles-wrapper .block-editor-block-list__layout.is-root-container {
		max-width: 90%;
		box-sizing: border-box;
		margin-left: auto;
		margin-right: auto;
	}

<?php endif; ?>

@media print, screen and (max-width: 599px) {
	.interface-interface-skeleton__editor,
	.editor-post-title,
	.branch-5-4 .block-editor-block-list__layout,
	.editor-styles-wrapper .block-editor-block-list__layout.is-root-container {
		width: 100%;
		max-width: 100%;
		min-width: 100%;
		margin-left: auto;
		margin-right: auto;
		box-sizing: border-box;
		overflow: hidden;
	}
}

.editor-styles-wrapper .is-style-st-photohu,
.editor-styles-wrapper .st-photohu,
.editor-styles-wrapper .wp-block:not(.editor-post-title):not(.st-mybtn):not(.st-mybox):not(.block-list-appender) {
	width: 100%;
	max-width: 100%;
}

.editor-styles-wrapper .st-mybox {
	max-width: 100%;
}

/* mceボタンのテキスト位置調整 */
.mce-container, .mce-container *, .mce-widget, .mce-widget *, .mce-reset {
	vertical-align: middle!important;
}

/* クイックタグのアイコン位置調整 */
.mce-menu-has-icons i.mce-ico {
	line-height: .8!important;
}

/* ブロックツールメニューのstickyに対するmceメニュー調整 */
/** sticky位置で調整 */
.block-library-classic__toolbar:not(.tma-classic-paragraph__toolbar) { /* tiny mce advanced 除外 */
	top: 51px;
}

.block-editor-block-contextual-toolbar .block-editor-block-toolbar {
	width: 100%;
	background: #fff;
}
div.mce-toolbar-grp {
	border-top: 1px solid #ddd;
}

/** mce余白調整 */
div.mce-toolbar-grp {
	padding: 5px 0;
}

/** mceTemp */
.wp-block-freeform.block-library-rich-text__tinymce div.mceTemp {
    max-width: 100%;
}

/* リスト */
.editor-styles-wrapper ul ul,
.editor-styles-wrapper ol ul {
    list-style-type: disc!important;
	padding-top: 5px;
}

.editor-styles-wrapper ul ol,
.editor-styles-wrapper ol ol {
	padding-top: 5px;
}

.editor-styles-wrapper ul.has-background,
.editor-styles-wrapper ol.has-background {
    padding: 1.5em 2em 2em 3em;
}

/*-------------------------------------------
 * カラーパターンに応じて初期カラーを設定
 *-------------------------------------------/

/* 見出しスタイル - カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count::before {
	color: <?php echo $main_patterncolor; ?>;
	border-color: <?php echo $main_patterncolor; ?>;
}

/*--------------------------------
Gutenberg カラーパレット
---------------------------------*/
/* テキスト色 */
.editor-styles-wrapper .has-soft-red-color {
	color: <?php echo ST_COLOR_SOFT_RED; ?> !important;
}

.editor-styles-wrapper .has-light-grayish-red-color {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?> !important;
}

.editor-styles-wrapper .has-vivid-yellow-color {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?> !important;
}

.editor-styles-wrapper .has-very-pale-yellow-color {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?> !important;
}

.editor-styles-wrapper .has-light-green-cyan-color {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
}

.editor-styles-wrapper .has-pale-cyan-blue-color {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}

.editor-styles-wrapper .has-vivid-cyan-blue-color {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?> !important;
}

.editor-styles-wrapper .has-very-light-gray-color {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?> !important;
}

.editor-styles-wrapper .has-very-dark-gray-color {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?> !important;
}

.editor-styles-wrapper .has-white-color {
	color: <?php echo ST_COLOR_WHITE; ?> !important;
}

/* 背景色 */
.editor-styles-wrapper .has-soft-red-background-color {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?> !important;
}

.editor-styles-wrapper .has-light-grayish-red-background-color {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?> !important;
}

.editor-styles-wrapper .has-vivid-yellow-background-color {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?> !important;
}

.editor-styles-wrapper .has-very-pale-yellow-background-color {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?> !important;
}

.editor-styles-wrapper .has-light-green-cyan-background-color {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
}

.editor-styles-wrapper .has-pale-cyan-blue-background-color {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}

.editor-styles-wrapper .has-vivid-cyan-blue-background-color {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?> !important;
}

.editor-styles-wrapper .has-very-light-gray-background-color {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?> !important;
}

.editor-styles-wrapper .has-very-dark-gray-background-color {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?> !important;
}

.editor-styles-wrapper .has-white-background-color {
	background-color: <?php echo ST_COLOR_WHITE; ?> !important;
}

/* 枠線色 */
.editor-styles-wrapper .has-soft-red-border-color {
	border-color: <?php echo ST_COLOR_SOFT_RED; ?> !important;
}

.editor-styles-wrapper .has-light-grayish-red-border-color {
	border-color: <?php echo ST_COLOR_LIGHT_G_RED; ?> !important;
}

.editor-styles-wrapper .has-vivid-yellow-border-color {
	border-color: <?php echo ST_COLOR_VIVID_YELLOW; ?> !important;
}

.editor-styles-wrapper .has-very-pale-yellow-border-color {
	border-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?> !important;
}

.editor-styles-wrapper .has-light-green-cyan-border-color {
	border-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
}

.editor-styles-wrapper .has-pale-cyan-blue-border-color {
	border-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}

.editor-styles-wrapper .has-vivid-cyan-blue-border-color {
	border-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?> !important;
}

.editor-styles-wrapper .has-very-light-gray-border-color {
	border-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?> !important;
}

.editor-styles-wrapper .has-very-dark-gray-border-color {
	border-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?> !important;
}

.editor-styles-wrapper .has-white-border-color {
	border-color: <?php echo ST_COLOR_WHITE; ?> !important;
}

<?php if ( _st_plugin_support_is_enabled( 'ST_BLOCKS', 'st-blocks' ) ): ?>
	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-pale-pink-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-pale-pink-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_PALE_PINK; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-soft-red-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-soft-red-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-light-grayish-red-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-light-grayish-red-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-vivid-yellow-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-vivid-yellow-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-very-pale-yellow-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-very-pale-yellow-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-light-green-cyan-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-light-green-cyan-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-pale-cyan-blue-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-pale-cyan-blue-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-vivid-cyan-blue-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-vivid-cyan-blue-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-very-light-gray-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-very-light-gray-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-very-dark-gray-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-very-dark-gray-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-white-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-white-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_WHITE; ?>;
	}

	/* タブ > タブブロック > ブロックスタイル: プレビュー */
	.editor-styles-wrapper .wp-block-st-blocks-tabs.is-preview.is-style-st-square {
		background-image: url(./images/st-blocks/tabs/preview-is-style-st-square.png);
	}

	.editor-styles-wrapper .wp-block-st-blocks-tabs.is-preview.is-style-st-bubble {
		background-image: url(./images/st-blocks/tabs/preview-is-style-st-bubble.png);
	}

	.editor-styles-wrapper .wp-block-st-blocks-tabs.is-preview.is-style-st-tab {
		background-image: url(./images/st-blocks/tabs/preview-is-style-st-tab.png);
	}

	.editor-styles-wrapper .wp-block-st-blocks-tabs.is-preview.is-style-st-border {
		background-image: url(./images/st-blocks/tabs/preview-is-style-st-border.png);
	}
<?php endif; ?>

/** インラインの文字色（カラーパレット） */
.editor-styles-wrapper .has-inline-color.has-pale-pink-color {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper .has-inline-color.has-soft-red-color {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper .has-inline-color.has-light-grayish-red-color {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper .has-inline-color.has-vivid-yellow-color {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper .has-inline-color.has-very-pale-yellow-color {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper .has-inline-color.has-light-green-cyan-color {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper .has-inline-color.has-pale-cyan-blue-color {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .has-inline-color.has-vivid-cyan-blue-color {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .has-inline-color.has-very-light-gray-color {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper .has-inline-color.has-very-dark-gray-color {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper .has-inline-color.has-white-color {
	color: <?php echo ST_COLOR_WHITE; ?>;
}

/** カラーパレット（文字色）選択時のアイコン */
.editor-styles-wrapper .is-style-st-quote-line.has-pale-pink-color::before {
	border-left-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-soft-red-color::before {
	border-left-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-light-grayish-red-color::before {
	border-left-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-vivid-yellow-color::before {
	border-left-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-very-pale-yellow-color::before {
	border-left-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-light-green-cyan-color::before {
	border-left-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper .is-style-st-quote-line.has-pale-cyan-blue-color::before {
	border-left-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-vivid-cyan-blue-color::before {
	border-left-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-very-light-gray-color::before {
	border-left-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-very-dark-gray-color::before {
	border-left-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-white-color::before {
	border-left-color: <?php echo ST_COLOR_WHITE; ?>;
}

/** カラーパレット（文字色）選択時のアイコン */
.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-pale-pink-color::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-soft-red-color::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-light-grayish-red-color::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-vivid-yellow-color::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-very-pale-yellow-color::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-light-green-cyan-color::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-pale-cyan-blue-color::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-vivid-cyan-blue-color::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-very-light-gray-color::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-very-dark-gray-color::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-white-color::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット選択時の見出しライン */
.editor-styles-wrapper .is-style-st-heading-custom-line.has-pale-pink-color::after {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-soft-red-color::after {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-light-grayish-red-color::after {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-vivid-yellow-color::after {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-very-pale-yellow-color::after {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-light-green-cyan-color::after {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-pale-cyan-blue-color::after {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-vivid-cyan-blue-color::after {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-very-light-gray-color::after {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-very-dark-gray-color::after {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-line.has-white-color::after {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット（背景色）選択時のふきだし */
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-pale-pink-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-pale-pink-background-color::after {
	border-right-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-pale-pink-background-color::after {
	border-top-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-pale-pink-background-color::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-pale-pink-background-color::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-pale-pink-background-color::after {
    border-color: <?php echo ST_COLOR_PALE_PINK; ?>;
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-soft-red-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-soft-red-background-color::after {
	border-right-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-soft-red-background-color::after {
	border-top-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-soft-red-background-color::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-soft-red-background-color::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-soft-red-background-color::after {
    border-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}


.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-light-grayish-red-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-light-grayish-red-background-color::after {
	border-right-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-light-grayish-red-background-color::after {
	border-top-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-light-grayish-red-background-color::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-light-grayish-red-background-color::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-light-grayish-red-background-color::after {
    border-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-vivid-yellow-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-vivid-yellow-background-color::after {
	border-right-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-vivid-yellow-background-color::after {
	border-top-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-vivid-yellow-background-color::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-vivid-yellow-background-color::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-vivid-yellow-background-color::after {
    border-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-pale-yellow-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-pale-yellow-background-color::after {
	border-right-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-very-pale-yellow-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-very-pale-yellow-background-color::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-very-pale-yellow-background-color::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-very-pale-yellow-background-color::after {
    border-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-light-green-cyan-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-light-green-cyan-background-color::after {
	border-right-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-light-green-cyan-background-color::after {
	border-top-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-light-green-cyan-background-color::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-light-green-cyan-background-color::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-light-green-cyan-background-color::after {
    border-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-pale-cyan-blue-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-pale-cyan-blue-background-color::after {
	border-right-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-pale-cyan-blue-background-color::after {
	border-top-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-pale-cyan-blue-background-color::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-pale-cyan-blue-background-color::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-pale-cyan-blue-background-color::after {
    border-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-vivid-cyan-blue-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-vivid-cyan-blue-background-color::after {
	border-right-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-vivid-cyan-blue-background-color::after {
	border-top-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-vivid-cyan-blue-background-color::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-vivid-cyan-blue-background-color::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-vivid-cyan-blue-background-color::after {
    border-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-light-gray-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-light-gray-background-color::after {
	border-right-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-very-light-gray-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-very-light-gray-background-color::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-very-light-gray-background-color::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-very-light-gray-background-color::after {
    border-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-dark-gray-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-dark-gray-background-color::after {
	border-right-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-very-dark-gray-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-very-dark-gray-background-color::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-very-dark-gray-background-color::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-very-dark-gray-background-color::after {
    border-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-white-background-color::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-white-background-color::after {
	border-right-color: <?php echo ST_COLOR_WHITE; ?>;
}
/* 見出しふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-white-background-color::after {
	border-top-color: <?php echo ST_COLOR_WHITE; ?>;
}
/* カウント */
.editor-styles-wrapper .is-style-st-heading-custom-count.has-white-background-color::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
}
/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step.has-white-background-color::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
}
.editor-styles-wrapper .is-style-st-heading-custom-step.has-white-background-color::after {
    border-color: <?php echo ST_COLOR_WHITE; ?>;
	color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット（背景色）選択時の会話ふきだし背景色 */
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-pale-pink-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-pale-pink-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-pale-pink-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-pale-pink-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-soft-red-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-soft-red-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-soft-red-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-soft-red-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-light-grayish-red-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-light-grayish-red-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-light-grayish-red-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-light-grayish-red-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-vivid-yellow-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-vivid-yellow-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-vivid-yellow-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-vivid-yellow-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-pale-yellow-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-pale-yellow-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-pale-yellow-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-pale-yellow-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-light-green-cyan-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-light-green-cyan-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-light-green-cyan-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-light-green-cyan-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-pale-cyan-blue-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-pale-cyan-blue-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-pale-cyan-blue-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-pale-cyan-blue-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-vivid-cyan-blue-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-vivid-cyan-blue-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-vivid-cyan-blue-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-vivid-cyan-blue-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-light-gray-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-light-gray-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-light-gray-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-light-gray-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-dark-gray-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-dark-gray-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-very-dark-gray-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-very-dark-gray-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-white-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-white-background-color,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-white-background-color .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-white-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
}

/** カラーパレット（文字色）選択時のアイコン */
.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-pale-pink-color::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
	border-right-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-soft-red-color::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
	border-right-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-light-grayish-red-color::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	border-right-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-vivid-yellow-color::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	border-right-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-very-pale-yellow-color::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	border-right-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-light-green-cyan-color::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
	border-right-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-pale-cyan-blue-color::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	border-right-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-vivid-cyan-blue-color::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	border-right-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-very-light-gray-color::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	border-right-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-very-dark-gray-color::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	border-right-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-white-color::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
	border-right-color: <?php echo ST_COLOR_WHITE; ?>;
}


/** カラーパレット選択時のbox-shadow */
.editor-styles-wrapper .is-style-st-paragraph-dotline.has-pale-pink-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-soft-red-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-light-grayish-red-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-vivid-yellow-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-very-pale-yellow-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-light-green-cyan-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-pale-cyan-blue-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-vivid-cyan-blue-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-very-light-gray-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-very-dark-gray-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-dotline.has-white-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_WHITE; ?>;
}


/* カラーパレット選択時の吹き出し */
.editor-styles-wrapper .is-style-st-paragraph-bubble.has-pale-pink-background-color::after {
	border-top-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-soft-red-background-color::after {
	border-top-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-light-grayish-red-background-color::after {
	border-top-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-vivid-yellow-background-color::after {
	border-top-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-very-pale-yellow-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-light-green-cyan-background-color::after {
	border-top-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-pale-cyan-blue-background-color::after {
	border-top-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-vivid-cyan-blue-background-color::after {
	border-top-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-very-light-gray-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-very-dark-gray-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-white-background-color::after {
	border-top-color: <?php echo ST_COLOR_WHITE; ?>;
}

<?php if( trim($GLOBALS['stdata460']) !== '' ): //カラーA ?>
	.editor-styles-wrapper .has-inline-color.has-original-color-a-color {
		color: color<?php echo $GLOBALS['stdata460']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata461']) !== '' ): //カラーB ?>
	.editor-styles-wrapper .has-inline-color.has-original-color-b-color {
		color: color<?php echo $GLOBALS['stdata461']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata462']) !== '' ): //カラーC ?>
	.editor-styles-wrapper .has-inline-color.has-original-color-c-color {
		color: color<?php echo $GLOBALS['stdata462']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata463']) !== '' ): //カラーD ?>
	.editor-styles-wrapper .has-inline-color.has-original-color-d-color {
		color: color<?php echo $GLOBALS['stdata463']; ?>;
	}
<?php endif; ?>

/* オリジナルアイコンサイズ調整 */
.editor-styles-wrapper .st-svg-youtube-inbox::before,
.editor-styles-wrapper .st-svg-youtube-play::before,
.editor-styles-wrapper .st-svg-toggle-on::before,
.editor-styles-wrapper .st-svg-quote-left::before,
.editor-styles-wrapper .st-svg-quote-right::before,
.editor-styles-wrapper .st-svg-newspaper-o::before,
.editor-styles-wrapper .st-svg-folder::before,
.editor-styles-wrapper .st-svg-envelope::before,
.editor-styles-wrapper .st-svg-envelope-o::before,
.editor-styles-wrapper .st-svg-credit-card-alt::before,
.editor-styles-wrapper .st-svg-get-pocket::before,
.editor-styles-wrapper .st-svg-twitter::before,
.editor-styles-wrapper .st-svg-list-ul::before {
  font-size: .85em;
}

/* オリジナルブロックの余白 */
.editor-styles-wrapper .wp-block-st-blocks-memo .block-list-appender,
.editor-styles-wrapper .wp-block-st-blocks-flexbox .block-list-appender,
.editor-styles-wrapper .wp-block-st-blocks-midashi-box .block-list-appender,
.editor-styles-wrapper .wp-block-st-blocks-my-box .block-list-appender,
.editor-styles-wrapper .st-kaiwa-box .block-list-appender,
.editor-styles-wrapper .wp-block-st-blocks-my-button .block-list-appender {
    margin: 0;
}

/* 記事タイトル */
.editor-post-title {
	/* コードエディター */
	margin-bottom: 20px;
	line-height: 1.5;
}

.editor-post-title__block .editor-post-title__input {
	/* ビジュアルエディター */
	font-size: 2em!important;
	border-bottom: 1px solid #ebebeb;
	margin-bottom: 20px;
}

<?php if ( isset( $GLOBALS['stdata501'] ) && $GLOBALS['stdata501'] === 'yes' ): // 「ブロックタイプ又はスタイルを変更」の項目をシンプルにする ?>
	.block-editor-block-switcher__styles__menugroup,
	.components-dropdown-menu__menu .components-menu-item__button.editor-block-list-item-buttons,
	.components-dropdown-menu__menu .components-menu-item__button.editor-block-list-item-preformatted,
	.components-dropdown-menu__menu .components-menu-item__button.editor-block-list-item-pullquote,
	.components-dropdown-menu__menu .components-menu-item__button.editor-block-list-item-verse {
		display: none !important;
	}

	.components-dropdown-menu__menu .components-menu-item__button.editor-block-list-item-group,
	.components-dropdown-menu__menu .components-menu-item__button.editor-block-list-item-code,
	.components-dropdown-menu__menu .components-menu-item__button.editor-block-list-item-columns,
	.components-dropdown-menu__menu .components-menu-item__button[class*="editor-block-list-item-st-blocks-"] {
		display: block !important;
	}

	.block-editor-block-switcher__transforms__menugroup:first-child .components-menu-group__label {
		margin-bottom: 0;
	}

	.block-editor-block-switcher__transforms__menugroup + .block-editor-block-switcher__transforms__menugroup {
		margin-bottom: -8px;
	}
<?php endif; ?>

<?php if ( isset( $GLOBALS['stdata655'] ) && $GLOBALS['stdata655'] === 'yes' ): // ブロックエリアのホバー時に枠線を表示する ?>
	.is-root-container .wp-block:hover {
		outline: 2px solid #eee;
	}
<?php endif; ?>

/* ドロップダウンスタイルプレビューの高さ */
.block-editor-block-switcher__popover .block-editor-block-styles {
	max-height: 120px;
}

/* カバーブロック */
.editor-styles-wrapper .wp-block-cover .has-large-font-size,
.editor-styles-wrapper .wp-block-cover-image .has-large-font-size {
    line-height: 1.5em;
}

.editor-styles-wrapper ul.has-background,
.editor-styles-wrapper ol.has-background {
	padding-left: 1.5em 2em 2em 3em;
}

.editor-styles-wrapper .is-style-st-kaisou.has-background,
.editor-styles-wrapper .is-style-st-komejirusi-list.has-background,
.editor-styles-wrapper .is-style-st-correct-list.has-background,
.editor-styles-wrapper .is-style-st-wrong-list.has-background,
.editor-styles-wrapper .is-style-st-circle.has-background,
.editor-styles-wrapper .is-style-st-circle-border.has-background,
.editor-styles-wrapper .is-style-st-square-checkbox-no-border.has-background,
.editor-styles-wrapper .is-style-st-square-checkbox.has-background,
.editor-styles-wrapper .is-style-st-maruck.has-background,
.editor-styles-wrapper .is-style-st-maruno.has-background,
.editor-styles-wrapper .is-style-st-no.has-background,
.editor-styles-wrapper .is-style-st-no-border.has-background {
	padding: 1.5em 2em 2em 1.5em;
}

/*--------------------------------
ボーダー
---------------------------------*/
.editor-styles-wrapper .has-st-border {
	<?php if ( trim( $GLOBALS['stdata502'] ) !== '' ): ?>
		border: 1px <?php echo $GLOBALS['stdata502']; ?> solid;
	<?php else: ?>
		border: 1px #eee solid;
	<?php endif; ?>
	<?php if ( trim( $GLOBALS['stdata503'] ) !== '' ): ?>
		border-radius: <?php echo $GLOBALS['stdata503']; ?>px;
	<?php endif; ?>
	padding: 1.5em 2em 2em 3em;
}

.editor-styles-wrapper .is-style-st-kaisou.has-st-border,
.editor-styles-wrapper .is-style-st-komejirusi-list.has-st-border,
.editor-styles-wrapper .is-style-st-correct-list.has-st-border,
.editor-styles-wrapper .is-style-st-wrong-list.has-st-border,
.editor-styles-wrapper .is-style-st-circle.has-st-border,
.editor-styles-wrapper .is-style-st-circle-border.has-st-border,
.editor-styles-wrapper .is-style-st-square-checkbox-no-border.has-st-border,
.editor-styles-wrapper .is-style-st-square-checkbox.has-st-border,
.editor-styles-wrapper .is-style-st-maruck.has-st-border,
.editor-styles-wrapper .is-style-st-maruno.has-st-border,
.editor-styles-wrapper .is-style-st-no.has-st-border,
.editor-styles-wrapper .is-style-st-no-border.has-st-border {
	padding: 1.5em 2em 2em 1.5em;
}

.editor-styles-wrapper .is-style-st-timeline-list.has-background,
.editor-styles-wrapper .is-style-st-timeline-count.has-background,
.editor-styles-wrapper .is-style-st-timeline-list.has-st-border,
.editor-styles-wrapper .is-style-st-timeline-count.has-st-border {
	padding: 1.5em 2em 2em 2.5em;
}

.editor-styles-wrapper .has-st-solid-border {
	border-style: solid;
}

.editor-styles-wrapper .has-st-dashed-border {
	border-style: dashed;
}

.editor-styles-wrapper .has-st-medium-border-width {
	border-width: 1px;
}

.editor-styles-wrapper .has-st-thick-border-width {
	border-width: 5px;
}

/*--------------------------------
リスト
---------------------------------*/

/*--------------------------------
editor-style.css
---------------------------------*/

.editor-styles-wrapper .mce-content-body div {
	padding: 10px;
	border:1px #ccc dotted;
	margin-bottom: 20px;
}

.editor-styles-wrapper pre {
	background: #fafafa;
	padding: 20px;
	margin-bottom: 20px;
}

hr {
	height: 1px;
	background-color: #E0E0E0;
	border: none;
	margin: 40px 0;
}

/* TinyMCE Advanced調整 */
.mce-toolbar-grp .mce-flow-layout-item {
	display: block;
}

.editor-styles-wrapper .st-animate::before {
	content: '動';
	color: #fff;
	font-size: 80%;
	background: #81D4FA;
	font-weight: normal;
	padding:1px 3px;
}

.editor-styles-wrapper .ephox-snooker-resizer-bar {
	margin: 0;
	padding: 0;
}

/* 背景ワイド */
.editor-styles-wrapper .is-style-st-wide-background {
	padding: 20px;
	margin-left: 0!important;
	margin-right: 0!important;
	box-sizing: border-box;
}

.editor-styles-wrapper .is-style-st-wide-background-left {
	padding: 20px;
	margin-left: 0!important;
	margin-right: 20px!important;
	box-sizing: border-box;
}

.editor-styles-wrapper .is-style-st-wide-background-right {
	padding: 20px;
	margin-left: 20px!important;
	margin-right: 0!important;
	box-sizing: border-box;
}

.editor-styles-wrapper .is-style-st-wide-background:not(.is-style-st-group-bg-diagonal):not(.is-style-st-group-bg-grid):not(.is-style-st-group-bg-dot):not(.is-style-st-group-line):not(.is-style-st-group-line-bold):not(.is-style-st-group-corner-brackets):not(.is-style-st-group-square-brackets),
.editor-styles-wrapper .is-style-st-wide-background-left:not(.is-style-st-group-bg-diagonal):not(.is-style-st-group-bg-grid):not(.is-style-st-group-bg-dot):not(.is-style-st-group-line):not(.is-style-st-group-line-bold):not(.is-style-st-group-corner-brackets):not(.is-style-st-group-square-brackets),
.editor-styles-wrapper .is-style-st-wide-background-right:not(.is-style-st-group-bg-diagonal):not(.is-style-st-group-bg-grid):not(.is-style-st-group-bg-dot):not(.is-style-st-group-line):not(.is-style-st-group-line-bold):not(.is-style-st-group-corner-brackets):not(.is-style-st-group-square-brackets) {
	background: #fafafa;
}

/* 挿入アイコン2 */
.editor-styles-wrapper .hatenamark2::before {
	content: "\f059";
	font-family: stsvg;
	margin-right: 7px;
}

.editor-styles-wrapper .attentionmark2::before {
	content: "\f06a";
	font-family: stsvg;
	margin-right: 7px;
}

.editor-styles-wrapper .usermark2::before {
	content: "\f2bd";
	font-family: stsvg;
	margin-right: 7px;
}

.editor-styles-wrapper .memomark2::before {
	content: "\f044";
	font-family: stsvg;
	margin-right: 7px;
}

.editor-styles-wrapper .checkmark2::before {
	content: "\f058";
	font-family: stsvg;
	margin-right: 7px;
}

.editor-styles-wrapper .bigginermark::before {
	content: "\e904";
	font-family: stsvg;
	margin-right: 7px;
}

.editor-styles-wrapper .oukanmark::before {
	content: "\e909";
	font-family: stsvg;
	margin-right: 7px;
}

.editor-styles-wrapper .st-svg-question-circle,
.editor-styles-wrapper .st-svg-check-circle,
.editor-styles-wrapper .st-svg-exclamation-triangle,
.editor-styles-wrapper .st-svg-exclamation-circle,
.editor-styles-wrapper .st-svg-pencil-square-o,
.editor-styles-wrapper .st-svg-user,
.editor-styles-wrapper .st-svg-biggner::before {
	margin-right: 7px;
}

/*カウント*/
.editor-styles-wrapper .st-count {
	counter-increment: stcnt;
}

.editor-styles-wrapper .st-count::before {
    content: counter(stcnt)". ";
    font-size: 130%;
    margin-right: 5px;
    font-family: Arial, sans-serif;
}

.editor-styles-wrapper .st-count-reset {
	counter-reset: stcnt;
}

/* editor-style用初心者マークカラー */
.editor-styles-wrapper .st-svg-biggner {
	position: relative;
}
.editor-styles-wrapper .st-svg-biggner::before {
	margin-right: 7px;
}

/*スライドボックス*/
.editor-styles-wrapper .st-slidebox-c {
	padding: 15px;
	background: #fafafa;
	margin-bottom: 20px;
	border-radius: 5px;
}
.editor-styles-wrapper .st-btn-open {
	display: flex;
	align-items: center;
	margin: 0;
}
.editor-styles-wrapper .st-slidebox {
	padding-top: 10px;
}
.editor-styles-wrapper .st-slidebox > .block-editor-inner-blocks > .block-editor-block-list__layout > p:first-child {
	margin-top: 0;
}
.editor-styles-wrapper .st-slidebox > .block-editor-inner-blocks > .block-editor-block-list__layout > p:last-child {
	margin-bottom: 0;
}
.st-btn-open .st-fa,
.st-btn-open .fa {
	margin-right: 5px;
}
.editor-styles-wrapper .st-slidebox-c.is-st-toggle-position-center .st-btn-open {
	justify-content: center;
}
.editor-styles-wrapper .st-slidebox-c.is-st-toggle-position-right .st-btn-open {
	justify-content: flex-end;
	text-align: right;
}
.st-slidebox-c.is-st-toggle-text-bold .st-slidebox-btn-text,
.st-slidebox-c.is-st-toggle-text-bold .st-slidebox-btn-text {
	font-weight: bold;
}
.editor-styles-wrapper .st-slidebox-c.is-st-toggle-position-left.is-st-toggle-icon-position-right .st-slidebox-btn-text,
.editor-styles-wrapper .st-slidebox-c.is-st-toggle-position-right.is-st-toggle-icon-position-left .st-slidebox-btn-text {
	flex-grow: 1;
}
.editor-styles-wrapper .st-slidebox-c.is-st-toggle-icon-position-right .st-fa,
.editor-styles-wrapper .st-slidebox.is-st-toggle-icon-positcion-right .fa {
	margin-right: 0;
	margin-left: 5px;
	order: 2;
}

/*メモボックス*/
.editor-styles-wrapper .st-memobox2 {
	position: relative;
	margin: 20px 0;
	padding: 20px 20px 0;
	border: solid 1px #9E9E9E;
	border-radius: 0;
}

.editor-styles-wrapper .st-memobox2 .st-fa,
.editor-styles-wrapper .st-memobox2 .fa {
	margin-right: 5px;
}

.editor-styles-wrapper .st-memobox2 .st-memobox-title {
	position: absolute;
	display: inline-block;
	top: -8px;
	left: 10px;
	padding: 0 9px;
	line-height: 1;
	background: #FFF;
	color: #000;
	font-weight: normal;
	font-size: 90%;
}

.editor-styles-wrapper .st-memobox2 .st-memobox-title::before {
	content: "\f0f6\00a0";
	font-family: stsvg;
}
/*旧メモボックス*/
.editor-styles-wrapper .st-memobox {
	position: relative;
	margin: 20px 0;
	padding: 20px 20px 0;
	border: solid 2px #9E9E9E;
	border-radius: 8px;
}

.editor-styles-wrapper .st-memobox .st-fa,
.editor-styles-wrapper .st-memobox .fa {
	margin-right: 5px;
}

.editor-styles-wrapper .st-memobox .st-memobox-title {
	position: absolute;
	display: inline-block;
	top: -8px;
	left: 10px;
	padding: 0 9px;
	line-height: 1;
	background: #FFF;
	color: #9E9E9E;
	font-weight: bold;
}

/*参照リンク*/
.editor-styles-wrapper .st-share {
	background: #fafafa;
	padding: 5px;
	border-radius: 3px;
	font-size: 95%;
	line-height: 1.7;
}
.editor-styles-wrapper .st-share::before {
	content: "\00a0\00a0\f0c1\00a0\00a0\00a0";
	font-family: stsvg;
	color: #9E9E9E;
}

/* こんな方におすすめ */
.editor-styles-wrapper .st-blackboard {
	padding: 10px 20px 0px;
	border: 3px solid #f3f3f3;
	background: #fff;
	margin: 30px 0;
	border-radius: 0;
}

.editor-styles-wrapper .st-blackboard-title-box {
	text-align: center;
	margin-bottom: 10px;
}

.editor-styles-wrapper .st-blackboard-title {
	color: #424242;
	display: inline-block;
	border-bottom:2px solid #424242;
	font-weight: bold;
	text-align: center;
	padding:10px 10px 5px;
	background: #fff;
}

.editor-styles-wrapper .st-blackboard-title::before {
	content: "\f0f6\00a0\00a0";
	font-family: stsvg;
}

.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ol.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
	padding-left: 20px;
}

.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
	padding-left: 30px;
}

.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li,
.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li:last-child {
	border-bottom:dotted 1px #ccc;
	line-height: 1.3;
	padding:10px 0;
	margin: 0;
	list-style: none;
	text-indent: -1.3em;
	padding-left: 1.3em;
}

.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ol.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li,
.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ol.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li:last-child {
	border-bottom:dotted 1px #ccc;
	line-height: 1.3;
	padding:10px 0;
	margin: 0;
}

.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
	content: "\f058\00a0\00a0";
	font-family: stsvg;
	color: #ff0000;
}

.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no).st-no-ck li,
.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no).st-no-ck li:last-child {
	text-indent: 0;
	padding-left: 0;
}

.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ul.st-blackboard-list.st-no-ck li::before {
	content: none;
}

/* リストを削除するクラス */
.editor-styles-wrapper .st-blackboard .st-no-ck li::before {
	content: none!important;
}

.editor-styles-wrapper .st-blackboard .st-no-ck li {
	padding-left: 0!important;
}

/* こんな方におすすめ（チェックボックス） */
.editor-styles-wrapper .st-blackboard.square-checkbox {
	padding:30px 30px 15px;
	box-sizing: border-box;
	margin-bottom: 20px;
}

.editor-styles-wrapper .st-blackboard.square-checkbox ul li {
	position: relative;
	display: block;
	line-height: 1.5;
	border-bottom: 1px dashed #ccc;
	margin-bottom: 0.5em;
	padding-top: .25em;
	padding-bottom: 0.75em;
	padding-left: calc(1em + 15px);
}

.editor-styles-wrapper .st-blackboard.square-checkbox ul:not(.toc_list):not(.st_toc_list):not(.children) {
	display: block;
	margin-bottom: 0;
	padding:10px 0 0;
}

.editor-styles-wrapper .st-blackboard.square-checkbox ul li:last-child {
	margin-bottom: 15px;
	padding-bottom: 0.75em;
}

.editor-styles-wrapper .st-blackboard.square-checkbox ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
	position: absolute;
	top: .5em;
	left: .4em;
	content: "\f00c";
	font-family: stsvg;
	color: #ff0000;
	z-index: 2;
	margin-right: 15px;
	font-size: 90%;
	line-height: 1.5;
}

.editor-styles-wrapper .st-blackboard.square-checkbox ul li::after {
	content: "\e904";
	font-family: stsvg;
	color: #ccc;
	position: absolute;
	z-index: 1;
	left: 0;
	top: 0;
	font-size: 150%;
	line-height: 1.5;
}

/* チェックボックス */
.editor-styles-wrapper .st-square-checkbox:not(.st-square-checkbox-nobox) {
	border: 3px solid #f3f3f3;
	padding:30px 30px 15px;
	box-sizing: border-box;
	margin-bottom: 20px;
}

.editor-styles-wrapper .st-square-checkbox ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list),
.st-square-checkbox:not(.st-square-checkbox-nobox) ul {
	margin-bottom: 0;
}

.editor-styles-wrapper .st-square-checkbox.st-square-checkbox-nobox li:last-child,
.editor-styles-wrapper .st-square-checkbox.st-square-checkbox-nobox li:last-child {
	margin-bottom: 0;
}

.editor-styles-wrapper .st-square-checkbox div {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: inherit;
	line-height: inherit;
}

.editor-styles-wrapper .st-square-checkbox.st-bold > li {
	font-weight: bold;
}

.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li,
.editor-styles-wrapper .is-style-st-square-checkbox > li,
.editor-styles-wrapper .st-square-checkbox ul li, /* チェックボックス（番号なしリスト）Classic */
.editor-styles-wrapper .st-square-checkbox > li {
	position:relative;
	display: block;
	line-height: 1.5;
}

.editor-styles-wrapper .is-style-st-square-checkbox > li,
.editor-styles-wrapper .st-square-checkbox ul li, /* チェックボックス（番号なしリスト）Classic */
.editor-styles-wrapper .st-square-checkbox > li {
	margin-bottom: 0.5em;
	padding-bottom: 0.75em;
	border-bottom: 1px dashed #ccc;
}

.editor-styles-wrapper .st-square-checkbox li,
.editor-styles-wrapper .is-style-st-square-checkbox > li,
.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li,
.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li {
    padding-left: 2.5em;
}

/* カスタムボタン: マイボタン */
.editor-styles-wrapper .st-mybtn {
	box-sizing: border-box;
	margin-left: auto;
	margin-right: auto;
	display: table;
}

.editor-styles-wrapper .st-mybtn:not(.st-mybtn-noborder) {
	border: 1px solid #ccc;
}

.editor-styles-wrapper .st-mybtn a {
	padding: .7em 1.5em;
	text-align: center;
	box-sizing: border-box;
	display:flex;
	width: 100%;
	height: 100%;
	text-decoration: none;
	justify-content: center;
	align-items: center;
}

.editor-styles-wrapper .st-mybtn .fa:not(.fa-after),
.editor-styles-wrapper .st-mybtn .st-fa:not(.st-svg-after) {
	margin-right: 10px;
}

.editor-styles-wrapper .st-mybtn .fa.fa-after,
.editor-styles-wrapper .st-mybtn .st-fa.st-svg-after {
	margin-left: 10px;
}

.editor-styles-wrapper .st-mybtn.st-btn-default {
	min-width: 40%;
}

@media print, screen and (max-width: 599px) {
	.editor-styles-wrapper .st-mybtn.st-btn-default {
		min-width: 100%;
	}
}

/* グループブロックにてレイアウト指定時
.editor-styles-wrapper .wp-block-group.is-st-justify .wp-block-group__inner-container .st-mybtn.st-btn-default {
	width:100%!important;
}
*/

.editor-styles-wrapper .st-mybtn.wp-block-st-blocks-my-button {
	color: #ffffff;
	background-color: #e6514C;
	border: 1px solid #e57373;
	border-radius: 5px;
	box-shadow: 0 3px 0 #c62828;
}

.editor-styles-wrapper .st-mybtn.wp-block-st-blocks-my-button a {
	color: #ffffff;
}

/* 光る演出 */
.editor-styles-wrapper .st-mybtn.wp-block-st-blocks-my-button.st-reflection {
    overflow: hidden;
}

.editor-styles-wrapper .st-reflection-on:not(.no-reflection),
.editor-styles-wrapper .st-mybtn.st-reflection:not(.no-reflection) a {
	position: relative;
	overflow: hidden;
}

.editor-styles-wrapper .st-reflection-on:not(.no-reflection)::after,
.editor-styles-wrapper .st-mybtn.st-reflection:not(.no-reflection) a::after {
	content: '';
	height: 100%;
	width: 30px;
	position: absolute;
	top: -180px;
	left: 0;
	background-color: #fff;
	opacity: 0;
	-webkit-transform: rotate(45deg);
	-webkit-animation: reflection 5s ease-in-out infinite;
}

@-webkit-keyframes reflection {
	0% { -webkit-transform: scale(0) rotate(45deg); opacity: 0; }
	80% { -webkit-transform: scale(0) rotate(45deg); opacity: 0.5; }
	81% { -webkit-transform: scale(4) rotate(45deg); opacity: 1; }
	100% { -webkit-transform: scale(50) rotate(45deg); opacity: 0; }
}

/* 目次（カスタム） */
.editor-styles-wrapper #st_toc_container,
.editor-styles-wrapper .st_toc_container {
	border: 1px solid #fafafa;
	box-sizing: border-box;
	margin: 0 auto 20px;
	padding: 10px 20px;
	text-align: center;
	border-radius: 5px;
}

.editor-styles-wrapper #st_toc_container .st_toc_title,
.editor-styles-wrapper .st_toc_container .st_toc_title {
	text-align: center;
	padding: 5px;
	font-weight: bold;
	position: relative;
	display: inline-block;
	vertical-align: middle;
	border-bottom: 2px solid #333;
	margin-bottom: 5px;
}

.editor-styles-wrapper #st_toc_container .st_toc_title::before,
.editor-styles-wrapper .st_toc_container .st_toc_title::before {
	content: "\e91c\00a0";
	font-family: stsvg;
}

.editor-styles-wrapper #st_toc_container .st-original-toc li,
.editor-styles-wrapper .st_toc_container .st-original-toc li {
	text-align: left;
	font-weight: normal;
	padding: 5px;
	text-indent: 0;
	border-bottom: 1px dotted #ccc;
}

.editor-styles-wrapper #st_toc_container ol.st-original-toc > li,
.editor-styles-wrapper .st_toc_container ol.st-original-toc > li {
	list-style: decimal;
}

.editor-styles-wrapper #st_toc_container .st-original-toc li a::before,
.editor-styles-wrapper .st_toc_container .st-original-toc li a::before {
	content: none;
}

.editor-styles-wrapper #st_toc_container .st-original-toc li a,
.editor-styles-wrapper .st_toc_container .st-original-toc li a {
	text-decoration: none;
	color: #000;
}

.editor-styles-wrapper #st_toc_container .st-original-toc li a:hover,
.editor-styles-wrapper .st_toc_container .st-original-toc li a:hover {
	opacity: 0.5;
}

/*マイボックスメモ*/
.editor-styles-wrapper .st-mybox {
	position: relative;
	margin: 20px 0;
	padding: 0 20px;
	border: solid 2px #9E9E9E;
	border-radius: 0;
}

.editor-styles-wrapper .wp-block-st-blocks-my-box.st-mybox { /* Gutenberg */
	border-radius: 5px;
}

.editor-styles-wrapper .st-in-mybox {
	padding: 20px 0;
	z-index: -2;
}

.editor-styles-wrapper .st-in-mybox p {
	margin-bottom: 0;
}

.editor-styles-wrapper .st-mybox .st-fa,
.editor-styles-wrapper .st-mybox .fa {
	margin-right: 5px;
	margin-left: 5px;
}

.editor-styles-wrapper .st-mybox .st-mybox-title {
	position: absolute;
	display: inline-block;
	top: -.5em;
	left: 10px;
	padding: 0 5px 10px;
	line-height: 1;
	color:#9E9E9E;
	font-weight:bold;
	margin-bottom:10px;
	z-index: 1;
}

.editor-styles-wrapper .st-mybox.has-title .st-mybox-title {
	padding-right: 10px;
	padding-left: 10px;
}

.editor-styles-wrapper .st-mybox.has-title.has-icon .st-mybox-title {
	padding-left: 5px;
}

/* ボーダー10pxまでの境界用背景 */
.editor-styles-wrapper .st-mybox .st-mybox-title::after {
    position: absolute;
    display: inline-block;
    bottom: 0;
    left: 0;
	background:#ffffff;
	content: '';
	width: 100%;
	height: calc( 20px + 1em);
	z-index: -1;
}

.editor-styles-wrapper .wp-block-st-blocks-my-box .st-in-mybox {
    padding: 30px 0 20px;
}

/** 見出しを下に */
.editor-styles-wrapper .st-mybox.st-title-under .st-mybox-title:not([class*=" is-style-st-paragraph-"]):not(.has-background) {
	position: relative;
	display: inline-block;
	padding: 20px 0 0;
	margin-bottom: 10px;
	top: 0;
	left: 0;
	text-shadow: none!important;
	background-color: transparent!important;
}

.editor-styles-wrapper .st-mybox.st-title-under .st-mybox-title::after {
	content: none;
}

/** 見出しにボーダー */
.editor-styles-wrapper .st-mybox.st-title-border .st-mybox-title:not([class*=" is-style-st-paragraph-"]):not(.has-background) {
	padding-bottom: 10px;
	border-bottom: 2px solid #ccc;
}

.editor-styles-wrapper .st-mybox.st-title-under .st-in-mybox {
	padding: 0 0 20px;
}

/** 見出し下 + 見出しにボーダー */
.editor-styles-wrapper .st-mybox.st-title-border.st-title-under .st-mybox-title:not([class*=" is-style-st-paragraph-"]):not(.has-background) {
	padding-bottom: 10px;
	margin-bottom: 20px;
}

/** 見出しにボーダー ※見出し下ではない  */
.editor-styles-wrapper .st-mybox.st-title-border:not(.st-title-under) .st-in-mybox {
	padding-top: 35px;
}

.editor-styles-wrapper .st-mybox.st-title-border:not(.st-title-under) .st-mybox-title:not([class*=" is-style-st-paragraph-"]):not(.has-background) {
	padding-left: 10px;
	padding-right: 10px;
	left: 20px;
}

.editor-styles-wrapper .free-inbox {
	padding:10px 15px 10px;
	text-align: left;
}

/**見出し付ボックス（タイトル幅100%ver）*/
.editor-styles-wrapper .freebox.freebox-intitle,
.editor-styles-wrapper .freebox-intitle {
	border-top: none;
	padding-top: 0;
}

.editor-styles-wrapper .freebox-intitle .p-free {
	margin-bottom: 0;
}

.editor-styles-wrapper .freebox-intitle .p-free::after {
	content: none;
}

.editor-styles-wrapper .freebox-intitle .p-entry-f {
	padding:6px 20px;
	margin: 0;
	font-size: 15px;
	font-weight: bold;
	background: #FEB20A;
	color: #fff;
	position: relative;
	max-width: 100%;
	display: block;
	text-align: center;
	border-bottom-right-radius: 0!important;
}

/*クリップメモ*/
.editor-styles-wrapper .clip-memobox {
	display: flex;
	background: #f3f3f3;
	border-radius: 3px;
	margin-bottom: 20px;
	padding: 10px;
}

.editor-styles-wrapper .clip-fonticon {
	align-self: center;
	padding: 0 .7em 0 calc(.7em - 5px);
	text-align: center;
	flex-shrink: 0;
	border-right:1px solid #E0E0E0;
}

.editor-styles-wrapper .clip-memotext {
	display: flex;
	flex-direction: column;
	justify-content: center;
	flex-grow: 1;
	padding-left: 15px;
	box-sizing: border-box;
}

/*参照リンク*/
.editor-styles-wrapper .st-share {
	background: #fafafa;
	padding: 5px;
	border-radius: 3px;
	font-size: 95%;
	line-height: 1.7;
}
.editor-styles-wrapper .st-share::before {
	content: "\00a0\00a0\f0c1\00a0\00a0\00a0";
	font-family: stsvg;
	color: #9E9E9E;
}

/* 記事タイトル */
.editor-styles-wrapper .entry-title, .entry-title {
	font-family: Helvetica , "游ゴシック", "Yu Gothic", sans-serif;
	margin-bottom: 10px;
	font-weight: bold;
}

/*自動アイコン目印*/
.editor-styles-wrapper .hatenamark,.checkmark,.attentionmark,.memomark,.usermark {
	background-color: rgba(135,206,250,0.5);
}

/* clearfix */
.editor-styles-wrapper .clearfix {
	zoom: 1;
}

.editor-styles-wrapper .clearfix::after {
	content: "";
	display: block;
	clear: both;
}

.editor-styles-wrapper .clear {
	clear: both;
}

.editor-styles-wrapper .center {
	text-align: center;
}

/* リンクの色 */
.editor-styles-wrapper a {
	color: #4682b4;
}

/* リンクにマウスオーバーした時の色 */
.editor-styles-wrapper a:hover {
	color: #b22222;
}

/*画像にボーダー*/
.editor-styles-wrapper .is-style-st-photoline img,
.editor-styles-wrapper .photoline img {
	border: solid 1px #ccc;
}

/* 角丸 */
.editor-styles-wrapper .is-style-circle-mask img,
.editor-styles-wrapper .is-style-rounded img {
    border-radius: 10px;
}

/*写真風*/
.editor-styles-wrapper .is-style-st-photohu,
.editor-styles-wrapper .st-photohu {
	background: #fff;
	border:1px solid #ccc;
	padding:10px 10px 20px;
	margin-bottom: 20px;
	box-shadow: 0 10px 8px -6px #bebebe;
	display: flex;
	box-sizing: border-box;
    align-items: center;
    flex-direction: column;
}

.editor-styles-wrapper .st-photohu p.wp-caption-text {
	margin-bottom: -10px;
}

.editor-styles-wrapper .is-style-st-photohu.wp-block-image figcaption {
	margin-bottom: 0;
	word-break : break-all;
}

.editor-styles-wrapper .st-photohu div img,
.editor-styles-wrapper .is-style-st-photohu, div img {
	margin-bottom: 5px;
	border:1px solid #ccc;
}

.editor-styles-wrapper img,
.editor-styles-wrapper video,
.editor-styles-wrapper object {
	max-width: 100%;
	height: auto;
	border: none;
	vertical-align: bottom;
	box-sizing: border-box;
}

.editor-styles-wrapper .inline-img img {
	display: inline;
}

/* 画像付きコメント */
.editor-styles-wrapper img.size-st_kaiwa_image {
	max-width: 60px;
}

.editor-styles-wrapper iframe {
	max-width: 100%;
}

:root .editor-styles-wrapper kbd,
:root .editor-styles-wrapper .st-code,
:root .editor-styles-wrapper code {
	padding: 2px 4px!important;
	margin: 0 2px;
	border-radius: 2px;
	background: #eee;
}

:root .wp-block-code > code {
    border: none;
}

.editor-styles-wrapper .wp-block-code code {
	background: inherit;
}

:root .editor-styles-wrapper kbd {
	border: 1px solid #eee;
	box-shadow: 0 2px 0 #ccc;
	white-space: nowrap;
	border-radius: 3px;
}

kbd,
code {
	font-family: "SFMono-Regular",Consolas,"Liberation Mono",Menlo,Courier,monospace!important;
}

.editor-styles-wrapper .is-style-st-wide-background code,
.editor-styles-wrapper .is-style-st-wide-background-left code,
.editor-styles-wrapper .is-style-st-wide-background-right code {
	padding: 0;
	margin: 0;
	border-radius: 0;
	background-color: transparent;
}

/* iframeのレスポンシブ */
.editor-styles-wrapper .youtube-container {
	position: relative;
	padding-bottom: 56.25%;
	padding-top: 30px;
	height: 0;
	overflow: hidden;
}

.editor-styles-wrapper .youtube-container iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}

/*レスポンシブ用PC左右コンテンツ*/
.editor-styles-wrapper .responbox,
.editor-styles-wrapper .responbox30,
.editor-styles-wrapper .responbox40,
.editor-styles-wrapper .responbox50,
.editor-styles-wrapper .responbox60,
.editor-styles-wrapper .responbox70,
.editor-styles-wrapper .responboxfree {
	padding: 10px;
	background: #f3f3f3;
	margin-bottom: 20px;
}

.editor-styles-wrapper .responbox .lbox img {
	width: 100%;
	box-sizing: border-box;
	margin-bottom: 10px;
}

.editor-styles-wrapper .st-flexbox {
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
}

/** 背景黒 */
.editor-styles-wrapper .st-header-flexwrap.st-black-bg::after {
    background-color: rgba(0,0,0,0.5);
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    content: ' ';
    z-index: 1;
}

.editor-styles-wrapper .st-black-bg .st-header-flexbox {
    z-index: 2;
}

.editor-styles-wrapper .st-box-shadow {
	box-shadow: 0 1px 2px rgba(0,0,0,0.2);
}

/* 補助CSS */
.editor-styles-wrapper .is-style-st-paragraph-marumozi.noradius,
.editor-styles-wrapper .is-style-st-paragraph-button.noradius,
.editor-styles-wrapper .noradius {
	border-radius: 0!important;
}

.editor-styles-wrapper .is-style-st-paragraph-button.radius10,
.editor-styles-wrapper .is-style-st-paragraph-marumozi.radius10,
.editor-styles-wrapper .radius10 {
	border-radius: 10px!important;
}

.editor-styles-wrapper .is-style-st-paragraph-button.radius20,
.editor-styles-wrapper .is-style-st-paragraph-marumozi.radius20,
.editor-styles-wrapper .radius20 {
	border-radius: 20px!important;
}

.editor-styles-wrapper .is-style-st-paragraph-button.radius30,
.editor-styles-wrapper .is-style-st-paragraph-marumozi.radius30,
.editor-styles-wrapper .radius30 {
	border-radius: 30px!important;
}

/*--------------------------------
各フォント設定
---------------------------------*/
/* 基本の文字 */
.editor-styles-wrapper div,
.editor-styles-wrapper summary,
.editor-styles-wrapper p {
	font-size: 16px;
	line-height: 25px;
}

/*リスト */
.editor-styles-wrapper .mce-content-body ul {
	list-style-type: disc;
	padding-top: 10px;
	padding-right: 20px;
	padding-bottom: 10px;
	padding-left: 30px;
	margin-bottom: 20px;
}

.editor-styles-wrapper .mce-content-body ol {
	list-style-type: decimal;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 20px;
	padding-left: 30px;
	margin-bottom: 20px;
}

.editor-styles-wrapper .mce-content-body .st-list-circle ul,
.editor-styles-wrapper .mce-content-body .st-list-circle ol,
.editor-styles-wrapper .mce-content-body .st-list-check ul,
.editor-styles-wrapper .mce-content-body .st-list-check ol,
.editor-styles-wrapper .mce-content-body .st-list-no ul,
.editor-styles-wrapper .mce-content-body .st-list-no ol,
.editor-styles-wrapper .mce-content-body .st-square-checkbox ul,
.editor-styles-wrapper .mce-content-body .st-square-checkbox ol {
	padding-left: 0;
}

.editor-styles-wrapper .mce-content-body ul li,
.editor-styles-wrapper .mce-content-body ol li {
	font-size: 16px;
	line-height: 27px;
}

/* 中見出し */
.editor-styles-wrapper .h2modoki,
.editor-styles-wrapper h2 {
	position: relative;
	background: #f3f3f3;
	color: #1a1a1a;
	font-size: 20px;
	line-height: 27px;
	margin-bottom: 20px;
	padding-top: 10px;
	padding-right: 20px;
	padding-bottom: 10px;
	padding-left: 20px;
}

.editor-styles-wrapper h2.has-st-regular-font-size {
	font-size: 20px!important;
}

.editor-styles-wrapper .h2modoki::after,
.editor-styles-wrapper h2:where(:not(.st-css-no))::after {
	content: '';
	position: absolute;
	border-top: 10px solid #f3f3f3;
	border-right: 10px solid transparent;
	border-left: 10px solid transparent;
	bottom: -10px;
	left: 30px;
	border-radius: 2px;
}

.editor-styles-wrapper .h2modoki::before,
.editor-styles-wrapper h2:where(:not(.st-css-no))::before {
	content: '';
	position: absolute;
	border-top: 10px solid #f3f3f3;
	border-right: 10px solid transparent;
	border-left: 10px solid transparent;
	bottom: -10px;
	left: 30px;
}

/*小見出し*/
.editor-styles-wrapper .h3modoki,
.editor-styles-wrapper h3 {
	font-size: 18px;
	margin-bottom: 20px;
	margin-top: 10px;
	padding-top: 15px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	color: #1a1a1a;
	line-height: 27px;
	background-repeat: no-repeat;
	background-position: left center;
	margin-left: 0px;
	border-bottom: 1px #999999 dotted;
}

.editor-styles-wrapper h3.has-st-regular-font-size {
	font-size: 18px!important;
}

.editor-styles-wrapper .h3modoki a,
.editor-styles-wrapper h3 a {
	color: #333;
	text-decoration: none;
}

.editor-styles-wrapper .h4modoki,
.editor-styles-wrapper h4 {
	padding: 10px 15px;
	margin-bottom: 20px;
	background-color: #f3f3f3;
	line-height: 24px;
}

.editor-styles-wrapper .h5modoki,
.editor-styles-wrapper .h6modoki,
.editor-styles-wrapper h5, /* H5 */
.editor-styles-wrapper h6 /* H6 */ {
	margin-bottom: 20px;
	font-size: inherit;
}

.editor-styles-wrapper .h6modoki,
.editor-styles-wrapper h6 /* H6 */ {
	font-weight: bold;
	color: #424242;
}

.editor-styles-wrapper .h2modoki,
.editor-styles-wrapper .h3modoki,
.editor-styles-wrapper .h4modoki,
.editor-styles-wrapper .h5modoki,
.editor-styles-wrapper .h6modoki {
	font-weight: bold;
}

/* hタグ用 キャッチコピー */
.editor-styles-wrapper .st-h-copy-toc,
.editor-styles-wrapper .st-h-copy {
	display: block!important;
	font-weight: normal!important;
	font-size: 65%;
	line-height: 1.3;
}

/* 引用 */
.wp-block-quote:not(.is-style-st-quote-line) {
	border: none;
}

.editor-styles-wrapper .wp-block-quote.is-large,
.editor-styles-wrapper .wp-block-quote.is-style-large,
.editor-styles-wrapper .wp-block-quote.is-style-default,
.editor-styles-wrapper .inyoumodoki,
.editor-styles-wrapper blockquote {
	position: relative;
	background-color: #fafafa;
	padding-top: 50px;
	padding-right: 20px;
	padding-bottom: 20px;
	padding-left: 20px;
	margin-top: 20px;
	margin-right: 0px;
	margin-bottom: 20px;
}

.editor-styles-wrapper .wp-block-quote.is-style-default::before,
.editor-styles-wrapper .inyoumodoki::before,
.editor-styles-wrapper blockquote::before {
   	content: "\f10d";
  	font-family: stsvg;
	position: absolute;
	top: 20px;
	left: 20px;
	font-size: 20px;
}

.editor-styles-wrapper .inyoumodoki p:last-child,
.editor-styles-wrapper .inyoumodoki ol:last-child,
.editor-styles-wrapper .inyoumodoki ul:last-child {
	margin-bottom:0;
	padding-bottom:0;
}

/** 引用元 */
.editor-styles-wrapper .wp-block-quote__citation,
.editor-styles-wrapper .wp-block-quote__citation a {
	font-style: normal;
	color: #9E9E9E;
	font-size: .9em;
	text-decoration: none;
}

<?php if ( $st_blockquote_color ): //引用部分の背景色 ?>
	.editor-styles-wrapper .wp-block-quote.is-large,
	.editor-styles-wrapper .wp-block-quote.is-style-large,
	.editor-styles-wrapper .wp-block-quote.is-style-default,
	.editor-styles-wrapper .inyoumodoki,
	.editor-styles-wrapper blockquote {
		background-color: <?php echo $st_blockquote_color; ?>;
	}
<?php else: ?>
	.editor-styles-wrapper .wp-block-quote.is-style-st-quote-line:not(.has-background) {
		background-color: transparent;
	}
<?php endif; ?>

<?php if ( $st_blockquote_icon_color ): //引用部分のアイコン・ライン ?>
	.editor-styles-wrapper .wp-block-quote__citation,
	.editor-styles-wrapper .wp-block-quote__citation a,
	.editor-styles-wrapper .inyoumodoki::before,
	.editor-styles-wrapper blockquote::before {
		color: <?php echo $st_blockquote_icon_color; ?>;
	}
	:root .editor-styles-wrapper .wp-block-quote.is-style-st-quote-line {
		border-left-color: <?php echo $st_blockquote_icon_color; ?>;
	}
<?php else: ?>
	.inyoumodoki::before,
	blockquote::before {
		color: #E0E0E0;
	}
<?php endif; ?>

/** 引用 - プレーン */
.editor-styles-wrapper .wp-block-quote.is-style-plain {
	padding-top: 20px;
}

.editor-styles-wrapper .wp-block-quote.is-style-plain::before {
	content: none;
}

/** 引用 - ライン */
.editor-styles-wrapper .wp-block-quote.is-style-st-quote-line {
	padding: 20px 20px 20px 30px;
	border-left: 5px solid #eee;
	color: #757575;
}

.editor-styles-wrapper .wp-block-quote.is-style-st-quote-line p:only-child {
	margin-bottom: 0;
}

.editor-styles-wrapper .wp-block-quote.is-style-st-quote-line::before {
	content: none;
}

.editor-styles-wrapper .is-style-st-quote-line.has-original-color-a-color::before {
	color: <?php echo $GLOBALS['stdata460']; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-original-color-b-color::before {
	color: <?php echo $GLOBALS['stdata461']; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-original-color-c-color::before {
	color: <?php echo $GLOBALS['stdata462']; ?>;
}

.editor-styles-wrapper .is-style-st-quote-line.has-original-color-d-color::before {
	color: <?php echo $GLOBALS['stdata463']; ?>;
}

/* プルクオート */
.editor-styles-wrapper .wp-block-pullquote blockquote {
	background-color: inherit;
	padding: inherit;
	margin: inherit;
}

.editor-styles-wrapper .wp-block-pullquote blockquote::before {
   	content: none;
}

/* オリジナルスタイルsmartphone */

.editor-styles-wrapper .huto {
	font-weight: bold;
}

.editor-styles-wrapper .hutoaka {
	font-weight: bold;
	color: #ff3333;
}

.editor-styles-wrapper .st-mycolor {
	font-weight: bold;
	color: #FF9800;
}

.editor-styles-wrapper .st-aka {
	color: #ff3333;
}

.editor-styles-wrapper .maru {
	border-radius: 5px;
}

.editor-styles-wrapper .noborder {
	border: none;
}

.editor-styles-wrapper .oomozi {
	font-size: 150%;
	line-height: 1.4;
	font-weight: bold;
}

.editor-styles-wrapper p.komozi,
.editor-styles-wrapper .komozi {
	font-size: 80%;
	display: inline-block;
}

.editor-styles-wrapper .st-mymarker-s-b,
.editor-styles-wrapper .st-mymarker-s,
.editor-styles-wrapper .ymarker,
.editor-styles-wrapper .ymarker-s,
.editor-styles-wrapper .gmarker,
.editor-styles-wrapper .gmarker-s,
.editor-styles-wrapper .rmarker,
.editor-styles-wrapper .rmarker-s,
.editor-styles-wrapper .bmarker,
.editor-styles-wrapper .bmarker-s {
	font-weight: bold;
}

.editor-styles-wrapper .st-mymarker {
	background: #FFE0B2;
}

.editor-styles-wrapper .st-mymarker-s {
	background:linear-gradient(transparent 70%,#FFF9C4 0%);
}

.editor-styles-wrapper .st-mymarker-s-b {
	background:linear-gradient(transparent 70%,#ffc4c4 0%);
}

.editor-styles-wrapper .ymarker {
	background: #FFF9C4;
}

.editor-styles-wrapper .ymarker-s {
	background:linear-gradient(transparent 70%,#FFF9C4 0%);
}

.editor-styles-wrapper .gmarker {
	background: #EEEEEE;
}

.editor-styles-wrapper .gmarker-s {
	background:linear-gradient(transparent 70%,#EEEEEE 0%);
}

.editor-styles-wrapper .rmarker {
	background: #ffcdd2;
}

.editor-styles-wrapper .rmarker-s {
	background:linear-gradient(transparent 70%,#ffcdd2 0%);
}

.editor-styles-wrapper .bmarker {
	background: #E1F5FE;
}

.editor-styles-wrapper .bmarker-s {
	background:linear-gradient(transparent 70%,#E1F5FE 0%);
}

.editor-styles-wrapper .yellowbox {
	padding: 20px;
	background-color: #ffffe0;
	margin-bottom: 20px;
}

.editor-styles-wrapper .yellowbox:not(.noborder) {
	border:solid 1px #fffacd;
}

.editor-styles-wrapper .redbox {
	margin-bottom: 20px;
	padding: 20px;
	background-color: #ffebee;
}
.editor-styles-wrapper .redbox:not(.noborder) {
	border: solid 1px #ef5350;
}

.editor-styles-wrapper .graybox {
	margin-bottom: 20px;
	padding: 20px;
	background-color: #f3f3f3;
}
.editor-styles-wrapper .graybox:not(.noborder) {
	border: solid 1px #ccc;
}

.editor-styles-wrapper .yellowbox p:last-child,
.editor-styles-wrapper .yellowbox ol:last-child,
.editor-styles-wrapper .yellowbox ul:last-child {
	margin-bottom: 0;
	padding-bottom: 0;
}

.editor-styles-wrapper .graybox p:last-child,
.editor-styles-wrapper .graybox ol:last-child,
.editor-styles-wrapper .graybox ul:last-child {
	margin-bottom: 0;
	padding-bottom: 0;
}

.editor-styles-wrapper .redbox p:last-child,
.editor-styles-wrapper .redbox ol:last-child,
.editor-styles-wrapper .redbox ul:last-child {
	margin-bottom: 0;
	padding-bottom: 0;
}


.editor-styles-wrapper .h2fuu {
	position: relative;
	background: #f3f3f3;
	color: #1a1a1a;
	font-size: 20px;
	line-height: 27px;
	margin-bottom: 20px;
	padding-top: 10px;
	padding-right: 20px;
	padding-bottom: 10px;
	padding-left: 20px;
	font-weight: bold;
}

.editor-styles-wrapper .h2fuu::after {
	content: '';
	position: absolute;
	border-top: 10px solid #f3f3f3;
	border-right: 10px solid transparent;
	border-left: 10px solid transparent;
	bottom: -10px;
	left: 30px;
	border-radius: 2px;
}

.editor-styles-wrapper .h2fuu::before {
	content: '';
	position: absolute;
	border-top: 10px solid #f3f3f3;
	border-right: 10px solid transparent;
	border-left: 10px solid transparent;
	bottom: -10px;
	left: 30px;
}

.editor-styles-wrapper .sankou {
	font-size: 70%;
	background-color: #F57C00;
	color: #fff;
	padding:3px 4px;
	margin:0 5px;
	white-space: nowrap;
}

.editor-styles-wrapper .sankou.green {
	background-color: #4CAF50;
}

.editor-styles-wrapper .sankou.blue {
	background-color: #2196F3;
}

.editor-styles-wrapper .st-hisu {
	font-size: 70%;
	background-color: #FF0000;
	color: #fff;
	padding:3px 4px;
	margin:0 5px;
	white-space: nowrap;
}

/*ドット線*/
.editor-styles-wrapper .dotline {
	border-bottom:1px dotted #212121;
}

.editor-styles-wrapper .dotliner {
	border-bottom:1px dotted #ff0000;
}

.editor-styles-wrapper .dotline-s {
	border-bottom:1px solid #212121;
}

.editor-styles-wrapper .dotline-sr {
	border-bottom:1px solid #ff0000;
}

/*--------------------------------
アニメーションタグ
---------------------------------*/

/* 45°揺れ */
.editor-styles-wrapper .st-wrench-icon i::before,
.editor-styles-wrapper .st-wrench-icon::before,
.editor-styles-wrapper .st-wrench.animated {
 	display:inline-block;
    -webkit-animation: stWrench 2.5s ease infinite;
    animation: stWrench 2.5s ease infinite;
}

@keyframes stWrench {
	0% {
		-webkit-transform: rotate(-12deg);
		transform: rotate(-12deg);
	}
	8% {
		-webkit-transform: rotate(12deg);
		transform: rotate(12deg);
	}
	10% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	18% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	20% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	28% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	30% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	38% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	40% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	48% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	50% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	58% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	60% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	68% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	100%, 75% {
		-webkit-transform: rotate(0);
		transform: rotate(0);
	}
}

/* ベル揺れ */
.editor-styles-wrapper .st-ring-icon i::before,
.editor-styles-wrapper .st-ring-icon::before,
.editor-styles-wrapper .st-ring.animated {
 	display:inline-block;
    -webkit-animation: stRing 2s ease infinite;
    animation: stRing 2s ease infinite;

}

@keyframes stRing {
	0% {
		-webkit-transform: rotate(-15deg);
		transform: rotate(-15deg);
	}
	2% {
		-webkit-transform: rotate(15deg);
		transform: rotate(15deg);
	}
	4% {
		-webkit-transform: rotate(-18deg);
		transform: rotate(-18deg);
	}
	6% {
		-webkit-transform: rotate(18deg);
		transform: rotate(18deg);
	}
	8% {
		-webkit-transform: rotate(-22deg);
		transform: rotate(-22deg);
	}
	10% {
		-webkit-transform: rotate(22deg);
		transform: rotate(22deg);
	}
	12% {
		-webkit-transform: rotate(-18deg);
		transform: rotate(-18deg);
	}
	14% {
		-webkit-transform: rotate(18deg);
		transform: rotate(18deg);
	}
	16% {
		-webkit-transform: rotate(-12deg);
		transform: rotate(-12deg);
	}
	18% {
		-webkit-transform: rotate(12deg);
		transform: rotate(12deg);
	}
	100%, 20% {
		-webkit-transform: rotate(0);
		transform: rotate(0);
	}
}

/* 横揺れ */
.editor-styles-wrapper .st-horizontal-icon i::before,
.editor-styles-wrapper .st-horizontal-icon::before,
.editor-styles-wrapper .st-horizontal.animated {
 	display:inline-block;
    -webkit-animation: stHorizontal 2s ease infinite;
    animation: stHorizontal 2s ease infinite;
}

@keyframes stHorizontal {
	0% {
		-webkit-transform: translate(0,0);
		transform: translate(0,0);
	}
	6% {
		-webkit-transform: translate(5px,0);
		transform: translate(5px,0);
	}
	12% {
		-webkit-transform: translate(0,0);
		transform: translate(0,0);
	}
	18% {
		-webkit-transform: translate(5px,0);
		transform: translate(5px,0);
	}
	24% {
		-webkit-transform: translate(0,0);
		transform: translate(0,0);
	}
	30% {
		-webkit-transform: translate(5px,0);
		transform: translate(5px,0);
	}
	100%, 36% {
		-webkit-transform: translate(0,0);
		transform: translate(0,0);
	}
}

/* 縦揺れ */
.editor-styles-wrapper .st-vertical-icon i::before,
.editor-styles-wrapper .st-vertical-icon::before,
.editor-styles-wrapper .st-vertical.animated {
 	display:inline-block;
    -webkit-animation: stVrtical 2s ease infinite;
    animation: stVrtical 2s ease infinite;
}

@keyframes stVrtical {
	0% {
		-webkit-transform: translate(0,-3px);
		transform: translate(0,-3px);
	}
	4% {
		-webkit-transform: translate(0,3px);
		transform: translate(0,3px);
	}
	8% {
		-webkit-transform: translate(0,-3px);
		transform: translate(0,-3px);
	}
	12% {
		-webkit-transform: translate(0,3px);
		transform: translate(0,3px);
	}
	16% {
		-webkit-transform: translate(0,-3px);
		transform: translate(0,-3px);
	}
	20% {
		-webkit-transform: translate(0,3px);
		transform: translate(0,3px);
	}
	100%, 22% {
		-webkit-transform: translate(0,0);
		transform: translate(0,0);
	}
}

/* 点滅 */
.editor-styles-wrapper .st-flash-icon i::before,
.editor-styles-wrapper .st-flash-icon::before,
.editor-styles-wrapper .st-flash {
 	display:inline-block;
    -webkit-animation: stFlash 2s ease infinite;
    animation: stFlash 2s ease infinite;
}

@keyframes stFlash {
	0%, 100%, 50% {
		opacity: 1;
	}
	25%, 75% {
		opacity: 0;
	}
}

/* バウンド */
.editor-styles-wrapper .st-bounce-icon i::before,
.editor-styles-wrapper .st-bounce-icon::before,
.editor-styles-wrapper .st-bounce.animated {
	display:inline-block;
    -webkit-animation: stBounce 2s ease infinite;
    animation: stBounce 2s ease infinite;
}

@keyframes stBounce {
	0%, 10%, 100%, 20%, 50%, 80% {
		-webkit-transform: translateY(0);
		transform: translateY(0);
	}
	40% {
		-webkit-transform: translateY(-15px);
		transform: translateY(-15px);
	}
	60% {
		-webkit-transform: translateY(-15px);
		transform: translateY(-15px);
	}
}

/* 回転 */
.editor-styles-wrapper .st-rotation-icon i::before,
.editor-styles-wrapper .st-rotation-icon::before,
.editor-styles-wrapper .st-rotation {
 	display:inline-block;
    -webkit-animation: stRotation 1.5s linear infinite;
    animation: stRotation 1.5s linear infinite;
}

@keyframes stRotation {
	0% {
		-webkit-transform: rotate(0);
		transform: rotate(0);
	}
	100% {
		-webkit-transform: rotate(359deg);
		transform: rotate(359deg);
	}
}

/* ふわふわ */
.editor-styles-wrapper .st-float-icon i::before,
.editor-styles-wrapper .st-float-icon::before,
.editor-styles-wrapper .st-float.animated {
 	display:inline-block;
    -webkit-animation: stFloat 2s linear infinite;
    animation: stFloat 2s linear infinite;
}

@keyframes stFloat {
	0% {
		-webkit-transform: translateY(0);
		transform: translateY(0);
	}
	50% {
		-webkit-transform: translateY(-6px);
		transform: translateY(-6px);
	}
	100% {
		-webkit-transform: translateY(0);
		transform: translateY(0);
	}
}

/* 大小 */
.editor-styles-wrapper .st-pulse-icon i::before,
.editor-styles-wrapper .st-pulse-icon::before,
.editor-styles-wrapper .st-pulse.animated {
 	display:inline-block;
    -webkit-animation: stPulse 2s linear infinite;
    animation: stPulse 2s linear infinite;
}

@keyframes stPulse {
	0% {
		-webkit-transform: scale(1.1);
		transform: scale(1.1);
	}
	50% {
		-webkit-transform: scale(.8);
		transform: scale(.8);
	}
	100% {
		-webkit-transform: scale(1.1);
		transform: scale(1.1);
	}
}

/* シェイク */
.editor-styles-wrapper .st-shake-s-icon i::before,
.editor-styles-wrapper .st-shake-s-icon::before,
.editor-styles-wrapper .st-shake-s {
 	display:inline-block;
    -webkit-animation: stShake-s 2.5s ease infinite;
    animation: stShake-s 2.5s ease infinite;
}

@keyframes stShake-s {
	0% {
		-webkit-transform: rotate(-12deg);
		transform: rotate(-12deg);
	}
	8% {
		-webkit-transform: rotate(12deg);
		transform: rotate(12deg);
	}
	10% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	18% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	20% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	28% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	30% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	38% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	40% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	48% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	50% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	58% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	60% {
		-webkit-transform: rotate(-24deg);
		transform: rotate(-24deg);
	}
	68% {
		-webkit-transform: rotate(24deg);
		transform: rotate(24deg);
	}
	100%, 75% {
		-webkit-transform: rotate(0);
		transform: rotate(0);
	}
}

/* シェイク（強） */
.editor-styles-wrapper .st-shake-icon i::before,
.editor-styles-wrapper .st-shake-icon::before,
.editor-styles-wrapper .st-shake {
 	display:inline-block;
	-webkit-animation: stShake .2s infinite;
    animation: stShake .2s infinite;
}

@keyframes stShake {
	0% {
		transform: translate(0px, 0px) rotateZ(0deg);
	}
	25% {
		transform: translate(2px, 2px) rotateZ(1deg);
	}
	50% {
		transform: translate(0px, 2px) rotateZ(0deg);
	}
	75% {
		transform: translate(2px, 0px) rotateZ(-1deg);
	}
	100% {
		transform: translate(0px, 0px) rotateZ(0deg);
	}
}

/* 拡大（ゆれ） */
.editor-styles-wrapper .st-tada-icon i::before,
.editor-styles-wrapper .st-tada-icon::before,
.editor-styles-wrapper .st-tada.animated {
 	display:inline-block;
    -webkit-animation: stTada 2s linear infinite;
    animation: stTada 2s linear infinite;
}

@keyframes stTada {
	0% {
		-webkit-transform: scale(1);
		transform: scale(1);
	}
	10%, 20% {
		-webkit-transform: scale(.9) rotate(-8deg);
		transform: scale(.9) rotate(-8deg);
	}
	30%, 50%, 70% {
		-webkit-transform: scale(1.3) rotate(8deg);
		transform: scale(1.3) rotate(8deg);
	}
	40%, 60% {
		-webkit-transform: scale(1.3) rotate(-8deg);
		transform: scale(1.3) rotate(-8deg);
	}
	100%, 80% {
		-webkit-transform: scale(1) rotate(0);
		transform: scale(1) rotate(0);
	}
}

/* 過ぎる */
.editor-styles-wrapper .st-passing-icon i::before,
.editor-styles-wrapper .st-passing-icon::before,
.editor-styles-wrapper .st-passing.animated {
 	display:inline-block;
	-webkit-animation: stPassing 2s linear infinite;
    animation: stPassing 2s linear infinite;
}

@keyframes stPassing {
	0% {
		-webkit-transform: translateX(-50%);
		transform: translateX(-50%);
		opacity: 0;
	}
	50% {
		-webkit-transform: translateX(0);
		transform: translateX(0);
		opacity: 1;
	}
	100% {
		-webkit-transform: translateX(50%);
		transform: translateX(50%);
		opacity: 0;
	}
}

/* 戻る */
.editor-styles-wrapper .st-passing-reverse-icon i::before,
.editor-styles-wrapper .st-passing-reverse-icon::before,
.editor-styles-wrapper .st-passing-reverse.animated {
 	display:inline-block;
    -webkit-animation: stPassing-reverse 2s linear infinite;
    animation: stPassing-reverse 2s linear infinite;
}

@keyframes stPassing-reverse {
	0% {
		-webkit-transform: translateX(50%);
		transform: translateX(50%);
		opacity: 0;
	}
	50% {
		-webkit-transform: translateX(0);
		transform: translateX(0);
		opacity: 1;
	}
	100% {
		-webkit-transform: translateX(-50%);
		transform: translateX(-50%);
		opacity: 0;
	}
}

/* バースト */
.editor-styles-wrapper .st-burst-icon i::before,
.editor-styles-wrapper .st-burst-icon::before,
.editor-styles-wrapper .st-burst.animated {
 	display:inline-block;
    -webkit-animation: stBurst 2s infinite linear;
    animation: stBurst 2s infinite linear;
}

@keyframes stBurst {
	0% {
		opacity: .6;
	}
	50% {
		-webkit-transform: scale(1.8);
		transform: scale(1.8);
		opacity: 0;
	}
	100% {
		opacity: 0;
	}
}

/* 落ちる */
.editor-styles-wrapper .st-falling-icon i::before,
.editor-styles-wrapper .st-falling-icon::before,
.editor-styles-wrapper .st-falling.animated {
 	display:inline-block;
    -webkit-animation: stFalling 2s linear infinite;
    animation: stFalling 2s linear infinite;
}

@keyframes stFalling {
	0% {
		-webkit-transform: translateY(-50%);
		transform: translateY(-50%);
		opacity: 0;
	}
	50% {
		-webkit-transform: translateY(0);
		transform: translateY(0);
		opacity: 1;
	}
	100% {
		-webkit-transform: translateY(50%);
		transform: translateY(50%);
		opacity: 0;
	}
}

/*--------------------------------
CSS背景
---------------------------------*/
/* ドット */
.editor-styles-wrapper .st-bg-dot {
	background-image: radial-gradient(rgba(250,250,250,0.6) 20%, transparent 0), radial-gradient( rgba(250,250,250,0.6) 20%, transparent 0 );
	background-position: 0 0, 10px 10px;
	background-size: 20px 20px;
	padding: 15px 20px;
}

/* ストライプ */
.editor-styles-wrapper .st-bg-stripe {
	background: repeating-linear-gradient( 45deg, transparent, transparent, 5px, rgba( 250,250,250,0.6 ) 0, rgba( 250,250,250,0.6 ) 10px );
	padding: 15px 20px;
}

/* チェック */
.editor-styles-wrapper .st-bg-check {
	background-image: linear-gradient( 45deg, rgba( 250,250,250,0.6 ) 25%, transparent 25%, transparent 75%, rgba( 250,250,250,0.6 ) 75%,rgba( 250,250,250,0.6 ) ), linear-gradient( 45deg, rgba( 250,250,250,0.6 ) 25%, transparent 25%, transparent 75%, rgba( 250,250,250,0.6 ) 75%, rgba( 250,250,250,0.6 ) );
	background-position: 0 0, 15px 15px;
	background-size: 30px 30px;
	padding: 15px 20px;
}

/* スティッチ */
.editor-styles-wrapper .st-bg-stich {
	position: relative;
	background: #fafafa;
	padding: 35px 40px;
}

.editor-styles-wrapper .st-bg-stich::after,
.editor-styles-wrapper .st-bg-stich::after {
    position: absolute;
    top: 10px;
    left: 10px;
    display: block;
    width: calc( 100% - 20px );
    height: calc( 100% - 20px );
    border: 1px dashed #fff;
    content: "";
}

/* カギ括弧 */
.editor-styles-wrapper .st-bg-brackets {
	position: relative;
	width: 90%;
	padding: 30px 30px;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
	margin: 0 auto 20px;
}

.editor-styles-wrapper .st-brackets::before,
.editor-styles-wrapper .st-brackets::after {
	position: absolute;
	content: '';
	width: 20%;
	height: 50%;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
}

.editor-styles-wrapper .st-brackets::before {
	top: 0;
	left: 0;
	border-top: 1px solid #E0E0E0;
	border-left: 1px solid #E0E0E0;
}

.editor-styles-wrapper .st-brackets::after {
	bottom: 0;
	right: 0;
	border-bottom: 1px solid #E0E0E0;
	border-right: 1px solid #E0E0E0;
}

/*--------------------------------
 画像ブロック
---------------------------------*/

/* 100%選択時に投稿エリアからハミ出る修正 */
.wp-block-image.is-resized {
    table-layout: fixed;
}

.wp-block-image.is-resized .editor-styles-wrapper img {
    height: auto!important;
}

/* 画像カウント */
.editor-styles-wrapper .wp-block-image.st-img-count {
    counter-increment: imgcountcnt;
    position: relative;
}

.editor-styles-wrapper .wp-block-image.st-img-count::before {
	padding: 5px 7px;
    content: counter(imgcountcnt, decimal-leading-zero);
    background-color: #fff;
    font-size: 1em;
	font-weight: bold!important;
    display: inline-block;
    color: #000;
	position: absolute;
	top: 0;
	left: 0;
	z-index: 1;
}

/** 枠線 */
.editor-styles-wrapper .wp-block-image.st-img-count.is-style-st-photoline::before {
	top: 1px;
	left: 1px;
}

/* 各種カウンターリセット */
.editor-styles-wrapper .wp-block-group {
	counter-reset: ranknumber-h2 ranknumber-h3 ranknumber-h4 countcnt stepcnt imgcountcnt;
}

/*--------------------------------
タグブロック
---------------------------------*/

.wp-block-tag-cloud {
	margin-bottom:20px;
}

.wp-block-tag-cloud a {
	font-size: .9em!important;
	line-height: 1em;
	color: #1a1a1a;
	display: inline-block;
	border:1px #757575 solid;
	white-space: nowrap;
	padding: 10px;
	margin: 3px 3px 5px;
	border-radius: 4px;
	text-decoration: none;
	box-sizing: border-box;
}

/*--------------------------------
ブロックスタイル グループ
---------------------------------*/
/* 斜線 */
.editor-styles-wrapper .is-style-st-group-bg-diagonal {
	background-color: #f5f6f7;
	background-image: -webkit-gradient(linear, 0 0, 100% 100%,color-stop(.25, #fff), color-stop(.25, transparent),color-stop(.5, transparent), color-stop(.5, #fff),color-stop(.75, #fff), color-stop(.75, transparent),to(transparent));
	-webkit-background-size: 7px 7px;
	padding: 20px;
}

/* グリッド */
.editor-styles-wrapper .is-style-st-group-bg-grid {
	background-image: linear-gradient( transparent 95%, rgba(0, 0, 0, .05) 50%, rgba(0, 0, 0, .05)), linear-gradient( 90deg, transparent 95%, rgba(0, 0, 0, .05) 50%, rgba(0, 0, 0, .05) );
	background-size: 16px 16px;
	background-repeat: repeat;
	padding: 20px;
}

/* ドット */
.editor-styles-wrapper .is-style-st-group-bg-dot {
	background-image: radial-gradient(#eee 1px, transparent 1px);
	background-size: 20px 20px;
	padding: 20px;
}

/* ライン */
.editor-styles-wrapper .is-style-st-group-line {
	border-left: solid 1px #eee;
	padding-left: 20px;
}

.editor-styles-wrapper .is-style-st-group-line-bold {
	border-left: solid 5px #eee;
	padding-left: 20px;
}

.editor-styles-wrapper .is-style-st-group-line.has-pale-pink-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-pale-pink-color {
	border-left-color: <?php echo ST_COLOR_PALE_PINK; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-soft-red-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-soft-red-color {
	border-left-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-light-grayish-red-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-light-grayish-red-color {
	border-left-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-vivid-yellow-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-vivid-yellow-color {
	border-left-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-very-pale-yellow-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-very-pale-yellow-color {
	border-left-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-light-green-cyan-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-light-green-cyan-color {
	border-left-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-pale-cyan-blue-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-pale-cyan-blue-color {
	border-left-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-vivid-cyan-blue-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-vivid-cyan-blue-color {
	border-left-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-very-light-gray-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-very-light-gray-color {
	border-left-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-very-dark-gray-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-very-dark-gray-color {
	border-left-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-line.has-white-color,
.editor-styles-wrapper .is-style-st-group-line-bold.has-white-color {
	border-left-color: <?php echo ST_COLOR_WHITE; ?>;
	color: inherit!important;
}

/* かぎ括弧, 角括弧 */
.editor-styles-wrapper .is-style-st-group-corner-brackets {
	padding: 30px;
	position: relative;
}

.editor-styles-wrapper .block-editor-block-list__layout .block-editor-block-list__block:not([contenteditable]).is-style-st-group-corner-brackets.is-highlighted,
.editor-styles-wrapper .block-editor-block-list__layout .block-editor-block-list__block:not([contenteditable]).is-style-st-group-corner-brackets:focus,
.editor-styles-wrapper .block-editor-block-list__layout .block-editor-block-list__block:not([contenteditable]).is-style-st-group-square-brackets.is-highlighted,
.editor-styles-wrapper .block-editor-block-list__layout .block-editor-block-list__block:not([contenteditable]).is-style-st-group-square-brackets:focus {
	pointer-events: none;
	box-shadow: 0 0 0 var(--wp-admin-border-width-focus) var(--wp-admin-theme-color);
	outline: 2px solid transparent;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets::after,
.editor-styles-wrapper .is-style-st-group-square-brackets::after {
	box-shadow: none!important;
	outline: none!important;
	border-radius: 0!important;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets::after {
	content: '';
	width: 30px;
	height: 30px;
	position: absolute;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets::before {
	border-left: solid 1px #000;
	border-top: solid 1px #000;
	top: 0;
	right: auto;
	bottom: auto;
	left: 0;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets::after {
	border-right: solid 1px #000;
	border-bottom: solid 1px #000;
	top: auto!important;
	right: 0!important;
	bottom: 0!important;
	left: auto!important;
}

.editor-styles-wrapper .is-style-st-group-square-brackets {
	padding: 30px;
	position: relative;
}

.editor-styles-wrapper .is-style-st-group-square-brackets::before,
.editor-styles-wrapper .is-style-st-group-square-brackets::after {
	content: '';
	width: 20px;
	height: 100%;
	position: absolute;
	box-sizing: border-box;
}

.editor-styles-wrapper .is-style-st-group-square-brackets::before {
	border-left: solid 1px #eee;
	border-top: solid 1px #eee;
	border-bottom: solid 1px #eee;
	top: 0;
	right: auto;
	bottom: auto;
	left: 0;
}

.editor-styles-wrapper .is-style-st-group-square-brackets::after {
	border-right: solid 1px #eee;
	border-top: solid 1px #eee;
	border-bottom: solid 1px #eee;
	top: 0!important;
	right: 0!important;
	bottom: auto!important;
	left: auto!important;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-pale-pink-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-pale-pink-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-soft-red-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-soft-red-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-light-grayish-red-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-light-grayish-red-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-vivid-yellow-color,:
.editor-styles-wrapper .is-style-st-group-square-brackets.has-vivid-yellow-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-pale-yellow-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-pale-yellow-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-light-green-cyan-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-light-green-cyan-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-pale-cyan-blue-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-pale-cyan-blue-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-vivid-cyan-blue-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-vivid-cyan-blue-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-light-gray-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-light-gray-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-dark-gray-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-dark-gray-color,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-white-color,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-white-color {
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-pale-pink-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-pale-pink-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-pale-pink-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-pale-pink-color::after {
	border-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-soft-red-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-soft-red-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-soft-red-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-soft-red-color::after {
	border-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-light-grayish-red-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-light-grayish-red-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-light-grayish-red-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-light-grayish-red-color::after {
	border-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	color: inherit!important;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-vivid-yellow-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-vivid-yellow-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-vivid-yellow-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-vivid-yellow-color::after {
	border-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-pale-yellow-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-pale-yellow-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-pale-yellow-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-pale-yellow-color::after {
	border-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-light-green-cyan-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-light-green-cyan-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-light-green-cyan-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-light-green-cyan-color::after {
	border-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-pale-cyan-blue-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-pale-cyan-blue-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-pale-cyan-blue-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-pale-cyan-blue-color::after {
	border-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-vivid-cyan-blue-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-vivid-cyan-blue-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-vivid-cyan-blue-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-vivid-cyan-blue-color::after {
	border-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-light-gray-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-light-gray-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-light-gray-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-light-gray-color::after {
	border-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-dark-gray-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-very-dark-gray-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-dark-gray-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-very-dark-gray-color::after {
	border-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-group-corner-brackets.has-white-color::before,
.editor-styles-wrapper .is-style-st-group-corner-brackets.has-white-color::after,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-white-color::before,
.editor-styles-wrapper .is-style-st-group-square-brackets.has-white-color::after {
	border-color: <?php echo ST_COLOR_WHITE; ?>;
}

/* ブロック下の余白 */

.editor-styles-wrapper .wp-block-group.has-st-margin-bottom-1 {
<?php if ( trim( $GLOBALS['stdata540'] ) !== '' && $GLOBALS['stdata540'] >= 0 ):    // "ブロック下の余白" のデフォルト ("小") ?>
	margin: 0 0 <?php echo $GLOBALS['stdata540']; ?>px;
<?php else: ?>
	margin: 0 0 20px;
<?php endif; ?>
}

.editor-styles-wrapper p.has-no-st-margin-bottom,
.editor-styles-wrapper .wp-block-group.has-no-st-margin-bottom {    /* "ブロック下の余白" の "0" */
	margin-bottom: 0!important;
}

.editor-styles-wrapper p.has-st-margin-bottom--2,
.editor-styles-wrapper .wp-block-group.has-st-margin-bottom--2 {
<?php if ( trim( $GLOBALS['stdata538'] ) !== '' && $GLOBALS['stdata538'] >= -20 ): ?>
	margin-bottom: <?php echo $GLOBALS['stdata538']; ?>px!important;
<?php else: ?>
	margin-bottom: -20px!important;
<?php endif; ?>
}

.editor-styles-wrapper p.has-st-margin-bottom--1,
.editor-styles-wrapper .wp-block-group.has-st-margin-bottom--1 {
<?php if ( trim( $GLOBALS['stdata539'] ) !== '' && $GLOBALS['stdata539'] >= -20 ): ?>
	margin-bottom: <?php echo $GLOBALS['stdata539']; ?>px!important;
<?php else: ?>
	margin-bottom: -10px!important;
<?php endif; ?>
}

.editor-styles-wrapper p.has-st-margin-bottom-2,
.editor-styles-wrapper .wp-block-group.has-st-margin-bottom-2 {
<?php if ( trim( $GLOBALS['stdata541'] ) !== '' && $GLOBALS['stdata541'] >= 0 ): ?>
	margin-bottom: <?php echo $GLOBALS['stdata541']; ?>px!important;
<?php else: ?>
	margin-bottom: 40px!important;
<?php endif; ?>
}

.editor-styles-wrapper .wp-block-group.is-st-hidden {
	opacity: .7;
}

/* 中央寄せ */
.editor-styles-wrapper .wp-block-group.is-st-justify-center .wp-block-group__inner-container {
	width: -webkit-fit-content;
	width: fit-content;
	margin-left: auto;
	margin-right: auto;
}

/* 左寄せ */
.editor-styles-wrapper .wp-block-group.is-st-justify-left .wp-block-group__inner-container {
	width: -webkit-fit-content;
	width: fit-content;
	margin-left: 0!important;
	margin-right: auto!important;
}

/* 右寄せ */
.editor-styles-wrapper .wp-block-group.is-st-justify-right .wp-block-group__inner-container {
	width: -webkit-fit-content;
	width: fit-content;
	margin-left: auto!important;
	margin-right: 0!important;
}

/* 背景色設定時 */
.wp-block-group.has-background {
    padding: 20px;
}

/*--------------------------------
ブロックスタイル 見出し
---------------------------------*/

/* 基本 */
.editor-styles-wrapper [class^="is-style-st-heading-custom-"],
.editor-styles-wrapper [class*=" is-style-st-heading-custom-"] {
	margin-bottom: 20px;
	line-height: 1.5em;
	background-color: transparent;
	border: none;
	padding-left: 0;
	padding-right: 0;
}

/* アイコン */
.editor-styles-wrapper [class^="is-style-st-heading-custom-"]::before,
.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]::before,
.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]::after,
.editor-styles-wrapper [class^="is-style-st-heading-custom-"]::after {
    content: none;
	position: inherit;
	top: inherit;
	bottom: inherit;
	left: inherit;
	right: inherit;
	border: none;
	font-weight: normal!important;
}

/* カスタム・斜線 アイコン基本カラー */
.editor-styles-wrapper .is-style-st-heading-custom-naked:not(.has-text-color)::before,
.editor-styles-wrapper .is-style-st-heading-custom-line:not(.has-text-color)::before,
.editor-styles-wrapper .is-style-st-heading-custom-diagonal:not(.has-text-color)::before {
    color: #999;
}

/* 背景色 */
.editor-styles-wrapper [class^="is-style-st-heading-custom-"].has-background:not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count),
.editor-styles-wrapper [class*=" is-style-st-heading-custom-"].has-background:not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count) {
	padding: 10px 20px;
	border-radius: 5px;
}

/* カスタム */
.editor-styles-wrapper .is-style-st-heading-custom-naked::after,
.editor-styles-wrapper .is-style-st-heading-custom-naked::before {
    content: none;
	position: inherit;
	top: inherit;
	bottom: inherit;
	left: inherit;
	right: inherit;
	border: none;
}

/* ペン */
.editor-styles-wrapper .is-style-st-heading-custom-pen {
	display: flex;
	align-items: center;
}
.editor-styles-wrapper .is-style-st-heading-custom-pen::before {
	font-family: stsvg;
	content: "\f040";
	margin-right: .5em;
	position: inherit;
	top: inherit;
	bottom: inherit;
	left: inherit;
	right: inherit;
	border: none;
	font-weight: normal!important;
}
.editor-styles-wrapper .is-style-st-heading-custom-pen:not(.has-text-color)::before {
	color: #999;
}

/* ライン */
.editor-styles-wrapper .is-style-st-heading-custom-line {
	position: relative;
    padding-bottom: 15px;
	text-align: center;
	display: block;
	margin: 0 auto 20px;
}
.editor-styles-wrapper .is-style-st-heading-custom-line::after {
    content: "";
    position: absolute;
    top: auto;
    bottom: 0;
    left: calc(50% - 1.5em);
    right: auto;
    display: block;
    width: 3em;
    height: 1px;
	background-color: #333;
	opacity: .9;
}

/* 注意 */
.editor-styles-wrapper .is-style-st-heading-custom-attention {
	display: flex;
	align-items: center;
}
.editor-styles-wrapper .is-style-st-heading-custom-attention::before {
	font-family: stsvg;
	content: "\f06a";
	margin-right: .5em;
	color: #ef5350;
	position: inherit;
	top: inherit;
	bottom: inherit;
	left: inherit;
	right: inherit;
	border: none;
	font-weight: normal!important;
}

/* FAQ */
.editor-styles-wrapper .st-faq {
	--st--st-blocks--faq--preset--font-size--s: .8em;
	--st--st-blocks--faq--preset--font-size--m: 1em;
	--st--st-blocks--faq--preset--font-size--l: 1.5em;
	--st--st-blocks--faq--preset--font-size--xl: 3em;
	--st--st-blocks--faq--question-font-size: var(--st--st-blocks--faq--preset--font-size--m);
	--st--st-blocks--faq--answer-font-size: var(--st--st-blocks--faq--preset--font-size--m);
	--st--st-blocks--faq--font-size: 16px;
	--st--st-blocks--faq--line-height: 1.7;
	margin-top: 0;
	margin-bottom: 20px;
	padding-bottom: 40px;
	font-size: var(--st--st-blocks--faq--font-size);
	line-height: var(--st--st-blocks--faq--line-height);
}

.editor-styles-wrapper .st-faq.has-st-border {
    padding: 20px;
}

@media only screen and (min-width: 781px) {
	.editor-styles-wrapper .st-faq {
		--st--st-blocks--faq--font-size: 14px;
	}
}

.editor-styles-wrapper .st-faq.has-background {
	padding: 20px;
	background: var(--st--st-blocks--faq--background-color);
}

 .editor-styles-wrapper .st-faq.has-color,
 .editor-styles-wrapper .st-faq.has-color .st-faq__question-content /* h1-h6 */ {
	color: var(--st--st-blocks--faq--color);
}

.editor-styles-wrapper .st-faq__item {
	margin: 0 0 20px;
	line-height: inherit;
}

@media only screen and (min-width: 781px) {
	.editor-styles-wrapper .st-faq__item {
		line-height: inherit;
	}
}

/* FAQ: プレビュー */
.editor-styles-wrapper .wp-block-st-blocks-faq.is-preview.is-style-st-square {
	background-image: url(./images/st-blocks/faq/preview-is-style-st-square.png);
}

.editor-styles-wrapper .wp-block-st-blocks-faq.is-preview.is-style-st-rounded-square {
	background-image: url(./images/st-blocks/faq/preview-is-style-st-rounded-square.png);
}

.editor-styles-wrapper .wp-block-st-blocks-faq.is-preview.is-style-st-circle {
	background-image: url(./images/st-blocks/faq/preview-is-style-st-circle.png);
}

/* 質問 */
.editor-styles-wrapper .st-faq__question-content > * {
	margin-top: 0;
}

.editor-styles-wrapper .st-faq__question-content > :last-child {
	margin-bottom: 0;
}

:root .editor-styles-wrapper .is-style-st-heading-custom-question,
.editor-styles-wrapper .st-faq__question {
	display: flex;
	align-items: center;
	background-color: transparent!important;
}

.editor-styles-wrapper .st-faq__question {
	margin: 0 0 10px;
	align-items: flex-start;
	font-size: 1.2em; /* 18px / 15px */
	line-height: inherit;
}

@media only screen and (min-width: 781px) {
	.editor-styles-wrapper .st-faq__question {
		font-size: var(--st--st-blocks--faq--question-font-size);
		line-height: inherit;
	}
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-background:not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count) {
	padding: 0;
	border-radius: 0;
}

.editor-styles-wrapper .is-style-st-heading-custom-question:not(.has-background)::before,
.editor-styles-wrapper .st-faq__question::before {
    font-family: stsvg;
    content: "\e906";
    color: #29b6f6;
    padding: 0 .5em 0 .25em;
}

.editor-styles-wrapper .st-faq__question::before {
	flex-grow: 0;
	flex-shrink: 0;
	line-height: 1;
	margin-top: 0.4em;
}

.editor-styles-wrapper .st-faq.has-question-color .st-faq__question::before {
	color: var(--st--st-blocks--faq--question-color);
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-background::before,
.editor-styles-wrapper .st-faq.is-style-st-square .st-faq__question::before,
.editor-styles-wrapper .st-faq.is-style-st-rounded-square .st-faq__question::before,
.editor-styles-wrapper .st-faq.is-style-st-circle .st-faq__question::before {
    font-family: stsvg;
    content: "\e906";
    margin-right: 0.5em;
    color: #fff!important;
    padding: 0.5em 0.5em;
    background: #29b6f6;
    font-size: .65em;
    border-radius: 3px;
	line-height: 1;
}

.editor-styles-wrapper .st-faq.is-style-st-square .st-faq__question::before {
	border-radius: 0;
}

.editor-styles-wrapper .st-faq.is-style-st-circle .st-faq__question::before {
	border-radius: 100%;
}

.editor-styles-wrapper .st-faq.is-style-st-square.has-question-color .st-faq__question::before,
.editor-styles-wrapper .st-faq.is-style-st-rounded-square.has-question-color .st-faq__question::before,
.editor-styles-wrapper .st-faq.is-style-st-circle.has-question-color .st-faq__question::before {
	background-color: var(--st--st-blocks--faq--question-color);
}

.editor-styles-wrapper .st-faq__question-content {
	flex-grow: 1;
	max-width: 100%;
	margin: 0;
	font-weight: inherit;
	font-size: 1em;
	padding: 0;
	background: none;
	border: 0;
	line-height: inherit;
}

.editor-styles-wrapper .st-faq__question-content > :first-child {
	margin-top: 0;
}

.editor-styles-wrapper .st-faq__question-content > :last-child {
	margin-bottom: 0;
}

/* 答え */
.editor-styles-wrapper .st-faq__answer-content > * {
	margin-top: 0;
}

.editor-styles-wrapper .st-faq__answer-content > :last-child {
	margin-bottom: 0;
}

:root .editor-styles-wrapper .is-style-st-heading-custom-answer,
.editor-styles-wrapper .st-faq__answer {
	display: flex;
	align-items: center;
	background-color: transparent!important;
}

.editor-styles-wrapper .st-faq__answer {
	margin: 0;
	align-items: flex-start;
	font-size: 1.2em; /* 18px / 15px */
	line-height: inherit;
}

@media only screen and (min-width: 781px) {
	.editor-styles-wrapper .st-faq__answer {
		font-size: var(--st--st-blocks--faq--answer-font-size);
		line-height: inherit;
	}
}

.editor-styles-wrapper .is-style-st-heading-custom-answer.has-background:not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count) {
	padding: 0;
	border-radius: 0;
}

.editor-styles-wrapper .is-style-st-heading-custom-answer:not(.has-background)::before,
.editor-styles-wrapper .st-faq__answer::before {
    font-family: stsvg;
    content: "\f031";
    color: #ef5350;
    padding: 0 .5em 0 .25em;
}

.editor-styles-wrapper .st-faq__answer::before {
	flex-grow: 0;
	flex-shrink: 0;
	line-height: 1;
	margin-top: 0.4em;
}

.editor-styles-wrapper .st-faq.has-answer-color .st-faq__answer::before {
	color: var(--st--st-blocks--faq--answer-color);
}

.editor-styles-wrapper .is-style-st-heading-custom-answer.has-background::before,
.editor-styles-wrapper .st-faq.is-style-st-square .st-faq__answer::before,
.editor-styles-wrapper .st-faq.is-style-st-rounded-square .st-faq__answer::before,
.editor-styles-wrapper .st-faq.is-style-st-circle .st-faq__answer::before {
    font-family: stsvg;
    content: "\f031";
    margin-right: 0.5em;
    color: #fff!important;
    padding: 0.5em 0.5em;
    background: #ef5350;
    font-size: .65em;
    line-height: 1;
    border-radius: 3px;
}

.editor-styles-wrapper .st-faq.is-style-st-square .st-faq__answer::before {
	border-radius: 0;
}

.editor-styles-wrapper .st-faq.is-style-st-circle .st-faq__answer::before {
	border-radius: 100%;
}

.editor-styles-wrapper .st-faq.is-style-st-square.has-answer-color .st-faq__answer::before,
.editor-styles-wrapper .st-faq.is-style-st-rounded-square.has-answer-color .st-faq__answer::before,
.editor-styles-wrapper .st-faq.is-style-st-circle.has-answer-color .st-faq__answer::before {
	background-color: var(--st--st-blocks--faq--answer-color);
}

.editor-styles-wrapper .st-faq__answer-content {
	flex-grow: 1;
	max-width: 100%;
	font-size: 1em;
	line-height: inherit;
}

.editor-styles-wrapper .st-faq__answer-content > :first-child {
	margin-top: 0;
}

.editor-styles-wrapper .st-faq__answer-content > :last-child {
	margin-bottom: 0;
}

.editor-styles-wrapper .st-faq__answer-content p {
	font-size: 1em;
	line-height: inherit;
}

@media only screen and (min-width: 781px) {
	.st-faq__answer-content p {
		font-size: 1em;
		line-height: inherit;
	}
}

/* チェック */
.editor-styles-wrapper .is-style-st-heading-custom-check {
	display: flex;
	align-items: center;
}
.editor-styles-wrapper .is-style-st-heading-custom-check::before {
	font-family: stsvg;
	content: "\f00c";
	margin-right: .5em;
	position: inherit;
	top: inherit;
	bottom: inherit;
	left: inherit;
	right: inherit;
	border: none;
	font-weight: normal!important;
	color: #FFA726;
}

/* ランキング */
:root .editor-styles-wrapper .is-style-st-heading-custom-ranking {
    display: flex;
    position: relative;
    padding: 10px 0 10px 0!important;
    margin-bottom: 20px;
    background-color: transparent!important;
    flex-direction: column;
	margin-top: 2.5em;
}

.editor-styles-wrapper .ranknumber-reset{
	counter-reset: ranknumber-h2 ranknumber-h3 ranknumber-h4;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking::before {
	font-family: stsvg;
    background-color: #eee;
    color: #616161;
    font-size: .6em;
	line-height: 1;
    display: inline-block;
    white-space: nowrap;
    padding: .5em .8em;
	letter-spacing: 0.02em;
	position: absolute;
	top: -2em;
	border-radius: 2px;
}


/** 順位 */
.editor-styles-wrapper h2.is-style-st-heading-custom-ranking {
	counter-increment: ranknumber-h2 1;
}
.editor-styles-wrapper h2.is-style-st-heading-custom-ranking::before {
	content: "\e908 \0020 第" counter(ranknumber-h2) "位 ";
}

.editor-styles-wrapper h3.is-style-st-heading-custom-ranking {
	counter-increment: ranknumber-h3 1;
}
.editor-styles-wrapper h3.is-style-st-heading-custom-ranking::before {
	content: "\e908 \0020 第" counter(ranknumber-h3) "位 ";
}

.editor-styles-wrapper h4.is-style-st-heading-custom-ranking {
	counter-increment: ranknumber-h3 1;
}
.editor-styles-wrapper h4.is-style-st-heading-custom-ranking::before {
	content: "\e908 \0020 第" counter(ranknumber-h3) "位 ";
}

/** ラベルカラー */
.editor-styles-wrapper .is-style-st-heading-custom-ranking:nth-of-type(1)::before {
    background-color: #FFC107;
    color: #fff;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking:nth-of-type(2)::before {
    background-color: #9E9E9E;
    color: #fff;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking:nth-of-type(3)::before {
    background-color: #8D6E63;
    color: #fff;
}

/* ふきだし */
.editor-styles-wrapper .is-style-st-heading-custom-bubble {
	padding: 10px 20px;
	background: #f3f3f3;
	border-radius: 5px;
	position: relative;
}
.editor-styles-wrapper .is-style-st-heading-custom-bubble::after {
	content: '';
    position: absolute;
    margin-left: -10px;
    border: 10px solid transparent;
    border-top: 10px solid #f3f3f3;
    top: 100%;
    left: 2em;
    right: inherit;
    padding: 0;
    margin-right: 0;
}
.editor-styles-wrapper .is-style-st-heading-custom-bubble::before {
	content: none;
}

/* 斜線 */
.editor-styles-wrapper .is-style-st-heading-custom-diagonal {
	background-color: #f5f6f7;
	background-image: -webkit-gradient(linear, 0 0, 100% 100%,color-stop(.25, #fff), color-stop(.25, transparent),color-stop(.5, transparent), color-stop(.5, #fff),color-stop(.75, #fff), color-stop(.75, transparent),to(transparent));
	-webkit-background-size: 7px 7px;
	padding: 10px 20px;
	background-repeat: repeat;
}

/* テキスト中央寄せ */
.editor-styles-wrapper [class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-text-align-center,
.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-text-align-center {
	display: flex;
	justify-content: center;
	flex-direction: column;
	align-items: center;
}
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-text-align-center::after {
    left: 50%;
}

/* テキスト右寄せ */
.editor-styles-wrapper [class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-text-align-right,
.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-text-align-right {
	display: flex;
	justify-content: right;
	flex-direction: column;
	align-items: flex-end;
}
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-text-align-right::after {
    right: 2em;
	left: inherit;
}

/* カウント */
:root .editor-styles-wrapper .is-style-st-heading-custom-count {
    display: flex;
    counter-increment: countcnt;
    position: relative;
    padding: 10px 0 10px 0!important;
    margin-bottom: 20px;
    background-color: transparent!important;
    flex-direction: column;
}

.editor-styles-wrapper .is-style-st-heading-custom-count::before {
    content: counter(countcnt, decimal-leading-zero);
    background-color: transparent;
    font-size: 1.3em;
	font-weight: bold!important;
    display: block;
    color: #e0e0e0;
    width: 100%;
    white-space: nowrap;
    padding-bottom: .1em;
	letter-spacing: 0.02em;
}

.editor-styles-wrapper .has-text-align-center.is-style-st-heading-custom-count::before {
	font-size: 2em;
    padding-bottom: .5em;
}

.editor-styles-wrapper .st-heading-count-reset {
	counter-reset: countcnt;
}

/* ステップ */
.editor-styles-wrapper .is-style-st-heading-custom-step {
    display: flex;
    counter-increment: stepcnt;
    position: relative;
    padding: 10px 0 10px 3.5rem!important;
    margin-bottom: 20px;
    background-color: transparent!important;
    flex-direction: column;	
}

:root .editor-styles-wrapper .is-style-st-heading-custom-step {
	background-color: transparent!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-step::before {
	position: absolute;
	top: calc(50% - 2.5em);
	left: 0;
    content: 'STEP';
	font-size: .4em;
	line-height: 1em;
    background-color: transparent!important;
	display: inline-block;
	width: 2.5rem;
	text-align:center;
}

.editor-styles-wrapper .is-style-st-heading-custom-step::after {
	position: absolute;
	top: calc(50% - .35em);
	left: 0;
    content: counter(stepcnt, decimal-leading-zero);
    background-color: transparent!important;
	font-size: 1.25em;
	line-height: 1em;
	font-weight: bold!important;
    display: block;
    white-space: nowrap;
	letter-spacing: 0.02em;
	display: inline-block;
	width: 2rem;
	text-align:center;
	padding-bottom: 0.2em;
	margin: 0 0.25rem;
}

.editor-styles-wrapper .st-step-reset {
	counter-reset: stepcnt;
}

/* 見出しカスタム 斜線 ふきだし (アイコンあり) */
.editor-styles-wrapper .is-style-st-heading-custom-naked.has-st-icon,
.editor-styles-wrapper .is-style-st-heading-custom-diagonal.has-st-icon,
.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-st-icon {
    display: flex;
    align-items: center;
}

/* ライン (アイコンあり) */
.editor-styles-wrapper .is-style-st-heading-custom-line.has-st-icon {
    display: flex;
    align-items: center;
	justify-content: center;
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon::before {
	font-family: stsvg;
	margin-right: .3em;
	font-weight: normal;
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon:not(.has-text-color)::before {
	color: #999;
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-pencil::before {
	content: "\f040";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-file-text-o::before {
	content: "\f0f6";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-check::before {
	content: "\f00c";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-exclamation-circle::before {
	content: "\f06a";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-question-circle::before {
	content: "\f059";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-link::before {
	content: "\f0c1";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-search::before {
	content: "\f002";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-eye::before {
	content: "\f06e";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-camera::before {
	content: "\f030";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-gift::before {
	content: "\f06b";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-heart::before {
	content: "\f004";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-user::before {
	content: "\f007";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-comment::before {
	content: "\f075";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-lightbulb::before {
	content: "\e915";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-bullhorn::before {
	content: "\f0a1";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-diamond::before {
	content: "\f219";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-oukan::before {
	content: "\e908";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-bigginer_l::before {
	content: "\e910";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-info-circle::before {
	content: "\f05a";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-circle-o::before {
	content: "\f10c";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-times::before {
	content: "\f00d";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-thumbs-up::before {
	content: "\f164";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-thumbs-down::before {
	content: "\f165";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-hand-right::before {
	content: "\e974";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-emotion-smile::before {
	content: "\e91b";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-emotion-meh::before {
	content: "\e91a";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-emotion-frown::before {
	content: "\e919";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-clock-o::before {
	content: "\f017";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-folder::before {
	content: "\f07b";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-shopping-cart::before {
	content: "\f217";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-download::before {
	content: "\f019";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-twitter::before {
	content: "\e92c";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-facebook-square::before {
	content: "\f082";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-youtube-play::before {
	content: "\f16a";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-amazon::before {
	content: "\f270";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-instagram::before {
	content: "\e903";
}

.editor-styles-wrapper [class*="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-hoge):not(.is-style-st-heading-custom-test):not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-attention):not(.is-style-st-heading-custom-check):not(.is-style-st-heading-custom-question):not(.is-style-st-heading-custom-answer):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-ranking).has-st-icon-line::before {
	content: "\e912";
}

/*--------------------------------
ブロックスタイル リスト
---------------------------------*/

/* タイムライン（カウント） */
.editor-styles-wrapper .is-style-st-timeline-count.st-list-underline li {
	border: 0;
}

.editor-styles-wrapper .is-style-st-timeline-count {
	list-style: none;
	position: relative;
	counter-reset: st-list-timeline-section;
}

.editor-styles-wrapper .is-style-st-timeline-count::after {
    content: '';
    border-left: 2px solid #ccc;
    position: absolute;
    height: calc(100% - 1.5em);
    top: .2em;
    left: .8em;
    margin-top: .5em;
    opacity: .3;
}

.editor-styles-wrapper .has-background.is-style-st-timeline-count::after,
.editor-styles-wrapper .has-st-border.is-style-st-timeline-count::after {
    top: 1.7em;
    height: calc(100% - 5em);
    left: 3.3em;
}

.editor-styles-wrapper .is-style-st-timeline-count > li::before {
    position: absolute;
    border-radius: 50%;
    width: 2em;
    height: 2em;
    line-height: 1.75em;
    text-align: center;
    font-weight: normal;
    margin-top: -6px;
    background: #f3f3f3;
    color: #333;
    content: counters(st-list-timeline-section, "");
    z-index: 1;
    border: 4px solid #fff;
	left: -2px;
	transform: scale(.9);
}

.editor-styles-wrapper .is-style-st-timeline-count > li {
    counter-increment: st-list-timeline-section;
    list-style-type: none;
	padding-left: 2.5em;
	position: relative;
}

.editor-styles-wrapper .is-style-st-timeline-count li {
    text-align: left;
    border: 0;
    text-indent: 0;
}

.editor-styles-wrapper .is-style-st-timeline-count li::marker {
    color: #dedede;
}

/* タイムライン（リスト） */
.editor-styles-wrapper .is-style-st-timeline-list.st-list-underline li {
	border: 0;
}

.editor-styles-wrapper .is-style-st-timeline-list {
	list-style: none;
	position: relative;
}

.editor-styles-wrapper .is-style-st-timeline-list::after {
    content: '';
    border-left: 1px solid #ccc;
    position: absolute;
    height: calc(100% - 1em);
    top: .5em;
    left: calc(3px + .75em);
    margin-top: 0;
    opacity: .3;
}

.editor-styles-wrapper .is-style-st-timeline-list > li::before {
    position: absolute;
    border-radius: 50%;
    width: 1.5em;
    height: 1.5em;
    line-height: 1.5em;
    text-align: center;
    font-weight: normal;
    padding-right: 0;
    background: #f3f3f3;
    color: #333;
	content: '';
    z-index: 1;
    border: 4px solid #fff;
	left: .25em;
	transform: scale(.9);
}

.editor-styles-wrapper .is-style-st-timeline-list > li:first-child {
    padding-top: 0;
}

.editor-styles-wrapper .is-style-st-timeline-list > li {
    counter-increment: st-list-timeline-section;
    list-style-type: none;
	padding-left: 2.5em;
	position: relative;
}

.editor-styles-wrapper .is-style-st-timeline-list li {
    text-align: left;
    border: 0;
    text-indent: 0;
}

.editor-styles-wrapper .is-style-st-timeline-list li::marker {
    color: #dedede;
}

/* ボーダー・背景色あり */

.is-style-st-timeline-list.has-background::after,
.is-style-st-timeline-list.has-st-border::after {
    height: calc(100% - 3.5em);
    top: 2em;
	left: 2.5em;
}

/*--------------------------------
ブロックスタイル 段落
---------------------------------*/

/* 基本 */
.editor-styles-wrapper [class^="is-style-st-paragraph-"],
.editor-styles-wrapper [class*=" is-style-st-paragraph-"] {
	position: relative;
	padding: 15px;
	padding-left: 3em;
<?php if ( trim( $GLOBALS['stdata504'] ) !== '' ): ?>
	border-radius: <?php echo $GLOBALS['stdata504']; ?>px;
<?php else: ?>
	border-radius: 0;
<?php endif; ?>
}

/* テキスト寄せには非対応 */
.editor-styles-wrapper [class^="is-style-st-paragraph-"].has-text-align-center,
.editor-styles-wrapper [class*=" is-style-st-paragraph-"].has-text-align-center,
.editor-styles-wrapper [class^="is-style-st-paragraph-"].has-text-align-right,
.editor-styles-wrapper [class*=" is-style-st-paragraph-"].has-text-align-right {
	text-align: left;
}

/** アイコンサイズ */
.editor-styles-wrapper [class^="is-style-st-paragraph-"]::before,
.editor-styles-wrapper [class*=" is-style-st-paragraph-"]::before {
  	font-family: stsvg;
    position: absolute;
    top: calc(50% - .7em);
    left: 1.1em;
}

@media print, screen and (max-width: 599px) {
	.editor-styles-wrapper [class^="is-style-st-paragraph-"]::before,
	.editor-styles-wrapper [class*=" is-style-st-paragraph-"]::before {
		font-size: 1.2em;
	}
}

/* フォントサイズ - 基本 */
.editor-styles-wrapper [class^="is-style-st-paragraph-"]:not(.has-st-regular-font-size):not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b),
.editor-styles-wrapper [class*=" is-style-st-paragraph-"]:not(.has-st-regular-font-size):not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b) {
    font-size: .9em;
}

@media print, screen and (max-width: 599px) {
	.editor-styles-wrapper [class^="is-style-st-paragraph-"]:not(.has-st-regular-font-size):not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b),
	.editor-styles-wrapper [class*=" is-style-st-paragraph-"]:not(.has-st-regular-font-size):not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b),
	.editor-styles-wrapper [class^="is-style-st-paragraph-"]:not(.has-st-regular-font-size).has-st-icon:not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b),
	.editor-styles-wrapper [class*=" is-style-st-paragraph-"]:not(.has-st-regular-font-size).has-st-icon:not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b) {
		font-size: .95em;
		line-height: 1.5;
	}
}

/** フォントサイズ - アイコンサイズ */
.editor-styles-wrapper [class^="is-style-st-paragraph-"]:not(.has-st-regular-font-size)::before,
.editor-styles-wrapper [class*=" is-style-st-paragraph-"]:not(.has-st-regular-font-size)::before {
	font-size: 1.1em;
}

@media print, screen and (max-width: 599px) {
	.editor-styles-wrapper [class^="is-style-st-paragraph-"]::before,
	.editor-styles-wrapper [class*=" is-style-st-paragraph-"]::before {
		left: 1.2em;
		font-size: 1.1em;
	}
}

.editor-styles-wrapper .is-style-st-paragraph-pen.has-st-icon-camera::before,
.editor-styles-wrapper .is-style-st-paragraph-pen.has-st-icon-eye::before,
.editor-styles-wrapper .is-style-st-paragraph-pen.has-st-icon-hand-right::before
{
    top: calc(50% - .8em);
    left: .9em;
}

/* アイコン位置調整 ~ ブラウザ側はdisplay:flex */
.editor-styles-wrapper .is-style-st-paragraph-pen,
.editor-styles-wrapper .is-style-st-paragraph-memo-txt,
.editor-styles-wrapper .is-style-st-paragraph-link,
.editor-styles-wrapper .is-style-st-paragraph-check,
.editor-styles-wrapper .is-style-st-paragraph-point,
.editor-styles-wrapper .is-style-st-paragraph-info-circle,
.editor-styles-wrapper .is-style-st-paragraph-bigginer,
.editor-styles-wrapper .is-style-st-paragraph-attention,
.editor-styles-wrapper .is-style-st-paragraph-attention-gray,
.editor-styles-wrapper .is-style-st-paragraph-circle-o,
.editor-styles-wrapper .is-style-st-paragraph-times,
.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-up,
.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-down,
.editor-styles-wrapper .is-style-st-paragraph-code {
	padding-left: 4em!important;
}

.editor-styles-wrapper .is-style-st-paragraph-pen::before,
.editor-styles-wrapper .is-style-st-paragraph-memo-txt::before,
.editor-styles-wrapper .is-style-st-paragraph-link::before,
.editor-styles-wrapper .is-style-st-paragraph-check::before,
.editor-styles-wrapper .is-style-st-paragraph-point::before,
.editor-styles-wrapper .is-style-st-paragraph-info-circle::before,
.editor-styles-wrapper .is-style-st-paragraph-bigginer::before,
.editor-styles-wrapper .is-style-st-paragraph-attention::before,
.editor-styles-wrapper .is-style-st-paragraph-attention-gray::before,
.editor-styles-wrapper .is-style-st-paragraph-circle-o::before,
.editor-styles-wrapper .is-style-st-paragraph-times::before,
.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-up::before,
.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-down::before,
.editor-styles-wrapper .is-style-st-paragraph-code::before {
	padding-right: 1em;
	left: 1em;
}

.editor-styles-wrapper .is-style-st-paragraph-pen.has-st-icon-camera::before,
.editor-styles-wrapper .is-style-st-paragraph-pen.has-st-icon-eye::before,
.editor-styles-wrapper .is-style-st-paragraph-pen.has-st-icon-hand-right::before
{
    top: calc(50% - 1em);
}

/* ふきだし */
.editor-styles-wrapper .is-style-st-paragraph-bubble.has-st-icon::before {
    left: .8em;
}
/* まるもじ */
.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-st-icon::before {
	left: 1em;
}

/* カスタム */
.editor-styles-wrapper .is-style-st-paragraph-pen {
	background-color: #fafafa;
}

.editor-styles-wrapper .is-style-st-paragraph-pen::before {
   	content: "\f040";
	font-size: 1.2em;
	border-right: 1px solid #dddddd;
}

.editor-styles-wrapper .is-style-st-paragraph-pen:not(.has-text-color)::before {
    color: #999;
}

.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-st-icon-camera::before,
.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-st-icon-eye::before,
.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-st-icon-hand-right::before
 {
    font-size: .9em;
}

/* メモ */
.editor-styles-wrapper .is-style-st-paragraph-memo-txt {
	background-color: #fafafa;
}

.editor-styles-wrapper .is-style-st-paragraph-memo-txt::before {
   	content: "\f0f6";
	border-right: 1px solid #dddddd;
}

.editor-styles-wrapper .is-style-st-paragraph-memo-txt:not(.has-text-color)::before {
	color: #999;
}

.editor-styles-wrapper .is-style-st-paragraph-memo-txt::after {
	border-right-color: #919191;
	opacity: .3;
}

/* リンク */
.editor-styles-wrapper .is-style-st-paragraph-link {
	background-color: #fafafa;
}

.editor-styles-wrapper .is-style-st-paragraph-link::before {
   	content: "\f0c1";
	color: #c2c2c2;
	border-right: 1px solid #dddddd;
}

.editor-styles-wrapper .is-style-st-paragraph-link::after {
	border-right-color: #919191;
	opacity: .3;
}

/* チェック */
.editor-styles-wrapper .is-style-st-paragraph-check {
	background-color: #FFF8E1;
}

.editor-styles-wrapper .is-style-st-paragraph-check::before {
   	content: "\f00c";
	color: #FF8F00;
	border-right: 1px solid #FFE082;
}

.editor-styles-wrapper .is-style-st-paragraph-check::after {
	border-right-color: #FFE082;
	opacity: .3;
}

/* ポイント */
.editor-styles-wrapper .is-style-st-paragraph-point {
	background-color: #FFF8E1;
}

.editor-styles-wrapper .is-style-st-paragraph-point::before {
   	content: "\f0eb";
	color: #FFA726;
	border-right: 1px solid #FFE082;
}

.editor-styles-wrapper .is-style-st-paragraph-point::after {
	border-right-color: #FFA726;
	opacity: .3;
}

/* インフォ */
.editor-styles-wrapper .is-style-st-paragraph-info-circle {
	background-color: #E1F5FE;
}

.editor-styles-wrapper .is-style-st-paragraph-info-circle::before {
   	content: "\f05a";
	color: #4FC3F7;
	border-right: 1px solid #c0e9fc;
}

.editor-styles-wrapper .is-style-st-paragraph-info-circle::after {
	border-right-color: #4FC3F7;
	opacity: .3;
}

/* 初心者 */
.editor-styles-wrapper .is-style-st-paragraph-bigginer {
	background-color: #F1F8E9;
}

.editor-styles-wrapper .is-style-st-paragraph-bigginer::before {
   	content: "\e910";
	color: #9CCC65;
	border-right: 1px solid #9CCC65;
}

.editor-styles-wrapper .is-style-st-paragraph-bigginer::after {
	border-right-color: #9CCC65;
	opacity: .3;
}

/* 注意 */
.editor-styles-wrapper .is-style-st-paragraph-attention {
	background-color: #ffebee;
}

.editor-styles-wrapper .is-style-st-paragraph-attention::before {
   	content: "\f06a";
	color: #ef5350;
	border-right: 1px solid #f9bdbc;
}

.editor-styles-wrapper .is-style-st-paragraph-attention::after {
	border-right-color: #ef5350;
	opacity: .3;
}

/* 注意（グレー） */
.editor-styles-wrapper .is-style-st-paragraph-attention-gray {
	background-color: #fafafa;
}

.editor-styles-wrapper .is-style-st-paragraph-attention-gray::before {
   	content: "\f06a";
	color: #c2c2c2;
	border-right: 1px solid #dddddd;
}

.editor-styles-wrapper .is-style-st-paragraph-attention-gray::after {
	border-right-color: #919191;
	opacity: .3;
}

/* サークル */
.editor-styles-wrapper .is-style-st-paragraph-circle-o {
	background-color: #E1F5FE;
}

.editor-styles-wrapper .is-style-st-paragraph-circle-o::before {
   	content: "\f10c";
	color: #4FC3F7; 
	border-right: 1px solid #c0e9fc;
}

.editor-styles-wrapper .is-style-st-paragraph-circle-o::after {
	border-right-color: #4FC3F7;
	opacity: .3;
}

/*マル*/
.editor-styles-wrapper .is-style-st-correct-list{
    max-width: 100%;
    box-sizing: border-box;
    padding-left: 0;
    margin-left: 0;
}

.editor-styles-wrapper .is-style-st-correct-list > li::before {
	content: " \f10c";
	font-family: stsvg;
	width: 1.5em;
    height: 1.5em;
    line-height: 1.5em;
    text-align: center;
    color: #4FC3F7;
    box-sizing: border-box;
    left: .25em;
    position: absolute;
}

.editor-styles-wrapper .is-style-st-correct-list > li{
    list-style-type: none;
    padding-left: 2.25em;
	position: relative;
}

/*バツ*/
.editor-styles-wrapper .is-style-st-wrong-list{
    max-width: 100%;
    box-sizing: border-box;
    padding-left: 0;
    margin-left: 0;
}

.editor-styles-wrapper .is-style-st-wrong-list > li::before {
	content: " \f00d";
	font-family: stsvg;
	width: 1.5em;
    height: 1.5em;
    line-height: 1.5em;
    text-align: center;
    color: #F44336;
    box-sizing: border-box;
    left: .25em;
    position: absolute;
}

.editor-styles-wrapper .is-style-st-wrong-list > li{
    list-style-type: none;
    padding-left: 2.25em;
	position: relative;
}

/* バツ */
.editor-styles-wrapper .is-style-st-paragraph-times {
	background-color: #ffebee;
}

.editor-styles-wrapper .is-style-st-paragraph-times::before {
   	content: "\f00d";
	color: #ef5350;
	border-right: 1px solid #f9bdbc;
}

.editor-styles-wrapper .is-style-st-paragraph-times::after {
	border-right-color: #ef5350;
	opacity: .3;
}

/* Like */
.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-up {
	background-color: #E1F5FE;
}

.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-up::before {
   	content: "\f164";
	color: #4FC3F7;
	border-right: 1px solid #c0e9fc;
}

.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-up::after {
	border-right-color: #4FC3F7;
	opacity: .3;
}

/* Bad */
.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-down {
	background-color: #ffebee;
}

.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-down::before {
   	content: "\f165";
	color: #ef5350;
	border-right: 1px solid #f9bdbc;
}

.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-down::after {
	border-right-color: #ef5350;
	opacity: .3;
}

/* Code */
.editor-styles-wrapper .is-style-st-paragraph-code {
	font-family: monospace!important;
	background-color: #313131;
	color: #fafafa;
}

.editor-styles-wrapper .is-style-st-paragraph-code::before {
   	content: "\f121";
	color: #cccccc;
	font-size: 1em;
	border-right: 1px solid #616161;
}

.editor-styles-wrapper .is-style-st-paragraph-code::after {
	border-right-color: #cccccc;
	opacity: .3;
}

/* 簡易会話ふきだし */
.editor-styles-wrapper .is-style-st-paragraph-kaiwa,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b {
	position: relative;
	background: #fafafa;
	border-radius: 5px;
    padding-left: 60px!important;
    width: fit-content!important;
	width: -webkit-fit-content!important;
    margin-left: 0;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa::before,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b::before {
	content: '';
	display: inline-block;
    width: 60px;
    height: 60px;
	background-size: contain;
	vertical-align: middle;
	position: absolute;
	top: inherit!important;
    bottom: -10px!important;
    left: -10px!important;
	border-radius: 50%;
    background-color: #fff;
}

/* 簡易会話 Sサイズ */
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-small-font-size::before,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-small-font-size::before {
    width: 50px;
    min-width: 50px;
    height: 50px;
    border-radius: 0;
	border: none;
}


.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-small-font-size .st-paragraph-kaiwa-text,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-small-font-size .st-paragraph-kaiwa-text {
    padding: 10px 15px;
    margin-left:13px
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-small-font-size::after,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-small-font-size::after {
    left: 50px!important;
    top: 17px!important;
    border: 7px solid transparent;
    border-right-color: #f5f5f5;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-small-font-size:not(.stop)::before,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-small-font-size:not(.stop)::before {
    animation: none;
}

/** ミニサイズ */
.editor-styles-wrapper .mini.is-style-st-paragraph-kaiwa::before,
.editor-styles-wrapper .mini.is-style-st-paragraph-kaiwa-b::before {
    width: 40px;
    min-width: 40px;
    height: 40px;
}

.editor-styles-wrapper .mini.is-style-st-paragraph-kaiwa .st-paragraph-kaiwa-text,
.editor-styles-wrapper .mini.is-style-st-paragraph-kaiwa-b .st-paragraph-kaiwa-text {
    padding: 10px;
    margin-left: 5px;
    margin-top: 10px;
    font-size: .8em;
	line-height: 1em;
}

.editor-styles-wrapper .mini.is-style-st-paragraph-kaiwa::after,
.editor-styles-wrapper .mini.is-style-st-paragraph-kaiwa-b::after {
    left: 35px!important;
	border-left: 5px solid transparent;
	border-top: 5px solid transparent;
	border-bottom: 5px solid transparent;
	border-right-width: 5px;
}

.editor-styles-wrapper .mini.is-style-st-paragraph-kaiwa::after,
.editor-styles-wrapper .mini.is-style-st-paragraph-kaiwa-b::after {
    top: 50%;
}

/** 動かすクラス bound
.editor-styles-wrapper .is-style-st-paragraph-kaiwa.bound::before,
.editor-styles-wrapper .st-kaiwa-box.bound .st-kaiwa-face img {
	animation: animScale 4s infinite ease-out;
	transform-origin: 50% 50%;
	animation-play-state:running;
	backface-visibility: hidden;
}

.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.bound::before,
.editor-styles-wrapper .st-kaiwa-box.bound .st-kaiwa-face2 img {
	animation: animScale 4.5s infinite ease-out;
	transform-origin: 50% 50%;
	animation-play-state:running;
	backface-visibility: hidden;
}

@keyframes animScale {
	0% { transform: scale(0.8, 0.8); }
	5% { transform: scale(1.1, 1.1); }
	10% { transform: scale(1, 1); }
	15% { transform: scale(1.1, 1.1); }
	20% { transform: scale(1, 1); }
	100% { transform: scale(1, 1); }
}
*/

<?php if( $st_kaiwa_no_border ): // アイコンに枠線をつける ?>
	.editor-styles-wrapper .st-kaiwa-box:not(.st-kaiwa) .st-kaiwa-face img,
	.editor-styles-wrapper .st-kaiwa-box:not(.st-kaiwa) .st-kaiwa-face2 img,
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa::before,
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b::before {
		border: 1px solid #ccc;
	}
<?php endif; ?>

.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-st-border,
.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-st-border {
<?php if ( trim( $GLOBALS['stdata502'] ) !== '' ): ?>
	border-color: <?php echo $GLOBALS['stdata502']; ?>;
<?php endif; ?>
}

<?php if ( trim( $GLOBALS['stdata502'] ) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-st-border::after,
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-st-border::after {
		border-right-color: <?php echo $GLOBALS['stdata502']; ?>!important;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata567']) === '' ):
	if ( trim( $GLOBALS["stdata131"] ) !== '' ):
		$kaiwaiconurl = esc_url( $GLOBALS["stdata131"] );
	else:
		$kaiwaiconurl = get_template_directory_uri().'/images/no-img.png';
	endif; ?>
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa::before {
		background-image: url(<?php echo $kaiwaiconurl; ?>);
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata568']) === '' ):
	if ( trim( $GLOBALS["stdata132"] ) !== '' ):
		$kaiwaiconurl_b = esc_url( $GLOBALS["stdata132"] );
	else:
		$kaiwaiconurl_b = get_template_directory_uri().'/images/no-img.png';
	endif; ?>
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b::before {
		background-image: url(<?php echo $kaiwaiconurl_b?>);
	}
<?php endif; ?>

<?php if($st_kaiwa_bgcolor): // カスタマイザー会話ふきだしカラー ?>
	/* 簡易会話ふきだし */
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa,
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b {
		background-color: <?php echo $st_kaiwa_bgcolor; ?>;
	}
<?php endif; ?>

<?php if($st_kaiwa2_bgcolor): ?>
	/* 簡易会話ふきだしB */
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b {
		background-color: <?php echo $st_kaiwa2_bgcolor; ?>;
	}
<?php endif; ?>

/* Gutenberg オリジナルパレット */
<?php if( trim($GLOBALS['stdata460']) !== '' ): //カラーA ?>
	.editor-styles-wrapper .has-original-color-a-color {
		color: <?php echo $GLOBALS['stdata460']; ?> !important;
	}
	.editor-styles-wrapper .has-original-color-a-background-color {
		background-color: <?php echo $GLOBALS['stdata460']; ?> !important;
	}
	.editor-styles-wrapper .has-original-color-a-border-color {
		border-color: <?php echo $GLOBALS['stdata460']; ?> !important;
	}
	.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-original-color-a-color::before {
		color: <?php echo $GLOBALS['stdata460']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata460']; ?> !important;
	}
	/* 簡易会話ふきだし */
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-original-color-a-background-color,
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-original-color-a-background-color {
		background-color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	/* 見出しアイコン */
	.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-original-color-a-color::before {
		color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	/* 見出しふきだし */
	.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-original-color-a-background-color::after {
		border-top-color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	/* 見出しライン */
	.editor-styles-wrapper .is-style-st-heading-custom-line.has-original-color-a-color::after {
		background-color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	/* カウント */
	.editor-styles-wrapper .is-style-st-heading-custom-count.has-original-color-a-color {
		color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-count.has-original-color-a-background-color::before {
		color: <?php echo $GLOBALS['stdata460']; ?>;
		border-color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	/* ステップ */
	.editor-styles-wrapper .is-style-st-heading-custom-step.has-original-color-a-background-color::before {
		color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-step.has-original-color-a-background-color::after {
		border-color: <?php echo $GLOBALS['stdata460']; ?>;
		color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	/* 質問と答え */
	.editor-styles-wrapper .is-style-st-heading-custom-question.has-original-color-a-color::before,
	.editor-styles-wrapper .is-style-st-heading-custom-answer.has-original-color-a-color::before {
		color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-question.has-original-color-a-background-color::before,
	.editor-styles-wrapper .is-style-st-heading-custom-answer.has-original-color-a-background-color::before {
		background-color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	/* ランキング */
	.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-original-color-a-background-color::before {
		background-color: <?php echo $GLOBALS['stdata460']; ?>;
		color: #fff!important;
	}
	/* グループ ライン */
	.editor-styles-wrapper .is-style-st-group-line-bold.has-original-color-a-color,
	.editor-styles-wrapper .is-style-st-group-line.has-original-color-a-color {
		border-left-color: <?php echo $GLOBALS['stdata460']; ?>;
		color: inherit!important;
	}
	/* グループ かぎ括弧, 角括弧 */
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-a-color,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-a-color {
		color: inherit!important;
	}
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-a-color::before,
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-a-color::after,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-a-color::before,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-a-color::after {
		border-color: <?php echo $GLOBALS['stdata460']; ?>;
	}
	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-original-color-a-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-original-color-a-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo $GLOBALS['stdata460']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata461']) !== '' ): //カラーB ?>
	.editor-styles-wrapper .has-original-color-b-color {
		color: <?php echo $GLOBALS['stdata461']; ?> !important;
	}
	.editor-styles-wrapper .has-original-color-b-background-color {
		background-color: <?php echo $GLOBALS['stdata461']; ?> !important;
	}
	.editor-styles-wrapper .has-original-color-b-border-color {
		border-color: <?php echo $GLOBALS['stdata461']; ?> !important;
	}
	.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-original-color-b-color::before {
		color: <?php echo $GLOBALS['stdata461']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata461']; ?>!important;
	}
	/* 簡易会話ふきだし */
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-original-color-b-background-color,
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-original-color-b-background-color {
		background-color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	/* 見出しアイコン */
	.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-original-color-b-color::before {
		color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	/* 見出しふきだし */
	.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-original-color-b-background-color::after {
		border-top-color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	/* 見出しライン */
	.editor-styles-wrapper .is-style-st-heading-custom-line.has-original-color-b-color::after {
		background-color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	/* カウント */
	.editor-styles-wrapper .is-style-st-heading-custom-count.has-original-color-b-color {
		color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-count.has-original-color-b-background-color::before {
		color: <?php echo $GLOBALS['stdata461']; ?>;
		border-color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	/* ステップ */
	.editor-styles-wrapper .is-style-st-heading-custom-step.has-original-color-b-background-color::before {
		color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-step.has-original-color-b-background-color::after {
		border-color: <?php echo $GLOBALS['stdata461']; ?>;
		color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	/* 質問と答え */
	.editor-styles-wrapper .is-style-st-heading-custom-question.has-original-color-b-color::before,
	.editor-styles-wrapper .is-style-st-heading-custom-answer.has-original-color-b-color::before {
		color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-question.has-original-color-b-background-color::before,
	.editor-styles-wrapper .is-style-st-heading-custom-answer.has-original-color-b-background-color::before {
		background-color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	/* ランキング */
	.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-original-color-b-background-color::before {
		background-color: <?php echo $GLOBALS['stdata461']; ?>;
		color: #fff!important;
	}
	/* グループ ライン */
	.editor-styles-wrapper .is-style-st-group-line-bold.has-original-color-b-color,
	.editor-styles-wrapper .is-style-st-group-line.has-original-color-b-color {
		border-left-color: <?php echo $GLOBALS['stdata461']; ?>;
		color: inherit!important;
	}
	/* グループ かぎ括弧, 角括弧 */
	:root .editor-styles-wrapper .is-style-st-group-corner-brackets,
	:root .editor-styles-wrapper .is-style-st-group-square-brackets {
		color: inherit!important;
	}
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-b-color::before,
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-b-color::after,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-b-color::before,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-b-color::after {
		border-color: <?php echo $GLOBALS['stdata461']; ?>;
	}
	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-original-color-b-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-original-color-b-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo $GLOBALS['stdata461']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata462']) !== '' ): //カラーC ?>
	.editor-styles-wrapper .has-original-color-c-color {
		color: <?php echo $GLOBALS['stdata462']; ?> !important;
	}
	.editor-styles-wrapper .has-original-color-c-background-color {
		background-color: <?php echo $GLOBALS['stdata462']; ?> !important;
	}
	.editor-styles-wrapper .has-original-color-c-border-color {
		border-color: <?php echo $GLOBALS['stdata462']; ?> !important;
	}
	.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-original-color-c-color::before {
		color: <?php echo $GLOBALS['stdata462']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata462']; ?>!important;
	}
	/* 簡易会話ふきだし */
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-original-color-c-background-color,
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-original-color-c-background-color {
		background-color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	/* 見出しアイコン */
	.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-original-color-c-color::before {
		color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	/* 見出しふきだし */
	.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-original-color-c-background-color::after {
		border-top-color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	/* 見出しライン */
	.editor-styles-wrapper .is-style-st-heading-custom-line.has-original-color-c-color::after {
		background-color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	/* カウント */
	.editor-styles-wrapper .is-style-st-heading-custom-count.has-original-color-c-color {
		color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-count.has-original-color-c-background-color::before {
		color: <?php echo $GLOBALS['stdata462']; ?>;
		border-color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	/* ステップ */
	.editor-styles-wrapper .is-style-st-heading-custom-step.has-original-color-c-background-color::before {
		color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-step.has-original-color-c-background-color::after {
		border-color: <?php echo $GLOBALS['stdata462']; ?>;
		color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	/* 質問と答え */
	.editor-styles-wrapper .is-style-st-heading-custom-question.has-original-color-c-color::before,
	.editor-styles-wrapper .is-style-st-heading-custom-answer.has-original-color-c-color::before {
		color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-question.has-original-color-c-background-color::before,
	.editor-styles-wrapper .is-style-st-heading-custom-answer.has-original-color-c-background-color::before {
		background-color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	/* ランキング */
	.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-original-color-c-background-color::before {
		background-color: <?php echo $GLOBALS['stdata462']; ?>;
		color: #fff!important;
	}
	/* グループ ライン */
	.editor-styles-wrapper .is-style-st-group-line-bold.has-original-color-c-color,
	.editor-styles-wrapper .is-style-st-group-line.has-original-color-c-color {
		border-left-color: <?php echo $GLOBALS['stdata462']; ?>;
		color: inherit!important;
	}
	/* グループ かぎ括弧, 角括弧 */
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-c-color,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-c-color {
		color: inherit!important;
	}
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-c-color::before,
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-c-color::after,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-c-color::before,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-c-color::after {
		border-color: <?php echo $GLOBALS['stdata462']; ?>;
	}
	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-original-color-c-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-original-color-c-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo $GLOBALS['stdata462']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata463']) !== '' ): //カラーD ?>
	.editor-styles-wrapper .has-original-color-d-color {
		color: <?php echo $GLOBALS['stdata463']; ?> !important;
	}
	.editor-styles-wrapper .has-original-color-d-background-color {
		background-color: <?php echo $GLOBALS['stdata463']; ?> !important;
	}
	.editor-styles-wrapper .has-original-color-d-border-color {
		border-color: <?php echo $GLOBALS['stdata463']; ?> !important;
	}
	.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-original-color-d-color::before {
		color: <?php echo $GLOBALS['stdata463']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata463']; ?>!important;
	}
	/* 簡易会話ふきだし */
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa.has-original-color-d-background-color,
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b.has-original-color-d-background-color {
		background-color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	/* 見出しアイコン */
	.editor-styles-wrapper [class*=" is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-original-color-d-color::before {
		color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	/* 見出しふきだし */
	.editor-styles-wrapper .is-style-st-heading-custom-bubble.has-original-color-d-background-color::after {
		border-top-color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	/* 見出しライン */
	.editor-styles-wrapper .is-style-st-heading-custom-line.has-original-color-d-color::after {
		background-color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	/* カウント */
	.editor-styles-wrapper .is-style-st-heading-custom-count.has-original-color-d-color {
		color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-count.has-original-color-d-background-color::before {
		color: <?php echo $GLOBALS['stdata463']; ?>;
		border-color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	/* ステップ */
	.editor-styles-wrapper .is-style-st-heading-custom-step.has-original-color-d-background-color::before {
		color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-step.has-original-color-d-background-color::after {
		border-color: <?php echo $GLOBALS['stdata463']; ?>;
		color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	/* 質問と答え */
	.editor-styles-wrapper .is-style-st-heading-custom-question.has-original-color-d-color::before,
	.editor-styles-wrapper .is-style-st-heading-custom-answer.has-original-color-d-color::before {
		color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	.editor-styles-wrapper .is-style-st-heading-custom-question.has-original-color-d-background-color::before,
	.editor-styles-wrapper .is-style-st-heading-custom-answer.has-original-color-d-background-color::before {
		background-color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	/* ランキング */
	.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-original-color-d-background-color::before {
		background-color: <?php echo $GLOBALS['stdata463']; ?>;
		color: #fff!important;
	}
	/* グループ ライン */
	.editor-styles-wrapper .is-style-st-group-line-bold.has-original-color-d-color,
	.editor-styles-wrapper .is-style-st-group-line.has-original-color-d-color {
		border-left-color: <?php echo $GLOBALS['stdata463']; ?>;
		color: inherit!important;
	}
	/* グループ かぎ括弧, 角括弧 */
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-d-color,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-d-color {
		color: inherit!important;
	}
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-d-color::before,
	.editor-styles-wrapper .is-style-st-group-corner-brackets.has-original-color-d-color::after,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-d-color::before,
	.editor-styles-wrapper .is-style-st-group-square-brackets.has-original-color-d-color::after {
		border-color: <?php echo $GLOBALS['stdata463']; ?>;
	}
	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border.has-original-color-d-border-color .st-tabs__tab[aria-selected="true"]::before,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-original-color-d-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo $GLOBALS['stdata463']; ?>;
	}
<?php endif; ?>


/* カラーパレット選択時の見出し（質問と答え） */
.editor-styles-wrapper .is-style-st-heading-custom-question.has-pale-pink-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-pale-pink-background-color::before {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-soft-red-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-soft-red-background-color::before {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-light-grayish-red-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-light-grayish-red-background-color::before {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-vivid-yellow-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-vivid-yellow-background-color::before {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-very-pale-yellow-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-very-pale-yellow-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-light-green-cyan-background-color::before ,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-light-green-cyan-background-color::before {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-pale-cyan-blue-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-pale-cyan-blue-background-color::before {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-vivid-cyan-blue-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-vivid-cyan-blue-background-color::before {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-very-light-gray-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-very-light-gray-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-very-dark-gray-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-very-dark-gray-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper .is-style-st-heading-custom-question.has-white-background-color::before,
.editor-styles-wrapper .is-style-st-heading-custom-answer.has-white-background-color::before {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット選択時の見出し（ランキング） */
.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-pale-pink-background-color::before {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-soft-red-background-color::before {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-light-grayish-red-background-color::before {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-vivid-yellow-background-color::before {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-very-pale-yellow-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-light-green-cyan-background-color::before {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-pale-cyan-blue-background-color::before {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-vivid-cyan-blue-background-color::before {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-very-light-gray-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-very-dark-gray-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	color: #fff!important;
}

.editor-styles-wrapper .is-style-st-heading-custom-ranking.has-white-background-color::before {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
	color: #fff!important;
}

/* 付箋 */
.editor-styles-wrapper .is-style-st-paragraph-memo {
	background-color: #FFFDE7;
	padding: 20px 30px;
	border: 0;
	border-radius: 0;
}

.editor-styles-wrapper .is-style-st-paragraph-memo::before {
    content: '';
    border-style: solid;
    border-color: transparent #fff transparent transparent;
    border-width: 0 15px 15px 0;
    position: absolute;
    top: 0;
	left: inherit;
    right: 0;
    width: 0;
    height: 0;
    z-index: 2;
}

.editor-styles-wrapper .is-style-st-paragraph-memo::after {
    content: '';
    border-style: solid;
    border-color: transparent #fff #1a1a1a transparent;
    border-width: 0 15px 15px 0;
    position: absolute;
    top: 0;
	left: inherit;
    right: 0;
    width: 0;
    height: 0;
    opacity: 0.1;
    z-index: 3;
}

/* 囲みドット */
.editor-styles-wrapper .is-style-st-paragraph-dotline {
	background-color: #FCE4EC;
	box-shadow: 0px 0px 0px 7px #FCE4EC;
	padding: 25px 35px;
	border: 2px dashed rgba(255,255,255, 0.7);
<?php if ( trim( $GLOBALS['stdata504'] ) !== '' ): ?>
	border-radius: <?php echo $GLOBALS['stdata504']; ?>px;
<?php else: ?>
	border-radius: 0;
<?php endif; ?>
}

/** Gutenberg オリジナルパレット */
<?php if( trim($GLOBALS['stdata460']) !== '' ): //カラーA ?>
	.editor-styles-wrapper .is-style-st-paragraph-dotline.has-original-color-a-background-color {
		box-shadow: 0px 0px 0px 7px <?php echo $GLOBALS['stdata460']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata461']) !== '' ): //カラーB ?>
	.editor-styles-wrapper .is-style-st-paragraph-dotline.has-original-color-b-background-color {
		box-shadow: 0px 0px 0px 7px <?php echo $GLOBALS['stdata461']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata462']) !== '' ): //カラーC ?>
	.editor-styles-wrapper .is-style-st-paragraph-dotline.has-original-color-c-background-color {
		box-shadow: 0px 0px 0px 7px <?php echo $GLOBALS['stdata462']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata463']) !== '' ): //カラーD ?>
	.editor-styles-wrapper .is-style-st-paragraph-dotline.has-original-color-d-background-color {
		box-shadow: 0px 0px 0px 7px <?php echo $GLOBALS['stdata463']; ?>;
	}
<?php endif; ?>

/* ふきだし */
.editor-styles-wrapper .is-style-st-paragraph-bubble.has-st-icon {
	padding-left: 2.3em !important; /* 段落の padding-left + 1em + アイコンの padding-right */
}

/* まるもじ */
.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-st-icon {
	padding-left: 2.5em !important; /* 段落の padding-left + 1em + アイコンの padding-right */
}

@media print, screen and (max-width: 599px) {
	.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-st-icon {
		padding-left: 2.7em !important;
	}
}

/* 簡易ボタン (アイコンあり) */
.editor-styles-wrapper .is-style-st-paragraph-button.has-st-icon.has-background,
.editor-styles-wrapper .is-style-st-paragraph-button.has-st-icon {
	padding-left: 2.3em !important; /* 段落の padding-left + 1em + アイコンの padding-right */
}

/* ペン, ふきだし, まるもじ, 簡易ボタン (アイコンあり) */
.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-pencil::before {
	content: "\f040";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-file-text-o::before {
	content: "\f0f6";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-check::before {
	content: "\f00c";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-exclamation-circle::before {
	content: "\f06a";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-question-circle::before {
	content: "\f059";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-link::before {
	content: "\f0c1";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-search::before {
	content: "\f002";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-eye::before {
	content: "\f06e";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-camera::before {
	content: "\f030";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-gift::before {
	content: "\f06b";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-heart::before {
	content: "\f004";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-user::before {
	content: "\f007";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-comment::before {
	content: "\f075";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-lightbulb::before {
	content: "\e915";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-bullhorn::before {
	content: "\f0a1";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-diamond::before {
	content: "\f219";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-oukan::before {
	content: "\e908";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-bigginer_l::before {
	content: "\e910";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-info-circle::before {
	content: "\f05a";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-circle-o::before {
	content: "\f10c";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-times::before {
	content: "\f00d";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-thumbs-up::before {
	content: "\f164";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-thumbs-down::before {
	content: "\f165";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-hand-right::before {
	content: "\e974";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-emotion-smile::before {
	content: "\e91b";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-emotion-meh::before {
	content: "\e91a";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-emotion-frown::before {
	content: "\e919";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-clock-o::before {
	content: "\f017";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-folder::before {
	content: "\f07b";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-shopping-cart::before {
	content: "\f217";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-download::before {
	content: "\f019";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-twitter::before {
	content: "\e92c";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-facebook-square::before {
	content: "\f082";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-youtube-play::before {
	content: "\f16a";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-amazon::before {
	content: "\f270";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-instagram::before {
	content: "\e903";
}

.editor-styles-wrapper [class*="is-style-st-paragraph-"].has-st-icon-line::before {
	content: "\e912";
}

/* ふきだし まるもじ */
.editor-styles-wrapper .is-style-st-paragraph-bubble:not(.has-text-color)::before,
.editor-styles-wrapper .is-style-st-paragraph-marumozi:not(.has-text-color)::before {
    color: #999;
}

/* ふきだし */
.editor-styles-wrapper .is-style-st-paragraph-bubble {
	line-height: 1.5;
	position: relative;
	background: #f3f3f3;
	color: #1a1a1a;
	line-height: 1.4;
	margin-bottom: 20px;
	margin-left: 0!important;
	padding: 10px 20px;
<?php if ( trim( $GLOBALS['stdata504'] ) !== '' ): ?>
	border-radius: <?php echo $GLOBALS['stdata504']; ?>px;
<?php else: ?>
	border-radius: 0;
<?php endif; ?>
	z-index:2;
    width: fit-content;
	width: -webkit-fit-content!important;
    width: -moz-fit-content!important;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-st-border {
	border-style: solid;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble::after {
	content: '';
	position: absolute;
 	margin-left: -10px;
	border: 10px solid transparent;
	border-top: 10px solid #f3f3f3;
	top: 100%;
	left: 2em;
	right: inherit;
	padding: 0;
	margin-right: 0;
}

/* テキスト寄せ */
.editor-styles-wrapper .is-style-st-paragraph-bubble.has-text-align-center {
	margin-left: auto!important;
	margin-right: auto;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-text-align-center::after {
	left: 50%;
}

.editor-styles-wrapper .wp-block-group.is-st-justify-center .wp-block-group__inner-container .is-style-st-paragraph-bubble::after {
	left: 50%;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-text-align-right {
	margin-left: auto!important;
	margin-right: 0;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-st-border::after {
	content: '';
	position: absolute;
	margin-left: -2px;
	border: 12px solid transparent;
<?php if ( trim( $GLOBALS['stdata502'] ) !== '' ): ?>
	border-top: 12px solid <?php echo $GLOBALS['stdata502']; ?>;
<?php else: ?>
	border-top: 12px solid #eee;
<?php endif; ?>
	top: 100%;
	left: 1.5em;
	padding: 0;
	margin-right: 0;
	z-index: -1;
}

.editor-styles-wrapper .is-style-st-paragraph-bubble.has-st-thick-border-width::after {
	margin-left: -6px;
	border-width: 16px;
}

/** Gutenberg オリジナルパレット */
<?php if( trim($GLOBALS['stdata460']) !== '' ): //カラーA ?>
	.editor-styles-wrapper .is-style-st-paragraph-bubble.has-original-color-a-background-color::after {
		border-top-color: <?php echo $GLOBALS['stdata460']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata461']) !== '' ): //カラーB ?>
	.editor-styles-wrapper .is-style-st-paragraph-bubble.has-original-color-b-background-color::after {
		border-top-color: <?php echo $GLOBALS['stdata461']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata462']) !== '' ): //カラーC ?>
	.editor-styles-wrapper .is-style-st-paragraph-bubble.has-original-color-c-background-color::after {
		border-top-color: <?php echo $GLOBALS['stdata462']; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata463']) !== '' ): //カラーD ?>
	.editor-styles-wrapper .is-style-st-paragraph-bubble.has-original-color-d-background-color::after {
		border-top-color: <?php echo $GLOBALS['stdata463']; ?>;
	}
<?php endif; ?>

/* まるもじ */
.editor-styles-wrapper .is-style-st-paragraph-marumozi {
	line-height: 1.5;
    width: fit-content!important;
	width: -webkit-fit-content!important;
    width: -moz-fit-content!important;
	background: #f3f3f3;
	border-radius: 30px!important;
}

.editor-styles-wrapper .is-style-st-paragraph-marumozi,
.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-background {
	padding: 5px 20px;
	margin-bottom: 20px;
	margin-left: 0!important;
}

/* バナー風ボックス内 */
.editor-styles-wrapper .st-header-flexwrap:not(.st-flexbox-left) .st-header-flexbox .is-style-st-paragraph-marumozi {
	margin-left: auto!important;
} 

.editor-styles-wrapper .is-style-st-paragraph-marumozi::before {
   	content: none;
}

.editor-styles-wrapper .is-style-st-paragraph-marumozi::after {
	content: none;
	border: none;
}

.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-text-align-center {
	margin-left: auto!important;
	margin-right: auto;
}

.editor-styles-wrapper .is-style-st-paragraph-marumozi.has-text-align-right {
	margin-left: auto!important;
	margin-right: 0;
}

/* 簡易ボタン */
.editor-styles-wrapper .is-style-st-paragraph-button.has-background,
.editor-styles-wrapper .is-style-st-paragraph-button {
	display: flex;
	width: fit-content!important;
    width: -webkit-fit-content!important;
	padding: .5em 1em .5em 1.2em!important;
	border-radius: 999px!important;
	background: #f44336;
	color: #fff;
	margin-left: 0;
	line-height: 1.5em;
	align-items: center;
    word-break: break-all;
}

/* バナー風ボックス内 */
.editor-styles-wrapper .st-header-flexwrap:not(.st-flexbox-left) .st-header-flexbox .is-style-st-paragraph-button {
    margin-left: auto;
}

.editor-styles-wrapper .is-style-st-paragraph-button::before {
	content: none;
}

.editor-styles-wrapper .is-style-st-paragraph-button::after {
  	content: "\f054";
  	font-family: stsvg;
	position: relative;
    top: inherit;
    left: inherit;
    height: inherit;
	padding-left: .7em;
	font-size: .8em;
	opacity: .5;
	border: none;
}

.editor-styles-wrapper .is-style-st-paragraph-button a {
	color: #fff;
	text-decoration: none;
	line-height: 1.5em;
}

.editor-styles-wrapper .is-style-st-paragraph-button.has-text-align-center {
	margin-left: auto;
	margin-right: auto;
}

.editor-styles-wrapper .is-style-st-paragraph-button.has-text-align-right {
	margin-left: auto!important;
	margin-right: 0;
}

/* テーマ管理による上書き */
/* カスタム */
<?php if( trim( $GLOBALS['stdata508']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-pen:not(.has-text-color)::before,
	.editor-styles-wrapper .is-style-st-paragraph-pen::before {
		color: <?php echo $GLOBALS['stdata508']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata508']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata523']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-pen {
		background: <?php echo $GLOBALS['stdata523']; ?>;
	}
<?php endif; ?>

/* メモ */
<?php if( trim( $GLOBALS['stdata509']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-memo-txt:not(.has-text-color)::before,
	.editor-styles-wrapper .is-style-st-paragraph-memo-txt::before {
		color: <?php echo $GLOBALS['stdata509']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata509']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata524']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-memo-txt {
		background: <?php echo $GLOBALS['stdata524']; ?>;
	}
<?php endif; ?>

/* リンク */
<?php if( trim( $GLOBALS['stdata510']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-link::before {
		color: <?php echo $GLOBALS['stdata510']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata510']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata525']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-link {
		background: <?php echo $GLOBALS['stdata525']; ?>;
	}
<?php endif; ?>

/* チェック */
<?php if( trim( $GLOBALS['stdata511']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-check::before {
		color: <?php echo $GLOBALS['stdata511']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata511']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata526']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-check {
		background: <?php echo $GLOBALS['stdata526']; ?>;
	}
<?php endif; ?>

/* ポイント */
<?php if( trim( $GLOBALS['stdata512']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-point::before {
		color: <?php echo $GLOBALS['stdata512']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata512']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata527']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-point {
		background: <?php echo $GLOBALS['stdata527']; ?>;
	}
<?php endif; ?>

/* インフォ */
<?php if( trim( $GLOBALS['stdata513']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-info-circle::before {
		color: <?php echo $GLOBALS['stdata513']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata513']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata528']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-info-circle {
		background: <?php echo $GLOBALS['stdata528']; ?>;
	}
<?php endif; ?>

/* 初心者 */
<?php if( trim( $GLOBALS['stdata514']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-bigginer::before {
		color: <?php echo $GLOBALS['stdata514']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata514']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata529']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-bigginer {
		background: <?php echo $GLOBALS['stdata529']; ?>;
	}
<?php endif; ?>

/* 注意 */
<?php if( trim( $GLOBALS['stdata515']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-attention::before {
		color: <?php echo $GLOBALS['stdata515']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata515']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata530']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-attention {
		background: <?php echo $GLOBALS['stdata530']; ?>;
	}
<?php endif; ?>

/* マル */
<?php if( trim( $GLOBALS['stdata516']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-circle-o::before {
		color: <?php echo $GLOBALS['stdata516']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata516']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata531']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-circle-o {
		background: <?php echo $GLOBALS['stdata531']; ?>;
	}
<?php endif; ?>

/* バツ */
<?php if( trim( $GLOBALS['stdata517']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-times::before {
		color: <?php echo $GLOBALS['stdata517']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata517']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata532']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-times {
		background: <?php echo $GLOBALS['stdata532']; ?>;
	}
<?php endif; ?>

/* Like */
<?php if( trim( $GLOBALS['stdata518']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-up::before {
		color: <?php echo $GLOBALS['stdata518']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata518']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata533']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-up {
		background: <?php echo $GLOBALS['stdata533']; ?>;
	}
<?php endif; ?>

/* Bad */
<?php if( trim( $GLOBALS['stdata519']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-down::before {
		color: <?php echo $GLOBALS['stdata519']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata519']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata534']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-thumbs-o-down {
		background: <?php echo $GLOBALS['stdata534']; ?>;
	}
<?php endif; ?>

/* Code */
<?php if( trim( $GLOBALS['stdata520']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-code::before {
		color: <?php echo $GLOBALS['stdata520']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata520']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata535']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-code {
		background: <?php echo $GLOBALS['stdata535']; ?>;
		color: #1a1a1a;
	}
<?php endif; ?>

/* 簡易ボタン */
<?php if( trim( $GLOBALS['stdata521']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-button::after {
		color: <?php echo $GLOBALS['stdata521']; ?>;
		opacity: 1;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata536']) !== '' ): ?>
	.editor-styles-wrapper .is-style-st-paragraph-button {
		background: <?php echo $GLOBALS['stdata536']; ?>;
	}
<?php endif; ?>

/*--------------------------------------------------------------
 * ブロックスタイル プレビュー
 * .components-popover__content ドロップダウンプレビュー
 * .interface-interface-skeleton__sidebar 右サイドバープレビュー
---------------------------------------------------------------*/
.editor-styles-wrapper .block-editor-block-list__block {
    box-sizing: border-box;
}

/* カラーパレット背景色 */
/*.block-editor-color-gradient-control + .block-editor-color-gradient-control .components-circular-option-picker__option,
.block-editor-color-gradient-control + .block-editor-color-gradient-control .components-circular-option-picker__option-wrapper:before,
.block-editor-color-gradient-control + .block-editor-color-gradient-control .components-circular-option-picker__option:after {
	border-radius: 0;
}*/

.components-panel__body .block-editor-color-gradient-control:nth-child(odd) .components-circular-option-picker__option,
.components-panel__body .block-editor-color-gradient-control:nth-child(odd) .components-circular-option-picker__option-wrapper:before,
.components-panel__body .block-editor-color-gradient-control:nth-child(odd) .components-circular-option-picker__option:after {
	border-radius: 0;
}

/* 基本 */
.components-popover__content .block-editor-block-preview__container [class^="is-style-st-paragraph-"],
.components-popover__content .block-editor-block-preview__container [class*=" is-style-st-paragraph-"],
.interface-interface-skeleton__sidebar .block-editor-block-preview__container [class^="is-style-st-paragraph-"],
.interface-interface-skeleton__sidebar .block-editor-block-preview__container [class*=" is-style-st-paragraph-"] {
	position: relative;
	padding: 30px 20px;
	display: flex;
	align-items: center;
	border-radius: 5px;
	margin: 0;
}

.components-popover__content .block-editor-block-preview__container [class^="is-style-st-paragraph-"],
.components-popover__content .block-editor-block-preview__container [class*=" is-style-st-paragraph-"],
.interface-interface-skeleton__sidebar .block-editor-block-preview__container [class^="is-style-st-paragraph-"],
.interface-interface-skeleton__sidebar .block-editor-block-preview__container [class*=" is-style-st-paragraph-"] {
	padding: 100px 20px;
	box-shadow: none!important;
}

/** before */
.components-popover__content .block-editor-block-preview__container [class^="is-style-st-paragraph-"]::before,
.components-popover__content .block-editor-block-preview__container [class*=" is-style-st-paragraph-"]::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container [class^="is-style-st-paragraph-"]::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container [class*=" is-style-st-paragraph-"]::before {
	font-size: 5rem!important;
    top: 50%;
	left: .5em;
}

/** after */
.components-popover__content .block-editor-block-preview__container [class^="is-style-st-paragraph-"]::after,
.components-popover__content .block-editor-block-preview__container [class*=" is-style-st-paragraph-"]::after,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container [class^="is-style-st-paragraph-"]::after,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container [class*=" is-style-st-paragraph-"]::after {
	font-size: 3rem!important;
	top: calc( 50% + 1em );
	border: none;
}

.components-popover__content .block-editor-block-preview__container p,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container p {
	color: transparent!important;
	line-height: 0;
	display: flex;
}

/*--------------------------------
ブロックスタイル グループ
---------------------------------*/
/* 斜線 */
.components-popover__content .block-editor-block-preview__container .is-style-st-group-bg-diagonal,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-group-bg-diagonal {
	background-image: -webkit-gradient(linear, 0 0, 100% 100%,color-stop(.25, #eee), color-stop(.25, transparent),color-stop(.5, transparent), color-stop(.5, #eee),color-stop(.75, #eee), color-stop(.75, transparent),to(transparent));
    background-size: 30px 30px;
}

/* グリッド */
.components-popover__content .block-editor-block-preview__container .is-style-st-group-bg-grid,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-group-bg-grid {
	background-image: linear-gradient( transparent 95%, rgba(0, 0, 0, .05) 50%, rgba(0, 0, 0, .05)), linear-gradient( 90deg, transparent 95%, rgba(0, 0, 0, .05) 50%, rgba(0, 0, 0, .05) );
	background-size: 50px 50px!important;
	background-repeat: repeat;
}

/* ドット */
.components-popover__content .block-editor-block-preview__container .is-style-st-group-bg-dot,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-group-bg-dot {
	background-image: radial-gradient(#ccc 5px, transparent 5px);
	background-size: 50px 50px!important;
}

/*--------------------------------
ブロックスタイル 見出し
---------------------------------*/
/* 斜線 */
.components-popover__content .block-editor-block-preview__container .is-style-st-heading-custom-diagonal,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-heading-custom-diagonal {
	background-image: -webkit-gradient(linear, 0 0, 100% 100%,color-stop(.25, #eee), color-stop(.25, transparent),color-stop(.5, transparent), color-stop(.5, #eee),color-stop(.75, #eee), color-stop(.75, transparent),to(transparent));
    background-size: 30px 30px;
}

/*--------------------------------
ブロックスタイル 段落
---------------------------------*/
/* 囲みドット */
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-dotline::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-dotline::before {
    border: 5px dashed #fff;
	top: inherit;
	left: 10px;
}

/* まるもじ */
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-marumozi,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-marumozi {
	border-radius: 100px!important;
}

/* ふきだし */
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-bubble::after,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-bubble::after {
	content: '';
	position: absolute;
 	margin-left: -10px;
	border: 50px solid transparent;
	border-top: 50px solid #f3f3f3;
	top: 100%;
	left: 1.5em;
	padding: 0;
	margin-right: 0;
	line-height: .8em;
}

.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-bubble,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-bubble {
    margin-bottom: 50px;
}

/* リスト基本 */
.components-popover__content .block-editor-block-preview__container .block-editor-block-list__layout ol,
.components-popover__content .block-editor-block-preview__container .block-editor-block-list__layout ul,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .block-editor-block-list__layout ol,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .block-editor-block-list__layout ul {

}

.components-popover__content .block-editor-block-preview__container .block-editor-block-list__layout ol li,
.components-popover__content .block-editor-block-preview__container .block-editor-block-list__layout ul li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .block-editor-block-list__layout ol li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .block-editor-block-list__layout ul li {
	font-size: 40px!important;
	line-height: 1.5em!important;
	margin-left: 30px!important;
}

/* チェックボックス */
.components-popover__content .block-editor-block-preview__container ul.is-style-st-square-checkbox-no-border li,
.components-popover__content .block-editor-block-preview__container ul.is-style-st-square-checkbox-no-border li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-square-checkbox-no-border li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-square-checkbox-no-border li,
.components-popover__content .block-editor-block-preview__container ul.is-style-st-square-checkbox li,
.components-popover__content .block-editor-block-preview__container ul.is-style-st-square-checkbox li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-square-checkbox li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-square-checkbox li {
    margin-bottom: 0;
    padding-bottom: 0!important;
}

/* ナンバリング（リスト） */
.components-popover__content .block-editor-block-preview__container ul.is-style-st-maruno li,
.components-popover__content .block-editor-block-preview__container ul.is-style-st-maruno li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-maruno li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-maruno li {
    padding-left: 60px!important;
}

.components-popover__content .block-editor-block-preview__container ul.is-style-st-maruno li::before,
.components-popover__content .block-editor-block-preview__container ul.is-style-st-maruno li::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-maruno li::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-maruno li::before {
    width: 40px!important;
    height: 40px!important;
    font-size: 24px!important;
    line-height: 40px!important;
}

/* ナンバリング四角（リスト） */
.components-popover__content .block-editor-block-preview__container ul.is-style-st-no-border li,
.components-popover__content .block-editor-block-preview__container ul.is-style-st-no li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-no-border li,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-no li {
    padding-left: 60px!important;
}

.components-popover__content .block-editor-block-preview__container ul.is-style-st-no-border li::before,
.components-popover__content .block-editor-block-preview__container ul.is-style-st-no li::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-no-border li::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container ul.is-style-st-no li::before {
    width: 40px!important;
    height: 40px!important;
    font-size: 24px!important;
    line-height: 40px!important;
}

/* 簡易ボタン */
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-button,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-button {
	line-height: 1em;
	padding: 0!important;
}

.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-button::after,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-button::after {
	right: 1em;
}

/* 簡易会話ふきだし */
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-kaiwa,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-kaiwa,
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-kaiwa-b,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-kaiwa-b {
	justify-content: center;
	margin: 50px 0;
	background-color: transparent;
}

.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-kaiwa::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-kaiwa::before,
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-kaiwa-b::before,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-kaiwa-b::before {
	top: -80px!important;
	left: inherit!important;
	content: '';
	display: inline-block;
	width: 4em;
	height: 4em;
	background-size: contain;
	vertical-align: middle;
	border-radius: 50%;
}

.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-kaiwa::after,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-kaiwa::after,
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-kaiwa-b::after,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-kaiwa-b::after {
    display: none;
}

.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-kaiwa .st-paragraph-kaiwa-text,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-kaiwa .st-paragraph-kaiwa-text,
.components-popover__content .block-editor-block-preview__container .is-style-st-paragraph-kaiwa-b .st-paragraph-kaiwa-text,
.interface-interface-skeleton__sidebar .block-editor-block-preview__container .is-style-st-paragraph-kaiwa-b .st-paragraph-kaiwa-text {
	display: none;
}

/*--------------------------------
ブロックスタイル デフォルト
---------------------------------*/

.editor-styles-wrapper .is-style-default::before {
	content: none;
}

.editor-styles-wrapper .is-style-default {
	background-color: transparent;
}

.editor-styles-wrapper .is-style-default::after {
	content: none;
}

/*--------------------------------
ブロックスタイル code
---------------------------------*/
.editor-styles-wrapper .wp-block-code.is-style-default {
	background: #fafafa;
}

/** ワイド黒 */
.editor-styles-wrapper .wp-block-code.is-style-st-wide-background,
.editor-styles-wrapper .wp-block-code.is-style-st-wide-background code {
	background: #2e3a3e;
	color: #ffffff;
}

/*--------------------------------
ブロックスタイル 画像
---------------------------------*/
.editor-styles-wrapper .wp-block-image.is-style-st-photo-shadow img {
	box-shadow: 0 0 8px rgba(0,0,0,0.5);
	max-width: 100%;
	box-sizing: border-box;
}

/** ワイド黒 */
.editor-styles-wrapper .wp-block-code.is-style-st-wide-background:not(.is-style-st-group-bg-diagonal):not(.is-style-st-group-bg-grid):not(.is-style-st-group-bg-dot):not(.is-style-st-group-line):not(.is-style-st-group-line-bold):not(.is-style-st-group-corner-brackets):not(.is-style-st-group-square-brackets) {
	background: #2e3a3e;
}
.editor-styles-wrapper .wp-block-code.is-style-st-wide-background:not(.is-style-st-group-bg-diagonal):not(.is-style-st-group-bg-grid):not(.is-style-st-group-bg-dot):not(.is-style-st-group-line):not(.is-style-st-group-line-bold):not(.is-style-st-group-corner-brackets):not(.is-style-st-group-square-brackets) code {
	color: #ffffff;
}

/*--------------------------------
ブロックスタイル カラム
---------------------------------*/
.editor-styles-wrapper .wp-block-columns.is-st-fixed-columns > .block-editor-inner-blocks {
	min-width: 0 !important;
}

.editor-styles-wrapper .wp-block-columns > .block-editor-inner-blocks > .block-editor-block-list__layout .wp-block {
	min-width: 0 !important;
}

@media (min-width: 600px) and (max-width: 781px) {
	.editor-styles-wrapper .wp-block-columns:not(.is-st-fixed-columns):not(.is-not-stacked-on-mobile) > .block-editor-inner-blocks > .block-editor-block-list__layout > [data-type="core/column"] {
		margin-right: 0 !important;
		margin-left: 0 !important;
		flex-basis: 50% !important;
	}
}

@media (max-width: 599px) {
	.editor-styles-wrapper .wp-block-columns:not(.is-st-fixed-columns):not(.is-not-stacked-on-mobile) > .block-editor-inner-blocks > .block-editor-block-list__layout > [data-type="core/column"] {
		flex-basis: 100% !important;
	}
}

/*--------------------------------
カレンダーブロック
---------------------------------*/

.editor-styles-wrapper .wp-block-calendar caption {
    text-align: left;
    font-weight: bold;
}

/*--------------------------------
スライドブロック
---------------------------------*/
.editor-styles-wrapper .wp-block-st-blocks-st-slidebox.st-slidebox-c {
	background-color: #fcfdfd;
}

.editor-styles-wrapper .wp-block-st-blocks-st-slidebox.st-slidebox-c.has-st-background,
.editor-styles-wrapper .wp-block-st-blocks-st-slidebox.st-slidebox-c.has-st-border {
    padding: 15px;
}

.editor-styles-wrapper .wp-block-st-blocks-st-slidebox.st-slidebox-c .st-btn-open i {
	opacity: .8;
}

<?php if ( isset($GLOBALS['stdata628']) && $GLOBALS['stdata628'] === 'yes' ): // ボタンにシャドウを適応する（一括強制） ?>
	.editor-styles-wrapper .rankstlink-r p,
	.editor-styles-wrapper .rankstlink-l p,
	.editor-styles-wrapper .rankstlink-r2 p,
	.editor-styles-wrapper .rankstlink-l2 p,
	.editor-styles-wrapper .rankstlink-a p,
	.editor-styles-wrapper .rankstlink-b p {
		box-shadow: 0 2px 2px rgb(0,0,0,.1);
	}
	.editor-styles-wrapper .rankstlink-r p:hover,
	.editor-styles-wrapper .rankstlink-l p:hover,
	.editor-styles-wrapper .rankstlink-r2 p:hover,
	.editor-styles-wrapper .rankstlink-l2 p:hover,
	.editor-styles-wrapper .rankstlink-a p:hover,
	.editor-styles-wrapper .rankstlink-b p:hover {
		box-shadow: 0 1px 1px rgb(0,0,0,.1);
	}
	.editor-styles-wrapper .st-author-profile .rankstlink-r2 p a, /* プロフィールカード */
	.editor-styles-wrapper .st-mybtn.wp-block-st-blocks-my-button, /* カスタムボタンブロック */
	.editor-styles-wrapper p.st-mybtn {
		box-shadow: 0 2px 2px rgb(0,0,0,.1)!important;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata498']) && $GLOBALS['stdata498'] === 'yes' ) : // 要素にドロップシャドウを追加 ?>
	.editor-styles-wrapper [class^="is-style-st-paragraph-"]:not(.is-style-st-paragraph-button):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b),
	.editor-styles-wrapper [class*=" is-style-st-paragraph-"]:not(.is-style-st-paragraph-button):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b),
	.editor-styles-wrapper .is-style-st-paragraph-kaiwa,
	.editor-styles-wrapper .st-marumozi, /* まるもじ */
	.editor-styles-wrapper .st-marumozi-big, /* まるもじ */
	.editor-styles-wrapper .st-minihukidashi, /* ミニふきだし */
	.editor-styles-wrapper .st-step, /* ステップ */
	.editor-styles-wrapper .st-point, /* ポイント */
	.editor-styles-wrapper .freebox, /* タイトル付きフリーボックス */
	.editor-styles-wrapper .st-mybox, /* マイボックス */
	.editor-styles-wrapper .clip-memobox, /* クリップメモ */
	.editor-styles-wrapper .st-blackboard /* こんな方におすすめ */
	{
		box-shadow: 0 1px 2px rgba(0,0,0,0.1);
	}
<?php endif; ?>

<?php // st-blocks, st-kaiwa ?>
<?php if ( _st_plugin_support_is_enabled( 'ST_BLOCKS', 'st-blocks' ) || _st_plugin_support_is_enabled( 'ST_KAIWA', 'st-kaiwa' ) ): ?>
	/*--------------------------------
	会話レイアウト
	---------------------------------*/
	<?php // style.css ?>
	.editor-styles-wrapper .st-kaiwa-box {
		width: 100%;
		height: auto;
		margin-bottom: 20px;
		display: table;
	}

	.editor-styles-wrapper .st-kaiwa-face {
		text-align: center;
		display: table-cell;
		width: 60px;
		vertical-align: top;
	}

	.editor-styles-wrapper .st-kaiwa-face img {
		border-radius: 60px;
		border-style: solid;
		border-width: 1px;
		border-color: transparent;
	}

	.editor-styles-wrapper .st-kaiwa-face-name {
		color: #616161;
		font-size: 70%;
		line-height: 1.5;
		max-width: 60px;
	}

	.editor-styles-wrapper .st-kaiwa-area {
		display: table-cell;
		vertical-align: top;
		text-align: left;
	}

	.editor-styles-wrapper .st-kaiwa-hukidashi {
		display: inline-block;
		padding: 15px 20px;
		margin-left: 20px;
		border-radius: 7px;
		position: relative;
		background-color: #f9f9f9;
		word-break: break-all;
	}

	.editor-styles-wrapper .st-kaiwa-hukidashi::after {
		content: "";
		position: absolute;
		top: 30px;
		left: -10px;
		margin-top: -10px;
		display: block;
		width: 0px;
		height: 0px;
		border-style: solid;
		border-width: 10px 10px 10px 0;
		border-color: transparent #f9f9f9 transparent transparent;
	}

	/* ふきだし反対 */
	.editor-styles-wrapper .st-kaiwa-face2 {
		text-align: center;
		display: table-cell;
		width: 60px;
		vertical-align: top;
	}

	.editor-styles-wrapper .st-kaiwa-face2 img {
		border-radius: 60px;
		border-style: solid;
		border-width: 1px;
		border-color: transparent;
	}

	.editor-styles-wrapper .st-kaiwa-face-name2 {
		color: #616161;
		font-size: 70%;
		line-height: 1.5;
		max-width: 60px;
	}

	.editor-styles-wrapper .st-kaiwa-area2 {
		display: table-cell;
		vertical-align: middle;
		text-align: right;
	}

	.editor-styles-wrapper .st-kaiwa-hukidashi2 {
		display: inline-block;
		padding: 15px 20px;
		margin-right: 20px;
		border-radius: 7px;
		position: relative;
		background-color: #f9f9f9;
		text-align: left;
		word-break: break-all;
	}

	.editor-styles-wrapper .st-kaiwa-hukidashi2 p:last-child {
		margin-bottom: 0px;
	}

	.editor-styles-wrapper .st-kaiwa-hukidashi2::after {
		content: "";
		position: absolute;
		top: 30px;
		right: -10px;
		margin-top: -10px;
		display: block;
		width: 0px;
		height: 0px;
		border-style: solid;
		border-width: 10px 0 10px 10px;
		border-color: transparent transparent transparent #f9f9f9;
	}

	.editor-styles-wrapper .st-kaiwa-hukidashi p,
	.editor-styles-wrapper .st-kaiwa-hukidashi2 p {
		margin-top: 0;
	}

	<?php // st-themecss.php ?>
	<?php if ( isset( $GLOBALS[ 'stdata263' ] ) && $GLOBALS[ 'stdata263' ] === 'yes' ): // 会話風アイコンを少し動かす ?>
		/*
		.editor-styles-wrapper .is-style-st-paragraph-kaiwa:not(.stop)::before,
		.editor-styles-wrapper .st-kaiwa-box:not(.stop) .st-kaiwa-face img {
			animation: animScale 4s infinite ease-out;
			transform-origin: 50% 50%;
			animation-play-state:running;
			backface-visibility: hidden;
		}

		.editor-styles-wrapper .is-style-st-paragraph-kaiwa-b:not(.stop)::before,
		.editor-styles-wrapper .st-kaiwa-box:not(.stop) .st-kaiwa-face2 img {
			animation: animScale 4.5s infinite ease-out;
			transform-origin: 50% 50%;
			animation-play-state:running;
			backface-visibility: hidden;
		}

		@keyframes animScale {
			0% { transform: scale(0.8, 0.8); }
			5% { transform: scale(1.1, 1.1); }
			10% { transform: scale(1, 1); }
			15% { transform: scale(1.1, 1.1); }
			20% { transform: scale(1, 1); }
			100% { transform: scale(1, 1); }
		}
		*/
	<?php endif; ?>

	<?php if ( $st_kaiwa_borderradius ): ?>
		/* ふきだしを角丸にしない */
		.editor-styles-wrapper .st-kaiwa-hukidashi,
		.editor-styles-wrapper .st-kaiwa-hukidashi2 {
			border-radius: 0;
		}
	<?php endif; ?>

	<?php
	$_st_kaiwa_settings = array(
		array( 'bgcolor' => $st_kaiwa_bgcolor ),
		array( 'bgcolor' => $st_kaiwa2_bgcolor ),
		array( 'bgcolor' => $st_kaiwa3_bgcolor ),
		array( 'bgcolor' => $st_kaiwa4_bgcolor ),
		array( 'bgcolor' => $st_kaiwa5_bgcolor ),
		array( 'bgcolor' => $st_kaiwa6_bgcolor ),
		array( 'bgcolor' => $st_kaiwa7_bgcolor ),
		array( 'bgcolor' => $st_kaiwa8_bgcolor ),
	);
	?>

	<?php for ( $_i = 0; $_i < 8; $_i ++ ): $_st_kaiwa_setting = $_st_kaiwa_settings[ $_i ]; ?>
		<?php $_st_kaiwa_icon_class = ( $_i !== 0 ) ? '.kaiwaicon' . ( $_i + 1 ) : ''; ?>
		<?php if ( $_st_kaiwa_setting[ 'bgcolor' ] ): ?>
			<?php if ( $st_kaiwa_change_border ): ?>
				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi,
				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi2 {
					border: solid 2px <?php echo $_st_kaiwa_setting[ 'bgcolor' ]; ?>;
				<?php if ( $st_kaiwa_change_border_bgcolor ): ?>
					background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
				<?php endif; ?>
				}

				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi::before {
					content: "";
					position: absolute;
					top: 30px;
					display: block;
					width: 0px;
					height: 0px;
					border-style: solid;
					margin-top: -13px;
					left: -13px;
					border-width: 13px 13px 13px 0;
					border-color: transparent <?php echo $_st_kaiwa_setting[ 'bgcolor' ]; ?> transparent transparent;
				}

				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi::after {
					left: -10px;
					border-width: 10px 10px 10px 0;
					<?php if ( $st_kaiwa_change_border_bgcolor ): ?>
						border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
					<?php else: ?>
						border-color: transparent #fff transparent transparent;
					<?php endif; ?>
				}

				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi2::before {
					content: "";
					position: absolute;
					top: 30px;
					display: block;
					width: 0px;
					height: 0px;
					border-style: solid;
					margin-top: -13px;
					right: -13px;
					border-width: 13px 0 13px 13px;
					border-color: transparent transparent transparent <?php echo $_st_kaiwa_setting[ 'bgcolor' ]; ?>;
				}

				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi2::after {
					right: -10px;
					border-width: 10px 0 10px 10px;
					<?php if ( $st_kaiwa_change_border_bgcolor ): ?>
						border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
					<?php else: ?>
						border-color: transparent transparent transparent #fff;
					<?php endif; ?>
				}
			<?php else: ?>
				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi,
				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi2 {
					background-color: <?php echo $_st_kaiwa_setting[ 'bgcolor' ]; ?>;
				}

				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi::after {
					border-color: transparent <?php echo $_st_kaiwa_setting[ 'bgcolor' ]; ?> transparent transparent;
				}

				.editor-styles-wrapper <?php echo $_st_kaiwa_icon_class; ?> .st-kaiwa-hukidashi2::after {
					border-color: transparent transparent transparent <?php echo $_st_kaiwa_setting[ 'bgcolor' ]; ?>;
				}
			<?php endif; ?>
		<?php endif; ?>
	<?php endfor; ?>

<?php endif; ?>

<?php if( isset( $st_kaiwa_change_border ) && $st_kaiwa_change_border === 'thick' ): // ボーダーデザインタイプ（枠線のみ）が太め ?>
	.st-kaiwa-hukidashi,
	.st-kaiwa-hukidashi2 {
		border-width: 3px!important;
	}

	.st-kaiwa-hukidashi::before {
		margin-top: -14px!important;
		left: -14px!important;
		border-width: 14px 14px 14px 0!important;
	}

	.st-kaiwa-hukidashi2::before {
		right: -14px!important;
	}
<?php endif; ?>

/*--------------------------------
エディタ用
---------------------------------*/
/*均等横並び */
.editor-styles-wrapper .kintou ul {
	display: table;
	table-layout: fixed;
	width: 100%;
	padding: 0;
	margin:0 -5px 20px;
}

.editor-styles-wrapper .kintou ul li {
	display: table-cell;
	vertical-align: middle;
	text-align: center;
	padding:0 5px;
}

.editor-styles-wrapper .kintou ul li {
	background: #E1F5FE;
	border:1px solid #29B6F6;
}

/* カスタム目次 */
.editor-styles-wrapper ul.st_toc_list li {
    text-align: left;
}

/*テーブル */
.editor-styles-wrapper table {
	box-sizing: border-box;
	border-top: 1px #999 solid;
	border-right: 1px #999 solid;
	margin-bottom: 20px;
	width: 100%;
}

.editor-styles-wrapper .wp-block-table thead {
    border-bottom: 1px solid #999!important;
}

.editor-styles-wrapper table tfoot,
.editor-styles-wrapper .wp-block-table tfoot {
    border-top: none;
}

.editor-styles-wrapper .wp-block-table.is-style-st-centertable table tr {
	text-align: center;
	vertical-align: middle;
}

/** 最初の行の幅固定 */
.editor-styles-wrapper .wp-block-table.w30 table tr td:first-child {
	width: 30%;
}

.editor-styles-wrapper .wp-block-table.w40 table tr td:first-child {
	width: 40%;
}

.editor-styles-wrapper .wp-block-table.w50 table tr td:first-child {
	width: 50%;
}

.editor-styles-wrapper .wp-block-table.nowrap table tr td:first-child {
	white-space: nowrap;
}

/*For IE*/
@media all and (-ms-high-contrast: active), (-ms-high-contrast: none) {
	.editor-styles-wrapper table {
		table-layout: fixed;
	}
}

.editor-styles-wrapper table tr td {
	padding: 5px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-bottom-style: solid;
	border-left-style: solid;
	border-bottom-color: #999!important;
	border-left-color: #999!important;
	font-size: 13px;
	line-height: 18px;
    border-right: none!important;
    border-top: none!important;
}

.editor-styles-wrapper table th {
	padding: 5px;
	border-bottom-width: 1px;
	border-left-width: 1px;
	border-bottom-style: solid;
	border-left-style: solid;
	border-bottom-color: #999!important;
	border-left-color: #999!important;
	font-size: 13px;
	line-height: 18px;
    border-right: none!important;
    border-top: none!important;
}

.editor-styles-wrapper table tr td {
	font-size: 13px;
	line-height: 18px;
}

.editor-styles-wrapper table {
	border-top-width: 1px;
	border-right-width: 1px;
	border-top-style: solid;
	border-right-style: solid;
	border-top-color: #999!important;
	border-right-color: #999!important;
	color: #333;
    border-left: none!important;
    border-bottom: none!important;
}

/*テーブル（装飾なし） */
.editor-styles-wrapper .notab table {
	border: none;
	width: initial; /* 初期状態にリセット */
	max-width: initial; /* 初期状態にリセット */
}

.editor-styles-wrapper .notab table tr td {
	border: none;
	text-align: left;
	vertical-align: top;
}

.editor-styles-wrapper .notab table th {
	border: none;
}

.editor-styles-wrapper .notab table tr:nth-child(even) {
	background-color: transparent;
}


/*スクロール*/
.editor-styles-wrapper .scroll-box {
	overflow-x: auto;
	margin-bottom: 10px;
}
.editor-styles-wrapper .scroll-box::-webkit-scrollbar {
	height: 5px;
}

.editor-styles-wrapper .scroll-box::-webkit-scrollbar-track {
	border-radius: 5px;
	background: #f3f3f3;
}
.editor-styles-wrapper .scroll-box::-webkit-scrollbar-thumb {
	border-radius: 5px;
	background: #ccc;
}

.editor-styles-wrapper .wp-block-table.is-style-stripes table,
.editor-styles-wrapper .wp-block-table.is-style-stripes thead,
.editor-styles-wrapper .wp-block-table.is-style-stripes tr,
.editor-styles-wrapper .wp-block-table.is-style-stripes th,
.editor-styles-wrapper .wp-block-table.is-style-stripes td {
    border-color: transparent!important;
}

/* table */
.editor-styles-wrapper .is-style-st-table-line table,
.editor-styles-wrapper .is-style-st-table-line-2 table{
	border-right: none!important;
	border-left: none!important;
	border-color: #ccc!important;
}

.editor-styles-wrapper .is-style-st-table-line thead,
.editor-styles-wrapper .is-style-st-table-line-2 thead,
.editor-styles-wrapper .is-style-st-table-line thead th,
.editor-styles-wrapper .is-style-st-table-line-2 thead th,
.editor-styles-wrapper .is-style-st-table-line td,
.editor-styles-wrapper .is-style-st-table-line-2 td {
	border-right: none!important;
	border-left: none!important;
	border-color: #ccc!important;
}

.editor-styles-wrapper .wp-block-table.is-style-st-table-line tfoot,
.editor-styles-wrapper .wp-block-table.is-style-st-table-line thead,
.editor-styles-wrapper .wp-block-table.is-style-st-table-line-2 tfoot,
.editor-styles-wrapper .wp-block-table.is-style-st-table-line-2 thead {
    border-top: 1px solid;
    border-bottom: 1px solid;
}

/** 列の幅設定 */
.editor-styles-wrapper .wp-block-table.has-st-td-width.wp-block-table.has-st-td-width.has-st-td-width--2 table tr > *:first-child,
.editor-styles-wrapper .wp-block-table.has-st-td-width.wp-block-table.has-st-td-2-width.has-st-td-2-width--2 table tr > *:nth-child(2) {
  width: 20%;
}

.editor-styles-wrapper .wp-block-table.has-st-td-width.wp-block-table.has-st-td-width.has-st-td-width--1 table tr > *:first-child,
.editor-styles-wrapper .wp-block-table.has-st-td-width.wp-block-table.has-st-td-2-width.has-st-td-2-width--1 table tr > *:nth-child(2) {
  width: 30%;
}

.editor-styles-wrapper .wp-block-table.has-half-st-td-width table tr > *:first-child,
.editor-styles-wrapper .wp-block-table.has-half-st-td-2-width table tr > *:nth-child(2) {
  width: 50%;
}

.editor-styles-wrapper .wp-block-table.has-st-td-width.wp-block-table.has-st-td-width.has-st-td-width-2 table tr > *:first-child,
.editor-styles-wrapper .wp-block-table.has-st-td-width.wp-block-table.has-st-td-2-width.has-st-td-2-width-2 table tr > *:nth-child(2) {
  width: 60%;
}

/*画像 */
.editor-styles-wrapper img.alignright {
	float: right;
	margin: 0 0 5px 10px;
}

.editor-styles-wrapper img.alignleft {
	float: left;
	margin: 0 10px 5px 0;
}

.editor-styles-wrapper img.aligncenter {
	display: block;
	margin:0 auto 10px;
}

.editor-styles-wrapper img.float-left {
	float: left;
}

.editor-styles-wrapper img.float-right {
	float: right;
}

.editor-styles-wrapper .wp-caption {
	text-align: center;
}

.editor-styles-wrapper .aligncenter {
	clear: both;
	display: block;
	margin:0 auto 10px;
}

.editor-styles-wrapper .ie8 img {
	width: auto;
}

/*リスト */
.editor-styles-wrapper ul,
.editor-styles-wrapper ol {
	padding-left: 1em;
	margin-bottom: 20px;
}

.editor-styles-wrapper ul ul,
.editor-styles-wrapper ul ol,
.editor-styles-wrapper ol ul,
.editor-styles-wrapper ol ol {
	margin-bottom: 0;
}

.editor-styles-wrapper ul:not(.has-st-border):not(.has-background),
.editor-styles-wrapper ol:not(.has-st-border):not(.has-background) {
	margin-left: .5em;
}

.editor-styles-wrapper .is-style-st-check,
.editor-styles-wrapper .is-style-st-timeline-count,
.editor-styles-wrapper .is-style-st-timeline-list,
.editor-styles-wrapper .is-style-st-circle,
.editor-styles-wrapper .is-style-st-circle-border,
.editor-styles-wrapper .is-style-st-square-checkbox-no-border,
.editor-styles-wrapper .is-style-st-square-checkbox,
.editor-styles-wrapper .is-style-st-maruck,
.editor-styles-wrapper .is-style-st-maruno,
.editor-styles-wrapper .is-style-st-no,
.editor-styles-wrapper .is-style-st-no-border,
/* classic */
.editor-styles-wrapper .st-list-circle ul,
.editor-styles-wrapper .st-list-check ul,
.editor-styles-wrapper .st-square-checkbox ul,
.editor-styles-wrapper .st-square-checkbox-nobox ul,
.editor-styles-wrapper .maruck ul,
.editor-styles-wrapper .maruno ul,
.editor-styles-wrapper .st-list-no ul,
.editor-styles-wrapper .st-list-circle ol,
.editor-styles-wrapper .st-list-check ol,
.editor-styles-wrapper .st-square-checkbox ol,
.editor-styles-wrapper .st-square-checkbox-nobox ol,
.editor-styles-wrapper .maruck ol,
.editor-styles-wrapper .maruno ol,
.editor-styles-wrapper .st-list-no ol {
	padding-left: 0;
	margin-left: 0;
}

.editor-styles-wrapper ul li,
.editor-styles-wrapper ol li {
	padding-top: .25em;
	padding-bottom: .25em;
	line-height: 1.5em!important;
    text-align: left;
}

/* リストの※マーク */
.editor-styles-wrapper .is-style-st-komejirusi-list div.rich-text,
.editor-styles-wrapper .kome div.rich-text {
    display: inline;
}

.editor-styles-wrapper .is-style-st-komejirusi-list,
.editor-styles-wrapper .kome {
	display: flex;
	flex-direction:column;
	padding-left: 0;
	margin-left: 0;
}

.editor-styles-wrapper .is-style-st-komejirusi-list li,
.editor-styles-wrapper .kome li {
	list-style: none;
	padding-left: 1.2rem;
}

.editor-styles-wrapper .is-style-st-komejirusi-list li::before,
.editor-styles-wrapper .kome li::before {
	content: '※';
	margin-right: 5px;
	margin-left: -1.2rem;
	width: 1rem;
}

/** 子階層 */

.editor-styles-wrapper .is-style-st-komejirusi-list ol,
.editor-styles-wrapper .is-style-st-komejirusi-list ul,
.editor-styles-wrapper .kome ol,
.editor-styles-wrapper .kome ul {
	padding-left: 0;
	margin-left: 0;
}

.editor-styles-wrapper .is-style-st-komejirusi-list li li,
.editor-styles-wrapper .kome li li {
	list-style-type: disc;
	padding-left: 0;
	margin-left: 1.2rem;
}

.editor-styles-wrapper .is-style-st-komejirusi-list li li::before,
.editor-styles-wrapper .kome li li::before {
	content: none;
	margin-left: 0;
}

/* 階層リスト */
.editor-styles-wrapper ul.is-style-st-kaisou,
.editor-styles-wrapper ul.is-style-st-kaisou ul {
  list-style-type: none!important;
}

.editor-styles-wrapper ul.is-style-st-kaisou {
  margin-left:0!important;
}

.editor-styles-wrapper ul.is-style-st-kaisou ul {
  margin:0;
  padding:0;  
}

.editor-styles-wrapper ul.is-style-st-kaisou ul {
  position:relative;
  margin-left:10px;     
}

.editor-styles-wrapper ul.is-style-st-kaisou ul:before {
  content:"";
  display:block;
  position:absolute;
  top:0;
  left:0;
  bottom:0;
  width:0;
  border-left:1px solid #ccc;
}

.editor-styles-wrapper ul.is-style-st-kaisou li  {
  position:relative;
  margin:0;
  padding:.3em 0 .3em 1em;
  text-decoration: none;
  font-weight:normal; 
}

.editor-styles-wrapper ul.is-style-st-kaisou > li {
	padding-left: 0;
}

.editor-styles-wrapper ul.is-style-st-kaisou li a { 
  position:relative;
  color:#ccc;
  text-decoration: none;
  font-weight:bold;
}

.editor-styles-wrapper ul.is-style-st-kaisou ul li:before {
  content:"";
  display:block;
  position:absolute;
  top:1em;
  left: 0;
  width:.7em;
  height:0;
  border-top:1px solid #ccc;    
}

.editor-styles-wrapper ul.is-style-st-kaisou ul li ul li:last-child:before {
  top: 1em; 
  bottom: 0;
  height: auto;
	background:#fff;
}

/* 階層リスト */
.editor-styles-wrapper .is-style-st-kaisou.has-pale-pink-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-pale-pink-color ul li:before {
	border-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-soft-red-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-soft-red-color ul li:before {
	border-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-light-grayish-red-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-light-grayish-red-color ul li:before {
	border-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-vivid-yellow-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-vivid-yellow-color ul li:before {
	border-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-very-pale-yellow-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-very-pale-yellow-color ul li:before {
	border-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-light-green-cyan-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-light-green-cyan-color ul li:before {
	border-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-pale-cyan-blue-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-pale-cyan-blue-color ul li:before {
	border-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-vivid-cyan-blue-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-vivid-cyan-blue-color ul li:before {
	border-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-very-light-gray-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-very-light-gray-color ul li:before {
	border-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-very-dark-gray-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-very-dark-gray-color ul li:before {
	border-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-white-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-white-color ul li:before {
	border-color: <?php echo ST_COLOR_WHITE; ?>;
}
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-a-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-a-color ul li:before {
	border-color: <?php echo $original_color_a; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-b-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-b-color ul li:before {
	border-color: <?php echo $original_color_b; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-c-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-c-color ul li:before {
	border-color: <?php echo $original_color_c; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-d-color ul:before,
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-d-color ul li:before {
	border-color: <?php echo $original_color_d; ?> !important;
}

.editor-styles-wrapper .is-style-st-kaisou.has-pale-pink-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-soft-red-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?> !important;
}
.editor-styles-wrapper  .has-light-grayish-red-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?> !important;
}
.editor-styles-wrapper  .has-vivid-yellow-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?> !important;
}
.editor-styles-wrapper  .has-very-pale-yellow-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?> !important;
}
.editor-styles-wrapper  .has-light-green-cyan-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
.editor-styles-wrapper  .has-pale-cyan-blue-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}
.editor-styles-wrapper  .has-vivid-cyan-blue-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?> !important;
}
.editor-styles-wrapper  .has-very-light-gray-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-very-dark-gray-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-white-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_WHITE; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-a-background-color ul li ul li:last-child:before {
	background-color: <?php echo $original_color_a; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-b-background-color ul li ul li:last-child:before {
	background-color: <?php echo $original_color_b; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-c-background-color ul li ul li:last-child:before {
	background-color: <?php echo $original_color_c; ?> !important;
}
.editor-styles-wrapper .is-style-st-kaisou.has-original-color-d-background-color ul li ul li:last-child:before {
	background-color: <?php echo $original_color_d; ?> !important;
}

/* ボーダーあり */
.editor-styles-wrapper .st-list-underline:not(.is-style-st-timeline-list):not(.is-style-st-timeline-count) li,
.editor-styles-wrapper .st-list-border ul li,
.editor-styles-wrapper .st-list-border ol li,
.editor-styles-wrapper ul.is-style-st-border li,
.editor-styles-wrapper ol.is-style-st-border li,
.editor-styles-wrapper ul.is-style-st-circle-border li,
.editor-styles-wrapper ol.is-style-st-circle-border li,
.editor-styles-wrapper ul.is-style-st-square-checkbox li,
.editor-styles-wrapper ol.is-style-st-square-checkbox li,
.editor-styles-wrapper ul.is-style-st-no-border li,
.editor-styles-wrapper ol.is-style-st-no-border li {
    padding-top: .5em;
    padding-bottom: .5em;
}

.editor-styles-wrapper .st-list-underline.is-style-st-no > li::before,
.editor-styles-wrapper .st-list-underline.st-list-no li::before {
	top: calc( .25em + 5px )!important;
}

.editor-styles-wrapper .st-list-underline.is-style-st-circle > li::before,
.editor-styles-wrapper .st-list-underline.st-list-circle li::before {
	top: calc( .75em + 5px );
}

/*マルリスト・チェックリスト*/
.editor-styles-wrapper .is-style-st-maruno,
.editor-styles-wrapper .is-style-st-maruck,
.editor-styles-wrapper .maruno,
.editor-styles-wrapper .maruck {
    margin-bottom:20px;
	padding-bottom: 0;
}

.editor-styles-wrapper .is-style-st-maruno > li,
.editor-styles-wrapper .maruno li {
	counter-increment: st-section;
}

.editor-styles-wrapper .is-style-st-maruno li::before,
.editor-styles-wrapper .maruno li::before {
	content: counters(st-section,"");
}

.editor-styles-wrapper .is-style-st-maruno li li::before,
.editor-styles-wrapper .maruno li li::before {
	content: none;
}

.editor-styles-wrapper .is-style-st-maruck > li::before,
.editor-styles-wrapper .maruck li::before {
	content: " \f00c";
	font-family: stsvg;
    padding-left: 2px;
    padding-top: 1px;
    box-sizing: border-box;
}

.editor-styles-wrapper .is-style-st-maruno > li,
.editor-styles-wrapper .is-style-st-maruck > li,
.editor-styles-wrapper .maruno li,
.editor-styles-wrapper .maruck li {
    list-style-type: none;
    padding-left: 2.25em;
	position: relative;
}

.editor-styles-wrapper .is-style-st-maruno > li::before,
.editor-styles-wrapper .is-style-st-maruck > li::before,
.editor-styles-wrapper .maruno li::before,
.editor-styles-wrapper .maruck li::before {
    border-radius: 50%;
    width: 1.5em;
    height: 1.5em;
    line-height: 1.5em;
    text-align: center;
    background: #f3f3f3;
    color: #333;
    box-sizing: border-box;
    left: .25em;
    position: absolute;
	transform: scale(.8);
}

@media print, screen and (max-width: 599px) {
	.editor-styles-wrapper .is-style-st-maruno > li::before,
	.editor-styles-wrapper .is-style-st-maruck > li::before,
	.editor-styles-wrapper .maruno li::before,
	.editor-styles-wrapper .maruck li::before {
		margin-left:-3em;
	}
}

/*チェックリスト*/
.editor-styles-wrapper .is-style-st-maruck,
.editor-styles-wrapper .maruck {
	margin-bottom: 20px;
}

.editor-styles-wrapper .is-style-st-maruck.
.editor-styles-wrapper .maruck {
	list-style-type: none;
	margin-left: 10px;
	padding:0 20px 20px 30px;
}

.editor-styles-wrapper .is-style-st-maruck > li,
.editor-styles-wrapper .maruck li {
	list-style-type: none;
	list-style-type: none;
	padding-bottom: 5px;
	line-height: 23px;
	margin-bottom: 7px;
}

.editor-styles-wrapper .is-style-st-maruck > li::before,
.editor-styles-wrapper .maruck li::before {
	content: "\f00c";
	font-family: stsvg;
}

.editor-styles-wrapper .is-style-st-maruno > li::before,
.editor-styles-wrapper .is-style-st-maruck > li::before,
.editor-styles-wrapper .maruno li::before,
.editor-styles-wrapper .maruck li::before {
    border-radius: 50%;
    width: 1.5em;
    height: 1.5em;
    line-height: 1.5em;
    text-align: center;
    background: #f3f3f3;
    color: #333;
    box-sizing: border-box;
    left: .25em;
    position: absolute;
}

/* ボーダーあり */
.editor-styles-wrapper .st-list-underline > li,
.editor-styles-wrapper ol.is-style-st-border > li,
.editor-styles-wrapper ul.is-style-st-border > li,
.editor-styles-wrapper ol.is-style-st-circle-border > li,
.editor-styles-wrapper ul.is-style-st-circle-border > li,
.editor-styles-wrapper ol.is-style-st-check-border > li,
.editor-styles-wrapper ul.is-style-st-check-border > li,
.editor-styles-wrapper ol.is-style-st-no-border > li,
.editor-styles-wrapper ul.is-style-st-no-border > li,
.editor-styles-wrapper .st-list-border ol li,
.editor-styles-wrapper .st-list-border ul li {
	border-bottom: dotted 1px #ccc;
}

/* サークル */
.editor-styles-wrapper ol.is-style-st-circle,
.editor-styles-wrapper ul.is-style-st-circle,
.editor-styles-wrapper ol.is-style-st-circle-border,
.editor-styles-wrapper ul.is-style-st-circle-border,
.editor-styles-wrapper .st-list-circle ol,
.editor-styles-wrapper .st-list-circle ul {
	padding-left: 0;
	padding-right: 0;
}

.editor-styles-wrapper ol.is-style-st-circle > li,
.editor-styles-wrapper ul.is-style-st-circle > li,
.editor-styles-wrapper ol.is-style-st-circle-border > li,
.editor-styles-wrapper ul.is-style-st-circle-border > li,
.editor-styles-wrapper .st-list-circle li {
	position: relative;
	padding-left: 2em;
	list-style: none;
}

.editor-styles-wrapper .is-style-st-circle > li::before,
.editor-styles-wrapper .st-list-circle li::before {
	content: "";
	width: .5em;
	height: .5em;
	line-height: .5em;
	background-color: #ccc;
	border-radius: 50%;
	position: absolute;
	left: .75em;
	top: .75em;
}

.editor-styles-wrapper .is-style-st-circle-border > li::before {
	content: "";
	width: .5em;
	height: .5em;
	line-height: .5em;
	background-color: #ccc;
	border-radius: 50%;
	position: absolute;
	left: .75em;
	top: 1em;
}

.editor-styles-wrapper .st-list-border.st-list-circle li::before {
	top: 1em!important;
}

/* 簡易チェックマーク */
.editor-styles-wrapper .is-style-st-check,
.editor-styles-wrapper .is-style-st-check-border,
.editor-styles-wrapper .st-list-check ol,
.editor-styles-wrapper .st-list-check ul {
	padding-left: 0;
	padding-right: 0;
}

.editor-styles-wrapper .is-style-st-check > li,
.editor-styles-wrapper .is-style-st-check-border > li,
.editor-styles-wrapper .st-list-check li {
	position: relative;
	padding-left: 2.5em;
	list-style: none;
}

.editor-styles-wrapper .is-style-st-check > li::before,
.editor-styles-wrapper .is-style-st-check-border > li::before,
.editor-styles-wrapper .st-list-check li::before { /* チェック */
	content: "";
    position: absolute;
	top: .75em;
    left: .9em;
    -webkit-transform: rotate(50deg);
    -ms-transform: rotate(50deg);
    transform: rotate(50deg);
    width: .2em;
    height: .5em;
    border-right: 2px solid #f44336;
    border-bottom: 2px solid #f44336;
}

.editor-styles-wrapper .is-style-st-check > li::after,
.editor-styles-wrapper .is-style-st-check-border > li::after,
.editor-styles-wrapper .st-list-check li::after {
    content: "";
    position: absolute;
	top: .55em;
    left: .5em;
    width: 1em;
    height: 1em;
    border: solid 1px #ccc;
}

.editor-styles-wrapper .is-style-st-check > li::after:hover,
.editor-styles-wrapper .is-style-st-check-border > li::after:hover,
.editor-styles-wrapper .st-list-check li::after:hover {
    color: #ff0000;
}

/* 四角背景 */
.editor-styles-wrapper .is-style-st-no,
.editor-styles-wrapper .is-style-st-no-border,
.editor-styles-wrapper .st-list-no ol,
.editor-styles-wrapper .st-list-no ul {
	padding-left: 0;
	padding-right: 0;
}

.editor-styles-wrapper .is-style-st-no > li,
.editor-styles-wrapper .is-style-st-no-border > li,
.editor-styles-wrapper .st-list-no li {
	display: block;
	counter-increment: st-list-count;
	list-style: none;
	position: relative;
	padding-left: 2.5em;
}

.editor-styles-wrapper .is-style-st-no > li::before,
.editor-styles-wrapper .st-list-no li::before {
    content: counter(st-list-count);
    width: 1.5em;
    height: 1.5em;
    background-color: #ccc;
    color: #fff;
    line-height: 1.5em;
    position: absolute;
    left: .25em;
	text-align: center;
	top: .25em!important;
	transform: scale(.8);
}

.editor-styles-wrapper .is-style-st-no-border > li::before {
    content: counter(st-list-count);
    width: 1.5em;
    height: 1.5em;
    background-color: #ccc;
    color: #fff;
    line-height: 1.5em;
    position: absolute;
    left: .25em;
	text-align: center;
	top: .5em!important;
	transform: scale(.8);
}

.editor-styles-wrapper .st-list-no.st-list-border li::before {
	top: .5em!important;
}

/* マル・バツリスト */
.editor-styles-wrapper  .is-style-st-correct-list.has-pale-pink-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-pale-pink-color > li::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-soft-red-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-soft-red-color > li::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-light-grayish-red-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-light-grayish-red-color > li::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-vivid-yellow-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-vivid-yellow-color > li::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-very-pale-yellow-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-very-pale-yellow-color > li::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-light-green-cyan-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-light-green-cyan-color > li::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-pale-cyan-blue-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-pale-cyan-blue-color > li::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-vivid-cyan-blue-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-vivid-cyan-blue-color > li::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-very-light-gray-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-very-light-gray-color > li::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-very-dark-gray-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-very-dark-gray-color > li::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-white-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-white-color > li::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-original-color-a-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-original-color-a-color > li::before {
	color: <?php echo $original_color_a; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-original-color-b-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-original-color-b-color > li::before {
	color: <?php echo $original_color_b; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-original-color-c-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-original-color-c-color > li::before {
	color: <?php echo $original_color_c; ?>;
}

.editor-styles-wrapper  .is-style-st-correct-list.has-original-color-d-color > li::before,
.editor-styles-wrapper  .is-style-st-wrong-list.has-original-color-d-color > li::before {
	color: <?php echo $original_color_d; ?>;
}

/*----------------------------------
リンクボタン
-----------------------------------*/

/*詳細ページへのリンクボタンカラー*/
.editor-styles-wrapper .rankstlink-l2 p a,
.editor-styles-wrapper .rankstlink-l p a,
.editor-styles-wrapper .rankstlink-b p a {
	font-family: Helvetica , "游ゴシック", "Yu Gothic", sans-serif;
	background: #f2f2f2;
	color: #000;
}

/*アフィリエイトのリンクボタンカラー*/
.editor-styles-wrapper .rankstlink-r p a,
.editor-styles-wrapper .rankstlink-r2 p a,
.editor-styles-wrapper .rankstlink-a p a {
	font-family: Helvetica , "游ゴシック", "Yu Gothic", sans-serif;
	background-color: #f2f2f2;
	color: #000;
}

/*スター*/

.editor-styles-wrapper .st-star {
	color: #FFB400;
	font-size: 15px;
}

/*投稿用詳細ページリンクボタン*/
.editor-styles-wrapper .rankstlink-l2 p a {
	display: block;
	width: 100%;
	text-align: center;
	padding: 10px;
	text-decoration: none;
	margin-right: auto;
	margin-left: auto;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	font-weight: bold;
	box-sizing: border-box;
}

.editor-styles-wrapper .rankstlink-l2 p {
	width: 90%;
	text-align: center;
	margin-right: auto;
	margin-left: auto;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	font-weight: bold;
	box-shadow: 0 2px 0 #cccccc;
	position: relative;
}

.editor-styles-wrapper .rankstlink-l2 p:hover {
	box-shadow: 0 1px 0 #cccccc;
	top: 1px;
}

/*投稿用公式リンク*/
.editor-styles-wrapper .rankstlink-r2 p a {
	display: block;
	width: 100%;
	text-align: center;
	padding: 10px;
	text-decoration: none;
	margin-right: auto;
	margin-left: auto;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	font-weight: bold;
	box-sizing: border-box;
}

.editor-styles-wrapper .rankstlink-r2 p {
	width: 90%;
	margin-right: auto;
	margin-left: auto;
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	box-shadow: 0 2px 0 #cccccc;
	position: relative;
}

.editor-styles-wrapper .rankstlink-r2 p img {
	display: none;
}

.editor-styles-wrapper .rankstlink-r2 p br {
	display: none;
}

/*media Queries タブレットサイズ
----------------------------------------------------*/
@media only screen and (min-width: 414px) {
/*レスポンシブ用PC左右コンテンツ*/

	.editor-styles-wrapper .responboxfree .lbox {
		padding: 10px;
		background: #FFF59D;
		float: left;
		padding-right: 15px;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .responboxfree .rbox {
		padding: 10px;
		background: #B2EBF2;
		float: left;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .responbox .lbox {
		padding: 10px;
		background: #FFF59D;
		float: left;
		padding-right: 15px;
		width: 40%;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .responbox .rbox {
		padding: 10px;
		background: #B2EBF2;
		float: left;
		box-sizing: border-box;
		width: 60%;
	}

	.editor-styles-wrapper .responbox40 .lbox {
		padding: 10px;
		background: #FFF59D;
		float: left;
		padding-right: 15px;
		width: 40%;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .responbox40 .rbox {
		padding: 10px;
		background: #B2EBF2;
		float: left;
		box-sizing: border-box;
		width: 60%;
	}

	/*30%*/

	.editor-styles-wrapper .responbox30 .lbox {
		padding: 10px;
		background: #FFF59D;
		float: left;
		padding-right: 15px;
		width: 30%;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .responbox30 .rbox {
		padding: 10px;
		background: #B2EBF2;
		float: left;
		box-sizing: border-box;
		width: 70%;
	}

	/*33%*/

	.editor-styles-wrapper .responbox33 .lbox {
		float: left;
		padding: 5px;
		width: 33.33%;
		box-sizing: border-box;
		background: #FFF59D;
	}

	.editor-styles-wrapper .responbox33 .lbox:nth-child(even) {
		background: #B2EBF2;
	}

	/*50%*/

	.editor-styles-wrapper .responbox50 .lbox {
		padding: 10px;
		background: #FFF59D;
		float: left;
		padding-right: 15px;
		width: 50%;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .responbox50 .rbox {
		padding: 10px;
		background: #B2EBF2;
		float: left;
		box-sizing: border-box;
		width: 50%;
	}

	/*60%*/

	.editor-styles-wrapper .responbox60 .lbox {
		padding: 10px;
		background: #FFF59D;
		float: left;
		padding-right: 15px;
		width: 60%;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .responbox60 .rbox {
		padding: 10px;
		background: #B2EBF2;
		float: left;
		box-sizing: border-box;
		width: 40%;
	}

	/*70%*/

	.editor-styles-wrapper .responbox70 .lbox {
		padding: 10px;
		background: #FFF59D;
		float: left;
		padding-right: 15px;
		width: 30%;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .responbox70 .rbox {
		padding: 10px;
		background: #B2EBF2;
		float: right;
		box-sizing: border-box;
		width: 70%;
	}

}
/*media Queries PCサイズ
----------------------------------------------------*/
@media only screen and (min-width: 781px) {

	/*--------------------------------
	各フォント設定
	---------------------------------*/
	.editor-styles-wrapper div,
	.editor-styles-wrapper p {
		font-size: 14px;
		line-height: 23px;
	}

	.editor-styles-wrapper ol li,
	.editor-styles-wrapper .mce-content-body ol li,
	.editor-styles-wrapper ul li,
	.editor-styles-wrapper .mce-content-body ul li {
		font-size: 14px;
		line-height: 25px;
	}

	/*中見出し*/
	.editor-styles-wrapper h2 {
		font-size: 20px;
		line-height: 30px;
	}

	.editor-styles-wrapper h2.has-st-regular-font-size {
		font-size: 20px!important;
	}

	.editor-styles-wrapper h2::after {
		bottom: -10px;
		left: 50px;
	}

	.editor-styles-wrapper h2::before {
		bottom: -10px;
		left: 50px;
	}

	/*小見出し*/
	.editor-styles-wrapper h3 {
		font-size: 18px;
		line-height: 25px;
	}

	.editor-styles-wrapper h3.has-st-regular-font-size {
		font-size: 18px!important;
	}

	/*リスト */
	.editor-styles-wrapper ul li {
		font-size: 14px;
		line-height: 27px;
	}

	.editor-styles-wrapper ol li {
		font-size: 14px;
		line-height: 27px;
	}

	/* オリジナルスタイルPC */

	.editor-styles-wrapper .oomozi {
		font-size: 18pt;
		line-height: 35px;
	}

	.editor-styles-wrapper .yellowbox {
		font-size: 14px;
		line-height: 27px;
		margin-bottom: 20px;
	}

	.editor-styles-wrapper .redbox {
		font-size: 14px;
		line-height: 27px;
		margin-bottom: 20px;
	}

	.editor-styles-wrapper .graybox {
		font-size: 14px;
		line-height: 27px;
		margin-bottom: 20px;
	}

	.editor-styles-wrapper .h2fuu {
		font-size: 20px;
		line-height: 30px;
	}

	.editor-styles-wrapper .h2fuu::after {
		bottom: -10px;
		left: 50px;
	}

	.editor-styles-wrapper .h2fuu::before {
		bottom: -10px;
		left: 50px;
	}

	/*-- ここまで --*/
}

/*--------------------------------
editor-style.css（ここまで）
---------------------------------*/

<?php // Gutenberg 用ブロックプラグイン ?>
<?php if ( _st_plugin_support_is_enabled( 'ST_BLOCKS', 'st-blocks' ) ): ?>

	<?php // マイ細マーカーA ?>
	.editor-styles-wrapper .st-mymarker-s {
		<?php if ( trim( $GLOBALS['stdata612'] ) !== '' ): // ストライプ ?>
			background: repeating-linear-gradient(-45deg, transparent 0 2px, <?php echo esc_attr($GLOBALS['stdata417']) ; ?> 2px 4px );
			background-size: 100% .6em;
			padding-bottom: .8em;
			background-position: 0 center;
			background-repeat: no-repeat;
		<?php else: ?>
			background:linear-gradient(transparent 70%,<?php echo esc_attr($GLOBALS['stdata417']) ; ?> 0%);
		<?php endif; ?>
		font-weight:bold;
		<?php if ( trim( $GLOBALS['stdata418'] ) !== '' ): ?>
			color: <?php echo esc_attr($GLOBALS['stdata418']) ; ?>;
		<?php endif; ?>
	}

	<?php // マイ細マーカーB ?>
	.editor-styles-wrapper .st-mymarker-s-b {
		<?php if ( trim( $GLOBALS['stdata612'] ) !== '' ): // ストライプ ?>
			background: repeating-linear-gradient(-45deg, transparent 0 2px, <?php echo esc_attr($GLOBALS['stdata589']) ; ?> 2px 4px );
			background-size: 100% .6em;
			padding-bottom: .8em;
			background-position: 0 center;
			background-repeat: no-repeat;
		<?php else: ?>
			background:linear-gradient(transparent 70%,<?php echo esc_attr($GLOBALS['stdata589']) ; ?> 0%);
		<?php endif; ?>
		font-weight:bold;
		<?php if ( trim( $GLOBALS['stdata590'] ) !== '' ): ?>
			color: <?php echo esc_attr($GLOBALS['stdata590']) ; ?>;
		<?php endif; ?>
	}

	<?php // メモ ?>
	<?php _st_block_editor_style_scope_root_styles( '.clip-memobox' ); ?>
	.editor-styles-wrapper .clip-memobox {
		margin-bottom: 20px;
		padding: 10px;
		border-radius: 3px;
		background: #f3f3f3;
	}

	.editor-styles-wrapper .clip-memotext {
		box-sizing: border-box;
		padding-left: 15px;
		width: 100%;
	}

	.editor-styles-wrapper .clip-memotext > * {
		font-size: 95%;
		line-height: 1.7;
	}

	.editor-styles-wrapper .clip-memobox.has-icon-label .st-fa,
	.editor-styles-wrapper .clip-memobox.has-icon-label .fa {
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}

	.editor-styles-wrapper .clip-memobox.has-icon-label .st-fa::before,
	.editor-styles-wrapper .clip-memobox.has-icon-label .fa::before {
		line-height: 1.5em;
	}

	.editor-styles-wrapper .clip-memobox.has-icon-label .st-fa::after,
	.editor-styles-wrapper .clip-memobox.has-icon-label .fa::after {
		margin-top: 0;
		display: block;
		font-size: 11px;
		max-width: 5.5em;
    	line-height: 1.5em;
	}

	.editor-styles-wrapper .clip-memobox.has-border {
		border: 5px solid transparent;
	}

	.editor-styles-wrapper .wp-block-st-blocks-memo.clip-memobox.has-border {
		border: 1px solid transparent;
	}

	.editor-styles-wrapper .clip-memobox.has-icon-label .st-fa::after,
	.editor-styles-wrapper .clip-memobox.has-icon-label .fa::after {
		content: attr(data-icon-label);
	}

	@media (max-width: 599px) {
		.editor-styles-wrapper .clip-memobox .clip-fonticon {
			font-size: 150%;
		}
	}

	<?php //タイトル付きフリーボックス ?>
	<?php _st_block_editor_style_scope_root_styles( '.freebox' ); ?>
	.editor-styles-wrapper .freebox {
		position: relative;
		margin-bottom: 20px;
		padding: calc(1em + 10px) 0 10px;
		border-top: solid 1px #feb20a;
		background: #f3f3f3;
		font-size: 15px;
		line-height: 25px;
	}

	.editor-styles-wrapper .p-free {
		padding: 0;
		margin: 0;
	}

	.editor-styles-wrapper .p-free::after {
		display: block;
		content: "";
	}

	.editor-styles-wrapper .p-entry-f {
		position: absolute;
		top: 0;
		left: 0;
		margin: 0;
		padding: 3px 20px;
		max-width: 80%;
		background: #feb20a;
		color: #fff;
		font-weight: bold;
		font-size: 15px;
	}

	.editor-styles-wrapper .p-entry-f .st-fa,
	.editor-styles-wrapper .p-entry-f .fa {
		margin-right: 5px;
	}

	.editor-styles-wrapper .free-inbox {
		padding: 10px 15px 10px;
		text-align: left;
	}

	.editor-styles-wrapper .free-inbox p {
		margin-bottom: 10px;
	}

	.editor-styles-wrapper .free-inbox p:last-child {
		margin-bottom: 10px;
	}

	@media (min-width: 600px) {
		.editor-styles-wrapper .freebox {
			font-size: 18px;
			line-height: 28px;
		}
	}

	@media (min-width: 960px) {
		.editor-styles-wrapper .freebox {
			font-size: 14px;
			line-height: 24px;
		}
	}

	<?php // マイボックス ?>
	<?php _st_block_editor_style_scope_root_styles( '.st-mybox' ); ?>
	.editor-styles-wrapper .st-mybox {
		position: relative;
		margin: 25px 0;
		padding: 0 20px;
		border: solid 2px #9e9e9e;
	}

	.editor-styles-wrapper .st-in-mybox {
		padding: 20px 0;
	}

	.editor-styles-wrapper .st-in-mybox p {
		margin-bottom: 10px;
	}

	.editor-styles-wrapper .st-mybox .st-fa,
	.editor-styles-wrapper .st-mybox .fa {
		margin-right: 5px;
		margin-left: 5px;
	}

	.editor-styles-wrapper .st-mybox .st-mybox-title {
		position: absolute;
		top: -.5em;
		left: 10px;
		display: inline-block;
		margin-bottom: 10px;
		padding: 0 5px 10px;
		color: #9e9e9e;
		font-weight: bold;
		line-height: 1;
	}

	.editor-styles-wrapper .st-mybox.has-title .st-mybox-title {
		padding-right: 10px;
		padding-left: 10px;
	}

	.editor-styles-wrapper .st-mybox.has-title.has-icon .st-mybox-title {
		padding-left: 5px;
	}

	<?php // バナー風ボックス ?>
	<?php _st_block_editor_style_scope_root_styles( '.st-header-flexwrap' ); ?>
	.editor-styles-wrapper .wp-block[data-type="st-blocks/flexbox"],
	.editor-styles-wrapper .st-header-flexwrap {
		margin-top: 0;
		margin-bottom: 0;
	}

	.editor-styles-wrapper .st-header-flexwrap {
		position: relative;
		z-index: 0;
		display: flex;
		overflow: hidden;
		margin-right: 0;
		margin-left: 0;
		background-position: 50% 50%;
		background-size: cover;
		justify-content: center;
		align-items: center;
		max-width: 100%;
		box-sizing: border-box;
	}

	.editor-styles-wrapper .st-header-flexwrap.st-blur::before {
		position: absolute;
		top: -5px;
		right: -5px;
		bottom: -5px;
		left: -5px;
		z-index: -1;
		background: inherit;
		content: '';
		filter: blur(5px);
		transition: filter 0.3s ease;
	}

	.editor-styles-wrapper .st-header-flexwrap.st-blur:hover::before {
		filter: blur(0);
	}

	.editor-styles-wrapper .st-header-flexbox {
		width: 80%;
		text-align: center;
	}

	.editor-styles-wrapper .wp-block-st-blocks-flexbox .st-header-flexbox {
		width: 100%;
	}

	.editor-styles-wrapper .st-header-flextitle {
		margin-bottom: 10px;
		color: #fff;
		font-weight: bold;
		line-height: 1.3;
		display: flex;
		align-items: center;
		margin-right: auto;
		margin-left: auto;
		width: fit-content;
	}

	.editor-styles-wrapper .st-header-flextitle .st-fa,
	.editor-styles-wrapper .st-header-flextitle .fa {
		margin: 0 7px;
	}

	.editor-styles-wrapper .st-header-flexwrap.st-flexbox-center {
		margin-right: auto;
		margin-left: auto;
	}

	.editor-styles-wrapper .st-header-flexwrap.st-flexbox-left {
		display: flex;
		justify-content: flex-start;
	}

	.st-header-flexwrap.st-flexbox-left .st-header-flextitle {
		margin-left: 0;
	}

	.editor-styles-wrapper .st-header-flexwrap.st-flexbox-left .st-header-flexbox {
		box-sizing: border-box;
		width: 100%;
		text-align: left;
	}

	<?php // タブ ?>
	.editor-styles-wrapper .wp-block[data-type="st-blocks/tab-content-group"],
	.editor-styles-wrapper .wp-block[data-type="st-blocks/tab-content"] {
		margin-top: 0;
		margin-bottom: 0;
	}

	/* 「タブコンテンツ」ブロック直下のアペンダーの右余白をなくす */
	.editor-styles-wrapper .wp-block[data-type="st-blocks/tab-content"]  > .block-list-appender {
		max-width: none;
	}

	.editor-styles-wrapper .st-tabs {
		--st--color: #000;
		--st--background-color: transparent;
		--st--border-width: 0;
		--st--border-color: #000;
		--st--padding-top: 0;
		--st--padding-right: 0;
		--st--padding-bottom: 0;
		--st--padding-left: 0;
		margin-bottom: 20px;
		border-style: none;
	}

	.editor-styles-wrapper .st-tabs :where([style*="border-width"]) {
		border-style: none;
	}

	.editor-styles-wrapper .st-tabs__tab-list,
	.editor-styles-wrapper .st-tabs__tab-list:not(.has-st-border):not(.has-background),
	.editor-styles-wrapper .st-tabs__tab-list.has-background {
		position: relative;
		margin: 0 -2px;
		padding: 0;
		display: flex;
		justify-content: space-between;
		overflow-x: auto;
		overflow-y: hidden;
		z-index: 1;
		width: calc(100% + 4px) !important;
		max-width: calc(100% + 4px) !important;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item {
		display: block;
		flex-grow: 1;
		flex-shrink: 1;
		font-size: 18px;
		line-height: 30px !important;
		cursor: pointer;
		box-sizing: border-box;
		width: 100%;
		height: auto;
		word-break: break-word;
		margin: 0 2px;
		position: relative;
		overflow-wrap: break-word;
		text-align: center;
		opacity: .6;
	}

	.editor-styles-wrapper .st-tabs__tab-list .st-tabs__tab-list-item {
		padding: 0;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.is-selected {
		opacity: 1;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-text-align-left {
		text-align: left;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-text-align-center {
		text-align: center;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-text-align-right {
		text-align: right;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-color {
		color: var(--st--color);
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-background {
		background-color: var(--st--background-color);
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-border {
		border-top-width: var(--st--border-width);
		border-right-width: var(--st--border-width);
		border-bottom-width: 0;
		border-left-width: var(--st--border-width);
		border-top-style: solid;
		border-right-style: solid;
		border-bottom-style: none;
		border-left-style: solid;
		border-color: var(--st--border-color);
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-no-border {
		border: 0;
	}

	.editor-styles-wrapper .st-tabs__tab {
		box-sizing: border-box;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-basis: 100%;
		width: 100%;
		height: 100%;
		padding: 7px;
		border: 0;
		background: transparent;
		-webkit-appearance: none;
		text-align: inherit;
		font-size: inherit !important;
		line-height: inherit !important;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-text-align-left .st-tabs__tab {
		justify-content: flex-start;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-text-align-center .st-tabs__tab {
		justify-content: center;
	}

	.editor-styles-wrapper .st-tabs__tab-list-item.has-text-align-right .st-tabs__tab {
		justify-content: flex-end;
	}

	.editor-styles-wrapper .st-tabs__tab-text {
		cursor: text;
	}

	.editor-styles-wrapper .st-tabs__tab-text img {
		margin: 0;
		vertical-align: middle;
	}

	.editor-styles-wrapper .st-tabs__tab-content-group {
		position: relative;
		z-index: 2;
	}

	.editor-styles-wrapper .st-tabs__tab-content {
		padding: var(--wp--preset--spacing--20);
	}

	.editor-styles-wrapper .st-tabs__tab-content[hidden] {
		display: block;
		visibility: hidden;
		position: absolute;
		overflow: hidden;
		clip: rect(0 0 0 0);
		clip-path: inset(50%);
		margin: -1px;
		width: 1px;
		height: 1px;
		white-space: nowrap;
		z-index: -2147483647;
	}

	.editor-styles-wrapper .st-tabs__tab-content.has-border {
		border-width: var(--st--border-width);
		border-style: solid;
		border-color: var(--st--border-color);
	}

	.editor-styles-wrapper .st-tabs__tab-content.has-no-border {
		border: 0;
	}

	.editor-styles-wrapper .st-tabs__tab-content > :first-child {
		margin-top: 0;
	}

	.editor-styles-wrapper .st-tabs__tab-content > :last-child {
		margin-bottom: 0;
	}

	.editor-styles-wrapper .st-tabs__tab-icon {
		margin-right: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-rounded .st-tabs__tab-list-item {
		border-top-left-radius: 3px;
		border-top-right-radius: 3px;
	}

	.editor-styles-wrapper .st-tabs.is-rounded .st-tabs__tab-content {
		border-bottom-right-radius: 3px;
		border-bottom-left-radius: 3px;
	}

	@media only screen and (max-width: 959px) {
		.editor-styles-wrapper .st-tabs__tab-list {
			flex-wrap: wrap;
		}

		.editor-styles-wrapper .st-tabs.is-single-tab .st-tabs__tab-list-item {
			width: calc(100% - 4px) !important;
		}

		.editor-styles-wrapper .st-tabs.is-tabs-dividable-by-2 .st-tabs__tab-list-item,
		.editor-styles-wrapper .st-tabs.is-tabs-dividable-by-4 .st-tabs__tab-list-item {
			width: calc(50% - 4px) !important;
		}

		.editor-styles-wrapper .st-tabs.is-tabs-dividable-by-3 .st-tabs__tab-list-item,
		.editor-styles-wrapper .st-tabs.is-tabs-mod-3-1 .st-tabs__tab-list-item,
		.editor-styles-wrapper .st-tabs.is-tabs-mod-3-2 .st-tabs__tab-list-item {
			width: calc(33.33333% - 4px) !important;
		}
	}

	@media (min-width: 600px) {
		.editor-styles-wrapper .st-tabs__tab-list-item {
			font-size: 20px;
			line-height: 30px !important;
		}
	}

	@media (min-width: 960px) {
		.editor-styles-wrapper .st-tabs__tab-list-item {
			font-size: 15px;
			line-height: 27px !important;
		}
	}

	/* タブ > タブブロック > ブロックスタイル: スクエア */
	.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list {
		margin-right: 0 !important;
		margin-left: 0 !important;
		width: 100% !important;
		max-width: 100% !important;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list-item {
		margin-right: 0;
		margin-left: 0;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-content.has-border,
	.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded .st-tabs__tab-content.has-background {
		margin-top: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list-item.has-border {
		border-bottom-width: var(--st--border-width);
		border-bottom-style: solid;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded .st-tabs__tab-list-item {
		border-radius: 0;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded .st-tabs__tab-list-item:first-child {
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded .st-tabs__tab-list-item:last-child {
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded .st-tabs__tab-content {
		border-radius: 5px;
	}

	@media only screen and (max-width: 959px) {
		/* 最初の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded .st-tabs__tab-list-item:first-child {
			border-top-left-radius: 5px;
			border-bottom-left-radius: 0;
		}

		/* 最後の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded .st-tabs__tab-list-item:last-child {
			border-top-right-radius: 0;
			border-bottom-right-radius: 5px;
		}

		/* 1 行目の最後の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-single-tab .st-tabs__tab-list-item:nth-child(1),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-dividable-by-2 .st-tabs__tab-list-item:nth-child(2),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-dividable-by-3 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-mod-3-1 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-mod-3-2 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-dividable-by-4 .st-tabs__tab-list-item:nth-child(2) {
			border-top-right-radius: 5px;
		}

		/* 最終行目の最初の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-single-tab .st-tabs__tab-list-item:nth-last-child(1),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-dividable-by-2 .st-tabs__tab-list-item:nth-last-child(2),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-dividable-by-3 .st-tabs__tab-list-item:nth-last-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-mod-3-1 .st-tabs__tab-list-item:nth-last-child(1),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-mod-3-2 .st-tabs__tab-list-item:nth-last-child(2),
		.editor-styles-wrapper .st-tabs.is-style-st-square.is-rounded.is-tabs-dividable-by-4 .st-tabs__tab-list-item:nth-last-child(2) {
			border-bottom-left-radius: 5px;
		}
	}

	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list {
		margin-right: 0 !important;
		margin-left: 0 !important;
		width: 100% !important;
		max-width: 100% !important;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
		margin-right: 0;
		margin-left: 0;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list {
		margin-bottom: -10px;
		padding-bottom: 10px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-content.has-border,
	.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded .st-tabs__tab-content.has-background {
		margin-top: 10px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab {
		position: relative;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list-item.has-border {
		border-bottom-width: var(--st--border-width);
		border-bottom-style: solid;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-border .st-tabs__tab[aria-selected="true"]::before {
		content: '';
		position: absolute;
		border-width: calc(10px + var(--st--border-width)) calc(8px + var(--st--border-width)) calc(8px + var(--st--border-width));
		border-style: solid;
		border-top-color: var(--st--border-color);
		border-right-color: transparent;
		border-bottom-color: transparent;
		border-left-color: transparent;
		bottom: calc(-18px - var(--st--border-width) * 2);
		left: calc(50% - calc(8px + var(--st--border-width)));
		z-index: 1;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-no-border .st-tabs__tab[aria-selected="true"]::before {
		content: normal;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab[aria-selected="true"]::after {
		content: '';
		position: absolute;
		border-width: 10px 8px 8px;
		border-style: solid;
		border-color: transparent;
		bottom: -18px;
		left: calc(50% - 8px);
		z-index: 2;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded .st-tabs__tab-list-item {
		border-radius: 0;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded .st-tabs__tab-list-item:first-child {
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded .st-tabs__tab-list-item:last-child {
		border-top-right-radius: 5px;
		border-bottom-right-radius: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded .st-tabs__tab-content {
		border-radius: 5px;
	}

	@media only screen and (max-width: 959px) {
		/* 最初の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded .st-tabs__tab-list-item:first-child {
			border-top-left-radius: 5px;
			border-bottom-left-radius: 0;
		}

		/* 最後の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded .st-tabs__tab-list-item:last-child {
			border-top-right-radius: 0;
			border-bottom-right-radius: 5px;
		}

		/* 1 行目の最後の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-single-tab .st-tabs__tab-list-item:nth-child(1),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-dividable-by-2 .st-tabs__tab-list-item:nth-child(2),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-dividable-by-3 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-mod-3-1 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-mod-3-2 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-dividable-by-4 .st-tabs__tab-list-item:nth-child(2) {
			border-top-right-radius: 5px;
		}

		/* 最終行目の最初の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-single-tab .st-tabs__tab-list-item:nth-last-child(1),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-dividable-by-2 .st-tabs__tab-list-item:nth-last-child(2),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-dividable-by-3 .st-tabs__tab-list-item:nth-last-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-mod-3-1 .st-tabs__tab-list-item:nth-last-child(1),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-mod-3-2 .st-tabs__tab-list-item:nth-last-child(2),
		.editor-styles-wrapper .st-tabs.is-style-st-bubble.is-rounded.is-tabs-dividable-by-4 .st-tabs__tab-list-item:nth-last-child(2) {
			border-bottom-left-radius: 5px;
		}
	}

	/* タブ > タブブロック > ブロックスタイル: タブ */
	.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list {
		margin-right: 0 !important;
		margin-left: 0 !important;
		width: 100% !important;
		max-width: 100% !important;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list-item {
		margin-right: 0;
		margin-left: 0;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list-item,
	.editor-styles-wrapper .st-tabs.is-style-st-tab.is-rounded .st-tabs__tab-list-item {
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-tab.is-rounded .st-tabs__tab-content {
		border-radius: 0 0 5px 5px;
	}

	/* タブ > タブブロック > ブロックスタイル: ボーダー */
	.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list {
		margin-right: 0 !important;
		margin-left: 0 !important;
		width: 100% !important;
		max-width: 100% !important;
	}

	.st-tabs.is-style-st-border .st-tabs__tab-list {
		--st--border-width: 1px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list-item {
		margin-right: 0;
		margin-left: 0;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list-item {
		border-top-width: 0;
		border-right-width: 0;
		border-bottom-width: var(--st--border-width);
		border-left-width: 0;
		border-top-style: none;
		border-right-style: none;
		border-bottom-style: solid;
		border-left-style: none;
		border-color: var(--st--border-color);
	}

	.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list-item:not(.is-selected) {
		border-bottom-color: #ccc !important;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded .st-tabs__tab-list-item {
		border-radius: 0;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded .st-tabs__tab-list-item:first-child {
		border-top-left-radius: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded .st-tabs__tab-list-item:last-child {
		border-top-right-radius: 5px;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-content {
		border-top-width: 0;
	}

	.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded .st-tabs__tab-content {
		border-radius: 0 0 5px 5px;
	}

	@media only screen and (max-width: 959px) {
		/* 最後の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded .st-tabs__tab-list-item:last-child {
			border-top-right-radius: 0;
		}

		/* 1 行目の最後の角丸タブ */
		.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded.is-single-tab .st-tabs__tab-list-item:nth-child(1),
		.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded.is-tabs-dividable-by-2 .st-tabs__tab-list-item:nth-child(2),
		.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded.is-tabs-dividable-by-3 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded.is-tabs-mod-3-1 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded.is-tabs-mod-3-2 .st-tabs__tab-list-item:nth-child(3),
		.editor-styles-wrapper .st-tabs.is-style-st-border.is-rounded.is-tabs-dividable-by-4 .st-tabs__tab-list-item:nth-child(2) {
			border-top-right-radius: 5px;
		}
	}

	/* タブ > タブブロック > ブロックスタイルのデフォルト設定 (デフォルト) */
	<?php if ( isset( $GLOBALS['stdata659'] ) && trim( $GLOBALS['stdata659'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-default .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata659']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-default .st-tabs__tab-list-item {
			color: var(--st--color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata660'] ) && trim( $GLOBALS['stdata660'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-default .st-tabs__tab-list {
			--st--background-color: <?php echo $GLOBALS['stdata660']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-default .st-tabs__tab-list-item {
			background-color: var(--st--background-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata661'] ) && trim( $GLOBALS['stdata661'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-default .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata661']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-default .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata662'] ) && trim( $GLOBALS['stdata662'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-default .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata662']; ?>px;
		}

		.editor-styles-wrapper .st-tabs.is-style-default .st-tabs__tab-list-item {
			border-top-width: var(--st--border-width);
			border-right-width: var(--st--border-width);
			border-bottom-width: 0;
			border-left-width: var(--st--border-width);
			border-top-style: solid;
			border-right-style: solid;
			border-bottom-style: none;
			border-left-style: solid;
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	/* タブ > タブブロック > ブロックスタイルのデフォルト設定 (スクエア) */
	<?php if ( isset( $GLOBALS['stdata663'] ) && trim( $GLOBALS['stdata663'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata663']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list-item {
			color: var(--st--color);
		}
	<?php endif; ?>

	<?php if (
		( isset( $GLOBALS['stdata664'] ) && trim( $GLOBALS['stdata664'] ) !== '' ) ||
		( isset( $GLOBALS['stdata665'] ) && trim( $GLOBALS['stdata665'] ) !== '' )
	): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-content {
			margin-top: 5px;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata664'] ) && trim( $GLOBALS['stdata664'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list {
			--st--background-color: <?php echo $GLOBALS['stdata664']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list-item {
			background-color: var(--st--background-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata665'] ) && trim( $GLOBALS['stdata665'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata665']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata666'] ) && trim( $GLOBALS['stdata666'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata666']; ?>px;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-square .st-tabs__tab-list-item {
			border-top-width: var(--st--border-width);
			border-right-width: var(--st--border-width);
			border-bottom-width: var(--st--border-width);
			border-left-width: var(--st--border-width);
			border-top-style: solid;
			border-right-style: solid;
			border-bottom-style: solid;
			border-left-style: solid;
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	/* タブ > タブブロック > ブロックスタイルのデフォルト設定 (ふきだし) */
	<?php if ( isset( $GLOBALS['stdata667'] ) && trim( $GLOBALS['stdata667'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata667']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
			color: <?php echo $GLOBALS['stdata667']; ?>;
		}
	<?php endif; ?>

	<?php if (
		( isset( $GLOBALS['stdata668'] ) && trim( $GLOBALS['stdata668'] ) !== '' ) ||
		( isset( $GLOBALS['stdata669'] ) && trim( $GLOBALS['stdata669'] ) !== '' )
	): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-content {
			margin-top: 10px;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata668'] ) && trim( $GLOBALS['stdata668'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list {
			--st--background-color: <?php echo $GLOBALS['stdata668']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
			background-color: var(--st--background-color);
		}

		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab[aria-selected="true"]::after {
			border-top-color: var(--st--background-color);
			border-right-color: transparent;
			border-bottom-color: transparent;
			border-left-color: transparent;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-bubble .has-no-border .st-tabs__tab[aria-selected="true"]::before {
			content: normal;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata669'] ) && trim( $GLOBALS['stdata669'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata669']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata670'] ) && trim( $GLOBALS['stdata670'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata670']; ?>px;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
			border-top-width: var(--st--border-width);
			border-right-width: var(--st--border-width);
			border-bottom-width: var(--st--border-width);
			border-left-width: var(--st--border-width);
			border-top-style: solid;
			border-right-style: solid;
			border-bottom-style: solid;
			border-left-style: solid;
			border-color: var(--st--border-color);
		}

		.editor-styles-wrapper .st-tabs.is-style-st-bubble .st-tabs__tab[aria-selected="true"]::before {
			content: '';
			position: absolute;
			border-width: calc(10px + var(--st--border-width)) calc(8px + var(--st--border-width)) calc(8px + var(--st--border-width));
			border-style: solid;
			border-top-color: var(--st--border-color);
			border-right-color: transparent;
			border-bottom-color: transparent;
			border-left-color: transparent;
			bottom: calc(-18px - var(--st--border-width) * 2);
			left: calc(50% - calc(8px + var(--st--border-width)));
			z-index: 1;
		}
	<?php endif; ?>

	/* タブ > タブブロック > ブロックスタイルのデフォルト設定 (タブ) */
	<?php if ( isset( $GLOBALS['stdata671'] ) && trim( $GLOBALS['stdata671'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata671']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list-item {
			color: var(--st--color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata672'] ) && trim( $GLOBALS['stdata672'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list {
			background-color: var(--st--background-color);
		}

		.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list-item {
			background-color: <?php echo $GLOBALS['stdata672']; ?>;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata673'] ) && trim( $GLOBALS['stdata673'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata673']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata674'] ) && trim( $GLOBALS['stdata674'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata674']; ?>px;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-tab .st-tabs__tab-list-item {
			border-top-width: var(--st--border-width);
			border-right-width: var(--st--border-width);
			border-bottom-width: 0;
			border-left-width: var(--st--border-width);
			border-top-style: solid;
			border-right-style: solid;
			border-bottom-style: none;
			border-left-style: solid;
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	/* タブ > タブブロック > ブロックスタイルのデフォルト設定 (ボーダー) */
	<?php if ( isset( $GLOBALS['stdata675'] ) && trim( $GLOBALS['stdata675'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata675']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list-item {
			color: var(--st--color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata676'] ) && trim( $GLOBALS['stdata676'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list {
			--st--background-color: <?php echo $GLOBALS['stdata676']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list-item {
			background-color: var(--st--background-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata677'] ) && trim( $GLOBALS['stdata677'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata677']; ?>;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata678'] ) && trim( $GLOBALS['stdata678'] ) !== '' ): ?>
		.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata678']; ?>px;
		}

		.editor-styles-wrapper .st-tabs.is-style-st-border .st-tabs__tab-list-item {
			border-top-width: 0;
			border-right-width: 0;
			border-bottom-width: var(--st--border-width);
			border-left-width: 0;
			border-top-style: none;
			border-right-style: none;
			border-bottom-style: solid;
			border-left-style: none;
			border-color: var(--st--border-color);
		}
	<?php endif; ?>
<?php endif;    // Gutenberg 用ブロックプラグイン ?>

/*
 テーマ管理
-------------------------------------------*/

/* 最新の記事 */
.editor-styles-wrapper .wp-block-latest-posts li img {
	max-width: 100%;
}

.editor-styles-wrapper ul.wp-block-latest-posts,
.editor-styles-wrapper ul.wp-block-latest-posts:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list){
	padding: 0;
}

.editor-styles-wrapper .wp-block-latest-posts li {
	list-style: none!important;
}

.editor-styles-wrapper .wp-block-latest-posts li a {
	/* 見出し-カスタマイザーに連動させる */
	text-decoration: none;
	color: #1a1a1a;
	font-weight: bold;
}

/** リスト表示 */
.editor-styles-wrapper .wp-block-latest-posts:not(.is-grid) li{
	margin-bottom: 10px;
}

.editor-styles-wrapper .wp-block-latest-posts:not(.is-grid) li::after{
	content: '';
	display: block;
	clear: both;
}

.editor-styles-wrapper .wp-block-latest-posts:not(.is-grid) li img {
	/* テーマ管理に連動させる */
	width: 100px;
}

.editor-styles-wrapper .wp-block-latest-posts:not(.is-grid) .wp-block-latest-posts__featured-image {
	margin-right: 10px;
	float: left;
}

.editor-styles-wrapper .post ul.wp-block-latest-posts:not(.is-grid) li:last-child,
.editor-styles-wrapper .wp-block-latest-posts:not(.is-grid) li {
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom-width: 1px;
    border-bottom-style: solid;
    border-bottom-color: #f3f3f3;
}

/** グリッド表示 */
.editor-styles-wrapper .wp-block-latest-posts.is-grid li img {
	margin-bottom: 10px;
}

.editor-styles-wrapper .wp-block-latest-posts.is-grid li {
	margin: 8px!important;
}

<?php if(trim($GLOBALS['stdata451']) === 'yes'): // サムネイル画像を角丸に変更する ?>
	.editor-styles-wrapper .wp-block-latest-posts li img {
		border-radius: 10px;
	}
<?php endif;  ?>

/** リスト表示 */
<?php if(trim($GLOBALS['stdata451']) === 'yes'): // サムネイル画像を右側に変更する ?>
	.editor-styles-wrapper .wp-block-latest-posts:not(.is-grid) .wp-block-latest-posts__featured-image {
		margin-left: 10px;
		float: right;
	}
<?php endif;  ?>

<?php if(trim($GLOBALS['stdata91']) === 'yes'): // サムネイル画像を大きくする（タブレット以上は1.5倍） ?>
	<?php if(trim($GLOBALS['stdata405']) === 'yes'): // スマホ（599px以下）でもサムネイル画像を大きくする ?>
		.editor-styles-wrapper .wp-block-latest-posts:not(.is-grid) li img {
			<?php if(trim($GLOBALS['stdata477']) === 'yes'): // サムネイル画像をさらに大きく（β） ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif;  ?>
		}
	<?php else: ?>
		@media only screen and (min-width: 600px) {
			.editor-styles-wrapper .wp-block-latest-posts:not(.is-grid) li img {
				<?php if(trim($GLOBALS['stdata477']) === 'yes'): // サムネイル画像をさらに大きく（β） ?>
					width: 300px;
				<?php else: ?>
					width: 150px;
				<?php endif;  ?>
			}
		}
	<?php endif;  ?>
<?php endif;  ?>

<?php if ( trim( $GLOBALS['stdata436'] ) !== '' ): // 記事タイトル・見出し（h2～3）・ウィジェットボタンなど - その他 ?>
	.editor-styles-wrapper .wp-block-latest-posts li a {
		font-weight: bold;
	}
<?php endif; ?>

@media only screen and (min-width: 600px) and (max-width: 959px) {
	/* Tabサイズ */
	.editor-styles-wrapper .wp-block-latest-posts li a {
	    font-size: 18px;
	    line-height: 26px;
	}

	.editor-styles-wrapper .wp-block-latest-posts li a {
		<?php if( isset($GLOBALS['stdata472']) && trim($GLOBALS['stdata472']) !== '' ): ?>
			font-size: <?php echo $st_tab_itiran_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata473']) && trim($GLOBALS['stdata473']) !== '' ): ?>
			line-height: <?php echo $st_tab_itiran_lineheight; ?>px;
		<?php endif; ?>
	}
}

@media only screen and (min-width: 960px) {
	/* PCサイズ */
	.editor-styles-wrapper .wp-block-latest-posts li a {
	    font-size: 16px;
	    line-height: 26px;
	}
}

@media only screen and (max-width: 599px) {
	/* スマホサイズ */
	.editor-styles-wrapper .wp-block-latest-posts li a {
	    font-size: 16px;
		line-height: 24px;
	}

	.editor-styles-wrapper .wp-block-latest-posts li a {
		<?php if( isset($GLOBALS['stdata470']) && trim($GLOBALS['stdata470']) !== '' ): ?>
			font-size: <?php echo $st_sp_itiran_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata471']) && trim($GLOBALS['stdata471']) !== '' ): ?>
			line-height: <?php echo $st_sp_itiran_lineheight; ?>px;
		<?php endif; ?>
	}
}

<?php // カスタマイザーの反映 ?>

<?php if ( $st_timeline_list_color ): ?>
	/* タイムライン（カウント） */
	.editor-styles-wrapper .is-style-st-timeline-count::after {
		border-left: 2px solid <?php echo $st_timeline_list_color; ?>;
	}
	.editor-styles-wrapper .is-style-st-timeline-count > li::before {
		background: <?php echo $st_timeline_list_color; ?>;
	}

	/* タイムライン（リスト） */
	.editor-styles-wrapper .is-style-st-timeline-list::after {
		border-left: 1px solid <?php echo $st_timeline_list_color; ?>;
	}
	.editor-styles-wrapper .is-style-st-timeline-list > li::before {
		background: <?php echo $st_timeline_list_color; ?>;
		color: #333;
	}

	/* リストスタイル タイムラインの下層リスト */
	.editor-styles-wrapper .is-style-st-timeline-list li::marker,
	.editor-styles-wrapper .is-style-st-timeline-count li::marker {
		color: <?php echo $st_timeline_list_color; ?>;
	}
<?php endif; ?>

<?php if ( $st_timeline_list_color_count ): ?>
	/* タイムライン（カウント） */
	.editor-styles-wrapper .is-style-st-timeline-count > li::before {
		color: <?php echo $st_timeline_list_color_count; ?>;
	}

	/* タイムライン（リスト） */
	.editor-styles-wrapper .is-style-st-timeline-list > li::before {
		color: <?php echo $st_timeline_list_color_count; ?>;
	}
<?php endif; ?>

<?php if($st_table_bordercolor): ?>
	/*テーブルのボーダー*/
	.editor-styles-wrapper .is-style-st-table-line table,
	.editor-styles-wrapper .is-style-st-table-line-2 table,
	.editor-styles-wrapper .is-style-st-table-line thead,
	.editor-styles-wrapper .is-style-st-table-line-2 thead,
	.editor-styles-wrapper table thead,
	.editor-styles-wrapper table {
		border-top-color: <?php echo $st_table_bordercolor; ?>!important;
		border-right-color: <?php echo $st_table_bordercolor; ?>!important;
		border-left: none!important;
		border-bottom: none!important;
	}

	.editor-styles-wrapper .is-style-st-table-line table td,
	.editor-styles-wrapper .is-style-st-table-line-2 table td,
	.editor-styles-wrapper .is-style-st-table-line table th,
	.editor-styles-wrapper .is-style-st-table-line-2 table th,
	.editor-styles-wrapper table thead th,
	.editor-styles-wrapper table thead td,
	.editor-styles-wrapper table tr th,
	.editor-styles-wrapper table tr td {
		border-bottom-color: <?php echo $st_table_bordercolor; ?>!important;
		border-left-color: <?php echo $st_table_bordercolor; ?>!important;
		border-top: none!important;
		border-right: none!important;
	}
<?php endif; ?>

/* ラインなし */
.editor-styles-wrapper .is-style-st-table-no-line table,
.editor-styles-wrapper .is-style-st-table-no-line thead,
.editor-styles-wrapper .is-style-st-table-no-line thead th,
.editor-styles-wrapper .is-style-st-table-no-line thead td,
.editor-styles-wrapper .is-style-st-table-no-line table tr th,
.editor-styles-wrapper .is-style-st-table-no-line table tr td {
	border: 0 !important;
}

<?php if($st_table_cell_bgcolor): ?>
/*偶数行のセル*/
.editor-styles-wrapper table tr:nth-child(even) {
	background-color: <?php echo $st_table_cell_bgcolor; ?>;
}
<?php endif; ?>

/* Gutenberg管理画面側ではヘッダーセクションが未設定でもtheadが出力される */
:root .editor-styles-wrapper table thead:has(> tr) + tbody tr:first-child td,
:root .editor-styles-wrapper table thead:has(> tr) + tbody tr:first-child th {
	background-color:transparent;
	color: inherit;
	font-weight: normal;
}

/*縦一行目のセル*/
.editor-styles-wrapper .wp-block-table table thead:has(> tr) tbody tr:first-child td:first-child,
.editor-styles-wrapper .wp-block-table table thead:has(> tr) + tbody tr:first-child td:first-child,
.editor-styles-wrapper table thead:has(> tr) + tbody tr:first-child td:first-child,
.editor-styles-wrapper .wp-block-table table thead:has(> tr) tbody tr:first-child td:first-child,
.editor-styles-wrapper .wp-block-table table thead:has(> tr) tbody tr:first-child td,

.editor-styles-wrapper .wp-block-table table tr:first-child td:first-child,
.editor-styles-wrapper table tr td:first-child,
.editor-styles-wrapper .wp-block-table table thead + tbody tr:first-child td:first-child,
.editor-styles-wrapper table thead + tbody tr:first-child td:first-child,
.editor-styles-wrapper table thead + tbody tr:first-child .editor-styles-wrapper td:first-child,
.editor-styles-wrapper table thead + tbody tr td:first-child {
	<?php if($st_table_td_bgcolor): ?>
		background-color: <?php echo $st_table_td_bgcolor; ?>;
	<?php endif; ?>
	<?php if($st_table_td_textcolor): ?>
		color: <?php echo $st_table_td_textcolor; ?>;
	<?php endif; ?>
	<?php if($st_table_td_bold): ?>
		font-weight:bold;
	<?php endif; ?>
}

.editor-styles-wrapper .is-style-st-table-line-2 table thead:has(> tr) + tbody tr:first-child td:first-child,
.editor-styles-wrapper .is-style-st-table-line-2 tr td:first-child {
	background: #fafafa;
}

.editor-styles-wrapper .is-style-st-table-line-2 table thead:has(> tr) + tbody tr:first-child td:first-child,
.editor-styles-wrapper .is-style-st-table-line-2 tr td:first-child {
	<?php if($st_table_td_bgcolor): ?>
		background-color: <?php echo $st_table_td_bgcolor; ?>;
	<?php endif; ?>
}

<?php if($st_table_tr_all): //ヘッダーセクション以外の横一列目にも反映する ?>
	/* 縦一列の設定より優先させる */
.editor-styles-wrapper .wp-block-table table tbody tr:first-child td:first-child,
.editor-styles-wrapper .wp-block-table table thead + tbody tr:first-child td:first-child,
.editor-styles-wrapper table thead + tbody tr:first-child td:first-child,
.editor-styles-wrapper table thead + tbody tr:first-child .editor-styles-wrapper td:first-child,
	/*横一行目のセル及びヘッダセル*/
	.editor-styles-wrapper .wp-block-table table tbody tr:first-child td:first-child,
	.editor-styles-wrapper .wp-block-table table tbody tr:first-child td,
	.editor-styles-wrapper .wp-block-table table tbody tr:first-child th,
	.editor-styles-wrapper table tbody tr:first-child td:first-child,
	.editor-styles-wrapper table tbody tr:first-child td,
	.editor-styles-wrapper table tbody tr:first-child th {
		<?php if($st_table_tr_bgcolor): ?>
			background-color: <?php echo $st_table_tr_bgcolor; ?>;
		<?php endif; ?>
		<?php if($st_table_tr_textcolor): ?>
			color: <?php echo $st_table_tr_textcolor; ?>;
		<?php endif; ?>
		<?php if($st_table_tr_bold): ?>
			font-weight:bold;
		<?php endif; ?>
	}

	/*横一行目のセル及びヘッダセル*/
	.editor-styles-wrapper .wp-block-table table tbody tr:first-child td:first-child,
	.editor-styles-wrapper .wp-block-table table tbody tr:first-child td,
	.editor-styles-wrapper .wp-block-table table tbody tr:first-child th,
	.editor-styles-wrapper table tbody tr:first-child td:first-child,
	.editor-styles-wrapper table tbody tr:first-child td,
	.editor-styles-wrapper table tbody tr:first-child th {
		<?php if($st_table_tr_bgcolor): ?>
			background-color: <?php echo $st_table_tr_bgcolor; ?>;
		<?php endif; ?>
		<?php if($st_table_tr_textcolor): ?>
			color: <?php echo $st_table_tr_textcolor; ?>;
		<?php endif; ?>
		<?php if($st_table_tr_bold): ?>
			font-weight: bold;
		<?php else: ?>
			font-weight: normal;
		<?php endif; ?>
	}
<?php endif; ?>

/* ヘッダーセクション */
.editor-styles-wrapper #wp-calendar:not(.has-background) thead tr th,
.editor-styles-wrapper table thead tr th,
.editor-styles-wrapper table thead tr:first-child th {
	<?php if($st_table_tr_bgcolor): ?>
		background-color: <?php echo $st_table_tr_bgcolor; ?>;
	<?php endif; ?>
	<?php if($st_table_tr_textcolor): ?>
		color: <?php echo $st_table_tr_textcolor; ?>;
	<?php endif; ?>
	<?php if($st_table_tr_bold): ?>
		font-weight: bold;
	<?php else: ?>
		font-weight: normal;
	<?php endif; ?>
}

<?php if ( isset ( $GLOBALS[ "stdata240" ] ) && $GLOBALS[ "stdata240" ] === 'yes' ): ?>

	/*こんな方におすすめ*/
	<?php if ( $st_blackboard_bgcolor ): //背景色 ?>
		.editor-styles-wrapper .st-blackboard {
			background: <?php echo $st_blackboard_bgcolor; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_blackboard_underbordercolor ): //ulリストのチェックアイコン ?>
		.editor-styles-wrapper .st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
			color:<?php echo $st_blackboard_underbordercolor; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_blackboard_bordercolor ): //ulリストの下線とテキスト ?>
		.editor-styles-wrapper .st-blackboard .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li,
		.editor-styles-wrapper .st-blackboard .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li:last-child {
			border-color:<?php echo $st_blackboard_bordercolor; ?>;
			color:<?php echo $st_blackboard_bordercolor; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_blackboard_mokuzicolor ): //タイトル色 ?>
	.editor-styles-wrapper  .st-blackboard-title {
			color: <?php echo $st_blackboard_mokuzicolor; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_blackboard_title_bgcolor ): //タイトル背景色 ?>
		.editor-styles-wrapper .st-blackboard-title {
			background: <?php echo $st_blackboard_title_bgcolor; ?>;
			padding: 10px 15px 5px;
		}
	<?php endif; ?>

	<?php if ( $st_blackboard_textcolor ): //枠線 ?>
		.editor-styles-wrapper .st-blackboard,
		.editor-styles-wrapper .st-blackboard-title {
			border-color: <?php echo $st_blackboard_textcolor; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_blackboard_list3_fontweight ): //タイトル下線を非表示 ?>
		.editor-styles-wrapper .st-blackboard-title {
			border: none;
		}
	<?php endif; ?>

	<?php if ( $st_blackboard_webicon ): //Webアイコン（Font Awesome） ?>
		.editor-styles-wrapper .st-blackboard-title::before {
			content: "<?php echo $st_blackboard_webicon; ?>0a0";
			font-family: stsvg;
		}
	<?php endif; ?>

	/*マル数字olタグ*/
	<?php if ( $st_maruno_bordercolor ): ?>
		.editor-styles-wrapper .mce-content-body .maruno {
			border:2px solid <?php echo $st_maruno_bordercolor; ?>;
			padding: 20px;
			<?php if ( $st_maruno_radius ): ?>
				border-radius: 5px;
			<?php endif; ?>
		}

		.editor-styles-wrapper .mce-content-body .maruno > ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
		.editor-styles-wrapper .mce-content-body .maruno > ol:last-child {
			padding-bottom: 0;
			margin-bottom: 0;
		}
	<?php endif; ?>

	<?php if ( $st_maruno_bgcolor ): ?>
		.editor-styles-wrapper .mce-content-body .maruno {
			background-color:<?php echo $st_maruno_bgcolor; ?>;
			padding: 20px;
			<?php if ( $st_maruno_radius ): ?>
				border-radius: 5px;
			<?php endif; ?>
		}

		.editor-styles-wrapper .mce-content-body .maruno > ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
		.editor-styles-wrapper .mce-content-body .maruno > ol:last-child {
			padding-bottom: 0;
			margin-bottom: 0;
		}
	<?php endif; ?>

	.editor-styles-wrapper .is-style-st-maruno > li::before,
	.editor-styles-wrapper .maruno li::before {
		<?php if ( $st_maruno_nobgcolor ): ?>
			background: <?php echo $st_maruno_nobgcolor; ?>;
		<?php endif; ?>
		<?php if ( $st_maruno_textcolor ): ?>
			color:<?php echo $st_maruno_textcolor; ?>;
		<?php endif; ?>
	}

	<?php if ( $st_maruno_nobgcolor ): ?>
		/* 四角背景 */
		.editor-styles-wrapper .is-style-st-no > li::before,
		.editor-styles-wrapper .is-style-st-no-border > li::before,
		.editor-styles-wrapper .st-list-no:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
			background-color: <?php echo $st_maruno_nobgcolor; ?>;
		}
	<?php endif; ?>

	/*チェックulタグ*/
	<?php if ( $st_maruck_bordercolor ): ?>
		.editor-styles-wrapper .mce-content-body .maruck {
			border:2px solid <?php echo $st_maruck_bordercolor; ?>;
			padding: 20px;
			<?php if ( $st_maruck_radius ): ?>
				border-radius: 5px;
			<?php endif; ?>
		}

		.editor-styles-wrapper .mce-content-body .maruck > ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
		.editor-styles-wrapper .mce-content-body .maruck > ol:last-child {
			padding-bottom: 0;
			margin-bottom: 0;
		}
	<?php endif; ?>

	<?php if ( $st_maruck_bgcolor ): ?>
		.editor-styles-wrapper .mce-content-body .maruck {
			background-color:<?php echo $st_maruck_bgcolor; ?>;
			padding: 20px;
			<?php if ( $st_maruck_radius ): ?>
				border-radius: 5px;
			<?php endif; ?>
		}

		.editor-styles-wrapper .mce-content-body .maruck > ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
		.editor-styles-wrapper .mce-content-body .maruck > ol:last-child {
			padding-bottom: 0;
			margin-bottom: 0;
		}
	<?php endif; ?>

	.editor-styles-wrapper .is-style-st-maruck > li::before,
	.editor-styles-wrapper .maruck li::before {
		<?php if ( $st_maruck_nobgcolor ): ?>
			background: <?php echo $st_maruck_nobgcolor; ?>;
		<?php endif; ?>
		<?php if ( $st_maruck_textcolor ): ?>
			color:<?php echo $st_maruck_textcolor; ?>;
		<?php endif; ?>
	}

	<?php if ( $st_maruck_nobgcolor ): ?>
		/* マル */
		.editor-styles-wrapper .is-style-st-circle > li::before,
		.editor-styles-wrapper .is-style-st-circle-border > li::before,
		.editor-styles-wrapper .st-list-circle:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
			background-color: <?php echo $st_maruck_nobgcolor; ?>;
		}
	<?php endif; ?>

	/* マル・バツ */
	<?php if ( $st_correct_list ): ?>
		.is-style-st-correct-list > li::before {
			color: <?php echo $st_correct_list; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_webicon_checkbox_simple ): // チェックデザインをシンプルにする ?>
		.editor-styles-wrapper .st-blackboard.square-checkbox .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before,
		.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li::before,
		.editor-styles-wrapper .is-style-st-square-checkbox > li::before,
		.editor-styles-wrapper .st-square-checkbox li::before {
			position: absolute;
			top: 0;
			left: .3em;
			content: "\f00c";
			font-family: stsvg;
			<?php if ( $st_webicon_checkbox ): ?>
				color:<?php echo $st_webicon_checkbox; ?>;
			<?php else: ?>
				color: #ff0000;
			<?php endif;  ?>
		}
		.editor-styles-wrapper .st-blackboard.square-checkbox li::after,
		.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li::after,
		.editor-styles-wrapper .is-style-st-square-checkbox > li::after,
		.editor-styles-wrapper .st-square-checkbox li::after {
			content: none;
		}

		/* こんな方におすすめ */
		.editor-styles-wrapper .st-blackboard.square-checkbox li::after {
			display: none;
		}
	<?php else: ?>
		.editor-styles-wrapper .st-blackboard.square-checkbox .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before,
		.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li::before,
		.editor-styles-wrapper .is-style-st-square-checkbox > li::before,
		.editor-styles-wrapper .st-square-checkbox ul li::before, /* チェックボックス（番号なしリスト）Classic */
		.editor-styles-wrapper .st-square-checkbox li::before {
			position: absolute;
			top: .25em;
			left: .65em;
			content: "\f00c";
			font-family: stsvg;
			<?php if($st_webicon_checkbox): ?>
				color:<?php echo $st_webicon_checkbox; ?>;
			<?php else: ?>
				color:#ff0000;
			<?php endif;  ?>
			z-index: 2;
			line-height: 1.5;
		}

		.editor-styles-wrapper .st-blackboard.square-checkbox li::after,
		.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li::after,
		.editor-styles-wrapper .is-style-st-square-checkbox > li::after,
		.editor-styles-wrapper .st-square-checkbox ul li::after, /* チェックボックス（番号なしリスト）Classic */
		.editor-styles-wrapper .st-square-checkbox li::after {
			content: "\e904";
			font-family: stsvg;
			<?php if ( $st_webicon_checkbox_square ): ?>
				color: <?php echo $st_webicon_checkbox_square; ?>;
			<?php else: ?>
				color:#ccc;
			<?php endif; ?>
			position:absolute;
			z-index:1;
			left: .25em;
			top: 0;
			font-size:150%;
			line-height:1.5;
		}
	<?php endif;  ?>

	/*Webアイコン*/
	<?php if ( $st_webicon_question ): ?>
		:root .editor-styles-wrapper [class*=" is-style-st-heading-"].has-st-icon-question-circle:not(.has-text-color)::before,
		.editor-styles-wrapper .hatenamark2.on-color:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .st-svg-question-circle:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			color: <?php echo $st_webicon_question; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_webicon_check ): ?>
		:root .editor-styles-wrapper [class*=" is-style-st-heading-"].has-st-icon-check:not(.has-text-color)::before,
		.editor-styles-wrapper .checkmark2.on-color:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .st-svg-check-circle:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			color: <?php echo $st_webicon_check; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_webicon_checkbox ): ?>
		.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li::before,
		.editor-styles-wrapper .is-style-st-square-checkbox > li::before,
		.editor-styles-wrapper .st-blackboard.square-checkbox .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before,
		.editor-styles-wrapper .st-square-checkbox li::before {
			color: <?php echo $st_webicon_checkbox; ?>;
		}
		/* 簡易チェックマーク */
		.editor-styles-wrapper .is-style-st-check > li::before,
		.editor-styles-wrapper .is-style-st-check-border > li::before,
		.editor-styles-wrapper .st-list-check:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
			border-color: <?php echo $st_webicon_checkbox; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_webicon_checkbox_square ): ?>
		.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li::after,
		.editor-styles-wrapper .is-style-st-square-checkbox > li::after,
		.editor-styles-wrapper .st-blackboard.square-checkbox li::after,
		.editor-styles-wrapper .st-square-checkbox li::after {
			color: <?php echo $st_webicon_checkbox_square; ?>;
		}
		/* 簡易チェックマーク */
		.editor-styles-wrapper .is-style-st-check > li::after,
		.editor-styles-wrapper .is-style-st-check-border > li::after,
		.editor-styles-wrapper .st-list-check:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::after {
			border-color: <?php echo $st_webicon_checkbox_square; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_webicon_checkbox_simple && $st_webicon_checkbox_size ): // チェックサイズ（%）※微調整用 ?>
		.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li::before,
		.editor-styles-wrapper .is-style-st-square-checkbox > li::before,
		.editor-styles-wrapper .st-blackboard.square-checkbox .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) > li::before,
		.st-blackboard.square-checkbox li::after,
		.editor-styles-wrapper .st-square-checkbox li::before,
		.editor-styles-wrapper .st-square-checkbox li::after {
			font-size: <?php echo $st_webicon_checkbox_size; ?>%;
		}

		/* チェックサイズに応じて高さ位置を調整 */
		<?php if( $st_webicon_checkbox_simple ): // チェックデザインをシンプルにする ?>
			.editor-styles-wrapper .st-blackboard.square-checkbox ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before,
			.editor-styles-wrapper .is-style-st-square-checkbox-no-border > li::before,
			.editor-styles-wrapper .is-style-st-square-checkbox > li::before,
			.editor-styles-wrapper .st-square-checkbox ul li::before, /* チェックボックス（番号なしリスト）Classic */
			.editor-styles-wrapper .st-square-checkbox li::before {
				<?php if ( $st_webicon_checkbox_size <= 100 ): ?>
					top: .3em;
				<?php elseif ( $st_webicon_checkbox_size <= 120 ): ?>
					top: .1em;
				<?php else: ?>
					top: 0;
				<?php endif; ?>
			}
			.editor-styles-wrapper .is-style-st-square-checkbox-no-border.st-list-underline > li::before {
				top: calc( .1em + 5px );
			}
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( $st_webicon_exclamation ): ?>
		.editor-styles-wrapper .attentionmark2.on-color:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .st-svg-exclamation-triangle:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			color: <?php echo $st_webicon_exclamation; ?>;
	}
	<?php endif; ?>

	<?php if ( $st_webicon_memo ): ?>
		.editor-styles-wrapper .memomark2.on-color:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .st-svg-pencil-square-o:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			color: <?php echo $st_webicon_memo; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_webicon_user ): ?>
		.editor-styles-wrapper .usermark2.on-color::before,
		.editor-styles-wrapper .st-svg-user:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			color: <?php echo $st_webicon_user; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_webicon_oukan ): ?>
		.editor-styles-wrapper .oukanmark.on-color::before,
		.editor-styles-wrapper .st-svg-oukan:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			color: <?php echo $st_webicon_oukan; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_webicon_bigginer ): ?>
		.editor-styles-wrapper .bigginermark.on-color::before,
		.editor-styles-wrapper .st-svg-bigginer_l:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			color: <?php echo $st_webicon_bigginer; ?>;
		}
	<?php endif; ?>

	/* h2 */

	<?php if ( $st_h2_no_css ): //カスタマイザーのCSSを無効化
	else: ?>

	<?php if ( $st_h2_gradient ): //グラデーションを横向きにする
			$h2_gradient_w = 'left';
			$h2_gradient = 'left';
		else :
			$h2_gradient_w = 'top';
			$h2_gradient = 'bottom';
		endif;
	?>

	<?php if ( $st_h2_bg_radius ): //h2 ?>
		/* 角丸 */
		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper .h2modoki span,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span {
			border-radius: 5px;
		}
		<?php if ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'leftlinedesign' ): //左ラインのみ ?>
			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				border-radius: 3px;
			}
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'linedesign' ): //左ラインデザイン ?>
		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			position: relative;
			padding: 1em 1em 1em 1.3em;

			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>

			border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
			<?php if ( $st_h2_color ): ?>
				color: <?php echo $st_h2_color; ?>;
			<?php endif; ?>
			<?php if ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) !== '' ): ?>
				/*Other Browser*/
				background: <?php echo $st_h2_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome26+ */
				background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
			<?php elseif ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) === '' ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_h2_bgimg; ?>");
				background-color: <?php echo $st_h2_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
				<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
					background: url("<?php echo $st_h2_bgimg; ?>");
				<?php else: ?>
					background: none;
				<?php endif; ?>
			<?php endif; ?>
		}

		<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
				<?php if ( $st_h2_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
		<?php endif; ?>
		.editor-styles-wrapper .h2modoki::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			position: absolute;
			top: .5em;
			left: .5em;
			content: '';
			width: <?php print $st_h2_border_size ? $st_h2_border_size : 5; ?>px;
			height: -webkit-calc(100% - 1em);
			height: calc(100% - 1em);
			<?php if ( $st_h2border_undercolor ): //ボーダーカラー ?>
				background-color: <?php echo $st_h2border_undercolor; ?>;
			<?php else: ?>
				background-color: <?php echo $st_h2border_color; ?>;
			<?php endif; ?>

		}

	<?php elseif ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'stripe_design' ): //ストライプ ?>
		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			<?php if ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) !== '' ): ?>
				background: -webkit-repeating-linear-gradient(45deg, <?php echo $st_h2_bgcolor; ?>, <?php echo $st_h2_bgcolor; ?> 5px, <?php echo $st_h2_bgcolor_t; ?> 5px, <?php echo $st_h2_bgcolor_t; ?> 10px);
				background: repeating-linear-gradient(45deg, <?php echo $st_h2_bgcolor; ?>, <?php echo $st_h2_bgcolor; ?> 5px, <?php echo $st_h2_bgcolor_t; ?> 5px, <?php echo $st_h2_bgcolor_t; ?> 10px);
			<?php elseif ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) === '' ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_h2_bgimg; ?>");
				background-color: <?php echo $st_h2_bgcolor; ?>;
			<?php else: ?>

			<?php endif; ?>

			<?php if ( $st_h2_color ): ?>
				color: <?php echo $st_h2_color; ?>;
			<?php endif; ?>
			<?php if($st_h2border_color): //ボーダーカラー ?>
				<?php if($st_h2_border_tb): //ボーダーを上下のみにする ?>
					border-top: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
					border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
				<?php else: ?>
					border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
				<?php endif;  ?>
			<?php else: ?>
				border: none;
			<?php endif;  ?>

			<?php if( $st_h2_border_tb_sub ): //ボーダー下をサブカラーにする ?>
				<?php if( $st_h2border_undercolor ): //サブカラー ?>
					border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_undercolor; ?>;
				<?php else: ?>
					border-bottom: none;
				<?php endif;  ?>
			<?php endif;  ?>

			<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>
		}

		.editor-styles-wrapper .h2modoki::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .h2modoki::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			content: none;
		}

	<?php elseif ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'gradient_underlinedesign' ): //グラデーションアンダーライン ?>
		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			position: relative;
			padding-left: 0;
			padding-bottom: 10px;
			border-top: none;
			<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>
					color: <?php echo $st_h2_color; ?>;
					background-color: transparent;
		}
		.editor-styles-wrapper .h2modoki::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			position: absolute;
			bottom: -<?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
			left: 0;
			top: inherit;
			z-index: 2;
			content: '';
			width: 100%;
			height: <?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
			<?php if ( trim( $st_h2border_color ) !== '' && trim( $st_h2border_undercolor ) !== '' ): ?>
				/*Other Browser*/
				background: <?php echo $st_h2border_color; ?>;
				/* Android4.1 - 4.3 */
				background: -webkit-linear-gradient(left,  <?php echo $st_h2border_undercolor; ?> 0%,<?php echo $st_h2border_color; ?> 100%);

				/* IE10+, FF16+, Chrome26+ */
				background: linear-gradient(to left,  <?php echo $st_h2border_undercolor; ?> 0%,<?php echo $st_h2border_color; ?> 100%);
			<?php elseif ( trim( $st_h2border_color ) !== '' && trim( $st_h2border_undercolor ) === '' ): //下部には色がある場合 ?>
				background-color: <?php echo $st_h2border_color; ?>;
			<?php endif; ?>
			border: none;
		}

		.editor-styles-wrapper .h2modoki::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			content: none;
		}

		<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				background-image: url("<?php echo $st_h2_bgimg; ?>");
				background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
				<?php if ( $st_h2_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
		<?php endif; ?>

	<?php elseif ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'underlinedesign' ): //2色アンダーライン ?>
		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			position: relative;
			padding-left: 0;
			padding-bottom: 10px;
			border-top: none;
			border-bottom-width: <?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
			border-bottom-style: solid;
			<?php if ( $st_h2border_undercolor ): //下線基本ボーダー色 ?>
				border-bottom-color: <?php echo $st_h2border_undercolor; ?>;
			<?php else: ?>
				border-bottom-color: transparent;
			<?php endif; ?>
			<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>
			<?php if ( $st_h2_color ): ?>
				color: <?php echo $st_h2_color; ?>;
			<?php endif; ?>
			background-color: transparent;
		}
		.editor-styles-wrapper .h2modoki::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			position: absolute;
			bottom: -<?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
			left: 0;
			top: inherit;
			border-top: none;
			z-index: 2;
			content: '';
			width: 5em;
			height: <?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
			<?php if ( $st_h2border_color ): //ボーダーカラー ?>
						background-color: <?php echo $st_h2border_color; ?>;
			<?php endif; ?>
		}

		:root .editor-styles-wrapper h2::before,
		:root .editor-styles-wrapper h2modoki::before {
			content: none;
		}

		<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				background-image: url("<?php echo $st_h2_bgimg; ?>");
				background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
				<?php if ( $st_h2_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
		<?php endif; ?>

	<?php elseif ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'centerlinedesign' ): ?>
		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			overflow: hidden;
			text-align: center;
			border-top: none;
			border-bottom: none;
			padding-left: 20px;
			padding-right: 20px;

			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>
			<?php if ( $st_h2_color ): ?>
				color: <?php echo $st_h2_color; ?>;
			<?php endif; ?>
			background-color: transparent;
		}
		.editor-styles-wrapper .h2modoki span,
		.editor-styles-wrapper h2:where(:not(.st-css-no)) span:not(.st-emoji) {
			position: relative;
			display: inline-block;
			margin: 0 10px;
			padding: 0 20px;
			text-align: left;
		}
		@media only screen and (max-width: 599px) {
			.editor-styles-wrapper .h2modoki span,
			.editor-styles-wrapper h2:where(:not(.st-css-no)) span:not(.st-emoji) {
				padding: 0 10px;
			}
		}
		.editor-styles-wrapper .h2modoki span.st-dash-design::before,
		.editor-styles-wrapper .h2modoki span.st-dash-design::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::after {
			position: absolute;
			top: 50%;
			content: '';
			width: 1000%;
			height: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px;
			background-color: <?php echo $st_h2border_color; ?>;
		}
		.editor-styles-wrapper .h2modoki span.st-dash-design::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::before {
			right: 100%;
		}
		.editor-styles-wrapper .h2modoki span.st-dash-design::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::after {
			left: 100%;
		}

		/* hタグ用 キャッチコピー */
		.editor-styles-wrapper .st-dash-design,
		.editor-styles-wrapper .st-dash-design .st-h-copy-toc,
		.editor-styles-wrapper .st-dash-design .st-h-copy {
			text-align: center;
		}

	<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'shortlinedesign') ): ?>

		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			position: relative;
			padding-left: 0;
			padding-right: 0;
			border:none;
			<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			<?php else: ?>
				padding-bottom: 20px;
			<?php endif;  ?>
			<?php if ( $st_h2_color ): ?>
				color: <?php echo $st_h2_color; ?>;
			<?php endif; ?>
			background-color:transparent;
		}

		<?php if ( $st_h2border_color ): // ボーダー色あり ?>
			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				position: absolute;
				content: '';
				width: 3em;
				height: <?php print $st_h2_border_size ? $st_h2_border_size : 2; ?>px;
				background-color: <?php echo $st_h2border_color; ?>;
				top: inherit;
				right: inherit;
				left: 0;
				bottom: 0;
				border: none;
			}
		<?php endif; ?>

		<?php if ( $st_h2border_undercolor && $st_h2border_color ): // ボーダー色（サブ）あり ?>
			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				position: absolute;
				content: '';
				width: 3em;
				height: <?php print $st_h2_border_size ? $st_h2_border_size : 2; ?>px;
				/*Other Browser*/
				background: <?php echo $st_h2_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: -webkit-linear-gradient(left,  <?php echo $st_h2border_undercolor; ?> 0%,<?php echo $st_h2border_color; ?> 100%);

				/* IE10+, FF16+, Chrome26+ */
				background: linear-gradient(to left,  <?php echo $st_h2border_undercolor; ?> 0%,<?php echo $st_h2border_color; ?> 100%);
				top: inherit;
				right: inherit;
				left: 0;
				bottom: 0;
				border: none;
			}
		<?php endif; ?>

		<?php if ( $st_h2_text_center ): // テキストを中央寄せ ?>
			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				text-align: center;
			}

			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
			.editor-styles-wrapper .h2modoki::after,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				left: calc(50% - 1.5em);
			}
		<?php endif; ?>

		.editor-styles-wrapper .h2modoki::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .h2modoki::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			border: none;
		}

	<?php elseif ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'dotdesign' ): ?>

		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			position: relative;
			<?php if ( $st_h2_bgimg_tupadding ): ?>
				padding: <?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php else: ?>
				padding: 5px;
			<?php endif; ?>
			border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
					color: <?php echo $st_h2_color; ?>;
					<?php if ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) !== '' ): ?>
						/*Other Browser*/
						background: <?php echo $st_h2_bgcolor; ?>;
						/* Android4.1 - 4.3 */
						background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

						/* IE10+, FF16+, Chrome26+ */
						background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
					<?php elseif ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) === '' ): //下部には色がある場合 ?>
						background-image: url("<?php echo $st_h2_bgimg; ?>");
						background-color: <?php echo $st_h2_bgcolor; ?>;
					<?php else: ?>
						background-color: transparent;
						<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
							background: url("<?php echo $st_h2_bgimg; ?>");
						<?php else: ?>
							background: none;
						<?php endif; ?>
					<?php endif; ?>
		}

		<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
				<?php if ( $st_h2_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
		<?php endif; ?>

		.editor-styles-wrapper .h2modoki span.st-dash-design,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design {
			display: block;
			<?php if ( $st_h2_bgimg_tupadding ): ?>
				padding: <?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php else: ?>
				padding: 10px;
			<?php endif; ?>
			<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h2border_undercolor ): //ドットカラー ?>
				border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px dashed <?php echo $st_h2border_undercolor; ?>;
			<?php else: ?>
				border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px dashed <?php echo $st_h2border_color; ?>;
			<?php endif; ?>
		}

				<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
				.editor-styles-wrapper .h2modoki,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
					<?php if ( $st_h2_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
				<?php endif; ?>

		.editor-styles-wrapper .h2modoki::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .h2modoki::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			content: none;
		}

	<?php elseif ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'leftlinedesign' ): //左ラインのみ ?>

		.editor-styles-wrapper .h2modoki::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			position: absolute;
			content: ''!important;
			width: <?php print $st_h2_border_size ? $st_h2_border_size : 6; ?>px;
			height: 100%;
			<?php if ( $st_h2border_undercolor && $st_h2border_color ): // ボーダー色（サブ）あり ?>
				/*Other Browser*/
				/* Android4.1 - 4.3 */
				background: -webkit-linear-gradient(top,  <?php echo $st_h2border_color; ?> 0%,<?php echo $st_h2border_undercolor; ?> 100%);
			<?php elseif ( ! $st_h2border_undercolor && $st_h2border_color ): ?>
				background: <?php echo $st_h2border_color; ?>;
			<?php endif; ?>
			left: 0;
			bottom: 0;
		}

		.editor-styles-wrapper .h2modoki::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .h2modoki::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			border: none;
		}

		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			position: relative;
			padding-left: 20px;
			border: none;
			<?php if ( $st_h2_color ): ?>
				color: <?php echo $st_h2_color; ?>;
			<?php endif; ?>
			<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>


			<?php if ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) !== '' ): ?>
				/*Other Browser*/
				background: <?php echo $st_h2_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome36+ */
				background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
			<?php elseif ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) === '' ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_h2_bgimg; ?>");
				background-color: <?php echo $st_h2_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
				<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
					background: url("<?php echo $st_h2_bgimg; ?>");
				<?php else: ?>
					background: none;
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
				background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
				<?php if ( $st_h2_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			<?php endif; ?>
		}

	<?php elseif (
		( $st_is_ex_af ) // テーマ分岐
		&& ( trim( $st_h2_designsetting ) !== '' )
		&& ( $st_h2_designsetting === 'checkboxdesign' ) // チェックボックスデザイン
		): ?>

		<?php if ( $st_webicon_checkbox_simple ): // チェックボックスのデザインをチェックのみにする ?>

			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				position: relative;
				display: block;
				line-height: 1.5;
				margin-bottom: 20px;
				padding-bottom: 0.5em;
				padding-left: calc(1.5em + 25px)!important;
				<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
					padding-left: calc(1.5em + 25px + <?php echo $st_h2_bgimg_leftpadding; ?>px)!important;
				<?php endif;  ?>
				<?php if ( $st_h2_color ): ?>
					color: <?php echo $st_h2_color; ?>;
				<?php endif; ?>
				<?php if ( $st_h2border_color ): //ボーダーがあるかどうか ?>
					border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
				<?php else: ?>
					border-bottom: none;
				<?php endif; ?>
				<?php if( $st_h2_border_tb_sub ): //ボーダー下をサブカラーにする ?>
					<?php if( $st_h2border_undercolor ): //サブカラー ?>
						border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_undercolor; ?>;
					<?php else: ?>
						border-bottom: none;
					<?php endif;  ?>
				<?php endif;  ?>
				border-top: none;
				<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
					padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) !== '' ): ?>
					/*Other Browser*/
					background: <?php echo $st_h2_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
					background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
				<?php elseif ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) === '' ): //下部には色がある場合 ?>
					background-image: url("<?php echo $st_h2_bgimg; ?>");
					background-color: <?php echo $st_h2_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
					<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
						background: url("<?php echo $st_h2_bgimg; ?>");
					<?php else: ?>
						background: none;
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
					background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
					<?php if ( $st_h2_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				position: absolute;
				top: calc(50% - .75em)!important;
				left: 10px;
				content: "\f00c";
				font-family: stsvg;
				<?php if ( $st_h2border_color && $st_h2border_undercolor ): //ボーダー色 + ボーダー色（サブ）があるかどうか ?>
					background: linear-gradient( to right,  <?php echo $st_h2border_color; ?> 25%, <?php echo $st_h2border_undercolor; ?> 75% );
					-webkit-background-clip: text;
					color: transparent!important;
				<?php elseif ( $st_h2border_undercolor ): //ボーダー色（サブ）があるかどうか ?>
					color: <?php echo $st_h2border_undercolor; ?>;
				<?php else: ?>
					color: #ff0000;
				<?php endif; ?>
				z-index: 2;
				margin-right: 15px;
				/*text-shadow: -1px -1px 0 rgba(255, 255, 255, 1), 1px -1px 0 rgba(255, 255, 255, 1), -1px 1px 0 rgba(255, 255, 255, 1), 1px 1px 0 rgba(255, 255, 255, 1);*/
				font-size: 130%;
				line-height: 1.5;
				font-weight: normal;
				bottom: 0;
				border-top: none;
				border-right: none;
				border-left: none;
			}

			.editor-styles-wrapper .h2modoki::after,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				content: none;
			}

		<?php else: ?>

			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				position: relative;
				display: block;
				line-height: 1.5;
				margin-bottom: 20px;
				padding-bottom: 0.5em;
				padding-left: calc(1.5em + 25px)!important;
				<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
					padding-left: calc(1.5em + 25px + <?php echo $st_h2_bgimg_leftpadding; ?>px)!important;
				<?php endif;  ?>
				<?php if ( $st_h2_color ): ?>
					color: <?php echo $st_h2_color; ?>;
				<?php endif; ?>
				<?php if ( $st_h2border_color ): //ボーダーがあるかどうか ?>
					border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
				<?php else: ?>
					border-bottom: none;
				<?php endif; ?>
				<?php if( $st_h2_border_tb_sub ): //ボーダー下をサブカラーにする ?>
					<?php if( $st_h2border_undercolor ): //サブカラー ?>
						border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_undercolor; ?>;
					<?php else: ?>
						border-bottom: none;
					<?php endif;  ?>
				<?php endif;  ?>
				border-top: none;
				<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
					padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) !== '' ): ?>
					/*Other Browser*/
					background: <?php echo $st_h2_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
					background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
				<?php elseif ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) === '' ): //下部には色がある場合 ?>
					background-image: url("<?php echo $st_h2_bgimg; ?>");
					background-color: <?php echo $st_h2_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
					<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
						background: url("<?php echo $st_h2_bgimg; ?>");
					<?php else: ?>
						background: none;
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
					background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
					<?php if ( $st_h2_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				position: absolute;
				top: calc(50% - .9em)!important;
				left: 20px;
				content: "\e907";
				font-family: stsvg;
				<?php if ( $st_h2border_undercolor ): //ボーダーがあるかどうか ?>
					color: <?php echo $st_h2border_undercolor; ?>;
				<?php else: ?>
					color: #ff0000;
				<?php endif; ?>
				z-index: 2;
				margin-right: 15px;
				/*text-shadow: -1px -1px 0 rgba(255, 255, 255, 1), 1px -1px 0 rgba(255, 255, 255, 1), -1px 1px 0 rgba(255, 255, 255, 1), 1px 1px 0 rgba(255, 255, 255, 1);*/
				font-size: 110%;
				line-height: 1.5;
				bottom: 0;
				border-top: none;
				border-right: none;
				border-left: none;
			}

			.editor-styles-wrapper .h2modoki::after,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				content: "\e904";
				font-family: stsvg;
				position: absolute;
				z-index: 1;
				left: 10px;
				right: inherit!important;
				top: calc(50% - .75em);
				font-size: 150%;
				line-height: 1.5;
				<?php if ( $st_h2border_color ): //ボーダーがあるかどうか ?>
					color: <?php echo $st_h2border_color; ?>;
				<?php else: ?>
					color: #ccc;
				<?php endif; ?>
				bottom: 0;
				border-top: none;
				border-right: none;
				border-left: none;
			}

		<?php endif; ?>

	<?php elseif ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'underdotdesign' ): ?>

		.editor-styles-wrapper .h2modoki,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			border: none;
			border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 2; ?>px dashed <?php echo $st_h2border_color; ?>;
			<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
			<?php else: ?>
				padding-left: 0;
			<?php endif; ?>
			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>
			<?php if ( $st_h2_color ): ?>
				color: <?php echo $st_h2_color; ?>;
			<?php endif; ?>
			<?php if ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) !== '' ): ?>
					/*Other Browser*/
					background: <?php echo $st_h2_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
					background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
				<?php elseif ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) === '' ): //下部には色がある場合 ?>
					background-image: url("<?php echo $st_h2_bgimg; ?>");
					background-color: <?php echo $st_h2_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
					<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
						background: url("<?php echo $st_h2_bgimg; ?>");
					<?php else: ?>
						background: none;
					<?php endif; ?>
				<?php endif; ?>
		}
				<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
					.editor-styles-wrapper .h2modoki,
					.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh2):not(#reply-title) {
						background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
						<?php if ( $st_h2_bgimg_repeat ): ?>
							background-repeat: no-repeat;
						<?php endif; ?>
					}
				<?php endif; ?>

		.editor-styles-wrapper .h2modoki::before,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.editor-styles-wrapper .h2modoki::after,
		.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			content: none;
		}

	<?php else: ?>

		<?php if ( trim( $st_h2_designsetting ) !== '' && $st_h2_designsetting === 'hukidasidesign' ): //吹き出しデザイン ?>
				.editor-styles-wrapper .h2modoki,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					<?php if ( $st_h2_bgcolor ): ?>
						background: <?php echo $st_h2_bgcolor; ?>;
					<?php endif; ?>
					<?php if ( $st_h2_color ): ?>
						color: <?php echo $st_h2_color; ?>;
					<?php endif; ?>
					position: relative;
					border: none;
					margin-bottom: 30px;
			<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
			<?php endif; ?>
				}

				.editor-styles-wrapper .h2modoki::after,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					content: none;
				}
				.editor-styles-wrapper .h2modoki::before,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					border-top: 10px solid <?php echo $st_h2_bgcolor; ?>;
					content: '';
					position: absolute;
					border-right: 10px solid transparent;
					border-left: 10px solid transparent;
					bottom: -10px;
					left: 30px;
				}

				<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
				.editor-styles-wrapper .h2modoki,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					background-image: url("<?php echo $st_h2_bgimg; ?>");
					background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
					<?php if ( $st_h2_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
				<?php endif; ?>

			<?php elseif (
				( $st_is_ex ) // テーマ分岐
				&& ( trim( $st_h2_designsetting) !== '' )
				&& ( $st_h2_designsetting === 'hukidasidesign_under' ) // 吹き出し下線デザイン
				): ?>

				.editor-styles-wrapper .h2modoki,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {

					position: relative;
					padding: 10px 5px;
					margin-bottom: 30px;
					border: none;

					<?php if ( $st_h2border_color ): //ボーダーがあるかどうか ?>
						border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px solid <?php echo $st_h2border_color; ?>;
					<?php else: ?>
						border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px solid #ccc;
					<?php endif; ?>

					<?php if ( $st_h2_bgcolor ): ?>
						background: <?php echo $st_h2_bgcolor; ?>;
					<?php else: ?>
						background: #fff;
					<?php endif; ?>

					<?php if ( $st_h2_color ): ?>
						color: <?php echo $st_h2_color; ?>;
					<?php endif; ?>

					<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
						padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
					<?php endif; ?>

					<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
						padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
						padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
					<?php endif; ?>
                <?php if ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_h2_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome26+ */
                    background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
                <?php elseif ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
                    background-image: url("<?php echo $st_h2_bgimg; ?>");
                    background-color: <?php echo $st_h2_bgcolor; ?>;
                <?php else: ?>
                    background-color: transparent;
                    <?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
                        background: url("<?php echo $st_h2_bgimg; ?>");
                    <?php else: ?>
                        background: none;
                    <?php endif; ?>
                <?php endif; ?>
			}

       		<?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
				.editor-styles-wrapper .h2modoki,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
					<?php if ( $st_h2_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
       		<?php endif;  ?>

				.editor-styles-wrapper .h2modoki::before,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
				.editor-styles-wrapper .h2modoki::after,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					position: absolute;
					width: 0;
					height: 0;
					border: solid transparent;
					content: "";
					border-top-width: 13px;
					border-right-width: 13px;
					border-bottom-width: 13px;
					border-left-width: 13px;
				}

				.editor-styles-wrapper .h2modoki::before,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					left: 50px;
					bottom: -28px;
					<?php if ( $st_h2border_color ): //ボーダーがあるかどうか ?>
						border-top-color: <?php echo $st_h2border_color; ?>;
						border-left-color: <?php echo $st_h2border_color; ?>;
					<?php else: ?>
						border-top-color: #ccc;
						border-left-color: #ccc;
					<?php endif; ?>
				}

				.editor-styles-wrapper .h2modoki::after,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					content: none;
				}

		<?php else: //吹き出しじゃないデザイン ?>

				.editor-styles-wrapper .h2modoki,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					<?php if ( $st_h2_color ): ?>
						color: <?php echo $st_h2_color; ?>;
					<?php endif; ?>
					<?php if ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) !== '' ): ?>
						/*Other Browser*/
						background: <?php echo $st_h2_bgcolor; ?>;
						/* Android4.1 - 4.3 */
						background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

						/* IE10+, FF16+, Chrome26+ */
						background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
					<?php elseif ( trim( $st_h2_bgcolor ) !== '' && trim( $st_h2_bgcolor_t ) === '' ): //下部には色がある場合 ?>
						background-image: url("<?php echo $st_h2_bgimg; ?>");
						background-color: <?php echo $st_h2_bgcolor; ?>;
					<?php else: ?>
						background-color: transparent;
						<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
							background: url("<?php echo $st_h2_bgimg; ?>");
						<?php else: ?>
							background: none;
						<?php endif; ?>
					<?php endif; ?>

					<?php if ( $st_h2border_color ): //ボーダーがあるかどうか ?>
						<?php if ( $st_h2_border_tb ): ?>
							border-top: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
							<?php if( $st_h2_border_tb_sub ): //ボーダー下をサブカラーにする ?>
								<?php if( $st_h2border_undercolor ): //サブカラー ?>
									border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_undercolor; ?>;
								<?php else: ?>
									border-bottom: none;
								<?php endif;  ?>
							<?php else: ?>
									border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
							<?php endif;  ?>
						<?php else: ?>
							border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
						<?php endif; ?>
					<?php else: ?>
						border: none;
					<?php endif; ?>

					<?php if( $st_h2_border_tb_sub ): //ボーダー下をサブカラーにする ?>
						<?php if( $st_h2border_undercolor ): //サブカラー ?>
							border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_undercolor; ?>;
						<?php else: ?>
							border-bottom: none;
						<?php endif;  ?>
					<?php endif;  ?>

					<?php if ( $st_h2_bgimg_leftpadding ): //左の余白 ?>
						padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px;
					<?php endif; ?>

					<?php if ( $st_h2_bgimg_tupadding ): //上下の余白 ?>
						padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px;
						padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px;
					<?php endif; ?>
				}

				<?php if ( $st_h2_bgimg ): //背景画像がある場合 ?>
					.editor-styles-wrapper .h2modoki,
					.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
						background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
						<?php if ( $st_h2_bgimg_repeat ): ?>
							background-repeat: no-repeat;
						<?php endif; ?>
					}
				<?php endif; ?>

				.editor-styles-wrapper .h2modoki::before,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
				.editor-styles-wrapper .h2modoki::after,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					content: none;
				}

			<?php endif; ?>

	<?php endif; //ラインデザインかどうか ?>

	<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

	/* h3 */
	<?php if ( $st_h3_no_css ): //カスタマイザーのCSSを無効化
	else: ?>

	<?php if ( $st_h3_gradient ): //グラデーションを横向きにする
			$h3_gradient_w = 'left';
			$h3_gradient = 'left';
		else :
			$h3_gradient_w = 'top';
			$h3_gradient = 'bottom';
		endif;
	?>

	<?php if ( $st_h3_bg_radius ): //h3 ?>
		/* 角丸 */
		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
			border-radius: 5px;
		}
		<?php if ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'leftlinedesign' ): //左ラインのみ ?>
			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before {
				border-radius: 3px;
			}
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'linedesign' ): //ラインデザイン ?>
		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
			position: relative;
			padding: 1em 1em 1em 1.4em;
			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>

			border: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
					<?php if ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) !== '' ): ?>
						/*Other Browser*/
						background: <?php echo $st_h3_bgcolor; ?>;
						/* Android4.1 - 4.3 */
						background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

						/* IE10+, FF16+, Chrome36+ */
						background: url("<?php echo $st_h3_bgimg; ?>"), linear-gradient(to <?php echo $h3_gradient; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
					<?php elseif ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) === '' ): //下部には色がある場合 ?>
						background-image: url("<?php echo $st_h3_bgimg; ?>");
						background-color: <?php echo $st_h3_bgcolor; ?>;
					<?php else: ?>
						background-color: transparent;
						<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
							background: url("<?php echo $st_h3_bgimg; ?>");
						<?php else: ?>
							background: none;
						<?php endif; ?>
					<?php endif; ?>
		}

		<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
				<?php if ( $st_h3_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
		<?php endif; ?>
		.editor-styles-wrapper .h3modoki::after,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
					position: absolute;
					top: .5em;
					left: .5em;
					content: '';
					width: <?php print $st_h3_border_size ? $st_h3_border_size : 5; ?>px;
					height: -webkit-calc(100% - 1em);
					height: calc(100% - 1em);
					<?php if ( $st_h3border_undercolor ): //ボーダーカラー ?>
						background-color: <?php echo $st_h3border_undercolor; ?>;
					<?php else: ?>
						background-color: <?php echo $st_h3border_color; ?>;
					<?php endif; ?>
		}

	<?php elseif ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'stripe_design' ): //ストライプ ?>
		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
			<?php if ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) !== '' ): ?>
				background: -webkit-repeating-linear-gradient(45deg, <?php echo $st_h3_bgcolor; ?>, <?php echo $st_h3_bgcolor; ?> 5px, <?php echo $st_h3_bgcolor_t; ?> 5px, <?php echo $st_h3_bgcolor_t; ?> 10px);
				background: repeating-linear-gradient(45deg, <?php echo $st_h3_bgcolor; ?>, <?php echo $st_h3_bgcolor; ?> 5px, <?php echo $st_h3_bgcolor_t; ?> 5px, <?php echo $st_h3_bgcolor_t; ?> 10px);
			<?php elseif ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) === '' ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_h3_bgimg; ?>");
				background-color: <?php echo $st_h3_bgcolor; ?>;
			<?php else: ?>

			<?php endif; ?>

			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
			<?php if($st_h3border_color): //ボーダーカラー ?>
				<?php if($st_h3_border_tb): //ボーダーを上下のみにする ?>
					border-top: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
					border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
				<?php else: ?>
					border: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
				<?php endif;  ?>
			<?php else: ?>
				border: none;
			<?php endif;  ?>

			<?php if( $st_h3_border_tb_sub ): //ボーダー下をサブカラーにする ?>
				<?php if( $st_h3border_undercolor ): //サブカラー ?>
					border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_undercolor; ?>;
				<?php else: ?>
					border-bottom: none;
				<?php endif;  ?>
			<?php endif;  ?>

			<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>
		}

		.editor-styles-wrapper .h3modoki::before,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before,
		.editor-styles-wrapper .h3modoki::after,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
			content: none;
		}

	<?php elseif ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'gradient_underlinedesign' ): //グラデーションアンダーライン ?>

		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
			position: relative;
			padding-left: 0;
			padding-bottom: 10px;
			border-top: none;
			<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
			background-color: transparent;
		}

		.editor-styles-wrapper .h3modoki::after,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
			position: absolute;
			bottom: -<?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
			left: 0;
			top: inherit;
			z-index: 2;
			content: '';
			width: 100%;
			height: <?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
			<?php if ( trim( $st_h3border_color ) !== '' && trim( $st_h3border_undercolor ) !== '' ): ?>
				/*Other Browser*/
				background: <?php echo $st_h3border_color; ?>;
				/* Android4.1 - 4.3 */
				background: -webkit-linear-gradient(left,  <?php echo $st_h3border_undercolor; ?> 0%,<?php echo $st_h3border_color; ?> 100%);

				/* IE10+, FF16+, Chrome26+ */
				background: linear-gradient(to left,  <?php echo $st_h3border_undercolor; ?> 0%,<?php echo $st_h3border_color; ?> 100%);
			<?php elseif ( trim( $st_h3border_color ) !== '' && trim( $st_h3border_undercolor ) === '' ): //下部には色がある場合 ?>
				background-color: <?php echo $st_h3border_color; ?>;
			<?php endif; ?>
		}

		<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				background-image: url("<?php echo $st_h3_bgimg; ?>");
				background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
				<?php if ( $st_h3_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
		<?php endif; ?>

	<?php elseif ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'underlinedesign' ): ?>

		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
			position: relative;
			padding-left: 0;
			padding-bottom: 10px;
			border-top: none;
			border-bottom-width: <?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
			border-bottom-style: solid;
			<?php if ( $st_h3border_undercolor ): //下線基本ボーダー色 ?>
				border-bottom-color: <?php echo $st_h3border_undercolor; ?>;
			<?php else: ?>
				border-bottom-color: transparent;
			<?php endif; ?>
			<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
			background-color: transparent;
		}

		.editor-styles-wrapper .h3modoki::after,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
			position: absolute;
			bottom: -<?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
			left: 0;
			top: inherit;
			border-top: none;
			z-index: 3;
			content: '';
			width: 5em;
			height: <?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
			<?php if ( $st_h3border_color ): //ボーダーカラー ?>
						background-color: <?php echo $st_h3border_color; ?>;
			<?php endif; ?>
		}

		:root .editor-styles-wrapper h3::before,
		:root .editor-styles-wrapper h3modoki::before {
			content: none;
		}

		<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				background-image: url("<?php echo $st_h3_bgimg; ?>");
				background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
				<?php if ( $st_h3_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
		<?php endif; ?>

	<?php elseif ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'centerlinedesign' ): ?>

		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
			overflow: hidden;
			text-align: center;
			border-top: none;
			border-bottom: none;
			padding-left: 20px;
			padding-right: 20px;

			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
					background-color: transparent;
		}

		.editor-styles-wrapper .h3modoki span,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) span {
			position: relative;
			display: inline-block;
			margin: 0 10px;
			padding: 0 20px;
			text-align: left;
		}
		@media only screen and (max-width: 599px) {
			.h3modoki span,
			h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) span {
				padding: 0 10px;
			}
		}

		.editor-styles-wrapper .h3modoki span.st-dash-design::before,
		.editor-styles-wrapper .h3modoki span.st-dash-design::after,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) span.st-dash-design::before,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) span.st-dash-design::after {
			position: absolute;
			top: 50%;
			content: '';
			width: 1000%;
			height: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px;
			background-color: <?php echo $st_h3border_color; ?>;
		}

		.editor-styles-wrapper .h3modoki span.st-dash-design::before,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) span.st-dash-design::before {
			right: 100%;
		}
		.editor-styles-wrapper .h3modoki span.st-dash-design::after,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) span.st-dash-design::after {
			left: 100%;
		}

		/* hタグ用 キャッチコピー */
		.editor-styles-wrapper .st-dash-design,
		.editor-styles-wrapper .st-dash-design .st-h-copy-toc,
		.editor-styles-wrapper .st-dash-design .st-h-copy {
			text-align: center;
		}

	<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'shortlinedesign') ): // ショートライン ?>

		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
			position: relative;
			padding-left: 0;
			padding-right: 0;
			border:none;
			<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			<?php else: ?>
				padding-bottom: 20px;
			<?php endif;  ?>
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
			background-color:transparent;
		}

		<?php if ( $st_h3border_color ): // ボーダー色あり ?>
			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
				position: absolute;
				content: '';
				width: 3em;
				height: <?php print $st_h3_border_size ? $st_h3_border_size : 2; ?>px;
				background-color: <?php echo $st_h3border_color; ?>;
				top: inherit;
				right: inherit;
				left: 0;
				bottom: 0;
				border: none;
			}
		<?php endif; ?>

		<?php if ( $st_h3border_undercolor && $st_h3border_color ): // ボーダー色（サブ）あり ?>
			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
				position: absolute;
				content: '';
				width: 3em;
				height: <?php print $st_h3_border_size ? $st_h3_border_size : 2; ?>px;
				/*Other Browser*/
				background: <?php echo $st_h3_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: -webkit-linear-gradient(left,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome36+ */
				background: linear-gradient(to left,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
				top: inherit;
				right: inherit;
				left: 0;
				bottom: 0;
				border: none;
			}
		<?php endif; ?>

		<?php if ( $st_h3_text_center ): // テキストを中央寄せ ?>

			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
				text-align: center;
			}

			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
			.h3modoki::after,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
				left: calc(50% - 1.5em);
			}
		<?php endif; ?>

		.editor-styles-wrapper .h3modoki::before,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
		.h3modoki::after,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
			border: none;
		}

	<?php elseif ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'dotdesign' ): ?>

		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
			position: relative;
			<?php if ( $st_h3_bgimg_tupadding ): ?>
				padding: <?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php else: ?>
				padding: 5px;
			<?php endif; ?>
			border: 1px solid <?php echo $st_h3border_color; ?>;
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
			<?php if ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) !== '' ): ?>
				/*Other Browser*/
				background: <?php echo $st_h3_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome36+ */
				background: url("<?php echo $st_h3_bgimg; ?>"), linear-gradient(to <?php echo $h3_gradient; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
			<?php elseif ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) === '' ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_h3_bgimg; ?>");
				background-color: <?php echo $st_h3_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
				<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
					background: url("<?php echo $st_h3_bgimg; ?>");
				<?php else: ?>
					background: none;
				<?php endif; ?>
			<?php endif; ?>
		}

		<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
				<?php if ( $st_h3_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
		<?php endif; ?>

		.editor-styles-wrapper .h3modoki span.st-dash-design,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome) span.st-dash-design {
			display: block;
			<?php if ( $st_h3_bgimg_tupadding ): ?>
				padding: <?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php else: ?>
				padding: 10px;
			<?php endif; ?>
			<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>
			<?php if ( $st_h3border_undercolor ): //ドットカラー ?>
				border: 1px dashed <?php echo $st_h3border_undercolor; ?>;
			<?php else: ?>
				border: 1px dashed <?php echo $st_h3border_color; ?>;
			<?php endif; ?>
		}

		.editor-styles-wrapper .h3modoki::before,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before,
		.editor-styles-wrapper .h3modoki::after,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
			content: none;
		}

	<?php elseif ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'leftlinedesign' ): //左ラインのみ ?>

			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before {
				position: absolute;
				content: ''!important;
				width: <?php print $st_h3_border_size ? $st_h3_border_size : 6; ?>px;
				height: 100%;
				<?php if ( $st_h3border_undercolor && $st_h3border_color ): // ボーダー色（サブ）あり ?>
					/*Other Browser*/
					/* Android4.1 - 4.3 */
					background: -webkit-linear-gradient(top,  <?php echo $st_h3border_color; ?> 0%,<?php echo $st_h3border_undercolor; ?> 100%);
				<?php elseif ( ! $st_h3border_undercolor && $st_h3border_color ): ?>
					background: <?php echo $st_h3border_color; ?>;
				<?php endif; ?>
				left: 0;
				bottom: 0;
			}

			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
			.editor-styles-wrapper .h3modoki::after,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				border: none;
			}

			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				position: relative;
				padding-left: 20px;
				border: none;
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
			<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>


			<?php if ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) !== '' ): ?>
				/*Other Browser*/
				background: <?php echo $st_h3_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome36+ */
				background: url("<?php echo $st_h3_bgimg; ?>"), linear-gradient(to <?php echo $h3_gradient; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
			<?php elseif ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) === '' ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_h3_bgimg; ?>");
				background-color: <?php echo $st_h3_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
				<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
					background: url("<?php echo $st_h3_bgimg; ?>");
				<?php else: ?>
					background: none;
				<?php endif; ?>
			<?php endif; ?>
			<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
				background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
				<?php if ( $st_h3_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			<?php endif; ?>
		}

	<?php elseif (
		( $st_is_ex_af ) // テーマ分岐
		&& ( trim( $st_h3_designsetting ) !== '' )
		&& ( $st_h3_designsetting === 'checkboxdesign' ) // チェックボックスデザイン
	): ?>

		<?php if ( $st_webicon_checkbox_simple ): // チェックボックスのデザインをチェックのみにする ?>

			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
				position: relative;
				display: block;
				line-height: 1.5;
				margin-bottom: 20px;
				padding-bottom: 0.5em;
				padding-left: calc(1.5em + 25px)!important;
				<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
					padding-left: calc(1.5em + 25px + <?php echo $st_h3_bgimg_leftpadding; ?>px)!important;
				<?php endif;  ?>
				<?php if ( $st_h3_color ): ?>
					color: <?php echo $st_h3_color; ?>;
				<?php endif; ?>
				<?php if ( $st_h3border_color ): //ボーダーがあるかどうか ?>
					border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
				<?php else: ?>
					border-bottom: none;
				<?php endif; ?>
				<?php if( $st_h3_border_tb_sub ): //ボーダー下をサブカラーにする ?>
					<?php if( $st_h3border_undercolor ): //サブカラー ?>
						border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_undercolor; ?>;
					<?php else: ?>
						border-bottom: none;
					<?php endif;  ?>
				<?php endif;  ?>
				border-top: none;
				<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
					padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) !== '' ): ?>
					/*Other Browser*/
					background: <?php echo $st_h3_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
					background: url("<?php echo $st_h3_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
				<?php elseif ( trim( $st_h3_bgcolor ) !== '' &&  trim( $st_h3_bgcolor_t ) === '' ): //下部には色がある場合 ?>
					background-image: url("<?php echo $st_h3_bgimg; ?>");
					background-color: <?php echo $st_h3_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
					<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
						background: url("<?php echo $st_h3_bgimg; ?>");
					<?php else: ?>
						background: none;
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
					background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
					<?php if ( $st_h3_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
				position: absolute;
				top: calc(50% - .75em)!important;
				left: 10px;
				content: "\f00c";
				font-family: stsvg;
				<?php if ( $st_h3border_color && $st_h3border_undercolor ): //ボーダー色 + ボーダー色（サブ）があるかどうか ?>
					background: linear-gradient( to right,  <?php echo $st_h3border_color; ?> 25%, <?php echo $st_h3border_undercolor; ?> 75% );
					-webkit-background-clip: text;
					color: transparent!important;
				<?php elseif ( $st_h3border_undercolor ): //ボーダー色（サブ）があるかどうか ?>
					color: <?php echo $st_h3border_undercolor; ?>;
				<?php else: ?>
					color: #ff0000;
				<?php endif; ?>
				z-index: 2;
				margin-right: 15px;
				/*text-shadow: -1px -1px 0 rgba(255, 255, 255, 1), 1px -1px 0 rgba(255, 255, 255, 1), -1px 1px 0 rgba(255, 255, 255, 1), 1px 1px 0 rgba(255, 255, 255, 1);*/
				font-size: 130%;
				line-height: 1.5;
				font-weight: normal;
			}

			.editor-styles-wrapper .h3modoki::after,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
				content: none;
			}

		<?php else: ?>

			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
				position: relative;
				display: block;
				line-height: 1.5;
				margin-bottom: 20px;
				padding-bottom: 0.5em;
				padding-left: calc(1.5em + 25px)!important;
				<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
					padding-left: calc(1.5em + 25px + <?php echo $st_h3_bgimg_leftpadding; ?>px)!important;
				<?php endif;  ?>
				<?php if ( $st_h3_color ): ?>
					color: <?php echo $st_h3_color; ?>;
				<?php endif; ?>
				<?php if ( $st_h3border_color ): //ボーダーがあるかどうか ?>
					border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
				<?php else: ?>
					border-bottom: none;
				<?php endif; ?>
				<?php if( $st_h3_border_tb_sub ): //ボーダー下をサブカラーにする ?>
					<?php if( $st_h3border_undercolor ): //サブカラー ?>
						border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_undercolor; ?>;
					<?php else: ?>
						border-bottom: none;
					<?php endif;  ?>
				<?php endif;  ?>
				border-top: none;
				<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
					padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) !== '' ): ?>
					/*Other Browser*/
					background: <?php echo $st_h3_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
					background: url("<?php echo $st_h3_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
				<?php elseif ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) === '' ): //下部には色がある場合 ?>
					background-image: url("<?php echo $st_h3_bgimg; ?>");
					background-color: <?php echo $st_h3_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
					<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
						background: url("<?php echo $st_h3_bgimg; ?>");
					<?php else: ?>
						background: none;
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
					background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
					<?php if ( $st_h3_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
				position: absolute;
				top: calc(50% - .9em)!important;
				left: 20px;
				content: "\e907";
				font-family: stsvg;
				<?php if ( $st_h3border_undercolor ): //ボーダーがあるかどうか ?>
					color: <?php echo $st_h3border_undercolor; ?>;
				<?php else: ?>
					color: #ff0000;
				<?php endif; ?>
				z-index: 2;
				margin-right: 15px;
				/*text-shadow: -1px -1px 0 rgba(255, 255, 255, 1), 1px -1px 0 rgba(255, 255, 255, 1), -1px 1px 0 rgba(255, 255, 255, 1), 1px 1px 0 rgba(255, 255, 255, 1);*/
				font-size: 110%;
				line-height: 1.5;
			}

			.editor-styles-wrapper .h3modoki::after,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
				content: "\e904";
				font-family: stsvg;
				position: absolute;
				z-index: 1;
				left: 10px;
				top: calc(50% - .75em);
    			right: inherit!important;
				font-size: 150%;
				line-height: 1.5;
				<?php if ( $st_h3border_color ): //ボーダーがあるかどうか ?>
					color: <?php echo $st_h3border_color; ?>;
				<?php else: ?>
					color: #ccc;
				<?php endif; ?>
			}

		<?php endif; ?>

	<?php elseif ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'underdotdesign' ): ?>

		.editor-styles-wrapper .h3modoki,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
			border: none;
			border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 2; ?>px dashed <?php echo $st_h3border_color; ?>;
			<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
			<?php else: ?>
				padding-left: 0;
			<?php endif; ?>
			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
				<?php if ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) !== '' ): ?>
					/*Other Browser*/
					background: <?php echo $st_h3_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
					background: url("<?php echo $st_h3_bgimg; ?>"), linear-gradient(to <?php echo $h3_gradient; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
				<?php elseif ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) === '' ): //下部には色がある場合 ?>
					background-image: url("<?php echo $st_h3_bgimg; ?>");
					background-color: <?php echo $st_h3_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
					<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
						background: url("<?php echo $st_h3_bgimg; ?>");
					<?php else: ?>
						background: none;
					<?php endif; ?>
				<?php endif; ?>
		}
				<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
					.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
						background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
						<?php if ( $st_h3_bgimg_repeat ): ?>
							background-repeat: no-repeat;
						<?php endif; ?>
					}
				<?php endif; ?>

		.editor-styles-wrapper .h3modoki::before,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before,
		.editor-styles-wrapper .h3modoki::after,
		.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
			content: none;
		}

	<?php else: ?>

		<?php if ( trim( $st_h3_designsetting ) !== '' && $st_h3_designsetting === 'hukidasidesign' ): //吹き出しデザイン ?>
				.editor-styles-wrapper .h3modoki,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
					background: <?php echo $st_h3_bgcolor; ?>;
					color: <?php echo $st_h3_color; ?>;
					position: relative;
					border: none;
					margin-bottom: 30px;
			<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
			<?php endif; ?>

			<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
			<?php endif; ?>
				}
				.editor-styles-wrapper .h3modoki::after,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
					content: none;
				}
				.editor-styles-wrapper .h3modoki::before,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before {
					border-top: 10px solid <?php echo $st_h3_bgcolor; ?>;
					content: '';
					position: absolute;
					border-right: 10px solid transparent;
					border-left: 10px solid transparent;
					bottom: -10px;
					left: 30px;
				}

				<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
				.editor-styles-wrapper .h3modoki,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
					background-image: url("<?php echo $st_h3_bgimg; ?>");
					background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
					<?php if ( $st_h3_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
				<?php endif; ?>

			<?php elseif (
				( $st_is_ex ) // テーマ分岐
				&& ( trim( $st_h3_designsetting ) !== '' )
				&& ( $st_h3_designsetting === 'hukidasidesign_under' ) //吹き出し下線デザイン
			): ?>

				.editor-styles-wrapper .h3modoki,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {

					position: relative;
					padding: 10px;
					margin-bottom: 30px;
					border: none;

					<?php if ( $st_h3border_color ): //ボーダーがあるかどうか ?>
						border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px solid <?php echo $st_h3border_color; ?>;
					<?php else: ?>
						border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px solid #ccc;
					<?php endif; ?>

					<?php if ( $st_h3_bgcolor ): ?>
						background: <?php echo $st_h3_bgcolor; ?>;
					<?php else: ?>
						background: #fff;
						padding: 10px 0;
					<?php endif; ?>

					<?php if ( $st_h3_color ): ?>
						color: <?php echo $st_h3_color; ?>;
					<?php endif; ?>

					<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
						padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
					<?php endif; ?>

					<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
						padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
						padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
					<?php endif; ?>
                <?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_h3_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome26+ */
                    background: url("<?php echo $st_h3_bgimg; ?>"), linear-gradient(to <?php echo $h3_gradient; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
                <?php elseif ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
                    background-image: url("<?php echo $st_h3_bgimg; ?>");
                    background-color: <?php echo $st_h3_bgcolor; ?>;
                <?php else: ?>
                    background-color: transparent;
                    <?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
                        background: url("<?php echo $st_h3_bgimg; ?>");
                    <?php else: ?>
                        background: none;
                    <?php endif; ?>
                <?php endif; ?>
			}

       		<?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
				.editor-styles-wrapper .h3modoki,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
					background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
					<?php if ( $st_h3_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
       		<?php endif;  ?>

				.editor-styles-wrapper .h3modoki::before,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before,
				.editor-styles-wrapper .h3modoki::after,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
					position: absolute;
					width: 0;
					height: 0;
					border: solid transparent;
					content: "";
					border-top-width: 13px;
					border-right-width: 13px;
					border-bottom-width: 13px;
					border-left-width: 13px;
				}

				.editor-styles-wrapper .h3modoki::before,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before {
					left: 50px;
					bottom: -28px;
					<?php if ( $st_h3border_color ): //ボーダーがあるかどうか ?>
						border-top-color: <?php echo $st_h3border_color; ?>;
						border-left-color: <?php echo $st_h3border_color; ?>;
					<?php else: ?>
						border-top-color: #ccc;
						border-left-color: #ccc;
					<?php endif; ?>
				}

				.editor-styles-wrapper .h3modoki::after,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
					content: none;
				}

		<?php else: //吹き出しじゃないデザイン ?>

			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				<?php if ( $st_h3_color ): ?>
					color: <?php echo $st_h3_color; ?>;
				<?php endif; ?>

				<?php if ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) !== '' ): ?>
					/*Other Browser*/
					background: <?php echo $st_h3_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
					background: url("<?php echo $st_h3_bgimg; ?>"), linear-gradient(to <?php echo $h3_gradient; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);
				<?php elseif ( trim( $st_h3_bgcolor ) !== '' && trim( $st_h3_bgcolor_t ) === '' ): //下部には色がある場合 ?>
					background-image: url("<?php echo $st_h3_bgimg; ?>");
					background-color: <?php echo $st_h3_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
					<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
						background: url("<?php echo $st_h3_bgimg; ?>");
					<?php else: ?>
						background: none;
					<?php endif; ?>
				<?php endif; ?>

                <?php if ( $st_h3border_color ): //ボーダーがあるかどうか ?>
                    <?php if ( $st_h3_border_tb ): ?>
                        border-top: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
						<?php if( $st_h3_border_tb_sub ): //ボーダー下をサブカラーにする ?>
							<?php if( $st_h3border_undercolor ): //サブカラー ?>
								border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_undercolor; ?>;
							<?php else: ?>
								border-bottom: none;
							<?php endif;  ?>
						<?php else: ?>
							border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
						<?php endif;  ?>
                    <?php else: ?>
                        border: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
                    <?php endif; ?>
                <?php else: ?>
                    border: none;
                <?php endif; ?>

				<?php if( $st_h3_border_tb_sub ): //ボーダー下をサブカラーにする ?>
					<?php if( $st_h3border_undercolor ): //サブカラー ?>
						border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_undercolor; ?>;
					<?php else: ?>
						border-bottom: none;
					<?php endif;  ?>
				<?php endif;  ?>

				<?php if ( $st_h3_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px;
				<?php endif; ?>

				<?php if ( $st_h3_bgimg_tupadding ): //上下の余白 ?>
					padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px;
					padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px;
				<?php endif; ?>
			}

			<?php if ( $st_h3_bgimg ): //背景画像がある場合 ?>
				.editor-styles-wrapper .h3modoki,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
					background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
					<?php if ( $st_h3_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
			<?php endif; ?>

			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before,
			.editor-styles-wrapper .h3modoki::after,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
				content: none;
			}

		<?php endif; //吹き出しじゃないデザインここまで ?>

	<?php endif; ?>

	<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

	/*h4*/
	<?php if ( $st_h4_no_css ): //カスタマイザーのCSSを無効化
	else: ?>

		<?php if($st_h4_bg_radius): //h4 ?>
			/* 角丸 */
			.h4modoki,
			.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point){
				border-radius:5px;
			}
		<?php endif;  ?>

		<?php if ( ( trim( $st_h4hukidasi_design ) !== '') && ( $st_h4hukidasi_design === 'hukidasidesign' ) ): //吹き出しデザイン ?>
			.editor-styles-wrapper .h4modoki,
			.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point){
				background: <?php echo $st_h4bgcolor; ?>;
				<?php if ( $st_h4_textcolor ): ?>
					color: <?php echo $st_h4_textcolor; ?>;
				<?php endif; ?>
				position: relative;
				border: none;
				margin-bottom:30px;
				<?php if( $st_h4_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h4_bgimg_leftpadding; ?>px;
				<?php endif;  ?>

				<?php if($st_h4_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h4_bgimg_tupadding; ?>px;
					padding-bottom:<?php echo $st_h4_bgimg_tupadding; ?>px;
				<?php endif;  ?>

				<?php if( $st_h4_bgimg ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_h4_bgimg; ?>");
					background-position: <?php echo $st_h4_bgimg_side; ?> <?php echo $st_h4_bgimg_top; ?>;
					<?php if ( $st_h4_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.editor-styles-wrapper .h4modoki::after,
			.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point)::after {
				border-top: 10px solid <?php echo $st_h4bgcolor; ?>;
				content: '';
				position: absolute;
				border-right: 10px solid transparent;
				border-left: 10px solid transparent;
				bottom: -10px;
				left: 30px;
				border-radius: 2px;
			}

			.editor-styles-wrapper .h4modoki::before,
			.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point)::before {
				border-top: 10px solid <?php echo $st_h4bgcolor; ?>;
				content: '';
				position: absolute;
				border-right: 10px solid transparent;
				border-left: 10px solid transparent;
				bottom: -10px;
				left: 30px;
			}

		<?php elseif ( ( trim( $st_h4hukidasi_design ) !== '') && ( $st_h4hukidasi_design === 'dogears' ) ): //耳折れデザイン ?>

			.editor-styles-wrapper .h4modoki,
			.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point){
				position: relative;
				z-index: 1;
				background: <?php echo $st_h4bgcolor; ?>;
				<?php if ( $st_h4_textcolor ): ?>
					color: <?php echo $st_h4_textcolor; ?>;
				<?php endif; ?>
				position: relative;
				<?php if( $st_h4_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h4_bgimg_leftpadding; ?>px;
				<?php endif;  ?>

				<?php if($st_h4_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h4_bgimg_tupadding; ?>px;
					padding-bottom:<?php echo $st_h4_bgimg_tupadding; ?>px;
				<?php endif;  ?>

				<?php if( $st_h4_bgimg ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_h4_bgimg; ?>");
					background-position: <?php echo $st_h4_bgimg_side; ?> <?php echo $st_h4_bgimg_top; ?>;
					<?php if ( $st_h4_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.editor-styles-wrapper .h4modoki::before,
			.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point)::before{
				content: '';
				border-style: solid;
				border-color: transparent #fff transparent transparent;
				border-width: 0 15px 15px 0;
				position:absolute;
				top:0;
				right:0;
				width:0;
				height:0;
				z-index: 2;
			}

			.editor-styles-wrapper .h4modoki::after,
			.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point)::after{
				content: '';
				border-style: solid;
				border-color: transparent #fff #1a1a1a transparent;
				border-width: 0 15px 15px 0;
				position:absolute;
				top:0;
				right:0;
				left: inherit;
				border-radius: 0;
				width:0;
				height:0;
				opacity:0.1;
				z-index: 3;
			}

		<?php elseif ( ( trim( $st_h4hukidasi_design ) !== '') && ( $st_h4hukidasi_design === 'stripe' ) ): //ストライプ ?>

			<?php if ( trim( $st_h4bgcolor ) === '' ):
				$st_h4bgcolor = "#ffffff";
			endif; ?>
			<?php if ( trim( $st_h4bordercolor ) === '' ):
				$st_h4bordercolor = "#fafafa";
			endif; ?>

			.editor-styles-wrapper .h4modoki,
			.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point){
				<?php if ( ( trim( $st_h4bgcolor ) !== '' ) ): ?>
					background: -webkit-repeating-linear-gradient(45deg, <?php echo $st_h4bgcolor; ?>, <?php echo $st_h4bgcolor; ?> 3px, <?php echo $st_h4bordercolor; ?> 3px, <?php echo $st_h4bordercolor; ?> 10px);
					background: repeating-linear-gradient(45deg, <?php echo $st_h4bgcolor; ?>, <?php echo $st_h4bgcolor; ?> 3px, <?php echo $st_h4bordercolor; ?> 3px, <?php echo $st_h4bordercolor; ?> 6px);
				<?php elseif ( ( trim( $st_h4bgcolor ) === '' ) ): //下部には色がある場合 ?>
					background-color: <?php echo $st_h4bgcolor; ?>;
				<?php else: ?>

				<?php endif; ?>

				<?php if( $st_h4_textcolor ): //カラー ?>
					color: <?php echo $st_h4_textcolor; ?>;
				<?php endif;  ?>

				border: none;

				<?php if( $st_h4_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h4_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_h4_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h4_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h4_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>
			}

		<?php else: ?>

			.editor-styles-wrapper .h4modoki,
			.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point) {
				<?php if($st_h4_design && $st_h4bordercolor): ?>
					border-left: <?php print $st_h4_border_size ? $st_h4_border_size : 5; ?>px solid <?php echo $st_h4bordercolor; ?>;
				<?php endif;  ?>
				<?php if ( $st_h4_textcolor ): ?>
					color: <?php echo $st_h4_textcolor; ?>;
				<?php endif; ?>
				<?php if ( $st_h4bgcolor ): ?>
					background-color: <?php echo $st_h4bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
				<?php endif; ?>

				<?php if($st_h4_top_border): //上のボーダー ?>
					border-top : solid <?php print $st_h4_border_size ? $st_h4_border_size : 1; ?>px <?php echo $st_h4bordercolor; ?>;
				<?php endif;  ?>

				<?php if($st_h4_bottom_border): //下のボーダー ?>
					border-bottom : solid <?php print $st_h4_border_size ? $st_h4_border_size : 1; ?>px <?php echo $st_h4bordercolor; ?>;
				<?php endif;  ?>

				<?php if($st_h4_design && $st_h4bordercolor && $st_h4_top_border && $st_h4_bottom_border ): // 左・上・下全てのボーダーが有効な場合は右ボーダーを追加 ?>
					border-right: <?php print $st_h4_border_size ? $st_h4_border_size : 1; ?>px solid <?php echo $st_h4bordercolor; ?>;
				<?php endif;  ?>

				<?php if( $st_h4_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h4_bgimg_leftpadding; ?>px;
				<?php endif;  ?>

				<?php if($st_h4_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h4_bgimg_tupadding; ?>px;
					padding-bottom:<?php echo $st_h4_bgimg_tupadding; ?>px;
				<?php endif;  ?>

				<?php if( $st_h4_bgimg ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_h4_bgimg; ?>");
					background-position: <?php echo $st_h4_bgimg_side; ?> <?php echo $st_h4_bgimg_top; ?>;
					<?php if ( $st_h4_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			<?php if( $st_h4_bg_radius && $st_h4_design && ! $st_h4_top_border && ! $st_h4_bottom_border  ): // 角丸で左ボーダーだけがある場合 ?>
				.editor-styles-wrapper .h4modoki,
				.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point) {
					border: none;
					position: relative;
					max-width: 100%;
					box-sizing: border-box;
					padding-left: <?php echo $st_h4_bgimg_leftpadding; ?>px;
				}
				.editor-styles-wrapper .h4modoki::before,
				.editor-styles-wrapper h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point)::before {
					position: absolute;
					content: '';
					width: <?php print $st_h4_border_size ? $st_h4_border_size : 6; ?>px;
					height: 100%;
					<?php if( $st_h4bordercolor ): //ボーダーカラー ?>
						background: <?php echo $st_h4bordercolor; ?>;
					<?php endif; ?>
					bottom: 0;
					left:0;
					border-radius: 3px;
				}
			<?php endif; ?>

		<?php endif; ?>

	<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

	/* h5 */

	<?php if ( $st_h5_no_css ): //カスタマイザーのCSSを無効化
	else: ?>

		<?php if($st_h5_bg_radius): //h5 ?>
			/* 角丸 */
			.editor-styles-wrapper .h5modoki,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
				border-radius:5px;
			}
		<?php endif;  ?>

		<?php if ( ( trim( $st_h5hukidasi_design ) !== '') && ( $st_h5hukidasi_design === 'hukidasidesign' ) ): //吹き出しデザイン ?>
			.editor-styles-wrapper .h5modoki,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title){
				background: <?php echo $st_h5bgcolor; ?>;
				<?php if ( $st_h5_textcolor ): ?>
					color: <?php echo $st_h5_textcolor; ?>;
				<?php endif; ?>
				position: relative;
				border: none;
				margin-bottom:30px;
				padding:10px 10px 10px 15px;
				<?php if( $st_h5_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h5_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_h5_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h5_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h5_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if( $st_h5_bgimg ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_h5_bgimg; ?>");
					background-position: <?php echo $st_h5_bgimg_side; ?> <?php echo $st_h5_bgimg_top; ?>;
					<?php if ( $st_h5_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.editor-styles-wrapper .h5modoki::after,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::after {
				border-top: 10px solid <?php echo $st_h5bgcolor; ?>;
				content: '';
				position: absolute;
				border-right: 10px solid transparent;
				border-left: 10px solid transparent;
				bottom: -10px;
				left: 30px;
				border-radius: 2px;
			}

			.editor-styles-wrapper .h5modoki::before,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::before {
				border-top: 10px solid <?php echo $st_h5bgcolor; ?>;
				content: '';
				position: absolute;
				border-right: 10px solid transparent;
				border-left: 10px solid transparent;
				bottom: -10px;
				left: 30px;
			}
		<?php elseif ( ( trim( $st_h5hukidasi_design ) !== '') && ( $st_h5hukidasi_design === 'dogears' ) ): //耳折れデザイン ?>
			.editor-styles-wrapper .h5modoki,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
				background: <?php echo $st_h5bgcolor; ?>;
				<?php if ( $st_h5_textcolor ): ?>
					color: <?php echo $st_h5_textcolor; ?>;
				<?php endif; ?>
				position: relative;
				z-index: 1;
				<?php if( $st_h5_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h5_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_h5_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h5_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h5_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if( $st_h5_bgimg ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_h5_bgimg; ?>");
					background-position: <?php echo $st_h5_bgimg_side; ?> <?php echo $st_h5_bgimg_top; ?>;
					<?php if ( $st_h5_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.editor-styles-wrapper .h5modoki::before,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::before {
				content: '';
				border-style: solid;
				border-color: transparent #fff transparent transparent;
				border-width: 0 15px 15px 0;
				position:absolute;
				top:0;
				right:0;
				width:0;
				height:0;
				z-index: 2;
			}

			.editor-styles-wrapper .h5modoki::after,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::after {
				content: '';
				border-style: solid;
				border-color: transparent #fff #1a1a1a transparent;
				border-width: 0 15px 15px 0;
				position:absolute;
				top:0;
				right:0;
				left: inherit;
				border-radius: 0;
				width:0;
				height:0;
				opacity:0.1;
				z-index: 3;
			}

		<?php elseif ( ( trim( $st_h5hukidasi_design ) !== '') && ( $st_h5hukidasi_design === 'stripe' ) ): //ストライプ ?>

			<?php if ( trim( $st_h5bgcolor ) === '' ):
				$st_h5bgcolor = "#ffffff";
			endif; ?>
			<?php if ( trim( $st_h5bordercolor ) === '' ):
				$st_h5bordercolor = "#fafafa";
			endif; ?>

			.editor-styles-wrapper .h5modoki,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.point):not(.st-cardbox-t):not(.popular-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
				<?php if ( ( trim( $st_h5bgcolor ) !== '' ) ): ?>
					background: -webkit-repeating-linear-gradient(45deg, <?php echo $st_h5bgcolor; ?>, <?php echo $st_h5bgcolor; ?> 3px, <?php echo $st_h5bordercolor; ?> 3px, <?php echo $st_h5bordercolor; ?> 10px);
					background: repeating-linear-gradient(45deg, <?php echo $st_h5bgcolor; ?>, <?php echo $st_h5bgcolor; ?> 3px, <?php echo $st_h5bordercolor; ?> 3px, <?php echo $st_h5bordercolor; ?> 6px);
				<?php elseif ( ( trim( $st_h5bgcolor ) === '' ) ): //下部には色がある場合 ?>
					background-color: <?php echo $st_h5bgcolor; ?>;
				<?php else: ?>

				<?php endif; ?>

				<?php if( $st_h5_textcolor ): //カラー ?>
					color: <?php echo $st_h5_textcolor; ?>;
				<?php endif;  ?>

				border: none;

				<?php if( $st_h5_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h5_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_h5_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h5_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h5_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>
			}

		<?php else: ?>

			.editor-styles-wrapper .h5modoki,
			.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.point):not(.st-cardbox-t):not(.popular-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
				<?php if($st_h5_design && $st_h5bordercolor): ?>
					border-left: <?php print $st_h5_border_size ? $st_h5_border_size : 5; ?>px solid <?php echo $st_h5bordercolor; ?>;
				<?php endif;  ?>
				<?php if ( $st_h5_textcolor ): ?>
					color: <?php echo $st_h5_textcolor; ?>;
				<?php endif; ?>
				<?php if ( $st_h5bgcolor ): ?>
					background-color: <?php echo $st_h5bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
				<?php endif; ?>

				<?php if($st_h5_top_border): //上のボーダー ?>
					border-top : solid <?php print $st_h5_border_size ? $st_h5_border_size : 1; ?>px <?php echo $st_h5bordercolor; ?>;
				<?php endif;  ?>

				<?php if($st_h5_bottom_border): //下のボーダー ?>
					border-bottom : solid <?php print $st_h5_border_size ? $st_h5_border_size : 1; ?>px <?php echo $st_h5bordercolor; ?>;
				<?php endif;  ?>

				<?php if($st_h5_design && $st_h5bordercolor && $st_h5_top_border && $st_h5_bottom_border ): // 左・上・下全てのボーダーが有効な場合は右ボーダーを追加 ?>
					border-right: <?php print $st_h5_border_size ? $st_h5_border_size : 1; ?>px solid <?php echo $st_h5bordercolor; ?>;
				<?php endif;  ?>

				<?php if( $st_h5_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h5_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_h5_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h5_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h5_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if( $st_h5_bgimg ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_h5_bgimg; ?>");
					background-position: <?php echo $st_h5_bgimg_side; ?> <?php echo $st_h5_bgimg_top; ?>;
					<?php if ( $st_h5_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			<?php if( $st_h5_bg_radius && $st_h5_design && ! $st_h5_top_border && ! $st_h5_bottom_border  ): // 角丸で左ボーダーだけがある場合 ?>
				.editor-styles-wrapper .h5modoki,
				.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
					border: none;
					position: relative;
					max-width: 100%;
					box-sizing: border-box;
					padding-left: <?php echo $st_h5_bgimg_leftpadding; ?>px;
					margin-right: -<?php echo $st_h5_bgimg_leftpadding; ?>px;
				}
				.editor-styles-wrapper .h5modoki::before,
				.editor-styles-wrapper h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::before {
					position: absolute;
					content: '';
					width: <?php print $st_h5_border_size ? $st_h5_border_size : 6; ?>px;
					height: 100%;
					<?php if( $st_h5bordercolor ): //ボーダーカラー ?>
						background: <?php echo $st_h5bordercolor; ?>;
					<?php endif; ?>
					bottom: 0;
					left:0;
					border-radius: 3px;
				}
			<?php endif; ?>

		<?php endif; ?>

	<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

	<?php if ( $st_h4_matome_no_css ): //カスタマイザーのCSSを無効化
	else: ?>

		<?php if ( $st_h4_matome_bg_radius ): //まとめタグ ?>
			/* 角丸 */
			.editor-styles-wrapper .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(#reply-title):not(.point) {
				border-radius: 5px;
			}
		<?php endif; ?>

		<?php if ( $st_h4_matome_hukidasi_design ): //ふきだしに変更 ?>
			.editor-styles-wrapper .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(#reply-title):not(.point) {
				background: <?php echo $st_h4_matome_bgcolor; ?>;
				<?php if ( $st_h4_matome_textcolor ): ?>
					color: <?php echo $st_h4_matome_textcolor; ?>;
				<?php endif; ?>
				position: relative;
				border: none;
				margin-bottom: 30px;
				<?php if ( $st_h4_matome_bgimg_leftpadding || $st_h4_matome_bgimg_leftpadding == 0 ): //左の余白 ?>
					padding-left:<?php echo $st_h4_matome_bgimg_leftpadding; ?>px;
				<?php endif; ?>

				<?php if ( $st_h4_matome_bgimg_tupadding ): //上下の余白 ?>
					padding-top:<?php echo $st_h4_matome_bgimg_tupadding; ?>px;
					padding-bottom:<?php echo $st_h4_matome_bgimg_tupadding; ?>px;
				<?php endif; ?>

				<?php if ( $st_h4_matome_bgimg ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_h4_matome_bgimg; ?>");
					background-position: <?php echo $st_h4_matome_bgimg_side; ?> <?php echo $st_h4_matome_bgimg_top; ?>;
					<?php if ( $st_h4_matome_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif; ?>
			}

			.editor-styles-wrapper .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(#reply-title):not(.point)::after {
				border-top: 10px solid <?php echo $st_h4_matome_bgcolor; ?>;
				content: '';
				position: absolute;
				border-right: 10px solid transparent;
				border-left: 10px solid transparent;
				bottom: -10px;
				left: 30px;
				border-radius: 2px;
			}

			.editor-styles-wrapper .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(#reply-title):not(.point)::before {
				border-top: 10px solid <?php echo $st_h4_matome_bgcolor; ?>;
				content: '';
				position: absolute;
				border-right: 10px solid transparent;
				border-left: 10px solid transparent;
				bottom: -10px;
				left: 30px;
			}
		<?php else: ?>

			.editor-styles-wrapper .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(.point) {
				<?php if ( $st_h4_matome_bordercolor ): ?>
					border-left: 5px solid <?php echo $st_h4_matome_bordercolor; ?>;
				<?php endif; ?>
				<?php if ( $st_h4_matome_textcolor ): ?>
					color: <?php echo $st_h4_matome_textcolor; ?>;
				<?php endif; ?>
				<?php if ( $st_h4_matome_bgcolor ): ?>
					background-color: <?php echo $st_h4_matome_bgcolor; ?>;
				<?php else: ?>
					background-color: transparent;
				<?php endif; ?>

				<?php if ( $st_h4_matome_top_border ): //上のボーダー ?>
					border-top : solid 1px <?php echo $st_h4_matome_bordercolor; ?>;
				<?php endif; ?>

				<?php if ( $st_h4_matome_bottom_border ): //下のボーダー ?>
					border-bottom : solid 1px <?php echo $st_h4_matome_bordercolor; ?>;
				<?php endif; ?>

				<?php if ( $st_h4_matome_bgimg_leftpadding || $st_h4_matome_bgimg_leftpadding == 0 ): //左の余白 ?>
					padding-left:<?php echo $st_h4_matome_bgimg_leftpadding; ?>px;
				<?php endif; ?>

				<?php if ( $st_h4_matome_bgimg_tupadding ): //上下の余白 ?>
					padding-top:<?php echo $st_h4_matome_bgimg_tupadding; ?>px;
					padding-bottom:<?php echo $st_h4_matome_bgimg_tupadding; ?>px;
				<?php endif; ?>

				<?php if ( $st_h4_matome_bgimg ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_h4_matome_bgimg; ?>");
					background-position: <?php echo $st_h4_matome_bgimg_side; ?> <?php echo $st_h4_matome_bgimg_top; ?>;
					<?php if ( $st_h4_matome_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif; ?>
			}
		<?php endif; ?>

	<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

	/*強制センタリング・中央寄せ
	------------------------------------------------------------*/
	<?php if ( $st_entrytitle_no_css ): //カスタマイザーのCSSを無効化 ?>
	<?php else: ?>
	<?php if ( $st_entrytitle_text_center ): //記事タイトル ?>
			.editor-styles-wrapper .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
			.editor-styles-wrapper .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				text-align: center;
				<?php if ( $st_entrytitle_designsetting !== 'dotdesign' && $st_entrytitle_designsetting !== 'linedesign' ): //左ラインと囲みドットデザイン以外  ?>
						padding-left: 10px;
						padding-right: 10px;
				<?php endif; ?>
			}
			<?php if ( $st_entrytitle_designsetting === 'hukidasidesign' ): //吹き出しデザイン ?>
				.editor-styles-wrapper .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
				.editor-styles-wrapper .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
				.editor-styles-wrapper .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
				.editor-styles-wrapper .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					left: calc(50% - 10px);
				}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( $st_h2_no_css ): //カスタマイザーのCSSを無効化 ?>
	<?php else: ?>
		<?php if ( $st_h2_text_center ): //h2 ?>
			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				text-align: center;
				<?php if ( $st_h2_designsetting !== 'dotdesign' && $st_h2_designsetting !== 'linedesign' ): //左ラインと囲みドットデザイン以外  ?>
						padding-left: 10px;
						padding-right: 10px;
				<?php endif; ?>
			}
			<?php if ( $st_h2_designsetting === 'hukidasidesign' ): //吹き出しデザイン ?>
				.editor-styles-wrapper .h2modoki::after,
				.editor-styles-wrapper .h2modoki::before,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
				.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					left: calc(50% - 10px);
				}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( $st_h3_no_css ): //カスタマイザーのCSSを無効化 ?>
	<?php else: ?>
		<?php if ( $st_h3_text_center ): //h3 ?>
			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				text-align: center;
				<?php if ( $st_h3_designsetting !== 'dotdesign' && $st_h3_designsetting !== 'linedesign' ): //左ラインと囲みドットデザイン以外  ?>
						padding-left: 10px;
						padding-right: 10px;
				<?php endif; ?>
			}
			<?php if ( $st_h3_designsetting === 'hukidasidesign' ): //吹き出しデザイン ?>
				.editor-styles-wrapper .h3modoki::after,
				.editor-styles-wrapper .h3modoki::before,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after,
				.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before {
					left: calc(50% - 10px);
				}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

	/* ステップ・カウント
	------------------------------------------------------------*/
	<?php if ( $st_step_color ): ?>
		.editor-styles-wrapper .is-style-st-heading-custom-count::before,
		.editor-styles-wrapper .is-style-st-heading-custom-step::before,
		.editor-styles-wrapper .is-style-st-heading-custom-step::after {
			color: <?php echo $st_step_color; ?>;
		}
		.editor-styles-wrapper .is-style-st-heading-custom-step::after {
			border-bottom: 1px solid <?php echo $st_step_color; ?>;
		}
	<?php else: ?>
		.editor-styles-wrapper .is-style-st-heading-custom-step::before,
		.editor-styles-wrapper .is-style-st-heading-custom-step::after {
			color: #ccc;
		}
		.editor-styles-wrapper .is-style-st-heading-custom-step::after {
			border-bottom: 1px solid #ccc;
		}
	<?php endif; ?>

	.editor-styles-wrapper .st-step {
		<?php if ( $st_step_color ): ?>
			color: <?php echo $st_step_color; ?>;
		<?php endif; ?>
		<?php if ( $st_step_bgcolor ): ?>
			background: <?php echo $st_step_bgcolor; ?>;
		<?php endif; ?>
		<?php if ( $st_step_radius ): //角を丸くする ?>
			border-radius: 5px;
		<?php endif; ?>
	}
	<?php if ( $st_step_bgcolor ): ?>
		.editor-styles-wrapper .st-step::before {
			border-top-color: <?php echo $st_step_bgcolor; ?>;
		}
	<?php endif; ?>

	.editor-styles-wrapper .st-step-title {
		<?php if ( $st_step_text_color ): ?>
			color:<?php echo $st_step_text_color; ?>;
		<?php endif; ?>
		<?php if ( $st_step_text_bgcolor ): ?>
			background:<?php echo $st_step_text_bgcolor; ?>;
			<?php if ( $st_step_radius ): //角を丸くする ?>
				border-radius: 5px;
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( $st_step_text_border_color ): ?>
			border-bottom:solid 2px <?php echo $st_step_text_border_color; ?>;
		<?php endif; ?>
	}

	<?php if ( $st_step_text_bgcolor ): // テキストの背景色あり ?>
		.editor-styles-wrapper .st-step-box {
			top: -15px;
		}
	<?php else: ?>
		.st-step-box {
			bottom: 15px;
		}
	<?php endif; ?>

	/* ポイント
	------------------------------------------------------------*/
	<?php if ( ( $st_step_color ) || ( $st_step_bgcolor ) ): ?>
		.editor-styles-wrapper .editor-styles-wrapper .editor-styles-wrapper .st-point::before {
			<?php if ( $st_step_color ): ?>
				color: <?php echo $st_step_color; ?>;
			<?php endif; ?>
			<?php if ( $st_step_bgcolor ): ?>
				background: <?php echo $st_step_bgcolor; ?>;
			<?php endif; ?>
		}
	<?php endif; ?>

	/*スライドボックス
	------------------------------------------------------------*/
	<?php if ( $st_slidebox_color ): ?>
		.editor-styles-wrapper .st-slidebox-c {
			background: <?php echo $st_slidebox_color; ?>;
		}
	<?php endif; ?>

	/*--------------------------------
	調整 - editor-style-rich.php
	---------------------------------*/

	<?php // H2 ?>
	<?php if ( $st_h2_no_css ): ?>   // カスタマイザーのCSSを無効化
	<?php else: ?>
		<?php if ( $st_h2_designsetting === 'hukidasidesign' ):    // 吹き出しデザインに変更（※要背景色） ?>
		<?php elseif ( $st_h2_designsetting === 'linedesign' ):    // 囲み&左ラインデザインに変更（※要ボーダー色） ?>
			.editor-styles-wrapper h2::before {
				content: none;
			}
			.editor-styles-wrapper h2::after {
				border: none;
				bottom: auto;
				border-radius: 0;
			}
		<?php elseif ( $st_h2_designsetting === 'leftlinedesign' ):    // 左ラインデザインに変更（※要ボーダー色） ?>
			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper .h2modoki::after,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				content: none;
				border: none;
			}
		<?php elseif ( $st_h2_designsetting === 'underlinedesign' ):    // 2色アンダーラインに変更（※要ボーダー色） ?>
		<?php elseif ( $st_h2_designsetting === 'gradient_underlinedesign' ):    // グラデーションアンダーラインに変更（※要ボーダー色） ?>
		<?php elseif ( $st_h2_designsetting === 'centerlinedesign' ):    // センターラインに変更（※要ボーダー色） ?>
			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
				-ms-flex-pack: justify;
				justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
				-ms-flex-align: center;
				align-items: center;
				border: 0;
				text-align: center;
			}

			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper .h2modoki::after,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			border: 0;
				position: static;
				display: block;
				content: '';
				height: 1px;
				-webkit-box-flex: 1;
				-webkit-flex-grow: 1;
				-ms-flex-positive: 1;
				flex-grow: 1;
				border: 0;
				background-color: <?php echo $st_h2border_color; ?>;
			}

			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				margin-right: 20px;
			}

			.editor-styles-wrapper .h2modoki::after,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				margin-left: 20px;
			}
		<?php elseif ( $st_h2_designsetting === 'dotdesign' ):    // 囲みドットデザインに変更（※要ボーダー色） ?>
			.editor-styles-wrapper .h2modoki,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				padding: 15px;
				<?php if ( $st_h2_text_center ): // 中央寄せ ?>
					text-align: center;
				<?php endif; ?>
			}

			.editor-styles-wrapper .h2modoki::before,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				content: normal;
			}

			.editor-styles-wrapper .h2modoki::after,
			.editor-styles-wrapper h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				position: absolute;
				content: '';
				top: 6px;
				right: 6px;
				bottom: 6px;
				left: 6px;
				<?php if ( $st_h2border_undercolor ):    // ドットカラー ?>
					border: 1px dashed <?php echo $st_h2border_undercolor; ?>;
				<?php else: ?>
					border: 1px dashed <?php echo$st_h2border_color; ?>;
				<?php endif; ?>
			}
		<?php elseif ( $st_h2_designsetting === 'stripe_design' ):    // ストライプデザインに変更（※要背景色） ?>
		<?php elseif ( $st_h2_designsetting === 'underdotdesign' ):    // 下線ドットデザインに変更（※要ボーダー色） ?>
		<?php else:    // なし、その他 ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php // H3 ?>
	<?php if ( $st_h3_no_css ): ?>   // カスタマイザーのCSSを無効化
	<?php else: ?>
		<?php if ( $st_h3_designsetting === 'hukidasidesign' ):    // 吹き出しデザインに変更（※要背景色） ?>
		<?php elseif ( $st_h3_designsetting === 'linedesign' ):    // 囲み&左ラインデザインに変更（※要ボーダー色） ?>
		<?php elseif ( $st_h3_designsetting === 'leftlinedesign' ):    // 左ラインデザインに変更（※要ボーダー色） ?>
			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper .h3modoki::after,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
				content: none;
				border: none;
			}
		<?php elseif ( $st_h3_designsetting === 'underlinedesign' ):    // 2色アンダーラインに変更（※要ボーダー色） ?>
		<?php elseif ( $st_h3_designsetting === 'gradient_underlinedesign' ):    // グラデーションアンダーラインに変更（※要ボーダー色） ?>
		<?php elseif ( $st_h3_designsetting === 'centerlinedesign' ):    // センターラインに変更（※要ボーダー色） ?>
			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				display: -webkit-box;
				display: -webkit-flex;
				display: -ms-flexbox;
				display: flex;
				-webkit-box-pack: justify;
				-webkit-justify-content: space-between;
				-ms-flex-pack: justify;
				justify-content: space-between;
				-webkit-box-align: center;
				-webkit-align-items: center;
				-ms-flex-align: center;
				align-items: center;
				padding-left: 0;
				padding-right: 0;
				text-align: center;
			}

			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper .h3modoki::after,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
				position: static;
				display: block;
				content: '';
				height: 1px;
				-webkit-box-flex: 1;
				-webkit-flex-grow: 1;
				-ms-flex-positive: 1;
				flex-grow: 1;
				border: 0;
				background-color: <?php echo $st_h3border_color; ?>;
			}

			.editor-styles-wrapper .h3modoki::before,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::before {
				margin-right: 20px;
			}

			.editor-styles-wrapper .h3modoki::after,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
				margin-left: 20px;
			}
		<?php elseif ( $st_h3_designsetting === 'dotdesign' ):    // 囲みドットデザインに変更（※要ボーダー色） ?>
			.editor-styles-wrapper .h3modoki,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title) {
				padding: 15px;
				<?php if ( $st_h3_text_center ): // 中央寄せ ?>
					text-align: center;
				<?php endif; ?>
			}

			.editor-styles-wrapper .h3modoki::after,
			.editor-styles-wrapper h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(#reply-title)::after {
				position: absolute;
				content: '';
				top: 6px;
				right: 6px;
				bottom: 6px;
				left: 6px;
				<?php if ( $st_h3border_undercolor ):    // ドットカラー ?>
					border: 1px dashed <?php echo $st_h3border_undercolor; ?>;
				<?php else: ?>
					border: 1px dashed <?php echo $st_h3border_color; ?>;
				<?php endif; ?>
			}
		<?php elseif ( $st_h3_designsetting === 'stripe_design' ):    // ストライプデザインに変更（※要背景色） ?>
		<?php elseif ( $st_h3_designsetting === 'underdotdesign' ):    // 下線ドットデザインに変更（※要ボーダー色） ?>
		<?php else:    // なし、その他 ?>
		<?php endif; ?>
	<?php endif; ?>

<?php endif;    // カスタマイザーの反映 ?>

/*--------------------------------
オリジナルブロック
---------------------------------*/
/* メモボックス */
.editor-styles-wrapper .wp-block-st-blocks-memo {
	<?php if ( $st_memo_block_bg_color ): ?>
		background-color: <?php echo $st_memo_block_bg_color; ?>;
	<?php endif; ?>
	<?php if ( $st_memo_block_border_color ): ?>
		border-color: <?php echo $st_memo_block_border_color; ?>;
	<?php endif; ?>
}

.editor-styles-wrapper .wp-block-st-blocks-memo .clip-fonticon {
	<?php if ( $st_memo_block_icon_color ): ?>
		color: <?php echo $st_memo_block_icon_color; ?>;
		border-color: <?php echo $st_memo_block_icon_color; ?>;
	<?php endif; ?>
}

/* マイボックス*/
.editor-styles-wrapper .wp-block-st-blocks-my-box{
	<?php if ( $st_mybox_block_bg_color ): ?>
		background-color: <?php echo $st_mybox_block_bg_color; ?>;
	<?php endif; ?>
	<?php if ( $st_mybox_block_border_color ): ?>
		border-color: <?php echo $st_mybox_block_border_color; ?>;
	<?php endif; ?>
}

.editor-styles-wrapper .wp-block-st-blocks-my-box .st-mybox-title {
	<?php if ( $st_mybox_block_icon_color ): ?>
		color: <?php echo $st_mybox_block_icon_color; ?>;
	<?php endif; ?>
	<?php if ( $st_mybox_block_border_color ): ?>
		border-bottom-color: <?php echo $st_mybox_block_border_color; ?>;
	<?php endif; ?>
}

/* 見出し付きフリーボックス */
.editor-styles-wrapper .wp-block-st-blocks-midashi-box.freebox {
	<?php if ( $st_freebox_block_bg_color ): ?>
		background-color: <?php echo $st_freebox_block_bg_color; ?>;
	<?php endif; ?>
	<?php if ( $st_freebox_block_border_color ): ?>
		border-color: <?php echo $st_freebox_block_border_color; ?>;
	<?php endif; ?>
}

.editor-styles-wrapper .wp-block-st-blocks-midashi-box .p-free {
	<?php if ( $st_freebox_block_border_color ): ?>
		border-color: <?php echo $st_freebox_block_border_color; ?>;
	<?php endif; ?>
}

.editor-styles-wrapper .wp-block-st-blocks-midashi-box .p-free .p-entry-f {
	<?php if ( $st_freebox_block_icon_color ): ?>
		color: <?php echo $st_freebox_block_icon_color; ?>;
	<?php endif; ?>
	<?php if ( $st_freebox_block_border_color ): ?>
		background-color: <?php echo $st_freebox_block_border_color; ?>;
	<?php endif; ?>
}

/* バナー風ボックス */
.editor-styles-wrapper .wp-block-st-blocks-flexbox {
	<?php if ( $st_banarbox_block_bg_color ): ?>
		background-color: <?php echo $st_banarbox_block_bg_color; ?>;
		padding: 20px;
	<?php endif; ?>
}

.editor-styles-wrapper .wp-block-st-blocks-flexbox .st-header-flextitle {
	<?php if ( $st_banarbox_block_icon_color ): ?>
		color: <?php echo $st_banarbox_block_icon_color; ?>;
	<?php endif; ?>
}

/*****************************************
 標準フォントサイズの反映
*****************************************/

/*media Queries タブレットサイズ（600px～959px）のみで適応したいCSS -タブレットのみ
---------------------------------------------------------------------------------------------------*/
@media only screen and (min-width: 600px) and (max-width: 959px) {

   <?php
    // H2タグ
    $st_tab_h2_fontsize = ( isset($GLOBALS['stdata295']) && trim($GLOBALS['stdata295']) !== '' ) ? (int)$GLOBALS['stdata295'] : 24 ;
    $st_tab_h2_lineheight = ( isset($GLOBALS['stdata296']) && trim($GLOBALS['stdata296']) !== '' ) ? (int)$GLOBALS['stdata296'] : 35 ;
    // H3タグ
    $st_tab_h3_fontsize = ( isset($GLOBALS['stdata297']) && trim($GLOBALS['stdata297']) !== '' ) ? (int)$GLOBALS['stdata297'] : 22 ;
    $st_tab_h3_lineheight = ( isset($GLOBALS['stdata298']) && trim($GLOBALS['stdata298']) !== '' ) ? (int)$GLOBALS['stdata298'] : 32 ;
    // H4タグ
    $st_tab_h4_fontsize = ( isset($GLOBALS['stdata299']) && trim($GLOBALS['stdata299']) !== '' ) ? (int)$GLOBALS['stdata299'] : 21 ;
    $st_tab_h4_lineheight = ( isset($GLOBALS['stdata300']) && trim($GLOBALS['stdata300']) !== '' ) ? (int)$GLOBALS['stdata300'] : 31 ;
    ?>
}

/*media Queries PCサイズ
----------------------------------------------------*/
@media only screen and (min-width: 960px) {

    <?php
    // H2タグ
    $st_pc_h2_fontsize = ( isset($GLOBALS['stdata285']) && trim($GLOBALS['stdata285']) !== '' ) ? (int)$GLOBALS['stdata285'] : 22 ;
    $st_pc_h2_lineheight = ( isset($GLOBALS['stdata286']) && trim($GLOBALS['stdata286']) !== '' ) ? (int)$GLOBALS['stdata286'] : 32 ;
    // H3タグ
    $st_pc_h3_fontsize = ( isset($GLOBALS['stdata287']) && trim($GLOBALS['stdata287']) !== '' ) ? (int)$GLOBALS['stdata287'] : 20 ;
    $st_pc_h3_lineheight = ( isset($GLOBALS['stdata288']) && trim($GLOBALS['stdata288']) !== '' ) ? (int)$GLOBALS['stdata288'] : 30 ;
    // H4タグ
    $st_pc_h4_fontsize = ( isset($GLOBALS['stdata289']) && trim($GLOBALS['stdata289']) !== '' ) ? (int)$GLOBALS['stdata289'] : 16 ;
    $st_pc_h4_lineheight = ( isset($GLOBALS['stdata290']) && trim($GLOBALS['stdata290']) !== '' ) ? (int)$GLOBALS['stdata290'] : 26 ;
    ?>
}

/*media Queries スマホのみ（599px）以下
---------------------------------------------------------------------------------------------------*/
@media only screen and (max-width: 599px) {

    <?php
    // H2タグ
    $st_sp_h2_fontsize = ( isset($GLOBALS['stdata305']) && trim($GLOBALS['stdata305']) !== '' ) ? (int)$GLOBALS['stdata305'] : 20 ;
    $st_sp_h2_lineheight = ( isset($GLOBALS['stdata306']) && trim($GLOBALS['stdata306']) !== '' ) ? (int)$GLOBALS['stdata306'] : 27 ;
    // H3タグ
    $st_sp_h3_fontsize = ( isset($GLOBALS['stdata307']) && trim($GLOBALS['stdata307']) !== '' ) ? (int)$GLOBALS['stdata307'] : 19 ;
    $st_sp_h3_lineheight = ( isset($GLOBALS['stdata308']) && trim($GLOBALS['stdata308']) !== '' ) ? (int)$GLOBALS['stdata308'] : 27 ;
    // H4タグ
    $st_sp_h4_fontsize = ( isset($GLOBALS['stdata309']) && trim($GLOBALS['stdata309']) !== '' ) ? (int)$GLOBALS['stdata309'] : 17 ;
    $st_sp_h4_lineheight = ( isset($GLOBALS['stdata310']) && trim($GLOBALS['stdata310']) !== '' ) ? (int)$GLOBALS['stdata310'] : 26 ;
    ?>
}

<?php if ( trim( $GLOBALS['stdata499'] ) !== '' ): // 要素にドロップシャドウを追加
	echo esc_attr($GLOBALS['stdata499']) . ','; endif; ?>
	.editor-styles-wrapper .st-box-shadow {
		box-shadow: 0 1px 2px rgba(0,0,0,0.2);
		box-sizing: border-box;
	}

<?php if ( trim( $GLOBALS['stdata629'] ) !== '' ): // 要素にテキストシャドウを追加
	echo esc_attr($GLOBALS['stdata629']);?>
	{
		text-shadow: 1px 1px 0 rgb(0,0,0,0.3);
	}
<?php endif; ?>

/* 関連ラベル - ブログカード */
.editor-styles-wrapper .wp-block-embed.kanren .wp-block-embed__wrapper:before {
	content: "\f0c1 \0020 関連";
	font-family: stsvg!important;
    position: absolute;
    font-size: 13px;
    color: #fff;
    top: 0;
    left: 0;
    background-color: #66BB6A;
    padding: 5px 10px;
	z-index: 1;
}

/* 人気ラベル - ブログカード */
.editor-styles-wrapper .wp-block-embed.popular .wp-block-embed__wrapper:before {
	content: "\f201 \0020 人気";
	font-family: stsvg!important;
    position: absolute;
    font-size: 13px;
    color: #fff;
    top: 0;
    left: 0;
    background-color: #FFA726;
    padding: 5px 10px;
	z-index: 1;
}

/* チェック - ブログカード */
.editor-styles-wrapper .wp-block-embed.check .wp-block-embed__wrapper:before {
	content: "\f00c \0020 確認";
	font-family: stsvg!important;
    position: absolute;
    font-size: 13px;
    color: #fff;
    top: 0;
    left: 0;
    background-color: #42A5F5;
    padding: 5px 10px;
	z-index: 1;
}

/* 重要ラベル - ブログカード */
.editor-styles-wrapper .wp-block-embed.important .wp-block-embed__wrapper:before {
	content: "\f06a \0020 重要";
	font-family: stsvg!important;
    position: absolute;
    font-size: 13px;
    color: #fff;
    top: 0;
    left: 0;
    background-color: #EF5350;
    padding: 5px 10px;
	z-index: 1;
}


/*--------------------------------------------------------------
 * 5.9ブロックスタイル プレビュー
 * .components-popover__content ドロップダウンプレビュー
 * 右サイドバープレビュー
---------------------------------------------------------------*/
.editor-styles-wrapper .block-editor-block-list__block {
    box-sizing: border-box;
}

/* カラーパレット背景色 */
/*.block-editor-color-gradient-control + .block-editor-color-gradient-control .components-circular-option-picker__option,
.block-editor-color-gradient-control + .block-editor-color-gradient-control .components-circular-option-picker__option-wrapper:before,
.block-editor-color-gradient-control + .block-editor-color-gradient-control .components-circular-option-picker__option:after {
	border-radius: 0;
}*/

.components-panel__body .block-editor-color-gradient-control:nth-child(odd) .components-circular-option-picker__option,
.components-panel__body .block-editor-color-gradient-control:nth-child(odd) .components-circular-option-picker__option-wrapper:before,
.components-panel__body .block-editor-color-gradient-control:nth-child(odd) .components-circular-option-picker__option:after {
	border-radius: 0;
}

/* 基本 */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper [class^="is-style-st-paragraph-"],
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper [class*=" is-style-st-paragraph-"],
.block-editor-block-preview__content-iframe .editor-styles-wrapper [class^="is-style-st-paragraph-"],
.block-editor-block-preview__content-iframe .editor-styles-wrapper [class*=" is-style-st-paragraph-"] {
	position: relative;
	padding: 30px 20px;
	display: flex;
	align-items: center;
	border-radius: 5px;
	margin: 0;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper [class^="is-style-st-paragraph-"],
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper [class*=" is-style-st-paragraph-"],
.block-editor-block-preview__content-iframe .editor-styles-wrapper [class^="is-style-st-paragraph-"],
.block-editor-block-preview__content-iframe .editor-styles-wrapper [class*=" is-style-st-paragraph-"] {
	padding: 100px 20px;
	box-shadow: none!important;
}

/** before */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper [class^="is-style-st-paragraph-"]::before,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper [class*=" is-style-st-paragraph-"]::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper [class^="is-style-st-paragraph-"]::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper [class*=" is-style-st-paragraph-"]::before {
	font-size: 5rem!important;
	left: .5em;
}

/** after */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper [class^="is-style-st-paragraph-"]::after,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper [class*=" is-style-st-paragraph-"]::after,
.block-editor-block-preview__content-iframe .editor-styles-wrapper [class^="is-style-st-paragraph-"]::after,
.block-editor-block-preview__content-iframe .editor-styles-wrapper [class*=" is-style-st-paragraph-"]::after {
	font-size: 3rem!important;
	top: calc( 50% + 1em );
	border: none;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper p,
.block-editor-block-preview__content-iframe .editor-styles-wrapper p {
	color: transparent!important;
	line-height: 0;
	display: flex;
	font-size: 1px!important;
}

/*--------------------------------
ブロックスタイル グループ
---------------------------------*/
/* WP6.5.3 */
:root .editor-styles-wrapper .is-layout-constrained > :where(.is-style-st-paragraph-button:not(.has-text-align-center):not(.has-text-align-right), .is-style-st-paragraph-marumozi:not(.has-text-align-center):not(.has-text-align-right), .is-style-st-paragraph-bubble:not(.has-text-align-center):not(.has-text-align-right), .is-style-st-paragraph-kaiwa ) {
    margin-left: inherit !important;
    margin-right: inherit !important;
}

:root .editor-styles-wrapper .is-layout-constrained > :where(.is-style-st-paragraph-button.has-text-align-right, .is-style-st-paragraph-marumozi.has-text-align-right, .is-style-st-paragraph-bubble.has-text-align-right ) {
    margin-left: auto !important;
    margin-right: 0 !important;
}

/* 斜線 */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-group-bg-diagonal,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-group-bg-diagonal {
	background-image: -webkit-gradient(linear, 0 0, 100% 100%,color-stop(.25, #eee), color-stop(.25, transparent),color-stop(.5, transparent), color-stop(.5, #eee),color-stop(.75, #eee), color-stop(.75, transparent),to(transparent));
    background-size: 30px 30px;
}

/* グリッド */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-group-bg-grid,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-group-bg-grid {
	background-image: linear-gradient( transparent 95%, rgba(0, 0, 0, .05) 50%, rgba(0, 0, 0, .05)), linear-gradient( 90deg, transparent 95%, rgba(0, 0, 0, .05) 50%, rgba(0, 0, 0, .05) );
	background-size: 50px 50px!important;
	background-repeat: repeat;
}

/* ドット */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-group-bg-dot,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-group-bg-dot {
	background-image: radial-gradient(#ccc 5px, transparent 5px);
	background-size: 50px 50px!important;
}

/*--------------------------------
ブロックスタイル 見出し
---------------------------------*/
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading {
	font-size: 2.5em;
	line-height: 2.5em;
	margin: 0;
	padding: 0 30px!important;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading.is-style-st-heading-custom-count::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading.is-style-st-heading-custom-count::before {
	height: calc(6px + 1.4em);
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading:not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-step)::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading:not(.is-style-st-heading-custom-count):not(.is-style-st-heading-custom-step)::before {
	font-size: 2em;
}

/* ステップ */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading.is-style-st-heading-custom-step,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading.is-style-st-heading-custom-step {
	align-items: center;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading.is-style-st-heading-custom-step::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .wp-block-heading.is-style-st-heading-custom-step::before {
	min-height: calc( 1em + 30px );
}

/* 斜線 */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-heading-custom-diagonal,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-heading-custom-diagonal {
	background-image: -webkit-gradient(linear, 0 0, 100% 100%,color-stop(.25, #eee), color-stop(.25, transparent),color-stop(.5, transparent), color-stop(.5, #eee),color-stop(.75, #eee), color-stop(.75, transparent),to(transparent));
    background-size: 30px 30px;
}

/*--------------------------------
ブロックスタイル 段落
---------------------------------*/
/* 囲みドット */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-dotline::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-dotline::before {
    border: 5px dashed #fff;
	top: inherit;
	left: 10px;
}

/* まるもじ */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-marumozi,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-marumozi {
	border-radius: 100px!important;
}

/* ふきだし */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-bubble::after,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-bubble::after {
	content: '';
	position: absolute;
 	margin-left: -10px;
	border: 50px solid transparent;
	border-top: 50px solid #f3f3f3;
	top: 100%;
	left: 1.5em;
	padding: 0;
	margin-right: 0;
	line-height: .8em;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-bubble,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-bubble {
    margin-bottom: 50px;
}

/* リスト基本 */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .block-editor-block-list__layout ol li,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .block-editor-block-list__layout ul li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .block-editor-block-list__layout ol li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .block-editor-block-list__layout ul li {
	font-size: 40px!important;
	line-height: 1.5em!important;
	margin-left: 30px!important;
}

/* チェックボックス */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-square-checkbox-no-border li,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-square-checkbox-no-border li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-square-checkbox-no-border li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-square-checkbox-no-border li,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-square-checkbox li,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-square-checkbox li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-square-checkbox li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-square-checkbox li {
    margin-bottom: 0;
    padding-bottom: 0!important;
}

/* ナンバリング（リスト） */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno li,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno li {
    padding-left: 80px!important;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno li::before,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno li::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno li::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno li::before {
    width: 60px!important;
    height: 60px!important;
    font-size: 24px!important;
    line-height: 60px!important;
}

/* ナンバリング四角（リスト） */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-no-border li,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-no li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-no-border li,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-no li {
    padding-left: 80px!important;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-no-border li::before,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-no li::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-no-border li::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-no li::before {
    width: 60px!important;
    height: 60px!important;
    font-size: 24px!important;
    line-height: 60px!important;
}

/* チェックリスト ナンバリング */
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruno > li::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper ul.is-style-st-maruck > li::before {
    margin-left: 0;
}

/* 簡易ボタン */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-button,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-button {
	line-height: 1em;
	padding: 0!important;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-button::after,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-button::after {
	right: 1em;
}

/* 簡易会話ふきだし */
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa-b,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa-b {
	justify-content: center;
	margin: 50px 0;
	background-color: transparent;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa::before,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa-b::before,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa-b::before {
	top: -80px!important;
	left: inherit!important;
	content: '';
	display: inline-block;
	width: 4em;
	height: 4em;
	background-size: contain;
	vertical-align: middle;
	border-radius: 50%;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa::after,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa::after,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa-b::after,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa-b::after {
    display: none;
}

.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa .st-paragraph-kaiwa-text,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa .st-paragraph-kaiwa-text,
.components-popover__content .block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa-b .st-paragraph-kaiwa-text,
.block-editor-block-preview__content-iframe .editor-styles-wrapper .is-style-st-paragraph-kaiwa-b .st-paragraph-kaiwa-text {
	display: none;
}
