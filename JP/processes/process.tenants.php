<?php
include '../classes/class.tenants.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'tenants':
        create_new_tenants();
	break;
    case 'update':
        update_tenants();
	break;
}

function create_new_tenants(){
	$Tenants = new Tenants();
    $RoomNumber = ($_POST['RoomNumber']);
    $FName = ucwords($_POST['FName']);
    $LName = ucwords($_POST['LName']);
    $HomeAddress = ucwords($_POST['HomeAddress']);
    $Age = ucwords($_POST['Age']);
    $Contact = ucwords($_POST['Contact']);

    
    
    
    $result = $Tenants->create_new_tenants( $RoomNumber, $FName ,$LName, $HomeAddress, $Age, $Contact);
    if($result){
        $ID = $Tenants->get_Tenant_ID($FName);
        header('location: ../index.php?page=tenants&subpage=view');
    }
}

function update_tenants(){
	$Tenants = new Tenants();
    $RoomNumber = ($_POST['RoomNumber']);
    $FName = ucwords($_POST['FName']);
    $LName = ucwords($_POST['LName']);
    $HomeAddress = ucwords($_POST['HomeAddress']);
    $Age = ucwords($_POST['Age']);
    $Contact = ucwords($_POST['Contact']);
   
   
    $result = $Tenants->update_tenants( $RoomNumber, $FName ,$LName, $HomeAddress, $Age, $Contact);
    if($result){
        header('location: ../index.php?page=tenants&subpage=view');
    }
}