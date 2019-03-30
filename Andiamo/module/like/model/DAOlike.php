<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
include($path . "model/connect.php");

	class DAOlike{
		function insert_like($id, $user){
			// $sql = "UPDATE travels SET likes=likes + 1 WHERE id='$id'";
			$sql = "INSERT INTO likes VALUES($id,'$user')";

			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}

		function show_like($user){
			// $sql = "UPDATE travels SET likes=likes + 1 WHERE id='$id'";
			$sql = "SELECT country, destination, price FROM travels WHERE id IN (SELECT travel FROM likes WHERE username = '$user')";

			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}
}
