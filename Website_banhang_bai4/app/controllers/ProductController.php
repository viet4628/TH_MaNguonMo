<?php
require_once 'app/config/database.php';
require_once 'app/models/ProductModel.php';
require_once 'app/models/CategoryModel.php';
require_once 'app/helpers/SessionHelper.php';

class ProductController {
    private $productModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    // Kiểm tra quyền Admin
    private function isAdmin() {
        return SessionHelper::isAdmin();
    }

    // Tạo breadcrumb cho sản phẩm
    private function generateBreadcrumbs($product = null) {
        $breadcrumbs = [];
        
        // Thêm "Sản phẩm" vào breadcrumb
        $breadcrumbs[] = [
            'name' => 'Sản phẩm',
            'url' => '/Product'
        ];

        if ($product) {
            // Nếu có category, thêm vào breadcrumb
            if (!empty($product->category_name)) {
                $breadcrumbs[] = [
                    'name' => $product->category_name,
                    'url' => '/Product?category=' . $product->category_id
                ];
            }
            
            // Thêm tên sản phẩm vào breadcrumb
            $breadcrumbs[] = [
                'name' => $product->name,
                'url' => '/Product/show/' . $product->id
            ];
        }

        return $breadcrumbs;
    }

    // Hiển thị danh sách sản phẩm (mở cho tất cả)
    public function index() {
        // Lấy các tham số lọc từ URL
        $category = $_GET['category'] ?? null;
        $minPrice = $_GET['min_price'] ?? null;
        $maxPrice = $_GET['max_price'] ?? null;
        $sort = $_GET['sort'] ?? null;

        // Lấy danh sách sản phẩm với các bộ lọc
        $products = $this->productModel->getProducts($category, $minPrice, $maxPrice, $sort);
        $categories = (new CategoryModel($this->db))->getCategories();

        // Tạo breadcrumb
        $breadcrumbs = $this->generateBreadcrumbs();
        
        // Nếu đang lọc theo danh mục, thêm danh mục vào breadcrumb
        if ($category) {
            foreach ($categories as $cat) {
                if ($cat->id == $category) {
                    $breadcrumbs[] = [
                        'name' => $cat->name,
                        'url' => '/Product?category=' . $cat->id
                    ];
                    break;
                }
            }
        }

        include 'app/views/product/list.php';
    }

    // Xem chi tiết sản phẩm (mở cho tất cả)
    public function show($id) {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            // Tạo breadcrumb cho trang chi tiết sản phẩm
            $breadcrumbs = $this->generateBreadcrumbs($product);
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    // Thêm sản phẩm (chỉ Admin)
    public function add() {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        $categories = (new CategoryModel($this->db))->getCategories();
        include_once 'app/views/product/add.php';
    }

    // Lưu sản phẩm mới (chỉ Admin)
    public function save() {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;
            $image = (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
                ? $this->uploadImage($_FILES['image'])
                : "";
            $result = $this->productModel->addProduct($name, $description, $price, $category_id, $image);
            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /Product');
            }
        }
    }

    // Sửa sản phẩm (chỉ Admin)
    public function edit($id) {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        $product = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();
        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    // Cập nhật sản phẩm (chỉ Admin)
    public function update() {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';
            $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;
            $category_id = isset($_POST['category_id']) ? (int)$_POST['category_id'] : 0;
            $existing_image = isset($_POST['existing_image']) ? trim($_POST['existing_image']) : '';

            // Validate dữ liệu
            $errors = [];
            if (empty($name)) {
                $errors[] = "Tên sản phẩm không được để trống.";
            }
            if (empty($description)) {
                $errors[] = "Mô tả không được để trống.";
            }
            if ($price <= 0) {
                $errors[] = "Giá sản phẩm phải lớn hơn 0.";
            }
            if ($category_id <= 0) {
                $errors[] = "Vui lòng chọn danh mục.";
            }

            // Xử lý upload ảnh mới
            $image = $existing_image; // Mặc định giữ ảnh cũ
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $upload_result = $this->uploadImage($_FILES['image']);
                if ($upload_result) {
                    $image = $upload_result; // Cập nhật đường dẫn ảnh mới
                    // Xóa ảnh cũ nếu tồn tại
                    if ($existing_image && file_exists($_SERVER['DOCUMENT_ROOT'] . '/' . $existing_image)) {
                        unlink($_SERVER['DOCUMENT_ROOT'] . '/' . $existing_image);
                    }
                } else {
                    $errors[] = "Lỗi khi upload ảnh. Vui lòng kiểm tra định dạng và kích thước file.";
                }
            }

            // Nếu có lỗi, hiển thị lại form với thông báo lỗi
            if (!empty($errors)) {
                $product = (object)[
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'category_id' => $category_id,
                    'image' => $image
                ];
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/edit.php';
                return;
            }

            // Cập nhật sản phẩm vào cơ sở dữ liệu
            $edit = $this->productModel->updateProduct($id, $name, $description, $price, $category_id, $image);
            if ($edit) {
                header('Location: /Product');
                exit;
            } else {
                $errors[] = "Đã xảy ra lỗi khi lưu sản phẩm.";
                $product = (object)[
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'price' => $price,
                    'category_id' => $category_id,
                    'image' => $image
                ];
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/edit.php';
            }
        }
    }
    
    /**
     * Hàm upload ảnh
     * @param array $file Thông tin file ảnh từ $_FILES
     * @return string|bool Đường dẫn ảnh nếu thành công, false nếu thất bại
     */
    private function uploadImage($file) {
        // Tạo thư mục uploads nếu chưa tồn tại
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Kiểm tra lỗi upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return false;
        }

        // Kiểm tra định dạng file
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowed_types)) {
            return false;
        }

        // Kiểm tra kích thước file (5MB)
        if ($file['size'] > 5 * 1024 * 1024) {
            return false;
        }

        // Tạo tên file duy nhất
        $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $file_name = uniqid() . '_' . time() . '.' . $file_extension;
        $target_file = $target_dir . $file_name;

        // Upload file
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            return $target_file;
        }
        return false;
    }

    // Xóa sản phẩm (chỉ Admin)
    public function delete($id) {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        if ($this->productModel->deleteProduct($id)) {
            header('Location: /Product');
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }
    
    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($id) {
        SessionHelper::requireLogin();
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            echo "Không tìm thấy sản phẩm.";
            return;
        }
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $_SESSION['cart'][$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }
        header('Location: /Product/cart');
    }

    // Hiển thị giỏ hàng
    public function cart() {
        SessionHelper::requireLogin();
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        include 'app/views/product/cart.php';
    }

    // Cập nhật số lượng trong giỏ hàng qua AJAX
    public function updateCart($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? '';
            if (!isset($_SESSION['cart'][$id])) {
                echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
                return;
            }
            $quantity = $_SESSION['cart'][$id]['quantity'];
            if ($action === 'increase') {
                $quantity++;
            } elseif ($action === 'decrease' && $quantity > 1) {
                $quantity--;
            }
            $_SESSION['cart'][$id]['quantity'] = $quantity;
            echo json_encode([
                'success' => true,
                'quantity' => $quantity
            ]);
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng qua AJAX
    public function removeFromCart($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['cart'][$id])) {
                unset($_SESSION['cart'][$id]);
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại trong giỏ hàng']);
            }
        }
    }

    // Hiển thị trang thanh toán
    public function checkout() {
        include 'app/views/product/checkout.php';
    }

    // Xử lý thanh toán
    public function processCheckout() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Kiểm tra đăng nhập
            if (!SessionHelper::isLoggedIn()) {
                echo "Vui lòng đăng nhập để tiếp tục thanh toán.";
                return;
            }

            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                echo "Giỏ hàng trống.";
                return;
            }

            // Lấy thông tin sản phẩm từ session storage
            $checkoutItemsJson = $_POST['checkoutItems'] ?? '{}';
            $checkoutItems = json_decode($checkoutItemsJson, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                echo "Lỗi dữ liệu giỏ hàng: " . json_last_error_msg();
                return;
            }

            $selectedItems = $checkoutItems['items'] ?? array_keys($_SESSION['cart']);
            $selectedQuantities = $checkoutItems['quantities'] ?? [];

            if (empty($selectedItems)) {
                echo "Không có sản phẩm nào được chọn để thanh toán.";
                return;
            }

            $this->db->beginTransaction();
            try {
                // Lấy account_id từ session
                $account_id = $_SESSION['user_id'];

                // Thêm thông tin đơn hàng với account_id
                $query = "INSERT INTO orders (name, phone, address, account_id) VALUES (:name, :phone, :address, :account_id)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':account_id', $account_id);
                $stmt->execute();
                $order_id = $this->db->lastInsertId();

                // Thêm chi tiết đơn hàng với số lượng đã cập nhật
                foreach ($selectedItems as $product_id) {
                    if (!isset($_SESSION['cart'][$product_id])) continue;
                    
                    $item = $_SESSION['cart'][$product_id];
                    // Đảm bảo lấy số lượng từ selectedQuantities
                    $quantity = $selectedQuantities[$product_id];
                    
                    // Log để debug
                    error_log("Processing order for product $product_id with quantity $quantity");

                    $query = "INSERT INTO order_details (order_id, product_id, quantity, price) 
                             VALUES (:order_id, :product_id, :quantity, :price)";
                    $stmt = $this->db->prepare($query);
                    $stmt->bindParam(':order_id', $order_id);
                    $stmt->bindParam(':product_id', $product_id);
                    $stmt->bindParam(':quantity', $quantity);
                    $stmt->bindParam(':price', $item['price']);
                    $stmt->execute();
                }

                // Xóa các sản phẩm đã đặt hàng khỏi giỏ hàng
                foreach ($selectedItems as $product_id) {
                    if (isset($_SESSION['cart'][$product_id])) {
                        unset($_SESSION['cart'][$product_id]);
                    }
                }

                $this->db->commit();
                header('Location: /Product/orderConfirmation');
            } catch (Exception $e) {
                $this->db->rollBack();
                error_log("Order processing error: " . $e->getMessage());
                echo "Đã xảy ra lỗi khi xử lý đơn hàng: " . $e->getMessage();
            }
        }
    }

    // Hiển thị trang xác nhận đơn hàng
    public function orderConfirmation() {
        include 'app/views/product/orderConfirmation.php';
    }
}
?>