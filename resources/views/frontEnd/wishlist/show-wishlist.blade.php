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
				<li class="breadcrumb-item active" aria-current="page">Show Wish-list</li>
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
							<th scope="col" class="text-center">Cart</th>
							<th scope="col" class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($wishlists as $key => $wishls)
						<tr class="text-center">
							<td>{{ $key+1 }}</td>
							<td>{{ $wishls->product->name }}</td>
							<td>
								<img src="{{ asset('public/upload/product_images/'.$wishls->product->image) }}" style="width: 90px; height: 90px;" class="img-fluid img-thumbnail">
							</td>
							<td>TK. {{ $wishls->product->price }}</td>
							<td>
								<form action="{{ route('insert.cart') }}" method="POST">
	                            @csrf
		                            <input type="hidden" name="id" value="{{ $wishls->product->id }}">
		                            <input type="hidden" name="qty" value="1">
									<button class="btn btn-warning">Add To Cart</button></td>
								</form>
							<td>
								<a href="{{ route('delete.wishlist',$wishls->id) }}" class="btn btn-danger"><span aria-hidden="true">×</span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div><!-- End .cart-table-container -->
			</div><!-- End .col-lg-8 -->
		</div><!-- End .row -->
	</div><!-- End .container -->		
</main><!-- End .main -->
@endsection