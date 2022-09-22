<?php

class Dashboard extends Controllers{

    public function __construct(){
        
        parent::__construct(); //herencia de la clase Controllers

    }


    public function dashboard(){

        $data['id'] = 2;
        $data['page_tag'] = "Dashboard-Kayfa";
        $data['page_title'] = "Dashboard-Kayfa";
        $data['page_name'] = "dashboard";

      
        $this->views->getView($this,"dashboard",$data);
    }

   

}



?>