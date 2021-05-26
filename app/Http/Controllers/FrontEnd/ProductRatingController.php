<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\ProductRating;
use Session;
use Auth;

class ProductRatingController extends Controller
{
    public function store(Request $request,$id)
    {
    	$this->validate($request,[
            'comment'   => 'required',			
        ]);

    	$rating = new ProductRating();
    	$rating->product_id = $id;
    	$rating->user_id    = Auth::user()->id;
    	$rating->rating     = $request->rating;
    	$rating->comment    = $request->comment;
    	$rating->save();

    	Session::flash('message','Review save successfully');
    	return redirect()->back();
    }
}
