<div id="form-block">
    <form method="POST" action="processes/process.rooms.php?action=room">
        <div id="form-block-half">
        <label for="room_no">Room Number</label>
            <select id="room_no" name="room_no">
              <option value="101">101</option>
              <option value="102">102</option>
              <option value="103">103</option>
            </select>

            <label for="room_price">Price</label>
            <select id="room_price" name="room_price">
              <option value="1700">1700</option>
              <option value="7500">7500</option>
              <option value="Manager">7500</option>
            </select>

            <label for="room_status">Status</label>
            <select id="room_status" name="room_status">
              <option value="Vacant">Vacant</option>
              <option value="Occupied">Occupied</option>
              <option value="Full">Full</option>
            </select>
        </div>
        
        <div id="form-block-half">
            <label for="room_vacancy">Vacancy</label>
            <select id="room_vacancy" name="room_vacancy">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
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