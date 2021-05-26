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
        Update Profile
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
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Profile!</h1>
                      </div>
                      <form class="user" method="POST" action="{{route('customer.update.profile',$editData->id)}}" enctype="multipart/form-data">
                         @csrf
                       
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Full Name</label>
                          <div class="col-sm-9">
                             <input type="text" name="name" value="{{$editData->name}}" class="form-control">
                             <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-9">
                             <input type="email" name="email" value="{{$editData->email}}" class="form-control">
                             <strong class="text-danger"> {{$errors->has('email') ? $errors->first('email') : '' }} </strong>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Mobile No</label>
                          <div class="col-sm-9">
                             <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
                             <strong class="text-danger"> {{$errors->has('mobile') ? $errors->first('mobile') : '' }} </strong>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-9">
                             <input type="text" name="address" value="{{$editData->address}}" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-9">
                             <select class="form-control" name="gender">
                                <option value="">~~~Select Gender~~~</option>
                                <option value="Male" {{($editData->gender=="Male") ? "selected":""}}>Male</option>
                                <option value="Female" {{($editData->gender=="Female") ? "selected":""}}>Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Image</label>
                          <div class="col-sm-9">
                            <input type="file" name="image" id="image">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <img src="{{(!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/no-image.png')}}" style="width: 150px; height: 150px; border: 1px solid #000;" id="showImage">
                            </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-12">
                            <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="Update Profile Info">
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