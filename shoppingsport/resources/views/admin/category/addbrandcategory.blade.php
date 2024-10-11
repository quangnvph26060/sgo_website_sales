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
                        <h4 class="card-title">Thêm thương hiệu cho danh mục {{ $type == 'child' ? 'con' : 'chính' }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <form method="POST" action="{{ route('admin.category.store.brand') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category">Chọn danh mục cha :</label><br>
                                            <select class="form-control" id="category" {{ $type == 'parent' ? 'name="category_id"' : '' }}>
                                                <option value="">-- Chọn danh mục --</option>
                                                @forelse($categories as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @empty
                                                    <option value="">Không có danh mục nào</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    @if($type == 'child')
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="category_child">Chọn danh mục con :</label><br>
                                            <select class="form-control" id="category_child"  name="category_id">
                                                <option value="">-- Chọn danh mục con  --</option>
                                            </select>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" for="brand">Chọn danh thương hiệu :</label><br>
                                            <select class="form-control" id="brands" name="brand_id">
                                                <option value="">-- Chọn thương hiệu  --</option>
                                                @if($type == 'parent')
                                                    @forelse($brand as $key => $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @empty
                                                        <option value="">Không có thương hiệu nào</option>
                                                    @endforelse
                                                @endif
                                            </select>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var type = '{{ $type }}';
    if(type == 'child'){
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

                            $('#category_child').empty();
                            $('#category_child').append('<option value="">-- Chọn danh mục con --</option>');

                            // Thêm các thương hiệu vào select
                            $.each(response.categorychild, function(key, value) {
                                $('#category_child').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });

                            $('#brands').empty();
                            $('#brands').append('<option value="">-- Chọn thương hiệu  --</option>');

                            console.log(response.categorybrand);
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

@endsection
