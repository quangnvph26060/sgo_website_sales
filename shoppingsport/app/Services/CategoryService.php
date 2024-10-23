<?php

namespace App\Services;

use App\Models\Categoris;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryService
{
    protected $category;

    public function __construct(Categoris $category)
    {
        $this->category = $category;
    }

    public function getAllCategories(): LengthAwarePaginator
    {
        try {
            Log::info('Fetching all categories');
            $categories = $this->category->with('parent')->orderByDesc('created_at')->paginate(10);
            return $categories;
        } catch (Exception $e) {
            Log::error('Failed to fetch categories: ' . $e->getMessage());
            throw new Exception('Failed to fetch categories');
        }
    }

    public function getCategories()
    {
        try {
            Log::info('Fetching all categories without pagination');
            $categories = $this->category->get();
            return $categories;
        } catch (Exception $e) {
            Log::error('Failed to fetch categories: ' . $e->getMessage());
            throw new Exception('Failed to fetch categories');
        }
    }

    public function createCategory($data): Categoris
    {
        DB::beginTransaction();
        try {
            // Log::info("Creating a new category with name: {$data->name}");

            $logo = saveImages($data, 'logo', 'category', 600, 453);

            $category = $this->category->create([
                'name' => $data->name,
                'description' => $data->description,
                'parent_id' => $data->parent_id ?? null, // Nếu không có parent_id, để null
                'slug' => Str::slug($data->name),
                'title_seo' => $data->title_seo,
                'description_seo' => $data->description_seo,
                'keyword_seo' => $data->keyword_seo,
                'logo' => $logo
            ]);

            DB::commit();
            return $category;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Failed to create category: {$e->getMessage()}");
            throw new Exception('Failed to create category');
        }
    }

    public function getCategoryById(int $id): Categoris
    {
        Log::info("Fetching category with ID: $id");
        $category = $this->category->find($id);

        if (!$category) {
            Log::warning("Category with ID: $id not found");
            throw new ModelNotFoundException("Category not found");
        }

        return $category;
    }

    public function updateCategory(array $data, int $id): Categoris
    {
        DB::beginTransaction();
        try {
            $category = $this->getCategoryById($id);
            Log::info("Updating category with ID: $id");
            $timestamp = Carbon::now()->format('YmdHis');
            if (isset($data['logo'])) {
                $logo = $data['logo'];
                $directoryPath = 'public/category';
                $logoFileName = 'home_' . $timestamp . $logo->getClientOriginalName();
                $logoFilePath = $logo->storeAs($directoryPath, $logoFileName);
            }

            $category->update([
                'name' => $data['name'],
                'description' => $data['description'],
                'parent_id' => $data['parent_id'] ?? null, // Nếu không có parent_id, để null
                'slug' => Str::slug($data['name']),
                'title_seo' => $data['title_seo'],
                'description_seo' => $data['description_seo'],
                'keyword_seo' => $data['keyword_seo'],
                'logo' => $logoFilePath ?? ''
            ]);

            DB::commit();
            return $category;
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Failed to update category: {$e->getMessage()}");
            throw new Exception('Failed to update category');
        }
    }

    public function deleteCategory($id)
    {
        DB::beginTransaction();
        try {
            $category = $this->getCategoryById($id);
            Log::info("Deleting category with ID: $id");

            $category->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Failed to delete category: " . $e->getMessage());
            throw new Exception("Failed to delete category");
        }
    }

    public function getCategoriesByParentId($parentId)
    {
        try {
            Log::info("Fetching categories with parent_id: $parentId");
            return $this->category->where('parent_id', $parentId)->get();
        } catch (Exception $e) {
            Log::error("Failed to fetch categories by parent_id: {$e->getMessage()}");
            throw new Exception('Failed to fetch categories by parent_id');
        }
    }
}
