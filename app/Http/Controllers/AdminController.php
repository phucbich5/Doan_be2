<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::Paginate(6);
        return view('pages.admin.dashboard', compact('products'));       
    }
}
