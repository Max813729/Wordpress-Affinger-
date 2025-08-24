<?php
/**
 * User: yayoi
 * Date: 2018/04/30
 * Time: 22:22
 */

class Yyi_Rinker_Abstract_Base {
	const APP_PREFIX		= 'yyi_rinker';
	const VERSION 			= '1.11.2';
	// jsとcssのファイルバージョン　本体と別のVERSIONにした
	const FILE_VERSION 		= '1.11.1';
	const LINK_POST_TYPE	= 'yyi_rinker';
	const LINK_TERM_NAME	= 'yyi_rinker_cat';

	//タブ
	const TAB_AMAZON 		= 'yyi_rinker_search_amazon';
	const TAB_RAKUTEN		= 'yyi_rinker_search_rakuten';
	const TAB_ITEMLIST		= 'yyi_rinker_search_itemlist';

	//画像と価格の保存期間
	const EXPIRED_TIME		= 24 * 60 * 60;

	//Rinker開発者が保持する
	const RAKUTEN_DEV_APPLICATION_ID = '1022852054992484221';

	const AMAZON_ID_INSERT_TAG		= '{{@amazon_id}}';
	const ASIN_INSERT_TAG 			= '{{@asin}}';
	const RAKUTEN_ID_INSERT_TAG		= '{{@rakuten_id}}';
	const RAKUTEN_CODE_INSERT_TAG	= '{{@rakuten_code}}';

	const REL_TEXT = "nofollow";

	const TEMPLATE_MAX_COUNT = 5;

	public $prefix					= self::APP_PREFIX;
	public $media_type				= self::APP_PREFIX;
	public $_admin_referer_column	= self::APP_PREFIX;

	//const化しているものはDBに格納しているもの
	public $shortcode_params = [
		1	=> self::ASIN_COLUMN,
		2	=> self::RAKUTEN_ITEMCODE_COLUMN,
		5	=> self::SEARCH_SHOP_VALUE,
		8	=> self::FREE_TITLE_URL_COLUMN,
		10	=> self::TITLE_COLUMN,
		20	=> 'post_id',
		22	=> self::RAKUTEN_TITLE_URL_COLUMN,
		23	=> self::FREE_URL_LABEL_1_COLUMN,
		24	=> self::FREE_URL_1_COLUMN,
		25	=> self::FREE_URL_LABEL_2_COLUMN,
		26	=> self::FREE_URL_2_COLUMN,
		27	=> self::AMAZON_TITLE_URL_COLUMN,
		28	=> self::AMAZON_KINDLE_URL_COLUMN,
		30	=> self::AMAZON_URL_COLUMN,
		40	=> self::RAKUTEN_URL_COLUMN,
		42	=> self::YAHOO_URL_COLUMN,
        44	=> self::MERCARI_URL_COLUMN,
		46	=> self::FREE_URL_LABEL_3_COLUMN,
		47	=> self::FREE_URL_3_COLUMN,
		48	=> self::FREE_URL_LABEL_4_COLUMN,
		49	=> self::FREE_URL_4_COLUMN,
		50	=> 'size',
		51	=> 'sizesw',
		52	=> 'sizesh',
		61	=> 'sizemw',
		62	=> 'sizemh',
		71	=> 'sizelw',
		72	=> 'sizelh',
		60	=> self::BRAND_COLUMN,
		70	=> self::PRICE_COLUMN,
		80	=> self::PRICE_AT_COLUMN,
		90	=> 'alabel',
		91	=> 'klabel',
		92	=> 'rlabel',
		94	=> 'ylabel',
        100	=> 'mlabel',
		210 => 'aomt',
		211 => 'aimt',
		212 => 'romt',
		213 => 'rimt',
		214 => 'yomt',
		215 => 'yimt',
		216 => 'komt',
		217 => 'kimt',
		250 => 'classname',
		300 => 'design',
		400 => 'tag',
		500 => 'attention_text',
		510 => 'attention_design',
		520 => 'attention_color',
	];

	public $tabs = [
		self::TAB_AMAZON		=> 'Amazonから商品検索',
		self::TAB_RAKUTEN		=> '楽天市場から商品検索',
		self::TAB_ITEMLIST		=> '登録済み商品リンクから検索',
	];

	/**
	 * モバイルの時のタブ名
	 * @var string[]
	 */
	public $tabs_mobile = [
		self::TAB_AMAZON		=> 'Amazon',
		self::TAB_RAKUTEN		=> '楽天市場',
		self::TAB_ITEMLIST		=> '登録済み',
	];

	//商品リンクフォーム
	const SEARCH_SHOP_VALUE						= 'search_shop_value';
	const FREE_TITLE_URL_COLUMN					= 'free_title_url';
	const TITLE_COLUMN							= 'title';
	const ASIN_COLUMN							= 'asin';
	const KEYWORD_COLUMN						= 'keyword';
	const AMAZON_URL_COLUMN						= 'amazon_url';
	const AMAZON_TITLE_URL_COLUMN				= 'amazon_title_url';
	const AMAZON_KINDLE_URL_COLUMN				= 'amazon_kindle_url';
	const RAKUTEN_ITEMCODE_COLUMN				= 'rakuten_itemcode';
	const RAKUTEN_TITLE_URL_COLUMN				= 'rakuten_title_url';
	const RAKUTEN_URL_COLUMN					= 'rakuten_url';
	const YAHOO_URL_COLUMN						= 'yahoo_url';
    const MERCARI_URL_COLUMN                    = 'mercari_url';
	const FREE_URL_LABEL_1_COLUMN				= 'free_url_label_1_column';
	const FREE_URL_LABEL_2_COLUMN				= 'free_url_label_2_column';
	const FREE_URL_LABEL_3_COLUMN				= 'free_url_label_3_column';
	const FREE_URL_LABEL_4_COLUMN				= 'free_url_label_4_column';
	const FREE_URL_1_COLUMN						= 'free_url_1';
	const FREE_URL_2_COLUMN						= 'free_url_2';
	const FREE_URL_3_COLUMN						= 'free_url_3';
	const FREE_URL_4_COLUMN						= 'free_url_4';
	const IMAGE_S_COLUMN						= 's_image_url';
	const IMAGE_M_COLUMN						= 'm_image_url';
	const IMAGE_L_COLUMN						= 'l_image_url';
	const BRAND_COLUMN							= 'brand';
	const PRICE_COLUMN							= 'price';
	const PRICE_AT_COLUMN						= 'price_at';
	const NO_RENEW								= 'no_renew';
	const IS_AMAZON_NO_EXIST					= 'is_amazon_no_exist';
	const IS_RAKUTEN_NO_EXIST					= 'is_rakuten_no_exist';
	const FREE_COMMENT_COLUMN					= 'free_comment';
	const IMAGE_S_SIZE_W_COLUMN					= 'image_s_size_w_column';
	const IMAGE_S_SIZE_H_COLUMN					= 'image_s_size_h_column';
	const IMAGE_M_SIZE_W_COLUMN					= 'image_m_size_w_column';
	const IMAGE_M_SIZE_H_COLUMN					= 'image_m_size_h_column';
	const IMAGE_L_SIZE_W_COLUMN					= 'image_l_size_w_column';
	const IMAGE_L_SIZE_H_COLUMN					= 'image_l_size_h_column';

	public $main_images = [
		's' => ['url' => self::IMAGE_S_COLUMN, 'width' => self::IMAGE_S_SIZE_W_COLUMN, 'height' => self::IMAGE_S_SIZE_H_COLUMN],
		'm' => ['url' => self::IMAGE_M_COLUMN, 'width' => self::IMAGE_M_SIZE_W_COLUMN, 'height' => self::IMAGE_M_SIZE_H_COLUMN],
		'l' => ['url' => self::IMAGE_L_COLUMN, 'width' => self::IMAGE_L_SIZE_W_COLUMN, 'height' => self::IMAGE_L_SIZE_H_COLUMN],
	];

	/** 画像複数データ **/
	const S_VARIANT_IMAGES_COLUMN						= 's_variant_images';
	const M_VARIANT_IMAGES_COLUMN						= 'm_variant_images';
	const L_VARIANT_IMAGES_COLUMN						= 'l_variant_images';
	public $variant_images = [
		self::S_VARIANT_IMAGES_COLUMN => ['type' => 's', 'amazon' => 'Small', 'rakuten' => 'smallImageUrls'],
		self::M_VARIANT_IMAGES_COLUMN => ['type' => 'm','amazon' => 'Medium', 'rakuten' => 'mediumImageUrls'],
		self::L_VARIANT_IMAGES_COLUMN => ['type' => 'l', 'amazon' => 'Large']
	];

	//設定フォーム
	const IS_NO_REAPI_COLUMN					= 'is_no_reapi';
	const IS_SOME_IMAGES						= 'is_some_images';
	const AMAZON_TRACCKING_ID_COLUMN			= 'amazon_traccking_id';
	const RAKUTEN_AFFILIATE_ID					= 'rakuten_affiliate_id';
	const RAKUTEN_APPLICATION_ID				= 'rakuten_application_id';
	const LINKSWITCH_TAG_OPTION_COLUMN			= 'valuecommerce_linkswitch_tag';
	const YAHOO_SID_OPTION_COLUMN				= 'yahoo_sid';
	const YAHOO_PID_OPTION_COLUMN				= 'yahoo_pid';
    const MERCARI_ID_OPTION_COLUMN				= 'mercari_id';
	const MOSHIMO_AMAZON_ID_COLUMN				= 'moshimo_amazon_id';
	const MOSHIMO_RAKUTEN_ID_COLUMN				= 'moshimo_rakuten_id';
	const MOSHIMO_YAHOO_ID_COLUMN				= 'moshimo_yahoo_id';
	const MOSHIMO_SHOPS_CHECK_COLUMN			= 'moshimo_shops_check';
	const IS_TRACKING_OPTION_COLUMN				= 'is_tracking';
	const DESIGN_TYPE							= 'design_type';
	const IS_DETAIL_AMAZON_URL_OPTION_COLUMN	= 'is_detail_amazon_url';
	const IS_DETAIL_RAKUTEN_URL_OPTION_COLUMN	= 'is_detail_rakuten_url';
	const IS_NO_PRICE_DISP_COLUMN				= 'is_no_price_disp_column';
	const AMAZON_FREE_COMMENT_COLUMN			= 'amazon_free_comment';
	const RAKUTEN_FREE_COMMENT_COLUMN			= 'rakuten_free_comment';
	const REL_TEXT_COLUMN						= 'rel_text_column';

	//Rinker設定のパラメーター
	public $option_params = [
		self::IS_NO_REAPI_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> true,
			'is_digit'	=> false,
		],
		self::IS_SOME_IMAGES => [
			'value'		=> NULL,
			'is_bool'	=> true,
			'is_digit'	=> false,
		],
		self::IS_NO_PRICE_DISP_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> true,
			'is_digit'	=> false,
		],
		'amazon_access_key' => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		'amazon_secret_key' => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::AMAZON_TRACCKING_ID_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::RAKUTEN_AFFILIATE_ID => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::RAKUTEN_APPLICATION_ID => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::IS_DETAIL_RAKUTEN_URL_OPTION_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> true,
			'is_digit'	=> false,
		],
		self::IS_DETAIL_AMAZON_URL_OPTION_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::LINKSWITCH_TAG_OPTION_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::YAHOO_PID_OPTION_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::YAHOO_SID_OPTION_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
        self::MERCARI_ID_OPTION_COLUMN => [
            'value'		=> NULL,
            'is_bool'	=> false,
            'is_digit'	=> false,
        ],
		self::MOSHIMO_AMAZON_ID_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::MOSHIMO_RAKUTEN_ID_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::MOSHIMO_YAHOO_ID_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::MOSHIMO_SHOPS_CHECK_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> true,
		],
		self::IS_TRACKING_OPTION_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> true,
			'is_digit'	=> false,
		],
		self::DESIGN_TYPE => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
			'is_check'	=> true,
		],
		self::AMAZON_FREE_COMMENT_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::RAKUTEN_FREE_COMMENT_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
		self::REL_TEXT_COLUMN => [
			'value'		=> NULL,
			'is_bool'	=> false,
			'is_digit'	=> false,
		],
	];

	const SEARCH_SHOP_FREE      = 6;
	const SEARCH_SHOP_AMAZON	= 10;
	const SEARCH_SHOP_RAKUTEN	= 21;

	public $amazon_resources_param = [
		'Images.Primary.Small',
		'Images.Primary.Medium',
		'Images.Primary.Large',
		'Images.Variants.Small',
		'Images.Variants.Medium',
		'Images.Variants.Large',
		'ItemInfo.ByLineInfo',
		'ItemInfo.Title',
		'ItemInfo.ByLineInfo',
		'ItemInfo.Classifications',
		'ItemInfo.ProductInfo',
		'Offers.Listings.Price',
		'ParentASIN',
	];


	//商品リンクカスタムフィールドの値
	public $custom_field_params = [
		5 => [
			'key'		=>  self::SEARCH_SHOP_VALUE,
			'label'		=> 'リンクの種類',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		8 => [
			'key'		=>  self::FREE_TITLE_URL_COLUMN,
			'label'		=> 'タイトルリンクURL',
			'is_link'	=> true,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		self::SEARCH_SHOP_AMAZON => [
			'key'		=>  self::ASIN_COLUMN,
			'label'		=> 'ASIN',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		11 => [
			'key'		=> self::AMAZON_TITLE_URL_COLUMN,
			'label'		=> 'Amazon商品詳細URL',
			'is_link'	=> true,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		19 => [
			'key'		=> self::AMAZON_KINDLE_URL_COLUMN,
			'label'		=> 'AmazonKindle用URL',
			'is_link'	=> true,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		self::SEARCH_SHOP_RAKUTEN => [
			'key'		=> self::RAKUTEN_ITEMCODE_COLUMN,
			'label'		=> '楽天市場商品コード',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		22 => [
			'key'		=> self::RAKUTEN_TITLE_URL_COLUMN,
			'label'		=> '楽天市場商品詳細URL',
			'is_link'	=> true,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		23	=> [
			'key'		=> self::FREE_URL_LABEL_1_COLUMN,
			'label'		=> '自由URLボタン名1',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		24	=> [
			'key'		=> self::FREE_URL_1_COLUMN,
			'label'		=> '自由URL1',
			'is_link'	=> true,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		25	=> [
			'key'		=> self::FREE_URL_LABEL_3_COLUMN,
			'label'		=> '自由URL3ボタン名',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		26	=> [
			'key'		=> self::FREE_URL_3_COLUMN,
			'label'		=> '自由URL3',
			'is_link'	=> true,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		29 => [
			'key'		=> self::KEYWORD_COLUMN,
			'label'		=> '検索キーワード',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		30 => [
			'key'		=> self::AMAZON_URL_COLUMN,
			'label'		=> 'Amazonボタン用URL',
			'is_link'	=> true,
			'is_relink'	=> true,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		40 => [
			'key'		=> self::RAKUTEN_URL_COLUMN,
			'label'		=> '楽天ボタン用URL',
			'is_link'	=> true,
			'is_relink'	=> true,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		42	=> [
			'key'		=> self::YAHOO_URL_COLUMN,
			'label'		=> 'Yahooボタン用商品URL',
			'is_link'	=> true,
			'is_relink'	=> true,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
        44	=> [
            'key'		=> self::MERCARI_URL_COLUMN,
            'label'		=> 'メルカリボタン用URL',
            'is_link'	=> true,
            'is_relink'	=> true,
            'is_ajax'	=> true,
            'is_text'	=> false,
            'is_free'	=> false,
            'is_size'	=> false,
            'is_img'	=> false,
            'is_v_img'	=> false,
        ],
		46	=> [
			'key'		=> self::FREE_URL_LABEL_2_COLUMN,
			'label'		=> '自由URL2ボタン名',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		47	=> [
			'key'		=> self::FREE_URL_2_COLUMN,
			'label'		=> '自由URL2',
			'is_link'	=> true,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		48	=> [
			'key'		=> self::FREE_URL_LABEL_4_COLUMN,
			'label'		=> '自由URL4ボタン名',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		49	=> [
			'key'		=> self::FREE_URL_4_COLUMN,
			'label'		=> '自由URL4',
			'is_link'	=> true,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		50 => [
			'key'		=> self::IMAGE_S_COLUMN,
			'label'		=> '画像（小）',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> true,
			'is_v_img'	=> false,
		],
		51 => [
			'key'		=> self::IMAGE_S_SIZE_W_COLUMN,
			'label'		=> '画像（小）の幅',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> true,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		52 => [
			'key'		=> self::IMAGE_S_SIZE_H_COLUMN,
			'label'		=> '画像（小）の高さ',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> true,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		53 => [
			'key'		=> self::S_VARIANT_IMAGES_COLUMN,
			'label'		=> '画像（小）の他データ',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> true,
		],
		60 => [
			'key'		=> self::IMAGE_M_COLUMN,
			'label'		=> '画像（中）',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> true,
			'is_v_img'	=> false,
		],
		61 => [
			'key'		=> self::IMAGE_M_SIZE_W_COLUMN,
			'label'		=> '画像（中）の幅',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> true,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		62 => [
			'key'		=> self::IMAGE_M_SIZE_H_COLUMN,
			'label'		=> '画像（中）の高さ',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> true,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		63 => [
			'key'		=> self::M_VARIANT_IMAGES_COLUMN,
			'label'		=> '画像（中）の他データ',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> true,
		],
		70 => [
			'key'		=> self::IMAGE_L_COLUMN,
			'label'		=> '画像（大）',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> true,
			'is_v_img'	=> false,
		],
		71 => [
			'key'		=> self::IMAGE_L_SIZE_W_COLUMN,
			'label'		=> '画像（大）の幅',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> true,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		72 => [
			'key'		=> self::IMAGE_L_SIZE_H_COLUMN,
			'label'		=> '画像（大）の高さ',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> true,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		73 => [
			'key'		=> self::L_VARIANT_IMAGES_COLUMN,
			'label'		=> '画像（大）の他データ',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> true,
		],
		80 => [
			'key'		=> self::BRAND_COLUMN,
			'label'		=> 'ブランド名',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		85 => [
			'key'		=> self::FREE_COMMENT_COLUMN,
			'label'		=> 'フリーHTML',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> true,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		90 => [
			'key'		=> self::PRICE_COLUMN,
			'label'		=> '値段',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		100 => [
			'key'		=> self::PRICE_AT_COLUMN,
			'label'		=> '値段取得日時',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> true,
			'is_text'	=> false,
			'is_free'	=> true,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		150 => [
			'key'		=> self::NO_RENEW,
			'label'		=> 'データを再取得しない',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		200 => [
			'key'		=> self::IS_AMAZON_NO_EXIST,
			'label'		=> 'Amazon取り扱い無し',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
		201 => [
			'key'		=> self::IS_RAKUTEN_NO_EXIST,
			'label'		=> '楽天取り扱い無し',
			'is_link'	=> false,
			'is_relink'	=> false,
			'is_ajax'	=> false,
			'is_text'	=> false,
			'is_free'	=> false,
			'is_size'	=> false,
			'is_img'	=> false,
			'is_v_img'	=> false,
		],
	];

	//キーはASINと楽天商品コードのcustom_field_paramsのキーと同じにする
	public $search_shops = [
		self::SEARCH_SHOP_AMAZON	=> 'Amazon',
		self::SEARCH_SHOP_RAKUTEN	=> '楽天市場',
		self::SEARCH_SHOP_FREE		=> 'フリーリンク',
	];

	//itemlinks用パラメータ
	//const化しているものはDBに格納しているもの
	public $links_shortcode_params = [
		1	=> 'tag_id',
	];

	const SHOP_TYPE_AMAZON_KINDLE = 'amazon_kindle';
	const SHOP_TYPE_AMAZON	= 'amazon';
	const SHOP_TYPE_RAKUTEN	= 'rakuten';
	const SHOP_TYPE_YAHOO	= 'yahoo';
    const SHOP_TYPE_MERCARI = 'mercari';

	const MOSHIMO_SHOP_AMAZON_VAL			= 1;
	const MOSHIMO_SHOP_RAKUTEN_VAL			= 2;
	const MOSHIMO_SHOP_YAHOO_VAL			= 4;
	const MOSHIMO_SHOP_AMAZON_KINDLE_VAL	= 8;

	public $shop_types = [
		self::SHOP_TYPE_AMAZON_KINDLE => [
			'column'	=> 'amazon_kindl_url',
			'label'		=> 'Kindle',
			'column'	=> self::MOSHIMO_AMAZON_ID_COLUMN,
			'val'		=> self::MOSHIMO_SHOP_AMAZON_KINDLE_VAL,
			'a_id'		=> '',
			'p_id'		=> 170,
			'pc_id'		=> 185,
			'pl_id'		=> 4062,
		],
		self::SHOP_TYPE_AMAZON => [
			'column'	=> 'amazon_url',
			'label'		=> 'Amazon',
			'column'	=> self::MOSHIMO_AMAZON_ID_COLUMN,
			'val'		=> self::MOSHIMO_SHOP_AMAZON_VAL,
			'a_id'		=> '',
			'p_id'		=> 170,
			'pc_id'		=> 185,
			'pl_id'		=> 4062,
		],
		self::SHOP_TYPE_RAKUTEN => [
			'column'	=> 'rakuten_url',
			'label'		=> '楽天市場',
			'column'	=> self::MOSHIMO_RAKUTEN_ID_COLUMN,
			'val'		=> self::MOSHIMO_SHOP_RAKUTEN_VAL,
			'a_id'		=> '',
			'p_id'		=> 54,
			'pc_id'		=> 54,
			'pl_id'		=> 616,
		],
		self::SHOP_TYPE_YAHOO => [
			'column'	=> 'yahop_url',
			'label'		=> 'Yahooショッピング',
			'column'	=> self::MOSHIMO_YAHOO_ID_COLUMN,
			'val'		=> self::MOSHIMO_SHOP_YAHOO_VAL,
			'a_id'		=> '',
			'p_id'		=> 1225,
			'pc_id'		=> 1925,
			'pl_id'		=> 18502,
		],
        self::SHOP_TYPE_MERCARI => [
            'column'	=> 'mercari_url',
            'label'		=> 'メルカリ',
            'column'	=> '',
            'val'		=> 0,
            'a_id'		=> '',
            'p_id'		=> 0,
            'pc_id'		=> 0,
            'pl_id'		=> 0,
        ],
	];

	public $rakuten_sorts = [
		5 => [
			'label' => '楽天標準ソート順',
			'value' => 'standard'
		],
		10 => [
			'label' => 'アフィリエイト料率順（昇順）',
			'value' => '+affiliateRate'
		],
		15 => [
			'label' => 'アフィリエイト料率順（降順）',
			'value' => '-affiliateRate'
		],
		30 => [
			'label' => 'レビュー平均順（昇順）',
			'value' => '+reviewAverage'
		],
		35 => [
			'label' => 'レビュー平均順（降順）',
			'value' => '-reviewAverage'
		],
		40 => [
			'label' => '価格順（昇順）',
			'value' => '+reviewCount'
		],
		45 => [
			'label' => '価格順（降順）',
			'value' => '-itemPrice'
		],
	];

	public $search_indexes = [
		'All'						=> 'すべて',
		'AmazonVideo'				=> 'Prime Video',
		'Apparel'					=> 'アパレル&ファッション雑貨',
		'Appliances'				=> '電化製品',
		'Automotive'				=> '車＆バイク',
		'Baby'						=> 'ベビー&マタニティ',
		'Beauty'					=> 'コスメ',
		'Books'						=> '書籍（Kindle含む）',
		'KindleStore'				=> 'Kindleのみ',
		'Classical'					=> 'クラシック音楽',
		'Computers'					=> 'コンピューター',
		'CreditCards'				=> 'クレジットカード',
		'DigitalMusic'				=> 'デジタルミュージック',
		'Electronics'				=> '家電&カメラ',
		//'EverythingElse'			=> 'ほかのすべて',
		'Fashion'					=> 'ファッション',
		'FashionBaby'				=> 'ファッション（キッズ&ベビー）',
		'FashionMen' 				=> 'ファッション（メンズ）',
		'FashionWomen' 				=> 'ファッション（レディース）',
		'ForeignBooks'				=> '洋書',
		'GiftCards'					=> 'ギフトカード',
		'GroceryAndGourmetFood'		=> '食料と飲料',
		'HealthPersonalCare'		=> 'ヘルス＆ビューティー',
		'Hobbies'					=> 'ホビー',
		'HomeAndKitchen'			=> 'ホーム&キッチン',
		'Industrial'				=> '産業・研究開発用品',
		'Jewelry'					=> 'ジュエリー',
		'MobileApps'				=> 'Android アプリ',
		'MoviesAndTV'				=> '映画とテレビ',
		'Music'						=> 'ミュージック',
		'MusicalInstruments'		=> '楽器',
		'OfficeProducts'			=> '文房具&オフィス用品',
		'PetSupplies'				=> 'ペット用品',
		'Shoes'						=> 'シューズ&バッグ',
		'Software'					=> 'PCソフト',
		'SportsAndOutdoors'			=> 'スポーツ&アウトドア',
		'ToolsAndHomeImprovement'	=> 'DIY&工具&ガーデン',
		'Toys'						=> 'おもちゃ',
		'VideoGames'				=> 'TVゲーム',
		'Watches'					=> '腕時計',
	];

	const DESIGN_TYPE_NORMAL = 0;
	const DESIGN_TYPE_NONE = 99;
	const DESIGN_TYPE_STYLE_UP = 10;
	const DESIGN_TYPE_SHIRONUKI = 20;
	const DESIGN_TYPE_ONECOLOR = 30;
	const DESIGN_TYPE_SONIC_FLAT = 100;
	const DESIGN_TYPE_SONIC_MATERIAL = 110;
	const DESIGN_TYPE_SONIC_ROUND = 120;
	const DESIGN_TYPE_SONIC_ONECOLOR = 130;

	public $design_types = [
		self::DESIGN_TYPE_NONE => ['label' => 'デザインなし', 'func' => null],
		self::DESIGN_TYPE_NORMAL => ['label' => 'ノーマル', 'func' => null],
	];

	/**
	 * SONIC COPIA FANBOX全て含めたデザインタイプ一覧
	 * @var int[]
	 */
	public $custom_design_types = [
		self::DESIGN_TYPE_NORMAL => ['add_css' => true],
		self::DESIGN_TYPE_NONE => ['add_css' => false],
		self::DESIGN_TYPE_STYLE_UP => ['add_css' => true],
		self::DESIGN_TYPE_SHIRONUKI => ['add_css' => true],
		self::DESIGN_TYPE_ONECOLOR => ['add_css' => true],
		self::DESIGN_TYPE_SONIC_FLAT => ['add_css' => true],
		self::DESIGN_TYPE_SONIC_MATERIAL => ['add_css' => true],
		self::DESIGN_TYPE_SONIC_ROUND => ['add_css' => true],
		self::DESIGN_TYPE_SONIC_ONECOLOR => ['add_css' => true],
	];

	const DESIGN_CODE_SLIM = 's';
	const DESIGN_CODE_MINI = 'mini';
	const DESIGN_CODE_THUMB = 'thumb';
	public $each_designs = [
		self::DESIGN_CODE_SLIM => ['class_name' => 'yyi-rinker-design-slim', 'name' => 'スリム', 'links_hidden' => false],
		self::DESIGN_CODE_MINI => ['class_name' => 'yyi-rinker-design-mini', 'name' => 'ミニ', 'links_hidden' => true],
		self::DESIGN_CODE_THUMB => ['class_name' => 'yyi-rinker-design-thumb-img', 'name' => 'サムネイル表示', 'links_hidden' => false],
	];

	//key:attr名、value:デフォルト値
	public $template_atts = [
		'template_name' => '',
		'design' => '',
		'size' => '',
		'alabel' => '',
		'rlabel' => '',
		'ylabel' => '',
		'klabel' => '',
        'mlabel' => '',
		'tag' => '',
		'attention_text' => '',
		'attention_design' => '',
		'attention_color' => '',
	] ;

	/**
	 * Gutenberg用デザイン
	 */
	public function each_designs_for_gutenberg() {
		$datas = [];
		$datas[] = ['label' => 'デフォルト', 'value' => ''];
		foreach ($this->each_designs AS $type => $design) {
			$datas[] = [
				'label' => $design['name'],
				'value' => $type,
			] ;
		}
		return $datas;
	}

	public function array_get($array, $key, $default = null)
	{
		if ( is_null( $key ) ) return $array;

		if ( isset( $array[$key] ) ) return $array[ $key ];

		foreach ( explode( '.', $key ) as $segment )
		{
			if ( ! is_array($array) || ! array_key_exists( $segment, $array ) )
			{
				return $default;
			}
			$array = $array[ $segment ];
		}

		return $array;
	}

	public function now() {
		return date('Y-m-d H:i:s');
	}
}
