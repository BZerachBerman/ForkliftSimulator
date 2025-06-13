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
    }
    function register($username, $password) {
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
        // Insert the new user into the database
        $sql = "INSERT INTO salesmen (UserName, Password, Role) VALUES ('$username', '$password', 'Admin')";
        return $conn->query($sql);
    }
    function getUserRole($username) {
        // Sanitize user input to prevent SQL injection
        $username = htmlspecialchars($username);
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
        // Get the user's role from the database
        $sql = "SELECT Role FROM salesmen WHERE UserName = '$username'";
        return $conn->query($sql)->fetch_assoc()['Role'];
    }

    function getAllManufacturers() {
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
        // Get all manufacturers from the database
        $sql = "SELECT DISTINCT Manufacturer FROM forklift WHERE Manufacturer IS NOT NULL";
        $resultSet = $conn->query($sql);
        if ($resultSet === FALSE) {
            die("Error: " . $conn->error);
        }
        // Fetch all manufacturers into an array   
        $manufacturers = array();
        while ($row = $resultSet->fetch_assoc()) {
            $manufacturers[] = $row['Manufacturer'];
        }
        return $manufacturers;
    }

    function addNewForklift($model, $manufacturer, $liftCapacity, $liftHeight) {
        // Sanitize user input to prevent SQL injection
        $model = htmlspecialchars($model);
        $manufacturer = htmlspecialchars($manufacturer);
        $liftCapacity = htmlspecialchars($liftCapacity);
        $liftHeight = htmlspecialchars($liftHeight);
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
        // Insert the new forklift into the database
        $sql = "INSERT INTO forklift (Model, Manufacturer, LiftCapacity, LiftHeight) VALUES ('$model', '$manufacturer', '$liftCapacity', '$liftHeight')";
        return $conn->query($sql);
    }
}