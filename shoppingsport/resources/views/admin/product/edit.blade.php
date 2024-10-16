@extends('admin.layout.index')

@section('content')
<style>
    .cke_notifications_area {
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
    .error{
        color: red;
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
                    <div class="d-flex align-items-center" style="justify-content: center">

                        <h4 class="card-title">Thêm sản phẩm</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <form method="POST" id="saveproduct" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Tên sản phẩm:</label><br>
                                            <input type="text" class="form-control" id="nameproduct" name="name"
                                                value="{{ $product->name }}">
                                                <p id="error_nameproduct" class="error"></p>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category">Danh mục :</label><br>
                                            <select class="form-control" id="category1" name="categori_id">
                                                <option value="">-- Chọn danh mục --</option>
                                                @forelse($categories as $key => $value)
                                                <option {{ $product->categori_id == $value->id ? 'selected' : '' }}
                                                    value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                            <p id="error_category1" class="error"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="brand_id">Thương hiệu :</label><br>
                                            <select class="form-control" id="brand_id" name="brand_id">
                                                <option value="">-- Chọn thương hiệu --</option>
                                                @forelse($brands as $key => $value)
                                                <option {{ $product->brand_id == $value->id ? 'selected' : '' }}
                                                    value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="type_id">Loại kích cỡ :</label><br>
                                            <select class="form-control" id="type_id" name="type_id">
                                                <option value="">-- Chọn loại kích cỡ --</option>
                                                @forelse($types as $key => $value)
                                                <option {{ $product->type_id == $value->id ? 'selected' : '' }}
                                                    value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Giá nhập :</label><br>
                                            <input type="number" class="form-control" id="price_old" name="price_old"
                                                value="{{ $product->price_old }}">
                                                <p id="error_price_old" class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Giá bán :</label><br>
                                            <input type="number" class="form-control" id="price_new" name="price_new"
                                                value="{{ $product->price_new }}">
                                                <p id="error_price_new" class="error"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Số lượng:</label><br>
                                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
                                            <p id="error_quantity" class="error"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="discount_id">Khuyến mãi :</label><br>
                                            <select class="form-control" id="discount_id" name="discount_id">
                                                <option value="">-- Chọn khuyễn mãi --</option>
                                                @forelse($discounts as $key => $value)
                                                <option {{ $product->discount_id == $value->id ? 'selected' : '' }}
                                                    value="{{ $value->id }}"> {{ $value->name . " - ".
                                                    number_format($value->value) }}%</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-12">
                                        <div class="form-group image-upload-container">
                                            <label for="image-input" class="form-label">Chọn ảnh:</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="image-input" multiple
                                                    accept="image/*">
                                                <label class="custom-file-label" for="image-input">Chọn nhiều
                                                    ảnh...</label>
                                            </div>
                                            <div class="row" id="image-preview-container"></div>
                                            <!-- Thêm row để căn ảnh -->
                                        </div>
                                    </div> --}}

                                    <div class="col-md-12">
                                        <div class="form-group image-upload-container">
                                            <label for="image-input" class="form-label">Chọn ảnh:</label>
                                            <div class="custom-file mb-3">
                                                <input type="file" class="custom-file-input" id="image-input" name="new_images[]" multiple accept="image/*" onchange="previewNewImages()">
                                                <label class="custom-file-label" for="image-input">Chọn nhiều ảnh...</label>
                                            </div>

                                            <!-- Hiển thị ảnh cũ -->
                                            <div style="display: flex">
                                                <div class="row" id="image-preview-container" style="margin: 0px 15px">
                                                    @foreach ($product->images as $image)
                                                        <div class="image-preview" data-image="{{ asset($image) }}">
                                                            <img src="{{ asset($image->image) }}" alt="Image">
                                                            <button type="button" class="remove-btn" onclick="removeOldImage(this, '{{ $image->id }}')">X</button>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <!-- Hiển thị ảnh mới được chọn -->
                                                <div class="row" id="new-image-preview-container">
                                                    <!-- Preview ảnh mới sẽ hiển thị tại đây -->
                                                </div>
                                            </div>

                                            <!-- Input ẩn để lưu trữ danh sách ảnh cũ bị xóa -->
                                            <input type="hidden" name="removed_images" id="removed-images" value="[]">
                                        </div>
                                    </div>





                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Đặc điểm nổi bật:</label><br>
                                            <textarea required name="description_short" class="form-control"
                                                id="content" rows="10"
                                                cols="80"> {{ $product->content }}</textarea><br><br>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Mô tả chi tiết :</label><br>
                                            <textarea required name="description" class="form-control" id="description"
                                                rows="10" cols="80">{{ $product->description }}</textarea><br><br>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Tiêu đề SEO :</label><br>
                                            <input type="text" class="form-control" id="title_seo" name="title_seo" value="{{ $product->title_seo }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Từ khóa SEO :</label><br>
                                            <input type="text" class="form-control" id="keyword_seo" name="keyword_seo" value="{{ $product->keyword_seo }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Nội dung SEO :</label><br>
                                            <textarea required name="description_seo" class="form-control" id="description_seo" rows="10"
                                                cols="80">{{ $product->keyword_seo }}"></textarea><br><br>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button  class="btn btn-primary">Lưu</button>
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
<script src="{{asset("script_images_edit.js") }}"></script>

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

CKEDITOR.replace('description_seo', {
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
<script>
    $(document).ready(function() {
       $("#saveproduct").submit(function(event) {
           event.preventDefault();

           var nameproduct = $('#nameproduct').val();
            var category1 = $("#category1").val();
            var price_old = $('#price_old').val();
            var price_new = $("#price_new").val();
            var quantity = $("#quantity").val();
            var logo = $('#image-input')[0].files;
            var valid = true;

            if (!nameproduct) {
                $("#error_nameproduct").html("Nhập tên sản phẩm");
                $("#nameproduct").focus();
                valid = false;
            } else if (!category1) {
                $("#category1").focus();
                $("#error_category1").html("Chon loại danh mục");
                valid = false;

            }else if (!price_old) {
                $("#price_old").focus();
                $("#error_price_old").html("Nhập giá nhập");
                valid = false;

            }else if (!price_new) {
                $("#price_new").focus();
                $("#error_price_new").html("Nhập giá bán");
                valid = false;
            }else if (!quantity) {
                    $("#error_quantity").html("Nhập số lượng sản phẩm");
                    $("#quantity").focus();
                    valid = false;

            }

            if (nameproduct) {
                $("#error_nameproduct").empty();
            }

            if (category1) {
                $("#error_category1").empty();
            }

            if (price_old) {
                $("#error_price_old").empty();
            }

            if (price_new) {
                $("#error_dprice_new").empty();
            }

            if (quantity) {
                $("#error_quantity").empty();
            }



            if (valid) {
                $(this).unbind('submit').submit();

            }

       });


   })
</script>


@endsection
