<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function createProduct($data)
    {
        $existingProduct = $this->product->where('name', $data['name'])->exists();

        if ($existingProduct) {
            // Nếu sản phẩm đã tồn tại, trả về lỗi để hiển thị trong Blade
            return ['error' => 'Sản phẩm đã tồn tại.'];
        }
        // Lưu sản phẩm
        $product = $this->product->create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'], '-'),
            'categori_id' => $data['category_id'],
            'brand_id' => $data['brand_id'],
            'type_id' => $data['type_id'],
            'quantity' => $data['quantity'],
            'price_old' => $data['price_old'],
            'price_new' => $data['price_new'],
            'discount_id' => $data['discount_id'],
            'description_short' => $data['description_short'],
            'description' => $data['description'],
            'title_seo' => $data['title_seo'],
            'description_seo' => $data['description_seo'],
            'keyword_seo' => $data['keyword_seo'],
        ]);

        // Lưu hình ảnh
        if (isset($data['image'])) {
            foreach ($data['image'] as $image) {
                $item = now()->timestamp;
                $imageName = $product->id . '_' . $item . '_' . $image->getClientOriginalName();
                // Lưu hình ảnh vào thư mục 'public/products/product{id}'
                $image->storeAs('products/product' . $product->id, $imageName);

                // Lưu vào bảng hình ảnh với đường dẫn chính xác
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'products/product' . $product->id . '/' . $imageName,
                ]);
            }

        }


        return $product;
    }

    public function updateProduct($data, $id)
    {
        // dd($data);
        $product = $this->product->find($id);
        // Cập nhật thông tin sản phẩm
        $product->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'], '-'),
            'categori_id' => $data['categori_id'],
            'brand_id' => $data['brand_id'],
            'type_id' => $data['type_id'],
             'quantity' => $data['quantity'],
            'price_old' => $data['price_old'],
            'price_new' => $data['price_new'],
            'discount_id' => $data['discount_id'],
            'description_short' => $data['description_short'],
            'description' => $data['description'],
            'title_seo' => $data['title_seo'],
            'description_seo' => $data['description_seo'],
            'keyword_seo' => $data['keyword_seo'],
        ]);

        // Cập nhật hình ảnh mới
        if (isset($data['new_images'])) {
            foreach ($data['new_images'] as $image) {
                $item = now()->timestamp;
                $imageName = $product->id . '_' . $item . '_' . $image->getClientOriginalName();
                // Lưu hình ảnh vào thư mục 'public/products/product{id}'
                $image->storeAs('products/product' . $product->id, $imageName);

                // Lưu vào bảng hình ảnh với đường dẫn chính xác
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'products/product' . $product->id . '/' . $imageName,
                ]);
            }
        }


        if (isset($data['removed_images'])) {
            // Kiểm tra và chuyển đổi nếu 'removed_images' là chuỗi JSON
            $removedImages = is_string($data['removed_images']) ? json_decode($data['removed_images'], true) : $data['removed_images'];

            if (is_array($removedImages)) {
                foreach ($removedImages as $item) {
                    // Tìm hình ảnh theo ID
                    $product_img = ProductImage::find($item);
                    if ($product_img) {
                        $imagePath = $product_img->image;

                        // Chỉ lấy phần đường dẫn mà không có 'storage/'
                        $relativePath = str_replace('storage/', '', $imagePath);

                        // Kiểm tra tệp tồn tại
                        if (Storage::disk('public')->exists($relativePath)) {
                            Storage::disk('public')->delete($relativePath); // Xóa tệp
                            Log::info("Deleted image: " . $imagePath);
                        } else {
                            Log::warning("File does not exist: " . $imagePath);
                        }

                        // Xóa hình ảnh trong cơ sở dữ liệu
                        $product_img->delete();
                    } else {
                        Log::warning("Product image not found with id: " . $item);
                    }
                }
            }
        }



        return $product;
    }


    public function deleteProduct($id)
    {

        // Xóa hình ảnh liên quan
        $productImages = ProductImage::where('product_id', $id)->get();
        foreach ($productImages as $image) {
            if ($image) {
                $imagePath = $image->image;

                // Chỉ lấy phần đường dẫn mà không có 'storage/'
                $relativePath = str_replace('storage/', '', $imagePath);
                // Kiểm tra tệp tồn tại
                if (Storage::disk('public')->exists($relativePath)) {
                    Storage::disk('public')->delete($relativePath); // Xóa tệp
                    Log::info("Deleted image: " . $imagePath);
                } else {
                    Log::warning("File does not exist: " . $imagePath);
                }
                // Xóa hình ảnh trong cơ sở dữ liệu
                $image->delete();
            } else {
                Log::warning("Product image not found with id: " . $image);
            }
        }


        $product = $this->product->find($id);
        if ($product) {
            // Lưu đường dẫn thư mục chứa hình ảnh
            $productDirectory = 'products/product' . $id; // Không cần 'public/' ở đây

            // Xóa sản phẩm khỏi cơ sở dữ liệu
            $product->delete();

            // Xóa thư mục chứa hình ảnh
            if (Storage::disk('public')->exists($productDirectory)) {
                // Xóa tất cả các tệp bên trong thư mục và xóa cả thư mục
                Storage::disk('public')->deleteDirectory($productDirectory);
                Log::info("Deleted directory and its contents: " . $productDirectory);
            } else {
                Log::warning("Directory does not exist: " . $productDirectory);
            }
        }
        return $product;
    }

    public function getAllProducts($search = null)
    {
        if ($search) {
            return $this->product->where('name', 'LIKE', "%{$search}%")->get();
        }
        return $this->product->all();
    }

    public function findProductById($id)
    {
        return $this->product->findOrFail($id);
    }
}
