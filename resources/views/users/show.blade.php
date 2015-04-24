@extends('app')

@section('content')
<div class="container">
<div class="heading-wrapper"><h2>{{ $user->pseudonym }}</h2></div>
	<div class="panel-body user">
		<ul id="status">
			<li>Email: {{ $user->email }}</li>
			<li>Rank: {{ $user->rank }}</li>
			<li>Status: {!! '<span id='.$user->status.'>'.$user->status.'</span>' !!}</li>
			<li>Joined: {{ date("d F Y",strtotime($user->created_at)) }}</li>
		</ul>
		@include('sections.postList')
	</div>
</div>
@endsection