<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
include($path . "model/connect.php");

	class DAOlogin{
    function comprobar_login($user){
        $sql = "SELECT * FROM `users` WHERE `username` = '$user'";

        $conexion = Conectar::con();
              $res = mysqli_query($conexion, $sql);
              Conectar::close($conexion);
              if( mysqli_num_rows( $res ) > 0 ){
                  return true;
              }
              return false;
          }

    function recovery_user($user){
			$sql = "UPDATE `users` SET password = '$user[password]' WHERE `username` = '$user[username]'";

			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            return $res;
		}

    function comprobar_user_recovery($user){
        $sql = "SELECT * FROM `users` WHERE `username` = '$user[username]'";

        $conexion = Conectar::con();
              $res = mysqli_query($conexion, $sql);
              Conectar::close($conexion);
              if( mysqli_num_rows( $res ) > 0 ){
                  return true;
              }
              return false;
          }

    function select_user($user){
			$sql = "SELECT * FROM `users` WHERE `username` = '$user'";

			$conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql)->fetch_object();
            Conectar::close($conexion);
            return $res;
		}

    function comprobar_user_login($user){
        $sql = "SELECT * FROM `users` WHERE `username` = '$user[usernamel]'";

        $conexion = Conectar::con();
              $res = mysqli_query($conexion, $sql);
              Conectar::close($conexion);
              if( mysqli_num_rows( $res ) > 0 ){
                  return true;
              }
              return false;
          }

    function nuevo_user($user, $password, $email){
        $sql = "INSERT INTO users (username, password, email, type, avatar)
         VALUES ('$user', '$password', '$email', '2', 'https://api.adorable.io/avatars/25/$email.png')";
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
			return $res;
		}

    function comprobar_user_register($user){
        $sql = "SELECT * FROM `users` WHERE username = '$user'";
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            if( mysqli_num_rows( $res ) > 0 ){
                return true;
            }
            return false;
        }
        
    function comprobar_user_email_register($user, $email){
        $sql = "SELECT * FROM `users` WHERE username = '$user' OR email ='$email'";
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            if( mysqli_num_rows( $res ) > 0 ){
                return true;
            }
            return false;
		}
    function comprobar_email_register($email){
        $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $conexion = Conectar::con();
            $res = mysqli_query($conexion, $sql);
            Conectar::close($conexion);
            if( mysqli_num_rows( $res ) > 0 ){
                return true;
            }
            return false;
		}
}
