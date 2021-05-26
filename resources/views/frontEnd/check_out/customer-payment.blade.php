@extends('frontEnd.master')

@section('title')
Customer | Payment
@endsection

@section('content')
<style type="text/css">
	.sss{
		float: left;
	}
	.s888{
		height: 40px;
		border: 1px solid #e6e6e6;
	}
</style>
<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92">
		<h2 class="ltext-105 cl0 txt-center" style="margin-left: 160px;">
			Payment Method
		</h2>
	</section>		
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
					<div class="text txt-center">
					@if(Session::get('message'))
				        <div class="alert alert-success alert-dismissible">
				          <button type="button" class="close" data-dismiss="alert">&times;</button>
				          <strong>{{ Session::get('message')}}</strong>
				        </div>
				    @endif
				    @if(Session::get('error'))
				        <div class="alert alert-danger alert-dismissible">
				          <button type="button" class="close" data-dismiss="alert">&times;</button>
				          <strong>{{ Session::get('error')}}</strong>
				        </div>
				    @endif
					</div><br>
					<div class="wrap-table-shopping-cart">
						<table class="table table-hover table-bordered" width="100%">
							<thead>
								<tr>
									<th scope="col" class="text-center">Sl No.</th>
									<th scope="col" class="text-center">Name</th>
									<th scope="col" class="text-center">Image</th>
									<th scope="col" class="text-center">Price</th>
									<th scope="col" class="text-center">Quantity</th>
									<th scope="col" class="text-center">Total Price</th>
									<th scope="col" class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@php 
									$i=1;  
									$total=0; 
									$contents = Cart::content();
								@endphp
								@foreach($contents as $product)
								<tr class="text-center">
									<td>{{ $i++ }}</td>
									<td>{{ $product->name }}</td>
									<td>
										<img src="{{ asset('public/upload/product_images/'.$product->options->image) }}" style="width: 90px; height: 90px;" class="img-fluid img-thumbnail">
									</td>
									<td>TK. {{ $product->price }}</td>
									<td>
										<form method="post" action="{{ route('update.cart') }}">
											@csrf

                                            <input type="hidden" name="rowId" value="{{ $product->rowId }}">
											<input type="number" name="qty" value="{{ $product->qty }}" class="form-control" style="width: 80px; display: inline;" min="1">
											<input type="submit" name="btn" value="Update" class="btn btn-success">
										</form>
									</td>

										<td>TK. {{ $product->subtotal }}</td>
									<td>
										<!-- This (rowId) collect from cart package -->
										<a href="{{ route('delete.cart',$product->rowId) }}" class="btn btn-danger"><span aria-hidden="true">×</span></a>
									</td>
								</tr>
								@php
									$total += $product->subtotal;
								@endphp
								@endforeach
								<tr style="background: #e2fdcd; font-size: 20px;">
									<td colspan="5"><strong>Grand Price</strong></td>
									<td colspan="2"><STRONG>TK. {{ $total }}</STRONG></td>

								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- kk -->
			</div>
			<div class="row">
				<div class="col-md-4">
					<h3>Select Payment Method</h3>
				</div>
				<div class="col-md-4">
					<form method="post" action="{{route('customer.payment.store')}}">
						@csrf

						@foreach($contents as $content)
						<input type="hidden" name="productId" value="{{$content->id}}">
						@endforeach
						<input type="hidden" name="orderTotal" value="{{$total}}">

						<h4><input type="radio" name="paymentMethod" value="Hand Cash" class=""> 
						Hand Cash</h4>

						<strong class="text-danger"> {{$errors->has('paymentMethod') ? $errors->first('paymentMethod') : '' }} </strong>
						<input type="submit" name="btn" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection