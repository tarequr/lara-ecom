@extends('frontEnd.master')

@section('title')
Show | Cart
@endsection

@section('content')
<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
				<li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
			</ol>
		</div>
	</nav>

	<div class="container mb-6">
		<div class="row">
			<div class="col-lg-12">
                <div class="text txt-center">
                @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong class="text-center">{{ Session::get('message')}}</strong>
                    </div>
                @endif
                </div><br>
				<div class="cart-table-container">
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
                    <tfoot style="margin-top: 20px;">
                        <tr>
                            <td colspan="7" class="clearfix">
                                <div class="float-left">
                                    <a href="{{ route('home.page') }}" class="btn btn-outline-secondary">Continue Shopping</a>
                                </div><!-- End .float-left -->

								@if(@Auth::user()->id !==NULL && Session::get('shippingId') == NULL)
                                <div class="float-right">
                                    <a href="{{ route('customer.checkout') }}" class="btn btn-outline-secondary btn-update-cart">Checkout</a>
                                </div><!-- End .float-right -->
								@elseif(@Auth::user()->id !==NULL && Session::get('shippingId') != NULL)
								<div class="float-right">
                                    <a href="{{ route('customer.payment') }}" class="btn btn-outline-secondary btn-update-cart">Checkout</a>
                                </div><!-- End .float-right -->
								@else
								<div class="float-right">
                                    <a href="{{ route('customer.login') }}" class="btn btn-outline-secondary btn-update-cart">Checkout</a>
                                </div><!-- End .float-right -->
								@endif
                            </td>
                        </tr>
                    </tfoot>
				</table>
				</div><!-- End .cart-table-container -->
			</div><!-- End .col-lg-8 -->
		</div><!-- End .row -->
	</div><!-- End .container -->		
</main><!-- End .main -->
@endsection