<?php include 'app/views/shares/header.php'; ?>

<style>
    .orders-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .orders-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .orders-header h1 {
        color: var(--secondary-color);
        font-size: 28px;
        margin-bottom: 10px;
    }

    .orders-list {
        width: 100%;
    }

    .order-item {
        border: 1px solid #eee;
        border-radius: 8px;
        margin-bottom: 20px;
        overflow: hidden;
    }

    .order-header {
        background-color: #f8f9fa;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #eee;
    }

    .order-id {
        font-weight: 500;
        color: var(--secondary-color);
    }

    .order-date {
        color: #6c757d;
        font-size: 14px;
    }

    .order-status {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
    }

    .status-pending {
        background-color: #fff3cd;
        color: #856404;
    }

    .status-processing {
        background-color: #cce5ff;
        color: #004085;
    }

    .status-completed {
        background-color: #d4edda;
        color: #155724;
    }

    .status-cancelled {
        background-color: #f8d7da;
        color: #721c24;
    }

    .order-details {
        padding: 20px;
    }

    .product-list {
        margin-bottom: 20px;
    }

    .product-item {
        display: flex;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }

    .product-item:last-child {
        border-bottom: none;
    }

    .product-image {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 4px;
        margin-right: 15px;
    }

    .product-info {
        flex: 1;
    }

    .product-name {
        font-weight: 500;
        margin-bottom: 5px;
        color: var(--secondary-color);
    }

    .product-price {
        color: #6c757d;
        font-size: 14px;
    }

    .product-quantity {
        margin-left: 20px;
        color: #6c757d;
    }

    .order-total {
        text-align: right;
        padding-top: 15px;
        border-top: 1px solid #eee;
        font-weight: 500;
        font-size: 18px;
        color: var(--primary-color);
    }

    .no-orders {
        text-align: center;
        padding: 40px 20px;
        color: #6c757d;
    }

    .no-orders i {
        font-size: 48px;
        margin-bottom: 20px;
        color: #dee2e6;
    }

    @media (max-width: 768px) {
        .orders-container {
            margin: 20px;
            padding: 20px;
        }

        .orders-header h1 {
            font-size: 24px;
        }

        .order-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .product-item {
            flex-direction: column;
            text-align: center;
        }

        .product-image {
            margin-right: 0;
            margin-bottom: 10px;
        }

        .product-quantity {
            margin-left: 0;
            margin-top: 5px;
        }
    }
</style>

<div class="orders-container">
    <div class="orders-header">
        <h1>Đơn hàng của tôi</h1>
    </div>

    <?php if (empty($orders)): ?>
        <div class="no-orders">
            <i class="fas fa-shopping-bag"></i>
            <p>Bạn chưa có đơn hàng nào</p>
        </div>
    <?php else: ?>
        <div class="orders-list">
            <?php foreach ($orders as $order): ?>
                <div class="order-item">
                    <div class="order-header">
                        <span class="order-id">Đơn hàng #<?php echo $order->id; ?></span>
                        <span class="order-date"><?php echo date('d/m/Y H:i', strtotime($order->order_date)); ?></span>
                        <span class="order-status status-<?php echo strtolower($order->status); ?>">
                            <?php 
                            switch($order->status) {
                                case 'pending':
                                    echo 'Chờ xử lý';
                                    break;
                                case 'processing':
                                    echo 'Đang xử lý';
                                    break;
                                case 'completed':
                                    echo 'Hoàn thành';
                                    break;
                                case 'cancelled':
                                    echo 'Đã hủy';
                                    break;
                                default:
                                    echo $order->status;
                            }
                            ?>
                        </span>
                    </div>
                    <div class="order-details">
                        <div class="product-list">
                            <?php foreach ($order->products as $product): ?>
                                <div class="product-item">
                                    <img src="<?php echo $product->image; ?>" alt="<?php echo htmlspecialchars($product->name); ?>" class="product-image">
                                    <div class="product-info">
                                        <div class="product-name"><?php echo htmlspecialchars($product->name); ?></div>
                                        <div class="product-price"><?php echo number_format($product->price, 0, ',', '.'); ?> ₫</div>
                                    </div>
                                    <div class="product-quantity">x<?php echo $product->quantity; ?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="order-total">
                            Tổng cộng: <?php echo number_format($order->total, 0, ',', '.'); ?> ₫
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?> 