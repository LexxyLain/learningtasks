<div id="content">
    <?php
      switch($subpage){
                case 'create':
                require_once 'users-module/create-user.php';
                break; 
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                case 'room':
                    require_once 'room-module/add-room.php';
                break; 
                default:
                    require_once 'main.php';
                break; 
            }
    ?>
  </div>