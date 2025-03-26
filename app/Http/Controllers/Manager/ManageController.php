<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManageController extends Controller
{
    public function dashboard(): View
    {
        return view('manager.dashboard');
    }
}
