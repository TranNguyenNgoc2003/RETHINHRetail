<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ShippingController extends Controller
{
    public function index($orderId)
    {
        $user = Auth::user();
        $deliveries = $user->deliveries;

        return view('shipping.index', compact('deliveries', 'orderId'));
    }


    public function create($orderId)
    {
        return view('shipping.create', compact('orderId'));
    }


    public function selectAddress(Request $request, $orderId)
    {
        $request->validate([
            'address_id' => 'required|exists:deliveries,id',
        ]);

        $user = Auth::user();

        Delivery::where('user_id', $user->id)->update(['is_active' => false]);

        $selectedAddress = Delivery::find($request->address_id);
        $selectedAddress->is_active = true;
        $selectedAddress->save();

        return redirect()->route('checkout.show', ['orderId' => $orderId]);
    }



    public function addDelivery(Request $request, $orderId)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:15',
        ]);

        Delivery::create([
            'fullname' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
            'user_id' => Auth::id(),
            'is_active' => false,
        ]);

        return redirect()->route('shipping.index', ['orderId' => $orderId]);
    }


    public function edit($orderId, $id)
    {
        $address = Delivery::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('shipping.edit', compact('address', 'orderId'));
    }

    public function update(Request $request, $orderId, $id)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $address = Delivery::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $address->update([
            'fullname' => $request->fullname,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return redirect()->route('shipping.index', ['orderId' => $orderId])->with('success', 'Đã cập nhật địa chỉ.');
    }

    public function delete($orderId, $id)
    {
        $address = Delivery::where('id', $id)->where('user_id', Auth::id())->first();
        DetailOrder::where('deliveries_id', $id)->update(['deliveries_id' => null]);
        if (Auth::check() == false) {
            return redirect()->route('home');
        }
        if (!$address) {
            return redirect()->route('shipping.index', ['orderId' => $orderId])->with('error', 'Không tìm thấy địa chỉ.');
        } elseif (Auth::user()->id == $address->user_id) {
            $address->delete();
            return redirect()->route('shipping.index', ['orderId' => $orderId]);
        }
        return redirect()->route('home');
    }
}
