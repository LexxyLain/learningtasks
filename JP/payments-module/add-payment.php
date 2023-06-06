<div id="form-block">
    <form method="POST" action="processes/process.payments.php?action=payments">
        <div id="form-block-half">

            <label for="FName">First Name</label>
            <input type="text" id="FName" class="input" required name="FName" placeholder="Enter first name..">

            <label for="LName">Last Name</label>
            <input type="text" id="LName" class="input" required name="LName" placeholder="Enter last name..">

            <label for="AmountDue">Amount Due</label>
            <input type="number" id="AmountDue" class="input" required name="AmountDue" placeholder="Enter Amount..">

</div>

<div id="form-block-half">

            <label for="payment_status">Payment Status</label>
            <select id="payment_status" required name="payment_status">
              <option value="Paid">Paid</option>
              <option value="Unpaid">Unpaid</option>
            </select>

            
</div>
      
        <div id="button-block">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <input type="submit" value="Save">
        </div>
  </form>
</div>