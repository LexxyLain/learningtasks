<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,$password);
	if($login){
		header("location: dashboard.php");
	}else if(empty($useremail)){
			header("Location: login.php?error=Username is required in this field");
			exit();
		}else if(empty($password)){
			header("Location: login.php?error=Incorrect Password");
			exit();
	}
	
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Assistant&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css?<?php echo time();?>">
</head>
<body>
<div id="brand-block">
<img src="logo.png" class="logo">
</div>
<div id="login-block">
<center>  <h2>LOGIN</h2></center>
	<form method="POST" action="" name="login">
	<div>
		<input type="email" class="input" required name="useremail" placeholder="Email or Username"/>
	</div>
	<div>
		<input type="password" class="input" required name="password" placeholder="Password"/>
	</div>
	<div>
		<button type="submit" value="Submit" input type="submit" name="submit">Login</button>
	</div>
	</form>
</div>
</body>
</html>