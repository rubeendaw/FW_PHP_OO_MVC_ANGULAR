<?php
class like_DAO {
    static $_instance;

    private function __construct() {

    }

    public static function getInstance() {
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function insert_like_DAO($db, $arrArgument) {
        $id = $arrArgument['id'];
        $username = $arrArgument['username'];
        $sql = "INSERT INTO likes VALUES($id,'$username')";
        return $db->ejecutar($sql);
    }

    public function show_like_DAO($db, $user) {

        $sql = "SELECT id, country, destination, price FROM travels WHERE id IN (SELECT travel FROM likes WHERE username = '$user')";
        $stmt = $db->ejecutar($sql);
        return $db->listar($stmt);
    }

    public function delete_like_DAO($db, $arrArgument) {
        $id = $arrArgument['id'];
        $username = $arrArgument['username'];
        $sql = "DELETE FROM likes WHERE travel = $id AND username = '$username'";
        return $db->ejecutar($sql);
    }

}
