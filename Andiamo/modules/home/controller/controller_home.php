<?php
    $path = $_SERVER['DOCUMENT_ROOT'] . '/www/FW_PHP_OO_MVC_JQUERY/Andiamo/';
    include($path . "module/home/model/DAOhome.php");
    if (isset($_SESSION["tiempo"])) {  
	    $_SESSION["tiempo"] = time();
    }
    
    switch($_GET['op']){
        case 'list':
            try{
                $daohome = new DAOhome();
            	$rdo = $daohome->select_all_travels();
            }catch (Exception $e){
                $callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
            }

            if(!$rdo){
    			$callback = 'index.php?page=503';
			    die('<script>window.location.href="'.$callback .'";</script>');
    		}else{
                include("module/home/view/home.php");
    		}
        break;

        case 'dropdown_types':
            try{
                $daohome = new DAOhome();
                $rdo = $daohome->select_all_type();
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $types = array();
                foreach ($rdo as $row){
                    array_push($types, $row);
                }
                echo json_encode($types);
                exit;
            }
        break;
    
        case 'dropdown_country':
            try{
                $daohome = new DAOhome();
                $rdo = $daohome->select_all_country($_GET['uni']);
            }catch (Exception $e){
                echo json_encode("error1");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                $countries = array();
                foreach ($rdo as $row){
                    array_push($countries, $row);
                }
                echo json_encode($countries);
                exit;
            }
        break;

        case 'autocomplete':
            try{
                $daohome = new DAOhome();
                $rdo = $daohome->select_all_destination($_GET['types'], $_GET['country']);
            }catch (Exception $e){
                echo json_encode("error");
                exit;
            }
            if(!$rdo){
                echo json_encode("error");
                exit;
            }else{
                foreach ($rdo as $row) {
                    echo '<div>
                            <a class="suggest-element" data="'.$row['destination'].'" id="service'.$row['id'].'">'.utf8_encode($row['destination']).'</a>
                        </div>';
                }
                exit;
            }
        break;

        // case 'redirect':
        //     try{
        //         $daohome = new DAOhome();
        //         $rdo = $daohome->select_filter($_GET['uni'],$_GET['country'],$_GET['destination']);
        //     }catch (Exception $e){
        //         $callback = 'index.php?page=503';
        //         die('<script>window.location.href="'.$callback .'";</script>');
        //     }
            
        //     if(!$rdo){
        //         $callback = 'index.php?page=503';
        //         die('<script>window.location.href="'.$callback .'";</script>');
        //     }else{
        //         include("module/shop/view/shop.php");
        //     }
        // break;

        default;
            include("view/inc/error404.php");
            break;
    }
