<?php
/**
 * User: yayoi
 * Date: 2018/02/11
 * Time: 1:57
 */
require_once dirname( __FILE__ ) . '/yyi_rinker_abstract.php';
require_once dirname( __FILE__ ) . '/lib/paapiv5.php';

class Yyi_Rinker_Plugin extends Yyi_Rinker_Abstract_Base {

	public $admin_style_css_url		= '';
	public $style_css_ur			= '';
	public $loading_img_url			= '';

	public $script_event_tracking_url = '';
	public $script_front_url = '';

	public $moshimo_shops_check = null;

	public $is_tracking = false;

	public $amazon_traccking_id = '';
	public $rakuten_affiliate_id = '';

	public $yahoo_linkswitch = '';
	public $yahoo_pid = '';
	public $yahoo_sid = '';

    public $mercari_id = '';

	public $is_yahoo_id = false;
	public $style_css_url = '';

	//フリーHTMLのデフォルト
	public $freelink_free_comment = '';
	public $amazon_free_comment = '';
	public $rakuten_free_comment = '';

	//価格を非表示にするかどうか
	public $is_no_price_disp_column = false;

	//再取得するかどうか
	public $is_no_reapi_column = false;

	//target blankにするかどうか
	public $is_target_blank = false;

	//relにいれる内容
	public $rel_text= self::REL_TEXT;

	public $design_type_val = self::DESIGN_TYPE_NORMAL;

	public $is_lazyload = false;

	public function __construct(){
		$this->admin_style_css_url		= plugins_url( 'css/admin_style.css', __FILE__ ) . '?v=' . self::FILE_VERSION;
		$this->style_css_url			= plugins_url( 'css/style.css', __FILE__ ). '?v=' . self::FILE_VERSION;
		$this->script_admin_rinker_url	= plugins_url( 'js/admin-rinker.js', __FILE__ ). '?v=' . self::FILE_VERSION;
		$this->loading_img_url			= plugins_url( 'img/loading.gif', __FILE__ );
		$this->arrow_right_img_url		= plugins_url( 'img/arrow-right.png', __FILE__ );
		$this->arrow_left_img_url		= plugins_url( 'img/arrow-left.png', __FILE__ );

		//基本設定
		$this->is_no_price_disp_column		= !!( get_option( $this->option_column_name( self::IS_NO_PRICE_DISP_COLUMN ), false ) );
		$this->is_no_reapi_column			= !!( get_option( $this->option_column_name( self::IS_NO_REAPI_COLUMN ), false ) );
		//もしもの設定
		$this->moshimo_amazon_id	= trim( get_option( $this->option_column_name( self::MOSHIMO_AMAZON_ID_COLUMN ), '' ) );
		$this->moshimo_yahoo_id		= trim( get_option( $this->option_column_name( self::MOSHIMO_YAHOO_ID_COLUMN ), '' ) );
		$this->moshimo_rakuten_id	= trim( get_option( $this->option_column_name( self::MOSHIMO_RAKUTEN_ID_COLUMN ), '' ) );
		//もしもにするかどうか
		$this->moshimo_shops_check	= trim( get_option( $this->option_column_name( self::MOSHIMO_SHOPS_CHECK_COLUMN ) , 0 ) );

		//トラッキング設定
		$this->is_tracking = !!get_option( $this->option_column_name( self::IS_TRACKING_OPTION_COLUMN ) , false );
		$this->script_event_tracking_url	= plugins_url( 'js/event-tracking.js', __FILE__ ) . '?v=' . self::FILE_VERSION;

		//フロントのJS　今は画像切り替え時にのみ利用している
		$this->is_some_images = !!get_option( $this->option_column_name( self::IS_SOME_IMAGES ) , false );
		$this->script_front_url	= plugins_url( 'js/front.js', __FILE__ ) . '?v=' . self::FILE_VERSION;

		//AmazonトラッキングID
		$this->amazon_traccking_id	= get_option( $this->option_column_name( self::AMAZON_TRACCKING_ID_COLUMN ) );
		//楽天アフィリエイトID
		$this->rakuten_affiliate_id	= get_option( $this->option_column_name( self::RAKUTEN_AFFILIATE_ID ) );

		//楽天アフィリエイトID
		$this->rakuten_application_id = get_option( $this->option_column_name( self::RAKUTEN_APPLICATION_ID ), self::RAKUTEN_DEV_APPLICATION_ID );
		if (strlen($this->rakuten_application_id) === 0) {
			$this->rakuten_application_id = self::RAKUTEN_DEV_APPLICATION_ID;
		}

		//Yahoo
		$this->yahoo_linkswitch = get_option( $this->option_column_name( self:: LINKSWITCH_TAG_OPTION_COLUMN ) );
		$this->yahoo_pid = get_option( $this->option_column_name( self::YAHOO_PID_OPTION_COLUMN ) );
		$this->yahoo_sid = get_option( $this->option_column_name( self::YAHOO_SID_OPTION_COLUMN ) );

        //Mercari
        $this->mercari_id = get_option( $this->option_column_name( self::MERCARI_ID_OPTION_COLUMN ) );

		//フリーHTML
		$this->amazon_free_comment = get_option( $this->option_column_name( self::AMAZON_FREE_COMMENT_COLUMN ) );
		$this->rakuten_free_comment = get_option( $this->option_column_name( self::RAKUTEN_FREE_COMMENT_COLUMN ) );

		$this->rel_text =  get_option( $this->option_column_name( self::REL_TEXT_COLUMN ), self::REL_TEXT );

		add_action( 'init', array( $this, 'create_link_post_type' ) );

		if ( is_admin() ) {
			add_action( 'admin_init', array( $this, 'admin_init') );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_load_styles') );
			add_action( 'admin_enqueue_scripts', array( $this, 'add_admin_script' ) );

			add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
			add_action( 'admin_menu', array( $this, 'add_meta_boxes' ) );
			add_action( 'admin_menu', array( $this, 'remove_meta_boxes' ) );
			add_action( 'admin_head', array( $this, 'add_thickbox' ) );

			add_action( 'save_post_'. self::LINK_POST_TYPE, array( $this, 'save_links_fields' ) );

			add_action( 'media_upload_' . $this->media_type,  array($this, 'media_upload_iframe') );
			add_filter( $this->add_prefix( 'add_terms_select_for_search' ),  array( $this, 'add_terms_select_for_search' ));
			add_filter( $this->add_prefix( 'add_sort_select_for_search' ),  array( $this, 'add_sort_select_for_search' ));

			//apiから検索
			add_action( "wp_ajax_yyi_rinker_search_amazon" , array($this, 'search_amazon_from_api') );
			add_action( "wp_ajax_yyi_rinker_search_rakuten" , array($this, 'search_rakuten_from_api') );

			add_action( 'wp_ajax_yyi_rinker_relink', array( $this, 'relink_from_api' ) );
			add_action( 'wp_ajax_yyi_rinker_add_item', array( $this, 'add_item' ) );

			add_action( 'wp_ajax_yyi_rinker_search_itemlist', array( $this, 'search_itemlist' ) );

			add_action( 'wp_ajax_yyi_rinker_delete_all_cache', array( $this, 'delete_all_cache' ) );
			add_filter( $this->add_prefix( 'media_upload_tabs' ), array( $this, 'add_item_list_search_tab' ) );

			//ダッシュボード
			add_action( 'wp_dashboard_setup', array( $this, 'info_dashboard_widgets' ) );

			//商品リンク一覧にショートコードと利用記事を表示
			add_filter( 'manage_' . self::LINK_POST_TYPE . '_posts_columns', array( $this, 'manage_linkinfo_posts_columns' ));
			add_action( 'manage_' . self::LINK_POST_TYPE . '_posts_custom_column', array( $this, 'manage_linkinfo_post_custom_column' ), 10, 2 );

			add_filter( 'manage_edit-' . self::LINK_TERM_NAME . '_columns', array( $this, 'manage_term_linkinfo_posts_columns' ));
			add_filter( 'manage_' . self::LINK_TERM_NAME . '_custom_column', array( $this, 'manage_term_linkinfo_post_custom_column' ), 10, 3);

			add_action( 'restrict_manage_posts', array( $this, 'add_search_term_dropdown' ), 10, 2 );
			add_action( 'restrict_manage_posts',  array( $this, 'add_link_type' ), 10, 2 );
			add_filter( 'query_vars', array( $this, 'add_link_type_vars' ), 10, 2 );
			add_filter( 'posts_where',  array( $this, 'posts_where_link_type' ), 10, 2 );

			add_action('add_meta_boxes', array($this, 'add_meta_box_shortcode'));
			add_action('add_meta_boxes', array($this, 'add_meta_box_used_post_id'));
		} else {
			add_action( 'wp_enqueue_scripts', array( $this, 'delete_styles' ), 11);
			add_action( 'wp_head', array( $this, 'add_linkswitch_tag' ) );
			add_action( 'wp_head', array( $this, 'switch_design_type' ) );
			add_action( 'wp_head', array( $this, 'base_desing_set' ) );

			add_action( 'wp_enqueue_scripts', array( $this, 'add_front_styles' ) );
		}

		add_action( 'init', array( $this, 'set_esign_types' ) );
		add_shortcode( 'itemlink', array( $this, 'shotcode' ) );
		add_shortcode( 'itemlinks', array( $this, 'linksshotcode' ) );

		add_filter( $this->add_prefix( 'meta_data_update_init' ), array( $this, 'check_id_amazon_detail' ), 10 );
		add_filter( $this->add_prefix( 'meta_data_update_init' ), array( $this, 'check_id_rakuten_detail' ), 11 );
		add_filter( $this->add_prefix( 'meta_data_update' ), array( $this, 'is_no_price_disp' ), 9, 2 );
		add_filter( $this->add_prefix( 'meta_data_update' ), array( $this, 'upate_html_data' ), 10, 2 );

		//本体のlazy_loadが有効かどうか
		add_filter( 'wp_lazy_loading_enabled', array( $this, 'set_lazyload'), 100 );

		//デザイン追加用フィルター
		add_filter('yyi_rinker_custom_design_types', array( $this, 'add_rinker_design'), 8);


		//shortcode_paramsの設定
		$this->custom_shortcode_params();

		//カスタムフィールドの設定
		$this->custom_field_params();

		//target blankの設定
		$this->set_is_target_blank();

		//shop_typ 設定
		$this->shop_types();

	}

	/**
	 * lazyloadの設定を追加する
	 * @param $is_lazyload
	 */
	public function set_lazyload($is_lazyload) {
		if (!!$is_lazyload) {
			$this->is_lazyload = true;
		}
		return $is_lazyload;
	}

	public function add_rinker_design( $design_types ) {
		//labelは設定selectボックスに表示されます
		//funcはCSSを返す関数名を記載します
		$design_types[10] = ['label' => 'スタイルアップ', 'func' => 'yyi_rinker_style_up_design'];
		return $design_types;
	}

	/**
	 * 別デザインの取得$attrより
	 * @param $attr
	 * @return string
	 */
	public function each_design_class_attr($attr) {
		return isset($attr['design']) ? $this->each_design_class($attr['design']) : '';
	}

	/**
	 * 個別デザインの取得
	 * @param $type
	 * @return string
	 */
	public function each_design_class($type) {
		return isset($this->each_designs[$type]) ? $this->each_designs[$type]['class_name'] : '';
	}

	/**
	 * リンクを表示させないデザイン
	 * @param $attr
	 * @return bool
	 */
	public function is_links_hidden($attr) {
		return isset($attr['design']) &&  isset($this->each_designs[$attr['design']]) && $this->each_designs[$attr['design']]['links_hidden'];
	}

	/**
	 * サムネイルデザインかどうか
	 * @param $attr
	 * @return bool
	 */
	public function is_thumd($attr) {
		return isset($attr['design']) &&  isset($this->each_designs[$attr['design']]) && $attr['design'] === self::DESIGN_CODE_THUMB;
	}

	public function add_meta_box_shortcode() {
		global $pagenow;
		if ( $pagenow !== 'post-new.php') {
			add_meta_box(
				$this->add_prefix('shortcode_side_meta_box'),
				'ショートコード',
				array($this, 'insert_side_meta_fields'),
				self::LINK_POST_TYPE,
				'side');
		}
	}

	public function insert_side_meta_fields ( $post ) {
		echo '<textarea readonly="readonly" class="yyi-rinker-list-shortcode">[itemlink post_id="' . esc_html( $post->ID ) . '"]</textarea>';
		echo '<p class="description">(クリックでコピー)</p>';
	}

	public function add_meta_box_used_post_id() {
		global $pagenow;
		if ( $pagenow !== 'post-new.php') {
			add_meta_box(
				$this->add_prefix('used_post_id_side_meta_box'),
				'利用記事',
				array($this, 'insert_side_used__post_id_fields'),
				self::LINK_POST_TYPE,
				'side');
		}
	}

	public function insert_side_used__post_id_fields ( $post ) {
		$post_id = intval($post->ID);
		$results = $this->used_post_ids( $post_id );
		foreach ($results AS $value) {
			$post_id = $value->ID;
			$title = get_the_title( $post_id );
			$title = strlen($title) === 0 ? '(タイトルなし)' : $title;
			$src = admin_url() . 'post.php?post=' . esc_attr( $post_id ) . '&action=edit';
			echo '<a href="' . $src . '" target="_blank" data-title="' . $title . '">[' . esc_html( $post_id ) . ']</a>';
		}
	}

	/**
	 * ダッシュボードにRinker情報を追加
	 **/
	function info_dashboard_widgets() {
		wp_add_dashboard_widget( 'custom_info_widget', 'Rinker', array( $this, 'dashboard_detail' ) );
	}

	/**
	 * ダッシュボードにメッセージを表示
	 * @return string
	 */
	function dashboard_detail() {
		$info_dashboard_path = dirname( __FILE__ ) . '/parts/info-dashboard.php';
		$info_dashboard_path = apply_filters( $this->add_prefix( 'load_info_dashboard' ),  $info_dashboard_path );

		if ( validate_file( $info_dashboard_path ) !== 0) {
			return '';
		}

		ob_start();
		include( $info_dashboard_path );
		$info_dashboard = ob_get_contents();
		ob_end_clean();
		echo $info_dashboard;
	}

	/**
	 * ショップタイプ設定
	 */
	public function shop_types() {
		foreach ($this->shop_types as $key => $value ) {
			$this->shop_types[ $key ]['a_id'] =  trim( get_option( $this->option_column_name( $value[ 'column' ] ), '' ) );
		}
		$shop_types = apply_filters( $this->add_prefix( 'custom_shop_types' ), $this->shop_types );
		$this->shop_types = $shop_types;
	}

	/**
	 * デザインタイプ設定
	 */
	public function set_esign_types() {
		$design_types = apply_filters( $this->add_prefix( 'custom_design_types' ), $this->design_types );
		$this->design_types = $design_types;
	}

	/**
	 * ショートコードパラメーターを変更
	 */
	public function custom_shortcode_params() {
		$shortcode = apply_filters( $this->add_prefix( 'cusrom_shortcode_params' ), $this->shortcode_params );
		ksort( $shortcode );
		$this->shortcode_params = $shortcode;
	}

	/**
	 * カスタムフィールドの種類を変更
	 */
	public function custom_field_params() {
		$fields = $this->custom_field_params = apply_filters( $this->add_prefix( 'custom_field_params' ), $this->custom_field_params );
		ksort( $fields );
		$this->custom_field_params = $fields;
	}

	/**
	 * target="_blank"にするかどうか
	 */
	public function set_is_target_blank() {
		$this->is_target_blank = apply_filters( $this->add_prefix( 'is_target_blank' ), $this->is_target_blank );
		return $this->is_target_blank;
	}

	public function get_rel_target_text() {
		$rel = $this->rel_text;
		if ( $this->is_target_blank ) {
			$rel_target_text = 'rel="' . esc_attr( $rel ) . ' noopener" target="_blank"';
		} else {
			$rel_target_text = 'rel="' .  esc_attr( $rel ) . '"';
		}
		$rel_target_text =  apply_filters( $this->add_prefix( 'rel_target_text' ), $rel_target_text, $this->is_target_blank );
		return $rel_target_text;
	}

	/**
	 * 商品リンク追加画面のタブ設定
	 * @return array
	 */
	public function media_upload_tabs(){
		if (wp_is_mobile()) {
			$this->tabs = $this->tabs_mobile;
		}
		$this->tabs = apply_filters( $this->add_prefix( 'media_upload_tabs' ), $this->tabs );
		return $this->tabs;
	}

	public function remove_meta_boxes() {
		remove_meta_box( 'slugdiv', self::LINK_POST_TYPE, 'normal' ); // スラッグ
		remove_meta_box( 'postdivrich', self::LINK_POST_TYPE, 'normal' );
	}

	// リンクのカスタムフィールド追加
	function add_meta_boxes() {
		add_meta_box( 'yyi_afilinks_middle_link', '商品リンク設定', array( $this, 'insert_yyi_rinker_fields' ), self::LINK_POST_TYPE, 'normal');
	}

	/**
	 * カスタム投稿で本文がなくてもthickboxを使えるようにする
	 */
	function add_thickbox() {
		add_thickbox();
	}

	public function admin_load_styles() {
		wp_register_style( $this->add_prefix( 'adminStylesheet' ), $this->admin_style_css_url, [], null );
		wp_enqueue_style( $this->add_prefix( 'adminStylesheet' ) );
		wp_enqueue_media();
	}

	/**
	 *  デザインを削除
	 */
	public function delete_styles() {
		$design_type_val = intval(get_option($this->option_column_name(self::DESIGN_TYPE), self::DESIGN_TYPE_NORMAL));
		if ($design_type_val !== self::DESIGN_TYPE_NORMAL) {
			wp_deregister_style('yyi_rinker_stylesheet');
		}
		$this->design_type_val = $design_type_val;
	}

	/**
	 * デザインを変更する
	 */
	public function switch_design_type() {
		if ($this->design_type_val !== self::DESIGN_TYPE_NORMAL) {

			if ( isset($this->design_types[$this->design_type_val]) ) {
				$func = $this->design_types[$this->design_type_val]['func'];
				if (function_exists($func)) {
					echo '<style>';
					echo htmlspecialchars($func(), ENT_NOQUOTES);
					echo '</style>';
				}
			}
		}
	}

	/**
	 * THE SONIC、COPIA、FANBOXユーザ用の共通CSS
	 *
	 */
	public function base_desing_set() {
		if (isset($this->custom_design_types[$this->design_type_val]) && !!$this->custom_design_types[$this->design_type_val]['add_css']) {
			$css = '
.yyi-rinker-images {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;

}
div.yyi-rinker-image img.yyi-rinker-main-img.hidden {
    display: none;
}

.yyi-rinker-images-arrow {
    cursor: pointer;
    position: absolute;
    top: 50%;
    display: block;
    margin-top: -11px;
    opacity: 0.6;
    width: 22px;
}

.yyi-rinker-images-arrow-left{
    left: -10px;
}
.yyi-rinker-images-arrow-right{
    right: -10px;
}

.yyi-rinker-images-arrow-left.hidden {
    display: none;
}

.yyi-rinker-images-arrow-right.hidden {
    display: none;
}
div.yyi-rinker-contents.yyi-rinker-design-tate  div.yyi-rinker-box{
    flex-direction: column;
}

div.yyi-rinker-contents.yyi-rinker-design-slim div.yyi-rinker-box .yyi-rinker-links {
    flex-direction: column;
}

div.yyi-rinker-contents.yyi-rinker-design-slim div.yyi-rinker-info {
    width: 100%;
}

div.yyi-rinker-contents.yyi-rinker-design-slim .yyi-rinker-title {
    text-align: center;
}

div.yyi-rinker-contents.yyi-rinker-design-slim .yyi-rinker-links {
    text-align: center;
}
div.yyi-rinker-contents.yyi-rinker-design-slim .yyi-rinker-image {
    margin: auto;
}

div.yyi-rinker-contents.yyi-rinker-design-slim div.yyi-rinker-info ul.yyi-rinker-links li {
	align-self: stretch;
}
div.yyi-rinker-contents.yyi-rinker-design-slim div.yyi-rinker-box div.yyi-rinker-info {
	padding: 0;
}
div.yyi-rinker-contents.yyi-rinker-design-slim div.yyi-rinker-box {
	flex-direction: column;
	padding: 14px 5px 0;
}

.yyi-rinker-design-slim div.yyi-rinker-box div.yyi-rinker-info {
	text-align: center;
}

.yyi-rinker-design-slim div.price-box span.price {
	display: block;
}

div.yyi-rinker-contents.yyi-rinker-design-slim div.yyi-rinker-info div.yyi-rinker-title a{
	font-size:16px;
}

div.yyi-rinker-contents.yyi-rinker-design-slim ul.yyi-rinker-links li.amazonkindlelink:before,  div.yyi-rinker-contents.yyi-rinker-design-slim ul.yyi-rinker-links li.amazonlink:before,  div.yyi-rinker-contents.yyi-rinker-design-slim ul.yyi-rinker-links li.rakutenlink:before, div.yyi-rinker-contents.yyi-rinker-design-slim ul.yyi-rinker-links li.yahoolink:before, div.yyi-rinker-contents.yyi-rinker-design-slim ul.yyi-rinker-links li.mercarilink:before {
	font-size:12px;
}

div.yyi-rinker-contents.yyi-rinker-design-slim ul.yyi-rinker-links li a {
	font-size: 13px;
}
.entry-content ul.yyi-rinker-links li {
	padding: 0;
}

div.yyi-rinker-contents .yyi-rinker-attention.attention_desing_right_ribbon {
    width: 89px;
    height: 91px;
    position: absolute;
    top: -1px;
    right: -1px;
    left: auto;
    overflow: hidden;
}

div.yyi-rinker-contents .yyi-rinker-attention.attention_desing_right_ribbon span {
    display: inline-block;
    width: 146px;
    position: absolute;
    padding: 4px 0;
    left: -13px;
    top: 12px;
    text-align: center;
    font-size: 12px;
    line-height: 24px;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

div.yyi-rinker-contents .yyi-rinker-attention.attention_desing_right_ribbon {
    background: none;
}
.yyi-rinker-attention.attention_desing_right_ribbon .yyi-rinker-attention-after,
.yyi-rinker-attention.attention_desing_right_ribbon .yyi-rinker-attention-before{
display:none;
}
div.yyi-rinker-use-right_ribbon div.yyi-rinker-title {
    margin-right: 2rem;
}
';
if ($this->design_type_val === self::DESIGN_TYPE_STYLE_UP) {
    $css .= '
ul.yyi-rinker-links li.mercarilink a {
    background-color: #ff0211;
}';
}
if ($this->design_type_val === self::DESIGN_TYPE_SHIRONUKI) {
    $css .= '
ul.yyi-rinker-links li.mercarilink a {
    color: #ff0211;
}';
}
if ($this->design_type_val !== self::DESIGN_TYPE_NORMAL) {
    $css .= '
.yyi-rinker-design-slim div.yyi-rinker-info ul.yyi-rinker-links li {
	width: 100%;
	margin-bottom: 10px;
}
 .yyi-rinker-design-slim ul.yyi-rinker-links a.yyi-rinker-link {
	padding: 10px 24px;
}

/** ver1.9.2 以降追加 **/
.yyi-rinker-contents .yyi-rinker-info {
    padding-left: 10px;
}
.yyi-rinker-img-s .yyi-rinker-image .yyi-rinker-images img{
    max-height: 75px;
}
.yyi-rinker-img-m .yyi-rinker-image .yyi-rinker-images img{
    max-height: 175px;
}
.yyi-rinker-img-l .yyi-rinker-image .yyi-rinker-images img{
    max-height: 200px;
}
div.yyi-rinker-contents div.yyi-rinker-image {
    flex-direction: column;
    align-items: center;
}
div.yyi-rinker-contents ul.yyi-rinker-thumbnails {
    display: flex;
    flex-direction: row;
    flex-wrap : wrap;
    list-style: none;
    border:none;
    padding: 0;
    margin: 5px 0;
}
div.yyi-rinker-contents ul.yyi-rinker-thumbnails li{
    cursor: pointer;
    height: 32px;
    text-align: center;
    vertical-align: middle;
    width: 32px;
    border:none;
    padding: 0;
    margin: 0;
    box-sizing: content-box;
}
div.yyi-rinker-contents ul.yyi-rinker-thumbnails li img {
    vertical-align: middle;
}

div.yyi-rinker-contents ul.yyi-rinker-thumbnails li {
    border: 1px solid #fff;
}
div.yyi-rinker-contents ul.yyi-rinker-thumbnails li.thumb-active {
    border: 1px solid #eee;
}

/* ここから　mini */
div.yyi-rinker-contents.yyi-rinker-design-mini {
    border: none;
    box-shadow: none;
    background-color: transparent;
}

/* ボタン非表示 */
.yyi-rinker-design-mini div.yyi-rinker-info ul.yyi-rinker-links,
.yyi-rinker-design-mini div.yyi-rinker-info .brand,
.yyi-rinker-design-mini div.yyi-rinker-info .price-box {
    display: none;
}

div.yyi-rinker-contents.yyi-rinker-design-mini .credit-box{
    text-align: right;
}

div.yyi-rinker-contents.yyi-rinker-design-mini div.yyi-rinker-info {
    width:100%;
}
.yyi-rinker-design-mini div.yyi-rinker-info div.yyi-rinker-title {
    line-height: 1.2;
    min-height: 2.4em;
    margin-bottom: 0;
}
.yyi-rinker-design-mini div.yyi-rinker-info div.yyi-rinker-title a {
    font-size: 12px;
    text-decoration: none;
    text-decoration: underline;
}
div.yyi-rinker-contents.yyi-rinker-design-mini {
    position: relative;
    max-width: 100%;
    border: none;
    border-radius: 12px;
    box-shadow: 0 1px 6px rgb(0 0 0 / 12%);
    background-color: #fff;
}

div.yyi-rinker-contents.yyi-rinker-design-mini div.yyi-rinker-box {
    border: none;
}

.yyi-rinker-design-mini div.yyi-rinker-image {
    width: 60px;
    min-width: 60px;

}
div.yyi-rinker-design-mini div.yyi-rinker-image img.yyi-rinker-main-img{
    max-height: 3.6em;
}
.yyi-rinker-design-mini div.yyi-rinker-detail div.credit-box {
    font-size: 10px;
}
.yyi-rinker-design-mini div.yyi-rinker-detail div.brand,
.yyi-rinker-design-mini div.yyi-rinker-detail div.price-box {
    font-size: 10px;
}
.yyi-rinker-design-mini div.yyi-rinker-info div.yyi-rinker-detail {
    padding: 0;
}
.yyi-rinker-design-mini div.yyi-rinker-detail div:not(:last-child) {
    padding-bottom: 0;
}
.yyi-rinker-design-mini div.yyi-rinker-box div.yyi-rinker-image a {
    margin-bottom: 16px;
}
@media (min-width: 768px){
    div.yyi-rinker-contents.yyi-rinker-design-mini div.yyi-rinker-box {
        padding: 12px;
    }
    .yyi-rinker-design-mini div.yyi-rinker-box div.yyi-rinker-info {
        justify-content: center;
        padding-left: 24px;
    }
}
@media (max-width: 767px){
    div.yyi-rinker-contents.yyi-rinker-design-mini {
        max-width:100%;
    }
    div.yyi-rinker-contents.yyi-rinker-design-mini div.yyi-rinker-box {
        flex-direction: row;
        padding: 12px;
    }
    .yyi-rinker-design-mini div.yyi-rinker-box div.yyi-rinker-info {
        justify-content: center;
        margin-bottom: 16px;
        padding-left: 16px;
        text-align: left;
    }
}
/* 1.9.5以降 */
div.yyi-rinker-contents {
    position: relative;
    overflow: visible;
}
div.yyi-rinker-contents .yyi-rinker-attention {
    display: inline;
    line-height: 30px;
    position: absolute;
    top: -10px;
    left: -9px;
    min-width: 60px;
    padding: 0;
    height: 30px;
    text-align: center;
    font-weight: 600;
    color: #ffffff;
    background: #fea724;
    z-index: 10;
}

div.yyi-rinker-contents .yyi-rinker-attention span{
    padding: 0 15px;
}

.yyi-rinker-attention-before, .yyi-rinker-attention-after {
	display: inline;
    position: absolute;
    content: \'\';
}

.yyi-rinker-attention-before {
    bottom: -8px;
    left: 0.1px;
    width: 0;
    height: 0;
    border-top: 9px solid;
    border-top-color: inherit;
    border-left: 9px solid transparent;
    z-index: 1;
}

.yyi-rinker-attention-after {
    top: 0;
    right: -14.5px;
    width: 0;
    height: 0;
    border-top: 15px solid transparent;
    border-bottom: 15px solid transparent;
    border-left: 15px solid;
    border-left-color: inherit;
}

div.yyi-rinker-contents .yyi-rinker-attention.attention_desing_circle{
    display: flex;
    position: absolute;
 	top: -20px;
    left: -20px;
    width: 60px;
    height: 60px;
    min-width: auto;
    min-height: auto;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color: #fff;
    background: #fea724;
    font-weight: 600;
    font-size: 17px;
}

div.yyi-rinker-contents.yyi-rinker-design-mini .yyi-rinker-attention.attention_desing_circle{
    top: -18px;
    left: -18px;
    width: 36px;
    height: 36px;
    font-size: 12px;
}


div.yyi-rinker-contents .yyi-rinker-attention.attention_desing_circle{
}

div.yyi-rinker-contents .yyi-rinker-attention.attention_desing_circle span {
	padding: 0;
}

div.yyi-rinker-contents .yyi-rinker-attention.attention_desing_circle .yyi-rinker-attention-after,
div.yyi-rinker-contents .yyi-rinker-attention.attention_desing_circle .yyi-rinker-attention-before{
	display: none;
}

';
			} else {
				$css .= '
				';
			}
			echo '<style>';
			echo htmlspecialchars($css, ENT_NOQUOTES);
			echo '</style>';
		}
	}

	/**
	 * 商品リンクの一覧にショートコードを表示
	 * @param $posts_columns
	 *
	 * @return mixed
	 */
	public function manage_linkinfo_posts_columns( $posts_columns ) {
		$posts_columns['shorcode'] = 'ショートコード<span class="yyi-rinker-small">(クリックでコピー)</span>';
		$posts_columns['used_post_id'] = '利用記事';
		return $posts_columns;
	}

	public function used_post_ids( $post_id ) {
		global $wpdb;
		$shortcode =  '%[itemlink post_id="' . $post_id . '"%';
		$post_types = [ 'post', 'page' ];
		$post_types = apply_filters( $this->add_prefix( 'manage_linkinfo_post_types' ), $post_types );
		if (!is_array($post_types) || count( $post_types ) === 0 ) {
			return '';
		}
		$sql_post_type_text = implode(',', array_fill(0, count( $post_types ) ,  '%s') );
		$values = [$shortcode, $shortcode, $shortcode];
		$values = array_merge($values, $post_types);

		$results = $wpdb->get_results($wpdb->prepare("
SELECT SQL_CALC_FOUND_ROWS {$wpdb->posts}.ID
FROM {$wpdb->posts}
WHERE 1=1 AND ((({$wpdb->posts}.post_title
LIKE '%s') OR ({$wpdb->posts}.post_excerpt 
LIKE '%s') OR ({$wpdb->posts}.post_content 
LIKE '%s'))) AND {$wpdb->posts}.post_type IN ({$sql_post_type_text}) AND ({$wpdb->posts}.post_status = 'publish' OR {$wpdb->posts}.post_status = 'future' OR {$wpdb->posts}.post_status = 'draft' OR {$wpdb->posts}.post_status = 'pending' OR {$wpdb->posts}.post_author = 1 AND {$wpdb->posts}.post_status = 'private') 
ORDER BY {$wpdb->posts}.ID ASC", $values));
		return $results;
	}

	/**
	 * 記事へのリンクを表示
	 * @param $column_name
	 * @param $post_id
	 */
	function manage_linkinfo_post_custom_column( $column_name, $post_id ) {
		if ( $column_name == 'shorcode' ) {
			echo '<textarea readonly="readonly" class="yyi-rinker-list-shortcode">[itemlink post_id="' . esc_html( $post_id ) . '"]</textarea>';
		}
		if ( $column_name == 'used_post_id' ) {
			$results = $this->used_post_ids( $post_id );
			foreach ($results AS $value) {
				$post_id = $value->ID;
				$title = get_the_title( $post_id );
				$title = strlen($title) === 0 ? '(タイトルなし)' : $title;
				$src = admin_url() . 'post.php?post=' . esc_attr( $post_id ) . '&action=edit';
				echo '<a href="' . $src . '" target="_blank" data-title="' . $title . '">[' . esc_html( $post_id ) . ']</a>';
			}
		}
	}

	/**
	 * 商品リンクカスタム投稿にタクソノミーでの絞り込みをつけました
	 * @param $post_type
	 */
	public function add_search_term_dropdown( $post_type ) {
		if ( self::LINK_POST_TYPE === $post_type ) {
			$slug = get_query_var( self::LINK_TERM_NAME );
			wp_dropdown_categories( array(
				'show_option_all'	=> '商品リンクカテゴリー',
				'selected'			=> $slug,
				'name'				=> self::LINK_TERM_NAME,
				'taxonomy'			=> self::LINK_TERM_NAME,
				'value_field'		=> 'slug',
			));
		}
	}

	/**
	 * リンクのタイプで検索させる
	 * @param $post_type
	 * @return void
	 */
	public function add_link_type( $post_type ) {
		if ( self::LINK_POST_TYPE === $post_type ) {
			$value = get_query_var('search_shop');


			echo '<select name="search_shop">';
			echo '<option value="0">すべての商品</option>';
			foreach($this->search_shops AS $number => $search_shop) {
				$checked = '';
				if( !empty ( $value ) && $value == $number) {
					$checked = 'selected="selected"';
				}
				echo '<option value="' . esc_attr( $number ) . '"' . $checked . '>' . esc_html( $search_shop ) . '</option>';
			}
			echo '</select>';
		}
	}

	/**
	 * 管理画面の一覧の絞り込みに使用する
	 * @param $vars
	 * @return mixed
	 */
	public function add_link_type_vars ( $vars ) {
		$vars[] = 'search_shop';
		return $vars;
	}

	public function posts_where_link_type( $where ) {
		global $wpdb;
		if( is_admin() ) {
			$value = get_query_var('search_shop');
			if( !empty ( $value ) ) {
				$field = $this->custom_field_column_name(self::SEARCH_SHOP_VALUE);
				$where .= $wpdb->prepare(" AND EXISTS ( SELECT * FROM {$wpdb->postmeta} as m
				WHERE m.post_id = {$wpdb->posts}.ID AND m.meta_key = '{$field}' AND m.meta_value like %s )",
					"%{$value}%" );
			}
		}
		return $where;
	}
	/**
	 * 商品リンクのカテゴリ一覧にショートコードを表示
	 * @param $posts_columns
	 *
	 * @return mixed
	 */
	public function manage_term_linkinfo_posts_columns( $posts_columns ) {
		$posts_columns['shorcode'] = '<div>テキストリンク</div><span class="yyi-rinker-small">(クリックでコピー)</span>';
		return $posts_columns;
	}

	/**
	 * カテゴリのショートコードを表示
	 * @param $column_name
	 * @param $post_id
	 */
	function manage_term_linkinfo_post_custom_column($string,  $column_name, $tag_id ) {
		if ( $column_name == 'shorcode' ) {
			echo '<textarea readonly="readonly" class="yyi-rinker-term-list-shortcode">[itemlinks tag_id="' . esc_html( $tag_id ) . '"]</textarea>';
		}
	}

	/**
	 * カスタムフィールド追加
	 */
	function insert_yyi_rinker_fields()
	{
		global $post;
		global $post_ID;
		wp_enqueue_script('media-editor');
		wp_enqueue_script('media-upload');
		$src = 'media-upload.php?&post_id=' . intval($post_ID) . '&type=' . $this->media_type . '&tab=' . self::TAB_AMAZON . '&from=' . self::LINK_POST_TYPE . '&TB_iframe=true';
		include_once 'parts/custom-field-form.php';
	}

	/**
	 * 	カスタム投稿　self::LINK_POST_TYP　の
	 *  カスタムフィールド情報を更新
	 * @param $post_id
	 */
	function save_links_fields( $post_id ) {
		$this->save_post_meta_links($post_id, $_POST, false, false);
	}

	/**
	 * カスタム投稿　self::LINK_POST_TYP　のカスタムフィールドに値を保存します
	 * @param $post_id
	 * @param $params
	 */
	function save_post_meta_links($post_id, $params, $is_create = true, $is_force_update = true) {
		//更新時にはキャッシュ削除
		delete_transient( $this->add_prefix( 'itemlink_' . $post_id ) );
		//メインのページだけ更新させる
		if ( $this->array_get($_POST, 'yyi_rinker_from_page', '') === 'main' || $is_force_update) {
			$new_datas = [];
			foreach ($this->custom_field_params AS $index => $values) {
				if ( $value = $this->array_get($params, $values['key'], false ) ) {
					if ( $index === self::IS_AMAZON_NO_EXIST || $index === self::IS_RAKUTEN_NO_EXIST ) {
						$new_datas[ $values[ 'key' ] ] = !!$value ? 1 : '';
					} else {
						$new_datas[ $values[ 'key' ] ] = $value;
					}

					if ($index === self::SEARCH_SHOP_VALUE ) {
						$new_datas[ $values[ 'key' ] ] = intval( $value );
					}
					update_post_meta($post_id, $this->custom_field_column_name( $values['key'] ), $value );
				} else {
					$new_datas[$values['key']] = null;
					delete_post_meta($post_id, $this->custom_field_column_name( $values['key'] ) );
				}
			}

			$meta_datas = $this->get_tansient_meta_data( $post_id, [], $new_datas, false );

			if ( $is_create ) {
				//キャッシュにいれる
				set_transient($this->add_prefix( 'itemlink_' . $post_id), $meta_datas, self::EXPIRED_TIME );
			}
		}
	}


	/**
	 * 商品リンクのカスタム投稿を追加します
	 */
	function create_link_post_type() {
		register_post_type(
			self::LINK_POST_TYPE,
			array(
				'label'					=> '商品リンク',
				'public'				=> false,
				'publicly_queryable'	=> false,
				'has_archive'			=> false,
				'show_ui'				=> true,
				'exclude_from_search'	=> true,
				'menu_position'			=> 21,
				'supports'				=> [ 'title' ],
				'menu_icon'				=> 'data:image/svg+xml;base64,' . base64_encode('<svg id="rinker-icon" width="24" height="24" data-name="rinker-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 -4 16 24"><defs><style>.cls-1{fill:#fff;}</style></defs><path class="cls-1" d="M5.52,9C5.52,5.87,4,7.16,4,5.91S5.56,4.66,6.36,4.66c.43,0,.83,0,1.25.06s.83.08,1.23.08c.65,0,1.29,0,2-.08s1.31-.06,2-.06c2.28,0,4.92,1,4.92,3.69A3.16,3.16,0,0,1,16,11.27c-.18.1-.32.16-.32.41s.26.38.5.48c1.42.53,2,1.46,2.32,3.63.25,1.88,1.56.75,1.56,2,0,.77-.93,1.57-3.21,1.57-3.23,0-3.63-1.85-4.26-4.51C12.33,13.9,12,13,10.88,13c-.45,0-.61.06-.61,1.33a12.74,12.74,0,0,0,.15,2c.16.93,1.19.64,1.19,1.61,0,.73-.51,1.27-3.78,1.27-1,0-3.83,0-3.83-1.47,0-1.05,1.51-.32,1.51-3Zm4.68.89c0,.53-.15,1,.52,1,1.31,0,1.74-.73,1.74-2,0-1-.25-2-1.42-2-.74,0-.72.46-.76,1.08Z" transform="translate(-3.98 -4.66)"/></svg>'),
				'rewrite' => array('slug' => 'yyirinker'),
			)
		);

		$args = array(
			'label'		=> '商品リンクカテゴリー',
			'labels'	=> array(
				'popular_items'	=> '商品リンクカテゴリー',
				'edit_item'		=> '商品リンクカテゴリーを編集',
				'add_new_item'	=> '新規商品リンクカテゴリーを追加',
				'search_items'	=> '商品リンクカテゴリーを検索',
			),
			'public'		=> false,
			'show_ui'		=> true,
			'hierarchical'	=> true,
		);
		register_taxonomy( self::LINK_TERM_NAME, array( self::LINK_POST_TYPE ), $args );
	}

	public function links_shortcode_keys() {
		$values = [];
		foreach( $this->links_shortcode_params AS $key => $val) {
			$values[$val] = '';
		}
		return $values;
	}

	/**
	 * ショートコード itemlinks　からリンクHTMLを作成
	 * @param $att
	 *
	 * @return array|mixed|null|string|void
	 */
	public function linksshotcode( $att )
	{
		$shortcodes = $this->links_shortcode_keys();
		$atts = shortcode_atts( $shortcodes, $att );

		$arg = array(
			'post_type' => self::LINK_POST_TYPE,
			'tax_query' => array(
				array(
					'taxonomy' => self::LINK_TERM_NAME,
					'terms' => array( $atts[ 'tag_id' ] ),
					'field'=>'term_id',
				)
			),
			'orderby'	=> 'date',
			'order'		=> 'ASC',
			'nopaging'	=> true,
		);

		$template_path = dirname( __FILE__ ) . '/template/links-template-default.php';

		if ( validate_file( $template_path ) !== 0) {
			return '';
		}

		ob_start();
		include( $template_path );
		$template = ob_get_contents();
		ob_end_clean();
		return $template;
	}

	public function shortcode_keys() {
		$values = [];
		foreach( $this->shortcode_params AS $key => $val) {
			$values[$val] = '';
		}
		return $values;
	}

	/**
	 * ショートコード itemlink からリンクHTMLを作成
	 * @param $att
	 *
	 * @return array|mixed|null|string|void
	 */
	public function shotcode( $att ) {
		$shortcodes = $this->shortcode_keys();

		$atts = shortcode_atts( $shortcodes, $att );
		$atts = apply_filters( $this->add_prefix( 'update_attribute' ), $atts );

		if (get_post_type() === self::LINK_POST_TYPE) {
			$post_id = get_the_ID();
		} else {
			$post_id = $this->array_get($atts, 'post_id', 0);
		}
		$category_classes = [];
		foreach( get_the_category() AS $category ) {
			$category_classes[] = 'yyi-rinker-catid-' . intval( $category->cat_ID );
		}
		$status = get_post_status( $post_id );
		//存在しない　か　プレビューではないのにpublish以外は表示しない （存在して かつ　publishかプレビューのときは表示するということ）
		if (!$status || ( !is_preview() && $status !== 'publish' ) ) {
			return '';
		}

		//delete_transient( $this->add_prefix( 'itemlink_' . $post_id ) );

		$search_shop_value = $this->get_search_shop_value( $post_id );
		$is_search_from_amazon = $this->is_search_from_amazon( $search_shop_value );
		$is_search_from_rakuten = $this->is_search_from_rakuten( $search_shop_value );
		$is_search_from_freelink = $this->is_search_from_freelink( $search_shop_value );
		$is_no_renew = $this->is_no_renew( $post_id );

		//キャッシュデータを取得
		$meta_datas = get_transient( $this->add_prefix( 'itemlink_' . $post_id ) );

		//再取得をしない場合かフリーリンクはDBからデータ取得
		if ( $this->is_no_reapi_column || $is_search_from_freelink || $is_no_renew ) {
			$is_api_data = false;
			$new_data = [];
			//表示データに整形
			if ( !$meta_datas ) {
				$meta_datas = $this->get_tansient_meta_data( $post_id,  $atts, $new_data, $is_api_data );
			}

			//キャッシュに入れる
			set_transient($this->add_prefix( 'itemlink_' . $post_id), $meta_datas, self::EXPIRED_TIME );

			//フリーリンク以外は価格は消す
			if ( !$is_search_from_freelink ) {
				$meta_datas['price'] = '';
			}
			//ショートコードで上書き
			$meta_datas = $this->set_shortcode_data( $meta_datas, $atts );

		//キャッシュがあればキャッシュを利用
		} elseif ( $meta_datas ) {
			//ショートコードで上書き
			$meta_datas = $this->set_shortcode_data( $meta_datas, $atts );
			//Amazonから検索でさらにキャッシュの中にASINがなければ再取得
			if ( $is_search_from_amazon && $this->array_get( $meta_datas, self::ASIN_COLUMN, '' ) === '' ) {
				$meta_datas[ self::ASIN_COLUMN ] = get_post_meta(
					$post_id,
					$this->custom_field_column_name(self::ASIN_COLUMN ),
					true
				);
			}
		//apiで再取得
		} else {
			if ( $is_search_from_rakuten ) {
				$itemcode = get_post_meta( $post_id, $this->custom_field_column_name( self::RAKUTEN_ITEMCODE_COLUMN ), true );
				//楽天 apiから情報を再取得
				$new_datas = $this->get_rakuten_data_from_itemcode( $itemcode );
			} elseif ( $is_search_from_amazon ) {
				$asin = get_post_meta( $post_id, $this->custom_field_column_name( self::ASIN_COLUMN ), true );
				//amazon apiから情報を再取得
				$new_datas = $this->get_amazon_data_from_asin( $asin );
				$new_datas[ self::ASIN_COLUMN ] = $asin;
			}

			$errors = $this->array_get( $new_datas, 'error', false);

			if ( isset( $new_datas[0] ) && !$errors ) {
				$new_data = $new_datas[0];
				$is_api_data = true;
				//データをAPIから取得できた場合、DBを上書き
				if ( $is_search_from_rakuten ) {
					foreach ($new_data AS $key => $value) {
						if ( $key !== 'availability' ) {
							update_post_meta( $post_id, $this->custom_field_column_name( $key ), $value );
							//存在するならflgを戻す
							update_post_meta( $post_id, $this->custom_field_column_name( self::IS_RAKUTEN_NO_EXIST ), 0 );
						}
					}
				} elseif ( $is_search_from_amazon ) {
					foreach ($new_data AS $key => $value) {
						if ( $key !== self::ASIN_COLUMN ) {
							update_post_meta( $post_id, $this->custom_field_column_name( $key ), $value );
							//存在するならflgを戻す
							update_post_meta( $post_id, $this->custom_field_column_name( self::IS_AMAZON_NO_EXIST ), 0 );
						}
					}
				}
				//商品のasin自体がない場合 Amazonのみ
			} elseif( !!$errors && $errors['code'] === 'InvalidParameterValue' ) {
				update_post_meta( $post_id, $this->custom_field_column_name( self::IS_AMAZON_NO_EXIST ), 1 );
				return $this->return_no_template( $post_id, $atts );
				//商品のitemcode自体がない場合 楽天のみ
			} elseif( !!$errors && $errors['code'] === 'rakuten_noitem' ) {
				update_post_meta( $post_id, $this->custom_field_column_name( self::IS_RAKUTEN_NO_EXIST ), 1 );
				return $this->return_no_template( $post_id, $atts );
				//商品のasinかitemCodeはあるが在庫切れ
			} else {
				$is_api_data = false;
				//データをAPIから取得できなかった場合価格は消す
				update_post_meta( $post_id, $this->custom_field_column_name( self::PRICE_COLUMN ), '' );
				update_post_meta( $post_id, $this->custom_field_column_name( self::PRICE_AT_COLUMN ), '' );
				$new_data = [];
			}

			//表示データに整形
			$meta_datas = $this->get_tansient_meta_data( $post_id,  $atts, $new_data, $is_api_data );

			//データをAPIから取得できた場合、キャッシュにいれる
			if ( $is_api_data ) {
				set_transient($this->add_prefix('itemlink_' . $post_id), $meta_datas, self::EXPIRED_TIME);
			}
		}
		if ( $is_search_from_rakuten ) {
			//楽天に存在しているか確認して、なかったら商品を消す
			$is_rakuten_no_exist = !!get_post_meta($post_id, $this->custom_field_column_name(self::IS_RAKUTEN_NO_EXIST), true);
			if ($is_rakuten_no_exist) {
				return $this->return_no_template($post_id, $atts);
			}
		} elseif ( $is_search_from_amazon ) {
			//Amazonに存在しているか確認してなければ商品を消す
			$is_amazon_no_exist = !!get_post_meta( $post_id, $this->custom_field_column_name( self::IS_AMAZON_NO_EXIST ), true);
			if ( $is_amazon_no_exist  ) {
				return $this->return_no_template( $post_id, $atts );
			}
		}

		//AmazonでASINがありリンクがもしも設定のときkindleリンクはRinkerで作ったリンクを使用する
		if ( $is_search_from_amazon &&
			strlen( $this->array_get( $meta_datas,  self::ASIN_COLUMN , '') ) > 0  &&
			$this->is_moshimo( self::SHOP_TYPE_AMAZON_KINDLE ) &&
			$this->array_get($meta_datas, 'original_amazon_title_url') ===$this->array_get($meta_datas, 'original_amazon_kindle_url') ) {
			$meta_datas[ 'original_amazon_kindle_url' ] =  $this->generate_amazon_title_original_link( $meta_datas[ self::ASIN_COLUMN ] );
		}
		//AmazonでASINがありリンクがもしも設定になっている場合はRinkerで作ったリンクを使用する
		if ( $is_search_from_amazon &&
			strlen( $this->array_get( $meta_datas,  self::ASIN_COLUMN , '') ) > 0  &&
			$this->is_moshimo( self::SHOP_TYPE_AMAZON ) ) {
			$meta_datas[ 'original_amazon_title_url' ] =  $this->generate_amazon_title_original_link( $meta_datas[ self::ASIN_COLUMN ] );
		}

		$meta_datas = apply_filters( $this->add_prefix( 'meta_data_update_init' ), $meta_datas );

		$meta_datas = apply_filters( $this->add_prefix( 'meta_data_update' ), $meta_datas, $atts );

		extract($meta_datas);

		if ( $is_search_from_freelink ) {
			$template_path = dirname( __FILE__ ) . '/template/template-freelink.php';
			$template_path = apply_filters( $this->add_prefix( 'load_freelink_template_path' ),  $template_path );
		} else {
			$template_path = dirname( __FILE__ ) . '/template/template-default.php';
			$template_path = apply_filters( $this->add_prefix( 'load_template_path' ),  $template_path );
		}

		if ( validate_file( $template_path ) !== 0) {
			return '';
		}

		ob_start();
		include( $template_path );
		$template = ob_get_contents();
		ob_end_clean();
		return $template;
	}

	/**
	 * 現在取り扱いがありません表示を追加
	 * @return string
	 */
	public function return_no_template( $post_id, $atts ) {
		$meta_datas = $this->get_tansient_meta_data($post_id, $atts, [], false);

		//Amazonボタン用URL
		$amazon_original_url = $this->array_get( $meta_datas, 'original_amazon_url', '' );
		if ( $amazon_original_url !== '' ) {
			$meta_datas[ 'amazon_url' ] = $this->generate_amazon_link_with_aid( $amazon_original_url, $post_id, $atts );
		}

		//AmazonKindleボタン用URL
		$amazon_kindle_original_url = $this->array_get( $meta_datas, 'original_amazon_kindle_url', '' );
		if ( $amazon_original_url !== '' ) {
			$meta_datas[ 'amazon_kindle_url' ] = $this->generate_amazon_kindle_link_with_aid( $amazon_kindle_original_url, $post_id, $atts );
		}

		//楽天ボタン用URL
		$rakuten_original_url = $this->array_get( $meta_datas, 'original_rakuten_url', '' );
		if ( $rakuten_original_url !== '' ) {
			$meta_datas[ 'rakuten_url' ] = $this->generate_rakuten_link_with_aid( $rakuten_original_url, $post_id );
		}

		//Yahooボタン用URL
		$yahoo_original_url = $this->array_get( $meta_datas, 'original_yahoo_url', '' );
		if ( $yahoo_original_url !== '' ) {
			$meta_datas[ 'yahoo_url' ] = $this->generate_yahoo_link_with_aid( $yahoo_original_url, $post_id );
		}

        //メルカリボタン用URL
        $mercari_original_url = trim($this->array_get( $meta_datas, 'original_mercari_url', '' ));
        if ($mercari_original_url == '' && $this->is_mercari_id()) {
            $keyword = $this->array_get( $meta_datas, 'keyword', '' );
            $mercari_original_url = $this->generate_mercari_link( $keyword );
        }
        if ( $mercari_original_url !== '' ) {
            $meta_datas[ 'mercari_url' ] = $this->generate_mercari_link_with_aid( $mercari_original_url, $post_id );
        }

		//リンク作成
		foreach($this->shop_types AS $key => $values) {
			$meta_datas[ $key . '_link' ] = $this->link_html( $meta_datas, $key, $values, $atts );
		}

		foreach ([ 1, 2, 3, 4 ] as $num) {
			$meta_datas = $this->free_link_html( $num, $meta_datas );
		}

		$no_template_path = dirname( __FILE__ ) . '/template/no-template-default.php';
		$no_template_path = apply_filters( $this->add_prefix( 'load_no_template_path' ),  $no_template_path );

		if ( validate_file( $no_template_path ) !== 0) {
			return '';
		}

		ob_start();
		include( $no_template_path );
		$template = ob_get_contents();
		ob_end_clean();
		return $template;
	}

	/**
	 * 価格を表示するかどうか
	 * @param $meta_datas
	 * @param $atts
	 *
	 * @return mixed
	 */
	public function is_no_price_disp( $meta_datas, $atts ) {
		if ( $this->is_no_price_disp_column ) {
			if ( isset($meta_datas[ self::PRICE_AT_COLUMN ]) ) {
				$meta_datas[ self::PRICE_AT_COLUMN ] = '';
			}

			if ( isset($meta_datas[ self::PRICE_COLUMN ]) ) {
				$meta_datas[ self::PRICE_COLUMN ] = '';
			}
		}
		return $meta_datas;
	}

	public function set_shortcode_data( $meta_datas, $atts ) {
		$shortcodes = $this->shortcode_keys();
		foreach ( $shortcodes AS $key => $val ) {
			$att_value = trim( $this->array_get( $atts, $key, '' ) );
			$index = $key;
			if ( $key === 'size' ) {
				$data =  $this->default_image_size( $att_value );
			} else {
				//ショートコードに設定があればそれを優先
				if ( strlen( $att_value ) > 0 ) {
					$data = $att_value;
				} else {
					$data = $this->array_get( $meta_datas, $key, '' );
				}
			}
			if ( strlen( $data ) > 0 ) {
				$meta_datas[ $index ] = $data;
			}
		}
		return $meta_datas;
	}

	/**
	 * 商品から検索タブを追加
	 * @param $tabs
	 *
	 * @return mixed
	 */
	public function add_item_list_search_tab( $tabs ) {
		$from = $this->array_get($_GET, 'from', '');
		if ( $from === 'yyi_rinker' ) {
			unset( $tabs[ self::TAB_ITEMLIST ] );
			return $tabs;
		} else {
			return $tabs + $this->tabs;
		}
	}

	/**
	 * キャッシュになかった場合、新しく取得したデータから画像と値段データを読む
	 * データで取得できなかった場合はDBのデータを読む
	 * @param $post_idavailability
	 * @param $atts
	 * @param $new_data
	 * @param bool|true $is_api_data
	 *
	 * @return array
	 */
	public function get_tansient_meta_data( $post_id,  $atts, $new_data, $is_api_data = true ) {
		$shortcodes = $this->shortcode_keys();
		$meta_datas = [];
		foreach ( $shortcodes AS $key => $val ) {
			$att_value = trim ($this->array_get( $atts, $key, '' ) );
			$index = $key;
			unset( $data );
			//ショートコードに設定があればそれを優先
			if ( strlen( $att_value ) > 0 ) {
				$data = $att_value;
			} else {
				switch ( $key ) {
					case 'title':
						$data = trim( get_the_title( $post_id ) );
						break;
					case 'amazon_title_url':
					case 'amazon_url':
					case 'amazon_kindle_url':
					case 'rakuten_title_url':
					case 'rakuten_url':
					case 'yahoo_url':
                    case 'mercari_url':
						$type = $this->custom_field_column_name( $key );
						$data = get_post_meta( $post_id, $type, true );
						if (strlen( $data ) > 0) {
							$meta_datas[ 'original_' . $key ] = $data;
						}
						break;
					case 'sizesw':
					case 'sizesh':
					case 'sizemw':
					case 'sizemh':
					case 'sizelw':
					case 'sizelh':
						$size_column = $this->getImageSizeColumnFromShortcode( $key );
						if ( $is_api_data ) {
							$data = $this->array_get($new_data, $size_column, '');
						} else {
							$data = get_post_meta($post_id, $this->custom_field_column_name($size_column), true);
						}
						break;
					case self::PRICE_COLUMN:
					case self::PRICE_AT_COLUMN:
						if ( $is_api_data ) {
							$data = $this->array_get($new_data, $key, '');
							break;
						} else {
							$data = get_post_meta( $post_id, $this->custom_field_column_name( $key ), true );
							break;
						}
					default:
						$data = get_post_meta( $post_id, $this->custom_field_column_name( $key ), true );
						break;
				}
			}
			if (isset( $data )) {
				$meta_datas[ $index ] = $data;
			}
		}

		//画像系の処理　Amazonの再取得時は新しいデータを利用する
		if ( $is_api_data && intval( $this->array_get( $meta_datas,  self::SEARCH_SHOP_VALUE ) ) === self::SEARCH_SHOP_AMAZON ) {
			$meta_datas[self::IMAGE_S_COLUMN] = $this->array_get($new_data, self::IMAGE_S_COLUMN, '');
			$meta_datas[self::IMAGE_M_COLUMN] = $this->array_get($new_data, self::IMAGE_M_COLUMN, '');
			$meta_datas[self::IMAGE_L_COLUMN] = $this->array_get($new_data, self::IMAGE_L_COLUMN, '');
			$meta_datas[self::S_VARIANT_IMAGES_COLUMN] = $this->array_get($new_data, self::S_VARIANT_IMAGES_COLUMN, '');
			$meta_datas[self::M_VARIANT_IMAGES_COLUMN] = $this->array_get($new_data, self::M_VARIANT_IMAGES_COLUMN, '');
			$meta_datas[self::L_VARIANT_IMAGES_COLUMN] = $this->array_get($new_data, self::L_VARIANT_IMAGES_COLUMN, '');
		} else {
			$meta_datas[self::IMAGE_S_COLUMN] = get_post_meta( $post_id, $this->custom_field_column_name( self::IMAGE_S_COLUMN ), true );
			$meta_datas[self::IMAGE_M_COLUMN] = get_post_meta( $post_id, $this->custom_field_column_name( self::IMAGE_M_COLUMN ), true );
			$meta_datas[self::IMAGE_L_COLUMN] = get_post_meta( $post_id, $this->custom_field_column_name( self::IMAGE_L_COLUMN ), true );
			$meta_datas[self::S_VARIANT_IMAGES_COLUMN] = get_post_meta( $post_id, $this->custom_field_column_name( self::S_VARIANT_IMAGES_COLUMN ), true );
			$meta_datas[self::M_VARIANT_IMAGES_COLUMN] = get_post_meta( $post_id, $this->custom_field_column_name( self::M_VARIANT_IMAGES_COLUMN ), true );
			$meta_datas[self::L_VARIANT_IMAGES_COLUMN] = get_post_meta( $post_id, $this->custom_field_column_name( self::L_VARIANT_IMAGES_COLUMN ), true );
		}

		$free_comment = get_post_meta( $post_id, $this->custom_field_column_name( self::FREE_COMMENT_COLUMN ), true );
		if ( strlen($free_comment) > 0) {
			$origin_free_comment = $free_comment;
		} else {
			if ( $this->is_search_from_rakuten( $this->array_get( $meta_datas,  self::SEARCH_SHOP_VALUE ) ) ) {
				$origin_free_comment = $this->rakuten_free_comment;
			} elseif ( $this->is_search_from_freelink( $this->array_get( $meta_datas,  self::SEARCH_SHOP_VALUE ) ) ) {
				$origin_free_comment = $this->freelink_free_comment;
			} else {
				$origin_free_comment = $this->amazon_free_comment;
			}
		}

		$meta_datas[ 'free_comment' ] = $this->replace_free_comment( $meta_datas, $origin_free_comment );

		$meta_datas = apply_filters( $this->add_prefix( 'get_tansient_meta_data' ), $meta_datas,  $new_data);

		return $meta_datas;
	}

	/**
	 * 画像のサイズショートコードから実際のカラム名を取得
	 * @param $shortcode
	 * @return string
	 */
	public function getImageSizeColumnFromShortcode( $shortcode ) {
		$column = '';
		switch ($shortcode) {
			case 'sizesw':
				$column = self::IMAGE_S_SIZE_W_COLUMN;
				break;
			case 'sizesh':
				$column = self::IMAGE_S_SIZE_H_COLUMN;
				break;
			case 'sizemw':
				$column = self::IMAGE_M_SIZE_W_COLUMN;
				break;
			case 'sizemh':
				$column = self::IMAGE_M_SIZE_H_COLUMN;
				break;
			case 'sizelw':
				$column = self::IMAGE_L_SIZE_W_COLUMN;
				break;
			case 'sizelh':
				$column = self::IMAGE_L_SIZE_H_COLUMN;
				break;
		}
		return $column;
	}

	/**
	 * 画像のサイズカラム名からショートコード名を取得
	 * @param $shortcode
	 * @return string
	 */
	public function getImageSizeColumnFromColumn( $column ) {
		$shortcode = '';
		switch ($column) {
			case self::IMAGE_S_SIZE_W_COLUMN:
				$shortcode ='sizesw';
				break;
			case self::IMAGE_S_SIZE_H_COLUMN:
				$shortcode ='sizesh';
				break;
			case self::IMAGE_M_SIZE_W_COLUMN:
				$shortcode ='sizemw';
				break;
			case self::IMAGE_M_SIZE_H_COLUMN:
				$shortcode ='sizemh';
				break;
			case self::IMAGE_L_SIZE_W_COLUMN:
				$shortcode ='sizelw';
				break;
			case self::IMAGE_L_SIZE_H_COLUMN:
				$shortcode ='sizelh';
				break;
		}
		return $shortcode;
	}

	/**
	 * 利用画像のカラムから画像の幅を取得
	 * @param $image_column
	 * @param $meta_datas
	 * @return mixed|null
	 */
	public function getImageWidth( $image_column, $meta_datas ) {
		$width = null;
		switch ($image_column) {
			case self::IMAGE_S_COLUMN:
			case $this->add_prefix( self::IMAGE_S_COLUMN ):
				$width = $this->array_get( $meta_datas, $this->getImageSizeColumnFromColumn(self::IMAGE_S_SIZE_W_COLUMN ) ) ;
				break;
			case self::IMAGE_M_COLUMN:
			case $this->add_prefix( self::IMAGE_M_COLUMN ):
				$width = $this->array_get( $meta_datas, $this->getImageSizeColumnFromColumn( self::IMAGE_M_SIZE_W_COLUMN ) ) ;
				break;
			case self::IMAGE_L_COLUMN:
			case $this->add_prefix( self::IMAGE_L_COLUMN ):
				$width = $this->array_get( $meta_datas, $this->getImageSizeColumnFromColumn(self::IMAGE_L_SIZE_W_COLUMN ) ) ;
				break;
		}
		return $width;
	}

	/**
	 * 利用画像のカラムから画像の高さを取得
	 * @param $image_column
	 * @param $meta_datas
	 * @return mixed|null
	 */
	public function getImageHeight( $image_column, $meta_datas ) {
		$height = null;
		switch ($image_column) {
			case self::IMAGE_S_COLUMN:
			case $this->add_prefix( self::IMAGE_S_COLUMN ):
				$height = $this->array_get( $meta_datas, $this->getImageSizeColumnFromColumn(self::IMAGE_S_SIZE_H_COLUMN ) );
				break;
			case self::IMAGE_M_COLUMN:
			case $this->add_prefix( self::IMAGE_M_COLUMN ):
				$height = $this->array_get( $meta_datas, $this->getImageSizeColumnFromColumn(self::IMAGE_M_SIZE_H_COLUMN ) );
				break;
			case self::IMAGE_L_COLUMN:
			case $this->add_prefix( self::IMAGE_L_COLUMN ):
				$height = $this->array_get( $meta_datas, $this->getImageSizeColumnFromColumn(self::IMAGE_L_SIZE_H_COLUMN ) );
				break;
		}
		return $height;
	}

	/**
	 * フリーHTMLの変換
	 */
	public function replace_free_comment( $meta_datas, $free_comment ) {
		$free_comment = str_replace( self::AMAZON_ID_INSERT_TAG, $this->amazon_traccking_id, $free_comment );
		$free_comment = str_replace( self::RAKUTEN_ID_INSERT_TAG, $this->rakuten_affiliate_id, $free_comment );
		$free_comment = str_replace( self::ASIN_INSERT_TAG, $meta_datas[ self::ASIN_COLUMN ], $free_comment );
		$free_comment = str_replace( self::RAKUTEN_CODE_INSERT_TAG, $meta_datas[ self::RAKUTEN_ITEMCODE_COLUMN ], $free_comment );
		$free_comment = do_shortcode( stripslashes( $free_comment ) );
		return $free_comment;
	}

	/**
	 * アマゾンボタンリンクに商品詳細リンクをはるかどうか確認してこのメソッドで変更
	 * タイトルURLの設定がなければ検索ページへのリンクのまま
	 * @param $meta_data
	 * @return mixed
	 */
	public function check_id_amazon_detail( $meta_data ) {
		if ( $this->is_amazon_detail_url() && isset( $meta_data[ 'original_amazon_title_url' ] )) {
			$meta_data['original_amazon_url'] = $meta_data[ 'original_amazon_title_url' ];
		}
		return $meta_data;
	}

	public function is_amazon_detail_url() {
		$is_amazon_detail_url = get_option( $this->option_column_name( self::IS_DETAIL_AMAZON_URL_OPTION_COLUMN ) );
		return intval( $is_amazon_detail_url ) === 1;
	}


	/**
	 * 楽天ボタンリンクに商品詳細リンクをはるかどうか確認してこのメソッドで変更
	 * タイトルURLの設定がなければ検索ページへのリンクのまま
	 * @param $meta_data
	 * @return mixed
	 */
	public function check_id_rakuten_detail( $meta_data ) {
		if ( $this->is_rakuten_detail_url() && isset( $meta_data[ 'original_rakuten_title_url' ] )) {
			$meta_data['original_rakuten_url'] = $meta_data[ 'original_rakuten_title_url' ];
		}
		return $meta_data;
	}

	/**
	 * 楽天ボタンを商品詳細にするかどうか
	 * もしもの時は必ず検索へ
	 * @return bool
	 */
	public function is_rakuten_detail_url() {
		$is_rakuten_detail_url = get_option( $this->option_column_name( self::IS_DETAIL_RAKUTEN_URL_OPTION_COLUMN ) );
		return intval( $is_rakuten_detail_url ) === 1 &&  !$this->is_moshimo(self::SHOP_TYPE_RAKUTEN );
	}

	/**
	 * ショートコードがから画像のサイズを取得する
	 * @param null $size
	 *
	 * @return string
	 */
	public function getImageColumn($size = null, $is_prefix = true) {
		$default_size =  $this->default_image_size( $size );
		switch ( $default_size ) {
			case 'S':
			case 's':
				$column = self::IMAGE_S_COLUMN;
				break;
			case 'M':
			case 'm':
				$column = self::IMAGE_M_COLUMN;
				break;
			case 'L':
			case 'l':
				$column = self::IMAGE_L_COLUMN;
				break;
			default:
				$column = self::IMAGE_M_COLUMN;
				break;
		}
		if ( $is_prefix ){
			return $this->custom_field_column_name( $column );
		} else {
			return $column;
		}
	}

	/**
	 * ショートコードがから画像のサイズを取得する
	 * @param null $size
	 *
	 * @return string
	 */
	public function getVImagesColumn($size = null, $is_prefix = true) {
		$default_size =  $this->default_image_size( $size );
		switch ( $default_size ) {
			case 'S':
			case 's':
				$column = self::S_VARIANT_IMAGES_COLUMN;
				break;
			case 'M':
			case 'm':
				$column = self::M_VARIANT_IMAGES_COLUMN;
				break;
			case 'L':
			case 'l':
				$column = self::L_VARIANT_IMAGES_COLUMN;
				break;
			default:
				$column = self::M_VARIANT_IMAGES_COLUMN;
				break;
		}
		if ( $is_prefix ){
			return $this->custom_field_column_name( $column );
		} else {
			return $column;
		}
	}

	/**
	 * ショートコードがから画像のclassを取得する
	 * @param null $size
	 *
	 * @return string
	 */
	public function getImageClass( $size = null ) {
		switch ($size) {
			case 'S':
			case 's':
				$class = 'yyi-rinker-img-s';
				break;
			case 'L':
			case 'l':
				$class = 'yyi-rinker-img-l';
				break;
			case 'M':
			case 'm':
				$class = 'yyi-rinker-img-m';
				break;
			default:
				$class = $this->default_image_class( $size );
				break;
		}
		return $class;
	}

	/*
	 * デフォルトの画像class
	 */
	public function default_image_class( $size ) {
		$default_size =  $this->default_image_size( $size );
		switch ($default_size) {
			case 'S':
			case 's':
				$image_class = 'yyi-rinker-img-s';
				break;
			case 'L':
			case 'l':
				$image_class = 'yyi-rinker-img-l';
				break;
			case 'M':
			case 'm':
				$image_class = 'yyi-rinker-img-m';
				break;
			default:
				$image_class = 'yyi-rinker-img-m';
				break;
		}
		return $image_class;
	}

	/**
	 * ショートコードで指定があればそれを返し、なければデフォルトの画像サイズを返す
	 * @param $size
	 * @return string
	 */
	public function default_image_size( $size ) {
		if (is_null($size) || $size === '') {
			$s = 'm';
			$s = apply_filters($this->add_prefix('default_image_size'), $s);
			return $s;
		} else {
			return $size;
		}
	}

	/**
	 * 管理画面の初期設定
	 */
	public function admin_init() {
		add_action( 'media_buttons', array( $this, 'media_buttons' ), 20 );
		wp_register_script(
			$this->add_prefix( 'admin_rinker_script' ),
			$this->script_admin_rinker_url,
			array( 'jquery' ),
			null
		);
	}

	/**
	 * 管理ページへscriptファイルを登録
	 */
	public function add_admin_script() {
		wp_enqueue_script( $this->add_prefix( 'admin_rinker_script' ) );
	}

	public function add_menu_page() {
		add_submenu_page( 'options-general.php', 'Rinker設定', 'Rinker設定', 'manage_options', YYIRINKER_PLUGIN_DIR . 'yyi-rinker.php', array($this, 'option_page'), 6 );
	}

	public function front_init() {
		wp_register_style( $this->add_prefix( 'stylesheet' ), $this->style_css_url );
		wp_register_script(
			$this->add_prefix( 'front_script' ),
			$this->script_front_url,
			array( 'jquery' ),
			null
		);

		if ( $this->is_tracking ){
			wp_register_script(
				$this->add_prefix( 'event_tracking_script' ),
				$this->script_event_tracking_url,
				array( 'jquery' ),
				null
			);
		}
	}

	public function add_front_styles() {
		$this->front_init();
		wp_enqueue_script( $this->add_prefix( 'event_tracking_script' ) );
		wp_enqueue_style( $this->add_prefix( 'stylesheet' ) );
		if ($this->is_some_images) {
			wp_enqueue_script( $this->add_prefix( 'front_script' ) );
		}
	}

	public function updated_message() {
		echo '<div id="message" class="updated notice notice-success is-dismissible"><p>設定を更新しました。</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">この通知を非表示にする</span></button></div>';
	}

	/**
	 * 商品リンクをカスタムフィールドに追加する for ajax
	 */
	public function add_item() {
		global $post_id;

		if ( !check_ajax_referer(  $this->add_prefix( 'add_itemlinks' ), '_wpnonce', false ) ) {
			wp_die( 'リファラエラー' );
		}

		if ( !current_user_can( 'edit_posts' ) ) {
			wp_die( '権限がありません' );
		}

		$params = [
			'post_title'	=> $this->array_get($_POST, 'title'),
			'post_name'		=> $this->array_get($_POST, 'title'),
			'post_status'	=> 'publish',
			'post_type'		=> self::LINK_POST_TYPE,
			'ping_status'	=> 'closed',
		];
		$post_id = wp_insert_post( $params );

		if ( intval($post_id) > 0) {
			$this->save_post_meta_links( $post_id, $_POST, true, true );
			wp_die( $post_id );
		} else {
			wp_die( 0 );
		}
	}

	/**
	 * Amazon検索画面から商品リンクを取得返す
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_amazon_link_from_keyword( $keywords ) {
		$traccking_id	= $this->amazon_tracking_id;
		$url = 'https://www.amazon.co.jp/gp/search?ie=UTF8&keywords=' . urlencode( $keywords ) . '&tag=' . $traccking_id . '&index=blended&linkCode=ure&creative=6339';
		return $url;
	}

	/**
	 * Amazon 詳細ページのオリジナルリンクを取得します
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_amazon_title_original_link( $asin ) {
		if (strlen( $asin ) > 0) {
			$url = 'https://www.amazon.co.jp/dp/' . $asin;
		} else {
			$url = '';
		}

		return $url;
	}

	/**
	 * Amazon 詳細ページのアソシエイトID付きで返します
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_amazon_title_link_with_aid( $original_url, $post_id, $atts = [] ) {
		$tracking_id = isset($atts['tag']) && strlen($atts['tag']) > 0 ? $atts['tag'] : $this->amazon_traccking_id;
		if ( $this->is_moshimo( self::SHOP_TYPE_AMAZON ) ) {
			$url = $this->generate_moshimo_link( self::SHOP_TYPE_AMAZON, $original_url );
		} else {
			if ( strpos( $original_url, 'tag=' . $this->amazon_traccking_id ) === false && strpos( $original_url, 'tag=' . $tracking_id ) === false) {
				$url = $original_url . '?tag=' . $tracking_id . '&linkCode=as1&creative=6339';
			} elseif ( $this->amazon_traccking_id <> $tracking_id) {
				$url = str_replace('tag=' . $this->amazon_traccking_id, 'tag=' . $tracking_id, $original_url);
			} else {
				$url = $original_url;
			}
		}
		$url = apply_filters( $this->add_prefix( 'generate_amazon_title_link_with_aid' ), $url, $original_url );
		return $url;
	}

	/**
	 * Amazon オリジナルリンクを取得します
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_amazon_original_link( $keywords ) {
		$url = 'https://www.amazon.co.jp/gp/search?ie=UTF8&keywords=' . urlencode( $keywords );
		return $url;
	}

	/**
	 * Amazon アソシエイトID付きで返します
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_amazon_link_with_aid( $original_url, $post_id, $atts = [] ) {

		if ( $this->is_moshimo( self::SHOP_TYPE_AMAZON ) ) {
			$url = $this->generate_moshimo_link( self::SHOP_TYPE_AMAZON, $original_url );
		} else {
			$tracking_id = isset($atts['tag']) && strlen($atts['tag']) > 0 ? $atts['tag'] : $this->amazon_traccking_id;
			$url = $original_url . '&tag=' . $tracking_id . '&index=blended&linkCode=ure&creative=6339';
		}

		$url = apply_filters( $this->add_prefix( 'generate_amazon_link_with_aid' ), $url, $original_url );
		return $url;
	}

	/**
	 * Amazon Kindle アソシエイトID付きで返します
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_amazon_kindle_link_with_aid( $original_url, $post_id, $atts = [] ) {
		if ( $this->is_moshimo( self::SHOP_TYPE_AMAZON_KINDLE ) ) {
			$url = $this->generate_moshimo_link( self::SHOP_TYPE_AMAZON_KINDLE, $original_url );
		} else {
			$tracking_id = isset($atts['tag']) && strlen($atts['tag']) > 0 ? $atts['tag'] : $this->amazon_traccking_id;
			if ( strpos( $original_url, 'tag=' . $this->amazon_traccking_id ) === false && strpos( $original_url, 'tag=' . $tracking_id ) === false) {
				$url = $original_url . '?tag=' . $tracking_id . '&index=blended&linkCode=ure&creative=6339';
			} elseif ( $this->amazon_traccking_id <> $tracking_id) {
				$url = str_replace('tag=' . $this->amazon_traccking_id, 'tag=' . $tracking_id, $original_url);
			} else {
				$url = $original_url;
			}
		}
		$url = apply_filters( $this->add_prefix( 'generate_amazon_kindle_link_with_aid' ), $url, $original_url );
		return $url;
	}


	/**
	 * AmazonAPIから商品データを取得する　for ajax
	 */
	public function search_amazon_from_api( $asin ) {
		$keywords		= $this->array_get( $_GET, 'keywords', '' );
		$search_index	=  $this->array_get( $_GET, 'search_index', '' );
		if ( isset( $this->search_indexes[ $search_index ])) {
			$search_index = $search_index;
		} else {
			$search_index = 'All';
		}
		$datas = $this->get_search_itemlist( null, $keywords, 2);
		$api_datas = $this->generate_amazon_datas_from_json( $keywords, $search_index );
		wp_send_json( [
			'old_datas' => $datas,
			'api_datas' => $api_datas,
		]) ;
	}

	/**
	 * PA-APIv5に対応
	 * AmazonAPIから商品データを取得
	 */
	public function generate_amazon_datas_from_json( $keywords, $search_index )
	{
		if (strlen(trim($keywords)) === 0) {
			die(json_encode(['error' => ['code' => '', 'message_jp' => 'キーワードを入力してください']]));
		}

		$searchItemRequest = new Yyi_Rinker_SearchItemsRequest();
		$searchItemRequest->Keywords = $keywords;
		$searchItemRequest->SearchIndex = $search_index;

		$datas = $this->get_json_from_amazon_api('SearchItems', $searchItemRequest);
		if ( is_array($datas) && isset( $datas['error'] ) ) {
			return $datas;
		} else {
			return $this->set_data_for_amazon( $datas, $keywords );
		}
	}

	/**
	 * PA-APIv5に対応
	 * AmazonApiから商品データを取得して再保存する
	 * @param $asin
	 */
	public function get_amazon_data_from_asin( $asin ) {
		$request = new Yyi_Rinker_GetItemsRequest();
		$request->ItemIds = [ $asin ];
		$datas = $this->get_json_from_amazon_api( 'GetItems', $request);
		if ( is_array($datas) && isset( $datas['error' ]) ) {
			return $datas;
		} else {
			return $this->set_data_for_amazon_resave( $datas );
		}
	}

	/**
	 * for PA-APIv5
	 * jsonからapiのデータを取得する
	 * @throws Exception
	 */
	private function get_json_from_amazon_api( $operation, $request ) {
		$access_key_id	= get_option( $this->option_column_name('amazon_access_key'));
		$traccking_id	= $this->amazon_traccking_id;
		$secret_key		= get_option( $this->option_column_name('amazon_secret_key'));

		$request->PartnerType = 'Associates';
		$request->PartnerTag = $traccking_id;
		$request->Resources = $this->amazon_resources_param;

		$host = 'webservices.amazon.co.jp';
		$path = '/paapi5/' . mb_strtolower( $operation );

		$payload = json_encode( $request );

		$awsv4 = new Yyi_Rinker_AwsV4($access_key_id, $secret_key);
		$awsv4->setRegionName('us-west-2');
		$awsv4->setServiceName('ProductAdvertisingAPI');
		$awsv4->setPath( $path );
		$awsv4->setPayload( $payload );
		$awsv4->setRequestMethod ('POST');
		$awsv4->addHeader('content-encoding', 'amz-1.0');
		$awsv4->addHeader('content-type', 'application/json; charset=utf-8');
		$awsv4->addHeader('host', $host);
		$awsv4->addHeader('x-amz-target', 'com.amazon.paapi5.v1.ProductAdvertisingAPIv1.' . $operation);
		$headers = $awsv4->getHeaders();

		$header_string = '';
		$curl_headers = [];
		foreach ( $headers as $key => $value ) {
			$curl_headers[] = $key . ': ' . $value;
			$header_string .= $key . ': ' . $value . "\r\n";
		}

		//cURLがインストールされていれば利用する
		if ( function_exists( 'curl_version' ) ) {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, 'https://' . $host . $path );
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST' );
			curl_setopt($curl, CURLOPT_POSTFIELDS, $payload );
			curl_setopt($curl, CURLOPT_HTTPHEADER, $curl_headers );
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true );
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
			curl_setopt($curl, CURLOPT_HEADER, true );
			curl_setopt($curl, CURLOPT_TIMEOUT, 10 );
			$response	= curl_exec( $curl );
			$info		= curl_getinfo( $curl );
			$error_no	= curl_errno( $curl );

			if ( $error_no === CURLE_OPERATION_TIMEDOUT ) {
				return [
					'error' => [
						'code' => 'タイムアウトしました',
						'message' => 'タイムアウトしました',
						'message_jp' => 'タイムアウトしました']];
			}
			if ( $error_no !== CURLE_OK ) {
				return [
					'error' => [
						'code' => 'cURLエラー',
						'message' => intval( $error_no ) . ':cURLエラー',
						'message_jp' => intval( $error_no ) . ':cURLエラー']];
			}
			$status_code = $info[ 'http_code' ];
			$header_size = curl_getinfo( $curl, CURLINFO_HEADER_SIZE );
			$res = substr( $response, $header_size );
			curl_close( $curl );
		} elseif ( ini_get('allow_url_fopen') == '1') {
			$params = array (
				'http' => array (
					'header' => $header_string,
					'method' => 'POST',
					'content' => $payload,
					'ignore_errors' => true,
				)
			);
			$stream = stream_context_create( $params );
			$res = @file_get_contents('https://' . $host . $path, false, $stream );
			preg_match('/HTTP\/1\.[0|1|x] ([0-9]{3})/', $http_response_header[0], $matches );
			$status_code = $matches[1];
		} else {
			return [
				'error' => [
					'code' => '環境エラー',
					'message' =>  'php.iniのallow_url_fopenをONにするかcURLインストールしてください',
					'message_jp' => 'php.iniのallow_url_fopenをONにするかcURLインストールしてください']];
		}

		if ( !$res ) {
			return [
				'error' => [
					'code' => '外部のファイルが読み込めません',
					'message' => '【parser Error】XMLが正しくありません',
					'message_jp' => '【parser Error】XMLが正しくありません']];
		}

		$json_datas = json_decode( $res );

		if ( !$json_datas && is_array( $json_datas )) {
			return [
				'error' => [
					'code' => 'データ取得不可',
					'message' => 'APIから正しいデータが返ってきません',
					'message_jp' => 'APIから正しいデータが返ってきません']];
		}

		if ( isset( $json_datas->Errors[0] ) ) {
			$code = $json_datas->Errors[0]->Code;
			$en_message = $json_datas->Errors[0]->Message;
			$message_ip = $this->amazon_api_json_errors($code, $en_message);
			return [
				'error' => [
					'code' => $code,
					'message' => $en_message,
					'message_jp' => $message_ip,]];
		}

		if ($status_code != '200') {
			return [
				'error' => [
					'code' => 'AmazonAPIのステータスエラー',
					'message' =>  intval($status_code) . ':AmazonAPIのステータスエラー',
					'message_jp' =>  intval($status_code) . ':AmazonAPIのステータスエラー']];
		}
		return $json_datas;
	}

	/**
	 * for PA-APIv5
	 * jsonのデータを整形
	 * @param $json_datas
	 * @param bool $is_new
	 * @return array
	 */
	private function set_data_for_amazon( $json_datas, $keyword, $is_new = true ) {
		$items = [];
		foreach ( $json_datas->SearchResult->Items as $item ) {
			$data = [];
			//新規の時だけ登録する部分
			if ( $is_new ) {
				$data[ self::ASIN_COLUMN ]				= (string)$item->ASIN;
				$data[ self::AMAZON_URL_COLUMN ]		= $this->generate_amazon_original_link( $keyword );
				$data[ self::RAKUTEN_URL_COLUMN ]		= $this->generate_rakuten_original_link( $keyword );
				$data[ self::YAHOO_URL_COLUMN ]			= $this->generate_yahoo_original_link( $keyword );
                $data[ self::MERCARI_URL_COLUMN ]	    = $this->generate_mercari_link( $keyword );

				if ( isset( $item->ItemInfo->Title->DisplayValue ) ) {
					$data[ self::TITLE_COLUMN ] = (string)$item->ItemInfo->Title->DisplayValue;
				} else {
					$data[ self::TITLE_COLUMN ] = '';
				}

				if ( isset( $item->ItemInfo->ByLineInfo->Brand->DisplayValue ) ) {
					$data[ self::BRAND_COLUMN ] = (string)$item->ItemInfo->ByLineInfo->Brand->DisplayValue;
				} else {
					$data[ self::BRAND_COLUMN ] = '';
				}
			}

			if ( isset( $item->ItemInfo->Classifications->ProductGroup->DisplayValue ) ) {
				$group = (string)$item->ItemInfo->Classifications->ProductGroup->DisplayValue;
				$data[ 'product_group' ] = $group;
				if ($group === 'Digital Ebook Purchas') {
					$data[ self::AMAZON_KINDLE_URL_COLUMN ] = (string)$item->DetailPageURL;
				}
			}

			$data[ self::AMAZON_TITLE_URL_COLUMN ]	= (string)$item->DetailPageURL;

			if ( isset( $item->Offers->Listings[0]->Price->Amount ) ) {
				$price = $item->Offers->Listings[0]->Price->Amount;
				$data[ self::PRICE_COLUMN ] = (string)$price;
				$data[ self::PRICE_AT_COLUMN ] = date_i18n('Y/m/d H:i:s');
			} else {
				$data[ self::PRICE_COLUMN ] = '';
				$data[ self::PRICE_AT_COLUMN ] = '';
			}

			if ( isset($item->Images->Primary)) {
				$data[self::IMAGE_S_COLUMN] = (string)$item->Images->Primary->Small->URL;
				$data[self::IMAGE_M_COLUMN] = (string)$item->Images->Primary->Medium->URL;
				$data[self::IMAGE_L_COLUMN] = (string)$item->Images->Primary->Large->URL;

				$data[self::IMAGE_S_SIZE_W_COLUMN] = (string)$item->Images->Primary->Small->Width;
				$data[self::IMAGE_S_SIZE_H_COLUMN] = (string)$item->Images->Primary->Small->Height;
				$data[self::IMAGE_M_SIZE_W_COLUMN] = (string)$item->Images->Primary->Medium->Width;
				$data[self::IMAGE_M_SIZE_H_COLUMN] = (string)$item->Images->Primary->Medium->Height;
				$data[self::IMAGE_L_SIZE_W_COLUMN] = (string)$item->Images->Primary->Large->Width;
				$data[self::IMAGE_L_SIZE_H_COLUMN] = (string)$item->Images->Primary->Large->Height;
			} else {
				$data[self::IMAGE_S_COLUMN] = '';
				$data[self::IMAGE_M_COLUMN] = '';
				$data[self::IMAGE_L_COLUMN] = '';

				$data[self::IMAGE_S_SIZE_W_COLUMN] = '';
				$data[self::IMAGE_S_SIZE_H_COLUMN] = '';
				$data[self::IMAGE_M_SIZE_W_COLUMN] = '';
				$data[self::IMAGE_M_SIZE_H_COLUMN] = '';
				$data[self::IMAGE_L_SIZE_W_COLUMN] = '';
				$data[self::IMAGE_L_SIZE_H_COLUMN] = '';
			}

			$data = $this-> genVariantsImagesData($item, $data);

			$items[] = $data;
		}

		return $items;
	}

	/**
	 * for PA-APIv5
	 * jsonのデータを整形
	 * @param $json_datas
	 * @param bool $is_new
	 * @return array
	 */
	private function set_data_for_amazon_resave( $json_datas ) {
		$items = [];
		foreach ( $json_datas->ItemsResult->Items as $item ) {
			$data = [];
			if ( isset( $item->ItemInfo->Classifications->ProductGroup->DisplayValue ) ) {
				$group = (string)$item->ItemInfo->Classifications->ProductGroup->DisplayValue;
				$data[ 'product_group' ] = $group;
				if ($group === 'Digital Ebook Purchas') {
					$data[ self::AMAZON_KINDLE_URL_COLUMN ] = (string)$item->DetailPageURL;
				}
			}

			if ( isset( $item->DetailPageURL ) ) {
				$data[ self::AMAZON_TITLE_URL_COLUMN ]	= (string)$item->DetailPageURL;
			}

			if ( isset( $item->Offers->Listings[0]->Price->Amount ) ) {
				$price = $item->Offers->Listings[0]->Price->Amount;
				$data[ self::PRICE_COLUMN ] = (string)$price;
				$data[ self::PRICE_AT_COLUMN ] = date_i18n('Y/m/d H:i:s');
			} else {
				$data[ self::PRICE_COLUMN ] = '';
				$data[ self::PRICE_AT_COLUMN ] = '';
			}

			if ( isset($item->Images->Primary)) {
				$data[self::IMAGE_S_COLUMN] = (string)$item->Images->Primary->Small->URL;
				$data[self::IMAGE_M_COLUMN] = (string)$item->Images->Primary->Medium->URL;
				$data[self::IMAGE_L_COLUMN] = (string)$item->Images->Primary->Large->URL;

				$data[self::IMAGE_S_SIZE_W_COLUMN] = (string)$item->Images->Primary->Small->Width;
				$data[self::IMAGE_S_SIZE_H_COLUMN] = (string)$item->Images->Primary->Small->Height;
				$data[self::IMAGE_M_SIZE_W_COLUMN] = (string)$item->Images->Primary->Medium->Width;
				$data[self::IMAGE_M_SIZE_H_COLUMN] = (string)$item->Images->Primary->Medium->Height;
				$data[self::IMAGE_L_SIZE_W_COLUMN] = (string)$item->Images->Primary->Large->Width;
				$data[self::IMAGE_L_SIZE_H_COLUMN] = (string)$item->Images->Primary->Large->Height;
			} else {
				$data[self::IMAGE_S_COLUMN] = '';
				$data[self::IMAGE_M_COLUMN] = '';
				$data[self::IMAGE_L_COLUMN] = '';

				$data[self::IMAGE_S_SIZE_W_COLUMN] = '';
				$data[self::IMAGE_S_SIZE_H_COLUMN] = '';
				$data[self::IMAGE_M_SIZE_W_COLUMN] = '';
				$data[self::IMAGE_M_SIZE_H_COLUMN] = '';
				$data[self::IMAGE_L_SIZE_W_COLUMN] = '';
				$data[self::IMAGE_L_SIZE_H_COLUMN] = '';
			}

			$data = $this-> genVariantsImagesData($item, $data);

			$items[] = $data;
		}
		return $items;
	}

	/**
	 * スライド用データ作成
	 * @param $item
	 * @param $data
	 * @return mixed
	 */
	public function genVariantsImagesData($item, $data) {
		if ( isset($item->Images->Variants) && is_array($item->Images->Variants)) {
			//メイン画像のデータを追加
			foreach( $this->variant_images AS $column => $marks) {
				$url = $data[ $this->main_images[$marks['type']]['url'] ];
				$width = $data[ $this->main_images[$marks['type']]['width'] ];
				$height = $data[ $this->main_images[$marks['type']]['height'] ];
				$data[ $column ] = [];
				$data[ $column ][] = [
					'url' => $url,
					'w' => $width,
					'h' => $height,
				];
			}

			foreach($item->Images->Variants AS $image) {
				foreach( $this->variant_images AS $column => $marks) {
					$mark = $marks['amazon'];
					$data[ $column ][] = [
						'url' => $image->$mark->URL,
						'w' => $image->$mark->Width,
						'h' => $image->$mark->Height,
					];
				}
			}
		}

		foreach( $this->variant_images AS $column => $marks) {
			$data[ $column ] = json_encode( $this->array_get($data, $column, ''));
		}
		return $data;
	}

	/**
	 * For PA-API v5
	 * Amazon APIのエラーメッセージを返します
	 * @param $code
	 * @param $en_message
	 *
	 * @return string
	 */
	public function amazon_api_json_errors( $code , $en_message ) {
		switch( $code ) {
			case 'AccessDenied':
			case 'AccessDeniedAwsUsers':
				$message ='このアクセスキーは、Product Advertising APIにアクセスするために有効になっていません。AWS認証情報を利用している場合はProduct Advertising APIで取得し直してください。';
				break;
			case 'InvalidAssociate':
				$message = 'アクセスキー[アクセスキー]は、承認されたアソシエイトストアのプライマリにマップされていません。';
				break;
			case 'IncompleteSignature':
				$message = '要求の署名には、必要なコンポーネントのすべてが含まれていませんでした。';
				break;
			case 'InvalidPartnerTag':
				$message = '認証情報が合いません。[設定]-[[Rinker設定]-[Amazon][アソシエイツのトラッキングID][トラッキングID]を正しいものに設定してください。';
				break;
			case 'InvalidSignature"':
				$message = 'アクセスキーIDが存在しません。[設定]-[[Rinker設定]-[Amazon][API][シークレットキー]を正しいものに設定してください。';
				break;

			case 'TooManyRequests':
				$message = 'リクエスト回数が多すぎます。';
				break;
			case 'RequestExpired':
				$message = 'リクエストの有効期限が過ぎています。';
				break;
			case 'InvalidParameterValue':
			case 'MissingParameter':
				$message = 'キーワードを入力してください';
				break;
			case 'UnrecognizedClient':
				$message = 'アクセスキーIDが合いません。[設定]-[[Rinker設定]-[Amazon][API][アクセスキーID]を正しいものに設定してください。';
				break;
			case 'UnknownOperationException':
				$message = '要求された操作は無効です。操作名が正しく入力されていることを確認してください。';
				break;
			case 'NoResults':
				$message = '該当する商品がありません';
				break;
			case 'UnrecognizedClientException':
				$message = 'アクセスキーまたはセキュリティトークンが無効です。';
				break;
			default:
				$message = $en_message;
				break;
		}
		return $message;
	}

	/**
	 * PA-APIv4 廃止予定
	 * @param $endpoint
	 * @param $infos
	 * @param bool $is_new
	 * @return array
	 */
	private function get_xml_from_amazon_api( $endpoint, $infos, $is_new = true ) {
		$uri = '/onca/xml';

		$access_key_id	= get_option( $this->option_column_name( 'amazon_access_key' ) );
		$traccking_id	= $this->amazon_traccking_id;
		$secret_key		= get_option( $this->option_column_name( 'amazon_secret_key' ) );

		$params = [
			'Service'			=> 'AWSECommerceService',
			'AWSAccessKeyId'	=> $access_key_id,
			'Timestamp'			=> gmdate( 'Y-m-d\TH:i:s\Z' ),
			'AssociateTag'		=> $traccking_id,
			'ResponseGroup'		=> "Images,ItemAttributes,Offers,AlternateVersions",
		];

		$params = $params + $infos;

		ksort($params);

		$pairs = array();

		foreach ($params as $key => $value) {
			array_push( $pairs, rawurlencode( $key ) . '=' . rawurlencode( $value ) );
		}

		$canonical_query_string = join( "&", $pairs );

		$string_to_sign = "GET\n" . $endpoint . "\n" . $uri . "\n" . $canonical_query_string;

		$signature = base64_encode( hash_hmac( "sha256", $string_to_sign, $secret_key, true ) );

		$request_url = 'http://' . $endpoint . $uri . '?' . $canonical_query_string . '&Signature=' . rawurlencode($signature);

		$response = wp_remote_request(
			$request_url,
			array(
				'timeout' => 30,
			)
		);

		set_error_handler( function( $errno, $errstr, $errfile, $errline ) {
			throw new Exception( $errstr, $errno );
		});

		$body = wp_remote_retrieve_body( $response );
		try {
			$xml = simplexml_load_string( $body );
			restore_error_handler();
		} catch( Exception $e ){
			restore_error_handler();
			return [ 'error' => [
				'code' => 'XML parser Error',
				'message' => '【parser Error】XMLが正しくありません',
				'message_jp' => '【parser Error】XMLが正しくありません'
			] ] ;
		}

		if ( $xml ) {
			if ( $xml->Items && $xml->Items->Request && 'True' == (string)$xml->Items->Request->IsValid ) {

				if ( $xml->Items->Request->Errors->Error ) {
					$error = $xml->Items->Request->Errors->Error;
					$errors = [ 'error' => [] ];
					$errors[ 'error' ][ 'code' ]		= (string)$error->Code;
					$errors[ 'error' ][ 'message' ]		= (string)$error->Message;
					$errors[ 'error' ][ 'message_jp' ]	= $this->amazon_api_errors( $errors[ 'error' ][ 'code' ], $errors[ 'error' ][ 'message' ] );
					return $errors;
				}

				$items = [];
				foreach ( $xml->Items->Item as $item ) {
					$data = [];
					//新規の時だけ登録する部分
					if ( $is_new ) {
						$data[ self::ASIN_COLUMN ]				= (string)$item->ASIN;
						$data[ self::AMAZON_URL_COLUMN ]		= $this->generate_amazon_original_link( $infos['Keywords'] );
						$data[ self::RAKUTEN_URL_COLUMN ]		= $this->generate_rakuten_original_link( $infos['Keywords'] );
						$data[ self::YAHOO_URL_COLUMN ]			= $this->generate_yahoo_original_link( $infos['Keywords'] );
                        $data[ self::MERCARI_URL_COLUMN ]	    = $this->generate_mercari_original_link( $infos['Keywords'] );

						if ( isset( $item->ItemAttributes ) ) {
							$data[ self::TITLE_COLUMN ] = (string)$item->ItemAttributes->Title;
							$data[ self::BRAND_COLUMN ] = (string)$item->ItemAttributes->Brand;
						} else {
							$data[ self::TITLE_COLUMN ] = '';
							$data[ self::BRAND_COLUMN ] = '';
						}
					}

					if ( isset( $item->ItemAttributes ) ) {
						$group = (string)$item->ItemAttributes->ProductGroup;

						$data[ 'product_group' ] = $group;
						if ( $group === 'Book' ) {
							$data[ self::AMAZON_KINDLE_URL_COLUMN ] = $this->setKindleUrl( $item );
						} elseif ($group === 'eBooks') {
							$data[ self::AMAZON_KINDLE_URL_COLUMN ] = (string)$item->DetailPageURL;
						}
					}

					$data[ self::AMAZON_TITLE_URL_COLUMN ]	= (string)$item->DetailPageURL;

					if ( isset( $item->OfferSummary->LowestNewPrice ) ) {
						$price = $item->OfferSummary->LowestNewPrice->Amount;
						$data[ self::PRICE_COLUMN ] = (string)$price;
						$data[ self::PRICE_AT_COLUMN ] = date_i18n('Y/m/d H:i:s');
					} else {
						$data[ self::PRICE_COLUMN ] = '';
						$data[ self::PRICE_AT_COLUMN ] = '';
					}

					$data[ self::IMAGE_S_COLUMN ]	= (string) $item->SmallImage->URL;
					$data[ self::IMAGE_M_COLUMN ]	= (string) $item->MediumImage->URL;
					$data[ self::IMAGE_L_COLUMN ]	= (string) $item->LargeImage->URL;

					$data[ self::IMAGE_S_SIZE_W_COLUMN ]	= (string) $item->SmallImage->Width;
					$data[ self::IMAGE_S_SIZE_H_COLUMN ]	= (string) $item->SmallImage->Height;
					$data[ self::IMAGE_M_SIZE_W_COLUMN ]	= (string) $item->MediumImage->Width;
					$data[ self::IMAGE_M_SIZE_H_COLUMN ]	= (string) $item->MediumImage->Height;
					$data[ self::IMAGE_L_SIZE_W_COLUMN ]	= (string) $item->LargeImage->Width;
					$data[ self::IMAGE_L_SIZE_H_COLUMN ]	= (string) $item->LargeImage->Height;

					$items[] = $data;
				}
				return $items;
			} else {
				$errors = [];
				if ( $xml->Error ) {
					$error = $xml->Error;
					$errors[ 'code' ]			= (string)$error->Code;
					$errors[ 'message' ]		= (string)$error->Message;
				} elseif ( $xml->Items->Request->Errors->Error ) {
					$error = $xml->Items->Request->Errors->Error;
					$errors[ 'code' ]			= (string)$error->Code;
					$errors[ 'message' ]		= (string)$error->Message;
				} else {
					$errors[ 'code' ]			= 'API ERROR';
					$errors[ 'message' ]		= 'APIのレスポンス内にエラーがあります';
				}
				$errors['message_jp']	= $this->amazon_api_errors( $errors['code'], $errors['message'] );
				return [ 'error' => $errors ] ;
			}
		}
	}

	/**
	 * 廃止予定
	 * AmazonのxmlからkindleのURLを抜き出す
	 * @param $item
	 * @return string
	 */
	public function setKindleUrl($item) {
		$json	= json_encode( $item );
		$items	= json_decode( $json, true );

		if ( isset( $items[ 'AlternateVersions' ][ 'AlternateVersion' ] ) ) {
			$versions = $items[ 'AlternateVersions' ][ 'AlternateVersion' ];
			if ( isset( $versions[ 'Binding' ] ) && $versions[ 'Binding' ] === 'Kindle版' ) {
				$kindle_asin = $this->array_get( $versions, 'ASIN', '' );
			} elseif ( isset( $versions[ 0 ] ) && is_array( $versions[ 0 ] ) ) {
				foreach( $versions AS $version ) {
					$binding = $this->array_get( $version, 'Binding', '' );
					if ( $binding === 'Kindle版' ) {
						$kindle_asin = $this->array_get( $version, 'ASIN', '' );
					}
				}
			}
		}

		if ( isset( $kindle_asin ) ) {
			return $this->generate_amazon_title_original_link( $kindle_asin );
		} else {
			return '';
		}
	}

	/**
	 * 廃止予定
	 * AmazonAPIから商品データを取得
	 */
	public function generate_amazon_datas( $keywords, $search_index ) {

		if ( strlen( trim( $keywords ) ) === 0 ) {
			die( json_encode( ['error' => [ 'code' => '', 'message_jp' => 'キーワードを入力してください' ] ] ) );
		}

		$endpoint = 'webservices.amazon.co.jp';
		$infos = [
			'Operation'			=>'ItemSearch',
			'Keywords'			=> $keywords,
			'SearchIndex'		=> $search_index,
		];

		$datas = $this->get_xml_from_amazon_api( $endpoint, $infos );

		wp_send_json( $datas );

	}

	/**
	 * 廃止予定
	 * kindle以外の書籍を検索
	 * @param $keywords
	 */
	public function generate_amazon_book_datas( $keywords ) {

		if ( strlen( trim( $keywords ) ) === 0 ) {
			die( json_encode( ['error' => [ 'code' => '', 'message_jp' => 'キーワードを入力してください' ] ] ) );
		}

		$endpoint = 'webservices.amazon.co.jp';
		$infos = [
			'Operation'			=>'ItemSearch',
			'Keywords'			=> $keywords,
			'SearchIndex'		=> 'Books',
			'Power'				=> 'binding:not kindle',
		];

		$datas = $this->get_xml_from_amazon_api( $endpoint, $infos );

		wp_send_json( $datas );

	}

	/**
	 * 廃止予定
	 * Amazon APIのエラーメッセージを返します
	 * @param $code
	 * @param $en_message
	 *
	 * @return string
	 */
	public function amazon_api_errors( $code , $en_message ) {
		switch( $code ) {
			case 'SignatureDoesNotMatch':
				$message = '認証情報が合いません。[設定]-[[Rinker設定]-[Amazon][API][シークレットキー]を正しいものに設定してください。';
				break;
			case 'InvalidClientTokenId':
				$message = 'アクセスキーIDが合いません。[設定]-[[Rinker設定]-[Amazon][API][アクセスキーID]を正しいものに設定してください。';
				break;
			case 'MissingClientTokenId':
				$message = 'アクセスキーIDが存在しません。[設定]-[[Rinker設定]-[Amazon][API][アクセスキーID]を設定してください。';
				break;
			case 'RequestThrottled':
				$message = 'リクエスト回数が多すぎます。';
				break;
			case 'AWS.MinimumParameterRequirement':
				$message = 'キーワードを入力してください';
				break;
			case 'AWS.ECommerceService.NoExactMatches':
				$message = '該当する商品がありません';
				break;
			case 'AWS.InvalidParameterValue':
				$message = 'このASINに該当する商品がありません';
				break;
			default:
				$message = $en_message;
				break;
		}
		return $message;
	}

	/**
	 * 楽天商品コードから商品データを取得する
	 * @param $itemcode
	 */
	public function get_rakuten_data_from_itemcode( $itemcode ) {
		$datas = $this->generate_rakuten_datas( $itemcode, 1, '', true );
		return $datas;
	}

	/**
	 *  楽天APIから商品データを取得する　for ajax
	 */
	public function search_rakuten_from_api() {
		$keywords = $this->array_get ($_GET, 'keywords', '' );
		$page = $this->array_get ($_GET, 'page', 1 );
		$sort = $this->array_get ($_GET, 'sort', 1 );

		$old_datas = $this->get_search_itemlist( null, $keywords, 2);
		$api_datas = $this->generate_rakuten_datas( $keywords, $page, $sort, false );
		wp_send_json( [
			'old_datas' => $old_datas,
			'api_datas' => $api_datas,
		]) ;
	}

	private function rakuten_application_id() {

	}

	/**
	 * 楽天APIから商品データを取得
	 * @param $keywords
	 * @param $page
	 * @param bool $is_itemcode itemcodeから検索（再取得時）
	 * @return array
	 */
	public function generate_rakuten_datas( $keywords, $page, $sort, $is_itemcode = false ) {

		if ( strlen( trim( $keywords ) ) === 0 ) {
			return ['error' => [ 'code' => '', 'message_jp' => '正しいキーワードを入力してください' ] ];
		}

		$uri = 'https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?hits=30&';
		$request_url = $uri . 'applicationId=' . $this->rakuten_application_id . '&affiliateId=' . $this->rakuten_affiliate_id ;

		$page = intval( $page ) > 1 ? intval( $page ) : 1;
		$request_url = $request_url . '&page=' . $page;

		$sort = $this->rakuten_sort( $sort );
		$request_url = $request_url . '&sort=' . urlencode( $sort );

		if ( $is_itemcode ) {
			$request_url .= '&availability=0&itemCode=' . rawurlencode( $keywords );
		} else {
			$request_url .= '&availability=1&keyword=' . rawurlencode( $keywords );
		}
		$response = wp_remote_request(
			$request_url,
			array(
				'timeout' => 30,
			)
		);

		if ( is_wp_error( $response ) || !isset( $response['body'] ) ) {
			return [ 'error'  => [
				'code'			=> 'XML parser error',
				'message'		=> '【parser Error】XMLが正しくありません',
				'message_jp'	=> '【parser Error】XMLが正しくありません',
				]
			];
		}

		$datas = json_decode( $response['body'], true );

		if ( $datas ) {
			if ( isset( $datas['error'] ) ) {
				$errors= [];
				$errors[ 'error' ] = [
					'code'		=> $datas[ 'error' ],
					'message'	=> $datas[ 'error_description' ],
				];
				$errors[ 'error' ][ 'message_jp' ] = $this->rakuten_api_errors( $datas[ 'error' ] , $datas[ 'error_description' ] );
				return $errors;
			}
			$items = [];

			if ( $is_itemcode && isset( $datas['hits'] ) && intval( $datas['hits'] ) === 0 ) {
				$errors= [];
				$errors[ 'error' ] = [
					'code'			=> 'rakuten_noitem',
					'message'		=> '指定の商品コードの商品がありません',
					'message_jp'	=> '指定の商品コードの商品がありません',
				];
				return $errors;
			}
			if ( isset( $datas[ 'Items' ]) ) {
				$item = [];
				foreach( $datas[ 'Items' ] AS $data ) {
					if ( $is_itemcode ) {
						$item[ self::PRICE_COLUMN ]		= $data['Item']['itemPrice'];
						$item[ self::PRICE_AT_COLUMN ]	= date_i18n( 'Y/m/d H:i:s' );
						$item[ self::RAKUTEN_TITLE_URL_COLUMN ]		= $data['Item']['affiliateUrl'];
						$item[ self::IMAGE_S_SIZE_W_COLUMN ]	= 64;
						$item[ self::IMAGE_S_SIZE_H_COLUMN ]	= 64;
						$item[ self::IMAGE_M_SIZE_W_COLUMN ]	= 128;
						$item[ self::IMAGE_M_SIZE_H_COLUMN ]	= 128;
						$item[ self::IMAGE_L_SIZE_W_COLUMN ]	= '';
						$item[ self::IMAGE_L_SIZE_H_COLUMN ]	= '';
						$items[] = $item;
						break;
					}
					//メイン画像のデータを追加
					foreach( $this->variant_images AS $column => $marks) {
						$item[ $column ] = [];
					}

					$item[ self::TITLE_COLUMN ]					= $data['Item']['itemName'];
					$item[ self::RAKUTEN_ITEMCODE_COLUMN ]		= $data['Item']['itemCode'];
					$item[ self::RAKUTEN_TITLE_URL_COLUMN ]		= $data['Item']['affiliateUrl'];
					if (isset( $data[ 'Item' ][ 'smallImageUrls' ][ 0 ][ 'imageUrl'] )){
						$item[ self::IMAGE_S_COLUMN ]				= $data['Item']['smallImageUrls'][ 0 ]['imageUrl'];
						foreach($data[ 'Item' ][ 'smallImageUrls' ] AS $image) {
							$item[ self::S_VARIANT_IMAGES_COLUMN ] []= [
								'url' => $image['imageUrl'],
								'w' => 64,
								'h' => 64,
							];
						}
					} else {
						$item[ self::IMAGE_S_COLUMN ]				= '';
					}

					if (isset( $data[ 'Item' ][ 'mediumImageUrls' ][ 0 ][ 'imageUrl' ] )){
						$item[ self::IMAGE_M_COLUMN ]				= $data['Item']['mediumImageUrls'][ 0 ]['imageUrl'];
						foreach($data[ 'Item' ][ 'mediumImageUrls' ] AS $image) {
							$item[ self::M_VARIANT_IMAGES_COLUMN ][] = [
								'url' => $image['imageUrl'],
								'w' => 64,
								'h' => 64,
							];
						}
					} else {
						$item[ self::IMAGE_M_COLUMN ]				= '';
					}
					$item[ self::IMAGE_L_COLUMN ]				= '';
					$item[ self::BRAND_COLUMN ]					= '';
					$item[ self::PRICE_COLUMN ]					= $data['Item']['itemPrice'];
					$item[ self::AMAZON_URL_COLUMN ]			= $this->generate_amazon_original_link( $keywords );
					$item[ self::RAKUTEN_URL_COLUMN ]			= $this->generate_rakuten_original_link( $keywords );
					$item[ self::YAHOO_URL_COLUMN ]				= $this->generate_yahoo_original_link( $keywords );
                    $item[ self::MERCARI_URL_COLUMN ]		    = $this->generate_mercari_original_link( $keywords );

					$item[ self::IMAGE_S_SIZE_W_COLUMN ]	= 64;
					$item[ self::IMAGE_S_SIZE_H_COLUMN ]	= 64;
					$item[ self::IMAGE_M_SIZE_W_COLUMN ]	= 128;
					$item[ self::IMAGE_M_SIZE_H_COLUMN ]	= 128;
					$item[ self::IMAGE_L_SIZE_W_COLUMN ]	= '';
					$item[ self::IMAGE_L_SIZE_H_COLUMN ]	= '';

					//楽天市場のみ
					$item[ 'affiliateRate' ] = $data['Item']['affiliateRate'];
					$item[ 'reviewAverage' ] = $data['Item']['reviewAverage'];

					foreach( $this->variant_images AS $column => $marks) {
						$item[ $column ] = json_encode($item[ $column ]);
					}

					$items[] = $item;
				}
			}
		}
		return $items;
	}

	/**
	 * 楽天APIの並び順を変更
	 * @param $sort
	 * @return mixed
	 */
	public function rakuten_sort( $sort ) {
		$sort_info = $this->array_get( $this->rakuten_sorts, intval( $sort ) , false);
		if ( !$sort_info ) {
			$sort_info = $this->rakuten_sorts[ 5 ];
		}
		return $sort_info[ 'value' ];
	}

	public function rakuten_api_errors( $code , $en_message ) {
		switch( $code ) {
			case 'wrong_parameter':
				switch ( $en_message ) {
					case 'keyword is not valid':
						$message = 'キーワードを正しく設定してください';
						break;
					case 'specify valid applicationId':
					case 'client_id or access_token':
						$message = 'アプリケーションIDが登録されていません。開発者に問い合わせてください。';
						break;
					case 'itemCode is not valid':
						$message = '商品コードが存在しません';
						break;
					default:
						$message = 'パラメーターエラーです';
						break;
				}
				break;
			case 'not_found':
				$message = 'データが存在しません';
				break;
			case 'too_many_requests':
				$message = 'リクエスト回数が多すぎます。しばらく時間を空けてからご利用ください。';
				break;

			case 'system_error':
				$message = '楽天ウェブサービスのシステムエラーです。長時間続くようであれば楽天ウェブサービスヘルプページよりごお問い合わせください。';
				break;
			case 'service_unavailable':
				$message = '楽天ウェブサービスメンテナンス中です。' . $en_message;
				break;
			default:
				$message = $en_message;
				break;
		}
		return $message;
	}

	/**
	 * 楽天 詳細ページのアソシエイトID付きで返します
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_rakuten_title_link_with_aid( $original_url, $post_id, $place = 'title' ) {
		if ( $this->is_moshimo( self::SHOP_TYPE_RAKUTEN ) ) {
			$url = $this->generate_moshimo_link( self::SHOP_TYPE_RAKUTEN, $original_url );
		} else {
			$timestamp		= esc_attr( get_the_date('YmdHis', $post_id) );
			if ( $place === 'image' ) {
				$mark = 'Rinker_i_' . $timestamp;
			} else {
				$mark = 'Rinker_t_' . $timestamp;
			}
			$url = preg_replace('/\?pc=/', $mark . '?pc=', $original_url, 1);
		}
		$url = apply_filters( $this->add_prefix( 'generate_rakuten_title_link_with_aid' ), $url, $original_url, $place );
		return $url;
	}

	/**
	 * 楽天の検索ページを返す　アフィリエイトIDなし
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_rakuten_original_link( $keywords ) {
		$base_url = 'https://search.rakuten.co.jp/search/mall/';
		$url = $base_url . urlencode( $keywords ) . '/?f=1&grp=product';
		return $url;
	}

	/**
	 * 楽天アフィリエイトURLを返す
	 * @param $url
	 *
	 * @return string
	 */
	public function generate_rakuten_link_with_aid( $original_url , $post_id ) {
		if ( $this->is_moshimo( self::SHOP_TYPE_RAKUTEN ) ) {
			$url = $this->generate_moshimo_link( self::SHOP_TYPE_RAKUTEN, $original_url );
		} else {
			$timestamp		= esc_attr( get_the_date('YmdHis', $post_id) );
			$url = 'https://hb.afl.rakuten.co.jp/hgc/' .  $this->rakuten_affiliate_id . '/Rinker_o_' . $timestamp . '?pc=' . urlencode( $original_url ) . '&m=' . urlencode( $original_url );
		}
		$url = apply_filters( $this->add_prefix( 'generate_rakuten_link_with_aid' ), $url, $original_url );
		return $url;
	}

	/**
	 * YahooアフィリエイトURLを返すフィルター
	 * @param $url
	 *
	 * @return string
	 */
	public function generate_yahoo_link_with_aid( $original_url, $post_id ) {

		if ( $this->is_moshimo( self::SHOP_TYPE_YAHOO ) ) {
			$url = $this->generate_moshimo_link( self::SHOP_TYPE_YAHOO, $original_url );
		} else {
			if ( $this->is_yahoo_id() ) {
				$url = 'https://ck.jp.ap.valuecommerce.com/servlet/referral?sid=' . $this->yahoo_sid . '&pid=' . $this->yahoo_pid . '&vc_url=' . urlencode( $original_url );
			} else {
				$url = $original_url;
			}
		}
		return $url;
	}


    /**
     * MercariアフィリエイトURLを返すフィルター
     * @param $url
     *
     * @return string
     */
    public function generate_mercari_link_with_aid( $original_url, $post_id ) {
        //アプリに遷移するとキーワードが保持されない
        $original_url = str_replace('+', '%20', $original_url);
        if ( $this->is_mercari_id() ) {
            $url = $original_url . '&utm_source=Rinker&afid=' . $this->mercari_id;
        } else {
            $url = $original_url;
        }
        return $url;
    }

    public function generate_mercari_original_link( $keywords ) {
        return $this->generate_mercari_link( $keywords );
    }

    /**
     * メルカリ用のリンクを作成します
     * @param $keywords
     *
     * @return string
     */
    public function generate_mercari_link( $keywords ) {
        return 'https://jp.mercari.com/search?keyword=' . urlencode( $keywords );
    }

	/**
	 * もしもリンクを作成します
	 * @param $shop_type
	 * @param $original_url
	 *
	 * @return string
	 */
	public function generate_moshimo_link( $shop_type, $original_url ){
		$a_id	= esc_attr( $this->shop_types[ $shop_type ][ 'a_id' ] );
		$p_id	= $this->shop_types[ $shop_type ][ 'p_id' ];
		$pc_id	= $this->shop_types[ $shop_type ][ 'pc_id' ];
		$pl_id	= $this->shop_types[ $shop_type ][ 'pl_id' ];
		return 'https://af.moshimo.com/af/c/click?a_id=' . $a_id . '&p_id=' . $p_id .'&pc_id='. $pc_id . '&pl_id=' . $pl_id . '&url=' . urlencode( $original_url );
	}


	/**
	 * そのShopはもしもリンクをはるかどうかを返す
	 * @param $shop_type_val
	 *
	 * @return bool
	 */
	public function is_moshimo( $shop_type ) {
		$shop_type_val = $this->shop_types[ $shop_type ][ 'val' ];
		return !!isset( $this->shop_types[ $shop_type ][ 'a_id' ] ) && strlen($this->shop_types[ $shop_type ][ 'a_id' ]) > 0  && ( $this->moshimo_shops_check & $shop_type_val );
	}

	/**
	 * Yahooのpidとsidが入力されているか判断する
	 */
	public function is_yahoo_id() {
		return intval( $this->yahoo_pid ) > 0 && intval( $this->yahoo_sid );
	}

    /**
     * Mercariのidとが入力されているか判断する
     */
    public function is_mercari_id() {
        return strlen( $this->mercari_id ) > 0;
    }

	public function get_search_shop_value( $post_id ) {
		return intval( get_post_meta( $post_id, $this->custom_field_column_name( self::SEARCH_SHOP_VALUE ), true ) );
	}

	/**
	 * 再取得しない
	 * @param $post_id
	 * @return int
	 */
	public function is_no_renew( $post_id ) {
		return !! get_post_meta( $post_id, $this->custom_field_column_name( self::NO_RENEW ), false );
	}

	/**
	 * post_idから
	 * タイトルURLを楽天にするかどうかチェックをする
	 * @param $post_id
	 *
	 * @return bool
	 */
	public function is_search_rakuten_from( $post_id ) {
		$value = $this->get_search_shop_value( $post_id );
		return $this->is_search_from_rakuten( $value );
	}

	/**
	 * Amazonからの検索かどうかチェックする
	 * @param $value
	 *
	 * @return bool
	 */
	public function is_search_from_amazon( $value ) {
		return intval( $value ) === self::SEARCH_SHOP_AMAZON || intval( $value ) === 0 ? true : false;
	}

	/**
	 * 楽天からの検索かどうかチェックする
	 * @param $value
	 *
	 * @return bool
	 */
	public function is_search_from_rakuten( $value ) {
		return intval( $value ) === self::SEARCH_SHOP_RAKUTEN ? true : false;
	}

	/**
	 * フリーリンクの商品リンクかチェックする
	 * @param $value
	 *
	 * @return bool
	 */
	public function is_search_from_freelink( $value ) {
		return intval( $value ) === self::SEARCH_SHOP_FREE ? true : false;
	}

	/**
	 * タイトルのURLをDBから返します
	 */
	public function get_title_url( $post_id , $is_title_url_rakuten = '') {
		if ( $is_title_url_rakuten === '' ) {
			$is_title_url_rakuten = $this->is_search_rakuten_from( $post_id );
		}
		if ( $is_title_url_rakuten ) {
			return get_post_meta( $post_id, $this->custom_field_column_name( self::RAKUTEN_TITLE_URL_COLUMN ), true );
		} else {
			return get_post_meta( $post_id, $this->custom_field_column_name( self::AMAZON_TITLE_URL_COLUMN ), true );
		}
	}

	/**
	 * yahooショッピング用のリンクを作成します アフィリエイトIDなし
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_yahoo_original_link( $keywords ) {
		return $this->generate_yahoo_link( $keywords );
	}

	/**
	 * yahooショッピング用のリンクを作成します
	 * @param $keywords
	 *
	 * @return string
	 */
	public function generate_yahoo_link( $keywords ) {
		$search_encode_text = urlencode( $keywords );
		return 'https://shopping.yahoo.co.jp/search?p=' . $search_encode_text;
	}

	/**
	 * リンク更新ボタン押下で呼ばれる for ajax
	 */
	public function relink_from_api() {
		$keywords = $this->array_get( $_GET, 'keywords', '' );
		$sites = [
			self::AMAZON_URL_COLUMN		=> $this->generate_amazon_original_link( $keywords ),
			self::RAKUTEN_URL_COLUMN	=> $this->generate_rakuten_original_link( $keywords ),
			self::YAHOO_URL_COLUMN		=> $this->generate_yahoo_original_link( $keywords ),
            self::MERCARI_URL_COLUMN    => $this->generate_mercari_original_link( $keywords ),
		];
		wp_send_json( $sites );
	}

	/**
	 * キャッシュを一括削除する
	 * for ajax
	 */
	public function delete_all_cache() {
		global $post_id;

		if ( !check_ajax_referer(  $this->add_prefix( 'delete_all_cache' ), '_wpnonce', false ) ) {
			wp_die( 'ページの更新期限がきれています' );
		}

		if ( !current_user_can( 'manage_options' ) ) {
			wp_die( 'このユーザーに操作権限がありません' );
		}

		$transient_key = '_transient_' . $this->add_prefix( 'itemlink_' ) . '%';
		$transient_key_timeout = '_transient_timeout_' . $this->add_prefix( 'itemlink_' ) . '%';

		global $wpdb;
		$result = $wpdb->query('DELETE FROM `' . $wpdb->options . '` WHERE (`option_name` LIKE "' . $transient_key  . '" OR `option_name` LIKE "' . $transient_key_timeout . '")');
		wp_die($result);
	}

	/**
	 * 登録済みの商品リンクデータを取得する　for ajax
	 * 登録済み商品リンクから検索タブの検索で使用
	 */
	public function search_itemlist() {
		$term_id = $this->array_get( $_GET, 'term_id', 0);
		$keywords = $this->array_get( $_GET, 'keywords', '' );
		$datas = $this->get_search_itemlist( $term_id, $keywords );
		wp_send_json($datas);
	}

	public function get_search_itemlist($term_id, $keywords, $numberposts = 20) {
		$args = [
			'post_type'			=> self::LINK_POST_TYPE,
			'posts_per_page'	=> $numberposts,
			'numberposts'		=> $numberposts,
			'post_status'		=> array( 'publish' ),
			's'					=> $keywords,
		];
		if ( intval($term_id) > 0 ){
			$args[ 'tax_query' ] = [
				[
					'taxonomy'	=> self::LINK_TERM_NAME,
					'terms'		=> $term_id,
				]
			];
		}
		$the_query = new WP_Query( $args );
		$datas = [];
		while ( $the_query->have_posts() ) : $the_query->the_post();
			$data = [];
			$data[ 'post_id' ]						= get_the_ID();
			$data[ self::TITLE_COLUMN ]				= get_the_title();
			$data[ self::FREE_TITLE_URL_COLUMN ]  	= get_post_meta( get_the_ID(), $this->add_prefix( self::FREE_TITLE_URL_COLUMN ), true );
			$data[ self::IMAGE_S_COLUMN ]			= get_post_meta( get_the_ID(), $this->add_prefix( self::IMAGE_S_COLUMN ), true );
			$data[ self::IMAGE_M_COLUMN ]			= get_post_meta( get_the_ID(), $this->add_prefix( self::IMAGE_M_COLUMN ), true );
			$data[ self::IMAGE_L_COLUMN ]			= get_post_meta( get_the_ID(), $this->add_prefix( self::IMAGE_L_COLUMN ), true );
			$data[ self::AMAZON_TITLE_URL_COLUMN ]	= get_post_meta( get_the_ID(), $this->add_prefix( self::AMAZON_TITLE_URL_COLUMN ), true );
			$data[ self::RAKUTEN_TITLE_URL_COLUMN ]	= get_post_meta( get_the_ID(), $this->add_prefix( self::RAKUTEN_TITLE_URL_COLUMN ), true );
			$data[ self::AMAZON_URL_COLUMN ]		= get_post_meta( get_the_ID(), $this->add_prefix( self::AMAZON_URL_COLUMN ), true );
			$data[ self::RAKUTEN_URL_COLUMN ]		= get_post_meta( get_the_ID(), $this->add_prefix( self::RAKUTEN_URL_COLUMN ), true );
			$data[ self::YAHOO_URL_COLUMN ]			= get_post_meta( get_the_ID(), $this->add_prefix( self::YAHOO_URL_COLUMN ), true );
            //メルカリは固定URL
            $data[ self::MERCARI_URL_COLUMN ]		= $this->generate_mercari_original_link($keywords);

			$search_shop_value = $this->get_search_shop_value( $data[ 'post_id' ] );
			$is_search_from_rakuten = $this->is_search_from_rakuten( $search_shop_value );
			$is_search_from_freelink = $this->is_search_from_freelink( $search_shop_value );
			if ( $is_search_from_freelink ) {
				$data[ 'text_url' ]	= esc_url( $data[ self::FREE_TITLE_URL_COLUMN ] );
			} elseif ( $is_search_from_rakuten ) {
				if ($this->is_moshimo(self::SHOP_TYPE_RAKUTEN)) {
					$rakuten_title_url =  $data[ self::RAKUTEN_URL_COLUMN ];
				} else {
					$rakuten_title_url =  $data[ self::RAKUTEN_TITLE_URL_COLUMN ];
				}
				$data[ 'text_url' ]	= $this->generate_rakuten_title_link_with_aid( $rakuten_title_url, $data[ 'post_id' ] );
			} else {
				$data[ 'text_url' ]	= $this->generate_amazon_title_link_with_aid( $data[ self::AMAZON_TITLE_URL_COLUMN ], $data[ 'post_id' ]);
			}
			$datas[] = $data;
		endwhile;

		return $datas;
	}

	/**
	 * 登録済み商品リンクから検索タブの使用時デフォルトで商品を出しておく
	 */
	public function  search_result_items( $tab ) {
		if ($tab === self::TAB_ITEMLIST) {
			$datas = $this->get_search_itemlist( 0, '' );
			foreach ( $datas AS $data ) {
				echo '<li class="items"><div class="img">';
				echo '<img src="' . esc_url( $data[ self::IMAGE_S_COLUMN ] ) . '"></div>';
				echo '<div class="detail"><div class="title">' . esc_html( $data[ self::TITLE_COLUMN ] ). '</div>';
				echo '<div class="links"><a class="button" href="' . esc_url( $data[ self::AMAZON_URL_COLUMN ] ) . '" rel="nofollow noopener" target="_blank">Amazon確認</a>';
				echo '<a class="button" href="' . esc_url( $data[ self::RAKUTEN_URL_COLUMN ] ) . '" rel="nofollow noopener" target="_blank">楽天確認</a>';
				echo '<a class="button" href="' . esc_url( $data[ self::YAHOO_URL_COLUMN ] ) . '" rel="nofollow noopener" target="_blank">Yahoo確認</a>';
                echo '<a class="button" href="' . esc_url( $data[ self::MERCARI_URL_COLUMN ] ) . '" rel="nofollow noopener" target="_blank">メルカリ確認</a>';
				echo '<a class="button" href="' . esc_url( admin_url() ) . 'post.php?post=' . esc_attr( $data[ 'post_id' ] ) . '&action=edit" rel="nofollow noopener" target="_blank">リンク編集</a></div>';
				echo '<div class="button-box"><button class="button select add-items-from-list" data-item-post-id="' . esc_attr( $data[ 'post_id' ] ) . '" >商品リンクを追加<span class="dashicons dashicons-arrow-right-alt2"></span></button></div>';
				echo '</div>';
				echo '</li>';
			}
		}
	}

	/**
	 * テンプレートに表示するためにリンクを整形
	 * @param $meta_datas
	 *
	 * @return mixed
	 */
	function upate_html_data( $meta_datas, $atts ) {
		$post_id = $meta_datas[ 'post_id' ];

		//Amazonボタン用URL
		$original_url = $this->array_get( $meta_datas, 'original_amazon_url', '' );
		if ( $original_url !== '' ) {
			if ( $this->is_amazon_detail_url() && isset( $meta_datas[ 'original_amazon_title_url' ] ) ) {
				$meta_datas[ 'amazon_url' ] = $this->generate_amazon_title_link_with_aid( $original_url, $post_id, $atts);
			} else {
				$meta_datas[ 'amazon_url' ] = $this->generate_amazon_link_with_aid( $original_url, $post_id, $atts );
			}
		}

		//AmazonKindleボタン用URL
		$original_url = $this->array_get( $meta_datas, 'original_amazon_kindle_url', '' );
		if ( $original_url !== '' ) {
			if (strpos($original_url, '?') === false ) {
				$original_url .= '?';
			}
			$meta_datas[ 'amazon_kindle_url' ] = $this->generate_amazon_kindle_link_with_aid( $original_url, $post_id, $atts );
		}

		//楽天ボタン用URL
		$original_url = $this->array_get( $meta_datas, 'original_rakuten_url', '' );
		if ( $original_url !== '' ) {
			if ( $this->is_rakuten_detail_url() && isset( $meta_datas[ 'original_rakuten_title_url' ] ) ) {
				$meta_datas[ 'rakuten_url' ] = $this->generate_rakuten_title_link_with_aid( $original_url, $post_id );
			} else {
				$meta_datas[ 'rakuten_url' ] = $this->generate_rakuten_link_with_aid( $original_url, $post_id );
			}

		}
		//Yahooボタン用URL
		$original_url = $this->array_get( $meta_datas, 'original_yahoo_url', '' );
		if ( $original_url !== '' ) {
			$meta_datas[ 'yahoo_url' ] = $this->generate_yahoo_link_with_aid( $original_url, $post_id );
		}

        //メルカリボタン用URL
        $mercari_original_url = trim($this->array_get( $meta_datas, 'original_mercari_url', '' ));
        if ($mercari_original_url == '' && $this->is_mercari_id()) {
            $keyword = get_post_meta( $post_id, $this->add_prefix( self::KEYWORD_COLUMN ), true);
            $mercari_original_url = $this->generate_mercari_link( $keyword );
        }
        if ( $mercari_original_url !== '' ) {
            $meta_datas[ 'mercari_url' ] = $this->generate_mercari_link_with_aid( $mercari_original_url, $post_id );
        }

		foreach($this->shop_types AS $key => $values) {
			$meta_datas[ $key . '_link' ] = $this->link_html( $meta_datas, $key, $values, $atts );
		}


		//楽天タイトルリンク
		//もしもの時は必ず検索ボタンにする
		if ( $this->is_moshimo(self::SHOP_TYPE_RAKUTEN ) ) {
			$original_url = $this->array_get( $meta_datas, 'original_rakuten_url', '' );
		} else {
			$original_url = $this->array_get( $meta_datas, 'original_rakuten_title_url', '' );
		}
		if ( $original_url !== '' ) {
			$meta_datas[ 'rakuten_title_url' ] = $this->generate_rakuten_title_link_with_aid( $original_url, $post_id );
			$meta_datas[ 'rakuten_image_url' ] = $this->generate_rakuten_title_link_with_aid( $original_url, $post_id, 'image' );
		}
		$meta_datas[ 'rakuten_title_link' ] =$this->title_html( $meta_datas, self::SHOP_TYPE_RAKUTEN );
		$meta_datas[ 'rakuten_image_link' ]	 = $this->image_html( $meta_datas, self::SHOP_TYPE_RAKUTEN, $atts );

		//Amazonタイトルリンク
		$original_url = $this->array_get( $meta_datas, 'original_amazon_title_url', '' );
		if ( $original_url !== '' ) {
			$meta_datas[ 'amazon_title_url' ] = $this->generate_amazon_title_link_with_aid( $original_url, $post_id, $atts );
		}
		$meta_datas[ 'amazon_title_link' ] = $this->title_html( $meta_datas, self::SHOP_TYPE_AMAZON );
		$meta_datas[ 'amazon_image_link' ]	 = $this->image_html( $meta_datas, self::SHOP_TYPE_AMAZON, $atts );


		$meta_datas[ 'free_image_link' ]	 = $this->image_html( $meta_datas, 'freelink', $atts );

		foreach ([ 1, 2, 3, 4 ] as $num) {
			$meta_datas = $this->free_link_html( $num, $meta_datas );
		}

		$meta_datas[ 'credit' ] = 'created by&nbsp;<a href="https://oyakosodate.com/rinker/" rel="nofollow noopener" target="_blank" >Rinker</a>';

		return $meta_datas;
	}

	public function image_html( $meta_datas, $shop_type, $atts = [] ) {
		if ( $shop_type === self::SHOP_TYPE_RAKUTEN ) {
			$title_image_url = $this->array_get($meta_datas, 'rakuten_image_url', '');
		} elseif ($shop_type === 'freelink') {
			$title_image_url = $this->array_get($meta_datas, self::FREE_TITLE_URL_COLUMN, '');
		} else {
			$title_image_url =  $this->array_get($meta_datas, self::AMAZON_TITLE_URL_COLUMN, '');
		}

		$image_size = $this->array_get( $meta_datas, 'size', '');
		$image_column = $this->getImageColumn( $image_size, false );
		$image_path = $this->array_get( $meta_datas, $image_column, '' );
		$size = $this->image_size_html( $image_column, $meta_datas );

		$lazyload = '';
		if ($this->is_lazyload) {
			$lazyload = ' loading="lazy"';
		}

		$v_images_column = $this->getVImagesColumn($image_size, false);
		$v_images = $this->array_get( $meta_datas, $v_images_column, '' );
		$v_images = json_decode( $v_images );
		$html = '';
		//画像複数表示の時
		if ($this->is_some_images && is_array($v_images)) {
			$html .= '<div class="yyi-rinker-images">';
			$html .= '<img class="skip-lazy yyi-rinker-images-arrow yyi-rinker-images-arrow-left hidden" width="30" heigth="30" src="' . esc_url($this->arrow_left_img_url) . '">';
			$is_first = true;
			foreach($v_images AS $index => $v_image) {
				if (esc_url( $v_image->url ) === '') {
					continue;
				}
				$img_class = '';

				if ($is_first) {
					$some_lazyload = $lazyload;
					$is_first = false;
				} else {
					$some_lazyload = '';
					$img_class = 'hidden';
				}
				$html .= '<img src="' . esc_url( $v_image->url ) . '" class="yyi-rinker-main-img skip-lazy ' . $img_class .'" style="border: none;"' . $some_lazyload . ' ' .  $size . '>';
			}
			if (count( $v_images ) > 0) {
				$html .= '<img class="skip-lazy yyi-rinker-images-arrow yyi-rinker-images-arrow-right" width="30" heigth="30" src="' . esc_url( $this->arrow_right_img_url ) . '">';
			}
			$html .= '</div>';

			if ($this->is_thumd($atts)) {
				$html .= '<ul class="yyi-rinker-thumbnails">';
				$is_first = true;
				foreach ($v_images as $index => $v_image) {
					if (esc_url($v_image->url) === '') {
						continue;
					}
					$li_class = 'thumb-active';

					if ($is_first) {
						$some_lazyload = $lazyload;
						$is_first = false;
					} else {
						$some_lazyload = '';
						$li_class = '';
					}
					$html .= '<li class="' . $li_class . '"><img src="' . esc_url($v_image->url) . '" class="skip-lazy" style="max-width: 30px; max-height: 30px; border: none;"' . $some_lazyload . '></li>';
				}
				$html .= '</ul>';
			}
		//画像一枚表示
		} elseif ( strlen( $title_image_url ) > 0) {
			$rel_target_text = $this->get_rel_target_text();
			if ( $this->is_tracking ) {
				$click_tracking_data = esc_attr( $shop_type ) . '_img '  . esc_attr( $meta_datas[ 'post_id' ] ). ' ' . esc_attr( $meta_datas[ 'title' ] );
				$html .= '<a href="' . esc_url( $title_image_url ) . '" ' . $rel_target_text . ' class="yyi-rinker-tracking"  data-click-tracking="' . $click_tracking_data . '" data-vars-click-id="' . $click_tracking_data . '">';
				$html .= '<img src="' . esc_url( $image_path ) . '" ' . $size . ' class="yyi-rinker-main-img" style="border: none;"' . $lazyload . '></a>';
			} else {
				$html .= '<a href="' . esc_url( $title_image_url ) . '" ' . $rel_target_text . '><img src="' . esc_url( $image_path ) . '"' .  $size . ' class="yyi-rinker-main-img" style="border: none;"' . $lazyload .'></a>';
			}
			if ( $shop_type !== 'freelink' && $this->is_moshimo( $shop_type ) ) {
				$html .= $this->add_tracking_img( $shop_type );
			}
		} else {
			$html .= '<img src="' . esc_url( $image_path ) . '" ' . $size . ' style="border: none;" class="yyi-rinker-main-img"' . $lazyload .'>';
		}
		return $html;
	}

	public function image_size_html($image_column, $meta_datas) {
		$width = $this->getImageWidth( $image_column, $meta_datas );
		$height = $this->getImageHeight( $image_column, $meta_datas );
		$size = '';
		if ( strlen( $width ) > 0 ) {
			$size .=  ' width="' .  esc_attr( $width ) . '"';
		}
		if ( strlen( $height) > 0) {
			$size .=  ' height="' .  esc_attr( $height ) . '"';
		}
		return $size;
	}

	public function title_html( $meta_datas, $shop_type ) {
		if ( $shop_type === self::SHOP_TYPE_RAKUTEN ) {
			$title_url = $this->array_get( $meta_datas, self::RAKUTEN_TITLE_URL_COLUMN, '');
		} else {
			$title_url = $this->array_get( $meta_datas, self::AMAZON_TITLE_URL_COLUMN, '');
		}

		$html = '';
		if ( strlen( $title_url ) > 0) {
			$rel_target_text = $this->get_rel_target_text();
			if ( $this->is_tracking ) {
				$click_tracking_data = esc_attr( $shop_type ) . '_title ' . esc_attr( $meta_datas[ 'post_id' ] ). ' ' . esc_attr( $meta_datas[ 'title' ] );
				$html .= '<a href="' . esc_url( $title_url ) . '" ' . $rel_target_text . ' class="yyi-rinker-tracking" data-click-tracking="' . $click_tracking_data . '" data-vars-amp-click-id="' . $click_tracking_data . '" >' . esc_html( $meta_datas[ 'title' ] ) . '</a>';
			} else {
				$html .= '<a href="' . esc_url( $title_url ) . '" ' . $rel_target_text . '>' . esc_html( $meta_datas[ 'title' ] ) . '</a>';
			}
			if ( $this->is_moshimo( $shop_type ) ) {
				$html .= $this->add_tracking_img( $shop_type );
			}
		} else {
			$html .= esc_html( $meta_datas[ 'title' ] );
		}
		return $html;
	}

	/**
	 * フリーURLのリンクを作成します
	 * ここでエスケープをする
	 * @param $num
	 * @param $meta_datas
	 *
	 * @return mixed
	 */
	public function free_link_html( $num , $meta_datas ) {
		$key = 'free_url_' . $num;
		$label = $this->array_get( $meta_datas, 'free_url_label_' . $num . '_column', '' );
		$free_url_column = $this->array_get( $meta_datas, $key, '' );

		if ( $free_url_column  !== '' ) {
			$rel_target_text = $this->get_rel_target_text();
			if ( $this->is_tracking ) {
				$click_tracking_data = 'free_' . esc_attr( $num )  . ' ' . esc_attr( $meta_datas[ 'post_id' ] ). ' ' . esc_attr( $meta_datas[ 'title' ] );
				$html = '<a href="' . esc_attr( $free_url_column ) . '" ' . $rel_target_text . ' class="yyi-rinker-link yyi-rinker-tracking" data-click-tracking="' . $click_tracking_data . '" data-vars-amp-click-id="' . $click_tracking_data . '">' . esc_html( $label ) . '</a>';
			} else {
				$html = '<a href="' . esc_attr( $free_url_column ) . '" ' . $rel_target_text . ' class="yyi-rinker-link">' . esc_html( $label ) . '</a>';
			}
			$meta_datas[ $key ] = $html;
		}
		return $meta_datas;
	}


	/**
	 * リンク部分のHTMLを作成
	 * ここでエスケープをする
	 * @param $meta_datas
	 * @param $shop_type
	 *
	 * @return string
	 */
	public function link_html( $meta_datas, $shop_type, $values, $atts ) {
		//urlの設定がない場合は非表示
		if ( !isset($meta_datas[$shop_type . '_url'] ) ) {
			return '';
		}

		switch( $shop_type ) {
			case self::SHOP_TYPE_AMAZON:
				if ( strlen( $this->amazon_traccking_id ) === 0 && !$this->is_moshimo( $shop_type )  ) {
					return '';
				}
				$label = $this->array_get( $atts, 'alabel', '' );

				break;
			case self::SHOP_TYPE_RAKUTEN:
				if ( strlen( $this->rakuten_affiliate_id ) === 0 && !$this->is_moshimo( $shop_type ) ) {
					return '';
				}
				$label = $this->array_get( $atts, 'rlabel' );
				break;
			case self::SHOP_TYPE_YAHOO:
				if ( !( ( strlen( $this->yahoo_pid ) > 0 && strlen( $this->yahoo_pid ) > 0 ) || strlen( $this->yahoo_linkswitch ) > 0 ) && !$this->is_moshimo( $shop_type ) ) {
					return '';
				}
				$label = $this->array_get( $atts, 'ylabel', '' );
				break;
			case self::SHOP_TYPE_AMAZON_KINDLE:
				if ( strlen( $this->amazon_traccking_id ) === 0 && !$this->is_moshimo( $shop_type )  ) {
					return '';
				}
				$label = $this->array_get( $atts, 'klabel', '' );
				break;
            case self::SHOP_TYPE_MERCARI:
                if ( strlen( $this->mercari_id ) === 0 ) {
                    return '';
                }
                $label = $this->array_get( $atts, 'mlabel', '' );
                break;
			default:
				$label = '';
				break;
		}

		if ($label === '') {
			$label = $values[ 'label' ];
		}

		$rel_target_text = $this->get_rel_target_text();

		if ( $this->is_tracking ) {
			$click_tracking_data = $shop_type . ' ' . esc_attr( $meta_datas[ 'post_id' ] ). ' ' . esc_attr( $meta_datas[ 'title' ] );
			$html = '<a href="' . esc_attr( $meta_datas[$shop_type . '_url'] ) . '" ' . $rel_target_text . ' class="yyi-rinker-link yyi-rinker-tracking"  data-click-tracking="' . $click_tracking_data . '"  data-vars-amp-click-id="' . $click_tracking_data .'">';
		} else {
			$html = '<a href="' . esc_attr( $meta_datas[$shop_type . '_url'] ) . '" ' . $rel_target_text . ' class="yyi-rinker-link">';
		}

		$label = apply_filters( $this->add_prefix( 'button_label_text' ), $label, $shop_type);
		$html = $html . $this->allow_tags( $label );

		$html = $html . '</a>';

		if ( $shop_type === self::SHOP_TYPE_YAHOO && $this->is_yahoo_id() && !$this->is_moshimo( $shop_type ) ) {
			$html = $html . '<img src="https://ad.jp.ap.valuecommerce.com/servlet/gifbanner?sid=' . esc_attr( $this->yahoo_sid ) . '&pid=' . esc_attr( $this->yahoo_pid ) . '" height="1" width="1" border="0">';
		}

		if ( $this->is_moshimo( $shop_type ) ) {
			$html .= $this->add_tracking_img( $shop_type );
		}
		return $html;
	}

	/**
	 * 安全なタグだけ利用させるボタン名に使用
	 */
	public function allow_tags( $text ) {
		$allowed_html = [
			'div' => ['class' => [], 'id' => []],
			'span' => ['class' => [], 'id' => []],
			'br' => [],
			'i' => ['class' => [], 'id' => []],
			'strong' => [],
		];
		return  wp_kses( $text, $allowed_html );
	}

	public function add_tracking_img( $shop_type ) {
		$a_id	= $this->shop_types[ $shop_type ][ 'a_id' ];
		$p_id	= $this->shop_types[ $shop_type ][ 'p_id' ];
		$pc_id	= $this->shop_types[ $shop_type ][ 'pc_id' ];
		$pl_id	= $this->shop_types[ $shop_type ][ 'pl_id' ];
		$url = 'https://i.moshimo.com/af/i/impression?a_id=' . $a_id . '&p_id=' . $p_id . '&pc_id=' . $pc_id . '&pl_id=' . $pl_id;
		return '<img src="' . esc_attr( $url ) . '" width="1" height="1" style="border:none;">';
	}


	/**
	 * 商品追加ボタンを追加します
	 */
	public function media_buttons() {
		global $post_ID;
		add_thickbox();
		$src = 'media-upload.php?post_id=' . intval($post_ID) . '&amp;type=' . $this->media_type . '&amp;tab=' . self::TAB_AMAZON;
		echo '<a id="yyirinker-media-button" href="' .  esc_attr( $src . '&TB_iframe=true' ) . '" type="button" class="button thickbox add_media" title="商品リンク追加"><span class="yyirinker-buttons-icon"></span>商品リンク追加</a>';
	}

	/**
	 * 商品選択 iframe
	 */
	function media_upload_iframe() {
		wp_enqueue_style( $this->media_type . '-media-upload',  $this->admin_style_css_url, false, self::VERSION );
		wp_iframe( array($this, 'media_upload_select_goods_form') );
	}

	/**
	 * 商品選択 media page
	 */
	function media_upload_select_goods_form() {
		add_filter( 'media_upload_tabs', array($this, 'media_upload_tabs'), 1000 );
		include dirname( __FILE__ ) . '/parts/select-goods.php';
	}

	/**
	 * セレクトボックスを追加する
	 * @param $tab
	 */
	public function add_terms_select_for_search( $tab ) {
		if ( $tab === self::TAB_ITEMLIST ) {
			$terms = get_terms( self::LINK_TERM_NAME, [ 'fields' => 'id=>name' ] );
			echo '<select id="term_select" name="term_id">';
			echo '<option value="0">--カテゴリー選択--</option>';
			if ( !is_wp_error( $terms ) ) {
				foreach ( $terms AS $id => $term ) {
					echo '<option value="' . esc_attr( $id ) . '">' . esc_html( $term ) . '</option>';
				}
			}
			echo '</select>';
		}
	}

	/**
	 * sortボックスを追加する
	 * @param $tab
	 */
	public function add_sort_select_for_search( $tab ) {
		if ( $tab === self::TAB_RAKUTEN ) {
			echo '<select id="sort_select" name="sort">';
			echo '<option value="0">--並び順--</option>';
			foreach ( $this->rakuten_sorts AS $id => $values ) {
				echo '<option value="' . esc_attr( $id ) . '">' . esc_html( $values[ 'label' ] ) . '</option>';
			}
			echo '</select>';
		}
	}

	/**
	 * Rinker設定ページを更新
	 */
	function option_page() {
		$params = [];
		$this->option_params = apply_filters( $this->add_prefix( 'update_option_params' ), $this->option_params );

		if ( !current_user_can( 'manage_options' )) {
			include_once 'parts/cannot_user.php';
			exit;
		}

		if ( isset( $_POST['_wp_http_referer'] ) ) {
			check_admin_referer( $this->_admin_referer_column );
			foreach( $this->option_params AS $key => $v ) {
				if ( $v[ 'is_digit' ] ) {
					$values = $this->array_get($_POST, $key, []);
					$value = 0;
					if (is_array($values)) {
						foreach ($values AS $index => $val) {
							$value += intval($val);
						}
					}
				} elseif ( $v[ 'is_bool' ] ) {
					$value = $this->array_get( $_POST, $key, null );
					$value = !!$value ? 1 : 0;
				} elseif ( isset( $v[ 'is_check' ]) && !!$v[ 'is_check' ] ) {
                    $value = $this->array_get($_POST, $key, null );
                    $value = intval($value);
				} else {
					$value = $this->array_get( $_POST, $key, null);
				}
                $value = trim($value);
				$params[ $key ] = $value;
				$this->option_params[ $key ][ 'value' ] = $value;
			}

			foreach( $params AS $key => $value ) {
				update_option( $this->option_column_name( $key ), $value);
			}
			add_action( $this->add_prefix( 'admin_notices' ), array( $this, 'updated_message' ) );

		} else {
			foreach($this->option_params AS $key => $v) {
				$value = get_option( $this->option_column_name( $key ) );
				if ( $value !== false ) {
					$params[$key] = $value;
					$this->option_params[$key]['value'] = $value;
				}
			}
		}
		do_action( $this->add_prefix( 'admin_notices' ) );
		$is_page_high = false;
		if (isset($_POST['submit']) && $_POST['submit'] === '高度な設定の変更を保存') {
			$is_page_high = true;
		}

		include_once 'parts/setting-form.php';
	}


	public static function get_object() {
		static $instance;

		if ( NULL === $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * LinkSwitchタグ設置
	 */
	public function add_linkswitch_tag() {
		$tag = $this->yahoo_linkswitch;
		if ( strlen( $tag ) > 0 ) {
			echo stripslashes($tag);
		}
	}

	/*
	 * Rinker [商品リンク]のカスタムフィールドに接頭語をつける
	 */
	public function custom_field_column_name( $key_name ) {
		return $this->add_prefix( $key_name );
	}

	/*
	 * Rinker固有の設定項目に接頭語をつける
	 */
	public function option_column_name( $key_name ) {
		return $this->add_prefix( $key_name );
	}

	//add prefix text
	public function add_prefix($text) {
		return self::APP_PREFIX . '_' . $text;
	}

	/**
	 * image info from amazon api
	 * @param object $image
	 *
	 * @return array
	 */
	static public function set_image_info($image) {
		return [
			'url'		=>  $image->URL,
			'width'		=>  $image->WIDTH,
			'height'	=>  $image->HEIGHT,
		];
	}

	public function init() {

	}
}

/**
 * for Gutenberg
 */

class Yyi_Rinker_Plugin_Gutenberg extends Yyi_Rinker_Abstract_Base
{
	function __construct()
	{
		//Gutenbergが非アクティブのときは何もしない
		if (!function_exists('register_block_type')) {
			return;
		}
		add_action('init', array($this, 'add_gutenberg_rinker_register_block'), 9);
		add_action('enqueue_block_editor_assets', array($this, 'gutenberg_rinker_register_block'), 9);
		add_action('rest_api_init', array($this, 'rest_api_template_create_init'));
		add_action('rest_api_init', array($this, 'rest_api_template_delete_init'));
		add_action('rest_api_init', array($this, 'rest_api_template_all_init'));
        add_action('rest_api_init', array($this, 'rest_api_load_template_create_init'));
        add_action('rest_api_init', array($this, 'rest_api_load_template_get_init'));
	}

	/**
	 * テンプレートのオプションを取得する
	 * @param $id
	 * @param $key
	 * @param $default
	 * @return array|mixed|object|string
	 */
	public function get_templates( $id = '' ) {

		$templates = get_option( 'yyi_rinker_template' );
		if (!isset($templates) ||  !is_array($templates) ) {
			return [];
		}

		if ( strval( $id ) > 0 ) {
			if ( isset ($templates[ $id ] ) ) {
				$template = $templates[ $id ];
				$template = $this->get_require_template_params( $template );
				ksort($template);
				return $template;
			} else {
				return [];
			}
		} else {
			$format_template = [];
			foreach($templates AS $i => $valuses) {
				$format_template[ $i ] = $this->get_require_template_params( $valuses );
			}
			ksort($format_template);
			return $format_template;
		}
	}

    public function get_load_template_id() {
        $load_template_id = get_option( 'yyi_rinker_load_template_id' );
        if (!isset($load_template_id) && intval($load_template_id) === 0 ) {
            return '';
        }
        return $load_template_id;
    }

	/**
	 * テンプレート機能で指定されたパラメータだけ保存する
	 * @param $templates
	 * @return array
	 */
	public function get_require_template_params( $templates ) {
		$new_templates = [];
		$templates = wp_parse_args( $templates, $this->template_atts );
		foreach($this->template_atts AS $key => $value) {
			$new_templates[$key] = isset($templates[ $key ]) ? $templates[ $key ] : '';
		}
		return $new_templates;
	}

	/**
	 * テンプレートを作成
	 * @return void
	 */
	function rest_api_template_create_init()
	{
		foreach ($this->template_atts AS $key => $default ) {
			$args[ $key ] = ['required' => true ];
		}
		$max_count = self::TEMPLATE_MAX_COUNT;
		$max_count = apply_filters( $this->add_prefix( 'template_max_count' ), $max_count );
		register_rest_route('yyirest/v1', '/template/create', [
			[
				'methods' => WP_REST_Server::CREATABLE,
				'callback' => function (WP_REST_Request $request) use( $max_count ){
					$templates = $this->get_templates();
					if ($max_count !== 'unlimited' && count( $templates ) >= $max_count) {
						return new WP_REST_Response( $templates );
					}
					do {
						$new_id = strval( time() );
					} while( isset( $templates[ $new_id ] ) );
					$templates[ $new_id ] = $this->get_require_template_params( $request->get_params() );
					update_option( 'yyi_rinker_template', $templates );
					$templates = $this->get_templates();
					$response = new WP_REST_Response( $templates );
					return $response;

				},
				'permission_callback' => function () {
					return current_user_can('edit_posts') ;
				},
				'args' =>  $args,
			],
		]);
	}

	/**
	 * テンプレートを削除
	 * @return void
	 */
	function rest_api_template_delete_init()
	{
		$args = [];
		$args[ 'id' ] = ['required' => true ];

		register_rest_route('yyirest/v1', '/template/delete', [
			[
				'methods' => WP_REST_Server::CREATABLE,
				'callback' => function (WP_REST_Request $request) {
					$templates = $this->get_templates();
					if ( isset( $templates[$request[ 'id' ] ] ) ) {
						unset( $templates[ $request[ 'id' ] ] );
						update_option( 'yyi_rinker_template', $templates );
					}
					$response = new WP_REST_Response( $templates );
					return $response;

				},
				'permission_callback' => function () {
					return current_user_can('edit_posts') ;
				},
				'args' =>  $args,
			],
		]);
	}

	/**
	 * 全テンプレートを取得
	 * @return void
	 */
	function rest_api_template_all_init() {
		register_rest_route('yyirest/v1', '/template/all', [
			[
				'methods' => WP_REST_Server::CREATABLE,
				'callback' => function (WP_REST_Request $request) {
					$templates = $this->get_templates();
					$response = new WP_REST_Response( $templates );
					return $response;
				},
				'permission_callback' => function () {
					return current_user_can('edit_posts') ;
				}
			],
		]);
	}

    /**
     * ロード時のテンプレートIDを登録
     * @return void
     */
    function rest_api_load_template_create_init() {
        register_rest_route('yyirest/v1', '/template/load/create', [
            [
                'methods' => WP_REST_Server::CREATABLE,
                'callback' => function (WP_REST_Request $request) {
                    $templates = $this->get_templates();
                    if ( isset( $templates[$request[ 'id' ] ] ) ) {
                        update_option( 'yyi_rinker_load_template_id', intval($request[ 'id' ]) );
                        $response = new WP_REST_Response( true );
                    } else {
                        $response = new WP_REST_Response( false );
                    }
                    return $response;
                },
                'permission_callback' => function () {
                    return current_user_can('edit_posts') ;
                }
            ],
        ]);
    }

    function rest_api_load_template_get_init() {
        register_rest_route('yyirest/v1', '/template/load/get', [
            [
                'methods' => WP_REST_Server::READABLE,
                'callback' => function (WP_REST_Request $request) {
                    $load_template_id = $this->get_load_template_id();
                    $response = new WP_REST_Response( $load_template_id );;
                    return $response;
                },
                'permission_callback' => function () {
                    return current_user_can('edit_posts') ;
                }
            ],
        ]);
    }

	function add_gutenberg_rinker_register_block() {
		register_block_type(
			__DIR__ . '/block/build',
			[
				'render_callback' => array($this, 'gutenberg_rinker_render'),
				'script' => 'gutenberg-rinker'
			] );
	}

	function gutenberg_rinker_register_block()
	{
		$max_count = self::TEMPLATE_MAX_COUNT;
		$max_count = apply_filters( $this->add_prefix( 'template_max_count' ), $max_count );

		wp_add_inline_script(
			'wp-blocks',
			sprintf(
				'var gutenberg_rinker = { localeData: %s, admin_url: %s , designs: %s, template_attrs: %s,templates: %s, template_max_count: %s, load_template_id: %s };',
				json_encode('rinker-gutenberg-1.0.0'),
				json_encode(admin_url('post.php')),
				json_encode($this->each_designs_for_gutenberg()),
				json_encode($this->template_atts),
				json_encode($this->get_templates()),
				json_encode($max_count),
                json_encode($this->get_load_template_id())
			),
			'before'
		);
	}

	function gutenberg_rinker_render( $attributes, $value )
	{
		$disp = '';
		//エディタで編集した時
		if ( isset( $attributes['content_text'] ) ) {
			$shortcode = $attributes['content_text'];
			$new_shortcode = $this->shortcode_attribute_relpace( $shortcode, $attributes );

			$html = do_shortcode( $new_shortcode );
			if ($html !== '') {
				$disp =  $html;
			}
		} elseif( strlen( $value ) > 0 ) {
			$html = $this->shortcode_attribute_relpace( $value, $attributes );
			$disp =  $html;
		}
		return $disp;
	}

	public function shortcode_attribute_relpace( $shortcode, $attributes ) {
		$new_shortcode = $shortcode;
		foreach ( $this->shortcode_params as $i => $key ) {
			if ($key === 'classname') {
				$key = 'className';
			}
			if ( isset( $attributes[ $key ] ) && strlen( trim( $attributes[ $key ] ) ) > 0 ) {
				$skey = mb_strtolower($key);
				$result = preg_match("/{$skey}=\"\S+\"/", $new_shortcode, $m);
				$new_attr = $skey . '="' . esc_html( trim( $attributes[ $key ] ) ) . '"';
				if ( $result === 1 ){
					$new_shortcode = str_replace( $m[0], $new_attr, $new_shortcode );
				} elseif ( $result === 0 ) {
					$new_shortcode = preg_replace("/\](<\/p>)?$/", ' ' . $new_attr . ']', $new_shortcode, 1);
				}
			}
		}
		return $new_shortcode;
	}

	public static function init() {
		$instance = new self;
		return $instance;
	}

	//add prefix text
	public function add_prefix($text) {
		return self::APP_PREFIX . '_' . $text;
	}
}

Yyi_Rinker_Plugin_Gutenberg::init();

/**
 * Rinker用CSSを記述
 * @return string
 */
function yyi_rinker_style_up_design() {
	return '
.yyi-rinker-img-s .yyi-rinker-image {
	width: 56px;
	min-width: 56px;
	margin:auto;
}
.yyi-rinker-img-m .yyi-rinker-image {
	width: 175px;
	min-width: 175px;
	margin:auto;
}
.yyi-rinker-img-l .yyi-rinker-image {
	width: 200px;
	min-width: 200px;
	margin:auto;
}
.yyi-rinker-img-s .yyi-rinker-image img.yyi-rinker-main-img {
	width: auto;
	max-height: 56px;
}
.yyi-rinker-img-m .yyi-rinker-image img.yyi-rinker-main-img {
	width: auto;
	max-height: 170px;
}
.yyi-rinker-img-l .yyi-rinker-image img.yyi-rinker-main-img {
	width: auto;
	max-height: 200px;
}

div.yyi-rinker-contents div.yyi-rinker-box ul.yyi-rinker-links li {
    list-style: none;
}
div.yyi-rinker-contents ul.yyi-rinker-links {
	border: none;
}
div.yyi-rinker-contents ul.yyi-rinker-links li a {
	text-decoration: none;
}
div.yyi-rinker-contents {
    margin: 2em 0;
}
div.yyi-rinker-contents div.yyi-rinker-box {
    display: flex;
    padding: 26px 26px 0;
    border: 3px solid #f5f5f5;
    box-sizing: border-box;
}
@media (min-width: 768px) {
    div.yyi-rinker-contents div.yyi-rinker-box {
        padding: 26px 26px 0;
    }
}
@media (max-width: 767px) {
    div.yyi-rinker-contents div.yyi-rinker-box {
        flex-direction: column;
        padding: 26px 14px 0;
    }
}
div.yyi-rinker-box div.yyi-rinker-image {
    display: flex;
    flex: none;
}
div.yyi-rinker-box div.yyi-rinker-image a {
    display: inline-block;
    height: fit-content;
    margin-bottom: 26px;
}
div.yyi-rinker-image img.yyi-rinker-main-img {
    display: block;
    max-width: 100%;
    height: auto;
}
div.yyi-rinker-img-s img.yyi-rinker-main-img {
    width: 56px;
}
div.yyi-rinker-img-m img.yyi-rinker-main-img {
    width: 120px;
}
div.yyi-rinker-img-l img.yyi-rinker-main-img {
    width: 200px;
}
div.yyi-rinker-box div.yyi-rinker-info {
    display: flex;
    width: 100%;
    flex-direction: column;
}
@media (min-width: 768px) {
    div.yyi-rinker-box div.yyi-rinker-info {
        padding-left: 26px;
    }
}
@media (max-width: 767px) {
    div.yyi-rinker-box div.yyi-rinker-info {
        text-align: center;
    }
}
div.yyi-rinker-info div.yyi-rinker-title a {
    color: #333;
    font-weight: 600;
    font-size: 18px;
    text-decoration: none;
}
div.yyi-rinker-info div.yyi-rinker-detail {
    display: flex;
    flex-direction: column;
    padding: 8px 0 12px;
}
div.yyi-rinker-detail div:not(:last-child) {
    padding-bottom: 8px;
}
div.yyi-rinker-detail div.credit-box {
    font-size: 12px;
}
div.yyi-rinker-detail div.credit-box a {
    text-decoration: underline;
}
div.yyi-rinker-detail div.brand,
div.yyi-rinker-detail div.price-box {
    font-size: 14px;
}
@media (max-width: 767px) {
    div.price-box span.price {
        display: block;
    }
}
div.yyi-rinker-info div.free-text {
    order: 2;
    padding-top: 8px;
    font-size: 16px;
}
div.yyi-rinker-info ul.yyi-rinker-links {
    display: flex;
    flex-wrap: wrap;
    margin: 0 0 14px;
    padding: 0;
    list-style-type: none;
}
div.yyi-rinker-info ul.yyi-rinker-links li {
    display: inherit;
    flex-direction: column;
    align-self: flex-end;
    text-align: center;
}
@media (min-width: 768px) {
    div.yyi-rinker-info ul.yyi-rinker-links li:not(:last-child){
        margin-right: 8px;
    }
    div.yyi-rinker-info ul.yyi-rinker-links li {
        margin-bottom: 12px;
    }
}
@media (max-width: 767px) {
    div.yyi-rinker-info ul.yyi-rinker-links li {
        width: 100%;
        margin-bottom: 10px;
    }
}
ul.yyi-rinker-links li.amazonkindlelink a {
    background-color: #37475a;
}
ul.yyi-rinker-links li.amazonlink a {
    background-color: #f9bf51;
}
ul.yyi-rinker-links li.rakutenlink a {
    background-color: #d53a3a;
}
ul.yyi-rinker-links li.yahoolink a {
    background-color: #76c2f3;
}
ul.yyi-rinker-links li.mercarilink a {
    background-color: #ff0211;
}
ul.yyi-rinker-links li.freelink1 a {
    background-color: #5db49f;
}
ul.yyi-rinker-links li.freelink2 a {
    background-color: #7e77c1;
}
ul.yyi-rinker-links li.freelink3 a {
    background-color: #3974be;
}
ul.yyi-rinker-links li.freelink4 a {
    background-color: #333;
}
ul.yyi-rinker-links a.yyi-rinker-link {
    display: flex;
    position: relative;
    width: 100%;
    min-height: 38px;
    overflow-x: hidden;
    flex-wrap: wrap-reverse;
    justify-content: center;
    align-items: center;
    border-radius: 2px;
    box-shadow: 0 1px 6px 0 rgba(0,0,0,0.12);
    color: #fff;
    font-weight: 600;
    font-size: 14px;
    white-space: nowrap;
    transition: 0.3s ease-out;
    box-sizing: border-box;
}
ul.yyi-rinker-links a.yyi-rinker-link:after {
    position: absolute;
    right: 12px;
    width: 6px;
    height: 6px;
    border-top: 2px solid;
    border-right: 2px solid;
    content: "";
    transform: rotate(45deg);
    box-sizing: border-box;
}
ul.yyi-rinker-links a.yyi-rinker-link:hover {
    box-shadow: 0 4px 6px 2px rgba(0,0,0,0.12);
    transform: translateY(-2px);
}
@media (min-width: 768px) {
    ul.yyi-rinker-links a.yyi-rinker-link {
        padding: 6px 24px;
    }
}
@media (max-width: 767px) {
    ul.yyi-rinker-links a.yyi-rinker-link {
        padding: 10px 24px;
    }
}';
}

