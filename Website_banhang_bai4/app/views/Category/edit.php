<?php include 'app/views/shares/header.php'; ?>
<div class="container">
    <h1>Sửa danh mục</h1>
    <?php if (isset($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li style="color: red;"><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="/Category/update" method="POST">
        <input type="hidden" name="id" value="<?php echo $category->id; ?>">
        <div>
            <label>Tên danh mục:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($category->name); ?>" required>
        </div>
        <div>
            <label>Mô tả:</label>
            <textarea name="description"><?php echo htmlspecialchars($category->description); ?></textarea>
        </div>
        <button type="submit">Cập nhật</button>
    </form>
</div>
<?php include 'app/views/shares/footer.php'; ?>