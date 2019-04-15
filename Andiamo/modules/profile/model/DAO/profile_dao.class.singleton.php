<?php
class profile_DAO {
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
        $country = $arrArgument['country'];
        $province = $arrArgument['province'];
        $city = $arrArgument['city'];
        $sql = "UPDATE users SET email = '$email', name = '$name', phone = '$phone', country = '$country', province = '$province', city = '$city', avatar = '$avatar' WHERE email = (SELECT email FROM (SELECT * FROM users) AS t WHERE username = '$username')";
        // $sql = "UPDATE users SET email = '$email' WHERE email = 'prueba@prueebaa.es'";
        // return $db->ejecutar($sql);
        return $sql;
    }

    public function obtain_countries_DAO($url){
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $file_contents = curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $accepted_response = array(200, 301, 302);
        if(!in_array($httpcode, $accepted_response)){
          return FALSE;
        }else{
          return ($file_contents) ? $file_contents : FALSE;
        }
    }

    public function obtain_provinces_DAO(){
        $json = array();
        $tmp = array();

        $provincias = simplexml_load_file(RESOURCES . 'provinciasypoblaciones.xml');
        $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
        for ($i=0; $i<count($result); $i+=2) {
          $e=$i+1;
          $provincia=$result[$e];

          $tmp = array(
            'id' => (string) $result[$i], 'nombre' => (string) $provincia
          );
          array_push($json, $tmp);
        }
            return $json;
    }

    public function obtain_cities_DAO($arrArgument){
        $json = array();
        $tmp = array();

        $filter = (string)$arrArgument;
        $xml = simplexml_load_file(RESOURCES . "provinciasypoblaciones.xml");
        $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

        for ($i=0; $i<count($result[0]); $i++) {
            $tmp = array(
              'poblacion' => (string) $result[0]->localidad[$i]
            );
            array_push($json, $tmp);
        }
        return $json;
    }

}
