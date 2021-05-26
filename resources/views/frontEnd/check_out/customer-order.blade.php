@extends('frontEnd.master')

@section('title')
Customer | Payment
@endsection

@section('content')
	<style type="text/css">
		.prof li{
			background: #17818F;
			padding: 7px;
			margin: 3px;
			border-radius: 15px;
		}
		.prof li a{
			color: #fff;
			padding-left: 15px;
		}
	</style>
	<section class="bg-img1 txt-center p-lr-15 p-tb-92">
		<h2 class="ltext-105 cl0 txt-center" style="margin-left: 160px;">
			Order List
		</h2>
	</section>	
	<div class="container">
		<div class="row" style="padding: 15px 0px;">
			<div class="col-md-2">
				<ul class="prof">
					<li><a href="{{route('customer.dashboard')}}">My Profile</a></li>
                    <li><a href="{{route('customer.password.change')}}">Password Change</a>
					<li><a href="{{route('customer.order.list')}}">My Orders</a></li>
				</ul>
			</div>
			<div class="col-md-10">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Order No</th>
							<th>Total Ammount</th>
							<th>Payment Type</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($orders as $order)
						<tr>
							<td># {{$order->orderNo}}</td>
							<td>{{$order->orderTotal}}</td>
							<td>{{$order['payment']['paymentMethod']}}</td>
							<td>{{ date('d-M-Y', strtotime($order->created_at)) }}</td>
							<td>
								@if($order->status == '0')
									<span class="bg-warning" style="padding: 5px;">Unapproved</span>
								@elseif($order->status == '1')
									<span class="bg-success" style="padding: 5px;">Approved</span>
								@endif
							</td>
							<td>
								<a href="{{route('customer.order.details',$order->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye" title="Details"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div><br>
@endsection