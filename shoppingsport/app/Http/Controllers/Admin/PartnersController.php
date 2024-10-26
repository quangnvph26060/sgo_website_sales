<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Services\PartnersService;
use Illuminate\Http\Request;

class PartnersController extends Controller
{

    protected $partnersService;
    public function __construct(PartnersService $partnersService){
        $this->partnersService = $partnersService;
    }
    public function index(){
        $title = "Danh sách đối tác";
        $partners = $this->partnersService->getAllPartners();
        return view('admin.partner.index', compact('partners', 'title'));
    }
    public function add(){
        $title = "Thêm đối tác";
        return view('admin.partner.add', compact('title'));
    }

    public function addsubmit(Request $request){
        $this->partnersService->createPartner($request);
        return redirect()->route('admin.partner.index')->with('success', 'Thêm thành công!');
    }

    public function edit($id){
        $title = "Sửa đối tác";
        $partner = Partner::find($id);
        return view('admin.partner.edit', compact('partner', 'title'));
    }
    public function editsubmit(Request $request, $id){
        $this->partnersService->updatePartiner($request, $id);
        return redirect()->route('admin.partner.index')->with('success', 'Cập nhật thành công!');
    }

    public function delete($id){
        $this->partnersService->deletePartner($id);
        return redirect()->route('admin.partner.index')->with('success', 'Xóa thành công!');
    }
}
