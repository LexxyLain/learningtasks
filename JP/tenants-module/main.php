<a><input type="text" id="search" name="search" onkeyup="(this.value)"></a>
	
    
<a><center>Search <input type= "text" id ="search" name="search" onkeyup="showResults(this.value)"> </center></a>
<span id="search-result">
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>ID</th>
        <th>Room Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Home Address</th>
        <th>Age</th>
        <th>Contact</th>
        
      </tr>
<?php
$count = 1;
$count = 1;
if($Tenants->list_tenants() != false){
foreach($Tenants->list_tenants() as $value){
   extract($value);
  
?>
     <tr>
          <td><a href="index.php?page=tenants&subpage=update"><?php echo $count;?></td>
          <td><?php echo $RoomNumber;?></td>
          <td><?php echo $Fname;?></td>
          <td><?php echo $Lname;?></td>
          <td><?php echo $HomeAddress;?></td>
          <td><?php echo $Age;?></td>
          <td><?php echo $Contact;?></td>
        </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "";
}
?>
    </table>
</div>
</span>