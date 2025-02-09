<?php

    class Database
    {
        //Created by Aaron C. 09/19/2024 Finished 09/20/2024
        // will need database info to assign variables

        private $dbName = "inventory";
        private $user = "jmcgaha";
        private $password = "soccer";
        private $host = "localhost";
        private $port = "3306";
        public $conn;

        public function getConnection()
        {
            $this->conn = null;

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

        public function closeDB()
        {
            $this->conn = null;  // Closes the database connection by setting it to null
            echo "🔒 Database connection closed.";
        }
    }
?>