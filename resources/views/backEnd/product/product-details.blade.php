@extends('backEnd.master')

@section('title')
Product
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  <a href="{{route('products-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Product List</a>
  <div class="table-responsive">
    <div class="text-center">
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
    </div>
    <h2 class="text-info"></h2>
    <span class="text-warning"></span>
    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
      <tr>
        <td width="50%">Category</td>
        <td width="50%">{{ $product['category']['name'] }}</td>
      </tr>
      <tr>
        <td width="50%">Product Name</td>
        <td width="50%">{{ $product->name }}</td>
      </tr>
      <tr>
        <td width="50%">Price</td>
        <td width="50%">{{ $product->price }} TK.</td>
      </tr>
      <tr>
        <td width="50%">Short Description</td>
        <td width="50%">{!! $product->shortDescription !!}</td>
      </tr>
      <tr>
        <td width="50%">Long Description</td>
        <td width="50%">{!! $product->longDescription !!}</td>
      </tr>
      <tr>
        <td width="50%">Image</td>
        <td width="50%"><img src="{{(!empty($product->image))?url('public/upload/product_images/'.$product->image):url('public/upload/no-image.png')}}" style="width: 50px; height: 50px;"></td>
      </tr>
    </table>
  </div>
</div>
</div>

@endsection