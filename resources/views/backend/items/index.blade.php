@extends ('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"> Items List</h1>
	</div>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<a  href="{{route('items.create')}}" class="btn btn-success float-right">Add New</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<br>
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<th>No</th>
							<th>Code No</th>
							<th>Name</th>
							<th>Price</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach ($items as $item)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$item->codeno}}</td>
							<td>{{$item->name}}</td>
							<td>{{$item->price}}MMK</td>
							<td><a href="{{route('items.show',$item->id)}}" class="btn btn-info mx-2">Detail</a>
								<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning mx-2">Edit</a>


								<form action="{{route('items.destroy',$item->id)}}" method="POST" class="d-inline-block">
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