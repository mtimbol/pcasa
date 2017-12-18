import ReactTable from 'react-table';
import 'react-table/react-table.css';
import matchSorter from 'match-sorter';

class ContactProperties extends window.React.Component
{
	constructor(props)
	{
		super(props)
		this.state = {
			contactProperties: [],
			allProperties: [],
			showAllProperties: false,
		}
	}

	componentDidMount()
	{
		this.setState({
			contactProperties: this.props.properties
		})

		this.getAllProperties();
	}

	getAllProperties() {
		window.axios.get('/api/properties')
			.then(response => {
				this.setState({ allProperties: response.data })
			}).catch(error => {
				console.log(error);
			})
	}

	attachingProperty() {
		this.setState({
			showAllProperties: true,
		})
	}

	attachProperty(e, property_id) {
		e.preventDefault();

		console.log('Attach property_id', property_id);

		const { contact } = this.props;
		const endpoint = '/api/contacts/' + contact.id + '/properties';

		window.axios.post(endpoint, {
			property_id
		}).then(response => {
			console.log(response)
			this.getContactProperties(contact.id);
		}).catch(error => {
			console.log(error)
		});
	}

	detachProperty(e, property) {
		e.preventDefault();

		const { contact } = this.props;
		let property_id = property.original.pivot.property_id;
		const endpoint = '/api/contacts/' + contact.id + '/properties';

		window.axios.delete(endpoint, {
			params: { property_id }
		}).then(response => {
			console.log(response)
			this.getContactProperties(contact.id);
		}).catch(error => {
			console.log(error)
		});
	}	

	doneAttachingProperty() {
		this.setState({
			showAllProperties: false,
		})
	}

	getContactProperties(contact) {		
		const endpoint = '/api/contacts/' + contact + '/properties';
		window.axios.get(endpoint)
			.then(response => {
				this.setState({
					contactProperties: response.data,
					showAllProperties: false,
				})
			}).catch(error => {
				console.log(error);
			})
	}

	render()
	{
		const headerTitle = 'Associated Properties to ' + this.props.contact.name;
		return(
			<div className="w-full p-4">
				{
					this.state.showAllProperties ?
					<ReactTable 
						data={this.state.allProperties}
						filterable
						defaultPageSize={5}
						columns={[
							{
								Header: 'Select properties to attach on the contact',
								columns: [
									{
										Header: 'Property number',
										accessor: 'property_number',
										id: 'property_number',
										filterMethod: (filter, rows) => matchSorter(rows, filter.value, { keys: ['property_number'] }),
										filterAll: true,
									},
									{
										Header: 'Name',
										accessor: 'name'
									},
									{
										Header: 'Community',
										accessor: 'community'
									},
									{
										Header: 'Property type',
										accessor: 'property_type'
									},
									{
										Header: 'Bedrooms',
										accessor: 'bedrooms'
									},
									{
										Header: 'Unit type',
										accessor: 'unit_type',							
									},
									{
										Header: '',
										accessor: 'id',
										Cell: ({value}) => (
											<form method="POST" onSubmit={(e) => this.attachProperty(e, value)}>
												<button type="submit" title="Attach property from this contact" className="no-underline px-2 text-green text-xs font-bold">Attach</button>
											</form>
										)
									}
								]
							}
						]}
					/> :					
					<ReactTable 
						data={this.state.contactProperties}
						defaultPageSize={5}
						columns={[
							{
								Header: headerTitle,
								columns: [
									{
										Header: 'Property number',
										accessor: 'property_number',
									},
									{
										Header: 'Name',
										accessor: 'name'
									},
									{
										Header: 'Community',
										accessor: 'community'
									},
									{
										Header: 'Property type',
										accessor: 'property_type'
									},
									{
										Header: 'Bedrooms',
										accessor: 'bedrooms'
									},
									{
										Header: 'Unit type',
										accessor: 'unit_type',							
									},
									{
										Header: 'ID',
										accessor: 'id',
										Cell: (value) => (
											<form method="POST" onSubmit={(e) => this.detachProperty(e, value)}>
												<button type="submit" title="Remove property from this contact" className="no-underline px-2 text-red text-xs font-bold">Delete</button>
											</form>											
										)
									}
								]
							}
						]}
					/>
				}

				<div className="w-full flex justify-end my-4">
				{
					this.state.showAllProperties ?				
						<a onClick={() => this.doneAttachingProperty()} className="no-underline bg-gold hover:bg-black text-white px-4 py-2 rounded cursor-pointer">
							<i className="fa fa-check mr-2"></i>
							Done
						</a> :
						<a onClick={() => this.attachingProperty()} className="no-underline bg-gold hover:bg-black text-white px-4 py-2 rounded cursor-pointer">
							<i className="fa fa-paperclip mr-2"></i>
							Attach property
						</a>
				}
				</div>					
			</div>
		)
	}
}

export default ContactProperties;