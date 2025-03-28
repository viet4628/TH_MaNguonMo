<?php
class SessionHelper {
    public static function start() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isLoggedIn() {
        return isset($_SESSION['username']) && !empty($_SESSION['username']);
    }

    public static function isAdmin() {
        return isset($_SESSION['username']) && isset($_SESSION['role']) && 
               $_SESSION['role'] === 'admin' && !empty($_SESSION['username']);
    }

    public static function getRole() {
        return $_SESSION['role'] ?? 'guest';
    }

    public static function hasRole($role) {
        return isset($_SESSION['role']) && $_SESSION['role'] === $role;
    }

    public static function requireLogin() {
        if (!self::isLoggedIn()) {
            $_SESSION['redirect_after_login'] = $_SERVER['REQUEST_URI'];
            header('Location: /account/login');
            exit();
        }
    }
}
?>

