<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="delete-modal">Delete Post</h4>
      </div>
      <div class="modal-body">
      Type the name of the post to unlock the delete button <input type="text" name="confirmDelete" id="confirm-delete-field">

      {!! Form::open(array('action' => array('PostsController@destroy', $post->title), 'id' => 'delete-form', 'class' => 'form-horizontal')) !!}
        <!-- Method spoof -->
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="postTitle" id="post-title-field" value="{{$post->title}}">
      {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <div id="delete-button" class="btn btn-danger disabled" title="Last chance!"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

// Check that text equals title
$( "#confirm-delete-field" ).keyup(function() {
  if ($( "#confirm-delete-field" ).val() == $( "#post-title-field" ).val()) {
      $( '.modal-footer #delete-button' ).removeClass("disabled");
  } else {
      $( '.modal-footer #delete-button' ).addClass("disabled");
  }
});

// Submit form on save button click
$( ".modal-footer #delete-button" ).click(function() {
    $( "#delete-form" ).submit();
});
</script>
