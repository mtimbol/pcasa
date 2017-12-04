@extends('layouts.admin')

@section('content')
	<h1 class="text-grey-dark font-semibold py-4">Create new contact</h1>

	<div class="w-full bg-white rounded shadow">
		<div class="px-6 py-6">
			<p class="text-grey-dark leading-normal">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>

			<!--Personal information-->
			<div class="flex py-4">
				<div class="w-1/2 mr-8">
					<h4 class="text-grey-dark mb-2">Contact Information</h4>
					<p class="text-grey text-xs font-normal leading-normal">
						TODO: If the email or phone is existing on the database, the fields will be automatically filled.
					</p>
				</div>
				<div class="w-full">
					<div class="flex mb-6">
						<div class="w-1/2 mr-2">
							<label class="text-grey-darker text-sm block mb-2">Email</label>
							<input class="shadow border rounded w-full px-3 py-2" />
						</div>
						<div class="w-1/2 ml-2">
							<label class="text-grey-darker text-sm block mb-2">Phone</label>
							<input class="shadow border rounded w-full px-3 py-2" />
						</div>						
					</div>
					<div class="mb-2">
						<label class="text-grey-darker text-sm block mb-2">Full Name</label>
					</div>
					<div class="flex mb-6">
						<div class="w-16 mr-2">
							<input class="shadow border rounded w-full px-3 py-2" />
							<label class="text-grey text-xs block mt-2">Salutation</label>
						</div>
						<div class="w-1/3 mr-2 ml-2">
							<input class="shadow border rounded w-full px-3 py-2" />
							<label class="text-grey text-xs block mt-2">First</label>
						</div>
						<div class="w-1/3 mr-2 ml-2">
							<input class="shadow border rounded w-full px-3 py-2" />
							<label class="text-grey text-xs block mt-2">Middle</label>
						</div>
						<div class="w-1/3 ml-2">
							<input class="shadow border rounded w-full px-3 py-2" />
							<label class="text-grey text-xs block mt-2">Last</label>
						</div>																		
					</div>					
				</div>
			</div>

			<!--Company information-->
			<div class="flex py-4">
				<div class="w-1/2 mr-8">
					<h4 class="text-grey-dark mb-2">Company Information</h4>
					<p class="text-grey text-xs font-normal leading-normal">
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
				<div class="w-full">
					<div class="flex mb-6">
						<div class="w-1/2 mr-2">
							<label class="text-grey-darker text-sm block mb-2">Company</label>
							<input class="shadow border rounded w-full px-3 py-2" />
						</div>
						<div class="w-1/2 ml-2">
							<label class="text-grey-darker text-sm block mb-2">Position</label>
							<input class="shadow border rounded w-full px-3 py-2" />
						</div>						
					</div>
				</div>
			</div>

			<!--Property information-->
			<div class="flex py-4">
				<div class="w-1/2 mr-8">
					<h4 class="text-grey-dark mb-2">Property Information</h4>
					<p class="text-grey text-xs font-normal leading-normal">
						Search for propery enquired for.
					</p>
				</div>
				<div class="w-full">
					<div class="flex mb-6">
						<div class="w-full">
							<label class="text-grey-darker text-sm block mb-2">Property</label>
							<div class="relative">
								<i class="fa fa-search absolute text-grey-dark mt-2 ml-3"></i>
								<input class="shadow border rounded w-full px-3 py-2 pl-8" />
							</div>
						</div>
					</div>
				</div>
			</div>			
			<!--Document information-->
			<!--Assign to-->
		</div>
	</div>
@endsection