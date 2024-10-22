<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Categoris;
use App\Models\CategoryBrand;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Can;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    //
    public function index(Request $request)
    {
        $title = 'Danh mục';
        // dd(Categoris::get()[8]->parent);
        $type = $request->query('type', 'parent');
        return view('admin.category.index', compact('type', 'title'));
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

    public function add(Request $request)
    {
        $title = 'Thêm danh mục';
        $type = $request->query('type');
        $categories = Categoris::whereNull('parent_id')->get();
        return view('admin.category.add', compact('categories', 'type', 'title'));
    }
    public function store(Request $request)
    {
        $existingCategory = Categoris::where('name', $request->name)
            ->orWhere('slug', Str::slug($request->name))
            ->first();

        if ($existingCategory) {
            // Nếu danh mục đã tồn tại, trả về thông báo lỗi và dừng quá trình
            return redirect()->back()->withErrors(['error' => 'Danh mục đã tồn tại.'])->withInput();
        }
        $this->categoryService->createCategory($request->all());
        return redirect()->route('admin.category.index', ['type' => 'parent']);
    }

    public function edit(Request $request, $id)
    {
        $title = 'Sửa danh mục';
        $type = $request->query('type');
        $categories = Categoris::whereNull('parent_id')->get();
        $category = $this->categoryService->getCategoryById($id);


        return view('admin.category.edit', compact('categories', 'type', 'category', 'title'));
    }

    public function update(Request $request, $id)
    {
        $category = Categoris::find($id);

        // if (!$category) {
        //     // Nếu danh mục không tồn tại, trả về thông báo lỗi
        //     return redirect()->back()->withErrors(['error' => 'Danh mục không tồn tại.'])->withInput();
        // }

        // Kiểm tra xem có danh mục nào khác có cùng tên hoặc slug không
        $existingCategory = Categoris::where('id', '!=', $id)
            ->where(function ($query) use ($request) {
                $query->where('name', $request->name)
                    ->orWhere('slug', Str::slug($request->name));
            })
            ->first();


        if ($existingCategory) {
            // Nếu danh mục đã tồn tại, trả về thông báo lỗi và dừng quá trình
            return redirect()->back()->withErrors(['error' => 'Danh mục đã tồn tại.'])->withInput();
        }
        $this->categoryService->updateCategory($request->all(), $id);
        return redirect()->route('admin.category.index', ['type' => 'parent']);
    }


    public function addbrand(Request $request)
    {
        $title = 'Thêm thương hiệu cho danh mục';
        // $categorychild = Categoris::where('parent_id', 2)->get();
        $type = $request->query('type');
        $categories = Categoris::whereNull('parent_id')->get();
        $brand = Brand::get();
        return view('admin.category.addbrandcategory', compact('categories', 'brand', 'type', 'title'));
    }

    public function storebrand(Request $request)
    {
        $existingCombination = CategoryBrand::where('category_id', $request->category_id)
            ->where('brand_id', $request->brand_id)
            ->first();

        if ($existingCombination) {
            // Nếu tồn tại, trả về thông báo lỗi
            return redirect()->back()->withErrors(['error' => 'Thương hiệu đã có trong danh mục.'])->withInput();
        }
        // dd($request->all());
        CategoryBrand::create([
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id
        ]);
        return redirect()->route('admin.category.index', ['type' => 'parent']);
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

    public function brandbycategory($id)
    {
        $category = Categoris::find($id);
        $brand = CategoryBrand::where('category_id', $id)->get();
        // dd($brand);
        return view('admin.category.brandbycategory', compact('category', 'brand'));
    }

    public function deletecategory($id)
    {

        Categoris::find($id)->delete();
        return response()->json(['success' => 'Xóa thành công']);
    }

    public function deletebrandbycategory($id)
    {
        Log::info(CategoryBrand::find($id));
        CategoryBrand::find($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công');
    }
}
