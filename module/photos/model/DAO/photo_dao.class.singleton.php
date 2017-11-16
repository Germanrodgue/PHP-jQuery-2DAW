<?php
class photoDAO {
    static $_instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function create_photo_DAO($db, $arrArgument) {
        $link = $arrArgument['link'];
        $imgnombre = $arrArgument['imgnombre'];
        $descr = $arrArgument['descr'];
        $tipo = $arrArgument['tipo'];
        $loc = $arrArgument['loc'];
        $formato = $arrArgument['formato'];
        $avatar = $arrArgument['avatar'];
        $fecha = $arrArgument['fecha'];
        $form = "";
        
    
        foreach ($formato as $indice) {
            $form=$form."$indice:";
        }
        $country = $arrArgument['pais'];
        $province = $arrArgument['provincia'];
        $city = $arrArgument['ciudad'];

        $sql = "INSERT INTO fotografia (fecha, tipo, link, imgnombre,"
                . " Descripcion, formato, Localizacion, avatar, country, province, city"
                . " ) VALUES ('$fecha', '$tipo', '$link',"
                . " '$imgnombre', '$descr', '$form', '$loc', '$avatar', '$country', '$province', '$city')";

        return $db->ejecutar($sql);
    }

    public function obtener_pais_DAO($url){
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $file_contents = curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $accepted_response = array(200, 301, 302);
        if(!in_array($httpcode, $accepted_response)){
          return FALSE;
        }else{
          return ($file_contents) ? $file_contents : FALSE;
        }
  }

  public function obtener_provincia_DAO(){
        $json = array();
        $tmp = array();

        $provincias = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/2 html5up-arcana/resources/provinciasypoblaciones.xml');
        $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
        for ($i=0; $i<count($result); $i+=2) {
          $e=$i+1;
          $provincia=$result[$e];

          $tmp = array(
            'id' => (string) $result[$i], 'nombre' => (string) $provincia
          );
          array_push($json, $tmp);
        }
            return $json;

  }

  public function obtener_ciudad_DAO($arrArgument){
        $json = array();
        $tmp = array();

        $filter = (string)$arrArgument;
        $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'].'/2 html5up-arcana/resources/provinciasypoblaciones.xml');
        $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

        for ($i=0; $i<count($result[0]); $i++) {
            $tmp = array(
              'poblacion' => (string) $result[0]->localidad[$i]
            );
            array_push($json, $tmp);
        }
        return $json;
  }
}
