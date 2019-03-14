<?php
	function validate_travel(){

		$error = array();
		$valido = true;
		$filtro = array(
			'country' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options'=>array('regexp'=>'/[a-zA-Z]{3,15}/')
			),

			'destination' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options'=>array('regexp'=>'/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/')
			),

			'ref' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options'=>array('regexp'=>'/[0-9]{1,8}/')
			),

			'price' => array(
				'filter'=>FILTER_VALIDATE_REGEXP,
				'options'=>array('regexp'=>'/[0-9]{1,8}/')
			)
		);

		$resultado=filter_input_array(INPUT_POST,$filtro);
		if(!$resultado['country']){
			$error['country']='El pais debe tener de 3 a 15 caracteres';
			$valido = false;
		}if(!$resultado['destination']){
			$error['destination']='El destino solo de debe contener letras y espacios';
			$valido = false;
		}if(!$resultado['price']){
			$error['price']='El precio debe ser entre 1 y 8 numeros';
			$valido = false;
		}if(!$resultado['ref']){
			$error['ref']='La referencia son solo letras y numeros';
			$valido = false;
		}else{
        $valido = false;
    };
    return $return = array('resultado' => $valido,
                            'error' => $error,
                            'datos' => $resultado);
}

	function debug($array){
		echo "<pre>";
		print_r($array);
		echo "</pre><br>";
	}
?>
