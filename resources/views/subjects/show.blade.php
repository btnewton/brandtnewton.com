@extends('app')

@section('content')
<div class="container">
<div class="heading-wrapper"><h2>{{ $subject }}</h2></div>
	<div class="panel-body">
		@include('sections.postList')
	</div>
</div>
@endsection