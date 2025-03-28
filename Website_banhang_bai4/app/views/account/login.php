<?php include 'app/views/shares/header.php'; ?>

<section class="auth-section">
    <div class="auth-container">
        <!-- Left Side: Gradient with Text -->
        <div class="auth-side auth-left">
            <div class="overlay">
                <h1 class="welcome-text">Welcome to Comeback!</h1>
            </div>
        </div>

        <!-- Right Side: Login Form -->
        <div class="auth-side auth-right">
            <div class="form-wrapper">
                <h2 class="auth-title">Đăng Nhập</h2>
                <p class="auth-subtitle">Chào mừng! Vui lòng đăng nhập vào tài khoản của bạn</p>

                <form action="/account/checklogin" method="post">
                    <!-- Username -->
                    <div class="form-group mb-4">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Tên đăng nhập" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group mb-4">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                    </div>

                    <!-- Remember Me and Forgot Password -->
                    <div class="form-options mb-4 d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input type="checkbox" id="remember-me" class="form-check-input">
                            <label for="remember-me" class="form-check-label">Ghi nhớ tôi</label>
                        </div>
                        <a href="#!" class="forgot-password">Quên mật khẩu?</a>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn auth-btn">Đăng Nhập</button>
                </form>

                <!-- Sign Up Link -->
                <p class="auth-link mt-4 text-center">
                    Bạn chưa có tài khoản? <a href="/account/register">Đăng ký</a>
                </p>
            </div>
        </div>
    </div>
</section>

<style>
    .auth-section {
        min-height: 100vh;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .auth-container {
        display: flex;
        width: 100%;
        max-width: 900px;
        height: 600px;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .auth-side {
        flex: 1;
    }

    .auth-left {
        background: linear-gradient(135deg, #6b48ff 0%, #ff9a8b 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .overlay {
        text-align: center;
        color: white;
    }

    .welcome-text {
        font-size: 48px;
        font-weight: 700;
        line-height: 1.2;
    }

    .auth-right {
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
    }

    .form-wrapper {
        width: 100%;
        max-width: 350px;
    }

    .auth-title {
        font-size: 28px;
        font-weight: 700;
        color: #333;
        text-align: center;
        margin-bottom: 10px;
    }

    .auth-subtitle {
        font-size: 14px;
        color: #666;
        text-align: center;
        margin-bottom: 30px;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #6b48ff;
        box-shadow: none;
        outline: none;
    }

    .form-options {
        font-size: 13px;
    }

    .form-check-input {
        margin-top: 2px;
    }

    .form-check-label {
        color: #666;
        margin-left: 5px;
    }

    .forgot-password {
        color: #6b48ff;
        text-decoration: none;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .auth-btn {
        background: #6b48ff;
        color: white;
        border: none;
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 600;
        transition: background 0.3s ease;
    }

    .auth-btn:hover {
        background: #5a3de6;
    }

    .auth-link {
        font-size: 14px;
        color: #666;
    }

    .auth-link a {
        color: #6b48ff;
        text-decoration: none;
        font-weight: 600;
    }

    .auth-link a:hover {
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .auth-container {
            flex-direction: column;
            height: auto;
            max-width: 100%;
        }

        .auth-side {
            flex: none;
            width: 100%;
        }

        .auth-left {
            height: 200px;
        }

        .welcome-text {
            font-size: 32px;
        }

        .auth-right {
            padding: 30px 20px;
        }

        .form-wrapper {
            max-width: 100%;
        }
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>