<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CouponController extends Controller
{
    public function coupon():View
    {
        $coupons = Coupon::all();
        return view('coupon', compact('coupons'));
    }
}
