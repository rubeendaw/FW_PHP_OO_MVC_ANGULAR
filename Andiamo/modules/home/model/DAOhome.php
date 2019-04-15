<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
include($path . "model/connect.php");

	class DAOhome{
		function select_all_travels(){
			$sql = "SELECT * FROM travels ORDER BY likes DESC LIMIT 8 ";

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

		function select_all_type(){
			$sql = "SELECT DISTINCT type FROM travels";
			
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}
		
		function select_all_country($types){
			$sql = "SELECT DISTINCT country FROM travels WHERE type='$types'";
			
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}
		
		function select_all_destination($types, $country){
            $tecla_pulsada = $_POST['service'];
			$sql = "SELECT * FROM travels WHERE type='$types'AND country='$country' AND destination LIKE '" . $tecla_pulsada . "%' GROUP BY id";
			
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
        }

        function select_filter($type,$country,$destination){
			$sql = "SELECT DISTINCT * FROM travels WHERE type='$type' AND country='$country' AND destination='$destination'";
			
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
        }
}
