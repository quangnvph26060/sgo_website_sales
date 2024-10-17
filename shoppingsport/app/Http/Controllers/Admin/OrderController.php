<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderActivated;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    //
    public function index()
    {
        $title = 'Danh sách đơn hàng ';
        return view('admin.order.index', compact('title'));
    }

    // Fetch dữ liệu cho danh mục
    public function fetch(Request $request)
    {
        $order = Order::query();
        $orders = $order->orderBy('is_active', 'asc') // Đặt active ở dưới cùng
        ->orderBy('created_at', 'desc') ;
        // Tìm kiếm nếu có
        if ($request->has('search')) {
            $order->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('phone', 'like', '%' . $request->search . '%')
                      ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }


        // Sắp xếp nếu có
        if ($request->has('sort_by') && $request->sort_by == 'amount') {
            $order->orderBy('amount', $request->sort_order ?? 'asc');
        } else {
            $order->orderBy('id', 'asc');
        }


        // Phân trang
        $perPage = $request->input('per_page', 10); // 10 items per page
        $order = $order->paginate($perPage);

        Log::info($order);
        return response()->json($order); // Trả về dữ liệu JSON
    }

    public function view($id){
        $title = 'Thông tin dơn hàng';
        $order = Order::find($id);
        return view('admin.order.view', compact('order', 'title'));
    }

    public function edit($id){
        $title = 'Sửa đơn hàng'  ;  // Tạo tiêu đ�� trang sửa đơn hàng
        $order = Order::find($id);
        return view('admin.order.edit', compact('order', 'title'));
    }

    public function active(Request $request){
        $id = $request->id;
        $order = Order::find($id);
        $active = $request->active;
        // dd($active);
        $order->update(['is_active' => $active]);
        $reason = $request->reason;
        if ($order) {
            // Gửi email
            Mail::to($order->email)->send(new OrderActivated($order, $active, $reason));

            return redirect()->route('admin.order.index');
        }
    }
}
