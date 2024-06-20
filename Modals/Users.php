<?php
require_once "Database.php";

class Users extends Database
{
    public function createUsers($name, $email, $password)
    {
        $query = "INSERT INTO users (name,email,password) VALUES (:name1, :email1, :password1)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name1', $name);
        $stmt->bindParam(':email1', $email);
        $stmt->bindParam(':password1', $password);
        $stmt->execute();
    }

    public function getAllUsers()
    {
        $query = "SELECT * FROM users WHERE is_delete=0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $name, $email, $password)
    {
        $stmt = $this->conn->prepare("UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindparam(':password', $password);
        return $stmt->execute();
    }
    public function deleteUser($id)
    {
        $stmt = $this->conn->prepare("UPDATE users SET is_delete = 1 WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}