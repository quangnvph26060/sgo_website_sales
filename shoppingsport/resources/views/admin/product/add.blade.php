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

    .error {
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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                        @endif
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <form method="POST" id="saveproduct" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Tên sản phẩm:</label><br>
                                            <input type="text" class="form-control" id="nameproduct" name="name">
                                            <p id="error_nameproduct" class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category">Danh mục :</label><br>
                                            <select class="form-control" id="category1" name="category">
                                                <option value="">-- Chọn danh mục --</option>
                                                @forelse($categories as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name }}</option>
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
                                            <select class="form-control" id="brands" name="brand_id">
                                                <option value="">-- Chọn thương hiệu --</option>
                                                {{-- @forelse($brands as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse --}}
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
                                            <p id="error_price_old" class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Giá bán :</label><br>
                                            <input type="number" class="form-control" id="price_new" name="price_new">
                                            <p id="error_price_new" class="error"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Số lượng:</label><br>
                                            <input type="number" class="form-control" id="quantity" name="quantity">
                                            <p id="error_quantity" class="error"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="discount_id">Khuyến mãi :</label><br>
                                            <select class="form-control" id="discount_id" name="discount_id">
                                                <option value="">-- Chọn khuyễn mãi --</option>
                                                @forelse($discounts as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name . " - ".
                                                    number_format($value->value) }}%</option>
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
                                                <input type="file" class="custom-file-input" id="image-input"
                                                    name="image[]" multiple accept="image/*">
                                                <label class="custom-file-label" for="image-input">Chọn nhiều
                                                    ảnh...</label>
                                            </div>
                                            <div class="row" id="image-preview-container"></div>
                                            <!-- Thêm row để căn ảnh -->
                                        </div>
                                        <p id="error_logo" class="error"></p>
                                    </div>


                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Đặc điểm nổi bật:</label><br>
                                            <textarea required name="description_short" class="form-control"
                                                id="content" rows="10" cols="80"></textarea><br><br>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Mô tả chi tiết :</label><br>
                                            <textarea required name="description" class="form-control" id="description"
                                                rows="10" cols="80"></textarea><br><br>
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Tiêu đề SEO :</label><br>
                                            <input type="text" class="form-control" id="title_seo" name="title_seo">
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Từ khóa SEO :</label><br>
                                            <input type="text" class="form-control" id="keyword_seo" name="keyword_seo">
                                        </div>
                                    </div>

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Nội dung SEO :</label><br>
                                            <textarea required name="description_seo" class="form-control"
                                                id="description_seo" rows="10" cols="80"></textarea><br><br>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-primary">Lưu</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset(" script_img.js") }}"></script>
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
            $(document).on('change', '#category', function() {

                var categoryId = $(this).val();

                if (categoryId ) {
                    var baseUrl = "{{ route('admin.category.brand.category.child', ['categoryId' => ':categoryId']) }}";
                    var url = baseUrl.replace(':categoryId', categoryId);

                    $.ajax({
                        url: url, // Đường dẫn đến route của bạn
                        type: 'GET',
                        success: function(response) {

                            $('#brands').empty();
                            $('#brands').append('<option value="">-- Chọn thương hiệu  --</option>');


                            $.each(response.categorybrand, function(key, value) {
                                $('#brands').append('<option value="' + value.brand.id + '">' + value.brand.name + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Có lỗi xảy ra:', error);
                        }
                    });
                } else {

                    $('#category_child').empty();
                    $('#category_child').append('<option value="">-- Chọn danh mục con --</option>');
                    // Nếu không có danh mục nào được chọn, xóa các tùy chọn thương hiệu
                    $('#brands').empty();
                    $('#brands').append('<option value="">-- Chọn thương hiệu --</option>');
                }
            });
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

            } else if (logo.length == 0) {
                    $("#error_logo").html("Vui lòng chọn logo");
                    $("#image-input").focus();
                    valid = false;

            }else if (!logo[0].type.startsWith('image/')) {  // Kiểm tra định dạng file
                    $("#error_logo").html("Vui lòng chọn file hình ảnh hợp lệ");
                    $("#image-input").focus();
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

            if (logo.length !=0) {
                    $("#error_logo").empty();
            }

            if (valid) {
                $(this).unbind('submit').submit();

            }

        });


    })
</script>

@endsection
