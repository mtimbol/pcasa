import ReactTable from 'react-table';
import 'react-table/react-table.css';
import matchSorter from 'match-sorter';

class ContactProperties extends window.React.Component
{
	constructor(props)
	{
		super(props)
		this.state = {
			allProperties: [],
			showAllProperties: false,
		}
	}

	componentDidMount()
	{
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

	attachProperty(property_id) {
		console.log('Attach property_id', property_id);

		const endpoint = '/api/contacts/' + this.props.contact_id + '/properties' 
		window.axios.post(endpoint, {
			property_id
		}).then(response => {
			console.log(response)
		}).catch(error => {
			console.log(error)
		});
	}

	detachProperty(property_id) {
		console.log('Detach property_id', property_id);

		const endpoint = '/api/contacts/' + this.props.contact_id + '/properties' 
		window.axios.delete(endpoint, {
			params: {
				property_id
			}
		}).then(response => {
			console.log(response)
		}).catch(error => {
			console.log(error)
		});
	}	

	doneAttachingProperty() {
		this.setState({
			showAllProperties: false,
		})
	}

	render()
	{
		return(
			<div>
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
											<a href="#" onClick={() => this.attachProperty(value)} title="Attach property from this contact" className="no-underline px-2 text-green text-xs font-bold">Attach</a>
										)
									}
								]
							}
						]}
					/> :					
					<ReactTable 
						data={this.props.properties}
						defaultPageSize={5}
						columns={[
							{
								Header: 'Associated Properties to this contact',
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
											// const property_id = value.original.pivot.property_id;
											<span>
												<a href="#" onClick={() => this.detachProperty(value.original.pivot.property_id)} title="Remove property from this contact" className="no-underline px-2 text-red text-xs font-bold">Delete</a>
											</span>
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
						<a onClick={() => this.doneAttachingProperty()} className="no-underline bg-blue hover:bg-blue-dark text-white px-4 py-2 rounded cursor-pointer">
							<i className="fa fa-check mr-2"></i>
							Done
						</a> :
						<a onClick={() => this.attachingProperty()} className="no-underline bg-blue hover:bg-blue-dark text-white px-4 py-2 rounded cursor-pointer">
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