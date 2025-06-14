<?php
require_once 'DBAccessInfo.php';

if (!isset($_POST['username']) || !isset($_POST['password']) || !isset($_POST['confirm_password'])) {
    die('Please fill in all fields.');
}

if ($_POST['password'] !== $_POST['confirm_password']) {
    die('Passwords do not match.');
}
// Sanitize user input
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$DBRegistrator = new DBAccessor();

// // Create a connection to the database
// $conn = new mysqli($host, $DBUser, $DBPassword, $dbname);

// $sql = "INSERT INTO salesmen (UserName, Password, Role)
// VALUES ('$username', '$password2', 'Admin')";

if ($DBRegistrator->register($username, $password) === TRUE) {
    header("Location: ..\WebPages\HomePage.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
