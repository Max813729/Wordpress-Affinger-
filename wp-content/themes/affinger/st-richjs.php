<?php
$is_lazy_load_enabled = ( defined( 'ST_LAZY_LOAD' ) && $GLOBALS['stdata326'] === 'yes' );
$is_fade_in_enabled   = ( ! $is_lazy_load_enabled && trim( $GLOBALS["stdata78"] ) !== '' )
?>
<?php if ( $is_fade_in_enabled ): ?>
	<?php
	$selector = '';

	if ( $GLOBALS["stdata78"] === 'allopacity' ) {
		$selector = 'img';
	} elseif ( $GLOBALS["stdata78"] === 'postopacity' ) {
		$selector = '.post img';
	}
	?>

	<?php if ( ! empty( $selector ) ): ?>
		<script>
			(function (window, document, $, undefined) {
				'use strict';

				function transparentize(selector) {
					var scrollTop = $(window).scrollTop();
					var windowHeight = $(window).height();

					$(selector).each(function () {
						var $img = $(this);
						var imgTop = $img.offset().top;

						if (imgTop >= scrollTop + windowHeight) {
							$img.css("opacity", "0");
						}
					});
				}

				function fadeIn(selector) {
					var scrollTop = $(window).scrollTop();
					var windowHeight = $(window).height();

					$(selector).each(function () {
						var $img = $(this);
						var imgTop = $img.offset().top;

						if (scrollTop > imgTop - windowHeight + 100) {
							$img.animate({
								"opacity": "1"
							}, 1000);
						}
					});
				}

				$(function () {
					var timer;
					var selector = '<?php echo esc_js( $selector ); ?>';
					var onEvent = fadeIn.bind(null, selector);

					transparentize(selector);

					$(window).on('orientationchange resize', function () {
						if (timer) {
							clearTimeout(timer);
						}

						timer = setTimeout(onEvent, 100);
					});

					$(window).on('scroll', onEvent);
				});
			}(window, window.document, jQuery));
		</script>
	<?php endif; ?>
<?php endif; ?>

<?php
if ( trim( $GLOBALS["stdata79"] ) !== '' && $GLOBALS["stdata79"] === 'yes' ) { ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function(){
			$(".post .entry-title").css("opacity",".0").animate({
					"opacity": "1"
					}, 2500);;
			});
		}(window, window.document, jQuery));


	</script>
<?php
}
?>

<?php
// target_blankを付与
if ( ( trim( $GLOBALS["stdata467"] ) === '' ) && ( isset( $GLOBALS["stdata108"] ) && $GLOBALS["stdata108"] === 'yes' ) ) { ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function(){
			$('.entry-content a[href^=http]')
				.not('[href*="'+location.hostname+'"]')
				.attr({target:"_blank"})
			;})
		}(window, window.document, jQuery));
	</script>
<?php
}
?>

<script>
	(function (window, document, $, undefined) {
		'use strict';

		var SlideBox = (function () {
			/**
			 * @param $element
			 *
			 * @constructor
			 */
			function SlideBox($element) {
				this._$element = $element;
			}

			SlideBox.prototype.$content = function () {
				return this._$element.find('[data-st-slidebox-content]');
			};

			SlideBox.prototype.$toggle = function () {
				return this._$element.find('[data-st-slidebox-toggle]');
			};

			SlideBox.prototype.$icon = function () {
				return this._$element.find('[data-st-slidebox-icon]');
			};

			SlideBox.prototype.$text = function () {
				return this._$element.find('[data-st-slidebox-text]');
			};

			SlideBox.prototype.is_expanded = function () {
				return !!(this._$element.filter('[data-st-slidebox-expanded="true"]').length);
			};

			SlideBox.prototype.expand = function () {
				var self = this;

				this.$content().slideDown()
					.promise()
					.then(function () {
						var $icon = self.$icon();
						var $text = self.$text();

						$icon.removeClass($icon.attr('data-st-slidebox-icon-collapsed'))
							.addClass($icon.attr('data-st-slidebox-icon-expanded'))

						$text.text($text.attr('data-st-slidebox-text-expanded'))

						self._$element.removeClass('is-collapsed')
							.addClass('is-expanded');

						self._$element.attr('data-st-slidebox-expanded', 'true');
					});
			};

			SlideBox.prototype.collapse = function () {
				var self = this;

				this.$content().slideUp()
					.promise()
					.then(function () {
						var $icon = self.$icon();
						var $text = self.$text();

						$icon.removeClass($icon.attr('data-st-slidebox-icon-expanded'))
							.addClass($icon.attr('data-st-slidebox-icon-collapsed'))

						$text.text($text.attr('data-st-slidebox-text-collapsed'))

						self._$element.removeClass('is-expanded')
							.addClass('is-collapsed');

						self._$element.attr('data-st-slidebox-expanded', 'false');
					});
			};

			SlideBox.prototype.toggle = function () {
				if (this.is_expanded()) {
					this.collapse();
				} else {
					this.expand();
				}
			};

			SlideBox.prototype.add_event_listeners = function () {
				var self = this;

				this.$toggle().on('click', function (event) {
					self.toggle();
				});
			};

			SlideBox.prototype.initialize = function () {
				this.add_event_listeners();
			};

			return SlideBox;
		}());

		function on_ready() {
			var slideBoxes = [];

			$('[data-st-slidebox]').each(function () {
				var $element = $(this);
				var slideBox = new SlideBox($element);

				slideBoxes.push(slideBox);

				slideBox.initialize();
			});

			return slideBoxes;
		}

		$(on_ready);
	}(window, window.document, jQuery));
</script>

<?php
// 記事タイトル
$st_entrytitle_setdesign = st_get_entrytitle_designsetting();
if( (trim( $st_entrytitle_setdesign ) !== '') && (($st_entrytitle_setdesign === 'dotdesign')||($st_entrytitle_setdesign === 'centerlinedesign')||($st_entrytitle_setdesign === 'gradient_underlinedesign')) ): ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function(){
			$('.entry-title').wrapInner('<span class="st-dash-design"></span>');
			})
		}(window, window.document, jQuery));
	</script>
<?php endif;
// h2タグ
$st_h2_setdesign = st_get_h2_designsetting();
if( (trim( $st_h2_setdesign ) !== '') && (($st_h2_setdesign === 'dotdesign')||($st_h2_setdesign === 'centerlinedesign')||($st_entrytitle_setdesign === 'gradient_underlinedesign')) ): ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function(){
			$('.post h2:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) , .h2modoki').wrapInner('<span class="st-dash-design"></span>');
			})
		}(window, window.document, jQuery));
	</script>
<?php endif;
// h3タグ
$st_h3_setdesign = st_get_h3_designsetting();
if( (trim( $st_h3_setdesign ) !== '') && (($st_h3_setdesign === 'dotdesign')||($st_h3_setdesign === 'centerlinedesign')||($st_entrytitle_setdesign === 'gradient_underlinedesign')) ): ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function(){
			$('.post h3:not(.rankh3):not(#reply-title):not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no2) , .h3modoki').wrapInner('<span class="st-dash-design"></span>');
			})
		}(window, window.document, jQuery));
	</script>
<?php endif;

//この記事を書いた人
if ( isset($GLOBALS['stdata210']) && $GLOBALS['stdata210'] === 'yes' ) : ?>
<script>
	(function (window, document, $, undefined) {
		'use strict';

		$(function(){
		  $('#st-tab-menu li').on('click', function(){
			if($(this).not('active')){
			  $(this).addClass('active').siblings('li').removeClass('active');
			  var index = $('#st-tab-menu li').index(this);
			  $('#st-tab-menu + #st-tab-box div').eq(index).addClass('active').siblings('div').removeClass('active');
			}
		  });
		});
	}(window, window.document, jQuery));
</script>
<?php endif; ?>

<script>
	(function (window, document, $, undefined) {
		'use strict';

		$(function(){
			/* 第一階層のみの目次にクラスを挿入 */
			$("#toc_container:not(:has(ul ul))").addClass("only-toc");
			/* アコーディオンメニュー内のカテゴリーにクラス追加 */
			$(".st-ac-box ul:has(.cat-item)").each(function(){
				$(this).addClass("st-ac-cat");
			});
		});
	}(window, window.document, jQuery));
</script>

<?php
// h4と5タグ
$st_h4_husen_shadow = get_theme_mod( 'st_h4_husen_shadow', '' );
$st_h5_husen_shadow = get_theme_mod( 'st_h5_husen_shadow', '' );
?>
<script>
	(function (window, document, $, undefined) {
		'use strict';

		$(function(){
			<?php if( $st_h4_husen_shadow ): //付箋シャドウ用のクラス追加 h4 ?>
				$( '.post h4:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh4):not(#reply-title):not(.point)' ).wrap( '<div class="st-h4husen-shadow"></div>' );
				$( '.h4modoki' ).wrap( '<div class="st-h4husen-shadow"></div>' );
			<?php endif; ?>
			<?php if( $st_h5_husen_shadow ): //h5 ?>
				$( '.post h5:not([class^="is-style-st-heading-custom-"]):not([class*=" is-style-st-heading-custom-"]):not(.st-css-no):not(.st-matome):not(.rankh5):not(.point):not(.st-cardbox-t):not(.popular-t):not(.kanren-t):not(.popular-t):not(.post-card-title)' ).wrap( '<div class="st-h5husen-shadow"></div>' );
				$( '.h5modoki' ).wrap( '<div class="st-h5husen-shadow"></div>' );
			<?php endif; ?>
			$('.st-star').parent('.rankh4').css('padding-bottom','5px'); // スターがある場合のランキング見出し調整
		});
	}(window, window.document, jQuery));
</script>

<?php if ( wp_is_mobile() && get_theme_mod( 'st_sticky_menu', '') === 'fixed' ): //スマホスライドメニューが「固定」の場合 ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			var largeScreen = window.matchMedia('screen and (min-width: 960px)');

			function resetStickyPosition() {
				$('.st-sticky, thead th, thead td').css('top', '');
			}

			/**
			 * position: sticky を調整する
			 */
			function updateStickyPosition() {
				var $headerBar      = $('#s-navi dl.acordion');
				var headerBarHeight = $headerBar.height();
				var scrollTop       = $(window).scrollTop();

				$('.st-sticky, thead th, thead td').each(function (index, element) {
					var $element = $(element);
					var tagName  = $element.prop('nodeName');
					var elementTop;

					if (tagName === 'TH' || tagName === 'TD') {
						if ($element.closest('.scroll-box').length) {  // .scroll-box は親要素が基準になるため除外
							return;
						}

						elementTop = $element.parent('tr').offset().top;
					} else {
						elementTop = $element.offset().top;
					}

					if (scrollTop + headerBarHeight > elementTop) {
						if (parseInt($element.css('top'), 10) !== headerBarHeight) {
							$element.css('top', headerBarHeight + 'px');
						}
					} else {
						$element.css('top', '');
					}
				});
			}

			function resetContentPosition() {
				$('header').css('padding-top', '');
				$('#headbox-bg').css('margin-top', '');
			}

			/**
			 * ヘッダーの高さ分だけコンテンツを下げる
			 */
			function fixContentPosition() {
				var $headerBar = $('#s-navi dl.acordion');
				var height     = $headerBar.height();

				$headerBar.css('padding-top', height + 'px');
				$headerBar.css('margin-top', '-' + height + 'px');
			}

			function onScroll() {
				updateStickyPosition();
			}

			function onLargeScreen() {
				$(window).off('scroll', onScroll);

				resetContentPosition();
				resetStickyPosition();
			}

			function onSmallScreen() {
				$(window).on('scroll', onScroll);

				fixContentPosition();
				updateStickyPosition();
			}

			function initialize() {
				largeScreen.addListener(function (mql) {
					if (mql.matches) {
						onLargeScreen();
					} else {
						onSmallScreen();
					}
				});

				if (largeScreen.matches) {
					onLargeScreen();
				} else {
					onSmallScreen();
				}
			}

			$(function () {
				initialize();
			});
		}(window, window.document, jQuery));

		/* スクロールでCSSクラスを付与 */
		(function (window, document, $, undefined) {
			'use strict';

			$(function() {
				$( window ).on( 'scroll', function () {
					if ( $(this).scrollTop() > 100 ) {
						$('#s-navi dl.acordion').addClass('ac-shadow');
					} else {
						$('#s-navi dl.acordion').removeClass('ac-shadow');
					}
				});
			});
		}(window, window.document, jQuery));

	</script>
<?php elseif ( wp_is_mobile() && get_theme_mod( 'st_sticky_menu', '') === 'fixed-info' ): //スマホ インフォメーションが「固定」の場合 ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			var largeScreen = window.matchMedia('screen and (min-width: 960px)');

			function resetStickyPosition() {
				$('.st-sticky, thead th, thead td').css('top', '');
			}

			/**
			 * position: sticky を調整する
			 */
			function updateStickyPosition() {
				var $headerBar      = $('#st-header-top-widgets-box');
				var headerBarHeight = $headerBar.height();
				var scrollTop       = $(window).scrollTop();

				$('.st-sticky, thead th, thead td').each(function (index, element) {
					var $element = $(element);
					var tagName  = $element.prop('nodeName');
					var elementTop;

					if (tagName === 'TH' || tagName === 'TD') {
						if ($element.closest('.scroll-box').length) {  // .scroll-box は親要素が基準になるため除外
							return;
						}

						elementTop = $element.parent('tr').offset().top;
					} else {
						elementTop = $element.offset().top;
					}

					if (scrollTop + headerBarHeight > elementTop) {
						if (parseInt($element.css('top'), 10) !== headerBarHeight) {
							$element.css('top', headerBarHeight + 'px');
						}
					} else {
						$element.css('top', '');
					}
				});
			}

			function resetContentPosition() {
				$('#st-header-top-widgets-box').css('padding-top', '');
				$('#st-header-top-widgets-box').css('margin-top', '');
			}

			/**
			 * ヘッダーの高さ分だけコンテンツを下げる
			 */
			function fixContentPosition() {
				var $headerBar = $('#st-header-top-widgets-box');
				var height     = $headerBar.height();

				$headerBar.css('padding-top', height + 'px');
				$headerBar.css('margin-top', '-' + height + 'px');
			}

			function onScroll() {
				updateStickyPosition();
			}

			function onLargeScreen() {
				$(window).off('scroll', onScroll);

				resetContentPosition();
				resetStickyPosition();
			}

			function onSmallScreen() {
				$(window).on('scroll', onScroll);

				fixContentPosition();
				updateStickyPosition();
			}

			function initialize() {
				largeScreen.addListener(function (mql) {
					if (mql.matches) {
						onLargeScreen();
					} else {
						onSmallScreen();
					}
				});

				if (largeScreen.matches) {
					onLargeScreen();
				} else {
					onSmallScreen();
				}
			}

			$(function () {
				initialize();
			});
		}(window, window.document, jQuery));

		/* スクロールでCSSクラスを付与 */
		(function (window, document, $, undefined) {
			'use strict';

			$(function() {
				$( window ).on( 'scroll', function () {
					// 現在のスクロール位置を取得
					var scroll = $(window).scrollTop();

					// #st-header-top-widgets-boxの高さを取得して適用する関数
					var headetopwidgetsbox = $('#st-header-top-widgets-box');
					var headetopwidgetsboxHeight = headetopwidgetsbox.length > 0 ? headetopwidgetsbox.height() : 0; // headbox-bgが存在する場合のみ高さを計算
					if ( scroll >= headetopwidgetsboxHeight ) {
						$('#st-header-top-widgets-box').addClass('ac-shadow');
					} else {
						$('#st-header-top-widgets-box').removeClass('ac-shadow');
					}
				});
			});
		}(window, window.document, jQuery));

	</script>
<?php endif; ?>

<?php if ( wp_is_mobile() && ( get_theme_mod( 'st_sticky_menu', '') === 'fixed' || get_theme_mod( 'st_sticky_menu', '') === '1' ) ): //スマホスライドメニューが「固定」の場合 ?>
	<script>
		/* スクロールでCSSクラスを付与 */
		(function (window, document, $, undefined) {
			'use strict';

			$(function() {
				$( window ).on( 'scroll', function () {
					if ( $(this).scrollTop() > 100 ) {
						$('#s-navi dl.acordion').addClass('ac-fixed');
					} else {
						$('#s-navi dl.acordion').removeClass('ac-fixed');
					}
				});
			});
		}(window, window.document, jQuery));

	</script>
<?php elseif ( wp_is_mobile() && ( get_theme_mod( 'st_sticky_menu', '') === 'fixed-info' ) ): //スマホ インフォメーションが「固定」の場合 ?>
	<script>
		/* スクロールでCSSクラスを付与 */
		(function (window, document, $, undefined) {
			'use strict';

			$(function() {
				$( window ).on( 'scroll', function () {
					if ( $(this).scrollTop() > 100 ) {
						$('#st-header-top-widgets-box').addClass('ac-fixed');
					} else {
						$('#st-header-top-widgets-box').removeClass('ac-fixed');
					}
				});
			});
		}(window, window.document, jQuery));

	</script>
<?php endif; ?>

<?php
$header_full_area = get_theme_mod('st_headerbg_image_area'); //headerの背景画像の範囲
if ( ! $header_full_area && is_front_page() && ! is_paged() && get_theme_mod( 'st_header_height_vh' ) ): // トップページのヘッダー画像エリアの高さを画面サイズに応じて最大にする ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function() {
				/* スクロールリンクを表示 */
				$('.front-page:not(.paged) #header-full').append('<div id="st-header-link"><span>Scroll</span></div>').after('<div id="st-header-bottom-anchor"></div>');

				/* クリックで下部要素へスクロール */
				$("#st-header-link").on('click', function () {
				  var position = $('#st-header-bottom-anchor').offset().top;
				  var speed = 600;
				  $("html,body").animate({scrollTop:position},speed);
				});

				/* スクロールで下部へのリンクを非表示 */
				$(window).on('scroll', function () {
				  if($(window).scrollTop() > 50) {
					$('#st-header-link').fadeOut();
				  }
				  if($(window).scrollTop() < 49) {
					$('#st-header-link').fadeIn();
				  }
				});

			});
		}(window, window.document, jQuery));
	</script>
<?php endif; ?>

<?php if ( trim( $GLOBALS["stdata567"] ) === '' ): // 簡易会話ふきだし ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function() {
				$('.is-style-st-paragraph-kaiwa').wrapInner('<span class="st-paragraph-kaiwa-text">');
			});
		}(window, window.document, jQuery));
	</script>
<?php endif; ?>

<?php if ( trim( $GLOBALS["stdata568"] ) === '' ): // 簡易会話ふきだしB ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function() {
				$('.is-style-st-paragraph-kaiwa-b').wrapInner('<span class="st-paragraph-kaiwa-text">');
			});
		}(window, window.document, jQuery));
	</script>
<?php endif; ?>

<script>
	/* Gutenbergスタイルを調整 */
	(function (window, document, $, undefined) {
		'use strict';

		$(function() {
			$( '[class^="is-style-st-paragraph-"],[class*=" is-style-st-paragraph-"]' ).wrapInner( '<span class="st-noflex"></span>' );
		});
	}(window, window.document, jQuery));
</script>

<?php
if ( st_is_mobile() && is_active_sidebar( 18 ) ) : ?>
	<?php if( st_is_ver_ex() && isset( $GLOBALS["stdata593"] ) && $GLOBALS["stdata593"] === 'yes' ): // スマホフッターに固定ウィジェットをフロート化（EX） ?>
	<?php else: ?>
		<script>
			(function (window, document, $, undefined) {
				'use strict';

				$(function() {
					var footer_ad_h = $("#footer-ad-box").innerHeight();
					$('#footer-in').css('padding-bottom', footer_ad_h + 'px');
				});
			}(window, window.document, jQuery));
		</script>
	<?php endif; ?>
<?php //スマホフッター用メニューがある場合に余白を追加
elseif( st_is_mobile() && ! is_active_sidebar( 18 ) && ( trim($GLOBALS['stdata143']) === 'yes') ): // スマホ且つスマホフッター固定広告ウィジェットが空 ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function() {
				var footer_ad_h = $("#st-footermenubox").innerHeight();
				$('#footer-in').css('padding-bottom', footer_ad_h + 'px');
			});
		}(window, window.document, jQuery));
	</script>
<?php endif; ?>

<?php // 斜め背景画像の高さを要素の高さをmax値にする
if ( ! st_is_mobile() && ( get_option( 'st_tilt_image' ) || get_option( 'st_tilt_image_btm' ) ) // PC
	|| st_is_mobile() && ( get_option( 'st_tilt_image_mobile' ) || get_option( 'st_tilt_image_mobile_btm' ) ) // スマホ
): ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(function () {
				var height = $('#st-ami').outerHeight();

				$('#st-tilt-bg img, #st-tilt-bg-bottom img').css('max-height', height + 'px');
			});
		}(window, window.document, jQuery));
	</script>
<?php endif; ?>

<?php // 左右サイドバー追加広告用
if ( function_exists( 'dynamic_sidebar' ) && ( is_active_sidebar( 39 ) || is_active_sidebar( 40 ) ) ): ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			var resize_timer;

			/**
			 * `#content` 要素の高さを調整する。
			 */
			function adjust_content_height() {
				var $content = $('#content');

				// `#content` の高さ
				var content_height = $content.outerHeight();

				// 左サイドバーの高さ
				var left_sidebar_height = $('.side-add-widgets.side-add-left').outerHeight();

				// 右サイドバーの高さ
				var right_sidebar_height = $('.side-add-widgets.side-add-right').outerHeight();

				// 高い方のサイドバーの高さ
				var highest_sidebar_height = Math.max(left_sidebar_height, right_sidebar_height);

				// `#content` の高さがサイドバーの高さより低い場合は `#content` の高さを広げる
				if (content_height < highest_sidebar_height) {
					$content.css('height', highest_sidebar_height + 'px');
				}
			}

			// スクロールすると上部に固定させるための設定を関数でまとめる
			function adjust_fixed_sidebars() {
				// サイドバーの下余白
				var sidebar_space_bottom = 10;

				// スクロール位置
				var scroll_top = $(window).scrollTop();

				// `#content`
				var $content = $('#content');

				// `#content` の高さ
				var content_height = $content.outerHeight();

				// `#content` の位置
				var content_offset = $content.offset();

				// 左サイドバー
				var $left_sidebar = $('.side-add-widgets.side-add-left');

				// 左サイドバーの高さ
				var left_sidebar_height = $left_sidebar.outerHeight();

				// 右サイドバー
				var $right_sidebar = $('.side-add-widgets.side-add-right');

				// 右サイドバーの高さ
				var right_sidebar_height = $right_sidebar.outerHeight();

				if (scroll_top > content_offset.top) { // スクロール位置がサイドバーの上部を越えたとき
					if (scroll_top > (content_offset.top + content_height - left_sidebar_height - sidebar_space_bottom)) {
						// サイドバー下部の位置が `#content` の下部を越えたとき
						$left_sidebar.css('top', '');
						$left_sidebar.css('bottom', sidebar_space_bottom + 'px');
					} else {
						$left_sidebar.css('top', (scroll_top - content_offset.top) + 'px');
						$left_sidebar.css('bottom', '');
					}
				} else {
					$left_sidebar.css('top', '');
					$left_sidebar.css('bottom', '');
				}

				if (scroll_top > content_offset.top) { // スクロール位置がサイドバーの上部を越えたとき
					if (scroll_top > (content_offset.top + content_height - right_sidebar_height - sidebar_space_bottom)) {
						// サイドバー下部の位置が `#content` の下部を越えたとき
						$right_sidebar.css('top', '');
						$right_sidebar.css('bottom', sidebar_space_bottom + 'px');
					} else {
						$right_sidebar.css('top', (scroll_top - content_offset.top) + 'px');
						$right_sidebar.css('bottom', '');
					}
				} else {
					$right_sidebar.css('top', '');
					$right_sidebar.css('bottom', '');
				}
			}

			function on_ready() {
				adjust_content_height();
			}

			function on_resize() {
				if (resize_timer) {
					clearTimeout(resize_timer);
				}

				resize_timer = setTimeout(function () {
					adjust_content_height();
					adjust_fixed_sidebars();
				}, 100);
			}

			function on_scroll() {
				adjust_fixed_sidebars();
			}

			$(on_ready);
			$(window).on('orientationchange resize', on_resize);
			$(window).on('scroll', on_scroll);
		}(window, window.document, jQuery));
	</script>
<?php endif; ?>

<?php
if( st_is_ver_ex_af() && ! wp_is_mobile() && get_theme_mod( 'st_fixed_pc_header', '' ) === 'fixed' ): // ヘッダーナビゲーション（PC）が「固定」の場合 ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(document).ready(function(){
				// headbox-bgの高さを取得して適用する関数
				var headbox = $('#headbox-bg');
				var headboxHeight = headbox.length > 0 ? headbox.height() : 0; // headbox-bgが存在する場合のみ高さを計算

				// スクロールイベント
				$(window).on('scroll', function() {
					// 現在のスクロール位置を取得
					var scroll = $(window).scrollTop();

					// headbox-bgが存在するか確認し、存在する場合のみ処理を行う
					if (headbox.length > 0) {
						var currentHeight = headbox.height(); // headbox-bgの高さを再計算

						// スクロール位置がheadbox-bgの高さ以上の場合
						if (scroll >= currentHeight) {
							headbox.addClass('st-header-fixed'); // st-header-fixedクラスを追加
						} else {
							headbox.removeClass('st-header-fixed'); // st-header-fixedクラスを削除
						}
					}
				});
			});
		}(window, window.document, jQuery));
	</script>
<?php elseif( st_is_ver_ex() && ! wp_is_mobile() && get_theme_mod( 'st_fixed_pc_header', '' ) === 'fixed-pcmenu' ): // ヘッダーメニュー（PC）が「固定」の場合 ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(document).ready(function(){
				// nav要素の底辺の位置を計算する関数
				function getBottomPosition() {
					var nav = $('nav.smanone'); // 対象のnav要素を選択
					if (nav.length === 0) return 0; // 要素が存在しない場合は0を返す
					var navTop = nav.offset().top; // nav要素の上辺の位置
					var navHeight = nav.height(); // nav要素の高さ
					var navBottom = navTop + navHeight; // nav要素の底辺の位置
					return navBottom;
				}
				var headboxHeight = getBottomPosition(); // nav要素の底辺の位置を再計算

				// スクロールイベント
				$(window).on('scroll', function() {
					var scroll = $(window).scrollTop(); // 現在のスクロール位置を取得

					// ターゲットとなる要素のリスト
					var targets = ['nav.smanone', '#st-menubox', '#st-menuwide'];

					// スクロール位置がnav要素の底辺の位置より下かどうかによってクラスを切り替える
					targets.forEach(function(selector) {
						var element = $(selector);
						if (element.length === 0) return; // 要素が存在しない場合は何もしない
						if (scroll >= headboxHeight) {
							element.addClass('st-header-fixed'); // st-header-fixedクラスを追加
						} else {
							element.removeClass('st-header-fixed'); // st-header-fixedクラスを削除
						}
					});
				});
			});
		}(window, window.document, jQuery));
	</script>
<?php elseif( st_is_ver_ex() && ! wp_is_mobile() && get_theme_mod( 'st_fixed_pc_header', '' ) === 'fixed-headerinfo' ): // ヘッダーインフォメーション（PC）が「固定」の場合 ?>
	<script>
		(function (window, document, $, undefined) {
			'use strict';

			$(document).ready(function(){
				// 要素の底辺の位置を計算する関数
				function getBottomPosition() {
					var nav = $('#st-header-top-widgets-box'); // 対象の要素を選択
					if (nav.length === 0) return 0; // 要素が存在しない場合は0を返す
					var navTop = nav.offset().top; // 要素の上辺の位置
					var navHeight = nav.height(); // 要素の高さ
					var navBottom = navTop + navHeight; // 要素の底辺の位置
					return navBottom;
				}
				var headboxHeight = getBottomPosition(); // 要素の底辺の位置を再計算

				// スクロールイベント
				$(window).on('scroll', function() {
					var scroll = $(window).scrollTop(); // 現在のスクロール位置を取得

					// ターゲットとなる要素のリスト
					var targets = ['#st-header-top-widgets-box', '#st-header-top-widgets-box-wrapper'];

					// スクロール位置がnav要素の底辺の位置より下かどうかによってクラスを切り替える
					targets.forEach(function(selector) {
						var element = $(selector);
						if (element.length === 0) return; // 要素が存在しない場合は何もしない
						if (scroll >= headboxHeight) {
							element.addClass('st-header-fixed'); // st-header-fixedクラスを追加
						} else {
							element.removeClass('st-header-fixed'); // st-header-fixedクラスを削除
						}
					});
				});

			});
		}(window, window.document, jQuery));
	</script>
<?php endif; 
