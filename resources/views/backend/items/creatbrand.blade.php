@extends ('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Brand Create Form</h1>
	</div>
	<div>
		<form class="col-6" action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row form-group">
				<label for="name" class="col-md-2">Name</label>
				<div class="col-md-8">
					<input type="text" name="name" class="form-control">
					@error('name')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
				</div>
			</div>

			<div class="row form-group">
				<label for="photo" class="col-md-2">Photo</label>
				<div class="col-md-8">
					<input type="file" name="photo" class="form-control-file">
					@error('photo')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
					
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-2">
					<input type="submit" class="btn btn-info form-control" value="Create" name="btnsubmit">
				</div>
			</div>


		</form>
	</div>
</div>
@endsection