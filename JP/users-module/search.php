<?php
include_once '../classes/class.user.php';

$users = new User();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
        <th>#</th>
        <th>Name</th>
        <th>Access Level</th>
        <th>Email</th>
      </tr>';
$data = $users->list_users_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$prod_name. '</li>';
        $hint .= '
       <tr>
        <td>'.$count.'</td>
        <td><a href="index.php?page=settings&subpage=users&action=profile&id='.$user_id.'">'.$user_lastname.', '.$user_firstname.'</a></td>
        <td>'.$user_access.'</td>
        <td>'.$user_email.'</td>
      </tr>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>