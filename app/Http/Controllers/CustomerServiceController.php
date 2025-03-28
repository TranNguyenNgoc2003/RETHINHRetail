<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerService;
use Illuminate\View\View;

class CustomerServiceController extends Controller
{
    public function about():View
    {
        return view('about');
    }
    
    public function addQuestion(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'service_name' => 'required|string',
            'start_time' => now(),
            'note' => 'nullable|string',
        ]);

        CustomerService::create($request->all());

        return redirect()->back()->with('success', 'Yêu cầu hỗ trợ đã được gửi!');
    }
}
