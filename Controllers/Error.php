<?php

class Errors extends Controllers{

    public function __construct(){
        
        parent::__construct(); //herencia de la clase Controllers

    }


    public function notFound(){

        $this->views->getView($this,"error");
    }


  

}

$notFound = new Errors();
$notFound->notFound();

?>