( function( blocks, editor, i18n, element, components, _, wp ) {
	var el = element.createElement;
	var Fragment = element.Fragment;
	var RichText = wp.blockEditor.RichText;
	let apiFetch = wp.apiFetch;
	var InspectorControls = wp.blockEditor.InspectorControls;
	var TextControl = components.TextControl;
	var SelectControl = components.SelectControl;

	let ToggleGroupControl = components.__experimentalToggleGroupControl;
	let ToggleGroupControlOption = components.__experimentalToggleGroupControlOption;
	let ColorPalette = components.ColorPalette;
	let useState = element.useState;
	let select = wp.data.select;

	var PanelBody = components.PanelBody;
	var PanelRow =  components.PanelRow;
	var ExternalLink = components.ExternalLink;
	var BlockControls =  wp.blockEditor.BlockControls;
	var serverSideRender = wp.serverSideRender;
	let admin_url = window.gutenberg_rinker.admin_url;
	let designs = window.gutenberg_rinker.designs;
	let ToolbarGroup = components.ToolbarGroup;
	let ToolbarButton = components.ToolbarButton;
	let Button = components.Button;
	let { SVG, Path } = wp.components;

	i18n.setLocaleData( window.gutenberg_rinker.localeData, 'gutenberg-rinker' );

	blocks.registerBlockType( 'rinkerg/gutenberg-rinker', {
		title: i18n.__( 'Rinker', 'gutenberg-rinker' ),
		icon: el(
			SVG,
			{
				viewBox:"0 0 24 24",
				width: '24',
				height: '24'
			},
			el(
				Path,
				{
					className: "cls-1",
					d: "M5.52,9C5.52,5.87,4,7.16,4,5.91S5.56,4.66,6.36,4.66c.43,0,.83,0,1.25.06s.83.08,1.23.08c.65,0,1.29,0,2-.08s1.31-.06,2-.06c2.28,0,4.92,1,4.92,3.69A3.16,3.16,0,0,1,16,11.27c-.18.1-.32.16-.32.41s.26.38.5.48c1.42.53,2,1.46,2.32,3.63.25,1.88,1.56.75,1.56,2,0,.77-.93,1.57-3.21,1.57-3.23,0-3.63-1.85-4.26-4.51C12.33,13.9,12,13,10.88,13c-.45,0-.61.06-.61,1.33a12.74,12.74,0,0,0,.15,2c.16.93,1.19.64,1.19,1.61,0,.73-.51,1.27-3.78,1.27-1,0-3.83,0-3.83-1.47,0-1.05,1.51-.32,1.51-3Zm4.68.89c0,.53-.15,1,.52,1,1.31,0,1.74-.73,1.74-2,0-1-.25-2-1.42-2-.74,0-.72.46-.76,1.08Z"
				}
			)
		),
		category: 'layout',
		attributes: {
			content: {
				type: 'array',
				source: 'children',
				selector: 'p',
			},
			content_text: {
				type: 'string',
				default: '',
			},
			alignment: {
				type: 'string',
				default: 'none',
			},
			post_id: {
				type: 'string',
				default: '',
			},
			design: {
				type: 'string',
				default: '',
			},
			title: {
				type: 'string',
				default: '',
			},
			size: {
				type: 'string',
				default: '',
			},
			alabel: {
				type: 'string',
				default: '',
			},
			rlabel: {
				type: 'string',
				default: '',
			},
			ylabel: {
				type: 'string',
				default: '',
			},
			klabel: {
				type: 'string',
				default: '',
			},
			mlabel: {
				type: 'string',
				default: '',
			},
			tag: {
				type: 'string',
				default: '',
			},
			className: {
				type: 'string',
				default: '',
			},
			blockMarginBottom: {
				type: 'string',
				default: '',
			},
			hiddenSwitch: {
				type: 'string',
				default: '',
			},
			attention_text: {
				type: 'string',
				default: '',
			},
			attention_design: {
				type: 'string',
				default: '',
			},
			attention_color: {
				type: 'string',
				default: '',
			},
			templete_names: {
				type: 'array',
				default: [],
				selector: 'div'
			},
		},
		edit: function( props ) {
			let content = props.attributes.content;
			let content_text = Array.isArray(content) ? content[0] : content;
			props.setAttributes( { content_text: content_text } );
			let attributes = props.attributes;
			const clientId = props.clientId;
			let alignment = props.attributes.alignment;
			let design  = props.attributes.design;
			let title   = props.attributes.title;
			let size    = props.attributes.size;
			let alabel  = props.attributes.alabel;
			let rlabel  = props.attributes.rlabel;
			let ylabel  = props.attributes.ylabel;
			let klabel  = props.attributes.klabel;
			let mlabel  = props.attributes.mlabel;
			let post_id = props.attributes.post_id;
			let tag    = props.attributes.tag;
			let attention_text = props.attributes.attention_text;
			let attention_design = props.attributes.attention_design;
			let attention_color = props.attributes.attention_color;

			if ( attention_design === '') {
				attention_design = 'ribbon'
			}

			const default_color = '#fea724';
			if (attention_color === '') {
				attention_color = default_color;
			}
			const [ color, setColor ] = useState ( attention_color );
			const colorSet = select('core/editor').getEditorSettings().colors;
			const colors = colorSet.concat();
			colors[colorSet.length] = { name: 'デフォルト', color: default_color };

			//不要なデータが入っていたので削除
			if (props.attributes.className === 'gutenberg-yyi-rinkernone') {
				props.attributes.className = '';
			}

			var ary_atts = [
				'post_id', 'design', 'title', 'size', 'alabel', 'rlabel', 'ylabel', 'klabel', 'tag', 'attention_text', 'attention_design', 'attention_color'
			];

			let templates = window.gutenberg_rinker.templates;
			let template_max_count = window.gutenberg_rinker.template_max_count;

			let template_names = {};
			for (let index in templates) {
				template_names[index] = templates[index].template_name
			}

			const [ templateName, setTemplateName ] = useState ( '' );
			let template_atts = window.gutenberg_rinker.template_attrs;

			let template_liss = [];
			for (let key in template_names) {
				template_liss.push(
					el(
						'li',
						{
							class: 'yyi-rinker-template-name-li'
						},
						el('div', { class: 'yyi-rinker-template-name-container'},
						el(
							'span',
							{
								class:"dashicons dashicons-download",
							}
						),
						el(
							'span',
							{
								class:"yyi-rinker-template-name",
								'data-templateid': key,
								onClick: (function(t){
									let templateid = t.currentTarget.dataset.templateid;
									if (templateid in templates) {
										let datas = templates[templateid];
										for (let key in template_atts) {
											if (key in datas) {
												var obj = {};
												obj[key] = datas[key];
												props.setAttributes(obj);
											}
										}
									}

								})
							},
							template_names[key]
						)
						),
						el('span', {
							id:'template_id_' + key,
							class: 'dashicons dashicons-trash yyi-rinker-template-delete',
							'data-templateid': key,
							onClick: (function(t){
								let templateid = t.currentTarget.dataset.templateid;
								if (templateid in templates) {
									let params = {};
									params['id'] = templateid;
									apiFetch( {
										path: '/yyirest/v1/template/delete',
										method: 'POST',
										data: params,
									}).then( posts => {
										onTemplateNames(posts);
									}).catch(error => {
										console.error('通信に失敗しました', error);
									});
								}
							})
						}))
				);
			}
			let template_name_element = el('ul', {class: 'yyi-rinker-template-names'}, template_liss);

			function onChangeContent( j ) {
				let value = j.target.value;
				props.setAttributes( { content: value } );
				props.setAttributes( { content_text: value } );

				let regexp = new RegExp('post_id=\"(\\S+)\"');
				let att = value.match(regexp);
				if (!!att && !!att[1]) {
					props.setAttributes( { post_id: att[1] } );
				}
			}

			function onChangeDesignField( newValue ) {
				props.setAttributes( { design: newValue } );
			}

			function onChangeTitleField( newValue ) {
				props.setAttributes( { title: newValue } );
			}

			function onChangeAttentionTextField( newValue ) {
				props.setAttributes( { attention_text: newValue } );
			}

			function onChangeAttentionDesign( newValue ) {
				props.setAttributes( { attention_design: newValue } );
			}

			function onChangeAttentionColor( newValue ) {
				setColor(newValue);
				props.setAttributes( { attention_color: newValue } );
			}

			function onChangeSizeField( newValue ) {
				props.setAttributes( { size: newValue } );
			}

			function onChangeAlabelField( newValue ) {
				props.setAttributes( { alabel: newValue } );
			}

			function onChangeRlabelField( newValue ) {
				props.setAttributes( { rlabel: newValue } );
			}

			function onChangeYlabelField( newValue ) {
				props.setAttributes( { ylabel: newValue } );
			}

			function onChangeKlabelField( newValue ) {
				props.setAttributes( { klabel: newValue } );
			}

			function onChangeMlabelField( newValue ) {
				props.setAttributes( { mlabel: newValue } );
			}

			function onChangeTagField( newValue ) {
				props.setAttributes( { tag: newValue } );
			}

			function onChangeTemplateName( newValue ) {
				setTemplateName(newValue);
			}

			function onTemplateNames( temps ) {
				window.gutenberg_rinker.templates = temps;
				let template_names = {};
				for (let index in temps) {
					template_names[index] = temps[index].template_name
				}
				props.setAttributes( { templete_names: template_names } );
			}

			function onClickSaveTemplate( newValue ) {
				let params = {};
				for (let key in template_atts) {
					params[key] = props.attributes[key];
				}
				params['template_name'] = templateName;

				apiFetch( {
					path: '/yyirest/v1/template/create',
					method: 'POST',
					data: params,
				}).then( posts => {
					onTemplateNames(posts);
					setTemplateName('');
				}).catch(error => {
					console.error('通信に失敗しました', error);
				});
			}

			let serverSideRenderEl = null;
			let toolbarButtonEl = null;

			let rinkerIcon = el(
				SVG,
				{
					viewBox:"0 0 24 24",
					width: '24',
					height: '24'
				},
				el(
					Path,
					{
						className: "cls-1",
						d: "M5.52,9C5.52,5.87,4,7.16,4,5.91S5.56,4.66,6.36,4.66c.43,0,.83,0,1.25.06s.83.08,1.23.08c.65,0,1.29,0,2-.08s1.31-.06,2-.06c2.28,0,4.92,1,4.92,3.69A3.16,3.16,0,0,1,16,11.27c-.18.1-.32.16-.32.41s.26.38.5.48c1.42.53,2,1.46,2.32,3.63.25,1.88,1.56.75,1.56,2,0,.77-.93,1.57-3.21,1.57-3.23,0-3.63-1.85-4.26-4.51C12.33,13.9,12,13,10.88,13c-.45,0-.61.06-.61,1.33a12.74,12.74,0,0,0,.15,2c.16.93,1.19.64,1.19,1.61,0,.73-.51,1.27-3.78,1.27-1,0-3.83,0-3.83-1.47,0-1.05,1.51-.32,1.51-3Zm4.68.89c0,.53-.15,1,.52,1,1.31,0,1.74-.73,1.74-2,0-1-.25-2-1.42-2-.74,0-.72.46-.76,1.08Z"
					}
				)
			);

			if ( content_text ) {
				serverSideRenderEl = el(
					serverSideRender,
					{
						block: 'rinkerg/gutenberg-rinker',
						attributes: attributes,
					}
				);
				let set_attr = {};
				for( var i=0; i < ary_atts.length; i++ ){
					let field = ary_atts[i];
					let regexp = new RegExp(field + '=\"(\\S+)\"');
					let data = props.attributes[field];
					//未選択の項目はショートコードから取得して上書き
					if ( data === '' || data === '0') {
						let att = content_text.match(regexp);
						if (!!att && !!att[1]) {
							set_attr[field] =  att[1];
							props.setAttributes( set_attr );
						}
					}
				}

				//ツールバー
				toolbarButtonEl = el(
					BlockControls,
					null,
					el(
						ToolbarGroup,
						null,
						el(
							ToolbarButton,
							{
								label: '商品リンク変更',
								icon: rinkerIcon,
								className: 'components-button components-icon-button components-toolbar__control yyi-rinker-relink-components-button',
								onClick:  function(j) {
									var url = 'media-upload.php?type=yyi_rinker&tab=yyi_rinker_search_amazon&cid=' + clientId + '&TB_iframe=true';
									tb_show('商品リンク変更', url);
								}
							}
						)
					)
				);
			} else {
			}

			let templateLabel = '無制限で作成できます。';
			if (template_max_count === 'unlimited') {
				templateLabel = '無制限に作成できます。';
			} else {
				templateLabel = el(
					Fragment, {},
					el('span', {},'最大' + template_max_count + '個まで作成できます。'),
					el('br', {}),
					el('span', {},'制限を解除したい方は'),
					el(
						'a', {
							target: "_blank",
							rel: 'nofollow noopener noreferrer',
							href: 'https://oyayoi.fanbox.cc/tags/%E6%9C%80%E6%96%B0%E9%99%90%E5%AE%9A%E3%83%97%E3%83%A9%E3%82%B0%E3%82%A4%E3%83%B3'
						},
						'こちらのプラグイン'),
					el('span', {},'を導入ください'),
				);
			}


			let template_html = el(
				PanelBody, {
					title: 'テンプレート設定',
					icon: rinkerIcon,
				},
				el(
					Fragment,
					null,
					el('div', {class:"yyi-rinker-new-template-name"},
						el(
							TextControl,
							{
								label: '新規テンプレート名',
								value: templateName,
								onChange:onChangeTemplateName,
							}
						),
						el(
							Button,
							{
								text: '保存する',
								variant: 'primary',
								onClick: onClickSaveTemplate,

							}
						)
					),
					template_name_element,
					el(
						'p',
						{},
						templateLabel
					)
				)
			);

			let manager_link_html = el(
				PanelBody,
				{
					title: '商品リンク管理',
					icon: rinkerIcon
				},
				el(
					ExternalLink,
					{
						href: admin_url + '?post=' + post_id + '&action=edit',
					},
					'商品リンク管理で編集'
				));

			return el(
				Fragment,
				null,
				el(
					'input',
					{
						tagName: 'p',
						className: 'rinkerg-richtext',
						onFocus: onChangeContent,
						onChange: onChangeContent,
						formattingControls: [],
						value: content,
					}
				),
				el(
					'button', {
						className: 'button thickbox add_media',
						onClick: function(j) {
							var url = 'media-upload.php?type=yyi_rinker&tab=yyi_rinker_search_amazon&cid=' + clientId + '&TB_iframe=true';
							tb_show('商品リンク追加', url);
						}
					},
					'商品リンク追加'

				),
				toolbarButtonEl,
				serverSideRenderEl,
				el(
					InspectorControls,
					null,
					template_html,
					el(PanelBody,{title: 'Rinker設定', icon: rinkerIcon},
					el(
						SelectControl,
						{
							label: 'デザイン',
							help: 'デザインを選びます',
							value: design,
							options:designs,
							onChange: onChangeDesignField
						}
					),
					el(
						TextControl,
						{
							label: '注目ラベル',
							help: 'ボックスに注意を引くラベルをつけます',
							value: attention_text,
							onChange: onChangeAttentionTextField
						}
					),
					el(
						ToggleGroupControl,
						{
							label: '注目ラベルデザイン',
							value: attention_design,
							onChange: onChangeAttentionDesign
						},
						el(
							ToggleGroupControlOption,
							{
								label: 'リボン',
								value: 'ribbon'
							}
						),
						el(
							ToggleGroupControlOption,
							{
								label: '丸',
								value: 'circle'
							}
						)
					),
					el(
						ColorPalette,
						{
							label: '注目ラベル色',
							colors: colors,
							value: color,
							onChange: onChangeAttentionColor,
						}
					),
					el(
						TextControl,
						{
							label: 'タイトル',
							help: 'タイトルを上書きします',
							value: title,
							onChange: onChangeTitleField
						}
					),
					el(
						SelectControl,
						{
							label: '画像サイズ',
							help: '画像サイズを上書きします',
							value: size,
							options:[
								{label: 'デフォルト', value:'0'},
								{label: 'S', value:'s'},
								{label: 'M', value:'m'},
								{label: 'L', value:'l'}],
							onChange: onChangeSizeField
						}
					),
					el(
						TextControl,
						{
							label: 'Amazonボタンの文言',
							help: '',
							value: alabel,
							onChange: onChangeAlabelField
						}
					),
					el(
						TextControl,
						{
							label: '楽天市場ボタンの文言',
							help: '',
							value: rlabel,
							onChange: onChangeRlabelField
						}
					),
					el(
						TextControl,
						{
							label: 'Yahooショッピングボタンの文言',
							help: '',
							value: ylabel,
							onChange: onChangeYlabelField
						}
					),
					el(
						TextControl,
						{
							label: 'Kindleボタンの文言',
							help: '',
							value: klabel,
							onChange: onChangeKlabelField
						}
					),
						el(
							TextControl,
							{
								label: 'メルカリボタンの文言',
								help: '',
								value: mlabel,
								onChange: onChangeYlabelField
							}
						),
					el(
						TextControl,
						{
							label: 'AmazonのトラッキングID（個別設定）',
							help: '',
							value: tag,
							onChange: onChangeTagField
						}
					)
					),
					manager_link_html,
				),

			);
		},
		save: function( props ) {
			return el( RichText.Content, {
				tagName: 'p',
				className: props.attributes.className,
				value: props.attributes.content
			} );
		},
		transforms: {
			from: [
				{
					type: 'shortcode',
					tag: 'itemlink',
					attributes: {
						content: {
							type: 'array',
							shortcode: ( attributes, content ) => {
								const itemlink = content.content || '';
								return [itemlink];
							},
						},
					},
				},
			]
		},
	} );

} (
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
	wp
) );
