@extends('frontEnd.master')

@section('title')
Customer | Sign-Up
@endsection

@section('content')
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('public/frontEnd/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center" style="margin-left: 60px">
			Customer Sign-Up
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
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Sign-Up</h1>
                  </div>
                  <form class="user" method="POST" action="{{ route('signup.store') }}">
                    @csrf
                    <div class="form-group">
                      <input type="text" name="name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Your full-name" value="{{old('name')}}">
                      @if ($errors->has('name'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="text" name="mobile" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Mobile number" value="{{old('mobile')}}">
                      @if ($errors->has('mobile'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user"aria-describedby="emailHelp" placeholder="Email address" value="{{old('email')}}">
                      @if ($errors->has('email'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                      @if ($errors->has('password'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <input type="password" name="confirmPassword" class="form-control form-control-user" placeholder="Confirm password">
                      @if ($errors->has('password'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        </span>
                      @endif
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="btn" value="Sign-Up"><br>
                    <i class="fa fa-user"></i> Have an account? <a href="{{route('customer.login')}}"><span>Login here</span></a>
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