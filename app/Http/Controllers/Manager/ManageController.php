<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\CustomerService;
use App\Models\Order;
use App\Models\Permission;
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

    public function create(): View
    {
        return view('manager.create');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:250',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'phone' => 'nullable|string|max:15',
            'birthday' => 'nullable|date',
            'gender' => 'nullable|string',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        User::create($request->all());

        return redirect()->route('manager.users');
    }

    public function infoEdit($id)
    {
        $user = User::find($id);

        $permissions = Permission::all();

        return view('manager.infoEdit', compact('user', 'permissions'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|integer',
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

        $user->update([
            'permission_id' => $request->role,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'password' => $user->password,
        ]);

        return redirect()->route('manager.users')->with('success', 'User updated successfully!');
    }
}
