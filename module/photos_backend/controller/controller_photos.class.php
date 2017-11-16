<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT'] . "/2 html5up-arcana/module/photos_backend/utils/functions.inc.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/2 html5up-arcana/utils/upload.php");
include ($_SERVER['DOCUMENT_ROOT'] . "/2 html5up-arcana/utils/common.inc.php");

if ((isset($_GET["upload"])) && ($_GET["upload"] == true)) {
    $result_avatar = upload_files();
    $_SESSION['result_avatar'] = $result_avatar;
    //echo debug($_SESSION['result_avatar']); //se mostraría en alert(response); de dropzone.js
}

if ((isset($_POST['alta_photos_json']))) {
    alta_photos();
}

function alta_photos() {
    $jsondata = array();
    $usersJSON = json_decode($_POST["alta_photos_json"], true);
    $result = validate_photo($usersJSON);

    if (empty($_SESSION['result_avatar'])) {
        $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/default-avatar.png');
    }
    $result_avatar = $_SESSION['result_avatar'];

    if (($result['resultado']) && ($result_avatar['resultado'])) {
        $arrArgument = array(
          'link' => $result['datos']['link'],
          'imgnombre' => $result['datos']['imgnombre'],
          'descr' => $result['datos']['descr'],
          'fecha' => $result['datos']['fecha'],
          'tipo' => $result['datos']['tipo'],
          'loc' => $result['datos']['location'],
          'formato' => $result['datos']['formato'],
          'avatar' => $result_avatar['datos'],
          'pais' => $result['datos']['pais'],
          'provincia' => $result['datos']['provincia'],
          'ciudad' => $result['datos']['ciudad']
          );

        $arrValue = false;
        $path_model = $_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photos_backend/model/model/';
        $arrValue = loadModel($path_model, "photo_model", "create_photo", $arrArgument);
       // echo json_encode($arrValue);
       // die();

        $mensaje = "Photo has been successfully registered";
       
        //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
        $_SESSION['user'] = $arrArgument;


        $_SESSION['msje'] = $mensaje;
        $callback = "index.php?module=photos_backend&view=results_photos";

        $jsondata["success"] = true;
        $jsondata["redirect"] = $callback;
        echo json_encode($jsondata);
        exit;
    } else {
        //$error = $result['error'];
        //$error_avatar = $result_avatar['error'];
        $jsondata["success"] = false;
        $jsondata["error"] = $result['error'];
        $jsondata["error_avatar"] = $result_avatar['error'];

        $jsondata["success1"] = false;
        if ($result_avatar['resultado']) {
            $jsondata["success1"] = true;
            $jsondata["img_avatar"] = $result_avatar['datos'];
        }
        header('HTTP/1.0 400 Bad error');
        echo json_encode($jsondata);
        //exit;
    }
}

//////////////////////////////////////////////////////////////// delete
if (isset($_GET["delete"]) && $_GET["delete"] == true) {
    $_SESSION['result_avatar'] = array();
    $result = remove_files();
    if ($result === true) {
        echo json_encode(array("res" => true));
    } else {
        echo json_encode(array("res" => false));
    }
}

//////////////////////////////////////////////////////////////// load
if (isset($_GET["load"]) && $_GET["load"] == true) {
    $jsondata = array();
    if (isset($_SESSION['user'])) {
        //echo debug($_SESSION['user']);
        $jsondata["user"] = $_SESSION['user'];
    }
    if (isset($_SESSION['msje'])) {
        //echo $_SESSION['msje'];
        $jsondata["msje"] = $_SESSION['msje'];
    }
    close_session();
    echo json_encode($jsondata);
    exit;
}

function close_session() {
    unset($_SESSION['user']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}

/////////////////////////////////////////////////// load_data
if ((isset($_GET["load_data"])) && ($_GET["load_data"] == true)) {
    $jsondata = array();
    if (isset($_SESSION['user'])) {
        $jsondata["user"] = $_SESSION['user'];
        echo json_encode($jsondata);
        exit;
    } else {
        $jsondata["user"] = "";
        echo json_encode($jsondata);
        exit;
    }
}


  
if(  (isset($_GET["load_pais"])) && ($_GET["load_pais"] == true)  ){
    $json = array();

    $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';
    $path_model=$_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photos_backend/model/model/';
    $json = loadModel($path_model, "photo_model", "obtener_pais", $url);
    
    if($json){
        echo $json;
        exit;
    }else{
        $json = "error";
        echo $json;
        exit;
    }
}


if(  (isset($_GET["load_provincia"])) && ($_GET["load_provincia"] == true)  ){
    $jsondata = array();
    $json = array();

    $path_model=$_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photos_backend/model/model/';
    $json = loadModel($path_model, "photo_model", "obtener_provincia");

    if($json){
        $jsondata["provincia"] = $json;
        echo json_encode($jsondata);
        exit;
    }else{
        $jsondata["provincia"] = "error";
        echo json_encode($jsondata);
        exit;
    }
}

if(  isset($_POST['idPoblac']) ){
    $jsondata = array();
    $json = array();

    $path_model=$_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photos_backend/model/model/';
    $json = loadModel($path_model, "photo_model", "obtener_ciudad", $_POST['idPoblac']);

    if($json){
        $jsondata["ciudad"] = $json;
        echo json_encode($jsondata);
        exit;
    }else{
        $jsondata["ciudad"] = "error";
        echo json_encode($jsondata);
        exit;
    }
}
