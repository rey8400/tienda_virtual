<?php 

require_once("Config/Config.php");
require_once("Helpers/Helpers.php");

$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home' ;
$arrUrl = explode("/",$url);        //quita las "/" de la url y las almacena en un array la ruta
$controller = $arrUrl[0];
$method = $arrUrl[0];
$params = "";

if(!empty($arrUrl[1])) {

    if($arrUrl[1] != ""){

        $method = $arrUrl[1];

    }
    
}

if(!empty($arrUrl[2])){

    if($arrUrl[2] != ""){

        for ($i=2; $i < count($arrUrl) ; $i++) { 
            
            $params .= $arrUrl[$i]. ',';
        }
        $params = trim($params,',');//remueve el ultimo caracter de una cadena
    }
}

require_once("Libraries/Core/Autoload.php");
require_once("Libraries/Core/Load.php");


?>