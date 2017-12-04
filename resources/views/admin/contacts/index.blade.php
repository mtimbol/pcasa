@extends('layouts.admin')

@section('content')
	<h1 class="text-grey-dark font-semibold py-4">Contacts</h1>

	<div class="w-full bg-white rounded shadow">
		<div class="flex justify-between pb-6 px-6 py-6">
			<div>
				<button class="bg-white border border-solid border-grey-light shadow py-2 px-4 rounded text-grey-dark hover:text-black">
					<i class="fa fa-filter mr-1"></i> Filter
				</button>
			</div>
			<div class="flex">
				<a href="{{ route('admin.contacts.create') }}" class="bg-white border border-solid border-grey-light shadow py-2 px-4 rounded text-grey-dark hover:text-black no-underline">
					<i class="fa fa-plus mr-1"></i> New
				</a>
				<a href="#" class="bg-white border border-solid border-grey-light shadow py-2 px-4 rounded text-grey-dark hover:text-black no-underline ml-1">
					<i class="fa fa-file-excel-o mr-1"></i> Import
				</a>
			</div>
		</div>
		<p class="text-grey-dark leading-normal px-6">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>

		<div class="py-6">
			<table class="w-full">
				<thead>
					<tr class="bg-grey-light">
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Developer</th>
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Community</th>
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Full Name</th>
						<th class="text-grey-darkest font-bold text-xs uppercase tracking-wide font-normal text-left py-3 px-4">Email</th>
					</tr>
				</thead>
				<tbody>
					@foreach (range(1,9) as $index)
					<tr class="border-b hover:text-grey-darkest">
						<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">NAKHEEL</td>
						<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">Al Furjan</td>
						<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">Mark Timbol</td>
						<td class="text-grey-darker hover:text-grey-darkest px-4 py-3">mark.timbol@hotmail.com</td>
					</tr>
					@endforeach								
				</tbody>
			</table>
		</div>
	</div>
@endsection