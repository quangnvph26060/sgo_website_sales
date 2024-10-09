@extends('admin.layout.index')

@section('content')
<style>
    .sorting{
        font-size: 10px !important;
    }
    .ds td{
        font-size: 12px !important;
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
                <a href="#"> Danh sách sản phẩm</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">

                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('admin.product.add') }}"  >
                            <i class="fa fa-plus"></i>
                            Thêm mới
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->


                    <div class="table-responsive">
                        <div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="add-row_length">
                                        <label>Hiện
                                            <select id="entries-per-page" style="margin: 0px 10px" name="add-row_length" aria-controls="add-row"
                                                class="form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> danh mục
                                        </label>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div id="add-row_filter" class="dataTables_filter"><label>Search:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="add-row" id="search"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="add-row" class="display table table-striped table-hover dataTable"
                                        role="grid" aria-describedby="add-row_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" data-sort="id" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-sort="ascending" aria-label="ID: activate to sort column descending" style="width: 60px;">ID</th>
                                                <th class="sorting" data-sort="name" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Tên: activate to sort column ascending" style="width: 150px;">Tên</th>

                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Hình ảnh: activate to sort column ascending" style="width: 150px;">Hình ảnh</th>
                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Giá gốc: activate to sort column ascending" style="width: 100px;">Giá gốc</th>

                                                <th class="sorting" data-sort="brand_id" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Thương hiệu: activate to sort column ascending" style="width: 100px;">Thương hiệu</th>
                                                <th class="sorting" data-sort="categori_id" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Danh mục: activate to sort column ascending" style="width: 150px;">Danh mục</th>

                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending" style="width: 260px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Tên</th>

                                                <th rowspan="1" colspan="1">Hình ảnh</th>
                                                <th rowspan="1" colspan="1">Giá gốc</th>
                                                <th rowspan="1" colspan="1">Thương hiệu</th>
                                                <th rowspan="1" colspan="1">Danh mục</th>
                                                <th rowspan="1" colspan="1">Action</th>
                                            </tr>
                                        </tfoot>

                                        <tbody id="product-list">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                        Showing 1 to 5 of 10 entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                        <ul class="pagination" id="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="add-row_previous">
                                                <a href="#" aria-controls="add-row" data-dt-idx="0" tabindex="0"
                                                    class="page-link">Previous</a>
                                            </li>
                                            <!-- Các nút phân trang sẽ được thêm vào đây -->
                                            <li class="paginate_button page-item next" id="add-row_next">
                                                <a href="#" aria-controls="add-row" data-dt-idx="3" tabindex="0"
                                                    class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        let sortBy = 'id';
        let sortOrder = 'asc';
        let perPage = 10; // Giá trị mặc định

        function fetchProducts(page = 1, search = '', per_page = perPage) {
            $.ajax({
                url: '{{ route("admin.product.fetch") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    page: page,
                    search: search,
                    sort_by: sortBy,
                    sort_order: sortOrder,
                    per_page: per_page // Sử dụng per_page từ tham số
                },
                success: function (data) {
                    $('#product-list').empty();
                    console.log(data.data);
                    $.each(data.data, function (index, product) {
                        $('#product-list').append(`
                        <tr class = 'ds'>
                            <td>${product.id}</td>
                            <td>${product.name}</td>

                            <td></td>
                            <td>${Number(product.price_old).toLocaleString('vi-VN')} đ</td>
                            <td>${product.brand.name}</td>
                            <td>${product.category.name}</td>

                            <td>
                                <button class="btn btn-warning btn-sm edit" data-id="${product.id}">
                                    <i class="fas fa-edit"></i> Sửa
                                </button>
                                <button class="btn btn-danger btn-sm delete" data-id="${product.id}">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </td>
                        </tr>
                        `);

                    });
                    bindDeleteEvent();

                    $('#product-list').on('click', '.edit', function() {
                        var productId = $(this).data('id');
                        var editRoute = "{{ route('admin.product.edit', ':id') }}"; // Route Blade có tham số id
                        var finalRoute = editRoute.replace(':id', productId); // Thêm type vào query string
                        window.location.href = finalRoute;
                    });

                    updateInfoAndPagination(data, page);
                },
                error: function (xhr) {
                    console.error(xhr);
                    alert('Có lỗi xảy ra khi tải dữ liệu.');
                }
            });
        }

        function updateInfoAndPagination(data, currentPage) {
            const start = (currentPage - 1) * perPage + 1;
            const end = Math.min(currentPage * perPage, data.total); // Đảm bảo không vượt quá tổng số bản ghi
            $('#add-row_info').text(`Showing ${start} to ${end} of ${data.total} entries`);

            // Cập nhật phân trang
            $('#pagination').empty();
            const totalPages = data.last_page;

            // Nút Previous
            $('#pagination').append(`
                <li class="paginate_button page-item ${currentPage === 1 ? 'disabled' : ''}" id="add-row_previous">
                    <a href="#" aria-controls="add-row" class="page-link" data-page="${currentPage - 1}">Previous</a>
                </li>
            `);

            // Các nút phân trang
            for (let i = 1; i <= totalPages; i++) {
                $('#pagination').append(`
                    <li class="paginate_button page-item ${currentPage === i ? 'active' : ''}">
                        <a href="#" aria-controls="add-row" class="page-link" data-page="${i}">${i}</a>
                    </li>
                `);
            }

            // Nút Next
            $('#pagination').append(`
                <li class="paginate_button page-item ${currentPage === totalPages ? 'disabled' : ''}" id="add-row_next">
                    <a href="#" aria-controls="add-row" class="page-link" data-page="${currentPage + 1}">Next</a>
                </li>
            `);

            // Bắt sự kiện cho các nút phân trang mới được tạo
            $('#pagination .page-link').on('click', function (e) {
                e.preventDefault(); // Ngăn chặn hành vi mặc định
                let page = $(this).data('page');
                if (page) {
                    fetchProducts(page, $('#search').val(), perPage); // Gọi hàm với số lượng mục hiển thị
                }
            });
        }

        /// delete

        function bindDeleteEvent() {
            $('.delete').on('click', function () {
                let brandId = $(this).data('id');

                // Sử dụng SweetAlert2 để hiển thị thông báo xác nhận
                Swal.fire({
                    title: 'Bạn có chắc chắn muốn xóa?',
                    text: "Hành động này không thể hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xóa',
                    cancelButtonText: 'Hủy'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/admin/brand/delete/${brandId}`,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function (response) {
                                if (response.success) {
                                    $(`tr[data-id="${brandId}"]`).remove(); // Xóa dòng từ bảng
                                    fetchProducts();
                                    Swal.fire(
                                        'Đã xóa!',
                                        'Thương hiệu đã được xóa thành công.',
                                        'success'
                                    );
                                } else {
                                    Swal.fire(
                                        'Lỗi!',
                                        'Không thể xóa thương hiệu này.',
                                        'error'
                                    );
                                }
                            },
                            error: function (xhr) {
                                console.error(xhr);
                                Swal.fire(
                                    'Lỗi!',
                                    'Có lỗi xảy ra khi xóa.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        }


        fetchProducts();

        $('#search').on('keyup', function () {
            fetchProducts(1, $(this).val(), perPage); // Gọi hàm với số lượng mục hiển thị
        });

        // Lắng nghe sự kiện thay đổi cho dropdown
        $('#entries-per-page').on('change', function () {
            perPage = $(this).val(); // Cập nhật số lượng mục hiển thị
            fetchProducts(1, $('#search').val(), perPage); // Gọi hàm với số lượng mục hiển thị
        });

        $('.sorting').on('click', function () {
            let sortColumn = $(this).data('sort');
            sortOrder = (sortColumn === sortBy && sortOrder === 'asc') ? 'desc' : 'asc';
            sortBy = sortColumn;

            $('.sorting').removeClass('asc desc'); // Xóa class cũ
            $(this).addClass(sortOrder); // Thêm class mới cho cột đang sắp xếp

            fetchProducts(1, $('#search').val(), perPage); // Gọi hàm với số lượng mục hiển thị
        });
    });

</script>



@endsection