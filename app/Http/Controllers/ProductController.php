<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
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

    public function category($category)
    {
        $products = Product::where('category', $category)->get();

        $title = $category;

        return view('category', compact('products', 'title'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q'); 

        if (!$query) {
            return redirect()->back()->with('error', 'Vui lòng nhập từ khóa tìm kiếm.');
        }
        
        // dump($query, Product::search($query)); exit;

        $results = Product::search($query)->get();

        return view('search_results', compact('results', 'query'));
    }
}
