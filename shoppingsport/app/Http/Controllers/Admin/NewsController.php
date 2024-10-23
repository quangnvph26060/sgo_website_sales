<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\SgoNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    // Fetch dữ liệu cho danh mục
    public function fetch(Request $request)
    {
        $news = News::query();

        // Tìm kiếm nếu có
        if ($request->has('search')) {
            $news->where('title', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp nếu có
        if ($request->has('sort_by')) {
            if (in_array($request->sort_by, ['views', 'author_id'])) {
                $news->orderBy($request->sort_by, $request->sort_order);
            } else {

                $news->orderBy($request->sort_by, $request->sort_order);
            }
        } else {
            // Mặc định sắp xếp theo id nếu không có yêu cầu sắp xếp
            $news->orderBy('id', 'asc');
        }

        // Phân trang
        $perPage = $request->input('per_page', 10); // 10 items per page
        $news = $news->paginate($perPage);

        return response()->json($news); // Trả về dữ liệu JSON
    }

    // Hiển thị form tạo mới bài báo
    public function create()
    {
        $title = "Thêm mới Tin tức";
        return view('admin.news.add', compact('title'));
    }

    // Lưu bài báo mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $user = Auth::user();

        $data = $request->all();

        $data['slug'] = Str::slug($request->title, '-');

        $existingPost = SgoNews::where('slug', $data['slug'])->first();

        if ($existingPost) {
            // Nếu tồn tại bài viết với slug đó, trả về thông báo lỗi
            return redirect()->back()->withErrors(['title' => 'Tiêu đề bài viết đã  tồn tại, vui lòng chọn một tiêu đề khác!'])->withInput();
        }

        if ($request->hasFile('logo')) {
            $data['logo'] = saveImages($request, 'logo', 'news', 600, 417);
        }

        $data['author_id'] = $user->id;


        SgoNews::create($data);

        return redirect()->route('admin.new.index')->with('success', 'Bài viết đã được tạo thành công!');
    }

    // Hiển thị thông tin chi tiết của một bài báo
    public function show($id)
    {
        $title = "Thay đổi Tin Tức";
        $new = SgoNews::find($id);
        return view('admin.news.edit', compact('new', 'title'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title, '-');

        // Kiểm tra xem có bài viết nào khác với slug tương tự không, ngoại trừ bài viết hiện tại
        $existingPost = SgoNews::where('slug', $data['slug'])->where('id', '!=', $id)->first();

        if ($existingPost) {
            // Nếu tồn tại bài viết với slug đó (ngoại trừ bài viết hiện tại), trả về lỗi
            return redirect()->back()->withErrors(['title' => 'Tiêu đề bài viết đã tồn tại, vui lòng chọn tiêu đề khác!'])->withInput();
        }

        // Dữ liệu để cập nhật

        // Xử lý cập nhật logo nếu có
        if ($request->hasFile('logo')) {
            !is_null($existingPost) && deleteImage($existingPost->logo);
            $data['logo'] = saveImages($request, 'logo', 'news', 600, 417);
        }

        // Cập nhật bài viết
        $sgoNews = SgoNews::findOrFail($id);
        $sgoNews->update($data);

        return redirect()->route('admin.new.index')->with('success', 'Bài viết đã được cập nhật thành công!');
    }

    // Xóa bài báo khỏi cơ sở dữ liệu
    public function destroy($id)
    {

        $sgoNews = SgoNews::find($id);
        deleteImage($sgoNews->logo);
        $sgoNews->delete();

        // return redirect()->route('admin.new.index')->with('success', 'Bài viết đã được xóa thành công!');

        return response()->json([
            'succuss' => true,
            'message' => 'Bài viết đã được xóa thành công'
        ]);
    }
}
