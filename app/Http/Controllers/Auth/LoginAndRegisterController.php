<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class LoginAndRegisterController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            // new Middleware('guest', except:['home','showAccount', 'logout']),
            // new Middleware('auth', only:['home','showAccount', 'logout']),
        ];
    }
    
    public function register(): View
    {
        return view('auth.register');
    }

    public function registerAuth(Request $request): RedirectResponse
    {
        $request->validate([
            'fullname' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email','password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('home');
    }

    public function login(): View
    {
        return view('auth.login');
    }  

    public function loginAuth(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
// dd => die debug/// ddd => dump die debug ///
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records',
        ])->onlyInput('email');
    }


    public function home(): View
    {
        return view('auth.home');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

}