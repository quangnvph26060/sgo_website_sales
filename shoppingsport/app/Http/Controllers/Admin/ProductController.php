<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use App\Models\TypeProduct;
use App\Services\BrandService;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    protected $brandService;
    protected $categoryService;
    protected $productService;
    public function __construct(BrandService $brandService, CategoryService $categoryService, ProductService $productService ){
        $this->brandService = $brandService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }
    public function index()
    {
        // $product = Product::get();
        // dd($product[0]->type);
        return view('admin.product.index');
    }

    // Fetch dữ liệu cho danh mục
    public function fetch(Request $request)
    {
        $product = Product::query();

        // Tìm kiếm nếu có
        if ($request->has('search')) {
            $product->where('name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp nếu có
        if ($request->has('sort_by')) {
            // Kiểm tra giá trị của sort_by để xác định cột sắp xếp
            if (in_array($request->sort_by, ['brand_id', 'category_id', 'type_id'])) {
                // Sắp xếp theo cột được yêu cầu (brand_id, category_id, type_id)
                $product->orderBy($request->sort_by, $request->sort_order);
            } else {
                // Sắp xếp theo cột khác do người dùng yêu cầu (ví dụ: name, price...)
                $product->orderBy($request->sort_by, $request->sort_order);
            }
        } else {
            // Mặc định sắp xếp theo id nếu không có yêu cầu sắp xếp
            $product->orderBy('id', 'asc');
        }

        // Phân trang
        $perPage = $request->input('per_page', 10); // 10 items per page
        $product = $product->paginate($perPage);

        Log::info($product);
        return response()->json($product); // Trả về dữ liệu JSON
    }

    public function add(){
        $brands = $this->brandService->getBrandAll();
        $categories = $this->categoryService->getCategories();
        // dd($categories);
        $discounts = Discount::get();
        $types = TypeProduct::get();
        return view('admin.product.add', compact('brands', 'categories', 'discounts', 'types' ));
    }

    public function edit($id){
        $brands = $this->brandService->getBrandAll();
        $categories = $this->categoryService->getCategories();
        $product = $this->productService->findProductById($id);
        $discounts = Discount::get();
        $types = TypeProduct::get();
        return view('admin.product.edit', compact('brands', 'categories', 'discounts', 'types', 'product' ));
    }

    public function store(Request $request){
        $this->productService->createProduct($request->all);
        return redirect()->route('admin.product.index', compact('success', 'Thêm thành công!'));
    }

    public function delete($id) {
        $this->productService->deleteProduct($id);
        return response()->json(['success' => 'Xóa thành công']);
    }
}