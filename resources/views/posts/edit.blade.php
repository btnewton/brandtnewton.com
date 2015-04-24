@extends('app')

@section('content')
{!! HTML::style('css/editor.css') !!}

<link rel="stylesheet" type="text/css" href="/js/quilljs/quill.css">
<link rel="stylesheet" type="text/css" href="/js/quilljs/styles.css">

<div class="container">
	<div class="heading-wrapper"><h2 id="post-title">{{ $post->title }}</h2></div>
	<div class="quill-wrapper">
			<div id="toolbar-toolbar" class="toolbar ql-toolbar ql-snow">
				<span class="ql-format-group">
					<span title="Bold" class="ql-format-button ql-bold"></span>
					<span class="ql-format-separator"></span>
					<span title="Italic" class="ql-format-button ql-italic"></span>
					<span class="ql-format-separator"></span>
					<span title="Underline" class="ql-format-button ql-underline"></span>
					<span class="ql-format-separator"></span>
					<span title="Strikethrough" class="ql-format-button ql-strike"></span>
				</span>
				<span class="ql-format-group">
					<span title="List" class="ql-format-button ql-list"></span>
					<span class="ql-format-separator"></span>
					<span title="Bullet" class="ql-format-button ql-bullet"></span>
					<span class="ql-format-separator"></span>
					<span title="Link" class="ql-format-button ql-link"></span>
					<span class="ql-format-separator"></span>
        			<span title="Image" class="ql-format-button ql-image"></span>
				</span>
			</div>
			<div id="toolbar-editor" class="editor ql-container ql-snow">
				{!! $post->draft_content !!}
			</div>
	</div>

	{!! Form::open(array('action' => array('PostsController@update', $post->title), 'id' => 'update-form', 'class' => 'form-horizontal')) !!}
		<!-- Method spoof -->
		<input type="hidden" name="_method" value="PUT">
		<!-- Typing events will update this fields value -->
		<input type="hidden" id="editorContent" name="editorContent" value="{{ $post->draft_content }}">
		<div class="form-group">
			<h4>Information</h4>
			{!! Form::label('excerpt', 'Excerpt', array('class' => 'col-sm-2 control-label')) !!}
			<div class="col-sm-10">
			{!! Form::textarea('excerpt', $value=$post->excerpt, array('placeholder' => 'Post excerpt', 'class' => 'form-control', 'size' => '30x2')) !!}
			</div>
		</div>
		<div class="form-group">
			{!! Form::label('subject', 'Subject', array('class' => 'col-sm-2 control-label')) !!}
			<div class="col-sm-10">
			{!! Form::select('subject', $subjects, $post->subject, array('class' => 'form-control')) !!}
			</div>
		</div>
		<div class="form-group">
			<h4>Settings</h4>
			<div class="col-sm-10">
				{!! Form::radio('postStatus', 'hide', ($post->status == 'hidden'), array('title' => 'Hide post')) !!}Hide<br>
				{!! Form::radio('postStatus', 'publish', ($post->status == 'published'), array('title' => 'Publish post')) !!}Publish<br>
			</div>
		</div>
		<div class="form-group">
			<h4>Save</h4>
			<p>By clicking save you are verifying that you have read our <a href="/res/RulesAndBestPractices.pdf" target="_blank">Rules &amp; Best Practices</a> documentation.</p>
			<div class="col-sm-10">
				{!! Form::checkbox('saveAction', 'publish') !!}Overwrite published content<br>
				<div id="form-submit" class="btn btn-success"><span class='glyphicon glyphicon-floppy-disk' aria-hidden='true'></span>  Save</div>
			</div>
		</div>
	{!! Form::close() !!}

	<div class="panel panel-danger">
	  	<div class="panel-heading">
	    	<h3 class="panel-title">Danger Zone</h3>
	  	</div>
	  	<div class="panel-body">
	  		These changes have lasting effects. Tread lightly...
	  		<ul>
				<li><b>Transfer ownership of this post</b> <div id="transfer-button" class="btn btn-danger" title="Transfer post" data-toggle="modal" data-target="#transfer"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Transfer</div></li>
				<li><b>Permanently delete this post</b> <div id="delete-button" class="btn btn-danger" title="Careful!" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</div></li>
			</ul>
		</div>
	</div>
</div>

@include('posts.modals.transferPost')
@include('posts.modals.deletePost')

<!-- Include the Quill library -->
<script src="//cdn.quilljs.com/0.19.10/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
	var editor = new Quill('#toolbar-editor', {
	    modules: {
			toolbar: { container: '#toolbar-toolbar' },
			"link-tooltip" : true,
			"image-tooltip" : true,
	    },
	    	theme: 'snow'
	});

	editor.on('text-change', function(delta, source) {
		$( "#editorContent" ).val(editor.getHTML());
	});
</script>

<script type="text/javascript">
// $( "#confirmDelete" ).on('text-change', checkText());

	// Submit form on save button click
	$( "#form-submit" ).click(function() {
  		$( "#update-form" ).submit();
	});
</script>


@endsection



