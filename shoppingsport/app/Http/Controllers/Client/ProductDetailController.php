<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    public function show($slug)
    {
        $product = \App\Models\Product::with('discount', 'images')->where('slug', $slug)->first();
        // dd($product);

        return view('client.pages.detail', compact('product'));
    }

}
