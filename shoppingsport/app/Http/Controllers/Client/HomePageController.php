<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Categoris;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function home()
    {
        $categories = Categoris::query()
            ->with('children') 
            ->withCount('products') 
            ->whereNull('parent_id') 
            ->get();

 
        $categories->each(function ($category) {
            $category->setRelation('products', $category->products()->latest('id')->limit(10)->get());
        });

        return view('client.pages.home-page', compact('categories'));
    }
}
