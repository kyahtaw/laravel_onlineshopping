@extends ('backendtemplate')
@section('content')
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item Edit Form</h1>
	</div>
	<div>
		<form class="col-6" action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row form-group">
				<label for="codeno" class="col-md-2">Code No</label>
				<div class="col-md-8">
					<input type="text" name="codeno" class="form-control" readonly="readonly" value="{{$item->codeno}}">
					@error('codeno')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
				</div>
			</div>

			<div class="row form-group">
				<label for="name" class="col-md-2">Name</label>
				<div class="col-md-8">
					<input type="text" name="name" class="form-control"  value="{{$item->name}}">
					@error('name')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
				</div>
			</div>

			<div class="row form-group">
				<label for="oldphoto" class="col-md-2">Photo</label>
				<div class="col-md-8">
					<input type="file" name="photo" class="form-control-file">
					
					<input type="hidden" name="oldphoto" class="form-control-file" value="{{asset($item->photo)}}">
					<img src="{{asset($item->photo)}}" class="img-fluid w-50">
				</div>
			</div>

			<div class="row form-group">
				<label for="price" class="col-md-2">Price</label>
				<div class="col-md-8">
					<input type="number" name="price" class="form-control" value="{{$item->price}}">
					@error('price')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
				</div>
			</div>


			<div class="row form-group">
				<label for="discount" class="col-md-2">Discount</label>
				<div class="col-md-8">
					<input type="number" name="discount" class="form-control" value="{{$item->discount}}">
					@error('discount')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
				</div>
			</div>

			<div class="row form-group">
				<label for="description" class="col-md-2">Description</label>
				<div class="col-md-8">
					<textarea rows="2" class="form-control" name="description" value="0">{{$item->description}}</textarea>
					@error('description')
				<div class="alert alert-danger">{{$message}}</div>
				@enderror
				</div>
			</div>


			<div class="row form-group">
				<label for="brand" class="col-md-2">Brand</label>
				<div class="col-md-8">
					<select class="form-control form-control-md" id="inputBrand" name="brand">
						<optgroup label="Choose Brand">
							@foreach($brands as $brand)
							<option value="{{$brand->id}}" @if($brand->id==$item->brand_id){{'selected'}} @endif>{{$brand->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
			</div>

			<div class="row form-group">
				<label for="brand" class="col-md-2">Subcategory</label>
				<div class="col-md-8">
					<select class="form-control form-control-md" id="inputBrand" name="subcategory">
						<optgroup label="Choose Subcategory">
							@foreach($subcategories as $subcategory)
							<option value="{{$subcategory->id}}" @if($subcategory->id==$item->subcategory_id){{'selected'}} @endif>{{$subcategory->name}}</option>
							@endforeach
						</optgroup>
					</select>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-2">
					<input type="submit" class="btn btn-info form-control" value="Update" name="btnsubmit">
				</div>
			</div>


		</form>
	</div>
</div>
@endsection