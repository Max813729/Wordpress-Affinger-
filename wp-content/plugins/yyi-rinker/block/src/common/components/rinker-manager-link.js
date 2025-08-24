const { Component, Fragment } = wp.element;
import { rinkerIcon } from './rinker-icon.js';

import { ExternalLink, PanelBody } from '@wordpress/components';

export class RinkerManagerLink extends Component {

	constructor(props){
		super(props);
	}

	componentDidMount(){}


	render(){
		let adminUrl = gutenberg_rinker.admin_url;
		const {
			post_id
		} = this.props.attributes;

		return (
			<PanelBody title="商品リンク管理" icon={rinkerIcon}>
				<ExternalLink href={adminUrl + '?post=' + post_id + '&action=edit'}
				>商品リンク管理で編集</ExternalLink>
			</PanelBody>
		);
	}
}
