<?php include 'app/views/shares/header.php'; ?>
<div class="container">
    <h1><?php echo htmlspecialchars($category->name); ?></h1>
    <p><strong>Mô tả:</strong> <?php echo htmlspecialchars($category->description); ?></p>
    <a href="/Category/list_Category">Quay lại danh sách</a>
</div>
<?php include 'app/views/shares/footer.php'; ?>