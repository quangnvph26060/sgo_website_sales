@extends('admin.layout.index')

@section('content')
<style>
    .cke_notifications_area {
        display: none;
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
                <a href="#">Danh mục</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Thêm danh mục</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" style="justify-content: center">

                        <h4 class="card-title">{{ $type == 'parent' ? 'Thêm danh mục cha' : 'Thêm danh mục con' }}</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                        @endif
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <form method="POST" id="savecategory" action="{{ route('admin.category.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    @if($type != 'parent')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category">Chọn danh mục cha :</label><br>
                                            <select class="form-control" id="parent_id" name="parent_id">
                                                <option value="">-- Chọn danh mục --</option>
                                                @forelse($categories as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                            <p id="error_parent_id" class="error"></p>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Tên danh mục :</label><br>
                                            <input type="text" class="form-control" id="namecategory" name="name">
                                            <p id="error_namecategory" class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Nội dung :</label><br>

                                            <textarea name="description" class="form-control" id="descriptioncategory"
                                                rows="10" cols="80"></textarea>
                                            <p id="error_description" class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="logo" class="form-label">Logo</label>
                                            <div class="custom-file">
                                                <input id="logo"
                                                    class="custom-file-input @error('logo') is-invalid @enderror"
                                                    type="file" name="logo" accept="image/*">
                                                <label class="custom-file-label" for="logo">Chọn logo</label>
                                            </div>
                                            <p id="error_logo" class="error"></p>
                                        </div>

                                        <div class="form-group" style="text-align: center">
                                            <img id="profileImagelogo" style="width:150px; height:auto"
                                                src=" {{ asset('images/avatar2.jpg') }}" alt="image logo" class="logo">
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
                                            <textarea name="description_seo" class="form-control" id="description_seo"
                                                rows="10" cols="80"></textarea><br><br>
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

<script>
    CKEDITOR.replace('descriptioncategory', {
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
        $('#logo').on('change', function(event) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#profileImagelogo').attr('src', e.target.result);
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        let type = '{{ $type }}';
        $("#savecategory").submit(function(event) {

            if(type == 'child'){
                event.preventDefault();
                var parent_id = $('#parent_id').val();
                var namecategory = $('#namecategory').val();
                var descriptioncategory = $("#descriptioncategory").val();
                // alert(descriptioncategory)
                var logo = $('#logo')[0].files;
                var valid = true;

                if (!parent_id || parent_id == null ) {
                    $("#error_parent_id").html("Chọn danh mục cha");
                    $("#parent_id").focus();
                    valid = false;
                } else if (!namecategory) {
                    $("#namecategory").focus();
                    $("#error_namecategory").html("Nhập tiêu dề danh mục");
                    valid = false;

                }else if (logo.length == 0) {
                    $("#error_logo").html("Vui lòng chọn logo");
                    $("#logo").focus();
                    valid = false;

                }else if (!logo[0].type.startsWith('image/')) {  // Kiểm tra định dạng file
                    $("#error_logo").html("Vui lòng chọn file hình ảnh hợp lệ");
                    $("#logo").focus();
                    valid = false;
                }

                if (parent_id) {
                    $("#error_parent_id").empty();
                }

                if (namecategory) {
                    $("#error_namecategory").empty();
                }

               
                if (logo.length !=0) {
                    $("#error_logo").empty();
                }

                if (valid) {
                     $(this).unbind('submit').submit();

                }
            }else{
                event.preventDefault();

                var namecategory = $('#namecategory').val();
                var descriptioncategory = $("#descriptioncategory").val();
                // alert(descriptioncategory)
                var logo = $('#logo')[0].files;
                var valid = true;

                if (!namecategory) {
                    $("#namecategory").focus();
                    $("#error_namecategory").html("Nhập tiêu dề danh mục");
                    valid = false;

                }else if (!descriptioncategory.trim()) {

                    scrollToElement("#error_description");
                    $("#error_description").html("Nhập nội dung danh mục");
                    valid = false;

                }else if (logo.length == 0) {
                    $("#error_logo").html("Vui lòng chọn logo");
                    $("#logo").focus();
                    valid = false;

                }else if (!logo[0].type.startsWith('image/')) {  // Kiểm tra định dạng file
                    $("#error_logo").html("Vui lòng chọn file hình ảnh hợp lệ");
                    $("#logo").focus();
                    valid = false;
                }


                if (namecategory) {
                    $("#error_namecategory").empty();
                }

                if (descriptioncategory) {
                    $("#error_description").empty();
                }
                if (logo.length !=0) {
                    $("#error_logo").empty();
                }

                if (valid) {
                     $(this).unbind('submit').submit();

                }
            }


        });

        function scrollToElement(element) {
        var position = $(element).offset().top; // Lấy vị trí phần tử
        var offset = $(window).height() / 2 - $(element).outerHeight() / 2; // Tính toán offset
        $('html, body').animate({
            scrollTop: position - offset -240 // Cuộn đến vị trí
        }, 100); // Thời gian cuộn
    }
    })
</script>

@endsection
