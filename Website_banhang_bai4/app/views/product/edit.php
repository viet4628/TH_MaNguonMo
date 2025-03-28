<?php include 'app/views/shares/header.php'; ?>

<style>
    /* Container chính */
    .main-container {
        max-width: 1200px;
        margin: 30px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Tiêu đề */
    h1 {
        font-size: 28px;
        color: #2d3748;
        margin-bottom: 30px;
        font-weight: 600;
        text-align: center;
        letter-spacing: 0.5px;
        position: relative;
        padding-bottom: 15px;
    }

    h1::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: #3182ce;
        border-radius: 2px;
    }

    /* Form content */
    .form-content {
        display: flex;
        gap: 30px;
        margin-bottom: 30px;
    }

    /* Khu vực bên trái (2/3) */
    .left-section {
        width: 66.66%;
        padding: 30px;
        background-color: #f8fafc;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    /* Khu vực bên phải (1/3) */
    .right-section {
        width: 33.33%;
        padding: 30px;
        background-color: #f8fafc;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .right-section h2 {
        font-size: 20px;
        color: #2d3748;
        margin-bottom: 20px;
        text-align: center;
        position: relative;
        padding-bottom: 10px;
    }

    .right-section h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 2px;
        background: #3182ce;
        border-radius: 2px;
    }

    /* Form nhập thông tin sản phẩm */
    .product-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 15px;
        font-weight: 500;
        color: #4a5568;
        letter-spacing: 0.3px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        padding: 12px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-size: 14px;
        width: 100%;
        box-sizing: border-box;
        background-color: #fff;
        transition: all 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #3182ce;
        box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
        max-height: 200px;
    }

    /* Dropdown danh mục */
    .category-select {
        position: relative;
    }

    .category-select select {
        appearance: none;
        padding-right: 40px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%234a5568'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
    }

    /* Khu vực kéo thả ảnh */
    .image-upload-container {
        border: 2px dashed #a0aec0;
        border-radius: 12px;
        padding: 30px;
        text-align: center;
        background-color: #fff;
        transition: all 0.3s ease;
        margin-top: 20px;
    }

    .image-upload-container.dragover {
        border-color: #48bb78;
        background-color: #f0fff4;
        transform: scale(1.02);
    }

    .image-upload-container input[type="file"] {
        display: none;
    }

    .image-upload-container label {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 25px;
        background-color: #3182ce;
        color: white;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 500;
        font-size: 15px;
        transition: all 0.3s ease;
        margin: 15px 0;
    }

    .image-upload-container label:hover {
        background-color: #2b6cb0;
        transform: translateY(-2px);
    }

    .image-upload-container p {
        margin: 0 0 15px 0;
        color: #718096;
        font-size: 15px;
    }

    .supported-files {
        margin-top: 20px;
        font-size: 14px;
        color: #718096;
        line-height: 1.5;
        background: #f7fafc;
        padding: 15px;
        border-radius: 8px;
    }

    .supported-files strong {
        color: #4a5568;
    }

    .current-image {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }

    .current-image p {
        color: #4a5568;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .current-image img {
        max-width: 150px;
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        padding: 5px;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    /* Form actions */
    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }

    /* Nút */
    .btn {
        padding: 12px 30px;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-primary {
        background-color: #48bb78;
        color: white;
    }

    .btn-primary:hover {
        background-color: #38a169;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background-color: #a0aec0;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #718096;
        transform: translateY(-2px);
    }

    /* Alert */
    .alert {
        padding: 15px 20px;
        margin-bottom: 25px;
        border-radius: 8px;
        background-color: #fed7d7;
        color: #9b2c2c;
        border: 1px solid #feb2b2;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .alert ul li {
        list-style-type: disc;
        font-size: 14px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .main-container {
            margin: 15px;
            padding: 20px;
        }

        .form-content {
            flex-direction: column;
        }

        .left-section, .right-section {
            width: 100%;
            padding: 20px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="main-container">
    <h1>Sửa sản phẩm</h1>
    <?php if (!empty($errors)): ?>
        <div class="alert">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form id="productForm" class="product-form" method="POST" action="/Product/update" enctype="multipart/form-data" onsubmit="return validateForm();">
        <input type="hidden" name="id" value="<?php echo $product->id; ?>">
        <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>">
        
        <div class="form-content">
            <!-- Khu vực bên trái (2/3) -->
            <div class="left-section">
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Mô tả</label>
                    <textarea id="description" name="description" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Giá (₫)</label>
                    <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
                <div class="form-group category-select">
                    <label for="category_id">Danh mục</label>
                    <select id="category_id" name="category_id" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>" <?php echo $category->id == $product->category_id ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- Khu vực bên phải (1/3) -->
            <div class="right-section">
                <h2>Hình ảnh</h2>
                <div class="image-upload-container" id="dropZone">
                    <p>Kéo và thả ảnh vào đây hoặc</p>
                    <label for="imageUpload">
                        <svg class="icon" width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Chọn ảnh
                    </label>
                    <input type="file" id="imageUpload" name="image" accept=".jpg,.jpeg,.png,.gif">
                    <div class="supported-files">
                        <p><strong>Định dạng hỗ trợ:</strong> .jpg, .jpeg, .png, .gif</p>
                        <p><strong>Kích thước tối đa:</strong> 5MB</p>
                    </div>
                    <div class="current-image" id="imagePreview">
                        <?php if ($product->image): ?>
                            <p>Ảnh hiện tại:</p>
                            <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="Current Product Image">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            <a href="/Product" class="btn btn-secondary">Quay lại danh sách</a>
        </div>
    </form>
</div>

<script>
    const dropZone = document.getElementById('dropZone');
    const imageInput = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');

    // Xử lý kéo thả ảnh
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', (e) => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('dragover');
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            imageInput.files = files;
            previewImage(files[0]);
        }
    });

    // Xử lý chọn ảnh từ input
    imageInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            if (file.size > 5 * 1024 * 1024) {
                alert('Kích thước file vượt quá 5MB!');
                e.target.value = '';
                return;
            }
            previewImage(file);
        }
    });

    // Hàm hiển thị preview ảnh
    function previewImage(file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.innerHTML = `
                <p>Ảnh hiện tại:</p>
                <img src="${e.target.result}" alt="Image Preview">
            `;
        };
        reader.readAsDataURL(file);
    }

    // Validate form
    function validateForm() {
        const name = document.getElementById('name').value;
        const price = document.getElementById('price').value;

        if (name.trim() === "") {
            alert("Vui lòng nhập tên sản phẩm");
            return false;
        }

        if (price <= 0) {
            alert("Giá sản phẩm phải lớn hơn 0");
            return false;
        }

        return true;
    }
</script>

<?php include 'app/views/shares/footer.php'; ?>