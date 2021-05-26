
@extends('frontEnd.master')

@section('title')
Customer | Login
@endsection

@section('content')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontEnd/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center" style="margin-left: 60px">
			Customer Login
		</h2>
	</section>	
	<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text txt-center">
                    @if(Session::get('success'))
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('success')}}</strong>
                      </div>
                    @endif
                    @if(Session::get('error'))
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('error')}}</strong>
                      </div>
                    @endif
                  </div><br>
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome to shopping!..</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      @if ($errors->has('email'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      @if ($errors->has('password'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="btn" value="Login"><br>
                    <i class="fa fa-user"></i> Don't have an account? <a href="{{route('customer.signup')}}"><span>Sign-Up new account</span></a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><br>
@endsection