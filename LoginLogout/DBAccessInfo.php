<?php
class DBAccessor {
    // Properties
    public $host;
    public $DBName;
    public $DBUser;
    public $DBPassword;

    // Constructor
    function __construct() {
        $this->host = 'localhost';
        $this->DBName = 'forklifts';
        $this->DBUser = 'root';
        $this->DBPassword = '';
    }
    // Method
    function login($username, $password) {
        // Sanitize user input to prevent SQL injection
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        // Database connection details
        $host = $this->host;
        $DBName = $this->DBName;
        $DBUser = $this->DBUser;
        $DBPassword = $this->DBPassword;

        // Create a connection to the database
        $conn = new mysqli($host, $DBUser, $DBPassword, $DBName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM salesmen WHERE UserName = '$username' AND Password = '$password'";
        return $conn->query($sql);
        // Check connection
    
    }
}