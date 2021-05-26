@extends('frontEnd.master')

@section('title')
Customer | Dashboard
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
		Pssword Change
	</h2>
</section>	
<div class="container" style="width: 75%; margin: auto;">
	<div class="row" style="padding: 15px 0px;">
		<div class="col-md-3">
			<ul class="prof">
				<li><a href="{{route('customer.dashboard')}}">My Profile</a></li>
                <li><a href="{{route('customer.password.change')}}">Password Change</a>
				<li><a href="{{route('customer.order.list')}}">My Orders</a></li>
			</ul>
		</div>
		<div class="col-md-9">
		<div class="row justify-content-center">
		  <div class="col-xl-12 col-lg-12 col-md-9">
		    <div class="card o-hidden border-0 shadow-lg">
		      <div class="card-body p-0">
		        <!-- Nested Row within Card Body -->
		        <div class="row">
		          <div class="col-lg-12">
		            <div class="p-5">
		            	@if(Session::get('error'))
	                      <div class="alert alert-danger alert-dismissible">
	                        <button type="button" class="close" data-dismiss="alert">&times;</button>
	                        <strong>{{ Session::get('error')}}</strong>
	                      </div>
	                    @endif
		              <div class="text-center">
		                <h3 class="text-center text-success"> <!-- {{ Session::get('message')}}  --></h3>
		                <h1 class="h4 text-gray-900 mb-4">Password Change!</h1>
		              </div>
		              <form class="user" method="POST" action="{{ route('customer.password.update') }}">
                     @csrf
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Current Password</label>
                      <div class="col-sm-8">
                         <input type="password" name="currentPassword" class="form-control">
                         <strong class="text-danger"> {{$errors->has('currentPassword') ? $errors->first('currentPassword') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">New Password</label>
                      <div class="col-sm-8">
                         <input type="password" name="newPassword" class="form-control">
                         <strong class="text-danger"> {{$errors->has('newPassword') ? $errors->first('newPassword') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label">Confirm Password</label>
                      <div class="col-sm-8">
                         <input type="password" name="confirmPassword" class="form-control">
                         <strong class="text-danger"> {{$errors->has('confirmPassword') ? $errors->first('confirmPassword') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-4 col-form-label"></label>
                      <div class="col-sm-8">
                        <input type="submit" name="btn" class="btn btn-info btn-user btn-block" value="Update Password">
                      </div>
                    </div>
                  </form>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	  </div>
	</div>
</div>
<br>
@endsection