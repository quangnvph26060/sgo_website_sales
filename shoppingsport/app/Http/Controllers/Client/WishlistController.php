<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishlistController extends Controller
{

    public function index()
    {
        return view('client/pages/wishlist-page');
    }

    public function addWishlist(Request $request)
    {

        if ($request->ajax()) {
            $product = Product::with('images', 'discount')->find($request->id);

            $wishlistItem = Cart::instance('wishlist')->search(function ($cartItem) use ($product) {
                return $cartItem->id === $product->id;
            })->first();



            if ($wishlistItem && $request->type == 'remove') {
                Cart::instance('wishlist')->remove($wishlistItem->rowId);
                return  response()->json([
                    'message' => "Đã xóa khỏi danh sách yêu thích!",
                    'status' => 'success',
                    'type' => $request->type
                ]);
            }

            Cart::instance('wishlist')->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $this->caculatePrice($product->price_new, $product->discount->value ?? null),
                'qty' => 1,
                'options' => [
                    'image' => showImageStorage($product->images->first()->image),
                    'slug' => $product->slug
                ]
            ]);


            return  response()->json([
                'count' => Cart::instance('wishlist')->count(),
                'message' => "Sản phẩm được thêm với danh sách yêu thích!",
                'status' => 'success',
                'type' => $request->type
            ]);
        }
    }

    function caculatePrice($price, $discount)
    {
        if (is_null($discount)) {
            return $price;
        }

        return $price - ($price * $discount / 100);
    }
}
