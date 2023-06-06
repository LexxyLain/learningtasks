<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'classes/class.rooms.php';
include_once 'config/config.php';




$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

?>
<!DOCTYPE html>
<html>
<head>
    <title>JP 227 RESIDENCES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css?<?php echo time();?>">
</head>
<center><img class="logoD" src="logo.png" width="500" height="250"></center>
<body>

    <div id="header">
    </div>
    <div class="nav">
            <a href= "dashboard.php"> Dashboard </a>
            <a href = 'rooms.php'> Rooms </a></li>
            <a href = "tenants.php">Tenants </a></li>
            <a href = "payments.php"> Payments </a></li>
            <a href="users.php">Users</a></li>
            <a href="logout.php">Logout</a></li>
          
        </div>
    
  
</div>

</body>
</html>