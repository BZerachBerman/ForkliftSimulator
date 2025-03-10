<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //TODO implement credentials check in a database
    $real_username = 'Bob';
    $real_password = '101';

    // Check credentials
    if ($username !== $real_username || $password !== $real_password) {
        // Redirect with an error message
        header('location: login.php?error=invalid_credentials');
        exit();
    }

    // Set session variables after successful login
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = true;
    // Set a cookie that stores the username
    setcookie('username', $username);
    // Redirect to a different page after successful login
    header('location: HomePage.php');
    exit();
}
?>