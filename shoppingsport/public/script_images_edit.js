let oldFiles = []; // Lưu các tệp cũ (đã có trước đó)
let newFiles = []; // Lưu tất cả các tệp mới đã chọn

// Hàm xem trước ảnh mới
function previewNewImages() {
    const imageInput = document.getElementById("image-input");
    const newImagePreviewContainer = document.getElementById(
        "new-image-preview-container"
    );

    // Lấy các tệp mới vừa được chọn
    const selectedFiles = Array.from(imageInput.files);

    // Cập nhật danh sách tệp mới, thêm vào các tệp đã chọn trước đó
    newFiles = newFiles.concat(selectedFiles);

    // Xóa nội dung cũ trong container
    newImagePreviewContainer.innerHTML = "";

    // Hiển thị tất cả ảnh đã chọn
    newFiles.forEach((file, index) => {
        const reader = new FileReader();
        reader.onload = function (e) {
            const imageUrl = e.target.result;
            const imageWrapper = document.createElement("div");
            imageWrapper.classList.add("image-preview", "col-md-3"); // Bootstrap class for responsive grid

            // Tạo phần tử ảnh
            const imageElement = document.createElement("img");
            imageElement.src = imageUrl;

            // Tạo nút xóa
            const removeButton = document.createElement("button");
            removeButton.innerHTML = "X";
            removeButton.classList.add("remove-btn");

            // Xử lý sự kiện khi nhấn nút xóa
            removeButton.addEventListener("click", function () {
                // Xóa ảnh khỏi mảng newFiles
                newFiles.splice(index, 1);
                updateFileInput(); // Cập nhật input file với danh sách mới
                previewNewImages(); // Cập nhật lại danh sách hiển thị ảnh
            });

            // Thêm ảnh và nút xóa vào thẻ div
            imageWrapper.appendChild(imageElement);
            imageWrapper.appendChild(removeButton);

            // Thêm vào container
            newImagePreviewContainer.appendChild(imageWrapper);
        };
        reader.readAsDataURL(file);
    });
}

// Hàm để xóa ảnh cũ
function removeOldImage(button, imageId) {
    const imagePreview = button.parentElement;
    const removedImagesContainer = document.getElementById('removed-images-container');

    // Tạo một input hidden cho ID ảnh đã xóa
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'removed_images[]'; // Use the array notation
    input.value = imageId; // Set the value to the image ID

    // Thêm input vào container
    removedImagesContainer.appendChild(input);

    // Xóa ảnh cũ khỏi giao diện
    imagePreview.remove();
}

// Hàm cập nhật lại giá trị của input file
function updateFileInput() {
    const imageInput = document.getElementById("image-input");
    const dataTransfer = new DataTransfer();

    // Thêm lại các tệp mới vào DataTransfer
    newFiles.forEach((file) => dataTransfer.items.add(file));

    // Cập nhật input file với danh sách mới
    imageInput.files = dataTransfer.files;
}
