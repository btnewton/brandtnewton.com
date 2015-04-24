@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>{{ $subject }}</h4></div>
				<div class="panel-body">
					@if ($posts->count() == 0)
						<p>No posts!</p>
					@else
						<ul class="list-unstyled">
							@foreach ($posts as $post)
								<li class="post">
									<div><a class='title' href="{{ url('subjects/'.$posts.'/'.$post->title) }}">{{ $post->title }}</a></div>
									@if ($post->excerpt !== "")
										"<i class='excerpt'>{{ $post->excerpt }}</i>"
									@endif
									<div class='updated'>{{ date("d F Y",strtotime($post->updated_at)) }}</div>
								</li>
							@endforeach
						</ul>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection