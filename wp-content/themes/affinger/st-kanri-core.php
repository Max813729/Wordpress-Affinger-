<?php
/*
 * テーマ管理の統一設定
 * st_kanri_wysiwyg_editor( "場所名 (≒ エディタのID / 場所ごとに固有の名前)", "オプション名" )
 */

if ( ! function_exists( '_st_admin_display_general_section' ) ) {
	/** サイト全体 */
    function _st_admin_display_general_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
	?>

		<div id="layout-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-palette" aria-hidden="true"></i>サイト全体の設定</h3>

		<ul class="theme-kanri-menu">
			<li><a href="#カテゴリーリンク"><i class="st-fa st-svg-folder"></i>カテゴリーリンク</a></li>
			<li><a href="#サイト全体のレイアウト"><i class="st-fa st-svg-columns" aria-hidden="true"></i>サイト全体のレイアウト</a></li>
			<li><a href="#サムネイル画像設定"><i class="st-fa st-svg-file-image-o" aria-hidden="true"></i>サムネイル画像設定</a></li>
			<li><a href="#抜粋設定"><i class="st-fa st-svg-pencil-square-o"></i>抜粋設定</a></li>
			<li><a href="#フォントのサイズ"><i class="st-fa st-svg-font"></i>フォントのサイズ</a></li>
			<li><a href="#フォントの種類"><i class="st-fa st-svg-font"></i>フォントの種類</a></li>
		</ul>

			<div style="border:solid 1px #ccc;padding:10px;text-align:center;margin-bottom:10px;"><p style="padding:0;margin:0;">基本的なカラー設定は「外観」＞「カスタマイズ」で行えます</p></div>

		<div id="colorchice">
			<h5 style="margin-bottom:5px;">カラーパターン</h5>
               <p>
                    <input type="radio" name="st-data68" value="red" <?php if ( $GLOBALS["stdata68"] === 'red' ) {
                         echo 'checked';
                    } ?>>
                    赤（エレガント）
                    <input type="radio" name="st-data68" value="blue" <?php if ( $GLOBALS["stdata68"] === 'blue' ) {
                         echo 'checked';
                    } ?>>
                    青（ビジネス）
                    <input type="radio" name="st-data68" value="green" <?php if ( $GLOBALS["stdata68"] === 'green' ) {
                         echo 'checked';
                    } ?>>
                    緑（ナチュラル）
                    <input type="radio" name="st-data68" value="orange" <?php if ( $GLOBALS["stdata68"] === 'orange' ) {
                         echo 'checked';
                    } ?>>
		    オレンジ（元気）
                    <input type="radio" name="st-data68" value="pink" <?php if ( $GLOBALS["stdata68"] === 'pink' ) {
                         echo 'checked';
                    } ?>>
                    ピンク（可愛い）
                    <input type="radio" name="st-data68" value="glay" <?php if ( $GLOBALS["stdata68"] === 'glay' ) {
                         echo 'checked';
                    } ?>>
                    グレー（ダーク）
                    <input type="radio" name="st-data68" value="red_y" <?php if ( $GLOBALS["stdata68"] === 'red_y' ) {
                         echo 'checked';
                    } ?>>
                    赤（やさしい）
                    <input type="radio" name="st-data68" value="blue_y" <?php if ( $GLOBALS["stdata68"] === 'blue_y' ) {
                         echo 'checked';
                    } ?>>
                    青（やさしい）
                    <input type="radio" name="st-data68" value="green_y" <?php if ( $GLOBALS["stdata68"] === 'green_y' ) {
                         echo 'checked';
                    } ?>>
                    緑（やさしい）
                    <input type="radio" name="st-data68" value="orange_y" <?php if ( $GLOBALS["stdata68"] === 'orange_y' ) {
                         echo 'checked';
                    } ?>>
		    オレンジ（やさしい）
                    <input type="radio" name="st-data68" value="pink_y" <?php if ( $GLOBALS["stdata68"] === 'pink_y' ) {
                         echo 'checked';
                    } ?>>
                    ピンク（やさしい）
                    <input type="radio" name="st-data68" value="glay_y" <?php if ( $GLOBALS["stdata68"] === 'glay_y' ) {
                         echo 'checked';
                    } ?>>
                    グレー（やさしい）
                    <input type="radio" name="st-data68" value="" <?php if ( $GLOBALS["stdata68"] === '' ) {
                         echo 'checked';
                    } ?>>
				   リセット
		</p>
		<h5 style="margin-bottom:5px;">デザインパターン（カスタマイザーの初期値及びリセット値）</h5>
			<p>
                    <input type="radio" name="st-data261" value="" <?php if ( $GLOBALS["stdata261"] === '' ) {
                         echo 'checked';
                    } ?>>
                    ノーマル（グラデーション横）
                    <input type="radio" name="st-data261" value="biz" <?php if ( $GLOBALS["stdata261"] === 'biz' ) {
                         echo 'checked';
                    } ?>>
                    ビジネス（グラデーション縦）
                    <input type="radio" name="st-data261" value="flat" <?php if ( $GLOBALS["stdata261"] === 'flat' ) {
                         echo 'checked';
                    } ?>>
					フラット
                    <input type="radio" name="st-data261" value="cute" <?php if ( $GLOBALS["stdata261"] === 'cute' ) {
                         echo 'checked';
                    } ?>>
                    キューティー（ストライプ）
					<input type="radio" name="st-data261" value="blog" <?php if ( $GLOBALS["stdata261"] === 'blog' ) {
                         echo 'checked';
                    } ?>>
					ブログ
					<?php if ( $st_is_ex ) { ?>
						<input type="radio" name="st-data261" value="ex" <?php if ( $GLOBALS["stdata261"] === 'ex' ) {
							 echo 'checked';
						} ?>>
					EX（限定※チェックボックスがシンプルバージョンに変更）
					<?php } ?>
                    <input type="radio" name="st-data261" value="reset" <?php if ( $GLOBALS["stdata261"] === 'reset' ) {
                         echo 'checked';
                    } ?>>
					リセット
		</p>
		<ul class="komozi">
			<li>※すでに変更済みのカラーは「色を選択」＞「デフォルト」で選択できます</li>
			<li style="color:#f44336;">※カラーやデザインが上手く反映されない場合は「全体カラー設定」の「カスターマイザーをリセットする」を使用して下さい</li>
		</ul>

		<h5 style="margin-bottom:5px;">ドロップシャドウ</h5>

		<p>
			<input type="checkbox" name="st-data628" value="yes" <?php if ( $GLOBALS["stdata628"] === 'yes' ) {
				echo 'checked';
			} ?>>
			ボタンに透過シャドウを適応する（一括強制）
		</p>

		<p>
			<input type="checkbox" name="st-data498" value="yes" <?php if ( $GLOBALS["stdata498"] === 'yes' ) {
				echo 'checked';
			} ?>>
			以下の要素にドロップシャドウを追加します
		</p>
		<ul class="komozi">
			<li>おすすめヘッダーバナー・記事パーツ（まるもじ・ミニふきだし・おすすめ記事・ステップ・ポイント・タイトル付きフリーボックス・マイボックス・クリップメモ・こんな方におすすめ）</li>
		</ul>

		<p>
			その他の適応ID及びクラス：<input type="text" name="st-data499" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata499"] ) ); ?>" style="width:30%" placeholder=".st-kaiwa-hukidashi,.st-kaiwa-hukidashi2" />
			<br/><span class="komozi">※複数のクラスは「,（半角カンマ）」で区切ってください（末尾の「,」は不要）</span>
		</p>

		<h5 style="margin-bottom:5px;">テキストシャドウ</h5>

		<p>
			適応ID及びクラス：<input type="text" name="st-data629" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata629"] ) ); ?>" style="width:30%" placeholder="header .sitename a,.head-telno a" />
			<br/><span class="komozi">※複数のクラスは「,（半角カンマ）」で区切ってください（末尾の「,」は不要）</span>
		</p>

		</div>

		<p>
			<input type="checkbox" name="st-data90" value="yes" <?php if ( $GLOBALS["stdata90"] === 'yes' ) {
				echo 'checked';
			} ?>>
			カスタマイザー用CSSを&lt;style&gt;で出力
		</p>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="カテゴリーリンク"><i class="st-fa st-svg-folder"></i>カテゴリーリンク（サイドバー / フッター）</h4>

		<div>
			<p>
				<input type="hidden" name="st-data201" value="">
				<input type="checkbox" name="st-data201" value="yes"<?php checked( $GLOBALS["stdata201"] === 'yes' ); ?>>
				カテゴリーリンクに簡易デザイン適応
			</p>

			<?php if( $st_is_ex ){ ?>
					<p style="margin-left: 1.5em;">
						<input type="checkbox" name="st-data334" value="yes"
							<?php checked( $GLOBALS["stdata334"] === 'yes' ); ?>>
						親カテゴリーリンクにサムネイル画像を表示
					</p>
					<p style="margin-left: 1.5em;">
						<input type="checkbox" name="st-data335" value="yes"
							<?php checked( $GLOBALS["stdata335"] === 'yes' ); ?>>
						子カテゴリーリンクにサムネイル画像を表示
					</p>
					<p style="margin-left: 3em;">
						<input type="checkbox" name="st-data336" value="yes" <?php checked( $GLOBALS["stdata336"] === 'yes' ); ?>
							<?php disabled( $GLOBALS["stdata201"] !== 'yes' || ( $GLOBALS['stdata334'] !== 'yes' && $GLOBALS['stdata335'] !== 'yes' ) ); ?>>
						サムネイル画像を丸くする
					</p>
			<?php }
			sale_comment_ex(); // セールスコピー ?>
		</div>

		<p>
			カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data329" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata329"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>
		</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="サイト全体のレイアウト"><i class="st-fa st-svg-columns" aria-hidden="true"></i>サイト全体のレイアウト一括設定※ここの設定が最優先されます</h4>
				<?php $default_width = ( $GLOBALS["stdata128"] !== '' ) ? $GLOBALS["stdata128"] : '1060'; //デフォルトのwidth ?>
               <p>PC閲覧時のサイトの幅（width※デフォルトは1060px）：
                    <input type="number" pattern="^[0-9]+$" name="st-data128" value="<?php echo esc_attr( $GLOBALS["stdata128"] ); ?>" placeholder="1060">px
               <br/>※960px以上で設定して下さい
			   <br/>PC閲覧時の1カラムのコンテンツエリアの幅（width※デフォルトはPC閲覧時のサイトの幅）：
				   <input type="number" pattern="^[0-9]+$" name="st-data239" value="<?php echo esc_attr( $GLOBALS["stdata239"] ); ?>" placeholder="<?php echo esc_attr( $default_width ); ?>">px
               </p>

               <p>
                    <input type="radio" name="st-data77" value="yes" <?php if ( $GLOBALS["stdata77"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    サイト全体を1カラムにする <br />
                    <input type="radio" name="st-data77" value="lp" <?php if ( $GLOBALS["stdata77"] === 'lp' ) {
                         echo 'checked';
                    } ?>>
                    サイト全体をLP化する<br />
                    <input type="radio" name="st-data77" value="" <?php if ( $GLOBALS["stdata77"] === '' ) {
                         echo 'checked';
                    } ?>>
                    サイト全体のレイアウトをリセットする</p>

				<?php if( $st_is_ex ){ ?>

					<p style="margin-left: 1.5em;">
					<input type="hidden" name="st-data233" value="">
					<input type="checkbox" name="st-data233" value="yes"
						<?php checked( $GLOBALS["stdata233"] === 'yes' ); ?><?php disabled( trim ( $GLOBALS["stdata77"] ) !== '' ); ?>>
					   カテゴリーの一覧ページを1カラムにする</p>

					<p>
						<input type="checkbox" name="st-data375" value="yes" <?php if ( $GLOBALS["stdata375"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						LP時に左右にシャドウを付ける</p>

				   <p>
						<input type="checkbox" name="st-data366" value="yes" <?php if ( $GLOBALS["stdata366"] === 'yes' ) {
							 echo 'checked';
						} ?>>
					   LP・1カラム時を全てワイド化する（β）</p>
					<p class="komozi">※「LP・1カラム時をワイド化する（β）」且つ「左右にシャドウを付ける」は表示コンテンツなどが著しく変化する特殊なレイアウトです。マニュアルの注意事項をご確認の上、ご利用下さい</p>

			<?php } ?>

			<p>
				<input type="checkbox" name="st-data620" value="yes" <?php if ( $GLOBALS["stdata620"] === 'yes' ) {
					 echo 'checked';
				} ?>>
				LP時にヘッダー（headerエリア）を表示する ※トップページは別設定</p>

			<p>
				<input type="checkbox" name="st-data627" value="yes" <?php if ( $GLOBALS["stdata627"] === 'yes' ) {
					echo 'checked';
				} ?>>
				スマホのサイドバーを非表示にする</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="サムネイル画像設定"><i class="st-fa st-svg-file-image-o" aria-hidden="true"></i>サムネイル画像設定</h4>

		<p>デフォルトのサムネイル画像（※150px以上推奨）：<input type="text" name="st-data97" value="<?php echo esc_attr( ( $GLOBALS["stdata97"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.png"></p>
				<?php st_media_editor_button( 'st-data97', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data97', '削除' ); ?>
			<div style="display:none;">
				<?php if ( !empty( $GLOBALS["stdata97"] ) ) { ?>
					<p>現在のアイキャッチが無い時のサムネイル画像URL</p><p><img src="<?php echo esc_url( ( $GLOBALS["stdata97"] ) ); ?>" width="100px"></p>
				<?php } ?>
			</div>

		<h5 id="記事一覧サムネイル" class="grid-bg">記事一覧</h5>

               <p>
				   <input type="radio" name="st-data403" value="maru" <?php if ( $GLOBALS["stdata403"] === 'maru' ) {
                         echo 'checked';
                    } ?>>丸くする
				   <input type="radio" name="st-data403" value="" <?php if ( $GLOBALS["stdata403"] === '' ) {
                         echo 'checked';
                    } ?>>正方形にする
				   <input type="radio" name="st-data403" value="full" <?php if ( $GLOBALS["stdata403"] === 'full' ) {
                         echo 'checked';
                    } ?>>フルサイズにする*
				   <input type="radio" name="st-data403" value="original" <?php if ( $GLOBALS["stdata403"] === 'original' ) {
                         echo 'checked';
                    } ?>>メディア設定にする
			</p>

			<div class="linked">
 	              <p>
	                    <input type="checkbox" name="st-data251" value="yes" <?php if ( $GLOBALS["stdata251"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
					   サムネイル画像をポラロイド風にする</p>
	
					<p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data252" value="yes" <?php if ( $GLOBALS["stdata252"] === 'yes' ) {
	                         	echo 'checked';
	                    	} ?>>
						セロテープを付ける</p>
			</div>

               <p>
                    <input type="checkbox" name="st-data451" value="yes" <?php if ( $GLOBALS["stdata451"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   サムネイル画像を右側に変更する</p>

			<p>
                    <input type="checkbox" name="st-data488" value="yes" <?php if ( $GLOBALS["stdata488"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   サムネイル画像を角丸に変更する</p>

				<div class="linked-two">
	               <p>
	                    <input type="checkbox" name="st-data91" value="yes" <?php if ( $GLOBALS["stdata91"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
					   PC（960px以上）のサムネイル画像を大きくする</p>
	
					<p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data405" value="yes" <?php if ( $GLOBALS["stdata405"] === 'yes' ) {
	                         	echo 'checked';
	                    	} ?>>
						スマホ（599px以下）でもサムネイル画像を大きくする</p>
	
					<p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data477" value="yes" <?php if ( $GLOBALS["stdata477"] === 'yes' ) {
	                         	echo 'checked';
	                    	} ?>>
						サムネイル画像をさらに大きく（β）</p>
				</div>

               <p>
                    <input type="checkbox" name="st-data5" value="yes" <?php if ( $GLOBALS["stdata5"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                   サムネイル画像を表示しない</p>

			<p class="komozi">※子テーマや設定によっては反映されないデザインもあります</p>

			<h5 id="ブログカード埋め込みURL" class="grid-bg">ブログカード・埋め込みURL</h5>

               <p>
                    <input type="checkbox" name="st-data636" value="yes" <?php if ( $GLOBALS["stdata636"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   内部リンクのサムネイル画像をそのまま表示する</p>

               <p>
                    <input type="checkbox" name="st-data640" value="yes" <?php if ( $GLOBALS["stdata640"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   サムネイル画像を右側に変更する</p>

			<p>
                    <input type="checkbox" name="st-data641" value="yes" <?php if ( $GLOBALS["stdata641"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   サムネイル画像を角丸に変更する</p>

				<div class="linked-two">
	               <p>
	                    <input type="checkbox" name="st-data637" value="yes" <?php if ( $GLOBALS["stdata637"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
					   PC（960px以上）のサムネイル画像を大きくする</p>
	
					<p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data639" value="yes" <?php if ( $GLOBALS["stdata639"] === 'yes' ) {
	                         	echo 'checked';
	                    	} ?>>
						スマホ（599px以下）でもサムネイル画像を大きくする</p>
	
					<p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data638" value="yes" <?php if ( $GLOBALS["stdata638"] === 'yes' ) {
	                         	echo 'checked';
	                    	} ?>>
						サムネイル画像をさらに大きく（β）</p>
				</div>

               <p>
                    <input type="checkbox" name="st-data642" value="yes" <?php if ( $GLOBALS["stdata642"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                   サムネイル画像を表示しない</p>

			<h5 id="サムネイル画像縦横比" class="grid-bg">スライド・カード型 サムネイル画像の縦横比</h5>
			<p>スライドショー及びカード（EX）、JETの記事一覧サムネイル画像の縦横比</p>

               <p>
                    <input type="radio" name="st-data606" value="" <?php if ( $GLOBALS["stdata606"] === '' ) {
                         echo 'checked';
                    } ?>>
				   デフォルト
				   <input type="radio" name="st-data606" value="h56" <?php if ( $GLOBALS["stdata606"] === 'h56' ) {
                         echo 'checked';
                    } ?>>
				   16 : 9 
				   <input type="radio" name="st-data606" value="h52" <?php if ( $GLOBALS["stdata606"] === 'h52' ) {
                         echo 'checked';
                    } ?>>
				   1.91 : 1 
				   <input type="radio" name="st-data606" value="h75" <?php if ( $GLOBALS["stdata606"] === 'h75' ) {
                         echo 'checked';
                    } ?>>
				   4 : 3 
				   <input type="radio" name="st-data606" value="h67" <?php if ( $GLOBALS["stdata606"] === 'h67' ) {
                         echo 'checked';
                    } ?>>
				   3 : 2</p>

			<p><b>【基準】</b></p>

               <p>
                    <input type="radio" name="st-data608" value="" <?php if ( $GLOBALS["stdata608"] === '' ) {
                         echo 'checked';
                    } ?>>
				   自動（高さに応じて）
                    <input type="radio" name="st-data608" value="width" <?php if ( $GLOBALS["stdata608"] === 'width' ) {
                         echo 'checked';
                    } ?>>
				   横幅（width）
				   <input type="radio" name="st-data608" value="height" <?php if ( $GLOBALS["stdata608"] === 'height' ) {
                         echo 'checked';
                    } ?>>
				   高さ（height）</p>

			<?php if ( st_speed_on() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
				<p>
					<input type="checkbox" name="st-data564" value="yes" <?php if ( $GLOBALS["stdata564"] === 'yes' ) {
							 echo 'checked';
						} ?>>
					フルサイズ画像を読み込む
				</p>
			<?php if ( st_speed_on() ){ echo '</div>'; } ?>

			<hr>

			<?php sale_comment_lazy_load(); // セールスコピー ?>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="抜粋設定"><i class="st-fa st-svg-pencil-square-o"></i>抜粋設定</h4>

               <p>抜粋の文字数※デフォルトは100（ブログカード風ショートコード含む）：
                    <input type="number" name="st-data73" value="<?php echo esc_attr( $GLOBALS["stdata73"] ); ?>" placeholder="100">
               </p>


               <p>
                    <input type="checkbox" name="st-data222" value="yes" <?php if ( $GLOBALS["stdata222"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   PC閲覧時も「最新の投稿一覧」ウィジェット及びサイドバーの記事一覧の抜粋を表示する<span class="st-guide"><a href="#" title="※960px以下では一覧の抜粋は表示されません（display:none）"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span></p>

               <p>
                    <input type="checkbox" name="st-data202" value="yes" <?php if ( $GLOBALS["stdata202"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                   PC閲覧時も記事一覧（トップ・アーカイブ・関連記事）の抜粋を非表示にする<span class="st-guide"><a href="#" title="※960px以下では一覧の抜粋はデフォルトで表示されません（display:none）"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span></p>

		<p>
			<input type="checkbox" name="st-data221" value="yes" <?php if ( $GLOBALS["stdata221"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    PC閲覧時の「ブログカード」及びコンテンツ内の「おすすめ記事」の抜粋を非表示にする<span class="st-guide"><a href="#" title="※960px以下では一覧の抜粋はデフォルトで表示されません（display:none）"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span></p>

		<p>
			<input type="checkbox" name="st-data279" value="yes" <?php if ( $GLOBALS["stdata279"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    スマホ（960px未満）閲覧時でも「記事一覧・カテゴリー記事一覧」の抜粋を表示する</p>
		<p>
			<input type="checkbox" name="st-data280" value="yes" <?php if ( $GLOBALS["stdata280"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    スマホ（960px未満）閲覧時でも「ブログカード」の抜粋を表示する</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h4 id="フォントのサイズ"><i class="st-fa st-svg-font"></i>フォントのサイズ</h4>
			<p>記事コンテンツ内（entry-contentクラス）のフォントサイズを変更します（※補助的な設定機能となります。全てのフォントサイズを変更するものではございませんので御了承下さい。）</p>
			<h5><i class="st-fa st-svg-mobile" aria-hidden="true"></i>スマホ（～599px）閲覧時</h5>

			<div style="display:table;">
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>基本（Pタグ 他）</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data301" value="<?php echo esc_attr( $GLOBALS["stdata301"] ); ?>" placeholder="18"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data302" value="<?php echo esc_attr( $GLOBALS["stdata302"] ); ?>" placeholder="30"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>記事タイトル</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data303" value="<?php echo esc_attr( $GLOBALS["stdata303"] ); ?>" placeholder="22"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data304" value="<?php echo esc_attr( $GLOBALS["stdata304"] ); ?>" placeholder="35"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H2タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data305" value="<?php echo esc_attr( $GLOBALS["stdata305"] ); ?>" placeholder="20"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data306" value="<?php echo esc_attr( $GLOBALS["stdata306"] ); ?>" placeholder="27"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H3タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data307" value="<?php echo esc_attr( $GLOBALS["stdata307"] ); ?>" placeholder="19"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data308" value="<?php echo esc_attr( $GLOBALS["stdata308"] ); ?>" placeholder="27"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H4タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data309" value="<?php echo esc_attr( $GLOBALS["stdata309"] ); ?>" placeholder="18"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data310" value="<?php echo esc_attr( $GLOBALS["stdata310"] ); ?>" placeholder="27"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>記事一覧</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data470" value="<?php echo esc_attr( $GLOBALS["stdata470"] ); ?>" placeholder="17"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data471" value="<?php echo esc_attr( $GLOBALS["stdata471"] ); ?>" placeholder="24"> px</div>
				</div>
			</div>

			<h5><i class="st-fa st-svg-tablet" aria-hidden="true"></i>タブレット（959px～600px）閲覧時</h5>

			<div style="display:table;">
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>基本（Pタグ 他）</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data291" value="<?php echo esc_attr( $GLOBALS["stdata291"] ); ?>" placeholder="20"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data292" value="<?php echo esc_attr( $GLOBALS["stdata292"] ); ?>" placeholder="30"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>記事タイトル</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data293" value="<?php echo esc_attr( $GLOBALS["stdata293"] ); ?>" placeholder="27"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data294" value="<?php echo esc_attr( $GLOBALS["stdata294"] ); ?>" placeholder="40"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H2タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data295" value="<?php echo esc_attr( $GLOBALS["stdata295"] ); ?>" placeholder="24"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data296" value="<?php echo esc_attr( $GLOBALS["stdata296"] ); ?>" placeholder="35"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H3タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data297" value="<?php echo esc_attr( $GLOBALS["stdata297"] ); ?>" placeholder="22"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data298" value="<?php echo esc_attr( $GLOBALS["stdata298"] ); ?>" placeholder="32"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H4タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data299" value="<?php echo esc_attr( $GLOBALS["stdata299"] ); ?>" placeholder="21"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data300" value="<?php echo esc_attr( $GLOBALS["stdata300"] ); ?>" placeholder="31"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>記事一覧</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data472" value="<?php echo esc_attr( $GLOBALS["stdata472"] ); ?>" placeholder="20"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data473" value="<?php echo esc_attr( $GLOBALS["stdata473"] ); ?>" placeholder="30"> px</div>
				</div>
			</div>

			<h5><i class="st-fa st-svg-desktop" aria-hidden="true"></i>PC（960px以上）閲覧時</h5>
			<div style="display:table;">
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>基本（Pタグ 他）</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data281" value="<?php echo esc_attr( $GLOBALS["stdata281"] ); ?>" placeholder="15"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data282" value="<?php echo esc_attr( $GLOBALS["stdata282"] ); ?>" placeholder="27"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>記事タイトル</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data283" value="<?php echo esc_attr( $GLOBALS["stdata283"] ); ?>" placeholder="27"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data284" value="<?php echo esc_attr( $GLOBALS["stdata284"] ); ?>" placeholder="40"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H2タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data285" value="<?php echo esc_attr( $GLOBALS["stdata285"] ); ?>" placeholder="22"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data286" value="<?php echo esc_attr( $GLOBALS["stdata286"] ); ?>" placeholder="32"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H3タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data287" value="<?php echo esc_attr( $GLOBALS["stdata287"] ); ?>" placeholder="20"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data288" value="<?php echo esc_attr( $GLOBALS["stdata288"] ); ?>" placeholder="30"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>H4タグ</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data289" value="<?php echo esc_attr( $GLOBALS["stdata289"] ); ?>" placeholder="16"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data290" value="<?php echo esc_attr( $GLOBALS["stdata290"] ); ?>" placeholder="26"> px</div>
				</div>
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>記事一覧</b></div>
					<div style="display:table-cell;padding-right:5px;">サイズ：<input type="number" name="st-data474" value="<?php echo esc_attr( $GLOBALS["stdata474"] ); ?>" placeholder="16"> px</div>
					<div style="display:table-cell;">/ 行間：<input type="number" name="st-data475" value="<?php echo esc_attr( $GLOBALS["stdata475"] ); ?>" placeholder="26"> px</div>
				</div>
			</div>

			<h5>全体（一括設定）</h5>
			<div style="display:table;">
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>段落（Pタグ）下の余白</b></div>
					<div style="display:table-cell;padding-right:5px;">：<input type="number" name="st-data635" value="<?php echo esc_attr( $GLOBALS["stdata635"] ); ?>" placeholder="20"> px</div>
				</div>
			</div>
			<div style="display:table;">
				<div style="display:table-row;">
					<div style="display:table-cell;padding-right:5px;"><b>字間のスペース（<code>letter-spacing</code>）</b></div>
					<div style="display:table-cell;padding-right:5px;">：<input type="number" step="0.01" name="st-data649" value="<?php echo esc_attr( $GLOBALS["stdata649"] ); ?>" placeholder="0.02"> em</div>
				</div>
			</div>

			<p>※設定値によってはレイアウトやデザインが崩れる場合がございます。設定後はキャッシュ削除の上、表示をご確認下さい。（フォーム内の数値は目安です）</p>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h4 id="フォントの種類"><i class="st-fa st-svg-font"></i>フォントの種類</h4>

			<p>
                    <input type="checkbox" name="st-data430" value="yes" <?php if ( $GLOBALS["stdata430"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   Googleフォントに「display=swap」を付与（表示速度改善）</p>

			<h5>全体</h5>

			<?php if ( st_speed_on() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
               <p>
				    <input type="radio" name="st-data311" value="" <?php if ( $GLOBALS["stdata311"] === '' ) {
                         echo 'checked';
                    } ?>>
				   デフォルト
				    <input type="radio" name="st-data311" value="roundedmplus1c" <?php if ( $GLOBALS["stdata311"] === 'roundedmplus1c' ) {
                         echo 'checked';
                    } ?>>
				   M PLUS Rounded 1c（400）
				   <input type="radio" name="st-data311" value="noto" <?php if ( $GLOBALS["stdata311"] === 'noto' ) {
                         echo 'checked';
                    } ?>>
				   Noto Sans（400）
				   <input type="radio" name="st-data311" value="notoserif" <?php if ( $GLOBALS["stdata311"] === 'notoserif' ) {
                         echo 'checked';
                    } ?>>
				   Noto Serif（400）
				   <input type="radio" name="st-data311" value="yugo" <?php if ( $GLOBALS["stdata311"] === 'yugo' ) {
                         echo 'checked';
                    } ?>>
				   游ゴシック（500）
				   <input type="radio" name="st-data311" value="yumin" <?php if ( $GLOBALS["stdata311"] === 'yumin' ) {
                         echo 'checked';
                    } ?>>
				   游明朝（500）
				   <input type="radio" name="st-data311" value="yes" <?php if ( $GLOBALS["stdata311"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   旧テーマ版
			</p>
			<?php if ( st_speed_on() ){ echo '</div>'; } ?>


			<p>その他（優先）：<input type="text" name="st-data432" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata432"] ) ); ?>" style="width:60%" placeholder="font-family: 'Open Sans', sans-serif;" /></p>

			<p class="komozi">※選択したフォントによっては見出しテキストが細字となります。太字にしたい場合は下部の「記事タイトル・見出し（h2～3）・ウィジェットボタンなど」も設定して下さい。</p>

			<h5>記事タイトル・見出し（h2～3）・ウィジェットボタンなど</h5>

			<?php if ( st_speed_on() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
               <p>
				   <input type="radio" name="st-data98" value="normal" <?php if ( $GLOBALS["stdata98"] === 'normal' ) {
                         echo 'checked';
                    } ?>>
				   使用しない
				    <input type="radio" name="st-data98" value="roundedmplus1c" <?php if ( $GLOBALS["stdata98"] === 'roundedmplus1c' ) {
                         echo 'checked';
                    } ?>>
				   M PLUS Rounded 1c（700）
                    <input type="radio" name="st-data98" value="noto" <?php if ( $GLOBALS["stdata98"] === 'noto' ) {
                         echo 'checked';
                    } ?>>
				   Noto Sans（700）
				    <input type="radio" name="st-data98" value="notoserif" <?php if ( $GLOBALS["stdata98"] === 'notoserif' ) {
                         echo 'checked';
                    } ?>>
				   Noto Serif（600）
				    <input type="radio" name="st-data98" value="" <?php if ( $GLOBALS["stdata98"] === '' ) {
                         echo 'checked';
                    } ?>>
				   游ゴシック（700）
				   <input type="radio" name="st-data98" value="yumin" <?php if ( $GLOBALS["stdata98"] === 'yumin' ) {
                         echo 'checked';
                    } ?>>
				   游明朝（700）
				</p>
			<?php if ( st_speed_on() ){ echo '</div>'; } ?>

			<p>その他（優先）：<input type="text" name="st-data436" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata436"] ) ); ?>" style="width:60%" placeholder="font-family: 'Open Sans', sans-serif;" /></p>

			<p class="komozi">※游ゴシック及び游明朝はIE11にて若干のズレが生じます</p>

			<p>
				追加の反映範囲：<br>
				<label><input type="checkbox" name="st-data368" value="yes"<?php checked( $GLOBALS["stdata368"] === 'yes' ); ?>> サイト名</label>
				<label><input type="checkbox" name="st-data385" value="yes"<?php checked( $GLOBALS["stdata385"] === 'yes' ); ?>> h4,h5見出しタグ</label>
				<label><input type="checkbox" name="st-data369" value="yes"<?php checked( $GLOBALS["stdata369"] === 'yes' ); ?>> 記事一覧タイトル</label>
				<label><input type="checkbox" name="st-data371" value="yes"<?php checked( $GLOBALS["stdata371"] === 'yes' ); ?>> おすすめ記事・ブログカードタイトル</label>
				<label><input type="checkbox" name="st-data370" value="yes"<?php checked( $GLOBALS["stdata370"] === 'yes' ); ?>> 各メニュー（第一階層及びウィジェットボタン）</label>
				<label><input type="checkbox" name="st-data373" value="yes"<?php checked( $GLOBALS["stdata373"] === 'yes' ); ?>> 各メニュー（第二階層以下）</label>
				<label><input type="checkbox" name="st-data384" value="yes"<?php checked( $GLOBALS["stdata384"] === 'yes' ); ?>> 目次（※要プラグイン）</label>
				<?php if( $st_is_ex_af && ! st_is_ver_biz() ){ ?><label><input type="checkbox" name="st-data386" value="yes"<?php checked( $GLOBALS["stdata386"] === 'yes' ); ?>> ランキング見出し</label><?php } ?>
				<label><input type="checkbox" name="st-data397" value="yes"<?php checked( $GLOBALS["stdata397"] === 'yes' ); ?>> ボタン</label>
			</p>

			<p>
				適応ID及びクラス：<input type="text" name="st-data372" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata372"] ) ); ?>" style="width:30%" placeholder=".st-mybtn a" />
				<br/><span class="komozi">※複数のクラスは「,（半角カンマ）」で区切ってください<br/>※末尾の「,」は不要</span>
			</p>

			<h5>Googleフォント</h5>

			<p>※「display=swap」を使用したい場合は直接記載して下さい<br />※上記設定が優先される場合は「使用しない」を選択するか「!important」を付与してください<br/>例：font-family: 'Press Start 2P', cursive<span style="color:#f44336;">!important</span>;</p>

				<p>参照：<a href="//fonts.google.com/" target="_blank" rel="nofollow noopener">fonts.google.com</a></p>
                   <p>&lt;link href=&quot; <input type="text" name="st-data49" value="<?php echo esc_url( $GLOBALS["stdata49"] ); ?>" style="width:60%" placeholder="https://fonts.googleapis.com/css?family=Open+Sans" />&quot; rel=&quot;stylesheet"&gt;</p>
                   <p><input type="text" name="st-data218" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata218"] ) ); ?>" style="width:60%" placeholder="font-family: 'Open Sans', sans-serif;" /></p>
			<h5>- Googleフォント反映箇所</h5>
			<p>※「display=swap」を使用したい場合は直接記載して下さい<br />※上記設定が優先される場合は「使用しない」を選択するか「!important」を付与してください<br/>例：font-family: 'Press Start 2P', cursive<span style="color:#f44336;">!important</span>;</p>
			<p>
                    <input type="checkbox" name="st-data253" value="yes" <?php if ( $GLOBALS["stdata253"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
					サイト名・コメント・NEW ENTRY・関連記事</p>
               <p>
                    <input type="checkbox" name="st-data254" value="yes" <?php if ( $GLOBALS["stdata254"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   記事タイトル・見出しタグ・ウィジェットタイトル 他</p>
               <p>
                    <input type="checkbox" name="st-data255" value="yes" <?php if ( $GLOBALS["stdata255"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   記事一覧タイトル</p>
               <p>
                    <input type="checkbox" name="st-data256" value="yes" <?php if ( $GLOBALS["stdata256"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   各メニュー（第一階層以下）</p>
               <p>
                    <input type="checkbox" name="st-data257" value="yes" <?php if ( $GLOBALS["stdata257"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   各メニュー（第二階層以下）</p>
               <p>
                    <input type="checkbox" name="st-data259" value="yes" <?php if ( $GLOBALS["stdata259"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   ブログカード・おすすめ記事タイトル</p>
               <p>
                    <input type="checkbox" name="st-data260" value="yes" <?php if ( $GLOBALS["stdata260"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   SNSボタン</p>
               <p>
                    <input type="checkbox" name="st-data258" value="yes" <?php if ( $GLOBALS["stdata258"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   電話番号・任意記事のナンバー・Views（EX）</p>

			<p>
				適応ID及びクラス：<input type="text" name="st-data376" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata376"] ) ); ?>" style="width:30%" placeholder=".st-mybtn a" />
				<br/><span class="komozi">※複数のクラスは「,（半角カンマ）」で区切ってください<br/>※末尾の「,」は不要</span>
			</p>

			<h5>Googleマテリアルアイコン</h5>

			<?php if ( st_speed_on() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
				 <p>
						<input type="checkbox" name="st-data438" value="yes" <?php if ( $GLOBALS["stdata438"] === 'yes' ) {
							 echo 'checked';
						} ?>>
					 使用する</p>
			<?php if ( st_speed_on() ){ echo '</div>'; } ?>

			<p>参照：<a href="//fonts.google.com/icons?icon.style=Filled&icon.set=Material+Icons" rel="nofollow noopener" target="_blank">fonts.google.com/icons</a></p>
			<p>※利用できるのは「Material Icons」の「Filled」タイプです</p>

					<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
<hr/>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>
		</div>
		<?php
    }
}

if ( ! function_exists( '_st_admin_display_home_section' ) ) {
	/** トップページ */
	function _st_admin_display_home_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="top-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-home"></i>トップページの設定</h3>

		<ul class="theme-kanri-menu">
			<li><a href="#挿入コンテンツ"><i class="st-fa st-svg-pencil-square-o" aria-hidden="true"></i>挿入コンテンツ</a></li>
			<li><a href="#トップページのレイアウト"><i class="st-fa st-svg-columns" aria-hidden="true"></i>トップページのレイアウト</a></li>
			<li><a href="#記事一覧"><i class="st-fa st-svg-list-ul"></i>記事一覧</a></li>
			<li><a href="#タブ式 カテゴリー記事一覧"><i class="st-fa st-svg-th-large"></i>タブ式 カテゴリー記事一覧</a></li>
			<li><a href="#NEWS（お知らせ）の表示"><i class="st-fa st-svg-info-circle"></i>NEWS（お知らせ）の表示</a></li>
			<li><a href="#YouTube背景"><i class="st-fa st-svg-youtube-play" aria-hidden="true"></i>YouTube背景</a></li>
		</ul>

		<?php // 編集リンクの出力
		$edit_url = '';
		if ( trim( $GLOBALS["stdata9"] ) !== '' ) {
			$post_id = (int)$GLOBALS["stdata9"];
			if ( get_post( $post_id ) ) {
				$edit_url = ' <a href="'. admin_url() .'post.php?post='. $post_id .'&action=edit">編集</a>';
			} else {
				$edit_url = ' <span style="color: #ef5350;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>存在しないIDです</span>';
			}
		} ?>

               <p>トップページに固定記事を挿入（※記事タイトルは表示されません）：
				   <input type="number" name="st-data9" value="<?php echo esc_attr( $GLOBALS["stdata9"] ); ?>" placeholder="記事ID"><?php echo $edit_url ?><span class="st-guide"><a href="#" title="記事IDを入力して下さい。※固定ページのみ"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span><br/>※挿入元のページは自動的にnoidexとなり、canonicalが挿入されます<br/>※WordPressの表示設定にて固定ページをホームページに設定する場合は使用しないで下さい
               </p>

		<h4 id="挿入コンテンツ"><i class="st-fa st-svg-pencil-square-o" aria-hidden="true"></i>挿入コンテンツ</h4>

		<p>トップページに挿入できるコンテンツです（挿入固定記事の下に表示されます）<span class="st-guide"><a href="#" title="フロントページが「最新の投稿」になっている場合のみ"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span></p>
		<p>
			<?php st_kanri_wysiwyg_editor( "top_content", "st-data89" ); ?>
		</p>
		<p>※WordPressの表示設定にて固定ページをホームページに設定した場合は表示されません</p>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="トップページのレイアウト"><i class="st-fa st-svg-columns" aria-hidden="true"></i>トップページのレイアウト</h4>

		<?php if ( trim ( $GLOBALS["stdata77"] ) !== '' ) { ?><p style="color: #f44336;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>「デザイン」＞「サイト全体のレイアウト一括設定」が優先されています</p><?php } ?>

               <p>
				   <input type="hidden" name="st-data11" value="">
                    <input type="radio" name="st-data11" value="yes" <?php if ( $GLOBALS["stdata11"] === 'yes' ) {
                         echo 'checked';
                    } ?><?php disabled( trim ( $GLOBALS["stdata77"] ) !== '' ); ?>>
                    1カラムにする <br />
                    <input type="radio" name="st-data11" value="lp" <?php if ( $GLOBALS["stdata11"] === 'lp' ) {
                         echo 'checked';
                    } ?><?php disabled( trim ( $GLOBALS["stdata77"] ) !== '' ); ?>>
                    LP化する<br />
				   <?php if( $st_is_ex ){ ?>
						<input type="radio" name="st-data11" value="lp-wide" <?php if ( $GLOBALS["stdata11"] === 'lp-wide' ) {
							 echo 'checked';
						} ?><?php disabled( trim ( $GLOBALS["stdata77"] ) !== '' ); ?>>
						LPワイド化する（β）<br />
				   <?php } ?>
                    <input type="radio" name="st-data11" value="" <?php if ( $GLOBALS["stdata11"] === '' ) {
                         echo 'checked';
                    } ?><?php disabled( trim ( $GLOBALS["stdata77"] ) !== '' ); ?>>
                    レイアウトをリセットする</p>

               <p>
                    <input type="checkbox" name="st-data619" value="yes" <?php if ( $GLOBALS["stdata619"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				LP時にヘッダー（headerエリア）を表示する</p>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="記事一覧"><i class="st-fa st-svg-list-ul"></i>記事一覧</h4>

               <p>トップページ新着記事一覧に表示するカテゴリー（ID）を指定：
                    <input type="number" pattern="^[0-9 -]+$" name="st-data99" value="<?php echo esc_attr( $GLOBALS["stdata99"] ); ?>" placeholder="カテゴリーID">※除外は「-（カテゴリーID）」
               </p>

		<h5 class="sth5">新着記事</h5>

               <p>新着記事一覧に表示する見出し：
               <input type="text" name="st-data66" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata66"] ) ); ?>" style="width:40%" />
               <br/>注）トップページには挿入記事がある場合のみ表示されます（&lt;i&gt;タグのみ使用可 ※全角15文字程度）
               </p>

               <p>新着記事に表示する件数（サイドバー）：
                    <input type="number" name="st-data67" value="<?php echo esc_attr( $GLOBALS["stdata67"] ); ?>" placeholder="5">
               </p>


               <p>
                    <input type="checkbox" name="st-data44" value="yes" <?php if ( $GLOBALS["stdata44"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    トップページのコンテンツ内の新着記事一覧を非表示にする</p>

               <p>
                    <input type="checkbox" name="st-data57" value="yes" <?php if ( $GLOBALS["stdata57"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    トップページのサイドバーの新着記事一覧を非表示にする</p>

               <p>
                    <input type="checkbox" name="st-data13" value="yes" <?php if ( $GLOBALS["stdata13"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    下層ページのサイドバーの新着記事一覧を非表示にする</p>

		<h5 class="sth5">固定ページ指定のフロントにも新着記事一覧の表示<span class="st-guide"><a href="#" title="「表示設定」でフロントページに固定ページを指定した場合にも記事下に新着投稿一覧を表示します※ページャーは表示されません"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span></h5>

		<p>「表示設定」でフロントページに固定ページを指定した場合にも記事下に新着投稿一覧を表示します※ページャーは表示されません</p>
		<p>
			<input type="checkbox" name="st-data92" value="yes" <?php if ( $GLOBALS["stdata92"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    新着一覧を表示する</p>

               <p>新着一覧を表示する件数：
                    <input type="number" name="st-data93" value="<?php echo esc_attr( $GLOBALS["stdata93"] ); ?>" placeholder="5">
               </p>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="タブ式 カテゴリー記事一覧"><i class="st-fa st-svg-th-large"></i>タブ式 カテゴリー記事一覧</h4>

        <p>
             <input type="checkbox" name="st-data582" value="yes" <?php if ( $GLOBALS["stdata582"] === 'yes' ) {
                  echo 'checked';
             } ?>>
			タブ式 カテゴリー記事一覧をフロントページに表示する</p>

        <p>
			カテゴリーA（ID※必須）<input type="number" pattern="[1-9][0-9]*" name="st-data569" value="<?php echo esc_attr( $GLOBALS["stdata569"] ); ?>" placeholder="カテゴリーID">
			カテゴリーB（ID）<input type="number" pattern="[1-9][0-9]*" name="st-data570" value="<?php echo esc_attr( $GLOBALS["stdata570"] ); ?>" placeholder="カテゴリーID">
			カテゴリーC（ID）<input type="number" pattern="[1-9][0-9]*" name="st-data571" value="<?php echo esc_attr( $GLOBALS["stdata571"] ); ?>" placeholder="カテゴリーID">
			カテゴリーD（ID）<input type="number" pattern="[1-9][0-9]*" name="st-data572" value="<?php echo esc_attr( $GLOBALS["stdata572"] ); ?>" placeholder="カテゴリーID">
			</p>
			<p class="komozi">
				※カテゴリーAのIDは必須です。入力が無い場合は「最新記事」として総合の一覧となります（カテゴリーIDに<code>999999</code>を指定しても最新記事一覧が表示されます）<br>
				※除外IDや「0」、複数のID、存在しない記事IDには対応しておりません<br>
				※EX版のカードデザイン化に連動します（JETのカードデザインには未対応）
			</p>
        <p>
			タブA（背景色）<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data577" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata577"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>
			タブB（背景色）<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data578" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata578"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>
			タブC（背景色）<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data579" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata579"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>
			タブD（背景色）<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data580" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata580"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>
			</p>
        <p>
			タブ文字色 <input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data581" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata581"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>
			</p>

        <p>
        	<input type="radio" name="st-data610" value="" <?php if ( $GLOBALS["stdata610"] === '' ) {
        		echo 'checked';
        	} ?>>
			デフォルト
			<input type="radio" name="st-data610" value="radius" <?php if ( $GLOBALS["stdata610"] === 'radius' ) {
                 echo 'checked';
            } ?>>
			角丸にする
			<input type="radio" name="st-data610" value="square" <?php if ( $GLOBALS["stdata610"] === 'square' ) {
                 echo 'checked';
            } ?>>
			スクエアにする
			<input type="radio" name="st-data610" value="border" <?php if ( $GLOBALS["stdata610"] === 'border' ) {
                 echo 'checked';
            } ?>>
			ボーダーにする
			<input type="radio" name="st-data610" value="tab" <?php if ( $GLOBALS["stdata610"] === 'tab' ) {
                 echo 'checked';
            } ?>>
			タブ（シンプル）にする</p>

        <p>
			表示記事数 <input type="number" pattern="^[1-9]+$" name="st-data573" value="<?php echo esc_attr( $GLOBALS["stdata573"] ); ?>" placeholder="5">
			</p>

        <p>
        	<input type="radio" name="st-data575" value="" <?php if ( $GLOBALS["stdata575"] === '' ) {
        		echo 'checked';
        	} ?>>
			昇順（DESC）
			<input type="radio" name="st-data575" value="asc" <?php if ( $GLOBALS["stdata575"] === 'asc' ) {
                 echo 'checked';
            } ?>>
			降順（ASC）</p>

        <p>
        	<input type="radio" name="st-data576" value="" <?php if ( $GLOBALS["stdata576"] === '' ) {
        		echo 'checked';
			} ?>>
			ID
        	<input type="radio" name="st-data576" value="date" <?php if ( $GLOBALS["stdata576"] === 'date' ) {
        		echo 'checked';
			} ?>>
			投稿日
            <input type="radio" name="st-data576" value="modified" <?php if ( $GLOBALS["stdata576"] === 'modified' ) {
                 echo 'checked';
            } ?>>
			更新日
			<input type="radio" name="st-data576" value="rand" <?php if ( $GLOBALS["stdata576"] === 'rand' ) {
                echo 'checked';
             } ?>>
			ランダム</p>

           <p>
				<input type="checkbox" name="st-data583" value="yes" <?php if ( $GLOBALS["stdata583"] === 'yes' ) {
                     echo 'checked';
				} ?>>子カテゴリーを除外する</p>

		<?php if ( $st_is_ex ) { ?>
			  <p>
                    <?php if (  trim($GLOBALS["stdata421"]) === '' ) { // もっと読む（無限スクロール）を使用する ?>
                        <input type="checkbox" name="st-data574" value="" disabled="disabled">
                    <?php } else { ?>
                    <input type="checkbox" name="st-data574" value="yes" <?php if ( $GLOBALS["stdata574"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				  <?php } ?>無限ループにする<?php if ( trim($GLOBALS["stdata421"]) === '' ) { ?>（<i class="st-svg-exclamation-circle"></i>「テーマ管理」&gt;「投稿・固定記事」&gt;”もっと読む（無限スクロール）を使用する”を有効にして下さい）<?php } ?></p>
		<?php } ?>

		<p>最新記事一覧タブ名：
		<input type="text" name="st-data624" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata624"] ) ); ?>" style="width:40%" placeholder="最新記事" /></p>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

        <p>
			<input type="submit" value="<?php echo esc_attr( __( 'Save', 'affinger' ) ); ?>" class="button button-primary button-large">
		</p>

		<h4 id="NEWS（お知らせ）の表示"><i class="st-fa st-svg-info-circle"></i>NEWS（お知らせ）の表示</h4>

               <p>
                    <input type="checkbox" name="st-data20" value="yes" <?php if ( $GLOBALS["stdata20"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                   お知らせをTOPページの一番上に表示する</p>

               <p>

               <p>お知らせタイトルバーに表示する文字：
                    <input type="text" name="st-data28" value="<?php echo esc_attr( $GLOBALS["stdata28"] ); ?>" style="width:100%" placeholder="お知らせ" />
		<br/>※お知らせのタイトルバーに表示したい文字を記入して下さい。現在は<b>「
			<?php if ( trim( $GLOBALS["stdata28"] ) !== '' ) {
				$catname = esc_html( $GLOBALS["stdata28"] );
			}else{
				$catname = 'お知らせ';
				}
			echo $catname;
			?>
		」</b>です。
               </p>

               <p>お知らせに表示するカテゴリー（カテゴリーID※デフォルトは「0（全て）」）：
                    <input type="text" pattern="^[0-9,]+$" name="st-data21" value="<?php echo esc_attr( $GLOBALS["stdata21"] ); ?>" placeholder="1,3,5"><br/>※複数指定する場合は半角カンマ「,」で区切ってください
               </p>

               <p>お知らせに表示する件数：
                    <input type="number" name="st-data22" value="<?php echo esc_attr( $GLOBALS["stdata22"] ); ?>" placeholder="5">
               </p>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

	<h4 id="YouTube背景"><i class="st-fa st-svg-youtube-play" aria-hidden="true"></i>動画背景</h4>

	<p>背景に流すYouTube動画ID：
                    <input type="text" name="st-data110" value="<?php echo esc_attr( $GLOBALS["stdata110"] ); ?>" style="ime-mode:disabled;" placeholder="YouTube ID"></p>

				<?php if ( $st_is_ex ) { ?>
					<p>背景に流すYouTube動画ID（スマホ用）β：
					<input type="text" name="st-data682" value="<?php echo esc_attr( $GLOBALS["stdata682"] ); ?>" style="ime-mode:disabled;" placeholder="YouTube ID"></p>

					<p>
						動画URL：
						<input type="text" name="st-data492" value="<?php echo esc_attr( $GLOBALS["stdata492"] ); ?>"
							   style="ime-mode:disabled;" size="64"
							   placeholder="https://example.com/wp-content/uploads/video.mp4">
					</p>

					<p>
						動画URL（スマホ用）β：
						<input type="text" name="st-data683" value="<?php echo esc_attr( $GLOBALS["stdata683"] ); ?>"
							style="ime-mode:disabled;" size="64"
							placeholder="https://example.com/wp-content/uploads/video.mp4">
					</p>
				<?php } ?>

		<div class="linked">
			<p>
	                    <input type="checkbox" name="st-data111" value="yes" <?php if ( $GLOBALS["stdata111"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
	                    トップページ（PC）の背景で動画を流す</p>
	
			<?php if ( st_is_experimental_mode_enabled() ) { ?>
				<p>
					<input type="checkbox" name="st-data584" value="yes" <?php if ( $GLOBALS["stdata584"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
					ヘッダー画像エリアにYouTube動画を表示する</p>
			<?php } ?>
	
				<p style="margin-left: 1.5em;">
					<input type="checkbox" name="st-data493" value="yes"
						<?php checked( $GLOBALS["stdata493"] === 'yes' ); ?>>
	                    スマホにも反映（※OSやバージョンにより表示できない場合もあります）</p>
		</div>

		<p class="komozi">※Youtubeによっては設定できない動画もございます。またスマホ反映はOSやバージョンにより表示できない場合もあります</p>

		<h5>オプション</h5>

		<p>
                    <input type="checkbox" name="st-data112" value="yes" <?php if ( $GLOBALS["stdata112"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    YouTubeの音を出す（PCのみ）</p>

		<p>
                    <input type="checkbox" name="st-data114" value="yes" <?php if ( $GLOBALS["stdata114"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    動画をループ再生</p>

		<p>
                    <input type="checkbox" name="st-data115" value="yes" <?php if ( $GLOBALS["stdata115"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    トップ背景にアミ点を追加（スマホ以外では動画設定がオフの場合も反映されます）</p>

		<p>
                    <input type="checkbox" name="st-data116" value="yes" <?php if ( $GLOBALS["stdata116"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    下層ページでも動画を流す（アミ点も反映）</p>

		<p>
                    <input type="checkbox" name="st-data117" value="yes" <?php if ( $GLOBALS["stdata117"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    YouTubeのNOW PLAYリンクを表示する（PCのみ）</p>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<hr/>
               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>
		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_display_post_section' ) ) {
	/** 投稿・固定ページ */
	function _st_admin_display_post_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="toukou-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-pencil-square" aria-hidden="true"></i>投稿・固定記事設定</h3>

		<ul class="theme-kanri-menu">
			<li><a href="#コメント"><i class="st-fa st-svg-comment"></i>コメント</a></li>
			<li><a href="#アイキャッチ設定"><i class="st-fa st-svg-eye"></i>アイキャッチ設定</a></li>
			<?php if( $st_is_ex ){ ?><li><a href="#記事一覧のカードデザイン化"><i class="st-fa st-svg-th-large"></i>カードデザイン</a></li><?php } ?>
			<?php if( $st_is_ex_af ){ ?><li><a href="#この記事を書いた人"><i class="st-fa st-svg-user" aria-hidden="true"></i>この記事を書いた人</a></li><?php } ?>
			<li><a href="#関連記事一覧"><i class="st-fa st-svg-list-ul"></i>関連記事一覧</a></li>
			<li><a href="#管理画面"><i class="st-fa st-svg-cog"></i>記事一覧（管理画面）</a></li>
		</ul>

			<h5 class="grid-bg">カテゴリー・タグ</h5>
               <p>
                    <input type="checkbox" name="st-data60" value="yes" <?php if ( $GLOBALS["stdata60"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    記事タイトル上のカテゴリーを非表示にする</p>

               <p>
                    <input type="checkbox" name="st-data588" value="yes" <?php if ( $GLOBALS["stdata588"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   LP時に記事タイトルとカテゴリーも非表示にする<?php if ( $st_is_ex ) { ?>（※記事ごとのヘッダーデザインを除く）<?php } ?></p>

               <p>
                    <input type="checkbox" name="st-data277" value="yes" <?php if ( $GLOBALS["stdata277"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    投稿ページ記事下のタグ・カテゴリーリンクを非表示にする</p>

				<div class="linked">
	               <p>
	                    <input type="checkbox" name="st-data125" value="yes" <?php if ( $GLOBALS["stdata125"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
	                    記事一覧・関連記事一覧などにカテゴリーを表示する</p>
	
	               <p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data465" value="yes" <?php if ( $GLOBALS["stdata465"] === 'yes' ) {
							echo 'checked';
						} ?>>
					   記事一覧のカテゴリーを下に表示</p>
				</div>

               <p style="text-indent: 1.5em;">
					<input type="checkbox" name="st-data332" value="yes" <?php if ( $GLOBALS["stdata332"] === 'yes' ) {
						echo 'checked';
					} ?>>
					ショートコード記事一覧のカテゴリーを非表示にする</p>

               <p>非表示にするカテゴリーリンク（カテゴリーID）：
                    <input type="text" pattern="^[0-9,]+$" name="st-data585" value="<?php echo esc_attr( $GLOBALS["stdata585"] ); ?>" placeholder="1,3,5"><br/>※複数指定する場合は半角カンマ「,」で区切ってください
               </p>

               <p>
					<input type="checkbox" name="st-data466" value="yes" <?php if ( $GLOBALS["stdata466"] === 'yes' ) {
						echo 'checked';
					} ?>>
					記事一覧のタグを非表示にする</p>

			<h5 class="grid-bg">投稿日（更新日）</h5>

               <p>
					<input type="checkbox" name="st-data324" value="yes" <?php if ( $GLOBALS["stdata324"] === 'yes' ) {
						echo 'checked';
					} ?>>
					記事一覧・関連記事一覧の投稿日（更新日）を非表示にする</p>

               <p style="margin-bottom: 5px;">更新日がある場合</p>
               <p style="margin-top: 0;">
				   <input type="radio" name="st-data140" value="" <?php if ( $GLOBALS["stdata140"] === '' ) {
                         echo 'checked';
                    } ?>>
					更新日のみ表示する（投稿日は表示しない）
                    <input type="radio" name="st-data140" value="yes" <?php if ( $GLOBALS["stdata140"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
					投稿日を表示する（更新日は表示しない）
                    <input type="radio" name="st-data140" value="both" <?php if ( $GLOBALS["stdata140"] === 'both' ) {
                         echo 'checked';
                    } ?>>
					両方表示する（※一覧を除く）</p>
			<?php if ( $st_is_ex ) { ?>
			<p>
				   <input type="checkbox" name="st-data592" value="yes" <?php if ( $GLOBALS["stdata592"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   更新日を全て今日にする（自動更新）</p>
			<?php } ?>

               <p>
                    <input type="checkbox" name="st-data24" value="yes" <?php if ( $GLOBALS["stdata24"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    投稿に「投稿日」「更新日」を表示しない</p>

			<h5 class="grid-bg">固定ページ</h5>

               <p>
                    <input type="checkbox" name="st-data104" value="yes" <?php if ( $GLOBALS["stdata104"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    固定ページに「投稿日」「更新日」を表示しない</p>

				<div class="linked">
	               <p>
	                    <input type="checkbox" name="st-data234" value="yes" <?php if ( $GLOBALS["stdata234"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
	                    固定ページのタイトルを非表示</p>
	
					<p style="margin-left: 1.5em;">
						<input type="checkbox" name="st-data646" value="yes"
							<?php checked( $GLOBALS["stdata646"] === 'yes' ); ?>>
						固定記事の投稿日を上部（タイトル下）に表示する
					</p>
				</div>

               <p>
                    <input type="checkbox" name="st-data10" value="yes" <?php if ( $GLOBALS["stdata10"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    固定ページに子ページへのリンクを表示</p>

               <p>
                    <input type="checkbox" name="st-data100" value="yes" <?php if ( $GLOBALS["stdata100"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    固定ページにも広告を表示</p>

			<h5 class="grid-bg">その他</h5>

               <p>
                    <input type="checkbox" name="st-data423" value="yes" <?php if ( $GLOBALS["stdata423"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
					「記事ごとのヘッダーデザイン」一括設定</p>

               <p>
                    <input type="checkbox" name="st-data204" value="yes" <?php if ( $GLOBALS["stdata204"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    パンクズを非表示にする（※display:none処理）</p>

               <p>
                    <input type="checkbox" name="st-data205" value="yes" <?php if ( $GLOBALS["stdata205"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    前と次のページリンクを非表示にする（※display:none処理）</p>

               <p>
                    <input type="checkbox" name="st-data88" value="yes" <?php if ( $GLOBALS["stdata88"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    記事内の画像にcaptionがある場合に枠線を付ける</p>

               <p>
                    <input type="checkbox" name="st-data155" value="yes" <?php if ( $GLOBALS["stdata155"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    「改ページ」をPC閲覧時は適応しない</p>

               <?php if ( st_is_experimental_mode_enabled() && $st_is_ex ): ?>
                   <p>
                        <input type="checkbox" name="st-data587" value="yes" <?php if ( $GLOBALS["stdata587"] === 'yes' ) {
                             echo 'checked';
                        } ?>>
                        「続きを読む」をボタンにして以下を非表示にする</p>
               <?php endif; ?>

               <p>
                    <input type="checkbox" name="st-data142" value="yes" <?php if ( $GLOBALS["stdata142"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    PC閲覧時に記事下のアドセンス広告を横並びにする ※「PC閲覧時のサイトの幅」を<span style="color:#f44336;">1114px以上</span>に設定して下さい</p>

               <p>表示を変えるカテゴリー（カテゴリーID又はスラッグ※上級者用）：
                    <input type="text" pattern="^[0-9A-Za-z]+$" name="st-data74" value="<?php echo esc_attr( $GLOBALS["stdata74"] ); ?>" placeholder="カテゴリーID又はスラッグ"><br/>※ここに記述したカテゴリーの投稿は「single-type2.php」が反映されます（中級以上）</p>
			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>


               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

		<h4 id="コメント"><i class="st-fa st-svg-comment"></i>コメント</h4>

               <p>コメントのテキスト：<input type="text" name="st-data381" value="<?php echo esc_attr( $GLOBALS["stdata381"] ); ?>" style="width:30%" placeholder="comment" /></p>

				<?php if( $st_is_ex ){ ?>
				   <p>
					   <input type="checkbox" name="st-data424" value="yes" <?php if ( $GLOBALS["stdata424"] === 'yes' ) {
						   echo 'checked';
					   } ?>>
					   タイトル入力を追加する
				   </p>

				   <p>
					   <input type="checkbox" name="st-data425" value="yes" <?php if ( $GLOBALS["stdata425"] === 'yes' ) {
						   echo 'checked';
					   } ?>>
					   スター（評価入力）を追加する
				   </p>
				<?php } ?>

               <p>
                    <input type="checkbox" name="st-data378" value="yes" <?php if ( $GLOBALS["stdata378"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   コメントのウェブサイトの入力欄を非表示*</p>

               <p>
                    <input type="checkbox" name="st-data379" value="yes" <?php if ( $GLOBALS["stdata379"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   コメントのメールアドレスの入力欄を非表示*</p>

               <p>
                    <input type="checkbox" name="st-data380" value="yes" <?php if ( $GLOBALS["stdata380"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   「メールアドレスが公開されることはありません。」を非表示</p>

               <p>
                    <input type="checkbox" name="st-data409" value="yes" <?php if ( $GLOBALS["stdata409"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
					コメントフォームを非表示にする</p>

               <p>
                    <input type="checkbox" name="st-data6" value="yes" <?php if ( $GLOBALS["stdata6"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
					コメント欄・コメントフォームを非表示にする</p>

				<?php if( $st_is_ex ){ ?>
				   <p>
					   名前<br>
					   <input type="radio" name="st-data426" value="" <?php if ( $GLOBALS["stdata426"] === '' ) {
						   echo 'checked';
					   } ?>>
					   何もしない
					   <input type="radio" name="st-data426" value="nickname" <?php if ( $GLOBALS["stdata426"] === 'nickname' ) {
						   echo 'checked';
					   } ?>>
					   ニックネーム（任意）
					   <input type="radio" name="st-data426" value="hidden" <?php if ( $GLOBALS["stdata426"] === 'hidden' ) {
						   echo 'checked';
					   } ?>>
					   非表示にする
				   </p>

				   <p>
					   <input type="checkbox" name="st-data427" value="yes" <?php if ( $GLOBALS["stdata427"] === 'yes' ) {
						   echo 'checked';
					   } ?>>
					   サイト URL を表示する
				   </p>
				<?php } ?>

		<p class="komozi">※WordPress、ディスカッション設定の「コメントの投稿者の名前とメールアドレスの入力を必須にする」等、関連するコメント設定も適切に設定して下さい</p>
			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>


		<h4 id="アイキャッチ設定"><i class="st-fa st-svg-eye"></i>アイキャッチ設定</h4>

		<p>※「記事ごとのヘッダーデザイン」一括設定有効化時は反映されません</p>

		<p>
			<input type="checkbox" name="st-data53" value="yes" <?php if ( $GLOBALS["stdata53"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    アイキャッチ画像の表示を全ての記事で有効化する（デフォルトは上部）</p>

        <p>
            <input type="checkbox" name="st-data75" value="yes" <?php if ( $GLOBALS["stdata75"] === 'yes' ) {
                echo 'checked';
           } ?>>
                   アイキャッチのキャプションをクレジットとして写真上に表示する</p>

		<p>
			<input type="checkbox" name="st-data217" value="yes" <?php if ( $GLOBALS["stdata217"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    アイキャッチ画像をタイトル下表示に変更する</p>

		<p style="text-indent: 1.5em;">
			<?php if (  trim($GLOBALS["stdata217"]) === '' ) { ?>
				<input type="radio" name="st-data241" value="" disabled="disabled" checked >何もしない <input type="radio" name="st-data241" value="" disabled="disabled" >ワイド化する <input type="radio" name="st-data241" value="" disabled="disabled" >ポラロイド風にする
			<?php } else { ?>
				<input type="radio" name="st-data241" value="" <?php if ( $GLOBALS["stdata241"] === '' ) {
					echo 'checked';
				} ?>>何もしない <input type="radio" name="st-data241" value="yes" <?php if ( $GLOBALS["stdata241"] === 'yes' ) {
					echo 'checked';
				} ?>>ワイド化する <input type="radio" name="st-data241" value="photo" <?php if ( $GLOBALS["stdata241"] === 'photo' ) {
					echo 'checked';
				} ?>>ポラロイド風にする
			<?php } ?>
		</p>

		<?php if( $st_is_ex ){ ?>
			<p>
				<input type="checkbox" name="st-data586" value="yes" <?php if ( $GLOBALS["stdata586"] === 'yes' ) { ?>checked<?php } ?>>代替テキストが無い場合はタイトルを設定 [EX]
			</p>
		<?php } ?>

		<?php if( defined('ST_TESTMODE') ){ ?>
			<p>
				<input type="checkbox" name="st-data688" value="yes" <?php if ( $GLOBALS["stdata688"] === 'yes' ) { ?>checked<?php } ?>>アイキャッチ画像が設定されていない場合に記事内の最初の画像を設定
			</p>
		<?php } ?>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<?php if( $st_is_ex ){ ?>
			<h4 id="記事一覧のカードデザイン化"><i class="st-fa st-svg-th-large"></i>記事一覧のカードデザイン化[EX]</h4>

				   <p>
					   <input type="checkbox" name="st-data320" value="yes" <?php if ( $GLOBALS["stdata320"] === 'yes' ) { ?>checked<?php } ?>>
					   トップページ及びアーカイブの記事一覧をカードデザインにする
				   </p>
				   <p>
					   列数設定： <input type="text" pattern="^[0-9,]+$" name="st-data321" value="<?php echo esc_attr( $GLOBALS['stdata321'] ); ?>" placeholder="3,2,2">
				   </p>

				   <p>
					   <input type="checkbox" name="st-data322" value="yes" <?php if ( $GLOBALS["stdata322"] === 'yes' ) { ?>checked<?php } ?>>
					   投稿記事下の関連記事一覧をカードデザインにする
				   </p>
				   <p>
					   列数設定： <input type="text" pattern="^[0-9,]+$" name="st-data323" value="<?php echo esc_attr( $GLOBALS['stdata323'] ); ?>" placeholder="3,2,2">
				</p>

				<p>※閲覧サイズ（960px以上・959～600px・599px以下）順に3～1で「,（半角カンマ）」で区切って列数指定<br/>※「1,2,3」など小→大になる指定はできません
			</p>

				<p>
					   <input type="checkbox" name="st-data367" value="yes" <?php if ( $GLOBALS["stdata367"] === 'yes' ) { ?>checked<?php } ?>>
					カードデザインパターンをBタイプ（枠あり）に変更
				</p>

				<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<?php } ?>

		<?php if( $st_is_ex_af ){ ?>

			<h4 id="この記事を書いた人"><i class="st-fa st-svg-user" aria-hidden="true"></i>この記事を書いた人</h4>

			<p>※表示内容は「プロフィール」で設定して下さい</p>
			<p>
						<input type="checkbox" name="st-data210" value="yes" <?php if ( $GLOBALS["stdata210"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						「この記事を書いた人」を有効化する</p>

			<p>
						<input type="checkbox" name="st-data211" value="yes" <?php if ( $GLOBALS["stdata211"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						「この記事を書いた人」の最新記事を表示する</p>

			<p>
						<input type="checkbox" name="st-data497" value="yes" <?php if ( $GLOBALS["stdata497"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						記事上にライター情報を表示する</p>

			<p>
						<input type="checkbox" name="st-data212" value="yes" <?php if ( $GLOBALS["stdata212"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						「この記事を書いた人」及び「ライター情報」を固定ページでも表示する</p>

			<p>
						<input type="checkbox" name="st-data213" value="yes" <?php if ( $GLOBALS["stdata213"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						アバター画像を丸くする（※コメント欄のアバター画像含む）</p>

			<p>
						<input type="checkbox" name="st-data404" value="yes" <?php if ( $GLOBALS["stdata404"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						プロフィール情報にhtmlタグを許可する</p>

               <p>
                    <input type="checkbox" name="st-data17" value="yes" <?php if ( $GLOBALS["stdata17"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   著者情報(hentry:author)を表示する（※）
			<ul class="komozi">
				<li>※ログインIDと同じではないか注意して下さい（著者ページURLにはauthorIDが含まれます）。</li>
				<li>※カスタマイザーの「投稿日時・ぱんくず・タグ」&gt; ”スタイルBに変更”有効時は表示されません。</li>
				<li>※無効化時も「author」名でhentry（author）を出力。</li>
				<?php if( $st_is_ex_af ){ ?>
					<li>※無効化時又は有効化時で「この記事を書いた人」設定を有効化している場合は「display:none」処理となりhentry（author）自体は出力。</li>
				<?php } else { ?>
					<li>※無効化時は「display:none」処理となりhentry（author）自体は出力。</li>
				<?php } ?>
			</ul>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<?php } ?>


		<h4 id="関連記事一覧"><i class="st-fa st-svg-list-ul"></i>関連記事一覧</h4>

               <p>関連記事一覧に表示する見出し（&lt;i&gt;タグのみ使用可 ※全角15文字程度）：
                    <input type="text" name="st-data63" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata63"] ) ); ?>" style="width:100%" />
					<br/>※おすすめ記事一覧の見出しに表示したい文字を記入して下さい。現在は<b>「
			<?php if ( trim( stripslashes( $GLOBALS["stdata63"] ) ) !== '' ) {
				$kanren_name = st_esc_html_i( stripslashes( $GLOBALS["stdata63"] ) );
			}else{
				$kanren_name = '関連記事';
				}
			echo $kanren_name;
			?>
		」</b>です。
               </p>

			<h5>並び順</h5>
			<p>
				<input type="radio" name="st-data653" value="" <?php if ( $GLOBALS["stdata653"] === '' ) {
					echo 'checked';
				} ?>>ランダム（デフォルト） <input type="radio" name="st-data653" value="date" <?php if ( $GLOBALS["stdata653"] === 'date' ) {
					echo 'checked';
				} ?>>投稿日</p>

               <p>関連記事に表示する件数：
                    <input type="number" name="st-data56" value="<?php echo esc_attr( $GLOBALS["stdata56"] ); ?>" placeholder="5">
               </p>

               <p>
                    <input type="checkbox" name="st-data36" value="yes" <?php if ( $GLOBALS["stdata36"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    投稿の関連記事を非表示にする</p>

				<?php if( $st_is_ex ){ ?>
					<?php if ( st_speed_on() || st_speed_off() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
					   <p>
							<input type="checkbox" name="st-data421" value="yes" <?php if ( $GLOBALS["stdata421"] === 'yes' ) {
								 echo 'checked';
							} ?>>
						   もっと読む（無限スクロール）を使用する※ショートコードの記事一覧にも連動
					  </p>
					<?php if ( st_speed_on() || st_speed_off() ){ echo '</div>'; } ?>
				<?php } ?>

		<hr/>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

	<h3 id="管理画面" class="h3tai"><i class="st-fa st-svg-cog"></i>記事一覧（管理画面）</h3>

               <p>
                    <input type="checkbox" name="st-data129" value="yes" <?php if ( $GLOBALS["stdata129"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    投稿一覧（管理画面）にサムネイル・文字数を表示 ※閲覧サイズ幅が狭いと記事タイトルが縦表示になるので注意して下さい</p>

				<p>
					<input type="checkbox" name="st-data687" value="yes" <?php if ( $GLOBALS["stdata687"] === 'yes' ) {
						echo 'checked';
					} ?>>
                    投稿一覧（管理画面）にユーザーの絞り込み機能を追加する</p>

               <p>
                    <input type="checkbox" name="st-data450" value="yes" <?php if ( $GLOBALS["stdata450"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    記事一覧（管理画面）のステータスを赤色に変更</p>

				<p>
					<input type="checkbox" name="st-data650" value="yes" <?php if ( $GLOBALS["stdata650"] === 'yes' ) {
						echo 'checked';
					} ?>>
					固定記事一覧（管理画面）を新着順にする</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<hr/>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>
		</div>
		<?php
	}
}

if ( ! function_exists( '_st_admin_display_header_section' ) ) {
	/** ヘッダー */
	function _st_admin_display_header_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="header-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-header"></i>ヘッダー</h3>

			<ul class="theme-kanri-menu">
				<li><a href="#ヘッダー画像設定"><i class="st-fa st-svg-h-gazou"></i>ヘッダー画像設定</a></li>
				<li><a href="#ヘッダーコンテンツ設定"><i class="st-fa st-svg-pencil-square-o"></i>ヘッダーコンテンツ設定</a></li>
				<li><a href="#記事スライドショー設定"><i class="st-fa st-svg-slide-show"></i>記事スライドショー設定</a></li>
			</ul>

			<h4><i class="st-fa st-svg-h-top"></i>ヘッダーナビゲーション</h4>

			<h5 class="grid-bg">PC・スマホ共通</h5>

               <p>
                    <input type="checkbox" name="st-data127" value="yes" <?php if ( $GLOBALS["stdata127"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   サイト名とキャッチフレーズを上下反対にする（フッター連動）</p>

               <p>
                    <input type="checkbox" name="st-data209" value="yes" <?php if ( $GLOBALS["stdata209"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    TOPページのh1タグをサイト名に変更する（デフォルトは「キャッチフレーズ」※共に表示されている場合）</p>

               <p>
                    <input type="checkbox" name="st-data429" value="yes" <?php if ( $GLOBALS["stdata429"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    トップページのみサイト名（ロゴ）及びキャッチフレーズを非表示</p>

			<p class="komozi">※スマホ追加メニュー使用時はスマホ閲覧時のサイトタイトル及びキャッチフレーズはPC設定が反映されます</p>

			<h5 class="grid-bg">スマホ（タブレット含む）のみ</h5>

			   <p>スマホヘッダーの高さ（px）：<input type="number" name="st-data609" value="<?php echo esc_attr( $GLOBALS["stdata609"] ); ?>" placeholder="48"></p>

			   <p class="komozi">※48px以上のみ設定できます（空又は48px未満の場合は100pxが設定されます・追加メニュー使用時は<span class="aka">48px固定</span>となります。）</p>

				<div class="linked">
	               <p>
	                    <input type="checkbox" name="st-data614" value="yes" <?php if ( $GLOBALS["stdata614"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
					   ヘッダー（headerエリア）を表示しない</p>
	
					<p style="text-indent: 1.5em;">
							<input type="checkbox" name="st-data626" value="yes" <?php if ( $GLOBALS["stdata626"] === 'yes' ) {
	 							echo 'checked';
							} ?>>
						フロントページを除く</p>
				</div>

               <p>
                    <input type="checkbox" name="st-data615" value="yes" <?php if ( $GLOBALS["stdata615"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   ヘッダーにサイト名（またはロゴ）を表示しない</p>

               <p>
                    <input type="checkbox" name="st-data616" value="yes" <?php if ( $GLOBALS["stdata616"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   ヘッダーにキャッチフレーズを表示しない</p>

			<h5 class="grid-bg">PCのみ</h5>

			   <p>PCヘッダーの高さ（px）：<input type="number" name="st-data617" value="<?php echo esc_attr( $GLOBALS["stdata617"] ); ?>" placeholder="100"></p>

			   <p class="komozi">※960px以上の閲覧で反映される最低の高さ（<code>min-height</code>）を指定します</p>

				<div class="linked">
	               <p>
	                    <input type="checkbox" name="st-data613" value="yes" <?php if ( $GLOBALS["stdata613"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
					   ヘッダー（headerエリア）を表示しない</p>
	
					<p style="text-indent: 1.5em;">
							<input type="checkbox" name="st-data625" value="yes" <?php if ( $GLOBALS["stdata625"] === 'yes' ) {
	 							echo 'checked';
							} ?>>
						フロントページを除く</p>
				</div>

				<div class="linked">
	               <p>
	                    <input type="checkbox" name="st-data52" value="yes" <?php if ( $GLOBALS["stdata52"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
	                    ヘッダーを分割しない<span class="st-guide"><a href="#" title="電話番号、ウィジェット等が非表示になります"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span></p>
	
					<p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data105" value="yes" <?php if ( $GLOBALS["stdata105"] === 'yes' ) {
	 							echo 'checked';
							} ?>>
	                	ヘッダーナビゲーションをセンタリング</p>
				</div>

               <p>
                    <input type="checkbox" name="st-data101" value="yes" <?php if ( $GLOBALS["stdata101"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   ヘッダーにサイト名（またはロゴ）を表示しない</p>

               <p>
                    <input type="checkbox" name="st-data102" value="yes" <?php if ( $GLOBALS["stdata102"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    ヘッダー（及びフッター）にキャッチフレーズを表示しない</p>

               <p>
                    <input type="checkbox" name="st-data206" value="yes" <?php if ( $GLOBALS["stdata206"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    ヘッダー右ウィジェットをフッターに表示しない</p>

			<h5>電話番号を追加する</h5>

               <p><input type="text" placeholder="0120-222-3333" name="st-data42" style="width:100%" value="<?php echo esc_attr( $GLOBALS["stdata42"] ); ?>" >例）000-222-3333</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h3 class="h3tai"><i class="st-fa st-svg-h-gazou"></i>ヘッダー画像エリア</h3>

			<p class="grid-bg-yellow"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i><b>表示優先度</b>：記事スライドショー設定 ＞ ヘッダーコンテンツ設定 ＞ ヘッダー画像エリアのウィジェット ＞ ヘッダー画像（画像スライドショー）</p>

			<p class="komozi">※ヘッダー画像エリアにはヘッダー画像の他に、ヘッダーコンテンツ、ヘッダー画像エリアのウィジェット、記事スライドショーの何れかを挿入できます。複数設定された場合の優先度は上記のとおりです。</p>

			<h5>ヘッダー画像エリア表示設定</h5>

               <p>
                    <input type="checkbox" name="st-data18" value="yes" <?php if ( $GLOBALS["stdata18"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   下層ページにも表示 
                    <input type="checkbox" name="st-data71" value="yes" <?php if ( $GLOBALS["stdata71"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    スマホ・タブレット閲覧時は非表示 
                    <input type="checkbox" name="st-data76" value="yes" <?php if ( $GLOBALS["stdata76"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   全て非表示</p>

			<h4 id="ヘッダー画像設定"><i class="st-fa st-svg-picture-o"></i>ヘッダー画像設定</h4>

			<p>ヘッダー画像はカスタマイザーで設定します。スライドショーにする場合は2つ以上設定してください。</p>

			<h5>トリミング(px)</h5>

            <p>幅：<input type="number" name="st-data70" value="<?php echo esc_attr( $GLOBALS["stdata70"] ); ?>" placeholder="2200">
				高さ：<input type="number" name="st-data62" value="<?php echo esc_attr( $GLOBALS["stdata62"] ); ?>" placeholder="500"></p>

		<p>※デフォルトの横幅サイズは1060pxです。縦横比に応じて表示されます</p>

		<?php if ( empty( $GLOBALS["stdata72"] ) ) {
                    echo '<h5>ヘッダー画像のリンク先URL：</h5><p><input type="text" name="st-data72" value="" style="width:100%" style="ime-mode:disabled;" placeholder="https://www.example.com/example/"></p>';
               } else {
                    echo '<h5>現在のヘッダー画像のリンク先URL：</h5><p>'. esc_url( $GLOBALS["stdata72"] ) . '</p>';
                    echo '<input type="checkbox" name="stdata72kesi" value="yes">' . '削除';
               }
               ?>

			<h5>スライドショー設定</h5>

		<?php if ( is_active_sidebar( 14 ) || trim( $GLOBALS["stdata266"] ) !== '' || trim( $GLOBALS["stdata395"] ) !== '' ) { ?>
			<p style="color: #ef5350;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>他の設定が優先中です</p>
		<?php } ?>
		<?php if ( trim( $GLOBALS["stdata398"] ) !== '' &&  trim( $GLOBALS["stdata30"] ) === '' &&  trim( $GLOBALS["stdata266"] ) === '' ) { ?>
			<p style="color: #ef5350;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>スライドショーが機能が停止中です</p>
		<?php } ?>

			<?php if ( st_speed_on() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
               <p>
                    <?php if (  trim($GLOBALS["stdata266"]) !== '' ) { ?>
                        <input type="checkbox" name="st-data30" value="" disabled="disabled">
                    <?php } else { ?>
                    <input type="checkbox" name="st-data30" value="yes" <?php if ( $GLOBALS["stdata30"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    <?php } ?>
                    ヘッダー画像をスライドショーで表示する（※記事スライドショー有効化時は選択できません）
               </p>
			<?php if ( st_speed_on() ){ echo '</div>'; } ?>

               <p>
                    スライドショーの表示方法:
                    <label><input type="radio" name="st-data31" value="fade" <?php checked( 'fade', $GLOBALS["stdata31"] ); ?>> フェードイン・アウト</label>&nbsp;
                    <label><input type="radio" name="st-data31" value="rtl" <?php checked( 'rtl', $GLOBALS["stdata31"] ); ?>> 右から左</label>&nbsp;
                    <label><input type="radio" name="st-data31" value="ltr" <?php checked( 'ltr', $GLOBALS["stdata31"] ); ?>> 左から右</label>&nbsp;
               </p>
			   <p>
			   		スライドショーの表示順序:
					<label><input type="radio" name="st-data658" value="" <?php checked( '', $GLOBALS["stdata658"] ); ?>> ランダム</label>&nbsp;
					<label><input type="radio" name="st-data658" value="id" <?php checked( 'id', $GLOBALS["stdata658"] ); ?>> 画像ID</label>
				</p>
               <p>
                    スライドショーの表示速度:
                    <input type="text" name="st-data32" size="4" value="<?php echo (int) $GLOBALS["stdata32"]; ?>"> ミリ秒
               </p>

               <p>
				   <?php if ( trim( $GLOBALS["stdata31"] ) !== 'rtl' && trim( $GLOBALS["stdata31"] ) !== 'ltr' ) { ?>
				   <input type="checkbox" name="st-data274" value="" disabled="disabled">
				   <?php } else { ?>
				   <input type="checkbox" name="st-data274" value="yes" <?php if ( $GLOBALS["stdata274"] === 'yes' ) {
                       echo 'checked';
                   } ?>>
				   <?php } ?>
				   横並びにする（※表示方法がスライド時のみ）
			</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="ヘッダーコンテンツ設定"><i class="st-fa st-svg-pencil-square-o"></i>ヘッダーコンテンツ設定</h4>

		<?php if ( trim( $GLOBALS["stdata266"] ) !== '' ) { ?>
			<p style="color: #ef5350;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>記事スライドショーが優先中です</p>
		<?php } ?>

               <p>
					<?php st_kanri_wysiwyg_editor( "header_gazou_content", "st-data395" ); ?>
               </p>

               <p>
                    <input type="checkbox" name="st-data399" value="yes" <?php if ( $GLOBALS["stdata399"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   コンテンツ全体を上下左右を中央寄せ（display:flex）にする※挿入内容によってはデザインが正常に反映されない場合があります</p>

               <p>
                    <input type="checkbox" name="st-data396" value="yes" <?php if ( $GLOBALS["stdata396"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   背景を暗くする</p>

				<p>
					テキストカラー（ベース）：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data684" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata684"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker></p>

				<p>※テキストカラーは管理画面上では反映されません。あくまでもベースカラーのためCSS優先度によっては反映されません。<br>
			※エリアの背景画像及び高さはカスタマイザーの「ヘッダー画像」で設定できます</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

				<h4 id="記事スライドショー設定"><i class="st-fa st-svg-slide-show"></i>記事スライドショー設定</h4>

				<?php if ( trim( $GLOBALS["stdata398"] ) !== '' &&  trim( $GLOBALS["stdata30"] ) === '' &&  trim( $GLOBALS["stdata266"] ) === '' ) { ?>
					<p style="color: #ef5350;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>スライドショーが機能が停止中です</p>
				<?php } ?>

				<?php if ( st_speed_on() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
				   <p>
					   <input type="checkbox" name="st-data266" value="yes" <?php if ( $GLOBALS["stdata266"] === 'yes' ) {
						   echo 'checked';
					   } ?>>
					   ヘッダーに記事をスライドショーで表示する（※画像スライドショーより優先されます）
				   </p>
				<?php if ( st_speed_on() ){ echo '</div>'; } ?>

				<p>
					 <input type="checkbox" name="st-data644" value="yes" <?php if ( $GLOBALS["stdata644"] === 'yes' ) { echo 'checked'; } ?>>
					サムネイル画像の縦横比設定を反映しない</p>

               <p>
                   スライドショーの表示方法:
                   <label><input type="radio" name="st-data267" value="fade" <?php checked( 'fade', $GLOBALS["stdata267"] ); ?>> フェードイン・アウト</label>&nbsp;
                   <label><input type="radio" name="st-data267" value="rtl" <?php checked( 'rtl', $GLOBALS["stdata267"] ); ?>> 右から左</label>&nbsp;
                   <label><input type="radio" name="st-data267" value="ltr" <?php checked( 'ltr', $GLOBALS["stdata267"] ); ?>> 左から右</label>&nbsp;
               </p>
               <p>
                   スライドショーの表示速度:
                   <input type="text" name="st-data268" size="4" value="<?php echo (int) $GLOBALS["stdata268"]; ?>"> ミリ秒
               </p>
               <p>表示するカテゴリーID：
                   <input type="text" pattern="^[-0-9,]+$" name="st-data269" value="<?php echo esc_attr( $GLOBALS["stdata269"] ); ?>" style="ime-mode:disabled;" placeholder="1,3,5"><br/>※複数指定する場合は半角カンマ「,」で区切ってください
               </p>
               <p>
                   <input type="checkbox" name="st-data270" value="yes" <?php if ( $GLOBALS["stdata270"] === 'yes' ) {
                       echo 'checked';
                   } ?>> カテゴリーリンクを非表示
                   <input type="checkbox" name="st-data271" value="yes" <?php if ( $GLOBALS["stdata271"] === 'yes' ) {
                       echo 'checked';
                   } ?> style="margin-left: 1em;"> 投稿日を非表示
               </p>
				<div class="linked">
	               <p>
	                   <?php if ( trim( $GLOBALS["stdata267"] ) !== 'rtl' && trim( $GLOBALS["stdata267"] ) !== 'ltr' ) { ?>
	                       <input type="checkbox" name="st-data272" value="" disabled="disabled">
	                   <?php } else { ?>
	                       <input type="checkbox" name="st-data272" value="yes" <?php if ( $GLOBALS["stdata272"] === 'yes' ) {
	                       echo 'checked';
	                   } ?>>
	                   <?php } ?>
	                   横並びにする（※表示方法がスライド時のみ）
	               </p>
	               <p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data273" value="yes" <?php if ( $GLOBALS["stdata273"] === 'yes' ) {
								echo 'checked';
							} ?>>
	                   メイン以外を暗くする
	               </p>
			</div>

            <p>
                 <input type="checkbox" name="st-data643" value="yes" <?php if ( $GLOBALS["stdata643"] === 'yes' ) { echo 'checked'; } ?>>
				スマホ（599px以下）のタイトル背景を暗くする</p>

			<h5>スライドショーの矢印アイコン</h5>

			<p><span style="color:#f44336;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i></span>ショートコードを含む全てのスライドショーに反映されます</p>

               <p>
                    <input type="checkbox" name="st-data278" value="yes" <?php if ( $GLOBALS["stdata278"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   非表示にする</p>
                    <p>カラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data328"
                            value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata328"] ) ); ?>" size="6"
                            style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>
                    </p>

			<?php if ( st_speed_on() || st_speed_off() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
				<p>
					<?php if( trim( $GLOBALS["stdata30"] ) !== '' || trim( $GLOBALS["stdata266"] ) !== '' ) { // 画像スライドショー又は記事スライドショーが有効化 ?>
						<input type="checkbox" name="st-data398" value="" disabled="disabled">
					<?php } else { ?>
						<input type="checkbox" name="st-data398" value="yes" <?php if ( $GLOBALS["stdata398"] === 'yes' ) { echo 'checked';	} ?>>
					<?php } ?>
					スライドショー機能の全停止（画像スライドショー及び記事スライドショーが未使用時のみ選択可）</p>
			<?php if ( st_speed_on() || st_speed_off() ){ echo '</div>'; } ?>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

<hr/>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

				</div>
		<?php
	}
}

if ( ! function_exists( '_st_admin_display_menu_section' ) ) {
	/** メニュー */
	function _st_admin_display_menu_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="header-menu" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-bars"></i>メニュー設定</h3>

			<ul class="theme-kanri-menu">
				<li><a href="#スマホスライドメニュー"><i class="st-fa st-svg-mobile" aria-hidden="true"></i>スマホスライドメニュー</a></li>
				<li><a href="#その他のスマホメニュー"><i class="st-fa st-svg-mobile" aria-hidden="true"></i>その他のスマホメニュー</a></li>
			</ul>

			<div class="st-setumei">
				<ul>
					<li>※「外観」＞「メニュー」でメニュー設定を行ってください</li>
					<li>※メニューの幅やカラーはカスタマイザーで変更できます</li>
					<li>※サイドメニューはウィジェットにて設定できます</li>
				</ul>
			</div>

               <h4><i class="st-fa st-svg-desktop" aria-hidden="true"></i>PC ヘッダーメニュー</h4>

			<div style="border:solid 1px #ccc;padding:10px;text-align:center;"><p style="padding:0;margin:0;">「外観」＞「メニュー」にてメニュー作成及び設定を行ってください</p></div>

               <p>
                    <input type="radio" name="st-data35" value="" <?php if ( $GLOBALS["stdata35"] === '' ) {
                         echo 'checked';
                    } ?>>
                    PC ヘッダーメニューを上に表示する（デフォルト） <br />
                    <input type="radio" name="st-data35" value="bottom" <?php if ( $GLOBALS["stdata35"] === 'bottom' ) {
                         echo 'checked';
                    } ?>>
                    PC ヘッダーメニューを下に表示する <br />
                    <input type="radio" name="st-data35" value="kesu" <?php if ( $GLOBALS["stdata35"] === 'kesu' ) {
                         echo 'checked';
                    } ?>>
                    PC ヘッダーメニューを表示しない</p>

               <p>
                    <input type="checkbox" name="st-data55" value="yes" <?php if ( $GLOBALS["stdata55"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    旧式のナビを使用する※表示は第一層のみですが文字数制限がありません</p>

			   <p>
				   <?php if ( trim( $GLOBALS["stdata52"]) !== '' ) { // 「ヘッダーを分割しない」が有効化 ?>
					   <input type="checkbox" name="st-data428" value="" disabled="disabled">ヘッダーメニュー（横列）を有効化（960px以上） <span style="color: #f44336;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>「ヘッダーを分割しない」が有効化されているため使用できません</span>
				   <?php } else { ?>
						<input type="checkbox" name="st-data428" value="yes" <?php if ( $GLOBALS["stdata428"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						ヘッダーメニュー（横列）を有効化（960px以上） <i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>ヘッダー右部コンテンツ（電話番号・ヘッダー右ウィジェット）は無効化されます
				   <?php } ?>
		  	  </p>

			  <p>
				  <?php if ( trim( $GLOBALS["stdata52"]) !== '' || trim( $GLOBALS["stdata428"]) !== '' ) { // 「ヘッダーを分割しない」が有効化又はヘッダーメニュー（横列）を有効化 ?>
						<input type="checkbox" name="st-data43" value="" disabled="disabled">
						ヘッダー上部にフッター用リンクと同じリンクを追加する（960px以上） <span style="color: #f44336;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>「ヘッダーを分割しない」又は「ヘッダーメニュー（横列）」が有効化されているため使用できません</span>
				   <?php } else { ?>
						<input type="checkbox" name="st-data43" value="yes" <?php if ( $GLOBALS["stdata43"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						ヘッダー上部にフッター用リンクと同じリンクを追加する（960px以上）
				   <?php } ?>
			  </p>

			  <p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

               <h4 id="スマホスライドメニュー"><i class="st-fa st-svg-mobile" aria-hidden="true"></i>スマホスライドメニュー</h4>

               <p>
                    <input type="checkbox" name="st-data80" value="yes" <?php if ( $GLOBALS["stdata80"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   スマホメニューを表示しない</p>

                <p>
                    <input type="checkbox" name="st-data235" value="yes" <?php if ( $GLOBALS["stdata235"] === 'yes' ) {
                        echo 'checked';
                    } ?>>
                    下層リンクを最初から開く</p>

               <p>
                    <input type="checkbox" name="st-data16" value="yes" <?php if ( $GLOBALS["stdata16"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   PC時はスマホメニューを出力しない</p>

				<h5>【アイコンデザイン】</h5>
			<p>
				   <input type="radio" name="st-data247" value="" <?php if ( $GLOBALS["stdata247"] === '' ) {
                         echo 'checked';
                    } ?>>
                    ノーマル
                    <input type="radio" name="st-data247" value="thin" <?php if ( $GLOBALS["stdata247"] === 'thin' ) {
                         echo 'checked';
                    } ?>>
                    クール
                    <input type="radio" name="st-data247" value="cut" <?php if ( $GLOBALS["stdata247"] === 'cut' ) {
                         echo 'checked';
                    } ?>>
					リスト
		</p>

			<p>
                    <input type="checkbox" name="st-data374" value="yes" <?php if ( $GLOBALS["stdata374"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				アイコン下に「MENU」「CLOSE」を追加する</p>

			<p>
					<input type="checkbox" name="st-data647" value="yes" <?php if ( $GLOBALS["stdata647"] === 'yes' ) {
						echo 'checked';
					} ?>>
				メニューアイコンを縦にする</p>

			<h5>【メニューの位置】</h5>
			<p>
				<input type="radio" name="st-data236" value="left" <?php if ( $GLOBALS["stdata236"] === '' || $GLOBALS["stdata236"] === 'left' ) {
                         echo 'checked';
                    } ?>>
                    左

                    <input type="radio" name="st-data236" value="right" <?php if ( $GLOBALS["stdata236"] === 'right' ) {
                         echo 'checked';
                    } ?>>
                    右
                </p>

			<h5 class="grid-bg"><i class="st-fa st-svg-search"></i>検索アイコン</h5>

			<p>
				<input type="checkbox" name="st-data479" value="yes"<?php checked( $GLOBALS["stdata479"] === 'yes' ); ?>>
				スマホヘッダーに検索アイコンを追加する
			</p>

			<p>
				<input type="radio" name="st-data483" value="overlay"
					<?php checked( $GLOBALS["stdata483"] === 'overlay' ); ?>
					<?php disabled( $GLOBALS["stdata479"] !== 'yes' ); ?>>
				オーバーレイ

				<input type="radio" name="st-data483" value="slide"
					<?php checked( $GLOBALS["stdata483"] === 'slide' ); ?>
					<?php disabled( $GLOBALS["stdata479"] !== 'yes' ); ?>>
				スライド
			</p>

			<h5 class="grid-bg"><i class="st-fa st-svg-plus-thin"></i>追加メニュー</h5>

			<p><b>追加メニュー1</b></p>

			<p>追加メニュー1に表示するWebフォント（※アイコンのクラス名をご記入下さい（例：st-svg-camera-retro））：
				<input type="text" name="st-data81" value="<?php echo esc_attr( $GLOBALS["stdata81"] ); ?>" style="width:100%" placeholder="st-svg-envelope"/></p>

            <p>追加メニュー1に表示する文字（全角6文字）：
                <input type="text" name="st-data82" value="<?php echo esc_attr( $GLOBALS["stdata82"] ); ?>" style="width:100%" placeholder="テキスト" />
			</p>

		<?php if ( empty( $GLOBALS["stdata85"] ) ) {
                    echo '<p>リンク先URL：<input type="text" name="st-data85" value="" style="width:100%" style="ime-mode:disabled;" placeholder="https://www.example.com/example/"></p>';
               } else {
                    echo '<p>現在のリンク先URL：'. esc_url( $GLOBALS["stdata85"] ) . '</p>';
                    echo '<input type="checkbox" name="stdata85kesi" value="yes">' . '削除';
               }
               ?>

			<p><b>追加メニュー2</b></p>

			<p>追加メニュー2に表示するWebフォント（※アイコンのクラス名をご記入下さい（例：st-svg-camera-retro））：
				<input type="text" name="st-data83" value="<?php echo esc_attr( $GLOBALS["stdata83"] ); ?>" style="width:100%" placeholder="st-svg-envelope"/></p>

               <p>追加メニュー2に表示する文字（全角6文字）：
                    <input type="text" name="st-data84" value="<?php echo esc_attr( $GLOBALS["stdata84"] ); ?>" style="width:100%" placeholder="テキスト" />
               </p>

		<?php if ( empty( $GLOBALS["stdata86"] ) ) {
                    echo '<p>リンク先URL：<input type="text" name="st-data86" value="" style="width:100%" style="ime-mode:disabled;" placeholder="https://www.example.com/example/"></p>';
               } else {
                    echo '<p>現在のリンク先URL：'. esc_url( $GLOBALS["stdata86"] ) . '</p>';
                    echo '<input type="checkbox" name="stdata86kesi" value="yes">' . '削除';
               }
               ?>
		<ul>
		<li>※リンク先を<code>tel:（任意の電話番号）</code>に設定するとスマホ閲覧時にタップで電話がかけれるようになります</li>
		<li>※リンク先を<code>#wrapper</code>に設定するとページTOPへのリンクになります</li>
		<li>※追加メニューを設定するとサイト名（及びキャッチフレーズ）はPC版が表示されます</li>
		</ul>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="その他のスマホメニュー"><i class="st-fa st-svg-mobile" aria-hidden="true"></i>その他のスマホメニュー</h4>

			  <p>
					<input type="checkbox" name="st-data469" value="yes" <?php if ( $GLOBALS["stdata469"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				  ヘッダーメニュー（横列）を有効化</p>

			<div class="linked">
	               <p>
	                    <input type="checkbox" name="st-data154" value="yes" <?php if ( $GLOBALS["stdata154"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
	                    スマホミドルメニューを表示する（※メニュー設定で「スマホミドルメニュー」を設定して下さい）</p>
	
					<p style="text-indent: 1.5em;">
						<input type="checkbox" name="st-data249" value="yes" <?php if ( $GLOBALS["stdata249"] === 'yes' ) {
								echo 'checked';
							} ?>>
						スマホミドルメニューを3列にする</p>

					<p style="text-indent: 1.5em;">
						<?php if (  trim($GLOBALS["stdata154"]) === '' ) { ?>
							<input type="radio" name="st-data250" value="top" disabled="disabled"> ヘッダー画像より上に表示 <input type="radio" name="st-data250" value="bottom" disabled="disabled"> ヘッダー画像より下に表示
						<?php } else { ?>
							<input type="radio" name="st-data250" value="top" <?php if ( $GLOBALS["stdata250"] === '' || $GLOBALS["stdata250"] === 'top' ) {
								echo 'checked';
							} ?>> ヘッダー画像より上に表示 <input type="radio" name="st-data250" value="bottom" <?php if ( $GLOBALS["stdata250"] === 'bottom' ) {
								echo 'checked';
							} ?>> ヘッダー画像より下に表示
						<?php } ?>
					</p>
			</div>

               <p>
                    <input type="checkbox" name="st-data143" value="yes" <?php if ( $GLOBALS["stdata143"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
					スマホフッターメニューを表示する（※「<?php echo WG_MB_FOOTER; ?>」使用時は表示されません。スマホ閲覧時の「ページTOPへのボタン」は自動で非表示になります）</p>

<hr/>

<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

<hr/>

               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_display_recommended_posts_section' ) ) {
	/** おすすめ記事 */
	function _st_admin_display_recommended_posts_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="recommend-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-h-under"></i>ヘッダー下 / おすすめ</h3>

			<ul class="theme-kanri-menu">
				<?php if( $st_is_ex_af ){ ?><li><a href="#ヘッダーバナー"><i class="st-fa st-svg-th-large"></i>ヘッダーバナー</a></li><?php } ?>
				<li><a href="#サムネイルスライドショー"><i class="st-fa st-svg-slide-show"></i>サムネイルスライドショー</a></li>
				<li><a href="#おすすめ記事一覧"><i class="st-fa st-svg-list-ul" aria-hidden="true"></i>おすすめ記事一覧</a></li>
			</ul>

				<?php if( $st_is_ex_af ){ ?>

					<h4 id="ヘッダーバナー"><i class="st-fa st-svg-th-large"></i>ヘッダーバナー</h4>
						<p>TOPページのヘッダーにカード型リンクを最大4つまで設置します</p>

						<p>
								<input type="checkbox" name="st-data358" value="yes" <?php if ( $GLOBALS["stdata358"] === 'yes' ) {
									 echo 'checked';
								} ?>>
							サイト全体に表示にする（デフォルトはTOPのみ）</p>

						<div class="kaiwa-formbox">
							<div class="kaiwa-formbox-in">

							<h5 class="grid-bg">ヘッダーバナー1</h5>
							<?php if ( !empty( $GLOBALS["stdata337"] ) ) { ?>
								<p><img src="<?php echo esc_url( ( $GLOBALS["stdata337"] ) ); ?>" width="200px"></p>
							<?php } ?>

							<p>画像のURL：<input type="text" name="st-data337" value="<?php echo esc_attr( ( $GLOBALS["stdata337"] ) ); ?>" style="width:100%;ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
							<?php st_media_editor_button( 'st-data337', 'アップロード' ); ?>
							<?php st_media_reset_button( 'st-data337', '削除' ); ?>

							<p style="margin-bottom:5px;">テキスト：<br/><input type="text" name="st-data338" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata338"] ) ); ?>" style="width:100%" placeholder="テキスト" /></p><p><input type="text" name="st-data630" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata630"] ) ); ?>" style="width:100%" placeholder="サブテキスト" /></p>
							<p>リンク先URL：<br/><input type="text" name="st-data339" value="<?php echo esc_attr( $GLOBALS["stdata339"] ); ?>" style="width:100%;ime-mode:disabled;" placeholder="http://example.com" /></p>

							<p>
								 <input type="checkbox" name="st-data350" value="yes" <?php if ( $GLOBALS["stdata350"] === 'yes' ) {
									 echo 'checked';
								} ?>> PCに表示しない <input type="checkbox" name="st-data351" value="yes" <?php if ( $GLOBALS["stdata351"] === 'yes' ) {
									 echo 'checked';
								} ?>> スマホ・タブレットに表示しない</p>

							<h5 class="grid-bg">ヘッダーバナー3</h5>
							<?php if ( !empty( $GLOBALS["stdata343"] ) ) { ?>
								<p><img src="<?php echo esc_url( ( $GLOBALS["stdata343"] ) ); ?>" width="200px"></p>
							<?php } ?>

							<p>画像のURL：<input type="text" name="st-data343" value="<?php echo esc_attr( ( $GLOBALS["stdata343"] ) ); ?>" style="width:100%;ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
							<?php st_media_editor_button( 'st-data343', 'アップロード' ); ?>
							<?php st_media_reset_button( 'st-data343', '削除' ); ?>

							<p style="margin-bottom:5px;">テキスト：<br/><input type="text" name="st-data344" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata344"] ) ); ?>" style="width:100%" placeholder="テキスト" /></p><p><input type="text" name="st-data632" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata632"] ) ); ?>" style="width:100%" placeholder="サブテキスト" /></p>
							<p>リンク先URL：<br/><input type="text" name="st-data345" value="<?php echo esc_attr( $GLOBALS["stdata345"] ); ?>" style="width:100%;ime-mode:disabled;" placeholder="http://example.com" /></p>

							<p>
								 <input type="checkbox" name="st-data354" value="yes" <?php if ( $GLOBALS["stdata354"] === 'yes' ) {
									 echo 'checked';
								} ?>> PCに表示しない <input type="checkbox" name="st-data355" value="yes" <?php if ( $GLOBALS["stdata355"] === 'yes' ) {
									 echo 'checked';
								} ?>> スマホ・タブレットに表示しない</p>

							</div>
							<div class="kaiwa-formbox-in">

							<h5 class="grid-bg">ヘッダーバナー2</h5>
							<?php if ( !empty( $GLOBALS["stdata340"] ) ) { ?>
								<p><img src="<?php echo esc_url( ( $GLOBALS["stdata340"] ) ); ?>" width="200px"></p>
							<?php } ?>

							<p>画像のURL：<input type="text" name="st-data340" value="<?php echo esc_attr( ( $GLOBALS["stdata340"] ) ); ?>" style="width:100%;ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
							<?php st_media_editor_button( 'st-data340', 'アップロード' ); ?>
							<?php st_media_reset_button( 'st-data340', '削除' ); ?>

							<p style="margin-bottom:5px;">テキスト：<br/><input type="text" name="st-data341" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata341"] ) ); ?>" style="width:100%" placeholder="テキスト" /></p><p><input type="text" name="st-data631" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata631"] ) ); ?>" style="width:100%" placeholder="サブテキスト" /></p>
							<p>リンク先URL：<br/><input type="text" name="st-data342" value="<?php echo esc_attr( $GLOBALS["stdata342"] ); ?>" style="width:100%;ime-mode:disabled;" placeholder="http://example.com" /></p>

							<p>
								 <input type="checkbox" name="st-data352" value="yes" <?php if ( $GLOBALS["stdata352"] === 'yes' ) {
									 echo 'checked';
								} ?>> PCに表示しない <input type="checkbox" name="st-data353" value="yes" <?php if ( $GLOBALS["stdata353"] === 'yes' ) {
									 echo 'checked';
								} ?>> スマホ・タブレットに表示しない</p>

							<h5 class="grid-bg">ヘッダーバナー4</h5>
							<?php if ( !empty( $GLOBALS["stdata346"] ) ) { ?>
								<p><img src="<?php echo esc_url( ( $GLOBALS["stdata346"] ) ); ?>" width="200px"></p>
							<?php } ?>

							<p>画像のURL：<input type="text" name="st-data346" value="<?php echo esc_attr( ( $GLOBALS["stdata346"] ) ); ?>" style="width:100%;ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
							<?php st_media_editor_button( 'st-data346', 'アップロード' ); ?>
							<?php st_media_reset_button( 'st-data346', '削除' ); ?>

							<p style="margin-bottom:5px;">テキスト：<br/><input type="text" name="st-data347" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata347"] ) ); ?>" style="width:100%" placeholder="テキスト" /></p><p><input type="text" name="st-data633" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata633"] ) ); ?>" style="width:100%" placeholder="サブテキスト" /></p>
							<p>リンク先URL：<br/><input type="text" name="st-data348" value="<?php echo esc_attr( $GLOBALS["stdata348"] ); ?>" style="width:100%;ime-mode:disabled;" placeholder="http://example.com" /></p>

							<p>
								 <input type="checkbox" name="st-data356" value="yes" <?php if ( $GLOBALS["stdata356"] === 'yes' ) {
									 echo 'checked';
								} ?>> PCに表示しない <input type="checkbox" name="st-data357" value="yes" <?php if ( $GLOBALS["stdata357"] === 'yes' ) {
									 echo 'checked';
								} ?>> スマホ・タブレットに表示しない</p>

							</div>
						</div><!-- /kaiwa-formbox -->

			<p class="komozi">※テキストに入力がある場合は画像は背景扱いになります</p>

						<h5>デザイン</h5>

						 <p>
								<input type="radio" name="st-data349" value="yes" <?php if ( $GLOBALS["stdata349"] === 'yes' ) {
									 echo 'checked';
								} ?>>
								テキストのある背景画像をぼかす
								<input type="radio" name="st-data349" value="dark" <?php if ( $GLOBALS["stdata349"] === 'dark' ) {
									 echo 'checked';
								} ?>>
								テキストのある背景画像を暗くする
								<input type="radio" name="st-data349" value="" <?php if ( $GLOBALS["stdata349"] === '' ) {
									 echo 'checked';
								} ?>>
								デフォルト</p>

						<p>
								<input type="checkbox" name="st-data489" value="yes" <?php if ( $GLOBALS["stdata489"] === 'yes' ) {
									 echo 'checked';
								} ?>>
							角丸にする</p>

						<p>
								<input type="checkbox" name="st-data392" value="yes" <?php if ( $GLOBALS["stdata392"] === 'yes' ) {
									 echo 'checked';
								} ?>>
							スマホ閲覧時（959px以下）のおすすめヘッダーバナーの高さを倍に</p>

						<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
			<?php } ?>
		
			<h4 id="サムネイルスライドショー"><i class="st-fa st-svg-slide-show"></i>サムネイルスライドショー</h4>

			<p>ヘッダー画像下ウィジェットエリアにサムネイル画像のスライドショーを表示します。</p>

			<?php if ( st_speed_on() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
				<p>
				<input type="radio" name="st-data604" value="" <?php if ( $GLOBALS["stdata604"] === '' ) {
					echo 'checked';
				} ?>>
				無効
				<input type="radio" name="st-data604" value="top" <?php if ( $GLOBALS["stdata604"] === 'top' ) {
					 echo 'checked';
				} ?>>
				フロントページ
				<input type="radio" name="st-data604" value="all" <?php if ( $GLOBALS["stdata604"] === 'all' ) {
					 echo 'checked';
				} ?>>全ページ</p>
			<?php if ( st_speed_on() ){ echo '</div>'; } ?>

		<p>カテゴリーID（※デフォルトは「0（全て）」）：
                    <input type="text" pattern="^[0-9,]+$" name="st-data594" value="<?php echo esc_attr( $GLOBALS["stdata594"] ); ?>" placeholder="1,3,5">
               </p>

		<p class="komozi">
			※複数指定する場合は半角カンマ「,」で区切ってください<br/>
			※カテゴリーIDは必須です。入力が無い場合は総合の一覧となります<br>
			※除外IDや「0」、複数のID、存在しない記事IDには対応しておりません<br>
		</p>

		<p>表示数：<input type="text" pattern="^[0-9,]+$" name="st-data599" value="<?php echo esc_attr( $GLOBALS["stdata599"] ); ?>" placeholder="5,3,1">
			</p>

		<p class="komozi">
			※（960px以上・959～600px・599px以下）順に5～1で「,（半角カンマ）」で区切って列数指定<br>
			※「1,2,3」など小→大になる指定はできません
        </p>

        <p>
			取得記事数 <input type="number" pattern="^[1-9]+$" name="st-data595" value="<?php echo esc_attr( $GLOBALS["stdata595"] ); ?>" placeholder="10">
			</p>

        <p>
        	<input type="radio" name="st-data596" value="" <?php if ( $GLOBALS["stdata596"] === '' ) {
        		echo 'checked';
        	} ?>>
			昇順（DESC）
			<input type="radio" name="st-data596" value="asc" <?php if ( $GLOBALS["stdata596"] === 'asc' ) {
                 echo 'checked';
            } ?>>
			降順（ASC）</p>

        <p>
        	<input type="radio" name="st-data597" value="" <?php if ( $GLOBALS["stdata597"] === '' ) {
        		echo 'checked';
			} ?>>
			ID
        	<input type="radio" name="st-data597" value="date" <?php if ( $GLOBALS["stdata597"] === 'date' ) {
        		echo 'checked';
			} ?>>
			投稿日
            <input type="radio" name="st-data597" value="modified" <?php if ( $GLOBALS["stdata597"] === 'modified' ) {
                 echo 'checked';
            } ?>>
			更新日
			<input type="radio" name="st-data597" value="rand" <?php if ( $GLOBALS["stdata597"] === 'rand' ) {
                echo 'checked';
             } ?>>
			ランダム</p>

           <p>
				<input type="checkbox" name="st-data598" value="yes" <?php if ( $GLOBALS["stdata598"] === 'yes' ) {
                     echo 'checked';
				} ?>>子カテゴリーを除外する</p>

           <p>
				<input type="checkbox" name="st-data600" value="yes" <?php if ( $GLOBALS["stdata600"] === 'yes' ) {
                     echo 'checked';
				} ?>>日付を表示しない</p>

           <p>
				<input type="checkbox" name="st-data601" value="yes" <?php if ( $GLOBALS["stdata601"] === 'yes' ) {
                     echo 'checked';
				} ?>>センター寄せにする（スマホ）</p>

        <p>
        	<input type="radio" name="st-data602" value="" <?php if ( $GLOBALS["stdata602"] === '' ) {
        		echo 'checked';
			} ?>>
			画像 + テキスト
			<input type="radio" name="st-data602" value="card" <?php if ( $GLOBALS["stdata602"] === 'card' ) {
                echo 'checked';
             } ?>>
			画像のみ</p>

           <p>
				<input type="checkbox" name="st-data603" value="yes" <?php if ( $GLOBALS["stdata603"] === 'yes' ) {
                     echo 'checked';
				} ?>>画像を角丸にする</p>

           <p>
				<input type="checkbox" name="st-data607" value="yes" <?php if ( $GLOBALS["stdata607"] === 'yes' ) {
                     echo 'checked';
				} ?>>画像に影を付ける</p>

           <p>
				<input type="checkbox" name="st-data605" value="yes" <?php if ( $GLOBALS["stdata605"] === 'yes' ) {
                     echo 'checked';
				} ?>>画像をフルサイズにする*</p>

			<p>
				タイトルカラー：<input type="text" pattern="^#[0-9A-Za-z]+$" name="st-data611" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata611"] ) ); ?>" size="6" style="ime-mode:disabled;" maxlength="6" data-wp-color-picker>
			</p>

			<p class="komozi">※画像をフルサイズにする場合はアイキャッチ画像のサイズを統一することを推奨します
			</p>

			<h4 id="おすすめ記事一覧"><i class="st-fa st-svg-list-ul" aria-hidden="true"></i>おすすめ記事一覧</h4>

			<p>任意の記事一覧をランキング形式で表示します。<code>[st-osusume]</code>で挿入することも可能です。</p>

				<p>おすすめ記事一覧に表示する文字：
					<input type="text" name="st-data38" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata38"] ) ); ?>" style="width:30%" />
					<br/><span class="komozi">※おすすめ記事一覧の見出しに表示したい文字を記入して下さい（&lt;i&gt;タグのみ使用可 ※全角15文字程度）。現在は<b>「
					<?php if ( trim( stripslashes( $GLOBALS["stdata38"] ) ) !== '' ) {
						$pop_name = st_esc_html_i( stripslashes( $GLOBALS["stdata38"] ) );
					}else{
						$pop_name = '表示しない';
						}
					echo $pop_name;
					?>
				」</b>です。</span></p>

               <p>任意の人気記事を指定（投稿又は固定記事ID）：
                    <input type="text" pattern="^[0-9,]+$" name="st-data37" value="<?php echo esc_attr( $GLOBALS["stdata37"] ); ?>" style="ime-mode:disabled;width:30%;" placeholder="1,3,5"><br/>※複数指定する場合は半角カンマ「,」で区切ってください
               </p>

               <p>
                    <input type="checkbox" name="st-data39" value="yes" <?php if ( $GLOBALS["stdata39"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    サイドのスクロールに表示にする（抜粋非表示）</p>
               <p>
                    <input type="checkbox" name="st-data40" value="yes" <?php if ( $GLOBALS["stdata40"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    投稿の記事下に表示にする</p>
               <p>
                    <input type="checkbox" name="st-data41" value="yes" <?php if ( $GLOBALS["stdata41"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    固定記事の下に表示にする</p>

               <p>
                    <input type="checkbox" name="st-data54" value="yes" <?php if ( $GLOBALS["stdata54"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    トップの最上部表示にする</p>

               <p>
                    <input type="checkbox" name="st-data59" value="yes" <?php if ( $GLOBALS["stdata59"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    トップの挿入固定記事下に表示にする</p>

               <p>
                    <input type="checkbox" name="st-data119" value="yes" <?php if ( $GLOBALS["stdata119"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    カテゴリーに表示にする</p>

<hr/>
               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>
		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_display_sns_section' ) ) {
	/** SNS */
	function _st_admin_display_sns_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="sns-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-share-alt" aria-hidden="true"></i>SNS設定</h3>

		<p>
                     <input type="checkbox" name="st-data262" value="yes" <?php if ( $GLOBALS["stdata262"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
			SNSボタンのカラーを優しい色にする</p>

		<div class="linked">
			<p>
	                    <input type="checkbox" name="st-data207" value="yes" <?php if ( $GLOBALS["stdata207"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
				SNSボタンをシンプルにする<span class="st-guide"><a href="#" title="プラグイン連動によるシェア数は表示されません"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span></p>
	
			<p style="text-indent: 1.5em;">
				<input type="checkbox" name="st-data248" value="yes" <?php if ( $GLOBALS["stdata248"] === 'yes' ) {
	                         echo 'checked';
	                    } ?>>
				SNSボタンを丸くする</p>
		</div>

		<p>
                    <input type="checkbox" name="st-data230" value="yes" <?php if ( $GLOBALS["stdata230"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                   投稿ページの上にSNSボタンを表示する</p>

		<p>
                    <input type="checkbox" name="st-data12" value="yes" <?php if ( $GLOBALS["stdata12"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                   投稿ページのSNSボタンを非表示にする</p>

		<p>
                    <input type="checkbox" name="st-data69" value="yes" <?php if ( $GLOBALS["stdata69"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    固定ページの記事下にSNSボタンを表示する</p>

		<p>
                    <input type="checkbox" name="st-data231" value="yes" <?php if ( $GLOBALS["stdata231"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    固定ページの上にSNSボタンを表示する（※下に表示している場合のみ有効）</p>

		<p>
                    <input type="checkbox" name="st-data103" value="yes" <?php if ( $GLOBALS["stdata103"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    トップページ下のSNSボタンを非表示にする</p>

			<h5><i class="st-fa st-svg-eye-slash" aria-hidden="true"></i> 非表示設定</h5>
			<p>
				<input type="checkbox" name="st-data410" value="yes" <?php if ( $GLOBALS["stdata410"] === 'yes' ) {
                         echo 'checked';
                    } ?>> X（旧Twitter）
				<input type="checkbox" name="st-data411" value="yes" <?php if ( $GLOBALS["stdata411"] === 'yes' ) {
                         echo 'checked';
                    } ?>> Facebook
				<input type="checkbox" name="st-data412" value="yes" <?php if ( $GLOBALS["stdata412"] === 'yes' ) {
                         echo 'checked';
                    } ?>> Pocket
				<input type="checkbox" name="st-data413" value="yes" <?php if ( $GLOBALS["stdata413"] === 'yes' ) {
                         echo 'checked';
					} ?>> はてブ
				<input type="checkbox" name="st-data495" value="yes" <?php if ( $GLOBALS["stdata495"] === 'yes' ) {
                         echo 'checked';
					} ?>> Pintarest
				<input type="checkbox" name="st-data414" value="yes" <?php if ( $GLOBALS["stdata414"] === 'yes' ) {
                         echo 'checked';
                    } ?>> LINE
				<input type="checkbox" name="st-data494" value="yes" <?php if ( $GLOBALS["stdata494"] === 'yes' ) {
                         echo 'checked';
                    } ?>> コメント
				<?php if ( st_speed_on() ) { echo '<span class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
					<input type="checkbox" name="st-data415" value="yes" <?php if ( $GLOBALS["stdata415"] === 'yes' ) {
							 echo 'checked';
						} ?>> コピー
				<?php if ( st_speed_on() ) { echo '</span>'; } ?>
			</p>
			<p class="komozi">※コメントボタンはコメントが有効な場合のみ表示されます<br>※Pintarest,コメント,コピーはAMPには表示されません</p>

			<p>
				<?php if ( st_speed_on() ) { echo '<span class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
                    <input type="checkbox" name="st-data468" value="yes" <?php if ( $GLOBALS["stdata468"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
					「この記事タイトルとURLをコピー」ボタンの別表示※SNSボタン表示が有効である必要があります
				<?php if ( st_speed_on() ) { echo '</span>'; } ?>
			</p>

			<p>
				<input type="checkbox" name="st-data496" value="yes" <?php if ( $GLOBALS["stdata496"] === 'yes' ) {
					echo 'checked';
				} ?>>
				画像にPinterestのピンを付ける*
			</p>
			<p class="komozi">※Pinterestピンの有無及び位置等はPinterestの仕様に依存します。デザインによっては表示崩れの原因となる場合がございますのでご注意下さい</p>

			<h4><i class="st-fa st-svg-facebook-square" aria-hidden="true"></i>OGP設定</h4>

			<?php if ( empty( $GLOBALS["stdata123"] ) ) {
				echo '<p>Facebook AppID (<a href="//developers.facebook.com/" target="_blank" rel="nofollow noopener">取得</a>)：<input type="text" name="st-data123" value="" style="width:100%" style="ime-mode:disabled;" placeholder="012345678901234"></p>';
			} else {
				echo '<p>現在のFacebook App ID(AMP用)：'. esc_html( $GLOBALS["stdata123"] ) . '</p>';
				echo '<input type="checkbox" name="stdata123kesi" value="yes">' . '削除';
			}
			?>

			<?php if ( empty( $GLOBALS["stdata51"] ) ) {
				echo '<p>FacebookページのURL：<input type="text" name="st-data51" value="" style="width:100%" style="ime-mode:disabled;" placeholder="https://www.facebook.com/example/"></p>';
			} else {
				echo '<p>現在のFacebookページのURL：'. esc_url( $GLOBALS["stdata51"] ) . '</p>';
				echo '<input type="checkbox" name="stdata51kesi" value="yes">' . '削除';
			}
			?>

			<h5 class="grid-bg"><i class="st-fa st-svg-twitter"></i>旧Twitter設定</h5>

		<?php if ( empty( $GLOBALS["stdata25"] ) ) {
                    echo '<p>X（旧Twitter）アカウント@：<input type="text" name="st-data25" value="" style="width:50%" style="ime-mode:disabled;">※X（旧Twitter）カードを使用する場合は必須</p>';
               } else {
                    echo '<p><i class="st-fa st-svg-twitter"></i>現在のX（旧Twitter）アカウント@：' . esc_attr( ( $GLOBALS["stdata25"] ) ) . '</p>';
                    echo '<input type="checkbox" name="stdata25kesi" value="yes">' . '削除';
               }
               ?>


               <p>ハッシュタグ<br/>
                    #<input type="text" name="st-data118" style="width:50%" value="<?php echo esc_attr( $GLOBALS["stdata118"] ); ?>">
               </p>

               <p>X（旧Twitter）カードサイズ：
                    <input type="radio" name="st-data333" value="" <?php if ( $GLOBALS["stdata333"] === '' ) {
                         echo 'checked';
                    } ?>> 大（summary_large_image） <input type="radio" name="st-data333" value="small" <?php if ( $GLOBALS["stdata333"] === 'small' ) {
                         echo 'checked';
                    } ?>> 小（summary）</p>

			<h5 class="grid-bg">トップページ（投稿・固定ページ以外）アイキャッチ画像</h5>

			<p class="komozi">※200×200px以上（8MB以下）</p>

			<p><?php if ( !empty( $GLOBALS["stdata264"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata264"] ) ); ?>" style="max-width:500px"></p>
				<?php } ?>
					<input type="text" name="st-data264" value="<?php echo esc_attr( ( $GLOBALS["stdata264"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/exsample.jpg"></p>
				<?php st_media_editor_button( 'st-data264', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data264', '削除' ); ?>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

<hr/>
               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>
		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_display_seo_section' ) ) {
	/** SEO */
	function _st_admin_display_seo_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="seo-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-line-chart"></i>SEO関連設定</h3>

               <p>トップタイトルを書き替え（ここに記述したタイトルが優先されます）<br/>
                    <input type="text" name="st-data33" style="width:100%" value="<?php echo esc_attr( $GLOBALS["stdata33"] ); ?>">
               </p>

               <p>トップ用のメタキーワード（複数ある場合は半角カンマ「,」で区切る）<br/>
                    <input type="text" placeholder="松,竹,梅" name="st-data46" style="width:100%" value="<?php echo esc_attr( $GLOBALS["stdata46"] ); ?>">
               </p>

               <p>トップ用のメタディスクリプション</p>
			<textarea style="width:100%" rows="4" type="text" name="st-data34" ><?php echo esc_html( $GLOBALS["stdata34"] ); ?></textarea>

               <p>パンくずの「HOME」を書き換え<br/>
                    <input type="text" name="st-data141" style="width:100%" value="<?php echo esc_attr( $GLOBALS["stdata141"] ); ?>" placeholder="HOME">
               </p>

				<?php if( $st_is_ex ){ ?>
				   <p>記事titleとサイト名のセパレート：<input type="text" name="st-data219" style="width:30%" value="<?php echo stripslashes( $GLOBALS["stdata219"] ); ?>" placeholder="|"><span class="st-guide"><a href="#" title="記事のtitleタグで記事とサイト名の間の区切り"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span>
				   </p>
				   <p>titleタグ先頭に挿入するテキスト<br/><input type="text" name="st-data652" style="width:100%" value="<?php echo esc_attr( $GLOBALS["stdata652"] ); ?>" placeholder="テキスト">
			</p>
					<p class="komozi">※投稿及び固定記事のtitleタグとOGPのタイトルに挿入されます</p>
				<?php } ?>

               <p>記事タイトル末尾に付くタイトル変更<span class="st-guide"><a href="#" title="記事のtitleタグで記事タイトルに続くサイトタイトル「記事タイトル - （この部分）"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span><br/><input type="text" name="st-data220" style="width:100%" value="<?php echo esc_attr( $GLOBALS["stdata220"] ); ?>" placeholder="サイト名">
               </p>

               <p>
                    <input type="checkbox" name="st-data94" value="yes" <?php if ( $GLOBALS["stdata94"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    投稿及び固定記事タイトルの末尾にサイト名を追加しない<span class="st-guide"><a href="#" title="下記の「WPデフォルトのタイトル出力を使用」にチェックが入っていると反映されません"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span></p>

               <p>
                    <input type="checkbox" name="st-data95" value="yes" <?php if ( $GLOBALS["stdata95"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    WPデフォルトのタイトル出力を使用する（プラグインで操作したい場合など）</p>

               <p>
                    <input type="checkbox" name="st-data2" value="yes" <?php if ( $GLOBALS["stdata2"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    ヘッダーソースを自動で綺麗にしない（Head Cleaner使用の場合など）</p>

               <p>
                    <input type="checkbox" name="st-data15" value="yes" <?php if ( $GLOBALS["stdata15"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                   カテゴリーをindexしない<?php if( $st_is_ex ){ ?>（noindex,nofollow ※有効化すると個別index設定は使用できなくなります）<?php } ?></p>

               <p>
                    <input type="checkbox" name="st-data420" value="yes" <?php if ( $GLOBALS["stdata420"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   タグをindexしない<?php if( $st_is_ex ){ ?>（noindex,nofollow ※有効化すると個別index設定は使用できなくなります）<?php } ?></p>

               <p>
                    <input type="checkbox" name="st-data4" value="yes" <?php if ( $GLOBALS["stdata4"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    日本語パーマリンクを自動変換する<span style="color:#f44336;">※更新時にURLが変更されます</span></p>

               <p>
                    <input type="checkbox" name="st-data61" value="yes" <?php if ( $GLOBALS["stdata61"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    固定記事パーマリンクにhtmlを付与する（非推奨）<span style="color:#f44336;">※更新時にURLが変更されます（パーマリンク設定で変更を保存）</span></p>

               <p>
                    <input type="checkbox" name="st-data19" value="yes" <?php if ( $GLOBALS["stdata19"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    テキスト選択不可にする※100%コピーを禁止できるわけではありません（コンタクトフォームやコメントの入力ができなくなります。個々の設定で解除できます。）</p>

               <p>
                    <input type="checkbox" name="st-data505" value="yes" <?php if ( $GLOBALS["stdata505"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    WordPress5.5本体のサイトマップ（wp-sitemap.xml）を有効にする※有効化後はURL生成のためパーマリンクを更新してください</p>

			<h4><i class="st-fa st-svg-code" aria-hidden="true"></i>構造化データ設定 - schema.org</h4>

			<p>
				<input type="checkbox" name="st-data406" value="yes" <?php if ( $GLOBALS["stdata406"] === 'yes' ) {
					echo 'checked';
				} ?>>
				Webサイト情報を出力する
			</p>

			<p>
				<input type="checkbox" name="st-data407" value="yes" <?php if ( $GLOBALS["stdata407"] === 'yes' ) {
					echo 'checked';
				} ?>>
				投稿・固定ページで記事（著者）情報を出力する
			</p>

			<p>
				<input type="checkbox" name="st-data408" value="yes" <?php if ( $GLOBALS["stdata408"] === 'yes' ) {
					echo 'checked';
				} ?>>
				投稿・固定ページでコメント情報を出力する
			</p>

			<p>表示する管理者IDの変更：<input type="number" pattern="^[0-9]+$" name="st-data437" value="<?php echo esc_attr( $GLOBALS["stdata437"] ); ?>" placeholder="1"><br /><span class="komozi">※デフォルトは「1」です。異なるidに変更したい場合のみ設定して下さい（プロフィール情報も反映されます）<br>※現在のログインユーザーのidは「<?php $user_id = get_current_user_id(); echo $user_id; ?>」です。</span></p>

			<h4><i class="st-fa st-svg-tachometer" aria-hidden="true"></i>表示速度優先（β）</h4>

            <p>
                 <input type="radio" name="st-data434" value="" <?php if ( $GLOBALS["stdata434"] === '' ) {
                      echo 'checked';
                 } ?>>
				使用しない&nbsp;
				<input type="radio" name="st-data434" value="yes" <?php if ( $GLOBALS["stdata434"] === 'yes' ) {
                      echo 'checked';
                 } ?>>
				有効化&nbsp;
                 <input type="radio" name="st-data434" value="no" <?php if ( $GLOBALS["stdata434"] === 'no' ) {
                      echo 'checked';
                 } ?>>
				強制リセット*
                 </p>

			<h5 class="huto">
				<span class="aka"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i></span>ご利用の注意事項
			</h5>

			<p>
				一部のjsやCSSファイル、フォントの読込等を無効化する設定に変更して表示速度を優先します。<span style="color:#f44336;">使用できなくなる機能</span>や、使用状況によっては表示結果が変わるのでご注意下さい。また、一度有効化を行うと、無効化にしても各設定は変更されません。（個別に再設定する必要がございます）
			</p>
			<p class="komozi">※強制リセットは設定で制限されるスライドショー機能（及びEX版のカウントダウン・無限スクロール）を使用可能状態の値にします。</p>

			<h5>【使用できなくなる主な機能】</h5>

			<ul class="st-list">
				<li>スライドショー機能（ショートコード含む）</li>
				<li>Googleフォント・マテリアルアイコン</li>
				<li>スクロール追尾広告</li>
				<li>コピー機能（SNSボタン）</li>
				<li>アニメーションクラス</li>
				<li>カウントダウン（EX）</li>
				<li>もっと読む（無限スクロール）（EX）</li>
				<li> レスポンシブ（ショートコード含む記事一覧）画像の画質を上げる（EX）</li>
			</ul>

			<h5>【変更される主な設定】</h5>

			<div class="st-naiyou">
				<p>画像スライドショー設定 / 記事スライドショー設定 / スライドショー機能の全停止※ショートコードのスライドショー機能も使用できません / 全体フォント設定値をデフォルトに / 記事タイトル・見出し（h2～3）・ウィジェットタイトルフォントを「使用しない」に / PC閲覧時にサイドバーの最下部広告エリアをスクロール追尾しない / SNS設定でコピーを非表示 / カウントダウンを無効化（EX） / もっと読む（無限スクロール）を使用するを無効化（EX） / レスポンシブ（ショートコード含む記事一覧）画像の画質を上げる（EX） /  アニメーションCSSの無効化（font-awesome-animation）/ Googleマテリアルアイコンを無効化</p>
			</div>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

<hr/>
               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>
		</div>
		<?php
	}
}

if ( ! function_exists( '_st_admin_display_google_section' ) ) {
	/** Google */
	function _st_admin_display_google_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="google-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-google"></i>Google連携に関する設定</h3>

			<ul class="theme-kanri-menu">
				<li><a href="#インフィード広告の設定"><i class="st-fa st-svg-money" aria-hidden="true"></i>インフィード広告の設定</a></li>
				<li><a href="#見出し前に広告挿入"><i class="st-fa st-svg-magic" aria-hidden="true"></i>見出し前に広告挿入</a></li>
				<li><a href="#Google自動広告の設定"><i class="st-fa st-svg-magic" aria-hidden="true"></i>Google自動広告の設定</a></li>
				<?php if ( $st_is_ex ) { ?><li><a href="#スマホフッター広告"><i class="st-fa st-svg-magic" aria-hidden="true"></i>スマホフッター広告</a></li><?php } ?>
				<li><a href="#AMP対応"><i class="st-fa st-svg-bolt"></i>AMP対応</a></li>
			</ul>
			<p>
               <?php if ( empty( $GLOBALS["stdata7"] ) ) {
                    echo 'アナリティクスコード（gtag.js）：<br/><input type="text" placeholder="UA-00000000-1" name="st-data7" value="" style="width:50%" style="ime-mode:disabled;">';
               } else {
                    echo '<span style="padding: 5px 10px;background:#fafafa;margin-bottom:10px;display:inline-block;">現在のID：' . stripslashes( ( $GLOBALS["stdata7"] ) );
                    echo ' <input type="checkbox" name="stdata7kesi" value="yes">' . '削除</span>';
               }
               ?>
				<br>※UA-又はG-を含むトラッキングID又は測定 IDを記載（ページタグが無い場合はUA-を付与）</p>

			<p>
				<?php if ( empty( $GLOBALS["stdata14"] ) ) {
                    echo 'サーチコンソールHTMLタグ<br/><input type="text" name="st-data14" value="" style="width:100%" style="ime-mode:disabled;">';
				} else {
                    echo '<span style="padding: 5px 10px;background:#fafafa;margin-bottom:10px;display:inline-block;">現在のサーチコンソールHTMLタグ：' . stripslashes( ( $GLOBALS["stdata14"] ) );
                    echo ' <input type="checkbox" name="stdata14kesi" value="yes">' . '削除</span>';
               }
               ?>
				<br>※&lt;meta name="google-（略）content="<span style="color:#f44336">ここの部分のみを記述</span>"　/&gt;</p>

		<h4>AMP用</h4>
		<p>注）AMPはACTIONよりサポート及び開発を終了しております</p>

			<p>
               <?php if ( empty( $GLOBALS["stdata124"] ) ) {
                    echo 'アナリティクスコード（トラッキング ID）※AMP用：<br/>UA- <input type="text" placeholder="00000000-1" name="st-data124" value="" style="width:50%" style="ime-mode:disabled;">';
               } else {
                    echo '<span style="padding: 5px 10px;background:#fafafa;margin-bottom:10px;display:inline-block;">現在のトラッキングID：UA-' . stripslashes( ( $GLOBALS["stdata124"] ) );
                    echo ' <input type="checkbox" name="stdata124kesi" value="yes">' . '削除</span>';
               }
               ?>
				<br>※「UA-」を<span style="color:#f44336">除外</span>したトラッキングIDを記載</p>

			<h5 style="margin-bottom: 0;">アドセンス</h5>

            <?php if ( empty( $GLOBALS["stdata121"] ) ) {
                echo '<p>data-ad-client（ca-pub-以降の数字）：<input type="text" name="st-data121" value="" style="width:100%" style="ime-mode:disabled;" placeholder="0000000000000000"></p>';
            } else {
                echo '<p>現在のdata-ad-client：ca-pub-'. esc_html( $GLOBALS["stdata121"] ) . '</p>';
                echo '<input type="checkbox" name="stdata121kesi" value="yes">' . '削除';
            }
            ?>

            <?php if ( empty( $GLOBALS["stdata122"] ) ) {
                echo '<p>data-ad-slot：<input type="text" name="st-data122" value="" style="width:100%" style="ime-mode:disabled;" placeholder="0000000000"></p>';
            } else {
                echo '<p>現在のdata-ad-slot：'. esc_html( $GLOBALS["stdata122"] ) . '</p>';
                echo '<input type="checkbox" name="stdata122kesi" value="yes">' . '削除';
            }
            ?>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h4 id="インフィード広告の設定"><i class="st-fa st-svg-money" aria-hidden="true"></i>インフィード広告の設定</h4>

			<p>表示したいエリアのフォームに「1～9」の数字を入れて下さい（割った余りが0の場合に表示）<br/>※インフィード広告のコードはウィジェットにて設定して下さい</p>
			<p>トップページの記事一覧及びアーカイブに挿入：
				<input type="number" pattern="[1-9]" name="st-data214" value="<?php echo esc_attr( $GLOBALS["stdata214"] ); ?>" placeholder="1～9の数字">
			</p>
			<p>サイドバーの新着記事一覧に挿入：
				<input type="number" pattern="[1-9]" name="st-data215" value="<?php echo esc_attr( $GLOBALS["stdata215"] ); ?>" placeholder="1～9の数字">
			</p>
			<p>関連記事に挿入：
				<input type="number" pattern="[1-9]" name="st-data216" value="<?php echo esc_attr( $GLOBALS["stdata216"] ); ?>" placeholder="1～9の数字">
			</p>

			<?php if ( st_is_experimental_mode_enabled() ) { ?>
				<p>
					   <input type="checkbox" name="st-data331" value="yes" <?php if ( $GLOBALS["stdata331"] === 'yes' ) { ?>checked<?php } ?>>
					   「記事一覧のカードデザイン化」のインフィード広告設定を有効化する※列数は2以下で指定して下さい（例：2,2,1）
				</p>
			<?php } ?>

			<p><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>広告スペースを挿入する機能です。実際の表示の有無やデザインはGoogleに依存します</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h4 id="見出し前に広告挿入"><i class="st-fa st-svg-magic" aria-hidden="true"></i>見出し前に広告挿入</h4>

			<p>注）エスケープせずにそのまま出力されます</p>

			<?php if( $st_is_ex ){ ?>
				<p>広告A：<br>
				<textarea style="width:100%" rows="4" type="text" name="st-data312" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata312"] ) ); ?>" ><?php echo esc_html( stripslashes( $GLOBALS["stdata312"] ) ); ?></textarea></p>

				広告B：<br>
				<textarea style="width:100%" rows="4" type="text" name="st-data359" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata359"] ) ); ?>" ><?php echo esc_html( stripslashes( $GLOBALS["stdata359"] ) ); ?></textarea></p>
			<?php } else { ?>
				<textarea style="width:100%" rows="4" type="text" name="st-data312" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata312"] ) ); ?>" ><?php echo esc_html( stripslashes( $GLOBALS["stdata312"] ) ); ?></textarea>
			<?php } ?>

			<p>
				<label><input type="checkbox" name="st-data313" value="yes"<?php checked( $GLOBALS["stdata313"] === 'yes' ); ?>> 投稿記事</label>
				<label><input type="checkbox" name="st-data314" value="yes"<?php checked( $GLOBALS["stdata314"] === 'yes' ); ?>> 固定記事</label>
			</p>

			<?php if( $st_is_ex ){ ?>
				<p>
					<label><input type="radio" name="st-data360" value="2"<?php checked( $GLOBALS["stdata360"] !== '3' ); ?>> h2</label>
					<label><input type="radio" name="st-data360" value="3"<?php checked( $GLOBALS["stdata360"] === '3' ); ?>> h3</label>
				</p>

				<p>
					広告A：<br>
					<label><input type="checkbox" name="st-data315" value="yes"<?php checked( $GLOBALS["stdata315"] === 'yes' ); ?>> 1番目</label>
					<label><input type="checkbox" name="st-data316" value="yes"<?php checked( $GLOBALS["stdata316"] === 'yes' ); ?>> 2番目</label>
					<label><input type="checkbox" name="st-data317" value="yes"<?php checked( $GLOBALS["stdata317"] === 'yes' ); ?>> 3番目</label>
					<label><input type="checkbox" name="st-data318" value="yes"<?php checked( $GLOBALS["stdata318"] === 'yes' ); ?>> 4番目</label>
					<label><input type="checkbox" name="st-data319" value="yes"<?php checked( $GLOBALS["stdata319"] === 'yes' ); ?>> 5番目</label>
					<label><input type="checkbox" name="st-data439" value="yes"<?php checked( $GLOBALS["stdata439"] === 'yes' ); ?>> 6番目</label>
					<label><input type="checkbox" name="st-data440" value="yes"<?php checked( $GLOBALS["stdata440"] === 'yes' ); ?>> 7番目</label>
					<label><input type="checkbox" name="st-data441" value="yes"<?php checked( $GLOBALS["stdata441"] === 'yes' ); ?>> 8番目</label>
					<label><input type="checkbox" name="st-data442" value="yes"<?php checked( $GLOBALS["stdata442"] === 'yes' ); ?>> 9番目</label>
					<label><input type="checkbox" name="st-data443" value="yes"<?php checked( $GLOBALS["stdata443"] === 'yes' ); ?>> 10番目</label>
				</p>

				<p>
					広告B：<br>
					<label><input type="checkbox" name="st-data361" value="yes"<?php checked( $GLOBALS["stdata361"] === 'yes' ); ?>> 1番目</label>
					<label><input type="checkbox" name="st-data362" value="yes"<?php checked( $GLOBALS["stdata362"] === 'yes' ); ?>> 2番目</label>
					<label><input type="checkbox" name="st-data363" value="yes"<?php checked( $GLOBALS["stdata363"] === 'yes' ); ?>> 3番目</label>
					<label><input type="checkbox" name="st-data364" value="yes"<?php checked( $GLOBALS["stdata364"] === 'yes' ); ?>> 4番目</label>
					<label><input type="checkbox" name="st-data365" value="yes"<?php checked( $GLOBALS["stdata365"] === 'yes' ); ?>> 5番目</label>
					<label><input type="checkbox" name="st-data444" value="yes"<?php checked( $GLOBALS["stdata444"] === 'yes' ); ?>> 6番目</label>
					<label><input type="checkbox" name="st-data445" value="yes"<?php checked( $GLOBALS["stdata445"] === 'yes' ); ?>> 7番目</label>
					<label><input type="checkbox" name="st-data446" value="yes"<?php checked( $GLOBALS["stdata446"] === 'yes' ); ?>> 8番目</label>
					<label><input type="checkbox" name="st-data447" value="yes"<?php checked( $GLOBALS["stdata447"] === 'yes' ); ?>> 9番目</label>
					<label><input type="checkbox" name="st-data448" value="yes"<?php checked( $GLOBALS["stdata448"] === 'yes' ); ?>> 10番目</label>
				</p>

				<p>※該当するhタグにno-adクラスを付与することで対象から除外できます</p>

			<?php } else { ?>

				<p>
					<label><input type="checkbox" name="st-data315" value="yes"<?php checked( $GLOBALS["stdata315"] === 'yes' ); ?>> 1番目</label>
					<label><input type="checkbox" name="st-data316" value="yes"<?php checked( $GLOBALS["stdata316"] === 'yes' ); ?>> 2番目</label>
					<label><input type="checkbox" name="st-data317" value="yes"<?php checked( $GLOBALS["stdata317"] === 'yes' ); ?>> 3番目</label>
					<label><input type="checkbox" name="st-data318" value="yes"<?php checked( $GLOBALS["stdata318"] === 'yes' ); ?>> 4番目</label>
					<label><input type="checkbox" name="st-data319" value="yes"<?php checked( $GLOBALS["stdata319"] === 'yes' ); ?>> 5番目</label>
				</p>
				<p>EX版では「2種類の広告設定」や「ショートコードの使用」が可能です</p>

			<?php } ?>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h4 id="Google自動広告の設定"><i class="st-fa st-svg-magic" aria-hidden="true"></i>Google自動広告の設定</h4>

			<p>headに出力※wp_head()にエスケープせずにそのまま出力されます</p>
				<textarea style="width:100%" rows="4" type="text" name="st-data242" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata242"] ) ); ?>" ><?php echo esc_html( stripslashes( $GLOBALS["stdata242"] ) ); ?></textarea>
		<h5>
			非表示設定
</h5>
		<p><input type="checkbox" name="st-data243" value="yes" <?php if ( $GLOBALS["stdata243"] === 'yes' ) { echo 'checked';
                    } ?>> トップページ
			<input type="checkbox" name="st-data244" value="yes" <?php if ( $GLOBALS["stdata244"] === 'yes' ) {
                         echo 'checked';
                    } ?>> 投稿記事
			<input type="checkbox" name="st-data245" value="yes" <?php if ( $GLOBALS["stdata245"] === 'yes' ) {
                         echo 'checked';
                    } ?>> 個別記事
			<input type="checkbox" name="st-data246" value="yes" <?php if ( $GLOBALS["stdata246"] === 'yes' ) {
                         echo 'checked';
                    } ?>> カテゴリー記事
</p>

		<p class="komozi">※広告の種類によっては非表示にできない場合があります。アドセンス管理画面にて直接設定して下さい。</p>

	<?php if ( $st_is_ex ) { ?>
		<h4 id="スマホフッター広告"><i class="st-fa st-svg-magic" aria-hidden="true"></i>スマホフッター広告</h4>

		<p>
			「スマホフッターに固定」ウィジェットのコンテンツを記事読了後に表示します（表示トリガーCSSクラス：<code>.st-trigger-ad</code>）</p>

		<p>
			<input type="checkbox" name="st-data593" value="yes" <?php if ( $GLOBALS["stdata593"] === 'yes' ) {
				echo 'checked';
			} ?>>有効化</p>
	<?php } ?>

		<h4 id="広告の明記"><i class="st-fa st-svg-eye"></i>広告の明記</h4>
		<p>
			<input type="checkbox" name="st-data651" value="yes" <?php if ( $GLOBALS["stdata651"] === 'yes' ) {
					echo 'checked';
				} ?>>「広告」を一括で明記する（投稿・固定記事）</p>
				<p>表示テキスト：<input type="text" name="st-data679" value="<?php echo esc_attr( $GLOBALS["stdata679"] ); ?>" style="width:30%" placeholder="広告" /></p>
		<p>
			<input type="checkbox" name="st-data681" value="yes" <?php if ( $GLOBALS["stdata681"] === 'yes' ) {
				echo 'checked';
			} ?>>トップページに明記する</p>
		<p>
			<label><input type="radio" name="st-data680" value=""<?php checked( $GLOBALS["stdata680"] !== '' ); ?>> デフォルト（カテゴリースタイル）</label>
			<label><input type="radio" name="st-data680" value="pr_img"<?php checked( $GLOBALS["stdata680"] === 'pr_img' ); ?>> 画像（PR）にする（カテゴリースタイル）</label>
			<label><input type="radio" name="st-data680" value="bottom"<?php checked( $GLOBALS["stdata680"] === 'bottom' ); ?>> タイトル下に表示する（テキストスタイル）</label>
		</p>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h3 id="AMP対応" class="h3tai"><i class="st-fa st-svg-bolt"></i>AMP対応</h3>
		<p>注）AMPはACTIONよりサポート及び開発を終了しております</p>

		<div style="border:solid 1px #ccc;padding:10px;text-align:center;"><p style="padding:0;margin:0;">テーマ変更時及びアップデート時は必ず「設定」＞「パーマリンク設定」で更新（変更を保存をクリック）をしてください※AMPは特別な仕様のため利用できる内容は限定されます</p></div>

		<p>
			<input type="checkbox" name="st-data120" value="yes" <?php if ( $GLOBALS["stdata120"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    全ての投稿ページをAMP対応にする（※コンテンツがAMPルールに適応している必要がございます）</p>

		<p>
			<input type="checkbox" name="st-data237" value="yes" <?php if ( $GLOBALS["stdata237"] === 'yes' ) {
				echo 'checked';
			} ?>>
					AMPが有効化されている場合にAMPページに向けてrel="alternate"を挿入する</p>

		<p>
			<input type="checkbox" name="st-data203" value="yes" <?php if ( $GLOBALS["stdata203"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    AMPページの「通常ページへのリンク」を非表示にする</p>

		<?php if( $st_is_ex ) { ?>

			<h5>上級者用設定（β）</h5>

			<p><i style="color:#f44336;" class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>上級者用設定（β）の利用は出力する内容や容量によってはエラーとなります。<span style="color:#f44336;font-weight:bold;">ご自身で確認、修正できる方できるのみ</span>ご利用下さい。</p>

			<p>AMPに追加するCSS<br/>
			<textarea style="width:100%" rows="4" name="st-data482"><?php echo esc_html( stripslashes( $GLOBALS["stdata482"] ) ); ?></textarea></p>

			<p>
				<input type="checkbox" name="st-data480" value="yes"<?php checked( $GLOBALS["stdata480"] === 'yes' ); ?>>
						AMPページにインラインCSSを許可する</p>

			<?php if ( st_is_experimental_mode_enabled() ) { ?>
				<p>
					<input type="checkbox" name="st-data481" value="yes" <?php checked( $GLOBALS["stdata481"] === 'yes' ); ?>>
						   AMPページにタグ管理プラグインを許可する（※サイトがSSL化されている必要があります）</p>
			<?php } ?>

		<?php } ?>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

<hr/>
               <p>
                    <input type="submit" value="<?php echo esc_attr( __( 'Save',
                         'affinger' ) ); ?>" class="button button-primary button-large">
               </p>

		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_display_icon_section' ) ) {
	/** その他 */
	function _st_admin_display_icon_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>

		<div id="kaiwa" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-comment" aria-hidden="true"></i>会話アイコン設定</h3>

			<p>※100px以上の正方形画像推奨</p>

			<div class="kaiwa-formbox">
				<div class="kaiwa-formbox-in">
				<p><b>【アイコン画像1（簡易会話A）】</b></p>

				<?php if ( !empty( $GLOBALS["stdata131"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata131"] ) ); ?>" width="60px"></p>
				<?php } ?>
				<input type="text" name="st-data134" value="<?php echo esc_attr( $GLOBALS["stdata134"] ); ?>" style="width:50%" placeholder="アイコン名" />

				<p>画像のURL：<input type="text" name="st-data131" value="<?php echo esc_attr( ( $GLOBALS["stdata131"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
				<?php st_media_editor_button( 'st-data131', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data131', '削除' ); ?>


				<p><b>【アイコン画像2（簡易会話B）】</b></p>
				<?php if ( !empty( $GLOBALS["stdata132"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata132"] ) ); ?>" width="60px"></p>
				<?php } ?>
				<input type="text" name="st-data135" value="<?php echo esc_attr( $GLOBALS["stdata135"] ); ?>" style="width:50%" placeholder="アイコン名" />

				<p>画像のURL：<input type="text" name="st-data132" value="<?php echo esc_attr( ( $GLOBALS["stdata132"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
				<?php st_media_editor_button( 'st-data132', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data132', '削除' ); ?>

				<p><b>【アイコン画像3】</b></p>
				<?php if ( !empty( $GLOBALS["stdata133"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata133"] ) ); ?>" width="60px"></p>
				<?php } ?>
				<input type="text" name="st-data136" value="<?php echo esc_attr( $GLOBALS["stdata136"] ); ?>" style="width:50%" placeholder="アイコン名" />

				<p>画像のURL：<input type="text" name="st-data133" value="<?php echo esc_attr( ( $GLOBALS["stdata133"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
				<?php st_media_editor_button( 'st-data133', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data133', '削除' ); ?>

				<p><b>【アイコン画像4】</b></p>

				<?php if ( !empty( $GLOBALS["stdata144"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata144"] ) ); ?>" width="60px"></p>
				<?php } ?>
				<input type="text" name="st-data145" value="<?php echo esc_attr( $GLOBALS["stdata145"] ); ?>" style="width:50%" placeholder="アイコン名" />

				<p>画像のURL：<input type="text" name="st-data144" value="<?php echo esc_attr( ( $GLOBALS["stdata144"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
				<?php st_media_editor_button( 'st-data144', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data144', '削除' ); ?>

				</div>
				<div class="kaiwa-formbox-in">

				<p><b>【アイコン画像5】</b></p>

				<?php if ( !empty( $GLOBALS["stdata146"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata146"] ) ); ?>" width="60px"></p>
				<?php } ?>
				<input type="text" name="st-data147" value="<?php echo esc_attr( $GLOBALS["stdata147"] ); ?>" style="width:50%" placeholder="アイコン名" />

				<p>画像のURL：<input type="text" name="st-data146" value="<?php echo esc_attr( ( $GLOBALS["stdata146"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
				<?php st_media_editor_button( 'st-data146', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data146', '削除' ); ?>

				<p><b>【アイコン画像6】</b></p>

				<?php if ( !empty( $GLOBALS["stdata148"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata148"] ) ); ?>" width="60px"></p>
				<?php } ?>
				<input type="text" name="st-data149" value="<?php echo esc_attr( $GLOBALS["stdata149"] ); ?>" style="width:50%" placeholder="アイコン名" />

				<p>画像のURL：<input type="text" name="st-data148" value="<?php echo esc_attr( ( $GLOBALS["stdata148"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
				<?php st_media_editor_button( 'st-data148', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data148', '削除' ); ?>

				<p><b>【アイコン画像7】</b></p>

				<?php if ( !empty( $GLOBALS["stdata150"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata150"] ) ); ?>" width="60px"></p>
				<?php } ?>
				<input type="text" name="st-data151" value="<?php echo esc_attr( $GLOBALS["stdata151"] ); ?>" style="width:50%" placeholder="アイコン名" />

				<p>画像のURL：<input type="text" name="st-data150" value="<?php echo esc_attr( ( $GLOBALS["stdata150"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
				<?php st_media_editor_button( 'st-data150', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data150', '削除' ); ?>

				<p><b>【アイコン画像8】</b></p>

				<?php if ( !empty( $GLOBALS["stdata152"] ) ) { ?>
					<p><img src="<?php echo esc_url( ( $GLOBALS["stdata152"] ) ); ?>" width="60px"></p>
				<?php } ?>
				<input type="text" name="st-data153" value="<?php echo esc_attr( $GLOBALS["stdata153"] ); ?>" style="width:50%" placeholder="アイコン名" />

				<p>画像のURL：<input type="text" name="st-data152" value="<?php echo esc_attr( ( $GLOBALS["stdata152"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="http://example.com/hoge.jpg"></p>
				<?php st_media_editor_button( 'st-data152', 'アップロード' ); ?>
				<?php st_media_reset_button( 'st-data152', '削除' ); ?>

				</div>
			</div><!-- /kaiwa-formbox -->

			<?php sale_comment_kaiwa(); // セールスコピー ?>

			<hr/>

               <p>
                    <input type="checkbox" name="st-data263" value="yes" <?php if ( $GLOBALS["stdata263"] === 'yes' ) {
                        echo 'checked';
                    } ?>>
				   会話アイコンを少し動かす</p>

               <p>
                    <input type="checkbox" name="st-data476" value="yes" <?php if ( $GLOBALS["stdata476"] === 'yes' ) {
                        echo 'checked';
                    } ?>>
				   会話アイコンを少し大きく（※80px以上の正方形画像推奨）</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'Save',
					'affinger' ) ); ?>" class="button button-primary button-large">
			</p>

		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_display_others_section' ) ) {
	/** その他 */
	function _st_admin_display_others_section() {

	$st_is_ex    = st_is_ver_ex();
	$st_is_af    = st_is_ver_af();
	$st_is_st    = st_is_ver_st();
	$st_is_ex_af = st_is_ver_ex_af();
		?>
	<div id="sonota" class="st-tabs-content">
		<h3 class="h3tai"><i class="st-fa st-svg-plus-circle" aria-hidden="true"></i>その他の設定</h3>

		<ul class="theme-kanri-menu">
			<li><a href="#ウィジェット"><i class="st-fa st-svg-pages" aria-hidden="true"></i>ウィジェット</a></li>
			<?php if( $st_is_ex ){ ?><li><a href="#検索結果"><i class="st-fa st-svg-search" aria-hidden="true"></i>検索結果</a></li><?php } ?>
			<li><a href="#演出"><i class="st-fa st-svg-magic" aria-hidden="true"></i>演出</a></li>
			<li><a href="#遅延読込"><i class="st-fa st-svg-clock-o" aria-hidden="true"></i>遅延読込</a></li>
			<li><a href="#カスタム投稿一覧の設定"><i class="st-fa st-svg-list-ul"></i>カスタム投稿一覧の設定</a></li>
			<li><a href="#その他の管理画面"><i class="st-fa st-svg-cogs" aria-hidden="true"></i>管理画面</a></li>
			<li><a href="#テーマのアップデート更新通知"><i class="st-fa st-svg-refresh" aria-hidden="true"></i>テーマのアップデート更新通知</a></li>
		</ul>

				<p>
					<input type="checkbox" name="st-data654" value="yes" <?php if ( $GLOBALS["stdata654"] === 'yes' ) {
						echo 'checked';
					} ?>>
					Chromeの縮小画像に生じるぼかしを軽減する</p>

               <p>
				   <?php if ( trim( $GLOBALS["stdata467"] ) === '' ) { ?>
						<input type="checkbox" name="st-data108" value="yes" <?php if ( $GLOBALS["stdata108"] === 'yes' ) {
							 echo 'checked';
						} ?>>
				   <?php }else{
						$GLOBALS["stdata108"] = '';
				   ?>
						<input type="checkbox" name="st-data108" value="" disabled="disabled">
				   <?php } ?>
                    記事内の外部リンクを別ウィンドウで開く（<code>target="_blank"</code>を付与）</p>

               <p>
                    <input type="checkbox" name="st-data467" value="yes" <?php if ( $GLOBALS["stdata467"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    リンクのtarget="_blank"を削除する（記事エリア<span class="st-guide"><a href="#" title="原則としてthe_content()で本文を出力しているものや、the_contentフィルターが適用されている処理全てに適用されます。"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span>）</p>

               <p>
                    <input type="checkbox" name="st-data8" value="yes" <?php if ( $GLOBALS["stdata8"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   リンクのrel="noopener noreferrer"を削除する（記事エリア<span class="st-guide"><a href="#" title="原則としてthe_content()で本文を出力しているものや、the_contentフィルターが適用されている処理全てに適用されます。"><i class="st-fa st-svg-question-circle" aria-hidden="true"></i></a></span>）<span class="aka">※トラブルの原因となる場合がございます。用途が明確でない限り有効化しないで下さい</span></p>

               <p>
                    <input type="checkbox" name="st-data634" value="yes" <?php if ( $GLOBALS["stdata634"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   メディアライブラリの無限スクロールを有効化</p>

               <p>
                    <input type="checkbox" name="st-data500" value="yes" <?php if ( $GLOBALS["stdata500"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   セルフピンバックを停止する</p>

               <p>
                    <input type="checkbox" name="st-data58" value="yes" <?php if ( $GLOBALS["stdata58"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    RSSフィードを配信しない</p>

               <p>
                    <input type="checkbox" name="st-data64" value="yes" <?php if ( $GLOBALS["stdata64"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   jsによるスムーススクロールを使用する</p>

               <?php if ( st_speed_on() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
				   <p>
						<input type="checkbox" name="st-data87" value="yes" <?php if ( $GLOBALS["stdata87"] === 'yes' ) {
							 echo 'checked';
						} ?>>
						PC閲覧時にサイドバーの最下部広告エリアをスクロール追尾しない</p>
               <?php if ( st_speed_on() ){ echo '</div>'; } ?>

				<?php if( $st_is_ex ){ ?>
				   <?php if ( st_speed_on() || st_speed_off() ){ echo '<div class="speed-on-notouch">'; } //表示速度改善（β）が有効中の為、使用できません ?>
					   <p>
							<input type="checkbox" name="st-data419" value="yes" <?php if ( $GLOBALS["stdata419"] === 'yes' ) {
								 echo 'checked';
							} ?>>
						   カウントダウンショートコードを無効化</p>
				   <?php if ( st_speed_on() || st_speed_off() ){ echo '</div>'; } ?>
				<?php } ?>

			<p>
                    <input type="checkbox" name="st-data435" value="yes" <?php if ( $GLOBALS["stdata435"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				スマホ閲覧時に横揺れが生じる場合に強制的に改善します（※position:stickyは使用できなくなります）</p>

			<p>
                    <input type="checkbox" name="st-data400" value="yes" <?php if ( $GLOBALS["stdata400"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				FontAwesomeIcons4.7.0の読み込み</p>

			<p>コピーライトの年：<input type="text" pattern="^[0-9A-Za-z]+$" name="st-data490" value="<?php echo esc_attr( $GLOBALS["stdata490"] ); ?>" placeholder="2020">
		 著作権者の名称：<input type="text" name="st-data491" value="<?php echo esc_attr( $GLOBALS["stdata491"] ); ?>"></p>

			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'Save',
					'affinger' ) ); ?>" class="button button-primary button-large">
			</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4 id="ウィジェット"><i class="st-fa st-svg-pages" aria-hidden="true"></i>ウィジェット</h4>

		<p>
			<input type="checkbox" name="st-data208" value="yes" <?php if ( $GLOBALS["stdata208"] === 'yes' ) {
				echo 'checked';
			} ?>>
                    ウィジェットのタイトルを全て非表示にする</p>

		<h5><i class="st-fa st-svg-eye-slash" aria-hidden="true"></i>無効化するウィジェット</h5>

		<p>使用しないウィジェットを非表示にします。※使用中のウィジェットも非表示となり、ウィジェットエリアから削除されます</p>

		<p>
			<?php foreach (st_admin_get_widget_settings() as $class => $setting) : ?>
				<label class="st-nowrap">
					<input type="hidden" name="st-data464[<?php echo esc_attr($class); ?>]" value="">
					<input type="checkbox" name="st-data464[<?php echo esc_attr($class); ?>]" value="yes"
					<?php checked($setting['disabled']); ?>>
					<?php echo esc_html( $setting['widget']->name ); ?>
				</label>
			<?php endforeach; ?>
		</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<input type="submit" value="<?php echo esc_attr( __( 'Save', 'affinger' ) ); ?>"
		       class="button button-primary button-large">

		<?php if( $st_is_ex ){ ?>

			<h4 id="検索結果"><i class="st-fa st-svg-search" aria-hidden="true"></i>検索結果 [EX]</h4>
			<p>原則としてWordPress標準の検索機能及びカスタム検索プラグイン（当社製品）対応です。</p><p><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>その他の検索機能/結果を拡張などを行うプラグインやカスタマイズ、環境によっては正常に動作しない可能性がございます。設定後は意図した結果になっているか必ずご確認下さい。</p>

			<p>
				除外する記事ID：<input type="text" pattern="^[0-9,]+$" name="st-data485" value="<?php echo esc_attr( $GLOBALS["stdata485"] ); ?>" style="width:100%" placeholder="1,3,5" /><br/>
				除外するカテゴリーID：<input type="text" pattern="^[0-9,]+$" name="st-data486" value="<?php echo esc_attr( $GLOBALS["stdata486"] ); ?>" style="width:100%" placeholder="1,3,5" /><br/>
				除外するタグID：<input type="text" pattern="^[0-9,]+$" name="st-data487" value="<?php echo esc_attr( $GLOBALS["stdata487"] ); ?>" style="width:100%" placeholder="1,3,5" />
			</p>
			<p class="komozi">※複数指定する場合は半角カンマ「,」で区切ってください</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<input type="submit" value="<?php echo esc_attr( __( 'Save', 'affinger' ) ); ?>"
				   class="button button-primary button-large">

		<?php } ?>

	<h4 id="演出"><i class="st-fa st-svg-magic" aria-hidden="true"></i>演出</h4>

	<p><b>【@keyframesによるアニメーション】</b></p>
	<p>読み込み時に演出を追加します。適応ID及びクラスを記載してください。<br/>※複数のクラスは「,（半角カンマ）」で区切ってください（末尾の「,」は不要）</p>

	<p>
		上から下：<input type="text" name="st-data387" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata387"] ) ); ?>" style="width:100%" placeholder="#header-l,#st-mobile-logo" /><br/>
		下から上：<input type="text" name="st-data388" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata388"] ) ); ?>" style="width:100%" placeholder=".st-middle-menu,.kanren,.post-card" /><br/>
		右から左：<input type="text" name="st-data389" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata389"] ) ); ?>" style="width:100%" placeholder=".st-cardlink-card" /><br/>
		左から右：<input type="text" name="st-data390" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata390"] ) ); ?>" style="width:100%" placeholder="#st-menuwide nav" /><br/>
		フェードインのみ：<input type="text" name="st-data391" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata391"] ) ); ?>" style="width:100%" placeholder="main .entry-title" />
	</p>

	<p><b>【記事タイトル】</b></p>
               <p>
                    <input type="checkbox" name="st-data79" value="yes" <?php if ( $GLOBALS["stdata79"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    記事タイトルをフェードインする</p>

			<?php if ( defined( 'ST_LAZY_LOAD' ) && $GLOBALS['stdata326'] === 'yes' ) { // プラグイン有効 + 遅延読み込み有効時 ?>
				<p><b>【画像】</b></p>
				<label>
					<input type="hidden" name="st-data78" value=""><?php // プラグイン有効/無効化時の【画像】設定との互換用) ?>
					<input type='checkbox' name='st-data78' value='allopacity' <?php checked( $GLOBALS['stdata78'] !== '' ); ?>>
					遅延読込対象をスクロールでフェードインする
				</label>
			<?php } else { // プラグインまたは遅延読み込み無効時 ?>
				<label>
					<input type="radio" name="st-data78" value="postopacity" <?php checked( $GLOBALS["stdata78"] === 'postopacity' ); ?>>
					記事エリアの画像表示をスクロールでフェードインする
				</label><br/>
				<label>
					<input type="radio" name="st-data78" value="allopacity" <?php checked( $GLOBALS["stdata78"] === 'allopacity' ); ?>>
					サイト全体の画像表示をスクロールでフェードインする
				</label><br/>
				<label>
					<input type="radio" name="st-data78" value="" <?php checked( $GLOBALS["stdata78"] === '' ); ?>>
					画像の演出をリセットする
				</label>

				<h4 id="遅延読込"><i class="st-fa st-svg-clock-o" aria-hidden="true"></i>遅延読込</h4>

			<p>
				<input type="checkbox" name="st-data506" value="yes" <?php if ( $GLOBALS["stdata506"] === 'yes' ) {
					echo 'checked';
				} ?>>
				WordPress本体のLazyLoadを有効にする（※height,widthが記載されたimgが対象です。「<a href="https://on-store.net/af_lazy_load/" target="_blank" rel="noopener">Affinger LazyLoad</a>」プラグイン使用時は自動で無効化されます。）</p>
			<?php } ?>

			<?php if ( ! defined( 'ST_LAZY_LOAD' ) ) { // プラグイン無効時 ?>
				<?php // フェードイン有効化時は遅延読み込み設定も有効化 (プラグイン有効/無効化時の【遅延読み込み】設定との互換用) ?>
				<input type="hidden" name="st-data326" value="<?php if ( $GLOBALS['stdata78'] !== '' ) { ?>yes<?php } ?>">
				<input type="hidden" name="st-data327" value="all">
			<?php } ?>

		<?php if ( defined( 'ST_LAZY_LOAD' ) ) { // プラグイン有効時 ?>

			<h4 id="遅延読込"><i class="st-fa st-svg-magic" aria-hidden="true"></i>遅延読込</h4>
			<h5 class="grid-bg">Affinger LazyLoadプラグイン</h5>
			<p><b>【遅延読み込み (サイト全体)】</b><br>※遅延読み込みを有効・無効化するとフェードイン設定内容が変更になります</p>
			<p><label><input type="checkbox" name="st-data326" value="yes"<?php checked( $GLOBALS['stdata326'] === 'yes' ); ?>> 遅延読み込みする</label></p>
			<p style="margin: -1em 0 0 2em;">
				<label><input type="radio" name="st-data327" value="all"<?php checked( $GLOBALS['stdata327'] === 'all' ); ?>> 画像とiframeを遅延読み込みする</label><br/>
				<label><input type="radio" name="st-data327" value="image"<?php checked( $GLOBALS['stdata327'] === 'image' ); ?>> 画像のみを遅延読み込みする</label><br />
				<label><input type="radio" name="st-data327" value="iframe"<?php checked( $GLOBALS['stdata327'] === 'iframe' ); ?>> iframeのみを遅延読み込みする</label><br />
				<label><input type="checkbox" name="st-data330" value="yes"<?php checked( $GLOBALS['stdata330'] === 'yes' ); ?>> <code>&lt;script&gt;</code>を遅延実行する（※<code>defer</code>属性を追加）</label><br>
				<?php if ( $GLOBALS['stdata330'] === 'yes' ): ?>
					<label><input type="hidden" name="st-data656" value="no"><input type="checkbox" name="st-data656" value="yes"<?php checked( $GLOBALS['stdata656'] === 'yes' ); ?>> <code>&lt;script&gt;</code>を遅延読み込みする（※Google Adsense, X 旧Twitter, Instagram）</label>
				<?php else: ?>
					<label><input type="hidden" name="st-data656" value="<?php echo esc_attr( $GLOBALS['stdata656'] ); ?>"><input type="checkbox" name="st-data656" value="yes"<?php checked( $GLOBALS['stdata656'] === 'yes' ); ?> disabled> <code>&lt;script&gt;</code>を遅延読み込みする（※Google Adsense, X 旧Twitter, Instagram）</label>
				<?php endif; ?>
			</p>
			<?php if ( _st_plugin_support_version_compare( 'ST_LAZY_LOAD_API_VERSION', '1.2.0', '>=' ) ) { ?>
				<p><label><input type="checkbox" name="st-data402" value="yes"<?php checked( $GLOBALS['stdata402'] === 'yes' ); ?>> 画像の自動調整機能を有効化する</label></p>
			<?php } ?>
		<?php } ?>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h3 id="上級者向け" class="h3tai"><i class="st-fa st-svg-exclamation-triangle"></i>上級者向け</h3>

			<h4 id="カスタム投稿一覧の設定"><i class="st-fa st-svg-list-ul"></i>カスタム投稿一覧の設定</h4>

               <p>カスタム投稿一覧を表示する固定ページテンプレートの設定</p>
               <p>一覧に表示するカスタム投稿のスラッグ：
                    <input pattern="^[0-9A-Za-z_-]+$" type="text" name="st-data106" value="<?php echo esc_attr( ( $GLOBALS["stdata106"] ) ); ?>" style="width:100%" style="ime-mode:disabled;" placeholder="半角英数字のみ">
               </p>
               <p>カスタム投稿一覧に表示する記事数：
                    <input type="number" name="st-data107" value="<?php echo esc_attr( $GLOBALS["stdata107"] ); ?>">
               </p>

		<p>※カスタム投稿を使用する場合、デフォルトで「single-custom.php（β）」を用意していますが適宜変更及び作成して下さい。</p>

		<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

		<h4><i class="st-fa st-svg-code" aria-hidden="true"></i>コードの出力</h4>

		<p>
			<input type="checkbox" name="st-data686" value="yes" <?php if ( $GLOBALS["stdata686"] === 'yes' ) {
				echo 'checked';
			} ?>>
			ログイン時は出力しない</p>

		<p>headに出力するコード※wp_head()にエスケープせずにそのまま出力されます<br/>
		<textarea style="width:100%" rows="4" type="text" name="st-data130" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata130"] ) ); ?>" ><?php echo esc_html( stripslashes( $GLOBALS["stdata130"] ) ); ?></textarea></p>

		<?php if( $st_is_ex ){ ?>
			<p>&lt;body&gt;直後に出力するコード※エスケープせずにそのまま出力されます<br/>

			<textarea style="width:100%" rows="4" type="text" name="st-data422" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata422"] ) ); ?>" /><?php echo esc_html( stripslashes( $GLOBALS["stdata422"] ) ); ?></textarea></p>
		<?php } ?>
		<p>&lt;/body&gt;直前に出力するコード（その他のアクセス解析など）※wp_footer()にエスケープせずにそのまま出力されます<br/>

		<textarea style="width:100%" rows="4" type="text" name="st-data23" value="<?php echo esc_attr( stripslashes( $GLOBALS["stdata23"] ) ); ?>" ><?php echo esc_html( stripslashes( $GLOBALS["stdata23"] ) ); ?></textarea></p>

		<?php if ( st_is_experimental_mode_enabled() ) { ?>
			<p>
				<input type="checkbox" name="st-data645" value="yes" <?php if ( $GLOBALS["stdata645"] === 'yes' ) {
						echo 'checked';} ?>>
				ロゴ・アイコンロゴ画像にwidthとheightを出力する（※CSSにより調整のため出力通りのサイズとはならない場合がございます。）</p>
		<?php } ?>

		<p class="komozi">※AMPページには出力されません</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h4 id="その他の管理画面"><i class="st-fa st-svg-cogs" aria-hidden="true"></i>管理画面</h4>

               <p>
                    <input type="checkbox" name="st-data126" value="yes" <?php if ( $GLOBALS["stdata126"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
                    ダッシュボードの内容を非表示にして2カラムに</p>

				<p>
					<input type="checkbox" name="st-data685" value="yes" <?php if ( $GLOBALS["stdata685"] === 'yes' ) {
						echo 'checked';
					} ?>>
					カスタマイザーのデフォルトパネル（メニュー・ウィジェット・固定フロントページ）を非表示にする</p>

               <p>
                    <input type="checkbox" name="st-data47" value="yes" <?php if ( $GLOBALS["stdata47"] === 'yes' ) {
                         echo 'checked';
                    } ?>>
				   WordPressの自動更新を有効化する（動作検証済みWordPressバージョン以降のアップデートは不具合を引き起こす可能性がございます※100%更新停止を保証するものではありません）</p>

			<p><a href="<?php echo site_url(); ?>/wp-admin/options.php" target="_blank" rel="nofollow noopener">WordPressオプション設定へのリンク</a>（WordPress本体の管理画面です）</p>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<h4 id="テーマのアップデート更新通知"><i class="st-fa st-svg-refresh" aria-hidden="true"></i>テーマのアップデート更新通知（β）</h4>

			<div style="border:solid 1px #ccc;padding:10px;text-align:center;"><p style="padding:0;margin:0;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>当機能はβ版のオプション機能です。環境などにより正常に作動しない場合は従来のアップデート方法をご利用頂きますようお願い致します。</p></div>

			<?php sale_comment_update(); // セールスコピー ?>

			<p>
				更新通知パスワード：
				<input type="password" name="st-data265" value="<?php echo esc_attr( $GLOBALS["stdata265"] ); ?>">
				<input type="checkbox" name="st-data401" value="yes"<?php checked( $GLOBALS['stdata401'], 'yes' ); ?>>有効化
			</p>
			<ul class="komozi">
				<li>※パスワード入力時は処理速度が低下する場合があります（その場合は利用時のみチェックを入れて下さい）</li>
				<li>※仕様変更を伴うアップデートの場合がございます。更新前に必ず「購入ユーザー限定ページ」にて詳細をご確認ください</li>
				<li>※更新したいテーマが有効化されている必要があります（子テーマ使用時でも親テーマが対象となります）</li>
				<li>※パスワードが正しくない場合は作動しません。（パスワードは定期的に変更になります。アップデート情報含め、テーマ管理のお知らせを定期的にチェックして下さい）</li>
				<li>※WP 本体の更新チェックのタイミングで更新情報が配信されます。<a href="<?php echo site_url(); ?>/wp-admin/update-core.php" target="_blank" rel="nofollow noopener">更新ページ</a> の "もう一度確認する" ボタンから手動での更新チェックも可能です。</li>
				<li>※更新すると<span style="color:#ef5350;">元テーマ</span>は全て上書きされます（元データを残したい場合はアップデートプラグインを使用する方法等をご利用下さい）</li>
				<li>※更新後はブラウザのキャッシュを削除して下さい</li>
			</ul>

			<p class="kanri-page-top"><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<hr/>
			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'Save',
					'affinger' ) ); ?>" class="button button-primary button-large">
			</p>

		</div>

		<?php
	}
}
