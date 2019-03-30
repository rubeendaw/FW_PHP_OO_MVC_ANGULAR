<?php
    include ($_SERVER['DOCUMENT_ROOT'] . "/www/FW_PHP_OO_MVC_JQUERY/Andiamo/module/profile/utils/functions_profile.inc.php");
    include ($_SERVER['DOCUMENT_ROOT'] . "/www/FW_PHP_OO_MVC_JQUERY/Andiamo/utils/common.inc.php");
    include ($_SERVER['DOCUMENT_ROOT'] . "/www/FW_PHP_OO_MVC_JQUERY/Andiamo/utils/upload.php");
    @session_start();
    switch($_GET['op']){
        case 'view':
            include("module/profile/view/profile.html");
        break;

//         case 'update':
//         $username = $_SESSION['username'];
//         $arrArgument = array(
//             'email' => $_POST['email'],
//             'username' => $username
//           );
//             $arrValue = false;
//             $arrValue = loadModel($path_model, "profile_model", "update_profile", $arrArgument);
//         break;
        

        default;
            include("view/inc/error404.php");
        break;
}

if ((isset($_GET["upload"])) && ($_GET["upload"] == true)){
    $result_prodpic = upload_files();
    $_SESSION['result_prodpic'] = $result_prodpic;
      echo json_encode($result_prodpic);
  }

if ((isset($_POST['alta_profile_json']))) {
    alta_profile();
}
function alta_profile(){
    $jsondata = array();
    $profileJSON = json_decode($_POST["alta_profile_json"], true);
    $result = validate_profile($profileJSON);
  
    // if (empty($_SESSION['result_prodpic'])){
    //     $_SESSION['result_prodpic'] = array('result' => true, 'error' => "", "data" => "/15_profile/1_profile/media/default-avatar.png");
    // }
    $result_prodpic = $_SESSION['result_prodpic'];
    // echo json_encode($result);
    // die();
    if($result['result']) {
        $username = $_SESSION['username'];
        $arrArgument = array(
            'email' => $result['data']['email'],
            'name' => $result['data']['name'],
            'phone' => $result['data']['phone'],
            'avatar' => $result_prodpic['data'],
            'username' => $username
        );
        $arrValue = false;
        $path_model = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/module/profile/model/model/';
        $arrValue = loadModel($path_model, "profile_model", "update_profile", $arrArgument);
        // echo json_encode($arrValue);
        // die();
    }
        
        if ($arrValue){
            $message = "profile has been successfull registered";
        }else{
            $message = "Problem ocurred registering a porduct";
        }
  
        $_SESSION['profile'] = $arrArgument;
        $_SESSION['message'] = $message;
        $callback="index.php?page=controller_profile&op=view";
  
        $jsondata['success'] = true;
        $jsondata['redirect'] = $callback;
        echo json_encode($jsondata);
        exit;
    // }else{
    //   $jsondata['success'] = false;
    //   $jsondata['error'] = $result['error'];
    // //   $jsondata['error_prodpic'] = $result_prodpic['error'];
  
    // //   $jsondata['success1'] = false;
    // //   if ($result_prodpic['result']) {
    // //       $jsondata['success1'] = true;
    // //       $jsondata['prodpic'] = $result_prodpic['data'];
    // //   }
    //   header('HTTP/1.0 400 Bad error');
    //   echo json_encode($jsondata);
    // }//End else
  }//End alta profiles

  if ((isset($_GET["delete"])) && ($_GET["delete"] == true)){
    //echo json_encode("Hello world from delete in controller_products.class.php");
    $_SESSION['result_prodpic'] = array();
    $result = remove_files();
    if($result === true){
      echo json_encode(array("res" => true));
    }else{
      echo json_encode(array("res" => false));
    }
    //echo json_decode($result);
}

//////////////////////////////////////////////////////////////// load
if (isset($_GET["load"]) && $_GET["load"] == true) {
    $jsondata = array();
    if (isset($_SESSION['profile'])) {
        //echo debug($_SESSION['user']);
        $jsondata["profile"] = $_SESSION['profile'];
    }
    if (isset($_SESSION['message'])) {
        //echo $_SESSION['msje'];
        $jsondata["message"] = $_SESSION['message'];
    }
    close_session();
    echo json_encode($jsondata);
    exit;
}

function close_session() {
    unset($_SESSION['profile']);
    unset($_SESSION['message']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}

/////////////////////////////////////////////////// load_data
// if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {
//     $jsondata = array();

//     if (isset($_SESSION['profile'])) {
//         $jsondata["profile"] = $_SESSION['profile'];
//         echo json_encode($jsondata);
//         exit;
//     } else {
//         $jsondata["profile"] = "";
//         echo json_encode($jsondata);
//         exit;
//     }
// }