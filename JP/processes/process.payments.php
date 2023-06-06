<?php
include '../classes/class.payments.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'payments':
        create_new_payments();
	break;
    case 'update':
        update_payments();
	break;
}

function create_new_payments(){
	$payment = new Payments();
    $payment_ID = ucwords($_POST['payment_ID']);
    $FName = ucwords($_POST['FName']);
    $LName = ucwords($_POST['LName']);
    $AmountDue = ucwords($_POST['AmountDue']);
    $payment_status = ucwords($_POST['payment_status']);
    
    
    
    $result = $payment->create_new_payments($payment_ID,$FName,$LName,$AmountDue, $payment_status);
    if($result){
        $payment_ID = $payment->get_payment_ID($payment_ID);
        header('location: ../index.php?page=payments&subpage=view');
    }
}

function update_payments(){
	$payment = new Payments();
    $payment_ID = ucwords($_POST['payment_ID']);
    $FName = ucwords($_POST['FName']);
    $LName = ucwords($_POST['LName']);
    $AmountDue = ucwords($_POST['AmountDue']);
    $payment_status = ucwords($_POST['payment_status']);
    
    
   
   
    $result = $payment->update_payments($payment_ID,$FName,$LName,$AmountDue, $payment_status);
    if($result){
        header('location: ../index.php?page=payments&subpage=view');
    }
}