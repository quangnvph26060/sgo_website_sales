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
                <a href="#"> Thêm thương hiệu cho danh mục</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center" style="justify-content: center">
                        <h4 class="card-title">Thêm thương hiệu cho danh mục {{ $type == 'child' ? 'con' : 'chính' }}
                        </h4>
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
                            <form method="POST" id="savecategorybrands"
                                action="{{ route('admin.category.store.brand') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category">Chọn danh mục cha :</label><br>
                                            <select class="form-control" id="category1" {{ $type=='parent'
                                                ? 'name=category_id' : '' }}>
                                                <option value="">-- Chọn danh mục --</option>
                                                @forelse($categories as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @empty
                                                <option value="">Không có danh mục nào</option>
                                                @endforelse
                                            </select>
                                            <p id="error_category" class="error"></p>
                                        </div>
                                    </div>

                                    @if($type == 'child')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category_child">Chọn danh mục con
                                                :</label><br>
                                            <select class="form-control" id="category_child" name="category_id">
                                                <option value="">-- Chọn danh mục con --</option>
                                            </select>
                                            <p id="error_category_child" class="error"></p>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="brand">Chọn danh thương hiệu :</label><br>
                                            <select class="form-control" id="brands" name="brand_id">
                                                <option value="">-- Chọn thương hiệu --</option>
                                                @if($type == 'parent')
                                                @forelse($brand as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @empty
                                                <option value="">Không có thương hiệu nào</option>
                                                @endforelse
                                                @endif
                                            </select>
                                            <p id="error_brands" class="error"></p>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var type = '{{ $type }}';
    if(type == 'child'){
        $(document).ready(function() {
            $(document).on('change', '#category1', function() {

                var categoryId = $(this).val();

                if (categoryId ) {
                    var baseUrl = "{{ route('admin.category.brand.category.child', ['categoryId' => ':categoryId']) }}";
                    var url = baseUrl.replace(':categoryId', categoryId);

                    $.ajax({
                        url: url, // Đường dẫn đến route của bạn
                        type: 'GET',
                        success: function(response) {

                            $('#category_child').empty();
                            $('#category_child').append('<option value="">-- Chọn danh mục con --</option>');

                            // Thêm các thương hiệu vào select
                            $.each(response.categorychild, function(key, value) {
                                $('#category_child').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });

                            $('#brands').empty();
                            $('#brands').append('<option value="">-- Chọn thương hiệu  --</option>');

                            // Thêm các thương hiệu vào select
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

    }
</script>

<script>
    $(document).ready(function() {
        let type = '{{ $type }}';
        $("#savecategorybrands").submit(function(event) {

            if(type == 'child'){
                event.preventDefault();
                var category = $('#category1').val();
                var category_child = $('#category_child').val();
                var brands = $("#brands").val();
                // alert(descriptioncategory)

                var valid = true;

                if (!category || category == null ) {
                    $("#error_category").html("Chọn danh mục cha");
                    $("#category1").focus();
                    valid = false;
                } else if (!category_child || category_child == null) {
                    $("#category_child").focus();
                    $("#error_category_child").html("Chọn danh mục con");
                    valid = false;

                }else if (!brands || brands == null) {

                    $("#brands").focus();
                    $("#error_brands").html("Chọn thương hiệu");
                    valid = false;

                }

                if (category) {
                    $("#error_category").empty();
                }

                if (category_child) {
                    $("#error_category_child").empty();
                }

                if (brands) {
                    $("#error_brands").empty();
                }

                if (valid) {
                    $(this).unbind('submit').submit();

                }
            }else{
                event.preventDefault();
                var category = $('#category1').val();
                var brands = $("#brands").val();
                var valid = true;

                if (!category || category == null ) {
                    $("#error_category").html("Chọn danh mục cha");
                    $("#category1").focus();
                    valid = false;
                } else if (!brands || brands == null) {
                    $("#brands").focus();
                    $("#error_brands").html("Chọn thương hiệu");
                    valid = false;
                }

                if (category) {
                    $("#error_category").empty();
                }

                if (brands) {
                    $("#error_brands").empty();
                }

                if (valid) {
                     $(this).unbind('submit').submit();

                }
            }

        })
    });
</script>

@endsection
