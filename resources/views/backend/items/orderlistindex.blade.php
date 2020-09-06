@extends ('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"> Order List</h1>
	</div>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<br>
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<th>No</th>
							<th>Voucherno No</th>
							<th>Orderdate</th>
							<th>Status</th>
							<th>Note</th>
							<th>User_id</th>
							<th>Total</th>
							<th>Action</th>

						</tr>
					</thead>
					<tbody>
						@php $i=1; @endphp
						@foreach ($orders as $order)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$order->voucherno}}</td>
							<td>{{$order->orderdate}}</td>
							<td>{{$order->status}}</td>
							<td>{{$order->note}}</td>
							<td>{{$order->user_id}}</td>
							<td>{{$order->total}}MMK</td>
							<td>
								<a href="{{route('orders.show',$order->id)}}" class="btn btn-info mx-2">Detail</a>
								<form action="{{route('orders.destroy',$order->id)}}" method="POST" class="d-inline-block">
									@csrf
									@method('DELETE')
									<input type="submit" class="btn btn-danger d-inline-block mt-2" value="Delete">
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