<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ShippingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $deliveries = $user->deliveries;

        return view('shipping.index', compact('deliveries'));
    }

    public function create()
    {
        return view('shipping.create');
    }

    public function selectAddress(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:deliveries,id',
        ]);

        $user = Auth::user();

        Delivery::where('user_id', $user->id)->update(['is_active' => false]);

        $selectedAddress = Delivery::find($request->address_id);
        $selectedAddress->is_active = true;
        $selectedAddress->save();

        return redirect()->route('checkout');
    }


    public function addDelivery(Request $request)
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

        return redirect()->route('shipping.index');
    }

    public function edit($id)
    {
        $address = Delivery::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('shipping.edit', compact('address'));
    }

    public function update(Request $request, $id)
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

        return redirect()->route('shipping.index')->with('success', 'Đã cập nhật địa chỉ.');
    }
}
