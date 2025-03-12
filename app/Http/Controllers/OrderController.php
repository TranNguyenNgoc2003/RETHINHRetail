<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Delivery;
use App\Models\DetailOrder;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function checkout()
    {
        $user_id = Auth::id();
        $checkout = Cart::where('user_id', $user_id)->get();
        $cartItems = Cart::where('user_id', $user_id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
        $couponId = Coupon::where('code', Session::get('coupon'))->first()->id ?? NULL;

        $subtotal = $checkout->sum(fn($item) => $item->price_product * $item->count);
        $shipping_fee = 0;
        $coupon = Session::get('coupon', null);
        $discount = $coupon['discount'] ?? 0;
        $total = $subtotal + $shipping_fee - $discount;

        $order = Order::create([
            'user_id' => $user_id,
            'fullname' => NULL,
            'address' => NULL,
            'phone' => NULL,
            'shipping_fee' => $shipping_fee,
            'discount' => $discount,
            'total_price' => $total,
        ]);

        foreach ($cartItems as $item) {
            DetailOrder::create([
                'name_product' => $item->name_product,
                'count' => $item->count,
                'total_price' => $item->price_product * $item->count,
                'coupon_id' => $couponId,
                'deliveries_id' => NULL,
                'cart_id' => $item->id,
                'payment_id' => NULL,
                'option_cpu' => $item->option_cpu,
                'option_gpu' => $item->option_gpu,
                'option_ram' => $item->option_ram,
                'option_hard' => $item->option_hard,
                'order_id' => $order->id,
            ]);
            $product = Product::find($item->product_id);
            $product->total_product -= $item->count;
            $product->save();
        }
        return Redirect::route('checkout.show', ['orderId' => $order->id]);
    }
    public function showCheckout($orderId): View
    {
        $order = Order::findOrFail($orderId);
        $checkout = Cart::where('user_id', $order->user_id)->get();
        $subtotal = $checkout->sum(function ($item) {
            return $item->price_product * $item->count;
        });
        $selectedAddress = Delivery::where('user_id', $order->user_id)
            ->where('is_active', true)
            ->first();
        $payments = Payment::all();

        $detailOrder = DetailOrder::where('order_id', $orderId)->get();

        return view('checkout', compact('checkout', 'order', 'selectedAddress', 'payments', 'detailOrder', 'subtotal'));
    }

    public function applyOrder(Request $request, $orderId)
    {
        $detailOrders = DetailOrder::where('order_id', $orderId)->get();
        $order = Order::find($orderId);
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

        foreach ($detailOrders as $item) {
            $item->update([
                'deliveries_id' => $selectedAddress->id,
                'payment_id' => $payment->id,
            ]);
        }
        
        $order->update([
            'fullname' => $selectedAddress->fullname,
            'address' => $selectedAddress->address,
            'phone' => $selectedAddress->phone,
        ]);
        return redirect()->route('complete', ['orderId' => $orderId])->with('success', 'Đơn hàng đã được xác nhận!');
    }

    public function complete($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('complete', compact('order'));
    }
}
