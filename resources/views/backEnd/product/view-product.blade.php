@extends('backEnd.master')

@section('title')
Product
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="card-body">
  <a href="{{route('products-add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Product</a>
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
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Category</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Sl No</th>
          <th>Category</th>
          <th>Product Name</th>
          <th>Price</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </tfoot>
      <tbody>
        <?php $i=1;  ?>
        @foreach($products as $product)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $product['category']['name'] }}</td>
          <td>{{ $product->name }}</td>
          <td>{{ $product->price }} TK.</td>
          <td>
            <img src="{{(!empty($product->image))?url('public/upload/product_images/'.$product->image):url('public/upload/no-image.png')}}" style="width: 50px; height: 50px;">
          </td>
          <td width="13%">
            <a href="{{ route('products-edit',$product->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
            <a href="{{ route('products-details',$product->id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-eye"></i></a>
            <a href="{{ route('products-delete',$product->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

@endsection