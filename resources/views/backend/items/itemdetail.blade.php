@extends ('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"> Item Detail</h1>
	</div>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				{{-- <h3>Your Order Voucherno No:{{$orderdetail->voucherno}}</h3>
				<h3>Your Orderdate:{{$orderdetail->orderdate}}</h3> --}}


				<br>
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<td>ID</td>
							<td>Item Codeno</td>
							<td>Item Name</td>
							<td>Photo</td>
							<td>Price</td>
							<td>Discount</td>
							<td>Description</td>
							<td>Subcatehory_id</td>
							<td>Brand_id</td>
						</tr>
					</thead>
					<tbody>
						{{-- @php
						$i=1;$total=0;$subtotal=0;
						@endphp --}}

						{{-- @foreach ($itemdetails as $itemdetail)
						@php
						dd($itemdetail);
						@endphp --}}
						<tr>
							<td>{{$itemdetails->id}}</td>
							<td>{{$itemdetails->codeno}}</td>
							<td>{{$itemdetails->name}}</td>
							<td>{{$itemdetails->photo}}</td>
							<td>{{$itemdetails->price}}</td>
							<td>{{$itemdetails->discount}}</td>
							<td>{{$itemdetails->description}}</td>
							<td>{{$itemdetails->subcategory_id}}</td>
							<td>{{$itemdetails->brand_id}}</td>	
						</tr>
						{{-- @endforeach --}}
						{{-- <tr>
							<td colspan="5" class="text-right">Total</td>
							<td>{{$total}}</td>
						</tr> --}}

					</tbody>
				</table>




			</div>
		</div>
	</div>
</div>

@endsection