<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImage;
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
        // Lưu sản phẩm
        $product = $this->product->create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'], '-'),
            'category_id' => $data['category_id'],
            'brand_id' => $data['brand_id'],
            'type_id' => $data['type_id'],
            'color' => $data['color'],
            'price_old' => isset($data['discount_id']) ? $data['price_new'] * $data['discount'] : null,
            'price_new' => $data['price_new'],
            'discount_id' => $data['discount_id'],
            'description_short' => $data['description_short'],
            'description' => $data['description'],
        ]);

        // Lưu hình ảnh
        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $imageName = $product->id . '_' . $image->getClientOriginalName();
                $image->storeAs('public/products', $imageName); // Lưu vào thư mục public/products

                // Lưu vào bảng hình ảnh
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'storage/products/' . $imageName,
                ]);
            }
        }

        return $product;
    }

    public function updateProduct($product, $data)
    {
        // Cập nhật thông tin sản phẩm
        $product->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'], '-'),
            'category_id' => $data['category_id'],
            'brand_id' => $data['brand_id'],
            'type_id' => $data['type_id'],
            'color' => $data['color'],
            'price_old' => isset($data['discount_id']) ? $data['price_new'] * $data['discount'] : null,
            'price_new' => $data['price_new'],
            'discount_id' => $data['discount_id'],
            'description_short' => $data['description_short'],
            'description' => $data['description'],
        ]);

        // Lấy danh sách hình ảnh hiện tại
        $existingImages = ProductImage::where('product_id', $product->id)->get();
        $existingImagePaths = $existingImages->pluck('image')->toArray(); // Lấy đường dẫn hình ảnh hiện tại

        // Tạo một mảng để lưu hình ảnh mới
        $newImagePaths = [];

        // Cập nhật hình ảnh mới
        if (isset($data['images'])) {
            foreach ($data['images'] as $image) {
                $imageName = $product->id . '_' . $image->getClientOriginalName();
                $image->storeAs('public/products', $imageName); // Lưu vào thư mục public/products

                // Lưu vào bảng hình ảnh
                $newImagePath = 'storage/products/' . $imageName;
                // Thêm hình ảnh mới vào mảng
                $newImagePaths[] = $newImagePath;

                // Nếu hình ảnh chưa tồn tại, thêm vào cơ sở dữ liệu
                if (!in_array($newImagePath, $existingImagePaths)) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $newImagePath,
                    ]);
                }
            }
        }

        // Xóa những hình ảnh không còn trong mảng hình ảnh mới
        foreach ($existingImages as $existingImage) {
            if (!in_array($existingImage->image, $newImagePaths)) {
                // Xóa hình ảnh từ storage
                Storage::delete($existingImage->image);
                // Xóa hình ảnh trong cơ sở dữ liệu
                $existingImage->delete();
            }
        }

        return $product;
    }


    public function deleteProduct($product)
    {
        $product->delete();
        // Xóa hình ảnh liên quan
        $productImages = ProductImage::where('product_id', $product->id)->get();
        foreach ($productImages as $image) {
            Storage::delete($image->image);
            $image->delete();
        }
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
