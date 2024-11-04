@extends('client.layouts.master')

@section('content')
    <div class="warranty-table-container">
        <div class="warranty-table-header">
            <div class="actions">
                <button class="create-btn btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Kích hoạt bảo hành</button>
            </div>
            <h1 class="fw-bold">KÍCH HOẠT BẢO HÀNH</h1>
            <div class="search-bar">
                <input type="text" placeholder="Tra cứu bảo hành" id="search" />
                <button type="button" class="search-btn"><i class="fa fa-search"></i></button>
            </div>

        </div>

        <table class="warranty-table">
            <thead>
                <tr>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Thời gian bảo hành</th>
                </tr>
            </thead>
            <tbody id="warranty-table-body">

            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng ký bảo hành</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="create-warranty">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <label for="recipient-name" class="form-label">Tên khách hàng</label>
                                <input type="text" class="form-control" id="recipient-name" placeholder="Nhập tên">
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <label for="phone_number" class="form-label">Số điện thoại <strong
                                        class="text-danger">*</strong></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="phone_number"
                                        placeholder="Vui lòng nhập số điện thoại" name="phone_number">
                                </div>
                            </div>
                            <div class="form-group mb-3 col-md-12">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ">
                            </div>

                            <div class="form-group mb-3 col-md-12">
                                <label for="product" class="form-label">Sản phẩm</label>
                                <input type="text" class="form-control" id="product-search"
                                    placeholder="Tìm kiếm sản phẩm...">

                                <!-- Danh sách sản phẩm sẽ hiển thị khi nhấn vào ô tìm kiếm -->
                                <div id="product-list" class="product-list">
                                    @foreach ($products as $item)
                                        <div class="product-item" data-value="{{ $item->id }}"
                                            data-name="{{ $item->name }}"
                                            data-image="{{ showImageStorage($item->images->first()->image) }}">
                                            {{ $item->name }}
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                            <div class="product-display" style="display: none;">
                                <div class="form-group mb-3 col-md-12 d-flex align-items-center border p-2 rounded shadow">
                                    <div class="img-preview me-3">
                                        <img class="img-fluid" style="width: 50px;" id="preview-image"
                                            src="https://via.placeholder.com/40" alt="Preview Image">
                                    </div>
                                    <div class="product-name">
                                        <p id="product-name" class="mb-0">Sản phẩm 1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            const $productSearch = $('#product-search');
            const $productList = $('#product-list');
            const $productDisplay = $('.product-display');
            const $previewImage = $('#preview-image');
            const $productName = $('#product-name');
            const $createWarrantyForm = $('#create-warranty');
            let selectedProductId = null;
            let searchTimeout;

            // Hiển thị danh sách sản phẩm khi nhấn vào ô tìm kiếm
            $productSearch.on('focus', function() {
                searchProducts(''); // Gọi hàm tìm kiếm với giá trị rỗng để hiển thị tất cả sản phẩm
            });

            // Ẩn danh sách khi nhấp ra ngoài ô tìm kiếm và danh sách sản phẩm
            $(document).on('click', function(event) {
                if (!$(event.target).closest($productSearch).length && !$(event.target).closest(
                        $productList).length) {
                    $productList.hide();
                }
            });

            // Hàm debounce để giảm tần suất gọi API
            function debounce(func, delay) {
                return function(...args) {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => func.apply(this, args), delay);
                };
            }

            // Hàm tìm kiếm sản phẩm
            function searchProducts(query) {
                $.ajax({
                    url: '{{ route('user.warranty') }}' + '?name=' + query,
                    method: 'GET',
                    success: function(response) {
                        $productList.empty();

                        response.forEach(item => {
                            $productList.append(`
                        <div class="product-item" data-value="${item.id}" data-name="${item.name}" data-image="storage/${item.images[0]?.image || ''}">
                            ${item.name}
                        </div>
                    `);
                        });
                        $productList.show();
                    },
                    error: function() {
                        console.error('Error fetching products');
                    }
                });
            }

            // Áp dụng debounce cho tìm kiếm sản phẩm
            $productSearch.on('input', debounce(function() {
                const query = $(this).val();
                searchProducts(query);
            }, 500)); // Delay 0.5s

            // Xử lý khi chọn sản phẩm từ danh sách
            $productList.on('click', '.product-item', function() {
                const productName = $(this).data('name');
                const productImage = $(this).data('image');
                selectedProductId = $(this).data('value');

                $productName.text(productName);
                $previewImage.attr('src', productImage);
                $productDisplay.show();

                // Xóa giá trị của ô tìm kiếm
                $productSearch.val('');

                // Ẩn danh sách sản phẩm ngay sau khi chọn
                $productList.hide();
            });

            $createWarrantyForm.on('submit', function(event) {

                event.preventDefault(); // Ngăn không cho form tự động gửi đi

                // Lấy thông tin từ các trường trong form
                const customerName = $('#recipient-name').val();
                const phone_number = $('#phone_number').val();
                const address = $('#address').val();

                // Kiểm tra nếu đã chọn sản phẩm
                if (!selectedProductId) {
                    alert('Vui lòng chọn sản phẩm.');
                    return;
                }

                // Gửi dữ liệu lên server
                $.ajax({
                    url: '{{ route('user.warranty.store') }}', // Thay bằng route xử lý thêm bảo hành
                    method: 'POST',
                    data: {
                        customer_name: customerName,
                        phone_number: phone_number,
                        address: address,
                        product_id: selectedProductId, // Gửi product ID
                        _token: '{{ csrf_token() }}' // CSRF token
                    },
                    success: function(response) {
                        // Xử lý kết quả trả về từ server
                        if (response.status) {
                            showMessage('success', response.message);
                            // Đóng modal và làm mới bảng
                            $('#exampleModal').modal('hide');
                            // Có thể gọi lại hàm để làm mới danh sách bảo hành ở đây
                        } else {
                            showMessage('error', response.error || response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Có lỗi xảy ra, vui lòng thử lại sau.');
                    }
                });
            });



            $('.search-btn').on('click', function() {
                const query = $('#search').val();

                $.ajax({
                    url: '{{ route('user.warranty.look-up') }}' + '?phone_number=' + query,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);

                        if (response.status) {
                            $('#warranty-table-body').empty();
                            response.warranty.forEach(item => {
                                // Parse the registration date
                                const registrationDate = new Date(item
                                    .registration_date);

                                // Format registration date (DD/MM/YYYY)
                                const formattedRegistrationDate = registrationDate
                                    .toLocaleDateString('en-GB');

                                // Calculate expiration date (12 months later)
                                const expirationDate = new Date(registrationDate);
                                expirationDate.setMonth(expirationDate.getMonth() + 12);

                                // Format expiration date (DD/MM/YYYY)
                                const formattedExpirationDate = expirationDate
                                    .toLocaleDateString('en-GB');

                                // Append to the table
                                $('#warranty-table-body').append(`
                                    <tr>
                                        <td data-label="Tên">${item.customer_name}</td>
                                        <td data-label="Số điện thoại">${item.phone_number}</td>
                                        <td data-label="Địa chỉ">${item.address}</td>
                                        <td data-label="Sản phẩm">${item.product.name}</td>
                                        <td>${formattedRegistrationDate} - ${formattedExpirationDate}</td>
                                    </tr>
                                `);
                            });
                        } else {
                            showMessage('error', response.error);
                        }

                    },
                    error: function() {
                        console.error('Error fetching products');
                    }
                });

            });
        });
    </script>
@endpush

@push('style')
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <style>
        main {
            padding: 20px 100px !important;
        }

        @media (max-width: 768px) {
            .warranty-table-header h1 {
                font-size: 1.3rem !important;
                margin-bottom: 10px;
            }

            main {
                padding: 10px !important;
                margin-top: 110px;
            }

            .warranty-table-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .actions {
                width: 100%;
                margin-bottom: 10px;
            }

            .actions button {
                width: 100%;
                padding: 10px;
                text-align: center;
                margin: 0;
            }

            .search-bar {
                width: 100%;
                display: flex;
                margin-top: 10px;
            }

            .search-bar input {
                flex-grow: 1;
                border-radius: 5px 5px 0 0;
            }

            .search-bar button {
                width: 100%;
                border-radius: 0 0 5px 5px;
                margin-top: 5px;
            }


            table {
                display: block;
                width: 100%;
            }

            thead {
                display: none;
                /* Ẩn tiêu đề bảng */
            }

            tbody,
            tr {
                display: block;
                /* Chuyển sang dạng khối để dễ dàng hiển thị */
                width: 100%;
                margin-bottom: 1rem;
                /* Khoảng cách giữa các hàng */
            }

            td {
                font-size: 0.875rem !important;
                display: flex;
                width: 100%;
                justify-content: space-between;
                /* Căn chỉnh nội dung */
                padding: 0.5rem;
                border: 1px solid #dee2e6;
                /* Thêm viền */
            }

            td::before {
                content: attr(data-label);
                /* Hiển thị tên cột */
                font-weight: bold;
                margin-right: 1rem;
                /* Khoảng cách giữa tên cột và nội dung */
            }
        }



        .warranty-table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .warranty-table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .warranty-table-header h1 {
            font-size: 2rem;
            color: #333;
        }

        .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            outline: none;
        }


        .search-bar button {
            padding: 8px 12px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .search-bar button i {
            font-size: 1rem;
        }



        .actions button {
            padding: 10px 15px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .actions button:hover {
            background-color: #0056b3;
        }

        .actions .download-btn,
        .actions .refresh-btn {
            background-color: #6c757d;
        }

        .actions .download-btn:hover,
        .actions .refresh-btn:hover {
            background-color: #495057;
        }

        .warranty-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .warranty-table thead th {
            background-color: #f0f0f0;
            padding: 12px 8px;
            text-align: left;
            border-bottom: 2px solid #dddddd;
            font-size: 0.9rem;
        }

        .warranty-table tbody tr {
            border-bottom: 1px solid #e0e0e0;
            transition: background-color 0.2s ease;
        }

        .warranty-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        .warranty-table td {
            padding: 12px 8px;
            font-size: 0.9rem;
            color: #333;
        }

        .warranty-table th,
        .warranty-table td {
            text-align: left;
        }

        .warranty-table input[type="checkbox"] {
            margin: 0;
            cursor: pointer;
        }

        .warranty-table i {
            cursor: pointer;
            color: #6c757d;
        }

        .warranty-table i:hover {
            color: #333;
        }

        /* CSS để ẩn danh sách sản phẩm ban đầu */
        .product-list {
            display: none;
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            position: absolute;
            width: 97.5%;
            background-color: #fff;
            z-index: 1000;
        }

        .product-item {
            margin-bottom: 0;
            padding: 8px 12px;
            cursor: pointer;
            border-bottom: 1px solid #dbdbdb;
        }

        .product-item:hover {
            background-color: #f0f0f0;
        }
    </style>
@endpush
