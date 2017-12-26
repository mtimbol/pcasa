import React from 'react';
import axios from 'axios';

class UpdateProperty extends React.Component
{
	constructor(props) {
		super(props);
		this.state = {
			name: '',
			property_number: '',
			developer: '',
			community: '',
			property_type: '',
			unit_type: '',
			bedrooms: '',
			size: '',
			view: '',
		}
	}

	componentDidMount()
	{
		console.log('UpdateProperty props', this.props);

		axios.get('/api/properties/' + this.props.property_id)
			.then(response => {
				const { data } = response;
				console.log('Get property by id response', data);
				this.setState({
					name: data.name,
					property_number: data.property_number,
					developer: data.developer,
					community: data.community,
					property_type: data.property_type,
					unit_type: data.unit_type,
					bedrooms: data.bedrooms,
					size: data.size,
					view: data.view			
				})
			})
	}

	updateProperty(e) {
		e.preventDefault();

		console.log('updateProperty(e) log', this.state);
	}

	render()
	{
		let state = this.state;

		return (
			<form method="POST" onSubmit={e => this.updateProperty(e)}>
				<div className="px-6 py-6">
					<div className="w-full">
						<div className="flex mb-6">			
							<div className="w-1/2 mr-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Tower name <span className="required">*</span></label>
								<input name="name" value={state.name} onChange={e => this.setState({ name: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>
							<div className="w-1/2 ml-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Property number <span className="required">*</span></label>
								<input name="property_number" value={state.property_number} onChange={e => this.setState({ property_number: e.target.value })} className="shadow border rounded w-full px-3 py-2"/>
							</div>						
						</div>
						<div className="flex mb-6">			
							<div className="w-1/2 mr-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Developer</label>
								<input name="developer" value={state.developer} onChange={e => this.setState({ developer: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>
							<div className="w-1/2 ml-2">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">Community</label>
								<input name="community" value={state.community} onChange={e => this.setState({ community: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>						
						</div>						
						<div className="mb-2">
							<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">About the property</label>
						</div>
						<div className="flex mb-6">
							<div className="w-1/4 mr-2">
								<input name="property_type" value={state.property_type} onChange={e => this.setState({ property_type: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
								<label className="text-grey-darker text-xs block mt-2">Property Type</label>
							</div>
							<div className="w-1/4 mr-2 ml-2">
								<input name="unit_type" value={state.unit_type} onChange={e => this.setState({ unit_type: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
								<label className="text-grey-darker text-xs block mt-2">Unity Type</label>
							</div>
							<div className="w-1/4 mr-2 ml-2">
								<input name="bedrooms" value={state.bedrooms} onChange={e => this.setState({ bedrooms: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
								<label className="text-grey-darker text-xs block mt-2">Bedrooms</label>
							</div>
							<div className="w-1/4 ml-2">
								<input name="size" value={state.size} onChange={e => this.setState({ size: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
								<label className="text-grey-darker text-xs block mt-2">Size <small>(sqf)</small></label>
							</div>																		
						</div>
						<div className="flex mb-6">
							<div className="w-full">
								<label className="text-grey-darker text-xs font-semibold uppercase tracking-wide block mb-2">View</label>
								<input name="view" value={state.view} onChange={e => this.setState({ view: e.target.value })} className="shadow border rounded w-full px-3 py-2" />
							</div>
						</div>											
					</div>
				</div>
				<div className="bg-grey-lighter border-t flex px-6 py-3">
					<div className="w-full flex justify-end">
						<button type="reset" className="text-grey-darker-darker px-4 py-2 mr-2">Cancel</button>
						<button className="bg-gold hover:bg-black text-white px-4 py-2 rounded">Update Property</button>
					</div>
				</div>
			</form>
		)
	}
}

export default UpdateProperty;