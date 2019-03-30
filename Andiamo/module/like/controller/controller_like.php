<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
  include($path . "module/like/model/DAOlike.php");
  @session_start();
  if (isset($_SESSION["tiempo"])) {  
      $_SESSION["tiempo"] = time();
  }
    switch($_GET['op']){

        case 'view':
            include("module/like/view/like.html");
        break;

        case 'ins_like':
        // echo "<script>console.log('Hola: ". $_SESSION['username'] . "');</script>";
        // exit();
            try{
                $username = $_SESSION['username'];
                $daolike = new DAOlike();
                $rdo = $daolike->insert_like($_GET['id'],$username);
            } catch (Exception $e) {
                echo json_encode("error");
            }
            
            if (!$rdo) {
                echo json_encode("error");
            }else{
                echo json_encode($rdo);
                exit();
            }
        break;

        case 'show_like':
            try {$username = $_SESSION['username'];
                $daolike = new DAOlike();
                $rdo = $daolike->show_like($username);
            } catch (Exception $e) {
                echo json_encode("error");
            }
            
            if (!$rdo) {
                echo json_encode("error");
            }else{
                $prod = array();
                foreach ($rdo as $value) {
                    array_push($prod, $value);
                }
                echo json_encode($prod);
                exit();
            }
        break;

        default;
            include("view/inc/error404.php");
        break;
}