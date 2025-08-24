const { Component } = wp.element;

import ServerSideRender from '@wordpress/server-side-render';

export class RinkerContentsServerSideRender extends Component {

	constructor(props){
		super(props);
	}

	componentDidMount(){}

	render(){
		const {
			content,
			content_text,
			post_id
		} = this.props.attributes;
		let aryAtts = [
            	'post_id', 'design', 'title', 'size', 'alabel', 'rlabel', 'ylabel', 'klabel', 'mlabel', 'tag', 'attention_text', 'attention_design', 'attention_color'
            ];

		if ( content_text ) {
			let setAttr = {};
			for( var i=0; i < aryAtts.length; i++ ){
				let field = aryAtts[i];
				let regexp = new RegExp(field + '=\"\S+\"');
				let data = this.props.attributes[field];
				//未選択の項目はショートコードから取得して上書き
				if ( data === '' || data === '0') {
					let att = content_text.match(regexp);
					if (!!att && !!att[1]) {
						setAttr[field] =  att[1];
						this.props.setAttributes( setAttr );
					}
				}
			}
			return (
				<ServerSideRender
						block='rinkerg/gutenberg-rinker'
						attributes={this.props.attributes}
				/>
				);
		} else {
			return '';
		}
	}
}
