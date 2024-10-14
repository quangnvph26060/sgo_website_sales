@extends('admin.layout.index')

@section('content')

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
                <a href="#">Đánh giá từ khách hàng</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Danh sách đánh giá</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="text-align: center; color:black">Danh sách đánh giá</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="dataTables_length" id="basic-datatables_length">
                                        <a class="btn btn-primary" href="{{ route('admin.reviews.add') }}">Thêm mới</a>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="add-row" class="display table table-striped table-hover dataTable"
                                        role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th  data-sort="id" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="id: activate to sort column descending"
                                                    style="width: 100.016px;">Tên khách</th>
                                                <th  data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 250.484px;">Nội dung</th>
                                                <th data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 100.484px;">Địa chỉ</th>
                                                <th style="width: 120.688px;" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Tên khách</th>
                                                <th rowspan="1" colspan="1">Nội dung</th>
                                                <th rowspan="1" colspan="1">Địa chỉ</th>
                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody id="product-list">
                                            @forelse ( $reviews as $key => $item )
                                            <tr>
                                                <td><a href="#" >{{ $item->name }}</a></td>
                                                <td>{{ $item->content }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td align="center">
                                                    <a class="btn btn-warning btn-sm edit" href="{{ route('admin.reviews.show', ['id' => $item->id]) }}"><i class="fas fa-edit"></i>Sửa</a>
                                                    <button class="btn btn-danger btn-sm delete" data-id="{{ $item->id }}"
                                                        onclick="deleteConfirmation({{ $item->id }})">
                                                        <i class="fas fa-trash"></i>Xóa</button>

                                                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.reviews.destroy', ['id' => $item->id]) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty

                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@if (session('success'))
<script>
    $(document).ready(function() {
            $.notify({
                icon: 'icon-bell',
                title: 'Đánh giá khách hàng',
                message: '{{ session('success') }}',
            }, {
                type: 'secondary',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        });
</script>

<script>
    function deleteConfirmation(id) {

    if (confirm('Bạn có chắc chắn muốn xóa mục này không?')) {
        // Nếu người dùng xác nhận, tìm form theo id và submit
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endif


@endsection
