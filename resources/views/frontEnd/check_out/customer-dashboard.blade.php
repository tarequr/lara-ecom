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
        My Profile
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
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="txt-center">
                        @if(Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>{{ Session::get('success')}}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="img-circle text-center" style="margin-left: 160px;">
                                <img src="{{(!empty($user->image))?url('public/upload/user_images/'.$user->image):url('public/upload/no-image.png')}}" style="width: 100px; height: 100px; border: 3px solid #adb5bd; border-radius: 50%; padding: 3px;">
                            </div><br>
                            <h3 class="txt-center" style="margin-left: 125px;">{{$user->name}}</h3>
                            <p  class="txt-center" style="margin-left: 70px; margin-right: 70px;">{{$user->address}}</p><br>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Mobile No</td>
                                        <td>{{$user->mobile}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>{{$user->gender}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{route('customer.edit.profile')}}" class="btn btn-info btn-block">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
@endsection