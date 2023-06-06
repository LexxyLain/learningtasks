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
    xmlhttp.open("GET", "users-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
} 
</script>
<div id="second-submenu">
    <a href="index.php?page=payments&subpage=payments">Add</a> |
    <a href="index.php?page=payments&subpage=view">View</a>
 </div>

<div id="subcontent">
    <?php
      switch($subpage){
                case 'payments':
                    require_once 'payments-module/add-payment.php';
                break;
                case 'update':
                    require_once 'payments-module/update-payments.php';
                break;
                case 'view':
                    require_once 'payments-module/main.php';
                break;
                default:
                    require_once 'payments-module/main.php';
                break; 
      }
    ?>
  </div>