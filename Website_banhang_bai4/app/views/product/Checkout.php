<?php include 'app/views/shares/header.php';

// Kiểm tra đăng nhập
if (!SessionHelper::isLoggedIn()) {
    $_SESSION['redirect_after_login'] = '/Product/checkout';
    header('Location: /account/login');
    exit;
}
?>

<style>
    /* Container chính */
    .checkout-container {
        width: 90%;
        max-width: 600px;
        margin: 40px auto;
        padding: 30px;
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

    /* Form nhóm */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 500;
        margin-bottom: 8px;
        color: #34495e;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    /* Nút thanh toán */
    .btn {
        display: inline-block;
        padding: 12px 25px;
        border-radius: 12px;
        text-decoration: none;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
    }

    .btn-primary {
        background-color: #27ae60;
        color: white;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #219653;
        box-shadow: 0 4px 15px rgba(33, 150, 83, 0.3);
    }

    .btn-secondary {
        background-color: #7f8c8d;
        color: white;
        margin-top: 15px;
    }

    .btn-secondary:hover {
        background-color: #6c757d;
        box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .checkout-container {
            width: 95%;
            padding: 20px;
        }

        h1 {
            font-size: 28px;
        }

        .form-control {
            padding: 10px;
            font-size: 14px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .checkout-container {
            padding: 15px;
        }

        h1 {
            font-size: 24px;
        }

        .form-control {
            font-size: 13px;
        }

        .btn {
            padding: 8px 15px;
        }
    }
</style>

<div class="checkout-container">
    <h1>Thông Tin Thanh toán</h1>

    <form method="POST" action="/Product/processCheckout" id="checkoutForm">
        <div class="form-group">
            <label for="name">Họ tên:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <textarea id="address" name="address" class="form-control" required></textarea>
        </div>
        <input type="hidden" name="checkoutItems" id="checkoutItems">
        <button type="submit" class="btn btn-primary">Thanh toán</button>
    </form>

    <a href="/Product/cart" class="btn btn-secondary mt-2">Quay lại giỏ hàng</a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('checkoutForm');
    const checkoutItemsInput = document.getElementById('checkoutItems');

    form.addEventListener('submit', function(e) {
        // Lấy dữ liệu từ sessionStorage
        const checkoutItems = sessionStorage.getItem('checkoutItems');
        if (!checkoutItems) {
            e.preventDefault();
            alert('Không tìm thấy thông tin giỏ hàng. Vui lòng thử lại.');
            window.location.href = '/Product/cart';
            return;
        }

        // Gán dữ liệu vào input hidden
        checkoutItemsInput.value = checkoutItems;
    });
});
</script>

<?php include 'app/views/shares/footer.php'; ?>