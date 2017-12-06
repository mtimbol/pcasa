@extends('layouts.admin')

@section('content')
	<div class="w-full bg-white rounded shadow">
		<div class="pb-6 px-6 py-6">
			<h1 class="text-grey-darker text-2xl font-semibold pb-4">Contacts</h1>
			<div class="flex justify-between">
				<div>
					<button class="bg-white border border-solid border-grey-light shadow py-2 px-4 rounded text-grey-dark hover:text-black">
						<i class="fa fa-filter mr-1"></i> Filter
					</button>
				</div>
				<div class="flex">
					<a href="{{ route('admin.contacts.create') }}" class="bg-white border border-solid border-grey-light shadow py-2 px-4 rounded text-grey-dark hover:text-black no-underline">
						<i class="fa fa-plus mr-1"></i> New
					</a>
					<a href="{{ route('admin.contacts.import.index') }}" class="bg-white border border-solid border-grey-light shadow py-2 px-4 rounded text-grey-dark hover:text-black no-underline ml-1">
						<i class="fa fa-upload mr-1"></i> Import
					</a>
				</div>
			</div>
			<p class="text-grey-dark leading-normal pt-6">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation.
			</p>			
		</div>

		<div class="pb-6">
			<table class="w-full">
				<thead>
					<tr class="bg-grey-lighter">
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Developer</th>
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Community</th>
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Full Name</th>
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Email</th>
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Client Type</th>
					</tr>
				</thead>
				<tbody>
					@foreach (range(1,9) as $index)
						@foreach ($contacts as $contact) 
							<tr class="border-b hover:text-grey-darkest">
								<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">NAKHEEL</td>
								<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">Al Furjan</td>
								<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">{{ $contact->name }}</td>
								<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">{{ $contact->email }}</td>
								<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">{{ $contact->client_type }}</td>
							</tr>
						@endforeach	
					@endforeach							
				</tbody>
			</table>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="/js/alert.js"></script>
	@include('flash')
@endsection