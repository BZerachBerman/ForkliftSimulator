<?php
    session_start();
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
    
    <button onclick="document.getElementById('popupForm').style.display='block'">Enter Forklift Information</button>
    <div id="popupForm" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%);">
        <form action="submit.php" method="post">
    
            <input type="text" id="Forklift Model" name="Model" placeholder="Model" 
             onfocus="this.placeholder = ''" onblur="this.placeholder = 'Model'"
             style="width: 100%;"/>
    
            <select id="Manufacturer" name="Manufacturer" style="width: 100%;" onfocus="this.style.color='black';" onblur="if(this.value==''){this.style.color='gray';}">
                <option value="" disabled selected style="color: gray;">Manufacturer</option>
                <option value="Toyota">Toyota</option>
                <option value="Caterpillar">Caterpillar</option>
                <option value="Hyster">Hyster</option>
                <option value="Komatsu">Komatsu</option>
                <option value="Mitsubishi">Mitsubishi</option>
            </select>
    
            <div style="display: flex; align-items: center;">
                <input type="number" id="liftCapacity" name="liftCapacity" placeholder="Lift Capacity" min="3000" max="75000" step="1000" 
                style="width: 100%;" onfocus="this.placeholder = ''" 
                onblur="this.placeholder = 'Lift Capacity'; this.value = Math.round(this.value / 1000) * 1000"/>
                <span style="margin-left: 5px;">lbs</span>
            </div>
            
            <div style="display: flex; align-items: center;">
                <input type="number" id="liftHeight" name="liftHeight" placeholder="Lift Height" min="8" max="40"
                style="width: 100%;" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lift Height';"/>
                <span style="margin-left: 5px;">Ft</span>
            </div>
            <input type="submit" id="Button" value="Submit">
        </form>
        <button onclick="document.getElementById('popupForm').style.display='none'">Close</button>
    </div>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>