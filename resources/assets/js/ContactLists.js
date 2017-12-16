import React from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

import ReactTable from 'react-table';
import 'react-table/react-table.css';

import matchSorter from 'match-sorter';
import UpdateContact from './Contact/Update';
import update from 'immutability-helper'

class ContactLists extends React.Component
{
	constructor(props)
	{
		super(props);

		this.state = {
			contacts: []
		}
	}

	componentDidMount()
	{
		this.getContacts();
	}

	getContacts() {
		console.log('fetching data');
		axios.get('/api/contacts')
			.then(response => {
				console.log(response)
				this.setState({ contacts: response.data })
			})
			.catch(error => {
				console.log(error);
			})
	}

	updateContactInformation(id, data) {
		console.log('updateContactInformation function.');
		console.log('contact id to update', id);
		console.log('contact data to update', data);

		// const index = this.state.contacts.findIndex(contact => contact.id === id);
		// this.setState({
		// 	contacts: update(this.state.contacts, {$splice: [[id, 1, data]]})
		// })

		this.setState({
			contacts: this.state.contacts.map(contact => contact.id === id ? Object.assign({}, contact, data) : contact)
		})
	}

	render()
	{
		const { contacts } = this.state
		return(
			<div>
				<ReactTable
					defaultPageSize={25}
					data={contacts}
					filterable
					columns={[
						{
							Header: 'Property Information',
							columns: [
								{
									Header: 'Community',
									id: 'community',
									accessor: contact => contact.properties[0].community,
									filterMethod: (filter, rows) => matchSorter(rows, filter.value, { keys: ['community'] }),
									filterAll: true,									
								},
								{
									Header: 'Subcommunity',
									id: 'subcommunity',
									accessor: contact => contact.properties[0].name,
									filterMethod: (filter, rows) => matchSorter(rows, filter.value, { keys: ['subcommunity'] }),
									filterAll: true,
								},
								{
									Header: 'Property Number',
									id: 'property_number',
									accessor: contact => contact.properties[0].property_number,
									filterMethod: (filter, rows) => matchSorter(rows, filter.value, { keys: ['property_number'] }),
									filterAll: true
								}
							]
						},
						{
							Header: 'Contact Information',
							columns: [
								{
									Header: 'Name',
									accessor: 'name',
									filterMethod: (filter, rows) => matchSorter(rows, filter.value, { keys: ['name'] }),
									filterAll: true
								},
								{
									Header: 'Mobile',
									accessor: 'mobile',
									filterMethod: (filter, row) => 
										row[filter.id].startsWith(filter.value) ||
										row[filter.id].endsWith(filter.value)
								},
								{
									Header: 'Nationality',
									accessor: 'nationality',
									filterMethod: (filter, rows) => matchSorter(rows, filter.value, { keys: ['nationality'] }),
									filterAll: true,
								}
							]
						},
						{
							Header: 'Notes',
							columns: [
								{
									Header: 'Notes',
									// accessor: ''
								}
							]
						}
					]}
					SubComponent={row => {
						return (
							<UpdateContact contact={row.original} updateContactInformation={(id, contact) => this.updateContactInformation(id, contact)} />
						)
					}}
				/>
			</div>
		)
	}
}

ReactDOM.render(
	<ContactLists />,
	document.getElementById('ContactLists')
)