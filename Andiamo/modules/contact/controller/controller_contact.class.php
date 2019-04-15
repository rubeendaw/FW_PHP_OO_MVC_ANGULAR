<?php
class controller_contact {
    public function __construct() {
        $_SESSION['module'] = "contact";
    }

    public function view_contact() {
        require_once(VIEW_PATH_INC . "top_page.php");;
        require_once(VIEW_PATH_INC . "menu_no_auth.php");
        loadView('modules/contact/view/', 'contact.html');
        require_once(VIEW_PATH_INC . "footer.php");
    }

    public function send_contact(){
        $data_mail = array();
        $data_mail = json_decode($_POST['fin_data'],true);
        $arrArgument = array(
            'type' => 'contact',
            'token' => '',
            'inputName' => $data_mail['cname'],
            'inputEmail' => $data_mail['cemail'],
            'inputSubject' => $data_mail['matter'],
            'inputMessage' => $data_mail['message']
        );
        
        //set_error_handler('ErrorHandler');
        try{
            echo "<div class='alert alert-success'>".enviar_email($arrArgument)." </div>";
        } catch (Exception $e) {
            echo "<div class='alert alert-error'>Server error. Try later...</div>";
        }
        //restore_error_handler();

        $arrArgument = array(
            'type' => 'admin',
            'token' => '',
            'inputName' => $data_mail['cname'],
            'inputEmail' => $data_mail['cemail'],
            'inputSubject' => $data_mail['matter'],
            'inputMessage' => $data_mail['message']
        );
        try{
            enviar_email($arrArgument);
        } catch (Exception $e) {
            echo "<div class='alert alert-error'>Server error. Try later...</div>";
        }
    }

}