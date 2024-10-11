@extends('admin.layout.index')

@section('content')
<style>
     .cke_notifications_area{
        display: none;
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
                    <div class="d-flex align-items-center" style="justify-content: center" >

                        <h4 class="card-title">{{ $type == 'parent' ? 'Thêm danh mục cha' : 'Thêm danh mục con' }}</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <form method="POST" action="{{ route('admin.category.store') }}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    @if($type != 'parent')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category">Chọn danh mục cha :</label><br>
                                            <select class="form-control" id="category" name="parent_id">
                                                <option value="">-- Chọn danh mục --</option>
                                                @forelse($categories as $key => $value)
                                                <option value="{{ $value->id }}"> {{ $value->name }}</option>
                                                @empty

                                                @endforelse
                                                <!-- Thêm các danh mục khác ở đây -->
                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Tên danh mục :</label><br>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label class="form-label" for="content">Nội dung :</label><br>
                                            <textarea required name="description" class="form-control" id="content" rows="10"
                                                cols="80"></textarea><br><br>
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
                                            <textarea required name="description_seo" class="form-control" id="description_seo" rows="10"
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



@endsection
