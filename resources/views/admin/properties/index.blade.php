@extends('layouts.admin')

@section('content')
	<div class="w-full bg-white rounded shadow">
		<div class="pb-6 px-6 py-6">
			<h1 class="text-grey-darker text-2xl font-semibold pb-4">Properties</h1>
			<div class="flex justify-between">
				<div>
					<button class="bg-white border border-solid border-grey-light shadow py-2 px-4 rounded text-grey-dark hover:text-black">
						<i class="fa fa-filter mr-1"></i> Filter
					</button>
				</div>
				<div class="flex">
					<a href="{{ route('admin.properties.create') }}" class="bg-white border border-solid border-grey-light shadow py-2 px-4 rounded text-grey-dark hover:text-black no-underline">
						<i class="fa fa-plus mr-1"></i> New
					</a>
				</div>
			</div>
			<p class="text-grey-dark leading-normal pt-6">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.
			</p>			
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="/js/alert.js"></script>
	@include('flash')
@endsection