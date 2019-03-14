<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
  include($path . "module/like/model/DAOlike.php");
  if (isset($_SESSION["tiempo"])) {  
      $_SESSION["tiempo"] = time();
  }
    if (!isset($_SESSION)){
      session_start();
    }
    switch($_GET['op']){

        case 'view':
            include("module/like/view/like.html");
        break;

        case 'ins_like':
            try{
                $daolike = new DAOlike();
                $rdo = $daolike->insert_like($_GET['id']);
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

        default;
            include("view/inc/error404.php");
        break;
}