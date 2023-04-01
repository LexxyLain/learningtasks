<?php
include '../classes/class.rooms.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'room':
        create_new_rooms();
	break;
    case 'update':
        update_rooms();
	break;
}

function create_new_rooms(){
	$room = new Rooms();
    $room_no = $_POST['room_no'];
    $room_price = ucwords($_POST['room_price']);
    $room_status = ucwords($_POST['room_status']);
    $room_vacancy = ucwords($_POST['room_vacancy']);
    
    
    
    $result = $room->create_new_rooms($room_no,$room_price,$room_status,$room_vacancy);
    if($result){
        $room_no = $room->get_room_no($room_no);
        header('location: ../index.php?page=settings&subpage=rooms&action=profile&id='.$room_no);
    }
}

function update_rooms(){
	$room = new Rooms();
    $room_no = $_POST['room_no'];
    $room_price = ucwords($_POST['room_price']);
    $room_status = ucwords($_POST['room_status']);
    $room_vacancy = ucwords($_POST['room_vacancy']);
   
   
    $result = $room->update_rooms($room_no,$room_price,$room_status,$room_vacancy);
    if($result){
        header('location: ../index.php?page=settings&subpage=room&action=profile&id='.$room_no);
    }
}