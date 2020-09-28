<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
class SearchController extends Controller
{
    public function getsearch(Request $req)
    {
            $products= Product::where('product_name','like','%'.$req->key.'%')
            -> get();
            return view('pages.product.search',compact('products'));
    }
   
}
