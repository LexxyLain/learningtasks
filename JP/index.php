<?php
/* include the class file (global - within application) */
include_once 'classes/class.user.php';
include_once 'config/config.php';
include_once 'classes/class.rooms.php';
include_once 'classes/class.tenants.php';
include_once 'classes/class.payments.php';


$page = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
$subpage = (isset($_GET['subpage']) && $_GET['subpage'] != '') ? $_GET['subpage'] : '';
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$id = (isset($_GET['id']) && $_GET['id'] != '') ? $_GET['id'] : '';

$user = new User();
$room = new Rooms();
$Tenants = new Tenants();
$payment_ID = new Payments();
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
            <a href= "index.php"> Dashboard </a>
            <a href = 'index.php?page=rooms'> Rooms </a></li>
            <a href = "index.php?page=tenants">Tenants </a></li>
            <a href = "index.php?page=payments"> Payments </a></li>
            <a href="index.php?page=users">Users</a></li>
            <a href="logout.php">Logout</a></li>
          
        </div>
        
        <?php 
      switch($page){
                case 'dashboard':
                    require_once 'dashboard-module/dashboard.php';
                break;
                case 'rooms':
                    require_once 'room-module/index.php';
                break;
                case 'tenants':
                    require_once 'tenants-module/index.php';
                break;
                case 'payments':
                    require_once 'payments-module/index.php';
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