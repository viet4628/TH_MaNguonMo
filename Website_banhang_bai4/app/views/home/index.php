<?php include 'app/views/shares/header.php'; ?>

<!-- Hero Section with Banner -->
<section class="hero">
    <div class="container hero-content">
        <h1>Mua Sắm Thông Minh, Tiết Kiệm Thời Gian</h1>
        <p>Khám phá hàng ngàn sản phẩm chất lượng cao với giá cả phải chăng. Giao hàng nhanh chóng và đảm bảo uy tín.</p>
        <a href="/Product" class="cta-button">Mua Ngay</a>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products">
    <div class="container">
        <h2 class="section-title">Sản Phẩm Nổi Bật</h2>
        <div class="products-carousel">
            <div class="carousel-track">
                <!-- Product 1 -->
                <div class="product-card" data-id="1">
                    <div class="product-image">
                        <img src="/public/image/dashboad/samsung_galaxy_s24_pro.jpg" alt="Samsung Galaxy S24 Ultra">
                    </div>
                    <div class="product-info">
                        <div class="product-category">Điện Thoại</div>
                        <div class="product-title">Samsung Galaxy S24 Ultra</div>
                        <div class="product-price">20.390.000 ₫</div>
                        <button class="product-button">Thêm Vào Giỏ</button>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="product-card" data-id="2">
                    <div class="product-image">
                        <img src="/public/image/dashboad/laptop.png" alt="Laptop UltraBook 15 inch">
                    </div>
                    <div class="product-info">
                        <div class="product-category">Laptop</div>
                        <div class="product-title">Laptop UltraBook 15"</div>
                        <div class="product-price">19.990.000 ₫</div>
                        <button class="product-button">Thêm Vào Giỏ</button>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="product-card" data-id="3">
                    <div class="product-image">
                        <img src="/public/image/dashboad/tai_nghe.png" alt="Tai Nghe Bluetooth Pro">
                    </div>
                    <div class="product-info">
                        <div class="product-category">Tai Nghe</div>
                        <div class="product-title">Tai Nghe Bluetooth Pro</div>
                        <div class="product-price">1.790.000 ₫</div>
                        <button class="product-button">Thêm Vào Giỏ</button>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="product-card" data-id="4">
                    <div class="product-image">
                        <img src="/public/image/dashboad/dong_ho.png" alt="Đồng Hồ Thông Minh V4">
                    </div>
                    <div class="product-info">
                        <div class="product-category">Đồng Hồ</div>
                        <div class="product-title">Đồng Hồ Thông Minh V4</div>
                        <div class="product-price">2.590.000 ₫</div>
                        <button class="product-button">Thêm Vào Giỏ</button>
                    </div>
                </div>
                <!-- Nhân đôi các sản phẩm để tạo hiệu ứng trôi liên tục -->
                <div class="product-card" data-id="1">
                    <div class="product-image">
                        <img src="/public/image/dashboad/samsung_galaxy_s24_pro.jpg" alt="Samsung Galaxy S24 Ultra">
                    </div>
                    <div class="product-info">
                        <div class="product-category">Điện Thoại</div>
                        <div class="product-title">Samsung Galaxy S24 Ultra</div>
                        <div class="product-price">20.390.000 ₫</div>
                        <button class="product-button">Thêm Vào Giỏ</button>
                    </div>
                </div>
                <div class="product-card" data-id="2">
                    <div class="product-image">
                        <img src="/public/image/dashboad/laptop.png" alt="Laptop UltraBook 15 inch">
                    </div>
                    <div class="product-info">
                        <div class="product-category">Laptop</div>
                        <div class="product-title">Laptop UltraBook 15"</div>
                        <div class="product-price">19.990.000 ₫</div>
                        <button class="product-button">Thêm Vào Giỏ</button>
                    </div>
                </div>
                <div class="product-card" data-id="3">
                    <div class="product-image">
                        <img src="/public/image/dashboad/tai_nghe.png" alt="Tai Nghe Bluetooth Pro">
                    </div>
                    <div class="product-info">
                        <div class="product-category">Tai Nghe</div>
                        <div class="product-title">Tai Nghe Bluetooth Pro</div>
                        <div class="product-price">1.790.000 ₫</div>
                        <button class="product-button">Thêm Vào Giỏ</button>
                    </div>
                </div>
                <div class="product-card" data-id="4">
                    <div class="product-image">
                        <img src="/public/image/dashboad/dong_ho.png" alt="Đồng Hồ Thông Minh V4">
                    </div>
                    <div class="product-info">
                        <div class="product-category">Đồng Hồ</div>
                        <div class="product-title">Đồng Hồ Thông Minh V4</div>
                        <div class="product-price">2.590.000 ₫</div>
                        <button class="product-button">Thêm Vào Giỏ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories">
    <div class="container">
        <h2 class="section-title">Danh Mục Sản Phẩm</h2>
        <div class="categories-grid">
            <!-- Category 1 -->
            <a href="/Product?category=1" class="category-card">
                <div class="category-image">
                    <img src="/public/image/dashboad/phone.png" alt="Điện Thoại">
                    <div class="category-overlay"></div>
                </div>
                <div class="category-title">Điện Thoại</div>
            </a>
            <!-- Category 2 -->
            <a href="/Product?category=2" class="category-card">
                <div class="category-image">
                    <img src="/public/image/dashboad/laptop.jpg" alt="Laptop">
                    <div class="category-overlay"></div>
                </div>
                <div class="category-title">Laptop</div>
            </a>
            <!-- Category 3 -->
            <a href="/Product?category=3" class="category-card">
                <div class="category-image">
                    <img src="/public/image/dashboad/tablet.png" alt="Máy Tính Bảng">
                    <div class="category-overlay"></div>
                </div>
                <div class="category-title">Máy Tính Bảng</div>
            </a>
            <!-- Category 4 -->
            <a href="/Product?category=4" class="category-card">
                <div class="category-image">
                    <img src="/public/image/dashboad/loa.png" alt="Phụ Kiện">
                    <div class="category-overlay"></div>
                </div>
                <div class="category-title">Phụ Kiện</div>
            </a>
            <!-- Category 5 -->
            <a href="/Product?category=5" class="category-card">
                <div class="category-image">
                    <img src="/public/image/dashboad/tainghe.jpg" alt="Thiết bị Âm Thanh">
                    <div class="category-overlay"></div>
                </div>
                <div class="category-title">Thiết bị Âm Thanh</div>
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <h2 class="section-title">Tại Sao Chọn ShopPro?</h2>
        <div class="features-grid">
            <!-- Feature 1 -->
            <div class="feature-card">
                <div class="feature-icon">🚚</div>
                <h3 class="feature-title">Giao Hàng Nhanh</h3>
                <p class="feature-description">Giao hàng nhanh chóng trong vòng 24h đối với khu vực nội thành và 3-5 ngày cho các tỉnh thành khác.</p>
            </div>
            <!-- Feature 2 -->
            <div class="feature-card">
                <div class="feature-icon">💯</div>
                <h3 class="feature-title">Sản Phẩm Chính Hãng</h3>
                <p class="feature-description">Cam kết 100% sản phẩm chính hãng với tem bảo hành và hóa đơn VAT đầy đủ.</p>
            </div>
            <!-- Feature 3 -->
            <div class="feature-card">
                <div class="feature-icon">🔄</div>
                <h3 class="feature-title">Đổi Trả Dễ Dàng</h3>
                <p class="feature-description">Chính sách đổi trả trong vòng 30 ngày nếu sản phẩm có lỗi từ nhà sản xuất.</p>
            </div>
        </div>
    </div>
</section>

<!-- Loader -->
<div class="loader">
    <div class="spinner"></div>
</div>

<style>
    /* General Container */
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .section-title {
        text-align: center;
        font-size: 36px;
        font-weight: 700;
        color: #1a202c;
        margin-bottom: 50px;
        position: relative;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background-color: #3182ce;
        margin: 15px auto 0;
        border-radius: 2px;
    }

    /* Hero Section */
    .hero {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/api/placeholder/1200/500') center/cover no-repeat;
        height: 500px;
        display: flex;
        align-items: center;
        color: white;
        text-align: center;
    }

    .hero-content {
        max-width: 800px;
        margin: 0 auto;
    }

    .hero h1 {
        font-size: 48px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .hero p {
        font-size: 18px;
        margin-bottom: 30px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }

    .cta-button {
        display: inline-block;
        background-color: #e74c3c;
        color: white;
        text-decoration: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: bold;
        font-size: 18px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .cta-button:hover {
        background-color: #c0392b;
        transform: scale(1.05);
    }

    /* Featured Products */
    .featured-products {
        padding: 80px 0;
        background-color: #f7fafc;
    }

    .products-carousel {
        overflow: hidden;
        position: relative;
        width: 100%;
    }

    .carousel-track {
        display: flex;
        animation: scroll 20s linear infinite; /* Tốc độ trôi: 20s */
    }

    .carousel-track:hover {
        animation-play-state: paused; /* Tạm dừng khi hover */
    }

    @keyframes scroll {
        0% {
            transform: translateX(0);
        }
        100% {
            transform: translateX(-50%); /* Trôi hết 50% vì có bản sao */
        }
    }

    .product-card {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        min-width: 300px; /* Chiều rộng tối thiểu của mỗi sản phẩm */
        margin-right: 30px; /* Khoảng cách giữa các sản phẩm */
        flex-shrink: 0; /* Ngăn co lại */
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background-color: #f1f5f8;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-info {
        padding: 15px;
        text-align: center;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); /* Tối ưu số cột */
        gap: 30px; /* Khoảng cách giữa các thẻ */
        justify-items: center; /* Căn giữa các thẻ trong lưới */
    }

    .product-card {
        background-color: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 300px; /* Giới hạn chiều rộng tối đa */
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background-color: #f1f5f8; /* Màu nền nếu ảnh không tải được */
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Đảm bảo ảnh không bị cắt */
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1); /* Phóng to ảnh khi hover */
    }

    .product-info {
        padding: 15px;
        text-align: center;
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .product-category {
        font-size: 14px;
        color: #7f8c8d;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .product-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        line-height: 1.4;
    }

    .product-price {
        font-size: 20px;
        font-weight: 700;
        color: #e74c3c;
    }

    .product-button {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        font-weight: 500;
        transition: background-color 0.3s ease, transform 0.2s ease;
        margin-top: auto; /* Đẩy nút xuống dưới cùng */
    }

    .product-button:hover {
        background-color: #2980b9;
        transform: scale(1.02);
    }

    /* Categories Section */
    .categories {
        background-color: #f7fafc;
        padding: 80px 0;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 25px;
    }

    .category-card {
        background-color: #ffffff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
        text-align: center;
        text-decoration: none; /* Remove default link underline */
        display: block; /* Make the link fill the card */
        cursor: pointer;
    }

    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .category-image {
        position: relative;
        height: 220px;
        background-color: #f1f5f8;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .category-image img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        transition: transform 0.5s ease, filter 0.3s ease;
        filter: brightness(90%);
    }

    .category-card:hover .category-image img {
        transform: scale(1.08);
        filter: brightness(100%) contrast(105%);
    }

    .category-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.4));
        z-index: 1;
        opacity: 0.8;
        transition: opacity 0.3s ease;
    }

    .category-card:hover .category-overlay {
        opacity: 0.6;
    }

    .category-title {
        padding: 20px;
        font-size: 18px;
        font-weight: 600;
        color: #ffffff;
        background-color: transparent;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        z-index: 2;
        transition: color 0.3s ease;
    }

    .category-card:hover .category-title {
        color: #f7fafc;
    }

    /* Features Section */
    .features {
        padding: 80px 0;
        background-color: white;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }

    .feature-card {
        text-align: center;
        padding: 30px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease;
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .feature-icon {
        font-size: 48px;
        color: #3498db;
        margin-bottom: 20px;
    }

    .feature-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
        color: #2c3e50;
    }

    .feature-description {
        color: #7f8c8d;
        line-height: 1.6;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 36px;
        }

        .hero p {
            font-size: 16px;
        }

        .section-title {
            font-size: 28px;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .product-card {
            max-width: 250px;
        }

        .product-image {
            height: 180px;
        }

        .product-title {
            font-size: 16px;
        }

        .product-price {
            font-size: 18px;
        }

        .product-button {
            padding: 8px 12px;
            font-size: 14px;
        }

        .categories {
            padding: 60px 0;
        }

        .categories-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
        }

        .category-image {
            height: 180px;
        }

        .category-title {
            font-size: 16px;
            padding: 15px;
        }

        .features {
            padding: 60px 0;
        }
        .product-card {
            min-width: 250px;
            margin-right: 20px;
        }

        .product-image {
            height: 180px;
        }
    }

    @media (max-width: 480px) {
        .product-card {
            min-width: 200px;
            margin-right: 15px;
        }

        .product-image {
            height: 160px;
        }
        .hero h1 {
            font-size: 28px;
        }

        .hero p {
            font-size: 14px;
        }

        .cta-button {
            padding: 10px 20px;
            font-size: 16px;
        }

        .section-title {
            font-size: 24px;
        }

        .products-grid {
            grid-template-columns: 1fr; /* 1 cột trên mobile */
            gap: 15px;
        }

        .product-card {
            max-width: 100%;
        }

        .product-image {
            height: 160px;
        }

        .product-title {
            font-size: 15px;
        }

        .product-price {
            font-size: 16px;
        }

        .product-button {
            padding: 8px 10px;
            font-size: 13px;
        }

        .categories {
            padding: 40px 0;
        }

        .categories-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .category-image {
            height: 160px;
        }

        .category-title {
            font-size: 15px;
        }

        .features {
            padding: 40px 0;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lấy category từ URL nếu có
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');
    
    // Nếu có category, tự động chọn radio button tương ứng
    if (category) {
        const radioButton = document.querySelector(`input[name="category"][value="${category}"]`);
        if (radioButton) {
            radioButton.checked = true;
        }
    }
});
</script>

<?php include 'app/views/shares/footer.php'; ?>