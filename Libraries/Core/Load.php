<?php

//Archivo load
$controller = ucwords($controller);
$controllerFile = "Controllers/". $controller . ".php";

if(file_exists($controllerFile)){//Existe el archivo controlador

    require_once($controllerFile);//Ruta del archivo controlador

    $controller = new $controller();

    if(method_exists($controller,$method)){//Verificamos si el metodo existe

        $controller ->{$method}($params); //si existe ese metodo le enviamos los parametros al controlador
    }else{

        require_once("Controllers/Error.php");
    }
}else{

    require_once("Controllers/Error.php");
}


?>