const { Component, Fragment } = wp.element;
const { apiFetch } = wp;

export class RinkerTemplateList extends Component {

	constructor(props){
		super(props);
		this.onTemplateNames = this.props.onTemplateNames.bind(this);
	}

	componentDidMount(){}

	render(){
		let templates = gutenberg_rinker.templates;
		const {
			setAttributes,
			templateNames,
			templateAtts,
			templateId
		} = this.props;

		return (
			<li className="yyi-rinker-template-name-li">
				<div className="yyi-rinker-template-name-container">
					<span className="dashicons dashicons-download"/>
					<span
						className="yyi-rinker-template-name"
						data-templateid={templateId}
						onClick={ ( event ) => {
							let templateId = event.target.dataset.templateid;
							if (templateId in templates) {
								let datas = templates[templateId];
								for (let k in templateAtts) {
									if (k in datas) {
										var obj = {};
										obj[k] = datas[k];
										setAttributes(obj);
									}
								}
							}
						}}>
						{templateNames[templateId]}
					</span>
					<span
						className="dashicons dashicons-trash yyi-rinker-template-delete"
						data-templateid={templateId}
						onClick={ ( event ) => {
							let templateId = event.target.dataset.templateid;
							if (templateId in templates) {
								let params = {};
								params['id'] = templateId;
								apiFetch( {
									path: '/yyirest/v1/template/delete',
									method: 'POST',
									data: params,
								}).then( posts => {
									this.onTemplateNames(posts);
								}).catch(error => {
									console.error('通信に失敗しました', error);
								});
							}
						}}
						>
					</span>
				</div>
			</li>
		);
	}
}
