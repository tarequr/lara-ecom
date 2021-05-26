<!-- @if(session('message'))
	<div class="alert alert-success fade in">
	    <a href="#" class="close" data-dismiss="alert">×</a>
	    <strong>{{ session('message')}}</strong>
	</div>
@endif -->

@if(Session::get('message'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{ Session::get('message')}}</strong>
  </div>
@endif

@if(session('deleteMessage'))
	<div class="alert alert-danger fade in">
	    <a href="#" class="close" data-dismiss="alert">×</a>
	    <strong>{{ session('deleteMessage')}}</strong>
	</div>
@endif

<!-- Error Section -->
<!-- Multiple Error show -->
@if($errors->any())
	@foreach($errors->all() as $error)
		<div class="alert alert-danger fade in">
		    <a href="#" class="close" data-dismiss="alert">×</a>
		    <strong>{{ $error }}</strong>
		</div>
	@endforeach
@endif