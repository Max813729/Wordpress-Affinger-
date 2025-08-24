/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';
const { Fragment, Component } = wp.element;
import { useState, useEffect, useLayoutEffect } from '@wordpress/element';
import { useBlockProps } from '@wordpress/block-editor';
import { RinkerContentsServerSideRender } from './common/components/rinker-contents-server-side-render.js';
import { RinkerEdit } from './common/components/rinker-edit.js';
const { select } = wp.data;
/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit({ clientId, attributes, setAttributes, className, name }) {
	let {
		content,
		content_text,
		alignment,
		design,
		title,
		size,
		alabel,
		rlabel,
		ylabel,
		klabel,
		mlabel,
		post_id,
		tag,
		attention_text,
		attention_design,
		attention_color
	} = attributes;

	content_text = Array.isArray(content) ? content[0] : content;
	setAttributes( { content_text: content_text } );

	const default_color = '#fea724';
	if (attention_color === '') {
		attention_color = default_color;
	}

	const [ color, setColor ] = useState ( attention_color );
	const colorSet = typeof select('core/editor') !== 'undefined' ? select('core/editor').getEditorSettings().colors: [];

	const colors = colorSet.concat();
	colors[colorSet.length] = { name: 'デフォルト', color: default_color };

	let templates = gutenberg_rinker.templates;

	let template_names = {};
	for (let index in templates) {
		template_names[index] = templates[index].template_name
	}
	const [ templateName, setTemplateName ] = useState ( '' );

	let load_template_id = gutenberg_rinker.load_template_id;
	const [ loadTemplateId, setLoadTemplateId] = useState( load_template_id );

	function onChangeContent(value)
	{
		setAttributes( { content: value } );
		setAttributes( { content_text: value } );

		let regexp = new RegExp('post_id=\"(\\S+)\"');
		let att = value.match(regexp);
		if (!!att && !!att[1]) {
			setAttributes( { post_id: att[1] } );
		}
	}

	return (
		<Fragment>
			<div { ...useBlockProps() }>
				<input
					tagName='p'
					className='rinkerg-richtext'
					onChange={(event) => onChangeContent(event.target.value)}
					onFocus={(event) => onChangeContent(event.target.value)}
					formattingControls={[]}
					value={content}
				/>
				<button
					className= 'button thickbox add_media'
					onClick={ (event) => {
						var url = 'media-upload.php?type=yyi_rinker&tab=yyi_rinker_search_amazon&cid=' + clientId + '&TB_iframe=true';
						tb_show('商品リンク追加', url);
					} }
				>
					商品リンク追加
				</button>
				<RinkerContentsServerSideRender
					setAttributes={setAttributes}
					attributes={attributes}
				/>
			</div>
			<RinkerEdit
				attributes={attributes}
				setAttributes={setAttributes}
				useState={useState}
				templateName={templateName}
				template_names={template_names}
				setTemplateName={setTemplateName}
				loadTemplateId={loadTemplateId}
				setLoadTemplateId={setLoadTemplateId}
				colors={colors}
				color={color}
				setColor={setColor}
				content_text={content_text}
			></RinkerEdit>
		</Fragment>
	);
}
