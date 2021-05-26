<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;

class CategoryController extends Controller
{
    public function view()
    {
    	$categories = Category::orderBy('id','desc')->get();
    	return view('backEnd.category.view-category',['categories'=>$categories]);
    }

    public function add()
    {
    	return view('backEnd.category.add-category');
    }

    public function store(CategoryRequest $request)
    {
    	$category = new Category();
    	$category->name  = $request->name;
    	$category->save();

    	Session::flash('message','Category Save Successfully!');
    	return redirect()->route('categories.view');
    }

    public function edit($id)
    {
    	$editCategory = Category::find($id);
    	return view('backEnd.category.add-category',['editCategory'=>$editCategory]);
    }

    public function update(CategoryRequest $request)
    {
    	$category = Category::find($request->id);
    	$category->name = $request->name;
    	$category->save();

    	Session::flash('message','Category Update Successfully!');
    	return redirect()->route('categories.view');
    }

    public function delete($id)
    {
    	$category = Category::find($id);
    	$category->delete();

    	Session::flash('message','Category Delete Successfully!');
    	return redirect()->route('categories.view');
    }
}
