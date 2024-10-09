@extends('admin.layout.index')

@section('content')
<style>
     .cke_notifications_area{
        display: none;
    }
    .image-upload-container {
        margin: 20px 0px;
    }

    #image-preview-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .image-preview {
        position: relative;
        width: 100px;
        height: 100px;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        display: inline-block;
    }

    .image-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-preview .remove-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 12px;
        padding: 2px 5px;
    }
</style>
<div class="page-inner">
    <div class="page-header">
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="#">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Sản phẩm</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Thêm sản phẩm</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" style="justify-content: center" >

                        <h4 class="card-title">Thêm sản phẩm</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <form method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Tên sản phẩm:</label><br>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category">Danh mục  :</label><br>
                                            <select class="form-control" id="category" name="category">
                                                <option value="">-- Chọn danh mục --</option>
                                                @forelse($categories as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="brand_id">Thương hiệu  :</label><br>
                                            <select class="form-control" id="brand_id" name="brand_id">
                                                <option value="">-- Chọn thương hiệu --</option>
                                                @forelse($brands as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="type_id">Loại kích cỡ  :</label><br>
                                            <select class="form-control" id="type_id" name="type_id">
                                                <option value="">-- Chọn loại kích cỡ --</option>
                                                @forelse($types as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Giá nhập :</label><br>
                                            <input type="number" class="form-control" id="price_old" name="price_old">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Giá bán :</label><br>
                                            <input type="number" class="form-control" id="price_old" name="price_old">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="discount_id">Khuyến mãi :</label><br>
                                            <select class="form-control" id="discount_id" name="discount_id">
                                                <option value="">-- Chọn khuyễn mãi --</option>
                                                @forelse($discounts as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name . " - ". number_format($value->value) }}%</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group image-upload-container">
                                            <label for="image-input" class="form-label">Chọn ảnh:</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="image-input" name="image[]" multiple accept="image/*">
                                                <label class="custom-file-label" for="image-input">Chọn nhiều ảnh...</label>
                                            </div>
                                            <div class="row" id="image-preview-container"></div> <!-- Thêm row để căn ảnh -->
                                        </div>
                                    </div>


                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Đặc điểm nổi bật:</label><br>
                                            <textarea required name="description_short" class="form-control" id="content" rows="10"
                                                cols="80"></textarea><br><br>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Mô tả chi tiết :</label><br>
                                            <textarea required name="description" class="form-control" id="description" rows="10"
                                                cols="80"></textarea><br><br>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.19.1/standard-all/ckeditor.js"></script>
<script>
      CKEDITOR.replace('content', {
    toolbar: [
        { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
        { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
        { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt' ] },
        { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        '/',
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript', '-', 'Strike', 'RemoveFormat' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'tools', items: [ 'Maximize', 'ShowBlocks', '-' ] },
        { name: 'about', items: [ 'About' ] }
    ],
    extraPlugins: 'font,colorbutton,justify',
    fontSize_sizes: '11px;12px;13px;14px;15px;16px;18px;20px;22px;24px;26px;28px;30px;32px;34px;36px',
});

CKEDITOR.replace('description', {
    toolbar: [
        { name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
        { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
        { name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt' ] },
        { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
        '/',
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript', '-', 'Strike', 'RemoveFormat' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
        { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
        '/',
        { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
        { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
        { name: 'tools', items: [ 'Maximize', 'ShowBlocks', '-' ] },
        { name: 'about', items: [ 'About' ] }
    ],
    extraPlugins: 'font,colorbutton,justify',
    fontSize_sizes: '11px;12px;13px;14px;15px;16px;18px;20px;22px;24px;26px;28px;30px;32px;34px;36px',
});
</script>



@endsection
