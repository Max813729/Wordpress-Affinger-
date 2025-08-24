<?php
/**
 * カスタマイザー用CSS (CSS)
 */

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

$st_is_ex    = st_is_ver_ex();
$st_is_af    = st_is_ver_af();
$st_is_st    = st_is_ver_st();
$st_is_ex_af = st_is_ver_ex_af();
// カスタマイザー簡単設定のカラーを取得
$patterncolors     = st_get_kantan_colors();
// AFFINGER管理のカラーパターンを取得
// カスタマイザー”簡単設定を使用する” 有効時のみ簡単設定のカラーを優先する
$preset_colors = st_get_preset_colors( st_get_preset_name() );

$key_patterncolor      = ( $patterncolors['keycolor'] ) ? $patterncolors['keycolor'] : $preset_colors['basecolor'];
$main_patterncolor     = ( $patterncolors['maincolor'] ) ? $patterncolors['maincolor'] : $preset_colors['maincolor'];
$sub_patterncolor      = ( $patterncolors['subcolor'] ) ? $patterncolors['subcolor'] : $preset_colors['subcolor'];
$text_patterncolor     = ( $patterncolors['textcolor'] ) ? $patterncolors['textcolor'] : $preset_colors['textcolor'];

// Gutenbergカラーパレットが空の場合は基本カラーを反映する
$original_color_a = get_option( 'st-data460', '' ) !== '' ? get_option( 'st-data460' ) : $key_patterncolor;
$original_color_b = get_option( 'st-data461', '' ) !== '' ? get_option( 'st-data461' ) : $main_patterncolor;
$original_color_c = get_option( 'st-data462', '' ) !== '' ? get_option( 'st-data462' ) : $sub_patterncolor;
$original_color_d = get_option( 'st-data463', '' ) !== '' ? get_option( 'st-data463' ) : $text_patterncolor;
?>

/* 基本カラー */
.keycolor {
	color: <?php echo $key_patterncolor; ?>;
}
.maincolor {
	color: <?php echo $main_patterncolor; ?>;
}
.subcolor {
	color: <?php echo $sub_patterncolor; ?>;
}
.textcolor {
	color: <?php echo $text_patterncolor; ?>;
}

.keycolor-bc {
	background: <?php echo $key_patterncolor; ?>;
}
.maincolor-bc {
	background: <?php echo $main_patterncolor; ?>;
}
.subcolor-bc {
	background: <?php echo $sub_patterncolor; ?>;
}
.textcolor-bc {
	background: <?php echo $text_patterncolor; ?>;
}

/*-------------------------------------------
 * デザインパターン
 *-------------------------------------------/

<?php // カラーパターン「リセット」+デザインパターン「リセット」
if (( isset( $GLOBALS['stdata261'] ) && $GLOBALS['stdata261'] === 'reset' ) && ( trim( $GLOBALS['stdata68'] ) === '' )): ?>
	h2.has-st-regular-font-size,
	.h2modoki,
	h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	.post h3.has-st-regular-font-size,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2):not(.rankh3):not(.post-card-title):not(#reply-title),
	.h3modoki,
	.post h4.has-st-regular-font-size,
	.h4modoki,
	.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2):not(.point):not(.rankh4) {
		 padding-left: 0;
	}
<?php endif; ?>

/*-------------------------------------------
旧st-kanri.phpより移動（ここから）
*/

<?php if($st_kaiwa_bgcolor): // カスタマイザー会話ふきだしカラー ?>
	/* 簡易会話ふきだし */
	.is-style-st-paragraph-kaiwa .st-paragraph-kaiwa-text,
	.is-style-st-paragraph-kaiwa-b .st-paragraph-kaiwa-text {
		background-color: <?php echo $st_kaiwa_bgcolor; ?>;
	}
	.is-style-st-paragraph-kaiwa::after,
	.is-style-st-paragraph-kaiwa-b::after {
		border-right-color: <?php echo $st_kaiwa_bgcolor; ?>;
	}
<?php endif; ?>

<?php if($st_kaiwa2_bgcolor): ?>
	/* 簡易会話ふきだしB */
	.is-style-st-paragraph-kaiwa-b .st-paragraph-kaiwa-text {
		background-color: <?php echo $st_kaiwa2_bgcolor; ?>;
	}
	.is-style-st-paragraph-kaiwa-b::after {
		border-right-color: <?php echo $st_kaiwa2_bgcolor; ?>;
	}
<?php endif; ?>

/*--------------------------------
Gutenberg カラーパレット
---------------------------------*/
:root .has-pale-pink-color.is-style-st-heading-custom-attention::before,
:root .has-pale-pink-color.is-style-st-heading-custom-check::before,
:root .has-pale-pink-color {
	color: <?php echo ST_COLOR_PALE_PINK; ?> !important;
}

:root .has-soft-red-color.is-style-st-heading-custom-attention::before,
:root .has-soft-red-color.is-style-st-heading-custom-check::before,
:root .has-soft-red-color {
	color: <?php echo ST_COLOR_SOFT_RED; ?> !important;
}

:root .has-light-grayish-red-color.is-style-st-heading-custom-attention::before,
:root .has-light-grayish-red-color.is-style-st-heading-custom-check::before,
:root .has-light-grayish-red-color {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?> !important;
}

:root .has-vivid-yellow-color.is-style-st-heading-custom-attention::before,
:root .has-vivid-yellow-color.is-style-st-heading-custom-check::before,
:root .has-vivid-yellow-color {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?> !important;
}

:root .has-very-pale-yellow-color.is-style-st-heading-custom-attention::before,
:root .has-very-pale-yellow-color.is-style-st-heading-custom-check::before,
:root .has-very-pale-yellow-color {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?> !important;
}

:root .has-light-green-cyan-color.is-style-st-heading-custom-attention::before,
:root .has-light-green-cyan-color.is-style-st-heading-custom-check::before,
:root .has-light-green-cyan-color {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
}

:root .has-pale-cyan-blue-color.is-style-st-heading-custom-attention::before,
:root .has-pale-cyan-blue-color.is-style-st-heading-custom-check::before,
:root .has-pale-cyan-blue-color {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}

:root .has-pale-cyan-blue-color.is-style-st-heading-custom-attention::before,
:root .has-pale-cyan-blue-color.is-style-st-heading-custom-check::before,
:root .has-pale-cyan-blue-color {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}

:root .has-vivid-cyan-blue-color.is-style-st-heading-custom-attention::before,
:root .has-vivid-cyan-blue-color.is-style-st-heading-custom-check::before,
:root .has-vivid-cyan-blue-color {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?> !important;
}

:root .has-very-light-gray-color.is-style-st-heading-custom-attention::before,
:root .has-very-light-gray-color.is-style-st-heading-custom-check::before,
:root .has-very-light-gray-color {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?> !important;
}

:root .has-very-dark-gray-color.is-style-st-heading-custom-attention::before,
:root .has-very-dark-gray-color.is-style-st-heading-custom-check::before,
:root .has-very-dark-gray-color {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?> !important;
}

:root .has-white-color.is-style-st-heading-custom-attention::before,
:root .has-white-color.is-style-st-heading-custom-check::before,
:root .has-white-color {
	color: <?php echo ST_COLOR_WHITE; ?> !important;
}

:root .has-pale-pink-background-color {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?> !important;
}

:root .has-soft-red-background-color {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?> !important;
}

:root .has-light-grayish-red-background-color {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?> !important;
}

:root .has-vivid-yellow-background-color {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?> !important;
}

:root .has-very-pale-yellow-background-color {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?> !important;
}

:root .has-light-green-cyan-background-color {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
}

:root .has-pale-cyan-blue-background-color {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}

:root .has-vivid-cyan-blue-background-color {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?> !important;
}

:root .has-very-light-gray-background-color {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?> !important;
}

:root .has-very-dark-gray-background-color {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?> !important;
}

:root .has-white-background-color {
	background-color: <?php echo ST_COLOR_WHITE; ?> !important;
}

:root .has-soft-red-border-color {
	border-color: <?php echo ST_COLOR_SOFT_RED; ?> !important;
}

:root .has-light-grayish-red-border-color {
	border-color: <?php echo ST_COLOR_LIGHT_G_RED; ?> !important;
}

:root .has-vivid-yellow-border-color {
	border-color: <?php echo ST_COLOR_VIVID_YELLOW; ?> !important;
}

:root .has-very-pale-yellow-border-color {
	border-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?> !important;
}

:root .has-light-green-cyan-border-color {
	border-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
}

:root .has-pale-cyan-blue-border-color {
	border-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}

:root .has-vivid-cyan-blue-border-color {
	border-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?> !important;
}

:root .has-very-light-gray-border-color {
	border-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?> !important;
}

:root .has-very-dark-gray-border-color {
	border-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?> !important;
}

:root .has-white-border-color {
	border-color: <?php echo ST_COLOR_WHITE; ?> !important;
}

<?php if ( _st_plugin_support_is_enabled( 'ST_BLOCKS', 'st-blocks' ) ): ?>
	/* タブ > タブブロック > ブロックスタイルのデフォルト設定 (デフォルト) */
	<?php if ( isset( $GLOBALS['stdata659'] ) && trim( $GLOBALS['stdata659'] ) !== '' ): ?>
		.st-tabs.is-style-default .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata659']; ?>;
		}

		.st-tabs.is-style-default .st-tabs__tab-list-item {
			color: var(--st--color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata660'] ) && trim( $GLOBALS['stdata660'] ) !== '' ): ?>
		.st-tabs.is-style-default .st-tabs__tab-list {
			--st--background-color: <?php echo $GLOBALS['stdata660']; ?>;
		}

		.st-tabs.is-style-default .st-tabs__tab-list-item {
			background-color: var(--st--background-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata661'] ) && trim( $GLOBALS['stdata661'] ) !== '' ): ?>
		.st-tabs.is-style-default .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata661']; ?>;
		}

		.st-tabs.is-style-default .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata662'] ) && trim( $GLOBALS['stdata662'] ) !== '' ): ?>
		.st-tabs.is-style-default .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata662']; ?>px;
		}

		.st-tabs.is-style-default .st-tabs__tab-list-item {
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
		.st-tabs.is-style-st-square .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata663']; ?>;
		}

		.st-tabs.is-style-st-square .st-tabs__tab-list-item {
			color: var(--st--color);
		}
	<?php endif; ?>

	<?php if (
		( isset( $GLOBALS['stdata664'] ) && trim( $GLOBALS['stdata664'] ) !== '' ) ||
		( isset( $GLOBALS['stdata665'] ) && trim( $GLOBALS['stdata665'] ) !== '' )
	): ?>
		.st-tabs.is-style-st-square .st-tabs__tab-content {
			margin-top: 5px;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata664'] ) && trim( $GLOBALS['stdata664'] ) !== '' ): ?>
		.st-tabs.is-style-st-square .st-tabs__tab-list {
			--st--background-color: <?php echo $GLOBALS['stdata664']; ?>;
		}

		.st-tabs.is-style-st-square .st-tabs__tab-list-item {
			background-color: var(--st--background-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata665'] ) && trim( $GLOBALS['stdata665'] ) !== '' ): ?>
		.st-tabs.is-style-st-square .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata665']; ?>;
		}

		.st-tabs.is-style-st-square .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata666'] ) && trim( $GLOBALS['stdata666'] ) !== '' ): ?>
		.st-tabs.is-style-st-square .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata666']; ?>px;
		}

		.st-tabs.is-style-st-square .st-tabs__tab-list-item {
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
		.st-tabs.is-style-st-bubble .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata667']; ?>;
		}

		.st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
			color: <?php echo $GLOBALS['stdata667']; ?>;
		}
	<?php endif; ?>

	<?php if (
		( isset( $GLOBALS['stdata668'] ) && trim( $GLOBALS['stdata668'] ) !== '' ) ||
		( isset( $GLOBALS['stdata669'] ) && trim( $GLOBALS['stdata669'] ) !== '' )
	): ?>
		.st-tabs.is-style-st-bubble .st-tabs__tab-content {
			margin-top: 10px;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata668'] ) && trim( $GLOBALS['stdata668'] ) !== '' ): ?>
		.st-tabs.is-style-st-bubble .st-tabs__tab-list {
			--st--background-color: <?php echo $GLOBALS['stdata668']; ?>;
		}

		.st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
			background-color: var(--st--background-color);
		}

		.st-tabs.is-style-st-bubble .st-tabs__tab[aria-selected="true"]::after {
			border-top-color: var(--st--background-color);
			border-right-color: transparent;
			border-bottom-color: transparent;
			border-left-color: transparent;
		}

		.st-tabs.is-style-st-bubble .has-no-border .st-tabs__tab[aria-selected="true"]::before {
			content: normal;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata669'] ) && trim( $GLOBALS['stdata669'] ) !== '' ): ?>
		.st-tabs.is-style-st-bubble .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata669']; ?>;
		}

		.st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata670'] ) && trim( $GLOBALS['stdata670'] ) !== '' ): ?>
		.st-tabs.is-style-st-bubble .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata670']; ?>px;
		}

		.st-tabs.is-style-st-bubble .st-tabs__tab-list-item {
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

		.st-tabs.is-style-st-bubble .st-tabs__tab[aria-selected="true"]::before {
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
		.st-tabs.is-style-st-tab .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata671']; ?>;
		}

		.st-tabs.is-style-st-tab .st-tabs__tab-list-item {
			color: var(--st--color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata672'] ) && trim( $GLOBALS['stdata672'] ) !== '' ): ?>
		.st-tabs.is-style-st-tab .st-tabs__tab-list {
			background-color: var(--st--background-color);
		}

		.st-tabs.is-style-st-tab .st-tabs__tab-list-item {
			background-color: <?php echo $GLOBALS['stdata672']; ?>;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata673'] ) && trim( $GLOBALS['stdata673'] ) !== '' ): ?>
		.st-tabs.is-style-st-tab .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata673']; ?>;
		}

		.st-tabs.is-style-st-tab .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata674'] ) && trim( $GLOBALS['stdata674'] ) !== '' ): ?>
		.st-tabs.is-style-st-tab .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata674']; ?>px;
		}

		.st-tabs.is-style-st-tab .st-tabs__tab-list-item {
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
		.st-tabs.is-style-st-border .st-tabs__tab-list {
			--st--color: <?php echo $GLOBALS['stdata675']; ?>;
		}

		.st-tabs.is-style-st-border .st-tabs__tab-list-item {
			color: var(--st--color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata676'] ) && trim( $GLOBALS['stdata676'] ) !== '' ): ?>
		.st-tabs.is-style-st-border .st-tabs__tab-list {
			--st--background-color: <?php echo $GLOBALS['stdata676']; ?>;
		}

		.st-tabs.is-style-st-border .st-tabs__tab-list-item {
			background-color: var(--st--background-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata677'] ) && trim( $GLOBALS['stdata677'] ) !== '' ): ?>
		.st-tabs.is-style-st-border .st-tabs__tab-list {
			--st--border-color: <?php echo $GLOBALS['stdata677']; ?>;
		}

		.st-tabs.is-style-st-border .st-tabs__tab-list-item {
			border-color: var(--st--border-color);
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata678'] ) && trim( $GLOBALS['stdata678'] ) !== '' ): ?>
		.st-tabs.is-style-st-border .st-tabs__tab-list {
			--st--border-width: <?php echo $GLOBALS['stdata678']; ?>px;
		}

		.st-tabs.is-style-st-border .st-tabs__tab-list-item {
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

	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.st-tabs.is-style-st-bubble .has-border.has-pale-pink-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-pale-pink-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_PALE_PINK; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-soft-red-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-soft-red-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-light-grayish-red-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-light-grayish-red-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-vivid-yellow-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-vivid-yellow-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-very-pale-yellow-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-very-pale-yellow-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-light-green-cyan-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-light-green-cyan-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-pale-cyan-blue-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-pale-cyan-blue-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-vivid-cyan-blue-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-vivid-cyan-blue-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-very-light-gray-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-very-light-gray-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-very-dark-gray-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-very-dark-gray-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	}

	.st-tabs.is-style-st-bubble .has-border.has-white-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-white-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo ST_COLOR_WHITE; ?>;
	}
<?php endif; ?>

/** インラインの文字色（カラーパレット） */
.has-inline-color.has-pale-pink-color {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.has-inline-color.has-soft-red-color {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.has-inline-color.has-light-grayish-red-color {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.has-inline-color.has-vivid-yellow-color {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.has-inline-color.has-very-pale-yellow-color {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.has-inline-color.has-light-green-cyan-color {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.has-inline-color.has-pale-cyan-blue-color {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.has-inline-color.has-vivid-cyan-blue-color {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.has-inline-color.has-very-light-gray-color {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.has-inline-color.has-very-dark-gray-color {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.has-inline-color.has-white-color {
	color: <?php echo ST_COLOR_WHITE; ?>;
}

/** カラーパレット（文字色）選択時のアイコン */
[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-pale-pink-color::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-soft-red-color::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-light-grayish-red-color::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-vivid-yellow-color::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-very-pale-yellow-color::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-light-green-cyan-color::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-pale-cyan-blue-color::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-vivid-cyan-blue-color::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-very-light-gray-color::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-very-dark-gray-color::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-white-color::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット選択時の見出しライン */
.is-style-st-heading-custom-line.has-pale-pink-color::after {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.is-style-st-heading-custom-line.has-soft-red-color::after {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.is-style-st-heading-custom-line.has-light-grayish-red-color::after {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.is-style-st-heading-custom-line.has-vivid-yellow-color::after {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.is-style-st-heading-custom-line.has-very-pale-yellow-color::after {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.is-style-st-heading-custom-line.has-light-green-cyan-color::after {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.is-style-st-heading-custom-line.has-pale-cyan-blue-color::after {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.is-style-st-heading-custom-line.has-vivid-cyan-blue-color::after {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.is-style-st-heading-custom-line.has-very-light-gray-color::after {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.is-style-st-heading-custom-line.has-very-dark-gray-color::after {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.is-style-st-heading-custom-line.has-white-color::after {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット（背景色）選択時のふきだし */
.is-style-st-paragraph-kaiwa.has-pale-pink-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-pale-pink-background-color::after {
	border-right-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-pale-pink-background-color::after {
	border-top-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-pale-pink-background-color::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-pale-pink-background-color::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
.is-style-st-heading-custom-step.has-pale-pink-background-color::after {
    border-color: <?php echo ST_COLOR_PALE_PINK; ?>;
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.is-style-st-paragraph-kaiwa.has-soft-red-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-soft-red-background-color::after {
	border-right-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-soft-red-background-color::after {
	border-top-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-soft-red-background-color::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-soft-red-background-color::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
.is-style-st-heading-custom-step.has-soft-red-background-color::after {
    border-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.is-style-st-paragraph-kaiwa.has-light-grayish-red-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-light-grayish-red-background-color::after {
	border-right-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-light-grayish-red-background-color::after {
	border-top-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-light-grayish-red-background-color::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-light-grayish-red-background-color::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
.is-style-st-heading-custom-step.has-light-grayish-red-background-color::after {
    border-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.is-style-st-paragraph-kaiwa.has-vivid-yellow-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-vivid-yellow-background-color::after {
	border-right-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-vivid-yellow-background-color::after {
	border-top-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-vivid-yellow-background-color::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-vivid-yellow-background-color::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
.is-style-st-heading-custom-step.has-vivid-yellow-background-color::after {
    border-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.is-style-st-paragraph-kaiwa.has-very-pale-yellow-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-very-pale-yellow-background-color::after {
	border-right-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-very-pale-yellow-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-very-pale-yellow-background-color::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-very-pale-yellow-background-color::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
.is-style-st-heading-custom-step.has-very-pale-yellow-background-color::after {
    border-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.is-style-st-paragraph-kaiwa.has-light-green-cyan-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-light-green-cyan-background-color::after {
	border-right-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-light-green-cyan-background-color::after {
	border-top-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
/* カウント */
.is-style-st-heading-custom-count.has-light-green-cyan-background-color::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
/* ステップ */
.is-style-st-heading-custom-step.has-light-green-cyan-background-color::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
.is-style-st-heading-custom-step.has-light-green-cyan-background-color::after {
    border-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.is-style-st-paragraph-kaiwa.has-pale-cyan-blue-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-pale-cyan-blue-background-color::after {
	border-right-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-pale-cyan-blue-background-color::after {
	border-top-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-pale-cyan-blue-background-color::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-pale-cyan-blue-background-color::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
.is-style-st-heading-custom-step.has-pale-cyan-blue-background-color::after {
    border-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.is-style-st-paragraph-kaiwa.has-vivid-cyan-blue-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-vivid-cyan-blue-background-color::after {
	border-right-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-vivid-cyan-blue-background-color::after {
	border-top-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-vivid-cyan-blue-background-color::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-vivid-cyan-blue-background-color::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
.is-style-st-heading-custom-step.has-vivid-cyan-blue-background-color::after {
    border-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.is-style-st-paragraph-kaiwa.has-very-light-gray-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-very-light-gray-background-color::after {
	border-right-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-very-light-gray-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-very-light-gray-background-color::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-very-light-gray-background-color::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
.is-style-st-heading-custom-step.has-very-light-gray-background-color::after {
    border-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.is-style-st-paragraph-kaiwa.has-very-dark-gray-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-very-dark-gray-background-color::after {
	border-right-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-very-dark-gray-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-very-dark-gray-background-color::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-very-dark-gray-background-color::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
.is-style-st-heading-custom-step.has-very-dark-gray-background-color::after {
    border-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.is-style-st-paragraph-kaiwa.has-white-background-color::after,
.is-style-st-paragraph-kaiwa-b.has-white-background-color::after {
	border-right-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
/* 見出しふきだし */
.is-style-st-heading-custom-bubble.has-white-background-color::after {
	border-top-color: <?php echo ST_COLOR_WHITE; ?>;
}
/* カウント */
.is-style-st-heading-custom-count.has-white-background-color::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
}
/* ステップ */
.is-style-st-heading-custom-step.has-white-background-color::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
}
.is-style-st-heading-custom-step.has-white-background-color::after {
    border-color: <?php echo ST_COLOR_WHITE; ?>;
	color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット（背景色）選択時の会話ふきだし背景色 */
.is-style-st-paragraph-kaiwa.has-pale-pink-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-pale-pink-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
.is-style-st-paragraph-kaiwa.has-soft-red-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-soft-red-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
.is-style-st-paragraph-kaiwa.has-light-grayish-red-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-light-grayish-red-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
.is-style-st-paragraph-kaiwa.has-vivid-yellow-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-vivid-yellow-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
.is-style-st-paragraph-kaiwa.has-very-pale-yellow-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-very-pale-yellow-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
.is-style-st-paragraph-kaiwa.has-light-green-cyan-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-light-green-cyan-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
.is-style-st-paragraph-kaiwa.has-pale-cyan-blue-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-pale-cyan-blue-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
.is-style-st-paragraph-kaiwa.has-vivid-cyan-blue-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-vivid-cyan-blue-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
.is-style-st-paragraph-kaiwa.has-very-light-gray-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-very-light-gray-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
.is-style-st-paragraph-kaiwa.has-very-dark-gray-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-very-dark-gray-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
.is-style-st-paragraph-kaiwa.has-white-background-color .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-white-background-color .st-paragraph-kaiwa-text {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット（背景色）選択時の会話吹き出し周りの背景色を無しに */
.is-style-st-paragraph-kaiwa.has-pale-pink-background-color,
.is-style-st-paragraph-kaiwa-b.has-pale-pink-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-soft-red-background-color,
.is-style-st-paragraph-kaiwa-b.has-soft-red-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-light-grayish-red-background-color,
.is-style-st-paragraph-kaiwa-b.has-light-grayish-red-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-vivid-yellow-background-color,
.is-style-st-paragraph-kaiwa-b.has-vivid-yellow-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-very-pale-yellow-background-color,
.is-style-st-paragraph-kaiwa-b.has-very-pale-yellow-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-light-green-cyan-background-color,
.is-style-st-paragraph-kaiwa-b.has-light-green-cyan-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-pale-cyan-blue-background-color,
.is-style-st-paragraph-kaiwa-b.has-pale-cyan-blue-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-vivid-cyan-blue-background-color,
.is-style-st-paragraph-kaiwa-b.has-vivid-cyan-blue-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-very-light-gray-background-color,
.is-style-st-paragraph-kaiwa-b.has-very-light-gray-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-very-dark-gray-background-color,
.is-style-st-paragraph-kaiwa-b.has-very-dark-gray-background-color {
	background-color: transparent!important;
}
.is-style-st-paragraph-kaiwa.has-white-background-color,
.is-style-st-paragraph-kaiwa-b.has-white-background-color {
	background-color: transparent!important;
}

/** カラーパレット（文字色）選択時のアイコン */
[class*="is-style-st-paragraph-"].has-pale-pink-color::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
	border-right-color: <?php echo ST_COLOR_PALE_PINK; ?> !important;
}

[class*="is-style-st-paragraph-"].has-soft-red-color::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
	border-right-color: <?php echo ST_COLOR_SOFT_RED; ?> !important;
}

[class*="is-style-st-paragraph-"].has-light-grayish-red-color::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	border-right-color: <?php echo ST_COLOR_LIGHT_G_RED; ?> !important;
}

[class*="is-style-st-paragraph-"].has-vivid-yellow-color::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	border-right-color: <?php echo ST_COLOR_VIVID_YELLOW; ?> !important;
}

[class*="is-style-st-paragraph-"].has-very-pale-yellow-color::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	border-right-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?> !important;
}

[class*="is-style-st-paragraph-"].has-light-green-cyan-color::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
	border-right-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?> !important;
}

[class*="is-style-st-paragraph-"].has-pale-cyan-blue-color::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	border-right-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?> !important;
}

[class*="is-style-st-paragraph-"].has-vivid-cyan-blue-color::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	border-right-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?> !important;
}

[class*="is-style-st-paragraph-"].has-very-light-gray-color::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	border-right-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?> !important;
}

[class*="is-style-st-paragraph-"].has-very-dark-gray-color::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	border-right-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?> !important;
}

[class*="is-style-st-paragraph-"].has-white-color::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
	border-right-color: <?php echo ST_COLOR_WHITE; ?> !important;
}

/** カラーパレット選択時のbox-shadow */
.is-style-st-paragraph-dotline.has-pale-pink-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_PALE_PINK; ?>;
}

.is-style-st-paragraph-dotline.has-soft-red-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_SOFT_RED; ?>;
}

.is-style-st-paragraph-dotline.has-light-grayish-red-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.is-style-st-paragraph-dotline.has-vivid-yellow-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.is-style-st-paragraph-dotline.has-very-pale-yellow-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.is-style-st-paragraph-dotline.has-light-green-cyan-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.is-style-st-paragraph-dotline.has-pale-cyan-blue-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.is-style-st-paragraph-dotline.has-vivid-cyan-blue-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.is-style-st-paragraph-dotline.has-very-light-gray-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.is-style-st-paragraph-dotline.has-very-dark-gray-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.is-style-st-paragraph-dotline.has-white-background-color {
	box-shadow: 0px 0px 0px 7px <?php echo ST_COLOR_WHITE; ?>;
}


/* カラーパレット選択時の吹き出し */
.is-style-st-paragraph-bubble.has-pale-pink-background-color::after {
	border-top-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.is-style-st-paragraph-bubble.has-soft-red-background-color::after {
	border-top-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.is-style-st-paragraph-bubble.has-light-grayish-red-background-color::after {
	border-top-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.is-style-st-paragraph-bubble.has-vivid-yellow-background-color::after {
	border-top-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.is-style-st-paragraph-bubble.has-very-pale-yellow-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.is-style-st-paragraph-bubble.has-light-green-cyan-background-color::after {
	border-top-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.is-style-st-paragraph-bubble.has-pale-cyan-blue-background-color::after {
	border-top-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.is-style-st-paragraph-bubble.has-vivid-cyan-blue-background-color::after {
	border-top-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.is-style-st-paragraph-bubble.has-very-light-gray-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.is-style-st-paragraph-bubble.has-very-dark-gray-background-color::after {
	border-top-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.is-style-st-paragraph-bubble.has-white-background-color::after {
	border-top-color: <?php echo ST_COLOR_WHITE; ?>;
}

/* オリジナルパレット */
<?php if( trim($original_color_a) !== '' ): //カラーA ?>
	.has-original-color-a-color.is-style-st-heading-custom-attention::before,
	.has-original-color-a-color.is-style-st-heading-custom-check::before,
	.has-original-color-a-color {
		color: <?php echo $original_color_a; ?> !important;
	}
	.has-original-color-a-background-color {
		background-color: <?php echo $original_color_a; ?> !important;
	}
	.has-original-color-a-border-color {
		border-color: <?php echo $original_color_a; ?> !important;
	}
	[class*="is-style-st-paragraph-"].has-original-color-a-color::before {
		color: <?php echo $original_color_a; ?>;
		border-right-color: <?php echo $original_color_a; ?>!important;
	}
	/* 簡易会話ふきだし */
	.is-style-st-paragraph-kaiwa.has-original-color-a-background-color .st-paragraph-kaiwa-text,
	.is-style-st-paragraph-kaiwa-b.has-original-color-a-background-color .st-paragraph-kaiwa-text {
		background-color: <?php echo $original_color_a; ?>;
	}
	.is-style-st-paragraph-kaiwa.has-original-color-a-background-color::after,
	.is-style-st-paragraph-kaiwa-b.has-original-color-a-background-color::after {
		border-right-color: <?php echo $original_color_a; ?>;
	}
	.is-style-st-paragraph-kaiwa.has-original-color-a-background-color,
	.is-style-st-paragraph-kaiwa-b.has-original-color-a-background-color {
		background-color: transparent!important;
	}
	/* 見出しアイコン */
	[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-original-color-a-color::before {
		color: <?php echo $original_color_a; ?>;
	}
	/* 見出しふきだし */
	.is-style-st-heading-custom-bubble.has-original-color-a-background-color::after {
		border-top-color: <?php echo $original_color_a; ?>;
	}
	/* 見出しライン */
	.is-style-st-heading-custom-line.has-original-color-a-color::after {
		background-color: <?php echo $original_color_a; ?>;
	}
	/* カウント */
	.is-style-st-heading-custom-count.has-original-color-a-color {
		color: <?php echo $original_color_a; ?>;
	}
	.is-style-st-heading-custom-count.has-original-color-a-background-color::before {
		color: <?php echo $original_color_a; ?>;
	}
	/* ステップ */
	.is-style-st-heading-custom-step.has-original-color-a-background-color::before {
		color: <?php echo $original_color_a; ?>;
	}
	.is-style-st-heading-custom-step.has-original-color-a-background-color::after {
		border-color: <?php echo $original_color_a; ?>;
		color: <?php echo $original_color_a; ?>;
	}
	/* 質問と答え */
	.is-style-st-heading-custom-question.has-original-color-a-color::before,
	.is-style-st-heading-custom-answer.has-original-color-a-color::before {
		color: <?php echo $original_color_a; ?>;
	}
	.is-style-st-heading-custom-question.has-original-color-a-background-color::before,
	.is-style-st-heading-custom-answer.has-original-color-a-background-color::before {
		background-color: <?php echo $original_color_a; ?>;
	}
	/* ランキング */
	.is-style-st-heading-custom-ranking.has-original-color-a-background-color::before {
		background-color: <?php echo $original_color_a; ?>;
		color: #fff!important;
	}
	/* グループ ライン */
	.is-style-st-group-line-bold.has-original-color-a-color,
	.is-style-st-group-line.has-original-color-a-color {
		border-left-color: <?php echo $original_color_a; ?>;
		color: inherit;
	}
	/* グループ かぎ括弧, 角括弧 */
	.is-style-st-group-corner-brackets.has-original-color-a-color::before,
	.is-style-st-group-corner-brackets.has-original-color-a-color::after,
	.is-style-st-group-square-brackets.has-original-color-a-color::before,
	.is-style-st-group-square-brackets.has-original-color-a-color::after {
		border-color: <?php echo $original_color_a; ?>;
	}
	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.st-tabs.is-style-st-bubble .has-border.has-original-color-a-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-original-color-a-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo $original_color_a; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_b) !== '' ): //カラーB ?>
	.has-original-color-b-color.is-style-st-heading-custom-attention::before,
	.has-original-color-b-color.is-style-st-heading-custom-check::before,
	.has-original-color-b-color {
		color: <?php echo $original_color_b; ?> !important;
	}
	.has-original-color-b-background-color {
		background-color: <?php echo $original_color_b; ?> !important;
	}
	.has-original-color-b-border-color {
		border-color: <?php echo $original_color_b; ?> !important;
	}
	[class*="is-style-st-paragraph-"].has-original-color-b-color::before {
		color: <?php echo $original_color_b; ?>;
		border-right-color: <?php echo $original_color_b; ?>!important;
	}
	/* 簡易会話ふきだし */
	.is-style-st-paragraph-kaiwa.has-original-color-b-background-color .st-paragraph-kaiwa-text,
	.is-style-st-paragraph-kaiwa-b.has-original-color-b-background-color .st-paragraph-kaiwa-text {
		background-color: <?php echo $original_color_b; ?>;
	}
	.is-style-st-paragraph-kaiwa.has-original-color-b-background-color::after,
	.is-style-st-paragraph-kaiwa-b.has-original-color-b-background-color::after {
		border-right-color: <?php echo $original_color_b; ?>;
	}
	.is-style-st-paragraph-kaiwa.has-original-color-b-background-color,
	.is-style-st-paragraph-kaiwa-b.has-original-color-b-background-color {
		background-color: transparent!important;
	}
	/* 見出しアイコン */
	[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-original-color-b-color::before {
		color: <?php echo $original_color_b; ?>;
	}
	/* 見出しふきだし */
	.is-style-st-heading-custom-bubble.has-original-color-b-background-color::after {
		border-top-color: <?php echo $original_color_b; ?>;
	}
	/* 見出しライン */
	.is-style-st-heading-custom-line.has-original-color-b-color::after {
		background-color: <?php echo $original_color_b; ?>;
	}
	/* カウント */
	.is-style-st-heading-custom-count.has-original-color-b-color {
		color: <?php echo $original_color_b; ?>;
	}
	.is-style-st-heading-custom-count.has-original-color-b-background-color::before {
		color: <?php echo $original_color_b; ?>;
	}
	/* ステップ */
	.is-style-st-heading-custom-step.has-original-color-b-background-color::before {
		color: <?php echo $original_color_b; ?>;
	}
	.is-style-st-heading-custom-step.has-original-color-b-background-color::after {
		border-color: <?php echo $original_color_b; ?>;
		color: <?php echo $original_color_b; ?>;
	}
	/* 質問と答え */
	.is-style-st-heading-custom-question.has-original-color-b-color::before,
	.is-style-st-heading-custom-answer.has-original-color-b-color::before {
		color: <?php echo $original_color_b; ?>;
	}
	.is-style-st-heading-custom-question.has-original-color-b-background-color::before,
	.is-style-st-heading-custom-answer.has-original-color-b-background-color::before {
		background-color: <?php echo $original_color_b; ?>;
	}
	/* ランキング */
	.is-style-st-heading-custom-ranking.has-original-color-b-background-color::before {
		background-color: <?php echo $original_color_b; ?>;
		color: #fff!important;
	}
	/* グループ ライン */
	.is-style-st-group-line-bold.has-original-color-b-color,
	.is-style-st-group-line.has-original-color-b-color {
		border-left-color: <?php echo $original_color_b; ?>;
		color: inherit;
	}
	/* グループ かぎ括弧, 角括弧 */
	.is-style-st-group-corner-brackets.has-original-color-b-color::before,
	.is-style-st-group-corner-brackets.has-original-color-b-color::after,
	.is-style-st-group-square-brackets.has-original-color-b-color::before,
	.is-style-st-group-square-brackets.has-original-color-b-color::after {
		border-color: <?php echo $original_color_b; ?>;
	}
	/* グループ かぎ括弧, 角括弧 */
	:root .is-style-st-group-corner-brackets,
	:root .is-style-st-group-square-brackets {
		color: inherit!important;
	}
	.is-style-st-group-corner-brackets.has-original-color-b-color::before,
	.is-style-st-group-corner-brackets.has-original-color-b-color::after,
	.is-style-st-group-square-brackets.has-original-color-b-color::before,
	.is-style-st-group-square-brackets.has-original-color-b-color::after {
		border-color: <?php echo $original_color_b; ?>;
	}
	/* タブ > タブブロック > ブロックスタイル: ふきだし */
	.st-tabs.is-style-st-bubble .has-border.has-original-color-b-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-original-color-b-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo $original_color_b; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_c) !== '' ): //カラーC ?>
	.has-original-color-c-color.is-style-st-heading-custom-attention::before,
	.has-original-color-c-color.is-style-st-heading-custom-check::before,
	.has-original-color-c-color {
		color: <?php echo $original_color_c; ?> !important;
	}
	.has-original-color-c-background-color {
		background-color: <?php echo $original_color_c; ?> !important;
	}
	.has-original-color-c-border-color {
		border-color: <?php echo $original_color_c; ?> !important;
	}
	[class*="is-style-st-paragraph-"].has-original-color-c-color::before {
		color: <?php echo $original_color_c; ?>;
		border-right-color: <?php echo $original_color_c; ?>!important;
	}
	/* 簡易会話ふきだし */
	.is-style-st-paragraph-kaiwa.has-original-color-c-background-color .st-paragraph-kaiwa-text,
	.is-style-st-paragraph-kaiwa-b.has-original-color-c-background-color .st-paragraph-kaiwa-text {
		background-color: <?php echo $original_color_c; ?>;
	}
	.is-style-st-paragraph-kaiwa.has-original-color-c-background-color::after,
	.is-style-st-paragraph-kaiwa-b.has-original-color-c-background-color::after {
		border-right-color: <?php echo $original_color_c; ?>;
	}
	.is-style-st-paragraph-kaiwa.has-original-color-c-background-color,
	.is-style-st-paragraph-kaiwa-b.has-original-color-c-background-color {
		background-color: transparent!important;
	}
	/* 見出しアイコン */
	[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-original-color-c-color::before {
		color: <?php echo $original_color_c; ?>;
	}
	/* 見出しふきだし */
	.is-style-st-heading-custom-bubble.has-original-color-c-background-color::after {
		border-top-color: <?php echo $original_color_c; ?>;
	}
	/* 見出しライン */
	.is-style-st-heading-custom-line.has-original-color-c-color::after {
		background-color: <?php echo $original_color_c; ?>;
	}
	/* カウント */
	.is-style-st-heading-custom-count.has-original-color-c-color {
		color: <?php echo $original_color_c; ?>;
	}
	.is-style-st-heading-custom-count.has-original-color-c-background-color::before {
		color: <?php echo $original_color_c; ?>;
	}
	/* ステップ */
	.is-style-st-heading-custom-step.has-original-color-c-background-color::before {
		color: <?php echo $original_color_c; ?>;
	}
	.is-style-st-heading-custom-step.has-original-color-c-background-color::after {
		border-color: <?php echo $original_color_c; ?>;
		color: <?php echo $original_color_c; ?>;
	}
	/* 質問と答え */
	.is-style-st-heading-custom-question.has-original-color-c-color::before,
	.is-style-st-heading-custom-answer.has-original-color-c-color::before {
		color: <?php echo $original_color_c; ?>;
	}
	.is-style-st-heading-custom-question.has-original-color-c-background-color::before,
	.is-style-st-heading-custom-answer.has-original-color-c-background-color::before {
		background-color: <?php echo $original_color_c; ?>;
	}
	/* ランキング */
	.is-style-st-heading-custom-ranking.has-original-color-c-background-color::before {
		background-color: <?php echo $original_color_c; ?>;
		color: #fff!important;
	}
	/* グループ ライン */
	.is-style-st-group-line-bold.has-original-color-c-color,
	.is-style-st-group-line.has-original-color-c-color {
		border-left-color: <?php echo $original_color_c; ?>;
		color: inherit;
	}
	/* グループ かぎ括弧, 角括弧 */
	.is-style-st-group-corner-brackets.has-original-color-c-color::before,
	.is-style-st-group-corner-brackets.has-original-color-c-color::after,
	.is-style-st-group-square-brackets.has-original-color-c-color::before,
	.is-style-st-group-square-brackets.has-original-color-c-color::after {
		border-color: <?php echo $original_color_c; ?>;
	}
	.st-tabs.is-style-st-bubble .has-border.has-original-color-c-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-original-color-c-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo $original_color_c; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_d) !== '' ): //カラーD ?>
	.has-original-color-d-color.is-style-st-heading-custom-attention::before,
	.has-original-color-d-color.is-style-st-heading-custom-check::before,
	.has-original-color-d-color {
		color: <?php echo $original_color_d; ?> !important;
	}
	.has-original-color-d-background-color {
		background-color: <?php echo $original_color_d; ?> !important;
	}
	.has-original-color-d-border-color {
		border-color: <?php echo $original_color_d; ?> !important;
	}
	[class*="is-style-st-paragraph-"].has-original-color-d-color::before {
		color: <?php echo $original_color_d; ?>;
		border-right-color: <?php echo $original_color_d; ?>!important;
	}
	/* 簡易会話ふきだし */
	.is-style-st-paragraph-kaiwa.has-original-color-d-background-color .st-paragraph-kaiwa-text,
	.is-style-st-paragraph-kaiwa-b.has-original-color-d-background-color .st-paragraph-kaiwa-text {
		background-color: <?php echo $original_color_d; ?>;
	}
	.is-style-st-paragraph-kaiwa.has-original-color-d-background-color::after,
	.is-style-st-paragraph-kaiwa-b.has-original-color-d-background-color::after {
		border-right-color: <?php echo $original_color_d; ?>;
	}
	.is-style-st-paragraph-kaiwa.has-original-color-d-background-color,
	.is-style-st-paragraph-kaiwa-b.has-original-color-d-background-color {
		background-color: transparent!important;
	}
	/* 見出しアイコン */
	[class^="is-style-st-heading-custom-"]:not(.is-style-st-heading-custom-bubble):not(.is-style-st-heading-custom-step):not(.is-style-st-heading-custom-count).has-original-color-d-color::before {
		color: <?php echo $original_color_d; ?>;
	}
	/* 見出しふきだし */
	.is-style-st-heading-custom-bubble.has-original-color-d-background-color::after {
		border-top-color: <?php echo $original_color_d; ?>;
	}
	/* 見出しライン */
	.is-style-st-heading-custom-line.has-original-color-d-color::after {
		background-color: <?php echo $original_color_d; ?>;
	}
	/* カウント */
	.is-style-st-heading-custom-count.has-original-color-d-color {
		color: <?php echo $original_color_d; ?>;
	}
	.is-style-st-heading-custom-count.has-original-color-d-background-color::before {
		color: <?php echo $original_color_d; ?>;
	}
	/* ステップ */
	.is-style-st-heading-custom-step.has-original-color-d-background-color::before {
		color: <?php echo $original_color_d; ?>;
	}
	.is-style-st-heading-custom-step.has-original-color-d-background-color::after {
		border-color: <?php echo $original_color_d; ?>;
		color: <?php echo $original_color_d; ?>;
	}
	/* 質問と答え */
	.is-style-st-heading-custom-question.has-original-color-d-color::before,
	.is-style-st-heading-custom-answer.has-original-color-d-color::before {
		color: <?php echo $original_color_d; ?>;
	}
	.is-style-st-heading-custom-question.has-original-color-d-background-color::before,
	.is-style-st-heading-custom-answer.has-original-color-d-background-color::before {
		background-color: <?php echo $original_color_d; ?>;
	}
	/* ランキング */
	.is-style-st-heading-custom-ranking.has-original-color-d-background-color::before {
		background-color: <?php echo $original_color_d; ?>;
		color: #fff!important;
	}
	/* グループ ライン */
	.is-style-st-group-line-bold.has-original-color-d-color,
	.is-style-st-group-line.has-original-color-d-color {
		border-left-color: <?php echo $original_color_d; ?>;
		color: inherit;
	}
	/* グループ かぎ括弧, 角括弧 */
	.is-style-st-group-corner-brackets.has-original-color-d-color::before,
	.is-style-st-group-corner-brackets.has-original-color-d-color::after,
	.is-style-st-group-square-brackets.has-original-color-d-color::before,
	.is-style-st-group-square-brackets.has-original-color-d-color::after {
		border-color: <?php echo $original_color_d; ?>;
	}
	.st-tabs.is-style-st-bubble .has-border.has-original-color-d-border-color .st-tabs__tab[aria-selected="true"]::before,
	.st-tabs.is-style-st-bubble .has-original-color-d-background-color .st-tabs__tab[aria-selected="true"]::after {
		border-top-color: <?php echo $original_color_d; ?>;
	}
<?php endif; ?>

/* カラーパレット選択時の見出し（質問と答え） */
.is-style-st-heading-custom-question.has-pale-pink-background-color::before,
.is-style-st-heading-custom-answer.has-pale-pink-background-color::before {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.is-style-st-heading-custom-question.has-soft-red-background-color::before,
.is-style-st-heading-custom-answer.has-soft-red-background-color::before {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.is-style-st-heading-custom-question.has-light-grayish-red-background-color::before,
.is-style-st-heading-custom-answer.has-light-grayish-red-background-color::before {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.is-style-st-heading-custom-question.has-vivid-yellow-background-color::before,
.is-style-st-heading-custom-answer.has-vivid-yellow-background-color::before {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.is-style-st-heading-custom-question.has-very-pale-yellow-background-color::before,
.is-style-st-heading-custom-answer.has-very-pale-yellow-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.is-style-st-heading-custom-question.has-light-green-cyan-background-color::before ,
.is-style-st-heading-custom-answer.has-light-green-cyan-background-color::before {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.is-style-st-heading-custom-question.has-pale-cyan-blue-background-color::before,
.is-style-st-heading-custom-answer.has-pale-cyan-blue-background-color::before {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.is-style-st-heading-custom-question.has-vivid-cyan-blue-background-color::before,
.is-style-st-heading-custom-answer.has-vivid-cyan-blue-background-color::before {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.is-style-st-heading-custom-question.has-very-light-gray-background-color::before,
.is-style-st-heading-custom-answer.has-very-light-gray-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.is-style-st-heading-custom-question.has-very-dark-gray-background-color::before,
.is-style-st-heading-custom-answer.has-very-dark-gray-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.is-style-st-heading-custom-question.has-white-background-color::before,
.is-style-st-heading-custom-answer.has-white-background-color::before {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
}

/* カラーパレット選択時の見出し（ランキング） */
.is-style-st-heading-custom-ranking.has-pale-pink-background-color::before {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-soft-red-background-color::before {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-light-grayish-red-background-color::before {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-vivid-yellow-background-color::before {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-very-pale-yellow-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-light-green-cyan-background-color::before {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-pale-cyan-blue-background-color::before {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-vivid-cyan-blue-background-color::before {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-very-light-gray-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-very-dark-gray-background-color::before {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	color: #fff!important;
}

.is-style-st-heading-custom-ranking.has-white-background-color::before {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
	color: #fff!important;
}

/* マイ細マーカー */
.st-mymarker-s {
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
.st-mymarker-s-b {
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

/*--------------------------------
ブロックスタイル ボーダー設定
---------------------------------*/
.has-st-border {
<?php if ( trim( $GLOBALS['stdata502'] ) !== '' ): ?>
	border-color: <?php echo $GLOBALS['stdata502']; ?>;
<?php endif; ?>
<?php if ( trim( $GLOBALS['stdata503'] ) !== '' ): ?>
	border-radius: <?php echo $GLOBALS['stdata503']; ?>px;
<?php endif; ?>
}

/*--------------------------------
ブロックスタイル 段落
---------------------------------*/
<?php if ( trim( $GLOBALS['stdata504'] ) !== '' ): ?>
	/* 基本 */
	[class^="is-style-st-paragraph-"],
	[class*=" is-style-st-paragraph-"] {
		border-radius: <?php echo $GLOBALS['stdata504']; ?>px;
	}
<?php endif; ?>

/* カスタム */
<?php if( trim( $GLOBALS['stdata508']) !== '' ): ?>
	.is-style-st-paragraph-pen:not(.has-text-color)::before,
	.is-style-st-paragraph-pen::before {
		color: <?php echo $GLOBALS['stdata508']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata508']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata523']) !== '' ): ?>
	.is-style-st-paragraph-pen {
		background: <?php echo $GLOBALS['stdata523']; ?>;
	}
<?php endif; ?>

/* メモ */
<?php if( trim( $GLOBALS['stdata509']) !== '' ): ?>
	.is-style-st-paragraph-memo-txt:not(.has-text-color)::before,
	.is-style-st-paragraph-memo-txt::before {
		color: <?php echo $GLOBALS['stdata509']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata509']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata524']) !== '' ): ?>
	.is-style-st-paragraph-memo-txt {
		background: <?php echo $GLOBALS['stdata524']; ?>;
	}
<?php endif; ?>

/* リンク */
<?php if( trim( $GLOBALS['stdata510']) !== '' ): ?>
	.is-style-st-paragraph-link::before {
		color: <?php echo $GLOBALS['stdata510']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata510']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata525']) !== '' ): ?>
	.is-style-st-paragraph-link {
		background: <?php echo $GLOBALS['stdata525']; ?>;
	}
<?php endif; ?>

/* チェック */
<?php if( trim( $GLOBALS['stdata511']) !== '' ): ?>
	.is-style-st-paragraph-check::before {
		color: <?php echo $GLOBALS['stdata511']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata511']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata526']) !== '' ): ?>
	.is-style-st-paragraph-check {
		background: <?php echo $GLOBALS['stdata526']; ?>;
	}
<?php endif; ?>

/* ポイント */
<?php if( trim( $GLOBALS['stdata512']) !== '' ): ?>
	.is-style-st-paragraph-point::before {
		color: <?php echo $GLOBALS['stdata512']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata512']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata527']) !== '' ): ?>
	.is-style-st-paragraph-point {
		background: <?php echo $GLOBALS['stdata527']; ?>;
	}
<?php endif; ?>

/* インフォ */
<?php if( trim( $GLOBALS['stdata513']) !== '' ): ?>
	.is-style-st-paragraph-info-circle::before {
		color: <?php echo $GLOBALS['stdata513']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata513']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata528']) !== '' ): ?>
	.is-style-st-paragraph-info-circle {
		background: <?php echo $GLOBALS['stdata528']; ?>;
	}
<?php endif; ?>

/* 初心者 */
<?php if( trim( $GLOBALS['stdata514']) !== '' ): ?>
	.is-style-st-paragraph-bigginer::before {
		color: <?php echo $GLOBALS['stdata514']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata514']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata529']) !== '' ): ?>
	.is-style-st-paragraph-bigginer {
		background: <?php echo $GLOBALS['stdata529']; ?>;
	}
<?php endif; ?>

/* 注意 */
<?php if( trim( $GLOBALS['stdata515']) !== '' ): ?>
	.is-style-st-paragraph-attention::before {
		color: <?php echo $GLOBALS['stdata515']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata515']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata530']) !== '' ): ?>
	.is-style-st-paragraph-attention {
		background: <?php echo $GLOBALS['stdata530']; ?>;
	}
<?php endif; ?>

/* マル */
<?php if( trim( $GLOBALS['stdata516']) !== '' ): ?>
	.is-style-st-paragraph-circle-o::before {
		color: <?php echo $GLOBALS['stdata516']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata516']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata531']) !== '' ): ?>
	.is-style-st-paragraph-circle-o {
		background: <?php echo $GLOBALS['stdata531']; ?>;
	}
<?php endif; ?>

/* バツ */
<?php if( trim( $GLOBALS['stdata517']) !== '' ): ?>
	.is-style-st-paragraph-times::before {
		color: <?php echo $GLOBALS['stdata517']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata517']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata532']) !== '' ): ?>
	.is-style-st-paragraph-times {
		background: <?php echo $GLOBALS['stdata532']; ?>;
	}
<?php endif; ?>

/* Like */
<?php if( trim( $GLOBALS['stdata518']) !== '' ): ?>
	.is-style-st-paragraph-thumbs-o-up::before {
		color: <?php echo $GLOBALS['stdata518']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata518']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata533']) !== '' ): ?>
	.is-style-st-paragraph-thumbs-o-up {
		background: <?php echo $GLOBALS['stdata533']; ?>;
	}
<?php endif; ?>

/* Bad */
<?php if( trim( $GLOBALS['stdata519']) !== '' ): ?>
	.is-style-st-paragraph-thumbs-o-down::before {
		color: <?php echo $GLOBALS['stdata519']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata519']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata534']) !== '' ): ?>
	.is-style-st-paragraph-thumbs-o-down {
		background: <?php echo $GLOBALS['stdata534']; ?>;
	}
<?php endif; ?>

/* Code */
<?php if( trim( $GLOBALS['stdata520']) !== '' ): ?>
	.is-style-st-paragraph-code::before {
		color: <?php echo $GLOBALS['stdata520']; ?>;
		border-right-color: <?php echo $GLOBALS['stdata520']; ?>;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata535']) !== '' ): ?>
	.is-style-st-paragraph-code {
		background: <?php echo $GLOBALS['stdata535']; ?>;
		color: #1a1a1a;
	}
<?php endif; ?>

/* 簡易会話ふきだし */
.is-style-st-paragraph-kaiwa.has-st-border,
.is-style-st-paragraph-kaiwa-b.has-st-border {
	border: none;
	border-radius: 0;
}

.is-style-st-paragraph-kaiwa.has-st-border .st-paragraph-kaiwa-text,
.is-style-st-paragraph-kaiwa-b.has-st-border .st-paragraph-kaiwa-text{
<?php if ( trim( $GLOBALS['stdata502'] ) !== '' ): ?>
	border-color: <?php echo $GLOBALS['stdata502']; ?>;
<?php endif; ?>
}

<?php if ( trim( $GLOBALS['stdata502'] ) !== '' ): ?>
	.is-style-st-paragraph-kaiwa.has-st-border::after,
	.is-style-st-paragraph-kaiwa-b.has-st-border::after {
		border-right-color: <?php echo $GLOBALS['stdata502']; ?>!important;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS["stdata131"] ) !== '' ):
	$kaiwaiconurl = esc_url( $GLOBALS["stdata131"] );
else:
	$kaiwaiconurl = get_template_directory_uri().'/images/no-img.png';
endif; ?>
.is-style-st-paragraph-kaiwa::before {
	background-image: url(<?php echo $kaiwaiconurl; ?>);
}

<?php if ( trim( $GLOBALS["stdata132"] ) !== '' ):
	$kaiwaiconurl_b = esc_url( $GLOBALS["stdata132"] );
else:
	$kaiwaiconurl_b = get_template_directory_uri().'/images/no-img.png';
endif; ?>
.is-style-st-paragraph-kaiwa-b::before {
	background-image: url(<?php echo $kaiwaiconurl_b?>);
}

/* 簡易ボタン */
<?php if( trim( $GLOBALS['stdata521']) !== '' ): ?>
	.is-style-st-paragraph-button::after {
		color: <?php echo $GLOBALS['stdata521']; ?>;
		opacity: 1;
	}
<?php endif; ?>

<?php if( trim( $GLOBALS['stdata536']) !== '' ): ?>
	.is-style-st-paragraph-button {
		background-color: <?php echo $GLOBALS['stdata536']; ?>;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata504'] ) !== '' ): ?>
	/* 囲みドット
	 * ふきだし
	 */
	.is-style-st-paragraph-dotline,
	.is-style-st-paragraph-dotline::before
	.is-style-st-paragraph-bubble {
		border-radius: <?php echo $GLOBALS['stdata504']; ?>px;
	}
<?php endif; ?>

/* カラーパレット選択時の囲みドット */
<?php if( trim($original_color_a) !== '' ): //カラーA ?>
	.is-style-st-paragraph-dotline.has-original-color-a-background-color {
		box-shadow: 0px 0px 0px 7px <?php echo $original_color_a; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_b) !== '' ): //カラーB ?>
	.is-style-st-paragraph-dotline.has-original-color-b-background-color {
		box-shadow: 0px 0px 0px 7px <?php echo $original_color_b; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_c) !== '' ): //カラーC ?>
	.is-style-st-paragraph-dotline.has-original-color-c-background-color {
		box-shadow: 0px 0px 0px 7px <?php echo $original_color_c; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_d) !== '' ): //カラーD ?>
	.is-style-st-paragraph-dotline.has-original-color-d-background-color {
		box-shadow: 0px 0px 0px 7px <?php echo $original_color_d; ?>;
	}
<?php endif; ?>

/* カラーパレット選択時の吹き出し */
<?php if( trim($original_color_a) !== '' ): //カラーA ?>
	.is-style-st-paragraph-bubble.has-original-color-a-background-color::after {
		border-top-color: <?php echo $original_color_a; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_b) !== '' ): //カラーB ?>
	.is-style-st-paragraph-bubble.has-original-color-b-background-color::after {
		border-top-color: <?php echo $original_color_b; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_c) !== '' ): //カラーC ?>
	.is-style-st-paragraph-bubble.has-original-color-c-background-color::after {
		border-top-color: <?php echo $original_color_c; ?>;
	}
<?php endif; ?>

<?php if( trim($original_color_d) !== '' ): //カラーD ?>
	.is-style-st-paragraph-bubble.has-original-color-d-background-color::after {
		border-top-color: <?php echo $original_color_d; ?>;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata502'] ) !== '' ): ?>
	.is-style-st-paragraph-bubble.has-st-border::after {
		border-top-color: <?php echo $GLOBALS['stdata502']; ?>;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata504'] ) !== '' ): ?>
	/* まるもじ */
	.is-style-st-paragraph-marumozi {
		border-radius: 30px!important;
	}
<?php endif; ?>

/*--------------------------------
ブロックスタイル グループ
---------------------------------*/
/* 囲みドット */
.is-style-st-group-dotline,
.is-style-st-group-dotline::before {
<?php if ( trim( $GLOBALS['stdata504'] ) !== '' ): ?>
	border-radius: <?php echo $GLOBALS['stdata504']; ?>px;
<?php endif; ?>
}

/* ライン */
.is-style-st-group-line.has-pale-pink-color,
.is-style-st-group-line-bold.has-pale-pink-color {
	border-left-color: <?php echo ST_COLOR_PALE_PINK; ?>;
	color: inherit;
}

.is-style-st-group-line.has-soft-red-color,
.is-style-st-group-line-bold.has-soft-red-color {
	border-left-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	color: inherit;
}

.is-style-st-group-line.has-light-grayish-red-color,
.is-style-st-group-line-bold.has-light-grayish-red-color {
	border-left-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	color: inherit;
}

.is-style-st-group-line.has-vivid-yellow-color,
.is-style-st-group-line-bold.has-vivid-yellow-color {
	border-left-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
	color: inherit;
}

.is-style-st-group-line.has-very-pale-yellow-color,
.is-style-st-group-line-bold.has-very-pale-yellow-color {
	border-left-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
	color: inherit;
}

.is-style-st-group-line.has-light-green-cyan-color,
.is-style-st-group-line-bold.has-light-green-cyan-color {
	border-left-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
	color: inherit;
}

.is-style-st-group-line.has-pale-cyan-blue-color,
.is-style-st-group-line-bold.has-pale-cyan-blue-color {
	border-left-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
	color: inherit;
}

.is-style-st-group-line.has-vivid-cyan-blue-color,
.is-style-st-group-line-bold.has-vivid-cyan-blue-color {
	border-left-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
	color: inherit;
}

.is-style-st-group-line.has-very-light-gray-color,
.is-style-st-group-line-bold.has-very-light-gray-color {
	border-left-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
	color: inherit;
}

.is-style-st-group-line.has-very-dark-gray-color,
.is-style-st-group-line-bold.has-very-dark-gray-color {
	border-left-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
	color: inherit;
}

.is-style-st-group-line.has-white-color,
.is-style-st-group-line-bold.has-white-color {
	border-left-color: <?php echo ST_COLOR_WHITE; ?>;
	color: inherit;
}

/* かぎ括弧, 角括弧 */
.is-style-st-group-corner-brackets.has-pale-pink-color::before,
.is-style-st-group-corner-brackets.has-pale-pink-color::after,
.is-style-st-group-square-brackets.has-pale-pink-color::before,
.is-style-st-group-square-brackets.has-pale-pink-color::after {
	border-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.is-style-st-group-corner-brackets.has-soft-red-color::before,
.is-style-st-group-corner-brackets.has-soft-red-color::after,
.is-style-st-group-square-brackets.has-soft-red-color::before,
.is-style-st-group-square-brackets.has-soft-red-color::after {
	border-color: <?php echo ST_COLOR_SOFT_RED; ?>;
	color: inherit!important;
}

.is-style-st-group-corner-brackets.has-light-grayish-red-color::before,
.is-style-st-group-corner-brackets.has-light-grayish-red-color::after,
.is-style-st-group-square-brackets.has-light-grayish-red-color::before,
.is-style-st-group-square-brackets.has-light-grayish-red-color::after {
	border-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
	color: inherit!important;
}

.is-style-st-group-corner-brackets.has-vivid-yellow-color::before,
.is-style-st-group-corner-brackets.has-vivid-yellow-color::after,
.is-style-st-group-square-brackets.has-vivid-yellow-color::before,
.is-style-st-group-square-brackets.has-vivid-yellow-color::after {
	border-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.is-style-st-group-corner-brackets.has-very-pale-yellow-color::before,
.is-style-st-group-corner-brackets.has-very-pale-yellow-color::after,
.is-style-st-group-square-brackets.has-very-pale-yellow-color::before,
.is-style-st-group-square-brackets.has-very-pale-yellow-color::after {
	border-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.is-style-st-group-corner-brackets.has-light-green-cyan-color::before,
.is-style-st-group-corner-brackets.has-light-green-cyan-color::after,
.is-style-st-group-square-brackets.has-light-green-cyan-color::before,
.is-style-st-group-square-brackets.has-light-green-cyan-color::after {
	border-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}

.is-style-st-group-corner-brackets.has-pale-cyan-blue-color::before,
.is-style-st-group-corner-brackets.has-pale-cyan-blue-color::after,
.is-style-st-group-square-brackets.has-pale-cyan-blue-color::before,
.is-style-st-group-square-brackets.has-pale-cyan-blue-color::after {
	border-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.is-style-st-group-corner-brackets.has-vivid-cyan-blue-color::before,
.is-style-st-group-corner-brackets.has-vivid-cyan-blue-color::after,
.is-style-st-group-square-brackets.has-vivid-cyan-blue-color::before,
.is-style-st-group-square-brackets.has-vivid-cyan-blue-color::after {
	border-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.is-style-st-group-corner-brackets.has-very-light-gray-color::before,
.is-style-st-group-corner-brackets.has-very-light-gray-color::after,
.is-style-st-group-square-brackets.has-very-light-gray-color::before,
.is-style-st-group-square-brackets.has-very-light-gray-color::after {
	border-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.is-style-st-group-corner-brackets.has-very-dark-gray-color::before,
.is-style-st-group-corner-brackets.has-very-dark-gray-color::after,
.is-style-st-group-square-brackets.has-very-dark-gray-color::before,
.is-style-st-group-square-brackets.has-very-dark-gray-color::after {
	border-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.is-style-st-group-corner-brackets.has-white-color::before,
.is-style-st-group-corner-brackets.has-white-color::after,
.is-style-st-group-square-brackets.has-white-color::before,
.is-style-st-group-square-brackets.has-white-color::after {
	border-color: <?php echo ST_COLOR_WHITE; ?>;
}

/*--------------------------------
オリジナルブロック
---------------------------------*/
/* メモボックス */
.wp-block-st-blocks-memo {
	<?php if ( $st_memo_block_bg_color ): ?>
		background-color: <?php echo $st_memo_block_bg_color; ?>;
	<?php endif; ?>
	<?php if ( $st_memo_block_border_color ): ?>
		border-color: <?php echo $st_memo_block_border_color; ?>;
	<?php endif; ?>
}

.wp-block-st-blocks-memo .clip-fonticon {
	<?php if ( $st_memo_block_icon_color ): ?>
		color: <?php echo $st_memo_block_icon_color; ?>;
		border-color: <?php echo $st_memo_block_icon_color; ?>;
	<?php endif; ?>
}

/* マイボックス*/
.wp-block-st-blocks-my-box{
	<?php if ( $st_mybox_block_bg_color ): ?>
		background-color: <?php echo $st_mybox_block_bg_color; ?>;
	<?php endif; ?>
	<?php if ( $st_mybox_block_border_color ): ?>
		border-color: <?php echo $st_mybox_block_border_color; ?>;
	<?php endif; ?>
}

.wp-block-st-blocks-my-box .st-mybox-title {
	<?php if ( $st_mybox_block_icon_color ): ?>
		color: <?php echo $st_mybox_block_icon_color; ?>;
	<?php endif; ?>
	<?php if ( $st_mybox_block_border_color ): ?>
		border-bottom-color: <?php echo $st_mybox_block_border_color; ?>;
	<?php endif; ?>
}

/* 見出し付きフリーボックス */
.wp-block-st-blocks-midashi-box.freebox {
	<?php if ( $st_freebox_block_bg_color ): ?>
		background-color: <?php echo $st_freebox_block_bg_color; ?>;
	<?php endif; ?>
	<?php if ( $st_freebox_block_border_color ): ?>
		border-color: <?php echo $st_freebox_block_border_color; ?>;
	<?php endif; ?>
}

.wp-block-st-blocks-midashi-box .p-free {
	<?php if ( $st_freebox_block_border_color ): ?>
		border-color: <?php echo $st_freebox_block_border_color; ?>;
	<?php endif; ?>
}

.wp-block-st-blocks-midashi-box .p-free .p-entry-f {
	<?php if ( $st_freebox_block_icon_color ): ?>
		color: <?php echo $st_freebox_block_icon_color; ?>;
	<?php endif; ?>
	<?php if ( $st_freebox_block_border_color ): ?>
		background-color: <?php echo $st_freebox_block_border_color; ?>;
	<?php endif; ?>
}

/* バナー風ボックス */
.wp-block-st-blocks-flexbox {
	<?php if ( $st_banarbox_block_bg_color ): ?>
		background-color: <?php echo $st_banarbox_block_bg_color; ?>;
		padding: 20px;
	<?php endif; ?>
}

.wp-block-st-blocks-flexbox .st-header-flextitle {
	<?php if ( $st_banarbox_block_icon_color ): ?>
		color: <?php echo $st_banarbox_block_icon_color; ?>;
	<?php endif; ?>
}

/*--------------------------------
ブロック下の余白
---------------------------------*/

<?php if ( trim( $GLOBALS['stdata540'] ) !== '' ):    // "ブロック下の余白" のデフォルト ("小") ?>
.entry-content p.has-st-margin-bottom-1,
.is-style-st-wide-background.wp-block-group.has-background.has-st-margin-bottom-1,
.is-style-st-wide-background.has-st-margin-bottom-1,
.st-wide-background.has-st-margin-bottom-1,
.wp-block-group.has-st-margin-bottom-1,
.wp-block-group.has-background.has-st-margin-bottom-1 {
	margin-bottom: <?php echo $GLOBALS['stdata540']; ?>px;
}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata538'] ) !== '' ): ?>
p.has-st-margin-bottom--2,
.is-style-st-wide-background.wp-block-group.has-background.has-st-margin-bottom--2,
.is-style-st-wide-background.has-st-margin-bottom--2,
.st-wide-background.has-st-margin-bottom--2,
.wp-block-group.has-st-margin-bottom--2 {
	margin-bottom: <?php echo $GLOBALS['stdata538']; ?>px!important;
}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata539'] ) !== '' ): ?>
p.has-st-margin-bottom--1,
.is-style-st-wide-background.wp-block-group.has-background.has-st-margin-bottom--1,
.is-style-st-wide-background.has-st-margin-bottom--1,
.st-wide-background.has-st-margin-bottom--1,
.wp-block-group.has-st-margin-bottom--1 {
	margin-bottom: <?php echo $GLOBALS['stdata539']; ?>px!important;
}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata541'] ) !== '' ): ?>
p.has-st-margin-bottom-2,
.is-style-st-wide-background.wp-block-group.has-background.has-st-margin-bottom-2,
.is-style-st-wide-background.has-st-margin-bottom-2,
.st-wide-background.has-st-margin-bottom-2,
.wp-block-group.has-st-margin-bottom-2 {
	margin-bottom: <?php echo $GLOBALS['stdata541']; ?>px!important;
}
<?php endif; ?>

/* @keyframes アニメーション */
<?php if ( trim( $GLOBALS['stdata387'] ) !== '' ):
	echo $GLOBALS['stdata387'] . ',';
endif; ?>
.st-key-slidedown {
	animation-name: StSlideDown; /* 上から下 */
	animation-duration: 2s;
}

<?php if ( trim( $GLOBALS['stdata388'] ) !== '' ):
	echo $GLOBALS['stdata388'] . ',';
endif; ?>
.st-key-slice-up {
	animation-name: StSlideUp; /* 下から上 */
	animation-duration: 2s;
}

<?php if ( trim( $GLOBALS['stdata389'] ) !== '' ):
	echo $GLOBALS['stdata389'] . ',';
endif; ?>
.st-key-righttuoleft {
	animation-name: StRightToLeft; /* 右から左 */
	animation-duration: 2s;
}

<?php if ( trim( $GLOBALS['stdata390'] ) !== '' ):
	echo $GLOBALS['stdata390'] . ',';
endif; ?>
.st-key-righttuoleft {
	animation-name: StLeftToRight; /* 左から右 */
	animation-duration: 2s;
}

<?php if ( trim( $GLOBALS['stdata391'] ) !== '' ):
	echo $GLOBALS['stdata391'] . ',';
endif; ?>
.st-key-fedein {
	animation-name: StFedeIn; /* フェードイン */
	animation-duration: 2s;
}

/* 上から下 */
@keyframes StSlideDown {
  0% {
      opacity: 0;
      transform: translateY(-50px);
  }
  100% {
      opacity: 1;
      transform: translateY(0);
  }
}

/* 下から上 */
@keyframes StSlideUp {
  0% {
      opacity: 0;
      transform: translateY(50px);
  }
  100% {
      opacity: 1;
      transform: translateY(0);
  }
}

/* 右から左 */
@keyframes StRightToLeft {
	0% {
		opacity: 0;
		transform: translateX(50px);
	}
	100% {
		opacity: 1;
		transform: translateX(0);
	}
}

/* 左から右 */
@keyframes StLeftToRight {
	0% {
		opacity: 0;
		transform: translateX(0);
	}
	100% {
		opacity: 1;
		transform: translateX(50px);
	}
}

/* フェードイン */
@keyframes StFedeIn {
  0% {
      opacity: 0;
  }
  100% {
      opacity: 1;
  }
}

<?php if ( isset ( $GLOBALS["stdata449"] ) && $GLOBALS["stdata449"] === 'yes' ): //オリジナルpreデザインを全体に反映 ?>
	pre:not(.wp-block-code) {
		line-height: 1.8;
		padding: 20px;
		background: #ECEFF1;
		color: #616161;
		position: relative;
		padding-top: 3em;
		margin-bottom: 20px;
		white-space: pre;
		overflow: auto;
	}

	pre:not(.wp-block-code):not(.st-pre)::before {
		content: "\f121  code";
		font-family: stsvg;
		position: absolute;
		top: 0;
		left: 0;
		display: block;
		padding: 3px 10px;
		background: #B0BEC5;
		color: #fff;
	}

	pre:not(.wp-block-code).st-html:not(.st-pre)::before {
		content: "\f121  html";
	}

	pre:not(.wp-block-code).st-php:not(.st-pre)::before {
		content: "\f121  PHP";
	}

	pre:not(.wp-block-code).st-css:not(.st-pre)::before {
		content: "\f121  css";
	}

	pre:not(.wp-block-code).st-js:not(.st-pre)::before {
		content: "\f121  javascript";
	}

	pre:not(.wp-block-code).st-jq:not(.st-pre)::before {
		content: "\f121  jQuery";
	}

	/** terminal */
	pre:not(.wp-block-code).st-terminal:not(.st-pre) {
		background: #212121;
		color: #F5F5F5;
	}

	pre:not(.wp-block-code).st-terminal:not(.st-pre)::before {
		content: "\f120";
		font-family: stsvg;
		background: #424242;
		color: #fff;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata654']) && $GLOBALS['stdata654'] === 'yes' ): // Chromeの縮小画像に生じるぼかしを軽減する ?>
	img {
		image-rendering: -webkit-optimize-contrast;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata628']) && $GLOBALS['stdata628'] === 'yes' ): // ボタンにシャドウを適応する（一括強制） ?>
	.rankstlink-r p,
	.rankstlink-l p,
	.rankstlink-r2 p,
	.rankstlink-l2 p,
	.rankstlink-a p,
	.rankstlink-b p {
		box-shadow: 0 2px 2px rgb(0,0,0,.1);
	}
	.rankstlink-r p:hover,
	.rankstlink-l p:hover,
	.rankstlink-r2 p:hover,
	.rankstlink-l2 p:hover,
	.rankstlink-a p:hover,
	.rankstlink-b p:hover {
		box-shadow: 0 1px 1px rgb(0,0,0,.1);
	}
	:root .st-author-profile .rankstlink-r2 p a, /* プロフィールカード */
	.st-mybtn.wp-block-st-blocks-my-button, /* カスタムボタンブロック */
	p.st-mybtn {
		box-shadow: 0 2px 2px rgb(0,0,0,.1)!important;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata498']) && $GLOBALS['stdata498'] === 'yes' ) : // 要素にドロップシャドウを追加 ?>
:not(.is-style-st-paragraph-kaiwa)	[class^="is-style-st-paragraph-"]:not(.is-style-st-paragraph-button):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b),
	[class*=" is-style-st-paragraph-"]:not(.is-style-st-paragraph-button):not(.is-style-st-paragraph-memo):not(.is-style-st-paragraph-dotline):not(.is-style-st-paragraph-kaiwa):not(.is-style-st-paragraph-kaiwa-b),
	.is-style-st-paragraph-kaiwa .st-paragraph-kaiwa-text,
	.is-style-st-paragraph-kaiwa-b .st-paragraph-kaiwa-text,
	.st-cardlink-card-link, /* おすすめヘッダーバナー */
	.st-marumozi, /* まるもじ */
	.st-marumozi-big, /* まるもじ */
	.st-minihukidashi, /* ミニふきだし */
	.nowhits, /* おすすめ記事 */
	.st-step, /* ステップ */
	.st-point::before, /* ポイント */
	.freebox, /* タイトル付きフリーボックス */
	.st-mybox, /* マイボックス */
	.clip-memobox, /* クリップメモ */
	.st-blackboard /* こんな方におすすめ */
	{
		-webkit-filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 0.3));
		filter: drop-shadow(1px 1px 2px rgba(0, 0, 0, 0.3));
	}
	.pop-box:not(.st-wpp-views-widgets) {
		padding-left: 15px!important;
		padding-right: 15px!important;
	}

	.is-style-st-paragraph-default,
	.is-style-st-paragraph-memo {
		box-shadow: none;
	}

	/* マイボックスのタイトル */
	.st-mybox .st-mybox-title::after {
		background: none;
	}

	.st-mybox .st-mybox-title {
		padding: 0 5px;
	}
<?php endif; ?>

@media print, screen and (max-width: 959px) {
	#headbox {
		<?php if ( wp_is_mobile() ): ?>
		padding: 0 10px 0;
	<?php elseif ( isset($GLOBALS['stdata127']) && $GLOBALS['stdata127'] === 'yes' && trim($GLOBALS['stdata102']) === '' ) : // サイト名とキャッチフレーズを上下反対にする + キャッチフレーズを表示 ?>
		padding: 0 10px 5px;
	<?php else: ?>
		padding: 0 10px 15px;
	<?php endif; ?>
	}

	<?php if ( st_has_additional_mobile_menu() //スマホ追加メニューが設定されている
	&&
	( trim( $GLOBALS["stdata127"] ) === '' //サイト名とキャッチフレーズを上下反対にするが無効
	|| ( trim( $GLOBALS["stdata616"] ) === '' || trim( $GLOBALS["stdata615"] ) === '' ) //サイト名またはキャッチフレーズが表示
	)
	): ?>
	/* タイトル下に余白 */
	#header-l {
		padding-bottom: 10px;
	}
	<?php endif; ?>
}

<?php if ( isset($GLOBALS['stdata241']) && $GLOBALS['stdata241'] === 'photo' ) : // アイキャッチ画像をタイトル下（ポラロイド）表示に変更する ?>
	.eyecatch-copyurl {
		right: 20px;
		bottom: 30px;
		border-radius: 0;
	}
<?php endif; ?>

<?php if ( $GLOBALS["stdata24"] === 'yes' ): // 投稿に「投稿日」「更新日」を表示しない ?>
	.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) {
		margin-bottom:20px;
	}
<?php endif; ?>

/*ヘッダーウィジェット*/
header .headbox .textwidget,
#footer .headbox .textwidget{
	<?php if ( $menu_st_headerwidget_bgcolor ): ?>
		background: <?php echo $menu_st_headerwidget_bgcolor; ?>;
	<?php endif; ?>
	<?php if ( $menu_st_headerwidget_textcolor ): ?>
		color: <?php echo $menu_st_headerwidget_textcolor; ?>;
	<?php endif; ?>
}

<?php if ( ! wp_is_mobile() ): // ヘッダーサイトタイトルの調整 ?>
	header h1.descr.sitenametop:not(.entry-title):not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	header h1.sitename.sitenametop:not(.entry-title):not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) {
		margin-bottom: 5px;
		padding-top:5px;
	}
<?php endif; ?>

/* ヘッダー画像エリア表示設定 */
<?php if ( trim( $GLOBALS["stdata18"] ) === '' ): // 下層ページにも表示が無効 ?>
	body:not(.front-page) #st-header {
		display: none;
	}
<?php endif; ?>

<?php if ( wp_is_mobile() && isset( $GLOBALS["stdata71"] ) && $GLOBALS["stdata71"] === 'yes' ): // スマホ・タブレット閲覧時は非表示 ?>
	#st-header {
	 	display: none;
	}
<?php endif; ?>

<?php if ( isset( $GLOBALS["stdata76"] ) && $GLOBALS["stdata76"] === 'yes' ): // 全て非表示 ?>
	#st-header {
		display: none;
	}
<?php endif; ?>

<?php // トップページがLPワイドでヘッダー表示しない場合はtrue
if ( $st_is_ex &&
	( isset( $GLOBALS["stdata77"] ) && $GLOBALS["stdata77"] === "lp" && isset( $GLOBALS["stdata366"] ) && $GLOBALS["stdata366"] === "yes" )
	|| ( isset( $GLOBALS["stdata11"] ) && ( $GLOBALS["stdata11"] === "lp" || $GLOBALS["stdata11"] === "lp-wide" ) )
   ):
	$top_layout_lp_wide = true;
else:
	$top_layout_lp_wide = false;
endif; ?>

<?php if ( $top_layout_lp_wide || $st_stdata275 ): ?>
	/* トップページのコンテンツ上部の余白を0に */
	@media print, screen and (min-width: 960px) {
		body.front-page main {
			padding-top:0;
		}
		body.front-page main {
			padding-top:0;
		}

		/* おすすめ記事一覧の調整 */
		body.front-page .nowhits .pop-box {
			margin-top: -10px;
		}
	}
<?php endif; ?>

<?php if ( $st_stdata276 ): ?>
	/* 下層ページのコンテンツ上部の余白を0に */
	@media print, screen and (min-width: 960px) {
		body.not-front-page main {
			padding-top:0;
		}
		body.not-front-page main .st-eyecatch {
			margin-top:0;
		}
	}
<?php endif; ?>

<?php if ( $top_layout_lp_wide || $st_stdata382 ): ?>
	/* トップページのコンテンツ上部の余白を0に（959px以下） */
	@media print, screen and (max-width: 959px) {
		body.front-page .colum1 main,
		body.front-page main {
			padding-top:0;
		}
		body.front-page main .st-eyecatch {
			margin-top:0;
		}
	}
<?php endif; ?>

<?php if ( $st_stdata383 ): ?>
	/* 下層ページのコンテンツ上部の余白を0に（959px以下） */
	@media print, screen and (max-width: 959px) {
		body.not-front-page .colum1 main,
		body.not-front-page main {
			padding-top:0;
		}
		body.not-front-page main .st-eyecatch {
			margin-top:0;
		}
	}
<?php endif; ?>

<?php if ( trim($GLOBALS['stdata432']) !== '' ): // フォントファミリー指定 ?>
	*,
	code {
		<?php echo stripslashes( $GLOBALS["stdata432"] ); ?>
	}

	.kanren h3 a,
	.kanren h5 a {
		font-weight: bold;
	}
<?php else: ?>

	<?php if ( isset($GLOBALS['stdata311']) && $GLOBALS['stdata311'] === 'yes' ): // 旧式のフォントファミリー に変更 ?>
		*,
		code {
			font-family: "メイリオ", Meiryo, "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "ＭＳ Ｐゴシック", sans-serif;
		}
	<?php elseif ( isset($GLOBALS['stdata311']) && $GLOBALS['stdata311'] === 'roundedmplus1c' ): // Rounded M+ 1cメインに変更 ?>
		*,
		code {
			font-family: "M PLUS Rounded 1c", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", "Hiragino Kaku Gothic ProN", "メイリオ", meiryo, sans-serif;
			font-weight: 400;
		}
	<?php elseif ( isset($GLOBALS['stdata311']) && $GLOBALS['stdata311'] === 'noto' ): // Noto Sans JP ?>
		*,
		code {
			font-family: "Noto Sans JP", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", "Hiragino Kaku Gothic ProN", "メイリオ", meiryo, sans-serif;
			font-weight: 400;
		}
	<?php elseif ( isset($GLOBALS['stdata311']) && $GLOBALS['stdata311'] === 'notoserif' ): // Noto Serif JP ?>
		*,
		code {
			font-family: "Noto Serif JP", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", "Hiragino Kaku Gothic ProN", "メイリオ", meiryo, sans-serif;
			font-weight: 400;
		}
	<?php elseif ( isset($GLOBALS['stdata311']) && $GLOBALS['stdata311'] === 'yugo' ): // 游ゴシック ?>
		*,
		code {
			font-family: "游ゴシック", YuGothic, "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN", "Hiragino Sans", "メイリオ", meiryo, "Helvetica Neue", Helvetica, Arial, sans-serif;
			font-weight: 500;
		}
	<?php elseif ( isset($GLOBALS['stdata311']) && $GLOBALS['stdata311'] === 'yumin' ): // 游明朝 ?>
		*,
		code {
			font-family: "游明朝体", "Yu Mincho", YuMincho, "Hiragino Mincho ProN", -apple-system, BlinkMacSystemFont, "Segoe UI", "Helvetica Neue", "Hiragino Kaku Gothic ProN", "メイリオ", meiryo, sans-serif;
			font-weight: 500;
		}
	<?php endif; ?>

	<?php if ( trim($GLOBALS['stdata311']) !== '' ): // デフォルト以外 ?>
		.kanren h3 a,
		.kanren h5 a {
			font-weight: bold;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata400']) && $GLOBALS['stdata400'] === 'yes' ): // FontAwesomeIcons4.7.0の読み込み ?>
	[class^="fa-"], [class*=" fa-"] {
		font-family: FontAwesome;
		speak: none;
		font-style: normal;
		font-weight: normal;
		font-variant: normal;
		text-transform: none;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata489'] ) !== '' ): ?>
	/* おすすめヘッダーバナーを角丸に */
	.st-cardlink-card {
		border-radius: 5px;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata392'] ) !== '' ): ?>
	/* スマホ閲覧時のおすすめヘッダーバナーの高さを倍に */
	@media print, screen and (max-width: 959px) {
		.st-cardlink-card.has-bg {
    		min-height: 100px;
		}
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata266'] ) === '' && trim( $GLOBALS['stdata395'] ) !== '' ): // 記事スライドショーではなくヘッダー画像コンテンツあり ?>

	#st-header {
		<?php if ( isset( $GLOBALS['stdata399'] ) && ( $GLOBALS['stdata399'] ) === 'yes' ): // flexbox ?>
			display: flex; /* 子要素をflexboxで揃える */
			flex-direction: column; /* 子要素をflexboxにより縦方向に揃える */
			justify-content: center; /* 子要素をflexboxにより中央に配置する */
			align-items: center;  /* 子要素をflexboxにより中央に配置する */
		<?php endif; ?>
		width:100%;
		height: auto;
		box-sizing: border-box;
	}

	<?php if ( trim( $GLOBALS['stdata684'] ) !== '' ): // 背景を暗く ?>
		#st-headerbox .st-header-content * {
			color: <?php echo $GLOBALS['stdata684']; ?>;
		}
	<?php endif; ?>

	#st-headerbox .st-header-content {
		padding:20px;
	}

	#st-header p:last-child {
		margin-bottom: 0;
	}

	<?php if ( trim( $GLOBALS['stdata396'] ) !== '' ): // 背景を暗く ?>

		#st-header {
			z-index:2;
			position: relative;
		}
		#st-headerbox {
			position: relative;
		}
		#st-headerbox::before {
			background-color: rgba(0,0,0,0.5);
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			content: ' ';
			z-index:1;
		}

	<?php endif; ?>

<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata378'] ) !== '' ): // コメントのウェブサイトの入力欄を非表示 ?>
	.comment-form-url{
		display:none;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata379'] ) !== '' ): // コメントのメールアドレスの入力欄を非表示 ?>
	.comment-form-email{
		display:none;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata380'] ) !== '' ): // コメントの「メールアドレスが公開されることはありません。 * が付いている欄は必須項目です」を非表示 ?>
	.comment-notes {
		display:none;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata409'] ) !== '' ): // コメントフォームを非表示にする ?>
	#respond {
		display:none;
	}
<?php endif; ?>

<?php // カード型サムネイル縦横比
if ( trim( $GLOBALS['stdata606'] ) === '' ):
	$card_thumb_height = 74.25742;
elseif ( trim( $GLOBALS['stdata606'] ) === 'h56' ): // 16:9
	$card_thumb_height = 56;
elseif ( trim( $GLOBALS['stdata606'] ) === 'h52' ): // 1.91:1
	$card_thumb_height = 52.356;
elseif ( trim( $GLOBALS['stdata606'] ) === 'h75' ): // 4:3
	$card_thumb_height = 75;
elseif ( trim( $GLOBALS['stdata606'] ) === 'h67' ): // 3:2
	$card_thumb_height = 67;
else:
	$card_thumb_height = 62;
endif;
?>

 /* 画像の高さ / 幅 * 100% */
.content-post-slider .post-slide-image::before, /* サムネイルスライドショー・ショートコードスライドショー */
.post-card-list .post-card-image::before /* カードデザイン */
{
	padding-top: <?php echo esc_attr($card_thumb_height); ?>%;
}

<?php if ( ( isset( $GLOBALS['stdata644'] ) && $GLOBALS['stdata644'] === 'yes' ) || trim( $GLOBALS['stdata606'] ) === '' ): // 記事スライドショーのサムネイル画像の縦横比を反映しない ?>
	/* 記事スライドショー */
	.header-post-slider .post-slide-image::before {
		padding-top: 70%; /* 画像の高さ (657.2px) / 幅 (1,060px) * 100% */
	}
	@media only screen and (min-width: 600px) {
		.header-post-slider .post-slide-image::before {
			padding-top: 40%; /* 画像の高さ (593.6px) / 幅 (1,060px) * 100% */
		}
	}

	#st-header-bottom-category .content-post-slider .post-slide-image::before /* サムネイルスライドショー */
	{
		padding-top: 56%;
	}
<?php else: ?>
	.header-post-slider .post-slide-image::before {
		padding-top: <?php echo esc_attr($card_thumb_height); ?>%;
	}
	@media only screen and (min-width: 600px) {
		.header-post-slider .post-slide-image::before {
			padding-top: <?php echo esc_attr($card_thumb_height); ?>%;
		}
	}


	#st-header-bottom-category .content-post-slider .post-slide-image::before /* サムネイルスライドショー */
	{
		padding-top: <?php echo esc_attr($card_thumb_height); ?>%;
	}
<?php endif; ?>

<?php if ( isset( $GLOBALS['stdata643'] ) && $GLOBALS['stdata643'] === 'yes' ): // スマホ（599px以下）のタイトル背景を暗くする ?>
	@media print, screen and (max-width: 599px) {
		.header-post-slider .post-slide-date,
		.header-post-slider .post-slide-title {
			background: rgba(0, 0, 0, .5);
		}
		.header-post-slider .post-slide-date {
			opacity: inherit;
		}
	}
<?php else: ?>
	.header-post-slider .post-slide-text {
		padding-left: 10px;
		padding-bottom: 10px;
	}
<?php endif; ?>

<?php if ( isset( $GLOBALS['stdata608'] ) && $GLOBALS['stdata608'] === 'width' ): // カード型 サムネイル画像・スライドショーの縦横比基準 ?>
	#st-magazine .kanren dt img, /* JET */
	.content-post-slider .post-slide-image img, /* サムネイルスライドショー・ショートコードスライドショー */
	.post-card-list .post-card-image img, /* カードデザイン */
	.header-post-slider .post-slide-image img, /* 記事スライドショー */
	.header-post-slider .post-slide.has-image .post-slide-image img {
		width: 100%;
		height: auto;
	}
<?php elseif ( isset( $GLOBALS['stdata608'] ) && $GLOBALS['stdata608'] === 'height' ): ?>
	#st-magazine .kanren dt img, /* JET */
	.content-post-slider .post-slide-image img, /* サムネイルスライドショー・ショートコードスライドショー */
	.post-card-list .post-card-image img, /* カードデザイン */
	.header-post-slider .post-slide-image img, /* 記事スライドショー */
	.header-post-slider .post-slide.has-image .post-slide-image img {
		width: auto;
		height: 100%;
	}
<?php else: ?>

	.header-post-slider .post-slide-image img,
	.header-post-slider .post-slide.has-image .post-slide-image img,
	#st-magazine .kanren dt img, /* JET */
	.content-post-slider .post-slide-image img, /* サムネイルスライドショー・ショートコードスライドショー */
	.post-card-list .post-card-image img {
		width: 100%;
		height: 100%;
	}

<?php endif; ?>

<?php if( trim($GLOBALS["stdata403"]) === '' || ( isset($GLOBALS["stdata403"]) && $GLOBALS["stdata403"] === 'maru' ) ): // 正方形か丸 ?>
	/* YouTubeサムネイル */
	.youtube_thum_link_150 {
		<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
			width: 300px;
			height: 300px;
		<?php elseif(trim($GLOBALS['stdata91']) !== ''): // 大きく ?>
			width: 150px;
			height: 150px;
		<?php else: ?>
			width: 100px;
			height: 100px;
		<?php endif; ?>	
	}
@media print, screen and (max-width: 599px) {
	/* YouTubeサムネイル */
	.youtube_thum_link_150 {
		width: 100%;
		padding-top: 100%;
		height: inherit!important;
		min-height: inherit!important;
	}
}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata251']) && $GLOBALS['stdata251'] === 'yes' ): //サムネイル画像をポラロイド風に ?>
	div img {
		margin-bottom: 0;
	}

	/* YouTubeサムネイル */
	.kanren:not(.st-cardbox) .youtube_thum_link_150 {
		width: 88px;
		height: 88px;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata641']) && $GLOBALS['stdata641'] === 'yes'       //サムネイル画像を角丸に変更する
		  && isset($GLOBALS['stdata639']) && $GLOBALS['stdata639'] === 'yes'     //スマホ（599px以下）でもサムネイル画像を大きくする
		  && isset($GLOBALS['stdata637']) && $GLOBALS['stdata637'] === 'yes'       //サムネイルを大きく
		  && isset($GLOBALS['stdata638']) && $GLOBALS['stdata638'] === 'yes' ) : //サムネイルをさらに大きく ?>
	@media print, screen and (max-width: 599px) {
		.kanren.st-cardbox dt img {
			border-radius: 10px 10px 0 0!important;
		}
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata636']) && $GLOBALS['stdata636'] === 'yes' ) : // 内部リンクのサムネイル画像をフルサイズにする ?>
	a:not(.has-site) .st-cardbox:not(.st-cardbox-ex) .clearfix dt.st-card-img,
	.post a:not(.has-site) .st-cardbox:not(.st-cardbox-ex) .clearfix dt.st-card-img,
	#side a:not(.has-site) .st-cardbox:not(.st-cardbox-ex) .clearfix dt.st-card-img {
		height: inherit;
	}

	a:not(.has-site) .st-cardbox:not(.st-cardbox-ex) .clearfix dt.st-card-img > img,
	.post a:not(.has-site) .st-cardbox:not(.st-cardbox-ex) .clearfix dt.st-card-img > img,
	#side a:not(.has-site) .st-cardbox:not(.st-cardbox-ex) .clearfix dt.st-card-img > img {
		height: inherit;
		object-fit: contain;
		width: 100%;
	}

<?php endif; ?>

<?php if ( trim($GLOBALS['stdata636']) === '' && isset($GLOBALS['stdata637']) && $GLOBALS['stdata637'] === 'yes' ) : // 内部リンクのサムネイル画像をフルサイズにするが無効 + サムネイル画像を大きくする ?>
	main .st-cardbox .clearfix dt.st-card-img,
	.post .st-cardbox .clearfix dt.st-card-img {
		height: 150px;
	}
	@media only screen and (max-width: 959px) {
		#side .st-cardbox .clearfix dt.st-card-img {
			height: 150px;
		}
	}
<?php endif; ?>

<?php if ( trim($GLOBALS['stdata636']) === '' && trim($GLOBALS['stdata639']) === '' ) : // 内部リンクのサムネイル画像をフルサイズにするが無効 + スマホでもサムネイルサイズを大きくするが無効 ?>
	@media print, screen and (max-width: 599px) {
		#footer .st-cardbox .clearfix dt.st-card-img,
		#side .st-cardbox .clearfix dt.st-card-img,
		main .st-cardbox .clearfix dt.st-card-img,
		.post .st-cardbox .clearfix dt.st-card-img {
			height: 100px;
		}
	}
<?php endif; ?>

<?php if ( trim($GLOBALS['stdata636']) === '' ) : // 内部リンクのサムネイル画像をフルサイズにするが無効  ?>
	.st-cardstyle .st-cardbox .clearfix dt.st-card-img img,
	.post .st-cardstyle .st-cardbox .clearfix dt.st-card-img img,
	#side .st-cardstyle .st-cardbox .clearfix dt.st-card-img img {
		height: 200px;
	}
	@media only screen and (min-width: 600px) {
		.st-cardstyleb .st-cardbox .clearfix dt.st-card-img img,
		.post .st-cardstyleb .st-cardbox .clearfix dt.st-card-img img,
		#side .st-cardstyleb .st-cardbox .clearfix dt.st-card-img img {
			height: 200px;
		}
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata637']) && $GLOBALS['stdata637'] === 'yes' ) : // サムネイル画像を大きくする ?>
	@media print, screen and (min-width: 960px) {
		#footer .has-site .st-cardbox .clearfix dt.st-card-img,
		#footer .st-cardbox.youtube_thumb_150 .clearfix dt.st-card-img,
		#footer .st-cardbox.st-cardbox-ex .clearfix dt.st-card-img,
		#side .has-site .st-cardbox .clearfix dt.st-card-img,
		#side .st-cardbox.youtube_thumb_150 .clearfix dt.st-card-img,
		#side .st-cardbox.st-cardbox-ex .clearfix dt.st-card-img {
			height: 100px;
			min-height: 100px;
		}
	}

	@media only screen and (min-width: 600px) {
		/* 外部リンク */
		.has-site .st-cardbox .clearfix dt.st-card-img,
		.post .has-site .st-cardbox .clearfix dt.st-card-img,
		/* YouTube */
		.st-cardbox.youtube_thumb_150 .clearfix dt.st-card-img,
		.post .st-cardbox.youtube_thumb_150 .clearfix dt.st-card-img,
		/* カードURL */
		.st-cardbox.st-cardbox-ex .clearfix dt.st-card-img,
		.post .st-cardbox.st-cardbox-ex .clearfix dt.st-card-img {
			min-height: 150px;
		}
	}
	<?php if ( isset($GLOBALS['stdata638']) && $GLOBALS['stdata638'] === 'yes' && isset($GLOBALS['stdata639']) && $GLOBALS['stdata639'] === 'yes' ) : // さらに大きく + スマホでもサムネイルサイズを大きく ?>
		@media print, screen and (max-width: 599px) {
			.st-cardbox dt.st-card-img,
			/* 外部リンク */
			.has-site .st-cardbox .clearfix dt.st-card-img,
			.post .has-site .st-cardbox .clearfix dt.st-card-img,
			/* YouTube */
			.st-cardbox.youtube_thumb_150 .clearfix dt.st-card-img,
			.post .st-cardbox.youtube_thumb_150 .clearfix dt.st-card-img,
			/* カードURL */
			.st-cardbox.st-cardbox-ex .clearfix dt.st-card-img,
			.post .st-cardbox.st-cardbox-ex .clearfix dt.st-card-img {
				min-height: 200px;
			}
		}
	<?php endif; ?>
<?php endif; ?>

<?php // 記事一覧 ?>
<?php if ( ( trim($GLOBALS['stdata91']) !== '' ) && (trim($GLOBALS['stdata477']) !== '') ): //サムネイルサイズを大きく且つさらに大きく ?>
	/* サイドバー及びレイアウトボックス内の設置 */
	footer .kanren:not(.st-cardbox) dd,
	#side .kanren:not(.st-cardbox) dd {
		float: none;
		padding-top: 10px;
	}

	.rbox .kanren:not(.st-cardbox) dt img,
	.lbox .kanren:not(.st-cardbox) dt img,
	.rbox .kanren:not(.st-cardbox) dt,
	.lbox .kanren:not(.st-cardbox) dt {
		width: 100%;
	}

	.rbox .kanren:not(.st-cardbox) dd,
	.lbox .kanren:not(.st-cardbox) dd {
		float: none;
		padding-top: 10px;
	}

	/* PVモニター */
	#side .st-pvm-ranking-item-image,
	#side .st-pvm .st-pvm-ranking-item,
	#side .widget .st-pvm-ranking-item,
	#side .st-pvm-ranking-item {
		display: block;
		max-width: 100%;
	}

	#side .st-pvm-ranking-item-image {
		margin-right: 0;
	}

	#side .st-pvm-ranking-item-body {
		padding-top: 10px;
	}
<?php endif; ?>

<?php
$browser = strtolower($_SERVER['HTTP_USER_AGENT']);
if ( strstr($browser , 'firefox') // Firefox
	&& trim( $GLOBALS['stdata78'] ) !== '' // 画像表示をスクロールでフェードインが有効
	): ?>
	img {
		transition: unset;
    }
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata238'] ) === '' && trim( $GLOBALS['stdata566'] ) === '' ): // URLの自動ブログカード化を停止する + デフォルトのデフォルトの埋め込みURL（ブログカード）の変換を停止 ?>

	<?php if ( $st_card_label_designsetting && $st_card_label_designsetting === 'ribondesign' ): // リボン ?>
		/* キャプション */
		.wp-block-embed.is-type-wp-embed.wp-block-embed-wordpress {
			position: relative;
		}

		/* ラベルがある場合 */
		.wp-block-embed.is-type-wp-embed.kanren figcaption,
		.wp-block-embed.is-type-wp-embed.check figcaption,
		.wp-block-embed.is-type-wp-embed.important figcaption,
		.wp-block-embed.is-type-wp-embed.popular figcaption {
			font-size: .7em;
			color: #ccc;
			text-align:center;
			margin-top: -10px;
		}

		.wp-block-embed.is-type-wp-embed:not(.kanren):not(.important):not(.popular) figcaption {
			position: absolute;
			top: -20px;
			right: 0;
			display: inline-block;
			height: 30px;
			line-height: 30px;
			text-align: center;
			padding: 0 15px 0 18px;
			font-size: 12px;
			box-sizing: border-box;
			font-weight: bold;
			<?php if ( $st_card_label_bgcolor ): ?>
				background: <?php echo $st_card_label_bgcolor; ?>;
			<?php else: ?>
				background: #f5bf08;
			<?php endif; ?>
			<?php if ( $st_card_label_textcolor ): ?>
				color: <?php echo $st_card_label_textcolor; ?>;
			<?php else: ?>
				color: #ffffff;
			<?php endif; ?>
		}

		.wp-block-embed.is-type-wp-embed:not(.kanren):not(.important):not(.popular) figcaption::after {
			position: absolute;
			content: '';
			width: 0px;
			height: 0px;
			z-index: 1;
			top: 0;
			right: -15px;
			border-width: 15px;
			<?php if ( $st_card_label_bgcolor ): ?>
				border-color: <?php echo $st_card_label_bgcolor; ?> transparent transparent <?php echo $st_card_label_bgcolor; ?>;
			<?php else: ?>
				border-color: #f5bf08 transparent transparent #f5bf08;
			<?php endif; ?>
			border-style: solid;
		}

		.wp-block-embed.is-type-wp-embed:not(.kanren):not(.important):not(.popular) figcaption::before {
			position: absolute;
			content: '';
			width: 0px;
			height: 0px;
			z-index: 1;
			top: 0;
			right: -15px;
			border-width: 15px;
			<?php if ( $st_card_label_bgcolor ): ?>
				border-color: transparent transparent <?php echo $st_card_label_bgcolor; ?> <?php echo $st_card_label_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent #f5bf08 #f5bf08;
			<?php endif; ?>
			border-style: solid;
		}
	<?php elseif( $st_card_label_designsetting && $st_card_label_designsetting === 'no-setting' ): // ラベル未実装 ?>
		/* キャプション */
		.wp-block-embed.is-type-wp-embed.wp-block-embed-wordpress {
			position: relative;
			overflow: hidden;
		}

		.wp-block-embed.is-type-wp-embed figcaption {
			position: absolute;
			white-space: nowrap;
			display: inline-block;
			padding: 7px 0;
			top: 15px;
			width: 150px;
			text-align: center;
			font-size: 90%;
			line-height: 1.2;
			font-weight: bold;
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
			z-index: 9999;
			left: -35px;
			-webkit-transform: rotate(-45deg);
			-ms-transform: rotate(-45deg);
			transform: rotate(-45deg);
			<?php if ( $st_card_label_bgcolor ): ?>
				background: <?php echo $st_card_label_bgcolor; ?>;
			<?php else: ?>
				background: #f5bf08;
			<?php endif; ?>
			<?php if ( $st_card_label_textcolor ): ?>
				color: <?php echo $st_card_label_textcolor; ?>;
			<?php else: ?>
				color: #ffffff;
			<?php endif; ?>
		}
	<?php else: // リボン ?>
		/* キャプション */
		.wp-block-embed.is-type-wp-embed.wp-block-embed-wordpress {
			position: relative;
		}

		/* ラベルがある場合 */
		.wp-block-embed.is-type-wp-embed.kanren figcaption,
		.wp-block-embed.is-type-wp-embed.check figcaption,
		.wp-block-embed.is-type-wp-embed.important figcaption,
		.wp-block-embed.is-type-wp-embed.popular figcaption {
			font-size: .7em;
			color: #ccc;
			text-align:center;
			margin-top: -10px;
		}

		.wp-block-embed.is-type-wp-embed:not(.kanren):not(.important):not(.popular) figcaption {
			position: absolute;
			top: -20px;
			right: 0;
			display: inline-block;
			height: 30px;
			line-height: 30px;
			text-align: center;
			padding: 0 15px 0 18px;
			font-size: 12px;
			box-sizing: border-box;
			font-weight: bold;
			<?php if ( $st_card_label_bgcolor ): ?>
				background: <?php echo $st_card_label_bgcolor; ?>;
			<?php else: ?>
				background: #eee;
			<?php endif; ?>
			<?php if ( $st_card_label_textcolor ): ?>
				color: <?php echo $st_card_label_textcolor; ?>;
			<?php else: ?>
				color: #333;
			<?php endif; ?>
		}

		.wp-block-embed.is-type-wp-embed:not(.kanren):not(.important):not(.popular) figcaption::after {
			position: absolute;
			content: '';
			width: 0px;
			height: 0px;
			z-index: 1;
			top: 0;
			right: -15px;
			border-width: 15px;
			<?php if ( $st_card_label_bgcolor ): ?>
				border-color: <?php echo $st_card_label_bgcolor; ?> transparent transparent <?php echo $st_card_label_bgcolor; ?>;
			<?php else: ?>
				border-color: #eee transparent transparent #eee;
			<?php endif; ?>
			border-style: solid;
		}

		.wp-block-embed.is-type-wp-embed:not(.kanren):not(.important):not(.popular) figcaption::before {
			position: absolute;
			content: '';
			width: 0px;
			height: 0px;
			z-index: 1;
			top: 0;
			right: -15px;
			border-width: 15px;
			<?php if ( $st_card_label_bgcolor ): ?>
				border-color: transparent transparent <?php echo $st_card_label_bgcolor; ?> <?php echo $st_card_label_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent #eee #eee;
			<?php endif; ?>
			border-style: solid;
		}
	<?php endif; ?>

<?php else: ?>
	/* キャプション */
	.wp-block-embed figcaption {
		font-size: .8rem;
		color: #777;
	}
<?php endif; ?>


<?php if(trim($GLOBALS['stdata202']) !== ''): // PC閲覧時も記事一覧（トップ・アーカイブ・関連記事）の抜粋を非表示にする ?>
	/* タブ式カテゴリーの抜粋 */
	aside .post-card-excerpt,
	.st-tab-category .post-card-excerpt {
		display: none;
	}
<?php endif; ?>

<?php if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
	@media print, screen and (max-width: 599px) {
		.st-timeline .kanren.st-cardbox dd {
			padding-right: 85px;
			padding-left: 0;
		}
		.st-timeline .kanren.st-cardbox dt {
			width: 70px;
		}
	}
<?php else: ?>
	@media print, screen and (max-width: 599px) {
		.st-timeline .kanren.st-cardbox dd {
			padding-left: 85px;
			padding-right: 0;
		}
		.st-timeline .kanren.st-cardbox dt {
			width: 70px;
		}
	}
<?php endif; ?>

<?php // 記事一覧 ?>
<?php if(trim($GLOBALS['stdata91']) !== ''): //サムネイルサイズを大きく ?>
	:root main .kanren:not(.st-cardbox) dt:not(.st-cardbox) img,
	.wp-block-columns .kanren:not(.st-cardbox) dt:not(.st-card-img) {
		float: none;
		width: 100%;
	}
	.wp-block-columns .kanren:not(.st-cardbox) dd {
		float: none;
		padding-top: 10px;
		padding-left: 0;
	}
<?php endif; ?>

<?php if(trim($GLOBALS['stdata405']) !== ''): //スマホでもサムネイルサイズを大きく ?>
	@media only screen and (max-width: 599px) {
	<?php if(trim($GLOBALS['stdata91']) !== ''): //サムネイルサイズを大きく ?>
		.kanren:not(.st-cardbox) dt {
			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 100%;

				<?php if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
					float: none;
				<?php endif; ?>

			<?php else: ?>

				width: 150px;

				<?php if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
					float: right;
				<?php else: ?>
					float: left;
				<?php endif; ?>

			<?php endif; ?>
		}

		<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				.kanren:not(.st-cardbox) dt:not(.st-card-img) {
					float: none;
				}
				.kanren:not(.st-cardbox) dd {
					float: none;
					padding-top: 10px;
				}

				/* PVモニター */
				.post .st-pvm .st-pvm-ranking-item,
				.widget .st-pvm-ranking-item,
				.st-pvm-ranking-item {
					display: block;
					max-width: 100%;
				}

				.st-pvm-ranking-item-image {
					margin-right: 0;
					display: block;
				}

				.st-pvm-ranking-item-image img {
					width: 100%;
				}

				.st-pvm-ranking-item-body {
					padding-top: 10px;
				}
		<?php endif; ?>

		.kanren:not(.st-cardbox) dt img {
			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 100%;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		.kanren:not(.st-cardbox) dd {
			<?php if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>

				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					padding-right: 0;
				<?php else: ?>
					padding-right: 165px;
				<?php endif; ?>

				padding-left: 0;

			<?php else: ?>

				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					padding-left: 0;
				<?php else: ?>
					padding-left: 165px;
				<?php endif; ?>

			<?php endif; ?>
		}

		<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
			.lbox .kanren:not(.st-cardbox) dd,
			.rbox .kanren:not(.st-cardbox) dd {
				padding-right: 0;
				padding-left: 0;
			}
		<?php endif; ?>

		/*view数*/
		.st-wppviews-label .wpp-views,
		.st-wppviews-label .wpp-views-limit {
			font-size: 90%;
		}
	<?php endif; ?>

	<?php if( ( isset( $GLOBALS['stdata403'] ) && ( $GLOBALS['stdata403'] === 'full' || $GLOBALS['stdata403'] === 'original' ) ) || trim($GLOBALS['stdata91']) !== '' ): //サムネイルサイズを大きく又はサムネイルを横長に ?>
		/* YouTubeサムネイル */
		.kanren:not(.st-cardbox) .youtube_thum_link_150 {
				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					width: 100%;
					min-height: 200px;
				<?php else: ?>
					width: 150px;
					height: 150px;
				<?php endif; ?>
		}
		/*PVモニター*/
		.st-pvm-ranking-item-image {
				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					width: 100%;
				<?php else: ?>
					width: 150px;
				<?php endif; ?>
		}
	<?php endif; ?>

	<?php if ( isset($GLOBALS['stdata251']) && $GLOBALS['stdata251'] === 'yes' ): //サムネイル画像をポラロイド風に ?>
		.kanren dt:not(.st-card-img) {
			<?php if ( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'maru' ) : //サムネイルを丸く
				if ( isset($GLOBALS['stdata91']) && $GLOBALS['stdata91'] === 'yes' ) : //サムネイルを大きく ?>
					padding: 10px;
				<?php endif; ?>
					border-radius:50%;
			<?php elseif ( isset($GLOBALS['stdata91']) && $GLOBALS['stdata91'] === 'yes' ) : //サムネイルを大きく ?>
				padding: 10px 10px 17px;
			<?php endif; ?>
		}

		/* YouTubeサムネイル */
		.kanren:not(.st-cardbox) .youtube_thum_link_150 {
			width: 138px;
			height: 138px;
		}

		<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
			.lbox .kanren:not(.st-cardbox) dd,
			.rbox .kanren:not(.st-cardbox) dd,
			footer .kanren:not(.st-cardbox) dd,
			#side .kanren:not(.st-cardbox) dd {
				padding-top: 10px;
			}
			@media only screen and (max-width: 599px) {
				.kanren:not(.st-cardbox) dd {
					padding-top: 10px;
				}
			}

			/* YouTubeサムネイル */
			.kanren:not(.st-cardbox) .youtube_thum_link_150 {
				width: 100%;
				height: 322px;
			}
		<?php endif; ?>

	<?php endif; ?>
}
<?php endif; ?>

<?php // ブログカード ?>
<?php if(trim($GLOBALS['stdata639']) !== ''): //スマホでもサムネイルサイズを大きく ?>
	@media only screen and (max-width: 599px) {
	<?php if(trim($GLOBALS['stdata637']) !== ''): //サムネイルサイズを大きく ?>
		.kanren.st-cardbox dt {
			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 100%;

				<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
					float: none;
				<?php endif; ?>

			<?php else: ?>

				width: 150px;

				<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
					float: right;
				<?php else: ?>
					float: left;
				<?php endif; ?>

			<?php endif; ?>
		}

		<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				.kanren.st-cardbox dt:not(.st-card-img) {
					float: none;
				}
				.kanren.st-cardbox dd {
					float: none;
					padding-top: 10px;
				}

				/* PVモニター */
				.post .st-pvm .st-pvm-ranking-item,
				.widget .st-pvm-ranking-item,
				.st-pvm-ranking-item {
					display: block;
					max-width: 100%;
				}

				.st-pvm-ranking-item-image {
					margin-right: 0;
					display: block;
				}

				.st-pvm-ranking-item-image img {
					width: 100%;
				}

				.st-pvm-ranking-item-body {
					padding-top: 10px;
				}
		<?php endif; ?>

		.kanren.st-cardbox dt img {
			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 100%;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		.kanren.st-cardbox dd {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>

				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-right: 0;
				<?php else: ?>
					padding-right: 165px;
				<?php endif; ?>

				padding-left: 0;

			<?php else: ?>

				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-left: 0;
				<?php else: ?>
					padding-left: 165px;
				<?php endif; ?>

			<?php endif; ?>
		}

		<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
			.post .wp-block-column .kanren.st-cardbox dd,
			.post .rbox .kanren.st-cardbox dd {
				padding-right: 0;
				padding-left: 0;
			}
		<?php endif; ?>

	<?php endif; ?>
}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata332']) && $GLOBALS['stdata332'] === 'yes' ): ?>
	/* ショートコード記事一覧のカテゴリーを非表示にする */
	.content-post-slider .st-catgroup {
		display:none;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata564']) && $GLOBALS['stdata564'] === 'yes' ): //  レスポンシブ（ショートコード含む記事一覧）画像の画質を上げる ?>
	.content-post-slider .post-slide-image img, .post-card-list .post-card-image img {
		width: 100%;
		height: 100%!important;
		object-fit: cover;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata278'] ) !== '' ): ?>
	/* スライドショーの矢印アイコンを非表示にする */
	.slick-next, .slick-prev {
		display: none !important;
	}
<?php endif; ?>

<?php if ( isset( $GLOBALS['stdata328'] ) ): //スライドショーの矢印カラー ?>
	.slick-prev::before,
	.slick-next::before {
		color: <?php echo $GLOBALS['stdata328']; ?>
	}
<?php endif; ?>

/* 検索フォーム */
#s,
.s {
	<?php if ( $st_search_form_text_color ): ?>
		color: <?php echo $st_search_form_text_color; ?>;
	<?php endif; ?>
	<?php if ( $st_search_form_font_size ): ?>
		font-size: <?php echo $st_search_form_font_size; ?>px;
	<?php endif; ?>
	<?php if ( $st_search_form_padding_lr ): ?>
		padding-left: <?php echo $st_search_form_padding_lr; ?>px;
	<?php endif; ?>
	<?php if ( $st_search_form_padding_tb ): ?>
		padding-top: <?php echo $st_search_form_padding_tb; ?>px;
		padding-bottom: <?php echo $st_search_form_padding_tb; ?>px;
	<?php endif; ?>
	<?php if ( $st_search_form_bg_color ): ?>
		background: <?php echo $st_search_form_bg_color; ?>;
	<?php endif; ?>
}

.st-custom-search-box-tpl-default .cs-text-input {
	<?php if ( $st_search_form_padding_lr ): ?>
		padding-left: <?php echo $st_search_form_padding_lr; ?>px !important;
		padding-right: <?php echo $st_search_form_padding_lr; ?>px !important;
	<?php endif; ?>
	<?php if ( $st_search_form_padding_tb ): ?>
		padding-top: <?php echo $st_search_form_padding_tb; ?>px !important;
		padding-bottom: <?php echo $st_search_form_padding_tb; ?>px !important;
	<?php endif; ?>
}

input#s:-ms-input-placeholder,
input.s:-ms-input-placeholder {
	<?php if ( $st_search_form_text_color ): ?>
		color: <?php echo $st_search_form_text_color; ?> !important;
	<?php endif; ?>
	<?php if ( $st_search_form_font_size ): ?>
		font-size: <?php echo $st_search_form_font_size; ?>px !important;
	<?php endif; ?>
}

input#s::-ms-input-placeholder,
input.s::-ms-input-placeholder {
	<?php if ( $st_search_form_text_color ): ?>
		color: <?php echo $st_search_form_text_color; ?> !important;
	<?php endif; ?>
	<?php if ( $st_search_form_font_size ): ?>
		font-size: <?php echo $st_search_form_font_size; ?>px !important;
	<?php endif; ?>
}

input#s::placeholder,
input.s::placeholder {
	<?php if ( $st_search_form_text_color ): ?>
		color: <?php echo $st_search_form_text_color; ?> !important;
	<?php endif; ?>
	<?php if ( $st_search_form_font_size ): ?>
		font-size: <?php echo $st_search_form_font_size; ?>px !important;
	<?php endif; ?>
}

:root #searchform,
.st-custom-search-box-tpl-default .cs-text {
	<?php if ( $st_search_form_border_color ): ?>
		border-color: <?php echo $st_search_form_border_color; ?>;
	<?php endif; ?>
	<?php if ( $st_search_form_border_width ): ?>
		border-width: <?php echo $st_search_form_border_width; ?>px;
	<?php endif; ?>
	<?php if ( $st_search_form_border_radius ): ?>
		border-radius: <?php echo $st_search_form_border_radius; ?>px;
	<?php endif; ?>

	<?php if ( ( $st_search_form_border_color && $st_search_form_icon_bg_color ) && ( $st_search_form_border_color === $st_search_form_icon_bg_color ) ): // 枠線とアイコンカラーが同じ場合 ?>
		<?php if ( $st_search_form_icon_bg_color ): ?>
			background: <?php echo $st_search_form_icon_bg_color; ?>;
		<?php endif; ?>
	<?php endif; ?>
}

input#searchsubmit {
	<?php if ( $st_search_form_padding_lr ): ?>
		padding-right: <?php echo $st_search_form_padding_lr; ?>px;
		padding-left: <?php echo $st_search_form_padding_lr; ?>px;
	<?php endif; ?>
	<?php if ( $st_search_form_icon_color ): ?>
		color: <?php echo $st_search_form_icon_color; ?>;
	<?php endif; ?>
	<?php if ( $st_search_form_font_size ): ?>
		font-size: <?php echo $st_search_form_font_size; ?>px;
	<?php endif; ?>
	<?php if ( $st_search_form_icon_bg_color ): ?>
		background: <?php echo $st_search_form_icon_bg_color; ?>;
	<?php elseif ( $st_search_form_bg_color ): ?>
		background: <?php echo $st_search_form_bg_color; ?>;
	<?php endif; ?>
}

/* カスタム検索ボタン */
.cs-search-button {
	<?php if ( $st_search_form_btn_border_color && $st_search_form_btn_border_width ): ?>
		border: solid <?php echo $st_search_form_btn_border_color; ?> <?php echo $st_search_form_btn_border_width; ?>px;
	<?php endif; ?>

	<?php if ( $st_search_form_btn_padding_lr ): ?>
		padding-left: <?php echo $st_search_form_btn_padding_lr; ?>px;
		padding-right: <?php echo $st_search_form_btn_padding_lr; ?>px;
	<?php endif; ?>

	<?php if ( $st_search_form_btn_padding_tb ): ?>
		padding-top: <?php echo $st_search_form_btn_padding_tb; ?>px;
		padding-bottom: <?php echo $st_search_form_btn_padding_tb; ?>px;
	<?php endif; ?>

	<?php if ( $st_search_form_btn_border_radius ): ?>
		border-radius: <?php echo $st_search_form_btn_border_radius ?>px;
	<?php endif; ?>

	<?php if ( $st_search_form_btn_bg_color ): ?>
		background-color: <?php echo $st_search_form_btn_bg_color; ?>;
	<?php else: ?>
		background-color: transparent;
	<?php endif; ?>

	<?php if ( $st_search_form_btn_text_color ): ?>
		color: <?php echo $st_search_form_btn_text_color; ?>;
	<?php endif; ?>

	<?php if ( $st_search_form_btn_font_size ): ?>
		font-size: <?php echo $st_search_form_btn_font_size ?>px;
	<?php endif; ?>

	<?php if ( $st_search_form_btn_font_weight ): ?>
		font-weight: bold;
	<?php endif; ?>

	<?php if ( $st_search_form_btn_shadow_color ): ?>
		<?php if ( $st_search_form_btn_border_width ): ?>
			box-shadow:0 <?php echo $st_search_form_btn_border_width ?>px 0 <?php echo $st_search_form_btn_shadow_color; ?>;
		<?php else: ?>
			box-shadow:0 1px 0 <?php echo $st_search_form_btn_shadow_color; ?>;
		<?php endif; ?>
	<?php endif; ?>
}
<?php if ( $st_search_form_btn_border_width && $st_search_form_btn_shadow_color ): ?>
	.cs-search-button:hover {
		transform: translateY(<?php echo $st_search_form_btn_border_width ?>px);
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata320']) && $GLOBALS['stdata320'] === 'yes' ): // トップページ及びアーカイブの記事一覧がカード化-EX ?>
	/* 1カラムで最大化したい場合
	@media only screen and (min-width: 960px) {
		.home .colum1 main, .category .colum1 main {
			padding-left:0;
			padding-right:0;
		}
	} */
	.st-pagelink {
	padding-top: 40px;
	}
	/* 検索結果 */
	.post.post-search {
		padding-bottom: 20px;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata367']) && $GLOBALS['stdata367'] === 'yes' ): //一覧カードデザインBに変更 ?>
	@media only screen and (max-width: 599px) {
		.itiran-card-list.is-small-columns-1 .post-card-title {
			font-size:120%;
		}
	}
	.post-card-list-item:not(.st-infeed-adunit) {
		box-shadow: 0 1px 8px rgb(0,0,0, .1), 0 4px 4px -4px rgb(0,0,0, .1);
	}
	.post-card-list-item .post-card-body{
		  padding: 0 20px 20px;
	}
	.kanren-card-list{
	  margin-bottom: 20px;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata582']) !== '' ): // タブ式 カテゴリー記事一覧

	$category_a_id = get_option( 'st-data569', '' ) !== '' ? get_option( 'st-data569' ) : ''; // カテゴリーAのID
	$category_b_id = get_option( 'st-data570', '' ) !== '' ? get_option( 'st-data570' ) : '';  // カテゴリーBのID
	$category_c_id = get_option( 'st-data571', '' ) !== '' ? get_option( 'st-data571' ) : '';  // カテゴリーCのID
	$category_d_id = get_option( 'st-data572', '' ) !== '' ? get_option( 'st-data572' ) : '';  // カテゴリーDのID

	$cat_meta_a_bgcolor = get_option( 'st-data577', '' ) !== '' ? get_option( 'st-data577' ) : '';  // カテゴリーAのタブ背景色
	$cat_meta_b_bgcolor = get_option( 'st-data578', '' ) !== '' ? get_option( 'st-data578' ) : '';  // カテゴリーBのタブ背景色
	$cat_meta_c_bgcolor = get_option( 'st-data579', '' ) !== '' ? get_option( 'st-data579' ) : '';  // カテゴリーCのタブ背景色
	$cat_meta_d_bgcolor = get_option( 'st-data580', '' ) !== '' ? get_option( 'st-data580' ) : '';  // カテゴリーDのタブ背景色

	//カテゴリーIDからカテゴリー情報
	if ( $category_a_id ):
		$category_a = get_category( $category_a_id );
		// カテゴリーのメタ情報を取得
		if( $category_a ):
			$cat_meta_a = st_get_term_meta( $category_a_id );
		else:
			$cat_meta_a = '';
		endif;
	else:
		// 空の場合は全て表示
		$category_a = get_category( 0 );
		$cat_meta_a = st_get_term_meta( 0 );
	endif;

	if ( $category_b_id ):
		$category_b = get_category( $category_b_id );
		if( $category_b ):
			$cat_meta_b = st_get_term_meta( $category_b_id );
		else:
			$cat_meta_b = '';
		endif;
	else:
		$cat_meta_b = '';
	endif;

	if ( $category_c_id ):
		$category_c = get_category( $category_c_id );
		if( $category_c ):
			$cat_meta_c = st_get_term_meta( $category_c_id );
		else:
			$cat_meta_c = '';
		endif;
	else:
		$cat_meta_c = '';
	endif;

	if ( $category_d_id ):
		$category_d = get_category( $category_d_id );
		if( $category_d ):
			$cat_meta_d = st_get_term_meta( $category_d_id );
		else:
			$cat_meta_d = '';
		endif;
	else:
		$cat_meta_d = '';
	endif;

	// カテゴリー別の背景色を取得
	// テーマ管理 > カテゴリー設定
	if ( ! $cat_meta_a_bgcolor ): // テーマ管理でカラー指定が無い場合
		if ( isset( $cat_meta_a['bgcolor'] ) && trim( $cat_meta_a['bgcolor'] ) !== '' ): // カテゴリー設定でカラー指定がある場合
			$cat_meta_a_bgcolor = $cat_meta_a['bgcolor'];
		else:
			$cat_meta_a_bgcolor = '';
		endif;
	endif;

	if ( ! $cat_meta_b_bgcolor ): // テーマ管理でカラー指定が無い場合
		if ( isset( $cat_meta_b['bgcolor'] ) && trim( $cat_meta_b['bgcolor'] ) !== '' ):
			$cat_meta_b_bgcolor = $cat_meta_b['bgcolor'];
		else:
			$cat_meta_b_bgcolor = '';
		endif;
	endif;

	if ( ! $cat_meta_c_bgcolor ): // テーマ管理でカラー指定が無い場合
		if ( isset( $cat_meta_c['bgcolor'] ) && trim( $cat_meta_c['bgcolor'] ) !== '' ):
			$cat_meta_c_bgcolor = $cat_meta_c['bgcolor'];
		else:
			$cat_meta_c_bgcolor = '';
		endif;
	endif;

	if ( ! $cat_meta_d_bgcolor ): // テーマ管理でカラー指定が無い場合
		if ( isset( $cat_meta_d['bgcolor'] ) && trim( $cat_meta_d['bgcolor'] ) !== '' ):
			$cat_meta_d_bgcolor = $cat_meta_d['bgcolor'];
		else:
			$cat_meta_d_bgcolor = '';
		endif;
	endif;
?>

	<?php if ( isset($GLOBALS['stdata610']) && $GLOBALS['stdata610'] === 'border' ): // タブをボーダーデザインに ?>

		.front-page .st-tab-category .st-tab-content .st-tab-label + label {
			background-color: transparent!important;
			border-top: none!important;
			border-left: none!important;
			border-right: none!important;
			padding: 10px 0;
			border-bottom-color: #ccc!important;
			border-radius: 0!important;
			transition-duration: .5s;
		}

		.front-page .st-tab-category .st-tab-content .st-tab-label:checked + label {
			border-bottom-width: 2px!important;
			<?php if( $key_patterncolor ): ?>
				border-bottom-color: <?php echo $key_patterncolor; ?>!important;
			<?php endif; ?>
		}

		<?php if ( $cat_meta_a_bgcolor ): ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label.tab-a:checked + label {
				border-bottom: solid 2px <?php echo $cat_meta_a_bgcolor; ?>!important;
			}
		<?php endif; ?>

		<?php if ( $cat_meta_b_bgcolor ): ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label.tab-b:checked + label {
				border-bottom: solid 2px <?php echo $cat_meta_b_bgcolor; ?>!important;
			}
		<?php endif; ?>

		<?php if ( $cat_meta_c_bgcolor ): ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label.tab-c:checked + label {
				border-bottom: solid 2px <?php echo $cat_meta_c_bgcolor; ?>!important;
			}
		<?php endif; ?>

		<?php if ( $cat_meta_d_bgcolor ): ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label.tab-d:checked + label {
				border-bottom: solid 2px <?php echo $cat_meta_d_bgcolor; ?>!important;
			}
		<?php endif; ?>
		.st-tab-content .st-tab-label + label::before {
			content: none!important;
		}

		<?php elseif( isset($GLOBALS['stdata610']) && $GLOBALS['stdata610'] === 'tab' ): // シンプルなタブデザイン ?>

			.front-page .st-tab-category .st-tab-content .st-tab-label + label {
				border-top: none!important;
				border-left: none!important;
				border-right: none!important;
				border-bottom: solid 1px #ccc!important;
				background-color: transparent!important;
			}

			.front-page .st-tab-category .st-tab-content .st-tab-label:checked + label {
				border: 1px solid #ccc!important;
				border-bottom: none!important;
			}

			.front-page .st-tab-category .st-tab-content .st-tab-label + label {
				border-radius: 0!important;
			}

			.front-page .st-tab-category .st-tab-content .st-tab-label:checked + label::before {
				content: none!important;
			}

			.front-page .st-tab-category .st-tab-content-type-button .st-tab-main {
				margin-top: 28px;
			}

			@media only screen and (max-width: 959px) {
				.front-page .st-tab-category .st-tab-content-type-button.st-tab-content-tab-4 label {
					margin-bottom: 20px;
				}
				.front-page .st-tab-category .st-tab-content-type-button .st-tab-main {
					margin-top: 8px;
				}
				.front-page .st-tab-category .st-tab-content input[type="radio"] + label {
					padding: 10px 7px;
				}
			}

	<?php else: ?>

		.front-page .st-tab-category .st-tab-content .st-tab-label:checked + label {
			position: relative;
		}

		.front-page .st-tab-category .st-tab-content .st-tab-label:checked + label,
		.front-page .st-tab-category .st-tab-content .st-tab-label:checked + label::before {
			top: inherit!important;
		}

		<?php if ( $cat_meta_a_bgcolor ): ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label.tab-a:checked + label::before {
				content: '';
				position: absolute;
				border: 8px solid transparent;
				bottom: -18px;
				left: calc( 50% - 8px );
				border-top: 10px solid <?php echo $cat_meta_a_bgcolor; ?>;
			}
		<?php endif; ?>

		<?php if ( $cat_meta_b_bgcolor ): ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label.tab-b:checked + label::before {
				content: '';
				position: absolute;
				border: 8px solid transparent;
				bottom: -18px;
				left: calc( 50% - 8px );
				border-top: 10px solid <?php echo $cat_meta_b_bgcolor; ?>;
			}
		<?php endif; ?>

		<?php if ( $cat_meta_c_bgcolor ): ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label.tab-c:checked + label::before {
				content: '';
				position: absolute;
				border: 8px solid transparent;
				bottom: -18px;
				left: calc( 50% - 8px );
				border-top: 10px solid <?php echo $cat_meta_c_bgcolor; ?>;
			}
		<?php endif; ?>

		<?php if ( $cat_meta_d_bgcolor ): ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label.tab-d:checked + label::before {
				content: '';
				position: absolute;
				border: 8px solid transparent;
				bottom: -18px;
				left: calc( 50% - 8px );
				border-top: 10px solid <?php echo $cat_meta_d_bgcolor; ?>;
			}
		<?php endif; ?>

		<?php if ( isset($GLOBALS['stdata610']) && $GLOBALS['stdata610'] === 'square' ): // スクエアにする ?>
			.front-page .st-tab-category .st-tab-content .st-tab-label + label {
				border-radius: 0!important;
			}

			.front-page .st-tab-category .st-tab-content .st-tab-label:checked + label::before {
				content: none!important;
			}
		<?php else: ?>
			/* ふきだし分のマージンを追加 */
			.front-page .st-tab-category .st-tab-content-type-button .st-tab-main {
				margin-top: 28px;
			}
		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>

<?php if ( isset( $GLOBALS["stdata320"] ) && $GLOBALS["stdata320"] === 'yes' //トップページ及びアーカイブの記事一覧をカードデザインにする
	&& trim( $GLOBALS["stdata44"] ) === ''                              //トップページのコンテンツ内の新着記事一覧を非表示にする が無効
): ?>
	.front-page .sns {
		padding-top: 30px;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata262']) && $GLOBALS['stdata262'] === 'yes' ): //SNSボタンのカラーを優しい色にする ?>
    /* ツイッター */
	.sns .twitter a {
		background: #424242;
		box-shadow: 0 3px 0 #1a1a1a;
	}
	/* Facebook */
	.sns .facebook a {
		background: #4a7ab4;
		box-shadow: 0 3px 0 #3f6798;
	}
	.sns .st-svg-facebook {
    	border-right: 1px solid #618FC8;
	}
	/* はてぶ */
	.sns .hatebu a {
		background: #349ace;
		box-shadow: 0 3px 0 #2b83b0;
	}
	/* Pinterest */
	.sns .sns-pinterest a {
		background: #ff233c;
		box-shadow: 0 3px 0 #fb001c;
	}
	/* LINE */
	.sns .line a {
		background:#56B870;
		box-shadow: 0 3px 0 #39A96B;
	}
	.sns .st-svg-comment {
    	border-right: 1px solid #74C67A;
	}
	/* Pocket */
	.sns .pocket a {
		background: #e53e53;
		box-shadow: 0 3px 0 #de1e36;
	}
	/* コメント */
	.sns .sns-comment a {
		background: #FFCA28;
		box-shadow: 0 3px 0 #FFC107;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata263']) && $GLOBALS['stdata263'] === 'yes' ): //会話風アイコンを少し動かす ?>
	.is-style-st-paragraph-kaiwa:not(.stop)::before,
    .st-kaiwa-box:not(.stop) .st-kaiwa-face img {
        animation: animScale 4s infinite ease-out;
        transform-origin: 50% 50%;
        animation-play-state:running;
		backface-visibility: hidden;
    }

	.is-style-st-paragraph-kaiwa-b:not(.stop)::before,
    .st-kaiwa-box:not(.stop) .st-kaiwa-face2 img {
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
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata476']) && $GLOBALS['stdata476'] === 'yes' ): //会話風アイコンを少し大きく（80px） ?>
	.st-kaiwa-face2,
	.st-kaiwa-face {
		width: 80px;
	}

	.st-kaiwa-face2 img,
	.st-kaiwa-face img {
		width: 80px!important;
	}

	.st-kaiwa-face-name2,
	.st-kaiwa-face-name {
		max-width: 80px;
	}

	.st-kaiwa-area,
	.st-kaiwa-area2 {
		padding-top: 10px;
	}

	/* 簡易会話ふきだし */
	.is-style-st-paragraph-kaiwa::before,
	.is-style-st-paragraph-kaiwa-b::before {
		width: 80px;
		min-width: 80px;
		height: 80px;
	}
	.is-style-st-paragraph-kaiwa::after,
	.is-style-st-paragraph-kaiwa-b::after {
		top: 20px!important;
		left: 75px!important;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'maru' ) : //サムネイルを丸く ?>
	.kanren dt:not(.st-card-img) img {
    		border-radius:50%;
	}
	#st-magazine .kanren .st-top-box dt img {
    		border-radius: 0;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata251']) && $GLOBALS['stdata251'] === 'yes' ): //サムネイル画像をポラロイド風に ?>
	.kanren dt:not(.st-card-img) {
		border: 1px solid #e6e6e6;
		background:#fff;
		margin-bottom: 0;
		box-shadow: 0 10px 5px -10px #bebebe;
		display: inline-block;
		box-sizing: border-box;
		position:relative;
		<?php if ( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'maru' ) : //サムネイルを丸く ?>
			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				padding: 10px;
			<?php else: ?>
				padding: 5px;
			<?php endif; ?>
			border-radius:50%;
		<?php else: ?>
			padding: 5px 5px 10px;
		<?php endif; ?>
	}

	<?php if ( $GLOBALS['stdata403'] !== 'maru' && trim($GLOBALS['stdata405']) !== '' && trim($GLOBALS['stdata477']) !== '' ): // さらに大きく ?>
		@media only screen and (max-width: 599px) {
			.kanren dt:not(.st-card-img) {
				padding: 10px 10px 17px;
			}
		}
	<?php endif; ?>

	.st-wppviews-text {
		position:absolute;
		top:-6px;
		left:-6px;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata252']) && $GLOBALS['stdata252'] === 'yes' ): //サムネイル画像にテープ ?>
	.kanren dt:not(.st-card-img)::before {
		background:#FFE0B2;
		content:'';
		width:33%;
		height:10px;
		position:absolute;
		top:-6px;
		left:30%;
		opacity:0.5;
		transform: rotate(5deg);
	}
<?php endif; ?>

<?php if ( trim($GLOBALS['stdata234'] ) !== '' ): ?>
	.page #breadcrumb {
		margin-bottom:10px;
	}
<?php endif; ?>

<?php if ( trim($GLOBALS['stdata249'] ) !== '' ): //ミドルメニュー3列 ?>
	.st-middle-menu .menu > li {
		width:33.33%;
	}
	.st-middle-menu .menu > li:nth-child(3n) {
		border-right:none;
	}
	.st-middle-menu .menu li a{
		font-size:80%;
	}
<?php else: // 2列 ?>
	.st-middle-menu .menu > li {
		width:50%;
	}
	.st-middle-menu .menu li a{
		font-size:90%;
	}
<?php endif; ?>

<?php if  ( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'maru' ): //サムネイルの形（マル）に合わせてナンバーも変化 ?>
	.poprank-no2,
	.poprank-no {
		border-radius: 50%;
	}
<?php endif; ?>

<?php if  ( trim($GLOBALS['stdata488']) !== '' && $GLOBALS['stdata403'] !== 'maru' ): //サムネイルの形（角丸）に合わせてナンバーも変化 ?>
	.st-pvm-ranking-item-image::before, /* PVモニター */
	.poprank-no2,
	.poprank-no {
		border-radius: 0 0 5px 0;
	}
<?php endif; ?>

<?php if  ( isset($GLOBALS['stdata5']) && $GLOBALS['stdata5'] === 'yes' ): //サムネイルを非表示 ?>
	.poprank-no2,
	.poprank-no {
		display: inline-block;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata207']) && $GLOBALS['stdata207'] === 'yes' ): // SNSボタンをシンプルにする ?>
	.sns {
		width: 100%;
		text-align:center;
	}

	.sns li {
		float: none;
	}

	.sns li a {
		margin:0;
	}

	.post .sns ul,
	.sns ul {
		margin:0 auto;
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
	}

	.snstext{
		display:none;
	}

	.snscount{
		display:none;
	}

	.sns li {
		float: left;
		list-style: none;
		width: 40px;
		margin: 5px;
		position: relative;
	}

	.sns li i {
		font-size: 19px!important;
	}

	.sns li a {
		<?php if( isset($GLOBALS['stdata248']) && $GLOBALS['stdata248'] === 'yes' ): //丸くする ?>
			border-radius: 50%;
		<?php else: ?>
			border-radius: 2px;
		<?php endif; ?>
		box-sizing: border-box;
		color: #fff;
		font-size: 19px;
		height: 40px;
		width: 40px;
		padding: 0;
		-webkit-box-pack: center;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
	}

	.sns li a .st-fa,
	.sns li a .fa {
		padding: 0;
		border: 0;
		height: auto;
	}

	/* ツイッター */
	.sns .twitter a {
		box-shadow: none;
	}

	.sns .twitter a:hover {
		background:#424242;
		box-shadow: none;
	}

	.sns .st-svg-twitter::before {
		position: relative;
	}

	/* Facebook */
	.sns .facebook a {
		box-shadow: none;
	}
	.sns .facebook a:hover {
		background:#2c4373;
		box-shadow: none;
	}

	.sns .st-svg-facebook::before {
		position: relative;
		top:1px;
	}

	/* Pinterest */
	.sns .sns-pinterest a {
		box-shadow: none;
	}
	.sns .sns-pinterest a:hover {
		background:#d30018;
		box-shadow: none;
	}

	.sns .st-svg-pinterest-p::before {
		position: relative;
		left: 1px;
	}

	/* URLコピー */
	.sns .share-copy a {
		box-shadow: none;
	}
	.sns .share-copy a:hover {
		background:#ccc;
		box-shadow: none;
	}

	.sns .share-copy::before {
		position: relative;
		left: 1px;
	}

	.sns .share-copy .st-svg-clipboard {
		border-right: none;
	}

	/* はてぶ */
	.sns .hatebu a {
		box-shadow: none;
	}

	.sns .hatebu a:hover {
		box-shadow: none;
		background:#00a5de;
	}

	.sns .st-svg-hateb::before {
		border-right:none;
		padding-right:0;
		font-size:19px!important;
	}

	.sns .st-svg-hateb::before {
		position: relative;
		left: 1px;
	}

	/* LINE */
	.sns .line a {
		box-shadow: none;
	}
	.sns .line a:hover {
		background:#009200;
		box-shadow: none;
	}

	.sns .st-svg-comment::before {
		position: relative;
		left: 1px;
		top: -1px;
	}

	/* Pocket */
	.sns .pocket a {
		box-shadow: none;
	}
	.sns .pocket a:hover {
		background:#F27985;
		box-shadow: none;
	}

	.sns .st-svg-get-pocket::before {
		position: relative;
		top: 1px;
	}

	/* コメント */
	.sns .sns-comment a {
		box-shadow: none;
	}

	.sns .sns-comment a:hover {
		background:#FFB300;
		box-shadow: none;
	}

	.sns .sns-comment::before {
		position: relative;
		top:1px;
		left: 1px;
	}
<?php endif; ?>

<?php if ( ( ( !st_is_mobile() ) && ( !is_active_sidebar( 3 ) ) && ( !is_active_sidebar( 29 ) ) )
|| ( ( st_is_mobile() ) && ( !is_active_sidebar( 3 ) ) && ( !is_active_sidebar( 4 ) ) && ( !is_active_sidebar( 29 ) ) ) ): ?>
	/* アドセンス */
	.adbox,
	.adbox div {
		padding: 0!important;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata213']) && $GLOBALS['stdata213'] === 'yes' ): // アバター画像を丸くする ?>
	.st-author-profile-avatar img, /* プロフィールカード */
	.st-author-box dt img, img.avatar, /* 記事上ライター情報 */
	.st-authorpage-profile-avatar img, /* authorページ */
	.st-author-box dt img,
	img.avatar {
		border-radius:50%;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata88']) && $GLOBALS['stdata88'] === 'yes' ): // 記事内の画像にcaptionがある場合に枠線を付ける ?>
	main .wp-caption img {
		border:solid 1px #ccc;
	}
<?php endif; ?>

<?php if ( trim($GLOBALS['stdata208']) !== '' ): // ウィジェットのタイトルを非表示 ?>
	h4.menu_underh2,
	.st-widgets-title {
		display:none;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata204']) && $GLOBALS['stdata204'] === 'yes' ): //ぱんくずを非表示 ?>
	#breadcrumb {
		display:none;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata205']) && $GLOBALS['stdata205'] === 'yes' ): //PREV・NEXTリンクを非表示 ?>
	.p-navi {
		display:none;
	}
<?php endif; ?>

<?php if ( ( trim( $GLOBALS['stdata493'] ) === 'yes' || ! st_is_mobile() ) && ( trim( $GLOBALS['stdata115'] ) !== '' ) ): //「トップ背景にアミ点を追加」にチェックがある場合 ?>
	<?php if (trim($GLOBALS['stdata116']) !== ''): //「下層ページでもYouTubeを流す」にもチェックがある場合: 全ページでアミ点を表示 ?>
	#st-ami {
	<?php else: //トップページのみアミ点を表示 ?>
		body.front-page #st-ami {
	<?php endif; ?>
		background-image: url(<?php echo get_template_directory_uri(); ?>/images/amiten.png);
	}
<?php endif; ?>

<?php if ( ( isset( $GLOBALS['stdata584'] ) && $GLOBALS['stdata584'] === 'yes' ) && ( trim( $GLOBALS['stdata493'] ) === 'yes' || ! st_is_mobile() ) && ( trim( $GLOBALS['stdata115'] ) !== '' ) ): //「ヘッダー画像エリアに動画を表示する」にチェックがある場合 ?>
	#st-headerbox {
		position: relative;
		overflow: hidden;
	}
	<?php if (trim($GLOBALS['stdata116']) !== ''): //「下層ページでもYouTubeを流す」にもチェックがある場合: 全ページでアミ点を表示 ?>
	.st-youtube-ami {
		<?php else: //トップページのみアミ点を表示 ?>
			body.front-page .st-youtube-ami {
		<?php endif; ?>
		background-image: url(images/amiten.png);
		position: absolute;
		width: 100%;
		height: 100vh;
		top: 0;
		left: 0;
		z-index: 2;
	}
	#st-ami,
	body.front-page #st-ami {
		background-image: none;
	}
<?php endif; ?>

<?php if( wp_is_mobile() && ! st_has_additional_mobile_menu() // タブレット横向きでサイト名を重複表示させない
		 || ! st_header_catchphrase() && ! st_header_sitetitle() ): // サイトのタイトル及びキャッチフレーズが非表示の場合にエリアを表示させない ?>
	@media only screen and (max-width: 959px) {
		#header-l {
			display: none;
		}
	}
<?php endif; ?>

<?php if( wp_is_mobile() && trim($GLOBALS['stdata101']) !== '' ): // タブレット横向き対応：PCサイトのタイトルが非表示 ?>
	#header-l .sitename {
		display: none;
	}
<?php endif; ?>

<?php if( wp_is_mobile() && trim($GLOBALS['stdata102']) !== '' ): // タブレット横向き対応：PCキャッチフレーズが非表示 ?>
	#header-l .descr {
		display: none;
	}
<?php endif; ?>

<?php if( ! st_has_mobile_header_content() ): // スマホヘッダーに出力するコンテンツがあるかどうかを返す ?>
	@media only screen and (max-width: 959px) {
		#headbox-bg {
			display: none;
		}
	}
<?php endif; ?>

<?php if( ! st_is_mobile() && st_has_mobile_header_content_exclude_menu() ): // スマホメニューの表示が無効時にそれ以外のスマホヘッダーに出力するコンテンツがあるかどうかを返す ?>
	@media print, screen and (max-width: 599px) {
		#headbox-bg #headbox {
			padding-top: 48px!important;
		}
	}
	@media only screen and (min-width: 600px) and (max-width: 959px) {
		#headbox-bg #headbox {
			padding-top: 58px!important;
		}
	}
<?php endif; ?>

<?php if ( ( trim( $GLOBALS['stdata436'] ) !== '' ) || ( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] !== 'normal' ) ): // フォント設定 ?>
	<?php if ( trim( $GLOBALS['stdata372'] ) !== '' ): // 適応ID及びクラス
		echo $GLOBALS['stdata372'] . ',';
	endif; ?>
	<?php if ( isset($GLOBALS['stdata368']) && $GLOBALS['stdata368'] === 'yes' ): ?>
		.sitename a, /* サイト名 */
		.sitename,
		#st-mobile-logo a, /*スマホタイトル*/
		.footerlogo a,
		.footerlogo, /*フッターのタイトル*/
	<?php endif; ?>
	<?php if ( isset($GLOBALS['stdata369']) && $GLOBALS['stdata369'] === 'yes' ): ?>
		.st-pvm-ranking-item-title, /* PVmonitor */
		.kanren dd h3 a, /* 記事一覧 */
		.kanren .no-thumbitiran h3 a,
		.kanren .no-thumbitiran h5 a,
		.kanren dd .kanren-t a,  /* 記事一覧サイドバー */
		.post-slide-title a, /* ショートコード記事 */
		.post-card-title a, /* 記事カード化 */
		#st-magazine dd h3, /* JET */
		.kanren.pop-box dd h5:not(.st-css-no2) a, /* おすすめ記事 */
		#side .kanren.pop-box dd h5:not(.st-css-no2) a,
	<?php endif; ?>
	<?php if ( isset($GLOBALS['stdata370']) && $GLOBALS['stdata370'] === 'yes' ): ?>
		#header-r .footermenust.st-menu-side a, /* ヘッダーメニュー（横列） */
		#header-r .footermenust.st-menu-side a span, /* ヘッダーメニュー（横列）title属性 */
		header .smanone ul.menu > li > a, /* PCグローバルメニュー */
		#side aside .st-pagelists > ul > li > a, /* サイドメニューウィジェット */
		.acordion_tree ul.menu > li > a .menu-item-label, /* スマホスライドメニュー */
		.st-middle-menu .menu > li > a, /* スマホミドルメニュー */
		#st-footermenubox ul.menu > li > a, /* スマホフッターメニュー */
		.originalbtn-bold, /* ウィジェットボタン */
		.tagcloud a, /*タグクラウド*/
		.wp-block-tag-cloud a,
		.cat-item-label, /* カテゴリー */
	<?php endif; ?>
	<?php if ( isset($GLOBALS['stdata373']) && $GLOBALS['stdata373'] === 'yes' ): ?>
		header .smanone ul.menu li a, /* PCグローバルメニュー（第二階層以下） */
		#side aside .st-pagelists  ul > li  a, /* サイドメニューウィジェット（第二階層以下） */
		.acordion_tree ul.menu li a, /* スマホスライドメニュー（第二階層以下） */
	<?php endif; ?>
	<?php if ( isset($GLOBALS['stdata371']) && $GLOBALS['stdata371'] === 'yes' ): ?>
		.st-cardbox-t, /* ブログカード */
		.kanren .popular-t a, /* おすすめ記事 */
		.st-cardlink-card a,
	<?php endif; ?>
	<?php if ( isset($GLOBALS['stdata384']) && $GLOBALS['stdata384'] === 'yes' ): ?>
		#st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title, /* すごいもくじ見出し */
		.st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title,
		#st_toc_container:not(.over_toc_content):not(.side_toc_content) ul li a, /* すごいもくじ */
		.st_toc_container:not(.over_toc_content):not(.side_toc_content) ul li a,
	<?php endif; ?>
	<?php if ( isset($GLOBALS['stdata386']) && $GLOBALS['stdata386'] === 'yes' ): //ランキング見出し ?>
		.post .rankh4:not(.st-css-no),
		#side .rankh4:not(.st-css-no),
		.rankh4:not(.st-css-no),
	<?php endif; ?>
	<?php if ( isset($GLOBALS['stdata385']) && $GLOBALS['stdata385'] === 'yes' ): //h4～5 ?>
		.h4modoki,
		.post h4:not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point),
		.post h4:not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point) span,
		.h5modoki,
		.post h5:not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title),
		.post h5:not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) span,
		.post h4.has-st-regular-font-size,
		.post h5.has-st-regular-font-size,
	<?php endif; ?>
	<?php if ( isset($GLOBALS['stdata397']) && $GLOBALS['stdata397'] === 'yes' ): // ボタン ?>
		.rankstlink-l2 p a,
		.rankstlink-l p a,
		.rankstlink-b p a,
		.rankstlink-r p a,
		.rankstlink-r2 p a,
		.rankstlink-a p a,
		.st-mybtn a,
		.st-mybtn a span,
	<?php endif; ?>
	<?php if ( $st_is_st ): // テーマ分岐 ?>
		.rankh4:not(.st-css-no), /* ランキング見出し（ST2のみ） */
		.post .rankh4:not(.st-css-no), /* ランキング見出し（ST2のみ） */
		#side .rankh4:not(.st-css-no), /* ランキング見出し（ST2のみ） */
	<?php endif; ?>
	.st-cardlink-card-text, /* ヘッダーバナー */
	.st-author-profile .st-author-nickname, /* プロフィール名 */
	.st-web-font,
	.st-step-title, /* ステップ */
	.st-point .st-point-text, /* ポイント */
	.n-entry, /* NEW ENTRY */
	h4:not(.st-css-no) .point-in, /* 関連記事 */
	.cat-itiran p.point,
	.form-submit, /*コメント欄見出し*/
	.news-ca, /*お知らせタイトル*/
	.st-widgets-title, /* ウィジェットタイトル */
	.st-widgets-title span, /* ウィジェットタイトル */
	h4.menu_underh2 span,
	.st-header-flextitle,
    .post h2:not(.st-css-no),
    .post h2:not(.st-css-no) span,
    .post h3:not(.st-css-no),
    .post h3:not(.st-css-no) span,
    .post h2.has-st-regular-font-size,
    .post h2.has-st-regular-font-size span,
    .post h3.has-st-regular-font-size,
    .post h3.has-st-regular-font-size span,
	.h2modoki,
	.h3modoki,
    .entry-title:not(.st-css-no),
    .post .entry-title:not(.st-css-no) {
		<?php if ( trim( $GLOBALS['stdata436'] ) !== '' ): // その他 ?>
			<?php echo stripslashes( $GLOBALS["stdata436"] ); ?>
		<?php else: ?>
			<?php if( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] === 'noto' ): // Noto Sansの選択 ?>
				font-family: "Noto Sans JP", sans-serif;
			<?php elseif ( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] === 'notoserif' ): // Noto Serif ?>
				font-family: "Noto Serif JP", serif;
			<?php elseif ( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] === 'roundedmplus1c' ): // Rounded M+ 1c ?>
				font-family: "M PLUS Rounded 1c", sans-serif;
			<?php elseif ( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] === 'yumin' ): // 游明朝 ?>
				font-family: "游明朝体", "Yu Mincho", YuMincho , "Hiragino Mincho ProN" , sans-serif;
			<?php elseif ( trim( $GLOBALS['stdata98'] ) === '' ): // 游ゴシック ?>
				font-family: "Yu Gothic", "游ゴシック", YuGothic, "游ゴシック体", "ヒラギノ角ゴ ProN W3", "Hiragino Kaku Gothic ProN" , "Hiragino Sans" , sans-serif;
			<?php endif; ?>

			<?php if( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] === 'notoserif' ): // Noto Serif ?>
				font-weight: 600!important;
			<?php else: ?>
				font-weight: 700!important;
			<?php endif; ?>

		<?php endif; ?>
    }

	#header-r .footermenust.st-menu-side a span {
		font-weight: normal!important;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata436'] ) !== '' ): // その他 ?>
	.st-header-post-data .entry-title:not(.st-css-no):not(.st-css-no2),
	#contentInner .post .entry-title:not(.st-css-no):not(.st-css-no2) ,
	.post .entry-content h2:not(.st-css-no2),
	.post .entry-content .h2modoki,
	.h3modoki,
	.post h3:not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title),
	 .h4modoki,
	.post h4:not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point),
	.h5modoki,
	dd h3:not(.st-css-no2) a,
	.kanren .clearfix dd h5:not(.st-css-no2) a,
	.st-cardbox .clearfix dd h5,
	.post .st-cardbox .clearfix dd h5,
	#footer .st-cardbox .clearfix dd h5,
	#side .st-cardbox .clearfix dd h5,
	.post h5:not(.st-css-no):not(.st-matome):not(.rankh5):not(.point):not(.st-cardbox-t):not(.popular-t):not(.kanren-t):not(.popular-t):not(.post-card-title){
		font-weight: bold;
	}
<?php endif; ?>

<?php if ( ( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] === 'noto' ) || ( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] === 'notoserif' )  || ( isset($GLOBALS['stdata98']) && $GLOBALS['stdata98'] === 'roundedmplus1c' ) ): // Noto Sans又はRounded M+ 1c ?>
	/* キャッチコピー */
    main .post h2:not(.st-css-no) span.st-h-copy,
    main .post h3:not(.st-css-no) span.st-h-copy,
	main .h2modoki span.st-h-copy,
	main .h3modoki span.st-h-copy,
    main .entry-title:not(.st-css-no) span.st-h-copy,
    main .post .entry-title:not(.st-css-no) span.st-h-copy,
	main .h4modoki span.st-h-copy,
	main .post h4:not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point) span.st-h-copy,
	main .h5modoki span.st-h-copy,
	main .post h5:not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) span.st-h-copy,
	main .post h2:not(.st-css-no) span.st-h-copy-toc,
    main .post h3:not(.st-css-no) span.st-h-copy-toc,
	main .h2modoki span.st-h-copy-toc,
	main .h3modoki span.st-h-copy-toc,
    main .entry-title:not(.st-css-no) span.st-h-copy-toc,
    main .post .entry-title:not(.st-css-no) span.st-h-copy-toc,
	main .h4modoki span.st-h-copy-toc,
	main .post h4:not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point) span.st-h-copy-toc,
	main .h5modoki span.st-h-copy-toc,
	main .post h5:not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) span.st-h-copy-toc {
		font-weight: 500!important;
	}
<?php else: ?>
    main .post h2:not(.st-css-no) span.st-h-copy,
    main .post h3:not(.st-css-no) span.st-h-copy,
	main .h2modoki span.st-h-copy,
	main .h3modoki span.st-h-copy,
    main .entry-title:not(.st-css-no) span.st-h-copy,
    main .post .entry-title:not(.st-css-no) span.st-h-copy,
	main .h4modoki span.st-h-copy,
	main .post h4:not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point) span.st-h-copy,
	main .h5modoki span.st-h-copy,
	main .post h5:not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) span.st-h-copy,
	main .post h2:not(.st-css-no) span.st-h-copy-toc,
    main .post h3:not(.st-css-no) span.st-h-copy-toc,
	main .h2modoki span.st-h-copy-toc,
	main .h3modoki span.st-h-copy-toc,
    main .entry-title:not(.st-css-no) span.st-h-copy-toc,
    main .post .entry-title:not(.st-css-no) span.st-h-copy-toc,
	main .h4modoki span.st-h-copy-toc,
	main .post h4:not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point) span.st-h-copy-toc,
	main .h5modoki span.st-h-copy-toc,
	main .post h5:not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) span.st-h-copy-toc  {
		font-weight: normal!important;
	}
<?php endif; ?>

@media only screen and (max-width: 599px) {
	.st-header-flextitle {
		font-weight: 700;
    }
}

<?php if(( trim( $GLOBALS['stdata49'] ) !== '') && ( trim( $GLOBALS['stdata218'] ) !== '')): // Webフォント ?>
	/* クラス指定によるフォント */
	<?php if ( trim( $GLOBALS['stdata376'] ) !== '' ):
		echo esc_attr($GLOBALS['stdata376']);
	endif; ?>
	{
		<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
	}

	<?php if ( trim( $GLOBALS['stdata253'] ) !== '' ): //基本 ?>
		.n-entry, /* NEW ENTRY */
		h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) .point-in, /* 関連記事 */
		.cat-itiran p.point,
		#reply-title,
		.form-submit, /*コメント欄見出し*/
		.news-ca, /*お知らせタイトル*/
		.sitename a, /* サイト名 */
		.sitename,
		#st-mobile-logo a, /*スマホタイトル*/
		.footerlogo a,
		.footerlogo /*フッターのタイトル*/
		{
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata254'] ) !== '' ): //タイトル見出し ?>
		.st-widgets-title, /* ウィジェットタイトル */
		.st-widgets-title span, /* ウィジェットタイトル */
		h4.menu_underh2 span,
		.st-header-flextitle,
		.h4modoki,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point),
		.h5modoki,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title),
		.rankh4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		.post .rankh4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		#side .rankh4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span,
		.h2modoki,
		.h3modoki,
		.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata260'] ) !== '' ): //SNSボタン ?>
		.snstext {
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata255'] ) !== '' ): //記事一覧 ?>
		.kanren dd h3 a, /* 記事一覧 */
		.kanren dd .kanren-t a,  /* 記事一覧サイドバー */
		.post-slide-title a, /* ショートコード記事 */
		.post-card-title a, /* 記事カード化 */
		#st-magazine dd h3 /* JET */
		 {
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata256'] ) !== '' ): //各メニュー ?>
		header .smanone ul.menu > li > a, /* PCグローバルメニュー */
		#side aside .st-pagelists > ul > li > a, /* サイドメニューウィジェット */
		.st-cardlink-card-text, /* ヘッダーバナー */
		.acordion_tree ul.menu > li > a .menu-item-label, /* スマホスライドメニュー */
		.st-middle-menu .menu > li > a, /* スマホミドルメニュー */
		#st-footermenubox ul.menu > li > a, /* スマホフッターメニュー */
		.originalbtn-bold, /* ウィジェットボタン */
		.tagcloud a, /*タグクラウド*/
		.wp-block-tag-cloud a,
		.cat-item-label /* カテゴリー */
		{
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata257'] ) !== '' ): //各メニュー（第二階層以下） ?>
		header .smanone ul.menu li a, /* PCグローバルメニュー（第二階層以下） */
		#side aside .st-pagelists ul > li  a, /* サイドメニューウィジェット（第二階層以下） */
		.acordion_tree ul.menu li a /* スマホスライドメニュー（第二階層以下） */
		{
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata258'] ) !== '' ): //電話番号とおすすめNoとViews ?>
		.head-telno a,
		.st-wppviews-label .wpp-views,
		.wpp-text,
		.poprank-no2,
		.poprank-no {
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
		/*CARDs JET用*/
		.wpp-views {
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata259'] ) !== '' ): // ブログカード ?>
		.st-cardbox-t, /* ブログカード */
		.kanren .popular-t a, /* おすすめ記事 */
		.st-cardlink-card a
		{
			<?php echo stripslashes( $GLOBALS["stdata218"] ); ?>
		}
	<?php endif; ?>

<?php endif; ?>

<?php if((trim($GLOBALS['stdata221']) !== '') || st_is_mobile()): //スマホ閲覧時又はブログカードの抜粋が非表示の場合 ?>
	.st-cardbox .clearfix dd h5:not(.st-css-no),
	.post .st-cardbox .clearfix dd h5:not(.st-css-no),
	#footer .st-cardbox .clearfix dd h5:not(.st-css-no),
	#side .st-cardbox .clearfix dd h5:not(.st-css-no) {
		border-bottom:none;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata329'] ) !== '' ): //簡易カテゴリーカラー ?>
	/* 17_STINGERカテゴリー */
	.widget_st_categories_widget .cat-item a {
		border-bottom-color: <?php echo $GLOBALS['stdata329']; ?>;
		color: <?php echo $GLOBALS['stdata329']; ?>;
	}
<?php endif; ?>

.s-navi-search-overlay .widget_st_categories_widget .cat-item a { /* 検索オーバーレイ */
	border-color: #ccc;
	color: #333;
}

<?php if ( trim($GLOBALS['stdata585']) !== '' ) : // 非表示にするカテゴリーリンク（カテゴリーID）
	$cat_ids = $GLOBALS['stdata585'];
	$cat_id = explode(',', $cat_ids);
	foreach( $cat_id as $i ): ?>
		li.cat-item.cat-item-<?php echo $i; if( $i !== end($cat_id) ): echo ','; endif; //最後以外に「,」を付ける
	endforeach; ?>
	{
		display: none!important;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata201']) && $GLOBALS['stdata201'] === 'yes' ) : // カテゴリーリンクに簡易デザイン適応 ?>
	footer .widget_categories ul,
	footer .widget_categories ol {
		padding-left: 0;
	}

	#footer li.cat-item {
		list-style-type: none;
		margin: 0px;
		padding: 0px;
	}

	#footer li.cat-item a::after,
	#side li.cat-item a::after {
		content: " \f105";
		font-family: stsvg;
		position: absolute;
		right: 10px;
		font-size: .8em;
	}

	#footer li.cat-item a,
	#side li.cat-item a {
		position: relative;
		vertical-align: middle;
		width:100%;
		padding: 10px 20px 10px 10px;
		box-sizing:border-box;
		border-bottom: 1px solid #e1e1e1;
		color:#1a1a1a;
		text-decoration:none;
		display:flex;
		align-items: center;
	}

	#footer li.cat-item.has-thumbnail a,
	#side li.cat-item.has-thumbnail a {
		/* サムネイルあり */
		display: flex;
	}

	#footer li.cat-item a:hover,
	#side li.cat-item a:hover {
		opacity:0.5;
	}

	<?php if ( isset( $GLOBALS['stdata329'] ) ): //簡易カテゴリーカラー ?>
		#footer li.cat-item a ,
		#side li.cat-item a {
			border-bottom-color: <?php echo $GLOBALS['stdata329']; ?>;
			color: <?php echo $GLOBALS['stdata329']; ?>;
		}
	<?php endif; ?>

<?php endif; ?>

<?php if(trim($GLOBALS['stdata96']) === ''): ?>
	/*TOC+*/
	#toc_container {
    	margin: 0 auto 20px;
    	text-align: center;
	}

	#toc_container .toc_title {
		text-align:center;
		padding: 5px;
		font-weight:bold;
		position:relative;
 		display: inline-block;
		vertical-align: middle;
		border-bottom: 2px solid #333;
		margin-bottom: 5px;
	}

	#toc_container:not(.contracted) .toc_title {
		margin:0 auto 10px;
	}

	#toc_container .toc_title::before {
  		content: "\f0f6\00a0";
  		font-family: stsvg;
	}

	#toc_container .toc_title .toc_toggle {
		font-weight: normal;
		font-size:95%;
	}

	.post #toc_container ul,
	.post #toc_container ol {
		list-style: none;
		margin-bottom: 0;
	}

	.toc_number {
		font-weight:bold;
		margin-right:5px;
		color:#ccc;
	}

	#toc_container ul a {
		display: block;
		text-decoration: none;
		color: #000;
		padding-bottom:5px;
		border-bottom: 1px dotted #ccc;
	}

	#toc_container ul a:hover {
		opacity:0.5;
	}

	#toc_container .toc_list > li> li > a {
		margin-bottom:10px;
	}

	#toc_container .toc_list > li > a {
		border-bottom: none;
	}

	.post #toc_container ul ul {
		padding:  5px 0;
	}

	.post #toc_container ul ul ul {
		padding-left: 10px;
	}

	#toc_container li {
		font-weight:bold;
		margin-bottom: 5px;
		padding: 10px 0px;
		list-style-type:none;
		text-align: left;
		text-indent:-0.8em;
		padding-left:1em;
	}

	#toc_container > ul > li {
		font-size: 18px;
	}

	#toc_container li a::before {
  		font-family: stsvg;
  		content: "\f0da\00a0\00a0";
  		color: #333;
	}

	#toc_container li li a::before {
  		content: none;
	}

	#toc_container li li {
		text-align:left;
		font-weight:normal;
		list-style:decimal outside none;
		text-indent:0;
		padding: 5px 0;
	}

	#toc_container li li li{
		margin-bottom:0;
		padding:3px 0;
		list-style-type:none;
		text-indent:-0.8em;
		padding-left:1em;
	}

	#toc_container li li li a{
		border:none;
		margin-bottom:0;
		padding:0;
	}

	#toc_container li li li a::before {
  		font-family: stsvg;
  		content: "\f0da\00a0\00a0";
  		color: #9E9E9E;
	}

	/* 第一階層のみの場合 */
	#toc_container.only-toc ul {
		padding:20px;
	}

	#toc_container.only-toc li{
		padding:0;
		font-weight:normal;
	}

	#toc_container.only-toc li a::before{
		content: none;
	}

	#toc_container.only-toc li{
		list-style-type: decimal;
		border-bottom:dotted 1px #ccc;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc:not(.st_toc_contracted),
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc:not(.st_toc_contracted) {
		<?php if(($st_toc_bgcolor)||($st_toc_bordercolor)): ?>
			padding: 20px;
		<?php endif; ?>
	}

	/* オリジナル */
	.post #toc_container ol.st-original-toc > li {
		list-style: decimal;
		text-align:left;
		font-weight: normal;
		padding: 0;
		text-indent: 0;
	}
	#toc_container ol.st-original-toc > li a::before {
  		content: none;
	}

<?php endif; ?>

<?php if ( isset( $GLOBALS["stdata80"] ) && $GLOBALS["stdata80"] === 'yes' ) : // スマホメニューを表示しない ?>
	#s-navi dt.trigger .op-menu {
		display: none;
	}
<?php endif; ?>

<?php if ( isset( $GLOBALS["stdata647"] ) && $GLOBALS["stdata647"] === 'yes' ) : // メニューアイコンを縦にする ?>
	.op.op-menu i:before {
		transform: rotate(-90deg)!important;
	}
<?php endif; ?>

<?php if ( ! wp_is_mobile() && isset( $GLOBALS["stdata16"] ) && $GLOBALS["stdata16"] === 'yes' ) : // PCではスマホメニューを表示しない ?>
	.acordion_extra_1,
	.acordion_extra_2,
	#s-navi dt.trigger .op-menu {
		display: none;
	}
	#st-mobile-logo {
	 padding: 0 10px!important;
	}
	<?php if ( st_has_additional_mobile_menu() ): // 追加メニューがある ?>
		#headbox {
			padding-top: 10px!important;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if ( isset( $GLOBALS['stdata479'] ) && $GLOBALS['stdata479'] === 'yes' ): // スマホヘッダーに検索アイコンを表示 ?>
	#s-navi dt.trigger {
		justify-content: space-between;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata620'] ) === '' ): // LP時にヘッダーを表示しない ?>
	.lp header {
		display: none;
	}

	@media print, screen and (min-width: 960px) {
		.colum1.lp #content-w {
			padding-top: 0;
		}
	}
<?php endif; ?>

.front-page .lp header {
	<?php if ( trim( $GLOBALS['stdata619'] ) === '' ): // トップページのLP時にヘッダーを表示しない ?>
		display: none;
	<?php else: ?>
		display: block;
	<?php endif; ?>
}

<?php if ( isset( $GLOBALS['stdata619'] ) && $GLOBALS['stdata619'] === 'yes' ): // トップページのLP時にヘッダーを表示 ?>
	.colum1.lp #content-w main {
		padding-top: 20px;
	}
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata588']) && $GLOBALS['stdata588'] === 'yes' ): // LP時に記事タイトルとカテゴリーも非表示にする ?>
	.lp main h1.entry-title,
	.lp main .st-catgroup {
		display: none;
	}
	.lp .st-eyecatch {
		margin-bottom: 0;
	}

	/* アイキャッチ */
	.lp .st-eyecatch-under
	 {
		margin: -20px -15px 0;
	}

	@media only screen and (min-width: 600px) {
		.lp .st-eyecatch-under
		 {
			margin: -20px -50px 0;
		}
	}

	@media print, screen and (min-width: 960px) {
		.lp .st-eyecatch-under
		 {
			margin: -30px -70px 0;
		}
	}

	/*写真風*/
	.lp .st-photohu.st-eyecatch-under {
		max-width: inherit;
		width: inherit;
		display:block!important;
	}
<?php endif; ?>



<?php if ( isset($GLOBALS['stdata375']) && $GLOBALS['stdata375'] === 'yes' ): // ワイドLPの左右にシャドウ -EX ?>
	/*.colum1.st-lp-wide .entry-title,*/
	.colum1.st-lp-wide.st-lp-wide-shadow .st-sp-top-only-widgets,
	.colum1.st-lp-wide.st-lp-wide-shadow .st-header-under-widgets,
	.colum1.st-lp-wide.st-lp-wide-shadow .top-content,
	.colum1.st-lp-wide.st-lp-wide-shadow .st-middle-menu,
	.single .colum1.st-lp-wide.st-lp-wide-shadow #gazou-wide,
	.single .colum1.st-lp-wide.st-lp-wide-shadow #footer,
	.page .colum1.st-lp-wide.st-lp-wide-shadow #gazou-wide,
	.page .colum1.st-lp-wide.st-lp-wide-shadow #footer,
	.colum1.st-lp-wide.st-lp-wide-shadow #st-header-cardlink,
	.colum1.st-lp-wide.st-lp-wide-shadow .st-widgets-box,
	.colum1.st-lp-wide.st-lp-wide-shadow .st-catgroup,
	.colum1.st-lp-wide.st-lp-wide-shadow .blogbox,
	.colum1.st-lp-wide.st-lp-wide-shadow #headbox,
	.colum1.st-lp-wide.st-lp-wide-shadow #breadcrumb,
	.colum1.st-lp-wide.st-lp-wide-shadow .adbox,
	.colum1.st-lp-wide.st-lp-wide-shadow .rankst-wrap,
	.colum1.st-lp-wide.st-lp-wide-shadow .sns,
	.colum1.st-lp-wide.st-lp-wide-shadow .st-copyurl-btn,
	.colum1.st-lp-wide.st-lp-wide-shadow .kanren.pop-box,
	.colum1.st-lp-wide.st-lp-wide-shadow .tagst,
	.colum1.st-lp-wide.st-lp-wide-shadow .st-shortcode-author,
	.colum1.st-lp-wide.st-lp-wide-shadow .st-author-box,
	.colum1.st-lp-wide.st-lp-wide-shadow aside {
		display: none;
	}

	/* 記事タイトルの調整 */
	.colum1.st-lp-wide.st-lp-wide-shadow #st-page .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	.colum1.st-lp-wide.st-lp-wide-shadow .entry-title{
		position:relative;
		font-size:12px!important;
		padding:5px 10px!important;
		margin:0 auto -50px!important;
		font-weight:normal!important;
		line-height:1.3!important;
		border: none!important;
		z-index:2;
		color: #ccc!important;
		text-align: left!important;
		background-image: none!important;
		background-color: transparent!important;
	}

	.colum1.st-lp-wide.st-lp-wide-shadow #st-page .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2)::before,
	.colum1.st-lp-wide.st-lp-wide-shadow .entry-title::before,
	.colum1.st-lp-wide.st-lp-wide-shadow #st-page .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2)::after,
	.colum1.st-lp-wide.st-lp-wide-shadow .entry-title::after {
		content: none!important;
	}

	.colum1.st-lp-wide.st-lp-wide-shadow .st-lp-wide-eyecatch img{
		position:relative;
		z-index:1;
	}

	.st-lp-wide-shadow .entry-content .st-lp-wide-wrapper:first-child .st-lp-wide-content {
		padding-top:80px;
	}

	.st-lp-wide-shadow .entry-content .st-lp-wide-wrapper .st-lp-wide-content {
		background: #fff;
	}

	.st-lp-wide-shadow .st-lp-wide-wrapper {
		overflow: hidden;
	}

	.colum1.st-lp-wide.st-lp-wide-shadow .st-lp-wide-content:not(.st-no-shadow) {
	  box-shadow: 0 0 20px gray;
	}

	.colum1.st-lp-wide.st-lp-wide-shadow .st-lp-wide-content{
		padding:40px 10px;
		margin:-40px 0;
	}

	.colum1.st-lp-wide-shadow #content-w {
		padding-top: 0;
	}

	.colum1.st-lp-wide.st-lp-wide-shadow .post {
		padding-bottom: 0;
	}

	.colum1.st-lp-wide.st-lp-wide-shadow main {
		margin-bottom: 0;
		padding-bottom:0;
		padding-top: 0;
		background-color: transparent;
	}

	.colum1.st-lp-wide.st-lp-wide-shadow .st-eyecatch,
	.colum1.st-lp-wide.st-lp-wide-shadow .st-eyecatch img {
		margin-bottom: 0;
	}

	/* LPにシャドウ */
	.lp main,
	.lp footer {
		box-shadow: 0 0 20px grey;
	}
<?php endif; ?>

/*
旧st-kanri.phpより移動（ここまで）
-------------------------------------------*/

/*グループ1
------------------------------------------------------------*/

/* body背景色 */
<?php
if ( $st_body_background_color ): //背景色
	$body_color = $st_body_background_color;
else:
	$body_subcolor = '#fafafa';
endif;

if ( $st_body_sub_bgcolor ): //サブ背景色
	$body_subcolor = $st_body_sub_bgcolor;
else:
	$body_subcolor = '#eeeeee';
endif; ?>

<?php if( $st_body_alpha_bgcolor && $st_body_bg_alpha ): //透過背景色 ?>
	#st-ami {
		background-color: <?php echo st_hexToRgba($st_body_alpha_bgcolor ,$st_body_bg_alpha); ?>;
	}
<?php endif; ?>

<?php if ( trim( $st_body_bg_designsetting ) !== '' ): //背景のスタイル ?>
	body {
		<?php if ( $st_body_bg_designsetting === 'mizutama' ): //水玉 ?>
			background-color: <?php echo $body_color; ?>;
			background-image:
				radial-gradient(<?php echo $body_subcolor; ?> 30%, transparent 30%);
				background-size: 20px 20px;
		<?php elseif ( $st_body_bg_designsetting === 'mizutama_t' ): //水玉（斜） ?>
			background-color: <?php echo $body_color; ?>;
			background-image:
				radial-gradient(<?php echo $body_subcolor; ?> 20%, transparent 20%),
				radial-gradient(<?php echo $body_subcolor; ?> 20%, transparent 20%);
			background-size: 30px 30px;
			background-position: 0 0, 15px 15px;
		<?php elseif ( $st_body_bg_designsetting === 'border' ): //ボーダー ?>
			background-color: <?php echo $body_color; ?>;
			background-image:linear-gradient(-90deg, <?php echo $body_subcolor; ?> 50%, transparent 50%);
			background-size: 14px 14px;
		<?php elseif ( $st_body_bg_designsetting === 'border_t' ): //ボーダー（斜） ?>
			background-color: <?php echo $body_color; ?>;
    		background-image:
	 		repeating-linear-gradient(-45deg,<?php echo $body_subcolor; ?>, <?php echo $body_subcolor; ?> 7px,transparent 0, transparent 14px);
		<?php elseif ( $st_body_bg_designsetting === 'border_y' ): //ボーダー（横） ?>
			background-color: <?php echo $body_color; ?>;
    		background-image:
	 		repeating-linear-gradient(0deg,<?php echo $body_subcolor; ?>, <?php echo $body_subcolor; ?> 7px,transparent 0, transparent 14px);
		<?php elseif ( $st_body_bg_designsetting === 'hougan' ): //方眼 ?>
			background-image: linear-gradient( transparent 95%, <?php echo $body_subcolor; ?> 50%, <?php echo $body_subcolor; ?>), linear-gradient( 90deg, transparent 95%, <?php echo $body_subcolor; ?> 50%, <?php echo $body_subcolor; ?> );
			background-size: 16px 16px;
			background-repeat: repeat;
		<?php endif; ?>
	}
<?php endif; ?>

/* 一括カラー反映 */
<?php if ( $st_main_textcolor ): ?>
	/*メインコンテンツのテキスト色*/
	main,
	.post > * {
		color: <?php echo $st_main_textcolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_main_textcolor_sub ): ?>
	/*範囲を広げる*/
	main,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_list li a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_list li a,
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	a.st-cardlink,
	a .st-cardbox h5, a .st-cardbox p,
	.content-post-slider .post-slide-title a,
	.post-card-list .post-card-title a {
		color: <?php echo $st_main_textcolor; ?>;
	}
	.kanren:not(.pop-box):not(.st-cardbox) .clearfix dd > p,
	.kanren .st-cards-content-in h3,
	.kanren a {
		color: <?php echo $st_main_textcolor; ?>!important;
	}
<?php endif; ?>

<?php if ( trim($GLOBALS['stdata611']) !== '' ): // サムネイルスライドショーのタイトルカラー ?>
	#st-header-bottom-category .slick-dots li button:before, /* ドット */
	#st-header-under-widgets-box-wrap .content-post-slider .post-slide-title a,
	#st-header-under-widgets-box-wrap .post-card-list .post-card-title a {
		color: <?php echo $GLOBALS['stdata611']; ?>!important;
	}
<?php endif; ?>

input, textarea {
	color: #000;
}

<?php if ( $st_link_textcolor ): ?>
	/*メインコンテンツのリンク色*/
	a,
	.no-thumbitiran h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) a,
	.no-thumbitiran h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) a {
		color: <?php echo $st_link_textcolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_link_hovertextcolor ): ?>
	a:hover {
		color: <?php echo $st_link_hovertextcolor; ?>!important;
	}
<?php endif; ?>
<?php if ( $st_link_hoveropacity ): ?>
	a:hover {
		opacity:0.7!important;
	}
<?php endif; ?>

<?php if($st_table_bordercolor): ?>
/*テーブルのボーダー*/
	.post table thead,
	.post table,
	.post .wp-block-table table thead,
	.post .wp-block-table table,
	.post .wp-block-table.is-style-st-table-line table,
	.post .wp-block-table.is-style-st-table-line-2 table {
		border-top-color: <?php echo $st_table_bordercolor; ?>;
		border-right-color: <?php echo $st_table_bordercolor; ?>;
	}

	.post table thead th,
	.post table thead td,
	table tr th,
	table tr td,
	.post .wp-block-table table thead th,
	.post .wp-block-table table thead td,
	.wp-block-table table tr th,
	.wp-block-table table tr td {
		border-bottom-color: <?php echo $st_table_bordercolor; ?>;
		border-left-color: <?php echo $st_table_bordercolor; ?>;
		border-top: none;
	}

	/* ラインなし */
	.wp-block-table.is-style-st-table-no-line table,
	.wp-block-table.is-style-st-table-no-line thead,
	.wp-block-table.is-style-st-table-no-line thead th,
	.wp-block-table.is-style-st-table-no-line thead td,
	.wp-block-table.is-style-st-table-no-line table tr th,
	.wp-block-table.is-style-st-table-no-line table tr td,
	.post .wp-block-table.is-style-st-table-no-line table,
	.post .wp-block-table.is-style-st-table-no-line thead,
	.post .wp-block-table.is-style-st-table-no-line thead th,
	.post .wp-block-table.is-style-st-table-no-line thead td,
	.post .wp-block-table.is-style-st-table-no-line table tr th,
	.post .wp-block-table.is-style-st-table-no-line table tr td {
		border: 0;
	}
<?php endif; ?>

<?php if($st_table_cell_bgcolor): ?>
/*偶数行のセル*/
.post table tr:nth-child(even) {
	background-color: <?php echo $st_table_cell_bgcolor; ?>;
}
<?php endif; ?>

<?php if($st_table_td_center): // 「カラムを中央配置」設定時は上下中央にする ?>
	td.has-text-align-center {
		vertical-align: middle !important;
	}
<?php endif; ?>

<?php if($st_table_tr_all): //ヘッダーセクション以外の横一列目にも反映する ?>
	/* 縦一列の設定より優先させる */
	.wp-block-table table thead + tbody tr:first-child td:first-child,
	table thead + tbody tr:first-child td:first-child,
	/*横一行目のセル及びヘッダセル*/
	.wp-block-table table tbody tr:first-child td:first-child,
	.wp-block-table table tbody tr:first-child td,
	.wp-block-table table tbody tr:first-child th,
	table tbody tr:first-child td:first-child,
	table tbody tr:first-child td,
	table tbody tr:first-child th {
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
	.wp-block-table table tbody tr:first-child td:first-child,
	.wp-block-table table tbody tr:first-child td,
	.wp-block-table table tbody tr:first-child th,
	table tbody tr:first-child td:first-child,
	table tbody tr:first-child td,
	table tbody tr:first-child th {
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

	.wp-block-table table thead + tbody tr:first-child td:first-child,
	.wp-block-table table thead + tbody tr:first-child td,
	.wp-block-table table thead + tbody tr:first-child th,
	table thead + tbody tr:first-child td:first-child,
	table thead + tbody tr:first-child td,
	table thead + tbody tr:first-child th {
		background-color:transparent;
		color: inherit;
		font-weight: normal;
	}
<?php endif; ?>

/* ヘッダーセクション */
.wp-block-flexible-table-block-table.wp-block-flexible-table-block-table>table tr th, /* Flexible Table Block */
#wp-calendar:not(.has-background) thead tr th,
table thead tr th,
table thead tr:first-child th {
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

/*縦一行目のセル*/
.wp-block-table table tr:first-child td:first-child,
table tr td:first-child,
.wp-block-table table thead + tbody tr:first-child td:first-child,
table thead + tbody tr:first-child td:first-child,
table thead + tbody tr:first-child td:first-child,
table thead + tbody tr td:first-child {
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

:root .is-style-st-table-line-2 tr td:first-child {
	<?php if($st_table_td_bgcolor): ?>
		background-color: <?php echo $st_table_td_bgcolor; ?>;
	<?php endif; ?>
}

/* 会話レイアウト */
<?php if($st_kaiwa_borderradius): ?>
	/* ふきだしを角丸にしない */
	.st-kaiwa-hukidashi,
	.st-kaiwa-hukidashi2{
		border-radius:0;
	}
<?php endif; ?>

<?php if($st_kaiwa_bgcolor): ?>
	<?php if($st_kaiwa_change_border): ?>
		.st-kaiwa-hukidashi,
		.st-kaiwa-hukidashi2 {
			border: solid 2px <?php echo $st_kaiwa_bgcolor; ?>;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>
		}
		.st-kaiwa-hukidashi::before {
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
			border-color: transparent <?php echo $st_kaiwa_bgcolor; ?> transparent transparent;
		}
		.st-kaiwa-hukidashi::after {
			left: -10px;
			border-width: 10px 10px 10px 0;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
			<?php else: ?>
				border-color: transparent #fff transparent transparent;
			<?php endif; ?>
		}
		.st-kaiwa-hukidashi2::before {
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
			border-color: transparent transparent transparent <?php echo $st_kaiwa_bgcolor; ?>;
		}
		.st-kaiwa-hukidashi2::after {
			right: -10px;
			border-width: 10px 0 10px 10px;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent transparent #fff;
			<?php endif; ?>
		}
	<?php else: ?>
		.st-kaiwa-hukidashi,
		.st-kaiwa-hukidashi2 {
			background-color: <?php echo $st_kaiwa_bgcolor; ?>;
		}
		.st-kaiwa-hukidashi::after {
			border-color: transparent <?php echo $st_kaiwa_bgcolor; ?> transparent transparent;
		}
		.st-kaiwa-hukidashi2::after {
			border-color: transparent transparent transparent <?php echo $st_kaiwa_bgcolor; ?>;
		}
	<?php endif; ?>

<?php endif; ?>

<?php if($st_kaiwa2_bgcolor): ?>
	<?php if($st_kaiwa_change_border): ?>
		.kaiwaicon2 .st-kaiwa-hukidashi,
		.kaiwaicon2 .st-kaiwa-hukidashi2 {
			border: solid 2px <?php echo $st_kaiwa2_bgcolor; ?>;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>
		}
		.kaiwaicon2 .st-kaiwa-hukidashi::before {
			margin-top: -13px;
			left: -13px;
			border-width: 13px 13px 13px 0;
			border-color: transparent <?php echo $st_kaiwa2_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon2 .st-kaiwa-hukidashi::after {
			left: -10px;
			border-width: 10px 10px 10px 0;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
			<?php else: ?>
				border-color: transparent #fff transparent transparent;
			<?php endif; ?>
		}
		.kaiwaicon2 .st-kaiwa-hukidashi2::before {
			margin-top: -13px;
			right: -13px;
			border-width: 13px 0 13px 13px;
			border-color: transparent transparent transparent <?php echo $st_kaiwa2_bgcolor; ?>;
		}
		.kaiwaicon2 .st-kaiwa-hukidashi2::after {
			right: -10px;
			border-width: 10px 0 10px 10px;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent transparent #fff;
			<?php endif; ?>
		}
	<?php else: ?>
		.kaiwaicon2 .st-kaiwa-hukidashi,
		.kaiwaicon2 .st-kaiwa-hukidashi2 {
			background-color: <?php echo $st_kaiwa2_bgcolor; ?>;
		}
		.kaiwaicon2 .st-kaiwa-hukidashi::after {
			border-color: transparent <?php echo $st_kaiwa2_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon2 .st-kaiwa-hukidashi2::after {
			border-color: transparent transparent transparent <?php echo $st_kaiwa2_bgcolor; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if($st_kaiwa3_bgcolor): ?>
	<?php if($st_kaiwa_change_border): ?>
		.kaiwaicon3 .st-kaiwa-hukidashi,
		.kaiwaicon3 .st-kaiwa-hukidashi2 {
			border: solid 2px <?php echo $st_kaiwa3_bgcolor; ?>;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>
		}
		.kaiwaicon3 .st-kaiwa-hukidashi::before {
			margin-top: -13px;
			left: -13px;
			border-width: 13px 13px 13px 0;
			border-color: transparent <?php echo $st_kaiwa3_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon3 .st-kaiwa-hukidashi::after {
			left: -10px;
			border-width: 10px 10px 10px 0;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
			<?php else: ?>
				border-color: transparent #fff transparent transparent;
			<?php endif; ?>
		}
		.kaiwaicon3 .st-kaiwa-hukidashi2::before {
			margin-top: -13px;
			right: -13px;
			border-width: 13px 0 13px 13px;
			border-color: transparent transparent transparent <?php echo $st_kaiwa3_bgcolor; ?>;
		}
		.kaiwaicon3 .st-kaiwa-hukidashi2::after {
			right: -10px;
			border-width: 10px 0 10px 10px;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent transparent #fff;
			<?php endif; ?>
		}
	<?php else: ?>
		.kaiwaicon3 .st-kaiwa-hukidashi,
		.kaiwaicon3 .st-kaiwa-hukidashi2 {
			background-color: <?php echo $st_kaiwa3_bgcolor; ?>;
		}
		.kaiwaicon3 .st-kaiwa-hukidashi::after {
			border-color: transparent <?php echo $st_kaiwa3_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon3 .st-kaiwa-hukidashi2::after {
			border-color: transparent transparent transparent <?php echo $st_kaiwa3_bgcolor; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if($st_kaiwa4_bgcolor): ?>
	<?php if($st_kaiwa_change_border): ?>
		.kaiwaicon4 .st-kaiwa-hukidashi,
		.kaiwaicon4 .st-kaiwa-hukidashi2 {
			border: solid 2px <?php echo $st_kaiwa4_bgcolor; ?>;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>
		}
		.kaiwaicon4 .st-kaiwa-hukidashi::before {
			margin-top: -13px;
			left: -13px;
			border-width: 13px 13px 13px 0;
			border-color: transparent <?php echo $st_kaiwa4_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon4 .st-kaiwa-hukidashi::after {
			left: -10px;
			border-width: 10px 10px 10px 0;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
			<?php else: ?>
				border-color: transparent #fff transparent transparent;
			<?php endif; ?>
		}
		.kaiwaicon4 .st-kaiwa-hukidashi2::before {
			margin-top: -13px;
			right: -13px;
			border-width: 13px 0 13px 13px;
			border-color: transparent transparent transparent <?php echo $st_kaiwa4_bgcolor; ?>;
		}
		.kaiwaicon4 .st-kaiwa-hukidashi2::after {
			right: -10px;
			border-width: 10px 0 10px 10px;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent transparent #fff;
			<?php endif; ?>
		}
	<?php else: ?>
		.kaiwaicon4 .st-kaiwa-hukidashi,
		.kaiwaicon4 .st-kaiwa-hukidashi2 {
			background-color: <?php echo $st_kaiwa4_bgcolor; ?>;
		}
		.kaiwaicon4 .st-kaiwa-hukidashi::after {
			border-color: transparent <?php echo $st_kaiwa4_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon4 .st-kaiwa-hukidashi2::after {
			border-color: transparent transparent transparent <?php echo $st_kaiwa4_bgcolor; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if($st_kaiwa5_bgcolor): ?>
	<?php if($st_kaiwa_change_border): ?>
		.kaiwaicon5 .st-kaiwa-hukidashi,
		.kaiwaicon5 .st-kaiwa-hukidashi2 {
			border: solid 2px <?php echo $st_kaiwa5_bgcolor; ?>;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>
		}
		.kaiwaicon5 .st-kaiwa-hukidashi::before {
			margin-top: -13px;
			left: -13px;
			border-width: 13px 13px 13px 0;
			border-color: transparent <?php echo $st_kaiwa5_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon5 .st-kaiwa-hukidashi::after {
			left: -10px;
			border-width: 10px 10px 10px 0;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
			<?php else: ?>
				border-color: transparent #fff transparent transparent;
			<?php endif; ?>
		}
		.kaiwaicon5 .st-kaiwa-hukidashi2::before {
			margin-top: -13px;
			right: -13px;
			border-width: 13px 0 13px 13px;
			border-color: transparent transparent transparent <?php echo $st_kaiwa5_bgcolor; ?>;
		}
		.kaiwaicon5 .st-kaiwa-hukidashi2::after {
			right: -10px;
			border-width: 10px 0 10px 10px;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent transparent #fff;
			<?php endif; ?>
		}
	<?php else: ?>
		.kaiwaicon5 .st-kaiwa-hukidashi,
		.kaiwaicon5 .st-kaiwa-hukidashi2 {
			background-color: <?php echo $st_kaiwa5_bgcolor; ?>;
		}
		.kaiwaicon5 .st-kaiwa-hukidashi::after {
			border-color: transparent <?php echo $st_kaiwa5_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon5 .st-kaiwa-hukidashi2::after {
			border-color: transparent transparent transparent <?php echo $st_kaiwa5_bgcolor; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if($st_kaiwa6_bgcolor): ?>
	<?php if($st_kaiwa_change_border): ?>
		.kaiwaicon6 .st-kaiwa-hukidashi,
		.kaiwaicon6 .st-kaiwa-hukidashi2 {
			border: solid 2px <?php echo $st_kaiwa6_bgcolor; ?>;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>
		}
		.kaiwaicon6 .st-kaiwa-hukidashi::before {
			margin-top: -13px;
			left: -13px;
			border-width: 13px 13px 13px 0;
			border-color: transparent <?php echo $st_kaiwa6_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon6 .st-kaiwa-hukidashi::after {
			left: -10px;
			border-width: 10px 10px 10px 0;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
			<?php else: ?>
				border-color: transparent #fff transparent transparent;
			<?php endif; ?>
		}
		.kaiwaicon6 .st-kaiwa-hukidashi2::before {
			margin-top: -13px;
			right: -13px;
			border-width: 13px 0 13px 13px;
			border-color: transparent transparent transparent <?php echo $st_kaiwa6_bgcolor; ?>;
		}
		.kaiwaicon6 .st-kaiwa-hukidashi2::after {
			right: -10px;
			border-width: 10px 0 10px 10px;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent transparent #fff;
			<?php endif; ?>
		}
	<?php else: ?>
		.kaiwaicon6 .st-kaiwa-hukidashi,
		.kaiwaicon6 .st-kaiwa-hukidashi2 {
			background-color: <?php echo $st_kaiwa6_bgcolor; ?>;
		}
		.kaiwaicon6 .st-kaiwa-hukidashi::after {
			border-color: transparent <?php echo $st_kaiwa6_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon6 .st-kaiwa-hukidashi2::after {
			border-color: transparent transparent transparent <?php echo $st_kaiwa6_bgcolor; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if($st_kaiwa7_bgcolor): ?>
	<?php if($st_kaiwa_change_border): ?>
		.kaiwaicon7 .st-kaiwa-hukidashi,
		.kaiwaicon7 .st-kaiwa-hukidashi2 {
			border: solid 2px <?php echo $st_kaiwa7_bgcolor; ?>;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>
		}
		.kaiwaicon7 .st-kaiwa-hukidashi::before {
			margin-top: -13px;
			left: -13px;
			border-width: 13px 13px 13px 0;
			border-color: transparent <?php echo $st_kaiwa7_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon7 .st-kaiwa-hukidashi::after {
			left: -10px;
			border-width: 10px 10px 10px 0;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
			<?php else: ?>
				border-color: transparent #fff transparent transparent;
			<?php endif; ?>
		}
		.kaiwaicon7 .st-kaiwa-hukidashi2::before {
			margin-top: -13px;
			right: -13px;
			border-width: 13px 0 13px 13px;
			border-color: transparent transparent transparent <?php echo $st_kaiwa7_bgcolor; ?>;
		}
		.kaiwaicon7 .st-kaiwa-hukidashi2::after {
			right: -10px;
			border-width: 10px 0 10px 10px;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent transparent #fff;
			<?php endif; ?>
		}
	<?php else: ?>
		.kaiwaicon7 .st-kaiwa-hukidashi,
		.kaiwaicon7 .st-kaiwa-hukidashi2 {
			background-color: <?php echo $st_kaiwa7_bgcolor; ?>;
		}
		.kaiwaicon7 .st-kaiwa-hukidashi::after {
			border-color: transparent <?php echo $st_kaiwa7_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon7 .st-kaiwa-hukidashi2::after {
			border-color: transparent transparent transparent <?php echo $st_kaiwa7_bgcolor; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if($st_kaiwa8_bgcolor): ?>
	<?php if($st_kaiwa_change_border): ?>
		.kaiwaicon8 .st-kaiwa-hukidashi,
		.kaiwaicon8 .st-kaiwa-hukidashi2 {
			border: solid 2px <?php echo $st_kaiwa8_bgcolor; ?>;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				background-color: <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>
		}
		.kaiwaicon8 .st-kaiwa-hukidashi::before {
			margin-top: -13px;
			left: -13px;
			border-width: 13px 13px 13px 0;
			border-color: transparent <?php echo $st_kaiwa8_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon8 .st-kaiwa-hukidashi::after {
			left: -10px;
			border-width: 10px 10px 10px 0;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent <?php echo $st_kaiwa_change_border_bgcolor; ?> transparent transparent;
			<?php else: ?>
				border-color: transparent #fff transparent transparent;
			<?php endif; ?>
		}
		.kaiwaicon8 .st-kaiwa-hukidashi2::before {
			margin-top: -13px;
			right: -13px;
			border-width: 13px 0 13px 13px;
			border-color: transparent transparent transparent <?php echo $st_kaiwa8_bgcolor; ?>;
		}
		.kaiwaicon8 .st-kaiwa-hukidashi2::after {
			right: -10px;
			border-width: 10px 0 10px 10px;
			<?php if($st_kaiwa_change_border_bgcolor): ?>
				border-color: transparent transparent transparent <?php echo $st_kaiwa_change_border_bgcolor; ?>;
			<?php else: ?>
				border-color: transparent transparent transparent #fff;
			<?php endif; ?>
		}
	<?php else: ?>
		.kaiwaicon8 .st-kaiwa-hukidashi,
		.kaiwaicon8 .st-kaiwa-hukidashi2 {
			background-color: <?php echo $st_kaiwa8_bgcolor; ?>;
		}
		.kaiwaicon8 .st-kaiwa-hukidashi::after {
			border-color: transparent <?php echo $st_kaiwa8_bgcolor; ?> transparent transparent;
		}
		.kaiwaicon8 .st-kaiwa-hukidashi2::after {
			border-color: transparent transparent transparent <?php echo $st_kaiwa8_bgcolor; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if( $st_kaiwa_no_border ): // アイコンに枠線をつける ?>
	.st-kaiwa-face img,
	.st-kaiwa-face2 img,
	.is-style-st-paragraph-kaiwa::before,
	.is-style-st-paragraph-kaiwa-b::before {
		border: 1px solid #ccc;
	}
	<?php if ( isset($GLOBALS['stdata476']) && $GLOBALS['stdata476'] === 'yes' ): //会話風アイコンを少し大きく（80px） ?>
		.is-style-st-paragraph-kaiwa::after,
		.is-style-st-paragraph-kaiwa-b::after {
			left: 77px!important;
		}
	<?php else: ?>
		.is-style-st-paragraph-kaiwa::after,
		.is-style-st-paragraph-kaiwa-b::after {
			left: 57px!important;
		}
	<?php endif; ?>
<?php else: ?>
	.st-kaiwa-box:not(.st-kaiwa) .st-kaiwa-face img,
	.st-kaiwa-box:not(.st-kaiwa) .st-kaiwa-face2 img {
		border: none;
	}
	<?php if ( isset($GLOBALS['stdata476']) && $GLOBALS['stdata476'] === 'yes' ): //会話風アイコンを少し大きく（80px） ?>
		.is-style-st-paragraph-kaiwa::after,
		.is-style-st-paragraph-kaiwa-b::after {
			left: 75px!important;
		}
	<?php else: ?>
		.is-style-st-paragraph-kaiwa::after,
		.is-style-st-paragraph-kaiwa-b::after {
			left: 55px!important;
		}
	<?php endif; ?>
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

<?php if($st_author_basecolor): ?>
	/*この記事を書いた人*/
	#st-tab-menu li.active {
	  background: <?php echo $st_author_basecolor; ?>;
	}
	#st-tab-box {
		border-color: <?php echo $st_author_basecolor; ?>;
	}
	.post #st-tab-box p.st-author-post {
		border-bottom-color: <?php echo $st_author_basecolor; ?>;
	}
	.st-author-date{
		color:<?php echo $st_author_basecolor; ?>;
	}

	/* 非アクティブのタブ */
	#st-tab-menu li {
		color:<?php echo $st_author_basecolor; ?>;
	}

	/* SNSリンク */
	#st-tab-menu + #st-tab-box .st-author-sns i::before {
	  color: <?php echo $st_author_basecolor; ?>;
	}
<?php endif; ?>

<?php if($st_author_bg_color): ?>
	#st-tab-box {
		background:<?php echo $st_author_bg_color; ?>;
	}

	/* 非アクティブのタブ */
	#st-tab-menu li {
		background:<?php echo $st_author_bg_color; ?>;
	}
<?php endif; ?>

/* プロフィール */
<?php if ( $st_author_profile_radius ): // プロフィールカードを角丸にする ?>
	.st-author-profile {
		border-radius: 10px;
		<?php if ( ! $st_author_profile ): ?>
			overflow: hidden;
		<?php endif; ?>
	}
	#st-tab-box {
		border-radius: 0 10px 10px 10px;
		<?php if ( ! $st_author_profile ): ?>
			overflow: hidden;
		<?php endif; ?>
	}
	#st-tab-menu li {
		border-radius: 5px 5px 0 0;
	}

	.st-author-box.st-author-master .rankstlink-r2 p a,
	.st-author-box.st-author-master .rankstlink-r2 p {
		border-radius: 999px;
		-webkit-border-radius: 999px;
		-moz-border-radius: 999px;
	}
<?php endif; ?>

<?php if ( ! $st_author_profile ): ?>

	.st-author-profile {
		text-align:center;
		width:100%;
		box-sizing:border-box;
		<?php if ( $st_author_basecolor_profile ): ?>
			border:1px solid <?php echo $st_author_basecolor_profile; ?>;
		<?php endif; ?>
		<?php if ( $st_author_bg_color_profile ): ?>
			background: <?php echo $st_author_bg_color_profile ; ?>;
		<?php else: ?>
			background: #fff;
		<?php endif; ?>
		<?php if ( $st_author_profile_shadow ): ?>
			box-shadow: 0 1px 8px rgb(0,0,0, .1), 0 4px 4px -4px rgb(0,0,0, .1);
		<?php endif; ?>
		margin-bottom: 10px;
	}

	.author main .st-author-profile { /* authorページは除外 */
		border: none;
		background-color: transparent;
		box-shadow: none;
		margin-bottom: 0;
	}

	.st-author-profile-header-card { /* プロフィールヘッダー */
		width:100%;
		min-height: 100px;
		box-sizing: border-box;
	}

	.st-author-profile-avatar img { /* アバター */
		width:100px;
		height:100px;
		<?php if ( $st_author_profile_header ): ?>
			margin:-50px auto 5px;
		<?php else: ?>
			margin:50px auto 5px;
		<?php endif; ?>
		<?php if ( $st_author_profile_avatar_shadow ): ?>
			box-shadow: 0 1px 2px rgba(0,0,0,0.2);
		<?php endif; ?>
	}

	.home .st-author-profile-content,
	.st-author-profile-content {
		padding:10px 20px 10px;
		text-align:center;
	}

	.st-author-profile .st-author-nickname { /* 名前 */
		font-size: 110%;
		border: none;
		margin-bottom: 5px;
		<?php if ( $st_author_text_color_profile ): ?>
			color: <?php echo $st_author_text_color_profile ; ?>;
		<?php else: ?>
			color: #333;
		<?php endif; ?>
	}

	@media print, screen and (max-width: 599px) { /* スマホ */
		.st-author-profile-avatar img { /* アバター */
			width:120px;
			height:120px;
			<?php if ( $st_author_profile_header ): ?>
				margin:-60px auto 5px;
			<?php else: ?>
				margin:60px auto 5px;
			<?php endif; ?>
		}
		.st-author-profile .st-author-nickname { /* 名前 */
			font-size: 130%;
		}
	}

	#side .st-author-profile .st-author-description,
	.st-author-profile .st-author-description { /* 説明 */
		margin-bottom: 20px;
		<?php if ( $st_author_text_color_profile ): ?>
			color: <?php echo $st_author_text_color_profile ; ?>;
		<?php endif; ?>
	}

	/* スライドメニュー内 */
	#s-navi dl.acordion .st-author-profile .st-author-nickname {
		font-size: inherit;
	}

	#s-navi dl.acordion .st-author-profile p.st-author-description {
		margin-bottom: 20px;
		font-size: 90%;
		line-height: 1.7;
	}

	/* SNS */
	.st-author-profile .sns {
		padding: 0;
		margin-bottom:10px;
		width: 100%;
		text-align:center;
	}

	.profile-sns {
		text-align: center;
	}

	.st-author-profile .sns li,
	#side aside .st-author-profile .sns li {
		padding:0 3px;
		text-align:center;
		display: inline-block;
		margin-right: 0;
		float: none;
		list-style: none;
		width: 40px;
		position: relative;
	}

	.st-author-profile .sns li a,
	#side aside .st-author-profile .sns li a {
		margin:0;
		border-radius: 50%;
		box-sizing: border-box;
		color: #fff;
		font-size: 19px;
		height: 40px;
		width: 40px;
		padding: 0;
		-webkit-box-pack: center;
		-webkit-justify-content: center;
		-ms-flex-pack: center;
		justify-content: center;
	}

	.st-author-box .st-author-profile .st-fa,
	.st-author-box .st-author-profile .fa {
		margin-right: 0;
		padding: 0;
		border: 0;
		height: auto;
	}

	.st-author-profile .post .sns ul,
	.st-author-profile .sns ul {
		width: 100%;
		margin:0 auto;
	}

	.st-author-profile .snstext{
		display:none;
	}

	.st-author-profile .sns li i {
		font-size: .8em!important;
	}

	/* ツイッター */
	.st-author-profile .sns .twitter a {
		box-shadow: none;
	}

	.st-author-profile .sns .twitter a:hover {
		background:#424242;
		box-shadow: none;
	}

	.st-author-profile .sns .st-svg-twitter::before {
		position: relative;
	}

	/* Facebook */
	.st-author-profile .sns .facebook a {
		box-shadow: none;
	}
	.st-author-profile .sns .facebook a:hover {
		background:#2c4373;
		box-shadow: none;
	}

	.st-author-profile .sns .st-svg-facebook::before {
		position: relative;
		top:1px;
	}

	/* instagram */
	.st-author-profile .sns .instagram a {
		background-image: linear-gradient(-135deg,#4933f7,#ef1837,#fbd980);
	}

	/* homepage */
	.st-author-profile .sns .author-homepage a {
		background:#ccc;
	}

	/* youtube */
	.st-author-profile .sns .author-youtube a {
		background:#ff0000;
	}

	/* amazon */
	.st-author-profile .sns .author-amazon a {
		background:#ffa724;
	}

	.st-author-profile .sns li.author-amazon i {
		font-size: 16px!important;
	}

	/* feed */
	.st-author-profile .sns .author-feed a {
		background:#2bb24c;
	}

	/* form */
	.st-author-profile .sns .author-form a {
		background:#ccc;
	}

	.st-author-profile .sns li.author-form i {
		font-size: 16px!important;
	}

	.st-author-box.st-author-master .rankstlink-r2 p {
		box-shadow: none;
		width: inherit;
	}

	.st-author-profile .rankstlink-r2 p a { /* ボタン */
		font-size: 90%;
		text-decoration: none;
		font-weight: bold;
		box-sizing: border-box;
		<?php
		if ( trim( $st_author_profile_btn_top ) !== '' || trim( $st_author_profile_btn_bottom ) !== '' ):
			if( $st_author_profile_btn_top ):
				$top_color = $st_author_profile_btn_top;
			else:
				$top_color = $st_author_profile_btn_bottom;
			endif;

			if( $st_author_profile_btn_bottom ):
				$bottom_color = $st_author_profile_btn_bottom;
			else:
				$bottom_color = $st_author_profile_btn_top;
			endif;
			?>
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(top,  <?php echo $top_color; ?> 0%,<?php echo $bottom_color; ?> 100%);
			/* IE10+, FF16+, Chrome26+ */
			background: linear-gradient(to bottom,  <?php echo $top_color; ?> 0%,<?php echo $bottom_color; ?> 100%);
		<?php endif; ?>

		<?php if ( $st_author_profile_btn_shadow ): ?>
			box-shadow: 0 3px 0 <?php echo $st_author_profile_btn_shadow; ?>;
		<?php endif; ?>

		<?php if ( $st_author_profile_btn_text_color ): ?>
			color: <?php echo $st_author_profile_btn_text_color; ?>;
		<?php else: ?>
			color: #fff;
		<?php endif; ?>
	}

	.st-author-profile .rankstlink-r2 p {
		margin-bottom: 10px;
	}

<?php endif; ?>

/*こんな方におすすめ*/
<?php if($st_blackboard_bgcolor): //背景色 ?>
	.st-blackboard {
		background: <?php echo $st_blackboard_bgcolor; ?>;
	}
<?php endif; ?>

<?php if($st_blackboard_underbordercolor): //ulリストのチェックアイコン ?>
	.st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
		color:<?php echo $st_blackboard_underbordercolor; ?>;
	}
<?php endif;  ?>

<?php if($st_blackboard_bordercolor): //ulリストの下線とテキスト ?>
	.st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li,
	.post .st-blackboard:not(.square-checkbox) ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li:last-child,
	.st-blackboard ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li,
	.post .st-blackboard ul.st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li:last-child {
		border-color:<?php echo $st_blackboard_bordercolor; ?>;
		color:<?php echo $st_blackboard_bordercolor; ?>;
	}
<?php endif;  ?>

<?php if($st_blackboard_mokuzicolor): //タイトル色 ?>
    .st-blackboard-title {
		color: <?php echo $st_blackboard_mokuzicolor; ?>;
	}
<?php endif;  ?>

<?php if($st_blackboard_title_bgcolor): //タイトル背景色 ?>
	.st-blackboard-title {
		background: <?php echo $st_blackboard_title_bgcolor; ?>;
    	padding: 10px 15px 5px;
	}
<?php endif;  ?>

<?php if($st_blackboard_textcolor): //枠線 ?>
	.st-blackboard,
    .st-blackboard-title {
		border-color: <?php echo $st_blackboard_textcolor; ?>;
	}
<?php endif;  ?>

<?php if($st_blackboard_list3_fontweight): //タイトル下線を非表示 ?>
    .st-blackboard-title {
		border: none;
	}
<?php endif;  ?>

<?php if($st_blackboard_webicon): //Webアイコン（Font Awesome） ?>
	.st-blackboard-title::before {
  		content: "\<?php echo $st_blackboard_webicon; ?>\00a0";
  		font-family: stsvg;
	}
<?php endif;  ?>

/* 目次（TOC+） */

#st_toc_container:not(.over_toc_content):not(.side_toc_content),
.st_toc_container:not(.over_toc_content):not(.side_toc_content),
#toc_container {
	<?php if($st_toc_bgcolor): ?>
		background: <?php echo $st_toc_bgcolor; ?>;
	<?php endif;  ?>
	<?php if($st_toc_bordercolor): ?>
		<?php if($st_toc_border_width):
			$st_toc_border_width_px = $st_toc_border_width;
		else:
			$st_toc_border_width_px = 1;
		endif; ?>
		border: <?php echo $st_toc_border_width_px; ?>px solid <?php echo $st_toc_bordercolor; ?>;
	<?php endif;  ?>
	<?php if($st_toc_radius): ?>
		border-radius: 5px;
	<?php endif;  ?>
}

<?php if($st_toc_mokuzi_left): // 目次タイトルを左寄せにする ?>
	#st_toc_container,
	.st_toc_container {
		text-align: left;
	}
<?php endif;  ?>

#st_toc_container:not(.over_toc_content):not(.side_toc_content):not(.st_toc_contracted):not(.only-toc),
.st_toc_container:not(.over_toc_content):not(.side_toc_content):not(.st_toc_contracted):not(.only-toc),
#toc_container:not(.contracted) { /* 表示状態 */
	<?php if(($st_toc_bgcolor)||($st_toc_bordercolor)): ?>
		padding:20px 30px 30px;
	<?php else: ?>
		padding:15px 20px 20px;
	<?php endif;  ?>
}

#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_contracted,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_contracted,
#toc_container.contracted { /* 非表示状態 */
	<?php if(($st_toc_bgcolor)||($st_toc_bordercolor)): ?>
		padding: 10px 30px;
	<?php endif;  ?>
}

<?php if($st_toc_mokuzicolor): ?>
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title,
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title a,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title a,
	.post #toc_container .toc_title,
	.post #toc_container .toc_title a {
		color: <?php echo $st_toc_mokuzicolor; ?>;
		border-color: <?php echo $st_toc_mokuzicolor; ?>;
	}
<?php endif;  ?>

<?php if($st_toc_mokuzi_border): // 目次タイトル下の下線 ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title {
		border-bottom: 3px solid <?php echo $st_toc_mokuzi_border; ?>;
	}
	/* 閉じたとき */
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_contracted .st_toc_title,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_contracted .st_toc_title {
		margin: 0 auto 10px;
	}
<?php endif;  ?>

<?php if($st_toc_textcolor): // 第1リンク文字色 ?>
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content) .st-original-toc > li,
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content) .st-original-toc > li a,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) ul.st_toc_list + li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) ul.st_toc_list > li > a,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content) .st-original-toc > li,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content) .st-original-toc > li a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) ul.st_toc_list + li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) ul.st_toc_list > li > a,
	#toc_container ul.st_toc_list > li > a {
  		color: <?php echo $st_toc_textcolor; ?>;
	}
<?php endif;  ?>

<?php if($st_toc_text2color): // 第2リンク以降の文字色 ?>
		#st_toc_container:not(.over_toc_content):not(.side_toc_content) ul ul li,
		#st_toc_container:not(.over_toc_content):not(.side_toc_content) ul ul li a,
		#st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc ul ul li a,
		.post #st_toc_container:not(.over_toc_content):not(.side_toc_content) .st-original-toc ul ul li,
		.post #st_toc_container:not(.over_toc_content):not(.side_toc_content) .st-original-toc ul ul li a,
		.st_toc_container:not(.over_toc_content):not(.side_toc_content) ul ul li,
		.st_toc_container:not(.over_toc_content):not(.side_toc_content) ul ul li a,
		.st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc ul ul li a,
		.post .st_toc_container:not(.over_toc_content):not(.side_toc_content) .st-original-toc ul ul li,
		.post .st_toc_container:not(.over_toc_content):not(.side_toc_content) .st-original-toc ul ul li a,
		#toc_container.only-toc ul ul li a,
		#toc_container ul ul li,
		#toc_container ul ul li a {
  		color: <?php echo $st_toc_text2color; ?>;
	}
<?php endif;  ?>

<?php if($st_toc_underbordercolor): /* 下線 */ ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) ul ul a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) ul ul a {
		border-bottom: 1px dashed <?php echo $st_toc_underbordercolor; ?>;
	}
	/* 第一階層のみの場合 */
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li {
		border-bottom:dotted 1px <?php echo $st_toc_underbordercolor; ?>;
	}
<?php else: ?>
	/* 第一階層のみの場合 */
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li {
		margin-bottom: 0;
	}
<?php endif;  ?>

#toc_container.only-toc li,
#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default.only-toc li,
.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default .st-original-toc li a,
#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul a,
#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper.only-toc li,
.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper .st-original-toc li a,
#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper ul a,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default.only-toc li,
.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default .st-original-toc li a,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul a,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper.only-toc li,
.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper .st-original-toc li a,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper ul a,
#toc_container ul a {
	<?php if($st_toc_underbordercolor): /* 下線 */ ?>
		border-bottom-color: <?php echo $st_toc_underbordercolor; ?>;
	<?php else: ?>
		padding-bottom: 0;
	<?php endif;  ?>
}

#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_check .st_toc_list > li > a,
#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_check.only-toc .st_toc_list > li > a,
#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_question .st_toc_list > li > a,
#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_question.only-toc .st_toc_list > li > a,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_check .st_toc_list > li > a,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_check.only-toc .st_toc_list > li > a,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_question .st_toc_list > li > a,
.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_question.only-toc .st_toc_list > li > a {
<?php if($st_toc_underbordercolor): /* 下線 */ ?>
	margin-bottom: 10px;
	padding-bottom: 10px;
	border-bottom: 1px dotted <?php echo $st_toc_underbordercolor; ?>;
<?php else: ?>
	margin-bottom: 10px;
	padding-bottom: 0;
	border: none;
<?php endif;  ?>
}

<?php if($st_toc_list3_fontweight): ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_list > li > ul > li > a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_list > li > ul > li > a,
	#toc_container li li {
		font-weight:bold;
	}
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li,
	#toc_container li li li {
		font-weight:normal;
	}
<?php endif;  ?>

<?php if($st_toc_only_toc_fontweight): ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li,
	#toc_container.only-toc li {
		font-weight:bold;
	}
<?php endif;  ?>

<?php if($st_toc_webicon): ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) .st_toc_title::before,
	#toc_container .toc_title::before {
  		content: "\<?php echo $st_toc_webicon; ?>\00a0";
  		font-family: stsvg;
	}
<?php endif;  ?>

<?php if($st_toc_list1_left): ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper:not(.only-toc) li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper:not(.only-toc) li,
	#toc_container:not(.only-toc) li {
		text-align: center;
	}
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) li li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper:not(.only-toc) li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper:not(.only-toc) li li,
	#toc_container:not(.only-toc) li li {
		text-align: left;
	}
<?php endif;  ?>

<?php if( $st_toc_list1_number ): //第1リンクの数字を表示 ?>

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li{
		list-style:decimal;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li::marker,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li::marker{
		font-size: 1.1em;
		<?php if( $st_toc_textcolor ): ?>
			color: <?php echo $st_toc_textcolor; ?>
		<?php endif; ?>
	}

	<?php if(! $st_toc_list1_left): ?>
		#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) > ul,
		.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) > ul  {
			padding-left: 1.6em!important;
		}
	<?php endif;  ?>

	<?php if( $st_toc_list1_left ): //センター寄せ ?>
		#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) > ul > li,
		.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) > ul > li{
			list-style-position: inside;
		}

		#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) > ul > li::marker,
		.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default:not(.only-toc) > ul > li::marker{
			font-size: 1.5em;
			line-height: 1.5em;
		}
	<?php else: ?>
		#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li,
		.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li{
			list-style:decimal;
			padding-left: .2em;
		}
	<?php endif; ?>

	/* 第一階層のみ */
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default.only-toc > ul > li a:before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default.only-toc > ul > li a:before{
		content: none;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default.only-toc > ul > li::marker,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default.only-toc > ul > li::marker{
		font-size: 1.2em;
	}

<?php endif;  ?>

<?php if($st_toc_list2_icon): //第2リンクの数字を非表示 ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li > ul > li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li > ul > li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li,
	#toc_container li li {
		list-style:none;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li > ul > li > a:before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default > ul > li > ul > li > a:before {
		content: none;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content) ul li li a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) ul li li a {
		padding-left: 0;
	}
<?php endif;  ?>

<?php if( $st_toc_list1_icon ): // 数字をアイコンに変更 ?>

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li a {
		padding: 0;
	}

	/* 第1階層 */
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li {
		padding-left: 0;
		text-indent: 0;
	}

	/* 第2階層 */
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul,
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper ul ul,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper ul ul {
		padding-left: 1.5em;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li a,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li a {
		position: relative;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li a::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li a::before {
		font-family: stsvg;
		content: "\e91e";
		position: absolute;
		left: -1.5em;
		<?php if($st_toc_text2color): // 第2リンク以降の文字色 ?>
			color: <?php echo $st_toc_text2color; ?>;
		<?php endif; ?>
		opacity: .6;
	}

	/* 第3階層 */
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li {
		list-style-type:none;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li a::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li a::before {
		font-family: stsvg;
		content: "\e91d";
		opacity: .8;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li {
		margin-bottom:0;
		padding:3px 0;
		list-style-type:none;
	}

	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul ul,
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper ul ul ul,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul ul,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper ul ul ul {
		padding-left: 1.5em;
	}

	/* 第一階層のみの場合 */
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li a::before {
		color: #cecece;
		opacity: 1;
		font-family: stsvg;
		content: "\e91e";
		position: absolute;
		left: -1.5em;
		opacity: .6;
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li a,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li a {
		position: relative;
		padding-left: 0;
		<?php if ( $st_toc_only_toc_fontweight ): // 第1階層のみの場合のリンクを太字にする ?>
			font-weight: bold;
		<?php endif; ?>
	}

	#st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).only-toc li {
		list-style-type: none;
		padding-left: 0;
		text-indent: 0;
		text-align: left;
		font-weight: normal;
		text-indent: 0;
		padding: 0;
	}
<?php else: ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li {
		text-indent: 0;
		padding-left: 0;
	}

	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul,
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper ul ul,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper ul ul {
		padding: 5px 0 0 1.5em;
	}
<?php endif;  ?>

<?php if( $st_toc_list_icon_base ): // リスト数字 アイコン ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li a::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li a::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li a::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li a::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul > li,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul ul > li, /* リストの数字 */
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul > li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul ul > li{ /* リストの数字 */
		color: <?php echo $st_toc_list_icon_base; ?>;
		opacity: 1;
	}
<?php endif;  ?>

<?php if( $st_toc_list3_icon ): // 第3リンク以降の数字（アイコン）を非表示にして並列 ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li a::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li a::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li a::before,
	#toc_container li li li a::before {
		content: none;
	}
    #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li,
    #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default li li li,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_paper li li li,
    #toc_container li li li {
		text-indent:0;
		padding-left:0;
		list-style-type: none;
	}
	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul ul,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul ul,
	.post #toc_container.st_toc_style_paper ul ul ul {
		padding-left: 0;
	}

	.post #st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul ul ul,
	.post .st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_default ul ul ul ul,
	.post #toc_container.st_toc_style_paper ul ul ul ul {
		margin-left:0;
	}
<?php endif;  ?>

<?php if ( $st_timeline_list_color ): ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline .st_toc_list::after,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline.only-toc .st_toc_list::after,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline-count .st_toc_list::after,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline-count.only-toc .st_toc_list::after,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline .st_toc_list::after,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline.only-toc .st_toc_list::after,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline-count .st_toc_list::after,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline-count.only-toc .st_toc_list::after {
		border-left-color: <?php echo $st_timeline_list_color; ?>;
	}
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline .st_toc_list > li::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline-count .st_toc_list > li::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline .st_toc_list > li::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline-count .st_toc_list > li::before {
		background: <?php echo $st_timeline_list_color; ?>;
	}

	/* タイムライン（カウント） */
	.is-style-st-timeline-count::after {
		border-left: 2px solid <?php echo $st_timeline_list_color; ?>;
	}
	.is-style-st-timeline-count > li::before {
		background: <?php echo $st_timeline_list_color; ?>;
	}

	/* タイムライン（リスト） */
	.is-style-st-timeline-list::after {
		border-left: 1px solid <?php echo $st_timeline_list_color; ?>;
	}
	.is-style-st-timeline-list > li::before {
		background: <?php echo $st_timeline_list_color; ?>;
		color: #333;
	}

	/* リストスタイル タイムラインの下層リスト */
	.is-style-st-timeline-list li::marker,
	.is-style-st-timeline-count li::marker {
		color: <?php echo $st_timeline_list_color; ?>;
	}
<?php endif; ?>

<?php if ( $st_timeline_list_color_count ): ?>
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline-count .st_toc_list > li::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_timeline-count .st_toc_list > li::before {
		color: <?php echo $st_timeline_list_color_count; ?>;
	}

	/* タイムライン（カウント） */
	.is-style-st-timeline-count > li::before {
		color: <?php echo $st_timeline_list_color_count; ?>;
	}

	/* タイムライン（リスト） */
	.is-style-st-timeline-list > li::before {
		color: <?php echo $st_timeline_list_color_count; ?>;
	}
<?php endif; ?>

<?php if ( $st_webicon_check ): ?>
	/* チェック */
	:root [class^="is-style-st-heading-"].has-st-icon-check:not(.has-text-color)::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_check .st_toc_list > li::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_check .st_toc_list > li::before {
		color: <?php echo $st_webicon_check; ?>;
		font-weight: normal;
	}
<?php endif; ?>

<?php if ( $st_webicon_question ): ?>
	/* はてな */
	:root [class^="is-style-st-heading-"].has-st-icon-question-circle:not(.has-text-color)::before,
	#st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_question .st_toc_list > li::before,
	.st_toc_container:not(.over_toc_content):not(.side_toc_content).st_toc_style_question .st_toc_list > li::before {
		color: <?php echo $st_webicon_question; ?>;
		font-weight: normal;
	}
<?php endif; ?>

<?php if ( isset( $GLOBALS['stdata435'] ) && $GLOBALS['stdata435'] === 'yes' ): // スマホ横揺れ防止設定 有効 ?>
	@media print, screen and (max-width: 599px) {
		#wrapper {
			overflow:hidden;
		}
	}
<?php endif; ?>

/*マル数字olタグ*/
<?php if($st_maruno_bordercolor): ?>
	.post .maruno {
		border:2px solid <?php echo $st_maruno_bordercolor; ?>;
		padding: 20px;
		<?php if($st_maruno_radius): ?>
			border-radius: 5px;
		<?php endif;  ?>
	}

	.post .maruno > ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
	.post .maruno > ol:last-child {
		margin-bottom: 0;
	}
<?php endif;  ?>

<?php if($st_maruno_bgcolor): ?>
	.post .maruno {
		background-color:<?php echo $st_maruno_bgcolor; ?>;
		padding: 20px;
		<?php if($st_maruno_radius): ?>
			border-radius: 5px;
		<?php endif;  ?>
	}

	.post .maruno > ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
	.post .maruno > ol:last-child {
		margin-bottom: 0;
	}
<?php endif;  ?>

.is-style-st-no > li::before,
.is-style-st-no-border > li::before,
.st-list-no:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before,
.post .is-style-st-maruno li::before,
.post .maruno li::before {
	<?php if($st_maruno_nobgcolor): ?>
		background: <?php echo $st_maruno_nobgcolor; ?>;
	<?php endif;  ?>
	<?php if($st_maruno_textcolor): ?>
		color:<?php echo $st_maruno_textcolor; ?>;
	<?php endif;  ?>
}

<?php if( $st_maruno_nobgcolor ): ?>
	/* 四角背景 */
	.post .is-style-st-no > li::before,
	.post .is-style-st-no-border > li::before,,
	.st-list-no:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
		background-color: <?php echo $st_maruno_nobgcolor; ?>;
	}
<?php endif;  ?>

/*チェックulタグ*/
<?php if($st_maruck_bordercolor): // ボーダー ?>
	.post .maruck {
		border:2px solid <?php echo $st_maruck_bordercolor; ?>;
		padding: 20px;
		<?php if($st_maruck_radius): ?>
			border-radius: 5px;
		<?php endif;  ?>
	}

	.post .maruck > ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
	.post .maruck > ol:last-child {
		margin-bottom: 0;
	}
<?php endif;  ?>

<?php if($st_maruck_bgcolor): // 背景色 ?>
	.post .maruck {
		background-color:<?php echo $st_maruck_bgcolor; ?>;
		padding: 20px;
		<?php if($st_maruck_radius): ?>
			border-radius: 5px;
		<?php endif;  ?>
	}

	.post .maruck > ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
	.post .maruck > ol:last-child {
		margin-bottom: 0;
	}
<?php endif;  ?>

.post .is-style-st-maruck > li::before,
.post .maruck li::before {
	<?php if($st_maruck_nobgcolor): ?>
		background: <?php echo $st_maruck_nobgcolor; ?>;
	<?php endif;  ?>
	<?php if($st_maruck_textcolor): ?>
		color:<?php echo $st_maruck_textcolor; ?>;
	<?php endif;  ?>
}

<?php if( $st_webicon_checkbox_simple ): // チェックデザインをシンプルにする ?>
	.is-style-st-square-checkbox-no-border > li::before,
	.is-style-st-square-checkbox > li::before,
	.st-square-checkbox ul li::before, /* チェックボックス（番号なしリスト）Classic */
	.st-square-checkbox li::before {
		position: absolute;
		left: .25em;
		content: "\f00c";
		font-family: stsvg;
		<?php if($st_webicon_checkbox): ?>
			color:<?php echo $st_webicon_checkbox; ?>;
		<?php else: ?>
			color:#ff0000;
		<?php endif;  ?>
	}

	.is-style-st-square-checkbox-no-border > li::before,
	.st-square-checkbox ul li::before, /* チェックボックス（番号なしリスト）Classic */
	.st-square-checkbox li::before {
		top: .2em;
	}

	.st-list-underline.is-style-st-square-checkbox-no-border > li::before,
	.is-style-st-square-checkbox > li::before {
		top: .4em;
	}

	.is-style-st-square-checkbox-no-border > li::after,
	.is-style-st-square-checkbox > li::after,
	.st-square-checkbox ul li::after, /* チェックボックス（番号なしリスト）Classic */
	.st-square-checkbox li::after {
		content: none;
	}

	/* こんな方におすすめ */
	.st-blackboard.square-checkbox li::after {
		display: none;
	}
<?php else: ?>
	.st-blackboard.square-checkbox .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before,
	.is-style-st-square-checkbox-no-border > li::before,
	.is-style-st-square-checkbox > li::before,
	.st-square-checkbox ul li::before, /* チェックボックス（番号なしリスト）Classic */
	.st-square-checkbox li::before {
		position: absolute;
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
		transform: scale(.8);
	}

	.st-blackboard.square-checkbox .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before,
	.is-style-st-square-checkbox-no-border > li::before,
	.st-square-checkbox ul li::before, /* チェックボックス（番号なしリスト）Classic */
	.st-square-checkbox li::before {
		top: .3em;
	}

	.is-style-st-square-checkbox > li::before {
		top: .55em;
	}

	.st-blackboard.square-checkbox li::after,
	.is-style-st-square-checkbox-no-border > li::after,
	.is-style-st-square-checkbox > li::after,
	.st-square-checkbox ul li::after, /* チェックボックス（番号なしリスト）Classic */
	.st-square-checkbox li::after {
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
		font-size:150%;
		line-height:1.5;
	}

	.st-blackboard.square-checkbox li::after,
	.is-style-st-square-checkbox-no-border > li::after,
	.st-square-checkbox ul li::after, /* チェックボックス（番号なしリスト）Classic */
	.st-square-checkbox li::after {
		top: 0;
	}

	.is-style-st-square-checkbox > li::after {
		top: .15em;
	}
<?php endif;  ?>

<?php if($st_maruck_nobgcolor): ?>
	/* マル */
	.is-style-st-circle > li::before,
	.is-style-st-circle-border > li::before,
	.st-list-circle:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
		background-color: <?php echo $st_maruck_nobgcolor; ?>;
	}
<?php endif;  ?>

/*Webアイコン*/
<?php if ( $st_webicon_question ): ?>
	.post .hatenamark2.on-color:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
	.post .st-svg-question-circle:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		color: <?php echo $st_webicon_question; ?>;
	}
<?php endif; ?>

<?php if ( $st_webicon_check ): ?>
	.post .checkmark2.on-color:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
	.post .st-svg-check-circle:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		color: <?php echo $st_webicon_check; ?>;
	}
<?php endif; ?>

<?php if ( $st_webicon_checkbox ): ?>
	.is-style-st-square-checkbox-no-border > li::before,
	.is-style-st-square-checkbox > li::before,
	.st-blackboard.square-checkbox .st-blackboard-list:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before,
	.st-square-checkbox li::before {
		color: <?php echo $st_webicon_checkbox; ?>;
	}
	/* 簡易チェックマーク */
	.is-style-st-check > li::before,
	.is-style-st-check-border > li::before,
	.st-list-check:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::before {
		border-color: <?php echo $st_webicon_checkbox; ?>;
	}
<?php endif; ?>

<?php if ( $st_webicon_checkbox_square ): ?>
	.is-style-st-square-checkbox-no-border > li::after,
	.is-style-st-square-checkbox > li::after,
	.st-blackboard.square-checkbox li::after,
	.st-square-checkbox li::after {
		color: <?php echo $st_webicon_checkbox_square; ?>;
	}
	/* 簡易チェックマーク */
	.is-style-st-check > li::after,
	.is-style-st-check-border > li::after,
	.st-list-check:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) li::after {
		border-color: <?php echo $st_webicon_checkbox_square; ?>;
	}
<?php endif; ?>


<?php if( $st_webicon_checkbox_simple ): // チェックデザインをシンプルにする
	if ( $st_webicon_checkbox_size ): // チェックサイズ（%）※微調整用 ?>
		.is-style-st-square-checkbox-no-border > li::before,
		.is-style-st-square-checkbox > li::before,
		.st-square-checkbox li::before,
		.st-square-checkbox li::after {
			font-size: <?php echo $st_webicon_checkbox_size; ?>%;
		}
	<?php endif; ?>

	.post .is-style-st-square-checkbox-no-border > li,
	.is-style-st-square-checkbox-no-border > li,
	.post .is-style-st-square-checkbox > li,
	.is-style-st-square-checkbox > li,
	#side aside .st-square-checkbox li,
	.post .st-square-checkbox li,
	.st-square-checkbox li {
		padding-left: 2em;
	}
<?php endif; ?>

/* マル・バツ */
<?php if ( $st_correct_list ): ?>
	.is-style-st-correct-list > li::before {
		color: <?php echo $st_correct_list; ?>;
	}
<?php endif; ?>

<?php if ( $st_wrong_list ): ?>
	.is-style-st-wrong-list > li::before {
		color: <?php echo $st_wrong_list; ?>;
	}
<?php endif; ?>

/* Webアイコン */
<?php if ( $st_webicon_exclamation ): ?>
	:root [class^="is-style-st-heading-"].has-st-icon-exclamation-circle:not(.has-text-color)::before,
	.post .attentionmark2.on-color:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
	.post .st-svg-exclamation-triangle:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		color: <?php echo $st_webicon_exclamation; ?>;
}
<?php endif; ?>

<?php if ( $st_webicon_memo ): ?>
	.post .memomark2.on-color:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
	.post .st-svg-pencil-square-o:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		color: <?php echo $st_webicon_memo; ?>;
	}
<?php endif; ?>

<?php if ( $st_webicon_user ): ?>
	.post .usermark2.on-color::before,
	.post .st-svg-user:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		color: <?php echo $st_webicon_user; ?>;
	}
<?php endif; ?>

<?php if ( $st_webicon_oukan ): ?>
	:root [class^="is-style-st-heading-"].has-st-icon-oukan:not(.has-text-color)::before,
	.post .oukanmark.on-color::before,
	.post .st-svg-oukan:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		color: <?php echo $st_webicon_oukan; ?>;
	}
<?php endif; ?>

<?php if ( $st_webicon_bigginer ): ?>
	:root [class^="is-style-st-heading-"].has-st-icon-bigginer_l:not(.has-text-color)::before,
	.post .bigginermark.on-color::before,
	.post .st-svg-bigginer_l:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		color: <?php echo $st_webicon_bigginer; ?>;
	}
<?php endif; ?>

/*サイト上部のボーダー色*/
<?php if ( $st_top_bordercolor ): //サイト上部にボーダーを入れる ?>
	<?php if ( $st_header100 ): //width100%の時 ?>
		body:not(.mce-content-body) {
			border-top: <?php echo $st_line_height; ?> solid <?php echo $st_top_bordercolor; ?>;
		}
	<?php elseif ( $st_wrapper_bgcolor ): //サイト背景に色がある時 ?>
		#wrapper-in {
			border-top: <?php echo $st_line_height; ?> solid <?php echo $st_top_bordercolor; ?>;
		}
	<?php else: //サイト部のみの時 ?>
		#headbox {
			border-top: <?php echo $st_line_height; ?> solid <?php echo $st_top_bordercolor; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

/*ヘッダーの背景色*/
<?php if ( $st_header_gradient ):
		$header_gradient_w = 'left';
		$header_gradient = 'left';
	else :
		$header_gradient_w = 'top';
		$header_gradient = 'bottom';
	endif;
?>

<?php // トップページのみ除外する
if ( $st_header_front_exclusion_set ):
	$st_header_front_exclusion = 'body:not(.front-page) ';
else:
	$st_header_front_exclusion = '';
endif; ?>

<?php if ( $st_header100 ): //背景幅100%の場合 ?>
	<?php if ( $st_wrapper_bgcolor ): //wrapperに背景色がある場合 ?>

		<?php echo $st_header_front_exclusion; ?>#headbox-bg.st-header-fixed,
		<?php echo $st_header_front_exclusion; ?>#headbox {
			<?php if ( $st_headbox_bgcolor && $st_headbox_bgcolor_t ): ?>
				/*Other Browser*/
				background: <?php echo $st_headbox_bgcolor; ?>;

				<?php if( $st_header_image ): //背景画像がある場合 ?>
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_header_image; ?>"), -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome26+ */
					background: url("<?php echo $st_header_image; ?>"), linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);
				<?php else: ?>
					/* Android4.1 - 4.3 */
					background: -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome26+ */
					background: linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);
				<?php endif; ?>

			<?php elseif ( ( trim( $st_headbox_bgcolor ) !== '' ) && ( trim( $st_headbox_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>

				<?php if( $st_header_image ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_header_image; ?>");
				<?php endif; ?>
				background-color: <?php echo $st_headbox_bgcolor; ?>;

			<?php else: ?>

				background-color: transparent;

				<?php if( $st_header_image ): //背景画像がある場合 ?>
					background: url("<?php echo $st_header_image; ?>");
				<?php else: ?>
					background: none;
				<?php endif; ?>

			<?php endif; ?>

			<?php if( $st_header_image ): //背景画像がある場合 ?>
				background-position: <?php echo $st_header_image_side; ?> <?php echo $st_header_image_top; ?>;
				<?php if ( $st_header_image_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			<?php endif; ?>

		}

	<?php else: //wrapperに背景色がない場合 ?>

		<?php echo $st_header_front_exclusion; ?>#headbox-bg.st-header-fixed,
		<?php echo $st_header_front_exclusion; ?>#headbox-bg {
			<?php if ( ( trim( $st_headbox_bgcolor ) !== '' ) && ( trim( $st_headbox_bgcolor_t ) !== '' ) ): ?>
				/*Other Browser*/
				background: <?php echo $st_headbox_bgcolor; ?>;

				<?php if( $st_header_image ): //背景画像がある場合 ?>
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_header_image; ?>"), -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome26+ */
					background: url("<?php echo $st_header_image; ?>"), linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);
				<?php else: ?>
					/* Android4.1 - 4.3 */
					background: -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome26+ */
					background: linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);
				<?php endif; ?>

			<?php elseif ( ( trim( $st_headbox_bgcolor ) !== '' ) && ( trim( $st_headbox_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
				<?php if( $st_header_image ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_header_image; ?>");
				<?php endif; ?>
				background-color: <?php echo $st_headbox_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
				<?php if( $st_header_image ): //背景画像がある場合 ?>
					background: url("<?php echo $st_header_image; ?>");
				<?php else: ?>
					background: none;
				<?php endif; ?>
			<?php endif; ?>

			<?php if( $st_header_image ): //背景画像がある場合 ?>
				background-position: <?php echo $st_header_image_side; ?> <?php echo $st_header_image_top; ?>;
				<?php if ( $st_header_image_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			<?php endif; ?>

		}

	<?php endif; ?>

<?php else: //背景幅100%ではない場合 ?>

		<?php echo $st_header_front_exclusion; ?>#headbox {
			<?php if ( ( trim( $st_headbox_bgcolor ) !== '' ) && ( trim( $st_headbox_bgcolor_t ) !== '' ) ): ?>
				/*Other Browser*/
				background: <?php echo $st_headbox_bgcolor; ?>;

				<?php if( $st_header_image ): //背景画像がある場合 ?>
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_header_image; ?>"), -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome26+ */
					background: url("<?php echo $st_header_image; ?>"), linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);
				<?php else: ?>
					/* Android4.1 - 4.3 */
					background: -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome26+ */
					background: linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_headbox_bgcolor_t; ?> 0%,<?php echo $st_headbox_bgcolor; ?> 100%);
				<?php endif; ?>

			<?php elseif ( ( trim( $st_headbox_bgcolor ) !== '' ) && ( trim( $st_headbox_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>

				<?php if( $st_header_image ): //背景画像がある場合 ?>
					background-image: url("<?php echo $st_header_image; ?>");
				<?php endif; ?>

				background-color: <?php echo $st_headbox_bgcolor; ?>;

			<?php else: ?>

				background-color: transparent;

				<?php if( $st_header_image ): //背景画像がある場合 ?>
					background: url("<?php echo $st_header_image; ?>");
				<?php else: ?>
					background: none;
				<?php endif; ?>

			<?php endif; ?>

			<?php if( $st_header_image ): //背景画像がある場合 ?>
				background-position: <?php echo $st_header_image_side; ?> <?php echo $st_header_image_top; ?>;
				<?php if ( $st_header_image_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			<?php endif; ?>

		}

<?php endif; ?>

<?php if ( $st_header_image && $st_header_bg_image_flex ): // 背景画像を幅100%のレスポンシブにする ?>
	<?php if ( $st_header100 ): // ヘッダー背景の横幅を100%にする ?>
		#headbox-bg {
	<?php else: ?>
		#headbox {
	<?php endif; ?>
			background-color:transparent!important;
			background-image: url("<?php echo $st_header_image; ?>");
			background-size: cover;
			background-position: <?php echo $st_header_image_side; ?> <?php echo $st_header_image_top; ?>;
		}
<?php endif; ?>

<?php if ( $st_front_page_bgcolor ): ?>
	/* フロントページの背景色 */
	body.front-page,
	body.custom-background.front-page {
		background: <?php echo $st_front_page_bgcolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_wrapper_bgcolor ): ?>
	/*サイトの背景色*/
	#wrapper-in {
		background: <?php echo $st_wrapper_bgcolor; ?>;
		margin: 0 auto;
		max-width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
						$st_pc_width = $GLOBALS['stdata128'];
					else:
						$st_pc_width = 1060;
					endif;
				echo $st_pc_width;
				?>px;
	}
<?php endif; ?>

/* header */
<?php if ( $st_headerarea_bgcolor ): ?>
	header #header-full {
		background-color: <?php echo $st_headerarea_bgcolor; ?>;
	}
	<?php if ( $st_headerbg_image_dark ): // 背景画像を暗くする ?>
		header #header-full {
			position: relative;
			z-index: 1;
		}

		header #header-full::before {
			background-color: rgba(0,0,0,0.4);
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			content: '';
			z-index: -1;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if ( $st_headerbg_image ): ?>
	header #header-full {
		background-image: url("<?php echo $st_headerbg_image; ?>");
		background-position: <?php echo $st_headerbg_image_side; ?> <?php echo $st_headerbg_image_top; ?>;
        <?php if ( $st_headerbg_image_repeat ): ?>
			background-repeat: no-repeat;
		<?php endif; ?>
        <?php if ( $st_headerbg_image_flex ): ?>
			background-size: cover;
		<?php endif; ?>
	}
	<?php if ( $st_headerbg_image_dark ): // 背景画像を暗くする ?>
		header #header-full {
			position: relative;
			z-index: 1;
		}

		header #header-full::before {
			background-color: rgba(0,0,0,0.4);
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			content: '';
			z-index: -1;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if ( $st_headerbg_sp_image ): ?>
	@media print, screen and (max-width: 959px) {
		header #header-full {
			background-image: url("<?php echo $st_headerbg_sp_image; ?>");
			background-position: <?php echo $st_headerbg_image_side; ?> <?php echo $st_headerbg_image_top; ?>;
			<?php if ( $st_headerbg_image_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
			<?php if ( $st_headerbg_image_flex ): ?>
				background-size: cover;
			<?php endif; ?>
		}
		<?php if ( $st_headerbg_image_dark ): // 背景画像を暗くする ?>
			header {
				position: relative;
				z-index: 1;
			}

			header::before {
				background-color: rgba(0,0,0,0.4);
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				content: '';
				z-index: -1;
			}
		<?php endif; ?>
	}
<?php endif; ?>

/*ヘッダー下からの背景色*/
#content-w {
      <?php if( $st_headerunder_image ): //背景画像がある場合 ?>
		background: url("<?php echo $st_headerunder_image; ?>");
		background-position: <?php echo $st_headerunder_image_side; ?> <?php echo $st_headerunder_image_top; ?>;
		<?php if ( $st_headerunder_image_repeat ): ?>
			background-repeat: no-repeat;
		<?php endif; ?>
	<?php endif;  ?>

	<?php if ( $st_headerunder_bgcolor ): ?>
		background-color: <?php echo $st_headerunder_bgcolor; ?>;
	<?php endif; ?>
}

<?php if ( $st_side_bgcolor ): ?>
	/*サイドバー（中部）の背景色*/
	#mybox {
		background: <?php echo $st_side_bgcolor; ?>;
		padding:10px;
	}
<?php endif; ?>

/*------------------
 mainエリア（トップ）
-------------------*/

<?php if ( ! $st_front_main_opacity_sp ): //スマホにも反映する ?>
	@media only screen and (min-width: 600px) {
<?php endif; ?>
	/* メインコンテンツのボーダー */
	<?php if ( ( trim( $GLOBALS['stdata366'] ) === '' ||  ! st_wrap_class_check() ) && $st_front_menu_main_bordercolor ): ?>
		body.front-page main {
			border: 1px solid <?php echo $st_front_menu_main_bordercolor; ?>;
		}
	<?php endif; ?>

	/* シャドウを適応する */
	<?php if ( ( trim( $GLOBALS['stdata366'] ) === '' ||  ! st_wrap_class_check() ) && $st_front_main_shadow ): ?>
		body.front-page .colum1.lp footer,
		body.front-page main {
			box-shadow: 0 1px 8px rgb(0,0,0, .1), 0 4px 4px -4px rgb(0,0,0, .1);
		}
	<?php endif; ?>
<?php if ( ! $st_front_main_opacity_sp ): ?>
	}
<?php endif; ?>

<?php if ( ! $st_front_main_opacity_sp ): //スマホにも反映する ?>
	@media only screen and (min-width: 600px) {
<?php endif; ?>
	<?php if ( $st_front_menu_maincolor && ( trim( $st_front_main_opacity ) === '' ) ): ?>
		/*メインコンテンツの背景色*/
		body.front-page main {
			background-color: <?php echo $st_front_menu_maincolor; ?>!important;
		}
	<?php endif; ?>

	<?php if ( isset( $st_front_main_opacity ) && ( $st_front_main_opacity === '100' ) ): ?>
		/*メイン背景色の透過*/
		body.front-page main {
			background-color: transparent!important;
		}
	<?php elseif ( isset( $st_front_main_opacity ) && ( $st_front_main_opacity === '80' ) ): ?>
		/*メイン背景色の透過*/
		body.front-page main {
			background-color: rgba(255, 255, 255, 0.2) !important;
		}

	<?php elseif ( isset( $st_front_main_opacity ) && ( $st_front_main_opacity === '50' ) ): ?>
		body.front-page main {
			background-color: rgba(255, 255, 255, 0.5) !important;
		}

	<?php elseif ( isset( $st_front_main_opacity ) && ( $st_front_main_opacity === '20' ) ): ?>
		body.front-page main {
			background-color: rgba(255, 255, 255, 0.8) !important;
		}
	<?php endif; ?>

	<?php if ( $st_front_entry_content_bg_image ): // 背景画像あり ?>
		body.front-page main {
			background-image: url("<?php echo $st_front_entry_content_bg_image; ?>");
			<?php if ( $st_front_entry_content_bg_image_flex ): ?>
				background-size: cover;
			<?php endif; ?>
			background-position: <?php echo $st_front_entry_content_bg_image_side; ?> <?php echo $st_front_entry_content_bg_image_top; ?>;
			<?php if ( $st_front_entry_content_bg_image_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif; ?>

<?php if ( ! $st_front_main_opacity_sp ): ?>
	}
	@media only screen and (max-width: 599px) {
		/* 反映しない場合は白色背景 */
		body.front-page main {
			background-color: #fff !important;
		}
	}
<?php endif; ?>

/*------------------
 mainエリア（記事）
-------------------*/

<?php if ( ! $st_main_opacity_sp ): //スマホにも反映する ?>
	@media only screen and (min-width: 600px) {
<?php endif; ?>
	/* メインコンテンツのボーダー */
	<?php if ( ( trim( $GLOBALS['stdata366'] ) === '' ||  ! st_wrap_class_check() ) && $menu_main_bordercolor ): ?>
		body:not(.front-page) main {
			border: 1px solid <?php echo $menu_main_bordercolor; ?>;
		}
	<?php endif; ?>

	/* シャドウを適応する */
	<?php if ( ( trim( $GLOBALS['stdata366'] ) === '' ||  ! st_wrap_class_check() ) && $st_main_shadow ): ?>
		body:not(.front-page) .colum1.lp footer,
		body:not(.front-page) main {
			box-shadow: 0 1px 8px rgb(0,0,0, .1), 0 4px 4px -4px rgb(0,0,0, .1);
		}
	<?php endif; ?>
<?php if ( ! $st_main_opacity_sp ): ?>
	}
<?php endif; ?>

<?php if ( ! $st_main_opacity_sp ): //スマホにも反映する ?>
	@media only screen and (min-width: 600px) {
<?php endif; ?>
	<?php if ( $menu_maincolor && ( trim( $st_main_opacity ) === '' ) ): ?>
		/*メインコンテンツの背景色*/
		body:not(.front-page) main {
			background-color: <?php echo $menu_maincolor; ?>!important;
		}
	<?php endif; ?>

	<?php if ( isset( $st_main_opacity ) && ( $st_main_opacity === '100' ) ): ?>
		/*メイン背景色の透過*/
		body:not(.front-page) main {
			background-color: transparent!important;
		}
	<?php elseif ( isset( $st_main_opacity ) && ( $st_main_opacity === '80' ) ): ?>
		/*メイン背景色の透過*/
		body:not(.front-page) main {
			background-color: rgba(255, 255, 255, 0.2) !important;
		}
	<?php elseif ( isset( $st_main_opacity ) && ( $st_main_opacity === '50' ) ): ?>
		body:not(.front-page) main {
			background-color: rgba(255, 255, 255, 0.5) !important;
		}
	<?php elseif ( isset( $st_main_opacity ) && ( $st_main_opacity === '20' ) ): ?>
		body:not(.front-page) main {
			background-color: rgba(255, 255, 255, 0.8) !important;
		}
	<?php endif; ?>

	<?php if ( $st_entry_content_bg_image ): // 背景画像あり ?>
		body:not(.front-page) main {
			background-image: url("<?php echo $st_entry_content_bg_image; ?>");
			<?php if ( $st_entry_content_bg_image_flex ): ?>
				background-size: cover;
			<?php endif; ?>
			background-position: <?php echo $st_entry_content_bg_image_side; ?> <?php echo $st_entry_content_bg_image_top; ?>;
			<?php if ( $st_entry_content_bg_image_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif; ?>

<?php if ( ! $st_main_opacity_sp ): ?>
	}
	@media only screen and (max-width: 599px) {
		/* 反映しない場合は白色背景 */
		body:not(.front-page) main {
			background-color: #fff !important;
		}
	}
<?php endif; ?>

<?php if ( $menu_logocolor ): ?>
	header .sitename a, /*ブログタイトル*/
	nav li a /* メニュー */
	{
		color: <?php echo $menu_logocolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_main_top_bg_none ): // トップページの背景色を無くす ?>
	@media print, screen and (min-width: 960px) {
		.front-page main {
			background: none!important;
			border: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
<?php endif; ?>

<?php if ( $st_main_archive_bg_none ): // アーカイブの背景色を無くす ?>
	@media print, screen and (min-width: 960px) {
		.archive main {
			background: none!important;
			border: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
<?php endif; ?>

<?php if ( $st_pagetop_text ): // ページトップボタンをテキストにする ?>
	#page-top.st-pagetop-text {
		position: fixed;
		z-index: 99999;
		bottom: 80px;
		right: -20px!important;
		transition: all .5s;
		text-decoration: none;
		font-weight: bold;
		transform: rotate(-90deg);
		font-size: 90%;
		line-height: 1.5rem;
		color: #999;
		padding: 0 30px 3px 7px;
		border-bottom: solid 1px;
		opacity: .8;
	}

	#page-top.st-pagetop-text {
		background-color:transparent!important;
		text-decoration: none;
		color: #737373;
		font-weight: normal;
	}

	#page-top.st-pagetop-text::after {
		content: "";
		display: block;
		position: absolute;
		bottom: 4px;
		right: 0;
		width: 15px;
		border-bottom: solid 1px;
		transform: rotate(35deg);
	}

	#page-top.st-pagetop-text::before {
		content: none;
	}

	/* 目次ボタン */
	:root .st_toc_back {
		bottom: 49px;
		left: 20px;
	}

	:root .st_toc_back.is-top {
		bottom: 89px;
	}

	<?php if ( $st_pagetop_bgcolor ): ?>
		:root .st_toc_back:not(.is-rounded) {
			border: 1px solid <?php echo $st_pagetop_bgcolor; ?>;
		}
	<?php endif; ?>

<?php endif; ?>

<?php if ( $st_pagetop_bgcolor ): ?>
	/*ページトップ*/
	#page-top:not(.page-top-img):not(.st-pagetop-text) a {
		background: <?php echo $st_pagetop_bgcolor; ?>;
	}
	/*ページトップ（テキスト）*/
	#page-top.st-pagetop-text {
		color: <?php echo $st_pagetop_bgcolor; ?>;
	}
	/*ページトップ（テキスト）の矢印*/
	#page-top.st-pagetop-text,
	#page-top.st-pagetop-text::after {
		border-bottom-color: <?php echo $st_pagetop_bgcolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_pagetop_arrow_color ): ?>
	/*ページトップの矢印*/
	#page-top:not(.page-top-img):not(.st-pagetop-text) .st-svg-angle-up::before {
		color: <?php echo $st_pagetop_arrow_color; ?>;
	}
<?php endif; ?>

<?php if ( $st_pagetop_circle ): ?>
	#page-top:not(.page-top-img):not(st-pagetop-text) a {
		line-height:100%;
		border-radius: 50%;
	}
	#page-top:not(.page-top-img):not(.st-pagetop-text) {
		right: 15px;
	}
<?php endif; ?>

<?php if( $st_pagetop_up || ( st_is_mobile() && is_active_sidebar( 18 ) ) ): // スマホフッター固定広告ウィジェット使用時 ?>
	#page-top:not(.st-pagetop-text)  {
		bottom: 80px;
	}
	#page-top.st-pagetop-text  {
		bottom: 110px;
	}
	@media screen and (orientation: landscape) { /* 横向きの場合のスタイル */
		/* iPhoneX */
		#page-top:not(.st-pagetop-text) {
			bottom: calc(constant(safe-area-inset-bottom) + 80px );
			bottom: calc(env(safe-area-inset-bottom) + 80px );
		}
		#page-top.st-pagetop-text {
			bottom: calc(constant(safe-area-inset-bottom) + 110px );
			bottom: calc(env(safe-area-inset-bottom) + 110px );
		}
	}
	@media screen and (orientation: portrait) { /* 縦向きの場合のスタイル */
		#page-top:not(.st-pagetop-text) {
			bottom: calc(constant(safe-area-inset-bottom) + 80px );
			bottom: calc(env(safe-area-inset-bottom) + 80px );
		}
		#page-top.st-pagetop-text {
			bottom: calc(constant(safe-area-inset-bottom) + 110px );
			bottom: calc(env(safe-area-inset-bottom) + 110px );
		}
	}
	@media screen and (orientation: landscape) { /* 横向きの場合のスタイル */
		/* iPhoneX */
		#footer-ad-box {
			padding-bottom: calc(constant(safe-area-inset-bottom) + 10px );
			padding-bottom: calc(env(safe-area-inset-bottom) + 10px );
			margin-bottom: 0;
		}
	}
	@media screen and (orientation: portrait) { /* 縦向きの場合のスタイル */
		#footer-ad-box {
			padding-bottom: calc(constant(safe-area-inset-bottom) + 10px );
			padding-bottom: calc(env(safe-area-inset-bottom) + 10px );
			margin-bottom: 0;
		}
	}
<?php endif; ?>

<?php if( $st_is_ex && isset( $GLOBALS["stdata593"] ) && $GLOBALS["stdata593"] === 'yes' ): // スマホフッターに固定ウィジェットをフロート化（EX） ?>
	#page-top {
		bottom: 20px;
	}

	#page-top.smanone {
		display: none!important;
	}

	#footer-ad-box {
		display: none;
	}

	#footer-ad-box-content {
		padding: 15px;
		box-sizing: border-box;
		background:rgba(0,0,0,0.5);
	}

	#footer-ad-box p.close {
		margin-bottom: 0;
		margin-left: 30px;
	}

	#footer-ad-box p.close a{
		display: flex;
		justify-content: center;
		align-items: center;
		background:rgba(0,0,0,0.5);
		font-size: 20px;
		color: #fff;
		width: 40px;
		height: 40px;
		line-height: 40px;
		text-decoration: none;
	}

	/* 再オープン用ボタン */
	p.footer-ad-btn {
		margin-bottom: 0;
		margin-left: 30px;
		display: none;
		opacity: .7;
	}

	p.footer-ad-btn a{
		display: flex;
		justify-content: center;
		align-items: center;
		background:rgba(0,0,0,0.5);
		font-size: 20px;
		color: #fff;
		width: 40px;
		height: 40px;
		line-height: 40px;
		text-decoration: none;
		position: fixed;
		bottom: 0;
	}

	.footer-ad-btn .st-svg-angle-down {
		transform: rotate(180deg);
	}

	@media screen and (orientation: landscape) { /* 横向きの場合のスタイル */
		/* iPhoneX */
		#footer-ad-box-content {
			padding-bottom: calc(constant(safe-area-inset-bottom) + 10px );
			padding-bottom: calc(env(safe-area-inset-bottom) + 10px );
			margin-bottom: calc((constant(safe-area-inset-bottom) + 10px) * -1 );
			margin-bottom: calc((env(safe-area-inset-bottom) + 10px) * -1 );
		}
	}
	@media screen and (orientation: portrait) { /* 縦向きの場合のスタイル */
		#footer-ad-box-content {
			padding-bottom: calc(constant(safe-area-inset-bottom) + 10px );
			padding-bottom: calc(env(safe-area-inset-bottom) + 10px );
			margin-bottom: calc((constant(safe-area-inset-bottom) + 10px) * -1 );
			margin-bottom: calc((env(safe-area-inset-bottom) + 10px) * -1 );
		}
	}
<?php endif; ?>

<?php if( $st_pagetop_img_bottom || $st_pagetop_img_right ): ?>
	/* 画像の配置 */
	#page-top.page-top-img {
		<?php if($st_pagetop_img_bottom): ?>
			bottom: <?php echo $st_pagetop_img_bottom; ?>px;
		<?php endif; ?>
		<?php if($st_pagetop_img_right): ?>
			right: <?php echo $st_pagetop_img_right; ?>px;
		<?php endif; ?>
	}
<?php endif; ?>

<?php if ( $menu_logocolor ): ?>
/*キャプション */
	header h1,
	header .descr{
		color: <?php echo $menu_logocolor; ?>;
	}
<?php endif; ?>

<?php if ( st_header_catchphrase() && trim ( $GLOBALS["stdata127"] ) === '' && get_option( 'st_mobile_logo' ) ): // キャッチフレーズあり + 上下反対ではない + スマホロゴあり ?>
	/*キャプション */
	header #s-navi dl.acordion h1,
	header #s-navi dl.acordion .descr,
	header h1:not(.entry-title):not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	header .descr {
		margin-bottom: 5px;
	}
<?php endif; ?>

<?php if (( $menu_sumart_bg_color ) || ( $menu_sumartcolor )): ?>
	/* スライドメニューアイコン */
	#s-navi dt.trigger .op {
		<?php if ( $menu_sumart_bg_color ): ?>
			background: <?php echo $menu_sumart_bg_color; ?>;
		<?php endif; ?>
		<?php if ( $menu_sumartcolor ): ?>
			color: <?php echo $menu_sumartcolor; ?>;
		<?php endif; ?>
	}
<?php endif; ?>

<?php if ( ! $menu_sumart_bg_color ): // スライドメニューボタン背景色が無い場合 ?>
	/* 検索アイコン（閉じる） + オーバーレイ */
	.s-navi-search-overlay.s-navi-search-activated #s-navi dt.trigger .op.op-search.active {
		color: #424242;
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata247'] ) !== '' ): ?>
	/* 検索アイコン（クール選択時） */
	.op-search .st-svg-search_s:before {
		content: "\e921";
	}
	/* 閉じるアイコン */
	.s-navi-active .st-svg-menu_cut::before,
	.s-navi-search-active #s-navi dt.trigger .acordion_button_search .op-search-close_cut::before {
		content: "\e90c";
	}
<?php endif; ?>

<?php if($st_mobile_sitename): ?>
	/* スマホタイトル テキスト */
	header #st-mobile-logo h1,
	header #st-mobile-logo .descr,
	#st-mobile-logo a {
		color: <?php echo $st_mobile_sitename; ?>;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata616']) !== '' ): ?>
	@media print, screen and (max-width: 599px) {
		#st-mobile-logo a {
			line-height: 1.3;
			font-size: 20px;
		}
		<?php if( $st_mobile_logo_center ): // スマホロゴ（又はタイトル）を左寄せ ?>
			#st-mobile-logo {
				flex-direction: row;
			}
		<?php endif; ?>
	}
<?php endif; ?>

<?php if( ! $st_mobile_logo_center ): // スマホロゴ（又はタイトル）を左寄せ ?>
	header #st-mobile-logo {
		justify-content: center;
		text-align: center;
		<?php if ( trim( $GLOBALS['stdata80'] ) !== '' && trim( $GLOBALS['stdata479'] ) === '' ): // スマホメニューを表示しない + スマホヘッダーに検索アイコンを非表示 ?>
			padding-right: 0;
			padding-left: 0;
		<?php elseif ( ! st_has_additional_mobile_menu() // 追加メニューなし
					  && trim( $GLOBALS['stdata80'] ) === '' && trim( $GLOBALS['stdata479'] ) === '' ): // スマホメニューを表示 + スマホヘッダーに検索アイコンを表示が無効 ?>
			padding-right: 52px;
			padding-left: 0;
		<?php elseif ( ! st_has_additional_mobile_menu() // 追加メニューなし
					  && trim( $GLOBALS['stdata80'] ) !== '' && trim( $GLOBALS['stdata479'] ) !== '' ): // スマホメニューを表示しない + スマホヘッダーに検索アイコンを表示 ?>
			padding-right: 0;
			padding-left: 52px;
		<?php endif; ?>
	}
	/*右メニュー*/
	.s-navi-right header #st-mobile-logo {
		text-align: center;
		<?php if ( trim( $GLOBALS['stdata80'] ) !== '' && trim( $GLOBALS['stdata479'] ) === '' ):     // スマホメニューを表示しない且つスマホヘッダーに検索アイコンを表示が無効 ?>
			padding-right: 0;
			padding-left: 0;
		<?php elseif ( ! st_has_additional_mobile_menu() // 追加メニューなし
					  && trim( $GLOBALS['stdata80'] ) === '' && trim( $GLOBALS['stdata479'] ) === '' ): // スマホメニューを表示 + スマホヘッダーに検索アイコンを表示が無効 ?>
			padding-right: 0;
			padding-left: 52px;
		<?php elseif ( ! st_has_additional_mobile_menu() // 追加メニューなし
					  && trim( $GLOBALS['stdata80'] ) !== '' && trim( $GLOBALS['stdata479'] ) !== '' ): // スマホメニューを表示しない + スマホヘッダーに検索アイコンを表示 ?>
			padding-right: 52px;
			padding-left: 0;
		<?php endif; ?>
	}

	@media only screen and (max-width: 959px) {
		/* アイコンロゴ */
		#st-icon-logo,
		#s-navi.pcnone #st-icon-logo {
			margin-bottom: 5px;
			padding-right: 0;
		}
	}
<?php else: // 左寄せ ?>
	<?php if ( wp_is_mobile() && get_option( 'st_icon_logo' ) && ! get_option( 'st_mobile_logo' ) ): // アイコンロゴ画像がある + スマホロゴなし ?>
		#st-icon-logo,
		#s-navi.pcnone #st-icon-logo {
			padding-right: 5px;
			width: inherit;
		}

		#st-mobile-logo {
			flex-direction: row;
			padding-left: 0;
		}
	<?php endif; ?>
<?php endif; ?>

<?php if( st_has_additional_mobile_menu() ): // 追加メニューあり ?>
	@media only screen and (max-width: 959px) {
		#st-icon-logo {
			padding-right: 0;
		}

		<?php if ( 
			( wp_is_mobile() && ( ! st_header_sitetitle() || ! st_header_catchphrase() ) ) // SPサイトのタイトル又はキャッチフレーズが非表示
			//|| ( ! wp_is_mobile() && ( trim($GLOBALS['stdata101']) !== '' || trim($GLOBALS['stdata102']) !== '' ) ) // PCサイトのタイトル又はキャッチフレーズが非表示
		): ?>
			#header-l .sitename,
			#header-l .descr {
				padding-bottom: 10px;
			}
		<?php elseif ( trim($GLOBALS['stdata127']) !== '' ): // 上下反対又はサイトのタイトル ?>
			#header-l .descr {
				padding-bottom: 10px;
			}
		<?php endif; ?>
	}
<?php endif; ?>

<?php if ( wp_is_mobile() && ( $st_menu_smartbar_bg_image || $st_menu_smartbar_bg_color ) ): //　スマホ閲覧時 + 追加メニューまたはスマホロゴ + スライドバーに背景色又は背景画像がある場合 ?>

	<?php // トップページのみ除外する
	if ( $st_menu_smartbar_front_exclusion_set ):
		$st_menu_smartbar_front_exclusion = 'body:not(.front-page) ';
	else:
		$st_menu_smartbar_front_exclusion = '';
	endif; ?>

	<?php if ( ! is_front_page() || ( is_front_page() && trim( $GLOBALS['stdata429']) === '' ) ): // トップ以外又はトップで「トップページのみサイト名（ロゴ）及びキャッチフレーズを非表示」無効 ?>
		@media print, screen and (max-width: 959px) {
			/*スライドメニューバー*/
			<?php echo $st_menu_smartbar_front_exclusion; ?>#s-navi dt {
				<?php if ( $st_menu_smartbar_bg_color && $st_menu_smartbar_bg_color_t ): ?>

					/*Other Browser*/
					background: <?php echo $st_menu_smartbar_bg_color; ?>;

					<?php if( $st_menu_smartbar_bg_image ): //背景画像がある場合 ?>
						/* Android4.1 - 4.3 */
						background: url("<?php echo $st_menu_smartbar_bg_image; ?>"), -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_menu_smartbar_bg_color_t; ?> 0%,<?php echo $st_menu_smartbar_bg_color; ?> 100%);
						/* IE10+, FF16+, Chrome26+ */
						background: url("<?php echo $st_menu_smartbar_bg_image; ?>"), linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_menu_smartbar_bg_color_t; ?> 0%,<?php echo $st_menu_smartbar_bg_color; ?> 100%);

					<?php else: ?>

						/* Android4.1 - 4.3 */
						background: -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_menu_smartbar_bg_color_t; ?> 0%,<?php echo $st_menu_smartbar_bg_color; ?> 100%);
						/* IE10+, FF16+, Chrome26+ */
						background: linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_menu_smartbar_bg_color_t; ?> 0%,<?php echo $st_menu_smartbar_bg_color; ?> 100%);

					<?php endif; ?>

				<?php elseif ( $st_menu_smartbar_bg_color && ! $st_menu_smartbar_bg_color_t ): //下部には色がある場合 ?>

					background-color: <?php echo $st_menu_smartbar_bg_color; ?>;
					<?php if( $st_menu_smartbar_bg_image ): //背景画像がある場合 ?>
						background-image: url("<?php echo $st_menu_smartbar_bg_image; ?>");
					<?php endif; ?>

				<?php else: ?>

					background-color: transparent;

					<?php if( $st_menu_smartbar_bg_image ): //背景画像がある場合 ?>
						background-image: url("<?php echo $st_menu_smartbar_bg_image; ?>");
					<?php endif; ?>

				<?php endif; ?>

				<?php if( $st_menu_smartbar_bg_image ): //背景画像がある場合 ?>

					background-position: <?php echo $st_menu_smartbar_bg_image_side; ?> <?php echo $st_menu_smartbar_bg_image_top; ?>;

					<?php if ( $st_menu_smartbar_bg_image_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>

					<?php if ( $st_menu_smartbar_bg_image_cover ): //背景画像を幅100%のレスポンシブにする ?>
						background-size: cover;
					<?php endif; ?>

				<?php endif; ?>

			}
		}
	<?php else: // トップで「トップページのみサイト名（ロゴ）及びキャッチフレーズを非表示」有効 ?>

	<?php endif; ?>

	@media print, screen and (max-width: 599px) {
		/* スクロールに応じてシャドウを追加 */
		<?php echo $st_menu_smartbar_front_exclusion; ?>#s-navi #st-mobile-link-design-sticky.ac-shadow,
		<?php echo $st_menu_smartbar_front_exclusion; ?>#s-navi dl.acordion.ac-shadow {
			box-shadow: 0 3px 6px rgba(0,0,0,0.3);
		}
	}

<?php endif; ?>

<?php if( trim( $GLOBALS['stdata617']) !== '' ): // PCヘッダーの高さ（px）
	$pc_header_height = (int) $GLOBALS['stdata617'] - 30;
	if ( $pc_header_height > 0 ): ?>
		@media print, screen and (min-width: 960px) {
			#headbox {
				min-height: <?php echo $pc_header_height;?>px;
			}
		}
	<?php endif; 
endif;
?>

<?php if( trim( $GLOBALS['stdata609']) !== '' ): // スマホヘッダーの高さ（px）
if ( st_has_additional_mobile_menu() ):
$sp_header_height = '48px';
	else:
$sp_header_height = $GLOBALS['stdata609'];
	endif;
?>

	#s-navi dt.trigger {
		height: <?php echo $sp_header_height; ?>px;
	}

	@media only screen and (max-width: 959px) and (min-width: 600px) {
		#s-navi dt.trigger {
			height: calc( <?php echo $sp_header_height; ?>px + 10px );
		}
	}

	<?php if ( $st_sticky_menu && $st_sticky_menu !== 'fixed-info' ): //スマホスライドメニューが「通常」以外 ?>
		#headbox {
			margin: 0 auto;
		}
	<?php endif;  ?>

	<?php if( ! st_is_mobile() && st_has_mobile_header_content_exclude_menu() ): // スマホメニューの表示が無効時にそれ以外のスマホヘッダーに出力するコンテンツがあるかどうかを返す ?>
		@media print, screen and (max-width: 599px) {
			#headbox-bg #headbox {
				padding-top: calc( <?php echo $sp_header_height; ?>px - 20px )!important;
			}
		}
		@media only screen and (min-width: 600px) and (max-width: 959px) {
			#headbox-bg #headbox {
				padding-top: calc( <?php echo $sp_header_height; ?>px - 10px )!important;
			}
		}
	<?php endif; ?>
<?php endif; ?>

<?php if( $st_pc_logo_height ): // PCロゴ画像の最大の高さ（px） ?>
	<?php if( ! wp_is_mobile() ): ?>
		#header-l .sitename img {
			max-height: <?php echo $st_pc_logo_height; ?>px;
			width: auto;
		}
	<?php endif; ?>
	.footerlogo img {
		max-height: <?php echo $st_pc_logo_height; ?>px;
		width: auto;
	}
<?php endif; ?>

<?php if( wp_is_mobile() && $st_mobile_logo_height ): // スマホロゴ画像の最大の高さ（px） ?>
	#st-mobile-logo img,
	header .sitename img {
			max-height: <?php echo $st_mobile_logo_height; ?>px;
			width: auto;
	}
<?php endif; ?>

<?php if( ! wp_is_mobile() && $st_icon_logo_width ): // スマホアイコンロゴの最大の高さ（px） ?>
	#st-icon-logo img {
		max-height: <?php echo $st_icon_logo_width; ?>px;
		width: auto;
	}
<?php elseif( wp_is_mobile() && $st_icon_logo_width ): ?>
	#st-footer-logo #st-icon-logo img {
		max-height: <?php echo $st_icon_logo_width; ?>px;
		width: auto;
	}
<?php endif; ?>

<?php if( $st_icon_logo_width_sp ): // スマホアイコンロゴの最大の高さ（px） ?>
	#s-navi.pcnone #st-icon-logo img {
		max-height: <?php echo $st_icon_logo_width_sp; ?>px;
		width: auto;
	}
<?php endif; ?>

<?php if( $st_icon_logo_radius ): // スマホアイコンロゴを丸くする ?>
	#st-icon-logo img {
		border-radius: 50%;
	}
<?php endif; ?>


/*アコーディオンメニュー内背景色*/
#s-navi dd.acordion_tree,
#s-navi dd.acordion_search {
	/* 背景画像 */
	<?php if( $st_slidemenubg_image ): //背景画像がある場合 ?>
		background-image: url("<?php echo $st_slidemenubg_image; ?>");
		background-position: <?php echo $st_slidemenubg_image_side; ?> <?php echo $st_slidemenubg_image_top; ?>;

    	<?php if ( $st_slidemenubg_image_repeat ): ?>
			background-repeat: no-repeat;
		<?php endif; ?>

      	<?php if ( $st_slidemenubg_image_flex ): ?>
			background-size: cover;
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( $menu_sumartbar_bg_color ): ?>
		background-color: <?php echo $menu_sumartbar_bg_color; ?>;
	<?php elseif ( $menu_sumart_bg_color ): ?>
		background-color: <?php echo $menu_sumart_bg_color; ?>;
	<?php endif; ?>
}

<?php if ( $st_search_slide_sumartbar_bg_color ): ?>
	/* スライド検索フォーム */
	.s-navi-search-slide #s-navi dd.acordion_search {
		background-color: <?php echo $st_search_slide_sumartbar_bg_color; ?>;
	}
<?php endif; ?>

/* オーバーレイ検索フォーム */
html.s-navi-search-overlay #s-navi dd.acordion_search {
	background-image: none;
	background-color: rgba(255,255,255,.98);
}

/*追加ボタン1*/
#s-navi dt.trigger .op-st {
	<?php if ( $menu_sumart_st_bg_color ): ?>
		background: <?php echo $menu_sumart_st_bg_color; ?>;
	<?php elseif ( $menu_sumart_bg_color ): ?>
		background: <?php echo $menu_sumart_bg_color; ?>;
	<?php endif; ?>
	<?php if ( $menu_sumart_st_color ): ?>
		color: <?php echo $menu_sumart_st_color; ?>;
	<?php elseif ( $menu_sumartcolor ): ?>
		color: <?php echo $menu_sumartcolor; ?>;
	<?php endif; ?>
}

/*追加ボタン2*/
#s-navi dt.trigger .op-st2 {
	<?php if ( $menu_sumart_st2_bg_color ): ?>
		background: <?php echo $menu_sumart_st2_bg_color; ?>;
	<?php elseif ( $menu_sumart_bg_color ): ?>
		background: <?php echo $menu_sumart_bg_color; ?>;
	<?php endif; ?>
	<?php if ( $menu_sumart_st2_color ): ?>
		color: <?php echo $menu_sumart_st2_color; ?>;
	<?php elseif ( $menu_sumartcolor ): ?>
		color: <?php echo $menu_sumartcolor; ?>;
	<?php endif; ?>
}

<?php if ( $st_menu_faicon ): ?>
	.acordion_tree ul.menu li .st-svg-angle-down,
	.acordion_tree ul.menu li .st-svg-angle-right {
		display: none;
	}
<?php endif; ?>

<?php if ( $st_sticky_menu && $st_sticky_menu !== 'fixed-info' ): //スマホスライドメニューが「通常」以外 ?>
	#s-navi dl.acordion.ac-fixed,
	#s-navi #st-mobile-link-design-sticky {
		display: none;
		position: fixed;
		z-index: 99998;
		top: 0;
		left: 0;
		transition: .3s;
	}

	#s-navi #st-mobile-link-design-sticky {
		width: 100%;
	}

	#s-navi dl.acordion.is-active {
		display: block;
	}

	#s-navi #st-mobile-link-design-sticky.is-active {
		display: flex;
	}

	<?php if( $st_sticky_menu_alpha_bgcolor && $st_sticky_menu_bg_alpha ): //透過背景色 ?>
		#s-navi dl.acordion.ac-fixed,
		#s-navi #st-mobile-link-design-sticky.ac-fixed {
			background-color: <?php echo st_hexToRgba($st_sticky_menu_alpha_bgcolor ,$st_sticky_menu_bg_alpha); ?>;
		}
	<?php endif; ?>
<?php elseif ( $st_sticky_menu === 'fixed-info' ): //スマホ 固定（インフォメーション） ?>
	#headbox-bg-fixed {
		position: relative;
	}

	#st-header-top-widgets-box.ac-fixed {
		position: fixed;
		z-index: 99999;
		top: 0;
		left: 0;
		transition: .3s;
	}

	#st-header-top-widgets-box.ac-fixed,
	#st-header-top-widgets-box.ac-fixed .st-content-width {
		width: 100%;
	}

	#st-header-top-widgets-box.ac-fixed {
		display: block;
	}

	#st-header-top-widgets-box.ac-fixed {
		display: flex;
	}

	<?php if( $st_sticky_menu_alpha_bgcolor && $st_sticky_menu_bg_alpha ): //透過背景色 ?>
		#st-header-top-widgets-box.ac-fixed {
			background-color: <?php echo st_hexToRgba($st_sticky_menu_alpha_bgcolor ,$st_sticky_menu_bg_alpha); ?>;
		}
	<?php endif; ?>
<?php endif; ?>

/*スマホフッターメニュー*/
#st-footermenubox a {
<?php if ( $st_menu_sumart_footermenu_text_color ): ?>
	color: <?php echo $st_menu_sumart_footermenu_text_color; ?>;
<?php else: ?>
	color: #000;
<?php endif; ?>
}

<?php if ( $st_menu_sumart_footermenu_bg_color ): ?>
	#st-footermenubox {
  		background: <?php echo $st_menu_sumart_footermenu_bg_color; ?>;
	}
<?php endif; ?>

<?php if ( $st_menu_sumart_footermenu_fontawesome ): // アイコンサイズ ?>
	#st-footermenubox ul.menu li .st-fa,
	#st-footermenubox ul.menu li .fa {
  		font-size: <?php echo $st_menu_sumart_footermenu_fontawesome; ?>%;
	}
<?php endif; ?>

<?php if ( $menu_sumartmenutextcolor ): ?>
	/* スマホメニュー文字 */
	.widget_st_categories_widget ul.st-ac-cat .cat-item a, /* STINGERカテゴリー */
	#s-navi dl.acordion .acordion_tree .st-ac-box .st-widgets-title,
	.acordion_tree ul.menu li a,
	.acordion_tree ul.menu li,
	html:not(.s-navi-search-overlay) #s-navi dd.acordion_search .acordion_search_content {
		color: <?php echo $menu_sumartmenutextcolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_menu_sumartmenubordercolor ): ?>
	.widget_st_categories_widget ul.st-ac-cat .cat-item a, /* STINGERカテゴリー */
	:root .acordion_tree .st-ac-box .widget_st_categories_widget .cat-item a,
	.acordion_tree ul.menu li a {
		border-bottom: 1px solid <?php echo $st_menu_sumartmenubordercolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_is_ex_af ): // テーマ分岐 ?>
	/* ガイドマップメニュー */
	<?php if ( $st_guide_bg_color ): ?>
		/* タグ用背景色 */
		.st-link-guide-post {
			padding: 20px;
			margin-bottom: 20px;
			background:<?php echo $st_guide_bg_color; ?>;
			<?php if ( $st_guidemenu_radius ): ?>
				border-radius: 5px;
			<?php endif; ?>
		}
		.post .st-link-guide-post ul:not(.toc_list):not(.st_toc_list),
		.st-link-guide-post ul:not(.toc_list):not(.st_toc_list){
			margin-bottom: 0;
		}
		.post .entry-content .st-link-guide ul li:last-child a,
		.st-link-guide li:last-child a {
			margin-bottom: 0;
		}
	<?php endif; ?>

	<?php if ( $st_guidemenu_bg_color ): ?>
		/* 背景色（第一階層） */
		#side aside .st-link-guide li a::after,
		.post .entry-content .st-link-guide ul li a::after,
		.st-link-guide li a::after {
			border-top: 10px solid <?php echo $st_guidemenu_bg_color; ?>;
		}
		#side aside .st-link-guide li a,
		.post .entry-content .st-link-guide ul li a,
		.st-link-guide li a {
			background: <?php echo $st_guidemenu_bg_color; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_guidemenu_radius ): ?>
		/* 角を丸くする */
		#side aside .st-link-guide li a,
		.post .entry-content .st-link-guide ul li a,
		.st-link-guide li a {
			border-radius: 5px;
		}
	<?php endif; ?>

	<?php if ( $st_guidemenutextcolor ): ?>
		/* テキスト色（第一階層） */
		#side aside .st-link-guide li a,
		.post .entry-content .st-link-guide ul li a,
		.st-link-guide li a {
			color: <?php echo $st_guidemenutextcolor; ?>;
		}
	<?php endif; ?>

	<?php if ( $st_guidemenutextcolor2 ): // ガイドマップサブメニュー ?>
		/* テキスト色（第二階層以下） */
		#side aside .st-link-guide .sub-menu li a,
		.post .entry-content .st-link-guide .sub-menu li a,
		.st-link-guide .sub-menu li a {
			color: <?php echo $st_guidemenutextcolor2; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

<?php // ボックスメニュー ?>

#side aside ul.st-box-btn li,
.st-box-btn li,
.post .st-box-btn li,
.post ul.st-box-btn li:last-child {
	<?php if ( $st_boxnavimenu_bordercolor ): // ボーダー色 ?>
		box-shadow: 1px 1px 0 0 <?php echo $st_boxnavimenu_bordercolor; ?> inset, 1px 1px 0 0 <?php echo $st_boxnavimenu_bordercolor; ?>, 1px 0 0 0 <?php echo $st_boxnavimenu_bordercolor; ?>;
	<?php endif; ?>
	<?php if ( $st_boxnavimenu_bg_color ): // 背景色 ?>
		background: <?php echo $st_boxnavimenu_bg_color; ?>;
	<?php endif; ?>
}

.st-box-btn .fa,
.st-box-btn .st-fa,
.st-box-btn img {
	<?php if ( $st_boxnavimenu_fontawesome ): // fontawesomeサイズ ?>
		font-size: <?php echo $st_boxnavimenu_fontawesome; ?>%;
	<?php else: ?>
		font-size: 300%;
	<?php endif; ?>
}

<?php if ( $st_boxnavimenu_color ): // ボーダー色 ?>
	.st-box-btn li a {
		color: <?php echo $st_boxnavimenu_color; ?>;
	}
<?php endif; ?>

<?php if ( $st_menu_sumartmenubordercolor ): // アコーディオンメニュー内のカテゴリー ?>
	.acordion_tree .st-ac-box ul.st-ac-cat {
	  border-top-color: <?php echo $st_menu_sumartmenubordercolor; ?>;
	  border-left-color: <?php echo $st_menu_sumartmenubordercolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_menu_sumartmenubordercolor ): ?>
	.acordion_tree .st-ac-box ul.st-ac-cat > li.cat-item  {
	  border-right-color: <?php echo $st_menu_sumartmenubordercolor; ?>;
	  border-bottom-color: <?php echo $st_menu_sumartmenubordercolor; ?>;
	}
<?php endif; ?>

<?php if ( $menu_sumartmenutextcolor ): ?>
	.acordion_tree .st-ac-box .widget_categories ul.st-ac-cat li.cat-item a {
	  color:<?php echo $menu_sumartmenutextcolor; ?>;
	}
	.s-navi-search-slide .wp-block-tag-cloud a, /* 検索スライド */
	.s-navi-search-slide .tagcloud a, /* 検索スライド */
	.s-navi-search-slide .acordion_search_content .widget_categories ul li.cat-item a, /* 検索スライド */
	.s-navi-search-slide .acordion_search_content .widget_st_categories_widget .cat-item a, /* 検索スライド */
	.acordion_tree .st-ac-box .widget_st_categories_widget .cat-item a,
	.acordion_tree .tagcloud a {
		color: <?php echo $menu_sumartmenutextcolor; ?>;
		border-color: <?php echo $menu_sumartmenutextcolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_kanren_bordercolor ): // 記事一覧の区切りボーダー ?>
	.kanren dl,
	.kanren .st-infeed-adunit {
  		border-bottom-color: <?php echo $st_kanren_bordercolor; ?>;
	}
<?php endif; ?>
<?php if ( $st_kanren_border_dashed ): ?>
	.kanren dl,
	.kanren .st-infeed-adunit {
		border-bottom-width: 2px;
    	border-bottom-style: dashed;
	}
<?php endif; ?>

<?php if ( $st_pagination_bordercolor ): // 記事一覧のページネーション ?>
	.st-pagelink .page-numbers {
		border-color: <?php echo $st_pagination_bordercolor; ?>;
		color: <?php echo $st_pagination_bordercolor; ?>;
	}
	.p-navi dl dt, /* PREV及びNEXT */
	.p-navi dl dd a,
	.st-pagelink a {
		color: <?php echo $st_pagination_bordercolor; ?>;
		text-decoration:none;
	}

	.p-navi dl dd a:hover {
		opacity: 0.7;
	}
<?php endif; ?>

/* 背景ワイド */
.wp-block-group.alignwide,
.colum1.st-lp-wide > .wp-block-cover,
.is-style-st-wide-background.wp-block-group.has-background,
.is-style-st-wide-background,
.st-wide-background {
	margin-left: -15px;
	margin-right: -15px;
    padding: 20px 15px;
	margin-bottom: 20px;
}

@media only screen and (min-width: 600px) {
	.wp-block-group.alignwide,
	.colum1.st-lp-wide > .wp-block-cover,
	.is-style-st-wide-background.wp-block-group.has-background,
	.is-style-st-wide-background,
	.st-wide-background {
		margin-left: -30px;
		margin-right: -30px;
	    padding-left: 30px;
	    padding-right: 30px;
	}
}

@media print, screen and (min-width: 960px) {
	.wp-block-group.alignwide,
	.colum1.st-lp-wide > .wp-block-cover,
	.is-style-st-wide-background.wp-block-group.has-background,
	.is-style-st-wide-background,
	.st-wide-background {
		<?php if ( $st_area ): // 記事エリアを広げる ?>
			margin-left: -20px;
			margin-right: -20px;
		    padding-left: 20px;
		    padding-right: 20px;
		<?php else: ?>
			margin-left: -50px;
			margin-right: -50px;
		    padding-left: 50px;
		    padding-right: 50px;
		 <?php endif; ?>
	}
	/* 1カラム */
	.colum1 .wp-block-group.alignwide,
	.colum1.st-lp-wide > .wp-block-cover,
	.colum1 .is-style-st-wide-background.wp-block-group.has-background,
	.colum1 .is-style-st-wide-background,
	.colum1 .st-wide-background {
		margin-left: -70px;
		margin-right: -70px;
	    padding-left: 70px;
	    padding-right: 70px;
	}
}

/* グループブロック入れ子のワイド */
.colum1.st-lp-wide > .wp-block-cover .wp-block-group,
.colum1 .is-style-st-wide-background.wp-block-group.has-background .wp-block-group,
.colum1 .is-style-st-wide-background .wp-block-group,
.colum1 .st-wide-background .wp-block-group {
	margin-left: 0;
	margin-right: 0;
	padding-left: 0;
	padding-right: 0;
}

/* 背景ワイド -右寄せ */
.is-style-st-wide-background-right,
.st-wide-background-right {
	margin-right: -15px;
    padding: 20px 15px;
	margin-bottom: 20px;
}

@media only screen and (min-width: 600px) {
	.is-style-st-wide-background-right,
	.st-wide-background-right {
		margin-right: -30px;
	    padding-right: 30px;
		padding-left: 20px;
	}
}

@media print, screen and (min-width: 960px) {
	.is-style-st-wide-background-right,
	.st-wide-background-right {
		<?php if ( $st_area ): // 記事エリアを広げる ?>
			margin-right: -20px;
		    padding-right: 20px;
			padding-left: 20px;
		<?php else: ?>
			margin-right: -50px;
		    padding-right: 50px;
			padding-left: 20px;
		 <?php endif; ?>
	}
	/* 1カラム */
	.colum1 .is-style-st-wide-background-right,
	.colum1 .st-wide-background-right {
		margin-right: -70px;
	    padding-right: 70px;
		padding-left: 20px;
	}
}

/* 背景ワイド - 左寄せ */
.is-style-st-wide-background-left,
.st-wide-background-left {
	margin-left: -15px;
    padding: 20px 15px;
	margin-bottom: 20px;
}

@media only screen and (min-width: 600px) {
	.is-style-st-wide-background-left,
	.st-wide-background-left {
		margin-left: -30px;
	    padding-left: 30px;
		padding-right: 20px;
	}
}

@media print, screen and (min-width: 960px) {
	.is-style-st-wide-background-left,
	.st-wide-background-left {
		<?php if ( $st_area ): // 記事エリアを広げる ?>
			margin-left: -20px;
		    padding-left: 20px;
			padding-right: 20px;
		<?php else: ?>
			margin-left: -50px;
		    padding-left: 50px;
			padding-right: 20px;
		 <?php endif; ?>
	}
	/* 1カラム */
	.colum1 .is-style-st-wide-background-left,
	.colum1 .st-wide-background-left {
		margin-left: -70px;
	    padding-left: 70px;
		padding-right: 20px;
	}
}

.post .st-wide-background-left ol:last-child,
.post .st-wide-background-left ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
.st-wide-background-left p:last-child,
.post .st-wide-background-right ol:last-child,
.post .st-wide-background-right ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
.st-wide-background-right p:last-child,
.post .st-wide-background ol:last-child,
.post .st-wide-background ul:not(.toc_list):not(.st_toc_list):not(.children):not(.slick-dots):not(.st-pvm-nav-list):last-child,
.st-wide-background p:last-child {
	margin-bottom: 0;
}

/** 引用風 */
.st-wide-background-left.st-blockquote,
.st-wide-background-right.st-blockquote,
.st-wide-background.st-blockquote {
	position: relative;
	padding-top: 60px;
}

.st-wide-background-left.st-blockquote::before,
.st-wide-background-right.st-blockquote::before,
.st-wide-background.st-blockquote::before {
   	content: "\f10d";
  	font-family: stsvg;
	position: absolute;
	font-size: 150%;
	top: 20px;
	left:20px;
	color: #9E9E9E;
}

.is-style-st-wide-background-left:not(.has-background):not(.is-style-st-group-bg-diagonal):not(.is-style-st-group-bg-grid):not(.is-style-st-group-bg-dot):not(.is-style-st-group-line):not(.is-style-st-group-line-bold):not(.is-style-st-group-corner-brackets):not(.is-style-st-group-square-brackets),
.is-style-st-wide-background-right:not(.has-background):not(.is-style-st-group-bg-diagonal):not(.is-style-st-group-bg-grid):not(.is-style-st-group-bg-dot):not(.is-style-st-group-line):not(.is-style-st-group-line-bold):not(.is-style-st-group-corner-brackets):not(.is-style-st-group-square-brackets),
.is-style-st-wide-background:not(.wp-block-code):not(.has-background):not(.is-style-st-group-bg-diagonal):not(.is-style-st-group-bg-grid):not(.is-style-st-group-bg-dot):not(.is-style-st-group-line):not(.is-style-st-group-line-bold):not(.is-style-st-group-corner-brackets):not(.is-style-st-group-square-brackets),
.st-wide-background-left,
.st-wide-background-right,
.st-wide-background {
	background: #fafafa;
}

/** ビジュアルエディタ用 */
.mce-content-body .st-wide-background-left,
.mce-content-body .st-wide-background-right,
.mce-content-body .st-wide-background {
	padding: 20px!important;
	margin-left: 0!important;
	margin-right: 0!important;
	background: #fafafa;
}

/*グループ2
------------------------------------------------------------*/
/* 投稿日時・ぱんくず・タグ */
#breadcrumb h1.entry-title,
#breadcrumb,
#breadcrumb div a,
div#breadcrumb a,
.blogbox p,
.tagst,
#breadcrumb ol li a,
#breadcrumb ol li h1,
#breadcrumb ol li,
.kanren:not(.st-cardbox) .clearfix dd .blog_info p,
.kanren:not(.st-cardbox) .clearfix dd .blog_info p i,
.kanren:not(.st-cardbox) .clearfix dd .blog_info p a
{
	color: <?php echo $st_kuzu_color; ?>;
}

<?php if( get_theme_mod('st_kuzu_b') ): // スタイルB ?>
	.page .entry-content {
		padding-top: 10px;
	}

	.blogbox.st-kuzu-b span {
		display:inline-block;
		padding: 5px 8px;
	}

	.blogbox.st-kuzu-b .kdate {

		<?php if($st_kuzu_b_color): ?>
			color: <?php echo $st_kuzu_b_color; ?>;
		<?php else: ?>
			<?php if($st_kuzu_b_color): ?>
				color: <?php echo $text_patterncolor; ?>;
			<?php else: ?>
				color: #fff;
			<?php endif; ?>
		<?php endif; ?>

		<?php if($st_kuzu_b_bg_color): ?>
			background: <?php echo $st_kuzu_b_bg_color; ?>;
		<?php else: ?>
			<?php if($key_patterncolor): ?>
				background: <?php echo $key_patterncolor; ?>;
			<?php else: ?>
				background: #999;
			<?php endif; ?>
		<?php endif; ?>

	}

	.blogbox.st-kuzu-b .st-writer-nickname {
		padding-right: 10px;

		<?php if($st_kuzu_b_color_writer): ?>
			color: <?php echo $st_kuzu_b_color_writer; ?>;
		<?php else: ?>
			color: #777;
		<?php endif; ?>

		<?php if($st_kuzu_b_bg_color_writer): ?>
			background: <?php echo $st_kuzu_b_bg_color_writer; ?>;
		<?php else: ?>
			background: #f3f3f3;
		<?php endif; ?>
	}

	.blogbox.st-kuzu-b .st-writer-nickname i:before,
	.blogbox.st-kuzu-b .st-writer-nickname a {
		<?php if($st_kuzu_b_color_writer): ?>
			color: <?php echo $st_kuzu_b_color_writer; ?>;
		<?php else: ?>
			color: #555;
		<?php endif; ?>
	}

<?php endif; ?>



/* 記事タイトル */
<?php if($st_entrytitle_no_css): //カスタマイザーのCSSを無効化
else: ?>

<?php if ( $st_entrytitle_gradient ): //グラデーションを横向きにする
		$entrytitle_gradient_w = 'left';
		$entrytitle_gradient = 'left';
	else :
		$entrytitle_gradient_w = 'top';
		$entrytitle_gradient = 'bottom';
	endif;
?>

<?php if($st_entrytitle_bg_radius): //entrytitle ?>
	/* 角丸 */
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span {
		border-radius:5px;
	}
	<?php if ( (trim( $st_entrytitle_designsetting ) !== '') && ( $st_entrytitle_designsetting === 'leftlinedesign') ): //左ラインのみ ?>
		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			border-radius:3px;
		}
	<?php endif; ?>
<?php endif;  ?>

<?php if ( trim( $st_entrytitle_designsetting ) !== '' || $st_entrytitleborder_color || $st_entrytitle_bgcolor || $st_entrytitle_bgimg ): // 基本スタイルがなし以外又はボーダー、背景画ある ?>
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		margin-top: 10px;
	}
<?php endif;  ?>

<?php if ( (trim( $st_entrytitle_designsetting ) !== '') && ( $st_entrytitle_designsetting === 'linedesign' ) ): //囲み&左ラインデザイン ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding: 0.5em  0.5em  0.5em 1.3em;

		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>

		border: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
		<?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>
		<?php if ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_entrytitle_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_entrytitle_bgimg; ?>"), -webkit-linear-gradient(<?php echo $entrytitle_gradient_w; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: url("<?php echo $st_entrytitle_bgimg; ?>"), linear-gradient(to <?php echo $entrytitle_gradient; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);
		<?php elseif ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
			background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
			background-color: <?php echo $st_entrytitle_bgcolor; ?>;
		<?php else: ?>
			background-color: transparent;
			<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>
				background: url("<?php echo $st_entrytitle_bgimg; ?>");
			<?php else: ?>
				background: none;
			<?php endif; ?>
		<?php endif; ?>
	}

	<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>

		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
			<?php if ( $st_entrytitle_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		position: absolute;
 		top: .5em;
		left: .5em;
		content: '';
		width: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 5; ?>px;
		height: -webkit-calc(100% - 1em);
		height: calc(100% - 1em);
		<?php if($st_entrytitleborder_undercolor): //ボーダーカラー ?>
			background-color: <?php echo $st_entrytitleborder_undercolor; ?>;
		<?php else: ?>
			background-color: <?php echo $st_entrytitleborder_color; ?>;
		<?php endif;  ?>

	}

<?php elseif ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'stripe_design') ): //ストライプ ?>
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		padding-left:10px;
		padding-bottom:10px;
		<?php if ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) !== '' ) ): ?>
			background: -webkit-repeating-linear-gradient(-45deg, <?php echo $st_entrytitle_bgcolor; ?>, <?php echo $st_entrytitle_bgcolor; ?> 5px, <?php echo $st_entrytitle_bgcolor_t; ?> 5px, <?php echo $st_entrytitle_bgcolor_t; ?> 10px);
			background: repeating-linear-gradient(-45deg, <?php echo $st_entrytitle_bgcolor; ?>, <?php echo $st_entrytitle_bgcolor; ?> 5px, <?php echo $st_entrytitle_bgcolor_t; ?> 5px, <?php echo $st_entrytitle_bgcolor_t; ?> 10px);
		<?php elseif ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
			background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
			background-color: <?php echo $st_entrytitle_bgcolor; ?>;
		<?php else: ?>

		<?php endif; ?>

		<?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>

		<?php if($st_entrytitleborder_color): //ボーダーカラー ?>
			<?php if($st_entrytitle_border_tb): //ボーダーを上下のみにする ?>
				border-top: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
				border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
			<?php else: ?>
				border: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
			<?php endif;  ?>
		<?php else: ?>
			border: none;
		<?php endif;  ?>

		<?php if( $st_entrytitle_border_tb_sub ): //ボーダー下をサブカラーにする ?>
			<?php if( $st_entrytitleborder_undercolor ): //サブカラー ?>
				border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_undercolor; ?>;
			<?php else: ?>
				border-bottom: none;
			<?php endif;  ?>
		<?php endif;  ?>

		<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
	}

<?php elseif ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'gradient_underlinedesign') ): //グラデーションアンダーライン ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding-left:0;
		padding-bottom: 10px;
		border-top:none;
		<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		<?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>
		background-color:transparent;
	}

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		position: absolute;
		bottom: -<?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 3; ?>px;
		left: 0;
		z-index: 2;
		content: '';
		width: 100%;
		height: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 3; ?>px;
		<?php if ( ( trim( $st_entrytitleborder_color ) !== '' ) && ( trim( $st_entrytitleborder_undercolor ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_entrytitleborder_color; ?>;
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(left,  <?php echo $st_entrytitleborder_undercolor; ?> 0%,<?php echo $st_entrytitleborder_color; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: linear-gradient(to left,  <?php echo $st_entrytitleborder_undercolor; ?> 0%,<?php echo $st_entrytitleborder_color; ?> 100%);
		<?php elseif ( ( trim( $st_entrytitleborder_color ) !== '' ) && ( trim( $st_entrytitleborder_undercolor ) === '' ) ): //下部には色がある場合 ?>
			background-color: <?php echo $st_entrytitleborder_color; ?>;
		<?php endif; ?>
	}

	<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>

		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
			background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
			<?php if ( $st_entrytitle_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php elseif ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'underlinedesign') ): //2色アンダーライン ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding-left:0;
		padding-bottom: 10px;
		border-top:none;
		<?php if($st_entrytitleborder_undercolor): //下線基本ボーダー色 ?>
			border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 3; ?>px solid <?php echo $st_entrytitleborder_undercolor; ?>!important;
		<?php else: ?>
			border-bottom-color: transparent;
		<?php endif;  ?>
		<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>

		<?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>
		background-color:transparent;
	}

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		position: absolute;
		bottom: -<?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 3; ?>px;
		left: 0;
		z-index: 2;
		content: '';
		width: 5em;
		height: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 3; ?>px;
		<?php if($st_entrytitleborder_color): //ボーダーカラー ?>
                	background-color: <?php echo $st_entrytitleborder_color; ?>;
		<?php endif;  ?>
	}

	<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>

		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
			background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
			<?php if ( $st_entrytitle_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php elseif ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'centerlinedesign') ): ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		overflow: hidden;
		text-align: center;
		border-top:none;
		border-bottom:none;
		padding-left: 20px!important;
		padding-right: 20px!important;

		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		<?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>
		background-color:transparent;
	}

	.post .entry-title span {
		position: relative;
  		display: inline-block;
		margin: 0 10px;
		padding: 0 20px;
		text-align: center;
		word-break: break-all;
	}
	@media only screen and (max-width: 599px) {
		.post .entry-title span {
			padding: 0 10px;
		}
	}

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::before,
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::after {
		position: absolute;
		top: 50%;
		content: '';
		width: 1000%;
		height: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px;
		background-color: <?php echo $st_entrytitleborder_color; ?>;
	}

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::before {
		right: 100%;
	}

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::after {
		left: 100%;
	}

	/* hタグ用 キャッチコピー */
	.post .st-dash-design,
	.st-dash-design .st-h-copy,
	.st-dash-design .st-h-copy-toc {
		text-align: center;
	}

<?php elseif ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'shortlinedesign') ): // ショートライン ?>

	#st-page.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		border-top:none;
		border-bottom:none;
		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php else: ?>
			padding-bottom: 20px;
		<?php endif;  ?>

		<?php if($st_entrytitle_bgimg_margin): //下のマージン ?>
			margin-bottom:<?php echo $st_entrytitle_bgimg_margin; ?>px!important;
		<?php else: ?>
			margin-bottom: 20px;
		<?php endif;  ?>

		<?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>
		background-color:transparent;
	}

	<?php if ( $st_entrytitleborder_color ): // ボーダー色あり ?>
		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			position: absolute;
			content: '';
			width: 3em;
			height: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 2; ?>px;
			background-color: <?php echo $st_entrytitleborder_color; ?>;
			left: 0;
			bottom: 0;
		}
	<?php endif; ?>

	<?php if ( $st_entrytitleborder_undercolor && $st_entrytitleborder_color ): // ボーダー色（サブ）あり ?>
		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			position: absolute;
			content: '';
			width: 3em;
			height: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 2; ?>px;
			/*Other Browser*/
			background: <?php echo $st_entrytitle_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(left,  <?php echo $st_entrytitleborder_undercolor; ?> 0%,<?php echo $st_entrytitleborder_color; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: linear-gradient(to left,  <?php echo $st_entrytitleborder_undercolor; ?> 0%,<?php echo $st_entrytitleborder_color; ?> 100%);
			left: 0;
			bottom: 0;
		}
	<?php endif; ?>

	<?php if ( $st_entrytitle_text_center ): // テキストを中央寄せ ?>
		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			left: calc(50% - 1.5em);
		}
	<?php endif; ?>

<?php elseif ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'dotdesign') ): // 囲みドットデザイン ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;

        <?php if ( $st_entrytitle_bgimg_tupadding ): ?>
			padding: <?php echo $st_entrytitle_bgimg_tupadding; ?>px;
		<?php else: ?>
			padding: 5px;
		<?php endif; ?>

		border: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
        <?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>
		<?php if ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_entrytitle_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_entrytitle_bgimg; ?>"), -webkit-linear-gradient(<?php echo $entrytitle_gradient_w; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: url("<?php echo $st_entrytitle_bgimg; ?>"), linear-gradient(to <?php echo $entrytitle_gradient; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);
		<?php elseif ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
			background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
			background-color: <?php echo $st_entrytitle_bgcolor; ?>;
		<?php else: ?>
			background-color: transparent;
			<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>
				background: url("<?php echo $st_entrytitle_bgimg; ?>");
			<?php else: ?>
				background: none;
 			<?php endif; ?>
		<?php endif; ?>
	}

	<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>

		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
			<?php if ( $st_entrytitle_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design {
		display: block;

        <?php if ( $st_entrytitle_bgimg_tupadding ): ?>
			padding: <?php echo $st_entrytitle_bgimg_tupadding; ?>px;
		<?php else: ?>
			padding: 15px;
		<?php endif; ?>

		<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_entrytitleborder_undercolor): //ドットカラー ?>
			border: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px dashed <?php echo $st_entrytitleborder_undercolor; ?>;
		<?php else: ?>
			border: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px dashed <?php echo $st_entrytitleborder_color; ?>;
		<?php endif;  ?>
	}

       		<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>

            .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
                <?php if ( $st_entrytitle_bgimg_repeat ): ?>
                    background-repeat: no-repeat;
                <?php endif; ?>
            }
       		<?php endif;  ?>

<?php elseif ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'leftlinedesign') ): //左ラインのみ ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
		position: absolute;
		content: '';
		width: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 6; ?>px;
		height: 100%;
		<?php if ( $st_entrytitleborder_undercolor && $st_entrytitleborder_color ): // ボーダー色（サブ）あり ?>
			/*Other Browser*/
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(top,  <?php echo $st_entrytitleborder_color; ?> 0%,<?php echo $st_entrytitleborder_undercolor; ?> 100%);
		<?php elseif ( ! $st_entrytitleborder_undercolor && $st_entrytitleborder_color ): ?>
			background: <?php echo $st_entrytitleborder_color; ?>;
		<?php endif; ?>
		left: 0;
		bottom: 0;
	}

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding-left:20px;
		padding-bottom:10px;
		border: none;
        <?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>
		<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>


		<?php if ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_entrytitle_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_entrytitle_bgimg; ?>"), -webkit-linear-gradient(<?php echo $entrytitle_gradient_w; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);

			/* IE10+, FF16+, Chrome36+ */
			background: url("<?php echo $st_entrytitle_bgimg; ?>"), linear-gradient(to <?php echo $entrytitle_gradient; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);
		<?php elseif ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
			background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
			background-color: <?php echo $st_entrytitle_bgcolor; ?>;
		<?php else: ?>
			background-color: transparent;
			<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>
				background: url("<?php echo $st_entrytitle_bgimg; ?>");
			<?php else: ?>
				background: none;
			<?php endif; ?>
		<?php endif; ?>

		<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>
			background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
			<?php if ( $st_entrytitle_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		<?php endif;  ?>
	}

<?php elseif ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'underdotdesign') ): // 破線アンダーライン ?>

	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		padding-bottom:10px;
		border: none;
		border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 2; ?>px dashed <?php echo $st_entrytitleborder_color; ?>;
		<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
		<?php else: ?>
			padding-left:0;
		<?php endif;  ?>
		<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
        <?php if ( $st_entrytitle_color ): ?>
			color: <?php echo $st_entrytitle_color; ?>;
		<?php endif; ?>
		<?php if ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_entrytitle_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_entrytitle_bgimg; ?>"), -webkit-linear-gradient(<?php echo $entrytitle_gradient_w; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);

			/* IE10+, FF16+, Chrome36+ */
			background: url("<?php echo $st_entrytitle_bgimg; ?>"), linear-gradient(to <?php echo $entrytitle_gradient; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);
		<?php elseif ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
			background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
			background-color: <?php echo $st_entrytitle_bgcolor; ?>;
		<?php else: ?>
			background-color: transparent;
			<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>
				background: url("<?php echo $st_entrytitle_bgimg; ?>");
			<?php else: ?>
				background: none;
			<?php endif; ?>
		<?php endif; ?>
	}
            <?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>

                .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                    background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
                    <?php if ( $st_entrytitle_bgimg_repeat ): ?>
                        background-repeat: no-repeat;
                    <?php endif; ?>
                }
            <?php endif;  ?>

<?php else: ?>

	<?php if ( (trim( $st_entrytitle_designsetting) !== '') && ($st_entrytitle_designsetting === 'hukidasidesign') ): //吹き出しデザイン ?>

            .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				padding-left:10px;
				padding-bottom:10px;
                background: <?php echo $st_entrytitle_bgcolor; ?>;
				<?php if ( $st_entrytitle_color ): ?>
					color: <?php echo $st_entrytitle_color; ?>;
				<?php endif; ?>
                position: relative;
                border: none;
                margin-bottom:30px;
				<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>
            }

            .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
                border-top: 10px solid <?php echo $st_entrytitle_bgcolor; ?>;
                content: '';
                position: absolute;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                bottom: -10px;
                left: 30px;
                border-radius: 2px;
            }

            .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
                border-top: 10px solid <?php echo $st_entrytitle_bgcolor; ?>;
                content: '';
                position: absolute;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                bottom: -10px;
                left: 30px;
            }

       		<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>

            .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
                background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
                <?php if ( $st_entrytitle_bgimg_repeat ): ?>
                    background-repeat: no-repeat;
                <?php endif; ?>
            }
       		<?php endif;  ?>

		<?php elseif (
			( $st_is_ex ) // テーマ分岐
				&& ( trim( $st_entrytitle_designsetting) !== '' )
				&& ( $st_entrytitle_designsetting === 'hukidasidesign_under' )
			): // 吹き出し下線デザイン ?>

			#st-page .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
			.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {

				position: relative;
				padding: 10px;
				margin-bottom: 30px;
				border: none;

				<?php if ( $st_entrytitleborder_color ): //ボーダーがあるかどうか ?>
					border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 3; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
				<?php else: ?>
					border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 3; ?>px solid #ccc;
				<?php endif; ?>

				<?php if ( $st_entrytitle_bgcolor ): ?>
					background: <?php echo $st_entrytitle_bgcolor; ?>;
				<?php else: ?>
					background: #fff;
					padding: 10px 0;
				<?php endif; ?>

				<?php if ( $st_entrytitle_color ): ?>
					color: <?php echo $st_entrytitle_color; ?>;
				<?php endif; ?>

				<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

                <?php if ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_entrytitle_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_entrytitle_bgimg; ?>"), -webkit-linear-gradient(<?php echo $entrytitle_gradient_w; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome26+ */
                    background: url("<?php echo $st_entrytitle_bgimg; ?>"), linear-gradient(to <?php echo $entrytitle_gradient; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);
                <?php elseif ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
                    background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
                    background-color: <?php echo $st_entrytitle_bgcolor; ?>;
                <?php else: ?>
                    background-color: transparent;
                    <?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>
                        background: url("<?php echo $st_entrytitle_bgimg; ?>");
                    <?php else: ?>
                        background: none;
                    <?php endif; ?>
                <?php endif; ?>
			}

       		<?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>
				#st-page .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
				.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
					<?php if ( $st_entrytitle_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
       		<?php endif;  ?>

			.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
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

			.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				position: absolute;
				width: 0;
				height: 0;
				border: solid transparent;
				content: "";
				border-top-width: 11px;
				border-right-width: 11px;
				border-bottom-width: 11px;
				border-left-width: 11px;
			}

			.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				left: 50px;
				bottom: -28px;
				<?php if ( $st_entrytitleborder_color ): //ボーダーがあるかどうか ?>
					border-top-color: <?php echo $st_entrytitleborder_color; ?>;
					border-left-color: <?php echo $st_entrytitleborder_color; ?>;
				<?php else: ?>
					border-top-color: #ccc;
					border-left-color: #ccc;
				<?php endif; ?>
			}

			.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				left: 53px;
				bottom: -21px;  /* ずらした分だけ線の幅 */
				<?php if ( $st_entrytitle_bgcolor ): ?>
					border-top-color: <?php echo $st_entrytitle_bgcolor; ?>;
					border-left-color: <?php echo $st_entrytitle_bgcolor; ?>;
				<?php else: ?>
					border-top-color: #fff;
					border-left-color: #fff;
				<?php endif; ?>
			}

	<?php else: //吹き出しじゃないデザイン ?>

           	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				<?php if ( $st_entrytitle_color ): ?>
					color: <?php echo $st_entrytitle_color; ?>;
				<?php endif; ?>
                <?php if ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_entrytitle_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_entrytitle_bgimg; ?>"), -webkit-linear-gradient(<?php echo $entrytitle_gradient_w; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome26+ */
                    background: url("<?php echo $st_entrytitle_bgimg; ?>"), linear-gradient(to <?php echo $entrytitle_gradient_w; ?>,  <?php echo $st_entrytitle_bgcolor_t; ?> 0%,<?php echo $st_entrytitle_bgcolor; ?> 100%);
                <?php elseif ( ( trim( $st_entrytitle_bgcolor ) !== '' ) && ( trim( $st_entrytitle_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
                    background-image: url("<?php echo $st_entrytitle_bgimg; ?>");
                    background-color: <?php echo $st_entrytitle_bgcolor; ?>;
                <?php else: ?>
                    background-color: transparent;
                    <?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>
                        background: url("<?php echo $st_entrytitle_bgimg; ?>");
                    <?php else: ?>
                        background: none;
                    <?php endif; ?>
                <?php endif; ?>

				<?php if ( ( trim( $st_entrytitle_bgcolor ) !== '' ) || $st_entrytitle_bgimg ): // 背景色又は背景画像あり ?>
					padding-right: 20px;
				<?php endif; ?>

                <?php if ( $st_entrytitleborder_color ): //ボーダーがあるかどうか ?>
                    <?php if ( $st_entrytitle_border_tb ): ?>
                        border-top: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
						<?php if( $st_entrytitle_border_tb_sub ): //ボーダー下をサブカラーにする ?>
							<?php if( $st_entrytitleborder_undercolor ): //サブカラー ?>
								border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_undercolor; ?>;
							<?php else: ?>
								border-bottom: none;
							<?php endif;  ?>
						<?php else: ?>
							border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
						<?php endif;  ?>
                    <?php else: ?>
                        border: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_color; ?>;
                    <?php endif; ?>
                <?php else: ?>
                    border: none;
                <?php endif; ?>

				<?php if( $st_entrytitle_border_tb_sub ): //ボーダー下をサブカラーにする ?>
					<?php if( $st_entrytitleborder_undercolor ): //サブカラー ?>
						border-bottom: <?php print $st_entrytitle_border_size ? $st_entrytitle_border_size : 1; ?>px solid <?php echo $st_entrytitleborder_undercolor; ?>;
					<?php else: ?>
						border-bottom: none;
					<?php endif;  ?>
				<?php endif;  ?>

				<?php if( $st_entrytitle_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_entrytitle_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>
            }

            <?php if( $st_entrytitle_bgimg ): //背景画像がある場合 ?>

                .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                    background-position: <?php echo $st_entrytitle_bgimg_side; ?> <?php echo $st_entrytitle_bgimg_top; ?>;
                    <?php if ( $st_entrytitle_bgimg_repeat ): ?>
                        background-repeat: no-repeat;
                    <?php endif; ?>
                }
            <?php endif;  ?>

        <?php endif; ?>

<?php endif; //ラインデザインかどうか ?>

<?php if ( $st_entrytitle_bgimg_margin ): //下のマージン ?>
	.entry-title.heder-post-data-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	#st-page .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		margin-bottom: <?php echo $st_entrytitle_bgimg_margin; ?>px;
	}
<?php endif; ?>

<?php if($st_entrytitle_bgimg_tupadding): //上下の余白 ?>
	.entry-title.heder-post-data-title:not(.st-css-no2),
	#st-page .entry-title:not(.st-css-no2),
	.post .entry-title:not(.st-css-no) {
			padding-top:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_entrytitle_bgimg_tupadding; ?>px!important;
	}
<?php endif;  ?>

<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

/* h2 */

<?php if($st_h2_no_css): //カスタマイザーのCSSを無効化
else: ?>

<?php if ( $st_h2_gradient ): //グラデーションを横向きにする
		$h2_gradient_w = 'left';
		$h2_gradient = 'left';
	else :
		$h2_gradient_w = 'top';
		$h2_gradient = 'bottom';
	endif;
?>

<?php if ( $st_h2_bgimg_tumargin ): //上下のマージン ?>
	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		margin-top: <?php echo $st_h2_bgimg_tumargin; ?>px;
		margin-bottom: <?php echo $st_h2_bgimg_tumargin; ?>px;
	}
<?php endif; ?>

<?php if($st_h2_bg_radius): //h2 ?>
	/* 角丸 */
	.h2modoki,
	.h2modoki span,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span {
		border-radius:5px;
	}
	<?php if ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'leftlinedesign') ): //左ラインのみ ?>
		.h2modoki::before,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			border-radius:3px;
		}
	<?php endif; ?>
<?php endif;  ?>

<?php if ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'linedesign') ): //囲み&左ラインデザイン ?>

	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding: 1em 1em 1em 1.3em;
		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
		<?php if ( $st_h2_color ): ?>
			color: <?php echo $st_h2_color; ?>;
		<?php endif; ?>
		<?php if ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_h2_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
		<?php elseif ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
			<?php if ( $st_h2_bgimg ): ?>
				background-image: url("<?php echo $st_h2_bgimg; ?>");
			<?php endif; ?>
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
		.h2modoki,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
			<?php if ( $st_h2_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>
	.h2modoki::after,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		position: absolute;
 		top: .5em;
		left: .5em;
		content: '';
		width: <?php print $st_h2_border_size ? $st_h2_border_size : 5; ?>px;
		height: -webkit-calc(100% - 1em);
		height: calc(100% - 1em);
		<?php if($st_h2border_undercolor): //ボーダーカラー ?>
			background-color: <?php echo $st_h2border_undercolor; ?>;
		<?php else: ?>
			background-color: <?php echo $st_h2border_color; ?>;
		<?php endif;  ?>

	}

<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'stripe_design') ): //ストライプ ?>
	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		<?php if ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) !== '' ) ): ?>
			background: -webkit-repeating-linear-gradient(-45deg, <?php echo $st_h2_bgcolor; ?>, <?php echo $st_h2_bgcolor; ?> 5px, <?php echo $st_h2_bgcolor_t; ?> 5px, <?php echo $st_h2_bgcolor_t; ?> 10px);
			background: repeating-linear-gradient(-45deg, <?php echo $st_h2_bgcolor; ?>, <?php echo $st_h2_bgcolor; ?> 5px, <?php echo $st_h2_bgcolor_t; ?> 5px, <?php echo $st_h2_bgcolor_t; ?> 10px);
		<?php elseif ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
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

		<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
	}

	.h2modoki::before,
	h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
	.h2modoki::after,
	h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		content: none;
	}

<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'gradient_underlinedesign') ): //グラデーションアンダーライン ?>
	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding-left:0;
		padding-bottom: 10px;
		border-top:none;
		<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
                color: <?php echo $st_h2_color; ?>;
                background-color:transparent;
	}
	.h2modoki::after,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		position: absolute;
		bottom: -<?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
		left: 0;
		top: inherit;
		z-index: 2;
		content: '';
		width: 100%;
		height: <?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
		<?php if ( ( trim( $st_h2border_color ) !== '' ) && ( trim( $st_h2border_undercolor ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_h2border_color; ?>;
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(left,  <?php echo $st_h2border_undercolor; ?> 0%,<?php echo $st_h2border_color; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: linear-gradient(to left,  <?php echo $st_h2border_undercolor; ?> 0%,<?php echo $st_h2border_color; ?> 100%);
		<?php elseif ( ( trim( $st_h2border_color ) !== '' ) && ( trim( $st_h2border_undercolor ) === '' ) ): //下部には色がある場合 ?>
			background-color: <?php echo $st_h2border_color; ?>;
		<?php endif; ?>
	}

	<?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
		.h2modoki,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-image: url("<?php echo $st_h2_bgimg; ?>");
			background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
			<?php if ( $st_h2_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'underlinedesign') ): //2色アンダーライン ?>
	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding-left:0;
		padding-bottom: 10px;
		border-top:none;
		border-bottom-width:<?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
		border-bottom-style: solid;
		<?php if($st_h2border_undercolor): //下線基本ボーダー色 ?>
			border-bottom-color: <?php echo $st_h2border_undercolor; ?>!important;
		<?php else: ?>
			border-bottom-color: transparent;
		<?php endif;  ?>
		<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		<?php if ( $st_h2_color ): ?>
			color: <?php echo $st_h2_color; ?>;
		<?php endif; ?>
		background-color:transparent;
	}
	.h2modoki::after,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		position: absolute;
		bottom: -<?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
		left: 0;
		top: inherit;
		border-top: none;
		z-index: 2;
		content: '';
		width: 20%;
		height: <?php print $st_h2_border_size ? $st_h2_border_size : 3; ?>px;
		<?php if($st_h2border_color): //ボーダーカラー ?>
                	background-color: <?php echo $st_h2border_color; ?>;
		<?php endif;  ?>
	}

	<?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
		.h2modoki,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-image: url("<?php echo $st_h2_bgimg; ?>");
			background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
			<?php if ( $st_h2_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'centerlinedesign') ): ?>
	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		overflow: hidden;
		text-align: center;
		border-top:none;
		border-bottom:none;
		padding-left: 20px!important;
		padding-right: 20px!important;

		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		<?php if ( $st_h2_color ): ?>
			color: <?php echo $st_h2_color; ?>;
		<?php endif; ?>
		background-color:transparent;
	}
	.h2modoki span,
	.post h2:where(:not(.st-css-no)) span:not(.st-emoji) {
		position: relative;
  		display: inline-block;
		margin: 0 10px;
		padding: 0 20px;
		text-align: center;
		word-break: break-all;
	}
	@media only screen and (max-width: 599px) {
		.h2modoki span,
		.post h2:where(:not(.st-css-no)) span:not(.st-emoji) {
			padding: 0 10px;
		}
	}
	.h2modoki span.st-dash-design::before,
	.h2modoki span.st-dash-design::after,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::before,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::after {
		position: absolute;
		top: 50%;
		content: '';
		width: 1000%;
		height: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px;
		background-color: <?php echo $st_h2border_color; ?>;
	}
	.h2modoki span.st-dash-design::before,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::before {
		right: 100%;
	}
	.h2modoki span.st-dash-design::after,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design::after {
		left: 100%;
	}

	/* hタグ用 キャッチコピー */
	.post .st-dash-design,
	.st-dash-design .st-h-copy-toc,
	.st-dash-design .st-h-copy {
		text-align: center;
	}

<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'shortlinedesign') ): // ショートライン ?>

	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
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
		.h2modoki::before,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			position: absolute;
			content: '';
			width: 3em;
			height: <?php print $st_h2_border_size ? $st_h2_border_size : 2; ?>px;
			background-color: <?php echo $st_h2border_color; ?>;
			left: 0;
			bottom: 0;
		}
	<?php endif; ?>

	<?php if ( $st_h2border_undercolor && $st_h2border_color ): // ボーダー色（サブ）あり ?>
		.h2modoki::before,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			position: absolute;
			content: '';
			width: 3em;
			height: <?php print $st_h2_border_size ? $st_h2_border_size : 2; ?>px;
			left: 0;
			bottom: 0;

            /*Other Browser*/
            background: <?php echo $st_h2_bgcolor; ?>;
            /* Android4.1 - 4.3 */
            background: -webkit-linear-gradient(left,  <?php echo $st_h2border_undercolor; ?> 0%,<?php echo $st_h2border_color; ?> 100%);

            /* IE10+, FF16+, Chrome26+ */
            background: linear-gradient(to left,  <?php echo $st_h2border_undercolor; ?> 0%,<?php echo $st_h2border_color; ?> 100%);
		}
	<?php endif; ?>

	<?php if ( $st_h2_text_center ): // テキストを中央寄せ ?>
		.h2modoki,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			text-align: center;
		}

		.h2modoki::before,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		.h2modoki::after,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
			left: calc(50% - 1.5em);
		}
	<?php endif; ?>

<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'dotdesign') ): ?>

	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
        <?php if ( $st_h2_bgimg_tupadding ): ?>
			padding: <?php echo $st_h2_bgimg_tupadding; ?>px;
		<?php else: ?>
			padding: 5px;
		<?php endif; ?>
		border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2border_color; ?>;
                color: <?php echo $st_h2_color; ?>;
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
		.h2modoki,
		.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
			<?php if ( $st_h2_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

	.h2modoki span.st-dash-design,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design {
		display: block;
        <?php if ( $st_h2_bgimg_tupadding ): ?>
			padding: <?php echo $st_h2_bgimg_tupadding; ?>px;
		<?php else: ?>
			padding: 10px;
		<?php endif; ?>
		<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h2border_undercolor): //ドットカラー ?>
			border: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px dashed <?php echo $st_h2border_undercolor; ?>;
		<?php else: ?>
			border: 1px dashed <?php echo $st_h2border_color; ?>;
		<?php endif;  ?>
	}

       		<?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
			.h2modoki,
            h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
                <?php if ( $st_h2_bgimg_repeat ): ?>
                    background-repeat: no-repeat;
                <?php endif; ?>
            }
       		<?php endif;  ?>

	.h2modoki::before,
	h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
	.h2modoki::after,
	h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		content: none;
	}

<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'leftlinedesign') ): //左ラインのみ ?>

	.h2modoki::before,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
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

	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding-left:20px;
		border: none;
		<?php if ( $st_h2_color ): ?>
			color: <?php echo $st_h2_color; ?>;
		<?php endif; ?>
		<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>


		<?php if ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_h2_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

			/* IE10+, FF16+, Chrome36+ */
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

		<?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
			background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
			<?php if ( $st_h2_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		<?php endif;  ?>
	}

	<?php elseif (
		( $st_is_ex_af ) // テーマ分岐
		&& ( trim( $st_h2_designsetting ) !== '' )
		&& ( $st_h2_designsetting === 'checkboxdesign' ) // チェックボックスデザイン
		): ?>

		<?php if ( $st_webicon_checkbox_simple ): // チェックボックスのデザインをチェックのみにする ?>

			.h2modoki,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no){
				position: relative;
				display: block;
				line-height: 1.5;
				margin-bottom: 20px;
				padding-bottom: 0.5em;
				padding-left: calc(1.5em + 25px)!important;
				<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
					padding-left: calc(1.5em + 25px + <?php echo $st_h2_bgimg_leftpadding; ?>px)!important;
				<?php endif;  ?>
				<?php if ( $st_h2_color ): ?>
					color: <?php echo $st_h2_color; ?>;
				<?php endif; ?>

				<?php if( $st_h2_border_size ): //ボーダーの太さ（px）が設定されている場合はボーダー下をテキストカラーにする ?>
					<?php if( $st_h2_color ): //テキストカラー ?>
						border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 1; ?>px solid <?php echo $st_h2_color; ?>;
					<?php else: ?>
						border-bottom: none;
					<?php endif;  ?>
				<?php else: ?>
					border-bottom: none;
				<?php endif;  ?>
				border-top:none;
				<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) !== '' ) ): ?>
					/*Other Browser*/
					background: <?php echo $st_h2_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
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

				<?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
					background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
					<?php if ( $st_h2_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.h2modoki::before,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
				position: absolute;
				top: calc(50% - .75em)!important;
				left: 15px;
				content: "\f00c";
				font-family: stsvg;
				<?php if ( $st_h2border_color && $st_h2border_undercolor ): //ボーダー色 + ボーダー色（サブ）があるかどうか ?>
					background: linear-gradient( to right,  <?php echo $st_h2border_color; ?> 25%, <?php echo $st_h2border_undercolor; ?> 75% );
					-webkit-background-clip: text;
					color: transparent!important;
				<?php elseif ( $st_h2border_color ): //ボーダー色（サブ）があるかどうか ?>
					color: <?php echo $st_h2border_color; ?>;
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

			.h2modoki::after,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				content: none;
			}

		<?php else: ?>

			.h2modoki,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no){
				position: relative;
				display: block;
				line-height: 1.5;
				margin-bottom: 20px;
				padding-bottom: 0.5em;
				padding-left: calc(1.5em + 25px)!important;
				<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
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
				border-top:none;
				<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) !== '' ) ): ?>
					/*Other Browser*/
					background: <?php echo $st_h2_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
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

				<?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
					background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
					<?php if ( $st_h2_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.h2modoki::before,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
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
			}

			.h2modoki::after,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				content: "\e904";
				font-family: stsvg;
				position: absolute;
				z-index: 1;
				left: 10px;
				top: calc(50% - .75em);
				font-size: 150%;
				line-height: 1.5;
				<?php if ( $st_h2border_color ): //ボーダーがあるかどうか ?>
					color: <?php echo $st_h2border_color; ?>;
				<?php else: ?>
					color: #ccc;
				<?php endif; ?>
			}

		<?php endif; ?>

<?php elseif ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'underdotdesign') ): ?>

	.h2modoki,
	.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		border: none;
		border-bottom: <?php print $st_h2_border_size ? $st_h2_border_size : 2; ?>px dashed <?php echo $st_h2border_color; ?>;
		<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
		<?php else: ?>
			padding-left:0;
		<?php endif;  ?>
		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		<?php if ( $st_h2_color ): ?>
			color: <?php echo $st_h2_color; ?>;
		<?php endif; ?>
		<?php if ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) !== '' ) ): ?>
				/*Other Browser*/
				background: <?php echo $st_h2_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome36+ */
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
				.h2modoki,
                .post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh2):not(.post-card-title):not(#reply-title) {
                    background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
                    <?php if ( $st_h2_bgimg_repeat ): ?>
                        background-repeat: no-repeat;
                    <?php endif; ?>
                }
            <?php endif;  ?>

	.h2modoki::before,
	h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
	.h2modoki::after,
	h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		content: none;
	}

<?php else: ?>

	<?php if ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'hukidasidesign') ): //吹き出しデザイン ?>
			.h2modoki,
            h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				<?php if ( $st_h2_bgcolor ): ?>
                	background: <?php echo $st_h2_bgcolor; ?>;
				<?php endif; ?>
                <?php if ( $st_h2_color ): ?>
					color: <?php echo $st_h2_color; ?>;
				<?php endif; ?>
                position: relative;
                border: none;
                margin-bottom:30px;
		<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
            }

			.h2modoki::after,
            h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
                border-top: 10px solid <?php echo $st_h2_bgcolor; ?>;
                content: '';
                position: absolute;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                bottom: -10px;
                left: 30px;
                border-radius: 2px;
            }
            .h2modoki::before,
            h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
                border-top: 10px solid <?php echo $st_h2_bgcolor; ?>;
                content: '';
                position: absolute;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                bottom: -10px;
                left: 30px;
            }

       		<?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
			.h2modoki,
            h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                background-image: url("<?php echo $st_h2_bgimg; ?>");
                background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
                <?php if ( $st_h2_bgimg_repeat ): ?>
                    background-repeat: no-repeat;
                <?php endif; ?>
            }
       		<?php endif;  ?>

		<?php elseif (
			( $st_is_ex ) // テーマ分岐
			&& ( trim( $st_h2_designsetting) !== '' )
			&& ( $st_h2_designsetting === 'hukidasidesign_under' ) // 吹き出し下線デザイン
			): ?>

			.h2modoki,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {

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
					padding: 10px 0;
				<?php endif; ?>

				<?php if ( $st_h2_color ): ?>
					color: <?php echo $st_h2_color; ?>;
				<?php endif; ?>

				<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

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
				.h2modoki,
				h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
					<?php if ( $st_h2_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
       		<?php endif;  ?>

			.h2modoki::before,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
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

			.h2modoki::after,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				position: absolute;
				width: 0;
				height: 0;
				border: solid transparent;
				content: "";
				border-top-width: 11px;
				border-right-width: 11px;
				border-bottom-width: 11px;
				border-left-width: 11px;
			}

			.h2modoki::before,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
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

			.h2modoki::after,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				left: 53px;
				bottom: -21px;
				<?php if ( $st_h2_bgcolor ): ?>
					border-top-color: <?php echo $st_h2_bgcolor; ?>;
					border-left-color: <?php echo $st_h2_bgcolor; ?>;
				<?php else: ?>
					border-top-color: #fff;
					border-left-color: #fff;
				<?php endif; ?>
			}

	<?php else: //吹き出しじゃないデザイン ?>

			.h2modoki,
            h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                <?php if ( $st_h2_color ): ?>
					color: <?php echo $st_h2_color; ?>;
				<?php endif; ?>
                <?php if ( ( trim( $st_h2_bgcolor ) !== '' ) && ( trim( $st_h2_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_h2_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_h2_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome26+ */
                    background: url("<?php echo $st_h2_bgimg; ?>"), linear-gradient(to <?php echo $h2_gradient_w; ?>,  <?php echo $st_h2_bgcolor_t; ?> 0%,<?php echo $st_h2_bgcolor; ?> 100%);
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

				<?php if( $st_h2_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h2_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_h2_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h2_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>
            }

            <?php if( $st_h2_bgimg ): //背景画像がある場合 ?>
				.h2modoki,
                h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                    background-position: <?php echo $st_h2_bgimg_side; ?> <?php echo $st_h2_bgimg_top; ?>;
                    <?php if ( $st_h2_bgimg_repeat ): ?>
                        background-repeat: no-repeat;
                    <?php endif; ?>
                }
            <?php endif;  ?>

			.h2modoki::before,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
			.h2modoki::after,
			h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
				content: none;
			}

			<?php if ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'countdesign') ): //カウント ?>
				.h2modoki,
				.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					counter-increment: counter-h2;
					counter-reset: counter-h3;
				}

				.h2modoki::before,
				h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					content: counter(counter-h2)".";
					margin-right: 0.6em;
					<?php if ( $st_h2border_undercolor ): ?>
						color: <?php echo $st_h2border_undercolor; ?>;
					<?php endif; ?>
				}
			<?php endif;  ?>

        <?php endif; ?>

<?php endif; //ラインデザインかどうか ?>

<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

/* h3 */
<?php if($st_h3_no_css): //カスタマイザーのCSSを無効化
else: ?>

<?php if ( $st_h3_gradient ): //グラデーションを横向きにする
		$h3_gradient_w = 'left';
		$h3_gradient = 'left';
	else :
		$h3_gradient_w = 'top';
		$h3_gradient = 'bottom';
	endif;
?>

<?php if ( $st_h3_bgimg_tumargin ): //上下のマージン ?>
	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
		margin-top: <?php echo $st_h3_bgimg_tumargin; ?>px;
		margin-bottom: <?php echo $st_h3_bgimg_tumargin; ?>px;
	}
<?php endif; ?>

<?php if($st_h3_bg_radius): //h3 ?>
	/* 角丸 */
	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
		border-radius:5px;
	}
	<?php if ( (trim( $st_h3_designsetting ) !== '') && ( $st_h3_designsetting === 'leftlinedesign') ): //左ラインのみ ?>
		.h3modoki::before,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
			border-radius:3px;
		}
	<?php endif; ?>
<?php endif;  ?>

<?php if ( (trim( $st_h3_designsetting ) !== '' ) && ( $st_h3_designsetting === 'linedesign' ) ): //囲み&ラインデザイン ?>

	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
		position: relative;
		padding: 1em 1em 1em 1.4em;
		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>

		border: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3border_color; ?>;
        <?php if ( $st_h3_color ): ?>
			color: <?php echo $st_h3_color; ?>;
		<?php endif; ?>
                <?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_h3_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome36+ */
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
		.h3modoki,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
			background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
			<?php if ( $st_h3_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>
	.h3modoki::after,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
                position: absolute;
                top: .5em;
                left: .5em;
                content: '';
				width: <?php print $st_h3_border_size ? $st_h3_border_size : 5; ?>px;
                height: -webkit-calc(100% - 1em);
                height: calc(100% - 1em);
				<?php if($st_h3border_undercolor): //ボーダーカラー ?>
                	background-color: <?php echo $st_h3border_undercolor; ?>;
				<?php else: ?>
                	background-color: <?php echo $st_h3border_color; ?>;
				<?php endif;  ?>
	}

<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'stripe_design') ): //ストライプ ?>
	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
		<?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
			background: -webkit-repeating-linear-gradient(-45deg, <?php echo $st_h3_bgcolor; ?>, <?php echo $st_h3_bgcolor; ?> 5px, <?php echo $st_h3_bgcolor_t; ?> 5px, <?php echo $st_h3_bgcolor_t; ?> 10px);
			background: repeating-linear-gradient(-45deg, <?php echo $st_h3_bgcolor; ?>, <?php echo $st_h3_bgcolor; ?> 5px, <?php echo $st_h3_bgcolor_t; ?> 5px, <?php echo $st_h3_bgcolor_t; ?> 10px);
		<?php elseif ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
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

		<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
	}

	.h3modoki::before,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
		  .h3modoki::after,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
		content: none;
	}

<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'gradient_underlinedesign') ): //グラデーションアンダーライン ?>

	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
		position: relative;
		padding-left:0;
		padding-bottom: 10px;
		border-top:none;
		<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		<?php if ( $st_h3_color ): ?>
			color: <?php echo $st_h3_color; ?>;
		<?php endif; ?>
		background-color:transparent;
	}

	.h3modoki::after,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
		position: absolute;
		bottom: -<?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
		left: 0;
		top: inherit;
		z-index: 2;
		content: '';
		width: 100%;
		height: <?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
		<?php if ( ( trim( $st_h3border_color ) !== '' ) && ( trim( $st_h3border_undercolor ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_h3border_color; ?>;
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(left,  <?php echo $st_h3border_undercolor; ?> 0%,<?php echo $st_h3border_color; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: linear-gradient(to left,  <?php echo $st_h3border_undercolor; ?> 0%,<?php echo $st_h3border_color; ?> 100%);
		<?php elseif ( ( trim( $st_h3border_color ) !== '' ) && ( trim( $st_h3border_undercolor ) === '' ) ): //下部には色がある場合 ?>
			background-color: <?php echo $st_h3border_color; ?>;
		<?php endif; ?>
	}

	<?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
		.h3modoki,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
			background-image: url("<?php echo $st_h3_bgimg; ?>");
			background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
			<?php if ( $st_h3_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'underlinedesign') ): ?>

	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
		position: relative;
		padding-left:0;
		padding-bottom: 10px;
		border-top:none;
		border-bottom-width:<?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
		border-bottom-style: solid;
		<?php if($st_h3border_undercolor): //下線基本ボーダー色 ?>
			border-bottom-color: <?php echo $st_h3border_undercolor; ?>!important;
		<?php else: ?>
			border-bottom-color: transparent;
		<?php endif;  ?>
		<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		<?php if ( $st_h3_color ): ?>
			color: <?php echo $st_h3_color; ?>;
		<?php endif; ?>
		background-color:transparent;
	}

	.h3modoki::after,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
		position: absolute;
		bottom: -<?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
		left: 0;
		top: inherit;
		border-top: none;
		z-index: 3;
		content: '';
		width: 5em;
		height: <?php print $st_h3_border_size ? $st_h3_border_size : 3; ?>px;
		<?php if($st_h3border_color): //ボーダーカラー ?>
                	background-color: <?php echo $st_h3border_color; ?>;
		<?php endif;  ?>
	}

	<?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
		.h3modoki,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
			background-image: url("<?php echo $st_h3_bgimg; ?>");
			background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
			<?php if ( $st_h3_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'centerlinedesign') ): ?>

	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
		overflow: hidden;
		text-align: center;
		border-top:none;
		border-bottom:none;
		padding-left: 20px!important;
		padding-right: 20px!important;

		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
        <?php if ( $st_h3_color ): ?>
			color: <?php echo $st_h3_color; ?>;
		<?php endif; ?>
                background-color:transparent;
	}

	.h3modoki span,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) span {
		position: relative;
  		display: inline-block;
		margin: 0 10px;
		padding: 0 20px;
		text-align: center;
		word-break: break-all;
	}
	@media only screen and (max-width: 599px) {
		.h3modoki span,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) span {
			padding: 0 10px;
		}
	}

	.h3modoki span.st-dash-design::before,
	.h3modoki span.st-dash-design::after,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) span.st-dash-design::before,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) span.st-dash-design::after {
		position: absolute;
		top: 50%;
		content: '';
		width: 1000%;
		height: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px;
		background-color: <?php echo $st_h3border_color; ?>;
	}

	.h3modoki span.st-dash-design::before,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) span.st-dash-design::before {
		right: 100%;
	}
	.h3modoki span.st-dash-design::after,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) span.st-dash-design::after {
		left: 100%;
	}

	/* hタグ用 キャッチコピー */
	.post .st-dash-design,
	.st-dash-design .st-h-copy-toc,
	.st-dash-design .st-h-copy {
		text-align: center;
	}

<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'shortlinedesign') ): // ショートライン ?>

	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
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
		.h3modoki::before,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
			position: absolute;
			content: '';
			width: 3em;
			height: <?php print $st_h3_border_size ? $st_h3_border_size : 2; ?>px;
			background-color: <?php echo $st_h3border_color; ?>;
			left: 0;
			bottom: 0;
		}
	<?php endif; ?>

	<?php if ( $st_h3border_undercolor && $st_h3border_color ): // ボーダー色（サブ）あり ?>
		.h3modoki::before,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
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
			left: 0;
			bottom: 0;
		}
	<?php endif; ?>

	<?php if ( $st_h3_text_center ): // テキストを中央寄せ ?>
		.h3modoki,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
			text-align: center;
		}

		.h3modoki::before,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
		.h3modoki::after,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
			left: calc(50% - 1.5em);
		}
	<?php endif; ?>


<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'dotdesign') ): ?>

	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
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
		<?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_h3_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

			/* IE10+, FF16+, Chrome36+ */
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
		.h3modoki,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
			background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
			<?php if ( $st_h3_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

	.h3modoki span.st-dash-design,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome) span.st-dash-design {
		display: block;
        <?php if ( $st_h3_bgimg_tupadding ): ?>
			padding: <?php echo $st_h3_bgimg_tupadding; ?>px;
		<?php else: ?>
			padding: 10px;
		<?php endif; ?>
		<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
		<?php if($st_h3border_undercolor): //ドットカラー ?>
			border: 1px dashed <?php echo $st_h3border_undercolor; ?>;
		<?php else: ?>
			border: 1px dashed <?php echo $st_h3border_color; ?>;
		<?php endif;  ?>
	}

	.h3modoki::before,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
		  .h3modoki::after,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
		content: none;
	}

<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'leftlinedesign') ): //左ラインのみ ?>

		.h3modoki::before,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
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

		.h3modoki,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
			position: relative;
			padding-left:20px;
			border: none;
			<?php if ( $st_h3_color ): ?>
				color: <?php echo $st_h3_color; ?>;
			<?php endif; ?>
			<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
				padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
			<?php endif;  ?>

			<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
				padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
				padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			<?php endif;  ?>


			<?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
				/*Other Browser*/
				background: <?php echo $st_h3_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome36+ */
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
			<?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
				background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
				<?php if ( $st_h3_bgimg_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			<?php endif;  ?>
		}

	<?php elseif (
		( $st_is_ex_af ) // テーマ分岐
		&& ( trim( $st_h3_designsetting ) !== '' )
		&& ( $st_h3_designsetting === 'checkboxdesign' ) // チェックボックスデザイン
	): ?>

		<?php if ( $st_webicon_checkbox_simple ): // チェックボックスのデザインをチェックのみにする ?>

			.h3modoki,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title){
				position: relative;
				display: block;
				line-height: 1.5;
				margin-bottom: 20px;
				padding-bottom: 0.5em;
				padding-left: calc(1.5em + 25px)!important;
				<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
					padding-left: calc(1.5em + 25px + <?php echo $st_h3_bgimg_leftpadding; ?>px)!important;
				<?php endif;  ?>
				<?php if ( $st_h3_color ): ?>
					color: <?php echo $st_h3_color; ?>;
				<?php endif; ?>

				<?php if( $st_h3_border_size ): //ボーダー下をテキストカラーにする ?>
					<?php if( $st_h3_color ): //テキストカラー ?>
						border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 1; ?>px solid <?php echo $st_h3_color; ?>;
					<?php else: ?>
						border-bottom: none;
					<?php endif;  ?>
				<?php else: ?>
					border-bottom: none;
				<?php endif;  ?>
				border-top:none;
				<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
					/*Other Browser*/
					background: <?php echo $st_h3_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
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

				<?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
					background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
					<?php if ( $st_h3_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.h3modoki::before,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
				position: absolute;
				top: calc(50% - .75em)!important;
				left: 15px;
				content: "\f00c";
				font-family: stsvg;
				<?php if ( $st_h3border_color && $st_h3border_undercolor ): //ボーダー色 + ボーダー色（サブ）があるかどうか ?>
					background: linear-gradient( to right,  <?php echo $st_h3border_color; ?> 25%, <?php echo $st_h3border_undercolor; ?> 75% );
					-webkit-background-clip: text;
					color: transparent!important;
				<?php elseif ( $st_h3border_color ): //ボーダー（サブ）があるかどうか ?>
					color: <?php echo $st_h3border_color; ?>;
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

			.h3modoki::after,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
				content: none;
			}

		<?php else: ?>

			.h3modoki,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title){
				position: relative;
				display: block;
				line-height: 1.5;
				margin-bottom: 20px;
				padding-bottom: 0.5em;
				padding-left: calc(1.5em + 25px)!important;
				<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
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
				border-top:none;
				<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

				<?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
					/*Other Browser*/
					background: <?php echo $st_h3_bgcolor; ?>;
					/* Android4.1 - 4.3 */
					background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

					/* IE10+, FF16+, Chrome36+ */
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

				<?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
					background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
					<?php if ( $st_h3_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				<?php endif;  ?>
			}

			.h3modoki::before,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
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

			.h3modoki::after,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
				content: "\e904";
				font-family: stsvg;
				position: absolute;
				z-index: 1;
				left: 10px;
				top: calc(50% - .75em);
				font-size: 150%;
				line-height: 1.5;
				<?php if ( $st_h3border_color ): //ボーダーがあるかどうか ?>
					color: <?php echo $st_h3border_color; ?>;
				<?php else: ?>
					color: #ccc;
				<?php endif; ?>
			}

		<?php endif; ?>

<?php elseif ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'underdotdesign') ): // 破線アンダーラインに変更 ?>

	.h3modoki,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
		border: none;
		border-bottom: <?php print $st_h3_border_size ? $st_h3_border_size : 2; ?>px dashed <?php echo $st_h3border_color; ?>;
		<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
		<?php else: ?>
			padding-left:0;
		<?php endif;  ?>
		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
        <?php if ( $st_h3_color ): ?>
			color: <?php echo $st_h3_color; ?>;
		<?php endif; ?>
			<?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
				/*Other Browser*/
				background: <?php echo $st_h3_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome36+ */
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
                .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
                    background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
                    <?php if ( $st_h3_bgimg_repeat ): ?>
                        background-repeat: no-repeat;
                    <?php endif; ?>
                }
            <?php endif;  ?>

	.h3modoki::before,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
		  .h3modoki::after,
	.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
		content: none;
	}

<?php else: ?>

	<?php if ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'hukidasidesign') ): //吹き出しデザイン ?>
			.h3modoki,
            .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
                background: <?php echo $st_h3_bgcolor; ?>;
                color: <?php echo $st_h3_color; ?>;
                position: relative;
                border: none;
                margin-bottom:30px;
		<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
            }
        	.h3modoki::after,
            .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
                border-top: 10px solid <?php echo $st_h3_bgcolor; ?>;
                content: '';
                position: absolute;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                bottom: -10px;
                left: 30px;
                border-radius: 2px;
            }
        	.h3modoki::before,
            .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
                border-top: 10px solid <?php echo $st_h3_bgcolor; ?>;
                content: '';
                position: absolute;
                border-right: 10px solid transparent;
                border-left: 10px solid transparent;
                bottom: -10px;
                left: 30px;
            }

       		<?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
			.h3modoki,
            .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
                background-image: url("<?php echo $st_h3_bgimg; ?>");
                background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
                <?php if ( $st_h3_bgimg_repeat ): ?>
                    background-repeat: no-repeat;
                <?php endif; ?>
            }
       		<?php endif;  ?>

		<?php elseif (
			( $st_is_ex ) // テーマ分岐
			&& ( trim( $st_h3_designsetting ) !== '' )
			&& ( $st_h3_designsetting === 'hukidasidesign_under' ) //吹き出し下線デザイン
		): ?>

			.h3modoki,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {

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

				<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
				<?php endif;  ?>

				<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
					padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
				<?php endif;  ?>

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
				.h3modoki,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
					background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
					<?php if ( $st_h3_bgimg_repeat ): ?>
						background-repeat: no-repeat;
					<?php endif; ?>
				}
       		<?php endif;  ?>

			.h3modoki::before,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
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

		   .h3modoki::after,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
				position: absolute;
				width: 0;
				height: 0;
				border: solid transparent;
				content: "";
				border-top-width: 11px;
				border-right-width: 11px;
				border-bottom-width: 11px;
				border-left-width: 11px;
			}

			.h3modoki::before,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
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

			.h3modoki::after,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
				left: 53px;
				bottom: -21px;
				<?php if ( $st_h3_bgcolor ): ?>
					border-top-color: <?php echo $st_h3_bgcolor; ?>;
					border-left-color: <?php echo $st_h3_bgcolor; ?>;
				<?php else: ?>
					border-top-color: #fff;
					border-left-color: #fff;
				<?php endif; ?>
			}

	<?php else: //吹き出しじゃないデザイン ?>

		.h3modoki,
		.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
        <?php if ( $st_h3_color ): ?>
			color: <?php echo $st_h3_color; ?>;
		<?php endif; ?>

                <?php if ( ( trim( $st_h3_bgcolor ) !== '' ) && ( trim( $st_h3_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_h3_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_h3_bgimg; ?>"), -webkit-linear-gradient(<?php echo $h3_gradient_w; ?>,  <?php echo $st_h3_bgcolor_t; ?> 0%,<?php echo $st_h3_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome36+ */
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

		<?php if( $st_h3_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_h3_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_h3_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_h3_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
            }

            <?php if( $st_h3_bgimg ): //背景画像がある場合 ?>
				.h3modoki,
                .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
                    background-position: <?php echo $st_h3_bgimg_side; ?> <?php echo $st_h3_bgimg_top; ?>;
                    <?php if ( $st_h3_bgimg_repeat ): ?>
                        background-repeat: no-repeat;
                    <?php endif; ?>
                }
            <?php endif;  ?>

			.h3modoki::before,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
		    .h3modoki::after,
			.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
				content: none;
			}

			<?php if ( (trim( $st_h3_designsetting) !== '') && ($st_h3_designsetting === 'countdesign') ): //カウント ?>
				.h3modoki,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
					counter-increment: counter-h3;
					counter-reset: counter-h4;
				}
				.h3modoki::before,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
					<?php if ( (trim( $st_h2_designsetting) !== '') && ($st_h2_designsetting === 'countdesign') ): //h2 カウント ?>
						content: counter(counter-h2)"-"counter(counter-h3)".";
					<?php else: ?>
						content: counter(counter-h3)".";
					<?php endif; ?>
					margin-right: 0.6em;
					<?php if ( $st_h3border_undercolor ): ?>
						color: <?php echo $st_h3border_undercolor; ?>;
					<?php endif; ?>
				}
			<?php endif; ?>

        <?php endif; ?>

<?php endif; ?>

<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

/*h4*/
<?php if($st_h4_no_css): //カスタマイザーのCSSを無効化
else: ?>

	<?php if($st_h4_bg_radius): //h4 ?>
		/* 角丸 */
		.h4modoki,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point){
			border-radius:5px;
		}
	<?php endif;  ?>

	<?php if ( ( trim( $st_h4hukidasi_design ) !== '') && ( $st_h4hukidasi_design === 'hukidasidesign' ) ): //吹き出しデザイン ?>
		.h4modoki,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point){
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

		.h4modoki::after,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point)::after {
			border-top: 10px solid <?php echo $st_h4bgcolor; ?>;
			content: '';
			position: absolute;
			border-right: 10px solid transparent;
			border-left: 10px solid transparent;
			bottom: -10px;
			left: 30px;
			border-radius: 2px;
		}

		.h4modoki::before,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point)::before {
			border-top: 10px solid <?php echo $st_h4bgcolor; ?>;
			content: '';
			position: absolute;
			border-right: 10px solid transparent;
			border-left: 10px solid transparent;
			bottom: -10px;
			left: 30px;
		}
	<?php elseif ( ( trim( $st_h4hukidasi_design ) !== '') && ( $st_h4hukidasi_design === 'dogears' ) ): //耳折れデザイン ?>

		.h4modoki,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point){
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

		.h4modoki::before,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point)::before{
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

		.h4modoki::after,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point)::after{
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

		.h4modoki,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point){
			<?php if ( ( trim( $st_h4bgcolor ) !== '' ) ): ?>
				background: -webkit-repeating-linear-gradient(-45deg, <?php echo $st_h4bgcolor; ?>, <?php echo $st_h4bgcolor; ?> 3px, <?php echo $st_h4bordercolor; ?> 3px, <?php echo $st_h4bordercolor; ?> 10px);
				background: repeating-linear-gradient(-45deg, <?php echo $st_h4bgcolor; ?>, <?php echo $st_h4bgcolor; ?> 3px, <?php echo $st_h4bordercolor; ?> 3px, <?php echo $st_h4bordercolor; ?> 6px);
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

		.h4modoki,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point) {
			<?php if($st_h4_design && $st_h4bordercolor): // 左のボーダー ?>
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
			.h4modoki,
			.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point) {
				border: none;
				position: relative;
				max-width: 100%;
				box-sizing: border-box;
				padding-left: <?php echo $st_h4_bgimg_leftpadding; ?>px;
				margin-right: -<?php echo $st_h4_bgimg_leftpadding; ?>px;
			}
			.h4modoki::before,
			.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.point)::before {
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

	<?php if ( $st_h4bgcolor && $st_h4_husen_shadow ): //背景色がある場合 ?>

		/*h4付箋*/
		.h4modoki,
		.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point){
			position: relative;
			z-index:1;
		}
		.st-h4husen-shadow
		{
			position: relative;
		}
		.st-h4husen-shadow::after
		{
			z-index: 0;
			position: absolute;
			content: "";
			bottom:19px;
			right: 8px;
			left: auto;
			width: 50%;
			height:5px;
			max-width:100%;
			background: #777;
			-webkit-box-shadow: 0 15px 10px #777;
			-moz-box-shadow: 0 15px 10px #777;
			box-shadow: 0 15px 10px #777;
			-webkit-transform: rotate(2deg);
			-moz-transform: rotate(2deg);
			-o-transform: rotate(2deg);
			-ms-transform: rotate(2deg);
			transform: rotate(2deg);
		}

	<?php endif; ?>

<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

/* h5 */

<?php if($st_h5_no_css): //カスタマイザーのCSSを無効化
else: ?>

	<?php if($st_h5_bg_radius): //h5 ?>
		/* 角丸 */
		.h5modoki,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
			border-radius:5px;
		}
	<?php endif;  ?>

	<?php if ( ( trim( $st_h5hukidasi_design ) !== '') && ( $st_h5hukidasi_design === 'hukidasidesign' ) ): //吹き出しデザイン ?>
		.h5modoki,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title){
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

		.h5modoki::after,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::after {
			border-top: 10px solid <?php echo $st_h5bgcolor; ?>;
			content: '';
			position: absolute;
			border-right: 10px solid transparent;
			border-left: 10px solid transparent;
			bottom: -10px;
			left: 30px;
			border-radius: 2px;
		}

		.h5modoki::before,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::before {
			border-top: 10px solid <?php echo $st_h5bgcolor; ?>;
			content: '';
			position: absolute;
			border-right: 10px solid transparent;
			border-left: 10px solid transparent;
			bottom: -10px;
			left: 30px;
		}
	<?php elseif ( ( trim( $st_h5hukidasi_design ) !== '') && ( $st_h5hukidasi_design === 'dogears' ) ): //耳折れデザイン ?>
		.h5modoki,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
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

		.h5modoki::before,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::before {
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

		.h5modoki::after,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::after {
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

		.h5modoki,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.point):not(.st-cardbox-t):not(.popular-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
			<?php if ( ( trim( $st_h5bgcolor ) !== '' ) ): ?>
				background: -webkit-repeating-linear-gradient(-45deg, <?php echo $st_h5bgcolor; ?>, <?php echo $st_h5bgcolor; ?> 3px, <?php echo $st_h5bordercolor; ?> 3px, <?php echo $st_h5bordercolor; ?> 10px);
				background: repeating-linear-gradient(-45deg, <?php echo $st_h5bgcolor; ?>, <?php echo $st_h5bgcolor; ?> 3px, <?php echo $st_h5bordercolor; ?> 3px, <?php echo $st_h5bordercolor; ?> 6px);
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

		.h5modoki,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.point):not(.st-cardbox-t):not(.popular-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
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
			.h5modoki,
			.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
				border: none;
				position: relative;
				max-width: 100%;
				box-sizing: border-box;
				padding-left: <?php echo $st_h5_bgimg_leftpadding; ?>px;
				margin-right: -<?php echo $st_h5_bgimg_leftpadding; ?>px;
			}
			.h5modoki::before,
			.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.post-card-title):not(#reply-title):not(.st-cardbox-t):not(.kanren-t):not(.popular-t):not(.post-card-title)::before {
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

	<?php if ( $st_h5bgcolor && $st_h5_husen_shadow ): //背景色がある場合 ?>

		/*h5付箋*/
		.h5modoki,
		.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.point):not(.st-cardbox-t):not(.popular-t):not(.kanren-t):not(.popular-t):not(.post-card-title) {
			position: relative;
			z-index:1;
		}
		.st-h5husen-shadow
		{
			position: relative;
		}
		.st-h5husen-shadow::after
		{
			z-index: 0;
			position: absolute;
			content: "";
			bottom:19px;
			right: 8px;
			left: auto;
			width: 50%;
			height:5px;
			max-width:100%;
			background: #777;
			-webkit-box-shadow: 0 15px 10px #777;
			-moz-box-shadow: 0 15px 10px #777;
			box-shadow: 0 15px 10px #777;
			-webkit-transform: rotate(2deg);
			-moz-transform: rotate(2deg);
			-o-transform: rotate(2deg);
			-ms-transform: rotate(2deg);
			transform: rotate(2deg);
		}

	<?php endif; ?>

<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

<?php if($st_h4_matome_no_css): //カスタマイザーのCSSを無効化
else: ?>

	<?php if($st_h4_matome_bg_radius): //まとめタグ ?>
		/* 角丸 */
		.post .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point){
			border-radius:5px;
		}
	<?php endif;  ?>

	<?php if( $st_h4_matome_hukidasi_design ): //ふきだしに変更 ?>
		.post .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point){
			background: <?php echo $st_h4_matome_bgcolor; ?>;
			<?php if ( $st_h4_matome_textcolor ): ?>
				color: <?php echo $st_h4_matome_textcolor; ?>;
			<?php endif; ?>
			position: relative;
			border: none;
			margin-bottom:30px;
			<?php if( $st_h4_matome_bgimg_leftpadding || $st_h4_matome_bgimg_leftpadding == 0 ): //左の余白 ?>
				padding-left:<?php echo $st_h4_matome_bgimg_leftpadding; ?>px!important;
			<?php endif;  ?>

			<?php if($st_h4_matome_bgimg_tupadding): //上下の余白 ?>
				padding-top:<?php echo $st_h4_matome_bgimg_tupadding; ?>px!important;
				padding-bottom:<?php echo $st_h4_matome_bgimg_tupadding; ?>px!important;
			<?php endif;  ?>

			<?php if( $st_h4_matome_bgimg ): //背景画像がある場合 ?>
				background-image: url("<?php echo $st_h4_matome_bgimg; ?>")!important;
				background-position: <?php echo $st_h4_matome_bgimg_side; ?> <?php echo $st_h4_matome_bgimg_top; ?>!important;
				<?php if ( $st_h4_matome_bgimg_repeat ): ?>
					background-repeat: no-repeat!important;
				<?php endif; ?>
			<?php endif;  ?>
		}

		.post .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point)::after {
			border-top: 10px solid <?php echo $st_h4_matome_bgcolor; ?>;
			content: '';
			position: absolute;
			border-right: 10px solid transparent;
			border-left: 10px solid transparent;
			bottom: -10px;
			left: 30px;
			border-radius: 2px;
		}

		.post .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(.post-card-title):not(#reply-title):not(.point)::before {
			border-top: 10px solid <?php echo $st_h4_matome_bgcolor; ?>;
			content: '';
			position: absolute;
			border-right: 10px solid transparent;
			border-left: 10px solid transparent;
			bottom: -10px;
			left: 30px;
		}
	<?php else: ?>

		.post .st-matome:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4):not(.point) {
			<?php if($st_h4_matome_bordercolor): ?>
				border-left: 5px solid <?php echo $st_h4_matome_bordercolor; ?>;
		   <?php endif; ?>
			<?php if($st_h4_matome_textcolor): ?>
				color: <?php echo $st_h4_matome_textcolor; ?>;
			<?php endif; ?>
			<?php if ( $st_h4_matome_bgcolor ): ?>
				background-color: <?php echo $st_h4_matome_bgcolor; ?>!important;
			<?php else: ?>
				background-color: transparent;
			<?php endif; ?>

			<?php if($st_h4_matome_top_border): //上のボーダー ?>
				border-top : solid 1px <?php echo $st_h4_matome_bordercolor; ?>;
			<?php endif;  ?>

			<?php if($st_h4_matome_bottom_border): //下のボーダー ?>
				border-bottom : solid 1px <?php echo $st_h4_matome_bordercolor; ?>;
			<?php endif;  ?>

			<?php if( $st_h4_matome_bgimg_leftpadding || $st_h4_matome_bgimg_leftpadding == 0 ): //左の余白 ?>
				padding-left:<?php echo $st_h4_matome_bgimg_leftpadding; ?>px!important;
			<?php endif;  ?>

			<?php if($st_h4_matome_bgimg_tupadding): //上下の余白 ?>
				padding-top:<?php echo $st_h4_matome_bgimg_tupadding; ?>px!important;
				padding-bottom:<?php echo $st_h4_matome_bgimg_tupadding; ?>px!important;
			<?php endif;  ?>

			<?php if( $st_h4_matome_bgimg ): //背景画像がある場合 ?>
				background-image: url("<?php echo $st_h4_matome_bgimg; ?>")!important;
				background-position: <?php echo $st_h4_matome_bgimg_side; ?> <?php echo $st_h4_matome_bgimg_top; ?>!important;
				<?php if ( $st_h4_matome_bgimg_repeat ): ?>
					background-repeat: no-repeat!important;
				<?php endif; ?>
			<?php endif;  ?>
		}
	<?php endif; ?>

<?php endif; //カスタマイザーのCSSを無効化ここまで ?>

/* ウィジェットタイトル */
.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
#side .menu_underh2,
#side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
	font-weight:bold;
	margin-bottom: 10px;
}

<?php if($st_widgets_title_bg_radius): //widgets_title ?>
	/* 角丸 */
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	#side .menu_underh2,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		border-radius:5px;
	}
<?php endif;  ?>

<?php if ( (trim( $st_widgets_title_designsetting) !== '') && ($st_widgets_title_designsetting === 'linedesign') ): //囲み&左ラインデザイン ?>
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	#side .menu_underh2,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		<?php if($st_widgets_title_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
			padding-bottom:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
		<?php endif;  ?>

		padding-left:20px;

		border: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 1; ?>px solid <?php echo $st_widgets_titleborder_color; ?>;
                color: <?php echo $st_widgets_title_color; ?>;
                <?php if ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_widgets_title_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_widgets_title_bgimg; ?>"), -webkit-linear-gradient(top,  <?php echo $st_widgets_title_bgcolor_t; ?> 0%,<?php echo $st_widgets_title_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome36+ */
                    background: url("<?php echo $st_widgets_title_bgimg; ?>"), linear-gradient(to bottom,  <?php echo $st_widgets_title_bgcolor_t; ?> 0%,<?php echo $st_widgets_title_bgcolor; ?> 100%);
                <?php elseif ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
                    background-image: url("<?php echo $st_widgets_title_bgimg; ?>");
                    background-color: <?php echo $st_widgets_title_bgcolor; ?>;
                <?php else: ?>
                    background-color: transparent;
                    <?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
                        background: url("<?php echo $st_widgets_title_bgimg; ?>");
                    <?php else: ?>
                        background: none;
                    <?php endif; ?>
                <?php endif; ?>
	}

	<?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
		.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		#side .menu_underh2,
        #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-position: <?php echo $st_widgets_title_bgimg_side; ?> <?php echo $st_widgets_title_bgimg_top; ?>;
			<?php if ( $st_widgets_title_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
	#side .menu_underh2::after,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
                position: absolute;
                top: .5em;
                left: .5em;
                content: '';
                width: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 5; ?>px;
                height: -webkit-calc(100% - 1em);
                height: calc(100% - 1em);
				<?php if($st_widgets_titleborder_undercolor): //ボーダーカラー ?>
                	background-color: <?php echo $st_widgets_titleborder_undercolor; ?>;
				<?php else: ?>
                	background-color: <?php echo $st_widgets_titleborder_color; ?>;
				<?php endif;  ?>
	}

<?php elseif ( (trim( $st_widgets_title_designsetting) !== '') && ($st_widgets_title_designsetting === 'underlinedesign') ): //2色アンダーラインデザイン ?>
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	#side .menu_underh2,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		border-top:none;
		<?php if( $st_widgets_titleborder_undercolor ): ?>
			border-bottom: solid <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 2; ?>px <?php echo $st_widgets_titleborder_undercolor; ?>;
		<?php else: ?>
			border-bottom-color: transparent;
		<?php endif;  ?>
		<?php if( $st_widgets_title_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_widgets_title_bgimg_leftpadding; ?>px;
		<?php endif;  ?>

		<?php if($st_widgets_title_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
			padding-bottom:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
		<?php endif;  ?>
                color: <?php echo $st_widgets_title_color; ?>;
                background-color:transparent;
	}
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
	#side .menu_underh2::after,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
		position: absolute;
		bottom: -<?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 2; ?>px;
		left: 0;
		z-index: 3;
		content: '';
		width: 5em;
		height: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 2; ?>px;
		<?php if($st_widgets_titleborder_color): //ボーダーカラー ?>
                	background-color: <?php echo $st_widgets_titleborder_color; ?>;
		<?php endif;  ?>
	}

	<?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
		.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		#side .menu_underh2,
        #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-image: url("<?php echo $st_widgets_title_bgimg; ?>");
			background-position: <?php echo $st_widgets_title_bgimg_side; ?> <?php echo $st_widgets_title_bgimg_top; ?>;
			<?php if ( $st_widgets_title_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php elseif ( (trim( $st_widgets_title_designsetting) !== '') && ($st_widgets_title_designsetting === 'gradient_underlinedesign') ): //グラデーションアンダーライン ?>
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	#side .menu_underh2,
     #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)  {
		position: relative;
		padding-left:0;
		padding-bottom: 10px;
		border-top:none;
		<?php if( $st_widgets_title_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_widgets_title_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_widgets_title_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_widgets_title_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_widgets_title_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
                color: <?php echo $st_widgets_title_color; ?>;
                background-color:transparent;
	}

	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
	#side .menu_underh2::after,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) ::after {
		position: absolute;
		bottom: -2px;
		left: 0;
		z-index: 2;
		content: '';
		width: 100%;
		height: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 2; ?>px;
		<?php if ( ( trim( $st_widgets_titleborder_color ) !== '' ) && ( trim( $st_widgets_titleborder_undercolor ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_widgets_titleborder_color; ?>;
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(left,  <?php echo $st_widgets_titleborder_undercolor; ?> 0%,<?php echo $st_widgets_titleborder_color; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: linear-gradient(to left,  <?php echo $st_widgets_titleborder_undercolor; ?> 0%,<?php echo $st_widgets_titleborder_color; ?> 100%);
		<?php elseif ( ( trim( $st_widgets_titleborder_color ) !== '' ) && ( trim( $st_widgets_titleborder_undercolor ) === '' ) ): //下部には色がある場合 ?>
			background-color: <?php echo $st_widgets_titleborder_color; ?>;
		<?php endif; ?>
	}

	<?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
		.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		#side .menu_underh2,
        #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)  {
			background-image: url("<?php echo $st_widgets_title_bgimg; ?>");
			background-position: <?php echo $st_widgets_title_bgimg_side; ?> <?php echo $st_widgets_title_bgimg_top; ?>;
			<?php if ( $st_widgets_title_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php elseif ( (trim( $st_widgets_title_designsetting) !== '') && ($st_widgets_title_designsetting === 'dotdesign') ): //囲みドットデザイン ?>
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	#side .menu_underh2,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		position: relative;
		padding: 5px;
		border: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 1; ?>px solid <?php echo $st_widgets_titleborder_color; ?>;
                color: <?php echo $st_widgets_title_color; ?>;
                <?php if ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_widgets_title_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_widgets_title_bgimg; ?>"), -webkit-linear-gradient(top,  <?php echo $st_widgets_title_bgcolor_t; ?> 0%,<?php echo $st_widgets_title_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome36+ */
                    background: url("<?php echo $st_widgets_title_bgimg; ?>"), linear-gradient(to bottom,  <?php echo $st_widgets_title_bgcolor_t; ?> 0%,<?php echo $st_widgets_title_bgcolor; ?> 100%);
                <?php elseif ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
                    background-image: url("<?php echo $st_widgets_title_bgimg; ?>");
                    background-color: <?php echo $st_widgets_title_bgcolor; ?>;
                <?php else: ?>
                    background-color: transparent;
                    <?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
                        background: url("<?php echo $st_widgets_title_bgimg; ?>");
                    <?php else: ?>
                        background: none;
                    <?php endif; ?>
                <?php endif; ?>
	}

	<?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
		.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		#side .menu_underh2,
        #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-position: <?php echo $st_widgets_title_bgimg_side; ?> <?php echo $st_widgets_title_bgimg_top; ?>;
			<?php if ( $st_widgets_title_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif;  ?>
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span,
	#side .menu_underh2 span,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span {
		display: block;
		<?php if( $st_widgets_title_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_widgets_title_bgimg_leftpadding; ?>px;
		<?php endif;  ?>

		<?php if($st_widgets_title_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
			padding-bottom:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
		<?php endif;  ?>
		<?php if($st_widgets_titleborder_undercolor): //ドットカラー ?>
			border: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 1; ?>px dashed <?php echo $st_widgets_titleborder_undercolor; ?>;
		<?php else: ?>
			border: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 1; ?>px dashed <?php echo $st_widgets_titleborder_color; ?>;
		<?php endif;  ?>
	}

<?php elseif ( (trim( $st_widgets_title_designsetting) !== '') && ($st_widgets_title_designsetting === 'stripe_design') ): //ストライプ ?>
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	#side .menu_underh2,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		<?php if ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) !== '' ) ): ?>
			background: -webkit-repeating-linear-gradient(-45deg, <?php echo $st_widgets_title_bgcolor; ?>, <?php echo $st_widgets_title_bgcolor; ?> 5px, <?php echo $st_widgets_title_bgcolor_t; ?> 5px, <?php echo $st_widgets_title_bgcolor_t; ?> 10px);
			background: repeating-linear-gradient(-45deg, <?php echo $st_widgets_title_bgcolor; ?>, <?php echo $st_widgets_title_bgcolor; ?> 5px, <?php echo $st_widgets_title_bgcolor_t; ?> 5px, <?php echo $st_widgets_title_bgcolor_t; ?> 10px);
		<?php elseif ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
			background-color: <?php echo $st_widgets_title_bgcolor; ?>;
		<?php else: ?>

		<?php endif; ?>

		color: <?php echo $st_widgets_title_color; ?>;

		<?php if( $st_widgets_titleborder_color ): //ボーダーカラー ?>
			border: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 1; ?>px solid <?php echo $st_widgets_titleborder_color; ?>;
		<?php else: ?>
			border: none;
		<?php endif;  ?>

		<?php if( $st_widgets_title_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_widgets_title_bgimg_leftpadding; ?>px!important;
		<?php endif;  ?>

		<?php if($st_widgets_title_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_widgets_title_bgimg_tupadding; ?>px!important;
			padding-bottom:<?php echo $st_widgets_title_bgimg_tupadding; ?>px!important;
		<?php endif;  ?>
	}

<?php elseif ( (trim( $st_widgets_title_designsetting) !== '') && ($st_widgets_title_designsetting === 'leftlinedesign') ): //左ライン ?>
	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	#side .menu_underh2,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
		border: none;
		position: relative;
		max-width: 100%;
		box-sizing: border-box;
		<?php if( $st_widgets_title_bgimg_leftpadding ): //左の余白 ?>
			padding-left:<?php echo $st_widgets_title_bgimg_leftpadding; ?>px;
			margin-right: -<?php echo $st_widgets_title_bgimg_leftpadding; ?>px;
		<?php endif;  ?>
		<?php if($st_widgets_title_bgimg_tupadding): //上下の余白 ?>
			padding-top:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
			padding-bottom:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
		<?php endif;  ?>
		color: <?php echo $st_widgets_title_color; ?>;
			<?php if ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) !== '' ) ): ?>
				/*Other Browser*/
				background: <?php echo $st_widgets_title_bgcolor; ?>;
				/* Android4.1 - 4.3 */
				background: url("<?php echo $st_widgets_title_bgimg; ?>"), -webkit-linear-gradient(top,  <?php echo $st_widgets_title_bgcolor_t; ?> 0%,<?php echo $st_widgets_title_bgcolor; ?> 100%);

				/* IE10+, FF16+, Chrome36+ */
				background: url("<?php echo $st_widgets_title_bgimg; ?>"), linear-gradient(to bottom,  <?php echo $st_widgets_title_bgcolor_t; ?> 0%,<?php echo $st_widgets_title_bgcolor; ?> 100%);
			<?php elseif ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_widgets_title_bgimg; ?>");
				background-color: <?php echo $st_widgets_title_bgcolor; ?>;
			<?php else: ?>
				background-color: transparent;
				<?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
					background: url("<?php echo $st_widgets_title_bgimg; ?>");
				<?php else: ?>
					background: none;
				<?php endif; ?>
			<?php endif; ?>
	}

	.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
	#side .menu_underh2::before,
    #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
		position: absolute;
		content: '';
		width: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 6; ?>px;
		height: 100%;
		<?php if ( $st_widgets_titleborder_color ): ?>
			background: <?php echo $st_widgets_titleborder_color; ?>;
		<?php endif; ?>
		bottom: 0;
		left:0;
		<?php if($st_widgets_title_bg_radius): //widgets_title ?>
			border-radius: 3px;
		<?php endif;  ?>
	}

	<?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
		#side .menu_underh2,
		#side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background-position: <?php echo $st_widgets_title_bgimg_side; ?> <?php echo $st_widgets_title_bgimg_top; ?>;
			<?php if ( $st_widgets_title_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
			}
	<?php endif;  ?>

<?php else: ?>

	<?php if ( (trim( $st_widgets_title_designsetting) !== '') && ($st_widgets_title_designsetting === 'hukidasidesign') ): //吹き出しデザイン ?>
		.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
		#side .menu_underh2,
        #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
			background: <?php echo $st_widgets_title_bgcolor; ?>;
			color: <?php echo $st_widgets_title_color; ?>;
			position: relative;
			border: none;
			margin-bottom:20px;
			text-align: center!important;
			padding-left:0px;

			<?php if($st_widgets_title_bgimg_tupadding): //上下の余白 ?>
				padding-top:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
				padding-bottom:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
			<?php endif;  ?>
		}
		.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
		#side .menu_underh2::before,
        #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
			content: "";
			position: absolute;
			top: 100%;
			left: 50%;
 			margin-left: -10px;
			border: 10px solid transparent;
			border-top: 10px solid <?php echo $st_widgets_title_bgcolor; ?>;
		}

		<?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
			.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
            #side .menu_underh2,
            #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                background-image: url("<?php echo $st_widgets_title_bgimg; ?>");
                background-position: <?php echo $st_widgets_title_bgimg_side; ?> <?php echo $st_widgets_title_bgimg_top; ?>;
                <?php if ( $st_widgets_title_bgimg_repeat ): ?>
                    background-repeat: no-repeat;
                <?php endif; ?>
            }
       	<?php endif;  ?>


	<?php else: //吹き出しじゃないデザイン ?>
			.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
            #side .menu_underh2,
            #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
				font-weight: bold;
				margin-bottom: 10px;
    			color: <?php echo $st_widgets_title_color; ?>;
                <?php if ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) !== '' ) ): ?>
                    /*Other Browser*/
                    background: <?php echo $st_widgets_title_bgcolor; ?>;
                    /* Android4.1 - 4.3 */
                    background: url("<?php echo $st_widgets_title_bgimg; ?>"), -webkit-linear-gradient(top,  <?php echo $st_widgets_title_bgcolor_t; ?> 0%,<?php echo $st_widgets_title_bgcolor; ?> 100%);

                    /* IE10+, FF16+, Chrome36+ */
                    background: url("<?php echo $st_widgets_title_bgimg; ?>"), linear-gradient(to bottom,  <?php echo $st_widgets_title_bgcolor_t; ?> 0%,<?php echo $st_widgets_title_bgcolor; ?> 100%);
                <?php elseif ( ( trim( $st_widgets_title_bgcolor ) !== '' ) && ( trim( $st_widgets_title_bgcolor_t ) === '' ) ): //下部には色がある場合 ?>
                    background-image: url("<?php echo $st_widgets_title_bgimg; ?>");
                    background-color: <?php echo $st_widgets_title_bgcolor; ?>;
                <?php else: ?>
                    background-color: transparent;
                    <?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
                        background: url("<?php echo $st_widgets_title_bgimg; ?>");
                    <?php else: ?>
                        background: none;
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ( $st_widgets_titleborder_color ): //ボーダーがあるかどうか ?>
                    border: <?php print $st_widgets_titleborder_size ? $st_widgets_titleborder_size : 1; ?>px solid <?php echo $st_widgets_titleborder_color; ?>;
                <?php endif; ?>


				<?php if( $st_widgets_title_bgimg_leftpadding ): //左の余白 ?>
					padding-left:<?php echo $st_widgets_title_bgimg_leftpadding; ?>px;
				<?php endif;  ?>

				<?php if($st_widgets_title_bgimg_tupadding): //上下の余白 ?>
					padding-top:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
					padding-bottom:<?php echo $st_widgets_title_bgimg_tupadding; ?>px;
				<?php endif;  ?>
            }

            <?php if( $st_widgets_title_bgimg ): //背景画像がある場合 ?>
				.post .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
                #side .menu_underh2,
                #side .st-widgets-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
                    background-position: <?php echo $st_widgets_title_bgimg_side; ?> <?php echo $st_widgets_title_bgimg_top; ?>;
                    <?php if ( $st_widgets_title_bgimg_repeat ): ?>
                        background-repeat: no-repeat;
                    <?php endif; ?>
                }
            <?php endif;  ?>

	<?php endif; ?>

<?php endif; ?>

.wp-block-tag-cloud a,
.tagcloud a {
	<?php if ($st_tagcloud_color): // タグクラウド ?>
		color: <?php echo $st_tagcloud_color; ?>;
	<?php endif; ?>

	<?php if ($st_tagcloud_bordercolor): // ボーダー ?>
		border-color: <?php echo $st_tagcloud_bordercolor; ?>;
	<?php else: ?>
		border: none;
	<?php endif; ?>

	<?php if ($st_tagcloud_bgcolor): // 背景色 ?>
		background-color: <?php echo $st_tagcloud_bgcolor; ?>;
	<?php endif; ?>
}

/* NEWENTRY及び関連記事テキスト */
<?php if( isset ( $st_separator_type ) && $st_separator_type === 'border' ): // ボ―ダー ?>
	.post h4.point,
	.n-entry-t {
		margin: 30px 0;
	}
	.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4) .point-in, /* 関連記事 */
	.n-entry {          /* NEWENTRY */
		margin: 30px 0;
		padding: 10px 0;
		font-size: 15px;
		font-weight: bold;

		<?php if( $menu_separator_bgcolor ): ?>
			background-color: <?php echo $menu_separator_bgcolor; ?>;
			padding: 10px 15px;
		<?php else: ?>
			background-color: transparent;
		<?php endif; ?>

		<?php if( $st_separator_bordercolor ): ?>
			border-bottom: solid 1px <?php echo $st_separator_bordercolor; ?>;
		<?php else: ?>

		<?php endif; ?>

		<?php if( $menu_separator_color ): ?>
			color: <?php echo $menu_separator_color; ?>;
		<?php else: ?>
			color: #000;
		<?php endif; ?>
	}
<?php elseif( isset ( $st_separator_type ) && $st_separator_type === 'round' ): // ラウンド ?>
	.post h4.point,
	.n-entry-t {
		margin: 30px 0;
	}

	.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4) .point-in, /* 関連記事 */
	.n-entry {          /* NEWENTRY */
		margin: 30px 0;
		padding: 10px 20px;
		border-radius: 30px;
		background-color: transparent;
		font-size: 15px;
		font-weight: bold;

		<?php if( $menu_separator_bgcolor ): ?>
			background-color: <?php echo $menu_separator_bgcolor; ?>;
		<?php else: ?>
			background-color: transparent;
		<?php endif; ?>

		<?php if( $st_separator_bordercolor ): ?>
			border: solid 4px <?php echo $st_separator_bordercolor; ?>;
		<?php else: ?>

		<?php endif; ?>

		<?php if( $menu_separator_color ): ?>
			color: <?php echo $menu_separator_color; ?>;
		<?php else: ?>
			color: #000;
		<?php endif; ?>
	}
<?php else: ?>
	.post h4.point,
	.n-entry-t {
		position: relative;
		background-color: transparent;
		margin-top: calc(2em + 30px);
		margin-bottom: 20px;
		line-height: 2em;
		<?php if( $st_separator_bordercolor ): ?>
			border-bottom: solid 1px <?php echo $st_separator_bordercolor; ?>;
		<?php elseif( $menu_separator_bgcolor ): ?>
			border-bottom: solid 1px <?php echo $menu_separator_bgcolor; ?>;
		<?php else: ?>
			border-bottom: solid 1px #f3f3f3;
		<?php endif; ?>
	}

	.post h4.point {
		margin-top: 61px;
	}

	.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.rankh4) .point-in,
	.n-entry {
		padding: 5px 15px;
		max-width:80%;
		box-sizing:border-box;
    	border-radius: 0 5px 0 0;
		font-size:15px;
		font-weight:bold;
		position:absolute;
		bottom:0;
		left:0;
		top:auto;
		<?php if( $menu_separator_bgcolor ): ?>
			background-color: <?php echo $menu_separator_bgcolor; ?>;
		<?php else: ?>
			background-color: #f3f3f3;
		<?php endif; ?>

		<?php if($menu_separator_color): ?>
			color: <?php echo $menu_separator_color; ?>;
		<?php else: ?>
			color:#000;
		<?php endif; ?>
	}
<?php endif; ?>

<?php if (($st_catbg_color) || ($st_cattext_color)): // カテゴリー ?>
	.catname {
		<?php if($st_catbg_color): ?>
			background: <?php echo $st_catbg_color; ?>;
		<?php endif; ?>
		<?php if($st_cattext_color): ?>
			color:<?php echo $st_cattext_color; ?>;
		<?php endif; ?>
	}
<?php endif; ?>

<?php if ( $st_ad_display_style === 'solid' ): // 広告（PR）スタイル ?>
	#display_ad_mark_title,
	:root .st-catid-ad {
		background-color: transparent;
		<?php if($st_ad_display_bg_color): ?>
			border: solid 1px <?php echo $st_ad_display_bg_color; ?>;
		<?php else: ?>
			border: solid 1px #ddd;
		<?php endif; ?>
		<?php if($st_ad_display_text_color): ?>
			color:<?php echo $st_ad_display_text_color; ?>;
		<?php else: ?>
			color: #999;
		<?php endif; ?>
	}
	:root .st-catid-ad {
		<?php if ($st_cattext_radius): // カテゴリー角を丸くする ?>
			padding: 5px 11px;
		<?php else: ?>
			padding: 5px 7px;
		<?php endif; ?>
	}
	#display_ad_mark_title.is-style-st-paragraph-pen::before {
		<?php if($st_ad_display_bg_color): ?>
			color:<?php echo $st_ad_display_bg_color; ?>;
			border-right-color: <?php echo $st_ad_display_bg_color; ?>;
		<?php else: ?>
			color: #ddd;
			border-right-color: #ddd;
		<?php endif; ?>
	}
<?php else: ?>
	#display_ad_mark_title,
	:root .st-catid-ad {
		<?php if($st_ad_display_bg_color): ?>
			background: <?php echo $st_ad_display_bg_color; ?>;
		<?php endif; ?>
		<?php if($st_ad_display_text_color): ?>
			color:<?php echo $st_ad_display_text_color; ?>;
		<?php endif; ?>
	}
	#display_ad_mark_title.is-style-st-paragraph-pen::before {
		<?php if($st_ad_display_text_color): ?>
			color:<?php echo $st_ad_display_text_color; ?>;
			border-right-color: <?php echo $st_ad_display_text_color; ?>;
		<?php endif; ?>
	}
<?php endif; ?>

<?php if ($st_cattext_radius): // カテゴリー角を丸くする ?>
	.st-catgroup.itiran-category .catname,
	.catname {
		padding: 5px 12px;
		border-radius: 100vh;
	}
@media print, screen and (max-width: 599px) {
	.st-catgroup.itiran-category .catname,
		.catname {
			padding: 4px 12px;
			border-radius: 100vh;
		}
	}
<?php endif; ?>

<?php // カテゴリーを非表示
$display_none_cat_id = '';
$display_none_cat = '';
$display_none_cat_id = $GLOBALS['stdata585'];
$display_none_cat = explode( ",", $display_none_cat_id );
foreach( $display_none_cat as $value ): ?>
	.catname.st-catid<?php echo $value; ?> {
		display: none;
	}
<?php endforeach; ?>

<?php echo _st_generate_category_css(); ?>

<?php if($st_cattext_color): ?>
	.post .st-catgroup a {
		color: <?php echo $st_cattext_color; ?>;
	}
<?php endif; ?>

<?php if($st_thumbnail_bordercolor): // サムネイル画像のボーダー ?>
	.kanren dt img {
		border:solid 5px <?php echo $st_thumbnail_bordercolor; ?>;
		box-sizing:border-box;
	}
<?php endif; ?>

/*グループ4
------------------------------------------------------------*/

<?php if($menu_rsscolor): // RSSボタン ?>
.rssbox a {
	background-color: <?php echo $menu_rsscolor; ?>;
}
<?php endif; ?>

<?php if ( $st_sns_btn ): // SNSボタン ?>
	.sns li a {
		background: <?php echo $st_sns_btn; ?> !important;
		box-shadow: none!important;
	}

	.sns a:hover {
		opacity: 0.6;
		box-shadow: none!important;
	}
<?php endif; ?>

<?php if ( $st_sns_btntext ): ?>
	.snstext,
	.sns .share-copy .st-svg-clipboard,
	.snscount,
	.sns li a {
		color: <?php echo $st_sns_btntext; ?>;
	}

	.sns .fa,
	.sns .st-fa,
	.sns .st-svg-hatena {
		border-right-color: <?php echo $st_sns_btntext; ?> !important;
		color: <?php echo $st_sns_btntext; ?>;
	}
<?php endif; ?>

<?php if ( $st_blockquote_color ): //引用部分の背景色 ?>
	.wp-block-quote.is-large,
	.wp-block-quote.is-style-large,
	.inyoumodoki,
	.post blockquote {
		background-color: <?php echo $st_blockquote_color; ?>;
	}
<?php else: ?>
	.wp-block-quote.is-style-st-quote-line:not(.has-background) {
		background-color: transparent;
	}
<?php endif; ?>

<?php if ( $st_blockquote_icon_color ): //引用部分のアイコン・ライン ?>
	.post blockquote cite,
	.post blockquote cite a,
	.inyoumodoki::before,
	.post blockquote::before {
		color: <?php echo $st_blockquote_icon_color; ?>;
	}
	.wp-block-quote.is-style-st-quote-line {
		border-left-color: <?php echo $st_blockquote_icon_color; ?>;
	}
<?php endif; ?>

/*タイムライン
------------------------------------------------------------*/
<?php if ( $st_timeline_list_color ): ?>
	.st-timeline.st-timeline-count > li,
	.st-timeline > li {
		border-left-color: <?php echo $st_timeline_list_color; ?>;
	}
	.st-timeline > li.has-no-text::after,
	.st-timeline > li.is-align-center::after,
	.st-timeline > li.has-text.is-align-default .st-timeline-list-text::after {
		color: <?php echo $st_timeline_list_color; ?>;
	}
	.st-timeline.st-timeline-count > li.has-no-text::after,
	.st-timeline.st-timeline-count > li.is-align-center::after,
	.st-timeline.st-timeline-count > li.has-text.is-align-default .st-timeline-list-text::after {
		background: <?php echo $st_timeline_list_color; ?>;
	}
<?php endif; ?>

<?php if ( $st_timeline_list_color_count ): ?>
	.st-timeline.st-timeline-count > li.has-no-text::after,
	.st-timeline.st-timeline-count > li.is-align-center::after,
	.st-timeline.st-timeline-count > li.has-text.is-align-default .st-timeline-list-text::after {
		color: <?php echo $st_timeline_list_color_count; ?>;
	}
<?php endif; ?>

<?php if ( $st_timeline_list_now_color ): // nowクラス ?>
	.st-timeline > li.now .st-timeline-list-text,
	.st-timeline > li.now .st-timeline-list-text a,
	.st-timeline:not(.st-timeline-count) > li.has-no-text.now::after,
	.st-timeline:not(.st-timeline-count) > li.is-align-center.now::after,
	.st-timeline:not(.st-timeline-count) > li.has-text.is-align-default.now .st-timeline-list-text::after {
		color: <?php echo $st_timeline_list_now_color; ?>;
	}
	.st-timeline.st-timeline-count > li.has-no-text.now::after,
	.st-timeline.st-timeline-count > li.is-align-center.now::after,
	.st-timeline.st-timeline-count > li.has-text.is-align-default.now .st-timeline-list-text::after {
		background: <?php echo $st_timeline_list_now_color; ?>;
	}
<?php endif; ?>

<?php if ( $st_timeline_list_now_blink ): // nowクラスの点滅 ?>
	.st-timeline > li.has-no-text.now::after,
	.st-timeline > li.is-align-center.now::after,
	.st-timeline > li.has-text.is-align-default.now .st-timeline-list-text::after,
	.st-timeline.st-timeline-count > li.has-no-text.now::after,
	.st-timeline.st-timeline-count > li.is-align-center.now::after,
	.st-timeline.st-timeline-count > li.has-text.is-align-default.now .st-timeline-list-text::after {
		animation: StFlash 1s infinite;
	}
	@keyframes StFlash{
		50%{
			opacity: 0;
		}
	}
<?php endif; ?>

<?php if ( $st_timeline_list_bg_color ): // 背景色 ?>
	.st-timeline li.st-timeline-list {
		background-color: <?php echo $st_timeline_list_bg_color; ?>;
		padding-top: 10px;
		padding-bottom: 0;
		padding-right: 20px;
	}
<?php endif; ?>

/* ステップ・カウント
------------------------------------------------------------*/
<?php if ( $st_step_color ): ?>
	.is-style-st-heading-custom-count::before,
	.is-style-st-heading-custom-step::before,
	.is-style-st-heading-custom-step::after {
 		color: <?php echo $st_step_color; ?>;
	}

	.is-style-st-heading-custom-step::after {
		border-bottom-color: <?php echo $st_step_color; ?>;
	}
<?php endif; ?>

.st-step {
	<?php if ( $st_step_color ): ?>
 		color: <?php echo $st_step_color; ?>;
	<?php endif; ?>
	<?php if ( $st_step_bgcolor ): ?>
		background: <?php echo $st_step_bgcolor; ?>;
	<?php endif; ?>
	<?php if ( $st_step_radius ): //角を丸くする ?>
		border-radius:5px;
	<?php endif; ?>
}

<?php if ( $st_step_bgcolor ): ?>
	.st-step::before{
		border-top-color: <?php echo $st_step_bgcolor; ?>;
	}
<?php endif; ?>

.st-step-title {
	<?php if ( $st_step_text_color ): ?>
  		color:<?php echo $st_step_text_color; ?>;
	<?php endif; ?>
	<?php if ( $st_step_text_bgcolor ): ?>
  		background:<?php echo $st_step_text_bgcolor; ?>;
		<?php if ( $st_step_radius ): //角を丸くする ?>
			border-radius:5px;
		<?php endif; ?>
	<?php endif; ?>
	<?php if ( $st_step_text_border_color ): ?>
  		border-bottom:solid 2px <?php echo $st_step_text_border_color; ?>;
	<?php endif; ?>
}

<?php if ( $st_step_text_bgcolor ): // テキストの背景色あり ?>
	.st-step-box {
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
	.st-point::before {
		<?php if ( $st_step_color ): ?>
			color: <?php echo $st_step_color; ?>;
		<?php endif; ?>
		<?php if ( $st_step_bgcolor ): ?>
			background: <?php echo $st_step_bgcolor; ?>;
		<?php endif; ?>
	}
<?php endif; ?>

/*ブログカード
------------------------------------------------------------*/
/* 枠線 */
<?php if ( $st_card_border_color ): ?>
	.st-cardbox {
		border-color:<?php echo $st_card_border_color; ?>;
	}
<?php endif; ?>
<?php if ( $st_card_border_size ): ?>
	.st-cardbox {
		border-width:3px;
	}
<?php endif; ?>

/* ラベル */
.st-labelbox-label-text,
.st-cardbox-label-text {
	<?php if ( $st_card_label_bgcolor ): ?>
		background: <?php echo $st_card_label_bgcolor; ?>;
	<?php else: ?>
		background: #f5bf08;
	<?php endif; ?>
	<?php if ( $st_card_label_textcolor ): ?>
		color: <?php echo $st_card_label_textcolor; ?>;
	<?php else: ?>
		color: #fff;
	<?php endif; ?>
}

.st-cardbox-label-text .st-fa,
.st-cardbox-label-text .fa {
	margin-right: 5px;
}

/* PickUp（JET） */
.st-pick {
	<?php if ( $st_card_label_bgcolor ): ?>
		background: <?php echo $st_card_label_bgcolor; ?>;
	<?php endif; ?>
	<?php if ( $st_card_label_textcolor ): ?>
		color: <?php echo $st_card_label_textcolor; ?>;
	<?php else: ?>
		color: #fff;
	<?php endif; ?>
}

#st-magazine .st-pick .st-ribon-label::before {
	<?php if ( $st_card_label_bgcolor ): ?>
		border-color: transparent transparent <?php echo $st_card_label_bgcolor; ?> <?php echo $st_card_label_bgcolor; ?>;
	<?php endif; ?>
}

#st-magazine .st-pick .st-ribon-label::after {
	<?php if ( $st_card_label_bgcolor ): ?>
		border-color: <?php echo $st_card_label_bgcolor; ?> transparent transparent <?php echo $st_card_label_bgcolor; ?>;
	<?php endif; ?>
}

/* リボン */
.st-ribon-box {
	position: relative;
	margin-bottom: 20px;
}

.st-ribon-label {
	position: absolute;
	top: 0;
	left: 0;
}

.st-ribon-text {
	display: inline-block;
	position: relative;
	height: 30px;
	line-height: 30px;
	text-align: left;
	padding: 0 15px 0 18px;
	font-size: 12px;
	box-sizing: border-box;
	font-weight: bold;
	<?php if ( $st_card_label_bgcolor ): ?>
		background: <?php echo $st_card_label_bgcolor; ?>;
	<?php else: ?>
		background: #f5bf08;
	<?php endif; ?>
	<?php if ( $st_card_label_textcolor ): ?>
		color: <?php echo $st_card_label_textcolor; ?>;
	<?php else: ?>
		color: #fff;
	<?php endif; ?>
}

.st-ribon-text::after {
	position: absolute;
	content: '';
	width: 0px;
	height: 0px;
	z-index: 1;
	top: 0;
	right: -15px;
	border-width: 15px;
	border-style: solid;
	<?php if ( $st_card_label_bgcolor ): ?>
		border-color: <?php echo $st_card_label_bgcolor; ?> transparent <?php echo $st_card_label_bgcolor; ?> <?php echo $st_card_label_bgcolor; ?>;
	<?php else: ?>
		border-color: #f5bf08 transparent #f5bf08 #f5bf08;
	<?php endif; ?>
}

<?php if ( $st_card_label_designsetting && $st_card_label_designsetting === 'ribondesign' ): ?>
	/** リボンタイプ（ラベル）*/
	.st-cardbox {
		position: relative;
		margin-bottom: 30px;
		margin-top: 30px!important;
	}

	.st-cardbox.st-card-minihukidashi {
		margin-top: 0!important;
	}

	.kanren .st-cardbox-label{
		position: absolute;
		top: -20px;
		<?php if ( $st_card_border_size ): ?>
			left: -1.5px;
		<?php else: ?>
			left: -0.5px;
		<?php endif; ?>
	}

	.kanren .st-cardbox-label-text {
		display: inline-block;
		position: relative;
		height: 30px;
		line-height: 30px;
		text-align: center;
		padding: 0 30px 0 18px;
		font-size: 12px;
		box-sizing: border-box;
		left: inherit!important;
		font-weight: bold;
	}

	.kanren .st-cardbox-label-text {
		transform: rotate(0deg);
	}

	.kanren .st-cardbox-label-text::after {
		position: absolute;
		content: '';
		width: 0px;
		height: 0px;
		z-index: 1;
		top: 0;
		right: 0;
		border-width: 15px;
		border-color: transparent #fff transparent transparent;
		border-style: solid;
	}
<?php else: ?>
	/*ブログカード風 - ラベル*/
	.st-cardbox {
		margin-bottom: 20px;
		position: relative;
	}

	<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
		.st-cardbox-label {
			position: absolute;
			top: -4px;
			right: -4px;
			width: 100px;
			height: 100px;
			overflow: hidden;
		}
	<?php else: ?>
		.st-cardbox-label {
			position: absolute;
			top: -4px;
			left: -4px;
			width: 100px;
			height: 100px;
			overflow: hidden;
		}
	<?php endif; ?>

	.st-cardbox-label-text {
		white-space: nowrap;
		display: inline-block;
		position: absolute;
		padding: 7px 0;
		top: 25px;
		width: 150px;
		text-align: center;
		font-size: 90%;
		line-height: 1.2;
		font-weight: bold;
		box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
		z-index: 9999;
		<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
			right: -35px;
			left: inherit;
			transform: rotate(45deg);
		<?php else: ?>
			left: -35px;
			-webkit-transform: rotate(-45deg);
			-ms-transform: rotate(-45deg);
			transform: rotate(-45deg);
		<?php endif; ?>
	}
<?php endif; ?>

/* カードスタイル */
.st-cardstyle .st-cardbox-label,
.st-cardstyleb .st-cardbox-label {
	position: absolute;
	top: -4px;
	left: -4px;
	width: 100px;
	height: 100px;
	overflow: hidden;
}

.st-cardstyle .st-cardbox-label-text,
.st-cardstyleb .st-cardbox-label-text {
	left: -35px;
	-webkit-transform: rotate(-45deg);
	-ms-transform: rotate(-45deg);
	transform: rotate(-45deg);
}

<?php if( trim($GLOBALS['stdata639']) !== '' && trim($GLOBALS['stdata638']) !== '' ): // ブログカード スマホでもサムネイルサイズを大きく + さらに大きく ?>
<?php else: ?>
	@media only screen and (max-width: 599px) {
		#side aside .st-cardstyleb .kanren {
			padding-top: 15px;
		}
	}
<?php endif; ?>

@media only screen and (max-width: 599px) {
	.st-cardstyleb .st-cardbox-label {
		<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
			position: absolute;
			top: -4px;
			right: -4px;
			left: inherit;
			width: 100px;
			height: 100px;
			overflow: hidden;
		<?php else: ?>
			position: absolute;
			top: -4px;
			left: -4px;
			rigtht: inherit;
			width: 100px;
			height: 100px;
			overflow: hidden;
		<?php endif; ?>
	}

	.st-cardstyleb .st-cardbox-label-text {
		<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
			right: -35px;
			left: inherit;
			transform: rotate(45deg);
		<?php else: ?>
			left: -35px;
			right: inherit;
			-webkit-transform: rotate(-45deg);
			-ms-transform: rotate(-45deg);
			transform: rotate(-45deg);
		<?php endif; ?>
	}
}

<?php // 記事一覧
if( trim($GLOBALS['stdata488']) !== '' && $GLOBALS['stdata403'] !== 'maru' ): // サムネイル画像を角丸に変更する + サムネイルが丸くするではない ?>

	#st-magazine:not(.st-magazine-k) .kanren .st-top-box:not(.st-magazine-infeed) dl, /* JET */
	.st-pvm-ranking-item-image img, /* PVモニター */
	.post-card,
	.kanren:not(.st-cardbox) dt img {
		border-radius: 10px;
		overflow: hidden;
	}

	.post-card-image img,
	.st-cardstyle .kanren:not(.st-cardbox) dt img,
	.st-cardstyleb .kanren:not(.st-cardbox) dt img {
		border-radius: 10px 10px 0 0!important;
	}

	<?php if(trim($GLOBALS['stdata202']) !== ''): // PC閲覧時も記事一覧（トップ・アーカイブ・関連記事）の抜粋を非表示にする ?>
		.st-tab-category .post-card-image img,
		aside .post-card-image img,
		aside .st-cardstyle .kanren:not(.st-cardbox) dt img,
		aside .st-cardstyleb .kanren:not(.st-cardbox) dt img {
			border-radius: 10px!important;
		}
	<?php endif; ?>

	@media print, screen and (max-width: 599px) {
		.post-card-image .kanren:not(.st-cardbox) dt img {
			border-radius: 10px 10px 0 0!important;
		}
	}

<?php endif; ?>

<?php // ブログカード
if( isset($GLOBALS['stdata641']) && $GLOBALS['stdata641'] === 'yes' ): // サムネイル画像を角丸に変更する ?>

	.kanren.st-cardbox dt img {
		border-radius: 10px;
	}

	.st-cardstyle .kanren.st-cardbox dt img,
	.st-cardstyleb .kanren.st-cardbox dt img {
		border-radius: 10px 10px 0 0!important;
	}

	.st-cardstyle dl,
	.st-cardstyleb dl,
	.st-cardbox {
		border-radius: 10px;
	}

	<?php if(trim($GLOBALS['stdata202']) !== ''): // PC閲覧時も記事一覧（トップ・アーカイブ・関連記事）の抜粋を非表示にする ?>
		.st-tab-category .post-card-image img,
		aside .post-card-image img,
		aside .st-cardstyle .kanren.st-cardbox dt img,
		aside .st-cardstyleb .kanren.st-cardbox dt img {
			border-radius: 10px!important;
		}
	<?php endif; ?>

	@media print, screen and (max-width: 599px) {
		.post-card-image .kanren.st-cardbox dt img {
			border-radius: 10px 10px 0 0!important;
		}
	}

<?php endif; ?>

<?php if( trim($GLOBALS['stdata488']) !== '' ): // サムネイル画像を角丸に変更する + カード又はスライドショー ?>

	.content-post-slider.is-fullsize-card .post-slide-image,
	.content-post-slider.is-fullsize-text .post-slide-image {
		border-radius: 10px;
		overflow: hidden;
	}

	.content-post-slider .slider-item {
		border-radius: 10px;
		overflow: hidden;
	}

	.content-post-slider .post-slide-image .st-catgroup.itiran-category,
	.post-card-list .post-card-image .st-catgroup.itiran-category {
		padding: 10px 10px 0 10px;
	}

	.content-post-slider:not(.has-excerpt) .post-slide-image img,
	.post-card-list:not(.post-card-list) .post-card-image img {
		border-radius: 10px;
	}

	#st-magazine .kanren .st-top-box dt img {
    		border-radius: 10px;
	}

	#st-magazine .kanren .st-top-box:not(.st-magazine-infeed) dl {
		border-radius: 10px;
		overflow: hidden;
	}

	<?php if( trim($GLOBALS['stdata603']) === '' ): // サムネイルスライドショーの画像を角丸にするが無効 ?>
		#st-header-bottom-category .content-post-slider .slider-item,
		#st-header-bottom-category .content-post-slider.is-fullsize .post-slide-image,
		#st-header-bottom-category .content-post-slider:not(.has-excerpt) .post-slide-image img {
			border-radius: 0;
		}
	<?php endif; ?>

	<?php if( trim($GLOBALS['stdata367']) !== '' ): // カードデザインパターンをBタイプ（枠あり）に変更 ?>
		.kanren-card-list .post-card-list-item {
			border-radius: 10px;
			overflow: hidden;
		}
	<?php endif; ?>

<?php endif; ?>

<?php if( trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
	/** サムネイル非表示 */
	.kanren.st-cardbox.st-no-thumbnail dt{
		display: none;
	}
	.kanren.st-cardbox.st-no-thumbnail dd {
		padding-right: 0;
	}
<?php else: ?>
	/** サムネイル非表示 */
	.kanren.st-cardbox.st-no-thumbnail dt{
		display: none;
	}
	.kanren.st-cardbox.st-no-thumbnail dd {
		padding-left: 0;
	}
<?php endif; ?>

<?php if( trim($GLOBALS['stdata324']) !== ''): // 記事一覧・関連記事一覧の投稿日（更新日）を非表示にする ?>
	.no-thumbitiran .blog_info {
		padding: 0;
	}
<?php endif; ?>

<?php if ( trim($GLOBALS['stdata638']) !== '' ): // サムネイルサイズをさらに大きく ?>
	@media only screen and (min-width: 600px) {
		/** サムネイルワイドタイプ */
		main .kanren.st-cardbox.st-cardbox-wide dt {
			margin: -15px;
		}
	}
	<?php if( trim($GLOBALS['stdata639']) !== '' ): //スマホでもサムネイルサイズを大きく ?>
		@media only screen and (max-width: 599px) {
			/** サムネイルワイドタイプ */
			main .kanren.st-cardbox:not(.st-no-thumbnai) {
				padding:0;
				margin-bottom:20px;
				background:#fff;
			}

			main .kanren.st-cardbox:not(.st-no-thumbnai) dt {
				float: none!important;
				width: 100%!important;
				height:auto;
				overflow: hidden;
			}

			main .kanren.st-cardbox:not(.st-no-thumbnai) dt img {
				width: 100%!important;
			}

			main .kanren.st-cardbox:not(.st-no-thumbnai) dd {
				<?php if( trim($GLOBALS['stdata642']) !== '' ): //サムネイルを非表示 ?>
					padding: 10px 20px;
				<?php else: ?>
					padding: 10px 20px 20px;
				<?php endif; ?>
			}

			main .kanren.st-cardbox:not(.st-no-thumbnai) .clearfix dd p {
				line-height: 1.8;
				margin-bottom:10px;
			}

			main .kanren.st-cardbox:not(.st-no-thumbnai) dd  .smanone {
				display:none;
			}

			/*続きを読む*/
			main .kanren.st-cardbox:not(.st-no-thumbnai) .clearfix dd p.cardbox-more {
				margin-bottom:5px;
			}
		}
	<?php endif; ?>
<?php endif; ?>

/*ラベルボックス（ショートコード）*/
.st-labelbox {
	padding: 0;
    margin-bottom: 20px;
    position: relative;
}

<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
	.st-labelbox-label {
		position: absolute;
		top: -4px;
		right: -4px;
		width: 100px;
		height: 100px;
		overflow: hidden;
	}
<?php else: ?>
	.st-labelbox-label {
		position: absolute;
		top: -4px;
		left: -4px;
		width: 100px;
		height: 100px;
		overflow: hidden;
	}
<?php endif; ?>

.st-labelbox-label-text {
    white-space: nowrap;
    display: inline-block;
    position: absolute;
    padding: 7px 0;
    top: 25px;
    width: 150px;
    text-align: center;
    font-size: 90%;
    line-height: 1.2;
    font-weight: bold;
	<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
		right: -35px;
		left: inheriet;
		transform: rotate(45deg);
	<?php else: ?>
		left: -35px;
		-webkit-transform: rotate(-45deg);
		-ms-transform: rotate(-45deg);
		transform: rotate(-45deg);
	<?php endif; ?>
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    z-index: 9999;
}

<?php // 記事一覧
if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
	.kanren:not(.st-cardbox) dt {
		float: right;
	}
	.kanren:not(.st-cardbox) dd {
		padding-right: 115px;
		padding-left: 0;
	}
	<?php if ( trim($GLOBALS['stdata405']) !== '' ): // スマホ（599px以下）でもサムネイル画像を大きくする ?>
		.kanren:not(.st-cardbox) dd {
			padding-right: 165px;
		}
	<?php endif; ?>

	<?php if ( trim($GLOBALS['stdata477']) !== '' ): // さらに大きく ?>
		@media only screen and (max-width: 599px) {
			.kanren:not(.st-cardbox) dt {
				float: none;
			}
			.kanren:not(.st-cardbox) dd {
				padding-right: 0;
			}
		}
	<?php endif; ?>

	<?php if( trim( $GLOBALS['stdata642']) !== '' ): // サムネイル画像を表示しない ?>
		/* 埋め込みURL（ブログカード） */
		.st-embed-cardlink .kanren:not(.st-cardbox) dt {
			display: none;
		}
		.st-embed-cardlink .kanren:not(.st-cardbox) dd {
			padding-right: 0;
			padding-left: 0;
		}
	<?php endif; ?>

<?php endif; ?>

<?php // ブログカード
if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
	.kanren.st-cardbox dt {
		float: right;
	}
	.kanren.st-cardbox dd {
		padding-right: 115px;
		padding-left: 0;
	}
	<?php if ( trim($GLOBALS['stdata639']) !== '' ): // スマホ（599px以下）でもサムネイル画像を大きくする ?>
		.kanren.st-cardbox dd {
			padding-right: 165px;
		}
	<?php endif; ?>

	<?php if ( trim($GLOBALS['stdata638']) !== '' && trim($GLOBALS['stdata639']) !== '' ): // さらに大きく+ スマホ（599px以下）でもサムネイル画像を大きくする ?>
		@media only screen and (max-width: 599px) {
			.kanren.st-cardbox dt {
				float: none;
			}
			.kanren.st-cardbox dd {
				padding-right: 0;
			}
		}
	<?php endif; ?>

	<?php if( trim( $GLOBALS['stdata642']) !== '' ): // サムネイル画像を表示しない ?>
		/* 埋め込みURL（ブログカード） */
		.st-embed-cardlink .kanren.st-cardbox dt {
			display: none;
		}
		.st-embed-cardlink .kanren.st-cardbox dd {
			padding-right: 0;
			padding-left: 0;
		}
	<?php endif; ?>

<?php endif; ?>

<?php if( trim( $GLOBALS['stdata642']) !== '' ): // サムネイル画像を表示しない ?>
	/* 埋め込みURL（ブログカード） */
	.st-embed-cardlink .kanren dt {
		display: none;
	}
	.st-embed-cardlink .kanren dd {
		padding-right: 0;
		padding-left: 0;
	}
<?php else: ?>
	/* 埋め込みURL（ブログカード）アイキャッチ設定なし */
	.st-embed-cardlink .kanren.st-embed-no-thumb dt {
		display: none;
	}
	.st-embed-cardlink .kanren.st-embed-no-thumb dd {
		padding-right: 0;
		padding-left: 0;
	}
<?php endif; ?>

/*フリーボックスウィジェット
------------------------------------------------------------*/
<?php if (( $freebox_tittle_color ) || ( $freebox_color )): // ボックス ?>
.freebox {
	<?php if ( $freebox_tittle_color ): ?>
		border-top-color: <?php echo $freebox_tittle_color; ?>;
	<?php endif; ?>
	<?php if ( $freebox_color ): ?>
		background: <?php echo $freebox_color; ?>;
	<?php endif; ?>
}
<?php endif; ?>

<?php if (( $freebox_tittle_color ) || ( $freebox_tittle_textcolor )): // 見出し ?>
.p-entry-f {
	<?php if ( $freebox_tittle_color ): ?>
		background: <?php echo $freebox_tittle_color; ?>;
	<?php endif; ?>
	<?php if ( $freebox_tittle_textcolor ): ?>
		color: <?php echo $freebox_tittle_textcolor; ?>;
	<?php endif; ?>
}
<?php endif; ?>

/* エリア内テキスト */
<?php if ( $freebox_textcolor ): ?>
	.freebox > * {
		color: <?php echo $freebox_textcolor; ?>;
	}
<?php endif; ?>

/*メモボックス
------------------------------------------------------------*/
<?php if ( $st_memobox_color ): ?>
	.st-memobox,
	.st-memobox2 {
		border-color: <?php echo $st_memobox_color; ?>;
	}
	.st-memobox .st-memobox-title,
	.st-memobox2 .st-memobox-title {
		color:<?php echo $st_memobox_color; ?>;
	}
<?php endif; ?>

/*スライドボックス
------------------------------------------------------------*/
<?php if ( $st_slidebox_color ): ?>
	.st-slidebox-c {
		background: <?php echo $st_slidebox_color; ?>;
	}
<?php endif; ?>

/*お知らせ
------------------------------------------------------------*/
/*お知らせバーの背景色*/
#topnews-box div.rss-bar {
	<?php if ( $menu_newsbarbordercolor ): //ボーダーに色が設定されいる場合 ?>
		border-color: <?php echo $menu_newsbarbordercolor; ?>;
	<?php else: ?>
		border: none;
	<?php endif; ?>

	<?php if ( $menu_newsbarcolor ): ?>
		/*Other Browser*/
		background: <?php echo $menu_newsbarcolor; ?>;
		/*For Old WebKit*/
		background: -webkit-linear-gradient( <?php echo $menu_newsbarcolor_t; ?> 0%, <?php echo $menu_newsbarcolor; ?> 100% );
		/*For Modern Browser*/
		background: linear-gradient( <?php echo $menu_newsbarcolor_t; ?> 0%, <?php echo $menu_newsbarcolor; ?> 100% );
	<?php endif; ?>

	<?php if ( $menu_newsbartextcolor ): ?>
		color: <?php echo $menu_newsbartextcolor; ?>;
	<?php endif; ?>
}

/*お知らせ日付の文字色*/
#topnews-box dt {
	color: <?php echo $menu_news_datecolor; ?>;
}

#topnews-box div dl dd a {
	color: <?php echo $menu_news_text_color; ?>;
}

#topnews-box dd {
	border-bottom-color: <?php echo $menu_news_datecolor; ?>;
}

#topnews-box {
	<?php if($st_menu_newsbgcolor): ?>
		background-color: <?php echo $st_menu_newsbgcolor ; ?>;
	<?php else: ?>
		background-color:transparent!important;
	<?php endif;  ?>
}

<?php if ( $st_side_textcolor ): // サイドのテキスト色 ?>
	#side aside .widget_rss ul a, /* RSS */
	#side aside .widget_rss *,
	#side aside .widget_rss .st-widgets-title .rsswidget:first-child::before,
	#side aside .widget_archive ul li a, /* アーカイブ */
	#side li.cat-item a,
	#side aside .widget_recent_entries ul li a, /* 最近の投稿 */
	#side aside .widget_recent_entries ul li,
	#side aside .widget_recent_comments li a, /* 最近のコメント */
	#side aside .widget_recent_comments li,
	#side aside .widget_categories ul li a, /* カテゴリー（デフォルト） */
	#side aside .widget_categories ul li,
	#side aside .rankh3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
	#side aside .st_side_rankwidgets a, /* ランキングウィジェットタイトル */
	#side aside .rankwidgets-cont p, /* 説明 */
	#side aside .kanren dd a, /* 記事一覧タイトル */
	#side aside .kanren .st-excerpt p, /*  記事一覧説明 */
	#side aside .kanren .blog_info p, /*  記事一覧日付 */
	#side aside .kanren .blog_info p i, /*  記事一覧日付アイコン */
	#side aside .copyr,
	#side aside .copyr a,
	#side aside .copy,
	#side aside .copy a {
		color: <?php echo $st_side_textcolor; ?>!important;
	}

	#side aside .widget_rss li, .widget_rss li,
	#side aside .widget_recent_entries ul li,
	#side aside .widget_archive ul li {
		border-bottom: 1px dotted <?php echo $st_side_textcolor; ?>!important;
	}

	#side li.cat-item a {
		border-bottom: 1px solid <?php echo $st_side_textcolor; ?>!important;
	}
<?php endif; ?>

/*追加カラー
------------------------------------------------------------*/

<?php if ( $st_footer_bg_text_color ): // フッター ?>
/* ウィジェット
footer .custom-html-widget, 
footer .custom-html-widget a,*/
#footer li.cat-item a::after, /* STINGERカテゴリー */
#footer li.cat-item a,
footer #sidebg li a::before,
#footer .footerlogo a, /* フッターロゴ */
#footer .footerlogo,
#footer .footer-description a, /* フッター説明 */
#footer .footer-description,
#footer .head-telno a, /* フッターの電話番号 */
#footer .head-telno, /* フッターの電話番号 */
#footer .widget_archive ul li, /* アーカイブ */
#footer .widget_archive ul li a,
#footer .widget_recent_entries ul li a, /* 最近の投稿 */
#footer .widget_recent_entries ul li,
#footer .widget_recent_comments li a, /* 最近のコメント */
#footer .widget_recent_comments li,
#footer .widget_categories ul li a, /* カテゴリー（デフォルト） */
#footer .widget_categories ul li,
#footer .rankh3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
#footer .st_side_rankwidgets a, /* ランキングウィジェットタイトル */
#footer .rankwidgets-cont p, /* 説明 */
#footer .kanren dd a, /* 記事一覧タイトル */
#footer .kanren .st-excerpt p, /*  記事一覧説明 */
#footer .kanren .blog_info p, /*  記事一覧日付 */
#footer .kanren:not(.st-cardbox) .clearfix dd .blog_info p i, /*  記事一覧 日時アイコン */
footer .footer-l div:not(.st-footer-tel):not(.headbox) *,
footer .footer-l a,
#footer .menu-item a,
#footer .footermenust a,
#footer .copyr,
#footer .copyr a,
#footer .copy,
#footer .copy a {
	color: <?php echo $st_footer_bg_text_color; ?> !important;
}
#footer li.cat-item a,
#footer .widget_recent_entries ul li,
#footer .widget_archive ul li {
	border-bottom: 1px solid <?php echo $st_footer_bg_text_color; ?>;
}

<?php endif; ?>

#footer #newsin dt, /* お知らせ日時 */
#footer #newsin dd a, /* お知らせ日テキスト*/
#footer #newsin dd, /* お知らせ日ボーダー */
#footer .cat-item a,
#footer .tagcloud a {
	<?php if ( $st_footer_bg_text_color ): ?>
		color: <?php echo $st_footer_bg_text_color; ?>;
		border-color: <?php echo $st_footer_bg_text_color; ?>;
	<?php else: ?>
		color: #1a1a1a;
		border-color: #1a1a1a;
	<?php endif; ?>
}

#footer .p-entry,
#footer .st-widgets-title {
	<?php if ( $st_footer_bg_text_color ): ?>
		color: <?php echo $st_footer_bg_text_color; ?>;
	<?php endif; ?>
	font-weight: bold;
}

<?php if ( $st_footer_bg_text_color ): // フッター ?>
	footer .footermenust li {
		border-right-color: <?php echo $st_footer_bg_text_color; ?> !important;
	}
<?php endif; ?>

/* フッターバナーエリア */
#st-footer-under-widgets-box-wrap #st-footer-under-widgets-box {
	text-align: center;
	padding: 10px 0 10px;
}

#st-footer-under-widgets-box {
	margin:0 auto;
}

<?php if( $st_footer_widgets_bg_color ): ?>
	#st-footer-under-widgets-box-wrap {
		background: <?php echo $st_footer_widgets_bg_color; ?>;
	}
<?php endif; ?>

#st-footer-under-widgets-box-wrap #st-footer-under-widgets-box {
	<?php if( $st_footer_widgets100 ): // 幅を100%にする ?>
    	padding: 0;
		width: 100%;
		max-width: 100%;
	<?php endif; ?>
}

/*フッター背景色*/
<?php if ( $st_footer_gradient ):
		$footer_gradient_w = 'left';
		$footer_gradient = 'left';
	else :
		$footer_gradient_w = 'top';
		$footer_gradient = 'bottom';
	endif;
?>

<?php if ( ! $st_footer100 ): // フッターの背景色を100%にするが無効 ?>
	#footer-wrapper {
		margin-left: auto;
		margin-right: auto;
	}
<?php endif; ?>

<?php if ( $st_footer100 && !$st_wrapper_bgcolor ): // フッターの背景色を100%にする + 背景色が無い ?>

	#footer {
		max-width:100%;
	}

	#footer-wrapper {
		max-width:100%;
		<?php if ( ( trim( $st_footer_bg_color ) !== '' ) && ( trim( $st_footer_bg_color_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_footer_bg_color; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_footer_image; ?>"), -webkit-linear-gradient(<?php echo $footer_gradient_w; ?>,  <?php echo $st_footer_bg_color_t; ?> 0%,<?php echo $st_footer_bg_color; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: url("<?php echo $st_footer_image; ?>"), linear-gradient(to <?php echo $footer_gradient; ?>,  <?php echo $st_footer_bg_color_t; ?> 0%,<?php echo $st_footer_bg_color; ?> 100%);

			<?php elseif ( ( trim( $st_footer_bg_color ) !== '' ) && ( trim( $st_footer_bg_color_t ) === '' ) ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_footer_image; ?>");
				background-color: <?php echo $st_footer_bg_color; ?>;
			<?php else: ?>
			background-color: transparent;
			<?php if( $st_footer_image ): //背景画像がある場合 ?>
				background: url("<?php echo $st_footer_image; ?>");
			<?php else: ?>
				background: none;
			<?php endif; ?>
			<?php endif; ?>
	}

	<?php if( $st_footer_image ): //背景画像がある場合 ?>
		#footer-wrapper {
			background-position: <?php echo $st_footer_image_side; ?> <?php echo $st_footer_image_top; ?>;
			<?php if ( $st_footer_image_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
			<?php if ( $st_footerbg_image_flex ): ?>
				background-size: cover;
			<?php endif; ?>
		}
	<?php endif;  ?>

<?php else: ?>

	#footer-wrapper {
		<?php if ( ( trim( $st_footer_bg_color ) !== '' ) && ( trim( $st_footer_bg_color_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_footer_bg_color; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_footer_image; ?>"), -webkit-linear-gradient(<?php echo $footer_gradient_w; ?>,  <?php echo $st_footer_bg_color_t; ?> 0%,<?php echo $st_footer_bg_color; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: url("<?php echo $st_footer_image; ?>"), linear-gradient(to <?php echo $footer_gradient; ?>,  <?php echo $st_footer_bg_color_t; ?> 0%,<?php echo $st_footer_bg_color; ?> 100%);

			<?php elseif ( ( trim( $st_footer_bg_color ) !== '' ) && ( trim( $st_footer_bg_color_t ) === '' ) ): //下部には色がある場合 ?>
				background-image: url("<?php echo $st_footer_image; ?>");
				background-color: <?php echo $st_footer_bg_color; ?>;
			<?php else: ?>
			background-color: transparent;
			<?php if( $st_footer_image ): //背景画像がある場合 ?>
				background: url("<?php echo $st_footer_image; ?>");
			<?php else: ?>
				background: none;
			<?php endif; ?>
			<?php endif; ?>

           	<?php if ( !$st_wrapper_bgcolor ): ?>
				max-width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
								$st_pc_width = ( $GLOBALS['stdata128']);
							else:
								$st_pc_width = 1060;
							endif;
						echo $st_pc_width;
						?>px;
						box-sizing: border-box;
		<?php endif; ?>
	}

	<?php if( $st_footer_image ): //背景画像がある場合 ?>
		#footer-wrapper {
			background-position: <?php echo $st_footer_image_side; ?> <?php echo $st_footer_image_top; ?>;
			<?php if ( $st_footer_image_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
			<?php if ( $st_footerbg_image_flex ): ?>
				background-size: cover;
			<?php endif; ?>
			}
	<?php endif;  ?>

<?php endif; ?>

<?php if( $st_footerbg_image_dark ): //背景画像を暗くする ?>
	#footer-wrapper {
		position: relative;
		z-index: 0;
	}

	#footer-wrapper::before {
		background-color: rgba(0,0,0,0.4);
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		content: '';
		z-index: -1;
	}
<?php endif;  ?>

/*任意の人気記事
------------------------------------------------------------*/
.st-pvm-ranking-item-image::before, /* PVモニター */
.poprank-no {
	<?php if ( $menu_osusumemidasinobgcolor ): //記事のナンバー背景色 ?>
		background: <?php echo $menu_osusumemidasinobgcolor; ?>;
	<?php endif; ?>
	<?php if ( $menu_osusumemidasinocolor ): //記事のナンバー色 ?>
		color: <?php echo $menu_osusumemidasinocolor; ?>!important;
	<?php endif; ?>
}

#content-w .post .p-entry,
#content-w .p-entry,
#side .p-entry,
.home-post .p-entry {
	<?php if( $menu_osusumemidasicolor ): ?>
		background: <?php echo $menu_osusumemidasicolor; ?>;
	<?php endif; ?>
	<?php if( $menu_osusumemidasitextcolor ): ?>
		color: <?php echo $menu_osusumemidasitextcolor; ?>;
	<?php endif; ?>
	border-radius: 0 0 4px 0;
}

.pop-box, .nowhits .pop-box, .nowhits-eye .pop-box,
.st-eyecatch + .nowhits .pop-box {
	<?php if( $menu_osusumemidasicolor ): ?>
		border-top-color: <?php echo $menu_osusumemidasicolor; ?>;
	<?php endif; ?>
	<?php if( $menu_popbox_color ): ?>
		background: <?php echo $menu_popbox_color; ?>;
	<?php endif; ?>
}

<?php if( $menu_osusumemidasicolor ): ?>
	#content-w .p-entry::after {
		border-bottom: 5px solid <?php echo $menu_osusumemidasicolor; ?>;
		border-left: 5px solid <?php echo $menu_osusumemidasicolor; ?>;
	}
<?php endif; ?>

.pop-box:not(.st-wpp-views-widgets),
#side aside .kanren.pop-box:not(.st-wpp-views-widgets) {
	<?php if( $menu_popbox_color ): //背景色がある場合 ?>
		padding:20px 20px 10px;
	<?php else: ?>
		padding: 20px 0 10px;
	<?php endif; ?>
}

<?php if( trim( stripslashes( $GLOBALS["stdata38"] ) ) === ''  ): //見出しがない場合 ?>
.pop-box:not(.st-wpp-views-widgets),
#side aside .kanren.pop-box:not(.st-wpp-views-widgets) {
		padding:30px 20px 10px;
		border: none;
}
<?php endif;  ?>

<?php if ( $menu_popbox_textcolor ): ?>
	.kanren.pop-box .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) a,
	.kanren.pop-box .clearfix dd p,
	.kanren.pop-box .clearfix dd p a,
	.kanren.pop-box .clearfix dd p span,
	.kanren.pop-box .clearfix dd > *,
	.kanren.pop-box h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) a,
	.kanren.pop-box div p,
	.kanren.pop-box div p a,
	.kanren.pop-box div p span {
		color: <?php echo $menu_popbox_textcolor; ?>!important;
	}
<?php endif; ?>

<?php if ( $st_nohidden ): ?>
	.poprank-no2, .poprank-no {
		display: none;
	}
<?php else: ?>
	.poprank-no2,
	.poprank-no {
	<?php if ( $menu_osusumemidasinobgcolor ): ?>
		background: <?php echo $menu_osusumemidasinobgcolor; ?>;
	<?php endif; ?>
	<?php if ( $menu_osusumemidasinocolor ): ?>
		color: <?php echo $menu_osusumemidasinocolor; ?>!important;
	<?php endif; ?>
	}
<?php endif; ?>

<?php if ( trim( $GLOBALS['stdata562'] ) !== '' || trim( $GLOBALS['stdata563'] ) !== '' ): // rinker WPアソシエイトポストR2 連携 ?>
	/* rinker キャンペーン */
	div.yyi-rinker-contents ul.yyi-rinker-links li {
		display: flex;
		align-items: center;
		max-width: 50%;
		box-sizing: border-box;
	}
	div.yyi-rinker-contents ul.yyi-rinker-links li a {
		display: flex;
		flex-direction: column;
		height: auto;
		padding: 0 10px;
		text-align: center;
	}
	@media print, screen and (max-width: 599px) {
		body div.yyi-rinker-contents ul.yyi-rinker-links li {
			padding: 0 10px 5px!important;
			max-width: 100%;
		}
		div.yyi-rinker-contents ul.yyi-rinker-links li a {
			width: 100%;
			box-sizing: border-box;
		}
	}
	/* WPアソシエイトポストR2 */
	.wpap-tpl-with-detail .wpap-link {
		display: flex;
		align-items: center;
	}
	.wpap-tpl .wpap-link a {
		display: flex!important;
		flex-direction: column;
		height: auto;
		padding: 0 18px;
		text-align: center;
		font-weight: bold;
		line-height: 1.5em;
		width: inherit!important;
		max-width: 50%;
		box-sizing: border-box;
	}
	.wpap-tpl .wpap-link a span {
		margin-top: 5px;
	}
	@media print, screen and (max-width: 599px) {
		.wpap-tpl-with-detail .wpap-link {
			display: block!important;
		}
		.wpap-tpl .wpap-link a {
			width: 100%!important;
			max-width: 100%;
			margin-bottom: 10px!important;
			padding: 10px!important;
			box-sizing: border-box;
		}
	}
	<?php if ( trim( $GLOBALS['stdata562'] ) !== '' ): // amazon ?>
		/** rinker */
		div.yyi-rinker-contents ul.yyi-rinker-links li.amazonlink a::after {
			content: '<?php echo esc_html($GLOBALS['stdata562'] ) ?>';
			color: #f6a306;
			text-align: center;
			background: #fff;
			border: none;
			font-size: .5rem;
			padding: 5px 10px;
			margin-bottom: 5px;
			line-height: 1.3em;
		}
		@media print, screen and (max-width: 599px) {
			div.yyi-rinker-contents ul.yyi-rinker-links li.amazonlink a::after {
				width: 100%;
				box-sizing: border-box;
			}
		}
		/**  WPアソシエイトポストR2 */
		.wpap-tpl-with-detail .wpap-link a.wpap-link-amazon::after {
			content: '<?php echo esc_html($GLOBALS['stdata562'] ) ?>';
			color: #f6a306;
			text-align: center;
			background: #fff;
			border: none;
			font-size: .5rem;
			padding: 5px 10px;
			margin-top: 5px;
			margin-bottom: 5px;
			line-height: 1.3em;
			width: 100%;
			box-sizing: border-box;
			font-weight: bold;
		}
		<?php if ( trim( $GLOBALS['stdata565'] ) !== '' ): // 点滅 ?>
			div.yyi-rinker-contents ul.yyi-rinker-links li.amazonlink a::after,
			.wpap-tpl-with-detail .wpap-link a.wpap-link-amazon::after {
				-webkit-animation:blink 1.5s ease-in-out infinite alternate;
				-moz-animation:blink 1.5s ease-in-out infinite alternate;
				animation:blink 1.5s ease-in-out infinite alternate;
			}
			@-webkit-keyframes blink{
				0% {opacity:0;}
				100% {opacity:1;}
			}
			@-moz-keyframes blink{
				0% {opacity:0;}
				100% {opacity:1;}
			}
			@keyframes blink{
				0% {opacity:0;}
				100% {opacity:1;}
			}
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata563'] ) !== '' ): // 楽天 ?>
		/** rinker */
		div.yyi-rinker-contents ul.yyi-rinker-links li.rakutenlink a::after {
			content: '<?php echo esc_html($GLOBALS['stdata563'] ) ?>';
			color: #cf4944;
			text-align: center;
			background: #fff;
			border: none;
			font-size: .5rem;
			padding: 5px 10px;
			margin-bottom: 5px;
			line-height: 1.3em;
		}
		/** WPアソシエイトポストR2 */
		.wpap-tpl-with-detail .wpap-link a.wpap-link-rakuten::after {
			content: '<?php echo esc_html($GLOBALS['stdata563'] ) ?>';
			color: #be0000;
			text-align: center;
			background: #fff;
			border: none;
			font-size: .5rem;
			padding: 5px 10px;
			margin-top: 5px;
			margin-bottom: 5px;
			line-height: 1.3em;
			width: 100%;
			box-sizing: border-box;
			font-weight: bold;
		}
		<?php if ( trim( $GLOBALS['stdata565'] ) !== '' ): // 点滅 ?>
			div.yyi-rinker-contents ul.yyi-rinker-links li.rakutenlink a::after,
			.wpap-tpl-with-detail .wpap-link a.wpap-link-rakuten::after {
				-webkit-animation:blink 1.5s ease-in-out infinite alternate;
				-moz-animation:blink 1.5s ease-in-out infinite alternate;
				animation:blink 1.5s ease-in-out infinite alternate;
			}
			@-webkit-keyframes blink{
				0% {opacity:0;}
				100% {opacity:1;}
			}
			@-moz-keyframes blink{
				0% {opacity:0;}
				100% {opacity:1;}
			}
			@keyframes blink{
				0% {opacity:0;}
				100% {opacity:1;}
			}
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>

/*WordPressPopularPosts連携*/

#st-magazine .st-wp-views, /*CARDs JET*/
#st-magazine .st-wp-views-limit, /*CARDs JET*/
.st-wppviews-label .wpp-views, /*Ex*/
.st-wppviews-label .wpp-views-limit, /*Ex*/
.st-wpp-views-widgets .st-wppviews-label .wpp-views {
	<?php if( $menu_osusumemidasinocolor ): ?>
		color: <?php echo $menu_osusumemidasinocolor; ?>;
	<?php endif; ?>
	<?php if( $menu_osusumemidasinobgcolor ): ?>
		background:<?php echo $menu_osusumemidasinobgcolor; ?>;
	<?php endif; ?>
}

/*ウィジェット問合せボタン*/

.st-formbtn {
	<?php if( $st_formbtn_radius ): ?>
		border-radius: 3px;
	<?php endif; ?>

	<?php if ( $st_formbtn_bordercolor ): ?>
		border: solid 1px <?php echo $st_formbtn_bordercolor; ?>;
	<?php endif; ?>

	<?php if ( (trim($st_formbtn_bgcolor_t) !== '') && (trim($st_formbtn_bgcolor) !== '') ): ?>
		/*For Old WebKit*/
		background: -webkit-linear-gradient( <?php echo $st_formbtn_bgcolor_t; ?> 0%, <?php echo $st_formbtn_bgcolor; ?> 100% );
		/*For Modern Browser*/
		background: linear-gradient( <?php echo $st_formbtn_bgcolor_t; ?> 0%, <?php echo $st_formbtn_bgcolor; ?> 100% );
	<?php elseif ( (trim($st_formbtn_bgcolor_t) === '') && (trim($st_formbtn_bgcolor) !== '') ): ?>
		/*Other Browser*/
		background: <?php echo $st_formbtn_bgcolor; ?>;
	<?php else: ?>
		background-color: transparent!important;
	<?php endif; ?>
}

<?php if( $st_formbtn_textcolor ): ?>
	.st-formbtn .st-originalbtn-l {
		border-right-color: <?php echo $st_formbtn_textcolor ?>;
	}
<?php endif; ?>

<?php if( $st_formbtn_textcolor ): ?>
	a.st-formbtnlink {
		color: <?php echo $st_formbtn_textcolor ?>;
	}
<?php endif; ?>

/*ウィジェットオリジナルボタン*/

.st-originalbtn {
	<?php if( $st_formbtn2_radius ): ?>
		border-radius: 3px;
	<?php endif; ?>

	<?php if ( $st_formbtn2_bordercolor ): ?>
		border: 1px solid <?php echo $st_formbtn2_bordercolor; ?>;
	<?php endif; ?>

	<?php if ( (trim($st_formbtn2_bgcolor_t) !== '') && (trim($st_formbtn2_bgcolor) !== '') ): ?>
		/*For Old WebKit*/
		background: -webkit-linear-gradient( <?php echo $st_formbtn2_bgcolor_t; ?> 0%, <?php echo $st_formbtn2_bgcolor; ?> 100% );
		/*For Modern Browser*/
		background: linear-gradient( <?php echo $st_formbtn2_bgcolor_t; ?> 0%, <?php echo $st_formbtn2_bgcolor; ?> 100% );
	<?php elseif ( (trim($st_formbtn2_bgcolor_t) === '') && (trim($st_formbtn2_bgcolor) !== '') ): ?>
		/*Other Browser*/
		background: <?php echo $st_formbtn2_bgcolor; ?>;
	<?php else: ?>
		background-color: transparent!important;
	<?php endif; ?>
}

<?php if ( $st_formbtn2_textcolor ): ?>
	.st-originalbtn .st-originalbtn-l {
		border-right-color: <?php echo $st_formbtn2_textcolor ?>;
	}
<?php endif; ?>

<?php if ( $st_formbtn2_textcolor ): ?>
	a.st-originallink {
		color: <?php echo $st_formbtn2_textcolor ?>;
	}
<?php endif; ?>

<?php // スマホヘッダーメニュー（横列）、またはスマホ「ヘッダーメニュー（横列）」メニューの固定表示が有効 ?>
<?php if ( _st_is_mobile_link_design_available() || _st_is_sticky_mobile_link_design_available() ) : ?>
	/*スマホヘッダーメニュー（横列）
	------------------------------------------------------------*/
	#st-mobile-link-design,
	#st-mobile-link-design-sticky {
		display: flex;
		align-items: center;
		overflow-y: scroll;
		padding-bottom: 7px;
		<?php if ( $st_middle_sumart_bg_color ): //背景色がある場合 ?>
			<?php if ( ( trim( $st_middle_sumart_bg_color ) !== '' ) && ( trim( $st_middle_sumart_bg_color_t ) !== '' ) ): ?>
				/*Other Browser*/
				background: <?php echo $st_middle_sumart_bg_color; ?>;
				/* Android4.1 - 4.3 */
				background: -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_middle_sumart_bg_color_t; ?> 0%,<?php echo $st_middle_sumart_bg_color; ?> 100%);

				/* IE10+, FF16+, Chrome26+ */
				background: linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_middle_sumart_bg_color_t; ?> 0%,<?php echo $st_middle_sumart_bg_color; ?> 100%);

			<?php elseif ( ( trim( $st_middle_sumart_bg_color ) !== '' ) && ( trim( $st_middle_sumart_bg_color_t ) === '' ) ): //下部には色がある場合 ?>
				background-color: <?php echo $st_middle_sumart_bg_color; ?>;
			<?php else: ?>
			<?php endif; ?>
		<?php endif; ?>
	}

	@media only screen and (min-width: 959px) {
		#st-mobile-link-design,
		#st-mobile-link-design-sticky {
			display: none;
		}
	}

	#st-mobile-link-design .footermenust,
	#st-mobile-link-design-sticky .footermenust {
		text-align: left;
		padding: 2px;
		margin-bottom: 0;
		box-sizing: border-box;
	}

	@media only screen and (min-width: 600px) and (max-width: 959px) {
		#st-mobile-link-design .footermenust,
		#st-mobile-link-design-sticky .footermenust {
			padding: 5px;
		}
	}

	#st-mobile-link-design .footermenubox.st-menu-side-box ul,
	#st-mobile-link-design-sticky .footermenubox.st-menu-side-box ul {
		display: flex;
		flex-direction: row;
		justify-content: flex-end;
		align-items: center;
		flex-wrap: nowrap;
	}

	#st-mobile-link-design .footermenubox.st-menu-side-box ul {
		animation-name: StRightToLeft; /* 右から左 */
		animation-duration: 2s;
	}

	#st-mobile-link-design .footermenust.st-menu-side a,
	#st-mobile-link-design-sticky .footermenust.st-menu-side a {
		font-size: 12px;
		white-space:nowrap;
		font-weight: bold;
		text-decoration: none;
		<?php if ( $st_middle_sumartmenutextcolor ): ?>
			color: <?php echo $st_middle_sumartmenutextcolor; ?>;
		<?php endif; ?>
	}

	@media only screen and (min-width: 600px) and (max-width: 959px) {
		#st-mobile-link-design .footermenust.st-menu-side a,
		#st-mobile-link-design-sticky .footermenust.st-menu-side a {
			font-size: 14px;
		}
	}

	#st-mobile-link-design .footermenust.st-menu-side a span,
	#st-mobile-link-design-sticky .footermenust.st-menu-side a span {
		font-size: 10px;
		display: block;
		margin-top: -7px;
		margin-bottom: -2px;
		opacity: 0.8;
		font-weight: normal;
	}

	#st-mobile-link-design .footermenust.st-menu-side li,
	#st-mobile-link-design-sticky .footermenust.st-menu-side li {
		padding: 2px 20px;
		line-height: 2;
		border: none;
		text-align:center;
	}
<?php endif; ?>

/*ミドルメニュー
------------------------------------------------------------*/
<?php if ( $st_middle_sumart_bg_color ): //背景色がある場合 ?>
	.st-middle-menu ul {
		<?php if ( ( trim( $st_middle_sumart_bg_color ) !== '' ) && ( trim( $st_middle_sumart_bg_color_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $st_middle_sumart_bg_color; ?>;
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(<?php echo $header_gradient_w; ?>,  <?php echo $st_middle_sumart_bg_color_t; ?> 0%,<?php echo $st_middle_sumart_bg_color; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: linear-gradient(to <?php echo $header_gradient; ?>,  <?php echo $st_middle_sumart_bg_color_t; ?> 0%,<?php echo $st_middle_sumart_bg_color; ?> 100%);

		<?php elseif ( ( trim( $st_middle_sumart_bg_color ) !== '' ) && ( trim( $st_middle_sumart_bg_color_t ) === '' ) ): //下部には色がある場合 ?>
			background-color: <?php echo $st_middle_sumart_bg_color; ?>;
		<?php else: ?>

		<?php endif; ?>
		}
<?php endif; ?>

.st-middle-menu .menu li a{
	<?php if ( $st_middle_sumartmenutextcolor ): ?>
		color: <?php echo $st_middle_sumartmenutextcolor; ?>;
	<?php endif; ?>
}

<?php if ( $st_middle_sumartmenu_space ): //周りに余白 ?>
	nav.st-middle-menu {
		padding: 10px;
	}

	nav.st-middle-menu ul {
		box-shadow: 0 1px 2px rgba(0,0,0,0.2);
	}

	<?php if ( $st_middle_sumartmenubordercolor ): ?>
		.st-middle-menu ul{
			border-top: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
			border-left: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
		}
		.st-middle-menu .menu > li{
			border-bottom: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
			border-right: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
		}
	<?php endif; ?>

<?php else: // 余白なし ?>

	<?php if ( $st_middle_sumartmenubordercolor && trim($GLOBALS['stdata249'] ) !== '' ): //ミドルメニュー3列 ?>

		<?php if ( $st_middle_sumartmenubordercolor ): ?>
			.st-middle-menu ul{
				border-top: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
			}
			.st-middle-menu .menu > li {
				border-right: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
				border-bottom: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
			}
			.st-middle-menu .menu > li:nth-child(3n) { /* 3つごとに線なし */
				border-right: none;
			}
		<?php endif; ?>

	<?php else: //ミドルメニュー2列 ?>

		<?php if ( $st_middle_sumartmenubordercolor ): ?>
			.st-middle-menu ul{
				border-top: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
			}
			.st-middle-menu .menu > li {
				border-bottom: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
			}
			.st-middle-menu .menu > li:nth-child(odd){
				border-right: 1px solid <?php echo $st_middle_sumartmenubordercolor; ?>;
			}
		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>

/*サイドメニューウィジェット
------------------------------------------------------------*/
<?php
	if( isset($menu_navbar_topunder_color) && (trim($st_menu_side_widgets_topunder_color) === '') ): //ボーダー色
		$st_menu_side_widgets_topunder_color = $menu_navbar_topunder_color;
	endif;

	if( isset($menu_navbarcolor) && (trim($st_menu_side_widgetscolor) === '') ):  //サイドメニューウィジェットの背景色下
		$st_menu_side_widgetscolor = $menu_navbarcolor;
	endif;

	if( isset($menu_navbarcolor_t) && (trim($st_menu_side_widgetscolor_t) === '') ): //サイドメニューウィジェットの背景色上
		$st_menu_side_widgetscolor_t = $menu_navbarcolor_t;
	endif;

	if( isset($menu_navbartextcolor) && (trim($st_menu_side_widgetstextcolor) === '') ): //サイドメニューウィジェットテキスト色
		$st_menu_side_widgetstextcolor = $menu_navbartextcolor;
	endif;
?>
/*背景色*/
#sidebg {
	<?php if( $menu_pagelist_bgcolor ): ?>
		background: <?php echo $menu_pagelist_bgcolor; ?>;
	<?php endif; ?>
	<?php if( $st_sidebg_bgimg ): //背景画像がある場合 ?>
		background-image: url("<?php echo $st_sidebg_bgimg; ?>");
		background-position: <?php echo $st_sidebg_bgimg_side; ?> <?php echo $st_sidebg_bgimg_top; ?>;
		<?php if ( $st_sidebg_bgimg_repeat ): ?>
			background-repeat: no-repeat;
		<?php endif; ?>
	<?php endif;  ?>
}

/*liタグの階層*/
#side aside .st-pagelists ul li:not(.sub-menu) {
	<?php if ( $st_menu_side_widgets_topunder_color ): ?>
		border-color: <?php echo $st_menu_side_widgets_topunder_color; ?>;
	<?php else: ?>
		border: none;
	<?php endif; ?>
}

#side aside .st-pagelists ul .sub-menu li {
	border: none;
}

#side aside .st-pagelists ul li:last-child {
	<?php if ( $st_menu_side_widgets_topunder_color ): ?>
		border-bottom: 1px solid <?php echo $st_menu_side_widgets_topunder_color; ?>;
	<?php else: ?>
		border-bottom: none;
	<?php endif; ?>
}

#side aside .st-pagelists ul .sub-menu li:first-child {
	<?php if ( $st_menu_side_widgets_topunder_color ): ?>
		border-top: 1px solid <?php echo $st_menu_side_widgets_topunder_color; ?>;
	<?php else: ?>
		border-top: none;
	<?php endif; ?>
}

#side aside .st-pagelists ul li li:last-child {
	border: none;
}

#side aside .st-pagelists ul .sub-menu .sub-menu li {
	border: none;
}

<?php if ( $st_sidemenu_gradient ): //グラデーションを横向きにする
	$navbarcolor_gradient_w = 'left';
	$navbarcolor_gradient = 'left';
else :
	$navbarcolor_gradient_w = 'top';
	$navbarcolor_gradient = 'bottom';
endif;
?>

#side aside .st-pagelists ul li a {
	<?php if( $st_menu_side_widgetstextcolor ): ?>
		color: <?php echo $st_menu_side_widgetstextcolor; ?>;
	<?php endif; ?>
	<?php if ( ( trim( $st_menu_side_widgetscolor ) !== '' ) && ( trim( $st_menu_side_widgetscolor_t ) !== '' ) ): ?>
		/*Other Browser*/
		background: <?php echo $st_menu_side_widgetscolor; ?>;
		/* Android4.1 - 4.3 */
		background: url("<?php echo $st_sidemenu_bgimg; ?>"), -webkit-linear-gradient(<?php echo $navbarcolor_gradient_w; ?>,  <?php echo $st_menu_side_widgetscolor_t; ?> 0%,<?php echo $st_menu_side_widgetscolor; ?> 100%);

		/* IE10+, FF16+, Chrome26+ */
		background: url("<?php echo $st_sidemenu_bgimg; ?>"), linear-gradient(to <?php echo $navbarcolor_gradient; ?>,  <?php echo $st_menu_side_widgetscolor_t; ?> 0%,<?php echo $st_menu_side_widgetscolor; ?> 100%);

	<?php elseif ( ( trim( $st_menu_side_widgetscolor ) !== '' ) && ( trim( $st_menu_side_widgetscolor_t ) === '' ) ): //下部には色がある場合 ?>
		background-image: url("<?php echo $st_sidemenu_bgimg; ?>");
		background-color: <?php echo $st_menu_side_widgetscolor; ?>;
	<?php else: ?>
		background-color: transparent;
		<?php if( $st_sidemenu_bgimg ): //背景画像がある場合 ?>
			background: url("<?php echo $st_sidemenu_bgimg; ?>");
		<?php else: ?>
			background: none;
		<?php endif; ?>
	<?php endif; ?>
}

<?php if($st_menu_bold ): //第一階層を太字にする ?>
	#side aside .st-pagelists ul li a {
		font-weight:bold;
	}
	#side aside .st-pagelists ul li li a {
		font-weight:normal;
	}
<?php endif; ?>

<?php if($st_sidemenu_fontsize ): //第一階層の文字サイズを大きくする ?>
	#side aside .st-pagelists ul li a {
		font-size:110%;
	}
	#side aside .st-pagelists ul li li a {
		font-size:100%;
	}
<?php endif; ?>

<?php if ( $st_sidemenu_accordion ): //第二階層以下をアコーディオンメニューにする ?>
	#side aside .st-pagelists .sub-menu {
		display: none;
	}
<?php endif; ?>

#side aside .st-pagelists .sub-menu > li:last-child:has(> ul) a,
#side aside .st-pagelists .sub-menu a {
	<?php if($menu_pagelist_childtext_border_color): ?>
		border-bottom-color: <?php echo $menu_pagelist_childtext_border_color; ?>;
	<?php else: ?>
		border: none;
	<?php endif;  ?>
	color: <?php echo $menu_pagelist_childtextcolor; ?>;
}

<?php if($menu_pagelist_childtext_border_color): ?>
	#side aside .st-pagelists .sub-menu .sub-menu li:last-child {
		border-bottom: 1px solid <?php echo $menu_pagelist_childtext_border_color; ?>;
	}
	:root #side aside .st-pagelists > ul > li:last-child > .sub-menu > .sub-menu > li:last-child {
		border-bottom: none;
	}
<?php endif;  ?>

#side aside .st-pagelists .sub-menu li .sub-menu a,
#side aside .st-pagelists .sub-menu li .sub-menu .sub-menu li a {
	color: <?php echo $menu_pagelist_childtextcolor; ?>;
}

<?php if($menu_pagelist_childtextcolor): ?>
	#side aside .st-pagelists .sub-menu li .sub-menu a:hover,
	#side aside .st-pagelists .sub-menu li .sub-menu .sub-menu li a:hover,
	#side aside .st-pagelists .sub-menu a:hover {
		opacity:0.8;
		color: <?php echo $menu_pagelist_childtextcolor; ?>;
	}
<?php endif;  ?>

<?php if( $st_sidemenu_bgimg ): //背景画像がある場合 ?>
	#side aside .st-pagelists ul li a {
		background-position: <?php echo $st_sidemenu_bgimg_side; ?> <?php echo $st_sidemenu_bgimg_top; ?>;
		<?php if ( $st_sidemenu_bgimg_repeat ): ?>
			background-repeat: no-repeat;
		<?php endif; ?>
	}
<?php endif;  ?>

<?php if($st_sidemenu_bgimg_leftpadding): //左の余白 ?>
	#side aside .st-pagelists ul li a {
		padding-left:<?php echo $st_sidemenu_bgimg_leftpadding; ?>px;
	}
<?php endif;  ?>

<?php if($st_sidemenu_bgimg_tupadding): //上下の余白 ?>
	#side aside .st-pagelists ul li a {
		padding-top:<?php echo $st_sidemenu_bgimg_tupadding; ?>px;
		padding-bottom:<?php echo $st_sidemenu_bgimg_tupadding; ?>px;
	}
<?php endif;  ?>

/*Webアイコン*/
<?php if ( $st_menu_icon ): ?>
	#side aside .st-pagelists ul li a::before {
		<?php if ( $st_menu_icon ): ?>
			content: "\<?php echo $st_menu_icon; ?>";
		<?php endif; ?>
		font-family: stsvg;
		margin-right: 5px;
		<?php if ( $st_menu_icon_color ): ?>
			color:<?php echo $st_menu_icon_color; ?>;
		<?php else: ?>
			<?php if ( $menu_navbartextcolor ): ?>
				color:<?php echo $menu_navbartextcolor; ?>;
			<?php endif; ?>
		<?php endif; ?>

	}
	#side aside .st-pagelists li li a::before {
		content: none;
	}
<?php endif; ?>

<?php if ( $st_undermenu_icon ): ?>
	#side aside .st-pagelists li li a::before {
		content: "\<?php echo $st_undermenu_icon; ?>";
		font-family: stsvg;
		font-size: .7em;
		margin-right: 5px;
		<?php if ( $st_undermenu_icon_color ): ?>
			color:<?php echo $st_undermenu_icon_color; ?>;
		<?php else: ?>
			color:<?php echo $menu_pagelist_childtextcolor; ?>;
		<?php endif; ?>
	}
<?php endif; ?>

<?php if (( $st_contactform7btn_bgcolor ) || ( $st_contactform7btn_textcolor )): // コンタクトフォーム7送信ボタン ?>
.wpcf7-submit {
	<?php if ( $st_contactform7btn_bgcolor ): ?>
		background: <?php echo $st_contactform7btn_bgcolor ?>;
	<?php endif; ?>
	<?php if ( $st_contactform7btn_textcolor ): ?>
		color: <?php echo $st_contactform7btn_textcolor ?>;
	<?php endif; ?>
}
<?php endif; ?>

/*-------------------------------------
記事ごとのヘッダー（EX）
--------------------------------------*/
<?php if ( $st_header_bgcolor ): // 背景色 ?>
	#st-header-post-under-box.st-header-post-data {
		background-color: <?php echo $st_header_bgcolor; ?>;
	}
<?php endif; ?>

/* 記事情報を表示*/
#st-header-post-under-box.st-header-post-data {
	display: flex;
	flex-wrap: wrap;
	<?php if($st_entrytitle_text_center): ?>
		justify-content: center;
	<?php else: ?>
		justify-content: flex-start;
	<?php endif; ?>
	align-items: center;
}
<?php if($st_entrytitle_text_center): ?>
	#st-header-post-under-box.st-header-post-data .blogbox,
	#st-header-post-under-box.st-header-post-data .st-catgroup {
		text-align: center;
	}
<?php endif; ?>

#st-header-post-under-box.st-header-post-data .st-content-width {
	<?php if($st_entrytitle_text_center): ?>
	<?php else: ?>
		width: 100%;
	<?php endif; ?>
	padding:15px;
	box-sizing: border-box;
}

<?php if ( $st_entrytitle_color ): ?>
	#st-header-post-under-box .blogbox p,
	#st-header-post-under-box .entry-title {
		color: <?php echo $st_entrytitle_color; ?>;

	}
<?php endif; ?>

<?php if ( $st_headerunder_bgcolor || $st_headerunder_image ): // header以下のエリアの背景指定あり ?>
	@media print, screen and (max-width: 599px) {
		main {
			margin: 0;
		}

		#side {
			padding-top: 20px;
		}
	}

	@media print, screen and (max-width: 959px) {
		.colum1 #st-header-post-under-box.st-header-post-data,
		.colum1 #st-header-post-under-box.st-header-post-no-data {
			margin-bottom: 0;
		}
	}
<?php endif; ?>

/* ヘッダー画像上エリア */
#st-header-top-widgets-box .st-content-width {
	text-align:center;
	margin: 0 auto;
	padding:7px 10px;
	<?php if ( $st_header_top_textcolor ): ?>
		color:<?php echo $st_header_top_textcolor; ?>;
	<?php endif; ?>
}

#st-header-top-widgets-box .st-content-width .st-marquee { /* マーキー */
	padding: 0;
}

#st-header-top-widgets-box {
	<?php if ( ( trim( $st_header_top_bgcolor ) !== '' ) && ( trim( $st_header_top_bgcolor_g ) !== '' ) ): ?>
		<?php if ( trim( $st_header_top_stripe ) !== '' ): // ストライプデザインに変更 ?>

			background: -webkit-repeating-linear-gradient(-45deg, <?php echo $st_header_top_bgcolor; ?>, <?php echo $st_header_top_bgcolor; ?> 5px, <?php echo $st_header_top_bgcolor_g; ?> 5px, <?php echo $st_header_top_bgcolor_g; ?> 10px);
			background: repeating-linear-gradient(-45deg, <?php echo $st_header_top_bgcolor; ?>, <?php echo $st_header_top_bgcolor; ?> 5px, <?php echo $st_header_top_bgcolor_g; ?> 5px, <?php echo $st_header_top_bgcolor_g; ?> 10px);

		<?php else: ?>

			/*Other Browser*/
			background: <?php echo $st_header_top_bgcolor; ?>;
			/* Android4.1 - 4.3 */
			background: -webkit-linear-gradient(left,  <?php echo $st_header_top_bgcolor; ?> 0%,<?php echo $st_header_top_bgcolor_g; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: linear-gradient(to right,  <?php echo $st_header_top_bgcolor; ?> 0%,<?php echo $st_header_top_bgcolor_g; ?> 100%);

		<?php endif; ?>
	<?php elseif ( ( trim( $st_header_top_bgcolor ) !== '' ) && ( trim( $st_header_top_bgcolor_g ) === '' ) ): //下部には色がある場合 ?>
		background-color: <?php echo $st_header_top_bgcolor; ?>;
	<?php else: ?>
	<?php endif; ?>

}

#st-header-top-widgets-box .st-content-width p {
	margin-bottom: 0;
}

<?php if ( $st_header_top_textcolor ): ?>
	#st-header-top-widgets-box .st-content-width a {
		color:<?php echo $st_header_top_textcolor; ?>;
	}
<?php endif; ?>

#st-header-top-widgets-box .st-content-width a:hover {
	opacity: 0.7;
}

/* ヘッダー画像エリア */
<?php if ( $st_header_height_vh ): // トップページのヘッダー画像エリアの高さを画面サイズに応じて最大にする ?>
	.front-page:not(.paged) #header-full {
		height: 100vh;
		display:flex;
		flex-direction:column;
		overflow: hidden;
	}

	.front-page:not(.paged) #gazou-wide {
		display:flex;
		flex-direction:column;
		height:100%;
	}

	.front-page:not(.paged) #st-headerbox {
		height:100%;
	}

	.front-page:not(.paged) #st-header {
		height:100%;
		text-align: left;
		overflow: hidden;
	}

	/* ヘッダーコンテンツがある場合はスクロールボタン分の余白 */
	#st-headerbox .st-header-content {
		padding-bottom: 120px;
	}

	<?php if( trim($GLOBALS['stdata395']) === '' && ! is_active_sidebar( 14 ) ): // ヘッダー画像又は記事スライドショーを中央寄せ ?>
		.front-page:not(.paged) #st-header {
			align-items: center;
			display: flex;
		}
		.top-content,
		.header-post-slider-container,
		#st-header .slick-slider {
			width: 100%;
		}
	<?php endif; ?>

	<?php if( trim($GLOBALS['stdata399']) !== '' ): // コンテンツ全体を上下左右を中央寄せ ?>
		.front-page:not(.paged) #st-header {
			text-align: center;
		}
	<?php endif; ?>

	/* safari */
	_:lang(x)+_:-webkit-full-screen-document,
	.front-page:not(.paged) #header-full {
		height: auto;
		min-height: -webkit-fill-available;
	}

	_:lang(x)+_:-webkit-full-screen-document,
	.front-page:not(.paged) #gazou-wide,
	.front-page:not(.paged) #st-headerbox,
	.front-page:not(.paged) #st-header {
		height: auto;
		flex-grow: 1;
	}

	_:lang(x)+_:-webkit-full-screen-document,
	.front-page:not(.paged) #st-headerbox {
		display: flex;
		flex-direction: column;
	}

	<?php if ( $st_header_height ): ?>
		body:not(.front-page) #st-header {
			min-height: <?php echo $st_header_height; ?>px;
		}
	<?php endif; ?>

	<?php if ( $st_header_height_sp ): // スマホサイズ ?>
		@media only screen and (max-width: 599px) {
			body:not(.front-page) #st-header {
				min-height: <?php echo $st_header_height_sp; ?>px;
			}
		}
	<?php endif; ?>

	/* 下部へのリンク */
	.front-page:not(.paged) #header-full {
		position: relative;
	}

	.front-page:not(.paged) #st-header-link{
		position: absolute;
		left: 50%;
		bottom: 0;
		height: 60px; /* 位置 */
		cursor: pointer;
	}

	.front-page:not(.paged) #st-header-link span{
		position: absolute;
		left: -50px;
		top: -25px;
		width: 100px;
		display: inline-block;
		color: #fff;
		font-size: 1rem;
		letter-spacing: 0.05em;
		text-align: center;
	}

	.front-page:not(.paged) #st-header-link::after{
	  content: "";
	  position: absolute;
	  top: 0;
	  width: 1px;
	  height: 100px;
	  background: #fff;
	  animation: pathmove 1.4s ease-in-out infinite;
	  opacity:0;
	}

	@keyframes pathmove{
	  0%{
		height:0;
		top:0;
		opacity: 0;
	  }
	  30%{
		height:30px;
		opacity: 1;
	  }
	  100%{
		height:0;
		top:100px;
		opacity: 0;
	  }
	}

	@media only screen and (max-width: 599px) {
		.front-page:not(.paged) #st-header-link {
			bottom: 20px;
			height: 40px; /* 位置 */
		}
	}

<?php else: ?>

	<?php if ( $st_header_height ): ?>
		#st-header {
			min-height: <?php echo $st_header_height; ?>px;
		}
	<?php else: // ヘッダーナビゲーション動画 ?>
		#st-header.header-video-player {
			min-height: 300px;
		}
	<?php endif; ?>

	<?php if ( $st_header_height_sp ): // スマホサイズ ?>
		@media only screen and (max-width: 599px) {
			#st-header {
				min-height: <?php echo $st_header_height_sp; ?>px;
			}
		}
	<?php else: // ヘッダーナビゲーション動画 ?>
		@media only screen and (max-width: 599px) {
			#st-header.header-video-player {
				min-height: 230px;
			}
		}
	<?php endif; ?>

<?php endif; ?>

/* サムネイルスライドショーエリアウィジェット */
#st-header-bottom-category {
	overflow: hidden;
	padding: 5px 0;
}

#st-header-bottom-category .content-post-slider,
#st-header-bottom-category .post-card-list {
    margin-right: 0;
    margin-left: 0;
    width: 100%;
	max-width: 100%;
	overflow: hidden;
}

@media print, screen and (max-width: 959px) {
	#st-header-bottom-category {
		<?php if ( isset( $GLOBALS['stdata601'] ) && $GLOBALS['stdata601'] === 'yes' ): // センター寄せにする（スマホ） ?>
			padding: 0;
		<?php else: ?>
			padding: 0 15px;
		<?php endif; ?>
	}
}

#st-header-bottom-category .slick-track,
#st-header-bottom-category .slick-list {
	display: flex;
}

#st-header-under-widgets-box .slider {
	padding-top: 15px;
}

<?php if ( ( $st_header_under_image || $st_header_under_bgcolor ) && ( trim( $GLOBALS['stdata604'] ) !== '' || is_active_sidebar( 28 ) ) ): ?>
	#st-header-under-widgets-box-wrap {
		background-color: <?php echo $st_header_under_bgcolor ; ?>;
	}
	<?php if ( is_active_sidebar( 28 ) || ( isset($GLOBALS['stdata604']) && $GLOBALS['stdata604'] === 'all' ) ): ?>
		#st-header-under-widgets-box-wrap {
			padding: 10px 0;
		}

		#st-header-cardlink-wrapper + #content-w > #st-header-under-widgets-box-wrap {
			margin-top: 10px;
		}
		@media print, screen and (min-width: 960px) {
				#st-header-under-widgets-box-wrap {
					margin-bottom: 0;
				}

				#content-w {
					padding-top: 0;
				}
		}

		#st-header-post-under-box.st-header-post-data,
		#st-header-post-under-box.st-header-post-no-data {
			margin-top: 0;
		}

		<?php if ( $st_header_under_image ): ?>
			#st-header-under-widgets-box-wrap {
				background-image: url("<?php echo $st_header_under_image; ?>");
				<?php if ( $st_header_under_image_flex ): ?>
					background-size: cover;
				<?php endif; ?>
				background-position: <?php echo $st_header_under_image_side; ?> <?php echo $st_header_under_image_top; ?>;
				<?php if ( $st_header_under_image_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
			<?php if ( $st_header_under_image_dark ): // 背景画像を暗くする ?>
				#st-header-under-widgets-box-wrap {
					position: relative;
				}

				#st-header-under-widgets-box-wrap::before {
					background-color: rgba(0,0,0,0.4);
					position: absolute;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					content: '';
				}
				/* サムネイルスライドショーのタイトルを白色に */
				#st-header-under-widgets-box-wrap .content-post-slider .post-slide-title a,
				#st-header-under-widgets-box-wrap .post-card-list .post-card-title a {
					color: #fff;
				}
			<?php endif; ?>
		<?php endif; ?>

	<?php elseif ( is_active_sidebar( 28 ) || ( isset($GLOBALS['stdata604']) && $GLOBALS['stdata604'] === 'top' ) ): ?>
		.front-page #st-header-under-widgets-box-wrap {
			padding: 10px 0;
		}

		.front-page #st-header-cardlink-wrapper + #content-w > #st-header-under-widgets-box-wrap {
			margin-top: 10px;
		}
		@media print, screen and (min-width: 960px) {
				.front-page #content-w {
					padding-top: 0;
				}
		}

		.front-page #st-header-post-under-box.st-header-post-data,
		.front-page #st-header-post-under-box.st-header-post-no-data {
			margin-top: 0;
		}

		<?php if ( $st_header_under_image ): ?>
			.front-page #st-header-under-widgets-box-wrap {
				background-image: url("<?php echo $st_header_under_image; ?>");
				<?php if ( $st_header_under_image_flex ): ?>
					background-size: cover;
				<?php endif; ?>
				background-position: <?php echo $st_header_under_image_side; ?> <?php echo $st_header_under_image_top; ?>;
				<?php if ( $st_header_under_image_repeat ): ?>
					background-repeat: no-repeat;
				<?php endif; ?>
			}
			<?php if ( $st_header_under_image_dark ): // 背景画像を暗くする ?>
				.front-page #st-header-under-widgets-box-wrap {
				  position: relative;
				}

				.front-page #st-header-under-widgets-box-wrap::before {
				  background-color: rgba(0,0,0,0.4);
				  position: absolute;
				  top: 0;
				  right: 0;
				  bottom: 0;
				  left: 0;
				  content: ' ';
				}
				/* サムネイルスライドショーのタイトルを白色に */
				.front-page #st-header-under-widgets-box-wrap .content-post-slider .post-slide-title a,
				.front-page #st-header-under-widgets-box-wrap .post-card-list .post-card-title a {
					color: #fff;
				}
			<?php endif; ?>
		<?php endif; ?>

	<?php endif; ?>
<?php endif; ?>

<?php if ( isset( $GLOBALS["stdata603"] ) && $GLOBALS["stdata603"] === 'yes' ): // 画像を角丸にする ?>
	#st-header-under-widgets-box .content-post-slider .post-slide-image,
	#st-header-under-widgets-box .post-card-list .post-card-image,
	#st-header-under-widgets-box img {
		border-radius: 10px;
	}
<?php endif; ?>

<?php if ( isset( $GLOBALS["stdata607"] ) && $GLOBALS["stdata607"] === 'yes' ): // 画像に影を付ける ?>
	<?php if ( isset( $GLOBALS["stdata605"] ) && $GLOBALS["stdata605"] === 'yes' ): // フルサイズ ?>
		#st-header-under-widgets-box .content-post-slider img
	<?php else: ?>
		#st-header-under-widgets-box .content-post-slider .post-slide-image
	<?php endif; ?>
		{
			box-shadow: 0 2px 5px rgb(0, 0, 0, .3);
		}
<?php endif; ?>

/* ヘッダーバナー */
<?php if ( $st_header_card_bgcolor ): ?>
	#st-header-cardlink-wrapper {
		background-color: <?php echo $st_header_card_bgcolor ; ?>;
	}
	@media only screen and (max-width: 959px) {
		.st-cardlink-column-d {
			margin-bottom: 0;
		}
		#st-header-cardlink-wrapper {
			padding-bottom: 1px;
		}
	}
<?php endif; ?>

<?php if ( $st_header_card_image ): ?>
	#st-header-cardlink-wrapper {
		background-image: url("<?php echo $st_header_card_image; ?>");
		background-position: <?php echo $st_header_card_image_side; ?> <?php echo $st_header_card_image_top; ?>;
        <?php if ( $st_header_card_image_repeat ): ?>
			background-repeat: no-repeat;
		<?php endif; ?>
        <?php if ( $st_header_card_image_flex ): ?>
			background-size: cover;
		<?php endif; ?>
	}
	@media only screen and (max-width: 959px) {
		#st-header-cardlink-wrapper {
			padding-bottom: 1px;
		}
	}
<?php endif; ?>

/* メイン画像背景色 */
<?php if ( $st_header_bgcolor ): ?>
	#st-headerbox {
		background-color: <?php echo $st_header_bgcolor; ?>;
	}
<?php endif; ?>

<?php if ( $st_topgabg_image ): ?>
	<?php if ( ($st_topgabg_image_sumahoonly) && (!st_is_mobile()) ): //スマホのみに表示がありPCの場合 ?>
	<?php else: ?>
		#st-headerbox {
			background-image: url("<?php echo $st_topgabg_image; ?>");
			<?php if ( $st_topgabg_image_fix ): // パララックス効果 ?>
				<?php if ( ! wp_is_mobile() ): // PCのみ ?>
					background-attachment:fixed;
				<?php endif; ?>
				background-size:cover;
			<?php endif; ?>
			<?php if ( $st_topgabg_image_flex ): ?>
				background-size: cover;
			<?php endif; ?>
			background-position: <?php echo $st_topgabg_image_side; ?> <?php echo $st_topgabg_image_top; ?>;
			<?php if ( $st_topgabg_image_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif; ?>
<?php endif; ?>

/*強制センタリング・中央寄せ
------------------------------------------------------------*/
<?php if($st_entrytitle_no_css): //カスタマイザーのCSSを無効化 ?>
<?php else: ?>
	<?php if ( $st_entrytitle_text_center ): //記事タイトル ?>
        .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
        .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
        {
            text-align:center;
			<?php if ( ( $st_entrytitle_designsetting !== 'dotdesign' ) && ( $st_entrytitle_designsetting !== 'linedesign' ) ): //左ラインと囲みドットデザイン以外  ?>
					padding-left:10px;
					padding-right:10px;
			<?php endif; ?>
        }
        <?php if ($st_entrytitle_designsetting === 'hukidasidesign'): //吹き出しデザイン ?>
            .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
            .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
            .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
            .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
                left: calc(50% - 10px);
            }
        <?php endif; ?>
    <?php endif; ?>
    <?php if ( ( trim( $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) &&  $st_entrytitle_design_wide ): // LP・1カラム時を全てワイド化する（β）が無効又は1カラム及びLPではない + デザイン幅一杯 ?>
        .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
        .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
        .colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
        .colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
        {
                margin-left: -15px;
                margin-right: -15px;
				<?php if ( ($st_entrytitle_designsetting !== 'dotdesign') && ($st_entrytitle_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:20px;
					padding-right:20px;
				<?php endif; ?>
        }
    <?php endif; ?>
<?php endif; ?>

<?php if($st_h2_no_css): //カスタマイザーのCSSを無効化 ?>
<?php else: ?>
    <?php if ( $st_h2_text_center ): //h2 ?>
        .entry-content .h2modoki,
        .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
        {
            text-align:center;
			<?php if ( ( $st_h2_designsetting !== 'dotdesign' ) && ( $st_h2_designsetting !== 'linedesign' ) ): //左ラインと囲みドットデザイン以外  ?>
					padding-left:10px;
					padding-right:10px;
			<?php endif; ?>
        }
        <?php if ($st_h2_designsetting === 'hukidasidesign'): //吹き出しデザイン ?>
            .entry-content .h2modoki::after,
            .entry-content .h2modoki::before,
            .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
            .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
                left: calc(50% - 10px);
            }
        <?php endif; ?>
    <?php endif; ?>
    <?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) &&  $st_h2_design_wide ): ?>
        .entry-content .h2modoki,
        .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
        .colum1 .entry-content .h2modoki,
        .colum1 .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
        {
                margin-left: -15px;
                margin-right: -15px;
				<?php if ( ($st_h2_designsetting !== 'dotdesign') && ($st_h2_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:20px;
					padding-right:20px;
				<?php endif; ?>
        }
    <?php endif; ?>
<?php endif; ?>

<?php if($st_h3_no_css): //カスタマイザーのCSSを無効化 ?>
<?php else: ?>
    <?php if ( $st_h3_text_center ): //h3 ?>
        .entry-content .h3modoki,
        .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
        {
            text-align:center;
			<?php if ( ( $st_h3_designsetting !== 'dotdesign' ) && ( $st_h3_designsetting !== 'linedesign' ) ): //左ラインと囲みドットデザイン以外  ?>
					padding-left:10px;
					padding-right:10px;
			<?php endif; ?>
        }
        <?php if ($st_h3_designsetting === 'hukidasidesign'): //吹き出しデザイン ?>
            .entry-content .h3modoki::after,
            .entry-content .h3modoki::before,
            .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after,
            .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
                left: calc(50% - 10px);
            }
        <?php endif; ?>
    <?php endif; ?>
    <?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) &&  $st_h3_design_wide ): ?>
        .entry-content .h3modoki,
        .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title),
        .colum1 .entry-content .h3modoki,
        .colum1 .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
        {
                margin-left: -15px;
                margin-right: -15px;
				<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:20px;
					padding-right:20px;
				<?php endif; ?>
        }
    <?php endif; ?>
<?php endif; ?>

<?php if ( isset($GLOBALS['stdata375']) && $GLOBALS['stdata375'] === 'yes' ): // LPワイドの左右にシャドウ -EX ?>
	<?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' ) &&  $st_h2_design_wide ): ?>
		/* H2
		 * media Queries タブレット（～959px）
		-----------------------------------------*/
		@media only screen and (max-width: 959px) {
			.colum1.st-lp-wide.st-lp-wide-shadow .entry-content .h2modoki,
			.colum1.st-lp-wide.st-lp-wide-shadow .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
				margin-left: -20px;
				margin-right: -20px;
				<?php if ( ($st_h2_designsetting !== 'dotdesign') && ($st_h2_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
			padding-left:20px;
			padding-right:20px;
				<?php endif; ?>
			}
		}
		/* media Queries タブレット（960px）以上
		-----------------------------------------*/
		@media only screen and (min-width: 960px) {
			.colum1.st-lp-wide.st-lp-wide-shadow .entry-content .h2modoki,
			.colum1.st-lp-wide.st-lp-wide-shadow .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
				margin-left: -40px;
				margin-right: -40px;
				<?php if ( ($st_h2_designsetting !== 'dotdesign') && ($st_h2_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
			padding-left:40px;
			padding-right:40px;
				<?php endif; ?>
			}
		}
	<?php endif; ?>
	<?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' ) &&  $st_h3_design_wide ): ?>
		/* H3
		 * media Queries タブレット（～959px）
		-----------------------------------------*/
		@media only screen and (max-width: 959px) {
			.colum1.st-lp-wide.st-lp-wide-shadow .entry-content .h3modoki,
			.colum1.st-lp-wide.st-lp-wide-shadow .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
			{
				margin-left: -20px;
				margin-right: -20px;
				<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
			padding-left:20px;
			padding-right:20px;
				<?php endif; ?>
			}
		}
		/*media Queries タブレット（960px）以上
		-----------------------------------------*/
		@media only screen and (min-width: 960px) {
			.colum1.st-lp-wide.st-lp-wide-shadow .entry-content .h3modoki,
			.colum1.st-lp-wide.st-lp-wide-shadow .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
			{
				margin-left: -40px;
				margin-right: -40px;
				<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
			padding-left:40px;
			padding-right:40px;
				<?php endif; ?>
			}
		}
	<?php endif; ?>
<?php endif; ?>

/*目次
------------------------------------------------------------*/
/* 目次 */
<?php if ( $st_pagetop_bgcolor ): ?>
	.st_toc_back_icon::before,
	.st_toc_back,
	.st_toc_back:focus,
	.st_toc_back:hover,
	.st_toc_back:active {
		color: <?php echo $st_pagetop_bgcolor; ?>;
	}

	.st_toc_back:not(.is-rounded) {
		border-color: <?php echo $st_pagetop_bgcolor; ?>;
	}

	.st_toc_back.is-rounded {
		background-color: <?php echo $st_pagetop_bgcolor; ?>;
	}
	.st_toc_back.is-rounded .st_toc_back_icon::before {
		color: #fff;
	}
<?php endif; ?>

<?php if ( $st_pagetop_arrow_color ): ?>
	:root .st_toc_back .st_toc_back_label,
	:root .st_toc_back .st_toc_back_icon::before {
		color: <?php echo $st_pagetop_arrow_color; ?>;
	}
<?php endif; ?>

/*media Queries タブレットサイズ（959px以下）
----------------------------------------------------*/
@media only screen and (max-width: 959px) {

	/*-------------------------------------------
	旧st-kanri.phpより移動（ここから）
	*/

	<?php if  ( st_is_mobile() && trim($GLOBALS['stdata616']) !== '' ): //スマホ・タブレット表示時にスマホロゴ及びタイトルの使用 ?>
		#s-navi::after {
   	 		margin-bottom: 0;
		}
		#headbox {
    			padding-bottom: 0!important;
		}
	<?php endif;  ?>

	<?php // ブログカード ?>
	<?php if( trim($GLOBALS['stdata642']) === '' && isset($GLOBALS['stdata639']) && $GLOBALS['stdata639'] === 'yes' ): // サムネイルを非表示が無効 + スマホでもサムネイルサイズを大きく ?>
		#footer .kanren.st-cardbox dt,
		#side .kanren.st-cardbox dt {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				float: right;
			<?php else: ?>
				float: left;
			<?php endif; ?>

			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		#footer .kanren.st-cardbox dt img,
		#side .kanren.st-cardbox dt img {
			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		#footer .kanren.st-cardbox dd,
		#side .kanren.st-cardbox dd {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-right: 315px;
				<?php else: ?>
					padding-right: 165px;
				<?php endif; ?>

				padding-left: 0;
			<?php else: ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-left: 315px;
				<?php else: ?>
					padding-left: 165px;
				<?php endif; ?>
			<?php endif; ?>
		}

		#footer #magazine .kanren.st-cardbox dd,
		#side #magazine .kanren.st-cardbox dd {
			padding-left: 20px;
		}

		#footer .kanren.st-cardbox dt,
		#side .kanren.st-cardbox dt {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				float: right;
			<?php else: ?>
				float: left;
			<?php endif; ?>

			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		#footer .kanren.st-cardbox dt.st-cardbox img,
		#side .kanren.st-cardbox dt.st-cardbox img {
			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		#footer .kanren.st-cardbox dd,
		#side .kanren.st-cardbox dd {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-right: 315px;
				<?php else: ?>
					padding-right: 215px;
				<?php endif; ?>

				padding-left: 0;
			<?php else: ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-left: 315px;
				<?php else: ?>
					padding-left: 215px;
				<?php endif; ?>
			<?php endif; ?>
		}

	<?php endif;  ?>

	<?php if( trim($GLOBALS['stdata279']) !== '' ): // 一覧抜粋表示 ?>
		.st-excerpt.smanone	{
			display:block;
		}
	<?php endif;  ?>

	<?php if( trim($GLOBALS['stdata280']) !== '' ): // ブログカード抜粋表示 ?>
		.st-card-excerpt.smanone	{
			display:block;
			font-size:90%;
		}
	<?php endif;  ?>

	<?php if( trim($GLOBALS['stdata280']) !== '' ): // スマホ（960px未満）閲覧時でも「ブログカード」の抜粋を表示する ?>
		.st-cardbox .clearfix dd h5,
		.post .st-cardbox .clearfix dd h5,
		#footer .st-cardbox .clearfix dd h5,
		#side .st-cardbox .clearfix dd h5 {
			padding-bottom:0;
		}
	<?php endif;  ?>

	<?php if ( isset($GLOBALS['stdata375']) && $GLOBALS['stdata375'] === 'yes' ): // ワイドLPの左右にシャドウ -EX ?>
		.colum1.st-lp-wide.st-lp-wide-shadow header {
			padding: 0 10px;
		}
		.colum1.st-lp-wide.st-lp-wide-shadow .st-lp-wide-content{
			padding:40px 20px;
		}
		.colum1.st-lp-wide.st-lp-wide-shadow .st-lp-wide-eyecatch{
			margin: -60px -20px 0;
		}
		.colum1.st-lp-wide.st-lp-wide-shadow .st-lp-wide-eyecatch-width{
			margin: 0 -20px 20px;
		}
	<?php endif; ?>

	/*
	旧st-kanri.phpより移動（ここまで）
	-------------------------------------------*/

	/* ヘッダー画像/記事スライドショー横並び */
	<?php if ( trim( $GLOBALS['stdata274'] ) !== '' || trim( $GLOBALS['stdata272'] ) !== '' ): ?>
		#st-header {
			overflow: hidden;
		}
	<?php endif; ?>

	/*-- ここまで --*/
}

/*media Queries タブレットサイズ以上
----------------------------------------------------*/
@media only screen and (min-width: 600px) {

    /*-------------------------------------------
    旧st-kanri.phpより移動（ここから）
    */

    <?php if ( isset( $GLOBALS['stdata128'] ) && trim( $GLOBALS['stdata128'] ) !== '' ) : //全体のwidth
        $st_pc_width = (int) $GLOBALS['stdata128'];
        $st_pc_header_width = ( (int) $GLOBALS['stdata128'] );
    else:
        $st_pc_width = 1060;
        $st_pc_header_width = 1060;
    endif; ?>

    <?php if(trim($GLOBALS['stdata266']) === 'yes'): // 記事スライドショー ?>
		.header-post-slider {
			max-width: <?php echo $st_pc_width; ?>px;
		}
    <?php endif;  ?>

	<?php if ( $st_is_ex_af ): // テーマ分岐 ?>
		<?php if(trim($GLOBALS['myaf26']) !== ''): //ランキングバナーサイズを大きく ?>
			.rankst .rankst-l {
				width: 300px;
			}
			.rankst .rankst-l img {
				width: 300px;
			}
			.rankst .rankst-r {
				margin: 0 0 0 -300px;
			}
			.rankst .rankst-cont {
				margin: 0 0 0 325px;
			}
		<?php endif;  ?>
	<?php endif; ?>

	<?php // 記事一覧 ?>
	<?php if(trim($GLOBALS['stdata91']) !== ''): //サムネイルサイズを大きく ?>

		main .kanren:not(.st-cardbox) dt {
			<?php if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				float: right;
			<?php else: ?>
				float: left;
			<?php endif; ?>

			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		main .kanren:not(.st-cardbox) dt img {
			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		main .kanren:not(.st-cardbox) dd {
			<?php if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					padding-right: 315px;
				<?php else: ?>
					padding-right: 165px;
				<?php endif; ?>

				padding-left: 0;
			<?php else: ?>
				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					padding-left: 315px;
				<?php else: ?>
					padding-left: 165px;
				<?php endif; ?>
			<?php endif; ?>
		}

		main #magazine .kanren:not(.st-cardbox) dd {
			padding-left: 20px;
		}
		/*view数*/
		.st-wppviews-label .wpp-views,
		.st-wppviews-label .wpp-views-limit {
			font-size: 90%;
		}

		.youtube_thum_link_150 {
			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>

			<?php if( trim($GLOBALS["stdata403"]) === '' || ( isset($GLOBALS["stdata403"]) && $GLOBALS["stdata403"] === 'maru' ) ): // 正方形か丸 ?>
				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					height: 300px;
				<?php else: ?>
					height: 150px;
				<?php endif; ?>
			<?php endif; ?>
		}

		#side .youtube_thum_link_150 {
			width: 100px;
			height: 100px;
		}

		<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>

			/* サイドバー・フッター・レイアウトボックス */
			.lbox .kanren:not(.st-cardbox) dt,
			.rbox .kanren:not(.st-cardbox) dt,
			#side .kanren:not(.st-cardbox) dt,
			footer .kanren:not(.st-cardbox) dt {
				float: none;
				width: 100%;
			}

			.lbox .kanren:not(.st-cardbox) dt img,
			.rbox .kanren:not(.st-cardbox) dt img,
			#side .kanren:not(.st-cardbox) dt img,
			footer .kanren:not(.st-cardbox) dt img {
				width: 100%;
			}

			.lbox .kanren:not(.st-cardbox) dd,
			.rbox .kanren:not(.st-cardbox) dd,
			#side .kanren:not(.st-cardbox) dd,
			footer .kanren:not(.st-cardbox) dd {
				padding-left: 0;
				padding-right: 0;
			}

			.lbox .st-cardstyleb .kanren.st-cardbox dd,
			.rbox .st-cardstyleb .kanren.st-cardbox dd {
				padding-left: 0;
				padding-right: 0;
			}

		<?php endif; ?>

	<?php endif;  ?>

	<?php if( trim( $GLOBALS['stdata91'] ) !== '' ): //サムネイルサイズを大きく又はサムネイルを横長に ?>
		/*PVモニター*/
		main .st-pvm-ranking-item-image {
			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		.st-pvm-ranking-item-image img{
				width: 100%;
		}

		<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>

			/* サイドバー */
			#side .st-pvm-ranking-item-image {
				width: 100%;
			}

		<?php endif; ?>

	<?php endif;  ?>

	<?php if ( isset($GLOBALS['stdata251']) && $GLOBALS['stdata251'] === 'yes' ): //サムネイル画像をポラロイド風に ?>
		.kanren:not(.st-cardbox) dt:not(.st-card-img) {
			<?php if ( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'maru' ) : //サムネイルを丸く
				if ( isset($GLOBALS['stdata91']) && $GLOBALS['stdata91'] === 'yes' ) : //サムネイルを大きく ?>
					padding: 10px;
				<?php endif; ?>
					border-radius:50%;
			<?php elseif ( isset($GLOBALS['stdata91']) && $GLOBALS['stdata91'] === 'yes' ) : //サムネイルを大きく ?>
				padding: 10px 10px 17px;
			<?php endif; ?>
		}
		#side .kanren:not(.st-cardbox) dt:not(.st-card-img) {
			<?php if ( isset($GLOBALS['stdata403']) && $GLOBALS['stdata403'] === 'maru' ) : //サムネイルを丸く?>
			<?php elseif (
				( isset($GLOBALS['stdata91']) && $GLOBALS['stdata91'] === 'yes' )      //サムネイルを大きく
				&& ( trim($GLOBALS['stdata477']) === '' ) //サムネイルをさらに大きく
			): ?>
				padding: 5px 5px 8px;
			<?php endif; ?>
		}
	<?php endif; ?>

	<?php if( ( isset( $GLOBALS['stdata403'] ) && ( $GLOBALS['stdata403'] === 'full' || $GLOBALS['stdata403'] === 'original' ) ) && trim($GLOBALS['stdata91']) !== '' ): //サムネイルサイズを大きくかつサムネイルを横長に ?>
		/* YouTubeサムネイル */
		.youtube_thum_link_150 {
			<?php if ( isset($GLOBALS['stdata91']) && $GLOBALS['stdata91'] === 'yes' && isset($GLOBALS['stdata477']) && $GLOBALS['stdata477'] === 'yes' ) : //サムネイルをさらに大きく ?>
				width: 300px;
				height: 200px;
			<?php elseif ( isset($GLOBALS['stdata91']) && $GLOBALS['stdata91'] === 'yes' ) : //サムネイルを大きく ?>
				width: 150px;
				height: 100px;
			<?php else: ?>
				width: 100px;
				height: 100px;
			<?php endif; ?>
		}

		main .kanren:not(.st-cardbox) dt {
			<?php if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				float: right;
			<?php else: ?>
				float: left;
			<?php endif; ?>

			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}

		main .kanren:not(.st-cardbox) dt:not(.st-cardbox) img {
			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}

		main .kanren:not(.st-cardbox) dd {
			<?php if(trim($GLOBALS['stdata451']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					padding-right: 315px;
				<?php else: ?>
					padding-right: 215px;
				<?php endif; ?>

				padding-left: 0;
			<?php else: ?>
				<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
					padding-left: 315px;
				<?php else: ?>
					padding-left: 215px;
				<?php endif; ?>
			<?php endif; ?>
		}

		#magazine .kanren:not(.st-cardbox) dd {
			padding-left: 20px;
		}

		/*PVモニター*/
		main .st-pvm-ranking-item-image {
			<?php if(trim($GLOBALS['stdata477']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}
	<?php endif;  ?>

	<?php // ブログカード ?>
	<?php if( trim($GLOBALS['stdata642']) === '' && trim($GLOBALS['stdata637']) !== '' ): // サムネイルを非表示が無効 + サムネイルサイズを大きく ?>

		main .kanren.st-cardbox dt {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				float: right;
			<?php else: ?>
				float: left;
			<?php endif; ?>

			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		main .kanren.st-cardbox dt img {
			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}

		main .kanren.st-cardbox dd {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-right: 315px;
				<?php else: ?>
					padding-right: 165px;
				<?php endif; ?>

				padding-left: 0;
			<?php else: ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-left: 315px;
				<?php else: ?>
					padding-left: 165px;
				<?php endif; ?>
			<?php endif; ?>
		}

		main #magazine .kanren.st-cardbox dd {
			padding-left: 20px;
		}

		<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>

			/* レイアウトボックス */
			.post .wp-block-column .kanren.st-cardbox,
			.post .lbox .kanren.st-cardbox,
			.post .rbox .kanren.st-cardbox {
				padding: 0;
			}

			.post .wp-block-column .kanren.st-cardbox dt,
			.post .lbox .kanren.st-cardbox dt,
			.post .rbox .kanren.st-cardbox dt {
				float: none;
				width: 100%;
			}

			.post .wp-block-column .kanren.st-cardbox dt img,
			.post .lbox .kanren.st-cardbox dt img,
			.post .rbox .kanren.st-cardbox dt img {
				width: 100%;
				margin-bottom: 15px;
			}

			.post .wp-block-column .kanren.st-cardbox dd,
			.post .lbox .kanren.st-cardbox dd,
			.post .rbox .kanren.st-cardbox dd {
				padding: 10px 20px 20px;
				float: none;
			}

			.post .wp-block-column .st-cardstyleb .kanren.st-cardbox dd,
			.post .lbox .st-cardstyleb .kanren.st-cardbox dd,
			.post .rbox .st-cardstyleb .kanren.st-cardbox dd{
				padding: 10px;
			}

			.post .wp-block-column p.cardbox-more,
			.post .lbox p.cardbox-more,
			.post .rbox p.cardbox-more {
				display: block;
			}
		<?php endif; ?>

	<?php endif;  ?>

	<?php if( trim($GLOBALS['stdata642']) === '' && trim($GLOBALS['stdata637']) !== '' ): // サムネイル非表示が無効 + サムネイルサイズを大きく ?>
		main .kanren.st-cardbox dt {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				float: right;
			<?php else: ?>
				float: left;
			<?php endif; ?>

			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}

		main .kanren.st-cardbox dt.st-cardbox img {
			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}

		main .kanren.st-cardbox dd {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-right: 315px;
				<?php else: ?>
					padding-right: 215px;
				<?php endif; ?>

				padding-left: 0;
			<?php else: ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-left: 315px;
				<?php else: ?>
					padding-left: 215px;
				<?php endif; ?>
			<?php endif; ?>
		}

	<?php endif;  ?>

    <?php if(trim($GLOBALS['stdata96']) === ''): ?>
        /*TOC+*/
        #toc_container > ul > li {
            font-size: 21px;
        }
    <?php endif;  ?>

    /*
    旧st-kanri.phpより移動（ここまで）
    -------------------------------------------*/

	<?php if( $st_fixed_pc_header ): // ヘッダーナビゲーション（PC）固定 ?>
		<?php if ( $st_fixed_pc_header === 'fixed' ): // ヘッダーナビゲーション ?>
			<?php if ( $st_wrapper_bgcolor || ( ! $st_wrapper_bgcolor && ! $st_header100 ) ): //サイト全体を包括する背景色 ?>
				#headbox-bg-fixed,
				#headbox-bg.st-header-fixed {
					width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
									$st_pc_width = ( $GLOBALS['stdata128'] );
								else:
									$st_pc_width = 1060;
								endif;
							echo $st_pc_width;
							?>px;
					max-width: 100%;
					margin-left: auto;
					margin-right: auto;
				}
			<?php endif; ?>
		<?php elseif( ( $st_fixed_pc_header === 'fixed-pcmenu' ) && ! $st_menu100 ): ?>
			#st-menubox.st-header-fixed {
				width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
								$st_pc_width = ( $GLOBALS['stdata128'] );
							else:
								$st_pc_width = 1060;
							endif;
						echo $st_pc_width;
						?>px!important;
				margin-left: auto;
				margin-right: auto;
				max-width: 100%;
			}
		<?php elseif( ( $st_fixed_pc_header === 'fixed-headerinfo' ) && $st_wrapper_bgcolor ): // ヘッダーインフォメーション ?>
			#st-header-top-widgets-box.st-header-fixed {
				width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
								$st_pc_width = ( $GLOBALS['stdata128'] );
							else:
								$st_pc_width = 1060;
							endif;
						echo $st_pc_width;
						?>px!important;
				margin-left: auto;
				margin-right: auto;
				max-width: 100%;
			}
		<?php endif; ?>
	<?php endif; ?>

	<?php if( $st_pc_header_fixed_alpha_bgcolor && $st_pc_header_fixed_bg_alpha ): //ヘッダー固定（PC）用透過背景色 ?>
		#st-header-top-widgets-box.st-header-fixed,
		#headbox-bg.st-header-fixed,
		#st-menuwide.st-header-fixed {
			background: none;
			background-color: <?php echo st_hexToRgba($st_pc_header_fixed_alpha_bgcolor ,$st_pc_header_fixed_bg_alpha); ?>!important;
		}
	<?php endif; ?>

	/* 目次 */
	#st_toc_container:not(.over_toc_content):not(.side_toc_content):not(.st_toc_contracted):not(.only-toc),
	.st_toc_container:not(.over_toc_content):not(.side_toc_content):not(.st_toc_contracted):not(.only-toc),
	#toc_container:not(.contracted) { /* 表示状態 */
		<?php if(($st_toc_bgcolor)||($st_toc_bordercolor)): ?>
			padding:20px 30px 30px;
		<?php endif;  ?>
	}

	/*強制センタリング・中央寄せ
	------------------------------------------------------------*/
	<?php if($st_entrytitle_no_css): //カスタマイザーのCSSを無効化 ?>
	<?php else: ?>
		<?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) &&  $st_entrytitle_design_wide ): // LP・1カラム時を全てワイド化する（β）が無効又は1カラム及びLPではない + デザイン幅一杯 ?>
			.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
			.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
				margin-left: -30px;
				margin-right: -30px;
				<?php if ( ($st_entrytitle_designsetting !== 'dotdesign') && ($st_entrytitle_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:30px;
					padding-right:30px;
				<?php endif; ?>
			}
			.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
			.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
				margin-left: -20px;
				margin-right: -20px;
				<?php if ( ($st_entrytitle_designsetting !== 'dotdesign') && ($st_entrytitle_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:20px;
					padding-right:20px;
				<?php endif; ?>
			}

			<?php if ( !$st_entrytitle_text_center && ($st_entrytitle_designsetting === 'hukidasidesign') ): //ふきだしデザインでセンター寄せではない場合 ?>
        		.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
        		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after
        		{
               		left:65px;
        		}
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after
        		{
               		left:55px;
        		}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if($st_h2_no_css): //カスタマイザーのCSSを無効化 ?>
	<?php else: ?>
		<?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) &&  $st_h2_design_wide ): ?>
			.entry-content .h2modoki,
			.entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
				margin-left: -30px;
				margin-right: -30px;
				<?php if ( ($st_h2_designsetting !== 'dotdesign') && ($st_h2_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:30px;
					padding-right:30px;
				<?php endif; ?>
			}
			.colum1 .entry-content .h2modoki,
			.colum1 .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
				margin-left: -20px;
				margin-right: -20px;
				<?php if ( ($st_h2_designsetting !== 'dotdesign') && ($st_h2_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:20px;
					padding-right:20px;
				<?php endif; ?>
			}

			<?php if ( !$st_h2_text_center && ($st_h2_designsetting === 'hukidasidesign') ): //ふきだしデザインでセンター寄せではない場合 ?>
        		.entry-content .h2modoki::before,
        		.entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.entry-content .h2modoki::after,
        		.entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after
        		{
                	left:65px;
        		}
        		.colum1 .entry-content .h2modoki::before,
        		.colum1 .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.colum1 .entry-content .h2modoki::after,
        		.colum1 .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after
        		{
                	left:55px;
        		}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if($st_h3_no_css): //カスタマイザーのCSSを無効化 ?>
	<?php else: ?>
		<?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) &&  $st_h3_design_wide ): ?>
			.entry-content .h3modoki,
			.entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
			{
				margin-left: -30px;
				margin-right: -30px;
				<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:30px;
					padding-right:30px;
				<?php endif; ?>
			}
			.colum1 .entry-content .h3modoki,
			.colum1 .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
			{
				margin-left: -20px;
				margin-right: -20px;
				<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:20px;
					padding-right:20px;
				<?php endif; ?>
			}
			<?php if ( !$st_h3_text_center && ($st_h3_designsetting === 'hukidasidesign') ): //ふきだしデザインでセンター寄せではない場合 ?>
        		.entry-content .h3modoki::before,
        		.entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
        		.entry-content .h3modoki::after,
        		.entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after
        		{
                	left:65px;
        		}
        		.colum1 .entry-content .h3modoki::before,
        		.colum1 .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
        		.colum1 .entry-content .h3modoki::after,
        		.colum1 .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after
        		{
                	left:55px;
        		}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

}

/*media Queries タブレットサイズ（600px～959px）のみで適応したいCSS -タブレットのみ
---------------------------------------------------------------------------------------------------*/
@media only screen and (min-width: 600px) and (max-width: 959px) {

	/*-------------------------------------------
	旧st-kanri.phpより移動（ここから）
	*/

    /*--------------------------------
    各フォント設定
    ---------------------------------*/

	/* ブログカード */
	.post dd h5.st-cardbox-t {
	    font-size: 18px;
	    line-height: 30px;
	}
	/* 記事一覧 */
	dd h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /*TOPとアーカイブ*/
	main .kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a { /*関連記事*/
	    font-size: 18px;
	    line-height: 26px;
	}

    <?php
    // 基本
    $st_tab_p_fontsize = ( isset($GLOBALS['stdata291']) && trim($GLOBALS['stdata291']) !== '' ) ? (int)$GLOBALS['stdata291'] : 20 ;
    $st_tab_p_lineheight = ( isset($GLOBALS['stdata292']) && trim($GLOBALS['stdata292']) !== '' ) ? (int)$GLOBALS['stdata292'] : 30 ;
    // 記事タイトル
    $st_tab_entrytitle_fontsize = ( isset($GLOBALS['stdata293']) && trim($GLOBALS['stdata293']) !== '' ) ? (int)$GLOBALS['stdata293'] : 27 ;
    $st_tab_entrytitle_lineheight = ( isset($GLOBALS['stdata294']) && trim($GLOBALS['stdata294']) !== '' ) ? (int)$GLOBALS['stdata294'] : 40 ;
    // H2タグ
    $st_tab_h2_fontsize = ( isset($GLOBALS['stdata295']) && trim($GLOBALS['stdata295']) !== '' ) ? (int)$GLOBALS['stdata295'] : 24 ;
    $st_tab_h2_lineheight = ( isset($GLOBALS['stdata296']) && trim($GLOBALS['stdata296']) !== '' ) ? (int)$GLOBALS['stdata296'] : 35 ;
    // H3タグ
    $st_tab_h3_fontsize = ( isset($GLOBALS['stdata297']) && trim($GLOBALS['stdata297']) !== '' ) ? (int)$GLOBALS['stdata297'] : 22 ;
    $st_tab_h3_lineheight = ( isset($GLOBALS['stdata298']) && trim($GLOBALS['stdata298']) !== '' ) ? (int)$GLOBALS['stdata298'] : 32 ;
    // H4タグ
    $st_tab_h4_fontsize = ( isset($GLOBALS['stdata299']) && trim($GLOBALS['stdata299']) !== '' ) ? (int)$GLOBALS['stdata299'] : 21 ;
    $st_tab_h4_lineheight = ( isset($GLOBALS['stdata300']) && trim($GLOBALS['stdata300']) !== '' ) ? (int)$GLOBALS['stdata300'] : 31 ;
	// 記事一覧
	$st_tab_itiran_fontsize = ( isset($GLOBALS['stdata472']) && trim($GLOBALS['stdata472']) !== '' ) ? (int)$GLOBALS['stdata472'] : '' ;
	$st_tab_itiran_lineheight = ( isset($GLOBALS['stdata473']) && trim($GLOBALS['stdata473']) !== '' ) ? (int)$GLOBALS['stdata473'] : '' ;
    ?>

    /*基本のフォントサイズ*/
	.post pre,
	.post .wp-block-details summary,
    .post .entry-content p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn), /* テキスト */
    .post .entry-content .st-kaiwa-hukidashi, /* ふきだし */
    .post .entry-content .st-kaiwa-hukidashi2, /* ふきだし */
    .post .entry-content .yellowbox, /* 黄色ボックス */
    .post .entry-content .graybox, /* グレーボックス */
    .post .entry-content .redbox, /* 薄赤ボックス */
    .post .entry-content #topnews .clearfix dd p, /* 一覧文字 */
    .post .entry-content ul li, /* ulリスト */
    .post .entry-content ol li, /* olリスト */
	.post .entry-content #st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul > li, /* 目次用 */
	.post .entry-content .st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul > li, /* 目次用 */
    .post .entry-content #comments #respond, /* コメント */
    .post .entry-content #comments h4, /* コメントタイトル */
	.post .entry-content h5:not(.kanren-t):not(.popular-t):not(.st-cardbox-t), /* H5 */
	.post h5.has-st-regular-font-size,
    .post .entry-content h6,
	.post h6.has-st-regular-font-size,
	.st-tab-content > label, /* タブ */
	.st-tabs__tab-list-item /* タブブロック */
	{
		<?php if( isset($GLOBALS['stdata291']) && trim($GLOBALS['stdata291']) !== '' ): ?>
			font-size: <?php echo $st_tab_p_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata292']) && trim($GLOBALS['stdata292']) !== '' ): ?>
			line-height: <?php echo $st_tab_p_lineheight; ?>px;
		<?php endif; ?>
	}

	/* スライドの抜粋 */
	.post .entry-content .post-slide-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
	.post .entry-content .st-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
	.post .entry-content .st-card-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
	.post .entry-content .kanren:not(.st-cardbox) .clearfix dd p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn){
		<?php if( isset($GLOBALS['stdata291']) && trim($GLOBALS['stdata291']) !== '' ): ?>
			font-size: 16px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata292']) && trim($GLOBALS['stdata292']) !== '' ): ?>
			line-height: 26px;
		<?php endif; ?>
	}

    /* 記事タイトル */
	.st-header-post-data .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-css-no2),
    #contentInner .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-css-no2) {
		<?php if( isset($GLOBALS['stdata293']) && trim($GLOBALS['stdata293']) !== '' ): ?>
			font-size: <?php echo $st_tab_entrytitle_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata294']) && trim($GLOBALS['stdata294']) !== '' ): ?>
			line-height: <?php echo $st_tab_entrytitle_lineheight; ?>px;
		<?php endif; ?>
    }

    /* H2 */
	.post .entry-content h2.has-st-regular-font-size,
    .post .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
    .post .entry-content .h2modoki{
		<?php if( isset($GLOBALS['stdata295']) && trim($GLOBALS['stdata295']) !== '' ): ?>
			font-size: <?php echo $st_tab_h2_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata296']) && trim($GLOBALS['stdata296']) !== '' ): ?>
			line-height: <?php echo $st_tab_h2_lineheight; ?>px;
		<?php endif; ?>
    }

    /* H3 */
	.post .entry-content h3.has-st-regular-font-size,
    .post .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2):not(.post-card-title):not(#reply-title),
    .post .entry-content .h3modoki {
		<?php if( isset($GLOBALS['stdata297']) && trim($GLOBALS['stdata297']) !== '' ): ?>
			font-size: <?php echo $st_tab_h3_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata298']) && trim($GLOBALS['stdata298']) !== '' ): ?>
			line-height: <?php echo $st_tab_h3_lineheight; ?>px;
		<?php endif; ?>
    }

    /* H4 */
	.post .entry-content h4.has-st-regular-font-size,
    .post .entry-content h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2):not(.point),
    .post .entry-content .h4modoki {
		<?php if( isset($GLOBALS['stdata299']) && trim($GLOBALS['stdata299']) !== '' ): ?>
			font-size: <?php echo $st_tab_h4_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata300']) && trim($GLOBALS['stdata300']) !== '' ): ?>
			line-height: <?php echo $st_tab_h4_lineheight; ?>px;
		<?php endif; ?>
    }

    /* 記事一覧 */
	.no-thumbitiran h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /* TOP・アーカイブ（サムネイル無し） */
	.no-thumbitiran h5 a, /* ショートコード一覧（サムネイル無し） */
	dd h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /* TOP・アーカイブ */
	.kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /*関連記事*/
	.st-tab-category .post-card-list .post-card-title a, /* タブ式カテゴリー */
	.post-card-list .post-card-title a, /* カードタイプEX */
	#st-magazine .kanren .st-top-box dd h3, /* JET */
    .kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a {
		<?php if( isset($GLOBALS['stdata472']) && trim($GLOBALS['stdata472']) !== '' ): ?>
			font-size: <?php echo $st_tab_itiran_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata473']) && trim($GLOBALS['stdata473']) !== '' ): ?>
			line-height: <?php echo $st_tab_itiran_lineheight; ?>px;
		<?php endif; ?>
    }

	<?php // ブログカード ?>
	<?php if( trim($GLOBALS['stdata642']) === '' && isset($GLOBALS['stdata637']) && $GLOBALS['stdata637'] === 'yes' ): // サムネイルを非表示が無効 + サムネイルサイズを大きく ?>
		#footer .kanren.st-cardbox dt,
		#side .kanren.st-cardbox dt {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				float: right;
			<?php else: ?>
				float: left;
			<?php endif; ?>

			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif; ?>
		}

		#footer .kanren.st-cardbox dt img,
		#side .kanren.st-cardbox dt img {
			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}

		#footer .kanren.st-cardbox dd,
		#side .kanren.st-cardbox dd {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-right: 315px;
				<?php else: ?>
					padding-right: 165px;
				<?php endif; ?>

				padding-left: 0;
			<?php else: ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-left: 315px;
				<?php else: ?>
					padding-left: 165px;
				<?php endif; ?>
			<?php endif; ?>
		}

		#footer .st-cardstyle .kanren.st-cardbox dd,
		#side .st-cardstyle .kanren.st-cardbox dd,
		#footer .st-cardstyleb .kanren.st-cardbox dd,
		#side .st-cardstyleb .kanren.st-cardbox dd,
		#footer #magazine .kanren.st-cardbox dd,
		#side #magazine .kanren.st-cardbox dd
		#footer #magazine .kanren.st-cardbox dd,
		#side #magazine .kanren.st-cardbox dd {
			padding-left: 20px;
			padding-right: 20px;
		}

		#footer .kanren.st-cardbox dt,
		#side .kanren.st-cardbox dt {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				float: right;
			<?php else: ?>
				float: left;
			<?php endif; ?>

			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}

		#footer .kanren.st-cardbox dt.st-cardbox img,
		#side .kanren.st-cardbox dt.st-cardbox img {
			<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
				width: 300px;
			<?php else: ?>
				width: 200px;
			<?php endif; ?>
		}

		#footer .kanren.st-cardbox dd,
		#side .kanren.st-cardbox dd {
			<?php if(trim($GLOBALS['stdata640']) !== ''): //記事一覧のサムネイルとタイトルを左右変更 ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-right: 315px;
				<?php else: ?>
					padding-right: 215px;
				<?php endif; ?>

				padding-left: 0;
			<?php else: ?>
				<?php if(trim($GLOBALS['stdata638']) !== ''): // さらに大きく ?>
					padding-left: 315px;
				<?php else: ?>
					padding-left: 215px;
				<?php endif; ?>
			<?php endif; ?>
		}

	<?php endif;  ?>

	/*
	旧st-kanri.phpより移動（ここまで）
	-------------------------------------------*/

/*-- ここまで --*/
}


/*media Queries PCサイズ
----------------------------------------------------*/
@media only screen and (min-width: 960px) {

	/*-------------------------------------------
	旧st-kanri.phpより移動（ここから）
	*/

    /*--------------------------------
    各フォント設定
    ---------------------------------*/

	/* ブログカード */
	.post dd h5.st-cardbox-t {
	    font-size: 16px;
	    line-height: 26px;
	}
	/* 記事一覧 */
	dd h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /*TOPとアーカイブ*/
	main .kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a { /*関連記事*/
	    font-size: 16px;
	    line-height: 26px;
	}

    <?php
    // 基本
    $st_pc_p_fontsize = ( isset($GLOBALS['stdata281']) && trim($GLOBALS['stdata281']) !== '' ) ? (int)$GLOBALS['stdata281'] : 15 ;
    $st_pc_p_lineheight = ( isset($GLOBALS['stdata282']) && trim($GLOBALS['stdata282']) !== '' ) ? (int)$GLOBALS['stdata282'] : 27 ;
    // 記事タイトル
    $st_pc_entrytitle_fontsize = ( isset($GLOBALS['stdata283']) && trim($GLOBALS['stdata283']) !== '' ) ? (int)$GLOBALS['stdata283'] : 27 ;
    $st_pc_entrytitle_lineheight = ( isset($GLOBALS['stdata284']) && trim($GLOBALS['stdata284']) !== '' ) ? (int)$GLOBALS['stdata284'] : 40 ;
    // H2タグ
    $st_pc_h2_fontsize = ( isset($GLOBALS['stdata285']) && trim($GLOBALS['stdata285']) !== '' ) ? (int)$GLOBALS['stdata285'] : 22 ;
    $st_pc_h2_lineheight = ( isset($GLOBALS['stdata286']) && trim($GLOBALS['stdata286']) !== '' ) ? (int)$GLOBALS['stdata286'] : 32 ;
    // H3タグ
    $st_pc_h3_fontsize = ( isset($GLOBALS['stdata287']) && trim($GLOBALS['stdata287']) !== '' ) ? (int)$GLOBALS['stdata287'] : 20 ;
    $st_pc_h3_lineheight = ( isset($GLOBALS['stdata288']) && trim($GLOBALS['stdata288']) !== '' ) ? (int)$GLOBALS['stdata288'] : 30 ;
    // H4タグ
    $st_pc_h4_fontsize = ( isset($GLOBALS['stdata289']) && trim($GLOBALS['stdata289']) !== '' ) ? (int)$GLOBALS['stdata289'] : 16 ;
    $st_pc_h4_lineheight = ( isset($GLOBALS['stdata290']) && trim($GLOBALS['stdata290']) !== '' ) ? (int)$GLOBALS['stdata290'] : 26 ;
    // 記事一覧
    $st_pc_itiran_fontsize = ( isset($GLOBALS['stdata474']) && trim($GLOBALS['stdata474']) !== '' ) ? (int)$GLOBALS['stdata474'] : '' ;
    $st_pc_itiran_lineheight = ( isset($GLOBALS['stdata475']) && trim($GLOBALS['stdata475']) !== '' ) ? (int)$GLOBALS['stdata475'] : '' ;
    ?>

    /*基本のフォントサイズ*/
	.post pre,
	.post .wp-block-details summary,
    .post .entry-content p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn), /* テキスト */
    .post .entry-content .st-kaiwa-hukidashi, /* ふきだし */
    .post .entry-content .st-kaiwa-hukidashi2, /* ふきだし */
    .post .entry-content .yellowbox, /* 黄色ボックス */
    .post .entry-content .graybox, /* グレーボックス */
    .post .entry-content .redbox, /* 薄赤ボックス */
    .post .entry-content #topnews .clearfix dd p, /* 一覧文字 */
    .post .entry-content ul li, /* ulリスト */
    .post .entry-content ol li, /* olリスト */
	.post .entry-content #st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul > li, /* 目次用 */
	.post .entry-content .st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul > li, /* 目次用 */
    .post .entry-content #comments #respond, /* コメント */
    .post .entry-content #comments h4, /* コメントタイトル */
	.post .entry-content h5:not(.kanren-t):not(.popular-t):not(.st-cardbox-t), /* H5 */
	.post h5.has-st-regular-font-size,
    .post .entry-content h6,
	.post h6.has-st-regular-font-size,
	.st-tab-content > label, /* タブ */
	.st-tabs__tab-list-item /* タブブロック */
	{
		<?php if( isset($GLOBALS['stdata281']) && trim($GLOBALS['stdata281']) !== '' ): ?>
			font-size: <?php echo $st_pc_p_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata282']) && trim($GLOBALS['stdata282']) !== '' ): ?>
			line-height: <?php echo $st_pc_p_lineheight; ?>px;
		<?php endif; ?>
	}

	/* スライドの抜粋 */
	.post .entry-content .post-slide-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
	.post .entry-content .st-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
	.post .entry-content .st-card-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
	.post .entry-content .kanren:not(.st-cardbox) .clearfix dd p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn){
		<?php if( isset($GLOBALS['stdata281']) && trim($GLOBALS['stdata281']) !== '' ): ?>
			font-size: 13px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata282']) && trim($GLOBALS['stdata282']) !== '' ): ?>
			line-height: 18px;
		<?php endif; ?>
	}

    /* 記事タイトル */
	.st-header-post-data .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-css-no2),
    #contentInner .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-css-no2) {
		<?php if( isset($GLOBALS['stdata283']) && trim($GLOBALS['stdata283']) !== '' ): ?>
			font-size: <?php echo $st_pc_entrytitle_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata284']) && trim($GLOBALS['stdata284']) !== '' ): ?>
			line-height: <?php echo $st_pc_entrytitle_lineheight; ?>px;
		<?php endif; ?>
    }

    /* H2 */
	.post .entry-content h2.has-st-regular-font-size,
    .post .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
    .post .entry-content .h2modoki{
		<?php if( isset($GLOBALS['stdata285']) && trim($GLOBALS['stdata285']) !== '' ): ?>
			font-size: <?php echo $st_pc_h2_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata286']) && trim($GLOBALS['stdata286']) !== '' ): ?>
			line-height: <?php echo $st_pc_h2_lineheight; ?>px;
		<?php endif; ?>
    }

    /* H3 */
	.post .entry-content h3.has-st-regular-font-size,
    .post .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2):not(.post-card-title):not(#reply-title),
    .post .entry-content .h3modoki {
		<?php if( isset($GLOBALS['stdata287']) && trim($GLOBALS['stdata287']) !== '' ): ?>
			font-size: <?php echo $st_pc_h3_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata288']) && trim($GLOBALS['stdata288']) !== '' ): ?>
			line-height: <?php echo $st_pc_h3_lineheight; ?>px;
		<?php endif; ?>
    }

    /* H4 */
	.post .entry-content h4.has-st-regular-font-size,
    .post .entry-content h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2):not(.point),
    .post .entry-content .h4modoki {
		<?php if( isset($GLOBALS['stdata289']) && trim($GLOBALS['stdata289']) !== '' ): ?>
			font-size: <?php echo $st_pc_h4_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata290']) && trim($GLOBALS['stdata290']) !== '' ): ?>
			line-height: <?php echo $st_pc_h4_lineheight; ?>px;
		<?php endif; ?>
    }

    /* 記事一覧 */
	.no-thumbitiran h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /* TOP・アーカイブ（サムネイル無し） */
	.no-thumbitiran h5 a, /* ショートコード一覧（サムネイル無し） */
    dd h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /* TOP・アーカイブ */
	.kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /*関連記事*/
	.st-tab-category .post-card-list .post-card-title a, /* タブ式カテゴリー */
	.post-card-list .post-card-title a, /* カードタイプEX */
	#st-magazine .kanren .st-top-box dd h3, /* JET */
    .post .kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a {
		<?php if( isset($GLOBALS['stdata474']) && trim($GLOBALS['stdata474']) !== '' ): ?>
			font-size: <?php echo $st_pc_itiran_fontsize; ?>px!important;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata475']) && trim($GLOBALS['stdata475']) !== '' ): ?>
			line-height: <?php echo $st_pc_itiran_lineheight; ?>px;
		<?php endif; ?>
    }
	/* サイドバー記事一覧 */
	#footer .kanren .clearfix dd h5 a,
	#side dd h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a,
	#side .kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a {
		font-size: .95em!important;
	}

	/*--------------------------------
	全体のサイズ
	---------------------------------*/

	.st-content-width, /* 汎用 */
	#st-menuwide, /*メニュー*/
	nav.smanone,
	nav.st5,
	#st-header-cardlink,
	#st-menuwide div.menu,
	#st-menuwide nav.menu,
	#st-header, /*ヘッダー*/
	#st-header-under-widgets-box, /*ヘッダー画像下ウィジェット*/
	#st-footer-under-widgets-box, /*フッターバナーエリア*/
	#content, /*コンテンツ*/
	#footer-in /*フッター*/
	 {
		max-width:<?php echo $st_pc_width; ?>px;
	}

	 /* LPワイド */
	.st-lp-wide #content,
	.st-lp-wide #footer
	 {
		max-width:100%;
	}

	#headbox
	{
			max-width:<?php echo $st_pc_header_width; ?>px;
	}

	.st-content-width {
		margin: 0 auto;
	}

	<?php if ( ! $st_header_info_100 ): // ヘッダーインフォメーション 横幅を100%にするが無効 ?>
		#st-header-top-widgets-box-wrapper.st-header-fixed,
		#st-header-top-widgets-box {
			max-width:<?php echo $st_pc_header_width; ?>px;
			margin: 0 auto;
		}
	<?php endif; ?>

	<?php if ( ! $st_header_under_100 ): // サムネイルスライドショー 横幅を100%にするが無効 ?>
		#st-header-under-widgets-box-wrap {
			max-width:<?php echo $st_pc_header_width; ?>px;
			margin: 0 auto;
		}
	<?php endif; ?>

	<?php if ( ! $st_footer100 ): // フッター 横幅を100%にするが無効 ?>
		#st-footer-under-widgets-box-wrap {
			max-width:<?php echo $st_pc_width; ?>px;
			margin: 0 auto;
		}
	<?php endif; ?>

	<?php if ( isset( $GLOBALS['stdata239'] ) && trim( $GLOBALS['stdata239'] ) !== '' ) : //1カラムのwidth
		$st_colum1_width = (int) $GLOBALS['stdata239'];
	else:
		$st_colum1_width = $st_pc_width;
	endif; ?>

	/*1カラムの幅のサイズ*/
	.colum1:not(.st-lp-wide) .st-content-width, /* 記事ごとのヘッダー */
	.colum1:not(.st-lp-wide) #st-header-cardlink, /* ヘッダーバナーリンク */
	.colum1:not(.st-lp-wide) #st-header-under-widgets-box,
	.colum1:not(.st-lp-wide) #st-footer-under-widgets-box,
	.colum1:not(.st-lp-wide) #content {
    	max-width: <?php echo $st_colum1_width; ?>px;
	}

	.colum1.lp:not(.st-lp-wide) footer{
    	max-width: <?php echo $st_colum1_width; ?>px;
		margin: 0 auto;
	}

	/* ワイドLPの左右にシャドウ -EX */
	.colum1.st-lp-wide #st-header,
	.colum1.st-lp-wide > .wp-block-cover__inner-container, /* カバーブロック */
	.colum1.st-lp-wide #content .wp-block-group.is-style-st-wide-background .wp-block-group__inner-container, /* Gutenbergグループボックス ワイド有効時 */
	.colum1.st-lp-wide #content .wp-block-cover.alignfull .wp-block-cover__inner-container, /* Gutenbergカバーボックス 幅広 */
	.colum1.st-lp-wide #content .st-lp-wide-content,
	.colum1.st-lp-wide #content .rankh3,
	.colum1.st-lp-wide #content .rank-guide,
	.colum1.st-lp-wide #content .rankid1,
	.colum1.st-lp-wide #content .rankid2,
	.colum1.st-lp-wide #content .rankid3,
	.colum1.st-lp-wide #content .rankst-box,
	.colum1.st-lp-wide .rankst-wrap,
	.colum1.st-lp-wide .widget_text,
	.colum1.st-lp-wide .top-wbox-u,
	.colum1.st-lp-wide .entry-title,
	.colum1.st-lp-wide #st-page .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
	.colum1.st-lp-wide #breadcrumb,
	.colum1.st-lp-wide .blogbox,
	.colum1.st-lp-wide .st-catgroup,
	.colum1.st-lp-wide .adbox,
	.colum1.st-lp-wide .st-widgets-box,
	.colum1.st-lp-wide .sns,
	.colum1.st-lp-wide .tagst,
	.colum1.st-lp-wide aside,
	.colum1.st-lp-wide .kanren,
	.colum1.st-lp-wide #topnews-box,
	.colum1.st-lp-wide .st-tab-category
	{
    	max-width: <?php echo $st_colum1_width; ?>px;
		margin-left: auto;
		margin-right: auto;
		box-sizing: border-box;
	}

	.colum1.st-lp-wide .kanren.st-cardbox,
	.colum1.st-lp-wide .kanren.shortcode-kanren {
		max-width: inherit;
	}

	.st-lp-wide .st-lp-wide-wrapper {
    	margin-bottom: 20px;
	}

	<?php if ( isset($GLOBALS['stdata375']) && $GLOBALS['stdata375'] === 'yes' ): // ワイドLPの左右にシャドウ -EX ?>
		.colum1.st-lp-wide.st-lp-wide-shadow #st-header,
		.colum1.st-lp-wide.st-lp-wide-shadow .st-eyecatch
		{
			max-width: calc(<?php echo $st_colum1_width; ?>px + 80px);
			margin-left: auto;
			margin-right: auto;
		}

		<?php if ( !$st_footer100 ): //100%ではない場合 ?>
			.colum1.st-lp-wide.st-lp-wide-shadow #footer,
			.colum1.st-lp-wide.st-lp-wide-shadow #footer-in
			{
				max-width: calc(<?php echo $st_colum1_width; ?>px + 80px);
				margin-left: auto;
				margin-right: auto;
			}

			.colum1.st-lp-wide #footer {
				padding-left: 0;
				padding-right: 0;
			}
		<?php endif; ?>

		.colum1.st-lp-wide.st-lp-wide-shadow .st-lp-wide-content{
			padding:40px 40px;
		}
		.colum1.st-lp-wide.st-lp-wide-shadow .st-lp-wide-eyecatch{
			margin: -60px -40px 0;
		}
		.colum1.st-lp-wide .st-lp-wide-eyecatch-width{
			margin: 0 -40px 20px;
		}
	<?php endif; ?>

	/* ヘッダー画像/記事スライドショー横並び */
	<?php if ( trim( $GLOBALS['stdata274'] ) !== '' || trim( $GLOBALS['stdata272'] ) !== '' ): ?>
		#header-slides .slick-list {
			overflow: visible !important;
		}
		#st-headerbox {
			overflow:hidden;
		}
	<?php endif; ?>

	<?php if ( trim( $GLOBALS['stdata428'] ) !== '' || trim( $GLOBALS['stdata428'] ) !== '' ) : // ヘッダーメニュー（横列）が有効
			if ( isset( $GLOBALS['stdata128'] ) && trim( $GLOBALS['stdata128'] ) !== '' ) : //全体のwidth
        		$st_pc_header_right_width = ( (int) $GLOBALS['stdata128'] ) - 320 ;
			else:
        		$st_pc_header_right_width = 740;
			endif; ?>
		/* ヘッダーメニュー（横列） */
		#headbox {
			display: flex;
			align-items: center;
		}
		#header-l {
			width: 300px;
		}
		#header-r {
			max-width: <?php echo $st_pc_header_right_width; ?>px;
		}
		#header-r .footermenubox.st-menu-side-box {
			margin-bottom: 0;
			width:  <?php echo $st_pc_header_right_width; ?>px;
			text-align: right;
		}
		#header-r .footermenubox.st-menu-side-box ul {
			display: flex;
			flex-direction: row;
			justify-content: flex-end;
			align-items: center;
			flex-wrap: wrap;
		}
		#header-r .footermenust.st-menu-side {
			padding-right: 0;
		}
		#header-r .footermenust.st-menu-side a {
			font-size: 14px;
			font-weight: bold;
		}
		#header-r .footermenust.st-menu-side a span {
			font-size: 12px;
			display: block;
			margin-top: -7px;
			opacity: 0.8;
			font-weight: normal;
		}
		#header-r .footermenust.st-menu-side li {
			padding: 2px 20px;
			line-height: 2;
			border: none;
			text-align:center;
		}
	<?php endif;?>

	<?php if( $st_stdata29 ): // サイドバーを左にする ?>

        /*--------------------------------
        PCのレイアウト（左サイドバー）
        ---------------------------------*/

        #contentInner {
            float: right;
            width: 100%;
            margin-left: -320px;
        }

        main {
            margin-right: 0px;
            margin-left: 320px;
            background-color: #fff;
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            padding: 30px 50px 30px;
        }

        #side aside {
            float: left;
            width: 300px;
            padding: 0px;
        }

    <?php else: ?>

        /*--------------------------------
        PCのレイアウト（右サイドバー）
        ---------------------------------*/

        #contentInner {
            float: left;
            width: 100%;
            margin-right: -300px;
        }

        main {
            margin-right: 320px;
            margin-left: 0px;
            background-color: #fff;
            border-radius: 4px;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            padding: 30px 50px 30px;
        }

        #side aside {
            float: right;
            width: 300px;
            padding: 0px;
        }


    <?php endif;  ?>

    /**
     * サイト名とキャッチフレーズ有無の調整
     */

    <?php if( (trim($GLOBALS['stdata101']) !== '') || ( !st_is_mobile() && (trim($GLOBALS['stdata18']) !== '')) ): //サイト名がなくヘッダーにフッターメニューを表示した場合のパディングの調整 ?>
        header .descr {
                padding:0px;
            margin:0;
        }
    <?php endif; ?>

    <?php if(trim($GLOBALS['stdata101']) !== ''): //サイト名が非表示ならキャッチフレーズのパディングを少なめに ?>
        #headbox {
            padding: 5px 10px!important;
        }
    <?php endif; ?>

    <?php if( (!is_active_sidebar( 8 )) && (trim($GLOBALS['stdata42']) === '') ): //電話番号もヘッダーウィジェットも無い場合 ?>
        #header-r .footermenust {
            margin: 0;
        }
    <?php endif; ?>

    <?php if(trim($GLOBALS['stdata102']) !== '' ): //キャッチフレーズが非表示なら ?>
        header .sitename {
                padding: 5px;
            margin: 0;
            <?php if( get_option( 'st_logo_image' )): //ロゴ画像があるなら ?>
                line-height:0;
                font-size:1px;
            <?php endif; ?>
        }
        #headbox {
            padding: 5px 10px!important;
        }
    <?php endif; ?>

    <?php if(trim($GLOBALS['stdata105']) !== ''): //ヘッダーをセンタリング ?>
        #st-headwide #headbox {
			display: flex;
			justify-content: center;
			<?php if ( get_option( 'st_icon_logo' ) ): //アイコンロゴ画像がある時 ?>
			<?php else: ?>
				text-align: center;
			<?php endif; ?>
        }
    <?php endif; ?>

    <?php if(trim($GLOBALS['stdata142']) !== ''): ?>
        /*PCアドセンスを横並び*/
        .adbox::after {
            content: "";
            display: block;
            clear: both;
        }
        .adbox div {
            float:left;
            margin-right:20px;
            padding-top:0!important;
            padding-bottom:10px;
        }

        .adbox div:last-child {
            margin-right:0px;
        }
    <?php endif;  ?>

    <?php if(trim($GLOBALS['stdata96']) === ''): ?>
        /*TOC+*/
        #toc_container {
            padding-left: 30px;
            padding-right: 30px;
        }

        #toc_container > ul > li {
            font-size: 16px;
        }
    <?php endif;  ?>

    /*
    旧st-kanri.phpより移動（ここまで）
    -------------------------------------------*/

	/*TOC+*/
	#toc_container:not(.contracted) { /* 表示状態 */
		<?php if($st_toc_bgcolor): ?>
			padding:20px 40px 10px;
		<?php endif;  ?>
		<?php if($st_toc_bordercolor): ?>
			padding:20px 40px 10px;
		<?php endif;  ?>
	}

	<?php if ( $st_wrapper_bgcolor ): //サイト全体を包括する背景色 ?>
		/* サイト全体を包括する背景色 */
		#headbox {
			max-width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
							$st_pc_width = ( $GLOBALS['stdata128'] ) + 40;
						else:
							$st_pc_width = 1100;
						endif;
					echo $st_pc_width;
					?>px;
			margin: 0 -20px !important;
		}
	<?php endif; ?>

	<?php if ( ( $st_header100 ) && ( $st_wrapper_bgcolor ) ): // ヘッダー背景の横幅を100%にする + サイト全体を包括する背景色 ?>
		#content-w {
			max-width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
							$st_pc_width = ( $GLOBALS['stdata128'] ) + 40;
						else:
							$st_pc_width = 1100;
						endif;
					echo $st_pc_width;
					?>px;
			margin: 0 -20px !important;
		}
	<?php endif; ?>

	<?php if ( $st_sticky_menu ): ?>
		#headbox {
			padding: 15px 10px;
		}
	<?php endif; ?>

	/* メイン画像100% */
	<?php if ( $st_headerimg100 ): ?>
		.colum1.st-lp-wide #st-header,
		#st-header {
			max-width: 100%;
			<?php if ( $st_wrapper_bgcolor ): ?>
				margin: 0 -20px !important;
				max-width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
								$st_pc_width = ( $GLOBALS['stdata128'] ) + 40;
							else:
								$st_pc_width = 1100;
							endif;
							echo $st_pc_width;
							?>px;
			<?php endif; ?>
		}

		#st-header img {
			width: 100%;
		}
	<?php endif; ?>

	/*wrapperに背景がある場合*/
	<?php if ( $st_wrapper_bgcolor ): ?>
	#wrapper-in {
		padding: 0 20px;
	}

	#footer {
		margin: 0 -20px;
		max-width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
					$st_pc_width = ( $GLOBALS['stdata128'] ) + 40;
					else:
						$st_pc_width = 1100;
					endif;
				echo $st_pc_width;
				?>px;
	}
	<?php endif; ?>

	/*メニュー*/
	#st-menuwide {
		<?php if ( $menu_navbar_topunder_color ): ?>
			border-top-color: <?php echo $menu_navbar_topunder_color; ?>;
			border-bottom-color: <?php echo $menu_navbar_topunder_color; ?>;
		<?php else: ?>
			border-top: none;
			border-bottom: none;
		<?php endif; ?>

		<?php if ( $menu_navbar_side_color ): ?>
			border-left-color: <?php echo $menu_navbar_side_color; ?>;
			border-right-color: <?php echo $menu_navbar_side_color; ?>;
		<?php else: ?>
			border-left: none;
			border-right: none;
		<?php endif; ?>
	}

	<?php // トップページのみ除外する
	if ( $st_menu_navbar_front_exclusion_set ):
		$st_menu_navbar_front_exclusion = 'body:not(.front-page) ';
	else:
		$st_menu_navbar_front_exclusion = '';
	endif; ?>

	<?php if ( $st_menu_navbar_front_exclusion ): ?>
		body.front-page #st-menuwide {
			background: none;
			background-color: transparent;
		}
	<?php endif; ?>

	<?php echo $st_menu_navbar_front_exclusion; ?>#st-menuwide {
		<?php if ( $st_navbarcolor_gradient ): //グラデーションを横向きにする
				$navbarcolor_gradient_w = 'left';
				$navbarcolor_gradient = 'left';
			else :
				$navbarcolor_gradient_w = 'top';
				$navbarcolor_gradient = 'bottom';
			endif;
		?>

		<?php if ( ( trim( $menu_navbarcolor ) !== '' ) && ( trim( $menu_navbarcolor_t ) !== '' ) ): ?>
			/*Other Browser*/
			background: <?php echo $menu_navbarcolor; ?>;
			/* Android4.1 - 4.3 */
			background: url("<?php echo $st_headermenu_bgimg; ?>"), -webkit-linear-gradient(<?php echo $navbarcolor_gradient_w; ?>,  <?php echo $menu_navbarcolor_t; ?> 0%,<?php echo $menu_navbarcolor; ?> 100%);

			/* IE10+, FF16+, Chrome26+ */
			background: url("<?php echo $st_headermenu_bgimg; ?>"), linear-gradient(to <?php echo $navbarcolor_gradient; ?>,  <?php echo $menu_navbarcolor_t; ?> 0%,<?php echo $menu_navbarcolor; ?> 100%);
		<?php elseif ( ( trim( $menu_navbarcolor ) !== '' ) && ( trim( $menu_navbarcolor_t ) === '' ) ): //下部には色がある場合 ?>
			background-image: url("<?php echo $st_headermenu_bgimg; ?>");
			background-color: <?php echo $menu_navbarcolor; ?>;
		<?php else: ?>
			background-color: transparent;
			<?php if( $st_headermenu_bgimg ): //背景画像がある場合 ?>
				background: url("<?php echo $st_headermenu_bgimg; ?>");
			<?php else: ?>
				background: none;
			<?php endif; ?>
		<?php endif; ?>
	}

	<?php if( $st_headermenu_bgimg ): //背景画像がある場合 ?>
		<?php echo $st_menu_navbar_front_exclusion; ?>#st-menuwide {
			background-position: <?php echo $st_headermenu_bgimg_side; ?> <?php echo $st_headermenu_bgimg_top; ?>;
			<?php if ( $st_headermenu_bgimg_repeat ): ?>
				background-repeat: no-repeat;
			<?php endif; ?>
		}
	<?php endif; ?>

	<?php if( $st_menu_width ): //PCメニューの幅 ?>
		header .smanone ul.menu li{
			width: <?php echo $st_menu_width; ?>px;
		}
		header .smanone ul.sub-menu li ul.sub-menu{
			left: <?php echo $st_menu_width; ?>px;
		}
	<?php else: ?>
		header .smanone ul.menu li{
			width:160px;
		}
		header .smanone ul.sub-menu li ul.sub-menu{
			left:160px;
		}
	<?php endif; ?>

	header .smanone ul.menu li,
	header nav.st5 ul.menu  li,
	header nav.st5 ul.menu  li,
	header #st-menuwide div.menu li,
	header #st-menuwide nav.menu li
	{
	<?php if ( $menu_navbar_right_color ): ?>
		border-right-color: <?php echo $menu_navbar_right_color; ?>;
	<?php else: ?>
		border-right: none;
	<?php endif; ?>
	}

	header .smanone ul.menu li li,
	header nav.st5 ul.menu li li,
	header #st-menuwide div.menu li li,
	header #st-menuwide nav.menu li li {
    	border:none;
	}

	<?php if ( $menu_navbartextcolor ): // テキストカラーとマウスオーバー ?>
	header .smanone ul.menu li a,
	header nav.st5 ul.menu  li a,
	header #st-menuwide div.menu li a,
	header #st-menuwide nav.menu li a,
	header .smanone ul.menu li a:hover,
	header nav.st5 ul.menu  li a:hover,
	header #st-menuwide div.menu li a:hover,
	header #st-menuwide nav.menu li a:hover{
		color: <?php echo $menu_navbartextcolor; ?>;
	}
	<?php endif; ?>

	header .smanone ul.menu li:hover,
	header nav.st5 ul.menu  li:hover,
	header #st-menuwide div.menu li:hover,
	header #st-menuwide nav.menu li:hover{
		background: rgba(255,255,255,0.1);
	}

	header .smanone ul.menu li li a:hover,
	header nav.st5 ul.menu  li li a:hover,
	header #st-menuwide div.menu li li a:hover,
	header #st-menuwide nav.menu li li a:hover{
		opacity:0.9;
	}

	<?php if($st_menu_bold ): //第一階層を太字にする ?>
		header .smanone ul.menu li a,
		header nav.st5 ul.menu  li a,
		header #st-menuwide div.menu li a,
		header #st-menuwide nav.menu li a  {
			font-weight:bold;
		}
		header .smanone ul.menu li li a,
		header nav.st5 ul.menu  li li a,
		header #st-menuwide div.menu li a,
		header #st-menuwide nav.menu li a  {
			font-weight:normal;
		}
	<?php endif; ?>

	<?php if (( $menu_navbar_undercolor ) || ( $menu_navbarcolor )): ?>
		header .smanone ul.menu li li a {
		<?php if ( $menu_navbar_undercolor ): ?>
			background: <?php echo $menu_navbar_undercolor; ?>;
		<?php endif; ?>
		}
	<?php endif; ?>

	/*メニューの上下のパディング*/
	<?php if ( isset( $st_menu_padding ) && ( $st_menu_padding === 'top10' ) ): ?>
		#st-menubox {
			padding-top: 10px;
		}
	<?php elseif ( isset( $st_menu_padding ) && ( $st_menu_padding === 'bottom10' ) ): ?>
		#st-menubox {
			padding-bottom: 10px;
		}
	<?php else: ?>
	<?php endif; ?>


	/* グローバルメニュー */
	<?php if ( $st_menu100 ): // 100%に ?>
		#st-menuwide {
			max-width: 100%;
			<?php if ( $st_wrapper_bgcolor ): ?>
				margin: 0 -20px !important;
				max-width: <?php if(trim($GLOBALS['stdata128']) !== ''): //全体のwidth
								$st_pc_width = ( $GLOBALS['stdata128'] ) + 40;
							else:
								$st_pc_width = 1100;
							endif;
						echo $st_pc_width;
						?>px;
			<?php endif; ?>
		}
	<?php endif; ?>

	<?php if ( $st_menu_center ): // センタ―寄せ ?>
		header .smanone ul.menu {
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
			-webkit-justify-content: center;
			-ms-flex-pack: center;
			justify-content: center;
    		-webkit-box-lines:multiple;
    		-webkit-flex-wrap:wrap;
    		-ms-flex-wrap:wrap;
    		flex-wrap:wrap;
		}
	<?php endif; ?>

	<?php if ( $menu_st_header_tel_color ): ?>
		/*ヘッダーの電話番号とリンク色*/
		.head-telno a, #header-r .footermenust a {
			color: <?php echo $menu_st_header_tel_color; ?>;
		}
	<?php endif; ?>

	<?php if ( $menu_st_header_tel_color ): ?>
		#header-r .footermenust li {
			border-right-color: <?php echo $menu_st_header_tel_color; ?>;
		}
	<?php endif; ?>

	<?php if ( $menu_osusumemidasicolor ): ?>
		/*トップ用おすすめタイトル*/
		.nowhits .pop-box {
			border-top-color: <?php echo $menu_osusumemidasicolor; ?>;
		}
	<?php endif; ?>

	/*記事エリアを広げる*/
	<?php if ( $st_area ): ?>
		main {
			padding: 30px 20px;
		}

		.st-eyecatch {
			margin: -30px -20px 10px;
		}

		.is-style-st-eyecatch-width,
		.st-eyecatch-width
		{
			margin: 0 -20px 20px;
		}
	<?php endif; ?>

	/*強制センタリング・中央寄せ
	------------------------------------------------------------*/
	<?php if($st_entrytitle_no_css): //カスタマイザーのCSSを無効化 ?>
	<?php else: //タイトル ?>
		<?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) && $st_entrytitle_design_wide ): // LP・1カラム時を全てワイド化する（β）が無効又は1カラム及びLPではない + デザイン幅一杯 ?>
			.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
			.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
        		<?php if ( $st_area ): //記事幅が広い場合 ?>
					margin-left: -20px;
					margin-right: -20px;
        		<?php else: ?>
					margin-left: -50px;
					margin-right: -50px;
            	<?php endif; ?>

				<?php if ( ($st_entrytitle_designsetting !== 'dotdesign') && ($st_entrytitle_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						padding-left:20px;
						padding-right:20px;
        			<?php else: ?>
						padding-left:50px;
						padding-right:50px;
            		<?php endif; ?>
				<?php endif; ?>
			}
			.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
			.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
				margin-left: -70px;
				margin-right: -70px;
				<?php if ( ($st_entrytitle_designsetting !== 'dotdesign') && ($st_entrytitle_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:70px;
					padding-right:70px;
				<?php endif; ?>
			}

			<?php if ( $menu_main_bordercolor && isset( $st_entrytitle_designsetting ) && ( $st_entrytitle_designsetting === 'leftlinedesign') ): // mainエリアの周りのボーダー + 左ラインのみ場合 ?>
				@media print, screen and (min-width: 960px) {
					.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
					.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
					{
						<?php if ( $st_area ): //記事幅が広い場合 ?>
							margin-left: -21px;
						<?php else: ?>
							margin-left: -51px;
						<?php endif; ?>

						<?php if ( ($st_entrytitle_designsetting !== 'dotdesign') && ($st_entrytitle_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
							<?php if ( $st_area ): //記事幅が広い場合 ?>
								padding-left:21px;
							<?php else: ?>
								padding-left:51px;
							<?php endif; ?>
						<?php endif; ?>
					}
					.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
					.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
					{
						margin-left: -71px;
						<?php if ( ($st_entrytitle_designsetting !== 'dotdesign') && ($st_entrytitle_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
							padding-left:71px;
						<?php endif; ?>
					}
				}
			<?php endif; ?>

			<?php if ( isset( $st_entrytitle_designsetting ) && ( $st_entrytitle_designsetting === 'hukidasidesign_under') ): //吹き出し下線デザインの場合 ?>
				.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					left: 70px;
				}
				.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					left: 73px;
				}
				/* 1カラム時 */
				.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					left: 90px;
				}
				.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					left: 93px;
				}
			<?php endif; ?>

			<?php if ( isset( $st_entrytitle_designsetting ) && ( $st_entrytitle_designsetting === 'checkboxdesign' || $st_entrytitle_designsetting === 'linedesign') &&  ! $st_entrytitle_bgimg_leftpadding ): //左余白が空でチェックボックス又は左囲みデザインの場合 ?>
        		.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
        		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						left: 20px;
        			<?php else: ?>
						left: 50px;
            		<?php endif; ?>
				}
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						<?php if ( $st_entrytitle_designsetting === 'checkboxdesign' ): ?>
							padding-left: calc(1.5em + 35px)!important;
						<?php else: ?>
							padding-left:40px;
							padding-right:40px;
						<?php endif; ?>
        			<?php else: ?>
						<?php if ( $st_entrytitle_designsetting === 'checkboxdesign' ): ?>
							padding-left: calc(1.5em + 65px)!important;
						<?php else: ?>
							padding-left:70px;
							padding-right:70px;
							border-left:none;
							border-right:none;
						<?php endif; ?>
            		<?php endif; ?>
				}

				/* 1カラム時 */
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					left: 70px;
				}
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					<?php if ( $st_entrytitle_designsetting === 'checkboxdesign' ): ?>
						padding-left: calc(1.5em + 90px)!important;
					<?php else: ?>
						padding-left: 100px!important;
					<?php endif; ?>
						border-left:none;
						border-right:none;
				}
			<?php endif; ?>

			<?php if ( isset( $st_entrytitle_designsetting ) && ( $st_entrytitle_designsetting === 'centerlinedesign') &&  ! $st_entrytitle_bgimg_leftpadding ): //左余白が空でセンターラインデザインの場合 ?>
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no),
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no){
					padding-left: 70px!important;
					padding-right: 70px!important;
				}
			<?php endif; ?>

			<?php if ( isset( $st_entrytitle_designsetting ) && ( $st_entrytitle_designsetting === 'dotdesign') &&  ! $st_entrytitle_bgimg_leftpadding ): //左余白が空で囲みドットデザインの場合 ?>
        		.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design,
        		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design {
					<?php if ( $st_area ): //記事幅が広い場合 ?>
						padding-left:20px;
						padding-right:20px;
					<?php else: ?>
						padding-left: 50px;
						padding-right: 50px;
					<?php endif; ?>
				}
				/* 1カラム時 */
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design,
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design {
					padding-left: 70px!important;
					padding-right: 70px!important;
				}
			<?php endif; ?>

			<?php if ( !$st_entrytitle_text_center && ($st_entrytitle_designsetting === 'hukidasidesign') ): //ふきだしデザインでセンター寄せではない場合 ?>
        		.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
        		.post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after
        		{
               		left:80px;
        		}
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.colum1 .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after,
        		.colum1 .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after
        		{
               		left:100px;
        		}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if($st_h2_no_css): //カスタマイザーのCSSを無効化 ?>
	<?php else: //h2 ?>
		<?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) &&  $st_h2_design_wide ): ?>
			.entry-content .h2modoki,
			.entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
        		<?php if ( $st_area ): //記事幅が広い場合 ?>
					margin-left: -20px;
					margin-right: -20px;
        		<?php else: ?>
					margin-left: -50px;
					margin-right: -50px;
            	<?php endif; ?>

				<?php if ( ($st_h2_designsetting !== 'dotdesign') && ($st_h2_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						padding-left:20px;
						padding-right:20px;
        			<?php else: ?>
						padding-left:50px;
						padding-right:50px;
            		<?php endif; ?>
				<?php endif; ?>
			}
			.colum1 .entry-content .h2modoki,
			.colum1 .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
			{
				margin-left: -70px;
				margin-right: -70px;
				<?php if ( ($st_h2_designsetting !== 'dotdesign') && ($st_h2_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:70px;
					padding-right:70px;
				<?php endif; ?>
			}

			<?php if ( $menu_main_bordercolor && isset( $st_h2_designsetting ) && ( $st_h2_designsetting === 'leftlinedesign') ): // mainエリアの周りのボーダー + 左ラインのみ場合 ?>
				@media print, screen and (min-width: 960px) {
					.entry-content .h2modoki,
					.entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)
					{
						<?php if ( $st_area ): //記事幅が広い場合 ?>
							margin-left: -21px;
						<?php else: ?>
							margin-left: -51px;
						<?php endif; ?>

						<?php if ( ($st_h2_designsetting !== 'dotdesign') && ($st_h2_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
							<?php if ( $st_area ): //記事幅が広い場合 ?>
								padding-left:21px;
							<?php else: ?>
								padding-left:51px;
							<?php endif; ?>
						<?php endif; ?>
					}
				}
			<?php endif; ?>

			<?php if ( isset( $st_h2_designsetting ) && ( $st_h2_designsetting === 'hukidasidesign_under') ): //吹き出し下線デザインの場合 ?>
				.h2modoki::before,
				h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					left: 70px;
				}
				.h2modoki::after,
				h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					left: 73px;
				}
				/* 1カラム時 */
				.colum1 .h2modoki::before,
				.colum1 h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before {
					left: 90px;
				}
				.colum1 .h2modoki::after,
				.colum1 h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after {
					left: 93px;
				}
			<?php endif; ?>

			<?php if ( isset( $st_h2_designsetting ) && ( $st_h2_designsetting === 'checkboxdesign' || $st_h2_designsetting === 'linedesign') &&  ! $st_h2_bgimg_leftpadding ): //左余白が空でチェックボックス又は左囲みデザインの場合 ?>
				.post .h2modoki::before,
				.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
				.post .h2modoki::after,
				.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after{
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						left: 20px;
        			<?php else: ?>
						left: 50px;
            		<?php endif; ?>
				}
				.post .h2modoki,
				.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						<?php if ( $st_h2_designsetting === 'checkboxdesign' ): ?>
							padding-left: calc(1.5em + 35px)!important;
						<?php else: ?>
							padding-left:40px;
							padding-right:40px;
						<?php endif; ?>
        			<?php else: ?>
						<?php if ( $st_h2_designsetting === 'checkboxdesign' ): ?>
							padding-left: calc(1.5em + 65px)!important;
						<?php else: ?>
							padding-left:70px;
							padding-right:70px;
							border-left:none;
							border-right:none;
						<?php endif; ?>
            		<?php endif; ?>
				}

				/* 1カラム時 */
				.colum1 .h2modoki::before,
				.colum1 h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
				.colum1 .h2modoki::after,
				.colum1 h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after{
					left: 70px;
				}

				.colum1 .h2modoki,
				.colum1 h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					<?php if ( $st_h2_designsetting === 'checkboxdesign' ): ?>
						padding-left: calc(1.5em + 85px)!important;
					<?php else: ?>
						padding-left: 100px!important;
						border-left:none;
						border-right:none;
					<?php endif; ?>
				}
			<?php endif; ?>

			<?php if ( isset( $st_h2_designsetting ) && ( $st_h2_designsetting === 'centerlinedesign') &&  ! $st_h2_bgimg_leftpadding ): //左余白が空でセンターラインデザインの場合 ?>
				.colum1 .h2modoki,
				.colum1 h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) {
					padding-left: 70px!important;
					padding-right: 70px!important;
				}
			<?php endif; ?>

			<?php if ( isset( $st_h2_designsetting ) && ( $st_h2_designsetting === 'dotdesign') &&  ! $st_h2_bgimg_leftpadding ): //左余白が空で囲みドットデザインの場合 ?>
				.h2modoki span.st-dash-design,
				.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design {
					<?php if ( $st_area ): //記事幅が広い場合 ?>
						padding-left:20px;
						padding-right:20px;
					<?php else: ?>
						padding-left: 50px;
						padding-right: 50px;
					<?php endif; ?>
				}
				/* 1カラム時 */
				.colum1 .h2modoki span.st-dash-design,
				.colum1 .post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no) span.st-dash-design {
					padding-left: 70px!important;
					padding-right: 70px!important;
				}
			<?php endif; ?>

			<?php if ( !$st_h2_text_center && ($st_h2_designsetting === 'hukidasidesign') ): //ふきだしデザインでセンター寄せではない場合 ?>
        		.entry-content .h2modoki::before,
        		.entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.entry-content .h2modoki::after,
        		.entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after
        		{
                	left:80px;
        		}
        		.colum1 .entry-content .h2modoki::before,
        		.colum1 .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::before,
        		.colum1 .entry-content .h2modoki::after,
        		.colum1 .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no)::after
        		{
                	left:100px;
        		}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if($st_h3_no_css): //カスタマイザーのCSSを無効化 ?>
	<?php else: //h3 ?>
		<?php if ( ( trim(  $GLOBALS['stdata366'] ) === '' || ! st_wrap_class_check() ) &&  $st_h3_design_wide ): ?>
			.entry-content .h3modoki,
			.entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
			{
        		<?php if ( $st_area ): //記事幅が広い場合 ?>
					margin-left: -20px;
					margin-right: -20px;
        		<?php else: ?>
					margin-left: -50px;
					margin-right: -50px;
            	<?php endif; ?>

				<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						padding-left:20px;
						padding-right:20px;
        			<?php else: ?>
						padding-left:50px;
						padding-right:50px;
            		<?php endif; ?>
				<?php endif; ?>
			}
			.colum1 .entry-content .h3modoki,
			.colum1 .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
			{
				margin-left: -70px;
				margin-right: -70px;
				<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
					padding-left:70px;
					padding-right:70px;
				<?php endif; ?>
			}



			<?php if ( $menu_main_bordercolor && isset( $st_h3_designsetting ) && ( $st_h3_designsetting === 'leftlinedesign') ): // mainエリアの周りのボーダー + 左ラインのみ場合 ?>
				@media print, screen and (min-width: 960px) {
					.entry-content .h3modoki,
					.entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
					{
						<?php if ( $st_area ): //記事幅が広い場合 ?>
							margin-left: -21px;
						<?php else: ?>
							margin-left: -51px;
						<?php endif; ?>

						<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
							<?php if ( $st_area ): //記事幅が広い場合 ?>
								padding-left:21px;
							<?php else: ?>
								padding-left:51px;
							<?php endif; ?>
						<?php endif; ?>
					}
					.colum1 .entry-content .h3modoki,
					.colum1 .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)
					{
						margin-left: -71px;
						<?php if ( ($st_h3_designsetting !== 'dotdesign') && ($st_h3_designsetting !== 'linedesign') ): //ドットデザイン及びセンターラインデザインではない場合 ?>
							padding-left:71px;
						<?php endif; ?>
					}
				}
			<?php endif; ?>

			<?php if ( isset( $st_h3_designsetting ) && ( $st_h3_designsetting === 'hukidasidesign_under') ): //吹き出し下線デザインの場合 ?>
				.h3modoki::before,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
					left: 70px;
				}
				.h3modoki::after,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
					left: 73px;
				}
				/* 1カラム時 */
				.colum1 .h3modoki::before,
				.colum1 .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before {
					left: 90px;
				}
				.colum1 .h3modoki::after,
				.colum1 .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
					left: 93px;
				}
			<?php endif; ?>

			<?php if ( isset( $st_h3_designsetting ) && ( $st_h3_designsetting === 'checkboxdesign' || $st_h3_designsetting === 'linedesign') &&  ! $st_h3_bgimg_leftpadding ): //左余白が空でチェックボックス又は左囲みデザインの場合 ?>
				.h3modoki::before,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
				.h3modoki::after,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						left: 20px;
        			<?php else: ?>
						left: 50px;
            		<?php endif; ?>
				}
				.h3modoki,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
        			<?php if ( $st_area ): //記事幅が広い場合 ?>
						<?php if ( $st_h3_designsetting === 'checkboxdesign' ): ?>
							padding-left: calc(1.5em + 35px)!important;
						<?php else: ?>
							padding-left:40px;
							padding-right:40px;
						<?php endif; ?>
        			<?php else: ?>
						<?php if ( $st_h3_designsetting === 'checkboxdesign' ): ?>
							padding-left: calc(1.5em + 65px)!important;
						<?php else: ?>
							padding-left:70px;
							padding-right:70px;
							border-left:none;
							border-right:none;
						<?php endif; ?>
            		<?php endif; ?>
				}

				/* 1カラム時 */
				.colum1 .h3modoki::before,
				.colum1 .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
				.colum1 .h3modoki::after,
				.colum1 .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after {
					left: 70px;
				}

				.colum1 .h3modoki,
				.colum1 .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) {
					<?php if ( $st_h3_designsetting === 'checkboxdesign' ): ?>
						padding-left: calc(1.5em + 90px)!important;
					<?php else: ?>
						padding-left: 100px!important;
					<?php endif; ?>
						border-left:none;
						border-right:none;
				}
			<?php endif; ?>

			<?php if ( isset( $st_h3_designsetting ) && ( $st_h3_designsetting === 'centerlinedesign') &&  ! $st_h3_bgimg_leftpadding ): //左余白が空でセンターラインデザインの場合 ?>
				.colum1 .h3modoki,
				.colum1 .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title){
					padding-left: 70px!important;
					padding-right: 70px!important;
				}
			<?php endif; ?>

			<?php if ( isset( $st_h3_designsetting ) && ( $st_h3_designsetting === 'dotdesign') &&  ! $st_h3_bgimg_leftpadding ): //左余白が空で囲みドットデザインの場合 ?>
				.h3modoki span.st-dash-design,
				.post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) span.st-dash-design {
					<?php if ( $st_area ): //記事幅が広い場合 ?>
						padding-left:20px;
						padding-right:20px;
					<?php else: ?>
						padding-left: 50px;
						padding-right: 50px;
					<?php endif; ?>
				}
				/* 1カラム時 */
				.colum1 .h3modoki span.st-dash-design,
				.colum1 .post h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title) span.st-dash-design {
					padding-left: 70px!important;
					padding-right: 70px!important;
				}
			<?php endif; ?>

			<?php if ( !$st_h3_text_center && ($st_h3_designsetting === 'hukidasidesign') ): //ふきだしデザインでセンター寄せではない場合 ?>
        		.entry-content .h3modoki::before,
        		.entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
        		.entry-content .h3modoki::after,
        		.entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after
        		{
                	left:80px;
        		}
        		.colum1 .entry-content .h3modoki::before,
        		.colum1 .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::before,
        		.colum1 .entry-content .h3modoki::after,
        		.colum1 .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh3):not(.post-card-title):not(#reply-title)::after
        		{
                	left:100px;
        		}
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if( trim($GLOBALS['stdata222']) !== '' ): // PC時もサイドバー抜粋表示 ?>
		#side .smanone.st-excerpt {
			display:block;
		}
	<?php else: ?>
		#side .smanone.st-excerpt {
			display:none;
		}
	<?php endif;  ?>

/*-- ここまで --*/
}

/*media Queries スマホのみ（599px）以下
---------------------------------------------------------------------------------------------------*/
@media only screen and (max-width: 599px) {

    /*-------------------------------------------
    旧st-kanri.phpより移動（ここから）
    */

    /*--------------------------------
    各フォント設定
    ---------------------------------*/

	/* ブログカード */
	.post dd h5.st-cardbox-t {
	    font-size: 16px;
		line-height: 24px;
	}
	/* 記事一覧 */
	dd h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /*TOPとアーカイブ*/
	.kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a { /*関連記事*/
	    font-size: 17px;
		line-height: 24px;
	}

    <?php
    // 基本
    $st_sp_p_fontsize = ( isset($GLOBALS['stdata301']) && trim($GLOBALS['stdata301']) !== '' ) ? (int)$GLOBALS['stdata301'] : 18 ;
    $st_sp_p_lineheight = ( isset($GLOBALS['stdata302']) && trim($GLOBALS['stdata302']) !== '' ) ? (int)$GLOBALS['stdata302'] : 30 ;
    // 記事タイトル
    $st_sp_entrytitle_fontsize = ( isset($GLOBALS['stdata303']) && trim($GLOBALS['stdata303']) !== '' ) ? (int)$GLOBALS['stdata303'] : 22 ;
    $st_sp_entrytitle_lineheight = ( isset($GLOBALS['stdata304']) && trim($GLOBALS['stdata304']) !== '' ) ? (int)$GLOBALS['stdata304'] : 35 ;
    // H2タグ
    $st_sp_h2_fontsize = ( isset($GLOBALS['stdata305']) && trim($GLOBALS['stdata305']) !== '' ) ? (int)$GLOBALS['stdata305'] : 20 ;
    $st_sp_h2_lineheight = ( isset($GLOBALS['stdata306']) && trim($GLOBALS['stdata306']) !== '' ) ? (int)$GLOBALS['stdata306'] : 27 ;
    // H3タグ
    $st_sp_h3_fontsize = ( isset($GLOBALS['stdata307']) && trim($GLOBALS['stdata307']) !== '' ) ? (int)$GLOBALS['stdata307'] : 19 ;
    $st_sp_h3_lineheight = ( isset($GLOBALS['stdata308']) && trim($GLOBALS['stdata308']) !== '' ) ? (int)$GLOBALS['stdata308'] : 27 ;
    // H4タグ
    $st_sp_h4_fontsize = ( isset($GLOBALS['stdata309']) && trim($GLOBALS['stdata309']) !== '' ) ? (int)$GLOBALS['stdata309'] : 17 ;
    $st_sp_h4_lineheight = ( isset($GLOBALS['stdata310']) && trim($GLOBALS['stdata310']) !== '' ) ? (int)$GLOBALS['stdata310'] : 26 ;
    // 記事一覧
    $st_sp_itiran_fontsize = ( isset($GLOBALS['stdata470']) && trim($GLOBALS['stdata470']) !== '' ) ? (int)$GLOBALS['stdata470'] : '' ;
    $st_sp_itiran_lineheight = ( isset($GLOBALS['stdata471']) && trim($GLOBALS['stdata471']) !== '' ) ? (int)$GLOBALS['stdata471'] : '' ;
    ?>

    /*基本のフォントサイズ*/
	.post pre,
	.post .wp-block-details summary,
    .post .entry-content p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn), /* テキスト */
    .post .entry-content .st-kaiwa-hukidashi, /* ふきだし */
    .post .entry-content .st-kaiwa-hukidashi2, /* ふきだし */
    .post .entry-content .yellowbox, /* 黄色ボックス */
    .post .entry-content .graybox, /* グレーボックス */
    .post .entry-content .redbox, /* 薄赤ボックス */
    .post .entry-content #topnews .clearfix dd p, /* 一覧文字 */
    .post .entry-content ul li, /* ulリスト */
    .post .entry-content ol li, /* olリスト */
    .post .entry-content #st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul > li, /* 目次用 */
	.post .entry-content .st_toc_container:not(.over_toc_content):not(.side_toc_content) > ul > li, /* 目次用 */
    .post .entry-content #comments #respond, /* コメント */
    .post .entry-content #comments h4, /* コメントタイトル */
	.post .entry-content h5:not(.kanren-t):not(.popular-t):not(.st-cardbox-t), /* H5 */
	.post h5.has-st-regular-font-size,
    .post .entry-content h6,
	.post h6.has-st-regular-font-size,
	.st-tab-content > label, /* タブ */
	.st-tabs__tab-list-item /* タブブロック */
	{
        <?php if( isset($GLOBALS['stdata301']) && trim($GLOBALS['stdata301']) !== '' ): ?>
            font-size: <?php echo $st_sp_p_fontsize; ?>px;
        <?php endif; ?>
        <?php if ( isset($GLOBALS['stdata302']) && trim($GLOBALS['stdata302']) !== '' ): ?>
            line-height: <?php echo $st_sp_p_lineheight; ?>px;
        <?php endif; ?>
    }

    /* スライドの抜粋 */
    .post .entry-content .post-slide-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
    .post .entry-content .st-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
    .post .entry-content .st-card-excerpt p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn),
    .post .entry-content .kanren:not(.st-cardbox) .clearfix dd p:not(.p-entry-t):not(.p-free):not(.sitename):not(.post-slide-title):not(.post-slide-date):not(.post-slide-more):not(.st-catgroup):not(.wp-caption-text):not(.cardbox-more):not(.st-minihukidashi):not(.st-mybox-title):not(.st-memobox-title):not(.st-mybtn){
        <?php if( isset($GLOBALS['stdata301']) && trim($GLOBALS['stdata301']) !== '' ): ?>
            font-size: 13px;
        <?php endif; ?>
        <?php if ( isset($GLOBALS['stdata302']) && trim($GLOBALS['stdata302']) !== '' ): ?>
            line-height: 18px;
        <?php endif; ?>
    }

    /* 記事タイトル */
	.st-header-post-data .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-css-no2),
    #contentInner .post .entry-title:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-css-no2) {
        <?php if( isset($GLOBALS['stdata303']) && trim($GLOBALS['stdata303']) !== '' ): ?>
            font-size: <?php echo $st_sp_entrytitle_fontsize; ?>px;
        <?php endif; ?>
        <?php if ( isset($GLOBALS['stdata304']) && trim($GLOBALS['stdata304']) !== '' ): ?>
            line-height: <?php echo $st_sp_entrytitle_lineheight; ?>px;
        <?php endif; ?>
    }

	<?php if( wp_is_mobile() ): ?>
		#breadcrumb{
			white-space: nowrap;
			overflow: auto;
		}
    <?php endif; ?>

    /* H2 */
	.post .entry-content h2.has-st-regular-font-size,
    .post .entry-content h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2),
    .post .entry-content .h2modoki{
        <?php if( isset($GLOBALS['stdata305']) && trim($GLOBALS['stdata305']) !== '' ): ?>
            font-size: <?php echo $st_sp_h2_fontsize; ?>px;
        <?php endif; ?>
        <?php if ( isset($GLOBALS['stdata306']) && trim($GLOBALS['stdata306']) !== '' ): ?>
            line-height: <?php echo $st_sp_h2_lineheight; ?>px;
        <?php endif; ?>
    }

    /* H3 */
	.post .entry-content h3.has-st-regular-font-size,
    .post .entry-content h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2):not(.post-card-title):not(#reply-title),
    .post .entry-content .h3modoki {
        <?php if( isset($GLOBALS['stdata307']) && trim($GLOBALS['stdata307']) !== '' ): ?>
            font-size: <?php echo $st_sp_h3_fontsize; ?>px;
        <?php endif; ?>
        <?php if ( isset($GLOBALS['stdata308']) && trim($GLOBALS['stdata308']) !== '' ): ?>
            line-height: <?php echo $st_sp_h3_lineheight; ?>px;
        <?php endif; ?>
    }

    /* H4 */
	.post .entry-content h4.has-st-regular-font-size,
    .post .entry-content h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2):not(.point),
	.post .entry-content .h4modoki {
        <?php if( isset($GLOBALS['stdata309']) && trim($GLOBALS['stdata309']) !== '' ): ?>
            font-size: <?php echo $st_sp_h4_fontsize; ?>px;
        <?php endif; ?>
        <?php if ( isset($GLOBALS['stdata310']) && trim($GLOBALS['stdata310']) !== '' ): ?>
            line-height: <?php echo $st_sp_h4_lineheight; ?>px;
        <?php endif; ?>
    }

    /* 記事一覧 */
	.no-thumbitiran h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /* TOP・アーカイブ（サムネイル無し） */
	.no-thumbitiran h5 a, /* ショートコード一覧（サムネイル無し） */
	dd h3:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /* TOP・アーカイブ */
	.kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a, /*関連記事*/
	.st-tab-category .post-card-list .post-card-title a, /* タブ式カテゴリー */
	.post-card-list .post-card-title a, /* カードタイプEX */
	#st-magazine .kanren .st-top-box dd h3, /* JET */
    .kanren .clearfix dd h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) a {
		<?php if( isset($GLOBALS['stdata470']) && trim($GLOBALS['stdata470']) !== '' ): ?>
			font-size: <?php echo $st_sp_itiran_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata471']) && trim($GLOBALS['stdata471']) !== '' ): ?>
			line-height: <?php echo $st_sp_itiran_lineheight; ?>px;
		<?php endif; ?>
    }

	<?php // ブログカード
	if ( trim($GLOBALS['stdata638']) !== '' ): // サムネイルサイズをさらに大きく ?>
			/** サムネイルワイドタイプ */
			#footer .kanren.st-cardbox.st-cardbox-wide dt,
			#side .kanren.st-cardbox.st-cardbox-wide dt {
				margin: -15px;
			}
		<?php if( trim($GLOBALS['stdata639']) !== '' ): //スマホでもサムネイルサイズを大きく ?>
				/** サムネイルワイドタイプ */
				#footer .kanren.st-cardbox:not(.st-no-thumbnai),
				#side .kanren.st-cardbox:not(.st-no-thumbnai) {
					padding:0;
					margin-bottom:20px;
					background:#fff;
				}

				#footer .kanren.st-cardbox:not(.st-no-thumbnai) dt,
				#side .kanren.st-cardbox:not(.st-no-thumbnai) dt {
					float: none!important;
					width: 100%!important;
					height:auto;
					overflow: hidden;
				}

				#footer .kanren.st-cardbox:not(.st-no-thumbnai) dt img,
				#side .kanren.st-cardbox:not(.st-no-thumbnai) dt img {
					width: 100%!important;
				}

				#footer .kanren.st-cardbox:not(.st-no-thumbnai) dd,
				#side .kanren.st-cardbox:not(.st-no-thumbnai) dd {
					<?php if( trim($GLOBALS['stdata642']) !== '' ): //サムネイルを非表示 ?>
						padding: 10px 20px;
					<?php else: ?>
						padding: 10px 20px 20px;
					<?php endif; ?>
				}

				#footer .kanren.st-cardbox:not(.st-no-thumbnai) .clearfix dd p,
				#side .kanren.st-cardbox:not(.st-no-thumbnai) .clearfix dd p {
					line-height: 1.8;
					margin-bottom:10px;
				}

				#footer .kanren.st-cardbox:not(.st-no-thumbnai) dd  .smanone,
				#side .kanren.st-cardbox:not(.st-no-thumbnai) dd  .smanone {
					display:none;
				}

				/*続きを読む*/
				#footer .kanren.st-cardbox:not(.st-no-thumbnai) .clearfix dd p.cardbox-more,
				#side .kanren.st-cardbox:not(.st-no-thumbnai) .clearfix dd p.cardbox-more {
					margin-bottom:5px;
				}
				#footer .st-cardbox .clearfix dt.st-card-img img,
				#side .st-cardbox .clearfix dt.st-card-img img {
					height: 200px;
				}
		<?php endif; ?>
	<?php endif; ?>

    /*
    旧st-kanri.phpより移動（ここまで）
    -------------------------------------------*/

	<?php if ( trim($GLOBALS['stdata616']) !== '' ) : ?>
		/*スマホロゴのある場合のヘッダー*/
		#headbox {
			padding-bottom:0;
		}
		#s-navi::after {
			margin-bottom: 0px;
		}
	<?php endif; ?>

/*-- ここまで --*/
}

<?php if ( ! st_has_header_content() ): // ヘッダーナビゲーションのコンテンツが空 ?>
	@media only screen and (min-width: 960px) {
		#headbox {
		    padding: 0!important;
		}
	}
	<?php if ( trim($GLOBALS['stdata616']) === '' ): // 'スマホヘッダーにキャッチフレーズを表示しないが無効 ?>
		@media print, screen and (max-width: 959px) {
			#st-text-logo {
			    padding-bottom: 0;
			}

			#headbox {
			    padding-bottom: 5px;
			}
		}
	<?php endif; ?>
<?php endif; ?>

/*-------------------------------------------
旧st-kanri.phpより移動（ここから）
*/

<?php if(trim($GLOBALS['stdata266']) === 'yes'): // 記事スライドショー ?>
	@media only screen and (min-width: <?php echo $st_pc_width; ?>px) {
		.header-post-slider.is-wide .slider-item .post-slide-body {
			display: none;
		}

		.header-post-slider.is-wide .slider-item.slick-active .post-slide-body {
			display: -webkit-flex;
			display: -ms-flexbox;
			display: flex;
		}

		.header-post-slider.is-wide.is-overlaid .slider-item::after {
			position: absolute;
			top: 0;
			right: 0;
			bottom: 0;
			left: 0;
			background: rgba(0, 0, 0, .5);
			content: '';
		}

		.header-post-slider.is-wide.is-overlaid .slider-item.slick-active::after {
			content: normal;
		}
	}
<?php endif;  ?>

/*
旧st-kanri.phpより移動（ここまで）
-------------------------------------------*/

/*
Gutenberg調整
-------------------------------------------*/

/* ワイドアライメント */
.wp-block-cover.alignwide,
.alignfull {
	margin-left: -15px;
	margin-right: -15px;
}

@media only screen and (min-width: 600px) {
	.wp-block-cover.alignwide,
	.alignfull {
		margin-left: -30px;
		margin-right: -30px;
	}
}

@media print, screen and (min-width: 960px) {
	.wp-block-cover.alignwide,
	.alignfull {
		<?php if ( $st_area ): // 記事エリアを広げる ?>
			margin-left: -20px;
			margin-right: -20px;
		<?php else: ?>
			margin-left: -50px;
			margin-right: -50px;
		 <?php endif; ?>
	}
	/* 1カラム */
	.colum1 .wp-block-cover.alignwide,
	.colum1 .alignfull {
		margin-left: -70px;
		margin-right: -70px;
	}
}

/** カバーブロック */
.wp-block-cover.alignwide,
.wp-block-cover.alignfull {
	width: calc( 100% + 30px );
	max-width: calc( 100% + 30px );
	padding-left: 30px;
	padding-right: 30px;
}

@media only screen and (min-width: 600px) {
	.wp-block-cover.alignwide,
	.wp-block-cover.alignfull {
		width: calc( 100% + 60px );
		max-width: calc( 100% + 60px );
		padding-left: 70px;
		padding-right: 70px;
	}
}

@media print, screen and (min-width: 960px) {
	.wp-block-cover.alignwide,
	.wp-block-cover.alignfull {
		<?php if ( $st_area ): // 記事エリアを広げる ?>
			width: calc( 100% + 40px );
			max-width: calc( 100% + 40px );
		<?php else: ?>
			width: calc( 100% + 100px );
			max-width: calc( 100% + 100px );
		 <?php endif; ?>
	}
	/* 1カラム */
	.colum1 .wp-block-cover.alignwide,
	.colum1 .wp-block-cover.alignfull {
		width: calc( 100% + 140px );
		max-width: calc( 100% + 140px );
	}
}

/* 最新の記事 */
<?php if(trim($GLOBALS['stdata451']) === 'yes'): // サムネイル画像を角丸に変更する ?>
	.wp-block-latest-posts li img {
		border-radius: 10px;
	}
<?php endif;  ?>

/** リスト表示 */
<?php if(trim($GLOBALS['stdata451']) === 'yes'): // サムネイル画像を右側に変更する ?>
	.wp-block-latest-posts:not(.is-grid) .wp-block-latest-posts__featured-image {
		margin-left: 10px;
		float: right;
	}
<?php endif;  ?>

<?php if(trim($GLOBALS['stdata91']) === 'yes'): // サムネイル画像を大きくする（タブレット以上は1.5倍） ?>
	<?php if(trim($GLOBALS['stdata405']) === 'yes'): // スマホ（599px以下）でもサムネイル画像を大きくする ?>
		.wp-block-latest-posts:not(.is-grid) li img {
			<?php if(trim($GLOBALS['stdata477']) === 'yes'): // サムネイル画像をさらに大きく（β） ?>
				width: 300px;
			<?php else: ?>
				width: 150px;
			<?php endif;  ?>
		}
	<?php else: ?>
		@media only screen and (min-width: 600px) {
			.wp-block-latest-posts:not(.is-grid) li img {
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
	.wp-block-latest-posts li a {
		font-weight: bold;
	}
<?php endif; ?>

@media only screen and (min-width: 600px) and (max-width: 959px) {
	/* Tabサイズ */
	.wp-block-latest-posts li a {
	    font-size: 18px;
	    line-height: 26px;
	}

	.wp-block-latest-posts li a {
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
	.wp-block-latest-posts li a {
	    font-size: 16px;
	    line-height: 26px;
	}

	.wp-block-latest-posts li a {
		<?php if( isset($GLOBALS['stdata474']) && trim($GLOBALS['stdata474']) !== '' ): ?>
			font-size: <?php echo $st_pc_itiran_fontsize; ?>px!important;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata475']) && trim($GLOBALS['stdata475']) !== '' ): ?>
			line-height: <?php echo $st_pc_itiran_lineheight; ?>px;
		<?php endif; ?>
	}
}

@media only screen and (max-width: 599px) {
	/* スマホサイズ */
	.wp-block-latest-posts li a {
	    font-size: 16px;
		line-height: 24px;
	}

	.wp-block-latest-posts li a {
		<?php if( isset($GLOBALS['stdata470']) && trim($GLOBALS['stdata470']) !== '' ): ?>
			font-size: <?php echo $st_sp_itiran_fontsize; ?>px;
		<?php endif; ?>
		<?php if ( isset($GLOBALS['stdata471']) && trim($GLOBALS['stdata471']) !== '' ): ?>
			line-height: <?php echo $st_sp_itiran_lineheight; ?>px;
		<?php endif; ?>
	}
}

<?php
// 字間のスペース
$st_letter_spacing = ( isset($GLOBALS['stdata649']) && trim($GLOBALS['stdata649']) !== '' ) ? (float)$GLOBALS['stdata649'] : '' ;
if ( $st_letter_spacing ) { ?>
	* {
		letter-spacing: <?php echo $st_letter_spacing; ?>em;
	}
<?php }
// 段落（Pタグ）下の余白
$st_p_margin_bottom = ( isset($GLOBALS['stdata635']) && trim($GLOBALS['stdata635']) !== '' ) ? (int)$GLOBALS['stdata635'] : '' ;
if ( $st_p_margin_bottom ) { ?>
	.mainbox .entry-content > p {
		margin-bottom: <?php echo $st_p_margin_bottom; ?>px;
	}
<?php } ?>

<?php if ( isset( $GLOBALS['stdata483'] ) && $GLOBALS['stdata483'] === 'overlay' ): // 検索オーバーレイ内のコンテンツ ?>
	.acordion_search_content *,
	.acordion_search_content a {
		color: #333;
		border-color: #ccc;
	}
<?php endif; ?>

<?php if ( $st_is_ex_af ):
	_st_widget_print_guidemap_styles(); // ガイドマップメニュー
endif; ?>

<?php if ( trim( $GLOBALS['stdata499'] ) !== '' ): // 要素にドロップシャドウを追加
	echo $GLOBALS['stdata499'] . ','; endif; ?>
	.st-box-shadow {
		box-shadow: 0 1px 8px rgb(0,0,0, .1), 0 4px 4px -4px rgb(0,0,0, .1);
		box-sizing: border-box;
	}

<?php if ( trim( $GLOBALS['stdata629'] ) !== '' ): // 要素にテキストシャドウを追加
	echo $GLOBALS['stdata629'];?>
	{
		text-shadow: 1px 1px 0 rgb(0,0,0,0.3);
	}
<?php endif; ?>

<?php if ( $st_is_ex ):
	//上部
	$tilt_img = '';
	$st_tilt_image               = get_option( 'st_tilt_image', '' );              //斜め背景画像
	$st_tilt_image_mobile        = get_option( 'st_tilt_image_mobile', '' );       //斜め背景画像（スマホ用）
	if( st_is_mobile() && $st_tilt_image_mobile ):
		$tilt_img = $st_tilt_image_mobile;
	elseif( $st_tilt_image ):
		$tilt_img = $st_tilt_image;
	endif;

	//下部
	$tilt_img_btm = '';
	$st_tilt_image_btm               = get_option( 'st_tilt_image_btm', '' );              //斜め背景画像
	$st_tilt_image_mobile_btm        = get_option( 'st_tilt_image_mobile_btm', '' );       //斜め背景画像（スマホ用）
	if( st_is_mobile() && $st_tilt_image_mobile_btm ):
		$tilt_img_btm = $st_tilt_image_mobile_btm;
	elseif( $st_tilt_image_btm ):
		$tilt_img_btm = $st_tilt_image_btm;
	endif;
?>
	/* 斜め背景画像 */
	#st-tilt-bg img {
		<?php if ( $st_tilt_height ): //傾きの高さ（%）
			$tilt_h = $st_tilt_height;
		else:
			$tilt_h = 40;
		endif;

		if ( $st_tilt_direction ): //傾きの方向 ?>
			clip-path: polygon(0 0, 100% 0, 100% 100%, 0 <?php echo $tilt_h; ?>%);
		<?php else: ?>
			clip-path: polygon(0 0, 100% 0%, 100% <?php echo $tilt_h; ?>%, 0% 100%);
		<?php endif; ?>

		<?php if ( $st_tilt_brightness ): //暗くする ?>
			filter: brightness(0.<?php echo $st_tilt_brightness; ?>);
		<?php endif; ?>

		width: 100%;
		height: auto;
		max-height: 100%;
		top: 0;
		left: 0;
		position: absolute;
		z-index: -1;
	}

	#st-tilt-bg-bottom img {
		<?php if ( $st_tilt_height_btm ): //傾きの高さ（%）
			$tilt_h_btm = $st_tilt_height_btm;
		else:
			$tilt_h_btm = 60;
		endif;

		if ( $st_tilt_direction_btm ): //傾きの方向 ?>
			clip-path: polygon(0 0, 100% <?php echo $tilt_h_btm; ?>%, 100% 100%, 0 100%);
		<?php else: ?>
			clip-path: polygon(0 <?php echo $tilt_h_btm; ?>%, 100% 0, 100% 100%, 0 100%);
		<?php endif; ?>

		<?php if ( $st_tilt_brightness ): //暗くする ?>
			filter: brightness(0.<?php echo $st_tilt_brightness; ?>);
		<?php endif; ?>

		width: 100%;
		height: auto;
		max-height: 100%;
		bottom: 0;
		left: 0;
		position: absolute;
		z-index: -1;
	}

	<?php if (  ! $tilt_img && $st_tilt_bgcolor ): //画像無し + 背景色 ?>
		#st-tilt-bg {
			<?php if ( $st_tilt_height ): //傾きの高さ（%）
				$tilt_h = $st_tilt_height;
			else:
				$tilt_h = 40;
			endif;

			if ( $st_tilt_direction ): //傾きの方向 ?>
				clip-path: polygon(0 0, 100% 0, 100% 100%, 0 <?php echo $tilt_h; ?>%);
			<?php else: ?>
				clip-path: polygon(0 0, 100% 0%, 100% <?php echo $tilt_h; ?>%, 0% 100%);
			<?php endif; ?>
			width: 100%;
			height: 70vh;
			top: 0;
			left: 0;
			position: absolute;
			background:<?php echo $st_tilt_bgcolor; ?>;
			z-index: -1;
		}
	<?php endif; ?>

	<?php if ( ! $tilt_img_btm && $st_tilt_bgcolor_btm ): //画像無し + 背景色 ?>
		#st-tilt-bg-bottom {
			<?php if ( $st_tilt_height_btm ): //傾きの高さ（%）
				$tilt_h_btm = $st_tilt_height_btm;
			else:
				$tilt_h_btm = 60;
			endif;

			if ( $st_tilt_direction_btm ): //傾きの方向 ?>
				clip-path: polygon(0 0, 100% <?php echo $tilt_h_btm; ?>%, 100% 100%, 0 100%);
			<?php else: ?>
				clip-path: polygon(0 <?php echo $tilt_h_btm; ?>%, 100% 0, 100% 100%, 0 100%);
			<?php endif; ?>

			width: 100%;
			height: 70vh;
			bottom: 0;
			left: 0;
			position: absolute;
			z-index: -1;
			background:<?php echo $st_tilt_bgcolor_btm; ?>;
		}
	<?php endif; ?>
<?php endif; ?>

/* 階層リスト */
.is-style-st-kaisou.has-pale-pink-color ul:before,
.is-style-st-kaisou.has-pale-pink-color ul li:before {
	border-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
.is-style-st-kaisou.has-soft-red-color ul:before,
.is-style-st-kaisou.has-soft-red-color ul li:before {
	border-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
.is-style-st-kaisou.has-light-grayish-red-color ul:before,
.is-style-st-kaisou.has-light-grayish-red-color ul li:before {
	border-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
.is-style-st-kaisou.has-vivid-yellow-color ul:before,
.is-style-st-kaisou.has-vivid-yellow-color ul li:before {
	border-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
.is-style-st-kaisou.has-very-pale-yellow-color ul:before,
.is-style-st-kaisou.has-very-pale-yellow-color ul li:before {
	border-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
.is-style-st-kaisou.has-light-green-cyan-color ul:before,
.is-style-st-kaisou.has-light-green-cyan-color ul li:before {
	border-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
.is-style-st-kaisou.has-pale-cyan-blue-color ul:before,
.is-style-st-kaisou.has-pale-cyan-blue-color ul li:before {
	border-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
.is-style-st-kaisou.has-vivid-cyan-blue-color ul:before,
.is-style-st-kaisou.has-vivid-cyan-blue-color ul li:before {
	border-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
.is-style-st-kaisou.has-very-light-gray-color ul:before,
.is-style-st-kaisou.has-very-light-gray-color ul li:before {
	border-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
.is-style-st-kaisou.has-very-dark-gray-color ul:before,
.is-style-st-kaisou.has-very-dark-gray-color ul li:before {
	border-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
.is-style-st-kaisou.has-white-color ul:before,
.is-style-st-kaisou.has-white-color ul li:before {
	border-color: <?php echo ST_COLOR_WHITE; ?>;
}
.is-style-st-kaisou.has-original-color-a-color ul:before,
.is-style-st-kaisou.has-original-color-a-color ul li:before {
	border-color: <?php echo $original_color_a; ?> !important;
}
.is-style-st-kaisou.has-original-color-b-color ul:before,
.is-style-st-kaisou.has-original-color-b-color ul li:before {
	border-color: <?php echo $original_color_b; ?> !important;
}
.is-style-st-kaisou.has-original-color-c-color ul:before,
.is-style-st-kaisou.has-original-color-c-color ul li:before {
	border-color: <?php echo $original_color_c; ?> !important;
}
.is-style-st-kaisou.has-original-color-d-color ul:before,
.is-style-st-kaisou.has-original-color-d-color ul li:before {
	border-color: <?php echo $original_color_d; ?> !important;
}

.is-style-st-kaisou.has-pale-pink-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_PALE_PINK; ?>;
}
.is-style-st-kaisou.has-soft-red-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_SOFT_RED; ?>;
}
.is-style-st-kaisou.has-light-grayish-red-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}
.is-style-st-kaisou.has-vivid-yellow-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}
.is-style-st-kaisou.has-very-pale-yellow-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}
.is-style-st-kaisou.has-light-green-cyan-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>!important;
}
.is-style-st-kaisou.has-pale-cyan-blue-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}
.is-style-st-kaisou.has-vivid-cyan-blue-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}
.is-style-st-kaisou.has-very-light-gray-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}
.is-style-st-kaisou.has-very-dark-gray-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}
.is-style-st-kaisou.has-white-background-color ul li ul li:last-child:before {
	background-color: <?php echo ST_COLOR_WHITE; ?>;
}
.is-style-st-kaisou.has-original-color-a-background-color ul li ul li:last-child:before {
	background-color: <?php echo $original_color_a; ?> !important;
}
.is-style-st-kaisou.has-original-color-b-background-color ul li ul li:last-child:before {
	background-color: <?php echo $original_color_b; ?> !important;
}
.is-style-st-kaisou.has-original-color-c-background-color ul li ul li:last-child:before {
	background-color: <?php echo $original_color_c; ?> !important;
}
.is-style-st-kaisou.has-original-color-d-background-color ul li ul li:last-child:before {
	background-color: <?php echo $original_color_d; ?> !important;
}

/* マル・バツリスト */
.is-style-st-correct-list.has-pale-pink-color > li::before,
.is-style-st-wrong-list.has-pale-pink-color > li::before {
	color: <?php echo ST_COLOR_PALE_PINK; ?>;
}

.is-style-st-correct-list.has-soft-red-color > li::before,
.is-style-st-wrong-list.has-soft-red-color > li::before {
	color: <?php echo ST_COLOR_SOFT_RED; ?>;
}

.is-style-st-correct-list.has-light-grayish-red-color > li::before,
.is-style-st-wrong-list.has-light-grayish-red-color > li::before {
	color: <?php echo ST_COLOR_LIGHT_G_RED; ?>;
}

.is-style-st-correct-list.has-vivid-yellow-color > li::before,
.is-style-st-wrong-list.has-vivid-yellow-color > li::before {
	color: <?php echo ST_COLOR_VIVID_YELLOW; ?>;
}

.is-style-st-correct-list.has-very-pale-yellow-color > li::before,
.is-style-st-wrong-list.has-very-pale-yellow-color > li::before {
	color: <?php echo ST_COLOR_VERY_PALE_YELLOW; ?>;
}

.is-style-st-correct-list.has-light-green-cyan-color > li::before,
.is-style-st-wrong-list.has-light-green-cyan-color > li::before {
	color: <?php echo ST_COLOR_LIGHT_GREEN_CYAN; ?>;
}

.is-style-st-correct-list.has-pale-cyan-blue-color > li::before,
.is-style-st-wrong-list.has-pale-cyan-blue-color > li::before {
	color: <?php echo ST_COLOR_PALE_CYAN_BLUE; ?>;
}

.is-style-st-correct-list.has-vivid-cyan-blue-color > li::before,
.is-style-st-wrong-list.has-vivid-cyan-blue-color > li::before {
	color: <?php echo ST_COLOR_VIVID_CYAN_BLUE; ?>;
}

.is-style-st-correct-list.has-very-light-gray-color > li::before,
.is-style-st-wrong-list.has-very-light-gray-color > li::before {
	color: <?php echo ST_COLOR_VERY_LIGHT_GRAY; ?>;
}

.is-style-st-correct-list.has-very-dark-gray-color > li::before,
.is-style-st-wrong-list.has-very-dark-gray-color > li::before {
	color: <?php echo ST_COLOR_VERY_DARK_GRAY; ?>;
}

.is-style-st-correct-list.has-white-color > li::before,
.is-style-st-wrong-list.has-white-color > li::before {
	color: <?php echo ST_COLOR_WHITE; ?>;
}

.is-style-st-correct-list.has-original-color-a-color > li::before,
.is-style-st-wrong-list.has-original-color-a-color > li::before {
	color: <?php echo $original_color_a; ?>;
}

.is-style-st-correct-list.has-original-color-b-color > li::before,
.is-style-st-wrong-list.has-original-color-b-color > li::before {
	color: <?php echo $original_color_b; ?>;
}

.is-style-st-correct-list.has-original-color-c-color > li::before,
.is-style-st-wrong-list.has-original-color-c-color > li::before {
	color: <?php echo $original_color_c; ?>;
}

.is-style-st-correct-list.has-original-color-d-color > li::before,
.is-style-st-wrong-list.has-original-color-d-color > li::before {
	color: <?php echo $original_color_d; ?>;
}
