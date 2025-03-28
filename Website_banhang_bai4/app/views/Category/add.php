<?php include 'app/views/shares/header.php'; ?>

<div class="main-container">
    <h1>Thêm Danh Mục Mới</h1>

    <?php if (isset($errors)): ?>
        <div class="alert-danger">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/Category/save" method="POST">
        <div class="form-group">
            <label for="categoryName">Tên danh mục:</label>
            <input type="text" class="form-control" id="categoryName" name="name" required>
        </div>

        <div class="form-group">
            <label for="categoryDescription">Mô tả:</label>
            <textarea class="form-control" id="categoryDescription" name="description"></textarea>
        </div>

        <button type="submit" class="btn-primary">Lưu</button>
        <a href="/Category/list_Category" class="btn-secondary">Quay lại</a>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    /* Container chính */
    .main-container {
        width: 90%;
        max-width: 800px;
        margin: 40px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Tiêu đề */
    h1 {
        font-size: 32px;
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
        font-weight: 700;
    }

    /* Thông báo lỗi */
    .alert-danger {
        background-color: #fef1f1;
        border: 1px solid #e74c3c;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 25px;
        color: #e74c3c;
    }

    .alert-danger ul {
        list-style: none;
        padding-left: 0;
    }

    .alert-danger li {
        margin-bottom: 8px;
        font-size: 14px;
    }

    .alert-danger li:before {
        content: "⚠️ ";
        margin-right: 5px;
    }

    /* Form */
    form {
        padding: 20px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        font-size: 16px;
        font-weight: 600;
        color: #34495e;
        margin-bottom: 8px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select,
    .form-group input[type="file"] {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #dcdcdc;
        border-radius: 6px;
        font-size: 14px;
        color: #333;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus,
    .form-group input[type="file"]:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    /* Nút Lưu */
    .btn-primary {
        background-color: #3498db;
        border: none;
        padding: 12px 30px;
        border-radius: 6px;
        color: white;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        display: block;
        width: 100%;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    /* Nút Quay lại */
    .btn-secondary {
        display: inline-block;
        background-color: #7f8c8d;
        color: white;
        padding: 10px 25px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        margin-top: 20px;
        transition: background-color 0.3s;
    }

    .btn-secondary:hover {
        background-color: #6c7778;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .main-container {
            width: 95%;
            padding: 20px;
        }

        h1 {
            font-size: 28px;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 14px;
        }

        .btn-secondary {
            padding: 8px 20px;
            font-size: 12px;
        }
    }
</style>
