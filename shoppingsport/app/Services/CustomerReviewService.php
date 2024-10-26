<?php

namespace App\Services;


use App\Models\CustomerReview;
use Illuminate\Support\Facades\Storage;

class CustomerReviewService
{
    // Thêm đánh giá mới
    public function createReview($data)
    {
        $criteria = $data->all();
        if ($data->hasFile('avatar')) {
            $criteria['avatar'] = saveImages($data, 'avatar', 'customer_review', 280, 280);
        }

        return CustomerReview::create($criteria);
    }

    // Lấy tất cả đánh giá
    public function getAllReviews()
    {
        return CustomerReview::all();
    }

    // Lấy đánh giá theo ID
    public function getReviewById($id)
    {
        return CustomerReview::find($id);
    }

    // Cập nhật đánh giá
    public function updateReview($id, $data)
    {
        $review = $this->getReviewById($id);
        $criteria = $data->all();
        if ($data->hasFile('avatar')) {
            $criteria['avatar'] = saveImages($data, 'avatar', 'customer_review', 280, 280);
        }
        $review->update($criteria);
        return $review;
    }

    // Xóa đánh giá
    public function deleteReview($id)
    {
        $review = $this->getReviewById($id);
        if ($review) {
            // Xóa avatar khỏi storage
            Storage::disk('public')->delete($review->avatar);

            $review->delete();
            return true;
        }
        return false; // Hoặc xử lý lỗi
    }
}
