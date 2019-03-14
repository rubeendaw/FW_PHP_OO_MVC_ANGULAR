<?php
	class Conectar{
		public static function con(){
			$host = "127.0.0.1";
    		$user = "root";
    		$pass = "";
    		$db = "andiamo";
    		$port = 3306;
    		$tabla="travels";

    		$conexion = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
			return $conexion;
		}
		public static function close($conexion){
			mysqli_close($conexion);
		}
	}
