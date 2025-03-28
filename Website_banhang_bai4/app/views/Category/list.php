<?php include 'app/views/shares/header.php'; ?>

<style>
    /* Container chính */
    .list-container {
        width: 100%;
        max-width: 1800px;
        margin: 60px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 16px;
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

    /* Nút Thêm danh mục mới */
    .btn-add-new {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #27ae60;
        color: white;
        padding: 12px 25px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.3s ease;
        margin-bottom: 20px;
        gap: 8px;
    }

    .btn-add-new:hover {
        background-color: #219653;
        box-shadow: 0 4px 15px rgba(33, 150, 83, 0.3);
    }

    /* Bảng danh mục */
    .category-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
    }

    .category-table th, 
    .category-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .category-table th {
        background-color: #f5f5f5;
        font-size: 16px;
        font-weight: 600;
        color: #2c3e50;
        text-align: center;
    }

    .category-table td {
        font-size: 14px;
        color: #555;
        vertical-align: middle;
    }

    .category-table tr:hover {
        background-color: #f9f9f9;
    }

    .category-title a {
        color: #2980b9;
        text-decoration: none;
        transition: color 0.3s;
    }

    .category-title a:hover {
        color: #3498db;
    }

    /* Các nút tác vụ */
    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .btn-action {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px 15px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        color: white;
        transition: all 0.3s ease;
        border-radius: 4px;
        border: none;
    }

    .btn-edit {
        background-color: #f39c12;
    }

    .btn-edit:hover {
        background-color: #e67e22;
    }

    .btn-delete {
        background-color: #e74c3c;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }

    /* Icon styles */
    .icon {
        width: 18px;
        height: 18px;
        display: inline-block;
        vertical-align: middle;
        margin-right: 5px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .list-container {
            width: 95%;
        }

        h1 {
            font-size: 28px;
        }

        .category-table th, 
        .category-table td {
            padding: 10px;
            font-size: 13px;
        }
    }

    @media (max-width: 480px) {
        .category-table th, 
        .category-table td {
            padding: 8px;
            font-size: 12px;
        }

        .action-buttons {
            flex-direction: column;
            gap: 5px;
        }

        .btn-action {
            padding: 6px 10px;
        }
    }
</style>

<div class="container list-container">
    <h1>Danh sách danh mục</h1>
    <a href="/Category/add" class="btn-add-new">
        <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Thêm Danh Mục Mới
    </a>

    <table class="category-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php $stt = 1; ?>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td style="text-align: center;"><?php echo $stt++; ?></td>
                    <td class="category-title">
                        <a href="/Category/show/<?php echo $category->id; ?>">
                            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </td>
                    <td><?php echo htmlspecialchars($category->description, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <div class="action-buttons">
                            <a href="/Category/edit/<?php echo $category->id; ?>" class="btn-action btn-edit" title="Sửa">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Sửa
                            </a>
                            <a href="/Category/delete/<?php echo $category->id; ?>" 
                               class="btn-action btn-delete" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');"
                               title="Xóa">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Xóa
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
