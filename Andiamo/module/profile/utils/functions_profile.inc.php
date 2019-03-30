<?php
function validate_profile($value){
//   echo "<script>console.log('Hola: ". json_encode($value) . "');</script>";
  // exit();
  //echo json_encode("Inside validate_products on function products inc php");
//  exit;
    $error = array();
    $valid = true;
    // $filter = array(
    //     'email' => array(
    //         'filter' => FILTER_VALIDATE_REGEXP,
    //         'options' => array('regexp' => '/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/')
    //     ),
    // );

    // $result = filter_var_array($value, $filter);



    // if($result['email']==='Escribe el correo'){
    //         $error['email']="El correo no es valido";
    //         $valid = false;
    // }

    if ($value != null && $value){
        if(!$value['email']){
            $error['email'] = "El correo no es valido";
            $valid = false;
        }
    } else {
        $valid = false;
    };

    return $return = array('result' => $valid, 'error' => $error, 'data' => $value );
    // $return = $value;
    // return $return;
}//End of function validate product


//http://stackoverflow.com/questions/8722806/how-to-compare-two-dates-in-php

//http://php.net/manual/es/datetime.diff.php
