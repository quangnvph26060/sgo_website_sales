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
            $product = Product::find($request->id);

            $wishlistItem = Cart::instance('wishlist')->search(function ($cartItem) use ($product) {
                return $cartItem->id === $product->id;
            })->first();

            if ($wishlistItem) {
                return  response()->json([
                    'message' => "Sản phẩm đã có trong danh sách yêu thích!",
                    'status' => 'error',
                    'type' => $request->type
                ]);
            }


            Cart::instance('wishlist')->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price_new,
                'qty' => 1,
                'options' => [
                    'image' => showImageStorage($product->image),
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
}
