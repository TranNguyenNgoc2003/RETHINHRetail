<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\DetailOrder;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartController extends Controller
{
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
        } else {
            Cart::create([
                'name_product' => $product->name_product,
                'price_product' => round($product->price - ($product->price / 100) * $product->discount, -5),
                'count' => 1,
                'user_id' => $user_id,
                'product_id' => $product->id,
                'option_cpu' => $product->option_cpu,
                'option_gpu' => $product->option_gpu,
                'option_ram' => $product->option_ram,
                'option_hard' => $product->option_hard,
            ]);
        }

        Session::forget('coupon');

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }


    public function updateCart(Request $request)
    {
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('id', $request->cart_id)
            ->first();
        if ($cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($request->action == 'remove' || $request->action == 'decrease' && $cartItem->count == 1) {
                DetailOrder::where('cart_id', $cartItem->id)->update(['cart_id' => null]);
                $cartItem->delete();
                Session::forget('coupon');
                return redirect()->route('cart');
            } elseif ($request->action == 'increase' && $product->total_product > 0 && $cartItem->count <= $product->total_product) {
                $cartItem->count += 1;
            } elseif ($request->action == 'decrease' && $cartItem->count > 1) {
                $cartItem->count -= 1;
            }
            $cartItem->save();

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
}
