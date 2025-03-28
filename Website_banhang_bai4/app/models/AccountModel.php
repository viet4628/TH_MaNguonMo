<?php
class AccountModel {
private $conn;
private $table_name = "account";
public function __construct($db) {
$this->conn = $db;
}
public function getUserInfo($username) {
    $query = "SELECT id, username, fullname, role FROM " . $this->table_name . " WHERE username = :username";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}
public function getAccountByUsername($username) {
    $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}
public function updateUserInfo($username, $fullname, $currentPassword, $newPassword = null) {
    // Verify current password first
    $query = "SELECT password FROM " . $this->table_name . " WHERE username = :username";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$user || !password_verify($currentPassword, $user->password)) {
        return false;
    }

    // Update user information
    if ($newPassword) {
        $query = "UPDATE " . $this->table_name . " 
                 SET fullname = :fullname, password = :password 
                 WHERE username = :username";
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":password", $hashedPassword);
    } else {
        $query = "UPDATE " . $this->table_name . " 
                 SET fullname = :fullname 
                 WHERE username = :username";
    }

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":fullname", $fullname);
    $stmt->bindParam(":username", $username);
    
    return $stmt->execute();
}

public function save($username, $fullName, $password, $role = 'user') {
    try {
        $query = "INSERT INTO " . $this->table_name . " (username, fullname, password, role) VALUES (:username, :fullname, :password, :role)";
        
        $stmt = $this->conn->prepare($query);
        
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Bind parameters
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":fullname", $fullName);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->bindParam(":role", $role);
        
        // Execute the query
        return $stmt->execute();
    } catch (PDOException $e) {
        // Handle any database errors
        error_log("Error saving account: " . $e->getMessage());
        return false;
    }
}
}
?>