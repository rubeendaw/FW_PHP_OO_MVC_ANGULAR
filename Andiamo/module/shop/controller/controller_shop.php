<?php
  $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
  include($path . "module/shop/model/DAOshop.php");
    if (!isset($_SESSION)){
      session_start();
		}
		if (isset($_SESSION["tiempo"])) {  
	    $_SESSION["tiempo"] = time();
		}
    switch($_GET['op']){

        case 'list':
            include("module/shop/view/shop.php");
				break;
				
				case 'details':
						$_SESSION['id']=$_GET['id'];
            include("module/shop/view/shop_details.php");
        break;

        case 'data_shop':
					try {
						$daoshop = new DAOshop();
						$rdo = $daoshop->select_all_travels();
					} catch (Exception $e) {
						echo json_encode("error");
					}
					
					if (!$rdo) {
						echo json_encode("error");
					}else{
						$prod = array();
						foreach ($rdo as $value) {
							array_push($prod, $value);
						}
						echo json_encode($prod);
						exit();
					}
				break;

			case 'data_shop_details':
				try{
					$daoshop = new DAOshop();
					$rdo = $daoshop->select_travel($_SESSION['id']);
					$travel=get_object_vars($rdo);
				} catch (Exception $e) {
					echo json_encode("error");
				}
				
				if (!$rdo) {
					echo json_encode("error");
				}else{
					echo json_encode($rdo);
					exit();
				}
			break;

		case 'data_shop2':
			try {
				$daoshop = new DAOshop();
				$rdo2 = $daoshop->select_filter($_SESSION['uni'],$_SESSION['country'],$_SESSION['destination']);
			} catch (Exception $e) {
				echo json_encode("error");
			}
			if (!$rdo2) {
				echo json_encode("error");
			}else{
				$prod = array();
				foreach ($rdo2 as $value) {
					array_push($prod, $value);
				}
				echo json_encode($prod);
				exit();
			}
		break;

		case 'redirect':
			$_SESSION['uni']=$_GET['uni'];
			$_SESSION['country']=$_GET['country'];
			$_SESSION['destination']=$_GET['destination'];
			include("module/shop/view/shopdd.php");
		break;
            
        default;
            include("view/inc/error404.php");
        break;
    }
