@extends('layouts.admin')

@section('content')
	<form method="POST">
		{{ csrf_field() }}
		<div class="w-full bg-white rounded shadow">
			<div>
				<div class="px-6 py-6">
					<h1 class="text-grey-darker text-2xl font-semibold pb-4">Import contacts</h1>
					<p class="text-grey-dark leading-normal">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat.
					</p>

					<!--Personal information-->
					<div class="flex py-4 mt-4">
						<div class="w-1/2 mr-8">
							<h4 class="text-grey-dark mb-2">Contact Information</h4>
							<p class="text-grey text-xs font-normal leading-normal mb-2">
								TODO: If the email or phone is existing on the database, the fields will be automatically filled.
							</p>
							<p class="text-grey text-xs font-normal leading-normal">
								Fields with (*) needs to be filled up.
							</p>					
						</div>
						<div class="w-full">
							<div class="flex mb-6">
								<div class="w-full">
									<label class="text-grey text-xs font-semibold uppercase tracking-wide block mb-4">Browse CSV</label>
									<input type="file" name="csv" class="shadow border rounded w-full px-3 py-2" />
								</div>								
							</div>
						</div>
					</div>			
				</div>
				<div class="flex bg-grey-lighter border-t px-6 py-3">
					<div class="w-full flex justify-end">
						<button type="reset" class="text-grey-darker px-4 py-2 mr-2">Cancel</button>
						<button class="bg-blue hover:bg-blue-dark text-white px-4 py-2 rounded">Import</button>
					</div>
				</div>
			</div>
		</div>
	</form>
@endsection