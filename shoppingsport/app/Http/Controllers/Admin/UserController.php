<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function updateuser(Request $request){
        $user_id = Auth::user()->id;
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
        ];
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        if ($request->hasFile('avatar')) {
            $logo = $request->file('avatar');
            $directoryPath = 'public/avataruser';

            // Tạo tên file với định dạng image_ + tên file gốc
            $logoFileName = 'image_' . time() . '_' . $logo->getClientOriginalName();
            $logoFilePath = 'storage/avataruser/' . $logoFileName;

            // Lưu file vào thư mục đã chỉ định
            $logo->storeAs($directoryPath, $logoFileName); // Sử dụng storeAs để lưu file với tên cụ thể
            $data['avatar'] = $logoFilePath;
        }
        $user = User::find($user_id);
        $user->update($data);

        return redirect()->back()->with('success', 'Thông tin người dùng đã được cập nhật.');
    }
}
