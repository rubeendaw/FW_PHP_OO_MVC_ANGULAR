<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
define('SITE_ROOT', $path);
require(SITE_ROOT . "module/profile/model/BLL/profile_bll.class.singleton.php");

class profile_model {
    private $bll;
    static $_instance;

    private function __construct() {
        $this->bll = profile_bll::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function update_profile($arrArgument) {
        return $this->bll->update_profile_BLL($arrArgument);
    }

}
