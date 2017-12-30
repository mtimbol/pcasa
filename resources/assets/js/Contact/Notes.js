import React from 'react';
import axios from 'axios';

class ContactNotes extends React.Component
{
	constructor(props)
	{
		super(props);

		this.state = {
			show_form: false,
			creating: false,
			message: '',
			notes: [],
			button_text: 'Create note',
		}
	}

	componentDidMount()
	{
		this.setState({
			notes: this.props.notes
		})
	}

	onSubmit(e) {
		e.preventDefault();

		this.setState({
			creating: true,
			button_text: 'Creating note'
		})

		axios.post('/api/contacts/'+this.props.contact_id+'/notes', {
			'message': this.state.message
		}).then(response => {
			console.log('Create note response', response);
			this.setState({
				show_form: false,
				creating: false,
				button_text: 'Create note'
			})
			this._getContactNotes(this.props.contact_id);
		}).catch(error => {
			console.log(error);
			this.setState({
				message: '',
				show_form: false,
				creating: false,
				button_text: 'Create note'
			})			
		})
	}

	_getContactNotes(contact) {
		axios.get('/api/contacts/'+contact+'/notes')
			.then(response => {
				console.log(response);
				this.setState({
					notes: [response.data]
				})
			}).catch(error => {
				console.log('_getContactNotes error', error);
			})
	}

	render()
	{		
		let contact_notes = this.state.notes.length > 0 ? this.state.notes[0].message : '';
		// let contact_notes = this.state.notes.map((note, index) => {
		// 	return (
		// 		<p key={index} className="mb-2">{note.message}</p>
		// 	)
		// })

		let state = this.state;

		return (
			<div>
				{contact_notes}
				<p className="text-center">
					<a className="no-underline cursor-pointer" onClick={() => this.setState({ 'show_form': !state.show_form })}>
						<i className="fa fa-plus-circle text-grey-dark"></i>
					</a>
				</p>
				{
					this.state.show_form ?				
					<div className="p-4 w-48 mt-2 border shadow bg-white absolute z-10">
						<p className="pb-3"><strong className="font-normal text-grey text-sm">Create note</strong></p>
						<form method="POST" className="relative" onSubmit={this.onSubmit.bind(this)}>
							<div className="w-full mb-2">
								<input value={state.message} onChange={(e) => this.setState({ message: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>						
							<div className="w-full">
								<button 
									className="bg-gold hover:bg-black text-white px-2 py-1 rounded"
									disabled={state.creating ? 'disabled' : ''}
								>
									{
										state.creating ?
										<i className="fa fa-spinner fa-spin mr-2"></i> : ''
									}							
									{state.button_text}
								</button>
							</div>	
						</form>
						<div className="absolute pin-t pin-r mr-1">
							<a className="no-underline cursor-pointer text-dark text-xs" onClick={() => this.setState({ show_form: !state.show_form })}>
								<i className="fa fa-times-circle"></i>
							</a>
						</div>
					</div> : ''
				}
			</div>
		)
	}
}

export default ContactNotes;