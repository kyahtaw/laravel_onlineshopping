@extends ('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"> Brands List</h1>
	</div>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<a  href="{{route('brands.create')}}" class="btn btn-success float-right">Add New Brands</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<br>
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach ($brands as $brand)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$brand->name}}</td>
							<td>
								<img src="{{asset($brand->photo)}}" width="300px" height="300px">
							</td>
							<td>
								<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-warning mx-2">Edit</a>

								<form action="{{route('brands.destroy',$brand->id)}}" method="POST" class="d-inline-block">
									@csrf
									@method('DELETE')
									<input type="submit" class="btn btn-danger  mt-2" value="Delete">
								</form>
								</td>
						</tr>
						@endforeach

						</tbody>
					</table>




				</div>
			</div>
		</div>
	</div>

	@endsection