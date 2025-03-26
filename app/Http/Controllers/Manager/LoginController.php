<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('manager.login');
    }
    
    public function loginAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->permission_id == 2) {
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('manager')->with('success', 'Đăng nhập thành công!');
            } else {
                return back()->with('success', 'Sai mật khẩu hoặc email.');
            }
        } else {
            return back()->with('success', 'Bạn không có quyền truy cập.');
        }
    }
}
