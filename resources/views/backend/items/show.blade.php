@extends ('backendtemplate')
@section('content')

<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"> Order Detail</h1>
	</div>
	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">
				<h3>Your Order Voucherno No:{{$orderdetail->voucherno}}</h3>
				<h3>Your Orderdate:{{$orderdetail->orderdate}}</h3>


				<br>
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<td>No</td>
							<td>Item Name</td>
							<td>Name</td>
							<td>Price</td>
							<td>Qty</td>
							<td>Subtotal</td>
						</tr>
					</thead>
					<tbody>
						@php
						$i=1;$total=0;$subtotal=0;
						@endphp

						@foreach ($orderdetail->items as $orderitems)
						@php
						$subtotal=$orderitems->price*$orderitems->pivot->qty;
						$total+=$subtotal;
						@endphp
						<tr>
							<td>{{$i++}}</td>
							<td>{{$orderitems->name}}</td>
							<td>{{$orderitems->brand->name}}</td>
							<td>{{$orderitems->price}}</td>
							<td>{{$orderitems->pivot->qty}}</td>
							<td>{{$subtotal}}MMK</td>
							<td></td>	
						</tr>
						@endforeach
						<tr>
							<td colspan="5" class="text-right">Total</td>
							<td>{{$total}}</td>
						</tr>

					</tbody>
				</table>




			</div>
		</div>
	</div>
</div>

@endsection