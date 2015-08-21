@if ($posts->count() == 0)
	
	<!-- No posts found -->

	<div class="empty"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> No posts!</div>
@else

	<ul class="list-unstyled">

		<!-- List all posts -->

		@foreach ($posts as $post)
			<li class="post {{ (($post->status == 'published')? 'published-post' : 'hidden-post' ) }}">

				<!-- Link to edit page if user is author or admin -->

				@if (Auth::user() != null && ($post->author == Auth::user()->pseudonym || Auth::user()->rank == 'admin'))
					<a class="edit" href="{{ url('/posts/'.$post->title.'/edit') }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
				@endif
				
				<a class='title' href="{{ url('posts/'.$post->title) }}">{{ $post->title }}</a>
				
				<!-- Display excerpt if available -->

				@if ($post->excerpt != null || $post->excerpt != "")
					<div class='excerpt'>"{{ $post->excerpt }}"</div>
				@endif
				<div class="info">
					<span class='author'><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{ $post->author }}</span>
					<span class='section'><a href="{{ url('/subjects/'.$post->subject) }}"><span class="hash-tag">#</span> {{ $post->subject }}</a></span>
					<span class='updated'><span class="glyphicon glyphicon-time" aria-hidden="true"></span> {{ date("d F Y", strtotime($post->updated_at)) }}</span>
					@if ($post->status == 'hidden')
						<span class='status'>Hidden</span>
					@endif
				</div>
			</li>
		@endforeach
	</ul>
@endif