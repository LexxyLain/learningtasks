<?php
include_once '../classes/class.tenants.php';

$Tenants = new Tenants();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
        <th>ID</th>
        <th>Room Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Home Address</th>
        <th>Age</th>
        <th>Contact</th>
        
      </tr>';
$data = $Tenants->list_tenants_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$prod_name. '</li>';
        $hint .= '
        <tr>
        <td><a href="index.php?page=tenants&subpage=update">'.$count.'</td>
        <td>'.$RoomNumber. '</td>
        <td>'. $Fname.'</td>
        <td>'. $Lname.'</td>
        <td>'.$HomeAddress.'</td>
        <td>'. $Age.'</td>
        <td>'.$Contact.'</td>
      </tr>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>