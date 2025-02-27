<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function getProduct()
    {
        $products = Product::all();
        return view('home', compact('products'));
    }
    public function details($id)
    {
        $product = Product::findOrFail($id);

        $relatedProducts = Product::where('name_product', $product->name_product)->get();

        $promotion = Promotion::all();

        return view('details', compact('product', 'relatedProducts', 'promotion'));
    }
}
