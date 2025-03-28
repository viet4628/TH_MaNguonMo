<?php include 'app/views/shares/header.php'; ?>

<style>
    .profile-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .profile-header h1 {
        color: var(--secondary-color);
        font-size: 28px;
        margin-bottom: 10px;
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        margin: 0 auto 20px;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 48px;
    }

    .profile-form {
        max-width: 500px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: var(--secondary-color);
        font-weight: 500;
    }

    .form-group input {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .form-group input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        outline: none;
    }

    .form-group input[readonly] {
        background-color: #f8f9fa;
        cursor: not-allowed;
    }

    .password-input-wrapper {
        position: relative;
    }

    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #666;
        padding: 5px;
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    .password-section {
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    .password-section h3 {
        color: var(--secondary-color);
        font-size: 18px;
        margin-bottom: 20px;
    }

    .btn-update {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 12px 24px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 20px;
    }

    .btn-update:hover {
        background-color: var(--primary-dark);
        transform: translateY(-1px);
    }

    .alert {
        padding: 12px 20px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    @media (max-width: 768px) {
        .profile-container {
            margin: 20px;
            padding: 20px;
        }

        .profile-header h1 {
            font-size: 24px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            font-size: 40px;
        }
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <div class="profile-avatar">
            <i class="fas fa-user"></i>
        </div>
        <h1>Thông tin cá nhân</h1>
    </div>

    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION['success_message'];
            unset($_SESSION['success_message']);
            ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger">
            <?php 
            echo $_SESSION['error_message'];
            unset($_SESSION['error_message']);
            ?>
        </div>
    <?php endif; ?>

    <form class="profile-form" method="POST" action="/account/profile">
        <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" id="username" value="<?php echo htmlspecialchars($userInfo->username); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="fullname">Họ và tên</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($userInfo->fullname); ?>" required>
        </div>

        <div class="password-section">
            <h3>Đổi mật khẩu</h3>
            <div class="form-group">
                <label for="current_password">Mật khẩu hiện tại</label>
                <div class="password-input-wrapper">
                    <input type="password" id="current_password" name="current_password" required>
                    <i class="fas fa-eye password-toggle" onclick="togglePassword('current_password')"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="new_password">Mật khẩu mới (để trống nếu không đổi)</label>
                <div class="password-input-wrapper">
                    <input type="password" id="new_password" name="new_password">
                    <i class="fas fa-eye password-toggle" onclick="togglePassword('new_password')"></i>
                </div>
            </div>
        </div>

        <button type="submit" class="btn-update">Cập nhật thông tin</button>
    </form>
</div>

<script>
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling;
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>

<?php include 'app/views/shares/footer.php'; ?> 