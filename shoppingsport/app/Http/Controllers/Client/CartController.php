<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        if ($request->ajax()) {
            $product = Product::find($request->productId);

            $result = $this->checkStock($product, $request);

            if ($result !== true) {
                return response()->json($result);
            }

            $cartItem = Cart::instance('shopping')->search(function ($cartItem) use ($product) {
                return $cartItem->id === $product->id;
            })->first();

            $qty = $cartItem ? $cartItem->qty + $request->quantity : $request->quantity;

            if (!$cartItem) {
                Cart::instance('shopping')->add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'qty' => $qty,
                    'price' => $product->price_new,
                    'weight' => 0,
                    'options' => [
                        'image' => $product->image,
                        'slug' => $product->slug
                    ]
                ]);
            } else {
                // Cập nhật số lượng nếu sản phẩm đã có
                Cart::instance('shopping')->update($cartItem->rowId, $qty);
            }

            return response()->json([
                'count' => Cart::instance('shopping')->count(),
                'message' => "Thêm giỏ hàng thành công.",
                'name' => $product->name,
                'price' => showPrice($product->price_new),
                'type' => "success"
            ]);
        }
    }


    private function checkStock($product, $request)
    {
        if (! $product) {
            return [
                'type' => "error",
                'status' => false,
                'message' => "Sản phẩm không tồn tại, vui lòng thử lại"
            ];
        }

        if ($product->quantity < $request->quantity) {
            return [
                'type' => "info",
                'status' => false,
                'message' => "Số lượng sản phẩm trong kho hiện nay không đủ."
            ];
        }

        return true;
    }

    public function updateCart(Request $request)
    {
        if ($request->ajax()) {
            if ($request->rowId) {
                $cartItem = Cart::instance('shopping')->get($request->rowId); // Lấy sản phẩm trong giỏ

                if (! $cartItem) {
                    return response()->json([
                        'count' => Cart::instance('shopping')->count(),
                        'html' => view('client.pages.res.cart-body')->render(),
                        'message' => "Sản phẩm không tồn tại, vui này thử được thay đổi.",
                        'type' => "error"
                    ]);
                }

                $product = Product::find($cartItem->id);

                $result = $this->checkStock($product, $request);

                if ($result !== true) {
                    return response()->json($result);
                }
            }


            if ($request->type == 'remove') {
                Cart::instance('shopping')->remove($request->rowId);
            } elseif ($request->type == 'add') {
                // Tăng số lượng sản phẩm
                $newQuantity = $cartItem->qty + 1; // Tăng thêm 1
                Cart::instance('shopping')->update($request->rowId, $newQuantity);
            } elseif ($request->type == 'sub') {
                // Giảm số lượng sản phẩm
                if ($cartItem->qty > 1) { // Đảm bảo số lượng không giảm xuống dưới 1
                    $newQuantity = $cartItem->qty - 1; // Giảm 1
                    Cart::instance('shopping')->update($request->rowId, $newQuantity);
                } else {
                    Cart::instance('shopping')->remove($request->rowId); // Nếu số lượng = 1, xóa sản phẩm
                }
            } elseif ($request->type == 'delete') {
                Cart::instance('shopping')->destroy();
            }

            return response()->json([
                'count' => Cart::instance('shopping')->count(),
                'html' => view('client.pages.res.cart-body')->render(),
                'message' => "Cập nhật thành công.",
                'totalPrice' => formatPriceCart(Cart::instance('shopping')->subtotal()),
                'type' => "success"
            ]);
        }
    }
}
