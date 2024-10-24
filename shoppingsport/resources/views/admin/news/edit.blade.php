@extends('admin.layout.index')

@section('content')
    <style>
        .cke_notifications_area {
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
                    <a href="#">Tin tức</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#"> Sửa tin tức</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center" style="justify-content: center">

                            <h4 class="card-title">Sửa tin tức</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <form method="POST" action="{{ route('admin.new.update', ['id' => $new->id]) }}" id="savenews"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="logo" class="form-label">Hình ảnh bài viết</label>
                                                <div class="custom-file">
                                                    <input id="logo-input"
                                                        class="custom-file-input @error('logo') is-invalid @enderror"
                                                        type="file" name="logo" accept="image/*">
                                                    <label class="custom-file-label" for="logo">Chọn ảnh</label>
                                                </div>

                                                <div class="form-group">
                                                    <img id="profileImage" style="width: 150px; height: auto"
                                                        src="{{ showImageStorage($new->logo) }}"
                                                        alt="image profile" class="avatar">
                                                </div>
                                                <p id="error_logo1" class="error"></p>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="title">Tiêu đề bài báo:</label><br>
                                                <input type="text" class="form-control" id="title" name="title"
                                                     style="width:100%; padding: 10px;"
                                                    value="{{ $new->title }}">
                                                    <p id="error_title" class="error"></p>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="content">Nội dung bài báo:</label><br>
                                                <textarea name="content" class="form-control" id="content" rows="10"  cols="80">{{ $new->content }}</textarea>
                                                <p id="error_content" class="error"></p>
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
    <script>
        document.getElementById('logo').addEventListener('change', function(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('profileImage').src = e.target.result;
            };

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>

    <script>
        CKEDITOR.replace('content', {
            toolbar: [{
                    name: 'document',
                    items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
                },
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'editing',
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt']
                },
                {
                    name: 'forms',
                    items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button',
                        'ImageButton', 'HiddenField'
                    ]
                },
                '/',
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', '-', 'Subscript', 'Superscript', '-', 'Strike',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock',
                        '-', 'BidiLtr', 'BidiRtl', 'Language'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak',
                        'Iframe'
                    ]
                },
                '/',
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks', '-']
                },
                {
                    name: 'about',
                    items: ['About']
                }
            ],
            extraPlugins: 'font,colorbutton,justify',
            fontSize_sizes: '11px;12px;13px;14px;15px;16px;18px;20px;22px;24px;26px;28px;30px;32px;34px;36px',
        });
    </script>

<script>
    $(document).ready(function() {

        $("#savenews").submit(function(event) {
            event.preventDefault();

            var logo = $('#logo-input')[0].files;
            var title = $('#title').val();
            var content = $("#content").val();
            var valid = true;

            if (logo.length == 0) {
                $("#error_logo1").html("Vui lòng chọn logo");
                $("#logo-input").focus();
                valid = false;
            }else if (!logo[0].type.startsWith('image/')) {  // Kiểm tra định dạng file
                $("#error_logo1").html("Vui lòng chọn file hình ảnh hợp lệ");
                $("#logo-input").focus();
                valid = false;
            }else if (!title) {
                $("#title").focus();
                $("#error_title").html("Nhập tiêu đề bài viết");
                valid = false;
            }else if (!content) {
                $("#content").focus();
                $("#error_content").html("Nhập nội dung bài viết");
                valid = false;

            }

            if (logo) {
                $("#error_logo1").empty();
            }

            if (title) {
                $("#error_title").empty();
            }

            if (content) {
                $("#error_content").empty();
            }


            if (valid) {
                $(this).unbind('submit').submit();

            }

        });


    })
</script>
@endsection
