<?php
require_once 'DBAccessInfo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DBAccessor = new DBAccessor();
    $model = $_POST['Model'];
    $manufacturer = $_POST['Manufacturer'];
    $liftCapacity = $_POST['liftCapacity'];
    $liftHeight = $_POST['liftHeight'];
    $serialNum = $_POST['serialNum'];

    // Validate inputs
    if (empty($model) || empty($manufacturer) || empty($liftCapacity) || empty($liftHeight) || empty($serialNum)) {
        die("All fields are required.");
    }

    // Add the new forklift to the database
    if ($DBAccessor->addNewForklift($model, $manufacturer, $liftCapacity, $liftHeight, $serialNum)) {
        echo '
                <h1>Thank you for submitting your forklift information!</h1>
                <h2>Model: ' . htmlspecialchars($model) . '</h2>
                <h2>Manufacturer: ' . htmlspecialchars($manufacturer) . '</h2>
                <h2>Lift Capacity: ' . htmlspecialchars($liftCapacity) . ' lbs</h2>
                <h2>Lift Height: ' . htmlspecialchars($liftHeight) . ' Ft</h2>
                <input type="button" value="Close" onclick="window.location.href=\'ForkLiftPage.php\'">';
    } else {
        die("Error adding forklift.");
    }
}