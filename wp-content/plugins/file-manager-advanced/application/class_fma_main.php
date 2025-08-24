<?php
/**
 * File Manager Advanced Main Class
 *
 * @package: File Manager Advanced
 * @Class: fma_main
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'class_fma_main' ) ) {
	return;
}

/**
 * Main Class
 */
class class_fma_main {
	/**
	 * Settings
	 *
	 * @var false|mixed|null $settings Plugin settings.
	 */
	public $settings;

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_menu', array( &$this, 'fma_menus' ) );
		add_action( 'admin_enqueue_scripts', array( &$this, 'fma_scripts' ) );
		add_action( 'wp_ajax_fma_load_fma_ui', array( &$this, 'fma_load_fma_ui' ) );
		add_action( 'wp_ajax_fma_review_ajax', array( $this, 'fma_review_ajax' ) );
		$this->settings = get_option( 'fmaoptions' );

        add_action( 'admin_init', array( $this, 'admin_init' ) );
	}

	/**
	 * Load Menus
	 */
	public function fma_menus() {
		include 'class_fma_admin_menus.php';
		$fma_menus = new class_fma_admin_menus();
		$fma_menus->load_menus();
	}

	/**
	 * Load File Manager UI
	 */
	public function fma_load_fma_ui() {
		include 'class_fma_connector.php';
		$fma_connector = new class_fma_connector();
		if ( wp_verify_nonce( $_REQUEST['_fmakey'], 'fmaskey' ) ) {
			$fma_connector->fma_local_file_system();
		}
	}

	/**
	 * Load Scripts
	 *
	 * @param string $hook The current admin page.
	 */
	public function fma_scripts( $hook ) {
		$locale             = isset( $this->settings['fma_locale'] ) ? sanitize_file_name( $this->settings['fma_locale'] ) : 'en';
		$display_ui_options = isset( $this->settings['display_ui_options'] ) ? $this->settings['display_ui_options'] : FMA_UI;
		$cm_theme           = isset( $this->settings['fma_cm_theme'] ) ? $this->settings['fma_cm_theme'] : 'default';
		$library_url        = FMA_PLUGIN_URL . 'application/library/';
		$hide_path          = false;
		if ( isset( $this->settings['hide_path'] ) && 1 === absint( $this->settings['hide_path'] ) ) {
			$hide_path = true;
		}

		if ( 'toplevel_page_file_manager_advanced_ui' === $hook ) {
			if ( isset( $_GET['page'] ) && 'file_manager_advanced_ui' === sanitize_text_field( wp_unslash( $_GET['page'] ) ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				wp_enqueue_style( 'elfinder.jquery-ui', $library_url . 'jquery/jquery-ui.min.css', array(), FMA_VERSION, 'all' );
				wp_enqueue_style( 'elfinder', $library_url . 'css/elfinder.min.css', array(), FMA_VERSION, 'all' );
				wp_enqueue_style( 'elfinder.theme', $library_url . 'css/theme.css', array(), FMA_VERSION, 'all' );
				wp_enqueue_style( 'codemirror', $library_url . 'codemirror/lib/codemirror.css', array(), FMA_VERSION, 'all' );

				if ( isset( $this->settings['fma_theme'] ) && in_array( $this->settings['fma_theme'], array( 'dark', 'grey', 'windows10', 'bootstrap', 'mono' ), true ) ) {
					wp_enqueue_style( 'elfinder.preview', $library_url . 'themes/' . $this->settings['fma_theme'] . '/css/theme.css', array(), FMA_VERSION, 'all' );
				}

				wp_enqueue_style( 'elfinder.styles', FMA_PLUGIN_URL . 'application/assets/css/custom_style_filemanager_advanced.css', array(), FMA_VERSION, 'all' );

				wp_enqueue_script( 'elfinder', $library_url . 'js/elfinder.min.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-selectable', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-resizable', 'jquery-ui-dialog', 'jquery-ui-slider', 'jquery-ui-tabs' ), FMA_VERSION, true );
				wp_enqueue_script( 'codemirror', $library_url . 'codemirror/lib/codemirror.js', array(), FMA_VERSION, true );
				wp_enqueue_script( 'codemirror.htmlmixed', $library_url . 'codemirror/mode/htmlmixed/htmlmixed.js', array(), FMA_VERSION, true );
				wp_enqueue_script( 'codemirror.xml', $library_url . 'codemirror/mode/xml/xml.js', array(), FMA_VERSION, true );
				wp_enqueue_script( 'codemirror.css', $library_url . 'codemirror/mode/css/css.js', array(), FMA_VERSION, true );
				wp_enqueue_script( 'codemirror.javascript', $library_url . 'codemirror/mode/javascript/javascript.js', array(), FMA_VERSION, true );
				wp_enqueue_script( 'codemirror.clike', $library_url . 'codemirror/mode/clike/clike.js', array(), FMA_VERSION, true );
				wp_enqueue_script( 'codemirror.php', $library_url . 'codemirror/mode/php/php.js', array(), FMA_VERSION, true );

				if ( 'en' !== $locale ) {
					wp_enqueue_script( 'elfinder.language', $library_url . sprintf( 'js/i18n/elfinder.%s.js', $locale ), array( 'elfinder' ), FMA_VERSION, true );
				}

				if ( 'default' !== $cm_theme ) {
					wp_enqueue_style( 'codemirror.theme', $library_url . 'codemirror/theme/' . $cm_theme . '.css', array(), FMA_VERSION, 'all' );
				}

				wp_enqueue_script( 'elfinder.script', FMA_PLUGIN_URL . 'application/assets/js/elfinder_script.js', array( 'jquery' ), FMA_VERSION, true );
				wp_localize_script(
					'elfinder.script',
					'afm_object',
					array(
						'ajaxurl'   => admin_url( 'admin-ajax.php' ),
						'nonce'     => wp_create_nonce( 'fmaskey' ),
						'locale'    => $locale,
						'ui'        => $display_ui_options,
						'cm_theme'  => $cm_theme,
						'hide_path' => $hide_path,
						'plugin_url' => FMA_PLUGIN_URL,
					)
				);
			}
		}

		wp_register_style( 'afm-jquery.select2', FMA_PLUGIN_URL . 'application/assets/css/select2/jquery.select2.min.css', array(), FMA_VERSION, 'all' );
		wp_register_script( 'afm-jquery.select2', FMA_PLUGIN_URL . 'application/assets/js/select2/jquery.select2.min.js', array( 'jquery' ), FMA_VERSION, true );
		
		if ( in_array( $hook, array( 'file-manager_page_file_manager_advanced_controls', 'file-manager_page_file_manager_advanced_shortcodes', 'file-manager_page_afmp-adminer', 'file-manager_page_afmp-dropbox', 'file-manager_page_afmp-googledrive', 'toplevel_page_file_manager_advanced_ui', 'file-manager_page_afmp-file-logs', 'file-manager_page_afmp-onedrive' ), true ) ) {
			wp_enqueue_style( 'afm-admin', FMA_PLUGIN_URL . 'application/assets/css/afm-styles.css', array( 'afm-jquery.select2' ), FMA_VERSION, 'all' );
			wp_enqueue_script( 'afm-admin', FMA_PLUGIN_URL . 'application/assets/js/afm-scripts.js', array( 'afm-jquery.select2' ), FMA_VERSION, true );
			wp_localize_script(
				'afm-admin',
				'afmAdmin',
				array(
					'assetsURL' => FMA_PLUGIN_URL . 'application/assets/',
					'jsonURL'  => rest_url(),
				),
			);
		}
	}

	/**
	 * Code Mirror Themes
	 */
	public static function cm_themes() {
		$cm_themes_dir = FMA_CM_THEMES_PATH;
		$cm_themes = [];
		$cm_themes['default'] = array(
			'title' => 'default',
			'pro'   => false,
		);

		$free_themes = array( '3024-day', '3024-night', 'base16-dark', 'base16-light', 'downtown-light' );
		foreach( glob( $cm_themes_dir . '/*.css' ) as $file ) {
			$bn = basename($file, ".css");
			$args = array(
				'title' => $bn,
				'pro'   => true,
			);
			if ( in_array( $bn, $free_themes, true ) ) {
				$args['pro'] = false;
			}
			$cm_themes[ $bn ] = $args;
		}

		usort(
			$cm_themes,
			function( $a, $b ) {
				if ( $a['pro'] === $b['pro'] ) {
					return 0;
				}
				return $a['pro'] ? 1 : -1;
			}
		);

		return $cm_themes;
	}

	/**
	 * Review Ajax
	 */
	public function fma_review_ajax() {
		$nonce = $_REQUEST['nonce'];
		if ( ! wp_verify_nonce( $nonce, 'afm_review' ) ) {
			die( __( 'Security check', 'file-manager-advanced' ) );
		} else {
			$task = sanitize_text_field( $_POST['task'] );
			$done = update_option( 'fma_hide_review_section', $task );
			if ( $done ) {
				echo '1';
			} else {
				echo '0';
			}
			die;
		}
	}

    /**
     * Admin Init
     *
     * @since 3.3.1
     */
    public function admin_init() {
        $is_pro_version = get_option( 'active_plugins', array() );
        if ( ! in_array( 'file-manager-advanced-pro/file-manager-advanced-shortcode.php', $is_pro_version, true ) ) {
            require_once FMAFILEPATH . 'application/logs/class-filelogs.php';
        }
    }

	public static function has_pro() {
		$has_pro = apply_filters( 'fma__has_pro', false );
	   return $has_pro;
	}
}
