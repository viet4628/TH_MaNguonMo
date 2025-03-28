<?php include 'app/views/shares/header.php'; ?>

<style>
    /* Container chính */
    .list-container {
        width: 100%;
        max-width: 1800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        display: flex;
        gap: 30px;
    }

    /* Sidebar bộ lọc */
    .filter-sidebar {
        width: 280px;
        flex-shrink: 0;
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        height: fit-content;
    }

    .filter-section {
        margin-bottom: 25px;
    }

    .filter-section h3 {
        font-size: 18px;
        color: #2c3e50;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e9ecef;
    }

    .filter-group {
        margin-bottom: 20px;
    }

    .filter-group label {
        display: block;
        margin-bottom: 10px;
        color: #495057;
        font-weight: 500;
    }

    .checkbox-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        padding: 4px 0;
        transition: background-color 0.2s ease;
    }

    .checkbox-item:hover {
        background-color: #f0f0f0;
        border-radius: 4px;
    }

    .checkbox-item input[type="radio"] {
        width: 16px;
        height: 16px;
        cursor: pointer;
        accent-color: #3498db;
    }

    .checkbox-item label {
        margin: 0;
        cursor: pointer;
        font-size: 14px;
        flex: 1;
    }

    .checkbox-item input[type="radio"]:checked + label {
        color: #3498db;
        font-weight: 500;
    }

    /* Price Input Styles */
    .price-inputs {
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
    }

    .price-input-group {
        display: flex;
        align-items: center;
        gap: 8px;
        flex: 1;
    }

    .price-input-group label {
        min-width: 30px;
        margin: 0;
        font-size: 14px;
        color: #666;
        white-space: nowrap;
    }

    .price-input-group input {
        width: 100%;
        padding: 6px 8px;
        border: 1px solid #ddd;
        border-radius: var(--border-radius-md);
        font-size: 14px;
        transition: var(--transition);
    }

    .price-input-group input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        outline: none;
    }

    .price-input-group .currency {
        color: #666;
        font-size: 14px;
        white-space: nowrap;
    }

    /* Main content area */
    .main-content {
        flex: 1;
    }

    /* Tiêu đề */
    h1 {
        font-size: 32px;
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
        font-weight: 700;
    }

    /* Nút Thêm sản phẩm mới */
    .btn-add-new {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #27ae60;
    color: white;
    padding: 10px 20px;  /* Increased padding for better touch target */
    border-radius: 8px;  /* Slightly larger border radius */
    text-decoration: none;
    font-size: 14px;     /* Slightly larger font size */
    font-weight: 600;
    text-transform: uppercase;  /* Uppercase text for emphasis */
    letter-spacing: 0.5px;      /* Slight letter spacing */
    transition: all 0.3s ease;
    margin-bottom: 20px;
    gap: 10px;           /* More space between icon and text */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);  /* Subtle shadow */
    }

    .btn-add-new:hover {
        background-color: #219653;
        box-shadow: 0 4px 15px rgba(33, 150, 83, 0.4);
        transform: translateY(-2px);  /* Slight lift effect on hover */
    }

    .btn-add-new svg {
        width: 18px;   /* Slightly larger icon */
        height: 18px;
    }

    /* Danh sách sản phẩm dạng lưới */
    .list-group {
        list-style: none;
        padding: 0;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 25px;
    }

    .list-group-item {
        background-color: #fff;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        text-align: center;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .list-group-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    /* Phần hình ảnh sản phẩm */
    .product-image-container {
        position: relative;
        width: 100%;
        height: 220px;
        margin-bottom: 15px;
        overflow: hidden;
        border-radius: 8px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product-image {
        width: auto;
        height: auto;
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .product-image-container:hover .product-image {
        transform: scale(1.05);
    }

    /* Overlay khi hover */
    .image-hover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .product-image-container:hover .image-hover-overlay {
        opacity: 1;
    }

    /* Nút hành động khi hover */
    .hover-action-btn {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.9);
        color: #333;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 160px;
    }

    .hover-action-btn:hover {
        transform: scale(1.1);
    }

    .quick-view-btn {
        color: #3498db;
    }

    .add-cart-btn {
        color: #2ecc71;
    }

    /* Icon xe đẩy hàng */
    .cart-icon {
        width: 20px;
        height: 20px;
    }

    /* Phần thông tin sản phẩm */
    .product-info {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-size: 18px;
        margin: 0 0 10px 0;
        font-weight: 600;
        height: 50px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-title a {
        color: #2980b9;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .product-title a:hover {
        color: #3498db;
    }

    .product-description {
        margin: 5px 0;
        font-size: 14px;
        color: #555;
        height: 60px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .product-price {
        font-size: 18px;
        font-weight: 700;
        color: #e74c3c;
        margin: 10px 0;
    }

    .product-category {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        margin: 5px 0;
        font-size: 14px;
        color: #555;
    }

    .product-category strong {
        color: #34495e;
    }

    /* Các nút tác vụ (chỉ dành cho admin) */
    .admin-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 15px;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        transition: all 0.2s ease;
    }

    .btn-action:hover {
        transform: scale(1.1);
    }

    .btn-edit {
        background-color: #f39c12;
    }

    .btn-delete {
        background-color: #e74c3c;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .list-container {
            flex-direction: column;
        }
        
        .filter-sidebar {
            width: 100%;
            margin-bottom: 20px;
        }
    }

    @media (max-width: 768px) {
        .list-container {
            width: 95%;
            padding: 15px;
        }

        .filter-sidebar {
            padding: 15px;
        }

        .list-group {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .product-image-container {
            height: 180px;
        }
        
        .hover-action-btn {
            width: 36px;
            height: 36px;
        }
    }

    @media (max-width: 480px) {
        .list-group {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .product-image-container {
            height: 160px;
        }

        .price-inputs {
            flex-direction: column;
        }
        
        .price-input-group {
            width: 100%;
        }
    }
</style>

<div class="container list-container">
    <!-- Sidebar bộ lọc -->
    <div class="filter-sidebar">
        <div class="filter-section">
            <h3>Bộ lọc</h3>
            
            <div class="filter-group">
                <label>Danh mục</label>
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="radio" id="category-all" name="category" value="" 
                               <?php echo !isset($_GET['category']) || $_GET['category'] === '' ? 'checked' : ''; ?>>
                        <label for="category-all">Tất cả danh mục</label>
                    </div>
                    <?php foreach ($categories as $category): ?>
                        <div class="checkbox-item">
                            <input type="radio" id="category-<?php echo $category->id; ?>" 
                                   name="category" value="<?php echo $category->id; ?>"
                                   <?php echo isset($_GET['category']) && $_GET['category'] == $category->id ? 'checked' : ''; ?>>
                            <label for="category-<?php echo $category->id; ?>">
                                <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="filter-group">
                <label>Khoảng giá</label>
                <div class="price-inputs">
                    <div class="price-input-group">
                        <label for="min-price">Từ</label>
                        <input type="number" id="min-price" name="min_price" min="0" max="10000000" step="100000" 
                               value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : '0'; ?>">
                        <span class="currency">₫</span>
                    </div>
                    <div class="price-input-group">
                        <label for="max-price">Đến</label>
                        <input type="number" id="max-price" name="max_price" min="0" max="10000000" step="100000" 
                           value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '10000000'; ?>">
                        <span class="currency">₫</span>
                    </div>
                </div>
            </div>

            <div class="filter-group">
                <label>Sắp xếp theo</label>
                <div class="checkbox-group">
                    <div class="checkbox-item">
                        <input type="radio" id="sort-newest" name="sort" value="newest" 
                               <?php echo !isset($_GET['sort']) || $_GET['sort'] === 'newest' ? 'checked' : ''; ?>>
                        <label for="sort-newest">Mới nhất</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="radio" id="sort-price-asc" name="sort" value="price-asc"
                               <?php echo isset($_GET['sort']) && $_GET['sort'] === 'price-asc' ? 'checked' : ''; ?>>
                        <label for="sort-price-asc">Giá tăng dần</label>
                    </div>
                    <div class="checkbox-item">
                        <input type="radio" id="sort-price-desc" name="sort" value="price-desc"
                               <?php echo isset($_GET['sort']) && $_GET['sort'] === 'price-desc' ? 'checked' : ''; ?>>
                        <label for="sort-price-desc">Giá giảm dần</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <h1>Danh sách sản phẩm</h1>

        <?php if (SessionHelper::isAdmin()): ?>
            <a href="/Product/add" class="btn-add-new">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Thêm sản phẩm mới
            </a>
        <?php endif; ?>

        <ul class="list-group">
            <?php foreach ($products as $product): ?>
                <li class="list-group-item">
                    <div class="product-image-container">
                        <?php if (!empty($product->image)): ?>
                            <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" 
                                alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                                class="product-image"
                                loading="lazy">
                        <?php else: ?>
                            <img src="/uploads/default-product-image.png" 
                                alt="No image available" 
                                class="product-image"
                                loading="lazy">
                        <?php endif; ?>
                        
                        <!-- Các nút hành động khi hover -->
                        <div class="image-hover-overlay">
                            <a href="/Product/show/<?php echo $product->id; ?>" class="hover-action-btn quick-view-btn" title="Xem nhanh">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </a>
                            <a href="/Product/addToCart/<?php echo $product->id; ?>" class="hover-action-btn add-cart-btn" title="Thêm vào giỏ hàng">
                                <svg class="cart-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <div class="product-info">
                        <h2 class="product-title">
                            <a href="/Product/show/<?php echo $product->id; ?>">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h2>
                        
                        <p class="product-description">
                            <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                        </p>
                        
                        <div class="product-price">
                            <?php echo number_format($product->price, 0, ',', '.') . ' ₫'; ?>
                        </div>
                        
                        <div class="product-category">
                            <strong>Danh mục:</strong> 
                            <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                        
                        <?php if (SessionHelper::isAdmin()): ?>
                        <div class="admin-actions">
                            <a href="/Product/edit/<?php echo $product->id; ?>" 
                               class="btn-action btn-edit" 
                               title="Sửa">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                </svg>
                            </a>
                            <a href="/Product/delete/<?php echo $product->id; ?>" 
                               class="btn-action btn-delete" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');"
                               title="Xóa">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3 6h18"></path>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryInputs = document.querySelectorAll('input[name="category"]');
    const sortInputs = document.querySelectorAll('input[name="sort"]');
    const minPriceInput = document.getElementById('min-price');
    const maxPriceInput = document.getElementById('max-price');

    function handleFilter() {
        const category = document.querySelector('input[name="category"]:checked').value;
        const minPrice = minPriceInput.value;
        const maxPrice = maxPriceInput.value;
        const sort = document.querySelector('input[name="sort"]:checked').value;

        let url = '/Product/index?';
        const params = new URLSearchParams();

        if (category) params.append('category', category);
        if (minPrice && minPrice !== '0') params.append('min_price', minPrice);
        if (maxPrice && maxPrice !== '10000000') params.append('max_price', maxPrice);
        if (sort && sort !== 'newest') params.append('sort', sort);

        window.location.href = url + params.toString();
    }

    [...categoryInputs, ...sortInputs].forEach(input => {
        input.addEventListener('change', handleFilter);
    });

    let priceTimeout;
    [minPriceInput, maxPriceInput].forEach(input => {
        input.addEventListener('input', function() {
            clearTimeout(priceTimeout);
            priceTimeout = setTimeout(handleFilter, 500);
        });
    });
});
</script>