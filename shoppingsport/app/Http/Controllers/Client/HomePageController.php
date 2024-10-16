<?php

namespace App\Http\Controllers\Client;

use App\Models\News;
use App\Models\Partner;
use App\Models\Categoris;
use Illuminate\Http\Request;
use App\Models\CustomerReview;
use App\Http\Controllers\Controller;

class HomePageController extends Controller
{
    public function home()
    {
        $productCategories = Categoris::query()
            ->with('children')
            ->withCount('products')
            ->whereNull('parent_id')
            ->get();


        $productCategories->each(function ($category) {
            $category->setRelation('products', $category->products()->with([
                'images' => function ($query) {
                    $query->first();
                },
                'discountValue'
            ])->latest('id')->limit(10)->get());
        });

        $news = News::query()->latest('id')->limit(4)->get();

        $evaluates = CustomerReview::query()->latest('id')->limit(5)->get();

        $partners = Partner::query()->latest('id')->get();

        return view('client.pages.home-page', compact('productCategories', 'news', 'evaluates', 'partners'));
    }
}
