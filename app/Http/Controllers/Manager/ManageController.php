<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\CustomerService;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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

        return view('manager.dashboard', compact('monthly_income','yearly_income','pending_service', 'progress'));
    }
}
