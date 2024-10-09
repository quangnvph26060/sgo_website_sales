<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class NewsService
{
    protected $news;
    public function __construct(News $news){
        $this->news = $news;
    }
    // Lấy tất cả tin tức
    public function getAllNews()
    {
        return $this->news::all(); // Sử dụng $this->news để gọi model
    }

    // Lưu bài báo mới vào cơ sở dữ liệu
    public function createNews($data)
    {
        $user = Auth::user();
        $slug = Str::slug($data['title'], '-');
        $validatedData =  [
            'title' => $data['title'],
            'author_id' => $user->id,
            'slug' => $slug,
            'type' => $data['type'],
            'content' => $data['content'],
        ];

        if (isset($data['logo'])) {
            $logoFilePath = $this->uploadLogo($data['logo']);
            $validatedData['logo'] = $logoFilePath;
        }

        return $this->news::create($validatedData); // Sử dụng $this->news
    }

    // Hiển thị thông tin chi tiết của một bài báo
    public function getNewsById($id)
    {
        return $this->news::find($id); // Sử dụng $this->news
    }

    // Cập nhật bài báo
    public function updateNews($data, $id)
    {
        $slug = Str::slug($data['title'], '-');
        $validatedData =  [
            'title' => $data['title'],
            'content' => $data['content'],
            'slug' => $slug,
            'type' => $data['type'],
        ];

        if (isset($data['logo'])) {
            $logoFilePath = $this->uploadLogo($data['logo']);
            $validatedData['logo'] = $logoFilePath;
        }

        $sgoNews = $this->news::find($id); // Sử dụng $this->news
        $sgoNews->update($validatedData);

        return $sgoNews;
    }

    // Xóa bài báo
    public function deleteNews($id)
    {
        $sgoNews = $this->news::find($id); // Sử dụng $this->news
        if ($sgoNews) {
            $sgoNews->delete();
        }
    }

    // Phương thức để tải lên logo
    private function uploadLogo($logo)
    {
        $logoFileName = 'image_' . $logo->getClientOriginalName();
        $logoFilePath = 'storage/new/' . $logoFileName;
        Storage::putFileAs('public/new', $logo, $logoFileName);
        return $logoFilePath;
    }
}
