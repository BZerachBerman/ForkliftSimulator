<?php
    session_start();
    //session_unset();
    if(!isset($_SESSION['username'])){
        header('Location: LoginPage.php');
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
    <?php
        echo "Hello " . htmlspecialchars($_SESSION['username']);
    ?>
</body>

<footer>
        <?php include 'footer.php'; ?>
</footer>

</html>