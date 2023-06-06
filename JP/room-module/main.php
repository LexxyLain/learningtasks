
<a><input type="text" id="search" name="search" onkeyup="(this.value)"></a>
	
    
  <a><center>Search <input type= "text" id ="search" name="search" onkeyup="showResults(this.value)"> </center></a>
  <span id="search-result">
    <div id="subcontent">
    <table id="data-list">
      <tr>
        <th>Room Number</th>
        <th>Price</th>
        <th>Status</th>
        <th>Vacancy</th>
      </tr>
<?php
$count = 1;
$count = 1;
if($room->list_rooms() != false){
foreach($room->list_rooms() as $value){
   extract($value);
  
?>
      <tr>
        <td><a href="index.php?page=rooms&subpage=profile&id="><?php echo $room_no;?> 
        <td><?php echo $room_price;?></a></td>
        <td><?php echo $room_status;?></td>
        <td><?php echo $room_vacancy;?></td>
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