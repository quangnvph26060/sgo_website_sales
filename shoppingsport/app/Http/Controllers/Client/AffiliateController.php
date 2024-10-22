<?php

namespace App\Http\Controllers\Client;

use App\Models\News;
use App\Models\Introduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AffiliateController extends Controller
{
    function introduce()
    {
        $introduce = Introduction::query()->latest('id')->first();
        $news = News::query()->latest('id')->limit(5)->get();

        return view('client/pages/Affiliate/introduce', compact('introduce', 'news'));
    }

    public function news($slug = null)
    {

        $news = News::query()->latest('id')->paginate(10);

        if ($slug) {
            $newsItem = News::where('slug', $slug)->first();

            if (!$newsItem) {
                abort(404);
            }

            // Nếu có slug, chỉ lấy tin tức cụ thể
            $breadcrumbItems = [
                [
                    'name' => 'Trang chủ',
                    'link' => route('user.home-page'),
                ],
                [
                    'name' => 'Tin tức',
                    'link' => route('user.list-news'), // Link đến trang danh sách tin tức
                ],
                [
                    'name' => $newsItem->title, // Tiêu đề tin tức
                ],
            ];
        } else {
            $newsItem = null;
            // Nếu không có slug, lấy tất cả tin tức
            $breadcrumbItems = [
                [
                    'name' => 'Trang chủ',
                    'link' => route('user.home-page'),
                ],
                [
                    'name' => 'Tin tức',
                ],
            ];
        }

        return view('client.pages.Affiliate.news', compact('news', 'newsItem', 'breadcrumbItems'));
    }
}
