<?php include 'app/views/shares/header.php'; ?>

<style>
    /* Breadcrumb styles */
    .breadcrumb {
        padding: 15px 0;
        margin-bottom: 30px;
        list-style: none;
        background-color: #f8f9fa;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    .breadcrumb-container {
        max-width: 1800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .breadcrumb-list {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .breadcrumb-item {
        display: flex;
        align-items: center;
        color: #666;
        font-size: 14px;
    }

    .breadcrumb-item a {
        color: #666;
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .breadcrumb-item a:hover {
        color: #3498db;
    }

    .breadcrumb-item:not(:last-child)::after {
        content: ">";
        margin-left: 8px;
        color: #999;
    }

    .breadcrumb-item.active {
        color: #3498db;
        font-weight: 500;
    }

    /* Product detail styles */
    .product-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .product-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-header {
        background: linear-gradient(135deg, #3498db, #2980b9);
        padding: 20px;
        color: white;
        text-align: center;
    }

    .product-header h2 {
        margin: 0;
        font-size: 24px;
        font-weight: 600;
    }

    .product-body {
        padding: 30px;
    }

    .product-image {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .product-image:hover {
        transform: scale(1.02);
    }

    .product-image img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .product-info {
        padding: 20px;
    }

    .product-title {
        font-size: 28px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .product-description {
        color: #666;
        line-height: 1.8;
        margin-bottom: 25px;
    }

    .product-price {
        font-size: 32px;
        font-weight: 700;
        color: #e74c3c;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .product-price::before {
        content: "💰";
        font-size: 28px;
    }

    .product-category {
        margin-bottom: 25px;
    }

    .category-badge {
        background: #3498db;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .product-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .btn-add-cart {
        background: #2ecc71;
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add-cart:hover {
        background: #27ae60;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(46, 204, 113, 0.3);
    }

    .btn-back {
        background: #95a5a6;
        color: white;
        padding: 12px 30px;
        border-radius: 25px;
        border: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background: #7f8c8d;
        transform: translateY(-2px);
    }

    .product-meta {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
        color: #666;
    }

    .meta-item i {
        color: #3498db;
    }
</style>

<div class="breadcrumb">
    <div class="breadcrumb-container">
        <ul class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>
            <?php if (isset($breadcrumbs)): ?>
                <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>
                    <li class="breadcrumb-item <?php echo ($index === count($breadcrumbs) - 1) ? 'active' : ''; ?>">
                        <?php if ($index === count($breadcrumbs) - 1): ?>
                            <?php echo htmlspecialchars($breadcrumb['name'], ENT_QUOTES, 'UTF-8'); ?>
                        <?php else: ?>
                            <a href="<?php echo htmlspecialchars($breadcrumb['url'], ENT_QUOTES, 'UTF-8'); ?>">
                                <?php echo htmlspecialchars($breadcrumb['name'], ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>

<div class="product-container">
    <div class="product-card">
        <div class="product-header">
            <h2>Chi tiết sản phẩm</h2>
        </div>
        <div class="product-body">
            <?php if ($product): ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-image">
                        <?php if ($product->image): ?>
                            <img src="/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                                 alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>">
                        <?php else: ?>
                                <img src="/images/no-image.png" alt="Không có ảnh">
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-info">
                            <h3 class="product-title">
                            <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                        </h3>
                            <p class="product-description">
                            <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
                        </p>
                            <div class="product-price">
                                <?php echo number_format($product->price, 0, ',', '.'); ?> VND
                            </div>
                            <div class="product-category">
                                <span class="category-badge">
                                <?php echo !empty($product->category_name) 
                                    ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') 
                                    : 'Chưa có danh mục'; ?>
                            </span>
                            </div>
                            <div class="product-actions">
                            <a href="/Product/addToCart/<?php echo $product->id; ?>" 
                                   class="btn-add-cart">
                                    <i class="fas fa-shopping-cart"></i>
                                    Thêm vào giỏ hàng
                                </a>
                                <a href="/Product" class="btn-back">
                                    <i class="fas fa-arrow-left"></i>
                                    Quay lại
                                </a>
                            </div>
                            <div class="product-meta">
                                <div class="meta-item">
                                    <i class="fas fa-box"></i>
                                    <span>Sản phẩm có sẵn</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-truck"></i>
                                    <span>Miễn phí vận chuyển</span>
                                </div>
                                <div class="meta-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <span>Bảo hành chính hãng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-danger text-center">
                    <h4>Không tìm thấy sản phẩm!</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>