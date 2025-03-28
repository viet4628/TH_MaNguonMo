<!-- app/views/shares/header.php -->
<?php

require_once 'app/helpers/SessionHelper.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ShopPro - Website bán hàng chuyên nghiệp với đa dạng sản phẩm chất lượng cao">
    <meta name="keywords" content="shop online, mua sắm trực tuyến, sản phẩm chất lượng">
    <title>ShopPro - Website Bán Hàng Chuyên Nghiệp</title>
    <!-- Favicon -->
    <link rel="icon" href="/assets/images/favicon.png" type="image/png">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --secondary-color: #2c3e50;
            --secondary-dark: #1a252f;
            --accent-color: #e74c3c;
            --accent-dark: #c0392b;
            --success-color: #2ecc71;
            --success-dark: #27ae60;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --text-color: #333;
            --gray-color: #7f8c8d;
            --gray-dark: #636e72;
            --body-bg: #f5f5f5;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 2px 6px rgba(0, 0, 0, 0.12);
            --transition: all 0.25s ease;
            --border-radius-sm: 3px;
            --border-radius-md: 6px;
            --border-radius-lg: 12px;
        }
        
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--body-bg);
            color: var(--text-color);
            padding-top: 60px;
            font-family: 'Roboto', sans-serif;
            line-height: 1.5;
            font-size: 14px;
        }

        /* Header Styles */
        header {
            background-color: var(--secondary-color);
            color: white;
            padding: 10px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            transition: var(--transition);
            box-shadow: var(--shadow-md);
        }

        header.scrolled {
            padding: 8px 0;
            background-color: var(--secondary-dark);
        }

        .navbar {
            padding: 0;
        }

        .navbar-brand {
    font-family: 'Montserrat', sans-serif;
    font-size: 22px;
    font-weight: 700;
    color: white !important;
    letter-spacing: 0.5px;
    margin-right: 10px;
    margin-left: -60px; /* Dịch "ShopPro" sang trái 15px */
}

.navbar-nav {
    margin-left: 45px; /* Dịch các mục sang phải 5px */
}

        .navbar-brand span {
            color: var(--primary-color);
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            font-size: 14px;
            padding: 8px 12px;
            transition: var(--transition);
            position: relative;
            margin: 0 1px;
        }

        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            bottom: 4px;
            left: 12px;
            width: calc(100% - 24px);
            height: 2px;
            background-color: var(--primary-color);
            transform: scaleX(0);
            transition: var(--transition);
            transform-origin: right;
        }

        .navbar-nav .nav-link:hover {
            color: white !important;
        }

        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .navbar-nav .nav-link.active {
            color: white !important;
            font-weight: 600;
        }

        .navbar-toggler {
            border: none;
            padding: 0;
            font-size: 1.2rem;
            color: white;
            transition: var(--transition);
        }

        .navbar-toggler:focus {
            box-shadow: none;
            outline: none;
        }

        /* Search Box */
        .search-box {
            position: relative;
            margin-right: 10px;
            flex-grow: 1;
            max-width: 220px;
        }

        .search-box input {
            padding: 6px 30px 6px 12px;
            border-radius: var(--border-radius-md);
            border: none;
            outline: none;
            width: 100%;
            font-size: 13px;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            background-color: rgba(255, 255, 255, 0.9);
            height: 32px;
        }

        .search-box input:focus {
            box-shadow: var(--shadow-md);
            background-color: white;
        }

        .search-box button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: var(--secondary-color);
            font-size: 14px;
            transition: var(--transition);
        }

        .search-box button:hover {
            color: var(--primary-color);
        }

        /* Cart Button */
        .cart-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: var(--border-radius-md);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            position: relative;
            height: 32px;
        }

        .cart-button:hover {
            background-color: var(--primary-dark);
            color: white;
            text-decoration: none;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .cart-button i {
            margin-right: 6px;
            font-size: 14px;
        }

        .cart-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background-color: var(--accent-color);
            color: white;
            font-size: 10px;
            font-weight: 700;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-sm);
        }

        /* Login/Logout Buttons */
        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .auth-buttons .login-btn,
        .auth-buttons .logout-btn,
        .auth-buttons .username {
            color: white;
            font-weight: 500;
            font-size: 13px;
            padding: 6px 12px;
            border-radius: var(--border-radius-md);
            text-decoration: none;
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            height: 32px;
        }

        .auth-buttons .login-btn {
            background-color: var(--accent-color);
        }

        .auth-buttons .login-btn:hover {
            background-color: var(--accent-dark);
            color: white;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .auth-buttons .logout-btn {
            background-color: var(--gray-color);
        }

        .auth-buttons .logout-btn:hover {
            background-color: var(--gray-dark);
            color: white;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .auth-buttons .username {
            background-color: var(--success-color);
            cursor: default;
            gap: 6px;
        }

        .auth-buttons .username:hover {
            background-color: var(--success-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .auth-buttons i {
            margin-right: 4px;
            font-size: 14px;
        }

        /* Header Buttons */
        .header-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Dark Mode Toggle */
        .theme-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
        }

        .theme-toggle:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .theme-toggle i {
            color: white;
            font-size: 16px;
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .navbar-collapse {
                background-color: var(--secondary-color);
                padding: 15px;
                border-radius: var(--border-radius-md);
                margin-top: 10px;
                box-shadow: var(--shadow-md);
            }

            .navbar-nav {
                margin-bottom: 10px;
            }

            .navbar-nav .nav-link {
                padding: 8px 12px;
                border-radius: var(--border-radius-sm);
            }

            .navbar-nav .nav-link:hover {
                background-color: rgba(52, 152, 219, 0.15);
            }

            .navbar-nav .nav-link::after {
                display: none;
            }

            .header-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .search-box {
                margin-right: 0;
                max-width: none;
                width: 100%;
            }

            .auth-buttons {
                width: 100%;
                justify-content: space-between;
            }

            .auth-buttons .login-btn,
            .auth-buttons .logout-btn,
            .auth-buttons .username {
                width: 100%;
                justify-content: center;
            }

            .cart-button {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            body {
                padding-top: 56px;
            }

            .navbar-brand {
                font-size: 20px;
            }

            .auth-buttons {
                flex-direction: column;
                gap: 8px;
            }

            .navbar-toggler {
                font-size: 1.1rem;
            }

            .navbar-nav .nav-link {
                font-size: 13px;
            }
        }

        /* Nav Item Icons */
        .nav-link i {
            font-size: 13px;
            margin-right: 4px;
        }

        /* User Dropdown Styles */
        .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .user-button {
            background-color: var(--success-color);
            color: white;
            padding: 6px 12px;
            border-radius: var(--border-radius-md);
            font-size: 13px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            border: none;
            height: 32px;
            transition: var(--transition);
        }

        .user-button:hover {
            background-color: var(--success-dark);
        }

        .user-button i {
            font-size: 14px;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 8px;
            background-color: white;
            min-width: 200px;
            border-radius: var(--border-radius-md);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            overflow: hidden;
        }

        .dropdown-content.show {
            display: block;
            animation: slideDown 0.2s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            color: var(--text-color);
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--primary-color);
        }

        .dropdown-item i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .dropdown-divider {
            height: 1px;
            background-color: #e9ecef;
            margin: 4px 0;
        }

        @media (max-width: 991px) {
            .dropdown-content {
                position: static;
                box-shadow: none;
                margin-top: 10px;
                width: 100%;
            }

            .user-button {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">Shop<span>Pro</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '/home') ? 'active' : ''; ?>" href="/">
                                <i class="fas fa-home"></i> Trang Chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/Product') === 0 && $_SERVER['REQUEST_URI'] != '/Product/add' && strpos($_SERVER['REQUEST_URI'], '/Product/Cart') === false) ? 'active' : ''; ?>" href="/Product">
                                <i class="fas fa-store"></i> Sản Phẩm
                            </a>
                        </li>

                        <!-- Danh mục và Thêm Sản phẩm chỉ hiển thị với admin-->
                        <?php if (SessionHelper::isAdmin()): ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/Product/add') ? 'active' : ''; ?>" href="/Product/add">
                                <i class="fas fa-plus-circle"></i> Thêm SP
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link <?php echo (strpos($_SERVER['REQUEST_URI'], '/Category') === 0) ? 'active' : ''; ?>" href="/Category/list_Category">
                                <i class="fas fa-tags"></i> Danh Mục
                            </a>
                        </li>
                        <?php endif; ?>
                        <!-- Kết Thúc xác nhận admin-->
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/about') ? 'active' : ''; ?>" href="#">
                                <i class="fas fa-info-circle"></i> Giới Thiệu
                            </a>
                        </li>
                        

                    </ul>
                    <div class="header-buttons">
                        <div class="d-flex align-items-center gap-2">
                            <div class="search-box">
                                <input type="text" placeholder="Tìm kiếm sản phẩm...">
                                <button><i class="fas fa-search"></i></button>
                            </div>
                            <div class="theme-toggle" id="themeToggle">
                                <i class="fas fa-moon"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <a href="<?php echo SessionHelper::isLoggedIn() ? '/Product/Cart' : '/account/login'; ?>" class="cart-button">
                                <i class="fas fa-shopping-cart"></i> Giỏ Hàng
                                <?php 
                                $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                                if ($cartCount > 0):
                                ?>
                                <span class="cart-badge"><?php echo $cartCount; ?></span>
                                <?php endif; ?>
                            </a>
                            <div class="auth-buttons">
                                <?php if (SessionHelper::isLoggedIn()): ?>
                                    <div class="user-dropdown">
                                        <button class="user-button" id="userDropdown">
                                            <i class="fas fa-user-circle"></i>
                                            <?php echo htmlspecialchars($_SESSION['username']); ?>
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-content" id="userDropdownContent">
                                            <a href="/account/profile" class="dropdown-item">
                                                <i class="fas fa-user"></i>
                                                Thông tin cá nhân
                                            </a>
                                            <a href="/account/orders" class="dropdown-item">
                                                <i class="fas fa-shopping-bag"></i>
                                                Đơn hàng của tôi
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="/account/logout" class="dropdown-item">
                                                <i class="fas fa-sign-out-alt"></i>
                                                Đăng xuất
                                            </a>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <a href="/account/login" class="login-btn">
                                        <i class="fas fa-sign-in-alt"></i> Đăng nhập
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.querySelector('header');
            if (window.scrollY > 30) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Active navigation link highlighting
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
            
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href === currentPath) {
                    link.classList.add('active');
                }
            });
        });

        // Theme toggle functionality (dark/light mode)
        document.getElementById('themeToggle').addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon.classList.contains('fa-moon')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                document.body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                document.body.classList.remove('dark-mode');
                localStorage.setItem('theme', 'light');
            }
        });

        // Check saved theme preference
        document.addEventListener('DOMContentLoaded', function() {
            const savedTheme = localStorage.getItem('theme');
            const themeToggle = document.getElementById('themeToggle');
            const icon = themeToggle.querySelector('i');
            
            if (savedTheme === 'dark') {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                document.body.classList.add('dark-mode');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const userDropdown = document.getElementById('userDropdown');
            const dropdownContent = document.getElementById('userDropdownContent');

            if (userDropdown && dropdownContent) {
                userDropdown.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdownContent.classList.toggle('show');
                });

                // Đóng dropdown khi click ra ngoài
                document.addEventListener('click', function(e) {
                    if (!dropdownContent.contains(e.target) && !userDropdown.contains(e.target)) {
                        dropdownContent.classList.remove('show');
                    }
                });
            }
        });
    </script>
</body>
</html>