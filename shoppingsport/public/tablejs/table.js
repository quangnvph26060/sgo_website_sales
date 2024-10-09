$(document).ready(function () {
    let sortBy = 'id';
    let sortOrder = 'asc';
    let perPage = 10; // Giá trị mặc định


    // Hàm để gọi dữ liệu sản phẩm
    function fetchProducts(page = 1, search = '', per_page = perPage) {
        $.ajax({
            url: currentUrl, // Sử dụng URL được khởi tạo ở ngoài
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
                updateInfoAndPagination(data, page);
                // Gọi hàm để cập nhật danh sách sản phẩm ở đây
                updateProductList(data);
            },
            error: function (xhr) {
                console.error(xhr);
                alert('Có lỗi xảy ra khi tải dữ liệu.');
            }
        });
    }

    // Hàm cập nhật thông tin và phân trang
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

    // Khởi đầu gọi sản phẩm
    fetchProducts();

    // Lắng nghe sự kiện tìm kiếm
    $('#search').on('keyup', function () {
        fetchProducts(1, $(this).val(), perPage); // Gọi hàm với số lượng mục hiển thị
    });

    // Lắng nghe sự kiện thay đổi cho dropdown
    $('#entries-per-page').on('change', function () {
        perPage = $(this).val(); // Cập nhật số lượng mục hiển thị
        fetchProducts(1, $('#search').val(), perPage); // Gọi hàm với số lượng mục hiển thị
    });

    // Lắng nghe sự kiện sắp xếp
    $('.sorting').on('click', function () {
        let sortColumn = $(this).data('sort');
        sortOrder = (sortColumn === sortBy && sortOrder === 'asc') ? 'desc' : 'asc';
        sortBy = sortColumn;

        $('.sorting').removeClass('asc desc'); // Xóa class cũ
        $(this).addClass(sortOrder); // Thêm class mới cho cột đang sắp xếp

        fetchProducts(1, $('#search').val(), perPage); // Gọi hàm với số lượng mục hiển thị
    });
});
