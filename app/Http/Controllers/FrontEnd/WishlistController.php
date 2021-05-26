<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Wishlist;
use Session;
use Auth;

class WishlistController extends Controller
{
    public function addWishlist(Request $request,$id)
    {

        if (Auth::check()) {

    	$checkValue = Wishlist::where('product_id',$id)->where('user_id',Auth::user()->id)->first();

            if (!$checkValue) {
                $wishLs = new Wishlist();
                $wishLs->user_id    = Auth::user()->id;
                $wishLs->product_id = $id;
                $wishLs->save();

                Session::flash('success','Product added on wishlist!');
                return redirect()->back();
            
            }else{
                Session::flash('error','This Product already added on wishlist!');
                return redirect()->back();
            }

        }else{
            Session::flash('error','Please login first!');
            return redirect()->route('customer.login');
        }    	
    	
    }

    public function showWishlist()
    {
        if (Auth::check()) {
        	$wishlists = Wishlist::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        	return view('frontEnd.wishlist.show-wishlist',compact('wishlists'));
        }else{
            Session::flash('error','Please login first!');
            return redirect()->route('customer.login');
        }
    }

    public function deleteWishlist($id)
    {
    	Wishlist::where('id',$id)->where('user_id',Auth::user()->id)->delete();

    	Session::flash('message','Wish Product Delete Successfully!');
		return redirect()->route('show.wishlist');

    }
}
