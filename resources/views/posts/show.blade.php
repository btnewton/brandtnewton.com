@extends('app')

@section('content')
{!! HTML::style('css/post.css') !!}

<div class="container">
@if ($post != null)
<div class="heading-wrapper"><h2>{{ $post->title }}</h2></div>
@endif
	<div class="panel-body">
	@if ($post != null)
		<div class="info">
			<span class='author'><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $post->author }}</span>
			<span class='section'><a href="{{ url('/subjects/'.$post->subject) }}"><span class="hash-tag">#</span> {{ $post->subject }}</a></span>
			<span class='updated'><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ date("d F Y",strtotime($post->updated_at)) }}</span>
			@if ( ! Auth::guest())
				@if ( ! Auth::guest() && ($user->pseudonym == $post->author || $user->rank == 'admin'))
					<span class='edit'><a href="{{ url('/posts/'.$post->title.'/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a></span>
				@else
					<span class='suggest-change'><a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Suggest Change</a></span>
				@endif
			@endif
			@if ($post->status == 'hidden')
				<span class='status'>This post is hidden</span>
			@endif
		</div>
		{!! $post->published_content !!}
	@else
		<div class="panel-body">Oops! That post seems to be temporarily unavailable. Please try again later.</div>
	@endif
	</div>
</div>
@endsection