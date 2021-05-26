@extends('frontEnd.master')

@section('title')
Customer | Order-Details
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
	.mytable{
		padding: 10px;
	}
</style>
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="margin-left: 160px;">
	<h2 class="ltext-105 cl0 txt-center">
		Order List
	</h2>
</section>	
<div class="container" style="width: 75%; margin: auto;">
	<div class="row" style="padding: 15px 0px;">
		<div class="col-md-2">
			<ul class="prof">
				<li><a href="{{route('customer.dashboard')}}">My Profile</a></li>
                <li><a href="{{route('customer.password.change')}}">Password Change</a>
				<li><a href="{{route('customer.order.list')}}">My Orders</a></li>
			</ul>
		</div>
		
		<div class="col-md-10">
			<div class="txt-center">
				@if(Session::get('error'))
			        <div class="alert alert-danger alert-dismissible">
			          <button type="button" class="close" data-dismiss="alert">&times;</button>
			          <strong>{{ Session::get('error')}}</strong>
			        </div>
			    @endif
			</div>
			<table class="txt-center mytable table-responsive table-bordered" width="100%">
				<tr>
					<td width="30%">
					</td>
					<td width="40%">
						<h4><strong>Smart Shop</strong></h4>
						<span><strong>Mobile No: </strong>01622574547</span><br>
						<span><strong>Email: </strong>tarequrr8@gmail.com</span><br>
						<span><strong>Address: </strong>Uttara,Dhaka</span>
					</td>
					<td width="30%">
						<strong>Order No: # {{$orders->orderNo}}</strong>
					</td>
				</tr>
				<tr>
					<td><strong>Billing Info: </strong></td>
					<td colspan="2" style="text-align: left;">
						<span>
							<strong class="ml-3"> Name: </strong>{{$orders['shipping']['name']}}
						</span> &nbsp;&nbsp;&nbsp;&nbsp;
						<span>
							<strong class="ml-3"> Mobile No: </strong>{{$orders['shipping']['mobileNo']}}
						</span><br>
						<span>
							<strong class="ml-3"> Email: </strong>{{$orders['shipping']['email']}}
						</span>&nbsp;&nbsp;&nbsp;&nbsp;
						<span>
							<strong class="ml-3"> Address: </strong>{{$orders['shipping']['address']}}
						</span><br>
						<span>
							<strong class="ml-3"> Payment: </strong>
							{{$orders['payment']['paymentMethod']}}
						</span>
					</td>
				</tr>
				<tr>
					<td colspan="3"><strong>Order Details</strong></td>
				</tr>
				<tr>
					<td colspan="2"><strong>Product name & Image</strong></td>
					<td><strong>Quantity & Price</strong></td>
				</tr>
				@foreach($orders['orderDetails'] as $order)
				<tr>
					<td colspan="2"><br>
						<img src="{{url('public/upload/product_images/'.$order['product']['image'])}}" style="width: 90px; height: 90px;"><br>
						<span><strong>Name: </strong>{{$order['product']['name']}}</span>
					</td>
					<td>
						@php
							$subTotal = $order->quantity*$order['product']['price'];
						@endphp
						{{$order->quantity}} x {{$order['product']['price']}} = {{$subTotal}}
					</td>
				</tr>
				@endforeach
				<tr style="background: #e9ecef;">
					<td colspan="2" style="text-align: left; padding: 10px;"><strong style="margin-left: 15px;">Grand Total</strong></td>
					<td><strong>{{$orders->orderTotal}} TK.</strong></td>
				</tr>
			</table>

		</div>
	</div>
</div><br>
@endsection