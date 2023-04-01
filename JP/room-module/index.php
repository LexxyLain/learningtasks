
<div id="subcontent">
    <?php
      switch($subpage){
                case 'room':
                    require_once 'room-module/add-room.php';
                break;
                case 'view':
                    require_once 'room-module/main.php';
                break; 
                default:
                    require_once 'room-module/main.php';
                break; 
      }
    ?>
  </div>