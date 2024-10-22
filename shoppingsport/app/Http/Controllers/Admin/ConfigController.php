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
    protected function saveFile($request, $fileName, $dataKey)
    {
        if ($request->hasFile($fileName)) {
            $file = $request->file($fileName);
            $fileExtension = $file->getClientOriginalExtension();
            $fileNameToStore = $dataKey . '_' . time() . '.' . $fileExtension;

            $filePath = $file->storeAs('public/new', $fileNameToStore);

            return $filePath;
        }

        return null;
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

        if ($request->hasFile('banner')) {
            Storage::deleteDirectory('public/banner');

            $banner = $request->file('banner');
            $timestamp = time(); // Lấy thời gian hiện tại
            $bannerFileName = 'banner_' . $timestamp . '_' . $banner->getClientOriginalName();
            $bannerFilePath = 'storage/banner/' . $bannerFileName;

            Storage::putFileAs('public/banner', $banner, $bannerFileName);
            $data['banner'] = $bannerFilePath;
        }

        if ($request->hasFile('slider1')) {
            Storage::deleteDirectory('public/slider1');

            $slider1 = $request->file('slider1');
            $timestamp = time();
            $slider1FileName = 'slider1_' . $timestamp . '_' . $slider1->getClientOriginalName();
            $slider1FilePath = 'storage/slider1/' . $slider1FileName;

            Storage::putFileAs('public/slider1', $slider1, $slider1FileName);
            $data['slider1'] = $slider1FilePath;
        }

        if ($request->hasFile('slider2')) {
            Storage::deleteDirectory('public/slider2');

            $slider2 = $request->file('slider2');
            $timestamp = time();
            $slider2FileName = 'slider2_' . $timestamp . '_' . $slider2->getClientOriginalName();
            $slider2FilePath = 'storage/slider2/' . $slider2FileName;

            Storage::putFileAs('public/slider2', $slider2, $slider2FileName);
            $data['slider2'] = $slider2FilePath;
        }

        if ($request->hasFile('slider3')) {
            Storage::deleteDirectory('public/slider3');
            $slider3 = $request->file('slider3');
            $timestamp = time();
            $slider3FileName = 'slider3_' . $timestamp . '_' . $slider3->getClientOriginalName();
            $slider3FilePath = 'storage/slider3/' . $slider3FileName;

            Storage::putFileAs('public/slider3', $slider3, $slider3FileName);
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
