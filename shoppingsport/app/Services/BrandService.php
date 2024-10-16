<?php

namespace App\Services;

use App\Models\Brand;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class BrandService
{
    protected $brand;
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function getAllBrand(): LengthAwarePaginator
    {
        try {
            Log::info('Fetching all categories');
            $categories = $this->brand->orderByDesc('created_at')->paginate(10);
            return $categories;
        } catch (Exception $e) {
            Log::error('Failed to fetch brand: ' . $e->getMessage());
            throw new Exception('Failed to fetch brand');
        }
    }

    public function getBrandAll()
    {
        try {
            Log::info('Fetching all categories');
            $categories = $this->brand->get();
            return $categories;
        } catch (Exception $e) {
            Log::error('Failed to fetch brand: ' . $e->getMessage());
            throw new Exception('Failed to fetch brand');
        }
    }

    /**
     * Summary of createBrand
     * @param array $data
     * @throws Exception
     * @return Brand
     */
    public function createBrand(array $data): Brand
    {
        // dd($data);
        DB::beginTransaction();
        try {

            Log::info("Creating a new Brand with name: {$data['name']}");
            $existingBrand = $this->brand->where('slug', Str::slug($data['name']))->first();

            if ($existingBrand) {
                throw new Exception('Thương hiệu đã tồn tại.');
            }

            $brand = $this->brand->create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'description' => $data['description'],

            ]);
            DB::commit();
            return $brand;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Failed to create Brand: {$e->getMessage()}");
            throw new Exception('Thương hiệu đã tồn tại');
        }
    }

    public function getBrandById(int $id): Brand
    {
        Log::info("Fetching product with ID: $id");
        $brand = $this->brand->find($id);

        if (!$brand) {
            Log::warning("Product with ID: $id not found");
            throw new ModelNotFoundException("Product not found");
        }
        return $brand;
    }

    public function updateBrand(int $id, array $data): Brand
    {
        DB::beginTransaction();
    try {
        // Lấy thương hiệu hiện tại theo ID
        $brand = $this->getBrandById($id);
        Log::info("Updating brand with ID: $id");

        // Kiểm tra xem tên thương hiệu hoặc slug có bị trùng với thương hiệu khác không
        $existingBrand = $this->brand->where('slug', Str::slug($data['name']))->where('id', '!=', $id)->first();

        if ($existingBrand) {
            throw new Exception('Thương hiệu đã tồn tại.');
        }

        // Cập nhật thông tin thương hiệu
        $brand->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'description' => $data['description'],
        ]);

        // Commit transaction nếu thành công
        DB::commit();
        return $brand;
    } catch (Exception $e) {
        // Rollback transaction nếu có lỗi
        DB::rollBack();
        Log::error("Failed to update brand: {$e->getMessage()}");
        throw new Exception('Thương hiệu đã tồn tại.');
    }
    }

    public function brandByName($name)
    {
        try {
            $brand = $this->brand->where('name', 'LIKE', '%' . $name . '%')->first();
            return $brand;
        } catch (Exception $e) {
            Log::error("Failed to search products: {$e->getMessage()}");
            throw new Exception('Failed to search products');
        }
    }

    public function deleteBrand($id)
    {
        try {
            $brand = $this->getBrandById($id);
            $brand->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Failed to delete brand:" . $e->getMessage());
            throw new Exception("Failed to delete brand");
        }
    }
}
