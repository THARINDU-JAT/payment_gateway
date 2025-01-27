<?php

define('DB_HOST','localhost');
define('DB_USER','root');  // Check this matches your actual MySQL user
define('DB_PASSWORD','');      // Verify this password
define('DB_DATABASE','coopinsu_online');    // Verify database exists

class DatabaseConnection
{
    private $conn;
    
    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        if($this->conn->connect_error)
        {
            die("Database Connection Failed: " . $this->conn->connect_error);
        }
    }

    // Add this getter method
    public function getConnection()
    {
        return $this->conn;
    }
}
?>