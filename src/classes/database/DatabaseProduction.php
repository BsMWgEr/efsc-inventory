<?php

 class Database {
    //Created by Aaron C. 09/19/2024 Finished 09/20/2024
    // will need database info to assign variables

     private $dbName;
     private $user;
     private $password;
     private $host;
     private $port;
     public $conn;

     public function __construct() {
         $this->dbName = getenv("MYSQL_DATABASE");
         $this->user = getenv("MYSQL_USER");
         $this->password = getenv("MYSQL_PASSWORD");
         $this->host = getenv("MYSQL_HOST");
         $this->port = getenv("MYSQL_PORT");
     }

    public function getConnection(){
        $this -> conn = null;

        try {
            // Add port to the DSN connection string
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbName}";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            return null;
        }
        return $this->conn;
    }

     public function closeDB() {
         $this->conn = null;  // Closes the database connection by setting it to null
         echo "🔒 Database connection closed.";
     }
 }
?>