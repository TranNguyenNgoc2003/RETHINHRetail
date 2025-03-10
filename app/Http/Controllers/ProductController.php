<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
                'price_product' => round($product->price - ($product->price / 100) * $product->discount, -5),
                'count' => 1,
                'user_id' => $user_id,
                'product_id' => $product->id,
            ]);
            $product->total_product -= 1;
            $product->save();
        }

        Session::forget('coupon');

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }

    public function cart(): View
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->get();

        if ($cart->isEmpty()) {
            Session::forget('coupon');
        }

        $subtotal = $cart->sum(function ($item) {
            return $item->price_product * $item->count;
        });

        $shipping_fee = 0;
        $coupon = Session::get('coupon', null);
        $discount = $coupon['discount'] ?? 0;

        $total = $subtotal + $shipping_fee - $discount;

        return view('cart', compact('cart', 'subtotal', 'shipping_fee', 'discount', 'total'));
    }

    public function updateCart(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('id', $request->cart_id)
            ->first();
        if ($cartItem) {
            $product = Product::find($cartItem->product_id);

            if ($request->action == 'remove' || $request->action == 'decrease' && $cartItem->count == 1) {
                $product->total_product += $cartItem->count;
                $product->save();
                $cartItem->delete();
                Session::forget('coupon');
                return redirect()->route('cart');
            } elseif ($request->action == 'increase' && $product->total_product > 0) {
                $cartItem->count += 1;
                $product->total_product -= 1;
            } elseif ($request->action == 'decrease' && $cartItem->count > 1) {
                $cartItem->count -= 1;
                $product->total_product += 1;
            }
            $cartItem->save();
            $product->save();

            Session::forget('coupon');
        }

        return redirect()->route('cart');
    }

    public function applyCoupon(Request $request)
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->get();
        $subtotal = $cart->sum(fn($item) => $item->price_product * $item->count);

        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('count', '>', 0)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->first();

        if (!$coupon) {
            return redirect()->route('cart')->with('error', 'Mã khuyến mãi không hợp lệ hoặc đã hết hạn.');
        }

        $discount = ($coupon->promotion / 100) * $subtotal;
        $shipping_fee = 0;
        $total = $subtotal + $shipping_fee - $discount;

        Session::put('coupon', [
            'code' => $coupon->code,
            'discount' => $discount,
        ]);

        return redirect()->route('cart')->with('success', 'Áp dụng mã giảm giá thành công!');
    }

    public function checkout(): View
    {
        $user_id = Auth::id();
        $checkout = Cart::where('user_id', $user_id)->get();
        $selectedAddress = Delivery::where('user_id', $user_id)
            ->where('is_active', true)
            ->first();

        $subtotal = $checkout->sum(function ($item) {
            return $item->price_product * $item->count;
        });

        $shipping_fee = 0;
        $coupon = Session::get('coupon', null);
        $discount = $coupon['discount'] ?? 0;

        $total = $subtotal + $shipping_fee - $discount;

        return view('checkout', compact('checkout', 'subtotal', 'shipping_fee', 'discount', 'total', 'selectedAddress'));
    }
}
