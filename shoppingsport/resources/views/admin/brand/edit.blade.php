@extends('admin.layout.index')

@section('content')
<style>
    .cke_notifications_area {
        display: none;
    }

    .error {
        color: red
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
                <a href="#">Thương hiệu</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Sửa thương hiệu</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" style="justify-content: center">

                        <h4 class="card-title">Sửa thương hiệu</h4>

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
                            <form method="POST" id="save_brand"
                                action="{{ route('admin.brand.update', ['id' => $brand->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="content">Tên thương hiệu :</label><br>
                                            <input type="text" class="form-control" id="namebrand" name="name"
                                                value="{{ $brand->name }}">
                                            <p id="error_namebrand" class="error"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Nội dung :</label><br>
                                            <textarea name="description" class="form-control" id="description" rows="10"
                                                cols="80">{{ $brand->description }}</textarea><br><br>
                                            <p id="error_description" class="error"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="display: none">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Tiêu đề SEO :</label><br>
                                            <input type="text" class="form-control" id="title_seo" name="title_seo"
                                                value="{{ $brand->title_seo  }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="display: none">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Từ khóa SEO :</label><br>
                                            <input type="text" class="form-control" id="keyword_seo" name="keyword_seo"
                                                value="{{ $brand->keyword_seo  }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="display: none">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Nội dung SEO :</label><br>
                                            <textarea required name="description_seo" class="form-control"
                                                id="description_seo" rows="10"
                                                cols="80"> {{ $brand->description_seo  }}</textarea><br><br>
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
        $("#save_brand").submit(function(event) {
            event.preventDefault();

            var namebrand = $('#namebrand').val();
            var description = $("#description").val();

            var valid = true;

            if (!namebrand) {
                $("#error_namebrand").html("Nhập thông tin tiêu đề bài viết");
                $("#namebrand").focus();
                valid = false;
            } else if (!description) {
                $("#description").focus();
                $("#error_description").html("Nhập thông tin nội dung bài viết");
                valid = false;

            }

            if (namebrand) {
                $("#error_namebrand").empty();
            }

            if (description) {
                $("#error_description").empty();
            }

            if (valid) {
                $(this).unbind('submit').submit();

            }

        });
    })
</script>


@endsection
