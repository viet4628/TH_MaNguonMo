<!-- app/views/shares/footer.php -->
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <!-- Column 1 -->
                <div class="footer-column">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
                    <h3>ShopPro</h3>
                    <p>ShopPro là website bán hàng hàng đầu, cung cấp các sản phẩm điện tử chính hãng với giá cả cạnh tranh và dịch vụ chăm sóc khách hàng tốt nhất.</p>
                    <div class="social-links">
                        <a href="https://facebook.com" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="https://instagram.com" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="https://linkedin.com" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <!-- Column 2 -->
                <div class="footer-column">
                    <h3>Mua Sắm</h3>
                    <ul class="footer-links">
                        <li><a href="/Product">Danh Sách Sản Phẩm</a></li>
                        <li><a href="#">Khuyến Mãi</a></li>
                        <li><a href="#">Sản Phẩm Mới</a></li>
                        <li><a href="#">Sản Phẩm Bán Chạy</a></li>
                        <li><a href="#">Tất Cả Danh Mục</a></li>
                    </ul>
                </div>
                <!-- Column 3 -->
                <div class="footer-column">
                    <h3>Thông Tin</h3>
                    <ul class="footer-links">
                        <li><a href="#">Về Chúng Tôi</a></li>
                        <li><a href="#">Chính Sách Bảo Mật</a></li>
                        <li><a href="#">Điều Khoản Sử Dụng</a></li>
                        <li><a href="#">Quy Định Giao Hàng</a></li>
                        <li><a href="#">Chính Sách Đổi Trả</a></li>
                    </ul>
                </div>
                <!-- Column 4 -->
                <div class="footer-column contact-info">
                    <h3>Liên Hệ</h3>
                    <p><span class="icon">📍</span> 123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh</p>
                    <p><span class="icon">📞</span> Hotline: 1900 1234</p>
                    <p><span class="icon">✉️</span> Email: info@shoppro.com</p>
                    <p><span class="icon">🕒</span> Giờ làm việc: 8:00 - 22:00</p>
                </div>
            </div>
            <div class="copyright">
                © 2025 ShopPro. Tất cả quyền được bảo lưu.
            </div>
        </div>
    </footer>

    <style>
        /* Footer Styles */
        footer {
            background-color: #2c3e50;
            color: white;
            padding: 50px 0 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 20px;
            position: relative;
        }

        .footer-column h3::after {
            content: '';
            display: block;
            width: 40px;
            height: 2px;
            background-color: #3498db;
            margin-top: 10px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: #3498db;
        }

        .contact-info p {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            color: #bdc3c7;
        }

        .contact-info .icon {
            margin-right: 10px;
            color: #3498db;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: block;
            width: 36px;
            height: 36px;
            background-color: #34495e;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .social-links a:hover {
            background-color: #3498db;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #34495e;
            color: #bdc3c7;
            font-size: 14px;
        }
    </style>
</body>
</html>