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
    xmlhttp.open("GET", "tenants-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
} 
</script>
<div id="second-submenu">
    <a href="index.php?page=tenants&subpage=tenants">Add</a> |
    <a href="index.php?page=tenants&subpage=view">View</a>
 </div>

<div id="subcontent">
    <?php
      switch($subpage){
                case 'tenants':
                    require_once 'tenants-module/add-tenants.php';
                break;
                case 'update':
                    require_once 'tenants-module/update-tenants.php';
                break;
                case 'view':
                    require_once 'tenants-module/main.php';
                break;
                default:
                    require_once 'tenants-module/main.php';
                break; 
      }
    ?>
  </div>