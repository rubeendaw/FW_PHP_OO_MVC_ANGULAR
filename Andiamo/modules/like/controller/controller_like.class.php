<?php
class controller_like {
    function __construct() {
        $_SESSION['module'] = "like";
    }

    function view_likes() {
        require_once(VIEW_PATH_INC . "top_page.php");;
        require_once(VIEW_PATH_INC . "menu_no_auth.php");
        loadView('modules/like/view/', 'like.html');
        require_once(VIEW_PATH_INC . "footer.php");
    }

    function ins_like() {
        // echo "<script>console.log('Hola: ". $_SESSION['username'] . "');</script>";
        // exit();
        $username = "ruamsa1";
            try{
                $arrArgument = array(
                    'id' => $_POST['id'],
                    'username' => $username
                );
                $arrValue = false;
                $arrValue = loadModel(MODEL_LIKE, "like_model", "insert_like", $arrArgument);
                // $rdo = $daolike->insert_like($_GET['id'],$username);
            } catch (Exception $e) {
                echo json_encode("error");
            }
            
            if (!$rdo) {
                echo json_encode("error");
            }else{
                echo json_encode($rdo);
                exit();
            }
        }

        function del_like() {
            $username = "ruamsa1";
            try{
                $arrArgument = array(
                    'id' => $_POST['id'],
                    'username' => $username
                );
                $arrValue = false;
                $arrValue = loadModel(MODEL_LIKE, "like_model", "delete_like", $arrArgument);
            } catch (Exception $e) {
                echo json_encode("error");
            }
            
            if (!$rdo) {
                echo json_encode("error");
            }else{
                echo json_encode($rdo);
                exit();
            }
        }

        function show_like() {
            try {
                $username = "ruamsa1";
                $arrValue = false;
                $arrValue = loadModel(MODEL_LIKE, "like_model", "show_like", $username);
            } catch (Exception $e) {
                echo json_encode("error1");
            }
            
            if (!$arrValue) {
                echo json_encode("error2");
            }else{
                $prod = array();
                foreach ($arrValue as $value) {
                    array_push($prod, $value);
                }
                echo json_encode($prod);
                exit();
            }
        }

}