<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'config/config.php';
include_once 'classes/class.rooms.php';

$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$room = new Rooms();
if(!$user->get_session()){
	header("location: login.php");
}
$user_id = $user->get_user_id($_SESSION['user_email']);
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
<body>

    <div id="header">
    </div>
    <div class="nav">
            <a href= "dashboard.php"> Dashboard </a>
            <a href = 'rooms.php'> Rooms </a></li>
            <a href = "tenants.php">Tenants </a></li>
            <a href = "payments.php"> Payments </a></li>
            <a href = "rent.php"> Rent </a></li>
            <a href = "repair.php"> Repair </a></li>
            <a href="users.php">Users</a></li>
            <a href="logout.php">Logout</a></li>
          
        </div>
        
        <?php 
      switch($page){
                case 'dashboard':
                    require_once 'dashboard-module/dashboard.php';
                break;
                case 'room':
                    require_once 'room-module/index.php';
                break;
                case 'tenants':
                    require_once 'tenants-module/index.php';
                break;
                case 'rent':
                    require_once 'rents-module/index.php';
                break;
                case 'repair':
                    require_once 'repair-module/index.php';
                break;
                case 'settings':
                    require_once 'settings-module/index.php';
                break; 
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
    
  
</div>

</body>
</html>