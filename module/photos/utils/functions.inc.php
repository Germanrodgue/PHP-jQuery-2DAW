<?php

 function isImage($file)
  {

$file_headers = @get_headers($file);
if(!$file_headers || $file_headers[0] == 'HTTP/1.0 404 Not Found') {
    return false;

}
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 500 Internal Server Error') {
    return false;

}
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 403') {
    return false;

}
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    return false;

}else {
    $size = getimagesize($file);
		return (strtolower(substr($size['mime'], 0, 5)) == 'image' ? $file : false);
}
}

	function validate_photo($value){

    $error = array();
    $valido = true;

		$filtro = array(
			'link' => array(

			),
			'imgnombre' => array(
            'filter'=>FILTER_VALIDATE_REGEXP,
			'options'=>array('regexp'=>'/^\D{3,30}$/')
			),
			'descr' => array(
            'filter'=>FILTER_VALIDATE_REGEXP,
			'options'=>array('regexp'=>'|^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$|')
			),
			'tipo' => array(

			),
			'location' => array(

			),
			'fecha' => array(

			),
             'formato' => array(

			),

		);

		$resultado=filter_var_array($value,$filtro);
        $resultado['formato'] = $value['formato'];
        $resultado['tipo'] = $value['tipo'];
        $resultado['pais'] = $value['pais'];
        $resultado['provincia'] = $value['provincia'];
        $resultado['ciudad'] = $value['ciudad'];
		/*if(isset($resultado['link'])){

			$link = isImage($resultado['link']);
		}*/
    if ($resultado != null && $resultado) {


          if (!$resultado['link']) {

        			$error['link']='El link debe ser correcto';
              $valido = false;
          }
          if (!$resultado['imgnombre']) {

              $error['imgnombre']='El nombre de la imagen debe ser correcto';
              $valido = false;
          }
          if (!$resultado['descr']) {

              $error['descr']='La descripcion de la imagen debe ser correcta';
              $valido = false;
          }
      } else {
          $valido = false;
      };

      return $return = array('resultado' => $valido, 'error' => $error, 'datos' => $resultado);
  }




	function debug($array){
		echo "<pre>";
		print_r($array);
		echo "</pre><br>";
	}
?>
