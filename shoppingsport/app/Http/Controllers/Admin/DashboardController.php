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
        $countOrder = Order::count();
        $totalAmount = Order::sum('amount');
        $recentOrders = Order::latest()->take(10)->get();
        return view('admin.dashboard.index', compact('title', 'countOrder', 'recentOrders', 'totalAmount'));
    }
}
