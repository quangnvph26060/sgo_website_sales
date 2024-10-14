@extends('admin.layout.index')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <a href="#">Đối tác</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Danh sách dối tác</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" style="text-align: center; color: black">Danh sách đối tác</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="dataTables_length" id="basic-datatables_length">
                                        <a class="btn btn-primary" href="{{ route('admin.partner.add') }}">Thêm
                                            mới</a>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12" id="product-table">
                                    <table id="basic-datatables"
                                        class="display table table-striped table-hover dataTable" role="grid"
                                        aria-describedby="basic-datatables_info">
                                        <thead>
                                            <tr role="row">
                                                <th  data-sort="id" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="id: activate to sort column descending"
                                                    style="width: 100.016px;">Tên công ty</th>
                                                <th  data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 250.484px;">Địa chỉ</th>
                                                <th data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 100.484px;">Số điện thoại</th>
                                                <th data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 100.484px;">Email</th>
                                                <th style="width: 120.688px;" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Tên công ty</th>
                                                <th rowspan="1" colspan="1">Địa chỉ</th>
                                                <th rowspan="1" colspan="1">Số điện thoại</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @forelse ( $partners as $key => $item )
                                            <tr>

                                                <td>{{ $item->name }}</td>
                                                <td>{{$item->address }} </td>
                                                <td>{{ $item->email}} </td>
                                                <td>{{ $item->phone}} </td>

                                                <td >
                                                    <a class="btn btn-warning btn-sm edit"
                                                        href="{{ route('admin.partner.edit', ['id' => $item->id]) }}"><i
                                                            class="fas fa-edit"></i> Sửa</a>
                                                    <button class="btn btn-danger btn-sm delete" data-id="{{ $item->id }}"
                                                        onclick="deleteConfirmation({{ $item->id }})"> <i class="fas fa-trash"></i> Xóa</button>

                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('admin.partner.delete', ['id' => $item->id]) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td  colspan="10">Chưa có đối tác</td>
                                            </tr>
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
    @endif

    <script type="text/javascript">
        function deleteConfirmation(id) {
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa?',
                text: "Bạn sẽ không thể khôi phục lại dữ liệu này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xóa!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            })
        }
    </script>

    @endsection
