<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Delivery;
use App\Models\DetailOrder;
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

    public function applyDetailsOrder(Request $request)
    {
        $user_id = Auth::id();

        $request->validate([
            'pay-method' => 'required',
        ]);

        $cartItems = Cart::where('user_id', $user_id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $selectedAddress = Delivery::where('user_id', $user_id)
            ->where('is_active', true)
            ->first();

        if (!$selectedAddress) {
            return redirect()->route('checkout')->with('error', 'Vui lòng chọn địa chỉ giao hàng.');
        }

        $payment = Payment::find($request->input('pay-method'));

        if (!$payment) {
            return redirect()->route('checkout')->with('error', 'Phương thức thanh toán không hợp lệ.');
        }

        $couponId = Coupon::where('code', Session::get('coupon'))->first()->id ?? NULL;
        foreach ($cartItems as $item) {
            DetailOrder::create([
                'name_product' => $item->name_product,
                'count' => $item->count,
                'total_price' => $item->price_product * $item->count,
                'coupon_id' => $couponId,
                'deliveries_id' => $selectedAddress->id,
                'cart_id' => $item->id,
                'payment_id' => $payment->id,
                'option_cpu' => $item->option_cpu,
                'option_gpu' => $item->option_gpu,
                'option_ram' => $item->option_ram,
                'option_hard' => $item->option_hard,
                'order_id' => NULL,
            ]);
        }

        return redirect()->route('complete')->with('success', 'Đơn hàng của bạn đã được xác nhận.');
    }


    public function complete(): View
    {
        return view('complete');
    }
}
