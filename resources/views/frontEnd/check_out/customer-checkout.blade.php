@extends('frontEnd.master')

@section('title')
Customer | Billing
@endsection

@section('content')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92">
		<h2 class="ltext-105 cl0 txt-center" style="margin-left: 160px;">
			Customer Billing Information
		</h2>
	</section>	
	<!--About section-->
	<section class="about_us">
	  <div class="container">
		<div class="row">
		  <div class="col-md-12">
			<div class="row justify-content-center">
			 <div class="col-xl-8 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg">
			      <div class="card-body p-0">
			        <!-- Nested Row within Card Body -->
			        <div class="row">
			          <div class="col-lg-12">
			            <div class="p-5">
			              <div class="text-center">
			                <h1 class="h4 text-gray-900 mb-4">Billing Information</h1>
			              </div>
			              <form class="user" method="POST" action="{{route('checkout.store')}}" >
			                 @csrf
					               
			                <div class="form-group row">
			                  <label class="col-sm-2 col-form-label">Full Name</label>
			                  <div class="col-sm-9">
			                     <input type="text" name="name" class="form-control">
			                     <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
			                  </div>
			                </div>
			                <div class="form-group row">
			                  <label class="col-sm-2 col-form-label">Email</label>
			                  <div class="col-sm-9">
			                     <input type="email" name="email" class="form-control">
			                  </div>
			                </div>
			                <div class="form-group row">
			                  <label class="col-sm-2 col-form-label">Mobile No</label>
			                  <div class="col-sm-9">
			                     <input type="text" name="mobileNo" class="form-control">
			                     <strong class="text-danger"> {{$errors->has('mobileNo') ? $errors->first('mobileNo') : '' }} </strong>
			                  </div>
			                </div>
			                <div class="form-group row">
			                  <label class="col-sm-2 col-form-label">Address</label>
			                  <div class="col-sm-9">
			                     <input type="text" name="address" class="form-control">
			                     <strong class="text-danger"> {{$errors->has('address') ? $errors->first('address') : '' }} </strong>
			                  </div>
			                </div>
		                    <div class="form-group row">
	                       <div class="col-sm-12">
	                          <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Submit Information">
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
</section><br>
@endsection