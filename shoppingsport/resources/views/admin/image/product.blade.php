@extends('admin.layout.index')

@section('content')
<style>
    .sorting {
        font-size: 10px !important;
    }

    .ds td {
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

                        <a class="btn btn-primary btn-round ms-auto" href="{{ route('admin.product.add') }}">
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
                                            <select id="entries-per-page" style="margin: 0px 10px" name="add-row_length"
                                                aria-controls="add-row" class="form-control form-control-sm">
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
                                                    aria-label="ID: activate to sort column descending"
                                                    style="width: 60px;">ID</th>

                                                <th class="sorting" data-sort="name" tabindex="0"
                                                    aria-controls="add-row" rowspan="1" colspan="1"
                                                    aria-label="Tên: activate to sort column ascending"
                                                    style="width: 140px;">Tên</th>

                                                <th tabindex="0" aria-controls="add-row" rowspan="1"
                                                    colspan="1" aria-label="Hình ảnh: activate to sort column ascending"
                                                    style="width: 250px;">Hình ảnh</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Tên</th>
                                                <th rowspan="1" colspan="1">Hình ảnh</th>
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
        var baseUrl = "{{ url('/') }}";
        function fetchProducts(page = 1, search = '', per_page = perPage) {
            $.ajax({
                url: '{{ route("admin.images.fetch") }}',
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
                        let imagesHtml = '';

                        // Kiểm tra nếu `product.images` là một mảng
                        if (Array.isArray(product.images)) {
                            $.each(product.images, function (i, image) {
                                imagesHtml += `<img src="${baseUrl}/${image.image}" alt="Product Image" style="width: 50px; height: 50px; margin-right: 10px;" />`;
                            });
                        } else {
                            // Nếu không phải mảng, hiển thị một ảnh đơn
                            imagesHtml = `<img src="${baseUrl}/${product.images}" alt="Product Image" style="width: 100px; height: 100px;" />`;
                        }

                        $('#product-list').append(`
                            <tr class='ds'>
                                <td>${product.id}</td>
                                <td>${product.name}</td>
                                <td>${imagesHtml}</td>
                            </tr>
                        `);
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
