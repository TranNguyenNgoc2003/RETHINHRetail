<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\CustomerService;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ManageController extends Controller
{
    public function dashboard(): View
    {
        $now = Carbon::now();

        $monthly_income = Order::whereMonth('created_date', $now->month)
            ->whereYear('created_date', $now->year)
            ->sum('total_price');

        $yearly_income = Order::whereYear('created_date', $now->year)
            ->sum('total_price');

        $total_services = CustomerService::count();
        $pending_service = CustomerService::whereNull('end_time')->count();
        $completed_service = $total_services - $pending_service;

        $progress = $total_services > 0 ? round(($completed_service / $total_services) * 100) : 0;

        $recent_orders = Order::where('is_completed', true)
            ->orderBy('created_at', 'desc')
            ->take(9)
            ->get();

        return view('manager.dashboard', compact('monthly_income', 'yearly_income', 'pending_service', 'progress', 'recent_orders'));
    }

    public function getUsers(): View
    {
        $pagination = 25;
        $users = User::where('permission_id', '1')
            ->orderBy('id', 'desc')
            ->paginate($pagination);

        return view('manager.users', compact('users', 'pagination'));
    }

    public function getAdmins(): View
    {
        $pagination = 25;
        $users = User::where('permission_id', '2')
            ->orderBy('id', 'desc')
            ->paginate($pagination);

        return view('manager.admins', compact('users', 'pagination'));
    }

    public function infoEdit($id)
    {
        $user = User::find($id);
        return view('manager.infoEdit', compact('user'));
    }

    public function updateUser(Request $request, $id){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::find($id);

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        
        $user->update($request->all());

        return redirect()->route('manager.users')->with('success', 'User updated successfully!');
    }
}
