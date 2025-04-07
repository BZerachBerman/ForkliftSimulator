<?php
    session_start();
    //session_unset();
    if(!isset($_SESSION['username'])){
        header('location:LoginPage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forklift Simulator</title>
    <?php include 'header.php'; ?>
</head>

<body>
    <?php
        echo "Hello " . htmlspecialchars($_COOKIE['username']);
    ?>
</body>

<footer>
        <?php include 'footer.php'; ?>
</footer>

</html>