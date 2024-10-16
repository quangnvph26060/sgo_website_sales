<?php

namespace App\Http\Controllers\Client;

use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function addToCart(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                // 'productId' => 'required|integer',
                'variantId' => 'required|integer',
                'quantity' => 'required|integer|min:1',
            ]);

            $product = Product::with('discountValue')->find($request->productId);

            if (!$product) {
                return response()->json(['message' => 'Product not found.'], 404);
            }

            $result = $this->checkStock($product, $request);

            if ($result !== true) {
                return response()->json($result);
            }

            $productName = $product->name;

            if ($request->productId > 0) {
                $size = Size::find($request->variantId);
                if ($size) {
                    $productName .= ' - ' . $size->size;
                }
            }

            $cartItem = Cart::instance('shopping')->search(function ($cartItem) use ($product, $size) {
                return $cartItem->id === $product->id &&
                    (isset($cartItem->options['size']) ? $cartItem->options['size'] === $size->size : false);
            })->first();

            $qty = $cartItem ? $cartItem->qty + $request->quantity : $request->quantity;

            if (!$cartItem) {
                Cart::instance('shopping')->add([
                    'id' => $product->id,
                    'name' => $productName,
                    'qty' => $qty,
                    'price' => $this->caculatePrice($product->price_old, $product->discountValue->value ?? null),
                    'weight' => 0,
                    'options' => [
                        'image' => $product->image,
                        'slug' => $product->slug,
                        'variantId' => $request->variantId,
                        'size' => $size ? $size->value : null,
                    ]
                ]);
            } else {
                // Update existing cart item
                Cart::instance('shopping')->update($cartItem->rowId, $qty);
            }

            return response()->json([
                'count' => Cart::instance('shopping')->count(),
                'message' => "Thêm giỏ hàng thành công.",
                'name' => $productName,
                'price' => showPrice($product->price_new),
                'type' => "success"
            ]);
        }

        return response()->json(['message' => 'Invalid request.'], 400);
    }

    function caculatePrice($price, $discount)
    {
        if (is_null($discount)) {
            return $price;
        }

        return $price - ($price * $discount / 100);
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
