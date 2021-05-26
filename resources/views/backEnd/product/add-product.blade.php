@extends('backEnd.master')

@section('title')
{{(@$editProduct)?'Update | Product':'Add | Product'}}
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-6"></div>
      <div class="col-sm-6">
        <a href="{{route('products-view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Product</a>
      </div>
    </div><br>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-9 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">
                      @if(isset($editProduct))
                      Update Product!
                      @else
                      Add Product!
                      @endif
                    </h1>
                  </div>
                  <form class="user" method="POST" 
                  action="{{ (@$editProduct)?route('products-update',$editProduct->id):route('products-save') }}" enctype="multipart/form-data">
                     @csrf

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category Name</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="category">
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}" {{(@$editProduct->categoryId == $category->id) ? "selected" : ""}}>{{$category->name}}</option>
                          @endforeach
                        </select>
                        <strong class="text-danger"> {{$errors->has('category') ? $errors->first('category') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Product Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" value="{{@$editProduct->name}}" class="form-control" placeholder="Write Product Name">
                        <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Short Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="shortDescription" rows="3">{{@$editProduct->shortDescription}}</textarea>
                        <strong class="text-danger"> {{$errors->has('shortDescription') ? $errors->first('shortDescription') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Long Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="longDescription" rows="8">{{@$editProduct->longDescription}}</textarea>
                        <strong class="text-danger"> {{$errors->has('longDescription') ? $errors->first('longDescription') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Price</label>
                      <div class="col-sm-9">
                        <input type="number" name="price" value="{{@$editProduct->price}}" class="form-control" placeholder="Product Price">
                        <strong class="text-danger"> {{$errors->has('price') ? $errors->first('price') : '' }} </strong>
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
                        <img src="{{(!empty($editProduct->image))?url('public/upload/product_images/'.$editProduct->image):url('public/upload/no-image.png')}}" style="width: 100px; height: 100px; border: 1px solid #000;" id="showImage">
                        <strong class="text-danger"> {{$errors->has('image') ? $errors->first('image') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="{{(@$editProduct)?'Update Product':'Save Product'}}">
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

@endsection
