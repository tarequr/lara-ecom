@extends('backEnd.master')

@section('title')
{{ (@$editCategory)?'Update | Category':'Add | Category' }}
@endsection

@section('content')
  <div class="container">
  <div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-6">
      <a href="{{route('categories.view')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-list"></i> Manage Category</a>
    </div>
  </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-8 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">
                      @if(isset($editCategory))
                      Update Category!
                      @else
                      Add Category!
                      @endif
                    </h1>
                  </div>
                  <form class="user" method="POST" action="
                  {{ (@$editCategory)?route('categories.update',$editCategory->id):route('categories.save') }}">
                     @csrf

                   <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Category Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" value="{{@$editCategory->name}}" class="form-control">
                        <strong class="text-danger"> {{$errors->has('name') ? $errors->first('name') : '' }} </strong>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <input type="submit" name="btn" class="btn btn-primary btn-user btn-block" value="{{(@$editCategory)?'Update Category':'Save Category'}}">
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
