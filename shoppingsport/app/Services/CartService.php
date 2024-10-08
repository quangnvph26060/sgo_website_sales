<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CartService
{
    protected $cart;

    public function __construct()
    {
        if (Auth::check()) {
            // Nếu người dùng đã đăng nhập, lấy giỏ hàng từ database
            $this->cart = Cart::where('user_id', Auth::id())->get();
        } else {
            // Nếu người dùng chưa đăng nhập, lấy giỏ hàng từ session
            $this->cart = Session::get('cart', []);
        }
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($product, $quantity = 1)
    {
        if (Auth::check()) {
            // Nếu người dùng đã đăng nhập, lưu vào database
            $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first();
            if ($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);
            }
        } else {
            // Nếu người dùng chưa đăng nhập, lưu vào session
            $productId = $product->id;

            if (isset($this->cart[$productId])) {
                $this->cart[$productId]['quantity'] += $quantity;
            } else {
                $this->cart[$productId] = [
                    'product' => $product,
                    'quantity' => $quantity,
                ];
            }

            Session::put('cart', $this->cart);
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($productId)
    {
        if (Auth::check()) {
            // Xóa khỏi database
            Cart::where('user_id', Auth::id())->where('product_id', $productId)->delete();
        } else {
            // Xóa khỏi session
            if (isset($this->cart[$productId])) {
                unset($this->cart[$productId]);
            }

            Session::put('cart', $this->cart);
        }
    }

    // Cập nhật số lượng sản phẩm
    public function updateQuantity($productId, $quantity)
    {
        if (Auth::check()) {
            // Cập nhật database
            $cartItem = Cart::where('user_id', Auth::id())->where('product_id', $productId)->first();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        } else {
            // Cập nhật session
            if (isset($this->cart[$productId])) {
                $this->cart[$productId]['quantity'] = $quantity;
            }

            Session::put('cart', $this->cart);
        }
    }

    // Lấy tất cả các sản phẩm trong giỏ hàng
    public function getCartItems()
    {
        if (Auth::check()) {
            // Lấy từ database
            return Cart::with('product')->where('user_id', Auth::id())->get();
        } else {
            // Lấy từ session
            return $this->cart;
        }
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCart()
    {
        if (Auth::check()) {
            // Xóa tất cả trong database
            Cart::where('user_id', Auth::id())->delete();
        } else {
            // Xóa tất cả trong session
            $this->cart = [];
            Session::forget('cart');
        }
    }

    // Tính tổng giá trị giỏ hàng
    public function getTotal()
    {
        $total = 0;

        if (Auth::check()) {
            // Tính tổng từ database
            $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
            foreach ($cartItems as $item) {
                $total += $item->product->price * $item->quantity;
            }
        } else {
            // Tính tổng từ session
            foreach ($this->cart as $item) {
                $total += $item['product']->price * $item['quantity'];
            }
        }

        return $total;
    }


}
