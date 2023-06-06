<?php
include_once 'classes/class.tenants.php';
include_once 'config/config.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$Tenants = new Tenants();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
        <title> Tenants </title>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
    </head>
    <body>
    <br>
    <div id="second-submenu">
    <a href="index.php?page=tenants&subpage=tenants">Tenants</a> |
    <a href="">Update</a> |
    <a href="index.php?page=tenants">View</a>
    </div>
    <body>
</div>
        <div class="nav">
            <a href= "dashboard.php"> Dashboard </a>
            <a href = "rooms.php"> Rooms </a></li>
            <a href = "tenants.php">Tenants </a></li>
            <a href = "payments.php"> Payments </a></li>
            <a href = "users.php"> Users </a></li>
            <a href="logout.php">Logout</a></li>
        
        </div>
        <?php
      
      switch($subpage){
                case 'tenants':
                    require_once 'tenants-module/index.php';
                break; 
                
                case 'module_xxx':
                    require_once 'module-folder/';
                break;
                default:
                    require_once 'main.php';
                break; 
      }
    ?>
    
        </div>
    </body>
</html>