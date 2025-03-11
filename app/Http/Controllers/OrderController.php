<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function checkout(): View
    {
        $user_id = Auth::id();
        $payments = Payment::all();
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

        return view('checkout', compact('checkout', 'subtotal', 'shipping_fee', 'discount', 'total', 'selectedAddress', 'payments'));
    }
}
