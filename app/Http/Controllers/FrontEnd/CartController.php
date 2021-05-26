<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use Session;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::where('id',$request->id)->first();

        Cart::add([
    		'id'      => $request->id,
    		'qty'     => $request->qty,
    		'name'    => $product->name,
    		'price'   => $product->price,
    		'weight'  => 550,
    		'options' =>
    		[
    			'image' => $product->image,
    		],
    	]);
        return redirect()->route('show.cart');
    }

    public function showCart()
    {
        return view('frontEnd.cart.view-cart');
    }

    public function updateCart(Request $request)
    {
    	Cart::update($request->rowId,$request->qty);

    	Session::flash('message','Product Update successfully!');
        return redirect()->route('show.cart');
    }

    public function deleteCart($rowId)
    {
    	Cart::remove($rowId);
    	Session::flash('message','Product Deleted successfully!');
        return redirect()->route('show.cart');
    }
}
