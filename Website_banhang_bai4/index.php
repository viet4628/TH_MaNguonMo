<?php
require_once 'app/helpers/SessionHelper.php';
SessionHelper::start();

require_once 'app/config/database.php';
require_once 'app/models/ProductModel.php';

// Product/add
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Debug
error_log("Requested URL: " . $_SERVER['REQUEST_URI']);
error_log("Parsed URL: " . print_r($url, true));

// Kiểm tra phần đầu tiên của URL để xác định controller
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'DefaultController';

// Kiểm tra phần thứ hai của URL để xác định action
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// Debug
error_log("Controller: " . $controllerName);
error_log("Action: " . $action);

// Kiểm tra xem controller và action có tồn tại không
if (!file_exists('app/controllers/' . $controllerName . '.php')) {
    // Xử lý không tìm thấy controller
    die('Controller not found');
}

// Create database connection
$database = new Database();
$db = $database->getConnection();

require_once 'app/controllers/' . $controllerName . '.php';
$controller = new $controllerName($db);

if (!method_exists($controller, $action)) {
    // Xử lý không tìm thấy action
    die('Action not found');
}

// Kiểm tra session trước khi thực hiện action
if ($controllerName === 'ProductController' && $action === 'cart') {
    if (!SessionHelper::isLoggedIn()) {
        $_SESSION['redirect_after_login'] = '/Product/Cart';
        header('Location: /account/login');
        exit();
    }
}

// Gọi action với các tham số còn lại (nếu có)
call_user_func_array([$controller, $action], array_slice($url, 2));