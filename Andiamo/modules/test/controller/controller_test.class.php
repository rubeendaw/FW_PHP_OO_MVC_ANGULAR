<?php
class controller_test {
    function __construct() {
        $_SESSION['module'] = "test";
    }
    function test_view() {
            // require_once(VIEW_PATH_INC . "header.php")
            require_once(VIEW_PATH_INC . "top_page.php");;
            require_once(VIEW_PATH_INC . "menu_no_auth.php");
            loadView('modules/test/view/', 'test.html');
            require_once(VIEW_PATH_INC . "footer.php");
      
      
            // require_once(VIEW_PATH_INC . "footer.html");
        }
    function prueba() {
                $data = $_POST["data"];
                echo json_encode($data);
                exit();
        }
    }