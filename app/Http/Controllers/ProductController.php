<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProduct()
    {
        $products = Product::all();
        return view('auth.home', compact('products'));
    }
    // public function getTopProduct()
    // {
    //     $products = Product::orderBy('rating', 'desc')->take(8)->get();
    //     return view('auth.home', compact('products'));
    // }
}
