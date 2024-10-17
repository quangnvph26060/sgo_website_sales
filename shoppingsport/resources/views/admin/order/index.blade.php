@extends('admin.layout.index')

@section('content')
<style>
    .status-active {
        color: green; /* Màu xanh cho 'Đã Active' */
        font-weight: bold; /* Chữ đậm */
    }
    .status-inactive {
        color: red; /* Màu đỏ cho 'Chưa Active' */
        font-weight: bold;
    }
    .status-pending {
        color: black; /* Màu đen cho 'Chờ xử lý' */
        font-weight: bold;
    }
    .status-unknown {
        color: gray; /* Màu xám cho 'Không xác định' */
        font-weight: bold;
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
                <a href="#">Đơn hàng</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#"> Danh sách đơn hàng</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

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
                                                <th class="sorting" data-sort="id" tabindex="0" aria-controls="add-row"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="id: activate to sort column descending"
                                                    style="width: 60.016px;">ID</th>
                                                <th class="sorting" data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 150.484px;">Họ tên </th>
                                                <th class="sorting" data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 100.484px;">Điện thoại </th>

                                                <th class="sorting" data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 100.484px;">Tổng tiền </th>
                                                    <th class="sorting" data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 150.484px;">Trạng thái </th>
                                                <th class="sorting" style="width: 250.688px;" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Họ tên</th>
                                                <th rowspan="1" colspan="1">Điện thoại</th>
                                                <th rowspan="1" colspan="1">Tổng tiền</th>
                                                <th rowspan="1" colspan="1">Trạng thái</th>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@if (session('success'))
<script>
    $(document).ready(function() {
            $.notify({
                icon: 'icon-bell',
                title: 'Đơn hàng',
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
<script>
    $(document).ready(function () {

        let sortBy = 'id';
        let sortOrder = 'asc';
        let perPage = 10; // Giá trị mặc định

        function fetchProducts(page = 1, search = '', per_page = perPage) {
            $.ajax({
                url: '{{ route("admin.order.fetch") }}',
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
                    $.each(data.data, function (index, order) {
                        $('#product-list').append(`
                        <tr>
                            <td>${order.code}</td>
                            <td>${order.name}</td>
                            <td>${order.phone}</td>
                            <td>${formatPrice(order.amount)}</td>
                            <td>
                                ${order.is_active === 1 ? '<span class="status-active">Đã Active</span>' :
                                (order.is_active === 2 ? '<span class="status-inactive">Không Active</span>' :
                                (order.is_active === 3 ? '<span class="status-pending">Chờ xử lý</span>' : '<span class="status-unknown">Không xác định</span>'))}
                            </td>


                            <td>
                                <button class="btn btn-warning btn-sm edit" data-id="${order.id}">
                                    <i class="fas fa-edit"></i> Sửa
                                </button>
                                <button class="btn btn-danger btn-sm delete" data-id="${order.id}">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                                <button class="btn btn-primary btn-sm view" data-id="${order.id}">
                                    <i class="fas fa-eye"></i> Xem
                                </button>
                            </td>
                        </tr>
                        `);

                    });
                    bindDeleteEvent();

                    $('#product-list').on('click', '.edit', function() {
                        var productId = $(this).data('id');
                        var editRoute = "{{ route('admin.order.edit', ':id') }}";
                        var finalRoute = editRoute.replace(':id', productId);
                        window.location.href = finalRoute;
                    });

                    $('#product-list').on('click', '.view', function() {
                        var productId = $(this).data('id');
                        var editRoute = "{{ route('admin.order.view', ':id') }}";
                        var finalRoute = editRoute.replace(':id', productId);
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

        function formatPrice(price) {
    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " VND";
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
                            url: `/admin/order/delete/${brandId}`,
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
