let files = []; // Lưu tất cả các tệp đã chọn

document.getElementById('image-input').addEventListener('change', function (event) {
    const newFiles = Array.from(event.target.files); // Chuyển FileList thành một mảng mới
    files = files.concat(newFiles); // Hợp nhất các tệp cũ và mới

    const imagePreviewContainer = document.getElementById('image-preview-container');

    // Cập nhật label của input khi có file được chọn
    const inputLabel = document.querySelector('.custom-file-label');
    inputLabel.textContent = files.length > 0 ? `${files.length} ảnh đã được chọn` : 'Chọn nhiều ảnh...';

    // Hàm render lại ảnh sau khi chọn hoặc xóa
    function renderImages() {
        imagePreviewContainer.innerHTML = ''; // Xóa tất cả các ảnh trước đó

        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageUrl = e.target.result;
                const imageWrapper = document.createElement('div');
                imageWrapper.classList.add('image-preview', 'col-md-3'); // Bootstrap class for responsive grid

                // Tạo phần tử ảnh
                const imageElement = document.createElement('img');
                imageElement.src = imageUrl;

                // Tạo nút xóa
                const removeButton = document.createElement('button');
                removeButton.innerHTML = 'X';
                removeButton.classList.add('remove-btn');

                // Xử lý sự kiện khi nhấn nút xóa
                removeButton.addEventListener('click', function () {
                    // Xóa ảnh khỏi mảng files
                    files.splice(index, 1);
                    renderImages();  // Cập nhật lại danh sách hiển thị ảnh
                    updateFileInput(); // Cập nhật lại input
                });

                // Thêm ảnh và nút xóa vào thẻ div
                imageWrapper.appendChild(imageElement);
                imageWrapper.appendChild(removeButton);

                // Thêm vào container
                imagePreviewContainer.appendChild(imageWrapper);
            };
            reader.readAsDataURL(file);
        });
    }

    // Hàm cập nhật lại giá trị của input file
    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        document.getElementById('image-input').files = dataTransfer.files;
    }

    renderImages();
    updateFileInput(); // Cập nhật input file với danh sách mới
});
