<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    //
    public function index()
    {
        $title = 'Thông tin cửa hàng';
        $config = Config::first();
        return view('admin.config.index', compact('config', 'title'));
    }

    public function update(Request $request)
    {
        // Tìm bản ghi WebsiteSetting duy nhất
        $config = Config::first();

        // Cập nhật các trường khác

        $data = [
            'title_seo' => $request->input('title_seo'),
            'meta_seo' =>  $request->input('meta_seo'),
            'description_seo' => $request->input('description_seo'),
            'description' => $request->input('description'),
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'constant_hotline' => $request->input('constant_hotline'),
            'sale_phone_number' => $request->input('sale_phone_number'),
            'zalo_phonenumber' => $request->input('zalo_phonenumber'),
            'website' => $request->input('website'),
            'facebook_url' => $request->input('facebook_url'),
            'instagram_url' => $request->input('instagram_url'),
            'youtube_url' => $request->input('youtube_url'),
            'footer' => $request->input('footer'),
        ];

        // Lưu trữ logo

        // Tương tự cho các trường slider và banner
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $bannerFileName = 'banner_' . $banner->getClientOriginalName();

            // Sử dụng putFile để lưu và lấy đường dẫn
            $path = $banner->storeAs('new', $bannerFileName);

            $data['banner'] = $path; // Đường dẫn đến tệp đã lưu
        }

        if ($request->hasFile('slider1')) {
            $slider1 = $request->file('slider1');
            $slider1FileName = 'slider1_' . $slider1->getClientOriginalName();

            $slider1FilePath = $slider1->storeAs('new', $slider1FileName);

            $data['slider1'] = $slider1FilePath;
        }

        if ($request->hasFile('slider2')) {
            $slider2 = $request->file('slider2');
            $slider2FileName = 'slider2_' . $slider2->getClientOriginalName();
            $slider2FilePath = $slider2->storeAs('new', $slider2FileName);


            $data['slider2'] = $slider2FilePath;
        }

        if ($request->hasFile('slider3')) {
            $slider3 = $request->file('slider3');
            $slider3FileName = 'slider3_' . $slider3->getClientOriginalName();
            $slider3FilePath = $slider3->storeAs('new', $slider3FileName);

            $data['slider3'] = $slider3FilePath;
        }

        if ($config) {
            $config->update($data);
        } else {
            Config::create($data);
        }


        return redirect()->route('admin.config.index')->with('success', 'Cập nhật thông tin thành công');
    }
}
