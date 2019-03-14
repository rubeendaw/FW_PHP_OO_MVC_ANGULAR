<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
include($path . "model/connect.php");

  class DAOtravel{
		function insert_travel($datos){
      $travel=$datos[travel];
      $ref=$datos[ref];
      $type=$datos[type];
      // $check_in=$datos[date];
      // $check_out=$datos[check_out];
      $destination=$datos[destination];
      $country=$datos[country];
      $price=$datos[price];
      $discount=$datos[discount];
      $img=$datos[img];
      list($check_in, $check_out) = explode("-",$datos[date]); 

          foreach ($datos[services] as $indice) {
              $services=$services."$indice,";
            }
        	$sql = "INSERT INTO travels (ref, type, check_in, check_out, destination, country, services, price, discount, img)"
        		. " VALUES ('$ref', '$type', '$check_in', '$check_out', '$destination', '$country', '$services', '$price', '$discount', '$img')";
            // print_r($sql);
            // die();
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
			return $res;
		}

    function update_travel($datos){
      $travel=$datos[travel];
        	$ref=$datos[ref];
          $type=$datos[type];
        	$check_in=$datos[check_in];
        	$check_out=$datos[check_out];
        	$destination=$datos[destination];
        	$country=$datos[country];
        	$price=$datos[price];
          $discount=$datos[discount];
          $img=$datos[img];

          foreach ($datos[services] as $indice) {
              $services=$services."$indice,";
            }

        	$sql = " UPDATE travels SET ref='$ref', type='$type', check_in='$check_in', check_out='$check_out', destination='$destination',"
        		. " country='$country', price='$price', discount='$discount', services ='$services', img='$img' WHERE ref='$ref'";

            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
			return $res;
		}

		function select_all_travels(){
			$sql = "SELECT * FROM travels ORDER BY id ASC";

			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}

		function select_travel($ref){
			$sql = "SELECT * FROM travels WHERE id='$ref'";

			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            Conectar::close($conexion);
            return $res;
		}

    function validate_ref($travel){
      $sql = "SELECT * FROM travels WHERE ref='{$travel['ref']}'";

      $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            Conectar::close($conexion);
            return $res;
    }

		function delete_travel($travel){
			$sql = "DELETE FROM travels WHERE id='$travel'";

			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
    }
    function delete_all_travel(){
			$sql = "DELETE FROM travels";

			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}

    // function select_lenguage(){
		// 	$sql = "SELECT * FROM translates";
    //
		// 	$conexion = Conectar::con();
    //         $res = mysqli_query($conexion, $sql);
    //         Conectar::close($conexion);
    //         return $res;
		// }
	}
