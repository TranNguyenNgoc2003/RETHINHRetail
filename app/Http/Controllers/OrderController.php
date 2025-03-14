<?php

namespace App\Http\Controllers;

use App\Models\{Cart, Coupon, Delivery, DetailOrder, Image, Order, Payment, Product};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Redirect, Session};
use Illuminate\View\View;

class OrderController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::id();
        $cartItems = Cart::where('user_id', $user_id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $coupon = Coupon::where('code', Session::get('coupon'))->first();
        $couponId = $coupon->id ?? null;

        $order = Order::firstOrCreate(
            ['user_id' => $user_id, 'is_completed' => false],
            ['fullname' => null, 'address' => null, 'phone' => null, 'price' => null, 'shipping_fee' => null, 'discount' => null, 'total_price' => null]
        );

        DetailOrder::where('order_id', $order->id)->delete();

        foreach ($cartItems as $item) {
            DetailOrder::create([
                'product_id' => $item->product_id,
                'name_product' => $item->name_product,
                'count' => $item->count,
                'total_price' => $item->price_product * $item->count,
                'coupon_id' => $couponId,
                'deliveries_id' => null,
                'cart_id' => $item->id,
                'payment_id' => null,
                'option_cpu' => $item->option_cpu,
                'option_gpu' => $item->option_gpu,
                'option_ram' => $item->option_ram,
                'option_hard' => $item->option_hard,
                'order_id' => $order->id,
            ]);
        }

        return Redirect::route('checkout.show', ['orderId' => $order->id]);
    }

    public function showCheckout($orderId): View
    {
        $order = Order::findOrFail($orderId);
        $checkout = Cart::where('user_id', $order->user_id)->get();
        $subtotal = $checkout->sum(fn($item) => $item->price_product * $item->count);
        $selectedAddress = Delivery::where('user_id', $order->user_id)->where('is_active', true)->first();
        $payments = Payment::all();
        $discount = Session::get('coupon')['discount'] ?? 0;
        $shipping_fee = 0;
        $total = $subtotal + $shipping_fee - $discount;
        $detailOrder = DetailOrder::where('order_id', $orderId)->get();

        return view('checkout', compact('checkout', 'order', 'selectedAddress', 'payments', 'detailOrder', 'subtotal', 'shipping_fee', 'discount', 'total'));
    }

    public function applyOrder(Request $request, $orderId)
    {
        if (Order::where('id', $orderId)->where('is_completed', true)->exists()) {
            return redirect()->route('cart')->with('error', 'Lỗi! Đơn hàng đã hoàn thành.');
        }

        $request->validate(['pay-method' => 'required']);
        $user_id = Auth::id();
        $cartItems = Cart::where('user_id', $user_id)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $selectedAddress = Delivery::where('user_id', $user_id)->where('is_active', true)->first();
        if (!$selectedAddress) {
            return redirect()->route('checkout')->with('error', 'Vui lòng chọn địa chỉ giao hàng.');
        }

        $payment = Payment::find($request->input('pay-method'));
        if (!$payment) {
            return redirect()->route('checkout')->with('error', 'Phương thức thanh toán không hợp lệ.');
        }

        $order = Order::findOrFail($orderId);
        $detailOrders = DetailOrder::where('order_id', $orderId)->get();

        foreach ($detailOrders as $item) {
            $item->update(['deliveries_id' => $selectedAddress->id, 'payment_id' => $payment->id]);
        }

        $subtotal = $cartItems->sum(fn($item) => $item->price_product * $item->count);
        $shipping_fee = 0;
        $discount = Session::get('coupon')['discount'] ?? 0;
        $total = $subtotal + $shipping_fee - $discount;

        $order->update([
            'fullname' => $selectedAddress->fullname,
            'address' => $selectedAddress->address,
            'phone' => $selectedAddress->phone,
            'price' => $subtotal,
            'shipping_fee' => $shipping_fee,
            'discount' => $discount,
            'total_price' => $total,
            'status' => $request->input('order_note'),
            'is_completed' => true,
        ]);

        if (Session::has('coupon')) {
            $coupon = Coupon::where('code', Session::get('coupon'))->first();
            if ($coupon) {
                $coupon->decrement('count');
            }
            Session::forget('coupon');
        }

        foreach ($cartItems as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $product->decrement('total_product', $item->count);
            }
            DetailOrder::where('cart_id', $item->id)->update(['cart_id' => null]);
            $item->delete();
        }

        return redirect()->route('complete', ['orderId' => $orderId])->with('success', 'Đơn hàng đã được xác nhận!');
    }

    public function complete($orderId): View
    {
        $order = Order::findOrFail($orderId);
        return view('complete', compact('order'));
    }

    public function history(): View
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id', $user_id)->where('is_completed', true)->get();

        $details = [];
        $order_count = [];

        foreach ($orders as $order) {
            $order->detail_orders = DetailOrder::where('order_id', $order->id)->get();

            foreach ($order->detail_orders as $item) {
                $images = Image::where('product_id', $item->product_id)->first();
                $payment = Payment::where('id', $item->payment_id)->first();
                $details[] = [
                    'id' => $order->id,
                    'full_name' => $order->fullname,
                    'address' => $order->address,
                    'phone' => $order->phone,
                    'price' => $order->price,
                    'shipping_fee' => $order->shipping_fee,
                    'discount' => $order->discount,
                    'total_price' => $order->total_price,
                    'status' => $order->status,
                    'created_at' => $order->created_at,
                    'name_product' => $item->name_product,
                    'path_img' => $images->path_img,
                    'option_cpu' => $item->option_cpu,
                    'option_gpu' => $item->option_gpu,
                    'option_ram' => $item->option_ram,
                    'option_hard' => $item->option_hard,
                    'count' => $item->count,
                    'product_price' => $item->total_price,
                    'payment_method' => $payment->description,
                    'shipping_status' => $order->shipping_status
                ];

                if (!isset($order_count[$order->id])) {
                    $order_count[$order->id] = 0;
                }
                $order_count[$order->id]++;
            }
        }

        $lables_details = [];
        $existing_ids = [];

        foreach ($details as $item) {
            if (!in_array($item['id'], $existing_ids)) {
                $item['extend_count'] = $order_count[$item['id']] - 1;
                $lables_details[] = $item;
                $existing_ids[] = $item['id'];
            }
        }
        return view('history', compact('orders', 'details', 'lables_details'));
    }

    public function reorder($orderId)
    {
        $user_id = Auth::id();

        $orderDetails = DetailOrder::where('order_id', $orderId)->get();

        foreach ($orderDetails as $item) {
            $cartItem = Cart::where('user_id', $user_id)
                ->where('product_id', $item->product_id)
                ->first();

            if ($cartItem) {
                $cartItem->count += $item->count;
                $cartItem->save();
            } else {
                Cart::create([
                    'name_product' => $item->name_product,
                    'price_product' => $item->total_price / $item->count,
                    'count' => $item->count,
                    'user_id' => $user_id,
                    'product_id' => $item->product_id,
                    'option_cpu' => $item->option_cpu,
                    'option_gpu' => $item->option_gpu,
                    'option_ram' => $item->option_ram,
                    'option_hard' => $item->option_hard,
                ]);
            }
        }

        return redirect()->route('cart')->with('success', 'Đã thêm lại sản phẩm vào giỏ hàng.');
    }
}
