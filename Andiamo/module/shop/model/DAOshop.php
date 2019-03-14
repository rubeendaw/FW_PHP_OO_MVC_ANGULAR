<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
include($path . "model/connect.php");

	class DAOshop{
		function select_all_travels(){
			$sql = "SELECT * FROM travels";

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

		function select_filter($type,$country,$destination){
			$sql = "SELECT DISTINCT * FROM travels WHERE type='$type' AND country='$country' AND destination='$destination'";
			
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
        }
}
