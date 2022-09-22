<?php

class Home extends Controllers{

    public function __construct(){
        
        parent::__construct(); //herencia de la clase Controllers

    }


    public function home(){

        $data['id'] = 1;
        $data['page_tag'] = "Home";
        $data['page_title'] = "Pagina Principal";
        $data['page_name'] = "home";

      
        $this->views->getView($this,"home",$data);
    }

   

}



?>