@extends ('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"> Categories List</h1>
	</div>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<a  href="{{route('category.create')}}" class="btn btn-success float-right">Add New Category</a>
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
						@foreach ($category as $categoryy)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$categoryy->name}}</td>
							<td>
								<img src="{{asset($categoryy->photo)}}" width="300px" height="300px">
							</td>
							<td>
								<a href="{{route('category.edit',$categoryy->id)}}" class="btn btn-warning mx-2">Edit</a>
								<form action="{{route('category.destroy',$categoryy->id)}}" method="POST" class="d-inline-block">
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