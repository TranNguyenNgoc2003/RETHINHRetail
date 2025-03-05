<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $user_id = Auth::id();
        $product = Product::find($request->id);

        $cartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->count += 1;
            $cartItem->save();
            $product->total_product -= 1;
            $product->save();
        } else {
            Cart::create([
                'name_product' => $product->name_product,
                'price_product' => $product->price - ($product->price * $product->discount / 100),
                'count' => 1,
                'user_id' => $user_id,
                'product_id' => $product->id,
            ]);
            $product->total_product -= 1;
            $product->save();
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
    public function Cart(): View
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)
            ->first();
        return view('cart', compact('cart'));
    }
}
