<?php include 'app/views/shares/header.php'; ?>

<style>
    /* Container chính */
    .confirmation-container {
        width: 90%;
        max-width: 600px;
        margin: 40px auto;
        padding: 40px;
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Tiêu đề */
    h1 {
        font-size: 32px;
        color: #2c3e50;
        margin-bottom: 20px;
        font-weight: 700;
    }

    /* Thông báo */
    p {
        font-size: 18px;
        color: #34495e;
        margin-bottom: 30px;
    }

    /* Nút tiếp tục mua sắm */
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
    }

    .btn-primary:hover {
        background-color: #219653;
        box-shadow: 0 4px 15px rgba(33, 150, 83, 0.3);
    }

    /* Animation dấu tích */
    .checkmark-container {
        margin-bottom: 30px;
    }

    .checkmark {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: block;
        margin: 0 auto;
        position: relative;
        background: #27ae60;
        animation: scaleCheckmark 0.5s ease-in-out forwards;
    }

    .checkmark::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        width: 20px;
        height: 40px;
        border: solid white;
        border-width: 0 6px 6px 0;
        transform: translate(-50%, -60%) rotate(45deg) scale(0); /* Căn giữa và điều chỉnh vị trí */
        animation: drawCheckmark 0.5s ease-in-out 0.3s forwards;
    }

    /* Keyframes cho hiệu ứng */
    @keyframes scaleCheckmark {
        0% {
            transform: scale(0);
        }
        80% {
            transform: scale(1.2);
        }
        100% {
            transform: scale(1);
        }
    }

    @keyframes drawCheckmark {
        0% {
            transform: translate(-50%, -60%) rotate(45deg) scale(0);
        }
        100% {
            transform: translate(-50%, -60%) rotate(45deg) scale(1);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .confirmation-container {
            width: 95%;
            padding: 30px;
        }

        h1 {
            font-size: 28px;
        }

        p {
            font-size: 16px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 14px;
        }

        .checkmark {
            width: 60px;
            height: 60px;
        }

        .checkmark::after {
            width: 15px;
            height: 30px;
            border-width: 0 5px 5px 0;
        }
    }

    @media (max-width: 480px) {
        .confirmation-container {
            padding: 20px;
        }

        h1 {
            font-size: 24px;
        }

        p {
            font-size: 14px;
        }

        .btn {
            padding: 8px 15px;
            font-size: 13px;
        }

        .checkmark {
            width: 50px;
            height: 50px;
        }

        .checkmark::after {
            width: 12px;
            height: 25px;
            border-width: 0 4px 4px 0;
        }
    }
</style>

<div class="confirmation-container">
    <div class="checkmark-container">
        <span class="checkmark"></span>
    </div>
    <h1>Xác nhận đơn hàng</h1>
    <p>Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đã được xử lý thành công.</p>
    <a href="/Product" class="btn btn-primary mt-2">Tiếp tục mua sắm</a>
</div>

<?php include 'app/views/shares/footer.php'; ?>