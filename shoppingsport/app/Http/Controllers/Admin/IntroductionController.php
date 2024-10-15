<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Introduction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IntroductionController extends Controller
{
    //
    public function index(){
        $title = "Thông tin công ty";
        $introduction = Introduction::first();
        return view('admin.introduction.index', compact('introduction'));
    }

    public function update(Request $request){
        $introduction = Introduction::first();
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
        ];
        if(isset($introduction)){
            $introduction->update($data);
        }else{
            Introduction::create($data);
        }

        return redirect()->route('admin.introduction.index')->with('success', 'Cập nhật thành công.');
    }

}
