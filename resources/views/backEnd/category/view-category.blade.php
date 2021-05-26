@extends('backEnd.master')

@section('title')
Category | View
@endsection

@section('content')
<div class="card shadow mb-4">
  <div class="card-body">
    <a href="{{route('categories.add')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Category</a>
    <div class="table-responsive">
      <div class="text-center">
        @if(Session::get('message'))
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ Session::get('message')}}</strong>
          </div>
        @endif
      </div>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sl No</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Sl No</th>
            <th>Category</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          <?php $i=1;  ?>
          @foreach($categories as $category)
            @php
              $countCategory = App\Model\Product::where('categoryId',$category->id)->count();
            @endphp
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $category->name }}</td>
            <td width="12%">
              <a href="{{ route('categories.edit',$category->id)}}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
              @if($countCategory<1)
              <a href="{{ route('categories.delete',$category->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i></a>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection