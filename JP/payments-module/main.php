<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Amount Due</th>
        <th>Payment Status</th>
        
      </tr>
<?php
$count = 1;
$count = 1;
if($payment_ID->list_payments() != false){
foreach($payment_ID->list_payments() as $value){
   extract($value);
  
?>
     <tr>
          <td><a href="index.php?page=payments&subpage=update"><?php echo $count;?></td>
          <td><?php echo $FName;?></td>
          <td><?php echo $LName;?></td>
          <td><?php echo $AmountDue;?></td>
          <td><?php echo $payment_status;?></td>
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
    
    <div class="download-button">
			</form><form method="POST" action="reports/pdf-payments.php">
				<button><a><i class="fa fa-download"></i> PDF </a></button>
			</form>
		</div>
</div>
