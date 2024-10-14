<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $title = 'Dashboard';
        $countOrder = Order::where('active', 1)->count();
        $totalAmount = Order::where('active', 1)->sum('amount');
        $recentOrders = Order::latest()->take(10)->where('active', null)->get();
        return view('admin.dashboard.index', compact('title', 'countOrder', 'recentOrders', 'totalAmount'));
    }
}
