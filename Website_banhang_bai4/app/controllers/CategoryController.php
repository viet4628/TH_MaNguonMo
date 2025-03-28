<?php
require_once 'app/config/database.php';
require_once 'app/models/CategoryModel.php';
require_once 'app/helpers/SessionHelper.php';

class CategoryController {
    private $categoryModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->categoryModel = new CategoryModel($this->db);
    }

    // Kiểm tra quyền Admin
    private function isAdmin() {
        return SessionHelper::isAdmin();
    }

    // Hiển thị danh sách sản phẩm theo danh mục (nếu cần)
    public function list_product() {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/product/list.php';
    }

    // Hiển thị danh sách danh mục
    public function list_Category() {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/Category/list.php';
    }

    // Thêm danh mục mới (chỉ Admin)
    public function add() {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        include 'app/views/Category/add.php';
    }

    // Lưu danh mục mới (chỉ Admin)
    public function save() {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            if (empty($name)) {
                $errors = ['Tên danh mục không được để trống!'];
                include 'app/views/Category/add.php';
                return;
            }

            $result = $this->categoryModel->addCategory($name, $description);
            if ($result) {
                header('Location: /Category/list_Category');
            } else {
                $errors = ['Có lỗi xảy ra khi thêm danh mục!'];
                include 'app/views/Category/add.php';
            }
        }
    }

    // Sửa danh mục (chỉ Admin)
    public function edit($id) {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/Category/edit.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }

    // Cập nhật danh mục (chỉ Admin)
    public function update() {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? '';
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';

            if (empty($name)) {
                $errors = ['Tên danh mục không được để trống!'];
                $category = $this->categoryModel->getCategoryById($id);
                include 'app/views/Category/edit.php';
                return;
            }

            $result = $this->categoryModel->updateCategory($id, $name, $description);
            if ($result) {
                header('Location: /Category/list_Category');
            } else {
                $errors = ['Có lỗi xảy ra khi cập nhật danh mục!'];
                $category = $this->categoryModel->getCategoryById($id);
                include 'app/views/Category/edit.php';
            }
        }
    }

    // Xóa danh mục (chỉ Admin)
    public function delete($id) {
        if (!$this->isAdmin()) {
            echo "Bạn không có quyền truy cập chức năng này!";
            exit;
        }
        $result = $this->categoryModel->deleteCategory($id);
        if ($result) {
            header('Location: /Category/list_Category');
        } else {
            echo "Có lỗi xảy ra khi xóa danh mục!";
        }
    }

    // Xem chi tiết danh mục (mở cho tất cả)
    public function show($id) {
        $category = $this->categoryModel->getCategoryById($id);
        if ($category) {
            include 'app/views/Category/show.php';
        } else {
            echo "Không tìm thấy danh mục.";
        }
    }
}
?>