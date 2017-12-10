@extends('layouts.admin')

@section('content')
	<form method="POST">
		{{ csrf_field() }}
		<div class="w-full bg-white rounded shadow">
			<div id="ImportContacts"></div>
		</div>
	</form>
@endsection

@section('footer_scripts')
	<script src="/js/ImportContacts.js"></script>
@endsection