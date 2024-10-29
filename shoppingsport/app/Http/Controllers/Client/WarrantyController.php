<?php

namespace App\Http\Controllers\Client;

use App\Models\Order;
use App\Models\Product;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WarrantyController extends Controller
{
    public function warranty(Request $request)
    {

        $query = Product::query()->with('images');

        if ($request->ajax()) {
            $name = $request->name;

            $products = $query->where('name', 'like', '%' . $name . '%')->get();

            return response()->json($products);
        }

        $products = $query->get();

        return view('client/pages/warranty', compact('products'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'customer_name' => 'required|max:255',
                'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'address' => 'required|max:255',
                'product_id' => 'required|exists:sgo_product,id',
            ],
            __('request.messages'),
            [
                'customer_name' => 'Tên',
                'phone_number' => 'Số điện thoại',
                'address' => 'Địa chỉ',
                'product_id' => 'Sản phẩm',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
                'status' => false,
            ]);
        }

        // Check if there is an existing warranty for the product and phone number
        $existingWarranty = Warranty::where('phone_number', $request->phone_number)
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingWarranty) {
            // Calculate the expiration date of the existing warranty
            $expirationDate = Carbon::parse($existingWarranty->registration_date)->addYear();

            // Check if the warranty is still valid
            if (now()->lessThanOrEqualTo($expirationDate)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Sản phẩm đã được bảo hành và vẫn còn hiệu lực đến ' . $expirationDate->format('d/m/Y') . '.',
                ]);
            }
        }

        // Create the new warranty
        Warranty::create($validator->validated());

        return response()->json([
            'status' => true,
            'message' => 'Đăng ký bảo hành thành công.'
        ]);
    }

    function lookUp(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            ],
            __('request.messages'),
            [
                'phone_number' => 'Số điện thoại',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->first(),
                'status' => false,
            ]);
        }

        $warrantys = Warranty::with('product')->where('phone_number', $request->phone_number)->get();

        return response()->json([
            'status' => true,
            'warranty' => $warrantys
        ]);
    }
}
