const { Component, Fragment, useState } = wp.element;
import { rinkerIcon } from './rinker-icon.js';
const { apiFetch } = wp;
import { RinkerTemplateLists } from './rinker-template-lists.js'

import {
	TextControl,
	PanelBody,
	TextareaControl,
	RangeControl,
	SelectControl,
	Button } from '@wordpress/components';

export class RinkerTemplateManage extends Component {

	constructor(props){
		super(props);

		this.state = {
			selected: null,
			isLoadTemplateLoading: false,
		};

		this.onTemplateNames = this.onTemplateNames.bind(this);
		this.onClickSaveTemplate = this.onClickSaveTemplate.bind(this);
		this.onClickSaveLoadTemplate = this.onClickSaveLoadTemplate.bind(this);
	}

	componentDidMount(){
	}
	/**
		テンプレートリストをセットする
	***/
	onTemplateNames( temps ) {
		window.gutenberg_rinker.templates = temps;
		let template_names = {};
		for (let index in temps) {
			template_names[index] = temps[index].template_name
		}
		this.props.setAttributes( { templete_names: template_names } );
	}

	onClickSaveTemplate( newValue ) {
		const {
			templateName
		} = this.props;
		const { attributes  } = this.props;
		let template_atts = gutenberg_rinker.template_attrs;
		let params = {};
		for (let key in template_atts) {
			params[key] = attributes[key];
		}
		params['template_name'] = templateName;

		apiFetch( {
			path: '/yyirest/v1/template/create',
			method: 'POST',
			data: params,
		}).then( posts => {
			this.onTemplateNames(posts);
		}).catch(error => {
			console.error('通信に失敗しました', error);
		});
	}

	onClickSaveLoadTemplate(event) {
		let templateId = this.props.loadTemplateId;
		let templates = window.gutenberg_rinker.templates;
		this.setState({isLoadTemplateLoading: true});

		if (templateId in templates) {
			let params = {};
			params['id'] = templateId;
			apiFetch( {
				path: '/yyirest/v1/template/load/create',
				method: 'POST',
				data: params,
			}).then( posts => {
				this.setState({isLoadTemplateLoading: false});
			}).catch(error => {
				console.error('通信に失敗しました', error);
			});
		}
	}

	render(){
		let templateAtts = gutenberg_rinker.template_attrs;
		let templateMaxCount = gutenberg_rinker.template_max_count;

		const {
			attributes,
			setAttributes,
			templateName,
			templateNames,
			setTemplateName,
			loadTemplateId,
			setLoadTemplateId,
		} = this.props;
		let templateLabel = '';
		if (templateMaxCount === 'unlimited') {
			templateLabel = <div><span>無制限に作成できます。</span></div>;
		} else {
			templateLabel = <div>
				<span>最大{templateMaxCount}個まで作成できます。</span><br/>
				<span>制限を解除したい方は</span>
					<a target="_blank"
						rel='nofollow noopener noreferrer'
						href='https://oyayoi.fanbox.cc/tags/%E6%9C%80%E6%96%B0%E9%99%90%E5%AE%9A%E3%83%97%E3%83%A9%E3%82%B0%E3%82%A4%E3%83%B3'
						>こちらのプラグイン</a>
				<span>を導入ください</span>
			</div>;
		}

		let templateNamesForSelect = [];
		templateNamesForSelect.push({ label: '設定なし', value: null });
		for( let templateId in templateNames ) {
			templateNamesForSelect.push({ label: templateNames[templateId], value: templateId });
		}

		const isLoadTemplateLoading = this.state.isLoadTemplateLoading;
		let loadingText;
		if (isLoadTemplateLoading) {
			loadingText = <span class="is-loading">保存中...</span>;
		} else {
			loadingText = <span class="is-loading"></span>;
		}

		return (
			<Fragment>
				<div>
					<PanelBody
						title='テンプレート設定'
                    	icon={rinkerIcon}
					>
						<div
							className="yyi-rinker-new-template-name"
						>
							<TextControl
                            	label='新規テンプレート名'
								value= {templateName}
								onChange={setTemplateName}
                            />
                            <Button
								text='保存する'
								variant='primary'
								onClick={this.onClickSaveTemplate}
                            />
						</div>
						{templateLabel}
						 <ul className="yyi-rinker-template-names">
							<RinkerTemplateLists
								attributes={attributes}
								setAttributes={setAttributes}
								onTemplateNames={this.onTemplateNames}
								templateNames={templateNames}
								templateAtts={templateAtts}
							/>
						</ul>
						<div className="yyi-rinker-load-template-name">
							<SelectControl
								label="デフォルトテンプレート"
								value={ loadTemplateId }
								options={ templateNamesForSelect }
								onChange={setLoadTemplateId}
							/>
							<Button
								text='デフォルトとして保存する'
								variant='primary'
								onClick={ (e) => this.onClickSaveLoadTemplate(e)}
							/>
							{loadingText}
						</div>
					</PanelBody>
				</div>
			</Fragment>
		);
	}
}
