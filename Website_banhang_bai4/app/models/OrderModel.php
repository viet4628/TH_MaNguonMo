<?php
class OrderModel {
    private $conn;
    private $table_name = "orders";
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getOrdersByUser($accountId) {
        $query = "SELECT DISTINCT o.id as order_id,
                    GROUP_CONCAT(CONCAT(p.name, '|', od.quantity, '|', od.price, '|', p.image) SEPARATOR '||') as products,
                    SUM(od.quantity * od.price) as total,
                    o.created_at as order_date
                 FROM orders o
                 INNER JOIN order_details od ON o.id = od.order_id
                 INNER JOIN product p ON od.product_id = p.id
                 WHERE o.account_id = :account_id
                 GROUP BY o.id
                 ORDER BY o.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":account_id", $accountId);
        $stmt->execute();
        $orders = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $order = new stdClass();
            $order->id = $row['order_id'];
            $order->order_date = $row['order_date'];
            $order->total = $row['total'];
           
            // Parse products string into array of objects
            $products = [];
            if (!empty($row['products'])) {
                $productStrings = explode('||', $row['products']);
                foreach ($productStrings as $productString) {
                    list($name, $quantity, $price, $image) = explode('|', $productString);
                    $product = new stdClass();
                    $product->name = $name;
                    $product->quantity = $quantity;
                    $product->price = $price;
                    $product->image = $image;
                    $products[] = $product;
                }
            }
            $order->products = $products;
            $orders[] = $order;
        }
        return $orders;
    }
    
    public function getOrderDetails($orderId) {
        $query = "SELECT o.id as order_id,
                    GROUP_CONCAT(CONCAT(p.name, '|', od.quantity, '|', od.price, '|', p.image) SEPARATOR '||') as products,
                    SUM(od.quantity * od.price) as total,
                    o.created_at as order_date,
                    COALESCE(o.status, 'Đang xử lý') as status
                 FROM orders o
                 INNER JOIN order_details od ON o.id = od.order_id
                 INNER JOIN product p ON od.product_id = p.id
                 WHERE o.id = :order_id
                 GROUP BY o.id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":order_id", $orderId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $order = new stdClass();
            $order->id = $row['order_id'];
            $order->order_date = $row['order_date'];
            $order->total = $row['total'];
            $order->status = $row['status'];
           
            // Parse products string into array of objects
            $products = [];
            if (!empty($row['products'])) {
                $productStrings = explode('||', $row['products']);
                foreach ($productStrings as $productString) {
                    list($name, $quantity, $price, $image) = explode('|', $productString);
                    $product = new stdClass();
                    $product->name = $name;
                    $product->quantity = $quantity;
                    $product->price = $price;
                    $product->image = $image;
                    $products[] = $product;
                }
            }
            $order->products = $products;
            return $order;
        }
        return null;
    }
}