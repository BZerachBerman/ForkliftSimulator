<?php
session_start();
// Database connection details
$host = 'localhost';
$DBName = 'forklifts';
$DBUser = 'root';
$DBPassword = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize user input to prevent SQL injection
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    $conn = new mysqli($host, $DBUser, $DBPassword, $DBName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM salesmen WHERE UserName = '$username' AND Password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // User exists, set session variables
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        // Set a cookie that stores the username
        setcookie('username', $username);
        // Redirect to a different page after successful login
        header('location: HomePage.php');
    } else {
        // Invalid credentials, redirect back to login page with error message
        header('location: LoginPage.php?error=invalid_credentials');
    }
    $conn->close();
    exit();
}
?>