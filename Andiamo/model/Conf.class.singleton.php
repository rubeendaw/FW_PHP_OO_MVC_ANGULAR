<?php
	$path=$_SERVER['DOCUMENT_ROOT'].'/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
    define('SITE_ROOT', $path);
    define('MODEL_PATH',SITE_ROOT.'model/');

    class Conf {
        private $_userdb;
        private $_passdb;
        private $_hostdb;
        private $_db;
        static $_instance;

        private function __construct() {
            $cnfg = parse_ini_file(MODEL_PATH."db.ini");
            $this->_userdb = $cnfg['user'];
            $this->_passdb = $cnfg['password'];
            $this->_hostdb = $cnfg['host'];
            $this->_db = $cnfg['db'];
        }

        // private function __clone() {
        // }

        public static function getInstance() {
            if (!(self::$_instance instanceof self))
                self::$_instance = new self();
            return self::$_instance;
        }

        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }
    }
