<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    protected $brandService;
    public function __construct(BrandService $brandService){
        $this->brandService = $brandService;
     }
    //
    public function index()
    {
        return view('admin.brand.index');
    }

    // Fetch dữ liệu cho danh mục
    public function fetch(Request $request)
    {
        $brand = Brand::query();

        // Tìm kiếm nếu có
        if ($request->has('search')) {
            $brand->where('name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp nếu có
        if ($request->has('sort_by')) {
            $brand->orderBy($request->sort_by, $request->sort_order);
        } else {
            $brand->orderBy('id', 'asc');
        }

        // Phân trang
        $perPage = $request->input('per_page', 10); // 10 items per page
        $brand = $brand->paginate($perPage);

        Log::info($brand);
        return response()->json($brand); // Trả về dữ liệu JSON
    }

    public function add(){

        return view('admin.brand.add');
    }

    public function store(Request $request) {
        $this->brandService->createBrand($request->all());
        return redirect()->route('admin.brand.index')->with('success', 'Thêm thành công');
    }

    public function edit($id) {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update($id) {
        $this->brandService->updateBrand($id, request()->all());
        return redirect()->route('admin.brand.index')->with('success', 'Sửa thành công');
    }

    public function delete($id) {
        $this->brandService->deleteBrand($id);
        return response()->json(['success' => 'Xóa thành công']);
    }
}
