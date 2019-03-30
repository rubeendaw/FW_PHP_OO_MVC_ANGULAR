<?php
class profileDAO {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function update_profile_DAO($db, $arrArgument) {
        $email = $arrArgument['email'];
        $name = $arrArgument['name'];
        $phone = $arrArgument['phone'];
        $username = $arrArgument['username'];
        $avatar = $arrArgument['avatar'];
        $sql = "UPDATE users SET email = '$email', name = '$name', phone = '$phone', avatar = '$avatar' WHERE email = (SELECT email FROM (SELECT * FROM users) AS t WHERE username = '$username')";
        // $sql = "UPDATE users SET email = '$email' WHERE email = 'prueba@prueebaa.es'";
        return $db->ejecutar($sql);
        // return $sql;
    }

}
