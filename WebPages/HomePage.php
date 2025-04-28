//TODO: Fix the DBAcess stuff. Get the login_process.php to work with the DBAccessComponents.

<?php
    session_start();
    //session_unset();
    if(!isset($_SESSION['username'])){
        header('Location: ..\LoginLogout\LoginPage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forklift Simulator</title>
    <link rel="stylesheet" href="..\StyleComponents\styles.css">
    <?php include '..\StyleComponents\header.php'; ?>
</head>

<body>
    <?php
        echo "Hello " . htmlspecialchars($_SESSION['username']);
    ?>
</body>

<footer>
        <?php include '..\StyleComponents\footer.php'; ?>
</footer>

</html>