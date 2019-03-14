<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
include($path . "model/connect.php");

	class DAOcart{

    function select_travel($ref){
			$sql = "SELECT * FROM travels WHERE id='$ref'";

			$conexion = Conectar::con();
      $res = mysqli_query($conexion, $sql)->fetch_object();
      Conectar::close($conexion);
      return $res;
		}

    function insert_cart($data, $user){
      $longitud = count($data);
        for($i=0; $i<$longitud; $i++){
        $destination = $data[$i]->Product;
        $id = $data[$i]->ID;
        $quantity = $data[$i]->Qty;
        // $total = $price * $quantity;

        $sql = "INSERT INTO checkout (user, destination, price, quantity, total, date)
        VALUES ('$user', '$destination', (SELECT price FROM travels WHERE id = $id), '$quantity', (SELECT price * $quantity FROM travels WHERE id = $id), now())";
        $conexion = Conectar::con();
        $res = mysqli_query($conexion, $sql);
        Conectar::close($conexion);
      }
      return $res;
		}
  }
  
  
