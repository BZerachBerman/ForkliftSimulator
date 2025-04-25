<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:..\LoginLogout\LoginPage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forklift Simulator</title>
    <link rel="stylesheet" href="styles.css">
    <?php include 'header.php'; ?>
</head>
<body>
    <header>
        <h2><?php
        echo "Hello " . htmlspecialchars($_COOKIE['username']);?></h2>
        <h1>Welcome to Forklift Simulator</h1>
    </header>
    <main>
        <p>This is the client page for the Forklift Simulator.</p>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>