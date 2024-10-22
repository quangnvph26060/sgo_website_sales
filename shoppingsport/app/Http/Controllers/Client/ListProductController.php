<?php

namespace App\Http\Controllers\Client;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Categoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ListProductController extends Controller
{
    public function index(Request $request, $slug = null)
    {
        // Nếu không có slug, lấy tất cả sản phẩm
        if (!$slug) {
            $breadcrumbItems = [
                [
                    'name' => 'Trang chủ',
                    'link' => route('user.home-page'),
                ],
                [
                    'name' => 'Sản phẩm',
                ],
            ];
            $query = Product::with('discountValue', 'brand');
        } else {
            $category = Categoris::where('slug', $slug)->first();

            $breadcrumbItems = [
                [
                    'name' => 'Trang chủ',
                    'link' => route('user.home-page'),
                ],
                [
                    'name' => 'Sản phẩm',
                    'link' => route('user.list-product'),
                ],
                [
                    'name' => $category->name,
                ],
            ];

            if (!$category) {
                abort(404);
            }

            // Khởi tạo truy vấn cho sản phẩm theo danh mục
            $query = Product::with('discountValue', 'brand')->where('categori_id', $category->id);
        }

        $brands = Brand::query()->withCount('products')->get();

        // Lọc sản phẩm nếu có tham số 'onsale'
        if ($request->has('onsale') && $request->onsale === 'on-sale') {
            $query->whereNotNull('discount_id'); // Giả sử 'discount_id' không null thì sản phẩm đang có giảm giá
        }

        if ($request->has('instock') && $request->instock === 'in-stock') {
            $query->where('quantity', '>', 0);
        }

        if ($request->has('brand') && !empty($request->brand)) {
            $brands = $request->brand; // Lấy mảng tên thương hiệu từ request

            // Sử dụng whereHas để lọc theo name của bảng brands
            $query->whereHas('brand', function ($q) use ($brands) {
                $q->whereIn('name', $brands); // Tìm kiếm theo cột 'name' của bảng brands
            });
        }

        if ($request->has('price') && !empty($request->price)) {
            $priceRange = explode('_', $request->price);

            if (count($priceRange) === 2) {
                $minPrice = (int) $priceRange[0];
                $maxPrice = (int) $priceRange[1];

                $query->where(function ($q) use ($minPrice, $maxPrice) {
                    $q->whereHas('discountValue', function ($discountQuery) use ($minPrice, $maxPrice) {
                        $discountQuery->whereRaw('(sgo_product.price_new - (sgo_product.price_new * sgo_discounts.value / 100)) between ? and ?', [$minPrice, $maxPrice]);
                    })
                        ->orWhere(function ($q2) use ($minPrice, $maxPrice) {
                            $q2->whereNull('discount_id')
                                ->whereBetween('price_new', [$minPrice, $maxPrice]);
                        });
                });
            }
        }

        // Thực thi truy vấn và lấy kết quả
        $products = $query->paginate(10);

        $paginator = $products;

        if ($request->ajax()) {
            return response()->json([
                'html' => view('client.pages.include.product-response-item', compact('products'))->render(),
                'pagination' => view('vendor.custom', compact('paginator'))->render(),
                'total' => $products->total(),
            ]);
        }

        return view('client.pages.list', compact('products', 'brands' , 'breadcrumbItems'));
    }

    public function filterProducts(Request $request)
    {
        $query = Product::query()->with('discountValue');

        // Kiểm tra và áp dụng lọc cho 'onsale'
        $query->when($request->has('onsale') && $request->onsale === 'on-sale', function ($q) {
            return $q->whereNotNull('discount_id'); // Giả sử 'on_sale' là cột boolean
        });



        // Thực thi truy vấn và lấy kết quả
        $products = $query->get();


        return response()->json([
            'html' => view('client.pages.include.product-response-item', compact('products'))->render(),
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $products = Product::query()->with('discountValue', 'images');

        if (! empty($query)) {
            $products->where(DB::raw('LOWER(name)'), 'LIKE', '%' . strtolower($query) . '%');
        }

        $products = $products->paginate(20);

        // Thực hiện logic tìm kiếm sản phẩm dựa trên $query
        return view('client.pages.search', compact('products'));
    }
}
