<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<ul>
<li><img src="..\StyleComponents\Forklift Simulator Image.jpeg" alt="Forklift Simulator"></li>
    <li><a href="..\WebPages\HomePage.php">HomePage</a></li>
    <li><a href="..\WebPages\VendorsPage.php">Vendors</a></li>
    <li><a href="..\WebPages\ClientPage.php">Clients</a></li>
    <li><a href="..\WebPages\ForkLiftPage.php">Forklifts</a></li>
    <?php
     // Assuming you have a variable that tracks login status
     if (isset($_SESSION['username'])) {
         // User is logged in
         echo '<li><a href="..\LoginLogout\logout.php">Logout</a></li>';
     } else {
         // User is not logged in
         echo '<li><a href="..\LoginLogout\LoginPage.php">Login</a></li>';
     }
     ?>
</ul>
</body>
</html>
