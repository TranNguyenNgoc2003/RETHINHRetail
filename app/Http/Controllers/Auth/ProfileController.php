<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
}
