<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ((isset($_GET['page'])) && ($_GET['page']==="controller_travel") ){
  include("view/inc/top_page_travel.php");
}else if ((isset($_GET['page'])) && ($_GET['page']==="controller_travel") ){
    include("view/inc/top_page_travel.php");
}else{
    include("view/inc/top_page.php");
}
// echo "<script>console.log('Hola: ". $_SESSION['type_user'] . "');</script>";
// exit();
if (isset($_SESSION['type_user']) && ($_SESSION['type_user'] == "1")){
  include("view/inc/menu_auth.php");
}else if (isset($_SESSION['type_user']) && ($_SESSION['type_user'] == "2")){
  include("view/inc/menu_no_auth.php");
}else{
  include("view/inc/menu.php");
}


?>
  <div class="site-wrap">
    <?php
      include("view/inc/pages.php");
      include("view/inc/footer.php");
      include("view/inc/bottom_page.php");
    ?>
  </div>
