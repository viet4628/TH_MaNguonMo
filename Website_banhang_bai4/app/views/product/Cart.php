<?php include 'app/views/shares/header.php'; ?>

<style>
    /* Main Container */
    .cart-page {
        min-height: 100vh;
        background: linear-gradient(135deg, #f6f8fc 0%, #f1f5f9 100%);
        padding: 40px 20px;
        position: relative;
        overflow: hidden;
    }

    .cart-page::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 300px;
        background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 50%, #22c55e 100%);
        opacity: 0.1;
        z-index: 0;
    }

    .cart-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }

    /* Header Section */
    .cart-header {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }

    .cart-header h1 {
        font-size: 48px;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .cart-header h1::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 100px;
        height: 6px;
        background: linear-gradient(90deg, #4f46e5, #3b82f6, #22c55e);
        border-radius: 3px;
    }

    .cart-header p {
        font-size: 18px;
        color: #64748b;
        max-width: 600px;
        margin: 0 auto;
    }

    /* Cart Content */
    .cart-content {
        display: grid;
        grid-template-columns: 1fr 350px;
        gap: 30px;
        align-items: start;
    }

    /* Cart Items */
    .cart-items {
        background: white;
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .cart-item {
        display: grid;
        grid-template-columns: auto 1fr auto;
        gap: 25px;
        padding: 25px;
        background: #f8fafc;
        border-radius: 20px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        position: relative;
        border: 1px solid transparent;
    }

    .cart-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        border-color: rgba(79, 70, 229, 0.1);
    }

    .cart-item-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 16px;
        border: 2px solid #e5e7eb;
        padding: 5px;
        background: white;
        transition: all 0.3s ease;
    }

    .cart-item:hover .cart-item-image {
        transform: scale(1.05);
        border-color: #4f46e5;
    }

    .cart-item-info {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .cart-item-name {
        font-size: 20px;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    .cart-item:hover .cart-item-name {
        color: #4f46e5;
    }

    .cart-item-price {
        font-size: 24px;
        font-weight: 700;
        color: #dc2626;
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        padding: 8px 16px;
        border-radius: 12px;
        display: inline-block;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.1);
    }

    .cart-item-controls {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: flex-end;
        gap: 15px;
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 15px;
        background: white;
        padding: 8px 16px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .quantity-btn {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 10px;
        background: #4f46e5;
        color: white;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .quantity-btn:hover {
        background: #4338ca;
        transform: scale(1.1);
    }

    .quantity-btn:disabled {
        background: #94a3b8;
        cursor: not-allowed;
        transform: none;
    }

    .quantity-value {
        font-size: 18px;
        font-weight: 600;
        color: #1e293b;
        min-width: 24px;
        text-align: center;
    }

    .delete-btn {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 10px;
        background: #fef2f2;
        color: #ef4444;
        font-size: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .delete-btn:hover {
        background: #fee2e2;
        transform: scale(1.1) rotate(5deg);
    }

    /* Cart Summary */
    .cart-summary {
        background: white;
        border-radius: 24px;
        padding: 30px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 20px;
    }

    .summary-header {
        font-size: 24px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #f1f5f9;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        color: #64748b;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
        padding-top: 20px;
        border-top: 2px solid #f1f5f9;
        font-size: 20px;
        font-weight: 700;
        color: #1e293b;
    }

    .total-amount {
        color: #dc2626;
        font-size: 24px;
    }

    .cart-actions {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .btn {
        width: 100%;
        padding: 16px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        text-decoration: none;
    }

    .btn-primary {
        background: #4f46e5;
        color: white;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
    }

    .btn-primary:hover {
        background: #4338ca;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(79, 70, 229, 0.3);
    }

    .btn-secondary {
        background: #f1f5f9;
        color: #64748b;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .btn-secondary:hover {
        background: #e2e8f0;
        transform: translateY(-2px);
    }

    /* Empty Cart */
    .empty-cart {
        text-align: center;
        padding: 60px 30px;
        background: white;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
    }

    .empty-cart-icon {
        font-size: 80px;
        margin-bottom: 20px;
        animation: bounce 2s infinite;
    }

    .empty-cart-message {
        font-size: 24px;
        color: #64748b;
        margin-bottom: 30px;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .cart-content {
            grid-template-columns: 1fr;
        }

        .cart-summary {
            position: static;
        }
    }

    @media (max-width: 768px) {
        .cart-header h1 {
            font-size: 36px;
        }

        .cart-item {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .cart-item-image {
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }

        .cart-item-controls {
            flex-direction: row;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .cart-page {
            padding: 20px 10px;
        }

        .cart-header h1 {
            font-size: 32px;
        }

        .cart-items, .cart-summary {
            padding: 20px;
        }

        .cart-item {
            padding: 15px;
        }

        .cart-item-name {
            font-size: 18px;
        }

        .cart-item-price {
            font-size: 20px;
        }
    }
</style>

<div class="cart-page">
    <div class="cart-container">
        <div class="cart-header">
            <h1>Giỏ hàng</h1>
            <p>Kiểm tra và quản lý các sản phẩm trong giỏ hàng của bạn</p>
        </div>

        <div class="cart-content">
            <?php if (!empty($cart)): ?>
                <div class="cart-items">
                    <?php foreach ($cart as $id => $item): ?>
                        <div class="cart-item" data-id="<?php echo $id; ?>" data-price="<?php echo $item['price']; ?>">
                            <?php if ($item['image']): ?>
                                <img src="/<?php echo htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" class="cart-item-image">
                            <?php else: ?>
                                <img src="/uploads/default-image.jpg" alt="No image available" class="cart-item-image">
                            <?php endif; ?>
                            
                            <div class="cart-item-info">
                                <h3 class="cart-item-name"><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                <p class="cart-item-price"><?php echo number_format($item['price'], 0, ',', '.') . ' VND'; ?></p>
                            </div>

                            <div class="cart-item-controls">
                                <div class="quantity-control">
                                    <button class="quantity-btn" data-action="decrease" <?php echo $item['quantity'] <= 1 ? 'disabled' : ''; ?>>−</button>
                                    <span class="quantity-value"><?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    <button class="quantity-btn" data-action="increase">+</button>
                                </div>
                                <button class="delete-btn" data-id="<?php echo $id; ?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="cart-summary">
                    <h2 class="summary-header">Tổng quan đơn hàng</h2>
                    <div class="summary-item">
                        <span>Tạm tính</span>
                        <span id="subtotal-amount">0 VND</span>
                    </div>
                    <div class="summary-item">
                        <span>Phí vận chuyển</span>
                        <span>Miễn phí</span>
                    </div>
                    <div class="summary-total">
                        <span>Tổng cộng</span>
                        <span class="total-amount" id="total-amount">0 VND</span>
                    </div>
                    <div class="cart-actions">
                        <a href="/Product/checkout" class="btn btn-primary" id="checkout-btn">Thanh Toán</a>
                        <a href="/Product" class="btn btn-secondary">Tiếp tục mua sắm</a>
                    </div>
                </div>
            <?php else: ?>
                <div class="empty-cart">
                    <div class="empty-cart-icon">🛒</div>
                    <p class="empty-cart-message">Giỏ hàng của bạn đang trống</p>
                    <a href="/Product" class="btn btn-primary">Tiếp tục mua sắm</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quantityButtons = document.querySelectorAll('.quantity-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const totalAmountSpan = document.getElementById('total-amount');
    const subtotalAmountSpan = document.getElementById('subtotal-amount');
    const checkoutBtn = document.getElementById('checkout-btn');
    const cartContent = document.querySelector('.cart-content');

    // Thêm hàm hiển thị thông báo
    function showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        notification.textContent = message;
        document.body.appendChild(notification);

        // Thêm CSS cho notification
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 25px;
            border-radius: 8px;
            background: ${type === 'success' ? '#22c55e' : '#ef4444'};
            color: white;
            font-weight: 500;
            z-index: 1000;
            animation: slideIn 0.3s ease-out;
        `;

        // Xóa notification sau 3 giây
        setTimeout(() => {
            notification.style.animation = 'slideOut 0.3s ease-out';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Thêm keyframes cho animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    `;
    document.head.appendChild(style);

    function calculateTotal() {
        let total = 0;
        const cartItems = document.querySelectorAll('.cart-item');
        cartItems.forEach(item => {
            const price = parseFloat(item.getAttribute('data-price'));
            const quantity = parseInt(item.querySelector('.quantity-value').textContent);
            total += price * quantity;
        });
        
        const formattedTotal = total.toLocaleString('vi-VN') + ' VND';
        totalAmountSpan.textContent = formattedTotal;
        subtotalAmountSpan.textContent = formattedTotal;
    }

    function updateEmptyCart() {
        if (!document.querySelector('.cart-item')) {
            cartContent.innerHTML = `
                <div class="empty-cart">
                    <div class="empty-cart-icon">🛒</div>
                    <p class="empty-cart-message">Giỏ hàng của bạn đang trống</p>
                    <a href="/Product" class="btn btn-primary">Tiếp tục mua sắm</a>
                </div>
            `;
        }
    }

    quantityButtons.forEach(button => {
        button.addEventListener('click', function() {
            const cartItem = this.closest('.cart-item');
            const productId = cartItem.getAttribute('data-id');
            const action = this.getAttribute('data-action');
            const quantitySpan = cartItem.querySelector('.quantity-value');
            let quantity = parseInt(quantitySpan.textContent);

            if (action === 'increase') {
                quantity += 1;
            } else if (action === 'decrease' && quantity > 1) {
                quantity -= 1;
            }

            if (quantity <= 1) {
                cartItem.querySelector('[data-action="decrease"]').disabled = true;
            } else {
                cartItem.querySelector('[data-action="decrease"]').disabled = false;
            }
            quantitySpan.textContent = quantity;

            calculateTotal();

            fetch(`/Cart/update/${productId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: `action=${action}`
            })
            .then(response => response.json())
            .then(data => {
                if (!data.success) {
                    quantitySpan.textContent = data.originalQuantity;
                    calculateTotal();
                }
            })
            .catch(error => {
                console.error('Lỗi AJAX:', error);
                quantitySpan.textContent = data.originalQuantity || quantity;
                calculateTotal();
            });
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const cartItem = this.closest('.cart-item');
            const productName = cartItem.querySelector('.cart-item-name').textContent;

            if (confirm(`Bạn có chắc muốn xóa sản phẩm "${productName}" khỏi giỏ hàng?`)) {
                // Thêm loading state
                button.disabled = true;
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

                fetch(`/Product/removeFromCart/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Xóa phần tử khỏi DOM
                        cartItem.remove();
                        calculateTotal();
                        updateEmptyCart();
                        
                        // Cập nhật số lượng trong header
                        updateCartCount();
                        
                        showNotification('Đã xóa sản phẩm khỏi giỏ hàng');
                    } else {
                        showNotification(data.message || 'Có lỗi xảy ra khi xóa sản phẩm', 'error');
                    }
                })
                .catch(error => {
                    console.error('Lỗi AJAX:', error);
                    showNotification('Có lỗi xảy ra khi xóa sản phẩm', 'error');
                })
                .finally(() => {
                    // Khôi phục trạng thái nút
                    button.disabled = false;
                    button.innerHTML = '<i class="fas fa-trash"></i>';
                });
            }
        });
    });

    // Thêm hàm cập nhật số lượng trong header
    function updateCartCount() {
        const cartItems = document.querySelectorAll('.cart-item');
        const cartCount = cartItems.length;
        const cartBadge = document.querySelector('.cart-badge');
        
        if (cartCount > 0) {
            if (!cartBadge) {
                const cartButton = document.querySelector('.cart-button');
                const badge = document.createElement('span');
                badge.className = 'cart-badge';
                badge.textContent = cartCount;
                cartButton.appendChild(badge);
            } else {
                cartBadge.textContent = cartCount;
            }
        } else {
            if (cartBadge) {
                cartBadge.remove();
            }
        }
    }

    checkoutBtn.addEventListener('click', function(e) {
        e.preventDefault();
        const cartItems = document.querySelectorAll('.cart-item');
        const selectedItems = [];
        const selectedQuantities = {};

        cartItems.forEach(item => {
            const productId = item.getAttribute('data-id');
            const quantity = parseInt(item.querySelector('.quantity-value').textContent);
            selectedItems.push(productId);
            selectedQuantities[productId] = quantity;
        });

        if (selectedItems.length === 0) {
            alert('Vui lòng chọn ít nhất một sản phẩm để thanh toán!');
            return;
        }

        sessionStorage.setItem('checkoutItems', JSON.stringify({
            items: selectedItems,
            quantities: selectedQuantities
        }));

        window.location.href = '/Product/checkout';
    });

    calculateTotal();
});
</script>

<?php include 'app/views/shares/footer.php'; ?>