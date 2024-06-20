<?php 
    class Database
    {
        private $userName="root";
        private $host="localhost";
        private $databaseName="phpcrud_db";
        private $password="";
        protected $conn;
        public function __construct()
        {
            try{
                $this->conn= new PDO("mysql::host={$this->host}; dbname={$this->databaseName}", $this->userName, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo "Connection Faield: " . $e->getMessage();            
            }
        }

        public function grtConnection()
        {
            return $this->conn;
        }
    }
