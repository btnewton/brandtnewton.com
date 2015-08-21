@extends('app')

@section('content')	

<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
{!! HTML::style('css/home.css') !!}

<!-- App Home title -->
<div id="app-title-wrapper">
	<div id="app-title">Afterhof</div>
	<div id="app-subtitle" title="J. R. R. Tolkien">Not all who wander are lost</div>
</div>

<!-- Display recent posts -->
@include('sections.postList')

@endsection