<?php
/**
 * ランキングショートコード
 *
 * @var \Pimple\Container $container コンテナー
 * @var \Dharma\TemplatingInterface $templating テンプレート
 * @var \Dharma\UrlGeneratorInterface $url_generator URL ジェネレーター
 * @var \Dharma\MappableUrlGeneratorInterface $admin_url_generator 管理画面の URL ジェネレーター
 * @var \St\Plugin\AffiliateManager\Plugin\ViewHelper $helper ビューヘルパー
 *
 * @var \St\Plugin\PvMonitor\Tracker\Ranking\Ranking $daily_ranking 当日のランキング
 * @var \St\Plugin\PvMonitor\Tracker\Ranking\Ranking $weekly_ranking 週間のランキング
 * @var \St\Plugin\PvMonitor\Tracker\Ranking\Ranking $monthly_ranking 月間のランキング
 * @var bool $show_pv PV を表示するかどうか
 */

use St\Plugin\AffiliateManager\Tracker\Query\QueryTypeIds;

/** @var \Dharma\Plugin\MetaInterface $plugin_meta プラグインのメタデータ */
$plugin_meta = $container['pv_monitor.plugin.meta'];

/**
 * @var array<number, array<string, mixed>> $rankingDefinitions ランキングの定義
 */
$rankingDefinitions = [
	[
		'title'   => '本日',
		'ranking' => $daily_ranking,
	],
	[
		'title'   => '週間',
		'ranking' => $weekly_ranking,
	],
	[
		'title'   => '月間',
		'ranking' => $monthly_ranking,
	],
];

/** @var string[] クラス値 */
$pvm_classes = [];

$pvm_classes[] = $show_pv ? 'has-pv' : '';

$pvm_classes     = array_filter( $pvm_classes );
$pvm_class_value = ( count( $pvm_classes ) > 0 ) ? ( ' ' . implode( ' ', $pvm_classes ) ) : '';
?>

<div class="st-pvm<?php echo esc_attr( $pvm_class_value ); ?>" data-st-pvm>

	<?php // ナビゲーション ?>
	<div class="st-pvm-nav">
		<ul class="st-pvm-nav-list">
			<?php $index = 0; ?>
			<?php foreach ( $rankingDefinitions as $rankingDefinition ):    // 各ランキング ?>
				<?php if ( $rankingDefinition['ranking'] ):    // ランキング表示ありの場合 ?>
					<?php
					$index ++;
					$nav_data_attr = ( $index === 1 ) ? ' data-st-pvm-is-active' : '';
					?>

					<li class="st-pvm-nav-item" data-st-pvm-nav="<?php echo esc_attr( $index ); ?>"<?php echo $nav_data_attr; ?>>
						<?php echo esc_html( $rankingDefinition['title'] ); ?>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>

	<?php // ランキング全体 ?>
	<div class="st-pvm-rankings">
		<?php $index = 0; ?>
		<?php foreach ( $rankingDefinitions as $rankingDefinition ):    // 各ランキング ?>
			<?php
			/** @var \St\Plugin\PvMonitor\Tracker\Ranking\Ranking $ranking ランキング $ranking */
			$ranking = $rankingDefinition['ranking'];
			?>

			<?php if ( $ranking ):    // ランキング表示ありの場合 ?>
				<?php
				$index ++;
				$ranking_data_attr = ( $index === 1 ) ? ' data-st-pvm-is-active' : '';
				?>

				<div class="st-pvm-ranking" data-st-pvm-id="<?php echo esc_attr( $index ); ?>"<?php echo $ranking_data_attr; ?>>
					<div class="st-pvm-ranking-body">

						<?php if ( $ranking->hasItems() ): $item_index = 0;    // 計測データありの場合 ?>
							<ol class="st-pvm-ranking-list">

								<?php
								/**
								 * @var int $rank 順位
								 * @var \St\Plugin\PvMonitor\Tracker\Ranking\RankingItem $item ランキング項目
								 */
								?>
								<?php foreach ( $ranking->getItems() as $rank => $item ): $item_index ++;    // 各ランキング項目 ?>

									<?php
									/** @var \St\Plugin\AffiliateManager\Tracker\Query\Query $query クエリ情報 */
									$query = $item->getQuery();

									/**
									 * @var string $query_type_id クエリタイプの ID
									 *
									 * @see \St\Plugin\AffiliateManager\Tracker\Query\QueryTypeIds
									 */
									$query_type_id = $query->getType()->getId();

									/** @var string $queried_id クエリ ID (投稿 ID 等) */
									$queried_id = $query->getQueriedId();

									/** @var \St\Plugin\AffiliateManager\Tracker\Source\Source $source ページ情報 */
									$source = $item->getSource();

									/**
									 * @var string[] 単一ページ (標準でアイキャッチ画像/抜粋表示が可能) のクエリタイプ ID
									 *
									 * @see \St\Plugin\AffiliateManager\Tracker\Query\QueryTypeIds
									 */
									$singular_query_type_ids = [
										QueryTypeIds::SINGLE,
										QueryTypeIds::PAGE,
										QueryTypeIds::SINGULAR,
									];

									/** @var bool $is_singular 単一ページのクエリタイプかどうか */
									$is_singular = in_array( $query_type_id, $singular_query_type_ids, true );

									/**
									 * @var string[] タクソノミーアーカイブ (標準で抜粋表示可能なアーカイブ) のクエリタイプ ID
									 *
									 * @see \St\Plugin\AffiliateManager\Tracker\Query\QueryTypeIds
									 */
									$tax_archive_query_type_ids = [
										QueryTypeIds::TAXONOMY,
										QueryTypeIds::CATEGORY,
										QueryTypeIds::TAG,
									];

									/** @var bool $is_singular タクソノミーアーカイブのクエリタイプかどうか */
									$is_tax_archive = in_array( $query_type_id, $tax_archive_query_type_ids, true );

									/** @var string $post_thumbnail アイキャッチ画像の HTML (デフォルト) */
									$post_thumbnail = '<img src="' . get_template_directory_uri() . '/images/no-img.png" width="300" height="300" alt="no image" title="no image">';

									/** @var string $excerpt 抜粋 */
									$excerpt = '';

									if ( $is_singular ) {    // 単一ページ (投稿/固定ページ等が対象)
										$_post = get_post( $queried_id );

										// 抜粋の自動生成によるループを回避, 抜粋生成元をランキング項目のページに書き換え
										$globals = [
											'post'      => isset( $GLOBALS['post'] ) ? $GLOBALS['post'] : null,
											'page'      => isset( $GLOBALS['page'] ) ? $GLOBALS['page'] : null,
											'pages'     => isset( $GLOBALS['pages'] ) ? $GLOBALS['pages'] : null,
											'more'      => isset( $GLOBALS['more'] ) ? $GLOBALS['more'] : null,
											'multipage' => isset( $GLOBALS['multipage'] ) ? $GLOBALS['multipage'] : null,
										];

										$GLOBALS['post']      = $_post;
										$GLOBALS['page']      = 1;
										$GLOBALS['pages']     = [
											preg_replace( '/<!--more(.*?)?-->/', '', $_post->post_content ),
										];
										$GLOBALS['more']      = false;
										$GLOBALS['multipage'] = false;

										// =============================================================================
										// A. 投稿/固定ページ (ランキング項目) 向けの定義
										//    投稿ループや投稿/固定ページ前提にしているものはここから ...
										//
										// * `while ( have_posts() ): /* (略) */` 内や投稿/固定ページ //   (single.php, page.php 等)
										//   で出力することを前提にしているコードはこの間に書く。
										//
										//   * 例: `the_title()` 等の**現在**の投稿の内容を取得/出力するもの等。
										//
										// * `get_template_part()`, `the_title()` のような出力を伴うものは、この間で以下のように書きなおす。
										//
										// ob_start();                         // 1. 出力内容を出力しないようにする。
										// get_template_part('ファイル名');    // 2. `get_template_part()` や出力を伴う関数呼び出し。
										// $foo = ob_get_clean();              // 3. いったん、出力内容を $foo に代入しておく。
										//                                     // 4. HTML 部分で echo $foo; する。
										// =============================================================================
										ob_start();
										get_template_part( 'st-excerpt-side' );    // サイド抜粋
										$excerpt = ob_get_clean();

										if ( st_has_post_thumbnail() ) {    // アイキャッチ画像
											ob_start();
											get_template_part( 'st-thumbnail' );
											$post_thumbnail = ob_get_clean();
										}

										// タイトルの取得例
										// $title = get_the_title();

										// =============================================================================
										// ... ここまでの間でいったん変数に代入しておく
										// =============================================================================

										$GLOBALS['post']      = $globals['post'];
										$GLOBALS['page']      = $globals['page'];
										$GLOBALS['pages']     = $globals['pages'];
										$GLOBALS['more']      = $globals['more'];
										$GLOBALS['multipage'] = $globals['multipage'];
									} elseif ( $is_tax_archive ) {    // タクソノミーアーカイブ
										// =============================================================================
										// B. アーカイブページ (ランキング項目) 向けの定義
										//
										// * A. で新しい変数 $foo を定義して、 HTML 部分で echo $foo; する場合、
										//   ここでアーカイブページ向けの $foo も定義しておかないと、アーカイブページ項目の表示でエラーになる。
										//
										//   または、 HTML 部分で投稿/固定ページかどうかで分岐させる (後述)。
										// =============================================================================
										$excerpt        = strip_tags( do_shortcode( term_description( $queried_id ) ) );
										$excerpt_length = apply_filters( 'excerpt_length', 55 );
										$excerpt_more   = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );
										$excerpt        = wp_trim_words( $excerpt, $excerpt_length, $excerpt_more );
										$excerpt        = '<div class="smanone st-excerpt"><p>' . $excerpt . '</p></div>';
									}

									$has_excerpt = ( trim( $excerpt ) !== '' );

									/** @var string[] クラス値 */
									$item_classes = [
										'st-pvm-ranking-item-' . $item_index,
									];

									$item_classes[] = $has_excerpt ? 'has-excerpt' : '';

									// `<li>` へのクラス追加例
									// if (条件) {
									//     $item_classes[] 'foo';
									// }

									$item_classes     = array_filter( $item_classes );
									$item_class_value = ( count( $item_classes ) > 0 )
										? ( ' ' . implode( ' ', $item_classes ) )
										: '';
									?>

									<li class="st-pvm-ranking-item<?php echo esc_attr( $item_class_value ); ?>">
										<a class="st-pvm-ranking-item-image"
										   href="<?php echo esc_url( $source->getUrl() ); ?>">
											<?php echo $post_thumbnail;    // アイキャッチ画像  ?>
										</a>

										<div class="st-pvm-ranking-item-body">
											<p class="st-pvm-ranking-item-h">
												<a class="st-pvm-ranking-item-title"
												   href="<?php echo esc_url( $source->getUrl() ); ?>">
													<?php echo esc_html( $source->getTitle() ); ?>
												</a>

												<?php if ( $show_pv ):    // PV を表示する場合 ?>
													<span class="st-pvm-ranking-item-pv"><!--
													 --><span
															class="st-pvm-ranking-item-pv-number"><?php echo esc_html( number_format( $item->getPv() ) ); ?></span><!--
													 --><span class="st-pvm-ranking-item-pv-unit">PV</span><!--
												  --></span>
												<?php endif; ?>
											</p>

											<?php if ( $has_excerpt ):    // 抜粋が表示可な場合 ?>
												<div class="st-pvm-ranking-item-excerpt">
													<?php echo $excerpt; ?>
												</div>
											<?php endif; ?>
										</div>

										<?php // if ( $is_singular ):    // 投稿・固定ページのランキング項目のみを対象として出力したい場合 ?>
											<?php // HTML 等 ?>
										<?php // endif; ?>

										<?php // if ( $is_tax ):    // アーカイブページのランキング項目のみを対象として出力したい場合 ?>
											<?php // HTML 等 ?>
										<?php // endif; ?>
									</li>

								<?php endforeach; ?>

							</ol>

						<?php else:    // 計測データなしの場合 ?>
							<p class="st-pvm-ranking-no-result">計測データがありません。</p>
						<?php endif; ?>

					</div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
