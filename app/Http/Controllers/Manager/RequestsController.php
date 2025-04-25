<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\CustomerService;
use App\Models\SupportWorker;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RequestsController extends Controller
{
    public function processed(): View
    {
        $pagination = 25;

        $services = CustomerService::where('end_time', '!=', null)
            ->with('supportWorker')
            ->orderBy('id', 'desc')
            ->paginate($pagination);

        return view('manager.processedRequests', compact('services', 'pagination'));
    }

    public function pending(): View
    {
        $pagination = 25;

        $services = CustomerService::where('end_time', null)
            ->with('supportWorker')
            ->orderBy('id', 'asc')
            ->paginate($pagination);

        return view('manager.pendingRequests ', compact('services', 'pagination'));
    }

    public function updateService(Request $request, $id)
    {
        $services = CustomerService::findOrFail($id);

        $services->update([
            'end_time' => now(),
        ]);

        return redirect()->back();
    }
}
