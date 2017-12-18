import swal from 'sweetalert';

class UpdateContact extends window.React.Component
{
	constructor(props)
	{
		super(props);
		this.state = {
			salutation: '',
			name: '',
			email: '',
			phone: '',
			mobile: '',
			company: '',
			position: '',
			contact_status: '',
			client_type: '',

			updating: false,
			button_text: 'Update contact',
		}
	}

	componentDidMount()
	{
		let { contact } = this.props;

		this.setState({
			salutation: contact.salutation, 
			name: contact.name,
			email: contact.email,
			phone: contact.phone,
			mobile: contact.mobile,
			company: contact.company,
			position: contact.position,
			contact_status: contact.contact_status,
			client_type: contact.client_type,	
		})
	}

	updateProfile(e) {
		e.preventDefault();
		this.setState({
			updating: true,
			button_text: 'Updating contact'
		})

		const state = this.state;
		const contact_id = this.props.contact.id;

		window.axios.put('/admin/contacts/'+contact_id, {
			salutation: state.salutation, 
			name: state.name,
			email: state.email,
			phone: state.phone,
			mobile: state.mobile,
			company: state.company,
			position: state.position,
			contact_status: state.contact_status,
			client_type: state.client_type
		}).then(response => {
			if (response.data.status === 1 ) {
				this.setState({
					updating: false,
					button_text: 'Update contact'
				})
				swal({
					title: 'Pcasa',
					text: 'Contact has been successfully updated.',
					icon: 'success'
				})
				this.props.refreshContacts();
			}
		}).catch(error => {
			console.log(error);
			this.setState({
				updating: false,
				button_text: 'Update contact'
			})				
		});	

	}

	render() {
		const state = this.state;

		return (
			<form method="POST" onSubmit={this.updateProfile.bind(this)}>
				<div className="flex p-4">
					<div className="w-1/2 mr-8">
						<h4 className="text-grey-darker mb-2">Contact Information</h4>
						<p className="text-grey-darker text-xs font-normal leading-normal mb-2">
							TODO: If the email or phone is existing on the database, the fields will be automatically filled.
						</p>
						<p className="text-grey-darker text-xs font-normal leading-normal">
							Fields with (*) needs to be filled up.
						</p>					
					</div>
					<div className="w-full">
						<div className="flex mb-6">
							<div className="w-1/2 mr-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Contact Status</label>
								<div className="inline-block relative w-full">
									<select 
										className="w-full block appearance-none bg-white border hover:border-grey px-3 py-2 rounded shadow"
										value={state.contact_status}
										onChange={(e) => this.setState({ contact_status: e.target.value })}
									>
										<option value=""></option>
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
							</div>	
							<div className="w-1/2 ml-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Client Type</label>
								<div className="inline-block relative w-full">
									<select className="w-full block appearance-none bg-white border hover:border-grey px-3 py-2 rounded shadow"
										value={state.client_type}
										onChange={(e) => this.setState({ client_type: e.target.value })}
									>
										<option value=""></option>
										<option value="buyer">Buyer</option>
										<option value="landlord">Landlord</option>
										<option value="agent">Agent</option>
										<option value="developer">Developer</option>
									</select>
									<div className="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-slate">
										<svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
											<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
										</svg>
									</div>
								</div>
							</div>								
						</div>
						<div className="flex mb-6">			
							<div className="w-1/2 mr-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Email</label>
								<input value={state.email} onChange={(e) => this.setState({ email: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>
							<div className="w-1/2 ml-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Phone</label>
								<input value={state.phone} onChange={(e) => this.setState({ phone: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>						
						</div>
						<div className="mb-2">
							<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Full Name</label>
						</div>
						<div className="flex mb-6">
							<div className="w-16 mr-2">
								<div className="inline-block relative w-full">
									<select 
										className="w-full block appearance-none bg-white border hover:border-grey px-3 py-2 rounded shadow"
										value={state.salutation}
										onChange={(e) => this.setState({ salutation: e.target.value })}
									>
										<option value=""></option>
										<option value="Mr.">Mr.</option>
										<option value="Ms.">Ms.</option>
									</select>
									<div className="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-slate">
										<svg className="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
											<path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
										</svg>
									</div>
								</div>
							</div>
							<div className="w-full ml-2">
								<input value={state.name} onChange={(e) => this.setState({ name: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>
						</div>					
					</div>
				</div>

				<div className="flex p-4">
					<div className="w-1/2 mr-8">
						<h4 className="text-grey-darker mb-2">Company Information</h4>
						<p className="text-grey-darker text-xs font-normal leading-normal mb-2">
							Lorem ipsum dolor sit amet, consectetur adipisicing.
						</p>
						<p className="text-grey-darker text-xs font-normal leading-normal">
							Fields with (*) needs to be filled up.
						</p>					
					</div>
					<div className="w-full">
						<div className="flex mb-6">
							<div className="w-1/2 mr-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Company</label>
								<input value={state.company} onChange={(e) => this.setState({ company: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>
							<div className="w-1/2 ml-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Position</label>
								<input value={state.position} onChange={(e) => this.setState({ position: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>	
						</div>
					</div>
				</div>

				<div className="flex px-4 pt-4 pb-8">
					<div className="w-full flex justify-end">
						<button type="reset" className="text-grey-darker px-4 py-2 mr-2">Cancel</button>
						<button 
							className="bg-gold hover:bg-black text-white px-4 py-2 rounded"
							disabled={state.updating ? 'disabled' : ''}
						>
							{
								state.updating ?
								<i className="fa fa-spinner fa-spin mr-2"></i> : <i className="fa fa-floppy-o mr-2"></i>
							}							
							{state.button_text}
						</button>
					</div>
				</div>					
			</form>
		)
	}
}

export default UpdateContact;