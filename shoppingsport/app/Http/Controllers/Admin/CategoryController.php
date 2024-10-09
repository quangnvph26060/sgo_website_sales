<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categoris;
use App\Models\CategoryBrand;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }
    //
    public function index(Request $request)
    {
        // dd(Categoris::get()[8]->parent);
        $type = $request->query('type', 'parent');
        return view('admin.category.index', compact('type'));
    }

    // Fetch dữ liệu cho danh mục
    public function fetch(Request $request, $type)
    {
        $products = Categoris::query();

        // Phân loại danh mục chính hoặc phụ
        if ($type == 'parent') {
            $products = $products->whereNull('parent_id');
        } else {
            $products = $products->whereNotNull('parent_id');
        }

        // Tìm kiếm nếu có
        if ($request->has('search')) {
            $products->where('name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp nếu có
        if ($request->has('sort_by')) {
            $products->orderBy($request->sort_by, $request->sort_order);
        } else {
            $products->orderBy('id', 'asc');
        }

        // Phân trang
        $perPage = $request->input('per_page', 10); // 10 items per page
        $products = $products->paginate($perPage);

        return response()->json($products); // Trả về dữ liệu JSON
    }

    public function add(Request $request){
        $type = $request->query('type');
        $categories = Categoris::whereNull('parent_id')->get();
        return view('admin.category.add', compact('categories', 'type'));
    }

    public function edit(Request $request, $id){
        $type = $request->query('type');
        $categories = Categoris::whereNull('parent_id')->get();
        $category = $this->categoryService->getCategoryById($id);


        return view('admin.category.edit', compact('categories', 'type', 'category'));
    }


    public function addbrand(Request $request){
        // $categorychild = Categoris::where('parent_id', 2)->get();
        $type = $request->query('type');
        $categories = Categoris::whereNull('parent_id')->get();
        $brand = Brand::get();
        return view('admin.category.addbrandcategory', compact('categories', 'brand', 'type'));
    }

    public function getBrands($categoryId)
    {
        $categorychild = Categoris::where('parent_id', $categoryId)->get();
        $categorybrand = CategoryBrand::where('category_id', $categoryId)->get();
        return response()->json([
            'categorychild' => $categorychild,
            'categorybrand' => $categorybrand,
        ]);
    }


}
