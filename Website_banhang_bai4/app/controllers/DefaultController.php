<?php
class DefaultController {
    public function index() {
        // Load view tương ứng (file giao diện bạn đã gửi)
        require_once 'app/views/home/index.php';
    }
}