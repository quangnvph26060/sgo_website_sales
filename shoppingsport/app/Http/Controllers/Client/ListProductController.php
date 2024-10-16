<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use App\Models\Categoris;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class ListProductController extends Controller
{
    public function index(Request $request, $slug)
    {
        $category = Categoris::where('slug', $slug)->first();
        $brands = Brand::query()->withCount('products')->get();

        if (!$category) {
            abort(404);
        }

        // Khởi tạo truy vấn cho sản phẩm
        $query = Product::with('discountValue', 'brand')->where('categori_id', $category->id);

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
                        $discountQuery->whereRaw('(sgo_product.price_old - (sgo_product.price_old * sgo_discounts.value / 100)) between ? and ?', [$minPrice, $maxPrice]);
                    })
                        ->orWhere(function ($q2) use ($minPrice, $maxPrice) {
                            $q2->whereNull('discount_id')
                                ->whereBetween('price_old', [$minPrice, $maxPrice]);
                        });
                });
            }
        }






        // Thực thi truy vấn và lấy kết quả
        $products = $query->paginate(10);

        // dd($products);

        $paginator = $products;

        if ($request->ajax()) {
            return response()->json([
                'html' => view('client.pages.include.product-response-item', compact('products', 'category'))->render(),
                'pagination' => view('vendor.custom', compact('paginator'))->render(),
                'total' => $products->total(),
            ]);
        }

        return view('client.pages.list', compact('products', 'category', 'brands'));
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
}
