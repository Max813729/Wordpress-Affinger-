<?php

// 直接アクセスを禁止
if ( !defined( 'ABSPATH' ) ) {
     exit;
}
// テーマタイプ
define( 'AFFINGER_TYPE', 'AF5') ;
// 管理画面ページ
$stdata1  = get_option( 'st-data1', 'yes' ); //オリジナルテーマカスタマイザーを使用する
$stdata2  = get_option( 'st-data2', '' ); //ヘッダーソースを自動で綺麗にしない（Head Cleaner使用の場合など）
$stdata3  = ''; //削除ver20200821_h3タグにチェックマークを一括適応する
$stdata4  = get_option( 'st-data4', '' ); //日本語パーマリンクを自動変換する
$stdata5  = get_option( 'st-data5', '' ); //一覧のサムネイルを表示しない
$stdata6  = get_option( 'st-data6', '' ); //コメント欄を非表示にする
$stdata7  = get_option( 'st-data7', '' ); //アナリティクスコード（トラッキング ID）
$stdata8  = get_option( 'st-data8', '' ); //noopener noreferrer削除
$stdata9  = get_option( 'st-data9', '' ); //トップページに固定記事を挿入
$stdata10 = get_option( 'st-data10', '' ); //固定ページに子ページへのリンクを表示
$stdata11 = get_option( 'st-data11', '' ); //トップページのレイアウト（'','yes','lp'）
$stdata12 = get_option( 'st-data12', '' ); //投稿ページのSNSボタンを非表示にする
$stdata13 = get_option( 'st-data13', '' ); //下層ページのサイドバーの新着記事一覧を非表示にする
$stdata14 = get_option( 'st-data14', '' ); //サーチコンソールHTMLタグ
$stdata15 = get_option( 'st-data15', '' ); //カテゴリーのindex
$stdata16 = get_option( 'st-data16', '' ); //メニューの切り分け
$stdata17 = get_option( 'st-data17', '' ); //著者情報
$stdata18 = get_option( 'st-data18', '' ); //下層ページのヘッダー
$stdata19 = get_option( 'st-data19', '' ); //投稿記事のテキスト選択
$stdata20 = get_option( 'st-data20', '' ); //お知らせをTOPページの一番上に表示する
$stdata21 = get_option( 'st-data21', '' ); //お知らせに表示するカテゴリー（カテゴリーID※デフォルトは「0（全て）」）
$stdata22 = get_option( 'st-data22', '' ); //お知らせ欄表示件数
$stdata23 = get_option( 'st-data23', '' ); //アクセス解析タグ
$stdata24 = get_option( 'st-data24', '' ); //隠すクラス
$stdata25 = get_option( 'st-data25', '' ); //Twitterアカウント
$stdata26 = ''; //ファビコンURL
$stdata27 = ''; //appletouchicon
$stdata28 = get_option( 'st-data28', '' ); //お知らせタイトルバーに表示する文字
$stdata29 = ''; //カラム左右変更
$stdata30 = get_option( 'st-data30', '' ); //ヘッダー画像をスライドショーで表示
$stdata31 = get_option( 'st-data31', 'fade' ); //スライドショーの表示方法 (fade, rtl, ltr)
$stdata32 = get_option( 'st-data32', 5000 ); //スライドショーのスピード
$stdata33 = get_option( 'st-data33', '' ); //タイトル
$stdata34 = get_option( 'st-data34', '' ); //メタディスクリプション
$stdata35 = get_option( 'st-data35', '' ); //PC ヘッダーメニューの位置（上・下・非表示 'on','','kesu'）
$stdata36 = get_option( 'st-data36', '' ); //投稿の関連記事を非表示
$stdata37 = get_option( 'st-data37', '' ); //任意の記事一覧
$stdata38 = get_option( 'st-data38', '' ); //任意の記事一覧の見出し
$stdata39 = get_option( 'st-data39', '' ); //任意の記事一覧をスクロールバーに表示
$stdata40 = get_option( 'st-data40', '' ); //任意の記事一覧を投稿の記事下に表示
$stdata41 = get_option( 'st-data41', '' ); //任意の記事一覧を固定記事の記事下に表示
$stdata42 = get_option( 'st-data42', '' ); //電話番号
$stdata43 = get_option( 'st-data43', '' ); //ヘッダーにリンク追加の有無
$stdata44 = get_option( 'st-data44', '' ); //トップの新着を非表示
$stdata45 = ''; // ウィジェットにショートコード（未使用）
$stdata46 = get_option( 'st-data46', '' ); //メタキーワード
$stdata47 = get_option( 'st-data47', '' ); //自動更新停止
$stdata48 = '';                            //サムネイルを丸に（ver20190121よりstdata403に統一のため未使用）
$stdata49 = get_option( 'st-data49', '' ); //Webフォント選択
$stdata50 = ''; //fb:admins
$stdata51 = get_option( 'st-data51', '' ); //Facebookpage
$stdata52 = get_option( 'st-data52', 'yes' ); //ヘッダーを分割しない（※電話番号、ウィジェット等が非表示になります）
$stdata53 = get_option( 'st-data53', '' ); //アイキャッチ画像を挿入
$stdata54 = get_option( 'st-data54', '' ); //任意の記事一覧をトップの上部に表示
$stdata55 = get_option( 'st-data55', '' ); //旧式のナビに変更
$stdata56 = get_option( 'st-data56', '' ); //関連記事数
$stdata57 = get_option( 'st-data57', 'yes' ); //トップページのサイドバーの新着記事一覧を非表示にする
$stdata58 = get_option( 'st-data58', '' ); //RSSフィードを配信しない
$stdata59 = get_option( 'st-data59', '' ); //任意の記事一覧をトップの記事下に表示
$stdata60 = get_option( 'st-data60', '' ); //投稿記事タイトル上のカテゴリーの非表示
$stdata61 = get_option( 'st-data61', '' ); //固定記事パーマリンクにhtml付与
$stdata62 = get_option( 'st-data62', '' ); //ヘッダー画像トリミングの高さ（デフォルトは500）
$stdata63 = get_option( 'st-data63', '' ); //関連記事一覧の見出し
$stdata64 = get_option( 'st-data64', '' ); //ページ内スクロール
$stdata65 = get_option( 'st-data65', '' ); //リセット警告
$stdata66 = get_option( 'st-data66', '' ); //新着記事の文字
$stdata67 = get_option( 'st-data67', '' ); //新着記事の表示件数
$stdata68 = get_option( 'st-data68', '' ); //カスタマイザーの基本カラー設定（'','red','blue','green','orange','pink','glay'）
$stdata69 = get_option( 'st-data69', '' ); //固定ページにSNS
$stdata70 = get_option( 'st-data70', '' ); //ヘッダー画像トリミングの幅（デフォルトは2200）
$stdata71 = get_option( 'st-data71', '' ); //スマホはヘッダーを表示しない
$stdata72 = get_option( 'st-data72', '' ); //ヘッダー画像のリンク先URL
$stdata73 = get_option( 'st-data73', '' ); //抜粋表示の文字数
$stdata74 = get_option( 'st-data74', '' ); //表示を変える投稿カテゴリー
$stdata75 = get_option( 'st-data75', '' ); //アイキャッチのキャプションを表示
$stdata76 = get_option( 'st-data76', '' ); //ヘッダー画像を非表示
$stdata77 = get_option( 'st-data77', '' ); //一括カラム変更
$stdata78 = get_option( 'st-data78', '' ); //画像の表示方法
$stdata79 = get_option( 'st-data79', '' ); //タイトルの表示方法
$stdata80 = get_option( 'st-data80', '' ); //スライドメニューを非表示
$stdata81 = get_option( 'st-data81', '' ); //スマホメニューの追加Webアイコン
$stdata82 = get_option( 'st-data82', '' ); //スマホメニューの追加テキスト
$stdata83 = get_option( 'st-data83', '' ); //スマホメニューの追加Webアイコン2
$stdata84 = get_option( 'st-data84', '' ); //スマホメニューの追加テキスト2
$stdata85 = get_option( 'st-data85', '' ); //スマホメニューの追加リンク先
$stdata86 = get_option( 'st-data86', '' ); //スマホメニューの追加リンク先2
$stdata87 = get_option( 'st-data87', '' ); //スクロール広告の停止
$stdata88 = get_option( 'st-data88', '' ); //記事内の画像にcaptionがある場合に枠線を付ける

$stdata89 = get_option( 'st-data89', '' ); //自由コンテンツ (トップページ)
$stdata90 = get_option( 'st-data90', '' ); //カスタマイザー用CSSを<style>で出力
$stdata91 = get_option( 'st-data91', 'yes' ); //サムネイルサイズを大きく
$stdata92 = get_option( 'st-data92', '' ); //フロントぺージ（固定）に記事一覧
$stdata93 = get_option( 'st-data93', '' ); //フロントぺージ（固定）に記事一覧件数
$stdata94 = get_option( 'st-data94', '' ); //タイトル末尾にサイト名を付加しない
$stdata95 = get_option( 'st-data95', '' ); //WPデフォルトのタイトル出力を使用
$stdata96 = ''; //TOC+にオリジナルCSS適応
$stdata97 = get_option( 'st-data97', '' ); //デフォルトのサムネイル画像
$stdata98 = get_option( 'st-data98', 'noto' ); //游ゴシックの停止
$stdata99 = get_option( 'st-data99', '' ); //トップページの新着記事カテゴリー指定
$stdata100 = get_option( 'st-data100', '' ); //固定ページにも広告表示
$stdata101 = get_option( 'st-data101', '' ); //ヘッダーロゴ及びサイト名の非表示
$stdata102 = get_option( 'st-data102', '' ); //ヘッダーディスクリプションの非表示
$stdata103 = get_option( 'st-data103', '' ); //SNSボタンのトップ表示
$stdata104 = get_option( 'st-data104', '' ); //固定ページの更新日非表示
$stdata105 = get_option( 'st-data105', 'yes' ); //ヘッダーをセンタリング
$stdata106 = get_option( 'st-data106', '' ); //カスタム投稿のslug
$stdata107 = get_option( 'st-data107', '' ); //カスタム投稿一覧に表示する数
$stdata108 = get_option( 'st-data108', '' ); //外部リンクにblank付与
$stdata109 = get_option( 'st-data109', '' ); //ページトップへのボタンを表示しない※未使用
$stdata110 = get_option( 'st-data110', '' ); //背景に流すYouTubeID(PC)
$stdata111 = get_option( 'st-data111', '' ); //YouTubeを背景で流す
$stdata112 = get_option( 'st-data112', '' ); //YouTubeプレイ設定
$stdata113 = ''; //YouTubeの関連動画を非表示（ver20200501より仕様変更のため削除）
$stdata114 = get_option( 'st-data114', '' ); //YouTubeをループ再生
$stdata115 = get_option( 'st-data115', '' ); //YouTube背景にアミ点を追加
$stdata116 = get_option( 'st-data116', '' ); //YouTube背景を全ページに
$stdata117 = get_option( 'st-data117', '' ); //YouTubeのNOW PLAYリンクを表示する
$stdata118 = get_option( 'st-data118', '' ); //Twitterにハッシュタグ
$stdata119 = get_option( 'st-data119', '' ); //カテゴリーにおすすめ記事一覧を表示
$stdata120 = get_option( 'st-data120', '' ); //AMP対応
$stdata121 = get_option( 'st-data121', '' ); //data-ad-client
$stdata122 = get_option( 'st-data122', '' ); //data-ad-slot
$stdata123 = get_option( 'st-data123', '' ); //Facebook App ID(AMP用)
$stdata124 = get_option( 'st-data124', '' ); //アナリティクスコード(AMP用)
$stdata125 = get_option( 'st-data125', 'yes' ); //記事一覧にカテゴリー表示
$stdata126 = get_option( 'st-data126', '' ); //ダッシュボードの内容非表示
$stdata127 = get_option( 'st-data127', '' ); //サイト名とキャッチフレーズを反対に
$stdata128 = get_option( 'st-data128', '' ); //サイトの幅指定
$stdata129 = get_option( 'st-data129', 'yes' ); //投稿一覧（管理画面）にサムネイル・文字数を表示
$stdata130 = get_option( 'st-data130', '' ); //headに出力
$stdata131 = get_option( 'st-data131', '' ); //会話アイコン1
$stdata132 = get_option( 'st-data132', '' ); //会話アイコン2
$stdata133 = get_option( 'st-data133', '' ); //会話アイコン3
$stdata134 = get_option( 'st-data134', '' ); //会話アイコン名1
$stdata135 = get_option( 'st-data135', '' ); //会話アイコン名2
$stdata136 = get_option( 'st-data136', '' ); //会話アイコン名3
$stdata137 = get_option( 'st-data137', '' ); //オリジナルボタン非表示
$stdata138 = get_option( 'st-data138', '' ); //掲示板オン
$stdata139 = get_option( 'st-data139', '' ); //掲示板オフ
$stdata140 = get_option( 'st-data140', '' ); //投稿日を消す
$stdata141 = get_option( 'st-data141', '' ); //パンくずのテキスト
$stdata142 = get_option( 'st-data142', '' ); //アドセンスを横並びにする
$stdata143 = get_option( 'st-data143', '' ); //スマホフッターメニュー
$stdata144 = get_option( 'st-data144', '' ); //会話アイコン4
$stdata145 = get_option( 'st-data145', '' ); //会話アイコン名4
$stdata146 = get_option( 'st-data146', '' ); //会話アイコン5
$stdata147 = get_option( 'st-data147', '' ); //会話アイコン名5
$stdata148 = get_option( 'st-data148', '' ); //会話アイコン6
$stdata149 = get_option( 'st-data149', '' ); //会話アイコン名6
$stdata150 = get_option( 'st-data150', '' ); //会話アイコン7
$stdata151 = get_option( 'st-data151', '' ); //会話アイコン名7
$stdata152 = get_option( 'st-data152', '' ); //会話アイコン8
$stdata153 = get_option( 'st-data153', '' ); //会話アイコン名8
$stdata154 = get_option( 'st-data154', '' ); //スマホミドルメニュー
$stdata155 = get_option( 'st-data155', '' ); //改ページ
//テキストエディタで非表示にしたいボタン ACTIONより削除
//$stdata156 ~ 200
$stdata201 = get_option( 'st-data201', 'yes' ); //サイドバーカテゴリーの簡易デザイン
$stdata202 = get_option( 'st-data202', '' ); //抜粋の非表示
$stdata203 = get_option( 'st-data203', '' ); //AMPページの通常リンク非表示
$stdata204 = get_option( 'st-data204', '' ); //ぱんくず非表示
$stdata205 = get_option( 'st-data205', '' ); //PREV・NEXT非表示
$stdata206 = get_option( 'st-data206', '' ); //併用フッターウィジェットを消す
$stdata207 = get_option( 'st-data207', 'yes' ); //SNSボタンシンプルに
$stdata208 = get_option( 'st-data208', '' ); //ウィジェットのタイトルを表示
$stdata209 = get_option( 'st-data209', '' ); //トップのh1タグ変更
$stdata210 = get_option( 'st-data210', '' ); // 「この記事を書いた人」を有効化する
$stdata211 = get_option( 'st-data211', '' ); //「この記事を書いた人」の最新記事を表示する
$stdata212 = get_option( 'st-data212', '' ); //「この記事を書いた人」を固定ページでも表示する
$stdata213 = get_option( 'st-data213', 'yes' ); //アバター画像を丸くする
$stdata214 = get_option( 'st-data214', '' ); //インフィード広告をトップページの記事一覧及びアーカイブに挿入
$stdata215 = get_option( 'st-data215', '' ); //インフィード広告をサイドバーの新着記事一覧に挿入
$stdata216 = get_option( 'st-data216', '' ); //インフィード広告を関連記事に挿入
$stdata217 = get_option( 'st-data217', '' ); //アイキャッチをタイトル下に
$stdata218 = get_option( 'st-data218', '' ); //googleフォントファミリー
$stdata219 = ''; //titleのセパレート
$stdata220 = get_option( 'st-data220', '' ); //記事タイトルの末尾タイトル
$stdata221 = get_option( 'st-data221', '' ); //PC閲覧時のブログカードとおすすめ記事の抜粋を非表示にする
$stdata222 = get_option( 'st-data222', '' ); //PC閲覧時もサイドバーの記事一覧の抜粋を表示する

$stdata223 = ''; //計測リミット数
$stdata224 = ''; //リミット数を超えた場合に表示する文字
$stdata225 = ''; //view数をトップページの記事一覧及びアーカイブに表示する
$stdata226 = ''; //view数をサイドバーの新着記事一覧に表示する
$stdata227 = ''; //view数を関連記事に表示する
$stdata228 = ''; //view数をおすすめ記事に表示する（※有効化するとランキングNoは非表示になります）
$stdata229 = ''; //view数をブログカードのラベルに表示する（※ラベル文字優先）

$stdata230 = get_option( 'st-data230', '' ); //SNSボタンを投稿ページタイトル下に
$stdata231 = get_option( 'st-data231', '' ); //SNSボタンを固定ページタイトル下に
$stdata232 = get_option( 'st-data232', '' ); //クイックボタンその他非表示
$stdata233 = ''; //カテゴリーアーカイブページを1カラムに
$stdata234 = get_option( 'st-data234', '' ); //固定ページのタイトルを非表示にする
//スマホ: スライドメニュー (追加)
$stdata235 = get_option( 'st-data235', '' ); //下層リンクを最初から開く
$stdata236 = get_option( 'st-data236', '' ); //メニューの位置
//AMP
$stdata237 = get_option( 'st-data237', '' ); // AMPのindexを優先する（rel="alternate"を挿入）

$stdata238 = get_option( 'st-data238', '' ); // URLの自動ブログカード化を停止する
$stdata239 = get_option( 'st-data239', '' ); // 1カラム時のwidth
$stdata240 = 'yes'; // ビジュアルエディタのデザイン反映
$stdata241 = get_option( 'st-data241', '' ); // タイトル下のアイキャッチをワイド化する
$stdata242 = get_option( 'st-data242', '' ); // Google自動広告
$stdata243 = get_option( 'st-data243', '' ); // Google自動広告停止（トップ）
$stdata244 = get_option( 'st-data244', '' ); // Google自動広告停止（投稿）
$stdata245 = get_option( 'st-data245', '' ); // Google自動広告停止（個別）
$stdata246 = get_option( 'st-data246', '' ); // Google自動広告停止（カテゴリー）
$stdata247 = get_option( 'st-data247', 'thin' ); // スマホメニューアイコン
$stdata248 = get_option( 'st-data248', 'yes' ); // SNSアイコン丸く
$stdata249 = get_option( 'st-data249', '' ); // ミドルメニュー3列(右ボーダー)
$stdata250 = get_option( 'st-data250', 'top' ); // ミドルメニューの位置
$stdata251 = get_option( 'st-data251', '' ); // サムネイル画像をポラロイド風に
$stdata252 = get_option( 'st-data252', '' ); // テープを付ける
//Googleフォント
$stdata253 = get_option( 'st-data253', '' ); // 基本（サイト名・キャッチフレーズ・お知らせタイトル・タグクラウド・コメント）
$stdata254 = get_option( 'st-data254', '' ); // 記事タイトル&ランキング見出し
$stdata255 = get_option( 'st-data255', '' ); // NEW ENTRYと関連記事 サイドバー見出し
$stdata256 = get_option( 'st-data256', '' ); // メニュー（PCグローバル・サイド固定メニュー・スマホ）
$stdata257 = get_option( 'st-data257', '' ); // フリーボックスと任意記事の見出し
$stdata258 = get_option( 'st-data258', '' ); // 電話番号・任意記事のナンバー・Views
$stdata259 = get_option( 'st-data259', '' ); // ウィジェットボタン
$stdata260 = get_option( 'st-data260', '' ); // SNSボタン

$stdata261 = get_option( 'st-data261', 'reset' ); // デザインパターン
$stdata262 = get_option( 'st-data262', '' ); // SNSボタンのカラーを優しい色にする
$stdata263 = get_option( 'st-data263', '' ); // 会話アイコンを動かす
$stdata264 = get_option( 'st-data264', '' ); // OGP:投稿・固定ページ以外のアイキャッチ画像（トップページ含む）

$stdata265 = get_option( 'st-data265', '' ); // API キー

//記事スライドショー
$stdata266 = get_option( 'st-data266', '' ); // ヘッダーに記事をスライドショーで表示する
$stdata267 = get_option( 'st-data267', 'fade' ); // スライドショーの表示方法
$stdata268 = get_option( 'st-data268', 5000 ); // スライドショーの表示速度
$stdata269 = get_option( 'st-data269', '' ); // 表示するカテゴリーID
$stdata270 = get_option( 'st-data270', 'yes' ); // カテゴリーリンクを非表示
$stdata271 = get_option( 'st-data271', '' ); // 投稿日を非表示
$stdata272 = get_option( 'st-data272', '' ); // 横並びにする
$stdata273 = get_option( 'st-data273', '' ); // メイン以外を暗くする
$stdata274 = get_option( 'st-data274', '' ); // ヘッダー画像スライドショーを横並びにする

$stdata275 = ''; // mainのpadding-topを0に（トップページ）
$stdata276 = ''; // mainのpadding-topを0に（投稿・固定・カテゴリーページ）
$stdata277 = get_option( 'st-data277', '' ); // 投稿記事下のタグ・カテゴリーリンクの非表示
$stdata278 = get_option( 'st-data278', '' ); // スライドショー矢印アイコンの非表示

$stdata279 = get_option( 'st-data279', '' ); // 一覧の抜粋表示（スマホ）
$stdata280 = get_option( 'st-data280', '' ); // カードの抜粋表示（スマホ）

$stdata281 = get_option( 'st-data281', '' ); // 基本フォントサイズ（PC）
$stdata282 = get_option( 'st-data282', '' ); // 基本行間（PC）
$stdata283 = get_option( 'st-data283', '' ); // 記事タイトルフォントサイズ（PC）
$stdata284 = get_option( 'st-data284', '' ); // 記事タイトル行間（PC）
$stdata285 = get_option( 'st-data285', '24' ); // h2フォントサイズ（PC）
$stdata286 = get_option( 'st-data286', '' ); // h2行間（PC）
$stdata287 = get_option( 'st-data287', '' ); // h3フォントサイズ（PC）
$stdata288 = get_option( 'st-data288', '' ); // h3行間（PC）
$stdata289 = get_option( 'st-data289', '' ); // h4フォントサイズ（PC）
$stdata290 = get_option( 'st-data290', '' ); // h4行間（PC）

$stdata291 = get_option( 'st-data291', '' ); // 基本フォントサイズ（タブレット）
$stdata292 = get_option( 'st-data292', '' ); // 基本行間（タブレット）
$stdata293 = get_option( 'st-data293', '' ); // 記事タイトルフォントサイズ（タブレット）
$stdata294 = get_option( 'st-data294', '' ); // 記事タイトル行間（タブレット）
$stdata295 = get_option( 'st-data295', '' ); // h2フォントサイズ（タブレット）
$stdata296 = get_option( 'st-data296', '' ); // h2行間（タブレット）
$stdata297 = get_option( 'st-data297', '' ); // h3フォントサイズ（タブレット）
$stdata298 = get_option( 'st-data298', '' ); // h3行間（タブレット）
$stdata299 = get_option( 'st-data299', '' ); // h4フォントサイズ（タブレット）
$stdata300 = get_option( 'st-data300', '' ); // h4行間（タブレット）

$stdata301 = get_option( 'st-data301', '' ); // 基本フォントサイズ（スマホ）
$stdata302 = get_option( 'st-data302', '' ); // 基本行間（スマホ）
$stdata303 = get_option( 'st-data303', '' ); // 記事タイトルフォントサイズ（スマホ）
$stdata304 = get_option( 'st-data304', '' ); // 記事タイトル行間（スマホ）
$stdata305 = get_option( 'st-data305', '' ); // h2フォントサイズ（スマホ）
$stdata306 = get_option( 'st-data306', '' ); // h2行間（スマホ）
$stdata307 = get_option( 'st-data307', '' ); // h3フォントサイズ（スマホ）
$stdata308 = get_option( 'st-data308', '' ); // h3行間（スマホ）
$stdata309 = get_option( 'st-data309', '' ); // h4フォントサイズ（スマホ）
$stdata310 = get_option( 'st-data310', '' ); // h4行間（スマホ）

$stdata311 = get_option( 'st-data311', 'noto' ); // 基本フォント種類

$stdata312 = get_option( 'st-data312', '' ); // 見出し前に広告挿入 (A)
$stdata313 = get_option( 'st-data313', '' ); // 投稿記事 (A, B)
$stdata314 = get_option( 'st-data314', '' ); // 固定記事 (A, B)
$stdata315 = get_option( 'st-data315', '' ); // 1番目 (A)
$stdata316 = get_option( 'st-data316', '' ); // 2番目 (A)
$stdata317 = get_option( 'st-data317', '' ); // 3番目 (A)
$stdata318 = get_option( 'st-data318', '' ); // 4番目 (A)
$stdata319 = get_option( 'st-data319', '' ); // 5番目 (A)

$stdata324 = get_option( 'st-data324', '' ); // 日付表示

$stdata325 = get_option( 'st-data325', '' ); // ブラウザキャッシュを無効化する

$stdata326 = get_option( 'st-data326', '' ); // 遅延読み込みプラグイン
$stdata327 = get_option( 'st-data327', 'all' ); // 遅延読み込みの対象 (画像 + iframe, 画像のみ, iframe のみ)

$stdata328 = get_option( 'st-data328', '' ); // スライドショー: 矢印のカラー
$stdata329 = get_option( 'st-data329', '' ); // 簡易カテゴリーのカラー

$stdata330 = get_option( 'st-data330', 'all' ); // Affinger LazyLoad: <script> を遅延実行する
$stdata331 = ''; // 記事カードをインフィード広告対応
$stdata332 = get_option( 'st-data332', '' ); // ショートコード一覧のカテゴリーを非表示
$stdata333 = get_option( 'st-data333', 'small' ); // Twitterカードサイズ

$stdata334 = ''; // 親カテゴリーリンクにサムネイル画像を表示
$stdata335 = ''; // 子カテゴリーリンクにサムネイル画像を表示
$stdata336 = ''; // サムネイル画像を丸くする

$stdata337 = get_option( 'st-data337', '' ); // ヘッダーバナー1（画像）
$stdata338 = get_option( 'st-data338', '' ); // ヘッダーバナー1（テキスト）
$stdata339 = get_option( 'st-data339', '' ); // ヘッダーバナー1（リンクURL）
$stdata340 = get_option( 'st-data340', '' ); // ヘッダーバナー2（画像）
$stdata341 = get_option( 'st-data341', '' ); // ヘッダーバナー2（テキスト）
$stdata342 = get_option( 'st-data342', '' ); // ヘッダーバナー2（リンクURL）
$stdata343 = get_option( 'st-data343', '' ); // ヘッダーバナー3（画像）
$stdata344 = get_option( 'st-data344', '' ); // ヘッダーバナー3（テキスト）
$stdata345 = get_option( 'st-data345', '' ); // ヘッダーバナー3（リンクURL）
$stdata346 = get_option( 'st-data346', '' ); // ヘッダーバナー4（画像）
$stdata347 = get_option( 'st-data347', '' ); // ヘッダーバナー4（テキスト）
$stdata348 = get_option( 'st-data348', '' ); // ヘッダーバナー4（リンクURL）

$stdata349 = get_option( 'st-data349', '' ); // ヘッダーバナー（ぼかし）
$stdata350 = get_option( 'st-data350', '' ); // ヘッダーバナー1をPC非表示
$stdata351 = get_option( 'st-data351', '' ); // ヘッダーバナー1をスマホ・タブレット非表示
$stdata352 = get_option( 'st-data352', '' ); // ヘッダーバナー2をPC非表示
$stdata353 = get_option( 'st-data353', '' ); // ヘッダーバナー2をスマホ・タブレット非表示
$stdata354 = get_option( 'st-data354', '' ); // ヘッダーバナー3をPC非表示
$stdata355 = get_option( 'st-data355', '' ); // ヘッダーバナー3をスマホ・タブレット非表示
$stdata356 = get_option( 'st-data356', '' ); // ヘッダーバナー4をPC非表示
$stdata357 = get_option( 'st-data357', '' ); // ヘッダーバナー4をスマホ・タブレット非表示
$stdata358 = get_option( 'st-data358', '' ); // ヘッダーバナー4をサイト全体表示

$stdata359 = get_option( 'st-data359', '' ); // 見出し前に広告挿入 (B)
$stdata360 = get_option( 'st-data360', '' ); // h2, h3 (A, B)
$stdata361 = get_option( 'st-data361', '' ); // 1番目 (B)
$stdata362 = get_option( 'st-data362', '' ); // 2番目 (B)
$stdata363 = get_option( 'st-data363', '' ); // 3番目 (B)
$stdata364 = get_option( 'st-data364', '' ); // 4番目 (B)
$stdata365 = get_option( 'st-data365', '' ); // 5番目 (B)

$stdata366 = ''; // LPワイド
$stdata367 = get_option( 'st-data367', '' ); // 記事一覧のカードデザインパターンBを追加

$stdata368 = get_option( 'st-data368', 'yes' ); // 見出しフォントをサイト名にも反映
$stdata369 = get_option( 'st-data369', 'yes' ); // 見出しフォントを記事一覧にも反映
$stdata370 = get_option( 'st-data370', 'yes' ); // 見出しフォントをメニュー（第一階層）にも反映
$stdata371 = get_option( 'st-data371', 'yes' ); // 見出しフォントをおすすめ記事・ブログカードにも反映
$stdata372 = get_option( 'st-data372', '' ); // 見出しフォントを反映する任意のクラス
$stdata373 = get_option( 'st-data373', 'yes' ); // 見出しフォントをメニュー（第二階層以下）にも反映

$stdata374 = get_option( 'st-data374', '' ); // スライドメニューに文字追加
$stdata375 = ''; // LPワイドの左右にシャドウ

$stdata376 = get_option( 'st-data376', '' ); // Googleフォントを反映する任意のクラス
$stdata377 = '';                             // サムネイルを長方形（ver20190121よりstdata403に統一のため未使用）

$stdata378 = get_option( 'st-data378', '' ); // コメントのウェブサイトの入力欄を非表示
$stdata379 = get_option( 'st-data379', '' ); // コメントのメールアドレスの入力欄を非表示
$stdata380 = get_option( 'st-data380', '' ); // メールアドレスが公開されることはありません。 * が付いている欄は必須項目ですを非表示
$stdata381 = get_option( 'st-data381', '' ); // コメントのテキスト

$stdata382 = ''; // mainのpadding-topを0に（トップページ※スマホのみ）
$stdata383 = ''; // mainのpadding-topを0に（投稿・固定・カテゴリーページ※スマホのみ）
$stdata384 = get_option( 'st-data384', '' ); // 見出しフォントを目次にも反映
$stdata385 = get_option( 'st-data385', 'yes' ); // 見出しフォントをH4とH5にも反映
$stdata386 = get_option( 'st-data386', 'yes' ); // 見出しフォントをランキングにも反映

$stdata387 = get_option( 'st-data387', '' ); // @keyframes上から下
$stdata388 = get_option( 'st-data388', '' ); // @keyframes下から上
$stdata389 = get_option( 'st-data389', '' ); // @keyframes右から左
$stdata390 = get_option( 'st-data390', '' ); // @keyframes左から右
$stdata391 = get_option( 'st-data391', '' ); // @keyframesフェードイン
$stdata392 = get_option( 'st-data392', '' ); // スマホ閲覧時のおすすめヘッダーバナーの高さを倍に
$stdata393 = ''; // TinyMCEによるtableタグのwidth及びheightの自動挿入を無効化する
$stdata394 = ''; // W3TCのUAグループを反映
$stdata395 = get_option( 'st-data395', '' ); // ヘッダーコンテンツ
$stdata396 = get_option( 'st-data396', '' ); // ヘッダーコンテンツの背景を暗く
$stdata397 = get_option( 'st-data397', '' ); // 見出しフォントをボタンにも反映
$stdata398 = get_option( 'st-data398', '' ); // スライドショーの全停止
$stdata399 = get_option( 'st-data399', '' ); // ヘッダーコンテンツのflexbox
$stdata400 = get_option( 'st-data400', '' ); // FontAwesomeIcons4.7.0の読み込み

$stdata401 = get_option( 'st-data401', '' ); // 自動更新チェックを有効化
$stdata402 = get_option( 'st-data402', 'yes' ); // Affinger LazyLoad: アスペクト比の自動調整
$stdata403 = get_option( 'st-data403', 'full' ); // サムネイル画像
$stdata404 = get_option( 'st-data404', '' ); // プロフィール情報にhtmlタグを許可する
$stdata405 = get_option( 'st-data405', '' ); // スマホでもサムネイルサイズを大きく

$stdata406 = get_option( 'st-data406', '' ); // Webサイト情報（構造化データ）を出力する
$stdata407 = get_option( 'st-data407', '' ); // 投稿・固定ページで記事（著者）情報を出力する
$stdata408 = get_option( 'st-data408', '' ); // 投稿・固定ページでコメント情報を出力する
$stdata409 = get_option( 'st-data409', '' ); // コメントフォームを非表示にする

$stdata410 = get_option( 'st-data410', '' ); // SNSボタン（twitter）を非表示にする
$stdata411 = get_option( 'st-data411', '' ); // SNSボタン（facebook）を非表示にする
$stdata412 = get_option( 'st-data412', '' ); // SNSボタン（pocket）を非表示にする
$stdata413 = get_option( 'st-data413', '' ); // SNSボタン（はてブ）を非表示にする
$stdata414 = get_option( 'st-data414', '' ); // SNSボタン（line）を非表示にする
$stdata415 = get_option( 'st-data415', '' ); // SNSボタン（コピー）を非表示にする
$stdata416 = ''; // マイカラー登録
$stdata417 = get_option( 'st-data417', '' ); // マイマーカーA登録（マーカー）
$stdata418 = get_option( 'st-data418', '' ); // マイマーカーA登録（テキスト）

$stdata419 = get_option( 'st-data419', '' ); // カウントダウンを無効化
$stdata420 = get_option( 'st-data420', 'yes' ); // タグをindexしない

$stdata421 = ''; // もっと読む（無限スクロール）を使用する
$stdata422 = get_option( 'st-data422', '' ); // body直後に出力するコード

$stdata423 = get_option( 'st-data423', '' ); // 「記事ごとのヘッダーデザイン」一括設定

$stdata424 = get_option( 'st-data424', '' ); // コメント: タイトル入力を追加する
$stdata425 = get_option( 'st-data425', '' ); // コメント: スター（評価入力）を追加する
$stdata426 = get_option( 'st-data426', '' ); // コメント: 名前
$stdata427 = get_option( 'st-data427', '' ); // コメント: URL を表示する

$stdata428 = get_option( 'st-data428', '' ); // PCヘッダーメニュー（横列）
$stdata429 = get_option( 'st-data429', '' ); // トップページのみサイト名（ロゴ）及びキャッチフレーズを非表示
$stdata430 = get_option( 'st-data430', 'yes' ); // Googleフォントに「display=swap」を付与
$stdata431 = ''; // ブロックの挿入ボタンを常に表示にする（Gutenberg）
$stdata432 = get_option( 'st-data432', '' ); // 自由なフォント指定
$stdata433 = get_option( 'st-data433', '900' ); // 投稿画面の幅（Gutenberg）
$stdata434 = get_option( 'st-data434', '' ); // 読み込みを停止して表示速度を優先する
$stdata435 = get_option( 'st-data435', '' ); // スマホ閲覧時に横揺れが生じる場合に強制的に改善します
$stdata436 = get_option( 'st-data436', '' ); // 自由なフォント指定（見出し）
$stdata437 = get_option( 'st-data437', '' ); // 管理者ID
$stdata438 = get_option( 'st-data438', '' ); // Googleアイコンフォントを読み込む

$stdata439 = get_option( 'st-data439', '' ); //見出し前に広告挿入:  6番目 (A)
$stdata440 = get_option( 'st-data440', '' ); //見出し前に広告挿入:  7番目 (A)
$stdata441 = get_option( 'st-data441', '' ); //見出し前に広告挿入:  8番目 (A)
$stdata442 = get_option( 'st-data442', '' ); //見出し前に広告挿入:  9番目 (A)
$stdata443 = get_option( 'st-data443', '' ); //見出し前に広告挿入: 10番目 (A)
$stdata444 = get_option( 'st-data444', '' ); //見出し前に広告挿入:  6番目 (B)
$stdata445 = get_option( 'st-data445', '' ); //見出し前に広告挿入:  7番目 (B)
$stdata446 = get_option( 'st-data446', '' ); //見出し前に広告挿入:  8番目 (B)
$stdata447 = get_option( 'st-data447', '' ); //見出し前に広告挿入:  9番目 (B)
$stdata448 = get_option( 'st-data448', '' ); //見出し前に広告挿入: 10番目 (B)

$stdata449 = ''; //オリジナルpreデザインを全体に反映
$stdata450 = get_option( 'st-data450', '' ); //記事一覧（管理画面）のステータスを赤色に変更
$stdata451 = get_option( 'st-data451', '' ); //記事一覧のサムネイルとタイトルを左右変更

$stdata452 = get_option( 'st-data452', '' ); //Gutenbergブロックを厳選
$stdata453 = ''; //Gutenbergブロックを厳選（引用）
$stdata454 = ''; //Gutenbergブロックを厳選（リスト）
$stdata455 = ''; //Gutenbergブロックを厳選（ソースコード）
$stdata456 = ''; //Gutenbergブロックを厳選（カラム）
$stdata457 = ''; //Gutenbergブロックを厳選（ボタン）
$stdata458 = ''; //Gutenbergブロックを厳選（ショートコード）
$stdata459 = ''; //Gutenbergブロックを厳選（カバー）

$stdata460 = get_option( 'st-data460', '' ); // Gutenbergカラーパレット
$stdata461 = get_option( 'st-data461', '' ); // Gutenbergカラーパレット
$stdata462 = get_option( 'st-data462', '' ); // Gutenbergカラーパレット
$stdata463 = get_option( 'st-data463', '' ); // Gutenbergカラーパレット

/** @see st_admin_get_widget_settings() この関数で設定を取得するためグローバル変数は不使用 */
// $stdata464 = get_option( 'st-data464', '' ); //無効化するウィジェット

$stdata465 = get_option( 'st-data465', 'yes' ); //一覧のカテゴリーを下に
$stdata466 = get_option( 'st-data466', '' ); //一覧のタグを非表示

$stdata467 = get_option( 'st-data467', '' ); //target="_blank"の一括削除
$stdata468 = get_option( 'st-data468', '' ); //この記事タイトルとURLをコピーボタンを表示
$stdata469 = get_option( 'st-data469', '' ); //スマホヘッダーメニュー（横列）

$stdata470 = get_option( 'st-data470', '' ); // 記事一覧フォントサイズ（スマホ）
$stdata471 = get_option( 'st-data471', '' ); // 記事一覧行間（スマホ）
$stdata472 = get_option( 'st-data472', '' ); // 記事一覧フォントサイズ（タブレット）
$stdata473 = get_option( 'st-data473', '' ); // 記事一覧行間（タブレット）
$stdata474 = get_option( 'st-data474', '' ); // 記事一覧フォントサイズ（PC）
$stdata475 = get_option( 'st-data475', '' ); // 記事一覧行間（PC）

$stdata476 = get_option( 'st-data476', '' ); // 会話風アイコンを少し大きく（80px）
$stdata477 = get_option( 'st-data477', '' ); // 一覧のサムネイル画像をさらに大きく（300px）

$stdata478 = ''; // サムネイル画像サイズ設定からブログカードを除外
$stdata479 = get_option( 'st-data479', 'yes' ); // スマホヘッダーに検索アイコンを表示

$stdata480 = ''; // AMPページにインラインCSSを許可
$stdata481 = ''; // AMPページにタグ管理プラグインを許可
$stdata482 = ''; // AMPページに追加するCSS

$stdata483 = get_option( 'st-data483', 'overlay' ); // 検索メニューの表示（オーバーレイ, スライド)

$stdata484 = get_option( 'st-data484', 'yes' ); // 追加メニューを従来のデザインに戻す

$stdata485 = ''; // 検索結果: 除外する記事ID
$stdata486 = ''; // 検索結果: 除外するカテゴリーID
$stdata487 = ''; // 検索結果: 除外するタグID

$stdata488 = get_option( 'st-data488', '' ); // サムネイル画像を角丸にする
$stdata489 = get_option( 'st-data489', '' ); // ヘッダーバナーリンクを角丸にする

$stdata490 = get_option( 'st-data490', '' ); // コピーライトの年
$stdata491 = get_option( 'st-data491', '' ); // 著作者の名称

$stdata492 = ''; // 背景に流す動画 URL
$stdata493 = get_option( 'st-data493', '' ); // 動画背景: スマホにも反映

$stdata494 = get_option( 'st-data494', 'yes' ); // SNSボタン（コメント）を非表示にする

$stdata495 = get_option( 'st-data495', 'yes' ); // SNSボタン（Pintarest）を非表示にする
$stdata496 = get_option( 'st-data496', '' ); // 画像にPintarestボタンを追加

$stdata497 = get_option( 'st-data497', '' ); // 記事上（投稿）にライター情報を表示する

$stdata498 = get_option( 'st-data498', '' ); // 記事パーツなどにドロップシャドウを追加
$stdata499 = get_option( 'st-data499', '' ); // ドロップシャドウの適応ID及びクラス

$stdata500 = get_option( 'st-data500', '' ); // セルフピンバックを停止する

$stdata501 = get_option( 'st-data501', 'yes' ); // 「ブロックタイプ又はスタイルを変更」の項目をシンプルにする

$stdata502 = get_option( 'st-data502', '' ); // ボーダー設定: カラー
$stdata503 = get_option( 'st-data503', '' ); // ボーダー設定: 角丸
$stdata504 = get_option( 'st-data504', '5' ); // スタイル設定: 角丸

$stdata505 = get_option( 'st-data505', '' ); // WordPress5.5本体のサイトマップ（wp-sitemap.xml）を有効にする
$stdata506 = get_option( 'st-data506', '' ); // WordPress本体のLazyLoadを有効にする
$stdata507 = get_option( 'st-data507', '' ); // 自分用メモ

// スタイルカラーパレット
$stdata508 = get_option( 'st-data508', '' );  // ペン
$stdata509 = get_option( 'st-data509', '' );  // メモ
$stdata510 = get_option( 'st-data510', '' );  // リンク
$stdata511 = get_option( 'st-data511', '' );  // チェック
$stdata512 = get_option( 'st-data512', '' );  // ポイント
$stdata513 = get_option( 'st-data513', '' );  // インフォ
$stdata514 = get_option( 'st-data514', '' );  // 初心者
$stdata515 = get_option( 'st-data515', '' );  // 注意
$stdata516 = get_option( 'st-data516', '' );  // マル
$stdata517 = get_option( 'st-data517', '' );  // バツ
$stdata518 = get_option( 'st-data518', '' );  // Like
$stdata519 = get_option( 'st-data519', '' );  // Bad
$stdata520 = get_option( 'st-data520', '' );  // Code
$stdata521 = get_option( 'st-data521', '' );  // 簡易ボタン
$stdata522 = get_option( 'st-data522', '' );  // 予備

$stdata523 = get_option( 'st-data523', '' );  // ペン（背景色）
$stdata524 = get_option( 'st-data524', '' );  // メモ（背景色）
$stdata525 = get_option( 'st-data525', '' );  // リンク（背景色）
$stdata526 = get_option( 'st-data526', '' );  // チェック（背景色）
$stdata527 = get_option( 'st-data527', '' );  // ポイント（背景色）
$stdata528 = get_option( 'st-data528', '' );  // インフォ（背景色）
$stdata529 = get_option( 'st-data529', '' );  // 初心者（背景色）
$stdata530 = get_option( 'st-data530', '' );  // 注意（背景色）
$stdata531 = get_option( 'st-data531', '' );  // マル（背景色）
$stdata532 = get_option( 'st-data532', '' );  // バツ（背景色）
$stdata533 = get_option( 'st-data533', '' );  // Like（背景色）
$stdata534 = get_option( 'st-data534', '' );  // Bad（背景色）
$stdata535 = get_option( 'st-data535', '' );  // Code（背景色）
$stdata536 = get_option( 'st-data536', '' );  // 簡易ボタン
$stdata537 = get_option( 'st-data537', '' );  // 予備（背景色）

$stdata538 = get_option( 'st-data538', '-20' );  // ブロック下の余白（-大）
$stdata539 = get_option( 'st-data539', '-10' );  // ブロック下の余白（-小）
$stdata540 = '';   // ブロック下の余白（小）
$stdata541 = get_option( 'st-data541', '40' );   // ブロック下の余白（大）

$stdata542 = get_option( 'st-data542', '300' );  // Gutenberg 自動保存間隔

$stdata543 = get_option( 'st-data543', '' );  // ペン（非表示）
$stdata544 = get_option( 'st-data544', 'yes' );  // メモ（非表示）
$stdata545 = get_option( 'st-data545', '' );  // リンク（非表示）
$stdata546 = get_option( 'st-data546', '' );  // チェック（非表示）
$stdata547 = get_option( 'st-data547', 'yes' );  // ポイント（非表示）
$stdata548 = get_option( 'st-data548', 'yes' );  // インフォ（非表示）
$stdata549 = get_option( 'st-data549', 'yes' );  // 初心者（非表示）
$stdata550 = get_option( 'st-data550', '' );  // 注意（非表示）
$stdata551 = get_option( 'st-data551', '' );  // マル（非表示）
$stdata552 = get_option( 'st-data552', '' );  // バツ（非表示）
$stdata553 = get_option( 'st-data553', 'yes' );  // Like（非表示）
$stdata554 = get_option( 'st-data554', 'yes' );  // Bad（非表示）
$stdata555 = get_option( 'st-data555', 'yes' );  // Code（非表示）
$stdata556 = get_option( 'st-data556', 'yes' );  // 簡易ボタン（非表示）
$stdata557 = get_option( 'st-data557', '' );  // 予備（非表示）
$stdata558 = get_option( 'st-data558', '' );  // 付箋（非表示）
$stdata559 = get_option( 'st-data559', '' );  // 囲みドット（非表示）
$stdata560 = get_option( 'st-data560', '' );  // ふきだし（非表示）
$stdata561 = get_option( 'st-data561', '' );  // まるもじ（非表示）

$stdata562 = '';  // amazonキャンペーン
$stdata563 = '';  // rakutenキャンペーン
$stdata564 = get_option( 'st-data564', 'yes' );  // レスポンシブ（ショートコード含む記事一覧）画像の画質を上げる
$stdata565 = '';  // amazon rakutenキャンペーンの点滅
$stdata566 = get_option( 'st-data566', '' );  // デフォルトのURL埋込カードの整形
$stdata567 = get_option( 'st-data567', '' );  // 簡易会話ふきだしA
$stdata568 = get_option( 'st-data568', '' );  // 簡易会話ふきだしB

$stdata569 = get_option( 'st-data569', '' ); // カテゴリーAのID
$stdata570 = get_option( 'st-data570', '' ); // カテゴリーBのID
$stdata571 = get_option( 'st-data571', '' ); // カテゴリーCのID
$stdata572 = get_option( 'st-data572', '' ); // カテゴリーDのID
$stdata573 = get_option( 'st-data573', '' ); // 表示数
$stdata574 = ''; // 無限ループ（EX）
$stdata575 = get_option( 'st-data575', '' ); // order
$stdata576 = get_option( 'st-data576', '' ); // order by
$stdata577 = get_option( 'st-data577', '' ); // カテゴリーAのタブ背景色
$stdata578 = get_option( 'st-data578', '' ); // カテゴリーBのタブ背景色
$stdata579 = get_option( 'st-data579', '' ); // カテゴリーCのタブ背景色
$stdata580 = get_option( 'st-data580', '' ); // カテゴリーDのタブ背景色
$stdata581 = get_option( 'st-data581', '' ); // タブ文字色
$stdata582 = get_option( 'st-data582', '' ); // タブ式記事一覧の有効化
$stdata583 = get_option( 'st-data583', '' ); // 子カテゴリーを除外
$stdata584 = ''; // ヘッダー画像エリアに動画を表示する
$stdata585 = get_option( 'st-data585', '' ); // 表示しないカテゴリーID
$stdata586 = ''; // alt属性が空の場合に記事タイトルを設定

$stdata587 = ''; // 「続きを読む」をボタンにして以下を非表示にする（EX）
$stdata588 = get_option( 'st-data588', '' ); // LP時に記事タイトルとカテゴリーも非表示にする

$stdata589 = get_option( 'st-data589', '' ); // マイマーカーB登録（マーカー）
$stdata590 = get_option( 'st-data590', '' ); // マイマーカーB登録（テキスト）

$stdata591 = get_option( 'st-data591', 'yes' ); // Gutenberg: マイブロックのショートコードに編集リンクを表示する

$stdata592 = ''; // 更新日を全て今日にする（自動更新）（EX）
$stdata593 = ''; // スマホのフッターに固定するウィジェットをフロート化（EX）
// ヘッダー画像下 カテゴリー記事一覧
$stdata594 = get_option( 'st-data594', '0' ); // カテゴリーID
$stdata595 = get_option( 'st-data595', '10' ); // 表示数
$stdata596 = get_option( 'st-data596', '' ); // order
$stdata597 = get_option( 'st-data597', '' ); // order by
$stdata598 = get_option( 'st-data598', '' ); // 子カテゴリーを除外する
$stdata599 = get_option( 'st-data599', '' ); // slides_to_show
$stdata600 = get_option( 'st-data600', '' ); // slide_date
$stdata601 = get_option( 'st-data601', 'yes' ); // slide_center
$stdata602 = get_option( 'st-data602', 'text' ); // fullsize_type
$stdata603 = get_option( 'st-data603', 'yes' ); // サムネイルスライドショー画像を角丸にする
$stdata604 = get_option( 'st-data604', '' ); // ヘッダー画像下ウィジェットエリアにサムネイルスライドショーを表示する
$stdata605 = get_option( 'st-data605', '' ); // サムネイルスライドショー画像をフルサイズにする
$stdata606 = get_option( 'st-data606', 'h56' ); // ショートコードスライドショー（カード/JET）のサムネイル画像縦横比
$stdata607 = get_option( 'st-data607', 'yes' ); // サムネイルスライドショー画像に影を付ける
$stdata608 = get_option( 'st-data608', '' ); // サムネイル画像縦横比の基準
$stdata609 = get_option( 'st-data609', '' ); // スマホヘッダーの高さ（px）
$stdata610 = get_option( 'st-data610', 'border' ); // タブのデザイン
$stdata611 = get_option( 'st-data611', '' ); // サムネイルスライドショータイトルのカラー
$stdata612 = get_option( 'st-data612', '' ); // マーカーをストライプにする
$stdata613 = get_option( 'st-data613', '' ); // PCヘッダーを表示しない
$stdata614 = get_option( 'st-data614', '' ); // スマホヘッダーを表示しない
$stdata615 = get_option( 'st-data615', '' ); // スマホサイト名を表示しない
$stdata616 = get_option( 'st-data616', '' ); // スマホキャッチフレーズを表示しない
$stdata617 = get_option( 'st-data617', '' ); // PCヘッダーの高さ（px）
$stdata618 = ''; // 空のPタグに要素（余白）を挿入しない
$stdata619 = get_option( 'st-data619', 'yes' ); // トップページのLP時にヘッダーを表示する
$stdata620 = get_option( 'st-data620', '' ); // LP時にヘッダーを表示する（全体）
$stdata621 = ''; // ウィジェットブロックを有効にする
if( isset( $GLOBALS['wp_version'] ) && version_compare( $GLOBALS['wp_version'], '5.8-alpha', '<' ) ):
	$stdata622 = get_option( 'st-data622', 'yes' ); // 段落スタイルを有効にする
else:
	$stdata622 = 'yes'; // 段落スタイルを有効にする
endif;
$stdata623 = ''; // 非推奨ブロックを有効にする
$stdata624 = get_option( 'st-data624', '' ); // タブ式カテゴリーの最新記事一覧タブ名
$stdata625 = get_option( 'st-data625', 'yes' ); // フロントページを除く - PCヘッダーを出力しない
$stdata626 = get_option( 'st-data626', 'yes' ); // フロントページを除く - スマホヘッダーを出力しない
$stdata627 = get_option( 'st-data627', '' ); // スマホ サイドバーを出力しない
$stdata628 = get_option( 'st-data628', '' ); // ボタンにシャドウを適応する（一括強制）
$stdata629 = get_option( 'st-data629', '' ); // テキストシャドウを適応する（一括強制）

$stdata630 = get_option( 'st-data630', '' ); // ヘッダーバナー1のサブテキスト
$stdata631 = get_option( 'st-data631', '' ); // ヘッダーバナー2のサブテキスト
$stdata632 = get_option( 'st-data632', '' ); // ヘッダーバナー3のサブテキスト
$stdata633 = get_option( 'st-data633', '' ); // ヘッダーバナー4のサブテキスト

$stdata634 = get_option( 'st-data634', 'yes' ); // メディアライブラリの無限スクロール
$stdata635 = get_option( 'st-data635', '' ); // 段落下の余白
$stdata636 = get_option( 'st-data636', '' );    // 内部リンクのサムネイル画像をフルサイズにする

$stdata637 = get_option( 'st-data637', '' ); // ブログカード サムネイルサイズを大きく
$stdata638 = get_option( 'st-data638', '' ); // ブログカード さらに大きく
$stdata639 = get_option( 'st-data639', '' ); // ブログカード スマホでもサムネイルサイズを大きく
$stdata640 = get_option( 'st-data640', '' ); // ブログカード 記事一覧のサムネイルとタイトルを左右変更
$stdata641 = get_option( 'st-data641', '' ); // ブログカード サムネイルを丸く
$stdata642 = get_option( 'st-data642', '' ); // ブログカード サムネイルを非表示

$stdata643 = get_option( 'st-data643', '' ); // 記事スライドショー スマホのタイトル背景を暗くする
$stdata644 = get_option( 'st-data644', 'yes' ); // 記事スライドショー サムネイル画像の縦横比を反映しない
$stdata645 = 'yes'; // ロゴ画像にwidth heightを出力する
$stdata646 = get_option( 'st-data646', '' ); // 固定記事の投稿日もタイトル下に表示する
$stdata647 = get_option( 'st-data647', '' ); // メニューアイコンを縦にする

$stdata648 = get_option( 'st-data648', '' ); // デフォルトの埋め込みURL（ブログカード）の変換を外部リンクのみ停止
$stdata649 = get_option( 'st-data649', '' ); // letter-spacingの設定
$stdata650 = get_option( 'st-data650', 'yes' ); // 管理画面の固定記事一覧を新着順にする
$stdata651 = get_option( 'st-data651', '' ); // 「広告」を明記する（投稿・固定記事）
$stdata652 = get_option( 'st-data652', '' ); // title先頭に挿入するテキスト
$stdata653 = get_option( 'st-data653', '' ); // 関連記事を新着順にする
$stdata654 = get_option( 'st-data654', '' ); // Chromeの縮小画像に生じるぼかしを軽減する
$stdata655 = get_option( 'st-data655', 'yes' ); // Gutenbergブロックエリアのホバー時に枠線を表示する

$stdata656 = get_option( 'st-data656', 'yes' ); // 遅延読み込み: <script> を遅延読込する
$stdata657 = get_option( 'st-data657', '' ); // URLの自動ブログカード化をテキストリンクに変更する
$stdata658 = get_option( 'st-data658', '' ); // ヘッダー画像スライドショーの表示順

$stdata659 = get_option( 'st-data659', '' ); // タブブロック: 「デフォルト」スタイルのテキスト色
$stdata660 = get_option( 'st-data660', '#cccccc' ); // タブブロック: 「デフォルト」スタイルの背景色
$stdata661 = get_option( 'st-data661', '' ); // タブブロック: 「デフォルト」スタイルの枠線色
$stdata662 = get_option( 'st-data662', '' ); // タブブロック: 「デフォルト」スタイルの枠線の幅

$stdata663 = get_option( 'st-data663', '' ); // タブブロック: 「スクエア」スタイルのテキスト色
$stdata664 = get_option( 'st-data664', '#cccccc' ); // タブブロック: 「スクエア」スタイルの背景色
$stdata665 = get_option( 'st-data665', '' ); // タブブロック: 「スクエア」スタイルの枠線色
$stdata666 = get_option( 'st-data666', '' ); // タブブロック: 「スクエア」スタイルの枠線の幅

$stdata667 = get_option( 'st-data667', '' ); // タブブロック: 「ふきだし」スタイルのテキスト色
$stdata668 = get_option( 'st-data668', '#cccccc' ); // タブブロック: 「ふきだし」スタイルの背景色
$stdata669 = get_option( 'st-data669', '' ); // タブブロック: 「ふきだし」スタイルの枠線色
$stdata670 = get_option( 'st-data670', '' ); // タブブロック: 「ふきだし」スタイルの枠線の幅

$stdata671 = get_option( 'st-data671', '' ); // タブブロック: 「タブ」スタイルのテキスト色
$stdata672 = get_option( 'st-data672', '#cccccc' ); // タブブロック: 「タブ」スタイルの背景色
$stdata673 = get_option( 'st-data673', '' ); // タブブロック: 「タブ」スタイルの枠線色
$stdata674 = get_option( 'st-data674', '' ); // タブブロック: 「タブ」スタイルの枠線の幅

$stdata675 = get_option( 'st-data675', '' ); // タブブロック: 「ボーダー」スタイルのテキスト色
$stdata676 = get_option( 'st-data676', '' ); // タブブロック: 「ボーダー」スタイルの背景色
$stdata677 = get_option( 'st-data677', '#cccccc' ); // タブブロック: 「ボーダー」スタイルの枠線色
$stdata678 = get_option( 'st-data678', '' ); // タブブロック: 「ボーダー」スタイルの枠線の幅

$stdata679 = get_option( 'st-data679', '広告' ); // 「広告」表記を変更する
$stdata680 = get_option( 'st-data680', '' ); // 「広告」表記を画像にする
$stdata681 = get_option( 'st-data681', '' ); // 「広告」表記をトップページから除外する
$stdata682 = get_option( 'st-data682', '' ); // 背景に流すYouTubeID(スマホ)
$stdata683 = get_option( 'st-data683', '' ); // 動画URL（スマホ用）
$stdata684 = get_option( 'st-data684', '' ); // ヘッダーコンテンツ設定（テキストカラー）
$stdata685 = get_option( 'st-data685', 'yes' ); // カスタマイザーのデフォルトパネル（メニュー・ウィジェット・固定フロントページ）を非表示にする
$stdata686 = get_option( 'st-data686', '' ); // 「コードの出力」をログイン時は出力しない
$stdata687 = get_option( 'st-data687', '' ); // 投稿一覧のユーザーの絞り込み機能
$stdata688 = get_option( 'st-data688', '' ); // アイキャッチ画像の自動設定

////////////////////////////////////////////
// リセットした場合に再登録
///////////////////////////////////////////

// 画像スライドショーの表示速度（初期値）
$stdata32 = ( $stdata32 ) ? $stdata32 : 5000;

// 記事スライドショーの表示速度（初期値）
$stdata268 = ( $stdata268 ) ? $stdata268 : 5000;
$stdata141 = ( $stdata141 ) ? $stdata141 : 'HOME';

// マイ細マーカー
$stdata417 = ( $stdata417 ) ? $stdata417 : '#FFF9C4';
$stdata589 = ( $stdata589 ) ? $stdata589 : '#ffc4c4';

// カラーパレット
$stdata460 = ( $stdata460 ) ? $stdata460 : '';
$stdata461 = ( $stdata461 ) ? $stdata461 : '';
$stdata462 = ( $stdata462 ) ? $stdata462 : '';
$stdata463 = ( $stdata463 ) ? $stdata463 : '';

$stdata599 = ( $stdata599 ) ? $stdata599 : '5,3,1';

// スマホヘッダーの高さ
$stdata609 = ( $stdata609 && $stdata609 >= 48 ) ? $stdata609 : 100;

////////////////////////////////////////////
// 関数
///////////////////////////////////////////

if ( !function_exists( 'st_speed_set' ) ){
	/**
	 * 読み込みを停止して表示速度を優先する
	 */
	function st_speed_set() {
		if( isset($GLOBALS['stdata434']) && $GLOBALS['stdata434'] === 'yes' ){
			return 'yes';
		}elseif( isset($GLOBALS['stdata434']) && $GLOBALS['stdata434'] === 'no' ){
			return 'no';
		}
	};
}

if ( !function_exists( 'st_speed_on' ) ){
	/**
	 * 読み込みを停止して表示速度を優先する
	 */
	function st_speed_on() {
		$st_speed_set = st_speed_set();
		if( isset($st_speed_set) && $st_speed_set === 'yes' ){
			return true;
		}
	};
}

if ( !function_exists( 'st_speed_off' ) ){
	/**
	 * 読み込みを停止して表示速度を優先する
	 */
	function st_speed_off() {
		$st_speed_set = st_speed_set();
		if( isset($st_speed_set) && $st_speed_set === 'no' ){
			return true;
		}
	};
}

if ( !function_exists( 'st_admin_get_menu_slug' ) ) {
	/**
	 * メニュースラッグを取得
	 *
	 * @return string メニュースラッグ
	 */
	function st_admin_get_menu_slug() {
		return 'my-custom-admin';
	}
}

if ( !function_exists( 'st_admin_get_reset_menu_slug' ) ) {
	/**
	 * メニュースラッグ (リセット) を取得
	 *
	 * @return string メニュースラッグ
	 */
	function st_admin_get_reset_menu_slug() {
		return 'my-submenu';
	}
}

if ( !function_exists( 'st_admin_is_admin_screen' ) ) {
	/**
	 * 現在の画面が管理画面かどうかを取得
	 *
	 * @return bool 管理画面の場合は true
	 */
	function st_admin_is_admin_screen() {
		global $pagenow;

		if ( ! is_admin() ) {
			return false;
		}

		$menu_slug = st_admin_get_menu_slug();

		if ( function_exists( 'get_current_screen' ) ) {
			$screen          = get_current_screen();
			$admin_screen_id = 'toplevel_page_' . $menu_slug;

			if ( $screen && $screen->id === $admin_screen_id ) {
				return true;
			}
		}

		return ($pagenow === 'admin.php' && isset( $_GET['page'] ) && $_GET['page'] === $menu_slug);
	}
}

if ( ! function_exists( '_st_admin_get_widget_state_option' ) ) {
	/**
	 * 無効化するウィジェットの設定値を取得する
	 *
	 * @return array<string, bool>
	 */
	function _st_admin_get_widget_state_option() {
		// 無効化するウィジェット
		return filter_var(
			get_option( 'st-data464' ),
			FILTER_DEFAULT,
			FILTER_REQUIRE_ARRAY
		) ?: array();
	}
}

if ( ! function_exists( 'st_admin_get_widget_settings' ) ) {
	/**
	 * ウィジェットの設定 (有効/無効) を取得する
	 *
	 * @return array<string, array<string, mixed>>
	 */
	function st_admin_get_widget_settings() {
		global $wp_widget_factory;

		if ( ! $wp_widget_factory ) {
			return array();
		}

		$option   = _st_admin_get_widget_state_option();
		$settings = array();

		foreach ( $wp_widget_factory->widgets as $class => $widget ) {
			$disabled = isset( $option[ $class ] ) ? (bool) $option[ $class ] : false;

			$settings[ $class ] = array(
				'widget'   => $widget,
				'disabled' => $disabled,
			);
		}

		/** @see wp_list_widgets() */
		uasort(
			$settings,
			function ( $a, $b ) {
				return strnatcasecmp( $a['widget']->name, $b['widget']->name );
			}
		);

		return $settings;
	}
}

if ( ! function_exists( '_st_admin_widget_state_post_to_option' ) ) {
	/**
	 * 無効化するウィジェットの POST 値を設定値へ変換する
	 *
	 * @return array<string, bool>
	 */
	function _st_admin_widget_state_post_to_option() {
		$input = filter_input( INPUT_POST, 'st-data464', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY ) ?: array();
		$input = array_map( 'boolval', $input );

		$option = _st_admin_get_widget_state_option();

		return array_merge( $option, $input );
	}
}

////////////////////////////////////////////
// 管理画面
///////////////////////////////////////////

add_action( 'load-toplevel_page_' . st_admin_get_menu_slug(),
	function () {
		add_filter( 'screen_options_show_screen', '__return_false' );
	} );

if ( ! function_exists( 'st_admin_kanri_enqueue_scripts' ) ) {
	/** スクリプトを登録 */
	function st_admin_kanri_enqueue_scripts($hook_suffix) {
		if ( ! st_admin_is_admin_screen() ) {
			return;
		}

		// カラーピッカー
		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_script(
			'st-color-picker',
			get_template_directory_uri() . '/js/st-color-picker.js',
			array( 'wp-color-picker' ),
			false,
			false
		);

		// Tabs
		wp_enqueue_script( 'jquery-ui-tabs' );
		wp_enqueue_script(
			'st-admin-tabs',
			get_template_directory_uri() . '/js/st-admin-tabs.js',
			array( 'jquery-ui-tabs' )
		);
	}
}

add_action( 'admin_enqueue_scripts', 'st_admin_kanri_enqueue_scripts' );

if ( ! function_exists( 'st_admin_add_menu_pages' ) ) {
	/** メニューを追加 */
	function st_admin_add_menu_pages() {
		add_menu_page( __( 'AFFINGER 管理', 'affinger' ),
			__( 'AFFINGER 管理', 'affinger' ),
			'manage_options',
			st_admin_get_menu_slug(),
			'st_admin_display_settings_page'
		);

		add_submenu_page(
			st_admin_get_menu_slug(),
			__( 'リセット', 'affinger' ),
			__( 'リセット', 'affinger' ),
			'manage_options',
			st_admin_get_reset_menu_slug(),
			'st_admin_display_reset_page'
		);
	}
}

add_action( 'admin_menu', 'st_admin_add_menu_pages' );

if ( ! function_exists( 'st_admin_display_submit_meta_box' ) ) {
	/**
	 * 保存メタボックスを表示
	 *
	 * @param WP_Post|null $post
	 * @param mixed[] $args
	 */
	function st_admin_display_submit_meta_box( $post, $args ) {
		?>

		<div class="submitbox" id="submitpost">
			<div id="major-publishing-actions">
				<div id="minor-publishing"></div>
				<div id="publishing-action">
					<input type="submit" value="<?php echo esc_attr( __( 'Save', 'affinger' ) ); ?>"
						   class="button button-primary button-large">
				</div>
				<div class="clear"></div>
			</div>
		</div>

		<?php
	}
}

if ( ! function_exists( 'st_admin_add_meta_boxes' ) ) {
	/** メタボックスを追加 */
	function st_admin_add_meta_boxes() {
		add_meta_box(
			'submitdiv',
			'保存',
			'st_admin_display_submit_meta_box',
			'toplevel_page_' . st_admin_get_menu_slug(),
			'side'
		);
	}
}

add_action( 'admin_init', 'st_admin_add_meta_boxes' );

if ( ! function_exists( 'st_admin_display_reset_page' ) ) {
	/** リセット画面 */
	function st_admin_display_reset_page() {
		?>

		<div class="wrap">
			<h2>リセット画面</h2>
			<form id="my-main-form" method="post" action="">
				<?php wp_nonce_field( 'my-nonce-key', st_admin_get_menu_slug() ); ?>
				<p style="color:#f44336">※「AFFINGER 管理」及び「Gutenberg 設定」に不具合が生じた場合、こちらから初期値にリセットできます。</p>

				<p>
					<input type="hidden" name="st-data-reset" value="no">
					<input type="checkbox" name="st-data-reset" value="yes"
						   onclick="window.alert('※チェックを入れて保存すると「Gutenberg 設定」及び「AFFINGER 管理」のアナリティクスコードなど全てがリセットされます');">
					全てリセットする</p>

				<p>
					<input type="submit" value="<?php echo esc_attr( __( 'Save',
						'affinger' ) ); ?>" class="button button-primary button-large">
				</p>
			</form>
		</div>

		<?php
	}
}

// 基本管理画面

if ( ! function_exists( 'st_admin_display_settings_page' ) ) {
	/** 管理画面 */
	function st_admin_display_settings_page() {
		global $hook_suffix;
		?>

     <div class="wrap">
          <h2 style="margin-bottom:0px"></h2>
			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="st-child-guide"></div>

					<form id="my-main-form" method="post" action="" data-st-tabs-form>
						<?php wp_nonce_field( 'my-nonce-key', st_admin_get_menu_slug() ); ?>

						<div id="post-body-content">
							<div id="st-tabs" class="st-tabs" data-st-tabs>
								<ul class="st-tabs-nav">
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#news-m"><i class="st-fa st-svg-bigginer_l" aria-hidden="true"></i><span class="st-tabs-nav-item-label">はじめに</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#custom"><i class="st-fa st-svg-file-text-o"></i><span class="st-tabs-nav-item-label">管理メモ</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#layout-m"><i class="st-fa st-svg-palette"></i><span class="st-tabs-nav-item-label">全体設定</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#header-menu"><i class="st-fa st-svg-bars"></i><span class="st-tabs-nav-item-label">メニュー</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#header-m"><i class="st-fa st-svg-header"></i><span class="st-tabs-nav-item-label">ヘッダー</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#recommend-m"><i class="st-fa st-svg-h-under"></i><span class="st-tabs-nav-item-label">ヘッダー下 / おすすめ</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#top-m"><i class="st-fa st-svg-home"></i><span class="st-tabs-nav-item-label">トップページ</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#toukou-m"><i class="st-fa st-svg-pencil-square-o"></i><span class="st-tabs-nav-item-label">投稿・固定記事</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#sns-m"><i class="st-fa st-svg-share-alt"></i><span class="st-tabs-nav-item-label">SNS / OGP</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#seo-m"><i class="st-fa st-svg-line-chart"></i><span class="st-tabs-nav-item-label">SEO</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#google-m"><i class="st-fa st-svg-google"></i><span class="st-tabs-nav-item-label">Google・広告 / AMP</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#kaiwa"><i class="st-fa st-svg-comment"></i><span class="st-tabs-nav-item-label">会話アイコン</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#sonota"><i class="st-fa st-svg-plus-circle"></i><span class="st-tabs-nav-item-label">その他</span></a></li>
									<li class="st-tabs-nav-item" data-st-tabs-nav-item><a href="#plugins"><i class="st-fa st-svg-plug" aria-hidden="true"></i><span class="st-tabs-nav-item-label">機能を強化する</span></a></li>
								</ul>

								<div class="st-tabs-contents" data-st-tabs-contents>
									<?php _st_admin_display_news_section(); ?>
									<?php _st_admin_display_general_section(); ?>
									<?php _st_admin_display_home_section(); ?>
									<?php _st_admin_display_post_section(); ?>
									<?php _st_admin_display_header_section(); ?>
									<?php _st_admin_display_menu_section(); ?>
									<?php _st_admin_display_recommended_posts_section(); ?>
									<?php _st_admin_display_sns_section(); ?>
									<?php _st_admin_display_seo_section(); ?>
									<?php _st_admin_display_google_section(); ?>
									<?php _st_admin_display_icon_section(); ?>
									<?php _st_admin_display_others_section(); ?>
									<?php _st_admin_display_cpt_section(); ?>
									<?php _st_admin_display_plugins_section(); ?>
								</div>
							</div>
						</div>

						<div id="postbox-container-1" class="postbox-container">
							<?php do_meta_boxes( $hook_suffix, 'side', null ); ?>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_display_news_section' ) ) {
	/** サイト全体 */
    function _st_admin_display_news_section() {
	?>

		<div id="news-m" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-bigginer_l"></i>はじめに（必ずお読みください）</h3>

			<?php if ( trim($GLOBALS["stdata265"]) !== '' && ( isset( $GLOBALS["stdata401"] ) && $GLOBALS["stdata401"] === 'yes' ) ): ?>
				<div style="padding:0px;text-align:center;"><p style="color:#f44336;"><i class="st-fa st-svg-cog st-svg-spin" aria-hidden="true"></i>自動更新通知が有効化されています。処理速度が低下している場合は「更新通知パスワード」を削除して下さい</p></div>
			<?php endif; ?>

			<div style="border:solid 1px #ccc;padding:10px;text-align:center;">
				<?php $my_theme = wp_get_theme(get_template()); ?>
				<p style="font-size:105%;color:#4c4c4c;"><b>WordPressテーマは「<?php echo $my_theme->Name . "6」バージョンは " . $my_theme->Version; ?> です</b></p>
				

				<?php if ( ! _st_plugin_support_is_enabled( 'ST_BLOCKS', 'st-blocks' ) ): ?>
					<div style="padding:0px;text-align:center;"><p style="color:#555;"><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>「<a href="//affinger.com/action-manual/gutenberg-info/">AFFINGERブロックプラグイン</a>」が有効化されていません（閲覧パスワード: actionuser）</p></div>
				<?php else: ?>
					<p>※Gutenbergの設定は<a href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/admin.php?page=st-gutenberg-settings">コチラ</a></p>
				<?php endif; ?>
				<div class="st-mybox st-mybox-class" style="background:#f3f3f3;border-color:#f3f3f3;border-width:0px;border-radius:5px;margin: 25px 0 25px 0;">
					<div class="st-in-mybox">
						<p>最初にまず <input type="submit" value="<?php echo esc_attr( __( 'Save','affinger' ) ); ?>" class="button button-primary button-large"> を1回クリックして下さい（初期値が設定されます）。</p>
						<p class=" st-mybtn st-btn-default" style="background:#7CB342;border-color:#689F38;border-width:1px;border-radius:5px;font-size:120%;font-weight:bold;color:#fff;box-shadow:0 3px 0 #689F38;max-width:400px;"><a style="font-weight:bold;color:#fff;" href="//affinger.com/action-manual/" rel="nofollow noopener" target="_blank"><i class="st-fa st-svg-bigginer_l st-css-no" aria-hidden="true"></i>公式マニュアル<i class="st-fa st-svg-after st-svg-angle-right st-css-no" aria-hidden="true"></i></a></p>
						<p>閲覧パスワードは「actionuser」です</p>
					</div>
				</div>
				<p class="komozi"><span class="aka"><i class="st-fa st-svg-exclamation-triangle" aria-hidden="true"></i></span>当商品は公式サイト「<a href="//on-store.net" target="_blank" rel="nofollow noopener">STINGER STORE</a>（正規のインフォトップ経由含む）」にて購入・登録されたご本人のみご利用頂けます。</p>
			</div>

			<div class="kanri-guide">
				<p>ここではテーマをはじめて設定して頂いたときの<span class="ymarker-s">注意事項</span>などを説明致します。（詳細は公式マニュアルをご確認下さい）</p>
				<h4><i class="st-fa st-svg-book" aria-hidden="true"></i>基本事項</h4>
                <p>テーマは大きく分けて<b>「テーマ管理」「カスタマイザー」「ウィジェット」</b>の3つでサイトをデザイン、管理します。</p>
                <h5>1- テーマ管理</h5>
                <p>テーマにより「AFFINGER 管理」「STINGER 管理」とメニューに表示されます。</p>
                <p>基本的なデザインパターン、カラムやサイドバーの位置変更、各項目の設定、表示と非表示の切り替えなどをここで行います。</p>
                <h5>2- カスタマイザー</h5>
			<p>「外観」＞「カスタマイズ」にて使用できます。WordPress独自の機能にオリジナルの機能を追加しております。<b>各カラーの設定、ロゴ、ヘッダー画像、背景画像やヘッダー・メニュー・フッターのワイド化の有無</b>なども指定できます。</p>
				<h5>3- ウィジェット</h5>
			<p>トップページやサイドバー、投稿の上下などに任意のコンテンツを一括で表示できます。<span class="ymarker-s">Googleアドセンス広告の挿入</span>なども行えます（※種類によってはテーマ管理を使用します）。</p>
				<h5>※- ランキング管理（AFFINGER版のみ）</h5>
                <p>ランキングデザインの設定を行います。ランキング用ボタンのカラー設定もここで行えます。</p>
                <h4><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>はじめに行うこと</h4>
				<p>ここではWordPressの初期設定以外のテーマ独自の最初の設定を説明致します。（もしこの時点で子テーマを使用されていない場合は子テーマも併用頂くと今後の管理が楽になるかと思います）</p>
			<h5>1- <span class="hutoaka">パーマリンクの更新</span></h5>
			<p>テーマを有効化したら、まず<b>「設定」＞「パーマリンク設定」で更新（変更を保存をクリック）</b>を行って下さい。これは主に<b>AMP用のURLを生成</b>するためのものでアップデート毎に必要です</p>
                <h5>2- デザインパターンの選択</h5>
                <p>「テーマ管理」＞「デザイン」にてカラーパターン及びデザインパターンを選択して「SAVE」を押して下さい。変更の必要が無くても初期登録のために念のため、一度「SAVE」をクリックして下さい</p>
                <p>※テーマ管理の「SAVE」ボタンはどれを押しても構いません</p>
                <h5>3- メニューの作成</h5>
			<p>各メニューは「外観」＞「メニュー」にて事前に登録することで<b>正常に表示</b>されます。</p>
                <h5>4- ヘッダー画像の変更</h5>
                <p>初期に登録されているヘッダー画像は「外観」＞「カスタマイズ」＞「ヘッダー画像」で変更や削除が可能です。メニューの上下のパディング（空白）は同じくカスタマイザーの「メニューのカラー設定」内にある「<span>メニューの上下に隙間を作る」で変更できます。</span></p>
                <h5>5- WordPress自動更新設定の確認</h5>
                <p>テーマではデフォルトで「WordPress自動更新設定」をオフにしてあります。「テーマ管理」＞「その他」の最下部、「WordPressの自動更新を有効化する」の状態をご確認下さい。（動作検証済みWordPressバージョン以降のアップデートは不具合を引き起こす可能性がございます※100%更新停止を保証するものではありません）</p>
                <p>以上で、最初の設定は終了です。</p>
				<p>その他のカスタマイズはマニュアルサイトをご参考下さい</p>
                <h4><i class="st-fa st-svg-question-circle" aria-hidden="true"></i>上手く動かないときは？</h4>
				<p>正常に動作しない場合の、よくある原因を紹介致します</p>
                <h5>バージョンは適切か？</h5>
                <ul>
<li>販売及びダウンロードページを確認して下さい</li>
                </ul>
                <p>※表示以下又は以上のバージョンでは不具合が出る可能性もございます</p>
                <h5>キャッシュが原因である</h5>
			<p>お問合せで<span class="ymarker-s">一番多い原因がキャッシュ</span>によるものです。キャッシュはブラウザ上に残る古い情報で、更新だけでは削除できない場合がございます。削除方法はマニュアルに参照リンクを記載しておりますのでご参考下さい。</p>
                <h5>プラグインが干渉している</h5>
                <p>全てのプラグインを停止（キャッシュ系プラグイン利用時はキャッシュ削除）しても症状がでるかご確認下さい。干渉するプラグインは併用頂かないようお願いしております。</p>
				 <h5>カスタマイザーの色が反映されない</h5>
				<p>プレビューなどにカラーが正常に反映されない場合は、「ブラウザの更新」「キャッシュの削除」「他の値を一度選んで保存後に再度、選択する」をお試しください</p>
				<p><a href="//affinger.com/action-manual/wordpress-error-check/" target="_blank" rel="nofollow noopener">その他のチェック事項はコチラ</a></p>
            <h4>リンク集</h4>
            サイト制作に便利なリンク集です
            <h5><i class="dashicons dashicons-art"></i>カラー</h5>
			<ul>
				<li>Material Design Colors（マテリアルカラーのパレット）：<a href="//www.materialui.co/colors" rel="nofollow noopener" target="_blank">materialui.co</a></li>
				<li>ColorHexa（カラースキーム）：<a href="//www.colorhexa.com" rel="nofollow noopener" target="_blank">colorhexa.com</a></li>
				<li>uigradients（グラデーション）：<a href="//uigradients.com/" rel="nofollow noopener" target="_blank">uigradients.com</a></li>
            </ul>
            <h5><i class="dashicons dashicons-format-image"></i>素材・アイコン</h5>
            <ul>
                <li>fontawesome（Webフォント）：<a href="//fontawesome.com/" rel="nofollow noopener" target="_blank">fontawesome.com</a></li>
                <li>toptal（背景素材）：<a href="//www.toptal.com/designers/subtlepatterns/thumbnail-view/" rel="nofollow noopener" target="_blank">toptal.com</a></li>
                <li>flaticon（アイコン）：<a href="//www.flaticon.com" rel="nofollow noopener" target="_blank">flaticon.com</a></li>
                <li>FLAT ICON DESIGN（アイコン）：<a href="//flat-icon-design.com/" rel="nofollow noopener" target="_blank">flat-icon-design.com</a></li>
                <li>icomoon-mono（アイコン）：<a href="//icooon-mono.com/" rel="nofollow noopener" target="_blank">icooon-mono.com</a></li>
                <li>Pixtabay（写真）：<a href="//pixabay.com/ja/" rel="nofollow noopener" target="_blank">pixabay.com</a></li>
            </ul>
            <h5><i class="dashicons dashicons-wordpress"></i>WordPress</h5>
            <ul>
                <li>Codex（日本語版）：<a href="//wpdocs.osdn.jp/Main_Page" rel="nofollow noopener" target="_blank">wpdocs.osdn.jp</a></li>
            </ul>
		</div><!-- /kanri-guide -->

	</div><!-- /news-m -->

		<?php
	}
}

// 実験的機能（販売には非表示）
if ( ! function_exists( 'st_is_experimental_mode_enabled' ) ) {
	function st_is_experimental_mode_enabled() {
		return ( defined( 'ST_EXPERIMENTAL_MODE' ) && ST_EXPERIMENTAL_MODE );
	}
}
if ( ! st_is_experimental_mode_enabled() ) {
	$stdata331 = '';
	$stdata584 = '';
	$stdata587 = '';
}

// セールスコメント
function sale_comment_ex() {
	if( ! st_is_ver_ex() ){
		echo '<p><a href="//on-store.net/affinger5exupgrade201805/" rel="nofollow noopener" target="_blank">EX版では「サムネイル画像を表示」できます</a></p>';
	}
}

function sale_comment_lazy_load() {
	echo '<p class="komozi">* フルサイズはオリジナル画像サイズを読み込むため、表示速度に影響が出る場合がございます。<a href="//on-store.net/st_lazy_load/" rel="nofollow noopener" target="_blank">遅延読込プラグイン</a>などの併用もご検討ください</p>';
}

function sale_comment_kaiwa() {
	echo '<p><a href="//on-store.net/kaiwahukidasi/" rel="nofollow noopener" target="_blank"><i class="st-fa st-svg-plus-circle" aria-hidden="true"></i>「会話風アイコン」を増やすプラグイン</a></p>';
}

function sale_comment_update() {
	echo '<p>テーマにアップデートがあった場合に通知及び更新機能を有効化します。下記注意事項をご確認の上、「<a href="//on-store.net/user_page/" target="_blank" rel="nofollow noopener">購入ユーザー限定ページ</a>」記載の更新通知パスワードを入力してご利用下さい。</p>';
}

// テーマ統一管理設定
if ( locate_template( 'st-kanri-core.php' ) !== '' ) {
	require_once locate_template( 'st-kanri-core.php' );
}

// Gutenberg 設定
if ( locate_template( 'st-kanri-gutenberg.php' ) !== '' ) {
	require_once locate_template( 'st-kanri-gutenberg.php' );
}

if ( ! function_exists( '_st_admin_display_cpt_section' ) ) {
	/** 掲示板 */
	function _st_admin_display_cpt_section() {
		?>

		<div id="custom" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-file-text-o"></i>管理メモ</h3>
			<p>自分用のメモとしてご利用下さい</p>

			<p>
				<?php st_kanri_wysiwyg_editor( "author_kanri_memo", "st-data507" ); ?>
			</p>
			<p><i class="st-svg st-svg-info-circle"></i> サービスに関する最新情報はダッシュボード「STINGER STOREからのお知らせ」をご確認下さい</p>

			<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>

			<hr/>
			<p>
				<input type="submit" value="<?php echo esc_attr( __( 'Save',
					'affinger' ) ); ?>" class="button button-primary button-large">
			</p>
		</div>

		<?php
	}
}

if ( ! function_exists( '_st_admin_display_plugins_section' ) ) {
	/** plugins */
	function _st_admin_display_plugins_section() {
		?>

		<div id="plugins" class="st-tabs-content">
			<h3 class="h3tai"><i class="st-fa st-svg-diamond"></i>特別テーマ</h3>
			<p>サイトをより戦略的に運営したり、記事作成を効率化するAFFINGERだけの専用プラグインを多数開発しています。</p>

			<h4>EXアップグレード</h4>
			<p>AFFINGER6EXはAFFINGER6購入ユーザーのみがアップデートできる<span class="ymarker-s">特別機能を付けた特別版</span>となります</p>
			<p>カードデザインや無限ループ風の読み込み、カウントダウンなど魅力的で強力な機能が満載です。</p>
			<p><a href="//on-store.net/affinger5exupgrade201805/" target="_blank" rel="nofollow noopener">販売ページ</a></p>

			<h4>広告が溶け込む魔法の子テーマ「JET2」</h4>
			<p>JETはGoogleのインフィード広告が<strong>自然に溶け込むようにレイアウトしたマガジン型子テーマ</strong>です。</p>
			<p>トップページやカテゴリー記事一覧、関連記事などがマガジンスタイルで表示されます。</p>
			<p><a href="//on-store.net/jet-wing/" target="_blank" rel="nofollow noopener">販売ページ</a></p>

			<h3 class="h3tai"><i class="st-fa st-svg-plug"></i>専用プラグイン</h3>

			<h4>AFFINGERタグ管理マネージャー</h4>
			<p>プラグインで作成したリンクが「いつ」「どのページで」「何回」クリックされたか？を把握できます。また、表示回数も取得するのでCTR計測も可能です。</p>
			<p>使用することで<span class="ymarker-s">「より効果の高いリンク（広告）」「効果のないリンク（広告）」</span>などを把握するのに役立ちます。</p>
			<p><a href="//on-store.net/affiliaterun/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>PVモニター2</h4>
			<p>シンプルでパワフルな<span class="ymarker-s">アクセス解析</span>プラグインです。サイト全体だけでなく記事ごとのアクセスやアクセス元、人気記事のランキングなども表示できます。</p>
			<p class="komozi">※AFFINGERタグ管理マネージャーが必要です。</p>
			<p><a href="//on-store.net/af_pvmonitor/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>ABテストプラグイン</h4>
			<p>STINGERタグ管理プラグイン又AFFINGERタグ管理マネージャーで作成したテンプレートを<strong>自動でランダム表示するABテストプラグイン</strong>です。</p>
			<p>登録は複数可能で各コード（広告など）の表示優先度（%）も指定できます。AFFINGERタグ管理マネージャーと併用した場合はCTRも計測できるので<span class="ymarker-s">効果の高い広告や文章が簡易にチェック</span>できます。</p>
			<p><a href="//on-store.net/affinger-abtest/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>会話ふきだし[PRO]</h4>
			<p><strong>会話ふきだしデザインを複数作成</strong>できるようにするプラグインです。</p>
			<p><a href="//on-store.net/kaiwahukidasi/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>SUGOI MOKUJI（すごいもくじ）[PRO]</h4>
			<p>細かなカスタマイズや<strong><span class="huto">クリック数を確認できる</span>目次プラグイン</strong>です。</p>
			<p>目次に設定したくない見出しの除外や、投稿ごとに目次に設定したいhタグを指定したり、目次の表示状態を設定できます。</p>
			<p><span class="ymarker-s">効果のある見出しやコンテンツを探し出す</span>のに役立ちます。</p>
			<p><a href="//on-store.net/sugoimokuji/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>Affinger LazyLoad（画像・iframe遅延読み込み）</h4>
			<p><strong>SEOも考慮した遅延読み込みプラグイン</strong>です。</p>
			<p>通常のLazyLoadでは画像がスクロールされるまで表示されないため、Googleのロボットには「画像が無い」と判断されています。このプラグインでは&lt;noscript&gt;を付与することで遅延読込を行いつつ、画像の有無も認識させることができます。</p>
			<p>また、iframeにも対応しているため多数のYouTube動画を貼り付けている記事などにも効果的です。</p>
			<p><a href="//on-store.net/st_lazy_load/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>ブログカード外部URL対応プラグイン</h4>
			<p>URLを指定するだけで<span class="huto">外部サイトのリンクもブログカード風</span>にします。</p>
			<p>外部のサイトも自動スクリーンショットによりサムネイル表示が可能です。</p>
			<p><a href="//on-store.net/st_card_url/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>データ引継ぎプラグイン</h4>
			<p>この管理画面の設定をエクスポートして他サイトでも使用できます</p>
			<p><a href="//on-store.net/data_export/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>カスタム検索プラグイン</h4>
			<p>「カスタム検索プラグイン」や通常のテキスト検索に加えて「カテゴリー」「タグ」による絞込検索フォームを作成、設置できるプラグインです。</p>
			<p><a href="//on-store.net/custom_search/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>PhotoGallery（写真ギャラリー）</h4>
			<p>シンプルかつ必要な機能を備えた写真ギャラリープラグインです。ネットショップやブログのレビュー記事など幅広く活用でき、記事作成はもちろんサイトの可能性が大きく広がります。</p>
			<p><a href="//on-store.net/photogallery/" target="_blank" rel="nofollow noopener">販売ページ</a></p>
			<h4>RichAnimation（リッチアニメーション）</h4>
			<p>スクロールに応じた様々なアニメーションを追加できるプラグインです。</p>
			<p><a href="//on-store.net/richanimation/" target="_blank" rel="nofollow noopener">販売ページ</a></p>

			<p><i class="st-fa st-svg-exclamation-circle" aria-hidden="true"></i>各プラグインやテーマの内容はバージョンにより異なる場合がございます。詳細及び注意事項は必ず販売ページにてご確認下さい</p>
			<p><a href="//on-store.net/category/plugin/" target="_blank" rel="nofollow noopener">公式サイトで一覧を見る</a></p>

			<p><a href="#top"><i class="st-fa st-svg-angle-double-up" aria-hidden="true"></i>先頭に戻る</a></p>
		</div>

		<?php
	}
}

////////////////////////////////////////////
// データベース登録
///////////////////////////////////////////

// 読み込みを停止して表示速度を優先する
if ( st_speed_on() ){
	$stdata30  = '';       //画像スライドショー
	$stdata266 = '';       //ヘッダーに記事をスライドショーで表示する（※画像スライドショーより優先されます）
	$stdata398 = 'yes';    //スライドショー機能の全停止
	$stdata311 = '';       //全体のフォント デフォルト
	$stdata98  = 'normal'; //記事タイトル・見出し（h2～3）・ウィジェットタイトル など
	$stdata87  = 'yes';    //PC閲覧時にサイドバーの最下部広告エリアをスクロール追尾しない
	$stdata415 = 'yes';    //SNS設定でコピーが非表示
	$stdata438 = '';       //Googleマテリアルアイコン
	$stdata468 = '';       //「この記事タイトルとURLをコピー」ボタンの別表示
	$stdata604 = '';       // サムネイルスライドショー
	if( st_is_ver_ex() ){
		$stdata419 = 'yes';    //カウントダウンを無効化
		$stdata421 = '';       //もっと読む（無限スクロール）を使用する
		$stdata564 = '';       //レスポンシブ（ショートコード含む記事一覧）画像の画質を上げる
	}
// 表示速度を優先で制限する機能を解除する
} elseif ( st_speed_off() ){
	$stdata398 = '';          //スライドショー機能の全停止
	if( st_is_ver_ex() ){
		$stdata419 = '';    //カウントダウンを無効化
		$stdata421 = 'yes'; //もっと読む（無限スクロール）を使用する
	}
}

if ( ! function_exists( '_st_admin_handle_update' ) ) {
	/** 設定を更新 */
	function _st_admin_handle_update() {
		if ( isset( $_POST['st-data1'] ) && $_POST['st-data1'] ) {
			update_option( 'st-data1', $_POST['st-data1'] );
		} else {
			update_option( 'st-data1', '' );
		}

		if ( isset( $_POST['st-data2'] ) && $_POST['st-data2'] ) {
			update_option( 'st-data2', $_POST['st-data2'] );
		} else {
			update_option( 'st-data2', '' );
		}

		if ( isset( $_POST['st-data3'] ) && $_POST['st-data3'] ) {
			update_option( 'st-data3', $_POST['st-data3'] );
		} else {
			update_option( 'st-data3', '' );
		}

		if ( isset( $_POST['st-data4'] ) && $_POST['st-data4'] ) {
			update_option( 'st-data4', $_POST['st-data4'] );
		} else {
			update_option( 'st-data4', '' );
		}

		if ( isset( $_POST['st-data5'] ) && $_POST['st-data5'] ) {
			update_option( 'st-data5', $_POST['st-data5'] );
		} else {
			update_option( 'st-data5', '' );
		}

		if ( isset( $_POST['st-data6'] ) && $_POST['st-data6'] ) {
			update_option( 'st-data6', $_POST['st-data6'] );
		} else {
			update_option( 'st-data6', '' );
		}

		if ( isset( $_POST['st-data7'] ) && $_POST['st-data7'] ) {
			update_option( 'st-data7', $_POST['st-data7'] );
		} else {
			if ( isset( $_POST['stdata7kesi'] ) && $_POST['stdata7kesi'] === 'yes' ) {
				update_option( 'st-data7', '' );
			}
		}

		if ( isset( $_POST['st-data8'] ) && $_POST['st-data8'] ) {
			update_option( 'st-data8', $_POST['st-data8'] );
		} else {
			update_option( 'st-data8', '' );
		}

		if ( isset( $_POST['st-data9'] ) && $_POST['st-data9'] ) {
			update_option( 'st-data9', $_POST['st-data9'] );
		} else {
			update_option( 'st-data9', '' );
		}

		if ( isset( $_POST['st-data10'] ) && $_POST['st-data10'] ) {
			update_option( 'st-data10', $_POST['st-data10'] );
		} else {
			update_option( 'st-data10', '' );
		}

		if (
			isset( $_POST['st-data11'] ) && $_POST['st-data11'] &&
			$_POST['st-data77'] === '' // サイト全体のレイアウト無効時のみ
		) {
			update_option( 'st-data11', $_POST['st-data11'] );
		} else {
			update_option( 'st-data11', '' );
		}

		if ( isset( $_POST['st-data12'] ) && $_POST['st-data12'] ) {
			update_option( 'st-data12', $_POST['st-data12'] );
		} else {
			update_option( 'st-data12', '' );
		}

		if ( isset( $_POST['st-data13'] ) && $_POST['st-data13'] ) {
			update_option( 'st-data13', $_POST['st-data13'] );
		} else {
			update_option( 'st-data13', '' );
		}

		if ( isset( $_POST['st-data14'] ) && $_POST['st-data14'] ) {
			update_option( 'st-data14', $_POST['st-data14'] );
		} else {
			if ( isset( $_POST['stdata14kesi'] ) && $_POST['stdata14kesi'] === 'yes' ) {
				update_option( 'st-data14', '' );
			}
		}

		if ( isset( $_POST['st-data15'] ) && $_POST['st-data15'] ) {
			update_option( 'st-data15', $_POST['st-data15'] );
		} else {
			update_option( 'st-data15', '' );
		}

		if ( isset( $_POST['st-data16'] ) && $_POST['st-data16'] ) {
			update_option( 'st-data16', $_POST['st-data16'] );
		} else {
			update_option( 'st-data16', '' );
		}

		if ( isset( $_POST['st-data17'] ) && $_POST['st-data17'] ) {
			update_option( 'st-data17', $_POST['st-data17'] );
		} else {
			update_option( 'st-data17', '' );
		}

		if ( isset( $_POST['st-data18'] ) && $_POST['st-data18'] ) {
			update_option( 'st-data18', $_POST['st-data18'] );
		} else {
			update_option( 'st-data18', '' );
		}

		if ( isset( $_POST['st-data19'] ) && $_POST['st-data19'] ) {
			update_option( 'st-data19', $_POST['st-data19'] );
		} else {
			update_option( 'st-data19', '' );
		}

		if ( isset( $_POST['st-data20'] ) && $_POST['st-data20'] ) {
			update_option( 'st-data20', $_POST['st-data20'] );
		} else {
			update_option( 'st-data20', '' );
		}

		if ( isset( $_POST['st-data21'] ) && $_POST['st-data21'] ) {
			update_option( 'st-data21', $_POST['st-data21'] );
		} else {
			update_option( 'st-data21', '' );
		}

		if ( isset( $_POST['st-data22'] ) && $_POST['st-data22'] ) {
			update_option( 'st-data22', $_POST['st-data22'] );
		} else {
			update_option( 'st-data22', '' );
		}

		if ( isset( $_POST['st-data23'] ) && $_POST['st-data23'] ) {
			update_option( 'st-data23', $_POST['st-data23'] );
		} else {
			update_option( 'st-data23', '' );
		}

		if ( isset( $_POST['st-data24'] ) && $_POST['st-data24'] ) {
			update_option( 'st-data24', $_POST['st-data24'] );
		} else {
			update_option( 'st-data24', '' );
		}

		if ( isset( $_POST['st-data25'] ) && $_POST['st-data25'] ) {
			update_option( 'st-data25', $_POST['st-data25'] );
		} else {
			if ( isset( $_POST['stdata25kesi'] ) && $_POST['stdata25kesi'] === 'yes' ) {
				update_option( 'st-data25', '' );
			}
		}

		if ( isset( $_POST['st-data26'] ) ) {
			update_option( 'st-data26', $_POST['st-data26'] );
		}

		if ( isset( $_POST['st-data27'] ) ) {
			update_option( 'st-data27', $_POST['st-data27'] );
		}

		if ( isset( $_POST['st-data28'] ) && $_POST['st-data28'] ) {
			update_option( 'st-data28', $_POST['st-data28'] );
		} else {
			update_option( 'st-data28', '' );
		}

		if ( isset( $_POST['st-data29'] ) && $_POST['st-data29'] ) {
			update_option( 'st-data29', $_POST['st-data29'] );
		} else {
			update_option( 'st-data29', '' );
		}

		if (
			isset( $_POST['st-data30'] ) && $_POST['st-data30'] &&
			( ! isset( $_POST['st-data266'] ) || ! $_POST['st-data266'] ) // 記事スライドショーが無効化時のみ
		) {
			update_option( 'st-data30', $_POST['st-data30'] );
		} else {
			update_option( 'st-data30', '' );
		}

		if ( isset( $_POST['st-data31'] ) && $_POST['st-data31'] ) {
			$slides_type = in_array( $_POST['st-data31'],
				array( 'fade', 'rtl', 'ltr' ),
				true ) ? $_POST['st-data31'] : 'fade';
			update_option( 'st-data31', $slides_type );
		} else {
			update_option( 'st-data31', 'fade' );
		}

		if ( isset( $_POST['st-data32'] ) && $_POST['st-data32'] ) {
			update_option( 'st-data32', (int) $_POST['st-data32'] );
		} else {
			update_option( 'st-data32', 5000 );
		}

		if ( isset( $_POST['st-data33'] ) && $_POST['st-data33'] ) {
			update_option( 'st-data33', $_POST['st-data33'] );
		} else {
			update_option( 'st-data33', '' );
		}

		if ( isset( $_POST['st-data34'] ) && $_POST['st-data34'] ) {
			update_option( 'st-data34', $_POST['st-data34'] );
		} else {
			update_option( 'st-data34', '' );
		}

		if ( isset( $_POST['st-data35'] ) && $_POST['st-data35'] ) {
			update_option( 'st-data35', $_POST['st-data35'] );
		} else {
			update_option( 'st-data35', '' );
		}

		if ( isset( $_POST['st-data36'] ) && $_POST['st-data36'] ) {
			update_option( 'st-data36', $_POST['st-data36'] );
		} else {
			update_option( 'st-data36', '' );
		}

		if ( isset( $_POST['st-data37'] ) && $_POST['st-data37'] ) {
			update_option( 'st-data37', $_POST['st-data37'] );
		} else {
			update_option( 'st-data37', '' );
		}

		if ( isset( $_POST['st-data38'] ) && $_POST['st-data38'] ) {
			update_option( 'st-data38', $_POST['st-data38'] );
		} else {
			update_option( 'st-data38', '' );
		}

		if ( isset( $_POST['st-data39'] ) && $_POST['st-data39'] ) {
			update_option( 'st-data39', $_POST['st-data39'] );
		} else {
			update_option( 'st-data39', '' );
		}

		if ( isset( $_POST['st-data40'] ) && $_POST['st-data40'] ) {
			update_option( 'st-data40', $_POST['st-data40'] );
		} else {
			update_option( 'st-data40', '' );
		}

		if ( isset( $_POST['st-data41'] ) && $_POST['st-data41'] ) {
			update_option( 'st-data41', $_POST['st-data41'] );
		} else {
			update_option( 'st-data41', '' );
		}

		if ( isset( $_POST['st-data42'] ) && $_POST['st-data42'] ) {
			update_option( 'st-data42', $_POST['st-data42'] );
		} else {
			update_option( 'st-data42', '' );
		}

		if ( isset( $_POST['st-data43'] ) && $_POST['st-data43'] ) {
			update_option( 'st-data43', $_POST['st-data43'] );
		} else {
			update_option( 'st-data43', '' );
		}

		if ( isset( $_POST['st-data44'] ) && $_POST['st-data44'] ) {
			update_option( 'st-data44', $_POST['st-data44'] );
		} else {
			update_option( 'st-data44', '' );
		}

		if ( isset( $_POST['st-data45'] ) && $_POST['st-data45'] ) {
			update_option( 'st-data45', $_POST['st-data45'] );
		} else {
			update_option( 'st-data45', '' );
		}

		if ( isset( $_POST['st-data46'] ) && $_POST['st-data46'] ) {
			update_option( 'st-data46', $_POST['st-data46'] );
		} else {
			update_option( 'st-data46', '' );
		}

		if ( isset( $_POST['st-data47'] ) && $_POST['st-data47'] ) {
			update_option( 'st-data47', $_POST['st-data47'] );
		} else {
			update_option( 'st-data47', '' );
		}

		if ( isset( $_POST['st-data48'] ) && $_POST['st-data48'] ) {
			update_option( 'st-data48', $_POST['st-data48'] );
		} else {
			update_option( 'st-data48', '' );
		}

		if ( isset( $_POST['st-data49'] ) && $_POST['st-data49'] ) {
			update_option( 'st-data49', $_POST['st-data49'] );
		} else {
			update_option( 'st-data49', '' );
		}

		if ( isset( $_POST['st-data50'] ) && $_POST['st-data50'] ) {
			update_option( 'st-data50', $_POST['st-data50'] );
		} else {
			update_option( 'st-data50', '' );
		}

		if ( isset( $_POST['st-data51'] ) && $_POST['st-data51'] ) {
			update_option( 'st-data51', $_POST['st-data51'] );
		} else {
			if ( isset( $_POST['stdata51kesi'] ) && $_POST['stdata51kesi'] === 'yes' ) {
				update_option( 'st-data51', '' );
			}
		}

		if ( isset( $_POST['st-data52'] ) && $_POST['st-data52'] ) {
			update_option( 'st-data52', $_POST['st-data52'] );
		} else {
			update_option( 'st-data52', '' );
		}

		if ( isset( $_POST['st-data53'] ) && $_POST['st-data53'] ) {
			update_option( 'st-data53', $_POST['st-data53'] );
		} else {
			update_option( 'st-data53', '' );
		}

		if ( isset( $_POST['st-data54'] ) && $_POST['st-data54'] ) {
			update_option( 'st-data54', $_POST['st-data54'] );
		} else {
			update_option( 'st-data54', '' );
		}

		if ( isset( $_POST['st-data55'] ) && $_POST['st-data55'] ) {
			update_option( 'st-data55', $_POST['st-data55'] );
		} else {
			update_option( 'st-data55', '' );
		}

		if ( isset( $_POST['st-data56'] ) && $_POST['st-data56'] ) {
			update_option( 'st-data56', $_POST['st-data56'] );
		} else {
			update_option( 'st-data56', '' );
		}

		if ( isset( $_POST['st-data57'] ) && $_POST['st-data57'] ) {
			update_option( 'st-data57', $_POST['st-data57'] );
		} else {
			update_option( 'st-data57', '' );
		}

		if ( isset( $_POST['st-data58'] ) && $_POST['st-data58'] ) {
			update_option( 'st-data58', $_POST['st-data58'] );
		} else {
			update_option( 'st-data58', '' );
		}

		if ( isset( $_POST['st-data59'] ) && $_POST['st-data59'] ) {
			update_option( 'st-data59', $_POST['st-data59'] );
		} else {
			update_option( 'st-data59', '' );
		}

		if ( isset( $_POST['st-data60'] ) && $_POST['st-data60'] ) {
			update_option( 'st-data60', $_POST['st-data60'] );
		} else {
			update_option( 'st-data60', '' );
		}

		if ( isset( $_POST['st-data61'] ) && $_POST['st-data61'] ) {
			update_option( 'st-data61', $_POST['st-data61'] );
		} else {
			update_option( 'st-data61', '' );
		}

		if ( isset( $_POST['st-data62'] ) && $_POST['st-data62'] ) {
			update_option( 'st-data62', $_POST['st-data62'] );
		} else {
			update_option( 'st-data62', '' );
		}

		if ( isset( $_POST['st-data63'] ) && $_POST['st-data63'] ) {
			update_option( 'st-data63', $_POST['st-data63'] );
		} else {
			update_option( 'st-data63', '' );
		}

		if ( isset( $_POST['st-data64'] ) && $_POST['st-data64'] ) {
			update_option( 'st-data64', $_POST['st-data64'] );
		} else {
			update_option( 'st-data64', '' );
		}

		if ( isset( $_POST['st-data65'] ) && $_POST['st-data65'] ) {
			update_option( 'st-data65', $_POST['st-data65'] );
		} else {
			update_option( 'st-data65', '' );
		}

		if ( isset( $_POST['st-data66'] ) && $_POST['st-data66'] ) {
			update_option( 'st-data66', $_POST['st-data66'] );
		} else {
			update_option( 'st-data66', '' );
		}

		if ( isset( $_POST['st-data67'] ) && $_POST['st-data67'] ) {
			update_option( 'st-data67', $_POST['st-data67'] );
		} else {
			update_option( 'st-data67', '' );
		}

		if ( isset( $_POST['st-data68'] ) && $_POST['st-data68'] ) {
			update_option( 'st-data68', $_POST['st-data68'] );
		} else {
			update_option( 'st-data68', '' );
		}

		if ( isset( $_POST['st-data69'] ) && $_POST['st-data69'] ) {
			update_option( 'st-data69', $_POST['st-data69'] );
		} else {
			update_option( 'st-data69', '' );
		}

		if ( isset( $_POST['st-data70'] ) && $_POST['st-data70'] ) {
			update_option( 'st-data70', $_POST['st-data70'] );
		} else {
			update_option( 'st-data70', '' );
		}

		if ( isset( $_POST['st-data71'] ) && $_POST['st-data71'] ) {
			update_option( 'st-data71', $_POST['st-data71'] );
		} else {
			update_option( 'st-data71', '' );
		}

		if ( isset( $_POST['st-data72'] ) && $_POST['st-data72'] ) {
			update_option( 'st-data72', $_POST['st-data72'] );
		} else {
			if ( isset( $_POST['stdata72kesi'] ) && $_POST['stdata72kesi'] === 'yes' ) {
				update_option( 'st-data72', '' );
			}
		}

		if ( isset( $_POST['st-data73'] ) && $_POST['st-data73'] ) {
			update_option( 'st-data73', $_POST['st-data73'] );
		} else {
			update_option( 'st-data73', '' );
		}

		if ( isset( $_POST['st-data74'] ) && $_POST['st-data74'] ) {
			update_option( 'st-data74', $_POST['st-data74'] );
		} else {
			update_option( 'st-data74', '' );
		}

		if ( isset( $_POST['st-data75'] ) && $_POST['st-data75'] ) {
			update_option( 'st-data75', $_POST['st-data75'] );
		} else {
			update_option( 'st-data75', '' );
		}

		if ( isset( $_POST['st-data76'] ) && $_POST['st-data76'] ) {
			update_option( 'st-data76', $_POST['st-data76'] );
		} else {
			update_option( 'st-data76', '' );
		}

		if ( isset( $_POST['st-data77'] ) && $_POST['st-data77'] ) {
			update_option( 'st-data77', $_POST['st-data77'] );
		} else {
			update_option( 'st-data77', '' );
		}

		if ( isset( $_POST['st-data78'] ) && $_POST['st-data78'] ) {
			update_option( 'st-data78', $_POST['st-data78'] );
		} else {
			update_option( 'st-data78', '' );
		}

		if ( isset( $_POST['st-data79'] ) && $_POST['st-data79'] ) {
			update_option( 'st-data79', $_POST['st-data79'] );
		} else {
			update_option( 'st-data79', '' );
		}

		if ( isset( $_POST['st-data80'] ) && $_POST['st-data80'] ) {
			update_option( 'st-data80', $_POST['st-data80'] );
		} else {
			update_option( 'st-data80', '' );
		}

		if ( isset( $_POST['st-data81'] ) && $_POST['st-data81'] ) {
			update_option( 'st-data81', $_POST['st-data81'] );
		} else {
			update_option( 'st-data81', '' );
		}

		if ( isset( $_POST['st-data82'] ) && $_POST['st-data82'] ) {
			update_option( 'st-data82', $_POST['st-data82'] );
		} else {
			update_option( 'st-data82', '' );
		}

		if ( isset( $_POST['st-data83'] ) && $_POST['st-data83'] ) {
			update_option( 'st-data83', $_POST['st-data83'] );
		} else {
			update_option( 'st-data83', '' );
		}

		if ( isset( $_POST['st-data84'] ) && $_POST['st-data84'] ) {
			update_option( 'st-data84', $_POST['st-data84'] );
		} else {
			update_option( 'st-data84', '' );
		}

		if ( isset( $_POST['st-data85'] ) && $_POST['st-data85'] ) {
			update_option( 'st-data85', $_POST['st-data85'] );
		} else {
			if ( isset( $_POST['stdata85kesi'] ) && $_POST['stdata85kesi'] === 'yes' ) {
				update_option( 'st-data85', '' );
			}
		}

		if ( isset( $_POST['st-data86'] ) && $_POST['st-data86'] ) {
			update_option( 'st-data86', $_POST['st-data86'] );
		} else {
			if ( isset( $_POST['stdata86kesi'] ) && $_POST['stdata86kesi'] === 'yes' ) {
				update_option( 'st-data86', '' );
			}
		}

		if ( isset( $_POST['st-data87'] ) && $_POST['st-data87'] ) {
			update_option( 'st-data87', $_POST['st-data87'] );
		} else {
			update_option( 'st-data87', '' );
		}

		if ( isset( $_POST['st-data88'] ) && $_POST['st-data88'] ) {
			update_option( 'st-data88', $_POST['st-data88'] );
		} else {
			update_option( 'st-data88', '' );
		}

		// 自由コンテンツ (トップページ)
		if ( isset( $_POST['st-data89'] ) && $_POST['st-data89'] ) {
			update_option( 'st-data89', $_POST['st-data89'] );
		} else {
			update_option( 'st-data89', '' );
		}

		// カスタマイザー用CSSを<style>で出力
		if ( isset( $_POST['st-data90'] ) && $_POST['st-data90'] ) {
			update_option( 'st-data90', $_POST['st-data90'] );
		} else {
			update_option( 'st-data90', '' );
		}

		// サムネイルサイズ変更
		if ( isset( $_POST['st-data91'] ) && $_POST['st-data91'] ) {
			update_option( 'st-data91', $_POST['st-data91'] );
		} else {
			update_option( 'st-data91', '' );
		}

		// フロント固定ページに記事一覧
		if ( isset( $_POST['st-data92'] ) && $_POST['st-data92'] ) {
			update_option( 'st-data92', $_POST['st-data92'] );
		} else {
			update_option( 'st-data92', '' );
		}

		// フロント固定ページに記事一覧件数
		if ( isset( $_POST['st-data93'] ) && $_POST['st-data93'] ) {
			update_option( 'st-data93', $_POST['st-data93'] );
		} else {
			update_option( 'st-data93', '' );
		}

		// タイトルにサイト名を追加しない
		if ( isset( $_POST['st-data94'] ) && $_POST['st-data94'] ) {
			update_option( 'st-data94', $_POST['st-data94'] );
		} else {
			update_option( 'st-data94', '' );
		}

		// WPデフォルトタイトル出力を使用
		if ( isset( $_POST['st-data95'] ) && $_POST['st-data95'] ) {
			update_option( 'st-data95', $_POST['st-data95'] );
		} else {
			update_option( 'st-data95', '' );
		}

		// TOC+にオリジナルCSS
		if ( isset( $_POST['st-data96'] ) && $_POST['st-data96'] ) {
			update_option( 'st-data96', $_POST['st-data96'] );
		} else {
			update_option( 'st-data96', '' );
		}

		// デフォルトサムネイル
		if ( isset( $_POST['st-data97'] ) ) {
			update_option( 'st-data97', $_POST['st-data97'] );
		}

		if ( isset( $_POST['st-data98'] ) && $_POST['st-data98'] ) {
			update_option( 'st-data98', $_POST['st-data98'] );
		} else {
			update_option( 'st-data98', '' );
		}

		if ( isset( $_POST['st-data99'] ) && $_POST['st-data99'] ) {
			update_option( 'st-data99', $_POST['st-data99'] );
		} else {
			update_option( 'st-data99', '' );
		}

		if ( isset( $_POST['st-data100'] ) && $_POST['st-data100'] ) {
			update_option( 'st-data100', $_POST['st-data100'] );
		} else {
			update_option( 'st-data100', '' );
		}

		if ( isset( $_POST['st-data101'] ) && $_POST['st-data101'] ) {
			update_option( 'st-data101', $_POST['st-data101'] );
		} else {
			update_option( 'st-data101', '' );
		}

		if ( isset( $_POST['st-data102'] ) && $_POST['st-data102'] ) {
			update_option( 'st-data102', $_POST['st-data102'] );
		} else {
			update_option( 'st-data102', '' );
		}

		if ( isset( $_POST['st-data103'] ) && $_POST['st-data103'] ) {
			update_option( 'st-data103', $_POST['st-data103'] );
		} else {
			update_option( 'st-data103', '' );
		}

		if ( isset( $_POST['st-data104'] ) && $_POST['st-data104'] ) {
			update_option( 'st-data104', $_POST['st-data104'] );
		} else {
			update_option( 'st-data104', '' );
		}

		if ( isset( $_POST['st-data105'] ) && $_POST['st-data105'] ) {
			update_option( 'st-data105', $_POST['st-data105'] );
		} else {
			update_option( 'st-data105', '' );
		}

		if ( isset( $_POST['st-data106'] ) && $_POST['st-data106'] ) {
			update_option( 'st-data106', $_POST['st-data106'] );
		} else {
			update_option( 'st-data106', '' );
		}

		if ( isset( $_POST['st-data107'] ) && $_POST['st-data107'] ) {
			update_option( 'st-data107', $_POST['st-data107'] );
		} else {
			update_option( 'st-data107', '' );
		}

		if ( isset( $_POST['st-data108'] ) && $_POST['st-data108'] ) {
			update_option( 'st-data108', $_POST['st-data108'] );
		} else {
			update_option( 'st-data108', '' );
		}

		if ( isset( $_POST['st-data109'] ) && $_POST['st-data109'] ) {
			update_option( 'st-data109', $_POST['st-data109'] );
		} else {
			update_option( 'st-data109', '' );
		}

		if ( isset( $_POST['st-data110'] ) && $_POST['st-data110'] ) {
			update_option( 'st-data110', $_POST['st-data110'] );
		} else {
			update_option( 'st-data110', '' );
		}

		if ( isset( $_POST['st-data111'] ) && $_POST['st-data111'] ) {
			// ヘッダー画像エリアにYouTube動画を表示するが有効時は値を空にする
			if ( isset( $_POST['st-data584'] ) && $_POST['st-data584'] ) {
				$_POST['st-data111'] = '';
			}
			update_option( 'st-data111', $_POST['st-data111'] );
		} else {
			update_option( 'st-data111', '' );
		}

		if ( isset( $_POST['st-data112'] ) && $_POST['st-data112'] ) {
			update_option( 'st-data112', $_POST['st-data112'] );
		} else {
			update_option( 'st-data112', '' );
		}

		if ( isset( $_POST['st-data113'] ) && $_POST['st-data113'] ) {
			update_option( 'st-data113', $_POST['st-data113'] );
		} else {
			update_option( 'st-data113', '' );
		}

		if ( isset( $_POST['st-data114'] ) && $_POST['st-data114'] ) {
			update_option( 'st-data114', $_POST['st-data114'] );
		} else {
			update_option( 'st-data114', '' );
		}

		if ( isset( $_POST['st-data115'] ) && $_POST['st-data115'] ) {
			update_option( 'st-data115', $_POST['st-data115'] );
		} else {
			update_option( 'st-data115', '' );
		}

		if ( isset( $_POST['st-data116'] ) && $_POST['st-data116'] ) {
			update_option( 'st-data116', $_POST['st-data116'] );
		} else {
			update_option( 'st-data116', '' );
		}

		if ( isset( $_POST['st-data117'] ) && $_POST['st-data117'] ) {
			update_option( 'st-data117', $_POST['st-data117'] );
		} else {
			update_option( 'st-data117', '' );
		}

		if ( isset( $_POST['st-data118'] ) && $_POST['st-data118'] ) {
			update_option( 'st-data118', $_POST['st-data118'] );
		} else {
			update_option( 'st-data118', '' );
		}

		if ( isset( $_POST['st-data119'] ) && $_POST['st-data119'] ) {
			update_option( 'st-data119', $_POST['st-data119'] );
		} else {
			update_option( 'st-data119', '' );
		}

		if ( isset( $_POST['st-data120'] ) && $_POST['st-data120'] ) {
			update_option( 'st-data120', $_POST['st-data120'] );
		} else {
			update_option( 'st-data120', '' );
		}

		if ( isset( $_POST['st-data121'] ) && $_POST['st-data121'] ) {
			update_option( 'st-data121', $_POST['st-data121'] );
		} else {
			if ( isset( $_POST['stdata121kesi'] ) && $_POST['stdata121kesi'] === 'yes' ) {
				update_option( 'st-data121', '' );
			}
		}

		if ( isset( $_POST['st-data122'] ) && $_POST['st-data122'] ) {
			update_option( 'st-data122', $_POST['st-data122'] );
		} else {
			if ( isset( $_POST['stdata122kesi'] ) && $_POST['stdata122kesi'] === 'yes' ) {
				update_option( 'st-data122', '' );
			}
		}

		if ( isset( $_POST['st-data123'] ) && $_POST['st-data123'] ) {
			update_option( 'st-data123', $_POST['st-data123'] );
		} else {
			if ( isset( $_POST['stdata123kesi'] ) && $_POST['stdata123kesi'] === 'yes' ) {
				update_option( 'st-data123', '' );
			}
		}

		if ( isset( $_POST['st-data124'] ) && $_POST['st-data124'] ) {
			update_option( 'st-data124', $_POST['st-data124'] );
		} else {
			if ( isset( $_POST['stdata124kesi'] ) && $_POST['stdata124kesi'] === 'yes' ) {
				update_option( 'st-data124', '' );
			}
		}

		if ( isset( $_POST['st-data125'] ) && $_POST['st-data125'] ) {
			update_option( 'st-data125', $_POST['st-data125'] );
		} else {
			update_option( 'st-data125', '' );
		}

		if ( isset( $_POST['st-data126'] ) && $_POST['st-data126'] ) {
			update_option( 'st-data126', $_POST['st-data126'] );
		} else {
			update_option( 'st-data126', '' );
		}

		if ( isset( $_POST['st-data127'] ) && $_POST['st-data127'] ) {
			update_option( 'st-data127', $_POST['st-data127'] );
		} else {
			update_option( 'st-data127', '' );
		}

		if ( isset( $_POST['st-data128'] ) && $_POST['st-data128'] ) {
			update_option( 'st-data128', $_POST['st-data128'] );
		} else {
			update_option( 'st-data128', '' );
		}

		if ( isset( $_POST['st-data129'] ) && $_POST['st-data129'] ) {
			update_option( 'st-data129', $_POST['st-data129'] );
		} else {
			update_option( 'st-data129', '' );
		}

		if ( isset( $_POST['st-data130'] ) && $_POST['st-data130'] ) {
			update_option( 'st-data130', $_POST['st-data130'] );
		} else {
			update_option( 'st-data130', '' );
		}

		if ( isset( $_POST['st-data131'] ) ) {
			update_option( 'st-data131', $_POST['st-data131'] );
		}

		if ( isset( $_POST['st-data132'] ) ) {
			update_option( 'st-data132', $_POST['st-data132'] );
		}

		if ( isset( $_POST['st-data133'] ) ) {
			update_option( 'st-data133', $_POST['st-data133'] );
		}

		if ( isset( $_POST['st-data134'] ) && $_POST['st-data134'] ) {
			update_option( 'st-data134', $_POST['st-data134'] );
		} else {
			update_option( 'st-data134', '' );
		}

		if ( isset( $_POST['st-data135'] ) && $_POST['st-data135'] ) {
			update_option( 'st-data135', $_POST['st-data135'] );
		} else {
			update_option( 'st-data135', '' );
		}

		if ( isset( $_POST['st-data136'] ) && $_POST['st-data136'] ) {
			update_option( 'st-data136', $_POST['st-data136'] );
		} else {
			update_option( 'st-data136', '' );
		}

		if ( isset( $_POST['st-data137'] ) && $_POST['st-data137'] ) {
			update_option( 'st-data137', $_POST['st-data137'] );
		} else {
			update_option( 'st-data137', '' );
		}

		if ( isset( $_POST['st-data140'] ) && $_POST['st-data140'] ) {
			update_option( 'st-data140', $_POST['st-data140'] );
		} else {
			update_option( 'st-data140', '' );
		}

		if ( isset( $_POST['st-data141'] ) && $_POST['st-data141'] ) {
			update_option( 'st-data141', $_POST['st-data141'] );
		} else {
			update_option( 'st-data141', '' );
		}

		if ( isset( $_POST['st-data142'] ) && $_POST['st-data142'] ) {
			update_option( 'st-data142', $_POST['st-data142'] );
		} else {
			update_option( 'st-data142', '' );
		}

		if ( isset( $_POST['st-data143'] ) && $_POST['st-data143'] ) {
			update_option( 'st-data143', $_POST['st-data143'] );
		} else {
			update_option( 'st-data143', '' );
		}

		if ( isset( $_POST['st-data144'] ) ) {
			update_option( 'st-data144', $_POST['st-data144'] );
		}

		if ( isset( $_POST['st-data145'] ) && $_POST['st-data145'] ) {
			update_option( 'st-data145', $_POST['st-data145'] );
		} else {
			update_option( 'st-data145', '' );
		}

		if ( isset( $_POST['st-data146'] ) ) {
			update_option( 'st-data146', $_POST['st-data146'] );
		}

		if ( isset( $_POST['st-data147'] ) && $_POST['st-data147'] ) {
			update_option( 'st-data147', $_POST['st-data147'] );
		} else {
			update_option( 'st-data147', '' );
		}
		if ( isset( $_POST['st-data148'] ) ) {
			update_option( 'st-data148', $_POST['st-data148'] );
		}

		if ( isset( $_POST['st-data149'] ) && $_POST['st-data149'] ) {
			update_option( 'st-data149', $_POST['st-data149'] );
		} else {
			update_option( 'st-data149', '' );
		}

		if ( isset( $_POST['st-data150'] ) ) {
			update_option( 'st-data150', $_POST['st-data150'] );
		}

		if ( isset( $_POST['st-data151'] ) && $_POST['st-data151'] ) {
			update_option( 'st-data151', $_POST['st-data151'] );
		} else {
			update_option( 'st-data151', '' );
		}

		if ( isset( $_POST['st-data152'] ) ) {
			update_option( 'st-data152', $_POST['st-data152'] );
		}

		if ( isset( $_POST['st-data153'] ) && $_POST['st-data153'] ) {
			update_option( 'st-data153', $_POST['st-data153'] );
		} else {
			update_option( 'st-data153', '' );
		}

		if ( isset( $_POST['st-data154'] ) && $_POST['st-data154'] ) {
			update_option( 'st-data154', $_POST['st-data154'] );
		} else {
			update_option( 'st-data154', '' );
		}

		if ( isset( $_POST['st-data155'] ) && $_POST['st-data155'] ) {
			update_option( 'st-data155', $_POST['st-data155'] );
		} else {
			update_option( 'st-data155', '' );
		}

		//テキストエディタで非表示にしたいボタン ACTIONより削除
		//$stdata156 ~ 200

		if ( isset( $_POST['st-data201'] ) && $_POST['st-data201'] ) {
			update_option( 'st-data201', $_POST['st-data201'] );
		} else {
			update_option( 'st-data201', '' );
		}

		if ( isset( $_POST['st-data202'] ) && $_POST['st-data202'] ) {
			update_option( 'st-data202', $_POST['st-data202'] );
		} else {
			update_option( 'st-data202', '' );
		}

		if ( isset( $_POST['st-data203'] ) && $_POST['st-data203'] ) {
			update_option( 'st-data203', $_POST['st-data203'] );
		} else {
			update_option( 'st-data203', '' );
		}

		if ( isset( $_POST['st-data204'] ) && $_POST['st-data204'] ) {
			update_option( 'st-data204', $_POST['st-data204'] );
		} else {
			update_option( 'st-data204', '' );
		}

		if ( isset( $_POST['st-data205'] ) && $_POST['st-data205'] ) {
			update_option( 'st-data205', $_POST['st-data205'] );
		} else {
			update_option( 'st-data205', '' );
		}

		if ( isset( $_POST['st-data206'] ) && $_POST['st-data206'] ) {
			update_option( 'st-data206', $_POST['st-data206'] );
		} else {
			update_option( 'st-data206', '' );
		}

		if ( isset( $_POST['st-data207'] ) && $_POST['st-data207'] ) {
			update_option( 'st-data207', $_POST['st-data207'] );
		} else {
			update_option( 'st-data207', '' );
		}

		if ( isset( $_POST['st-data208'] ) && $_POST['st-data208'] ) {
			update_option( 'st-data208', $_POST['st-data208'] );
		} else {
			update_option( 'st-data208', '' );
		}

		if ( isset( $_POST['st-data209'] ) && $_POST['st-data209'] ) {
			update_option( 'st-data209', $_POST['st-data209'] );
		} else {
			update_option( 'st-data209', '' );
		}

		if ( isset( $_POST['st-data210'] ) && $_POST['st-data210'] ) {
			update_option( 'st-data210', $_POST['st-data210'] );
		} else {
			update_option( 'st-data210', '' );
		}

		if ( isset( $_POST['st-data211'] ) && $_POST['st-data211'] ) {
			update_option( 'st-data211', $_POST['st-data211'] );
		} else {
			update_option( 'st-data211', '' );
		}

		if ( isset( $_POST['st-data212'] ) && $_POST['st-data212'] ) {
			update_option( 'st-data212', $_POST['st-data212'] );
		} else {
			update_option( 'st-data212', '' );
		}

		if ( isset( $_POST['st-data213'] ) && $_POST['st-data213'] ) {
			update_option( 'st-data213', $_POST['st-data213'] );
		} else {
			update_option( 'st-data213', '' );
		}

		if ( isset( $_POST['st-data214'] ) && $_POST['st-data214'] ) {
			update_option( 'st-data214', $_POST['st-data214'] );
		} else {
			update_option( 'st-data214', '' );
		}

		if ( isset( $_POST['st-data215'] ) && $_POST['st-data215'] ) {
			update_option( 'st-data215', $_POST['st-data215'] );
		} else {
			update_option( 'st-data215', '' );
		}

		if ( isset( $_POST['st-data216'] ) && $_POST['st-data216'] ) {
			update_option( 'st-data216', $_POST['st-data216'] );
		} else {
			update_option( 'st-data216', '' );
		}

		if ( isset( $_POST['st-data217'] ) && $_POST['st-data217'] ) {
			update_option( 'st-data217', $_POST['st-data217'] );
		} else {
			update_option( 'st-data217', '' );
		}

		if ( isset( $_POST['st-data218'] ) && $_POST['st-data218'] ) {
			update_option( 'st-data218', $_POST['st-data218'] );
		} else {
			update_option( 'st-data218', '' );
		}

		if ( isset( $_POST['st-data219'] ) && $_POST['st-data219'] ) {
			update_option( 'st-data219', $_POST['st-data219'] );
		} else {
			update_option( 'st-data219', '' );
		}

		if ( isset( $_POST['st-data220'] ) && $_POST['st-data220'] ) {
			update_option( 'st-data220', $_POST['st-data220'] );
		} else {
			update_option( 'st-data220', '' );
		}

		if ( isset( $_POST['st-data221'] ) && $_POST['st-data221'] ) {
			update_option( 'st-data221', $_POST['st-data221'] );
		} else {
			update_option( 'st-data221', '' );
		}

		if ( isset( $_POST['st-data222'] ) && $_POST['st-data222'] ) {
			update_option( 'st-data222', $_POST['st-data222'] );
		} else {
			update_option( 'st-data222', '' );
		}

		// WordPress Popular Posts連携 223~229

		if ( isset( $_POST['st-data230'] ) && $_POST['st-data230'] ) {
			update_option( 'st-data230', $_POST['st-data230'] );
		} else {
			update_option( 'st-data230', '' );
		}

		if ( isset( $_POST['st-data231'] ) && $_POST['st-data231'] ) {
			update_option( 'st-data231', $_POST['st-data231'] );
		} else {
			update_option( 'st-data231', '' );
		}

		if ( isset( $_POST['st-data232'] ) && $_POST['st-data232'] ) {
			update_option( 'st-data232', $_POST['st-data232'] );
		} else {
			update_option( 'st-data232', '' );
		}

		if (
			isset( $_POST['st-data233'] ) && $_POST['st-data233'] &&
			$_POST['st-data77'] === '' // サイト全体のレイアウト無効時のみ
		) {
			update_option( 'st-data233', $_POST['st-data233'] );
		} else {
			update_option( 'st-data233', '' );
		}

		if ( isset( $_POST['st-data234'] ) && $_POST['st-data234'] ) {
			update_option( 'st-data234', $_POST['st-data234'] );
		} else {
			update_option( 'st-data234', '' );
		}

		if ( isset( $_POST['st-data235'] ) && $_POST['st-data235'] ) {
			update_option( 'st-data235', $_POST['st-data235'] );
		} else {
			update_option( 'st-data235', '' );
		}

		if ( isset( $_POST['st-data236'] ) && $_POST['st-data236'] ) {
			update_option( 'st-data236', $_POST['st-data236'] );
		} else {
			update_option( 'st-data236', '' );
		}

		if ( isset( $_POST['st-data237'] ) && $_POST['st-data237'] ) {
			update_option( 'st-data237', $_POST['st-data237'] );
		} else {
			update_option( 'st-data237', '' );
		}

		if ( isset( $_POST['st-data239'] ) && $_POST['st-data239'] ) {
			update_option( 'st-data239', $_POST['st-data239'] );
		} else {
			update_option( 'st-data239', '' );
		}

		if ( isset( $_POST['st-data241'] ) && $_POST['st-data241'] ) {
			update_option( 'st-data241', $_POST['st-data241'] );
		} else {
			update_option( 'st-data241', '' );
		}

		if ( isset( $_POST['st-data242'] ) && $_POST['st-data242'] ) {
			update_option( 'st-data242', $_POST['st-data242'] );
		} else {
			update_option( 'st-data242', '' );
		}

		if ( isset( $_POST['st-data243'] ) && $_POST['st-data243'] ) {
			update_option( 'st-data243', $_POST['st-data243'] );
		} else {
			update_option( 'st-data243', '' );
		}

		if ( isset( $_POST['st-data244'] ) && $_POST['st-data244'] ) {
			update_option( 'st-data244', $_POST['st-data244'] );
		} else {
			update_option( 'st-data244', '' );
		}

		if ( isset( $_POST['st-data245'] ) && $_POST['st-data245'] ) {
			update_option( 'st-data245', $_POST['st-data245'] );
		} else {
			update_option( 'st-data245', '' );
		}

		if ( isset( $_POST['st-data246'] ) && $_POST['st-data246'] ) {
			update_option( 'st-data246', $_POST['st-data246'] );
		} else {
			update_option( 'st-data246', '' );
		}

		if ( isset( $_POST['st-data247'] ) && $_POST['st-data247'] ) {
			update_option( 'st-data247', $_POST['st-data247'] );
		} else {
			update_option( 'st-data247', '' );
		}

		if ( isset( $_POST['st-data248'] ) && $_POST['st-data248'] ) {
			update_option( 'st-data248', $_POST['st-data248'] );
		} else {
			update_option( 'st-data248', '' );
		}

		if ( isset( $_POST['st-data249'] ) && $_POST['st-data249'] ) {
			update_option( 'st-data249', $_POST['st-data249'] );
		} else {
			update_option( 'st-data249', '' );
		}

		if ( isset( $_POST['st-data250'] ) && $_POST['st-data250'] ) {
			update_option( 'st-data250', $_POST['st-data250'] );
		} else {
			update_option( 'st-data250', '' );
		}

		if ( isset( $_POST['st-data251'] ) && $_POST['st-data251'] ) {
			update_option( 'st-data251', $_POST['st-data251'] );
		} else {
			update_option( 'st-data251', '' );
		}

		if ( isset( $_POST['st-data252'] ) && $_POST['st-data252'] ) {
			update_option( 'st-data252', $_POST['st-data252'] );
		} else {
			update_option( 'st-data252', '' );
		}

		if ( isset( $_POST['st-data253'] ) && $_POST['st-data253'] ) {
			update_option( 'st-data253', $_POST['st-data253'] );
		} else {
			update_option( 'st-data253', '' );
		}

		if ( isset( $_POST['st-data254'] ) && $_POST['st-data254'] ) {
			update_option( 'st-data254', $_POST['st-data254'] );
		} else {
			update_option( 'st-data254', '' );
		}

		if ( isset( $_POST['st-data255'] ) && $_POST['st-data255'] ) {
			update_option( 'st-data255', $_POST['st-data255'] );
		} else {
			update_option( 'st-data255', '' );
		}

		if ( isset( $_POST['st-data256'] ) && $_POST['st-data256'] ) {
			update_option( 'st-data256', $_POST['st-data256'] );
		} else {
			update_option( 'st-data256', '' );
		}

		if ( isset( $_POST['st-data257'] ) && $_POST['st-data257'] ) {
			update_option( 'st-data257', $_POST['st-data257'] );
		} else {
			update_option( 'st-data257', '' );
		}

		if ( isset( $_POST['st-data258'] ) && $_POST['st-data258'] ) {
			update_option( 'st-data258', $_POST['st-data258'] );
		} else {
			update_option( 'st-data258', '' );
		}

		if ( isset( $_POST['st-data259'] ) && $_POST['st-data259'] ) {
			update_option( 'st-data259', $_POST['st-data259'] );
		} else {
			update_option( 'st-data259', '' );
		}

		if ( isset( $_POST['st-data260'] ) && $_POST['st-data260'] ) {
			update_option( 'st-data260', $_POST['st-data260'] );
		} else {
			update_option( 'st-data260', '' );
		}

		if ( isset( $_POST['st-data261'] ) && $_POST['st-data261'] ) {
			update_option( 'st-data261', $_POST['st-data261'] );
		} else {
			update_option( 'st-data261', '' );
		}

		if ( isset( $_POST['st-data262'] ) && $_POST['st-data262'] ) {
			update_option( 'st-data262', $_POST['st-data262'] );
		} else {
			update_option( 'st-data262', '' );
		}

		if ( isset( $_POST['st-data263'] ) && $_POST['st-data263'] ) {
			update_option( 'st-data263', $_POST['st-data263'] );
		} else {
			update_option( 'st-data263', '' );
		}

		if ( isset( $_POST['st-data264'] ) ) { //画像バージョン
			update_option( 'st-data264', $_POST['st-data264'] );
		}

		if ( isset( $_POST['st-data265'] ) ) {
			update_option( 'st-data265', $_POST['st-data265'] );
		}

		if ( isset( $_POST['st-data266'] ) && $_POST['st-data266'] ) {
			update_option( 'st-data266', $_POST['st-data266'] );
		} else {
			update_option( 'st-data266', '' );
		}

		if ( isset( $_POST['st-data267'] ) ) {
			update_option( 'st-data267', $_POST['st-data267'] );
		}

		if ( isset( $_POST['st-data268'] ) ) {
			update_option( 'st-data268', $_POST['st-data268'] );
		}

		if ( isset( $_POST['st-data269'] ) ) {
			update_option( 'st-data269', $_POST['st-data269'] );
		}

		if ( isset( $_POST['st-data270'] ) && $_POST['st-data270'] ) {
			update_option( 'st-data270', $_POST['st-data270'] );
		} else {
			update_option( 'st-data270', '' );
		}

		if ( isset( $_POST['st-data271'] ) && $_POST['st-data271'] ) {
			update_option( 'st-data271', $_POST['st-data271'] );
		} else {
			update_option( 'st-data271', '' );
		}

		if (
			isset( $_POST['st-data272'] ) && $_POST['st-data272'] &&
			( $_POST['st-data267'] === 'rtl' || $_POST['st-data267'] === 'ltr' ) // 右から左か左から右の場合のみ
		) {
			update_option( 'st-data272', $_POST['st-data272'] );
		} else {
			update_option( 'st-data272', '' );
		}

		if (
			isset( $_POST['st-data273'] ) && $_POST['st-data273'] &&
			( $_POST['st-data267'] === 'rtl' || $_POST['st-data267'] === 'ltr' ) && // 右から左か左から右の場合のみ
			( isset( $_POST['st-data272'] ) && $_POST['st-data272'] === 'yes' ) // 横並びの場合のみ
		) {
			update_option( 'st-data273', $_POST['st-data273'] );
		} else {
			update_option( 'st-data273', '' );
		}

		if ( isset( $_POST['st-data274'] ) && $_POST['st-data274'] ) {
			update_option( 'st-data274', $_POST['st-data274'] );
		} else {
			update_option( 'st-data274', '' );
		}

		if ( isset( $_POST['st-data275'] ) && $_POST['st-data275'] ) {
			update_option( 'st-data275', $_POST['st-data275'] );
		} else {
			update_option( 'st-data275', '' );
		}

		if ( isset( $_POST['st-data276'] ) && $_POST['st-data276'] ) {
			update_option( 'st-data276', $_POST['st-data276'] );
		} else {
			update_option( 'st-data276', '' );
		}

		if ( isset( $_POST['st-data277'] ) && $_POST['st-data277'] ) {
			update_option( 'st-data277', $_POST['st-data277'] );
		} else {
			update_option( 'st-data277', '' );
		}

		if ( isset( $_POST['st-data278'] ) && $_POST['st-data278'] ) {
			update_option( 'st-data278', $_POST['st-data278'] );
		} else {
			update_option( 'st-data278', '' );
		}

		if ( isset( $_POST['st-data279'] ) && $_POST['st-data279'] ) {
			update_option( 'st-data279', $_POST['st-data279'] );
		} else {
			update_option( 'st-data279', '' );
		}

		if ( isset( $_POST['st-data280'] ) && $_POST['st-data280'] ) {
			update_option( 'st-data280', $_POST['st-data280'] );
		} else {
			update_option( 'st-data280', '' );
		}

		if ( isset( $_POST['st-data281'] ) && $_POST['st-data281'] ) {
			update_option( 'st-data281', $_POST['st-data281'] );
		} else {
			update_option( 'st-data281', '' );
		}

		if ( isset( $_POST['st-data282'] ) && $_POST['st-data282'] ) {
			update_option( 'st-data282', $_POST['st-data282'] );
		} else {
			update_option( 'st-data282', '' );
		}

		if ( isset( $_POST['st-data283'] ) && $_POST['st-data283'] ) {
			update_option( 'st-data283', $_POST['st-data283'] );
		} else {
			update_option( 'st-data283', '' );
		}

		if ( isset( $_POST['st-data284'] ) && $_POST['st-data284'] ) {
			update_option( 'st-data284', $_POST['st-data284'] );
		} else {
			update_option( 'st-data284', '' );
		}

		if ( isset( $_POST['st-data285'] ) && $_POST['st-data285'] ) {
			update_option( 'st-data285', $_POST['st-data285'] );
		} else {
			update_option( 'st-data285', '' );
		}

		if ( isset( $_POST['st-data286'] ) && $_POST['st-data286'] ) {
			update_option( 'st-data286', $_POST['st-data286'] );
		} else {
			update_option( 'st-data286', '' );
		}

		if ( isset( $_POST['st-data287'] ) && $_POST['st-data287'] ) {
			update_option( 'st-data287', $_POST['st-data287'] );
		} else {
			update_option( 'st-data287', '' );
		}

		if ( isset( $_POST['st-data288'] ) && $_POST['st-data288'] ) {
			update_option( 'st-data288', $_POST['st-data288'] );
		} else {
			update_option( 'st-data288', '' );
		}

		if ( isset( $_POST['st-data289'] ) && $_POST['st-data289'] ) {
			update_option( 'st-data289', $_POST['st-data289'] );
		} else {
			update_option( 'st-data289', '' );
		}

		if ( isset( $_POST['st-data290'] ) && $_POST['st-data290'] ) {
			update_option( 'st-data290', $_POST['st-data290'] );
		} else {
			update_option( 'st-data290', '' );
		}

		if ( isset( $_POST['st-data291'] ) && $_POST['st-data291'] ) {
			update_option( 'st-data291', $_POST['st-data291'] );
		} else {
			update_option( 'st-data291', '' );
		}

		if ( isset( $_POST['st-data292'] ) && $_POST['st-data292'] ) {
			update_option( 'st-data292', $_POST['st-data292'] );
		} else {
			update_option( 'st-data292', '' );
		}

		if ( isset( $_POST['st-data293'] ) && $_POST['st-data293'] ) {
			update_option( 'st-data293', $_POST['st-data293'] );
		} else {
			update_option( 'st-data293', '' );
		}

		if ( isset( $_POST['st-data294'] ) && $_POST['st-data294'] ) {
			update_option( 'st-data294', $_POST['st-data294'] );
		} else {
			update_option( 'st-data294', '' );
		}

		if ( isset( $_POST['st-data295'] ) && $_POST['st-data295'] ) {
			update_option( 'st-data295', $_POST['st-data295'] );
		} else {
			update_option( 'st-data295', '' );
		}

		if ( isset( $_POST['st-data296'] ) && $_POST['st-data296'] ) {
			update_option( 'st-data296', $_POST['st-data296'] );
		} else {
			update_option( 'st-data296', '' );
		}

		if ( isset( $_POST['st-data297'] ) && $_POST['st-data297'] ) {
			update_option( 'st-data297', $_POST['st-data297'] );
		} else {
			update_option( 'st-data297', '' );
		}

		if ( isset( $_POST['st-data298'] ) && $_POST['st-data298'] ) {
			update_option( 'st-data298', $_POST['st-data298'] );
		} else {
			update_option( 'st-data298', '' );
		}

		if ( isset( $_POST['st-data299'] ) && $_POST['st-data299'] ) {
			update_option( 'st-data299', $_POST['st-data299'] );
		} else {
			update_option( 'st-data299', '' );
		}

		if ( isset( $_POST['st-data300'] ) && $_POST['st-data300'] ) {
			update_option( 'st-data300', $_POST['st-data300'] );
		} else {
			update_option( 'st-data300', '' );
		}

		if ( isset( $_POST['st-data301'] ) && $_POST['st-data301'] ) {
			update_option( 'st-data301', $_POST['st-data301'] );
		} else {
			update_option( 'st-data301', '' );
		}

		if ( isset( $_POST['st-data302'] ) && $_POST['st-data302'] ) {
			update_option( 'st-data302', $_POST['st-data302'] );
		} else {
			update_option( 'st-data302', '' );
		}

		if ( isset( $_POST['st-data303'] ) && $_POST['st-data303'] ) {
			update_option( 'st-data303', $_POST['st-data303'] );
		} else {
			update_option( 'st-data303', '' );
		}

		if ( isset( $_POST['st-data304'] ) && $_POST['st-data304'] ) {
			update_option( 'st-data304', $_POST['st-data304'] );
		} else {
			update_option( 'st-data304', '' );
		}

		if ( isset( $_POST['st-data305'] ) && $_POST['st-data305'] ) {
			update_option( 'st-data305', $_POST['st-data305'] );
		} else {
			update_option( 'st-data305', '' );
		}

		if ( isset( $_POST['st-data306'] ) && $_POST['st-data306'] ) {
			update_option( 'st-data306', $_POST['st-data306'] );
		} else {
			update_option( 'st-data306', '' );
		}

		if ( isset( $_POST['st-data307'] ) && $_POST['st-data307'] ) {
			update_option( 'st-data307', $_POST['st-data307'] );
		} else {
			update_option( 'st-data307', '' );
		}

		if ( isset( $_POST['st-data308'] ) && $_POST['st-data308'] ) {
			update_option( 'st-data308', $_POST['st-data308'] );
		} else {
			update_option( 'st-data308', '' );
		}

		if ( isset( $_POST['st-data309'] ) && $_POST['st-data309'] ) {
			update_option( 'st-data309', $_POST['st-data309'] );
		} else {
			update_option( 'st-data309', '' );
		}

		if ( isset( $_POST['st-data310'] ) && $_POST['st-data310'] ) {
			update_option( 'st-data310', $_POST['st-data310'] );
		} else {
			update_option( 'st-data310', '' );
		}

		if ( isset( $_POST['st-data311'] ) && $_POST['st-data311'] ) {
			update_option( 'st-data311', $_POST['st-data311'] );
		} else {
			update_option( 'st-data311', '' );
		}

		if ( isset( $_POST['st-data312'] ) && $_POST['st-data312'] ) {
			update_option( 'st-data312', $_POST['st-data312'] );
		} else {
			update_option( 'st-data312', '' );
		}

		if ( isset( $_POST['st-data313'] ) && $_POST['st-data313'] ) {
			update_option( 'st-data313', $_POST['st-data313'] );
		} else {
			update_option( 'st-data313', '' );
		}

		if ( isset( $_POST['st-data314'] ) && $_POST['st-data314'] ) {
			update_option( 'st-data314', $_POST['st-data314'] );
		} else {
			update_option( 'st-data314', '' );
		}

		if ( isset( $_POST['st-data315'] ) && $_POST['st-data315'] ) {
			update_option( 'st-data315', $_POST['st-data315'] );
		} else {
			update_option( 'st-data315', '' );
		}

		if ( isset( $_POST['st-data316'] ) && $_POST['st-data316'] ) {
			update_option( 'st-data316', $_POST['st-data316'] );
		} else {
			update_option( 'st-data316', '' );
		}

		if ( isset( $_POST['st-data317'] ) && $_POST['st-data317'] ) {
			update_option( 'st-data317', $_POST['st-data317'] );
		} else {
			update_option( 'st-data317', '' );
		}

		if ( isset( $_POST['st-data318'] ) && $_POST['st-data318'] ) {
			update_option( 'st-data318', $_POST['st-data318'] );
		} else {
			update_option( 'st-data318', '' );
		}

		if ( isset( $_POST['st-data319'] ) && $_POST['st-data319'] ) {
			update_option( 'st-data319', $_POST['st-data319'] );
		} else {
			update_option( 'st-data319', '' );
		}

		if ( isset( $_POST['st-data324'] ) && $_POST['st-data324'] ) {
			update_option( 'st-data324', $_POST['st-data324'] );
		} else {
			update_option( 'st-data324', '' );
		}

		if ( isset( $_POST['st-data325'] ) && $_POST['st-data325'] ) {
			update_option( 'st-data325', $_POST['st-data325'] );
		} else {
			update_option( 'st-data325', '' );
		}

		if ( isset( $_POST['st-data326'] ) && $_POST['st-data326'] ) {
			update_option( 'st-data326', $_POST['st-data326'] );
		} else {
			update_option( 'st-data326', '' );
		}

		if ( isset( $_POST['st-data327'] ) && $_POST['st-data327'] ) {
			update_option( 'st-data327', $_POST['st-data327'] );
		} else {
			update_option( 'st-data327', '' );
		}

		if ( isset( $_POST['st-data328'] ) && $_POST['st-data328'] ) {
			update_option( 'st-data328', $_POST['st-data328'] );
		} else {
			update_option( 'st-data328', '' );
		}

		if ( isset( $_POST['st-data329'] ) && $_POST['st-data329'] ) {
			update_option( 'st-data329', $_POST['st-data329'] );
		} else {
			update_option( 'st-data329', '' );
		}

		if ( isset( $_POST['st-data330'] ) && $_POST['st-data330'] ) {
			update_option( 'st-data330', $_POST['st-data330'] );
		} else {
			update_option( 'st-data330', '' );
		}

		if ( isset( $_POST['st-data331'] ) && $_POST['st-data331'] ) {
			update_option( 'st-data331', $_POST['st-data331'] );
		} else {
			update_option( 'st-data331', '' );
		}

		if ( isset( $_POST['st-data332'] ) && $_POST['st-data332'] ) {
			update_option( 'st-data332', $_POST['st-data332'] );
		} else {
			update_option( 'st-data332', '' );
		}

		if ( isset( $_POST['st-data333'] ) && $_POST['st-data333'] ) {
			update_option( 'st-data333', $_POST['st-data333'] );
		} else {
			update_option( 'st-data333', '' );
		}

		if (
			isset( $_POST['st-data334'] ) && $_POST['st-data334'] &&
			$_POST['st-data201'] === 'yes' // 簡易デザイン適用時のみ
		) {
			update_option( 'st-data334', $_POST['st-data334'] );
		} else {
			update_option( 'st-data334', '' );
		}

		if (
			isset( $_POST['st-data335'] ) && $_POST['st-data335'] &&
			$_POST['st-data201'] === 'yes' // 簡易デザイン適用時のみ
		) {
			update_option( 'st-data335', $_POST['st-data335'] );
		} else {
			update_option( 'st-data335', '' );
		}

		if (
			isset( $_POST['st-data336'] ) && $_POST['st-data336'] &&
			( $_POST['st-data201'] === 'yes' && ( $_POST['st-data334'] === 'yes' || $_POST['st-data335'] === 'yes' ) ) // 簡易デザイン適用時 + サムネイルが有効な場合のみ
		) {
			update_option( 'st-data336', $_POST['st-data336'] );
		} else {
			update_option( 'st-data336', '' );
		}

		if ( isset( $_POST['st-data337'] ) ) {
			update_option( 'st-data337', $_POST['st-data337'] );
		}

		if ( isset( $_POST['st-data338'] ) && $_POST['st-data338'] ) {
			update_option( 'st-data338', $_POST['st-data338'] );
		} else {
			update_option( 'st-data338', '' );
		}

		if ( isset( $_POST['st-data339'] ) && $_POST['st-data339'] ) {
			update_option( 'st-data339', $_POST['st-data339'] );
		} else {
			update_option( 'st-data339', '' );
		}

		if ( isset( $_POST['st-data340'] ) ) {
			update_option( 'st-data340', $_POST['st-data340'] );
		}

		if ( isset( $_POST['st-data341'] ) && $_POST['st-data341'] ) {
			update_option( 'st-data341', $_POST['st-data341'] );
		} else {
			update_option( 'st-data341', '' );
		}

		if ( isset( $_POST['st-data342'] ) && $_POST['st-data342'] ) {
			update_option( 'st-data342', $_POST['st-data342'] );
		} else {
			update_option( 'st-data342', '' );
		}

		if ( isset( $_POST['st-data343'] ) ) {
			update_option( 'st-data343', $_POST['st-data343'] );
		}

		if ( isset( $_POST['st-data344'] ) && $_POST['st-data344'] ) {
			update_option( 'st-data344', $_POST['st-data344'] );
		} else {
			update_option( 'st-data344', '' );
		}

		if ( isset( $_POST['st-data345'] ) && $_POST['st-data345'] ) {
			update_option( 'st-data345', $_POST['st-data345'] );
		} else {
			update_option( 'st-data345', '' );
		}

		if ( isset( $_POST['st-data346'] ) ) {
			update_option( 'st-data346', $_POST['st-data346'] );
		}

		if ( isset( $_POST['st-data347'] ) && $_POST['st-data347'] ) {
			update_option( 'st-data347', $_POST['st-data347'] );
		} else {
			update_option( 'st-data347', '' );
		}

		if ( isset( $_POST['st-data348'] ) && $_POST['st-data348'] ) {
			update_option( 'st-data348', $_POST['st-data348'] );
		} else {
			update_option( 'st-data348', '' );
		}

		if ( isset( $_POST['st-data349'] ) && $_POST['st-data349'] ) {
			update_option( 'st-data349', $_POST['st-data349'] );
		} else {
			update_option( 'st-data349', '' );
		}

		if ( isset( $_POST['st-data350'] ) && $_POST['st-data350'] ) {
			update_option( 'st-data350', $_POST['st-data350'] );
		} else {
			update_option( 'st-data350', '' );
		}

		if ( isset( $_POST['st-data351'] ) && $_POST['st-data351'] ) {
			update_option( 'st-data351', $_POST['st-data351'] );
		} else {
			update_option( 'st-data351', '' );
		}

		if ( isset( $_POST['st-data352'] ) && $_POST['st-data352'] ) {
			update_option( 'st-data352', $_POST['st-data352'] );
		} else {
			update_option( 'st-data352', '' );
		}

		if ( isset( $_POST['st-data353'] ) && $_POST['st-data353'] ) {
			update_option( 'st-data353', $_POST['st-data353'] );
		} else {
			update_option( 'st-data353', '' );
		}

		if ( isset( $_POST['st-data354'] ) && $_POST['st-data354'] ) {
			update_option( 'st-data354', $_POST['st-data354'] );
		} else {
			update_option( 'st-data354', '' );
		}

		if ( isset( $_POST['st-data355'] ) && $_POST['st-data355'] ) {
			update_option( 'st-data355', $_POST['st-data355'] );
		} else {
			update_option( 'st-data355', '' );
		}

		if ( isset( $_POST['st-data356'] ) && $_POST['st-data356'] ) {
			update_option( 'st-data356', $_POST['st-data356'] );
		} else {
			update_option( 'st-data356', '' );
		}

		if ( isset( $_POST['st-data357'] ) && $_POST['st-data357'] ) {
			update_option( 'st-data357', $_POST['st-data357'] );
		} else {
			update_option( 'st-data357', '' );
		}

		if ( isset( $_POST['st-data358'] ) && $_POST['st-data358'] ) {
			update_option( 'st-data358', $_POST['st-data358'] );
		} else {
			update_option( 'st-data358', '' );
		}

		if ( isset( $_POST['st-data368'] ) && $_POST['st-data368'] ) {
			update_option( 'st-data368', $_POST['st-data368'] );
		} else {
			update_option( 'st-data368', '' );
		}

		if ( isset( $_POST['st-data369'] ) && $_POST['st-data369'] ) {
			update_option( 'st-data369', $_POST['st-data369'] );
		} else {
			update_option( 'st-data369', '' );
		}

		if ( isset( $_POST['st-data370'] ) && $_POST['st-data370'] ) {
			update_option( 'st-data370', $_POST['st-data370'] );
		} else {
			update_option( 'st-data370', '' );
		}

		if ( isset( $_POST['st-data371'] ) && $_POST['st-data371'] ) {
			update_option( 'st-data371', $_POST['st-data371'] );
		} else {
			update_option( 'st-data371', '' );
		}

		if ( isset( $_POST['st-data372'] ) && $_POST['st-data372'] ) {
			update_option( 'st-data372', $_POST['st-data372'] );
		} else {
			update_option( 'st-data372', '' );
		}

		if ( isset( $_POST['st-data373'] ) && $_POST['st-data373'] ) {
			update_option( 'st-data373', $_POST['st-data373'] );
		} else {
			update_option( 'st-data373', '' );
		}

		if ( isset( $_POST['st-data374'] ) && $_POST['st-data374'] ) {
			update_option( 'st-data374', $_POST['st-data374'] );
		} else {
			update_option( 'st-data374', '' );
		}

		if ( isset( $_POST['st-data376'] ) && $_POST['st-data376'] ) {
			update_option( 'st-data376', $_POST['st-data376'] );
		} else {
			update_option( 'st-data376', '' );
		}

		if ( isset( $_POST['st-data377'] ) && $_POST['st-data377'] ) {
			update_option( 'st-data377', $_POST['st-data377'] );
		} else {
			update_option( 'st-data377', '' );
		}

		if ( isset( $_POST['st-data378'] ) && $_POST['st-data378'] ) {
			update_option( 'st-data378', $_POST['st-data378'] );
		} else {
			update_option( 'st-data378', '' );
		}

		if ( isset( $_POST['st-data379'] ) && $_POST['st-data379'] ) {
			update_option( 'st-data379', $_POST['st-data379'] );
		} else {
			update_option( 'st-data379', '' );
		}

		if ( isset( $_POST['st-data380'] ) && $_POST['st-data380'] ) {
			update_option( 'st-data380', $_POST['st-data380'] );
		} else {
			update_option( 'st-data380', '' );
		}

		if ( isset( $_POST['st-data381'] ) && $_POST['st-data381'] ) {
			update_option( 'st-data381', $_POST['st-data381'] );
		} else {
			update_option( 'st-data381', '' );
		}

		if ( isset( $_POST['st-data382'] ) && $_POST['st-data382'] ) {
			update_option( 'st-data382', $_POST['st-data382'] );
		} else {
			update_option( 'st-data382', '' );
		}

		if ( isset( $_POST['st-data383'] ) && $_POST['st-data383'] ) {
			update_option( 'st-data383', $_POST['st-data383'] );
		} else {
			update_option( 'st-data383', '' );
		}

		if ( isset( $_POST['st-data384'] ) && $_POST['st-data384'] ) {
			update_option( 'st-data384', $_POST['st-data384'] );
		} else {
			update_option( 'st-data384', '' );
		}

		if ( isset( $_POST['st-data385'] ) && $_POST['st-data385'] ) {
			update_option( 'st-data385', $_POST['st-data385'] );
		} else {
			update_option( 'st-data385', '' );
		}

		if ( isset( $_POST['st-data386'] ) && $_POST['st-data386'] ) {
			update_option( 'st-data386', $_POST['st-data386'] );
		} else {
			update_option( 'st-data386', '' );
		}

		if ( isset( $_POST['st-data387'] ) && $_POST['st-data387'] ) {
			update_option( 'st-data387', $_POST['st-data387'] );
		} else {
			update_option( 'st-data387', '' );
		}

		if ( isset( $_POST['st-data388'] ) && $_POST['st-data388'] ) {
			update_option( 'st-data388', $_POST['st-data388'] );
		} else {
			update_option( 'st-data388', '' );
		}

		if ( isset( $_POST['st-data389'] ) && $_POST['st-data389'] ) {
			update_option( 'st-data389', $_POST['st-data389'] );
		} else {
			update_option( 'st-data389', '' );
		}

		if ( isset( $_POST['st-data390'] ) && $_POST['st-data390'] ) {
			update_option( 'st-data390', $_POST['st-data390'] );
		} else {
			update_option( 'st-data390', '' );
		}

		if ( isset( $_POST['st-data391'] ) && $_POST['st-data391'] ) {
			update_option( 'st-data391', $_POST['st-data391'] );
		} else {
			update_option( 'st-data391', '' );
		}

		if ( isset( $_POST['st-data392'] ) && $_POST['st-data392'] ) {
			update_option( 'st-data392', $_POST['st-data392'] );
		} else {
			update_option( 'st-data392', '' );
		}

		if ( isset( $_POST['st-data393'] ) && $_POST['st-data393'] ) {
			update_option( 'st-data393', $_POST['st-data393'] );
		} else {
			update_option( 'st-data393', '' );
		}

		if ( isset( $_POST['st-data394'] ) && $_POST['st-data394'] ) {
			update_option( 'st-data394', $_POST['st-data394'] );
		} else {
			update_option( 'st-data394', '' );
		}

		// 自由コンテンツ (ヘッダー画像)
		if ( isset( $_POST['st-data395'] ) && $_POST['st-data395'] ) {
			update_option( 'st-data395', $_POST['st-data395'] );
		} else {
			update_option( 'st-data395', '' );
		}

		if ( isset( $_POST['st-data396'] ) && $_POST['st-data396'] ) {
			update_option( 'st-data396', $_POST['st-data396'] );
		} else {
			update_option( 'st-data396', '' );
		}

		if ( isset( $_POST['st-data397'] ) && $_POST['st-data397'] ) {
			update_option( 'st-data397', $_POST['st-data397'] );
		} else {
			update_option( 'st-data397', '' );
		}

		if ( isset( $_POST['st-data398'] ) && $_POST['st-data398'] ) {
			update_option( 'st-data398', $_POST['st-data398'] );
		} else {
			update_option( 'st-data398', '' );
		}

		if ( isset( $_POST['st-data399'] ) && $_POST['st-data399'] ) {
			update_option( 'st-data399', $_POST['st-data399'] );
		} else {
			update_option( 'st-data399', '' );
		}

		if ( isset( $_POST['st-data400'] ) && $_POST['st-data400'] ) {
			update_option( 'st-data400', $_POST['st-data400'] );
		} else {
			update_option( 'st-data400', '' );
		}

		if ( isset( $_POST['st-data401'] ) && $_POST['st-data401'] ) {
			update_option( 'st-data401', $_POST['st-data401'] );
		} else {
			update_option( 'st-data401', '' );
		}

		if ( isset( $_POST['st-data402'] ) && $_POST['st-data402'] ) {
			update_option( 'st-data402', $_POST['st-data402'] );
		} else {
			update_option( 'st-data402', '' );
		}

		if ( isset( $_POST['st-data403'] ) && $_POST['st-data403'] ) {
			update_option( 'st-data403', $_POST['st-data403'] );
		} else {
			update_option( 'st-data403', '' );
		}

		if ( isset( $_POST['st-data404'] ) && $_POST['st-data404'] ) {
			update_option( 'st-data404', $_POST['st-data404'] );
		} else {
			update_option( 'st-data404', '' );
		}

		if ( isset( $_POST['st-data405'] ) && $_POST['st-data405'] ) {
			update_option( 'st-data405', $_POST['st-data405'] );
		} else {
			update_option( 'st-data405', '' );
		}

		if ( isset( $_POST['st-data406'] ) && $_POST['st-data406'] ) {
			update_option( 'st-data406', $_POST['st-data406'] );
		} else {
			update_option( 'st-data406', '' );
		}

		if ( isset( $_POST['st-data407'] ) && $_POST['st-data407'] ) {
			update_option( 'st-data407', $_POST['st-data407'] );
		} else {
			update_option( 'st-data407', '' );
		}

		if ( isset( $_POST['st-data408'] ) && $_POST['st-data408'] ) {
			update_option( 'st-data408', $_POST['st-data408'] );
		} else {
			update_option( 'st-data408', '' );
		}

		if ( isset( $_POST['st-data409'] ) && $_POST['st-data409'] ) {
			update_option( 'st-data409', $_POST['st-data409'] );
		} else {
			update_option( 'st-data409', '' );
		}

		if ( isset( $_POST['st-data410'] ) && $_POST['st-data410'] ) {
			update_option( 'st-data410', $_POST['st-data410'] );
		} else {
			update_option( 'st-data410', '' );
		}

		if ( isset( $_POST['st-data411'] ) && $_POST['st-data411'] ) {
			update_option( 'st-data411', $_POST['st-data411'] );
		} else {
			update_option( 'st-data411', '' );
		}

		if ( isset( $_POST['st-data412'] ) && $_POST['st-data412'] ) {
			update_option( 'st-data412', $_POST['st-data412'] );
		} else {
			update_option( 'st-data412', '' );
		}

		if ( isset( $_POST['st-data413'] ) && $_POST['st-data413'] ) {
			update_option( 'st-data413', $_POST['st-data413'] );
		} else {
			update_option( 'st-data413', '' );
		}

		if ( isset( $_POST['st-data414'] ) && $_POST['st-data414'] ) {
			update_option( 'st-data414', $_POST['st-data414'] );
		} else {
			update_option( 'st-data414', '' );
		}

		if ( isset( $_POST['st-data415'] ) && $_POST['st-data415'] ) {
			update_option( 'st-data415', $_POST['st-data415'] );
		} else {
			update_option( 'st-data415', '' );
		}

		if ( isset( $_POST['st-data419'] ) && $_POST['st-data419'] ) {
			update_option( 'st-data419', $_POST['st-data419'] );
		} else {
			update_option( 'st-data419', '' );
		}

		if ( isset( $_POST['st-data420'] ) && $_POST['st-data420'] ) {
			update_option( 'st-data420', $_POST['st-data420'] );
		} else {
			update_option( 'st-data420', '' );
		}

		if ( isset( $_POST['st-data421'] ) && $_POST['st-data421'] ) {
			update_option( 'st-data421', $_POST['st-data421'] );
		} else {
			update_option( 'st-data421', '' );
		}

		if ( isset( $_POST['st-data422'] ) && $_POST['st-data422'] ) {
			update_option( 'st-data422', $_POST['st-data422'] );
		} else {
			update_option( 'st-data422', '' );
		}

		if ( isset( $_POST['st-data423'] ) && $_POST['st-data423'] ) {
			update_option( 'st-data423', $_POST['st-data423'] );
		} else {
			update_option( 'st-data423', '' );
		}

		if ( isset( $_POST['st-data424'] ) && $_POST['st-data424'] ) {
			update_option( 'st-data424', $_POST['st-data424'] );
		} else {
			update_option( 'st-data424', '' );
		}

		if ( isset( $_POST['st-data425'] ) && $_POST['st-data425'] ) {
			update_option( 'st-data425', $_POST['st-data425'] );
		} else {
			update_option( 'st-data425', '' );
		}

		if ( isset( $_POST['st-data426'] ) && $_POST['st-data426'] ) {
			update_option( 'st-data426', $_POST['st-data426'] );
		} else {
			update_option( 'st-data426', '' );
		}

		if ( isset( $_POST['st-data427'] ) && $_POST['st-data427'] ) {
			update_option( 'st-data427', $_POST['st-data427'] );
		} else {
			update_option( 'st-data427', '' );
		}

		if ( isset( $_POST['st-data428'] ) && $_POST['st-data428'] ) {
			update_option( 'st-data428', $_POST['st-data428'] );
		} else {
			update_option( 'st-data428', '' );
		}

		if ( isset( $_POST['st-data429'] ) && $_POST['st-data429'] ) {
			update_option( 'st-data429', $_POST['st-data429'] );
		} else {
			update_option( 'st-data429', '' );
		}

		if ( isset( $_POST['st-data430'] ) && $_POST['st-data430'] ) {
			update_option( 'st-data430', $_POST['st-data430'] );
		} else {
			update_option( 'st-data430', '' );
		}

		if ( isset( $_POST['st-data431'] ) && $_POST['st-data431'] ) {
			update_option( 'st-data431', $_POST['st-data431'] );
		} else {
			update_option( 'st-data431', '' );
		}

		if ( isset( $_POST['st-data432'] ) && $_POST['st-data432'] ) {
			update_option( 'st-data432', $_POST['st-data432'] );
		} else {
			update_option( 'st-data432', '' );
		}

		if ( isset( $_POST['st-data434'] ) && $_POST['st-data434'] ) {
			update_option( 'st-data434', $_POST['st-data434'] );
		} else {
			update_option( 'st-data434', '' );
		}

		if ( isset( $_POST['st-data435'] ) && $_POST['st-data435'] ) {
			update_option( 'st-data435', $_POST['st-data435'] );
		} else {
			update_option( 'st-data435', '' );
		}

		if ( isset( $_POST['st-data436'] ) && $_POST['st-data436'] ) {
			update_option( 'st-data436', $_POST['st-data436'] );
		} else {
			update_option( 'st-data436', '' );
		}

		if ( isset( $_POST['st-data437'] ) && $_POST['st-data437'] ) {
			update_option( 'st-data437', $_POST['st-data437'] );
		} else {
			update_option( 'st-data437', '' );
		}

		if ( isset( $_POST['st-data438'] ) && $_POST['st-data438'] ) {
			update_option( 'st-data438', $_POST['st-data438'] );
		} else {
			update_option( 'st-data438', '' );
		}

		if ( isset( $_POST['st-data439'] ) && $_POST['st-data439'] ) {
			update_option( 'st-data439', $_POST['st-data439'] );
		} else {
			update_option( 'st-data439', '' );
		}

		if ( isset( $_POST['st-data440'] ) && $_POST['st-data440'] ) {
			update_option( 'st-data440', $_POST['st-data440'] );
		} else {
			update_option( 'st-data440', '' );
		}

		if ( isset( $_POST['st-data441'] ) && $_POST['st-data441'] ) {
			update_option( 'st-data441', $_POST['st-data441'] );
		} else {
			update_option( 'st-data441', '' );
		}

		if ( isset( $_POST['st-data442'] ) && $_POST['st-data442'] ) {
			update_option( 'st-data442', $_POST['st-data442'] );
		} else {
			update_option( 'st-data442', '' );
		}

		if ( isset( $_POST['st-data443'] ) && $_POST['st-data443'] ) {
			update_option( 'st-data443', $_POST['st-data443'] );
		} else {
			update_option( 'st-data443', '' );
		}

		// 見出し前に広告挿入 6〜10番目 (B): A を優先
		if ( isset( $_POST['st-data444'] ) && $_POST['st-data444'] &&
			( ! isset( $_POST['st-data439'] ) || ! $_POST['st-data439'] ) ) {
			update_option( 'st-data444', $_POST['st-data444'] );
		} else {
			update_option( 'st-data444', '' );
		}

		if ( isset( $_POST['st-data445'] ) && $_POST['st-data445'] &&
			( ! isset( $_POST['st-data440'] ) || ! $_POST['st-data440'] ) ) {
			update_option( 'st-data445', $_POST['st-data445'] );
		} else {
			update_option( 'st-data445', '' );
		}

		if ( isset( $_POST['st-data446'] ) && $_POST['st-data446'] &&
			( ! isset( $_POST['st-data441'] ) || ! $_POST['st-data441'] ) ) {
			update_option( 'st-data446', $_POST['st-data446'] );
		} else {
			update_option( 'st-data446', '' );
		}

		if ( isset( $_POST['st-data447'] ) && $_POST['st-data447'] &&
			( ! isset( $_POST['st-data442'] ) || ! $_POST['st-data442'] ) ) {
			update_option( 'st-data447', $_POST['st-data447'] );
		} else {
			update_option( 'st-data447', '' );
		}

		if ( isset( $_POST['st-data448'] ) && $_POST['st-data448'] &&
			( ! isset( $_POST['st-data443'] ) || ! $_POST['st-data443'] ) ) {
			update_option( 'st-data448', $_POST['st-data448'] );
		} else {
			update_option( 'st-data448', '' );
		}
		// 見出し前に広告挿入 6〜10番目 (B): A を優先 (ここまで)

		if ( isset( $_POST['st-data449'] ) && $_POST['st-data449'] ) {
			update_option( 'st-data449', $_POST['st-data449'] );
		} else {
			update_option( 'st-data449', '' );
		}

		if ( isset( $_POST['st-data450'] ) && $_POST['st-data450'] ) {
			update_option( 'st-data450', $_POST['st-data450'] );
		} else {
			update_option( 'st-data450', '' );
		}

		if ( isset( $_POST['st-data451'] ) && $_POST['st-data451'] ) {
			update_option( 'st-data451', $_POST['st-data451'] );
		} else {
			update_option( 'st-data451', '' );
		}

		// ウィジェットを無効化する
		if ( isset( $_POST['st-data464'] ) && $_POST['st-data464'] ) {
			update_option( 'st-data464', _st_admin_widget_state_post_to_option() );
		} else {
			update_option( 'st-data464', '' );
		}

		if ( isset( $_POST['st-data465'] ) && $_POST['st-data465'] ) {
			update_option( 'st-data465', $_POST['st-data465'] );
		} else {
			update_option( 'st-data465', '' );
		}

		if ( isset( $_POST['st-data466'] ) && $_POST['st-data466'] ) {
			update_option( 'st-data466', $_POST['st-data466'] );
		} else {
			update_option( 'st-data466', '' );
		}

		if ( isset( $_POST['st-data467'] ) && $_POST['st-data467'] ) {
			update_option( 'st-data467', $_POST['st-data467'] );
		} else {
			update_option( 'st-data467', '' );
		}

		if ( isset( $_POST['st-data468'] ) && $_POST['st-data468'] ) {
			update_option( 'st-data468', $_POST['st-data468'] );
		} else {
			update_option( 'st-data468', '' );
		}

		if ( isset( $_POST['st-data469'] ) && $_POST['st-data469'] ) {
			update_option( 'st-data469', $_POST['st-data469'] );
		} else {
			update_option( 'st-data469', '' );
		}

		if ( isset( $_POST['st-data470'] ) && $_POST['st-data470'] ) {
			update_option( 'st-data470', $_POST['st-data470'] );
		} else {
			update_option( 'st-data470', '' );
		}

		if ( isset( $_POST['st-data471'] ) && $_POST['st-data471'] ) {
			update_option( 'st-data471', $_POST['st-data471'] );
		} else {
			update_option( 'st-data471', '' );
		}

		if ( isset( $_POST['st-data472'] ) && $_POST['st-data472'] ) {
			update_option( 'st-data472', $_POST['st-data472'] );
		} else {
			update_option( 'st-data472', '' );
		}

		if ( isset( $_POST['st-data473'] ) && $_POST['st-data473'] ) {
			update_option( 'st-data473', $_POST['st-data473'] );
		} else {
			update_option( 'st-data473', '' );
		}

		if ( isset( $_POST['st-data474'] ) && $_POST['st-data474'] ) {
			update_option( 'st-data474', $_POST['st-data474'] );
		} else {
			update_option( 'st-data474', '' );
		}

		if ( isset( $_POST['st-data475'] ) && $_POST['st-data475'] ) {
			update_option( 'st-data475', $_POST['st-data475'] );
		} else {
			update_option( 'st-data475', '' );
		}

		if ( isset( $_POST['st-data476'] ) && $_POST['st-data476'] ) {
			update_option( 'st-data476', $_POST['st-data476'] );
		} else {
			update_option( 'st-data476', '' );
		}

		if ( isset( $_POST['st-data477'] ) && $_POST['st-data477'] ) {
			update_option( 'st-data477', $_POST['st-data477'] );
		} else {
			update_option( 'st-data477', '' );
		}

		if ( isset( $_POST['st-data478'] ) && $_POST['st-data478'] ) {
			update_option( 'st-data478', $_POST['st-data478'] );
		} else {
			update_option( 'st-data478', '' );
		}

		if ( isset( $_POST['st-data479'] ) && $_POST['st-data479'] ) {
			update_option( 'st-data479', $_POST['st-data479'] );
		} else {
			update_option( 'st-data479', '' );
		}

		if ( isset( $_POST['st-data480'] ) && $_POST['st-data480'] ) {
			update_option( 'st-data480', $_POST['st-data480'] );
		} else {
			update_option( 'st-data480', '' );
		}

		if ( isset( $_POST['st-data481'] ) && $_POST['st-data481'] ) {
			update_option( 'st-data481', $_POST['st-data481'] );
		} else {
			update_option( 'st-data481', '' );
		}

		if ( isset( $_POST['st-data482'] ) && $_POST['st-data482'] ) {
			update_option( 'st-data482', $_POST['st-data482'] );
		} else {
			update_option( 'st-data482', '' );
		}

		if ( isset( $_POST['st-data483'] ) && $_POST['st-data483'] ) {
			update_option( 'st-data483', $_POST['st-data483'] );
		} else {
			update_option( 'st-data483', 'overlay' );
		}

		if ( isset( $_POST['st-data484'] ) && $_POST['st-data484'] ) {
			update_option( 'st-data484', $_POST['st-data484'] );
		} else {
			update_option( 'st-data484', '' );
		}

		if ( isset( $_POST['st-data485'] ) && $_POST['st-data485'] ) {
			update_option( 'st-data485', $_POST['st-data485'] );
		} else {
			update_option( 'st-data485', '' );
		}

		if ( isset( $_POST['st-data486'] ) && $_POST['st-data486'] ) {
			update_option( 'st-data486', $_POST['st-data486'] );
		} else {
			update_option( 'st-data486', '' );
		}

		if ( isset( $_POST['st-data487'] ) && $_POST['st-data487'] ) {
			update_option( 'st-data487', $_POST['st-data487'] );
		} else {
			update_option( 'st-data487', '' );
		}

		if ( isset( $_POST['st-data488'] ) && $_POST['st-data488'] ) {
			update_option( 'st-data488', $_POST['st-data488'] );
		} else {
			update_option( 'st-data488', '' );
		}

		if ( isset( $_POST['st-data489'] ) && $_POST['st-data489'] ) {
			update_option( 'st-data489', $_POST['st-data489'] );
		} else {
			update_option( 'st-data489', '' );
		}

		if ( isset( $_POST['st-data490'] ) && $_POST['st-data490'] ) {
			update_option( 'st-data490', $_POST['st-data490'] );
		} else {
			update_option( 'st-data490', '' );
		}

		if ( isset( $_POST['st-data491'] ) && $_POST['st-data491'] ) {
			update_option( 'st-data491', $_POST['st-data491'] );
		} else {
			update_option( 'st-data491', '' );
		}

		if ( isset( $_POST['st-data492'] ) && $_POST['st-data492'] ) {
			update_option( 'st-data492', $_POST['st-data492'] );
		} else {
			update_option( 'st-data492', '' );
		}

		if (
			isset( $_POST['st-data493'] ) && $_POST['st-data493'] &&
			( $_POST['st-data111'] === 'yes'  // トップページ（PC）の背景で動画を流す適用時のみ
			|| $_POST['st-data584'] === 'yes' // ヘッダー画像エリアに動画を表示する
			 )
		) {
			update_option( 'st-data493', $_POST['st-data493'] );
		} else {
			update_option( 'st-data493', '' );
		}

		if ( isset( $_POST['st-data494'] ) && $_POST['st-data494'] ) {
			update_option( 'st-data494', $_POST['st-data494'] );
		} else {
			update_option( 'st-data494', '' );
		}

		if ( isset( $_POST['st-data495'] ) && $_POST['st-data495'] ) {
			update_option( 'st-data495', $_POST['st-data495'] );
		} else {
			update_option( 'st-data495', '' );
		}

		if ( isset( $_POST['st-data496'] ) && $_POST['st-data496'] ) {
			update_option( 'st-data496', $_POST['st-data496'] );
		} else {
			update_option( 'st-data496', '' );
		}

		if ( isset( $_POST['st-data497'] ) && $_POST['st-data497'] ) {
			update_option( 'st-data497', $_POST['st-data497'] );
		} else {
			update_option( 'st-data497', '' );
		}

		if ( isset( $_POST['st-data498'] ) && $_POST['st-data498'] ) {
			update_option( 'st-data498', $_POST['st-data498'] );
		} else {
			update_option( 'st-data498', '' );
		}

		if ( isset( $_POST['st-data499'] ) && $_POST['st-data499'] ) {
			update_option( 'st-data499', $_POST['st-data499'] );
		} else {
			update_option( 'st-data499', '' );
		}

		if ( isset( $_POST['st-data500'] ) && $_POST['st-data500'] ) {
			update_option( 'st-data500', $_POST['st-data500'] );
		} else {
			update_option( 'st-data500', '' );
		}

		if ( isset( $_POST['st-data505'] ) && $_POST['st-data505'] ) {
			update_option( 'st-data505', $_POST['st-data505'] );
		} else {
			update_option( 'st-data505', '' );
		}

		if ( isset( $_POST['st-data506'] ) && $_POST['st-data506'] ) {
			update_option( 'st-data506', $_POST['st-data506'] );
		} else {
			update_option( 'st-data506', '' );
		}

		if ( isset( $_POST['st-data507'] ) && $_POST['st-data507'] ) {
			update_option( 'st-data507', $_POST['st-data507'] );
		} else {
			update_option( 'st-data507', '' );
		}

		if ( isset( $_POST['st-data522'] ) && $_POST['st-data522'] ) {
			update_option( 'st-data522', $_POST['st-data522'] );
		} else {
			update_option( 'st-data522', '' );
		}

		// アソシエイト連携 562~563

		if ( isset( $_POST['st-data564'] ) && $_POST['st-data564'] ) {
			update_option( 'st-data564', $_POST['st-data564'] );
		} else {
			update_option( 'st-data564', '' );
		}

		//  アソシエイト連携 565

		// 絶対値に変換して保存
		if ( isset( $_POST['st-data569'] ) && $_POST['st-data569'] ) {
			$abs_stdata569 = abs( $_POST['st-data569'] );
			update_option( 'st-data569', $abs_stdata569 );
		} else {
			update_option( 'st-data569', '' );
		}

		if ( isset( $_POST['st-data570'] ) && $_POST['st-data570'] ) {
			$abs_stdata570 = abs( $_POST['st-data570'] );
			update_option( 'st-data570', $abs_stdata570 );
		} else {
			update_option( 'st-data570', '' );
		}

		if ( isset( $_POST['st-data571'] ) && $_POST['st-data571'] ) {
			$abs_stdata571 = abs( $_POST['st-data571'] );
			update_option( 'st-data571', $abs_stdata571 );
		} else {
			update_option( 'st-data571', '' );
		}

		if ( isset( $_POST['st-data572'] ) && $_POST['st-data572'] ) {
			$abs_stdata572 = abs( $_POST['st-data572'] );
			update_option( 'st-data572', $abs_stdata572 );
		} else {
			update_option( 'st-data572', '' );
		}

		if ( isset( $_POST['st-data573'] ) && $_POST['st-data573'] ) {
			update_option( 'st-data573', $_POST['st-data573'] );
		} else {
			update_option( 'st-data573', '' );
		}

		if ( isset( $_POST['st-data574'] ) && $_POST['st-data574'] ) {
			update_option( 'st-data574', $_POST['st-data574'] );
		} else {
			update_option( 'st-data574', '' );
		}

		if ( isset( $_POST['st-data575'] ) && $_POST['st-data575'] ) {
			update_option( 'st-data575', $_POST['st-data575'] );
		} else {
			update_option( 'st-data575', '' );
		}

		if ( isset( $_POST['st-data576'] ) && $_POST['st-data576'] ) {
			update_option( 'st-data576', $_POST['st-data576'] );
		} else {
			update_option( 'st-data576', '' );
		}

		if ( isset( $_POST['st-data577'] ) && $_POST['st-data577'] ) {
			update_option( 'st-data577', $_POST['st-data577'] );
		} else {
			update_option( 'st-data577', '' );
		}

		if ( isset( $_POST['st-data578'] ) && $_POST['st-data578'] ) {
			update_option( 'st-data578', $_POST['st-data578'] );
		} else {
			update_option( 'st-data578', '' );
		}

		if ( isset( $_POST['st-data579'] ) && $_POST['st-data579'] ) {
			update_option( 'st-data579', $_POST['st-data579'] );
		} else {
			update_option( 'st-data579', '' );
		}

		if ( isset( $_POST['st-data580'] ) && $_POST['st-data580'] ) {
			update_option( 'st-data580', $_POST['st-data580'] );
		} else {
			update_option( 'st-data580', '' );
		}

		if ( isset( $_POST['st-data581'] ) && $_POST['st-data581'] ) {
			update_option( 'st-data581', $_POST['st-data581'] );
		} else {
			update_option( 'st-data581', '' );
		}

		if ( isset( $_POST['st-data582'] ) && $_POST['st-data582'] ) {
			update_option( 'st-data582', $_POST['st-data582'] );
		} else {
			update_option( 'st-data582', '' );
		}

		if ( isset( $_POST['st-data583'] ) && $_POST['st-data583'] ) {
			update_option( 'st-data583', $_POST['st-data583'] );
		} else {
			update_option( 'st-data583', '' );
		}

		if ( isset( $_POST['st-data584'] ) && $_POST['st-data584'] ) {
			if ( st_is_experimental_mode_enabled() ) {
				update_option( 'st-data584', $_POST['st-data584'] );
			}
		} else {
			update_option( 'st-data584', '' );
		}

		if ( isset( $_POST['st-data585'] ) && $_POST['st-data585'] ) {
			update_option( 'st-data585', $_POST['st-data585'] );
		} else {
			update_option( 'st-data585', '' );
		}

		if ( isset( $_POST['st-data586'] ) && $_POST['st-data586'] ) {
			update_option( 'st-data586', $_POST['st-data586'] );
		} else {
			update_option( 'st-data586', '' );
		}

		if ( isset( $_POST['st-data587'] ) && $_POST['st-data587'] ) {
			update_option( 'st-data587', $_POST['st-data587'] );
		} else {
			update_option( 'st-data587', '' );
		}

		if ( isset( $_POST['st-data588'] ) && $_POST['st-data588'] ) {
			update_option( 'st-data588', $_POST['st-data588'] );
		} else {
			update_option( 'st-data588', '' );
		}

		if ( isset( $_POST['st-data592'] ) && $_POST['st-data592'] ) {
			update_option( 'st-data592', $_POST['st-data592'] );
		} else {
			update_option( 'st-data592', '' );
		}

		if ( isset( $_POST['st-data593'] ) && $_POST['st-data593'] ) {
			update_option( 'st-data593', $_POST['st-data593'] );
		} else {
			update_option( 'st-data593', '' );
		}

		if ( isset( $_POST['st-data594'] ) && $_POST['st-data594'] ) {
			update_option( 'st-data594', $_POST['st-data594'] );
		} else {
			update_option( 'st-data594', '' );
		}

		if ( isset( $_POST['st-data595'] ) && $_POST['st-data595'] ) {
			update_option( 'st-data595', $_POST['st-data595'] );
		} else {
			update_option( 'st-data595', '' );
		}

		if ( isset( $_POST['st-data596'] ) && $_POST['st-data596'] ) {
			update_option( 'st-data596', $_POST['st-data596'] );
		} else {
			update_option( 'st-data596', '' );
		}

		if ( isset( $_POST['st-data597'] ) && $_POST['st-data597'] ) {
			update_option( 'st-data597', $_POST['st-data597'] );
		} else {
			update_option( 'st-data597', '' );
		}

		if ( isset( $_POST['st-data598'] ) && $_POST['st-data598'] ) {
			update_option( 'st-data598', $_POST['st-data598'] );
		} else {
			update_option( 'st-data598', '' );
		}

		if ( isset( $_POST['st-data599'] ) && $_POST['st-data599'] ) {
			update_option( 'st-data599', $_POST['st-data599'] );
		} else {
			update_option( 'st-data599', '' );
		}

		if ( isset( $_POST['st-data600'] ) && $_POST['st-data600'] ) {
			update_option( 'st-data600', $_POST['st-data600'] );
		} else {
			update_option( 'st-data600', '' );
		}

		if ( isset( $_POST['st-data601'] ) && $_POST['st-data601'] ) {
			update_option( 'st-data601', $_POST['st-data601'] );
		} else {
			update_option( 'st-data601', '' );
		}

		if ( isset( $_POST['st-data602'] ) && $_POST['st-data602'] ) {
			update_option( 'st-data602', $_POST['st-data602'] );
		} else {
			update_option( 'st-data602', '' );
		}

		if ( isset( $_POST['st-data603'] ) && $_POST['st-data603'] ) {
			update_option( 'st-data603', $_POST['st-data603'] );
		} else {
			update_option( 'st-data603', '' );
		}

		if ( isset( $_POST['st-data604'] ) && $_POST['st-data604'] ) {
			update_option( 'st-data604', $_POST['st-data604'] );
		} else {
			update_option( 'st-data604', '' );
		}

		if ( isset( $_POST['st-data605'] ) && $_POST['st-data605'] ) {
			update_option( 'st-data605', $_POST['st-data605'] );
		} else {
			update_option( 'st-data605', '' );
		}

		if ( isset( $_POST['st-data606'] ) && $_POST['st-data606'] ) {
			update_option( 'st-data606', $_POST['st-data606'] );
		} else {
			update_option( 'st-data606', '' );
		}

		if ( isset( $_POST['st-data607'] ) && $_POST['st-data607'] ) {
			update_option( 'st-data607', $_POST['st-data607'] );
		} else {
			update_option( 'st-data607', '' );
		}

		if ( isset( $_POST['st-data608'] ) && $_POST['st-data608'] ) {
			update_option( 'st-data608', $_POST['st-data608'] );
		} else {
			update_option( 'st-data608', '' );
		}

		if ( isset( $_POST['st-data609'] ) && $_POST['st-data609'] ) {
			update_option( 'st-data609', $_POST['st-data609'] );
		} else {
			update_option( 'st-data609', '' );
		}

		if ( isset( $_POST['st-data610'] ) && $_POST['st-data610'] ) {
			update_option( 'st-data610', $_POST['st-data610'] );
		} else {
			update_option( 'st-data610', '' );
		}

		if ( isset( $_POST['st-data611'] ) && $_POST['st-data611'] ) {
			update_option( 'st-data611', $_POST['st-data611'] );
		} else {
			update_option( 'st-data611', '' );
		}

		if ( isset( $_POST['st-data613'] ) && $_POST['st-data613'] ) {
			update_option( 'st-data613', $_POST['st-data613'] );
		} else {
			update_option( 'st-data613', '' );
		}

		if ( isset( $_POST['st-data614'] ) && $_POST['st-data614'] ) {
			update_option( 'st-data614', $_POST['st-data614'] );
		} else {
			update_option( 'st-data614', '' );
		}

		if ( isset( $_POST['st-data615'] ) && $_POST['st-data615'] ) {
			update_option( 'st-data615', $_POST['st-data615'] );
		} else {
			update_option( 'st-data615', '' );
		}

		if ( isset( $_POST['st-data616'] ) && $_POST['st-data616'] ) {
			update_option( 'st-data616', $_POST['st-data616'] );
		} else {
			update_option( 'st-data616', '' );
		}

		if ( isset( $_POST['st-data617'] ) && $_POST['st-data617'] ) {
			update_option( 'st-data617', $_POST['st-data617'] );
		} else {
			update_option( 'st-data617', '' );
		}

		if ( isset( $_POST['st-data618'] ) && $_POST['st-data618'] ) {
			update_option( 'st-data618', $_POST['st-data618'] );
		} else {
			update_option( 'st-data618', '' );
		}

		if ( isset( $_POST['st-data619'] ) && $_POST['st-data619'] ) {
			update_option( 'st-data619', $_POST['st-data619'] );
		} else {
			update_option( 'st-data619', '' );
		}

		if ( isset( $_POST['st-data620'] ) && $_POST['st-data620'] ) {
			update_option( 'st-data620', $_POST['st-data620'] );
		} else {
			update_option( 'st-data620', '' );
		}

		if ( isset( $_POST['st-data624'] ) && $_POST['st-data624'] ) {
			update_option( 'st-data624', $_POST['st-data624'] );
		} else {
			update_option( 'st-data624', '' );
		}

		if ( isset( $_POST['st-data625'] ) && $_POST['st-data625'] ) {
			update_option( 'st-data625', $_POST['st-data625'] );
		} else {
			update_option( 'st-data625', '' );
		}

		if ( isset( $_POST['st-data626'] ) && $_POST['st-data626'] ) {
			update_option( 'st-data626', $_POST['st-data626'] );
		} else {
			update_option( 'st-data626', '' );
		}

		if ( isset( $_POST['st-data627'] ) && $_POST['st-data627'] ) {
			update_option( 'st-data627', $_POST['st-data627'] );
		} else {
			update_option( 'st-data627', '' );
		}

		if ( isset( $_POST['st-data628'] ) && $_POST['st-data628'] ) {
			update_option( 'st-data628', $_POST['st-data628'] );
		} else {
			update_option( 'st-data628', '' );
		}

		if ( isset( $_POST['st-data629'] ) && $_POST['st-data629'] ) {
			update_option( 'st-data629', $_POST['st-data629'] );
		} else {
			update_option( 'st-data629', '' );
		}

		if ( isset( $_POST['st-data630'] ) && $_POST['st-data630'] ) {
			update_option( 'st-data630', $_POST['st-data630'] );
		} else {
			update_option( 'st-data630', '' );
		}

		if ( isset( $_POST['st-data631'] ) && $_POST['st-data631'] ) {
			update_option( 'st-data631', $_POST['st-data631'] );
		} else {
			update_option( 'st-data631', '' );
		}

		if ( isset( $_POST['st-data632'] ) && $_POST['st-data632'] ) {
			update_option( 'st-data632', $_POST['st-data632'] );
		} else {
			update_option( 'st-data632', '' );
		}

		if ( isset( $_POST['st-data633'] ) && $_POST['st-data633'] ) {
			update_option( 'st-data633', $_POST['st-data633'] );
		} else {
			update_option( 'st-data633', '' );
		}

		if ( isset( $_POST['st-data634'] ) && $_POST['st-data634'] ) {
			update_option( 'st-data634', $_POST['st-data634'] );
		} else {
			update_option( 'st-data634', '' );
		}

		if ( isset( $_POST['st-data635'] ) && $_POST['st-data635'] ) {
			update_option( 'st-data635', $_POST['st-data635'] );
		} else {
			update_option( 'st-data635', '' );
		}

		if ( isset( $_POST['st-data636'] ) && $_POST['st-data636'] ) {
			update_option( 'st-data636', $_POST['st-data636'] );
		} else {
			update_option( 'st-data636', '' );
		}

		if ( isset( $_POST['st-data637'] ) && $_POST['st-data637'] ) {
			update_option( 'st-data637', $_POST['st-data637'] );
		} else {
			update_option( 'st-data637', '' );
		}

		if ( isset( $_POST['st-data638'] ) && $_POST['st-data638'] ) {
			update_option( 'st-data638', $_POST['st-data638'] );
		} else {
			update_option( 'st-data638', '' );
		}

		if ( isset( $_POST['st-data639'] ) && $_POST['st-data639'] ) {
			update_option( 'st-data639', $_POST['st-data639'] );
		} else {
			update_option( 'st-data639', '' );
		}

		if ( isset( $_POST['st-data640'] ) && $_POST['st-data640'] ) {
			update_option( 'st-data640', $_POST['st-data640'] );
		} else {
			update_option( 'st-data640', '' );
		}

		if ( isset( $_POST['st-data641'] ) && $_POST['st-data641'] ) {
			update_option( 'st-data641', $_POST['st-data641'] );
		} else {
			update_option( 'st-data641', '' );
		}

		if ( isset( $_POST['st-data642'] ) && $_POST['st-data642'] ) {
			update_option( 'st-data642', $_POST['st-data642'] );
		} else {
			update_option( 'st-data642', '' );
		}

		if ( isset( $_POST['st-data643'] ) && $_POST['st-data643'] ) {
			update_option( 'st-data643', $_POST['st-data643'] );
		} else {
			update_option( 'st-data643', '' );
		}

		if ( isset( $_POST['st-data644'] ) && $_POST['st-data644'] ) {
			update_option( 'st-data644', $_POST['st-data644'] );
		} else {
			update_option( 'st-data644', '' );
		}

		if ( isset( $_POST['st-data645'] ) && $_POST['st-data645'] ) {
			update_option( 'st-data645', $_POST['st-data645'] );
		} else {
			update_option( 'st-data645', '' );
		}

		if ( isset( $_POST['st-data234'] ) && $_POST['st-data234'] === 'yes' ) { // 固定ページのタイトルを非表示が有効
			update_option( 'st-data646', '' );
		} elseif ( isset( $_POST['st-data646'] ) && $_POST['st-data646'] ) {
			update_option( 'st-data646', $_POST['st-data646'] );
		} else {
			update_option( 'st-data646', '' );
		}

		if ( isset( $_POST['st-data647'] ) && $_POST['st-data647'] ) {
			update_option( 'st-data647', $_POST['st-data647'] );
		} else {
			update_option( 'st-data647', '' );
		}

		if ( isset( $_POST['st-data648'] ) && $_POST['st-data648'] ) {
			update_option( 'st-data648', $_POST['st-data648'] );
		} else {
			update_option( 'st-data648', '' );
		}

		if ( isset( $_POST['st-data649'] ) && $_POST['st-data649'] ) {
			update_option( 'st-data649', $_POST['st-data649'] );
		} else {
			update_option( 'st-data649', '' );
		}

		if ( isset( $_POST['st-data650'] ) && $_POST['st-data650'] ) {
			update_option( 'st-data650', $_POST['st-data650'] );
		} else {
			update_option( 'st-data650', '' );
		}

		if ( isset( $_POST['st-data651'] ) && $_POST['st-data651'] ) {
			update_option( 'st-data651', $_POST['st-data651'] );
		} else {
			update_option( 'st-data651', '' );
		}

		if ( isset( $_POST['st-data652'] ) && $_POST['st-data652'] ) {
			update_option( 'st-data652', $_POST['st-data652'] );
		} else {
			update_option( 'st-data652', '' );
		}

		if ( isset( $_POST['st-data653'] ) && $_POST['st-data653'] ) {
			update_option( 'st-data653', $_POST['st-data653'] );
		} else {
			update_option( 'st-data653', '' );
		}

		if ( isset( $_POST['st-data654'] ) && $_POST['st-data654'] ) {
			update_option( 'st-data654', $_POST['st-data654'] );
		} else {
			update_option( 'st-data654', '' );
		}

		if ( isset( $_POST['st-data655'] ) && $_POST['st-data655'] ) {
			update_option( 'st-data655', $_POST['st-data655'] );
		} else {
			update_option( 'st-data655', '' );
		}

		if ( isset( $_POST['st-data656'] ) && $_POST['st-data656'] ) {
			update_option( 'st-data656', $_POST['st-data656'] );
		} else {
			update_option( 'st-data656', '' );
		}

		if ( isset( $_POST['st-data657'] ) && $_POST['st-data657'] ) {
			update_option( 'st-data657', $_POST['st-data657'] );
		} else {
			update_option( 'st-data657', '' );
		}

		if ( isset( $_POST['st-data658'] ) && $_POST['st-data658'] ) {
			update_option( 'st-data658', $_POST['st-data658'] );
		} else {
			update_option( 'st-data658', '' );
		}

		if ( isset( $_POST['st-data679'] ) && $_POST['st-data679'] ) {
			update_option( 'st-data679', $_POST['st-data679'] );
		} else {
			update_option( 'st-data679', '広告' );
		}

		if ( isset( $_POST['st-data680'] ) && $_POST['st-data680'] ) {
			update_option( 'st-data680', $_POST['st-data680'] );
		} else {
			update_option( 'st-data680', '' );
		}

		if ( isset( $_POST['st-data681'] ) && $_POST['st-data681'] ) {
			update_option( 'st-data681', $_POST['st-data681'] );
		} else {
			update_option( 'st-data681', '' );
		}

		if ( isset( $_POST['st-data682'] ) && $_POST['st-data682'] ) {
			update_option( 'st-data682', $_POST['st-data682'] );
		} else {
			update_option( 'st-data682', '' );
		}

		if ( isset( $_POST['st-data683'] ) && $_POST['st-data683'] ) {
			update_option( 'st-data683', $_POST['st-data683'] );
		} else {
			update_option( 'st-data683', '' );
		}

		if ( isset( $_POST['st-data684'] ) && $_POST['st-data684'] ) {
			update_option( 'st-data684', $_POST['st-data684'] );
		} else {
			update_option( 'st-data684', '' );
		}

		if ( isset( $_POST['st-data685'] ) && $_POST['st-data685'] ) {
			update_option( 'st-data685', $_POST['st-data685'] );
		} else {
			update_option( 'st-data685', '' );
		}

		if ( isset( $_POST['st-data686'] ) && $_POST['st-data686'] ) {
			update_option( 'st-data686', $_POST['st-data686'] );
		} else {
			update_option( 'st-data686', '' );
		}

		if ( isset( $_POST['st-data687'] ) && $_POST['st-data687'] ) {
			update_option( 'st-data687', $_POST['st-data687'] );
		} else {
			update_option( 'st-data687', '' );
		}

		if ( isset( $_POST['st-data688'] ) && $_POST['st-data688'] ) {
			update_option( 'st-data688', $_POST['st-data688'] );
		} else {
			update_option( 'st-data688', '' );
		}
	}
}

if ( ! function_exists( 'st_reset_settings' ) ) {
	function st_reset_settings() {
		for ( $i = 1; $i <= 688; $i ++ ) {
			$st_delete_no = 'st-data' . $i;

			update_option( $st_delete_no, '' );
		}

		// 「Gutenberg 設定」 > 「タブブロック」の各設定。
		// `get_option()` の $default_value` 引数をそのまま反映するため削除する。
		foreach ( range( 659, 678 ) as $data ) {
			delete_option( 'st-data' . $data );
		}
	}
}

if (!function_exists('st_admin_handle_submit')) {
	/** POST をハンドリング */
	function st_admin_handle_submit() {
		$menu_slug = st_admin_get_menu_slug();

		if ( !isset( $_POST[ $menu_slug ] ) || !$_POST[ $menu_slug ] ) {
			return;
		}

		if ( !check_admin_referer( 'my-nonce-key', $menu_slug ) ) {
			return;
		}

		if ( isset( $_POST['st-data-reset'] ) ) {
			// リセット
			if ( $_POST['st-data-reset'] === 'yes' ) {
				st_reset_settings();
			}
		} else {
			// 更新
			_st_admin_handle_update();
		}

		wp_safe_redirect( menu_page_url( $menu_slug, false ) );
	}
}

add_action( 'admin_init', 'st_admin_handle_submit' );

/** 投稿ページ（メインページ） */
function st_is_home_check() {
	if ( ! is_front_page() && is_home() ) {
		return true;
	}
}

//////////////////////////////////
// カラム数変更
//////////////////////////////////

add_action( 'admin_menu', 'add_columnchange' );
add_action( 'save_post', 'save_columnck' );

function add_columnchange() {
          add_meta_box( 'columnchange1', 'カラム変更', 'insert_columnchange', 'page', 'side', 'low' );
          add_meta_box( 'columnchange1', 'カラム変更', 'insert_columnchange', 'post', 'side', 'low' );
          add_meta_box( 'columnchange1', 'カラム変更', 'insert_columnchange', 'custom', 'side', 'low' );
}

function insert_columnchange() {
     global $post;
     wp_nonce_field( wp_create_nonce( __FILE__ ), 'st_kanri' );
     $column1 = get_post_meta( $post->ID, 'columnck', true );

     if ( $column1 === 'yes' ) {
          $columnchecked = 'checked';
          $columnchecked2 = '';
          $columnchecked3 = '';
     } elseif ( $column1 === 'lp' ) {
          $columnchecked = '';
          $columnchecked2 = 'checked';
          $columnchecked3 = '';
     } else {
          $columnchecked = '';
          $columnchecked2 = '';
          $columnchecked3 = 'checked';
     }

     echo '<label class="hidden" for="columnck">カラム数</label><input type="radio" name="columnck" value="yes" ' . $columnchecked . '/>1カラムに変更する';
     echo '<br/><input type="radio" name="columnck" value="lp" ' . $columnchecked2 . '/>LP化する';
     echo '<br/><input type="radio" name="columnck" value="" ' . $columnchecked3 . '/>レイアウトをリセットする';
}

function save_columnck( $post_id ) {
     $my_nonce = isset( $_POST['st_kanri'] ) ? $_POST['st_kanri'] : null;
     if ( !wp_verify_nonce( $my_nonce, wp_create_nonce( __FILE__ ) ) ) {
          return $post_id;
     }

     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
     }
     if ( !current_user_can( 'edit_post', $post_id ) ) {
          return $post_id;
     }
     $data = $_POST['columnck'];

     if ( get_post_meta( $post_id, 'columnck' ) == "" ) {
          add_post_meta( $post_id, 'columnck', $data, true );
     } elseif ( $data != get_post_meta( $post_id, 'columnck', true ) ) {
          update_post_meta( $post_id, 'columnck', $data );
     } elseif ( $data == "" ) {
          delete_post_meta( $post_id, 'columnck', get_post_meta( $post_id, 'columnck', true ) );
     }
}

//////////////////////////////////
// index操作
//////////////////////////////////

add_action( 'admin_menu', 'st_stmeta_robots_add_metaboxr' );
add_action( 'save_post', 'st_stmeta_robots_save_stmeta_robots' );

function st_stmeta_robots_add_metaboxr() {
          add_meta_box( 'stmeta', 'index変更', 'st_stmeta_robots_stmeta_robots_dropdown_box', 'page', 'side', 'low' );
          add_meta_box( 'stmeta', 'index変更', 'st_stmeta_robots_stmeta_robots_dropdown_box', 'post', 'side', 'low' );
          add_meta_box( 'stmeta', 'index変更', 'st_stmeta_robots_stmeta_robots_dropdown_box', 'custom', 'side', 'low' );
}

// 挿入ページ

function st_stmeta_robots_stmeta_robots_dropdown_box() {
     global $post;
     wp_nonce_field( wp_create_nonce( __FILE__ ), 'st_stmeta_robots' );
     $stmeta_robots = $post->stmeta_robots;

     ?>
     <label for="stmeta_robots"></label>
     <select name="stmeta_robots" id="stmeta_robots">
          <option <?php if ( $stmeta_robots === "index, follow" ) {
               echo 'selected="selected"';
          } ?>>index, follow
          </option>
          <option <?php if ( $stmeta_robots === "index, nofollow" ) {
               echo 'selected="selected"';
          } ?>>index, nofollow
          </option>
          <option <?php if ( $stmeta_robots === "noindex, follow" ) {
               echo 'selected="selected"';
          } ?>>noindex, follow
          </option>
          <option <?php if ( $stmeta_robots === "noindex, nofollow" ) {
               echo 'selected="selected"';
          } ?>>noindex, nofollow
          </option>
     </select>
     <?php
}

// データベース登録

function st_stmeta_robots_save_stmeta_robots( $post_id ) {
     $my_nonce = isset( $_POST['st_stmeta_robots'] ) ? $_POST['st_stmeta_robots'] : null;
     if ( !wp_verify_nonce( $my_nonce, wp_create_nonce( __FILE__ ) ) ) {
          return $post_id;
     }
     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
     }
     if ( !current_user_can( 'edit_post', $post_id ) ) {
          return $post_id;
     }

     $data = $_POST['stmeta_robots'];

     if ( get_post_meta( $post_id, 'stmeta_robots' ) === "" ) {
          add_post_meta( $post_id, 'stmeta_robots', $data, true );
     } elseif ( $data !== get_post_meta( $post_id, 'stmeta_robots', true ) ) {
          update_post_meta( $post_id, 'stmeta_robots', $data );
     } elseif ( $data === "" ) {
          delete_post_meta( $post_id, 'stmeta_robots', get_post_meta( $post_id, 'stmeta_robots', true ) );
     }
}

// 表示

function st_stmeta_robots_add_stmeta_robots_tag() {
     global $post;

     if ( ( is_single() || is_page() ) && ! is_attachment() ) {
         if ( $GLOBALS["stdata9"] === '' || ( $GLOBALS["stdata9"] !== '' &&  $GLOBALS["stdata9"] != $post->ID ) ) {
              $stmeta_robots = ( empty( $post->stmeta_robots ) ) ? 'index, follow' : $post->stmeta_robots;
              echo '<meta name="robots" content="' . $stmeta_robots . '" />' . "\n";
         }
	 } elseif ( st_is_home_check() ) {
		 $postID = get_option( 'page_for_posts' );
		 $stmeta_robot = get_post_meta( $postID, 'stmeta_robots', true );
         $stmeta_robots = ( empty( $stmeta_robot ) ) ? 'index, follow' : $stmeta_robot;
         echo '<meta name="robots" content="' . $stmeta_robots . '" />' . "\n";
	 } elseif ( !is_category() && !is_tag() && is_archive() ) {
          echo '<meta name="robots" content="noindex, follow" />' . "\n";
     } else {

     }
}

add_action( 'wp_head', 'st_stmeta_robots_add_stmeta_robots_tag' );

//////////////////////////////////
// titleタグ & 記事タイトル
//////////////////////////////////

add_action( 'admin_menu', 'add_st_titlewords' );
add_action( 'save_post', 'save_st_titlewords' );

function add_st_titlewords() {
          add_meta_box( 'st_titlewords1', 'titleタグ', 'insert_st_titlewords', 'page', 'normal', 'high' );
          add_meta_box( 'st_titlewords1', 'titleタグ', 'insert_st_titlewords', 'post', 'normal', 'high' );
          add_meta_box( 'st_titlewords1', 'titleタグ', 'insert_st_titlewords', 'custom', 'normal', 'high' );
}

function insert_st_titlewords() {
	global $post;

	wp_nonce_field( wp_create_nonce( __FILE__ ), 'my_stkeywords' );

	$sttitlewords = get_post_meta( $post->ID, 'st_titlewords', true );

	?>

	<label class="hidden" for="st_titlewords">個別タイトル</label><p>※titleタグ強制書き換え（記事タイトルは変更されません） ※「トップページ（フロントページ・投稿ページ含む）」には適応されません</p>
	<input type="text" style="width:100%" placeholder="検索キーワードを含めた全角30文字以内が推奨されています" name="st_titlewords" value="<?php echo esc_attr( $sttitlewords ); ?>" data-st-counter-id="st-titlewords">

	<?php _st_kanri_counter( 'st-titlewords' ); ?>

	<?php
}

function save_st_titlewords( $post_id ) {
	$my_stkeywords = isset( $_POST['my_stkeywords'] ) ? $_POST['my_stkeywords'] : null;

	if ( ! wp_verify_nonce( $my_stkeywords, wp_create_nonce( __FILE__ ) ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	$titlewords  = isset( $_POST['st_titlewords'] ) ? $_POST['st_titlewords'] : '';

	if ( $titlewords !== '' ) {
		update_post_meta( $post_id, 'st_titlewords', $titlewords );
	} else {
		delete_post_meta( $post_id, 'st_titlewords' );
	}
}

//////////////////////////////////
// メディア
//////////////////////////////////
if ( !function_exists( 'st_media_editor_button' ) ) {
	/**
	 * メディアエディタボタンを表示
	 *
	 * @param string $name ID/URLを設定する input 要素の name 属性値
	 * @param string $label ボタンのラベル
	 * @param mixed[] $options オプション
	 *                         array(
	 *                             // クラス名
	 *                             'class'=> 'button button-secondary button-medium',
	 *                             // 挿入する値の種類
	 *                             'type' => 'id',  // `url` または `id`
	 *                         )
	 */
	function st_media_editor_button( $name, $label = 'アップロード', $options = array() ) {
		$default_options = array(
			'class' => 'button button-secondary button-medium',
			'type'  => 'url',
		);
		$options = array_merge( $default_options, $options );

		$name             = esc_attr( $name );
		$label            = esc_html( $label );
		$options['type']  = esc_attr( $options['type'] );
		$options['class'] = esc_attr( $options['class'] );

		echo <<<HTML
<button class="{$options['class']}" data-st-media-editor-button data-st-media-target="{$name}" data-st-media-type="{$options['type']}">{$label}</button>
HTML;
	}
}

if ( !function_exists( 'st_media_reset_button' ) ) {
	/**
	 * リセットボタンを表示
	 *
	 * @param string $name ID/URLを設定する input 要素の name 属性値
	 * @param string $label ボタンのラベル
	 * @param mixed[] $options オプション
	 *                         array(
	 *                             // クラス名
	 *                             'class' => 'button button-secondary button-medium'
	 *                         )
	 */
	function st_media_reset_button( $name, $label = '削除', $options = array() ) {
		$default_options = array(
			'class' => 'button button-secondary button-medium',
		);
		$options = array_merge( $default_options, $options );

		$name             = esc_attr( $name );
		$label            = esc_html( $label );
		$options['class'] = esc_attr( $options['class'] );

		echo <<<HTML
<button class="{$options['class']}" data-st-media-reset-button data-st-media-target="{$name}">{$label}</button>
HTML;
	}
}

if ( ! function_exists( 'st_media_preview' ) ) {
	/**
	 * プレビューを表示
	 *
	 * @param string $name ID/URLを設定する input 要素の name 属性値
	 * @param int $attachment_id 画像 ID
	 * @param mixed[] $options オプション
	 *                         array(
	 *                             // クラス名
	 *                             'class' => ''
	 *                         )
	 */
	function st_media_preview( $name, $attachment_id, $options = array() ) {
		$default_options = array(
			'class' => '',
		);
		$options         = array_merge( $default_options, $options );

		$name             = esc_attr( $name );
		$options['class'] = esc_attr( $options['class'] );
		$preview          = wp_get_attachment_image( $attachment_id );

		echo <<<HTML
<div class=""{$options['class']} data-st-media-preview data-st-media-target="{$name}">{$preview}</div>
HTML;
	}
}

if ( !function_exists( 'st_kanri_enqueue_media_script' ) ) {
	function st_kanri_enqueue_media_script($hook_suffix) {
		$hook_suffixes = array(
			// メディアアップローダーを利用する管理画面のURLを元に、フックサッフィクスを追加する
			//
			// 例: 管理画面のURLが http://example.com/wp-admin/admin.php?page=フックサフィックス (トップレベルページ) の場合
			//     'フックサフィックス'
			'toplevel_page_my-custom-admin',
			'term.php',
		);

		if ( !in_array( $hook_suffix, $hook_suffixes, true ) ) {
			return;
		}

		wp_enqueue_media();
		wp_enqueue_script(
			'st-media-editor',
			get_template_directory_uri() . '/js/st-media-editor.js',
			array( 'media-editor' ),
			false,
			true
		);
	}
}

add_action( 'admin_enqueue_scripts', 'st_kanri_enqueue_media_script' );

//////////////////////////////////
// エディタ
//////////////////////////////////
if ( !function_exists( 'st_editor' ) ) {
	/**
	 * エディタ (汎用) を出力
	 *
	 * @param string|null $location エディタの場所名
	 * @param string|null $name name属性値 (オプション名)
	 * @param string|null $content 内容
	 * @param mixed[] $settings エディタの設定
	 */
	function st_editor( $location = null, $name = null, $content = null, $settings = array() ) {
		if ( $location === null || $name === null ) {
			return;
		}

		// 場所別アクションフック `st_<location>_editor` をトリガー
		do_action( 'st_' . $location . '_editor', $location, $name, $content, $settings );
	}
}

if ( !function_exists( 'st_kanri_output_wysiwyg_editor' ) ) {
	/**
	 * 場所別のWYSIWYGエディタ (オリジナル管理画面) を出力
	 *
	 * @param string $location エディタの場所名
	 * @param string $name name属性値 (オプション名)
	 * @param string $content 内容
	 * @param mixed[] $settings エディタの設定
	 */
	function st_kanri_output_wysiwyg_editor( $location, $name, $content, $settings = array() ) {
		$editor_id                 = ( $location !== null ) ? ( 'st-' . $location . '-wysiwyg-editor' ) : 'st-wysiwyg-editor';
		$settings['textarea_name'] = $name;
		$content                   = ( $content !== null ) ? $content : stripslashes( get_option( $name, '' ) );

		wp_editor( $content, $editor_id, $settings );
	}
}

if (!function_exists('st_kanri_wysiwyg_editor')) {
	/**
	 * WYSIWYGエディタ (オリジナル管理画面) を出力
	 *
	 * @param string|null $location エディタの場所名
	 * @param string|null $name name属性値 (オプション名)
	 * @param string|null $content 内容
	 * @param mixed[] $settings エディタの設定
	 *                          array(
	 *                              'wpautop'          => false,    // 内容を自動整形するかどうか (true / false)
	 *                              'media_buttons'    => true,     // メディアボタンを表示するかどうか (true / false)
	 *                              'textarea_rows'    => 10,       // テキストエリアの rows 属性値
	 *                              'tabindex'         => null,     // テキストエリアの tabindex 属性値
	 *                              'editor_css'       => '',       // テキストエリアのCSS
	 *                              'editor_class'     => '',       // テキストエリアの class 属性値
	 *                              'editor_height'    => 320,      // テキストエリアの高さ (px)
	 *                              'teeny'            => false,    // ツールバーのボタンを最小限にするかどうか (true / false)
	 *                              'dfw'              => false,    // フルスクリーンエディタを置換するかどうか (カスタマイズ用) (true / false)
	 *                              'tinymce'          => true,     // TinyMCE (WP標準のエディタと同じ形式) にするかどうか (true / false)
	 *                              'quicktags'        => true,     // Quicktags (テキストタブ) を有効にするかどうか (true / false)
	 *                              'drag_drop_upload' => false,    // ドラッグ & ドロップでアップロードできるようにするかどうか (true / false)
	 *                          )
	 */
	function st_kanri_wysiwyg_editor( $location = null, $name = null, $content = null, $settings = array() ) {
		add_action( 'st_' . $location . '_editor', 'st_kanri_output_wysiwyg_editor', 10, 4 );

		st_editor( $location, $name, $content, $settings );
	}
}

//////////////////////////////////
// メタキーワード
//////////////////////////////////

add_action( 'admin_menu', 'add_st_keywords' );
add_action( 'save_post', 'save_st_keywords' );

function add_st_keywords() {
          add_meta_box( 'st_keywords1', 'メタキーワード', 'insert_st_keywords', 'page', 'normal', 'high' );
          add_meta_box( 'st_keywords1', 'メタキーワード', 'insert_st_keywords', 'post', 'normal', 'high' );
          add_meta_box( 'st_keywords1', 'メタキーワード', 'insert_st_keywords', 'custom', 'normal', 'high' );
}

function insert_st_keywords() {
     global $post;
     wp_nonce_field( wp_create_nonce( __FILE__ ), 'my_stkeywords' );
     $stkeywords = get_post_meta( $post->ID, 'st_keywords', true );
     $stkeywords = esc_attr( $stkeywords );
     echo '<label class="hidden" for="st_keywords">メタキーワード</label><p>複数指定する場合は半角カンマ「,」で区切ってください</p><input type="text" style="width:100%" placeholder="松,竹,梅" name="st_keywords" value="'.$stkeywords.'" />';

}

function save_st_keywords( $post_id ) {
     $my_stkeywords = isset( $_POST['my_stkeywords'] ) ? $_POST['my_stkeywords'] : null;
     if ( !wp_verify_nonce( $my_stkeywords, wp_create_nonce( __FILE__ ) ) ) {
          return $post_id;
     }

     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
     }
     if ( !current_user_can( 'edit_post', $post_id ) ) {
          return $post_id;
     }
     $data = $_POST['st_keywords'];

     if ( get_post_meta( $post_id, 'st_keywords' ) == "" ) {
          add_post_meta( $post_id, 'st_keywords', $data, true );
     } elseif ( $data != get_post_meta( $post_id, 'st_keywords', true ) ) {
          update_post_meta( $post_id, 'st_keywords', $data );
     } elseif ( $data == "" ) {
          delete_post_meta( $post_id, 'st_keywords', get_post_meta( $post_id, 'st_keywords', true ) );
     }
}

// 表示

function st_keywords_source() {
     if ( ! st_is_home_check() && is_single() or is_page() && ! is_front_page() ) {
          global $wp_query;
          $postID = $wp_query->post->ID;
          $stkeywords = get_post_meta( $postID, 'st_keywords', true );
	 } elseif ( st_is_home_check() ) { // 投稿ページ（メインページ）
          $postID = get_option( 'page_for_posts' );
          $stkeywords = get_post_meta( $postID, 'st_keywords', true );
     } else {
          $stkeywords = '';
     };
     if (isset( $stkeywords ) && trim( $stkeywords ) !== '') {
     echo '<meta name="keywords" content="' . esc_attr($stkeywords) . '">'. "\n";
     }  else {
     }
}
add_action( 'wp_head', 'st_keywords_source' );

//////////////////////////////////
// メタディスクリプション
//////////////////////////////////

add_action( 'admin_menu', 'add_st_description' );
add_action( 'save_post', 'save_st_description' );

function add_st_description() {
          add_meta_box( 'st_description1', 'メタディスクリプション', 'insert_st_description', 'page', 'normal', 'high' );
          add_meta_box( 'st_description1', 'メタディスクリプション', 'insert_st_description', 'post', 'normal', 'high' );
          add_meta_box( 'st_description1', 'メタディスクリプション', 'insert_st_description', 'custom', 'normal', 'high' );
}

function insert_st_description() {
     global $post;
     wp_nonce_field( wp_create_nonce( __FILE__ ), 'my_stdescription' );
     $stdescription = get_post_meta( $post->ID, 'st_description', true );
     $stdescription = esc_html( $stdescription );
     ?>

	<label class="hidden" for="st_description">メタディスクリプション</label>
	<p>全角120文字程度に納めましょう</p>
	<textarea style="width:100%" rows="4" name="st_description" data-st-counter-id="st-description" /><?php echo $stdescription; ?></textarea>
	<?php _st_kanri_counter( 'st-description' ); ?>

	<?php

}

function save_st_description( $post_id ) {
     $my_stdescription = isset( $_POST['my_stdescription'] ) ? $_POST['my_stdescription'] : null;
     if ( !wp_verify_nonce( $my_stdescription, wp_create_nonce( __FILE__ ) ) ) {
          return $post_id;
     }

     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
     }
     if ( !current_user_can( 'edit_post', $post_id ) ) {
          return $post_id;
     }

     if ( isset( $_POST['st_description'] ) && $_POST['st_description'] ) {
     	$data = $_POST['st_description'];
	}else{
     	$data = '';
	}

     if ( get_post_meta( $post_id, 'st_description' ) == "" ) {
          add_post_meta( $post_id, 'st_description', $data, true );
     } elseif ( $data != get_post_meta( $post_id, 'st_description', true ) ) {
          update_post_meta( $post_id, 'st_description', $data );
     } elseif ( $data == "" ) {
          delete_post_meta( $post_id, 'st_description', get_post_meta( $post_id, 'st_description', true ) );
     }
}

// 表示

function st_description_source() {
     if ( ! st_is_home_check() && is_single() or is_page() && !is_front_page() ) {
          global $wp_query;
          $postID = $wp_query->post->ID;
          $stdescription = get_post_meta( $postID, 'st_description', true );
	 } elseif ( st_is_home_check() ) { // 投稿ページ（メインページ）
          $postID = get_option( 'page_for_posts' );
          $stdescription = get_post_meta( $postID, 'st_description', true );
     } else {
          $stdescription = '';
     };
     if (isset( $stdescription ) && trim( $stdescription ) !== '') {
     echo '<meta name="description" content="' . esc_attr($stdescription) .'">'. "\n";
     }  else {
     }
}
add_action( 'wp_head', 'st_description_source' );

//////////////////////////////////
// 広告明記（個別）
//////////////////////////////////

add_action( 'add_meta_boxes', 'st_add_ad_meta_boxes' );
add_action( 'save_post', 'st_save_ad_meta_box' );

if ( ! function_exists( 'st_add_ad_meta_boxes' ) ) {
	/**
	 * @return void
	 */
	function st_add_ad_meta_boxes() {
		add_meta_box( 'st_display_ad', '広告明記', 'st_display_ad_meta_box', 'page', 'side', 'low' );
		add_meta_box( 'st_display_ad', '広告明記', 'st_display_ad_meta_box', 'post', 'side', 'low' );
		add_meta_box( 'st_display_ad', '広告明記', 'st_display_ad_meta_box', 'custom', 'side', 'low' );
	}
}

if ( ! function_exists( 'st_display_ad_meta_boxes' ) ) {
	/**
	 * @param WP_Post $post
	 *
	 * @return void
	 */
	function st_display_ad_meta_box( WP_Post $post ) {
		$globally_display_ad_mark = get_option( 'st-data651', '' ); // 「広告」を明記する（投稿・固定記事）
		$display_ad_mark          = get_post_meta( $post->ID, 'st_display_ad_mark', true );
		$display_ad_mark_hide     = get_post_meta( $post->ID, 'st_display_ad_mark_hide', true );

		?>
		<label class="hidden" for="st_display_ad_mark">広告表記</label>

		<?php if ( $globally_display_ad_mark ): // 「広告」を一括で明記する（投稿・固定記事） ?>
			<p style="color:#ff0000;">※一括表示設定が有効中</p>
			<input
				type="checkbox" name="st_display_ad_mark_hide" value="yes"
				<?php checked( $display_ad_mark_hide, 'yes' ); ?>
			>
			「広告」を非表示にする
		<?php else: ?>
			<input
				type="checkbox" name="st_display_ad_mark" value="yes"
				<?php checked( $display_ad_mark, 'yes' ); ?>
				<?php disabled( $globally_display_ad_mark, 'yes' ) ?>
			>
			「広告」を明記する
		<?php endif; ?>

		<?php wp_nonce_field( wp_create_nonce( __FILE__ ), 'st_ad_meta_box' ); ?>
		<?php
	}
}

if ( ! function_exists( 'st_save_ad_meta_box' ) ) {
	/**
	 * @param int $post_id
	 *
	 * @return void
	 */
	function st_save_ad_meta_box( $post_id ) {
		$nonce = filter_input( INPUT_POST, 'st_ad_meta_box' );

		if ( ! wp_verify_nonce( $nonce, wp_create_nonce( __FILE__ ) ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$display_ad_mark = (string) filter_input( INPUT_POST, 'st_display_ad_mark' );
		$display_ad_mark_hide = (string) filter_input( INPUT_POST, 'st_display_ad_mark_hide' );

		// 「広告」を明記する
		if ( $display_ad_mark !== '' ) {
			update_post_meta( $post_id, 'st_display_ad_mark', $display_ad_mark );
			delete_post_meta( $post_id, 'st_display_ad_mark_hide', get_post_meta( $post_id, 'st_display_ad_mark_hide', true ) );
		} else {
			delete_post_meta( $post_id, 'st_display_ad_mark', get_post_meta( $post_id, 'st_display_ad_mark', true ) );
		}

		// 「広告」を非表示にする
		if ( $display_ad_mark_hide !== '' ) {
			update_post_meta( $post_id, 'st_display_ad_mark_hide', $display_ad_mark_hide );
			delete_post_meta( $post_id, 'st_display_ad_mark', get_post_meta( $post_id, 'st_display_ad_mark', true ) );
		} else {
			delete_post_meta( $post_id, 'st_display_ad_mark_hide', get_post_meta( $post_id, 'st_display_ad_mark_hide', true ) );
		}
	}
}

//////////////////////////////////
// テキストの選択
//////////////////////////////////

add_action( 'admin_menu', 'add_textcopyck' );
add_action( 'save_post', 'save_textcopyck' );

function add_textcopyck() {
          add_meta_box( 'textcopyck1', 'コピー防止', 'insert_textcopyck', 'page', 'side', 'low' );
          add_meta_box( 'textcopyck1', 'コピー防止', 'insert_textcopyck', 'post', 'side', 'low' );
          add_meta_box( 'textcopyck1', 'コピー防止', 'insert_textcopyck', 'custom', 'side', 'low' );
}

function insert_textcopyck() {
     global $post;
     wp_nonce_field( wp_create_nonce( __FILE__ ), 'st_kanri' );
     $textcopyckmark = get_post_meta( $post->ID, 'textcopyck', true );

     if ( $textcopyckmark === 'yes' ) {
          $textcopychecked = 'checked';
     } else {
          $textcopychecked = '';
     }

     echo '<label class="hidden" for="textcopyck">コピー防止</label><input type="checkbox"  name="textcopyck" value="yes" ' . $textcopychecked . '/>設定に関わらずテキスト選択可';

}

function save_textcopyck( $post_id ) {
     $my_nonce = isset( $_POST['st_kanri'] ) ? $_POST['st_kanri'] : null;
     if ( !wp_verify_nonce( $my_nonce, wp_create_nonce( __FILE__ ) ) ) {
          return $post_id;
     }

     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
     }
     if ( !current_user_can( 'edit_post', $post_id ) ) {
          return $post_id;
     }

     if ( isset( $_POST['textcopyck'] ) && $_POST['textcopyck'] ) {
     	$data = $_POST['textcopyck'];
	}else{
     	$data = '';
	}

     if ( get_post_meta( $post_id, 'textcopyck' ) == "" ) {
          add_post_meta( $post_id, 'textcopyck', $data, true );
     } elseif ( $data != get_post_meta( $post_id, 'textcopyck', true ) ) {
          update_post_meta( $post_id, 'textcopyck', $data );
     } elseif ( $data == "" ) {
          delete_post_meta( $post_id, 'textcopyck', get_post_meta( $post_id, 'textcopyck', true ) );
     }
}

//////////////////////////////////
// メタボックス: アイキャッチ関連
//////////////////////////////////

if (!function_exists('st_admin_display_eyecatch_meta_box')) {
    function st_admin_display_eyecatch_meta_box() {
	    global $post;

	    wp_nonce_field( wp_create_nonce( __FILE__ ), 'st_eyecatch_meta_box' );

	    $use_copyright_url     = ( get_post_meta( $post->ID, 'st_copyright', true ) === 'yes' );
	    $copyright_html        = get_post_meta( $post->ID, 'st_copyurl', true );
	    $force_insert_eyecatch = ( get_post_meta( $post->ID, 'eyecatch_set', true ) === 'yes' );
	    if ( st_is_ver_ex() ) {
			$st_youtube_url        = get_post_meta( $post->ID, 'st_youtube_url', true );
			$use_youtube_eyecatch  = ( get_post_meta( $post->ID, 'st_youtube_eyecatch', true ) === 'yes' );
		}
	    ?>

		<p>
			<label class="hidden" for="st_copyright">コピーライト設定</label>
			<input id="st_copyright" type="checkbox" name="st_copyright"
			   value="yes"<?php checked( $use_copyright_url ); ?>>写真クレジットにサイトURLを使用
		</p>
		<p>
			<label class="hidden" for="st_copyurl">Photo Credit url</label>
			<input id="st_copyurl" type="text" style="width: 100%;"
				   placeholder="任意のテキスト" name="st_copyurl"
				   value="<?php echo esc_attr( $copyright_html ); ?>">
		</p>
		<?php if ( st_is_ver_ex() ) { ?>
			<p>
				YouTubeサムネイルを使用（動画ID）<br/>
				<input id="st_youtube_url" type="text" style="width: 100%;"
					   placeholder="YouTube動画IDのみ記入" name="st_youtube_url"
					   value="<?php echo esc_attr( $st_youtube_url ); ?>">
			<label class="hidden" for="st_youtube_eyecatch">アイキャッチ動画設定</label>
			<input id="st_youtube_eyecatch" type="checkbox" name="st_youtube_eyecatch"
			   value="yes"<?php checked( $use_youtube_eyecatch ); ?>>アイキャッチを動画に変更
			</p>
		<?php } ?>

		<p>
			<label class="hidden" for="eyecatch_set">アイキャッチ設定</label>
			<input id="eyecatch_set" type="checkbox" name="eyecatch_set"
				   value="yes"<?php checked( $force_insert_eyecatch ); ?>>設定に関わらずアイキャッチ挿入
		</p>

	    <?php
    }
}

if ( ! function_exists( 'st_admin_add_eyecatch_meta_boxes' ) ) {
	function st_admin_add_eyecatch_meta_boxes() {
		add_meta_box( 'st_eyecatch', 'アイキャッチ関連', 'st_admin_display_eyecatch_meta_box', 'page', 'side', 'low' );
		add_meta_box( 'st_eyecatch', 'アイキャッチ関連', 'st_admin_display_eyecatch_meta_box', 'post', 'side', 'low' );
		add_meta_box( 'st_eyecatch', 'アイキャッチ関連', 'st_admin_display_eyecatch_meta_box', 'custom', 'side', 'low' );
	}
}
add_action( 'add_meta_boxes', 'st_admin_add_eyecatch_meta_boxes' );

if ( ! function_exists( 'st_admin_save_eyecatch_meta_box' ) ) {
	function st_admin_save_eyecatch_meta_box( $post_id ) {
		$nonce = filter_input( INPUT_POST, 'st_eyecatch_meta_box' );

		if ( ! wp_verify_nonce( $nonce, wp_create_nonce( __FILE__ ) ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$use_copyright_url     = (string) filter_input( INPUT_POST, 'st_copyright' );
		$copyright_html        = (string) filter_input( INPUT_POST, 'st_copyurl' );
		if ( st_is_ver_ex() ) {
			$st_youtube_url        = (string) filter_input( INPUT_POST, 'st_youtube_url' );
			$use_youtube_eyecatch  = (string) filter_input( INPUT_POST, 'st_youtube_eyecatch' );
		}
		$force_insert_eyecatch = (string) filter_input( INPUT_POST, 'eyecatch_set' );

		if ( $use_copyright_url === 'yes' ) {
			update_post_meta( $post_id, 'st_copyright', $use_copyright_url );
		} else {
			delete_post_meta( $post_id, 'st_copyright', get_post_meta( $post_id, 'st_copyright', true ) );
		}

		if ( $copyright_html !== '' ) {
			update_post_meta( $post_id, 'st_copyurl', $copyright_html );
		} else {
			delete_post_meta( $post_id, 'st_copyurl', get_post_meta( $post_id, 'st_copyurl', true ) );
		}

		if ( st_is_ver_ex() ) {
			if ( $st_youtube_url !== '' ) {
				update_post_meta( $post_id, 'st_youtube_url', $st_youtube_url );
			} else {
				delete_post_meta( $post_id, 'st_youtube_url', get_post_meta( $post_id, 'st_youtube_url', true ) );
			}
			if ( $use_youtube_eyecatch === 'yes' ) {
				update_post_meta( $post_id, 'st_youtube_eyecatch', $use_youtube_eyecatch );
			} else {
				delete_post_meta( $post_id, 'st_youtube_eyecatch', get_post_meta( $post_id, 'st_youtube_eyecatch', true ) );
			}
		}

		if ( $force_insert_eyecatch === 'yes' ) {
			update_post_meta( $post_id, 'eyecatch_set', $force_insert_eyecatch );
		} else {
			delete_post_meta( $post_id, 'eyecatch_set', get_post_meta( $post_id, 'eyecatch_set', true ) );
		}
	}
}
add_action( 'save_post', 'st_admin_save_eyecatch_meta_box' );

//////////////////////////////////
// メタボックス: 非表示設定関連
//////////////////////////////////

if (!function_exists('st_admin_display_display_settings_meta_box')) {
	function st_admin_display_display_settings_meta_box() {
		global $post;

		wp_nonce_field( wp_create_nonce( __FILE__ ), 'st_display_settings_meta_box' );

		$hide_header_widget        = ( get_post_meta( $post->ID, 'headerwidget_set', true ) === 'yes' );
		$hide_kanren_widget        = ( get_post_meta( $post->ID, 'kanrenwidget_set', true ) === 'yes' );
		$hide_ikkatu_widget        = ( get_post_meta( $post->ID, 'ikkatuwidget_set', true ) === 'yes' );
		$hide_koukoku              = ( get_post_meta( $post->ID, 'koukoku_set', true ) === 'yes' );
		$hide_auto_adsense_koukoku = ( get_post_meta( $post->ID, 'auto_adsense_koukoku_set', true ) === 'yes' );
		?>

		<?php // 投稿のみ ?>

		<label class="hidden" for="headerwidget_set">ヘッダー表示設定</label>
		<input id="headerwidget_set" type="checkbox" name="headerwidget_set"
			  value="yes"<?php checked( $hide_header_widget ); ?>>ヘッダーを表示しない<br>

		<?php if ( get_post_type( $post ) === 'post' ): ?>
			<label class="hidden" for="kanrenwidget_set">関連記事設定</label>
			<input id="kanrenwidget_set" type="checkbox" name="kanrenwidget_set"
				   value="yes"<?php checked( $hide_kanren_widget ); ?>>関連記事を表示しない<br>
		<?php endif; ?>

		<label class="hidden" for="ikkatuwidget_set">一括表示設定</label>
		<input id="ikkatuwidget_set" type="checkbox" name="ikkatuwidget_set"
			   value="yes"<?php checked( $hide_ikkatu_widget ); ?>>一括表示を表示しない<br>

		<label class="hidden" for="auto_adsense_koukoku_set">アドセンス自動広告設定</label>
		<input id="auto_adsense_koukoku_set" type="checkbox" name="auto_adsense_koukoku_set"
			   value="yes"<?php checked( $hide_auto_adsense_koukoku ); ?>>自動広告を表示しない<br>

		<label class="hidden" for="koukoku_set">広告設定</label>
		<input id="koukoku_set" type="checkbox" name="koukoku_set"
			   value="yes"<?php checked( $hide_koukoku ); ?>>設定内の広告を表示しない

		<?php
	}
}

if ( ! function_exists( 'st_admin_add_display_settings_meta_boxes' ) ) {
	function st_admin_add_display_settings_meta_boxes() {
		add_meta_box(
			'st_display_settings',
			'非表示設定関連',
			'st_admin_display_display_settings_meta_box',
			'page',
			'side',
			'low'
		);
		add_meta_box(
			'st_display_settings',
			'非表示設定関連',
			'st_admin_display_display_settings_meta_box',
			'post',
			'side',
			'low'
		);
		add_meta_box(
			'st_display_settings',
			'非表示設定関連',
			'st_admin_display_display_settings_meta_box',
			'custom',
			'side',
			'low'
		);
	}
}
add_action( 'add_meta_boxes', 'st_admin_add_display_settings_meta_boxes' );

if ( ! function_exists( 'st_admin_save_display_settings_meta_box' ) ) {
	function st_admin_save_display_settings_meta_box( $post_id, $post ) {
		$nonce = filter_input( INPUT_POST, 'st_display_settings_meta_box' );

		if ( ! wp_verify_nonce( $nonce, wp_create_nonce( __FILE__ ) ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$hide_header_widget        = (string) filter_input( INPUT_POST, 'headerwidget_set' );
		$hide_kanren_widget        = (string) filter_input( INPUT_POST, 'kanrenwidget_set' );
		$hide_ikkatu_widget        = (string) filter_input( INPUT_POST, 'ikkatuwidget_set' );
		$hide_koukoku              = (string) filter_input( INPUT_POST, 'koukoku_set' );
		$hide_auto_adsense_koukoku = (string) filter_input( INPUT_POST, 'auto_adsense_koukoku_set' );

		// 投稿のみ
		if ( $post->post_type === 'post' ) {
			if ( $hide_kanren_widget === 'yes' ) {
				update_post_meta( $post_id, 'kanrenwidget_set', $hide_kanren_widget );
			} else {
				delete_post_meta( $post_id, 'kanrenwidget_set', get_post_meta( $post_id, 'kanrenwidget_set', true ) );
			}
		}
		

		if ( $hide_header_widget === 'yes' ) {
			update_post_meta( $post_id, 'headerwidget_set', $hide_header_widget );
		} else {
			delete_post_meta( $post_id, 'headerwidget_set', get_post_meta( $post_id, 'headerwidget_set', true ) );
		}

		if ( $hide_ikkatu_widget === 'yes' ) {
			update_post_meta( $post_id, 'ikkatuwidget_set', $hide_ikkatu_widget );
		} else {
			delete_post_meta( $post_id, 'ikkatuwidget_set', get_post_meta( $post_id, 'ikkatuwidget_set', true ) );
		}

		if ( $hide_koukoku === 'yes' ) {
			update_post_meta( $post_id, 'koukoku_set', $hide_koukoku );
		} else {
			delete_post_meta( $post_id, 'koukoku_set', get_post_meta( $post_id, 'koukoku_set', true ) );
		}

		if ( $hide_auto_adsense_koukoku === 'yes' ) {
			update_post_meta( $post_id, 'auto_adsense_koukoku_set', $hide_auto_adsense_koukoku );
		} else {
			delete_post_meta(
				$post_id,
				'auto_adsense_koukoku_set',
				get_post_meta( $post_id, 'auto_adsense_koukoku_set', true )
			);
		}
	}
}
add_action( 'save_post', 'st_admin_save_display_settings_meta_box', 10, 2 );

//////////////////////////////////
// リダイレクト
//////////////////////////////////

add_action( 'admin_menu', 'add_st_redirect' );
add_action( 'save_post', 'save_st_redirect' );

function add_st_redirect() {
	add_meta_box( 'st_redirect1', 'リダイレクトURL', 'insert_st_redirect', 'page', 'normal', 'low' );
	add_meta_box( 'st_redirect1', 'リダイレクトURL', 'insert_st_redirect', 'post', 'normal', 'low' );
	add_meta_box( 'st_redirect1', 'リダイレクトURL', 'insert_st_redirect', 'custom', 'normal', 'low' );
}

function insert_st_redirect() {
	global $post;

	wp_nonce_field( wp_create_nonce( __FILE__ ), 'my_stredirect' );

	$st_redirect                = get_post_meta( $post->ID, 'st_redirect', true );
	$st_redirect_url_as_canonical = (bool) get_post_meta( $post->ID, 'st_redirect_url_as_canonical', true );
	?>

	<label class="hidden" for="st_redirect">リダイレクトURL</label>
	<p>リダイレクトするURL</p>
	<input type="text" name="st_redirect" value="<?php echo esc_url( $st_redirect); ?>" style="width:100%" placeholder="https://exsample.com">
	<input type="checkbox" name="st_redirect_url_as_canonical" value="1"<?php checked($st_redirect_url_as_canonical); ?>>
	canonical に変更
	<?php do_action( 'st_redirect_meta_box_html_after', $post ); ?>

	<?php
}

function save_st_redirect( $post_id ) {
	$nonce = (string) filter_input( INPUT_POST, 'my_stredirect' );

	if ( ! wp_verify_nonce( $nonce, wp_create_nonce( __FILE__ ) ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return $post_id;
	}

	$st_redirect          = (string) filter_input( INPUT_POST, 'st_redirect' );
	$previous_st_redirect = get_post_meta( $post_id, 'st_redirect', true );

	if ( $st_redirect !== $previous_st_redirect ) {
		update_post_meta( $post_id, 'st_redirect', $st_redirect );
	} elseif ( $st_redirect === '' ) {
		delete_post_meta( $post_id, 'st_redirect', $previous_st_redirect );
	}

	$st_redirect_url_as_canonical = (bool) filter_input( INPUT_POST, 'st_redirect_url_as_canonical' );

	if ( $st_redirect_url_as_canonical ) {
		update_post_meta( $post_id, 'st_redirect_url_as_canonical', 1 );
	} else {
		delete_post_meta( $post_id, 'st_redirect_url_as_canonical', 1 );
	}

	do_action( 'st_post_save_redirect_meta_box', get_post( $post_id ) );
}

// リダイレクト

if (!function_exists('st_redirect_to_specified_url')) {
	/**
	 * @see st_redirect_source()
	 * @see st_redirect_to_canonical_paged_url()
	 */
	function st_redirect_to_specified_url() {
		$is_page = is_page();

		if ( is_front_page() || ( ! is_single() && ( ! st_is_home_check() && ! $is_page ) ) ) {
			return;
		}

		$post = get_queried_object();

		if ( st_is_home_check() ) { // 投稿ページ（メインページ）
        	$post_id = get_option( 'page_for_posts', null );
		} else {
			$post_id = isset( $post->ID ) ? $post->ID : null;
		}

		if ( $post_id === null ) {
			return;
		}

		$is_redirect_page = ( $is_page && get_page_template_slug( $post_id ) === 'page-redirect.php' );

		// リダイレクト専用ページは何もしない (meta タグでリダイレクトするため)
		if ( $is_redirect_page ) {
			do_action( 'st_pre_redirect_to_specified_url', $post );

			return;
		}

		$redirect_url                  = trim( get_post_meta( $post_id, 'st_redirect', true ) );
		$use_redirect_url_as_canonical = (bool) get_post_meta( $post_id, 'st_redirect_url_as_canonical', true );

		if ( $redirect_url === '' || $use_redirect_url_as_canonical ) {
			return;
		}

		do_action( 'st_pre_redirect_to_specified_url', $post );
		wp_redirect( $redirect_url );

		exit;
	}
}

add_action( 'template_redirect', 'st_redirect_to_specified_url' );

// 表示

if (!function_exists('st_redirect_source')) {
	/**
	 * リダイレクト専用ページ (page-redirect.php) のリダイレクト
	 *
	 * @see st_redirect_to_specified_url()
	 * @see st_redirect_to_canonical_paged_url()
	 */
	function st_redirect_source() {
		if ( is_front_page() || ( ! st_is_home_check() && ! is_page() ) ) {
			return;
		}

		$post_id          = get_queried_object_id();
		if ( st_is_home_check() ) { // 投稿ページ（メインページ）
        	$post_id = get_option( 'page_for_posts' );
		}

		$is_redirect_page = ( get_page_template_slug( $post_id ) === 'page-redirect.php' );

		// リダイレクト専用ページ以外は何もしない (HTTP ヘッダーでリダイレクトするため)
		if ( ! $is_redirect_page ) {
			return;
		}

		$redirect_url                  = trim( get_post_meta( $post_id, 'st_redirect', true ) );
		$use_redirect_url_as_canonical = (bool) get_post_meta( $post_id, 'st_redirect_url_as_canonical', true );

		if ( $redirect_url === '' || $use_redirect_url_as_canonical ) {
			return;
		}

		echo '<meta http-equiv="refresh" content="0; URL=' . esc_url( stripslashes( $redirect_url ) ) . '">';
	}
}

add_action( 'wp_head', 'st_redirect_source' );

if ( ! function_exists( 'st_get_canonical_url' ) ) {
	/** @see amp_get_canonical_url() */
	function st_get_canonical_url( $canonical_url, WP_Post $post ) {
		$use_redirect_url_as_canonical = trim( get_post_meta( $post->ID, 'st_redirect_url_as_canonical', true ) );

		if ( ! $use_redirect_url_as_canonical || is_front_page() ) {
			return $canonical_url;
		}

		$redirect_url = trim( get_post_meta( $post->ID, 'st_redirect', true ) );

		if ( $redirect_url !== '' ) {
			return $redirect_url;
		}

		return $canonical_url;
	}
}

add_filter( 'get_canonical_url', 'st_get_canonical_url', 10, 2 );

//////////////////////////////////
// head / footerに出力するコード
//////////////////////////////////
if (current_user_can('manage_options')) { //level10のユーザーの場合
	add_action( 'admin_menu', 'add_st_head_code' );
	add_action( 'save_post', 'save_st_head_code' );
}

function add_st_head_code() {
          add_meta_box( 'st_head_code1', 'head / footerに出力するコード（フロントページを除く）', 'insert_st_head_code', 'page', 'normal', 'low' );
          add_meta_box( 'st_head_code1', 'head / footerに出力するコード', 'insert_st_head_code', 'post', 'normal', 'low' );
          add_meta_box( 'st_head_code1', 'head / footerに出力するコード', 'insert_st_head_code', 'custom', 'normal', 'low' );
}

function insert_st_head_code() {
     global $post;
     wp_nonce_field( wp_create_nonce( __FILE__ ), 'my_sthead_code' );
     $sthead_code = get_post_meta( $post->ID, 'st_head_code', true );
     $sthead_code = stripslashes ( $sthead_code );
	echo '<label class="hidden" for="st_head_code">headに出力するコード</label><p><code>wp_head</code>に出力します</p><textarea style="width:100%" rows="4" type="text" name="st_head_code" />'.$sthead_code.'</textarea>';

     wp_nonce_field( wp_create_nonce( __FILE__ ), 'my_stfooter_code' );
     $stfooter_code = get_post_meta( $post->ID, 'st_footer_code', true );
     $stfooter_code = stripslashes ( $stfooter_code );
     echo '<label class="hidden" for="st_footer_code">footerに出力するコード</label><p><code>wp_footer</code>に出力します</p><textarea style="width:100%" rows="4" type="text" name="st_footer_code" />'.$stfooter_code.'</textarea><p style="color:#f44336;" class="komozi">※エスケープ処理されません</p>';

}

function save_st_head_code( $post_id ) {
	// head
     $my_sthead_code = isset( $_POST['my_sthead_code'] ) ? $_POST['my_sthead_code'] : null;
     if ( !wp_verify_nonce( $my_sthead_code, wp_create_nonce( __FILE__ ) ) ) {
          return $post_id;
     }

     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
     }
     if ( !current_user_can( 'edit_post', $post_id ) ) {
          return $post_id;
     }

     if ( isset( $_POST['st_head_code'] ) && $_POST['st_head_code'] ) {
     	$data = $_POST['st_head_code'];
	}else{
     	$data = '';
	}

     if ( get_post_meta( $post_id, 'st_head_code' ) == "" ) {
          add_post_meta( $post_id, 'st_head_code', $data, true );
     } elseif ( $data != get_post_meta( $post_id, 'st_head_code', true ) ) {
          update_post_meta( $post_id, 'st_head_code', $data );
     } elseif ( $data == "" ) {
          delete_post_meta( $post_id, 'st_head_code', get_post_meta( $post_id, 'st_head_code', true ) );
     }

	// footer
     $my_stfooter_code = isset( $_POST['my_stfooter_code'] ) ? $_POST['my_stfooter_code'] : null;
     if ( !wp_verify_nonce( $my_stfooter_code, wp_create_nonce( __FILE__ ) ) ) {
          return $post_id;
     }

     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
     }
     if ( !current_user_can( 'edit_post', $post_id ) ) {
          return $post_id;
     }

     if ( isset( $_POST['st_footer_code'] ) && $_POST['st_footer_code'] ) {
     	$data = $_POST['st_footer_code'];
	}else{
     	$data = '';
	}

     if ( get_post_meta( $post_id, 'st_footer_code' ) == "" ) {
          add_post_meta( $post_id, 'st_footer_code', $data, true );
     } elseif ( $data != get_post_meta( $post_id, 'st_footer_code', true ) ) {
          update_post_meta( $post_id, 'st_footer_code', $data );
     } elseif ( $data == "" ) {
          delete_post_meta( $post_id, 'st_footer_code', get_post_meta( $post_id, 'st_footer_code', true ) );
     }
}

// 表示

// header
function st_head_code_source() {
     if ( ! st_is_home_check() && is_single() or is_page() && !is_front_page() ) {
          global $wp_query;
          $postID = $wp_query->post->ID;
          $sthead_code = get_post_meta( $postID, 'st_head_code', true );
	 } elseif ( st_is_home_check() ) { // 投稿ページ（メインページ）
          $postID = get_option( 'page_for_posts' );
          $sthead_code = get_post_meta( $postID, 'st_head_code', true );
     } else {
          $sthead_code = '';
     };
     if (isset( $sthead_code ) && trim( $sthead_code ) !== '') {
     echo stripslashes ( $sthead_code ). "\n";
     }  else {
     }
}
add_action( 'wp_head', 'st_head_code_source' );

// footer
function st_footer_code_source() {
     if ( ! st_is_home_check() && is_single() or is_page() && !is_front_page() ) {
          global $wp_query;
          $postID = $wp_query->post->ID;
          $stfooter_code = get_post_meta( $postID, 'st_footer_code', true );
	 } elseif ( st_is_home_check() ) { // 投稿ページ（メインページ）
          $postID = get_option( 'page_for_posts' );
          $stfooter_code = get_post_meta( $postID, 'st_footer_code', true );
     } else {
          $stfooter_code = '';
     };
     if (isset( $stfooter_code ) && trim( $stfooter_code ) !== '') {
     echo stripslashes ( $stfooter_code ). "\n";
     }  else {
     }
}
add_action( 'wp_footer', 'st_footer_code_source' );

//////////////////////////////////
// 記事ごとのヘッダーデザイン
//////////////////////////////////
if ( current_user_can( 'manage_options' ) ) { //level10のユーザーの場合
	if ( ! function_exists( 'st_add_post_header_under_code_meta_box' ) ) {
		function st_add_post_header_under_code_meta_box() {
			add_meta_box(
				'st_post_header_under_code1',
				'記事ごとのヘッダーデザイン（フロントページを除く）',
				'st_display_post_header_under_code_meta_box',
				'page',
				'normal',
				'low'
			);

			add_meta_box(
				'st_post_header_under_code1',
				'記事ごとのヘッダーデザイン',
				'st_display_post_header_under_code_meta_box',
				array( 'post', 'custom' ),
				'normal',
				'low'
			);
		}
	}

	add_action( 'add_meta_boxes', 'st_add_post_header_under_code_meta_box' );
	add_action( 'save_post', 'st_save_post_header_under_code_meta_box' );
}

if ( ! function_exists( 'st_display_post_header_under_code_meta_box' ) ) {
	function st_display_post_header_under_code_meta_box( WP_Post $post ) {
		$html           = get_post_meta( $post->ID, 'st_post_header_under_code', true );
		$html           = stripslashes( $html );
		$show_post_info = ( get_post_meta( $post->ID, 'post_data_updatewidget_set', true ) === 'yes' );
		$bg_type        = get_post_meta( $post->ID, 'st_post_header_under_bg', true );
		?>

		<label class="hidden" for="post_data_updatewidget_set">記事情報</label>
		<input id="post_data_updatewidget_set" type="checkbox" name="post_data_updatewidget_set" value="yes"<?php checked( $show_post_info ); ?>> 記事情報を表示
		<p>
			<label style="margin-right: 1em;"><input type="radio" name="st_post_header_under_bg" value="" <?php checked( $bg_type, '' ); ?>> 何もしない</label>
			<label><input type="radio" name="st_post_header_under_bg" value="thumbnail" <?php checked( $bg_type, 'thumbnail' ); ?>> 背景をアイキャッチ画像に</label>
			<label><input type="radio" name="st_post_header_under_bg" value="thumbnail_dark" <?php checked( $bg_type, 'thumbnail_dark' ); ?>> 背景をアイキャッチ画像に（ダーク）</label>
		</p>
		<p><b>出力するソース(「記事情報を表示」有効化時は使用不可）</b></p>
		<label class="hidden" for="st_post_header_under_code">出力するソース</label>
		<textarea style="width:100%" rows="4" type="text" name="st_post_header_under_code"
		          placeholder="<?php echo esc_attr( '<div class="st-content-width">コンテンツ</div>' ); ?>"><?php echo $html; ?></textarea>
		<br/>
		<span class="komozi" style="color:#f44336;">※エスケープ処理されません（LP非対応）</span>

		<?php wp_nonce_field( wp_create_nonce( __FILE__ ), 'st_post_header_under_code_nonce' ); ?>

		<?php
	}
}

if ( ! function_exists( 'st_save_post_header_under_code_meta_box' ) ) {
	function st_save_post_header_under_code_meta_box( $post_id ) {
		$nonce = isset( $_POST['st_post_header_under_code_nonce'] ) ? $_POST['st_post_header_under_code_nonce'] : null;

		if ( ! wp_verify_nonce( $nonce, wp_create_nonce( __FILE__ ) ) ) {
			return;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$html          = (string) filter_input( INPUT_POST, 'st_post_header_under_code' );
		$previous_html = get_post_meta( $post_id, 'st_post_header_under_code', true );

		if ( $previous_html !== $html ) {
			update_post_meta( $post_id, 'st_post_header_under_code', $html );
		} elseif ( $html === '' ) {
			delete_post_meta( $post_id, 'st_post_header_under_code', $previous_html );
		}

		// 記事情報を表示
		$show_post_info          = (string) filter_input( INPUT_POST, 'post_data_updatewidget_set' );
		$previous_show_post_info = get_post_meta( $post_id, 'post_data_updatewidget_set', true );

		if ( $show_post_info === 'yes' ) {
			update_post_meta( $post_id, 'post_data_updatewidget_set', 'yes' );
		} else {
			delete_post_meta( $post_id, 'post_data_updatewidget_set', $previous_show_post_info );
		}

		// 背景画像にアイキャッチ画像を設定
		$bg_type          = (string) filter_input( INPUT_POST, 'st_post_header_under_bg' );
		$previous_bg_type = get_post_meta( $post_id, 'st_post_header_under_bg', true );

		if ( $previous_bg_type !== $bg_type ) {
			update_post_meta( $post_id, 'st_post_header_under_bg', $bg_type );
		} elseif ( $bg_type === '' ) {
			delete_post_meta( $post_id, 'st_post_header_under_bg', $previous_bg_type );
		}
	}
}

/** HTML ソースを表示 */
if ( ! function_exists( 'st_post_header_under_code' ) ) {
	function st_post_header_under_code() {
		if ( is_front_page() || ( ! is_single() && ! is_page() ) ) {
			return;
		}

		$post_id = get_queried_object_id();
		$html    = get_post_meta( $post_id, 'st_post_header_under_code', true );

		echo stripslashes( $html );
	}
}

//////////////////////////////////
// 動画背景
//////////////////////////////////
if ( ! function_exists( 'st_get_background_video_url' ) ) {
	function st_get_background_video_url() {
		$enable_for_mobile  = ( get_option( 'st-data493', '' ) === 'yes' ); // スマホにも反映
		$video_url_sp = get_option( 'st-data683', '' );
		if( st_is_mobile() && st_is_ver_ex() && $video_url_sp && $enable_for_mobile ){
			return st_is_ver_ex() ? trim( get_option( 'st-data683', '' ) ) : ''; // 背景に流す動画 URL(スマホ)
		} else {
			return st_is_ver_ex() ? trim( get_option( 'st-data492', '' ) ) : ''; // 背景に流す動画 URL
		}
	}
}

if ( ! function_exists( 'st_is_background_video_available' ) ) {
	function st_is_background_video_available( $type = null ) {
		$enable_for_mobile  = ( get_option( 'st-data493', '' ) === 'yes' ); // スマホにも反映
		$youtube_id_sp = get_option( 'st-data682', '' );
		if( st_is_mobile() && st_is_ver_ex() && $youtube_id_sp && $enable_for_mobile ){
			$youtube_id         = trim( get_option( 'st-data682', '' ) ); // 背景に流す YouTube ID(スマホ)
		} else {
			$youtube_id         = trim( get_option( 'st-data110', '' ) ); // 背景に流す YouTube ID
		}
		$video_url          = st_get_background_video_url();
		$play_on_background = ( trim( get_option( 'st-data111', '' ) ) !== '' ); // 動画を背景で流す
		$play_on_all_pages  = ( trim( get_option( 'st-data116', '' ) ) === 'yes' ); // 動画を全ページに

		if ( ! $play_on_background  ) {
			//return false;
		}

		if ( $youtube_id === '' && $video_url === '' ) {
			return false;
		}

		if ( $type === 'youtube' && ( $youtube_id === '' || $video_url !== '' ) ) {
			return false;
		}

		if ( $type === 'raw' && ( ! st_is_ver_ex() || $video_url === '' ) ) {
			return false;
		}

		if ( ! $enable_for_mobile && st_is_mobile() ) {
			return false;
		}

		return is_front_page() ? true : $play_on_all_pages;
	}
}

if ( ! function_exists( 'st_background_youtube_options' ) ) {
	function st_background_youtube_options() {
		$enable_for_mobile = ( get_option( 'st-data493', '' ) === 'yes' );
		$youtube_id_sp = get_option( 'st-data682', '' );
		if( st_is_mobile() && st_is_ver_ex() && $youtube_id_sp && $enable_for_mobile ){
			$video_id          = get_option( 'st-data682', '' );
		} else {
			$video_id          = get_option( 'st-data110', '' );
		}
		$loop              = ( get_option( 'st-data114', '' ) === 'yes' );
		$mute              = ( $enable_for_mobile && st_is_mobile() )
			? true
			: ( get_option( 'st-data112', '' ) !== 'yes' );

		$options = array(
			'youtube' => array(
				'videoId'    => $video_id,
				'playerVars' => array(
					'loop' => (int) $loop,
				),
			),
			'mute'    => (int) $mute,
		);

		if ( $loop ) {
			$options['youtube']['playerVars']['playlist'] = $video_id;
		}

		return $options;
	}
}

//////////////////////////////////
// カウンター
//////////////////////////////////
if (!function_exists('_st_kanri_counter')) {
	function _st_kanri_counter( $id, $target_type = 'data-id' ) {
    	?>

		<div class="st-counter" data-st-counter data-st-counter-target="<?php echo esc_attr( $id ); ?>"
		     data-st-counter-target-type="<?php echo esc_attr( $target_type ); ?>">
			<p class="st-counter-status">
				<span class="st-counter-label">現在文字数：</span><!--
			 --><span class="st-counter-count"><!--
				 --><span class="st-counter-number" data-st-counter-count>-</span><!--
				 --><span class="st-counter-unit">文字</span><!--
			 --></span>
			</p>
		</div>

		<?php
    }
}

if ( ! function_exists( '_st_kanri_counter_before_permalink' ) ) {
	function _st_kanri_counter_before_permalink( WP_Post $post ) {
		if ( ! in_array( $post->post_type, array( 'post', 'page', 'custom' ), true ) ) {
			return;
		}

		_st_kanri_counter( 'title', 'id' );
	}
}

add_action( 'edit_form_before_permalink', '_st_kanri_counter_before_permalink' );

if ( ! function_exists( '_st_kanri_enqueue_counter_script' ) ) {
	function _st_kanri_enqueue_counter_script( $hook_suffix ) {
		$hook_suffixes = array( 'post-new.php', 'post.php' );

		if ( ! in_array( $hook_suffix, $hook_suffixes, true ) ) {
			return;
		}

		wp_enqueue_script(
			'st-media-editor',
			get_template_directory_uri() . '/js/st-counter.js',
			array( 'jquery' ),
			false,
			true
		);
	}
}

add_action( 'admin_enqueue_scripts', '_st_kanri_enqueue_counter_script' );
