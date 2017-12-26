import React from 'react';

class UpdateContactStatus extends React.Component
{
	constructor(props)
	{
		super(props);

		this.state = {
			showModal: false,
			contact_status: '',
			updating: false,
			button_text: 'Update',
		}
	}

	componentDidMount()
	{
		const {contact} = this.props;
		this.setState({
			contact_status: contact.contact_status,
		})
	}

	onSubmit(e) {
		e.preventDefault();

		const {contact} = this.props;

		console.log('UpdateContactStatus onSubmit(e)');

		this.setState({
			updating: true,
			button_text: 'Updating'
		})

		this.props.updateContactStatus(contact.id, this.state.contact_status).then(() => {
			this.setState({
				updating: false,
				button_text: 'Update',
				showModal: false,
			})
		})
	}

	render()
	{
		let state = this.state;
		const {contact} = this.props;

		return (
			<div>
				<div className="flex items-center">
					<a className="no-underline cursor-pointer mr-2" onClick={() => this.setState({ showModal: !state.showModal})}>
						<i className="fa fa-filter text-grey-dark"></i>
					</a>
					<p>{contact.name}</p>
				</div>
				{
					state.showModal ?
					<div className="p-4 w-auto mt-2 border shadow bg-white absolute z-10">
						<p className="pb-3"><strong className="font-normal text-grey text-sm">Update {contact.name}</strong></p>
						<form method="POST" className="flex relative" onSubmit={this.onSubmit.bind(this)}>
							<div className="inline-block relative w-full mr-2">
								<select 
									className="w-full block appearance-none bg-white border hover:border-grey px-2 py-1 rounded shadow mr-2"
									value={state.contact_status || 'Please select'}
									onChange={(e) => this.setState({ contact_status: e.target.value })}
								>
									<option value="Please select">-</option>
									<option value="database">Database</option>
									<option value="lead">Lead</option>
									<option value="potential">Potential</option>
									<option value="follow-up">Follow up</option>
									<option value="do-not-call">Do not call</option>
								</select>
								<div className="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-slate">
									<svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
										<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
									</svg>
								</div>
							</div>
							<div>
								<button 
									className="bg-gold hover:bg-black text-white px-2 py-1 rounded"
									disabled={state.updating ? 'disabled' : ''}
								>
									{
										state.updating ?
										<i className="fa fa-spinner fa-spin mr-2"></i> : ''
									}							
									{state.button_text}
								</button>
							</div>	
						</form>
						<div className="absolute pin-t pin-r mr-1">
							<a className="no-underline text-dark text-xs" onClick={() => this.setState({ showModal: !state.showModal })}>
								<i className="fa fa-times-circle"></i>
							</a>
						</div>
					</div>
					: ''
				}
			</div>
		)
	}
}

export default UpdateContactStatus;