<?php 

require_once "Database.php";

Class Members extends Database
    {
        public function createMembers($m_name, $m_email, $m_password){
            $query="INSERT INTO members (Name, Email, Password) VALUES (:name, :email, :password )";
            $stmt=$this->conn->prepare($query);
            $stmt->bindParam(":name", $m_name);
            $stmt->bindParam(":email", $m_email);
            $stmt->bindParam(":password", $m_password);
            $stmt->execute();

        }
        public function getAllUsers()
    {
        $query = "SELECT * FROM members WHERE is_delete=0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    }