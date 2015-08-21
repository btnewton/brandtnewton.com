<?php use App\Http\Controllers\PostsController; ?>

@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>New Post</h4></div>
				<div class="panel-body">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				{!! Form::open(array('action' => 'PostsController@store', 'id' => 'create-form', 'class' => 'form-horizontal')) !!}
						<p>Please enter the title of your new post and the subject that it will belong to. Post titles are used for links so they are permanent. The subject may be changed freely.</p>

						<div class="form-group">
							{!! Form::label('title', 'Title', array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-10">
							{!! Form::text('title', $value=null, array('placeholder' => 'Post title', 'class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('subject', 'Subject', array('class' => 'col-sm-2 control-label')) !!}
							<div class="col-sm-10">
							{!! Form::select('subject', $subjects, null, array('class' => 'form-control')) !!}
							</div>
						</div>
						<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-10">
    					<div id="form-submit" class="btn btn-primary"><span class='glyphicon glyphicon-plus' aria-hidden='true'></span>  Create</div>
						</div>
						</div>
				{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$( "#form-submit" ).click(function() {
  $( "#create-form" ).submit();
});
</script>
@endsection