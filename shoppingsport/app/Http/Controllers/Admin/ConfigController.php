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

        // Lưu trữ logo
        $data['banner'] = $this->saveFile($request, 'banner', 'banner');
        $data['slider1'] = $this->saveFile($request, 'slider1', 'slider1');
        $data['slider2'] = $this->saveFile($request, 'slider2', 'slider2');
        $data['slider3'] = $this->saveFile($request, 'slider3', 'slider3');
       
        if ($config) {
            $config->update($data);
        } else {
            Config::create($data);
        }


        return redirect()->route('admin.config.index')->with('success', 'Cập nhật thông tin thành công');
    }
}
