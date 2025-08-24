<?php
$st_is_ex    = st_is_ver_ex();
$st_is_af    = st_is_ver_af();
$st_is_st    = st_is_ver_st();
$st_is_ex_af = st_is_ver_ex_af();

if ( ! function_exists( '_st_widget_handle_disabled_widgets' ) ) {
	/** テーマ設定にもとづいてウィジェットを無効化する */
	function _st_widget_handle_disabled_widgets() {
		// ウィジェット一覧が取得できなくなるため、テーマ管理画面では無効化しない
		if ( st_admin_is_admin_screen() ) {
			return;
		}

		foreach ( st_admin_get_widget_settings() as $class => $setting ) {
			if ( $setting['disabled'] ) {
				unregister_widget( $class );
			}
		}
	}
}

add_action( 'widgets_init', '_st_widget_handle_disabled_widgets', 99 );

// Sidebar の開始/終了状態の管理/判別
if ( ! function_exists( '_st_widget_sidebar_state' ) ) {
	function _st_widget_sidebar_state( $index = null, $value = null ) {
		static $state = false;
		static $states = array();

		if ( $value === null ) {
			if ( $index === null ) {
				return $state;
			}

			return isset( $states[ $index ] ) ? $states[ $index ] : false;
		}

		if ( $index === null ) {
			$states = $value;

			return $states;
		}

		$states[ $index ] = $value;
		$state            = in_array( true, $states, true );

		return $states[ $index ];
	}
}

if ( ! function_exists( '_st_widget_handle_sidebar_begin' ) ) {
	function _st_widget_handle_sidebar_begin( $index ) {
		_st_widget_sidebar_state( $index, true );
	}
}

add_action( 'dynamic_sidebar_before', '_st_widget_handle_sidebar_begin' );

if ( ! function_exists( '_st_widget_handle_sidebar_end' ) ) {
	function _st_widget_handle_sidebar_end( $index ) {
		_st_widget_sidebar_state( $index, false );
	}
}

add_action( 'dynamic_sidebar_after', '_st_widget_handle_sidebar_end' );

// ウィジェットの開始/終了状態の管理/判別
if ( ! function_exists( '_st_widget_widget_state' ) ) {
	function _st_widget_widget_state( $class, $value = null ) {
		static $states = array();

		if ( $value === null ) {
			return isset( $states[ $class ] ) ? $states[ $class ] : false;
		}

		$states[ $class ] = $value;

		return $states[ $class ];
	}
}

if ( ! function_exists( '_st_widget_handle_display' ) ) {
	function _st_widget_handle_display( $instance, $widget, $args ) {
		_st_widget_widget_state( get_class( $widget ), true );

		return $instance;
	}
}

add_filter( 'widget_display_callback', '_st_widget_handle_display', 10, 3 );

if ( ! function_exists( '_st_widget_handle_widget' ) ) {
	function _st_widget_handle_widget( $widget_class, $instance, $args ) {
		_st_widget_widget_state( $widget_class, true );
	}
}

add_action( 'the_widget', '_st_widget_handle_widget', 10, 3 );

if ( ! function_exists( '_st_widget_get_side_sidebars' ) ) {
	/** サブカラム (#side) のサイドバー ID を取得 */
	function _st_widget_get_side_sidebar_ids() {
		return array(
			'sidebar-1',     // サイドバー（中部）
			'sidebar-10',    // サイドバー（上部）
		);
	}
}

if ( ! function_exists( '_st_widget_wp_list_categories' ) ) {
	function _st_widget_wp_list_categories( $output, $args ) {
		// WP 標準カテゴリーウィジェット
		_st_widget_widget_state( WP_Widget_Categories::class, false );

		return $output;
	}
}

add_filter( 'wp_list_categories', '_st_widget_wp_list_categories', 10, 2 );

if ( $st_is_ex_af || $st_is_st ) { // EX・AFまたはST限定
	// カラーピッカー
	if (!function_exists('_st_widget_print_colorpicker_script')) {
		function _st_widget_print_colorpicker_script() {
			$is_widget_block_editor = (function_exists( 'wp_use_widgets_block_editor' ) && wp_use_widgets_block_editor());
			?>

			<script>
				;(function (window, document, $, undefined) {
					'use strict';

					var IS_WIDGET_BLOCK_EDITOR = <?php echo $is_widget_block_editor ? 'true' : 'false'; ?>;

					function isWidget(widget) {
						var id;
						var $input;
						var reg_exp = /^(widget-\d+_)?(st_info_mation|form2|guidemap(_\d+)?)_widget-\d+$/;

						if (IS_WIDGET_BLOCK_EDITOR) {
							$input = $(widget).find('[name="widget-id"]');
							id     = $input.val();

							return id.match(reg_exp);
						}

						id = $(widget).attr('id');;

						return id.match(reg_exp);
					}

					function triggerInput(event, ui) {
						$(event.target).trigger('input');
					}

					function initialize($widget) {
						var $input;

						$input = $widget.find('[data-wp-color-picker]');

						$input.removeAttr('max min maxlength pattern')
							.prop('required', false)
							.wpColorPicker();

						if (!IS_WIDGET_BLOCK_EDITOR) {
							$widget.find('.wp-picker-holder').css({position: 'absolute', zIndex: '999'});
						}

						$widget.find('.wp-color-result').css({verticalAlign: 'middle'});

						$input.wpColorPicker('option', 'change', triggerInput);
						$input.wpColorPicker('option', 'clear', triggerInput);
					}

					$(document).on('widget-added widget-updated', function (event, widget) {
						if (!isWidget(widget)) {
							return;
						}

						initialize($(widget));
					});

					$(function () {
						$('.widget')
							.filter(function (index, element) {
								return isWidget(element);
							})
							.each(function (index, element) {
								initialize($(element));
							})
					});
				}(window, window.document, jQuery));
			</script>

			<?php
		}
	}

	add_action( 'admin_print_footer_scripts-widgets.php', '_st_widget_print_colorpicker_script' );
}

// 00_AFFINGERカスタムHTML
class St_Custom_Html_Widget extends WP_Widget {
	private $defaults         = array();

	private $registered       = false;

	public function __construct() {
		parent::__construct(
			'st_custom_html_widget',
			__( '00_AFFINGERカスタムHTML', 'affinger' ),
			array( 'description' => __( '任意の HTML コードを表示します。', 'affinger' ), ),
			array( 'width' => 400, 'height' => 350, )
		);

		$this->defaults = [
			'title'      => '',
			'content'    => '',
			'hide_title' => false,
		];
	}

	static public function render_control_template_scripts() {
		?>
		<script type="text/html" id="tmpl-widget-custom-html-control-fields">
			<# var elementIdPrefix = 'el' + String( Math.random() ).replace( /\D/g, '' ) + '_' #>
			<p>
				<label for="{{ elementIdPrefix }}title"><?php esc_html_e( 'Title:' ); ?></label>
				<input id="{{ elementIdPrefix }}title" type="text" class="widefat title">
			</p>

			<p>
				<label for="{{ elementIdPrefix }}content"
				       id="{{ elementIdPrefix }}content-label"><?php esc_html_e( 'Content:' ); ?></label>
				<textarea id="{{ elementIdPrefix }}content" class="widefat code content" rows="16" cols="20"></textarea>
			</p>

			<?php if ( ! current_user_can( 'unfiltered_html' ) ) : ?>
				<?php
				$probably_unsafe_html = array( 'script', 'iframe', 'form', 'input', 'style' );
				$allowed_html         = wp_kses_allowed_html( 'post' );
				$disallowed_html      = array_diff( $probably_unsafe_html, array_keys( $allowed_html ) );
				?>
				<?php if ( ! empty( $disallowed_html ) ) : ?>
					<# if ( data.codeEditorDisabled ) { #>
					<p>
						<?php _e( 'Some HTML tags are not permitted, including:' ); ?>
						<code><?php echo join( '</code>, <code>', $disallowed_html ); ?></code>
					</p>
					<# } #>
				<?php endif; ?>
			<?php endif; ?>

			<div class="code-editor-error-container"></div>
		</script>
		<?php
	}

	static public function add_help_text() {
		$screen = get_current_screen();

		$content = '<p>';
		$content .= __( 'Use the Custom HTML widget to add arbitrary HTML code to your widget areas.', 'affinger' );
		$content .= '</p>';

		if ( wp_get_current_user()->syntax_highlighting !== 'false' ) {
			$content .= '<p>';
			$content .= sprintf(
				__( 'The edit field automatically highlights code syntax. You can disable this in your <a href="%1$s" %2$s>user profile%3$s</a> to work in plain text mode.', 'affinger' ),
				esc_url( get_edit_profile_url() ),
				'class="external-link" target="_blank"',
				sprintf( '<span class="screen-reader-text"> %s</span>',
					/* translators: accessibility text */
					__( '(opens in a new window)', 'affinger' )
				)
			);
			$content .= '</p>';

			$content .= '<p id="editor-keyboard-trap-help-1">' . __( 'When using a keyboard to navigate:', 'affinger' ) . '</p>';
			$content .= '<ul>';
			$content .= '<li id="editor-keyboard-trap-help-2">' . __( 'In the editing area, the Tab key enters a tab character.', 'affinger' ) . '</li>';
			$content .= '<li id="editor-keyboard-trap-help-3">' . __( 'To move away from this area, press the Esc key followed by the Tab key.', 'affinger' ) . '</li>';
			$content .= '<li id="editor-keyboard-trap-help-4">' . __( 'Screen reader users: when in forms mode, you may need to press the Esc key twice.', 'affinger' ) . '</li>';
			$content .= '</ul>';
		}

		$screen->add_help_tab( array(
			'id'      => 'custom_html_widget',
			'title'   => __( 'Custom HTML Widget', 'affinger' ),
			'content' => $content,
		) );
	}

	public function _register_one( $number = - 1 ) {
		parent::_register_one( $number );

		if ( $this->registered ) {
			return;
		}

		$this->registered = true;

		wp_add_inline_script(
			'custom-html-widgets',
			sprintf( 'wp.customHtmlWidgets.idBases.push( %s );', wp_json_encode( $this->id_base ) )
		);

		add_action( 'admin_print_scripts-widgets.php', array( $this, 'enqueue_admin_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( static::class, 'render_control_template_scripts' ) );
		add_action( 'admin_head-widgets.php', array( static::class, 'add_help_text' ) );
	}

	public function _filter_gallery_shortcode_attrs( $attrs ) {
		if ( ! is_singular() && empty( $attrs['id'] ) && empty( $attrs['include'] ) ) {
			$attrs['id'] = - 1;
		}

		return $attrs;
	}

	public function widget( $args, $instance ) {
		global $post;

		$original_post = $post;

		if ( is_singular() ) {
			$post = get_queried_object();
		} else {
			$post = null;
		}

		add_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

		$title = isset( $instance['title'] ) ? $instance['title'] : $this->defaults['title'];
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$content = isset( $instance['content'] ) ? $instance['content'] : $this->defaults['content'];

		$simulated_text_widget_instance = array_merge(
			$instance,
			array(
				'text'   => $content,
				'filter' => false,
				'visual' => false,
			)
		);

		unset( $simulated_text_widget_instance['content'] );

		$content = apply_filters( 'widget_text', $content, $simulated_text_widget_instance, $this );
		$content = apply_filters( 'widget_custom_html_content', $content, $instance, $this );

		$hide_title = isset( $instance['hide_title'] ) ? (bool) $instance['hide_title'] : $this->defaults['hide_title'];

		$post = $original_post;

		remove_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

		$args['before_widget'] = preg_replace( '/(?<=\sclass=["\'])/', 'widget_text ', $args['before_widget'] );
		?>

		<?php echo $args['before_widget']; ?>

		<?php if ( $title !== '' && ! $hide_title ) : ?>
			<?php echo $args['before_title'] . $title . $args['after_title']; ?>
		<?php endif; ?>

		<div class="textwidget custom-html-widget">
			<?php echo $content; ?>
		</div>

		<?php echo $args['after_widget']; ?>

		<?php
	}

	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : $this->defaults['title'];
		$content    = isset( $instance['content'] ) ? $instance['content'] : $this->defaults['content'];
		$hide_title = isset( $instance['hide_title'] ) ? (bool) $instance['hide_title'] : $this->defaults['hide_title'];
		?>

		<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="title sync-input" type="hidden"
		       name="<?php echo $this->get_field_name( 'title' ); ?>"
		       value="<?php echo esc_attr( $title ); ?>">

		<textarea id="<?php echo $this->get_field_id( 'content' ); ?>" class="content sync-input"
		          name="<?php echo $this->get_field_name( 'content' ); ?>"
		          hidden><?php echo esc_textarea( $content ); ?></textarea>

		<p>
			<input id="<?php echo $this->get_field_id( 'hide_title' ); ?>" class="checkbox" type="checkbox"
			       name="<?php echo $this->get_field_name( 'hide_title' ); ?>"
			       value="1"<?php checked( $hide_title ); ?>>
			<label for="<?php echo $this->get_field_id( 'hide_title' ); ?>">タイトルを出力しない</label>
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = isset( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : $this->defaults['title'];

		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['content'] = isset( $new_instance['content'] ) ? $new_instance['content'] : $this->defaults['content'];
		} else {
			$instance['content'] = isset( $new_instance['content'] ) ? wp_kses_post( $new_instance['content'] ) : $this->defaults['content'];
		}

		$instance['hide_title'] = isset( $new_instance['hide_title'] ) ? (bool) $new_instance['hide_title'] : $this->defaults['hide_title'];

		return $instance;
	}

	public function enqueue_admin_scripts() {
		$settings = wp_enqueue_code_editor( array(
			'type'       => 'text/html',
			'codemirror' => array(
				'indentUnit' => 2,
				'tabSize'    => 2,
			),
		) );

		wp_enqueue_script( 'custom-html-widgets' );

		if ( empty( $settings ) ) {
			$settings = array(
				'disabled' => true,
			);
		}

		wp_add_inline_script(
			'custom-html-widgets',
			sprintf( 'wp.customHtmlWidgets.init( %s );', wp_json_encode( $settings ) ),
			'after'
		);

		$l10n = array(
			'errorNotice' => array(
				'singular' => _n(
					'There is %d error which must be fixed before you can save.',
					'There are %d errors which must be fixed before you can save.',
					1,
					'affinger'
				),
				'plural'   => _n(
					'There is %d error which must be fixed before you can save.',
					'There are %d errors which must be fixed before you can save.',
					2,
					'affinger'
				),
			),
		);

		wp_add_inline_script(
			'custom-html-widgets',
			sprintf( 'jQuery.extend( wp.customHtmlWidgets.l10n, %s );', wp_json_encode( $l10n ) ),
			'after'
		);
	}
}

if ( ! function_exists( '_st_widget_register_st_custom_html' ) ) {
	function _st_widget_register_st_custom_html() {
		register_widget( St_Custom_Html_Widget::class );
	}
}

add_action( 'widgets_init', '_st_widget_register_st_custom_html' );

if ( $st_is_ex ) { // EX限定
	// 19_AFFINGERカスタムHTML（広告）
	class St_Custom_Html_Ad_Widget extends WP_Widget {
		private $defaults         = array();

		private $registered       = false;

		public function __construct() {
			parent::__construct(
				'st_custom_html_ad_widget',
				__( 'カスタムHTML（広告用）', 'affinger' ),
				array( 'description' => __( '投稿及び固定ページにて非表示設定に連動します。', 'affinger' ), ),
				array( 'width' => 400, 'height' => 350, )
			);

			$this->defaults = [
				'title'      => '',
				'content'    => '',
				'hide_title' => false,
			];
		}

		static public function render_control_template_scripts() {
			?>
			<script type="text/html" id="tmpl-widget-custom-html-ad-control-fields">
				<# var elementIdPrefix = 'el' + String( Math.random() ).replace( /\D/g, '' ) + '_' #>
				<p>
					<label for="{{ elementIdPrefix }}title"><?php esc_html_e( 'Title:' ); ?></label>
					<input id="{{ elementIdPrefix }}title" type="text" class="widefat title">
				</p>

				<p>
					<label for="{{ elementIdPrefix }}content"
						   id="{{ elementIdPrefix }}content-label"><?php esc_html_e( 'Content:' ); ?></label>
					<textarea id="{{ elementIdPrefix }}content" class="widefat code content" rows="16" cols="20"></textarea>
				</p>

				<?php if ( ! current_user_can( 'unfiltered_html' ) ) : ?>
					<?php
					$probably_unsafe_html = array( 'script', 'iframe', 'form', 'input', 'style' );
					$allowed_html         = wp_kses_allowed_html( 'post' );
					$disallowed_html      = array_diff( $probably_unsafe_html, array_keys( $allowed_html ) );
					?>
					<?php if ( ! empty( $disallowed_html ) ) : ?>
						<# if ( data.codeEditorDisabled ) { #>
						<p>
							<?php _e( 'Some HTML tags are not permitted, including:' ); ?>
							<code><?php echo join( '</code>, <code>', $disallowed_html ); ?></code>
						</p>
						<# } #>
					<?php endif; ?>
				<?php endif; ?>

				<div class="code-editor-error-container"></div>
			</script>
			<?php
		}

		static public function add_help_text() {
			$screen = get_current_screen();

			$content = '<p>';
			$content .= __( 'Use the Custom HTML widget to add arbitrary HTML code to your widget areas.', 'affinger' );
			$content .= '</p>';

			if ( wp_get_current_user()->syntax_highlighting !== 'false' ) {
				$content .= '<p>';
				$content .= sprintf(
					__( 'The edit field automatically highlights code syntax. You can disable this in your <a href="%1$s" %2$s>user profile%3$s</a> to work in plain text mode.', 'affinger' ),
					esc_url( get_edit_profile_url() ),
					'class="external-link" target="_blank"',
					sprintf( '<span class="screen-reader-text"> %s</span>',
						/* translators: accessibility text */
						__( '(opens in a new window)', 'affinger' )
					)
				);
				$content .= '</p>';

				$content .= '<p id="editor-keyboard-trap-help-1">' . __( 'When using a keyboard to navigate:', 'affinger' ) . '</p>';
				$content .= '<ul>';
				$content .= '<li id="editor-keyboard-trap-help-2">' . __( 'In the editing area, the Tab key enters a tab character.', 'affinger' ) . '</li>';
				$content .= '<li id="editor-keyboard-trap-help-3">' . __( 'To move away from this area, press the Esc key followed by the Tab key.', 'affinger' ) . '</li>';
				$content .= '<li id="editor-keyboard-trap-help-4">' . __( 'Screen reader users: when in forms mode, you may need to press the Esc key twice.', 'affinger' ) . '</li>';
				$content .= '</ul>';
			}

			$screen->add_help_tab( array(
				'id'      => 'custom_html_widget',
				'title'   => __( 'Custom HTML Widget', 'affinger' ),
				'content' => $content,
			) );
		}

		public function _register_one( $number = - 1 ) {
			parent::_register_one( $number );

			if ( $this->registered ) {
				return;
			}

			$this->registered = true;

			wp_add_inline_script(
				'custom-html-widgets',
				sprintf( 'wp.customHtmlWidgets.idBases.push( %s );', wp_json_encode( $this->id_base ) )
			);

			add_action( 'admin_print_scripts-widgets.php', array( $this, 'enqueue_admin_scripts' ) );
			add_action( 'admin_footer-widgets.php', array( static::class, 'render_control_template_scripts' ) );
			add_action( 'admin_head-widgets.php', array( static::class, 'add_help_text' ) );
		}

		public function _filter_gallery_shortcode_attrs( $attrs ) {
			if ( ! is_singular() && empty( $attrs['id'] ) && empty( $attrs['include'] ) ) {
				$attrs['id'] = - 1;
			}

			return $attrs;
		}

		public function widget( $args, $instance ) {
			global $post;

			$original_post = $post;

			if ( is_singular() ) {
				$post = get_queried_object();
			} else {
				$post = null;
			}

			add_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

			$title = isset( $instance['title'] ) ? $instance['title'] : $this->defaults['title'];
			$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

			$content = isset( $instance['content'] ) ? $instance['content'] : $this->defaults['content'];

			$simulated_text_widget_instance = array_merge(
				$instance,
				array(
					'text'   => $content,
					'filter' => false,
					'visual' => false,
				)
			);

			unset( $simulated_text_widget_instance['content'] );

			$content = apply_filters( 'widget_text', $content, $simulated_text_widget_instance, $this );
			$content = apply_filters( 'widget_custom_html_content', $content, $instance, $this );

			$hide_title = isset( $instance['hide_title'] ) ? (bool) $instance['hide_title'] : $this->defaults['hide_title'];

			$post = $original_post;

			remove_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

			$args['before_widget'] = preg_replace( '/(?<=\sclass=["\'])/', 'widget_text ', $args['before_widget'] );
			?>

			<?php if ( is_single() || ( is_page() && ! is_front_page() ) ): // TOP以外の投稿と固定ページ ?>
				<?php
				$koukoku_set = get_post_meta( get_queried_object_id(), 'koukoku_set', true );
				$hide_ad     = ( $koukoku_set === 'yes' ); // 広告非表示
				?>

				<?php if ( ! $hide_ad ): // 広告表示 (非表示でない場合) ?>

					<?php echo $args['before_widget']; ?>

					<?php if ( $title !== '' && ! $hide_title ) : ?>
						<?php echo $args['before_title'] . $title . $args['after_title']; ?>
					<?php endif; ?>

					<div class="textwidget custom-html-widget">
						<?php echo $content; ?>
					</div>

					<?php echo $args['after_widget']; ?>

				<?php endif; ?>

			<?php else: // 投稿と固定ページ以外 ?>

				<?php echo $args['before_widget']; ?>

				<?php if ( $title !== '' && ! $hide_title ) : ?>
					<?php echo $args['before_title'] . $title . $args['after_title']; ?>
				<?php endif; ?>

				<div class="textwidget custom-html-widget">
					<?php echo $content; ?>
				</div>

				<?php echo $args['after_widget']; ?>

			<?php endif; ?>

			<?php
		}

		public function form( $instance ) {
			$title      = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : $this->defaults['title'];
			$content    = isset( $instance['content'] ) ? $instance['content'] : $this->defaults['content'];
			$hide_title = isset( $instance['hide_title'] ) ? (bool) $instance['hide_title'] : $this->defaults['hide_title'];
			?>

			<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="title sync-input" type="hidden"
				   name="<?php echo $this->get_field_name( 'title' ); ?>"
				   value="<?php echo esc_attr( $title ); ?>">

			<textarea id="<?php echo $this->get_field_id( 'content' ); ?>" class="content sync-input"
					  name="<?php echo $this->get_field_name( 'content' ); ?>"
					  hidden><?php echo esc_textarea( $content ); ?></textarea>

			<p>
				<input id="<?php echo $this->get_field_id( 'hide_title' ); ?>" class="checkbox" type="checkbox"
					   name="<?php echo $this->get_field_name( 'hide_title' ); ?>"
					   value="1"<?php checked( $hide_title ); ?>>
				<label for="<?php echo $this->get_field_id( 'hide_title' ); ?>">タイトルを出力しない</label>
			</p>

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance          = $old_instance;
			$instance['title'] = isset( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : $this->defaults['title'];

			if ( current_user_can( 'unfiltered_html' ) ) {
				$instance['content'] = isset( $new_instance['content'] ) ? $new_instance['content'] : $this->defaults['content'];
			} else {
				$instance['content'] = isset( $new_instance['content'] ) ? wp_kses_post( $new_instance['content'] ) : $this->defaults['content'];
			}

			$instance['hide_title'] = isset( $new_instance['hide_title'] ) ? (bool) $new_instance['hide_title'] : $this->defaults['hide_title'];

			return $instance;
		}

		public function enqueue_admin_scripts() {
			$settings = wp_enqueue_code_editor( array(
				'type'       => 'text/html',
				'codemirror' => array(
					'indentUnit' => 2,
					'tabSize'    => 2,
				),
			) );

			wp_enqueue_script( 'custom-html-widgets' );

			if ( empty( $settings ) ) {
				$settings = array(
					'disabled' => true,
				);
			}

			wp_add_inline_script(
				'custom-html-widgets',
				sprintf( 'wp.customHtmlWidgets.init( %s );', wp_json_encode( $settings ) ),
				'after'
			);

			$l10n = array(
				'errorNotice' => array(
					'singular' => _n(
						'There is %d error which must be fixed before you can save.',
						'There are %d errors which must be fixed before you can save.',
						1,
						'affinger'
					),
					'plural'   => _n(
						'There is %d error which must be fixed before you can save.',
						'There are %d errors which must be fixed before you can save.',
						2,
						'affinger'
					),
				),
			);

			wp_add_inline_script(
				'custom-html-widgets',
				sprintf( 'jQuery.extend( wp.customHtmlWidgets.l10n, %s );', wp_json_encode( $l10n ) ),
				'after'
			);
		}
	}

	if ( ! function_exists( '_st_widget_register_st_custom_html_ad' ) ) {
		function _st_widget_register_st_custom_html_ad() {
			register_widget( St_Custom_Html_Ad_Widget::class );
		}
	}

	add_action( 'widgets_init', '_st_widget_register_st_custom_html_ad' );
}

//フォームウィジェットを登録
class Form_Widget extends WP_Widget {
     function __construct() {
          parent::__construct(
               'form_widget', // Base ID
               __( '02_AFFINGER問合せボタン（ST-PRO）', 'affinger' ), // Name
               array( 'description' => __( '問合せボタンを表示するウィジェットです。', 'affinger' ), ) // Args
          );
     }

     /**
      * ウィジェットのフロントエンド表示
      */
     public function widget( $args, $instance ) {
        echo $args['before_widget'];
          if ( ! empty( $instance['st_form'] ) ) {
			if ( ! empty( $instance['st_title'] ) ) {
				$formname = $instance['st_title'];
			}else{
				$formname = 'Contact Form';
			}
			$formbtn = '<a class="st-formbtnlink" href="'.esc_url($instance['st_form']).'">
					<div class="st-formbtn">
						<div class="st-originalbtn-l"><span class="btnwebfont"><i class="st-fa st-svg-envelope" aria-hidden="true"></i></span></div>
						<div class="st-originalbtn-r"><span class="originalbtn-bold">'.esc_html($formname).'</span></div>
					</div>
				</a> ';
               echo apply_filters( 'widget_st_form', $formbtn );
          }
        echo $args['after_widget'];
     }

     /**
      * バックエンドのウィジェットフォーム
      */
     public function form( $instance ) {
          $st_form = ! empty( $instance['st_form'] ) ? $instance['st_form'] : __( '', 'affinger' );
          $st_title = ! empty( $instance['st_title'] ) ? $instance['st_title'] : __( '', 'affinger' );
          ?>
<p>
		<label for="<?php echo $this->get_field_id( 'st_title' ); ?>">タイトル</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'st_title' ); ?>" name="<?php echo $this->get_field_name( 'st_title' ); ?>" type="text" value="<?php echo esc_attr( $st_title ); ?>">
		</p>
          <p>
          <label for="<?php echo $this->get_field_id( 'st_form' ); ?>">url:</label>
          <input class="widefat" id="<?php echo $this->get_field_id( 'st_form' ); ?>" name="<?php echo $this->get_field_name( 'st_form' ); ?>" type="text" value="<?php echo esc_attr( $st_form ); ?>">
          </p>
          <?php
     }

     /**
      * ウィジェットフォームの値を保存用にサニタイズ
      */
     public function update( $new_instance, $old_instance ) {
          $instance = array();
          $instance['st_form'] = ( ! empty( $new_instance['st_form'] ) ) ? strip_tags( $new_instance['st_form'] ) : '';
          $instance['st_title'] = ( ! empty( $new_instance['st_title'] ) ) ? strip_tags( $new_instance['st_title'] ) : '';
          return $instance;
     }

}

function register_form_widget() {
    register_widget( 'Form_Widget' );
}
add_action( 'widgets_init', 'register_form_widget' );

//オリジナルボタンウィジェットを登録
class Form2_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'form2_widget', // Base ID
			__( '06_AFFINGERオリジナルボタン', 'affinger' ), // Name
			array( 'description' => __( 'オリジナルボタンを表示するウィジェットです。', 'affinger' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 */
	public function widget( $args, $instance ) {
		// URL
		$st_url = '';

		if ( isset( $instance['st_url'] ) ) {
			$st_url = $instance['st_url'];
		}

		if ( $st_url === '' ) {
			return;
		}

		// タイトル
		$st_title = isset( $instance['st_title'] ) ? $instance['st_title'] : 'オリジナルボタン';

		// FontAwesome
		if ( isset( $instance['st_class'] ) ) {
			$st_class = $instance['st_class'];
		} else { // メモ
			$st_class = 'st-svg-pencil-square-o';
		}

		// 色
		$st_background_color = isset( $instance['st_background_color'] ) ? $instance['st_background_color'] : '';  // 背景色
		$st_border_color     = isset( $instance['st_border_color'] ) ? $instance['st_border_color'] : '';  // 枠線
		$st_color            = isset( $instance['st_color'] ) ? $instance['st_color'] : '';  // テキスト色

		// style 属性
		$style_originalbtn = '';

		if ( ( $st_background_color !== '' || $st_border_color !== '') ) {
			$style_originalbtn .= ' style="';
			$style_originalbtn .= ($st_background_color !=='') ? 'background-color: ' . $st_background_color . ' !important;' : '';
			$style_originalbtn .= ($st_border_color !== '') ? 'border: 1px solid ' . $st_border_color . ' !important;' : '';
			$style_originalbtn .= '"';
		}

		$style_originalbtn_r = ( $st_color !== '' ) ? ' style="border-color: ' . $st_color . ' !important;"' : '';
		$style_originallink  = ( $st_background_color !== '' ) ? ' style="color: ' . $st_color . ' !important;"' : '';

		echo $args['before_widget'];

		$formbtn = '<a class="st-originallink" href="' . esc_url( $st_url ) . '"' . $style_originallink . '>
					<div class="st-originalbtn"' . $style_originalbtn .'>
						<div class="st-originalbtn-l"' . $style_originalbtn_r . '><span class="btnwebfont"><i class="st-fa ' . esc_attr( $st_class ) . '" aria-hidden="true"></i></span></div>
						<div class="st-originalbtn-r"><span class="originalbtn-bold">' . esc_html( $st_title ) . '</span></div>
					</div>
				</a>';

		echo apply_filters( 'widget_st_form', $formbtn );

		echo $args['after_widget'];
	}

	/**
	 * バックエンドのウィジェットフォーム
	 */
	public function form( $instance ) {
		$st_title = isset( $instance['st_title'] ) ? $instance['st_title'] : '';  // タイトル

		// FontAwesome
		if ( isset( $instance['st_class'] ) ) {
			$st_class = $instance['st_class'];
		} else {
			$st_class = 'st-svg-pencil-square-o';
		}

		// URL
		if ( isset( $instance['st_url'] ) ) {
			$st_url = $instance['st_url'];
		} else {
			$st_url = '';
		}

		$st_background_color = isset( $instance['st_background_color'] ) ? $instance['st_background_color'] : '';  // 背景色
		$st_border_color     = isset( $instance['st_border_color'] ) ? $instance['st_border_color'] : '';  // 枠線
		$st_color            = isset( $instance['st_color'] ) ? $instance['st_color'] : '';  // テキスト色
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'st_class' ); ?>">Webフォント</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'st_class' ); ?>"
				   name="<?php echo $this->get_field_name( 'st_class' ); ?>" type="text"
				   value="<?php echo esc_attr( $st_class ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_title' ); ?>">タイトル</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'st_title' ); ?>"
				   name="<?php echo $this->get_field_name( 'st_title' ); ?>" type="text"
				   value="<?php echo esc_attr( $st_title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_url' ); ?>">URL</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'st_url' ); ?>"
				   name="<?php echo $this->get_field_name( 'st_url' ); ?>" type="text"
				   value="<?php echo esc_attr( $st_url ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_background_color' ); ?>">背景色</label>
			<input id="<?php echo $this->get_field_id( 'st_background_color' ); ?>"
				   name="<?php echo $this->get_field_name( 'st_background_color' ); ?>" type="text"
				   value="<?php echo esc_attr( $st_background_color ); ?>"
				   pattern="^#[0-9A-Za-z]+$" size="7" maxlength="7" style="ime-mode: disabled;" data-wp-color-picker>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_border_color' ); ?>">枠線</label>
			<input id="<?php echo $this->get_field_id( 'st_border_color' ); ?>"
				   name="<?php echo $this->get_field_name( 'st_border_color' ); ?>" type="text"
				   value="<?php echo esc_attr( $st_border_color ); ?>"
				   pattern="^#[0-9A-Za-z]+$" size="7" maxlength="7" style="ime-mode: disabled;" data-wp-color-picker>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_color' ); ?>">テキスト色</label>
			<input id="<?php echo $this->get_field_id( 'st_color' ); ?>"
				   name="<?php echo $this->get_field_name( 'st_color' ); ?>" type="text"
				   value="<?php echo esc_attr( $st_color ); ?>"
				   pattern="^#[0-9A-Za-z]+$" size="7" maxlength="7" style="ime-mode: disabled;" data-wp-color-picker>
		</p>

		<?php
	}

	/**
	 * ウィジェットフォームの値を保存用にサニタイズ
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                        = $old_instance;
		$instance['st_title']            = sanitize_text_field( $new_instance['st_title'] );
		$instance['st_class']            = sanitize_text_field( $new_instance['st_class'] );
		$instance['st_url']              = esc_url_raw( $new_instance['st_url'] );
		$instance['st_background_color'] = sanitize_hex_color( $new_instance['st_background_color'] );
		$instance['st_border_color']     = sanitize_hex_color( $new_instance['st_border_color'] );
		$instance['st_color']            = sanitize_hex_color( $new_instance['st_color'] );

		return $instance;
	}
}

function register_form2_widget() {
    register_widget( 'Form2_Widget' );
}
add_action( 'widgets_init', 'register_form2_widget' );

//サイドメニューウィジェットを登録
class Sidemenu_Widget extends WP_Widget {
     function __construct() {
          parent::__construct(
               'sidemenu_widget',
               __( '01_AFFINGERサイドバーメニュー', 'affinger' ),
               array( 'description' => __( 'サイドメニューを表示します。項目や並び順は「カスタムメニュー」で設定して下さい', 'affinger' ), )
          );
     }
     /**
      * ウィジェットのフロントエンド表示
      */
     public function widget( $args, $instance ) {
        echo $args['before_widget'];
		if ( ! empty( $instance['st_sidemenu_title'] ) ) {
			$formname = $instance['st_sidemenu_title'];
            echo '<p class="st-widgets-title st-side-widgetsmenu"><span>'.$formname.'</span></p>' ;
		}else{
			$formname = '';
		}
		echo '<nav><div id="sidebg">';
			get_template_part( 'st-sidepage-link' );
		echo '</div></nav>';
        echo $args['after_widget'];
     }
     /**
      * バックエンドのウィジェットフォーム
      */
     public function form( $instance ) {
          $st_sidemenu_title = ! empty( $instance['st_sidemenu_title'] ) ? $instance['st_sidemenu_title'] : __( '', 'affinger' );?>
		<label for="<?php echo $this->get_field_id( 'st_sidemenu_title' ); ?>">タイトル</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'st_sidemenu_title' ); ?>" name="<?php echo $this->get_field_name( 'st_sidemenu_title' ); ?>" type="text" value="<?php echo esc_attr( $st_sidemenu_title ); ?>">
		</p>
	<?php }


     public function sidemenu( $instance ) {

     }
     /**
      * ウィジェットフォームの値を保存用にサニタイズ
      */
     public function update( $new_instance, $old_instance ) {
          $instance = array();
          $instance['st_sidemenu_title'] = ( ! empty( $new_instance['st_sidemenu_title'] ) ) ? strip_tags( $new_instance['st_sidemenu_title'] ) : '';
          return $instance;
     }

}

function register_sidemenu_widget() {
    register_widget( 'Sidemenu_Widget' );
}
add_action( 'widgets_init', 'register_sidemenu_widget' );

//NEWSウィジェットを登録
class News_Widget extends WP_Widget {
     function __construct() {
          parent::__construct(
               'news_widget', // Base ID
               __( '03_AFFINGERフリーボックス', 'affinger' ), // Name
               array( 'description' => __( 'トピックス風の自由なボックスです。', 'affinger' ), ) // Args
          );
     }

     /**
      * ウィジェットのフロントエンド表示
      */
     public function widget( $args, $instance ) {
        echo $args['before_widget'];
          if ( ! empty( $instance['st_body'] ) ) {
			if ( ! empty( $instance['st_title'] ) ) {
				$freetitle = '<p class="p-free"><span class="p-entry-f">'.$instance['st_title'].'</span></p>';
			}else{
				$freetitle = '';
			}
			$newsbox = '<div class="freebox">'.$freetitle.'<div class="free-inbox">'.nl2br($instance['st_body']).'</div></div>';
               echo apply_filters( 'widget_st_body', $newsbox );
          }
        echo $args['after_widget'];
     }

     /**
      * バックエンドのウィジェットフォーム
      */
     public function form( $instance ) {
          $st_body = ! empty( $instance['st_body'] ) ? $instance['st_body'] : __( '', 'affinger' );
          $st_title = ! empty( $instance['st_title'] ) ? $instance['st_title'] : __( '', 'affinger' );
          ?>
<p>
		<label for="<?php echo $this->get_field_id( 'st_title' ); ?>">タイトル（※15文字まで）</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'st_title' ); ?>" name="<?php echo $this->get_field_name( 'st_title' ); ?>" type="text" value="<?php echo esc_attr( $st_title ); ?>">
		</p>

                  <p>
           <label for="<?php echo $this->get_field_id('st_body'); ?>">テキストエリア</label>
           <textarea  class="widefat" rows="16" colls="20" id="<?php echo $this->get_field_id('st_body'); ?>" name="<?php echo $this->get_field_name('st_body'); ?>"><?php echo $st_body; ?></textarea>
        </p>
          <?php
     }

     /**
      * ウィジェットフォームの値を保存用にサニタイズ
      */
     public function update( $new_instance, $old_instance ) {
          $instance = array();
          $instance['st_body'] = ( ! empty( $new_instance['st_body'] ) ) ? trim( $new_instance['st_body'] ) : '';
          $instance['st_title'] = ( ! empty( $new_instance['st_title'] ) ) ? strip_tags( $new_instance['st_title'],'<i>' ) : '';
          return $instance;
     }

}

function register_news_widget() {
    register_widget( 'News_Widget' );
}
add_action( 'widgets_init', 'register_news_widget' );

//RSSウィジェットを登録
class Rss_Widget extends WP_Widget {
     function __construct() {
          parent::__construct(
               'rss_widget', // Base ID
               __( '04_AFFINGER_RSSボタン', 'affinger' ), // Name
               array( 'description' => __( 'RSS配信用ボタンです', 'affinger' ), ) // Args
          );
     }

     /**
      * ウィジェットのフロントエンド表示
      */
     public function widget( $args, $instance ) {
        echo $args['before_widget'];
	echo '<div class="rssbox"><a href="';
	echo esc_url( home_url( '/' ) );
	echo '/?feed=rss2"><i class="st-fa st-svg-rss-square"></i>&nbsp;購読する</a></div>';
        echo $args['after_widget'];
     }

     /**
      * バックエンドのウィジェットフォーム
      */
     public function rss( $instance ) {

          ?>

          <?php
     }

     /**
      * ウィジェットフォームの値を保存用にサニタイズ
      */
     public function update( $new_instance, $old_instance ) {
          $instance = array();
          return $instance;
     }

}

function register_rss_widget() {
    register_widget( 'Rss_Widget' );
}
add_action( 'widgets_init', 'register_rss_widget' );

//新着投稿一覧ウィジェットを登録
class Newentry_Widget extends WP_Widget {
     function __construct() {
          parent::__construct(
               'newentry_widget', // Base ID
               __( '05_AFFINGER最新の投稿一覧', 'affinger' ), // Name
               array( 'description' => __( '新着投稿一覧を表示します', 'affinger' ), ) // Args
          );
     }

     /**
      * ウィジェットのフロントエンド表示
      */
     public function widget( $args, $instance ) {
        echo $args['before_widget'];
		if ( ! empty( $instance['st_newentry_title'] ) ) {
			$formname = $instance['st_newentry_title'];
            echo '<p class="st-widgets-title st-side-widgetsmenu"><span>'.$formname.'</span></p>' ;
		}else{
			$formname = '';
		}
		echo '<div class="newentrybox">';
		get_template_part( 'newpost-widgets' );
		echo '</div>';
        echo $args['after_widget'];
     }

     /**
      * バックエンドのウィジェットフォーム
      */
     public function form( $instance ) {
		 $st_newentry_title = ! empty( $instance['st_newentry_title'] ) ? $instance['st_newentry_title'] : __( '', 'affinger' );?>
		<label for="<?php echo $this->get_field_id( 'st_newentry_title' ); ?>">タイトル</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'st_newentry_title' ); ?>" name="<?php echo $this->get_field_name( 'st_newentry_title' ); ?>" type="text" value="<?php echo esc_attr( $st_newentry_title ); ?>">
		</p>
	<?php }

	 public function newentry( $instance ) {

     }
     /**
      * ウィジェットフォームの値を保存用にサニタイズ
      */
     public function update( $new_instance, $old_instance ) {
          $instance = array();
          $instance['st_newentry_title'] = ( ! empty( $new_instance['st_newentry_title'] ) ) ? strip_tags( $new_instance['st_newentry_title'] ) : '';
          return $instance;
     }

}

function register_newentry_widget() {
    register_widget( 'Newentry_Widget' );
}
add_action( 'widgets_init', 'register_newentry_widget' );

//お知らせウィジェットを登録
class Newsst_Widget extends WP_Widget {
     function __construct() {
          parent::__construct(
               'stnews_widget', // Base ID
               __( '07_AFFINGERお知らせエリア', 'affinger' ), // Name
               array( 'description' => __( 'お知らせ一覧を表示します', 'affinger' ), ) // Args
          );
     }

     /**
      * ウィジェットのフロントエンド表示
      */
     public function widget( $args, $instance ) {
        echo $args['before_widget'];
	echo '<div id="newsin">';
			get_template_part( 'news-st-widgets' );
	echo '</div>';
        echo $args['after_widget'];
     }

     /**
      * バックエンドのウィジェットフォーム
      */
     public function stnews( $instance ) {

          ?>

          <?php
     }

     /**
      * ウィジェットフォームの値を保存用にサニタイズ
      */
     public function update( $new_instance, $old_instance ) {
          $instance = array();
          return $instance;
     }

}

function register_stnews_widget() {
    register_widget( 'Newsst_Widget' );
}
add_action( 'widgets_init', 'register_stnews_widget' );

//カスタム投稿一覧ウィジェットを登録
class Custompost_Widget extends WP_Widget {
     function __construct() {
          parent::__construct(
               'custompostentry_widget', // Base ID
               __( '09_AFFINGERカスタム投稿一覧', 'affinger' ), // Name
               array( 'description' => __( 'カスタム投稿一覧を表示します', 'affinger' ), ) // Args
          );
     }

     /**
      * ウィジェットのフロントエンド表示
      */
     public function widget( $args, $instance ) {
        echo $args['before_widget'];
	echo '<div class="newentrybox">';
	get_template_part( 'custompost-itiran' );
	echo '</div>';
        echo $args['after_widget'];
     }

     /**
      * バックエンドのウィジェットフォーム
      */
     public function custompostentry( $instance ) {

          ?>

          <?php
     }

     /**
      * ウィジェットフォームの値を保存用にサニタイズ
      */
     public function update( $new_instance, $old_instance ) {
          $instance = array();
          return $instance;
     }

}

function register_custompostentry_widget() {
    register_widget( 'Custompost_Widget' );
}
add_action( 'widgets_init', 'register_custompostentry_widget' );

// カテゴリーウィジェットを登録
class Catbox_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'catbox_widget', // Base ID
			__( '08_AFFINGERカテゴリー別ボックス', 'affinger' ), // Name
			array( 'description' => __( 'カテゴリー別に表示を分けるボックスです。※コンテンツ内', 'affinger' ), ) // Args
		);
	}

	/**
	 * ウィジェットを表示するページかどうかを取得
	 */
	protected function should_show( $args, $instance ) {
		$st_catid = isset( $instance['st_catid'] ) ? $instance['st_catid'] : '';

		// テキストなしの場合は非表示
		if ( $instance['st_body'] === '' ) {
			return false;
		}

		$queried_object_id     = get_queried_object_id();
		$is_main_query         = is_main_query();
		$is_single             = is_single();
		$is_category           = $is_main_query && is_category();
		$is_home_or_front_page = $is_main_query &&
		                         ( get_the_ID() === $queried_object_id ) && ( is_home() || is_front_page() );

		// 投稿そのものがトップ、フロントページの場合は非表示
		if ( $is_home_or_front_page ) {
			return false;
		}

		// 投稿 (ループ含む) 以外、カテゴリーアーカイブ以外の場合は非表示
		if ( ! $is_single && ! $is_category ) {
			return false;
		}

		if ( st_is_ver_ex() ) {

			$st_catid = $this->normalize_catid( $st_catid );
			$st_catid = ( $st_catid !== '' ) ? $st_catid : '0';
			$cat_ids  = array_reduce(
				explode( ',', $st_catid ),
				function ( $cat_ids, $cat_id ) {
					$cat_id = (int) $cat_id;

					if ( $cat_id >= 0 ) {
						$cat_ids['includes'][] = $cat_id;
					} else {
						$cat_ids['excludes'][] = absint( $cat_id );
					}

					return $cat_ids;
				},
				array( 'includes' => array(), 'excludes' => array() )
			);

			// `st_catid` に `0` がある場合は表示
			if ( in_array( 0, $cat_ids, true ) ) {
				// 除外優先
				if ( ( $is_single && in_category( $cat_ids['excludes'] ) ) ||
					 ( $is_category && in_array( $queried_object_id, $cat_ids['excludes'], true ) ) ) {
					return false;
				}

				return true;
			}

			// 投稿
			if ( $is_single ) {
				// 除外優先
				if ( in_category( $cat_ids['excludes'] ) ) {
					return false;
				}

				// 指定したカテゴリーに属する場合は表示
				if ( in_category( $cat_ids['includes'] ) ) {
					return true;
				}
			}

			// カテゴリーアーカイブ
			if ( $is_category ) {
				// 除外優先
				if ( in_array( $queried_object_id, $cat_ids['excludes'], true ) ) {
					return false;
				}

				// 指定したカテゴリーに含まれる場合は表示
				if ( in_array( $queried_object_id, $cat_ids['includes'], true ) ) {
					return true;
				}
			}

		} else {

			$st_catid = $this->normalize_catid( $st_catid );
			$st_catid = ( $st_catid !== '' ) ? $st_catid : '0';
			$cat_ids  = array_map( 'intval', explode( ',', $st_catid ) );

			if ( in_array( 0, $cat_ids, true ) ) {
				return true;
			}

			if ( $is_single && in_category( $cat_ids ) ) {
				return true;
			}

			if ( $is_category && in_array( $queried_object_id, $cat_ids, true ) ) {
				return true;
			}

		}

		return false;
	}

	/**
	 * ウィジェットのフロントエンド表示
	 */
	public function widget( $args, $instance ) {
		$st_body = isset( $instance['st_body'] ) ? $instance['st_body'] : '';

		if ( ! $this->should_show( $args, $instance ) ) {
			return;
		}

		$content = '<div>' . nl2br( $st_body ) . '</div>';
		$content = apply_filters( 'widget_st_body', $content, $instance, $this->id_base );

		echo $args['before_widget'];
		echo $content;
		echo $args['after_widget'];
	}

	/**
	 * バックエンドのウィジェットフォーム
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'st_catid' => '',
				'st_body'  => '',
			)
		);
		$st_catid = $this->normalize_catid( sanitize_text_field( $instance['st_catid'] ) );
		$st_body  = $instance['st_body'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_catid' ); ?>">表示したいカテゴリーID（複数の場合は半角カンマで区切る）</label>
			<input pattern="^(-?[0-9]+|,)+$" class="widefat" id="<?php echo $this->get_field_id( 'st_catid' ); ?>" name="<?php echo $this->get_field_name( 'st_catid' ); ?>" type="text" value="<?php echo esc_attr( $st_catid ); ?>" style="ime-mode:disabled;">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'st_body' ); ?>">テキストエリア</label>
			<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'st_body' ); ?>" name="<?php echo $this->get_field_name( 'st_body' ); ?>"><?php echo esc_textarea( $st_body ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * カテゴリーIDを正規化
	 *
	 * @param string $cat_id カテゴリーID
	 *
	 * @return string カテゴリーID
	 */
	protected function normalize_catid( $cat_id ) {
		$cat_ids = explode( ',', $cat_id );
		$cat_ids = array_reduce(
			$cat_ids,
			function ( $new_cat_ids, $cat_id ) {
				$cat_id = trim( $cat_id );

				if ( preg_match( '/\A-?[0-9]+\z/', $cat_id ) ) {
					$new_cat_ids[] = (int) $cat_id;
				}

				return $new_cat_ids;
			},
			array()
		);
		$cat_ids = array_unique( $cat_ids );

		return implode( ',', $cat_ids );
	}

	/**
	 * ウィジェットフォームの値を保存用にサニタイズ
	 */
	public function update( $new_instance, $old_instance ) {
		$st_catid = isset( $new_instance['st_catid'] ) ? $new_instance['st_catid'] : '';
		$st_body  = isset( $new_instance['st_body'] ) ? $new_instance['st_body'] : '';

		$st_catid = $this->normalize_catid( sanitize_text_field( $st_catid ) );

		if ( !current_user_can( 'unfiltered_html' ) ) {
			$st_body = wp_kses_post( stripslashes( $st_body ) );
		}

		return array(
			'st_catid' => $st_catid,
			'st_body'  => $st_body,
		);
	}
}

if ( !function_exists( 'register_catbox_widget' ) ) {
	function register_catbox_widget() {
		register_widget( 'Catbox_Widget' );
	}
}
add_action( 'widgets_init', 'register_catbox_widget' );

// 記事ウィジェットを登録
class Singlebox_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'singlebox_widget', // Base ID
			__( '10_AFFINGER記事別ボックス', 'affinger' ), // Name
			array( 'description' => __( '記事別に表示を分けるボックスです。', 'affinger' ), ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 */
	public function widget( $args, $instance ) {
		$st_post_id = isset( $instance['st_post_id'] ) ? $instance['st_post_id'] : '';
		$st_body    = isset( $instance['st_body'] ) ? $instance['st_body'] : '';

		$queried_object_id     = get_queried_object_id();
		$is_home_or_front_page = is_main_query() && ( get_the_ID() === $queried_object_id ) &&
		                         ( is_home() || is_front_page() );

		// テキストなし、単一投稿・固定ページ以外の場合、投稿そのものがトップ、フロントページの場合は非表示
		if ( $instance['st_body'] === '' || $is_home_or_front_page || ( ! is_single() && ! is_page() ) ) {
			return;
		}

		$st_post_id = $this->normalize_post_id( $st_post_id );
		$st_post_id = ( $st_post_id !== '' ) ? $st_post_id : '0';

		$post_ids = array_map( 'intval', explode( ',', $st_post_id ) );

		if ( ! in_array( 0, $post_ids, true ) && ! in_array( $queried_object_id, $post_ids, true ) ) {
			return;
		}

		$content = '<div>' . nl2br( $st_body ) . '</div>';
		$content = apply_filters( 'widget_st_body', $content, $instance, $this->id_base );

		echo $args['before_widget'];
		echo $content;
		echo $args['after_widget'];
	}

	/**
	 * バックエンドのウィジェットフォーム
	 */
	public function form( $instance ) {
		$instance   = wp_parse_args(
			(array) $instance,
			array(
				'st_post_id' => '',
				'st_body'    => '',
			)
		);
		$st_post_id = $this->normalize_post_id( sanitize_text_field( $instance['st_post_id'] ) );
		$st_body    = $instance['st_body'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_post_id' ); ?>">表示したい記事ID（複数の場合は半角カンマで区切る）</label>
			<input pattern="^[0-9,]+$" class="widefat" id="<?php echo $this->get_field_id( 'st_post_id' ); ?>" name="<?php echo $this->get_field_name( 'st_post_id' ); ?>" type="text" value="<?php echo esc_attr( $st_post_id ); ?>" style="ime-mode:disabled;">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'st_body' ); ?>">テキストエリア</label>
			<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id( 'st_body' ); ?>" name="<?php echo $this->get_field_name( 'st_body' ); ?>"><?php echo esc_textarea( $st_body ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * ウィジェットフォームの値を保存用にサニタイズ
	 */
	public function update( $new_instance, $old_instance ) {
		$st_post_id = isset( $new_instance['st_post_id'] ) ? $new_instance['st_post_id'] : '';
		$st_body    = isset( $new_instance['st_body'] ) ? $new_instance['st_body'] : '';

		$st_post_id = $this->normalize_post_id( sanitize_text_field( $st_post_id ) );

		if ( ! current_user_can( 'unfiltered_html' ) ) {
			$st_body = wp_kses_post( stripslashes( $st_body ) );
		}

		return array(
			'st_post_id' => $st_post_id,
			'st_body'    => $st_body,
		);
	}

	/**
	 * 記事IDを正規化
	 *
	 * @param string $post_id 記事ID
	 *
	 * @return string 記事ID
	 */
	protected function normalize_post_id( $post_id ) {
		$post_ids = explode( ',', $post_id );
		$post_ids = array_reduce(
			$post_ids,
			function ( $new_post_ids, $post_id ) {
				$post_id = trim( $post_id );

				if ( preg_match( '/\A[0-9]+\z/', $post_id ) ) {
					$new_post_ids[] = (int) $post_id;
				}

				return $new_post_ids;
			},
			array()
		);
		$post_ids = array_unique( $post_ids );

		return implode( ',', $post_ids );
	}
}

if ( ! function_exists( 'register_singlebox_widget' ) ) {
	function register_singlebox_widget() {
		register_widget( 'Singlebox_Widget' );
	}
}
add_action( 'widgets_init', 'register_singlebox_widget' );

//11_AFFINGERサイト管理者紹介
class AuthorST_Widget extends WP_Widget {
     function __construct() {
          parent::__construct(
               'authorst_widget',
				__( '11_AFFINGERプロフィールカード', 'affinger' ),
               array( 'description' => __( 'サイト管理者紹介を表示します', 'affinger' ), )
          );
     }
     public function widget( $args, $instance ) {
		if ( ! empty( $instance['st_author_title'] ) ) {
			$st_author_w_title = $instance['st_author_title'];
		}else{
			$st_author_w_title = '';
		}

        echo $args['before_widget'];
		echo '<div class="st-author-box st-author-master">';
			if( get_theme_mod( 'st_author_profile' ) ): // 旧プロフィールカードに変更が有効
		 		if($st_author_w_title){ echo '<ul id="st-tab-menu"><li class="active">'.$st_author_w_title.'</li></ul>'; }
		 		get_template_part( 'st-author-master' );
		 	else: // 旧プロフィールカードに変更が無効
				get_template_part( 'st-author-master-profile' );
		 	endif;
		echo '</div>';
        echo $args['after_widget'];
     }

     public function form( $instance ) {
          $st_author_title = ! empty( $instance['st_author_title'] ) ? $instance['st_author_title'] : __( '', 'affinger' );
          ?>
	<p>
		<label for="<?php echo $this->get_field_id( 'st_author_title' ); ?>">タイトル</label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'st_author_title' ); ?>" name="<?php echo $this->get_field_name( 'st_author_title' ); ?>" type="text" value="<?php echo esc_attr( $st_author_title ); ?>">
	</p>
          <?php
     }

     public function update( $new_instance, $old_instance ) {
          $instance = array();
          $instance['st_author_title'] = ( ! empty( $new_instance['st_author_title'] ) ) ? strip_tags( $new_instance['st_author_title'],'<i>' ) : '';
          return $instance;
     }

}

function register_authorst_widget() {
    register_widget( 'AuthorST_Widget' );
}
add_action( 'widgets_init', 'register_authorst_widget' );

if ( $st_is_ex ) { // EX限定
	//サイドメニュー2
	class Sidemenu2_Widget extends WP_Widget {
		 function __construct() {
			  parent::__construct(
				   'sidemenu2_widget',
				   __( '13_AFFINGERサイドバーメニュー2', 'affinger' ),
				   array( 'description' => __( 'サイドメニューを表示します。項目や並び順は「カスタムメニュー」で設定して下さい', 'affinger' ), )
			  );
		 }

		 public function widget( $args, $instance ) {
			echo $args['before_widget'];
			if ( ! empty( $instance['st_sidemenu2_title'] ) ) {
				$formname = $instance['st_sidemenu2_title'];
				echo '<p class="st-widgets-title st-side-widgetsmenu"><span>'.$formname.'</span></p>' ;
			}else{
				$formname = '';
			}
			echo '<nav><div id="sidebg">';
				get_template_part( 'st-sidepage-link2' );
			echo '</div></nav>';
			echo $args['after_widget'];
		 }

		 public function form( $instance ) {
			  $st_sidemenu2_title = ! empty( $instance['st_sidemenu2_title'] ) ? $instance['st_sidemenu2_title'] : __( '', 'affinger' ); ?>
			<label for="<?php echo $this->get_field_id( 'st_sidemenu2_title' ); ?>">タイトル</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'st_sidemenu2_title' ); ?>" name="<?php echo $this->get_field_name( 'st_sidemenu2_title' ); ?>" type="text" value="<?php echo esc_attr( $st_sidemenu2_title ); ?>">
			</p>
		<?php }


		 public function sidemenu2( $instance ) {

		 }

		 public function update( $new_instance, $old_instance ) {
			  $instance = array();
			  $instance['st_sidemenu2_title'] = ( ! empty( $new_instance['st_sidemenu2_title'] ) ) ? strip_tags( $new_instance['st_sidemenu2_title'] ) : '';
			  return $instance;
		 }

	}

	function register_sidemenu2_widget() {
		register_widget( 'Sidemenu2_Widget' );
	}
	add_action( 'widgets_init', 'register_sidemenu2_widget' );

	//サイドメニュー3
	class Sidemenu3_Widget extends WP_Widget {
		 function __construct() {
			  parent::__construct(
				   'sidemenu3_widget',
				   __( '14_AFFINGERサイドバーメニュー3', 'affinger' ),
				   array( 'description' => __( 'サイドメニューを表示します。項目や並び順は「カスタムメニュー」で設定して下さい', 'affinger' ), )
			  );
		 }

		 public function widget( $args, $instance ) {
			echo $args['before_widget'];
			if ( ! empty( $instance['st_sidemenu3_title'] ) ) {
				$formname = $instance['st_sidemenu3_title'];
				echo '<p class="st-widgets-title st-side-widgetsmenu"><span>'.$formname.'</span></p>' ;
			}else{
				$formname = '';
			}
			echo '<nav><div id="sidebg">';
				get_template_part( 'st-sidepage-link3' );
			echo '</div></nav>';
			echo $args['after_widget'];
		 }

		 public function form( $instance ) {
			  $st_sidemenu3_title = ! empty( $instance['st_sidemenu3_title'] ) ? $instance['st_sidemenu3_title'] : __( '', 'affinger' ); ?>
			<label for="<?php echo $this->get_field_id( 'st_sidemenu3_title' ); ?>">タイトル</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'st_sidemenu3_title' ); ?>" name="<?php echo $this->get_field_name( 'st_sidemenu3_title' ); ?>" type="text" value="<?php echo esc_attr( $st_sidemenu3_title ); ?>">
			</p>
		<?php }


		 public function sidemenu3( $instance ) {

		 }

		 public function update( $new_instance, $old_instance ) {
			  $instance = array();
			  $instance['st_sidemenu3_title'] = ( ! empty( $new_instance['st_sidemenu3_title'] ) ) ? strip_tags( $new_instance['st_sidemenu3_title'] ) : '';
			  return $instance;
		 }

	}

	function register_sidemenu3_widget() {
		register_widget( 'Sidemenu3_Widget' );
	}
	add_action( 'widgets_init', 'register_sidemenu3_widget' );

}

if ( $st_is_ex_af ) { // EX・AF限定
	// ランキング
	class Rankgroup_Widget extends WP_Widget {
		public function __construct() {
			parent::__construct(
				'st_ranking_widget',
				__( '15_AFFINGERランキングウィジェット', 'affinger' ),
				array( 'description' => 'サイドバー用のランキングウィジェット' )
			);
		}

		public function widget( $args, $instance ) {
			$wp_widget = $this;

			echo $args['before_widget'];

			call_user_func(
				function () use ( $wp_widget, $args, $instance ) {
					include locate_template( 'st-side-rankwidgets.php' );
				}
			);

			echo $args['after_widget'];
		}

		public function form( $instance ) {
			$tag_post_ids = isset( $instance['tag_post_ids'] ) ? $instance['tag_post_ids'] : '';
			$title        = isset( $instance['title'] ) ? $instance['title'] : '';
			?>

			<p>
				<input class="widefat"
					   id="<?php echo $this->get_field_id( 'tag_post_ids' ); ?>"
					   name="<?php echo $this->get_field_name( 'tag_post_ids' ); ?>"
					   type="text"
					   value="<?php echo esc_attr( $tag_post_ids ); ?>"
					   placeholder="ID (複数は「, (半角カンマ)」で区切る)">
			</p>

			<p>
				<input class="widefat"
					   id="<?php echo $this->get_field_id( 'title' ); ?>"
					   name="<?php echo $this->get_field_name( 'title' ); ?>"
					   type="text"
					   value="<?php echo esc_attr( $title ); ?>"
					   placeholder="タイトル">
			</p>

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$tag_post_ids = $new_instance['tag_post_ids'];
			$tag_post_ids = explode( ',', $tag_post_ids );

			$tag_post_ids = array_filter(
				$tag_post_ids,
				function ( $value ) {
					return ( (int) $value > 0 );
				}
			);

			$tag_post_ids = array_unique( $tag_post_ids );

			$instance['tag_post_ids'] = implode( ',', $tag_post_ids );
			$instance['title']        = sanitize_text_field( $new_instance['title'] );
			// カラーピッカーの値の処理。空の値を含む。
			$instance['text_color'] = isset( $new_instance['text_color'] ) ? strip_tags( $new_instance['text_color'] ) : '';

			return $instance;
		}
	}

	function register_rankgroup_widget() {
		register_widget( 'Rankgroup_Widget' );
	}

	if ( st_is_tag_plugin_enabled() ) {
		add_action( 'widgets_init', 'register_rankgroup_widget' );
	}

	//ここまで

	//ガイドマップメニュー
	abstract class Base_Guidemap_Widget extends WP_Widget {
		protected $defaults = array(
			'st_guidemap_title' => '',
			'bg'                => '',
			'round'             => false,
			'color'             => '',
			'descendants_color' => '',
			'no_underline'      => false,
		);

		protected $template = 'st-sidepage-link-guide';

		function __construct( $id_base, $name, array $widget_options = array(), array $control_options = array() ) {
			parent::__construct( $id_base, $name, $widget_options, $control_options );

			$this->widget_options['classname'] = 'widget_guidemap_widget';
		}

		public function get_default_settings() {
			return $this->defaults;
		}

		public function widget( $args, $instance ) {
			$title        = isset( $instance['st_guidemap_title'] ) ? $instance['st_guidemap_title'] : $this->defaults['st_guidemap_title'];
			$title        = apply_filters( 'widget_title', $title, $instance, $this->id_base );
			$round        = isset( $instance['round'] ) ? (bool) $instance['round'] : $this->defaults['round'];
			$no_underline = isset( $instance['no_underline'] ) ? (bool) $instance['no_underline'] : $this->defaults['no_underline'];

			$class = $round ? ' is-rounded' : '';
			$class .= $no_underline ? ' is-no-underline' : '';
			?>

			<?php echo $args['before_widget']; ?>

			<?php if ( $title !== '' ): ?>
				<p class="st-widgets-title st-side-widgetsmenu"><span><?php echo $title; ?></span></p>
			<?php endif; ?>

			<div id="<?php echo esc_attr( $this->id ); ?>"
				 class="<?php echo esc_attr( $this->widget_options['classname'] ); ?><?php echo esc_attr( $class ); ?>">
				<?php get_template_part( $this->template ); ?>
			</div>

			<?php echo $args['after_widget']; ?>

			<?php
		}

		public function form( $instance ) {
			$title             = isset( $instance['st_guidemap_title'] ) ? sanitize_text_field( $instance['st_guidemap_title'] ) : $this->defaults['st_guidemap_title'];
			$bg                = isset( $instance['bg'] ) ? $instance['bg'] : $this->defaults['bg'];
			$round             = isset( $instance['round'] ) ? (bool) $instance['round'] : $this->defaults['round'];
			$color             = isset( $instance['color'] ) ? $instance['color'] : $this->defaults['color'];
			$descendants_color = isset( $instance['descendants_color'] ) ? $instance['descendants_color'] : $this->defaults['descendants_color'];
			$no_underline      = isset( $instance['no_underline'] ) ? (bool) $instance['no_underline'] : $this->defaults['no_underline'];
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'st_guidemap_title' ); ?>">タイトル</label>
				<input id="<?php echo $this->get_field_id( 'st_guidemap_title' ); ?>" class="widefat"
					   type="text" name="<?php echo $this->get_field_name( 'st_guidemap_title' ); ?>"
					   value="<?php echo esc_attr( $title ); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'bg' ); ?>">背景色（第一階層）</label>
				<input id="<?php echo $this->get_field_id( 'bg' ); ?>"
					   name="<?php echo $this->get_field_name( 'bg' ); ?>" type="text"
					   value="<?php echo esc_attr( $bg ); ?>"
					   pattern="^#[0-9A-Za-z]+$" size="7" maxlength="7" style="ime-mode: disabled;" data-wp-color-picker>
			</p>

			<p>
				<input id="<?php echo $this->get_field_id( 'round' ); ?>" class="checkbox" type="checkbox"
					   name="<?php echo $this->get_field_name( 'round' ); ?>" value="1"
					<?php checked( $round ); ?>>
				<label for="<?php echo $this->get_field_id( 'round' ); ?>">角を丸くする（第一階層）</label>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'color' ); ?>">テキスト色（第一階層）</label>
				<input id="<?php echo $this->get_field_id( 'color' ); ?>"
					   name="<?php echo $this->get_field_name( 'color' ); ?>" type="text"
					   value="<?php echo esc_attr( $color ); ?>"
					   pattern="^#[0-9A-Za-z]+$" size="7" maxlength="7" style="ime-mode: disabled;" data-wp-color-picker>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'descendants_color' ); ?>">テキスト色（第二階層以下）</label>
				<input id="<?php echo $this->get_field_id( 'descendants_color' ); ?>"
					   name="<?php echo $this->get_field_name( 'descendants_color' ); ?>" type="text"
					   value="<?php echo esc_attr( $descendants_color ); ?>"
					   pattern="^#[0-9A-Za-z]+$" size="7" maxlength="7" style="ime-mode: disabled;" data-wp-color-picker>
			</p>

			<p>
				<input id="<?php echo $this->get_field_id( 'no_underline' ); ?>" class="checkbox" type="checkbox"
					   name="<?php echo $this->get_field_name( 'no_underline' ); ?>" value="1"
					<?php checked( $no_underline ); ?>>
				<label for="<?php echo $this->get_field_id( 'no_underline' ); ?>">テキストリンクの下線を消す</label>
			</p>

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance                      = $old_instance;
			$instance['st_guidemap_title'] = isset( $new_instance['st_guidemap_title'] ) ? sanitize_text_field( $new_instance['st_guidemap_title'] ) : $this->defaults['st_guidemap_title'];
			$instance['bg']                = isset( $new_instance['bg'] ) ? $new_instance['bg'] : $this->defaults['bg'];
			$instance['round']             = isset( $new_instance['round'] ) ? (bool) $new_instance['round'] : $this->defaults['round'];
			$instance['color']             = isset( $new_instance['color'] ) ? $new_instance['color'] : $this->defaults['color'];
			$instance['descendants_color'] = isset( $new_instance['descendants_color'] ) ? $new_instance['descendants_color'] : $this->defaults['descendants_color'];
			$instance['no_underline']      = isset( $new_instance['no_underline'] ) ? (bool) $new_instance['no_underline'] : $this->defaults['no_underline'];

			return $instance;
		}
	}

	class Guidemap_Widget extends Base_Guidemap_Widget {
		public function __construct() {
			parent::__construct(
				'guidemap_widget',
				__( '17_AFFINGERガイドマップメニュー', 'affinger' ),
				array( 'description' => __( 'ガイドマップメニューを表示します。※内容はメニューで作成してください', 'affinger' ), )
			);
		}
	}

	class Guidemap_2_Widget extends Base_Guidemap_Widget {
		protected $template = 'st-sidepage-link-guide2';

		public function __construct() {
			parent::__construct(
				'guidemap_2_widget',
				__( '18_AFFINGERガイドマップメニュー2', 'affinger' ),
				array( 'description' => __( 'ガイドマップメニュー2を表示します。※内容はメニューで作成してください', 'affinger' ), )
			);
		}
	}

	if ( ! function_exists( '_st_widget_register_guidemap_widgets' ) ) {
		function _st_widget_register_guidemap_widgets() {
			register_widget( Guidemap_Widget::class );
			register_widget( Guidemap_2_Widget::class );
		}
	}

	add_action( 'widgets_init', '_st_widget_register_guidemap_widgets' );

	if ( ! function_exists( '_st_widget_print_guidemap_styles' ) ) {
		/** ガイドマップウィジェットメニューの CSS を出力 */
		function _st_widget_print_guidemap_styles() {
			global $wp_registered_widgets;

			foreach ( $wp_registered_widgets as $registered_widget ) {
				if ( count( $registered_widget['callback'] ) === 0 || count( $registered_widget['params'] ) === 0 ) {
					continue;
				}

				$widget = $registered_widget['callback'][0];

				if ( ! $widget instanceof Base_Guidemap_Widget ) {
					continue;
				}

				$params   = $registered_widget['params'][0];
				$settings = $widget->get_settings();

				if ( ! isset( $settings[ $params['number'] ] ) || ! is_array( $settings[ $params['number'] ] ) ) {
					continue;
				}

				$settings = array_merge( $widget->get_default_settings(), $settings[ $params['number'] ] );

				$id                = $registered_widget['id'];
				$bg                = trim( $settings['bg'] );
				$color             = trim( $settings['color'] );
				$descendants_color = trim( $settings['descendants_color'] );
				?>

				<?php if ( $bg !== '' || $color !== '' ): ?>
					#side #<?php echo $id; ?> .st-link-guide-menu > .menu-item > a,
					#<?php echo $id; ?> .st-link-guide-menu > .menu-item > a {
					<?php if ( $bg !== '' ): ?>
						background-color: <?php echo $bg; ?>;
					<?php endif; ?>

					<?php if ( $color !== '' ): ?>
						color: <?php echo $color; ?>;
					<?php endif; ?>
					}

					<?php if ( $bg !== '' ): ?>
						#side #<?php echo $id; ?> .st-link-guide-menu > .menu-item > a::after,
						#<?php echo $id; ?> .st-link-guide-menu > .menu-item > a::after {
						border-top-color: <?php echo $bg; ?>
						}
					<?php endif; ?>
				<?php endif; ?>

				<?php if ( $descendants_color !== '' ): ?>
					#side #<?php echo $id; ?> .menu-item .menu-item a,
					#<?php echo $id; ?> .menu-item .menu-item a {
					color: <?php echo $descendants_color; ?>;
					}
				<?php endif; ?>

				<?php
			}
		}
	}
	// ここまで
}

if ( ! function_exists( 'st_widget_is_active_sidebar' ) ) {
	/**
	 * サイドバーが有効化どうかを取得 (出力が空になるサイドバーの調整用)
	 *
	 * @param bool $is_active_sidebar 有効かどうか
	 * @param int|string $index サイドバーのインデックス
	 *
	 * @return bool 有効かどうか
	 */
	function st_widget_is_active_sidebar( $is_active_sidebar, $index ) {
		global $wp_registered_sidebars, $wp_registered_widgets, $sidebars_widgets;

		if ( empty( $wp_registered_sidebars[ $index ] ) || empty( $sidebars_widgets[ $index ] ) || ! is_array( $sidebars_widgets[ $index ] ) ) {
			return $is_active_sidebar;
		}

		$sidebar = $wp_registered_sidebars[ $index ];

		ob_start();

		foreach ( (array) $sidebars_widgets[ $index ] as $id ) {
			if ( ! isset( $wp_registered_widgets[ $id ] ) ) {
				continue;
			}

			$params = array_merge(
				array(
					array_merge(
						$sidebar,
						array( 'widget_id' => $id, 'widget_name' => $wp_registered_widgets[ $id ]['name'] )
					),
				),
				(array) $wp_registered_widgets[ $id ]['params']
			);

			$classname_ = '';

			foreach ( (array) $wp_registered_widgets[ $id ]['classname'] as $cn ) {
				if ( is_string( $cn ) ) {
					$classname_ .= '_' . $cn;
				} elseif ( is_object( $cn ) ) {
					$classname_ .= '_' . get_class( $cn );
				}
			}

			$classname_                 = ltrim( $classname_, '_' );
			$params[0]['before_widget'] = sprintf( $params[0]['before_widget'], $id, $classname_ );
			$params                     = apply_filters( 'dynamic_sidebar_params', $params );
			$callback                   = $wp_registered_widgets[ $id ]['callback'];

			if ( is_callable( $callback ) ) {
				call_user_func_array( $callback, $params );
			}
		}

		$content = trim( ob_get_clean() );

		return ( $content !== '' );
	}
}
//一時的にコメントアウトで様子見
//add_filter( 'is_active_sidebar', 'st_widget_is_active_sidebar', 10, 2 );

add_filter( 'widget_st_body', 'do_shortcode' );

if ( ! function_exists( 'st_admin_widgets_enqueue_script' ) ) {
	/**
	 * スクリプト/スタイルを登録
	 */
	function st_admin_widgets_enqueue_script( $hook_suffix ) {
		if ( $hook_suffix !== 'widgets.php' ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
	}
}

add_action( 'admin_enqueue_scripts', 'st_admin_widgets_enqueue_script' );

// カテゴリーウィジェット
class St_Walker_Category extends Walker_Category {
	public function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		/** This filter is documented in wp-includes/category-template.php */
		$cat_name = apply_filters(
			'list_cats',
			esc_attr( $category->name ),
			$category
		);

		if ( ! $cat_name ) {
			return;
		}

		$is_feed = ( ! empty( $args['feed_image'] ) || ! empty( $args['feed'] ) );
		$link    = '<a href="' . esc_url( get_term_link( $category ) ) . '" ';

		/** @see Walker_Category::start_el() 'use_desc_for_title' オプションは無視する (title は出力しない) */

		$link .= '>';

		// サムネイル
		if ( st_is_ver_ex() ) {
			if ( ! $is_feed && $args['style'] === 'list' && $category->taxonomy === 'category' ) {
				if ( ( $depth === 0 && $args['st_show_thumb_on_root'] ) || ( $depth > 0 && $args['st_show_thumb_on_descendants'] ) ) {
					if ( st_has_cat_link_thumbnail( $category->term_id ) ) {
						$link .= st_get_the_cat_link_thumbnail( $category->term_id, 'st_thumb150' );
					} elseif ( ! st_is_term_thumbnail_hidden( $category->term_id ) && st_has_term_thumbnail( $category->term_id ) ) {
						$link .= st_get_the_term_thumbnail( $category->term_id, 'st_thumb150' );
					} else {
						$link .= '<img src="' . get_template_directory_uri() . '/images/no-img.png" alt="no image" title="no image" width="100" height="100">';
					}
				}
			}
		} else {
			if ( ! $is_feed && $args['style'] === 'list' && $category->taxonomy === 'category' ) {
				if ( ( $depth === 0 && $args['st_show_thumb_on_root'] ) || ( $depth > 0 && $args['st_show_thumb_on_descendants'] ) ) {
					if ( st_has_term_thumbnail( $category->term_id ) ) {
						$link .= st_get_the_term_thumbnail( $category->term_id, 'st_thumb150' );
					} else {
						$link .= '<img src="' . get_template_directory_uri() . '/images/no-img.png" alt="no image" title="no image" width="100" height="100">';
					}
				}
			}
		}

		$link .= '<span class="cat-item-label">';
		$link .= $cat_name;

		if ( ! empty( $args['show_count'] ) ) {
			$link .= ' (' . number_format_i18n( $category->count ) . ')';
		}

		$link .= '</span>';
		$link .= '</a>';

		if ( $is_feed ) {
			$link .= ' ';

			if ( empty( $args['feed_image'] ) ) {
				$link .= '(';
			}

			$link .= '<a href="' .
			         esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $args['feed_type'] ) ) .
			         '"';

			if ( empty( $args['feed'] ) ) {
				$alt = ' alt="' . sprintf( __( 'Feed for all posts filed under %s', 'affinger' ), $cat_name ) . '"';
			} else {
				$alt  = ' alt="' . $args['feed'] . '"';
				$name = $args['feed'];
				$link .= empty( $args['title'] ) ? '' : $args['title'];
			}

			$link .= '>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= $name;
			} else {
				$link .= '<img src="' . $args['feed_image'] . '"' . $alt . ' />';
			}

			$link .= '</a>';

			if ( empty( $args['feed_image'] ) ) {
				$link .= ')';
			}
		}

		if ( $args['style'] === 'list' ) {
			$output .= "\t" . '<li';

			$css_classes = array(
				'cat-item',
				'cat-item-' . $category->term_id,
			);

			// サムネイルクラス
			if ( $category->taxonomy === 'category' ) {
				if ( ( $depth === 0 && $args['st_show_thumb_on_root'] ) || ( $depth > 0 && $args['st_show_thumb_on_descendants'] ) ) {
					$css_classes[] = 'has-thumbnail';

					if ( $args['st_round_thumb'] ) {
						$css_classes[] = 'kadomaru';
					}
				}
			}

			if ( ! empty( $args['current_category'] ) ) {
				// 'current_category' can be an array, so we use `get_terms()`.
				$_current_terms = get_terms( $category->taxonomy,
					array(
						'include'    => $args['current_category'],
						'hide_empty' => false,
					) );

				foreach ( $_current_terms as $_current_term ) {
					if ( (int) $category->term_id === (int) $_current_term->term_id ) {
						$css_classes[] = 'current-cat';
					} elseif ( (int) $category->term_id === (int) $_current_term->parent ) {
						$css_classes[] = 'current-cat-parent';
					}

					while ( $_current_term->parent ) {
						if ( (int) $category->term_id === (int) $_current_term->parent ) {
							$css_classes[] = 'current-cat-ancestor';

							break;
						}

						$_current_term = get_term( $_current_term->parent, $category->taxonomy );
					}
				}
			}

			$css_classes = implode(
				' ',
				apply_filters( 'category_css_class', $css_classes, $category, $depth, $args )
			);

			$output .= ' class="' . $css_classes . '"';
			$output .= '>' . $link . "\n";
		} elseif ( isset( $args['separator'] ) ) {
			$output .= "\t" . $link . $args['separator'] . "\n";
		} else {
			$output .= "\t" . $link . '<br>' . "\n";
		}
	}
}

if ( ! function_exists( '_st_widget_categories_args' ) ) {
	function _st_widget_categories_args( $cat_args, $instance ) {
		$cat_args['walker']                       = new St_Walker_Category();
		$cat_args['st_show_thumb_on_root']        = false;
		$cat_args['st_show_thumb_on_descendants'] = false;
		$cat_args['st_round_thumb']               = false;

		// カテゴリーウィジェット (WP 標準) は、
		// サブカラム (#side) のサイドバー（中部）のみに簡易デザインの設定を反映する。
		foreach ( _st_widget_get_side_sidebar_ids() as $sidebar_id ) {
			if ( _st_widget_sidebar_state( $sidebar_id ) ) {
				$cat_args['st_show_thumb_on_root']        = ( get_option( 'st-data334', '' ) === 'yes' );
				$cat_args['st_show_thumb_on_descendants'] = ( get_option( 'st-data335', 'yes' ) === 'yes' );
				$cat_args['st_round_thumb']               = ( get_option( 'st-data336', '' ) === 'yes' );

				break;
			}
		}

		return $cat_args;
	}
}

add_filter( 'widget_categories_args', '_st_widget_categories_args', 10, 2 );

if ( $st_is_ex ) { // EX限定
	class St_Categories_Widget extends WP_Widget {
		private $defaults = array();

		public function __construct() {
			parent::__construct(
				'st_categories_widget',
				__( '16_AFFINGERカテゴリー', 'affinger' ),
				array( 'description' => __( 'カテゴリーのリストやドロップダウンを表示します。', 'affinger' ), )
			);

			$this->defaults = [
				'title'                     => '',
				'count'                     => false,
				'hierarchical'              => false,
				'dropdown'                  => false,
				'show_thumb_on_root'        => false,
				'show_thumb_on_descendants' => false,
				'round_thumb'               => false,
			];
		}

		public function widget( $args, $instance ) {
			$title                     = isset( $instance['title'] ) ? $instance['title'] : $this->defaults['title'];
			$title                     = apply_filters( 'widget_title', $title, $instance, $this->id_base );
			$count                     = isset( $instance['count'] ) ? (bool) $instance['count'] : $this->defaults['count'];
			$hierarchical              = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : $this->defaults['hierarchical'];
			$dropdown                  = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : $this->defaults['dropdown'];
			$show_thumb_on_root        = isset( $instance['show_thumb_on_root'] ) ? (bool) $instance['show_thumb_on_root'] : $this->defaults['show_thumb_on_root'];
			$show_thumb_on_descendants = isset( $instance['show_thumb_on_descendants'] ) ? (bool) $instance['show_thumb_on_descendants'] : $this->defaults['show_thumb_on_descendants'];
			$round_thumb               = isset( $instance['round_thumb'] ) ? (bool) $instance['round_thumb'] : $this->defaults['round_thumb'];

			$cat_args = array(
				'orderby'                      => 'name',
				'show_count'                   => $count,
				'hierarchical'                 => $hierarchical,
			);
			?>

			<?php if ($dropdown ): ?>

				<?php
				$dropdown_id                  = $this->id_base . '-dropdown-' . $this->number;
				$cat_args['show_option_none'] = __( 'Select Category', 'affinger' );
				$cat_args['id']               = $dropdown_id;
				?>

				<?php echo $args['before_widget']; ?>
				<?php if ( $title !== '' ) : ?>
					<?php echo $args['before_title'] . $title . $args['after_title']; ?>
				<?php endif; ?>

				<form action="<?php echo esc_url( home_url() ); ?>" method="get">
					<label class="screen-reader-text" for="<?php echo esc_attr( $dropdown_id ); ?>">
						<?php echo $title; ?>
					</label>

					<?php wp_dropdown_categories(
						apply_filters( 'widget_st_categories_dropdown_args', $cat_args, $instance )
					); ?>
				</form>

				<?php echo $args['after_widget']; ?>

				<script>
					;(function (document) {
						'use strict';

						var dropdown = document.getElementById('<?php echo esc_js( $dropdown_id ); ?>');

						function onCatChange() {
							if (dropdown.options[dropdown.selectedIndex].value > 0) {
								dropdown.parentNode.submit();
							}
						}

						dropdown.onchange = onCatChange;
					})(document);
				</script>

			<?php else: ?>

				<?php
				$cat_args['title_li']                     = '';
				$cat_args['walker']                       = new St_Walker_Category();
				$cat_args['st_show_thumb_on_root']        = $show_thumb_on_root;
				$cat_args['st_show_thumb_on_descendants'] = $show_thumb_on_descendants;
				$cat_args['st_round_thumb']               = $round_thumb;
				?>

				<?php echo $args['before_widget']; ?>

				<div class="<?php echo esc_attr( $this->widget_options['classname'] ); ?>">
					<?php if ( $title !== '' ) : ?>
						<?php echo $args['before_title'] . $title . $args['after_title']; ?>
					<?php endif; ?>
					<ul>
						<?php wp_list_categories( apply_filters( 'widget_st_categories_args', $cat_args, $instance ) ); ?>
					</ul>
				</div>

				<?php echo $args['after_widget']; ?>

			<?php endif; ?>

			<?php
		}

		public function form( $instance ) {
			$title                     = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : $this->defaults['title'];
			$count                     = isset( $instance['count'] ) ? (bool) $instance['count'] : $this->defaults['count'];
			$hierarchical              = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : $this->defaults['hierarchical'];
			$dropdown                  = isset( $instance['dropdown'] ) ? (bool) $instance['dropdown'] : $this->defaults['dropdown'];
			$show_thumb_on_root        = isset( $instance['show_thumb_on_root'] ) ? (bool) $instance['show_thumb_on_root'] : $this->defaults['show_thumb_on_root'];
			$show_thumb_on_descendants = isset( $instance['show_thumb_on_descendants'] ) ? (bool) $instance['show_thumb_on_descendants'] : $this->defaults['show_thumb_on_descendants'];
			$round_thumb               = isset( $instance['round_thumb'] ) ? (bool) $instance['round_thumb'] : $this->defaults['round_thumb'];
			?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="widefat" type="text"
					   name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>">
			</p>

			<p>
				<input id="<?php echo $this->get_field_id( 'dropdown' ); ?>" class="checkbox" type="checkbox"
					   name="<?php echo $this->get_field_name( 'dropdown' ); ?>" value="1"<?php checked( $dropdown ); ?>>
				<label
					for="<?php echo $this->get_field_id( 'dropdown' ); ?>"><?php _e( 'Display as dropdown' ); ?></label><br>

				<input id="<?php echo $this->get_field_id( 'count' ); ?>" class="checkbox" type="checkbox"
					   name="<?php echo $this->get_field_name( 'count' ); ?>" value="1"<?php checked( $count ); ?>>
				<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Show post counts' ); ?></label><br>

				<input id="<?php echo $this->get_field_id( 'hierarchical' ); ?>" class="checkbox" type="checkbox"
					   name="<?php echo $this->get_field_name( 'hierarchical' ); ?>" value="1"<?php checked( $hierarchical ); ?>>
				<label
					for="<?php echo $this->get_field_id( 'hierarchical' ); ?>"><?php _e( 'Show hierarchy' ); ?></label><br>

				<input id="<?php echo $this->get_field_id( 'show_thumb_on_root' ); ?>" class="checkbox" type="checkbox"
					   name="<?php echo $this->get_field_name( 'show_thumb_on_root' ); ?>" value="1"
					<?php checked( ! $dropdown && $show_thumb_on_root ); ?>
					<?php disabled( $dropdown ); ?>>
				<label for="<?php echo $this->get_field_id( 'show_thumb_on_root' ); ?>">親カテゴリーにサムネイル画像を表示</label><br>

				<input id="<?php echo $this->get_field_id( 'show_thumb_on_descendants' ); ?>" class="checkbox"
					   type="checkbox"
					   name="<?php echo $this->get_field_name( 'show_thumb_on_descendants' ); ?>" value="1"
					<?php checked( ! $dropdown && $hierarchical && $show_thumb_on_descendants ); ?>
					<?php disabled( $dropdown || ! $hierarchical ); ?>>
				<label
					for="<?php echo $this->get_field_id( 'show_thumb_on_descendants' ); ?>">子カテゴリーにサムネイル画像を表示</label><br>

				<input id="<?php echo $this->get_field_id( 'round_thumb' ); ?>" class="checkbox" type="checkbox"
					   name="<?php echo $this->get_field_name( 'round_thumb' ); ?>" value="1"
					<?php checked( ! $dropdown && ( $show_thumb_on_root || $show_thumb_on_descendants ) && $round_thumb ); ?>
					<?php disabled( $dropdown || ( ! $show_thumb_on_root && ! $show_thumb_on_descendants ) ); ?>
					   style="margin-left: 1.75em;">
				<label for="<?php echo $this->get_field_id( 'round_thumb' ); ?>">サムネイル画像を丸くする</label>
			</p>

			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance                              = $old_instance;
			$instance['title']                     = isset( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : $this->defaults['title'];
			$instance['count']                     = isset( $new_instance['count'] ) ? (bool) $new_instance['count'] : $this->defaults['count'];
			$instance['hierarchical']              = isset( $new_instance['hierarchical'] ) ? (bool) $new_instance['hierarchical'] : $this->defaults['hierarchical'];
			$instance['dropdown']                  = isset( $new_instance['dropdown'] ) ? (bool) $new_instance['dropdown'] : $this->defaults['dropdown'];
			$instance['show_thumb_on_root']        = isset( $new_instance['show_thumb_on_root'] ) ? (bool) $new_instance['show_thumb_on_root'] : $this->defaults['show_thumb_on_root'];
			$instance['show_thumb_on_descendants'] = isset( $new_instance['show_thumb_on_descendants'] ) ? (bool) $new_instance['show_thumb_on_descendants'] : $this->defaults['show_thumb_on_descendants'];
			$instance['round_thumb']               = isset( $new_instance['round_thumb'] ) ? (bool) $new_instance['round_thumb'] : $this->defaults['round_thumb'];

			return $instance;
		}
	}

	if ( ! function_exists( '_st_widget_register_st_categories' ) ) {
		function _st_widget_register_st_categories() {
			register_widget( St_Categories_Widget::class );
		}
	}

	add_action( 'widgets_init', '_st_widget_register_st_categories' );
}

// 20_AFFINGERインフォメーション
class St_Info_Mation_Widget extends WP_Widget {
	private $defaults         = array();

	private $registered       = false;

	public function __construct() {
		parent::__construct(
			'st_info_mation_widget',
			__( '20_AFFINGERインフォメーション', 'affinger' ),
			array( 'description' => __( 'インフォメーション用のウィジェットです。', 'affinger' ), ),
			array( 'width' => 400, 'height' => 350, )
		);

		$this->defaults = [
			'title'   => '',
			'content' => '',
			'url'   => '',
			'target'   => '',
			'nofollow'   => '',
			'bold'    => false, // 太字オプションのデフォルト値
			'text_color' => '', // カラーピッカーのデフォルト値を追加
			'animation_style' => 'none', // アニメーションスタイル
			'animation_duration' => '', // アニメーション速度
		];

	}

	static public function render_control_template_scripts() {
		?>
		<script type="text/html" id="tmpl-widget-custom-html-ad-control-fields">
			<# var elementIdPrefix = 'el' + String( Math.random() ).replace( /\D/g, '' ) + '_' #>
			<p>
				<label for="{{ elementIdPrefix }}title"><?php esc_html_e( 'Title:' ); ?></label>
				<input id="{{ elementIdPrefix }}title" type="text" class="widefat title">
			</p>

			<p>
				<label for="{{ elementIdPrefix }}content"
					   id="{{ elementIdPrefix }}content-label"><?php esc_html_e( 'Content:' ); ?></label>
				<textarea id="{{ elementIdPrefix }}content" class="widefat code content" rows="16" cols="20"></textarea>
			</p>

			<?php if ( ! current_user_can( 'unfiltered_html' ) ) : ?>
				<?php
				$probably_unsafe_html = array( 'script', 'iframe', 'form', 'input', 'style' );
				$allowed_html         = wp_kses_allowed_html( 'post' );
				$disallowed_html      = array_diff( $probably_unsafe_html, array_keys( $allowed_html ) );
				?>
				<?php if ( ! empty( $disallowed_html ) ) : ?>
					<# if ( data.codeEditorDisabled ) { #>
					<p>
						<?php _e( 'Some HTML tags are not permitted, including:' ); ?>
						<code><?php echo join( '</code>, <code>', $disallowed_html ); ?></code>
					</p>
					<# } #>
				<?php endif; ?>
			<?php endif; ?>

			<div class="code-editor-error-container"></div>
		</script>
		<?php
	}

	static public function add_help_text() {
		$screen = get_current_screen();

		$content = '<p>';
		$content .= __( 'Use the Custom HTML widget to add arbitrary HTML code to your widget areas.', 'affinger' );
		$content .= '</p>';

		if ( wp_get_current_user()->syntax_highlighting !== 'false' ) {
			$content .= '<p>';
			$content .= sprintf(
				__( 'The edit field automatically highlights code syntax. You can disable this in your <a href="%1$s" %2$s>user profile%3$s</a> to work in plain text mode.', 'affinger' ),
				esc_url( get_edit_profile_url() ),
				'class="external-link" target="_blank"',
				sprintf( '<span class="screen-reader-text"> %s</span>',
					/* translators: accessibility text */
					__( '(opens in a new window)', 'affinger' )
				)
			);
			$content .= '</p>';

			$content .= '<p id="editor-keyboard-trap-help-1">' . __( 'When using a keyboard to navigate:', 'affinger' ) . '</p>';
			$content .= '<ul>';
			$content .= '<li id="editor-keyboard-trap-help-2">' . __( 'In the editing area, the Tab key enters a tab character.', 'affinger' ) . '</li>';
			$content .= '<li id="editor-keyboard-trap-help-3">' . __( 'To move away from this area, press the Esc key followed by the Tab key.', 'affinger' ) . '</li>';
			$content .= '<li id="editor-keyboard-trap-help-4">' . __( 'Screen reader users: when in forms mode, you may need to press the Esc key twice.', 'affinger' ) . '</li>';
			$content .= '</ul>';
		}

		$screen->add_help_tab( array(
			'id'      => 'custom_html_widget',
			'title'   => __( 'Custom HTML Widget', 'affinger' ),
			'content' => $content,
		) );
	}

	public function _register_one( $number = - 1 ) {
		parent::_register_one( $number );

		if ( $this->registered ) {
			return;
		}

		$this->registered = true;

		wp_add_inline_script(
			'custom-html-widgets',
			sprintf( 'wp.customHtmlWidgets.idBases.push( %s );', wp_json_encode( $this->id_base ) )
		);

		add_action( 'admin_print_scripts-widgets.php', array( $this, 'enqueue_admin_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( static::class, 'render_control_template_scripts' ) );
		add_action( 'admin_head-widgets.php', array( static::class, 'add_help_text' ) );
	}

	public function _filter_gallery_shortcode_attrs( $attrs ) {
		if ( ! is_singular() && empty( $attrs['id'] ) && empty( $attrs['include'] ) ) {
			$attrs['id'] = - 1;
		}

		return $attrs;
	}

	public function widget( $args, $instance ) {
		global $post;

		$original_post = $post;

		if ( is_singular() ) {
			$post = get_queried_object();
		} else {
			$post = null;
		}

		add_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

		$title = isset( $instance['title'] ) ? $instance['title'] : $this->defaults['title'];
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$content = isset( $instance['content'] ) ? $instance['content'] : $this->defaults['content'];
		$st_url  = isset( $instance['st_url'] ) ? $instance['st_url'] : '';  // URL
		$target  = isset( $instance['target'] ) ? $instance['target'] : '';  // target
		$nofollow  = isset( $instance['nofollow'] ) ? $instance['nofollow'] : '';  // nofollow
		$animation_duration  = isset( $instance['animation_duration'] ) ? $instance['animation_duration'] : '';  // animationduration

		$simulated_text_widget_instance = array_merge(
			$instance,
			array(
				'text'   => $content,
				'filter' => false,
				'visual' => false,
			)
		);

		unset( $simulated_text_widget_instance['content'] );

		$content = apply_filters( 'widget_text', $content, $simulated_text_widget_instance, $this );
		$content = apply_filters( 'widget_custom_html_content', $content, $instance, $this );
		// 余分な <p><br> を削除
		$content = (string) $content;
        $content = preg_replace( '!<p>!', '', $content );
        $content = preg_replace( '!</p>!', '', $content );
        $content = shortcode_unautop( $content );
        $content = preg_replace( '!<br\s*/?>!', '', $content );

		$post = $original_post;

		remove_filter( 'shortcode_atts_gallery', array( $this, '_filter_gallery_shortcode_attrs' ) );

		$args['before_widget'] = preg_replace( '/(?<=\sclass=["\'])/', 'widget_text ', $args['before_widget'] );
		$bold = !empty($instance['bold']);
		$st_color            = isset( $instance['st_color'] ) ? $instance['st_color'] : '';  // テキスト色
		$animation_duration  = isset( $instance['animation_duration'] ) ? $instance['animation_duration'] : '';  // 速度
		// widget メソッドで選択されたアニメーションスタイルに基づいてクラスを追加
		$animation_class = '';
		switch ($instance['animation_style']) {
			case 'flash':
				$animation_class = 'st-flash';
				break;
			case 'marquee':
				$animation_class = 'st-marquee';
				break;
			case 'none':
			default:
				$animation_class = 'st-infocenter';
				break;
		}

		// カラーパレット
		$color = '';
		if($st_color){
			$color = ' color: ' .  esc_attr($st_color) . ';';
		}

		// animation-duration
		$speed_flash = '';
		$speed_marquee = '';
		if( $animation_duration ){
			if( isset($animation_class) && $animation_class === 'st-flash' ) {
				$speed_flash = ' animation-duration: ' . $animation_duration. 's;';
			} elseif( isset($animation_class) && $animation_class === 'st-marquee' ) {
				$speed_marquee = ' animation-duration: ' . $animation_duration. 's;';
			}
		}

		$style_flash = '';
		if( $speed_flash ){
			$style_flash = 'style="' . $speed_flash . '"';
		}

		$style = '';
		if( $st_color || $speed_marquee ){
			$style = 'style="' . $color . $speed_marquee . '"';
		}

		// target
		$target_link = '';
		if($target){
			$target_link = ' target="_blank"';
		}

		// nofollow
		$nofollow_link = '';
		if($nofollow && $target){
			$nofollow_link = ' rel="nofollow noopener"';
		} elseif(!$nofollow && $target){
			$nofollow_link = ' rel="noopener"';
		} elseif($nofollow && !$target){
			$nofollow_link = ' rel="nofollow"';
		}

		// リンク
		$st_url_link = '';
		if($st_url){
			$st_url_link = '<a href="' . esc_url( $st_url ) . '"' . $style . $target_link . $nofollow_link . '>';
		}
		?>

		<?php echo $args['before_widget']; ?>
			<div id="st-infomation-widget" class="<?php echo $animation_class; ?>" <?php echo $style_flash; ?>>
				<p<?php if ($bold) echo ' class="huto"'; ?> <?php echo $style; ?>>
					<?php echo $st_url_link; ?>
						<?php echo $content; ?>
					<?php if ($st_url_link) echo '</a>'; ?>
				</p>
			</div>
		<?php echo $args['after_widget']; ?>

		<?php
	}

	public function form( $instance ) {
		$title      = isset( $instance['title'] ) ? sanitize_text_field( $instance['title'] ) : $this->defaults['title'];
		$content    = isset( $instance['content'] ) ? $instance['content'] : $this->defaults['content'];
		$bold = isset($instance['bold']) ? (bool) $instance['bold'] : $this->defaults['bold'];
		$st_color            = isset( $instance['st_color'] ) ? $instance['st_color'] : '';  // テキスト色
		$animation_style = isset($instance['animation_style']) ? $instance['animation_style'] : 'none';
		$st_url            = isset( $instance['st_url'] ) ? $instance['st_url'] : '';  // URL
		$target  = isset( $instance['target'] ) ? $instance['target'] : '';  // target
		$nofollow  = isset( $instance['nofollow'] ) ? $instance['nofollow'] : '';  // nofollow
		$animation_duration  = isset( $instance['animation_duration'] ) ? $instance['animation_duration'] : '';  // 速度

		// カラーピッカーの入力フィールドのIDを動的に生成
		$color_picker_id = $this->get_field_id( 'text_color' ) . '_' . uniqid();
		?>

		<input id="<?php echo $this->get_field_id( 'title' ); ?>" class="title sync-input" type="hidden"
			   name="<?php echo $this->get_field_name( 'title' ); ?>"
			   value="<?php echo esc_attr( $title ); ?>">

		<textarea id="<?php echo $this->get_field_id( 'content' ); ?>" class="content sync-input"
				  name="<?php echo $this->get_field_name( 'content' ); ?>"
				  hidden><?php echo esc_textarea( $content ); ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_url' ); ?>">URL</label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'st_url' ); ?>"
				   name="<?php echo $this->get_field_name( 'st_url' ); ?>" type="text"
				   value="<?php echo esc_attr( $st_url ); ?>">
		</p>	
		<p>
			<input id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" type="checkbox" <?php checked($target); ?> />
			<label for="<?php echo $this->get_field_id('target'); ?>"><?php _e('別窓で開く'); ?></label>
			<input id="<?php echo $this->get_field_id('nofollow'); ?>" name="<?php echo $this->get_field_name('nofollow'); ?>" type="checkbox" <?php checked($nofollow); ?> />
			<label for="<?php echo $this->get_field_id('nofollow'); ?>"><?php _e('nofollow'); ?></label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'st_color' ); ?>">テキスト色</label>
			<input id="<?php echo $this->get_field_id( 'st_color' ); ?>"
				   name="<?php echo $this->get_field_name( 'st_color' ); ?>" type="text"
				   value="<?php echo esc_attr( $st_color ); ?>"
				   pattern="^#[0-9A-Za-z]+$" size="7" maxlength="7" style="ime-mode: disabled;" data-wp-color-picker>
		</p>
		<p>
			<input id="<?php echo $this->get_field_id('bold'); ?>" name="<?php echo $this->get_field_name('bold'); ?>" type="checkbox" <?php checked($bold); ?> />
			<label for="<?php echo $this->get_field_id('bold'); ?>"><?php _e('太字にする'); ?></label>
		</p>
		<p>
			<label>アニメーションスタイル:</label><br>
			<input type="radio" id="<?php echo $this->get_field_id('animation_style_none'); ?>" name="<?php echo $this->get_field_name('animation_style'); ?>" value="none" <?php checked($animation_style, 'none'); ?> /> <label for="<?php echo $this->get_field_id('animation_style_none'); ?>">なし</label> 
			<input type="radio" id="<?php echo $this->get_field_id('animation_style_flash'); ?>" name="<?php echo $this->get_field_name('animation_style'); ?>" value="flash" <?php checked($animation_style, 'flash'); ?> /> <label for="<?php echo $this->get_field_id('animation_style_flash'); ?>">点滅</label> 
			<input type="radio" id="<?php echo $this->get_field_id('animation_style_marquee'); ?>" name="<?php echo $this->get_field_name('animation_style'); ?>" value="marquee" <?php checked($animation_style, 'marquee'); ?> /> <label for="<?php echo $this->get_field_id('animation_style_marquee'); ?>">流れる</label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('animation_duration'); ?>"><?php _e('アニメーションの速度（animation-duration）'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('animation_duration'); ?>"
				   name="<?php echo $this->get_field_name('animation_duration'); ?>" type="number"
				   value="<?php echo esc_attr($animation_duration); ?>" min="0" step="any">
		</p>
		<p class="komozi" style="margin-top: -5px;">
			※「点滅」スタイルは<code>2</code>、「流れる」スタイルは<code>20</code>が基準値です。
		</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$instance['title'] = isset( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : $this->defaults['title'];

		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['content'] = isset( $new_instance['content'] ) ? $new_instance['content'] : $this->defaults['content'];
		} else {
			$instance['content'] = isset( $new_instance['content'] ) ? wp_kses_post( $new_instance['content'] ) : $this->defaults['content'];
		} 
		$instance['bold'] = !empty($new_instance['bold']);
		$instance['st_color']            = sanitize_hex_color( $new_instance['st_color'] );
		$instance['animation_style'] = sanitize_text_field($new_instance['animation_style']);
		$instance['st_url']              = esc_url_raw( $new_instance['st_url'] );
		$instance['target']              = !empty( $new_instance['target'] );
		$instance['nofollow']            = !empty( $new_instance['nofollow'] );

		// animation_duration のサニタイズ処理
		$animation_duration = isset( $new_instance['animation_duration'] ) ? intval( $new_instance['animation_duration'] ) : 0;
		//$instance['animation_duration'] = $animation_duration >= 0 ? $animation_duration : 0; // 負の値は0として扱う
		$instance['animation_duration'] = (isset($new_instance['animation_duration']) && filter_var($new_instance['animation_duration'], FILTER_VALIDATE_FLOAT) !== false && $new_instance['animation_duration'] >= 0) ? $new_instance['animation_duration'] : $this->defaults['animation_duration'];


		return $instance;
	}

	public function enqueue_admin_scripts() {
		// CodeMirrorとカスタムHTMLウィジェットのスクリプトをエンキュー
		$settings = wp_enqueue_code_editor(array(
			'type'       => 'text/html',
			'codemirror' => array(
				'indentUnit' => 2,
				'tabSize'    => 2,
			),
		));

		wp_enqueue_script('custom-html-widgets');

		if (empty($settings)) {
			$settings = array('disabled' => true);
		}

		wp_add_inline_script(
			'custom-html-widgets',
			sprintf('wp.customHtmlWidgets.init( %s );', wp_json_encode($settings)),
			'after'
		);

		// 翻訳のエラーメッセージ
		$l10n = array(
			'errorNotice' => array(
				'singular' => _n(
					'There is %d error which must be fixed before you can save.',
					'There are %d errors which must be fixed before you can save.',
					1,
					'affinger'
				),
				'plural' => _n(
					'There is %d error which must be fixed before you can save.',
					'There are %d errors which must be fixed before you can save.',
					2,
					'affinger'
				),
			),
		);

		wp_add_inline_script(
			'custom-html-widgets',
			sprintf('jQuery.extend( wp.customHtmlWidgets.l10n, %s );', wp_json_encode($l10n)),
			'after'
		);
	}

}

if ( ! function_exists( '_st_widget_register_st_info_mation' ) ) {
	function _st_widget_register_st_info_mation() {
		register_widget( St_Info_Mation_Widget::class );
	}
}

add_action( 'widgets_init', '_st_widget_register_st_info_mation' );
