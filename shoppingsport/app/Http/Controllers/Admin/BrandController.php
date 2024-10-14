<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Services\BrandService;
use Exception;
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
        $title = 'Thương hiệu';
        return view('admin.brand.index', compact('title'));
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
        $title = 'Thêm thương hiệu';
        return view('admin.brand.add', compact('title'));
    }

    public function store(Request $request) {

        try {
            // Gọi service để tạo thương hiệu
            $data = $request->all();
            $this->brandService->createBrand($data);

            // Nếu thành công, chuyển hướng với thông báo thành công
            return redirect()->route('admin.brand.index')->with('success', 'Thêm thành công');
        } catch (Exception $e) {
            // Nếu có lỗi, chuyển hướng với thông báo lỗi
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function edit($id) {
        $brand = Brand::find($id);
        $title = 'Sửa thương hiệu';
        return view('admin.brand.edit', compact('brand', 'title'));
    }

    public function update($id , Request $request) {


        try {
            // Gọi service để cập nhật thương hiệu
            $brand = $this->brandService->updateBrand($id, $request->all());
            // Nếu thành công, chuyển hướng với thông báo thành công
            return redirect()->route('admin.brand.index')->with('success', 'Sửa thành công');
        } catch (Exception $e) {
            // Nếu có lỗi, chuyển hướng với thông báo lỗi
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function delete($id) {
        $this->brandService->deleteBrand($id);
        return response()->json(['success' => 'Xóa thành công']);
    }
}
