<?php
require_once 'DBAccessInfo.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DBAccessor = new DBAccessor();
    $model = $_POST['Model'];
    $manufacturer = $_POST['Manufacturer'];
    $liftCapacity = $_POST['liftCapacity'];
    $liftHeight = $_POST['liftHeight'];

    // Validate inputs
    if (empty($model) || empty($manufacturer) || empty($liftCapacity) || empty($liftHeight)) {
        die("All fields are required.");
    }

    // Add the new forklift to the database
    if ($DBAccessor->addNewForklift($model, $manufacturer, $liftCapacity, $liftHeight)) {
        header('Location: ForkLiftPage.php?success=1');
    } else {
        die("Error adding forklift.");
    }
}