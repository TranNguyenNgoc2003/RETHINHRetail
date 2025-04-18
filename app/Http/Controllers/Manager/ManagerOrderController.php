<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\DetailOrder;
use App\Models\Image;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManagerOrderController extends Controller
{
    public function cancelled(): View
    {
        $pagination = 25;
        $orders = Order::where('shipping_status', 'Đơn hàng đã hủy')
            ->orderBy('id', 'desc')
            ->paginate($pagination);
        return view('manager.cancelledOrders', compact('orders', 'pagination'));
    }

    public function delivere(): View
    {
        $pagination = 25;
        $orders = Order::where('shipping_status', 'Đã hoàn thành')
            ->orderBy('id', 'desc')
            ->paginate($pagination);
        return view('manager.deliveredOrders', compact('orders', 'pagination'));
    }

    public function processing(): View
    {
        $pagination = 25;
        $orders = Order::where('shipping_status', 'Đang giao')
            ->orderBy('id', 'desc')
            ->paginate($pagination);
        return view('manager.processingOrders', compact('orders', 'pagination'));
    }

    public function orderDetails($id): View
    {
        $orders = Order::where('id', $id)->get();

        $details = [];

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
                    'created_date' => $order->created_date,
                    'product_id' => $item->product_id,
                    'name_product' => $item->name_product,
                    'path_img' => $images->path_img,
                    'option_cpu' => $item->option_cpu,
                    'option_gpu' => $item->option_gpu,
                    'option_ram' => $item->option_ram,
                    'option_hard' => $item->option_hard,
                    'count' => $item->count,
                    'product_price' => $item->total_price,
                    'payment_method' => $payment->description,
                    'shipping_status' => $order->shipping_status,
                    'payment_status' => $order->payment_status
                ];
            }
        }

        $lables_details = [];
        $existing_ids = [];

        foreach ($details as $item) {
            if (!in_array($item['id'], $existing_ids)) {
                $lables_details[] = $item;
                $existing_ids[] = $item['id'];
            }
        }
        return view('manager.orderDetail', compact('orders', 'details', 'lables_details'));
    }
    public function updateStatus(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update([
            'payment_status' => $request->payment_status,
            'shipping_status' => $request->shipping_status,
        ]);

        return redirect()->route('manager.orderDetail', ['id' => $id]);
    }
}
