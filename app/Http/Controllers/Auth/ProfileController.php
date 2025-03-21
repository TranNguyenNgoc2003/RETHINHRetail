<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\DetailOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(): View
    {
        $users = Auth::user();
        return view('auth.profile', compact('users'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->update([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'password' => $user->password,
        ]);
        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }

    public function deleteProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $fakeEmail = 'deleted_' . $user->id . '@example.com';

        $user->update([
            'email' => $fakeEmail,
            'password' => null,
            'phone' => null,
            'social_id' => null,
            'remember_token' => null,
        ]);

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Xóa tài khoản thành công!');
    }

    public function address(): View
    {
        $user = Auth::user();
        $deliveries = $user->deliveries;

        return view('auth.address', compact('deliveries'));
    }

    public function newAddress(): View
    {
        return view('auth.newAddress');
    }

    public function addAddress(Request $request)
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

        return redirect()->route('auth.address')->with('success', 'Đã thêm điểm giao hàng.');
    }

    public function editAddress($id)
    {
        $address = Delivery::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('auth.editAddress', compact('address'));
    }

    public function updateAddress(Request $request, $id)
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

        return redirect()->route('auth.address')->with('success', 'Đã cập nhật địa chỉ.');
    }
    public function deleteAddress( $id)
    {
        $address = Delivery::where('id', $id)->where('user_id', Auth::id())->first();
        DetailOrder::where('deliveries_id', $id)->update(['deliveries_id' => null]);
        if (Auth::check() == false) {
            return redirect()->route('home');
        }
        if (!$address) {
            return redirect()->route('auth.address')->with('error', 'Không tìm thấy địa chỉ.');
        } elseif (Auth::user()->id == $address->user_id) {
            $address->delete();
            return redirect()->route('auth.address');
        }
        return redirect()->route('auth.address');
    }
}
