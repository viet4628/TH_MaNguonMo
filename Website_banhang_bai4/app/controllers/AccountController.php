<?php
// Include required files
require_once 'app/config/database.php';
require_once 'app/models/AccountModel.php';
require_once 'app/models/OrderModel.php';
require_once 'app/helpers/SessionHelper.php';

class AccountController {
    private $accountModel;
    private $orderModel;
    private $db;

    // Constructor: Initialize database connection and AccountModel
    public function __construct($db) {
        $this->db = $db;
        $this->accountModel = new AccountModel($db);
        $this->orderModel = new OrderModel($db);
    }

    // Display registration form
    public function register() {
        include_once 'app/views/account/register.php';
    }

    // Display login form
    public function login() {
        include_once 'app/views/account/login.php';
    }

    // Handle registration form submission
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve form data
            $username = $_POST['username'] ?? '';
            $fullName = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
            $role = $_POST['role'] ?? 'user';

            // Validation
            $errors = [];
            if (empty($username)) {
                $errors['username'] = "Vui lòng nhập username!";
            }
            if (empty($fullName)) {
                $errors['fullname'] = "Vui lòng nhập fullname!";
            }
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập password!";
            }
            if ($password != $confirmPassword) {
                $errors['confirmPass'] = "Mật khẩu và xác nhận chưa khớp!";
            }
            if (!in_array($role, ['admin', 'user'])) {
                $role = 'user';
            }
            if ($this->accountModel->getAccountByUsername($username)) {
                $errors['account'] = "Tài khoản này đã được đăng ký!";
            }

            // Handle validation result
            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                $result = $this->accountModel->save($username, $fullName, $password, $role);
                if ($result) {
                    header('Location: /account/login');
                    exit;
                }
            }
        }
    }

    // Handle user logout
    public function logout() {
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        header('Location: /product');
        exit;
    }

    // Handle login form submission
    public function checkLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieve form data
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Check credentials
            $account = $this->accountModel->getAccountByUsername($username);
            if ($account && password_verify($password, $account->password)) {
                session_start();
                if (!isset($_SESSION['username'])) {
                    $_SESSION['username'] = $account->username;
                    $_SESSION['role'] = $account->role;
                }
                header('Location: /product');
                exit;
            } else {
                $error = $account ? "Mật khẩu không đúng!" : "Không tìm thấy tài khoản!";
                include_once 'app/views/account/login.php';
                exit;
            }
        }
    }

    public function profile() {
        if (!SessionHelper::isLoggedIn()) {
            header('Location: /account/login');
            exit;
        }

        $username = $_SESSION['username'];
        $userInfo = $this->accountModel->getUserInfo($username);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'] ?? '';
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword = !empty($_POST['new_password']) ? $_POST['new_password'] : null;

            if ($this->accountModel->updateUserInfo($username, $fullname, $currentPassword, $newPassword)) {
                $_SESSION['success_message'] = 'Thông tin đã được cập nhật thành công!';
            } else {
                $_SESSION['error_message'] = 'Mật khẩu hiện tại không đúng!';
            }
            header('Location: /account/profile');
            exit;
        }

        include 'app/views/account/profile.php';
    }

    public function orders() {
        if (!SessionHelper::isLoggedIn()) {
            header('Location: /account/login');
            exit;
        }

        $username = $_SESSION['username'];
        $userInfo = $this->accountModel->getUserInfo($username);
        $orders = $this->orderModel->getOrdersByUser($userInfo->id);

        include 'app/views/account/orders.php';
    }

    public function orderDetail($orderId) {
        if (!SessionHelper::isLoggedIn()) {
            header('Location: /account/login');
            exit;
        }

        $username = $_SESSION['username'];
        $userInfo = $this->accountModel->getUserInfo($username);
        $orderDetails = $this->orderModel->getOrderDetails($orderId);

        include 'app/views/account/order_detail.php';
    }
}
?>