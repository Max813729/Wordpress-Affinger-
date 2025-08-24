const { apiFetch } = wp;
const { Component, Fragment } = wp.element;

import {
	TextControl,
	PanelBody,
	SelectControl,
	ColorPalette
} from '@wordpress/components';

import {
	InspectorControls
} from '@wordpress/block-editor';

import {
	__experimentalToggleGroupControl as ToggleGroupControl,
	__experimentalToggleGroupControlOption as ToggleGroupControlOption } from '@wordpress/components';

import {RinkerTemplateManage} from "./rinker-template-manage";
import { RinkerManagerLink } from './rinker-manager-link.js';
import { rinkerIcon } from './rinker-icon.js';


export class RinkerEdit extends Component {
	constructor(props){
		super(props);
	}

	componentDidMount(){
		let templateAtts = gutenberg_rinker.template_attrs;
		const {
			setAttributes,
			content_text
		} = this.props;

		let isTemplateSetting;
		isTemplateSetting = false;

		for ( let key in templateAtts ) {
			if (
				typeof this.props.attributes[key] === 'undefined' || this.props.attributes[key] !== '') {
				isTemplateSetting = true;
				break;
			}
		}
		if ((typeof content_text === 'undefined' || content_text.length === 0 ) && isTemplateSetting) {
			let templates = gutenberg_rinker.templates;

			apiFetch( {
				path: '/yyirest/v1/template/load/get',
				method: 'get',
			}).then( templateId => {
				if (typeof templates[templateId] === "undefined") {
					return false;
				}
				let loadTemplate = templates[templateId];
				for(let key in loadTemplate) {
					setAttributes({
						[key]: loadTemplate[key]
					});
				}
			}).catch(error => {
				console.error('通信に失敗しました', error);
			});
		}
	}

	render(){
		const {
			setAttributes,
			attributes,
			templateName,
			template_names,
			setTemplateName,
			loadTemplateId,
			setLoadTemplateId,
			colors,
			color
		} = this.props;

		let {
			design,
			title,
			size,
			alabel,
			rlabel,
			ylabel,
			klabel,
			mlabel,
			tag,
			attention_text,
			attention_design,
		} = attributes;

		if ( attention_design === '') {
			attention_design = 'ribbon'
		}

		let designs = gutenberg_rinker.designs;

		return (
			<Fragment>
				<InspectorControls>
					<RinkerTemplateManage
						templateName={templateName}
						setTemplateName={setTemplateName}
						setAttributes={setAttributes}
						attributes={attributes}
						templateNames={template_names}
						loadTemplateId={loadTemplateId}
						setLoadTemplateId={setLoadTemplateId}
					/>
					<PanelBody
						title='Rinker設定'
						icon={rinkerIcon}
					>
						<SelectControl
							label='デザイン'
							help='デザインを選びます'
							value={design}
							options={designs}
							onChange={value => setAttributes({design: value})}
							/*onChange={onChangeDesignField}*/
						></SelectControl>
						<TextControl
							label= '注目ラベル'
							help= 'ボックスに注意を引くラベルをつけます'
							value= {attention_text}
							onChange={value => setAttributes({attention_text: value})}
						/>
						<ToggleGroupControl
							label='注目ラベルデザイン'
							value={attention_design}
							onChange={value => setAttributes({attention_design: value})}
						>
							<ToggleGroupControlOption
								label='リボン'
								value='ribbon'
							/>
							<ToggleGroupControlOption
								label='右リボン'
								value='right_ribbon'
							/>
							<ToggleGroupControlOption
								label='丸'
								value='circle'

							/>
						</ToggleGroupControl>
						<ColorPalette
							label='注目ラベル色'
							colors={colors}
							value={color}
							onChange={value => setAttributes({attention_color: value})}
						/>
						<TextControl
							label= 'タイトル'
							help= 'タイトルを上書きします'
							value= {title}
							onChange={value => setAttributes({title: value})}
						/>
						<SelectControl
							label='画像サイズ'
							help='画像サイズを上書きします'
							value={size}
							options={[
								{label: 'デフォルト', value:'0'},
								{label: 'S', value:'s'},
								{label: 'M', value:'m'},
								{label: 'L', value:'l'}]}
							onChange={value => setAttributes({size: value})}
						/>
						<TextControl
							label= 'Amazonボタンの文言'
							help= ''
							value= {alabel}
							onChange={value => setAttributes({alabel: value})}
						/>
						<TextControl
							label= '楽天市場ボタンの文言'
							help= ''
							value= {rlabel}
							onChange={value => setAttributes({rlabel: value})}
						/>
						<TextControl
							label= 'Yahooショッピングボタンの文言'
							help= ''
							value= {ylabel}
							onChange={value => setAttributes({ylabel: value})}
						/>
						<TextControl
							label= 'Kindleボタンの文言'
							help= ''
							value= {klabel}
							onChange={value => setAttributes({klabel: value})}
						/>
						<TextControl
							label= 'メルカリボタンの文言'
							help= ''
							value= {mlabel}
							onChange={value => setAttributes({mlabel: value})}
						/>
						<TextControl
							label= 'AmazonのトラッキングID（個別設定）'
							help= ''
							value= {tag}
							onChange={value => setAttributes({tag: value})}
						/>
					</PanelBody>

					<RinkerManagerLink
						attributes={attributes}
					/>
				</InspectorControls>
			</Fragment>
		);
	}
}
