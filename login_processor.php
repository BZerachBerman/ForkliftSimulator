<?php
require_once 'DBAccessInfo.php';
session_start();

$DBAccessInfo = new DBAccessor();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $DBLoginObject = new DBAccessor();
    $result = $DBLoginObject->login($username, $password);

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
        header('location: LoginPage.php');
    }
    $conn->close();
    exit();
}
?>