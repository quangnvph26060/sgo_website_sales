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

        $data = $request->all();

        if ($request->hasFile('banner')) {
            $data['banner'] = saveImages($request, 'banner', 'config', 1200, 250);
        }

        if ($request->hasFile('slider1')) {

            $data['slider1'] = saveImages($request, 'slider1', 'config', 930, 520);
        }

        if ($request->hasFile('slider2')) {

            $data['slider2'] = saveImages($request, 'slider2', 'config', 930, 520);
        }

        if ($request->hasFile('slider3')) {

            $data['slider3'] = saveImages($request, 'slider3', 'config', 930, 520);
        }


        if ($config) {
            $config->update($data);
        } else {
            Config::create($data);
        }


        return redirect()->route('admin.config.index')->with('success', 'Cập nhật thông tin thành công');
    }
}
