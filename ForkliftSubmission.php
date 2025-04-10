<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
    <?php
        echo"<h1>Thank you for submitting your forklift information!</h1>";
        echo"<h2>Model: ".$_POST["Model"]."</h2>";
        echo "<h2>Manufacturer: ".$_POST["Manufacturer"]."</h2>";
        echo "<h2>Lift Capacity: ".$_POST["liftCapacity"]."</h2>";
        echo "<h2>Lift Height: ".$_POST["liftHeight"]."</h2>";
        ?>
</body>
</html>