const { Component, Fragment } = wp.element;

const { apiFetch } = wp;

import {
	TextControl,
	PanelBody,
	TextareaControl,
	RangeControl,
	Button } from '@wordpress/components';

import { RinkerTemplateList } from './rinker-template-list.js'

import { useState } from '@wordpress/element';

export class RinkerTemplateLists extends Component {

	constructor(props){
		super(props);
	}

	componentDidMount(){
	}

	render(){
		const {
			attributes,
			setAttributes,
			templateName,
			templateNames,
			templateAtts,
			onTemplateNames
		} = this.props;
		let templateLists = [];
		for (let key in templateNames) {
			templateLists.push(
				<RinkerTemplateList attributes={attributes}
					setAttributes={setAttributes}
					onTemplateNames={onTemplateNames}
					templateNames={templateNames}
					templateAtts={templateAtts}
					templateId={key}
				/>
			);
		}

		return (
			<Fragment>
				{ templateLists }
			</Fragment>
		);
	}
}
