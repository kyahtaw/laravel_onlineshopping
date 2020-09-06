@extends ('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"> SubCategories List</h1>
	</div>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<a  href="{{route('subcategory.create')}}" class="btn btn-success float-right">Add New SubCategory</a>
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
							<th>Category ID</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach ($subcategory as $subcategoryy)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$subcategoryy->name}}</td>
							<td>
								{{($subcategoryy->category_id)}}
							</td>
							<td>
								<a href="{{route('subcategory.edit',$subcategoryy->id)}}" class="btn btn-warning mx-2">Edit</a>
								<form action="{{route('subcategory.destroy',$subcategoryy->id)}}" method="POST" class="d-inline-block">
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