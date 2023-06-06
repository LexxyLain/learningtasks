<?php
include_once '../classes/class.rooms.php';

$rooms = new Rooms();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
<th>Room Number</th>
<th>Price</th>
<th>Status</th>
<th>Vacancy</th>
</tr>';
$data = $rooms->list_rooms_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$prod_name. '</li>';
        $hint .= '
        <tr>
        <td><a href="index.php?page=rooms&subpage=profile&id=">'.$room_no.'</td>
        <td>'.$room_price.'</td>
        <td>'.$room_status.'</td>
        <td>'.$room_vacancy.'</td>
      </tr>
        <tr>';
        $count++;
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>