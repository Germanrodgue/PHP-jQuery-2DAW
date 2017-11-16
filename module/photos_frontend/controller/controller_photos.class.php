<?php
session_start();
include ($_SERVER['DOCUMENT_ROOT'] . "/2 html5up-arcana/utils/common.inc.php");


//////////////////////////////////////////////////////////////// load
if (isset($_GET["load"]) && $_GET["load"] == true) {

        $path_model = $_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photos_frontend/model/model/';
        $arrValue = loadModel($path_model, "photo_model", "list_photo");
   
    echo json_encode($arrValue);
    exit;
}
if (isset($_GET["load_details"]) && $_GET["load_details"] == true) {
     $detailsjson = array();
     $jsondata = json_decode($_POST["details_id"], true);
     $path_model = $_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photos_frontend/model/model/';
     $arrValue = loadModel($path_model, "photo_model", "detail_photo", $jsondata);
    
     $_SESSION['photodetail'] = $arrValue;
     $callback = "index.php?module=photos_frontend&view=details_photos";
     $detailsjson['value'] = $arrValue;
     $detailsjson["redirect"] = $callback;

 echo json_encode($detailsjson);
 exit;
}
if(isset($_POST['getresult']) && $_GET["getresult"] == true ){
    $no = $_POST['getresult'];
    $path_model = $_SERVER['DOCUMENT_ROOT'] . '/2 html5up-arcana/module/photos_frontend/model/model/';
    $arrValue = loadModel($path_model, "photo_model", "list_photo_limit", $no);
    $list = $arrValue;
    echo json_encode($list);
    exit;
}
if (isset($_GET["load_details_1"]) && $_GET["load_details_1"] == true) {
    $jsondata = array();
    if (isset($_SESSION['photodetail'])) {
        //echo debug($_SESSION['user']);
        $jsondata['succes'] = true;
        $jsondata["photodetails"] = $_SESSION['photodetail'];
    }
   
    echo json_encode($jsondata);
    exit;
}
function close_session() {
    unset($_SESSION['user']);
    unset($_SESSION['msje']);
    $_SESSION = array(); // Destruye todas las variables de la sesión
    session_destroy(); // Destruye la sesión
}



 