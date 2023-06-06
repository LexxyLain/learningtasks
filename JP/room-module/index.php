<script>
function showResults(str) {
    if(str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "room-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
} 
</script>
<div id="second-submenu">
    <a href="index.php?page=rooms&subpage=create">Add</a> |
    <a href="index.php?page=rooms&subpage=view">View</a>
 </div>
       
        <?php
      switch($subpage){
                case 'create':
                    require_once 'add-room.php';
                break; 
                case 'view':
                    require_once 'room-module/main.php';
                break;
                case 'profile':
                    require_once 'room-module/update-room.php';
                break; 
                default:
                    require_once 'room-module/main.php';
                break; 
      }
    ?>
        </div>
    </body>
</html>