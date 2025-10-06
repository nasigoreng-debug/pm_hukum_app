<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    protected $dashboardService;

    public function __construct()
    {
        $this->middleware('auth');
        $this->dashboardService = app('App\Services\DashboardService');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        $stats = $this->dashboardService->getDashboardData();
        $viewData = array_merge($data, $stats);

        return view('dashboard', $viewData);
    }

    public function refresh()
    {
        Cache::forget('dashboard_data');
        return redirect()->route('home')->with('success', 'Dashboard data refreshed!');
    }
}