<?php

class ProductModel
 {
    private $conn;
    private $table_name = 'product';

    public function __construct( $db )
 {
        $this->conn = $db;
    }

    public function getProducts($category = null, $minPrice = null, $maxPrice = null, $sort = null)
    {
        $query = "SELECT p.id, p.name, p.description, p.price, p.image, c.name as category_name
                 FROM " . $this->table_name . " p
                 LEFT JOIN category c ON p.category_id = c.id
                 WHERE 1=1";

        $params = [];

        // Thêm điều kiện lọc theo danh mục
        if ($category) {
            $query .= " AND p.category_id = :category";
            $params[':category'] = $category;
        }

        // Thêm điều kiện lọc theo giá
        if ($minPrice) {
            $query .= " AND p.price >= :min_price";
            $params[':min_price'] = $minPrice;
        }
        if ($maxPrice) {
            $query .= " AND p.price <= :max_price";
            $params[':max_price'] = $maxPrice;
        }

        // Thêm điều kiện sắp xếp
        switch ($sort) {
            case 'price-asc':
                $query .= " ORDER BY p.price ASC";
                break;
            case 'price-desc':
                $query .= " ORDER BY p.price DESC";
                break;
            case 'name-asc':
                $query .= " ORDER BY p.name ASC";
                break;
            case 'name-desc':
                $query .= " ORDER BY p.name DESC";
                break;
            case 'newest':
            default:
                $query .= " ORDER BY p.id DESC";
                break;
        }

        $stmt = $this->conn->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getProductById( $id )
 {
        $query = "SELECT p.*, c.name as category_name
FROM " . $this->table_name . " p
LEFT JOIN category c ON p.category_id = c.id
WHERE p.id = :id";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam( ':id', $id );
        $stmt->execute();
        $result = $stmt->fetch( PDO::FETCH_OBJ );
        return $result;
    }

    public function addProduct( $name, $description, $price, $category_id, $image )
 {
        $errors = [];
        if ( empty( $name ) ) {
            $errors[ 'name' ] = 'Tên sản phẩm không được để trống';
        }
        if ( empty( $description ) ) {
            $errors[ 'description' ] = 'Mô tả không được để trống';
        }
        if ( !is_numeric( $price ) || $price < 0 ) {
            $errors[ 'price' ] = 'Giá sản phẩm không hợp lệ';
        }
        if ( count( $errors ) > 0 ) {
            return $errors;
        }
        $query = 'INSERT INTO ' . $this->table_name . " (name, description, price,
category_id, image) VALUES (:name, :description, :price, :category_id, :image)";
        $stmt = $this->conn->prepare( $query );
        $name = htmlspecialchars( strip_tags( $name ) );
        $description = htmlspecialchars( strip_tags( $description ) );
        $price = htmlspecialchars( strip_tags( $price ) );
        $category_id = htmlspecialchars( strip_tags( $category_id ) );
        $image = htmlspecialchars( strip_tags( $image ) );
        $stmt->bindParam( ':name', $name );
        $stmt->bindParam( ':description', $description );
        $stmt->bindParam( ':price', $price );
        $stmt->bindParam( ':category_id', $category_id );
        $stmt->bindParam( ':image', $image );
        if ( $stmt->execute() ) {
            return true;
        }
        return false;
    }

    public function updateProduct(
        $id,
        $name,
        $description,
        $price,
        $category_id,
        $image
    ) {
        $query = 'UPDATE ' . $this->table_name . " SET name=:name,
description=:description, price=:price, category_id=:category_id, image=:image WHERE
id=:id";
        $stmt = $this->conn->prepare( $query );
        $name = htmlspecialchars( strip_tags( $name ) );
        $description = htmlspecialchars( strip_tags( $description ) );
        $price = htmlspecialchars( strip_tags( $price ) );
        $category_id = htmlspecialchars( strip_tags( $category_id ) );
        $image = htmlspecialchars( strip_tags( $image ) );
        $stmt->bindParam( ':id', $id );
        $stmt->bindParam( ':name', $name );
        $stmt->bindParam( ':description', $description );
        $stmt->bindParam( ':price', $price );
        $stmt->bindParam( ':category_id', $category_id );
        $stmt->bindParam( ':image', $image );
        if ( $stmt->execute() ) {
            return true;
        }
        return false;
    }

    public function deleteProduct( $id )
 {
        $query = 'DELETE FROM ' . $this->table_name . ' WHERE id=:id';
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam( ':id', $id );
        if ( $stmt->execute() ) {
            return true;
        }
        return false;
    }
}