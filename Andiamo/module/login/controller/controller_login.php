<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
    include($path . "module/login/model/DAOlogin.php");
    @session_start();
    switch($_GET['op']){
        case 'view':
            include("module/login/view/login.html");
            break;
            
        case 'login':
        try {
            $daologin = new DAOlogin();
            $rdo = $daologin->select_user($_POST['usernamel']);
            // $travel=get_object_vars($rdo);
            // echo $travel;
            // exit();
        } catch (Exception $e) {
            echo "error";
            exit();
        }
        if(!$rdo){
            echo "error_user";
            exit();
        }else{
            $value = get_object_vars($rdo);
            if (password_verify($_POST['passwordl'],$value['password'])) {
                echo 'ok';
                $_SESSION['type_user'] = $value['type'];
                $_SESSION['username'] = $value['username'];
                $_SESSION['avatar'] = $value['avatar'];
                $_SESSION['tiempo'] = time();
                exit();
            }else {
                echo "error_user";
                exit();
            }
        }	
        break;
            
        case 'register':
            // $valide = validate_register();
            // if($valide['result']){
                try {
                    $daologin = new DAOlogin();
                    $pass_hash = password_hash($_POST['passwordr'], PASSWORD_DEFAULT);
                    $rdocompuseremail = $daologin->comprobar_user_email_register($_POST['usernamer'],$_POST['emailr']);
                    // $rdocompemail = $daologin->comprobar_email_register($_POST['emailr']);
                } catch (Exception $e) {
                    echo "Error al registrarse";
                    exit();
                }
                if($rdocompuseremail == true){
                    echo "error_reg";
                    exit();
                }else{ 
                    $rdo = $daologin->nuevo_user($_POST['usernamer'], $pass_hash, $_POST['emailr']);
                    if(!$rdo){
                        echo "error_reg";
                        exit();
                    }else{
                        if (isset($_SESSION['purchase']) && $_SESSION['purchase'] === 'on'){
                            echo 'okay';
                            exit();
                        }else{
                            echo 'ok';
                            exit();	
                        }
                    }	
                }
            // }else{
            //     echo $valide['error'];
            //     exit();
            // }
		break;

        case 'logout':
        unset($_SESSION['type_user']);
        unset($_SESSION['username']);
        session_destroy();
        $callback = 'index.php?page=controller_login&op=view';
        die('<script>window.location.href="'.$callback .'";</script>');
        break;

        case 'gravatar':
        $datos = array(
            "avatar" => $_SESSION['avatar'],
            "username" => $_SESSION['username'],
        );
        echo json_encode ($datos);
        // $avatar = $_SESSION['avatar'];
        // $user = $_SESSION['username'];

        break;

        case 'time':
			if (!isset($_SESSION["tiempo"])) {  
    	  		echo "activo";
			}else{  
	    		if((time() - $_SESSION["tiempo"]) >= 1000) {  
	    	  		echo "inactivo"; 
	    	  		exit();
				}else{
					echo "activo";
					exit();
				}
			}
		break;

        case 'regenid':
            session_regenerate_id();
            exit();
        break;

        default;
            include("view/inc/error404.php");
            break;
    }
