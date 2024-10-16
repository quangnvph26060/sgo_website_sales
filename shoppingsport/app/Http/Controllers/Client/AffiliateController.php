<?php

namespace App\Http\Controllers\Client;

use App\Models\News;
use App\Models\Introduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AffiliateController extends Controller
{
    function introduce($slug = null)
    {
        $news = News::query()->latest('id')->limit(5)->get();

        if ($slug == null) {
            $newDetail = Introduction::query()->first();
            return view('client/pages/Affiliate/introduce', compact('news', 'newDetail'));
        }

        $newDetail = News::query()->where('slug', $slug)->first();
        return view('client/pages/Affiliate/introduce', compact('newDetail', 'news'));
    }

    function news()
    {

        $news = News::query()->latest('id')->paginate(10);

        return view('client/pages/Affiliate/news', compact('news'));
    }
}
