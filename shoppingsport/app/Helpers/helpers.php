<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('formatPrice')) {
    function formatPrice($price)
    {
        return number_format($price, 0, ',', '.') . ' VND';
    }
}

if (!function_exists('showImageStorage')) {
    function showImageStorage($image)
    {
        if ($image && Storage::exists($image)) {
            return Storage::url($image);
        }

        return asset('user-default.png');
    }
}

if (!function_exists('generateRandomPassword')) {
    function generateRandomPassword($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('showPrice')) {
    function showPrice($price)
    {
        return number_format($price, 0, ',', ',') . 'đ';
    }
}

if (!function_exists('formatPriceCart')) {
    function formatPriceCart($price)
    {
        return number_format((float)str_replace(',', '', $price), 0, ',', '.') . 'đ';
    }
}

if (!function_exists('generateRandomString')) {
    function generateRandomString($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}

if (!function_exists('caculateDiscount')) {
    function caculateDiscount($price, $discount)
    {
        if (is_null($discount)) {
            return number_format($price, 0, ',', '.') . 'đ';
        }

        $discountedPrice = $price - ($price * $discount / 100);
        return number_format($discountedPrice, 0, ',', '.') . 'đ';
    }
}
