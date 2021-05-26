<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;

class HomeController extends Controller
{
    public function index()
    {
        $data['allCategory'] = Category::all();        
        
        return view('frontEnd.home.homeContent', $data);
    }

    public function productsDetails($slug)
    {
        $data['product'] = Product::where('slug',$slug)->first();
        return view('frontEnd.single_page.product-details',$data);
    }
}
