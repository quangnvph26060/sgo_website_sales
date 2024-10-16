<?php

namespace App\Http\Controllers\Client;

use App\Models\City;
use App\Models\Ward;
use App\Models\Order;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Requests\Checkout\CheckoutRequest;

class CheckOutController extends Controller
{
    public function index()
    {
        if (! Cart::instance('shopping')->count() > 0) {
            return redirect()->route('user.home-page');
        }

        $cities  = City::query()->orderBy('name', 'ASC')->get();
        return view('client.pages.checkout', compact('cities'));
    }

    //    "name" => "đạt nguyễn"
    //   "email" => "datntph36687@fpt.edu.vn"
    //   "phone" => "0964305701"
    //   "country_id" => "1"
    //   "province_id" => "92"
    //   "district_id" => "916"
    //   "ward_id" => "31117"
    //   "address" => "Trịnh Văn Bô"
    //   "note" => null
    //   "payment_method" => "cod"

    public function postCheckout(CheckoutRequest $request)
    {
        try {
            $order = null;
            DB::transaction(function () use ($request, &$order) {
                $data = $request->validated();
                $data['code'] = generateRandomString();


                $order = Order::create($data);

                $orderItem = [];
                $amount = 0;


                Cart::instance('shopping')->content()->each(function ($item) use (&$orderItem, &$amount) {
                    $amount += $item->price * $item->qty;

                    $orderItem[$item->id] = [
                        'name' => $item->name,
                        'quantity' => $item->qty,
                        'price' => $item->price,
                    ];
                });

                $order->products()->attach($orderItem);

                $order->amount = $amount;
                $order->save();

                Cart::instance('shopping')->destroy();
            });

            return to_route('user.order-success', $order->code ?? null);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return back()->with('error', 'Đã có xự cố xảy ra. Vui lòng thực hiện lại sau!');
        }
    }


    public function addressSuggest(Request $request)
    {
        if ($request->ajax()) {
            $response = collect();

            if (in_array($request->type, ['provinces', 'district'])) {
                $model = $request->type == 'provinces' ? District::class : Ward::class;

                $response = $model::query()
                    ->where($request->type == 'provinces' ? 'city_id' : 'district_id', $request->id)
                    ->get();
            }

            return response()->json($response);
        }
    }
}
