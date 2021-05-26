<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;

class ProductController extends Controller
{
    public function view()
    {
    	$products = Product::orderBy('id','desc')->get();
    	return view('backEnd.product.view-product',['products'=>$products]);
    }

    public function add()
    {
    	$data['categories'] = Category::all();
    	return view('backEnd.product.add-product',$data);
    }

    public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->categoryId       = $request->category;
        $product->name             = $request->name;
        $product->slug             = Str::slug($request->name);
        $product->shortDescription = $request->shortDescription;
        $product->longDescription  = $request->longDescription;
        $product->price            = $request->price;
        //image section Start
        $img 					   = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move(public_path('upload/product_images'),$imgName);
            $product['image'] = $imgName;
        }
        //image section End
        $product->save();

    	
    	Session::flash('message','Product Save Successfully!');
    	return redirect()->route('products-view');
    }

    public function edit($id)
    {
    	$data['editProduct'] = Product::find($id);
    	$data['categories']  = Category::all();

    	return view('backEnd.product.add-product',$data);
    }

    public function update(ProductRequest $request,$id)
    {
        $product = Product::find($id);
        $product->categoryId       = $request->category;
        $product->name             = $request->name;
        $product->slug             = Str::slug($request->name);
        $product->shortDescription = $request->shortDescription;
        $product->longDescription  = $request->longDescription;
        $product->price            = $request->price;
        //image section Start
        $img 					   = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move(public_path('upload/product_images/'),$imgName);
            if (file_exists('public/upload/product_images/'.$product->image) AND ! empty($product->image)) {
                unlink('public/upload/product_images/'.$product->image);
            }
            $product['image'] = $imgName;
        }
        //image section End
        $product->save();
    	
    	Session::flash('message','Product Update Successfully!');
    	return redirect()->route('products-view');
    }

    public function delete($id)
    {
    	$product = Product::find($id);
    	if (file_exists('public/upload/product_images/'.$product->image) AND ! empty($product->image)) {
			unlink('public/upload/product_images/'.$product->image);
		}
    	$product->delete();

    	Session::flash('message','Product Delete Successfully!');
    	return redirect()->route('products-view');
    }

    public function details($id)
    {
    	$product = Product::find($id);
    	return view('backEnd.product.product-details',compact('product'));
    }
}
