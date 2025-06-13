<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location: LoginPage.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forklift Simulator</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="ForkliftFormCSS.css">
   <?php include 'header.php'; ?>

</head>
<body>
    <header>
        <h2><?php echo "Hello " . $_SESSION['username']; ?></h2>
        <h1>Welcome to Forklift Simulator</h1>
    </header>
    <main>
        <button class="open-popup-btn" onclick="document.getElementById('popupForm').style.display='block'">Add New Forklift</button>
        <div id="popupForm" class="popup-form">
            <form action="ForkliftSubmissionProcessor.php" method="post">
                <input type="text" id="ForkliftModel" name="Model" placeholder="Model" 
                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Model'" class="full-width-input"/>

                <select id="Manufacturer" name="Manufacturer" class="full-width-input" 
                
                    onfocus="this.style.color='black';" onblur="if(this.value==''){this.style.color='gray';}">                    <?php
                    $DBAccessor = new DBAccessor();
                    $manufacturers = $DBAccessor->getAllManufacturers();
                    foreach ($manufacturers as $manufacturer) {
                        echo '<option value="' . htmlspecialchars($manufacturer).'">' . htmlspecialchars($manufacturer).'</option>';
                    }
                    ?>
                </select>

                <div class="input-with-unit">
                    <input type="number" id="liftCapacity" name="liftCapacity" placeholder="Lift Capacity" min="3000" max="75000" step="1000" 
                        class="full-width-input" onfocus="this.placeholder = ''" 
                        onblur="this.placeholder = 'Lift Capacity'; this.value = Math.round(this.value / 1000) * 1000"/>
                    <span>lbs</span>
                </div>

                <div class="input-with-unit">
                    <input type="number" id="liftHeight" name="liftHeight" placeholder="Lift Height" min="8" max="40"
                        class="full-width-input" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lift Height';"/>
                    <span>Ft</span>
                </div>
                <input type="submit" id="Button" value="Submit">
            </form>
            <button class="close-popup-btn" onclick="document.getElementById('popupForm').style.display='none'">Close</button>
        </div>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
