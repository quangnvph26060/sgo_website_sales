<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Brand;
use App\Models\CategoryBrand;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryBrandService
{
    protected $categoryBrand;

    public function __construct(CategoryBrand $categoryBrand)
    {
        $this->categoryBrand = $categoryBrand;
    }

    /**
     * Lấy danh sách category-brand từ bảng trung gian
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategoryBrands()
    {
        try {
            Log::info('Fetching all category-brand relationships');
            return $this->categoryBrand->all();
        } catch (Exception $e) {
            Log::error('Failed to fetch category-brand relationships: ' . $e->getMessage());
            throw new Exception('Failed to fetch category-brand relationships');
        }
    }


    public function addCategoryBrand( $categoryId,  $brandId): CategoryBrand
    {
        DB::beginTransaction();

        try {
            Log::info("Adding new category-brand relationship: category_id={$categoryId}, brand_id={$brandId}");

            $categoryBrand = $this->categoryBrand->create([
                'category_id' => $categoryId,
                'brand_id' => $brandId
            ]);

            DB::commit();
            return $categoryBrand;

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to add category-brand relationship: ' . $e->getMessage());
            throw new Exception('Failed to add category-brand relationship');
        }
    }


    public function updateCategoryBrand( $categoryId,  $brandId, array $data): CategoryBrand
    {
        DB::beginTransaction();

        try {
            Log::info("Updating category-brand relationship: category_id={$categoryId}, brand_id={$brandId}");

            $categoryBrand = $this->categoryBrand
                ->where('category_id', $categoryId)
                ->where('brand_id', $brandId)
                ->firstOrFail();

            $update = $categoryBrand->update($data);

            DB::commit();
            return $update;

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to update category-brand relationship: ' . $e->getMessage());
            throw new Exception('Failed to update category-brand relationship');
        }
    }

    
    public function deleteCategoryBrand(int $categoryId, int $brandId)
    {
        DB::beginTransaction();

        try {
            Log::info("Deleting category-brand relationship: category_id={$categoryId}, brand_id={$brandId}");

            $categoryBrand = $this->categoryBrand
                ->where('category_id', $categoryId)
                ->where('brand_id', $brandId)
                ->firstOrFail();

            $delete = $categoryBrand->delete();

            DB::commit();
            return $delete;

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Failed to delete category-brand relationship: ' . $e->getMessage());
            throw new Exception('Failed to delete category-brand relationship');
        }
    }
}
