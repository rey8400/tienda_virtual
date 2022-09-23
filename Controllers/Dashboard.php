<?php

class Dashboard extends Controllers{

    public function __construct(){
        
        parent::__construct(); //herencia de la clase Controllers


			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
      
            getPermisos(1);
    }


    public function dashboard(){

        $data['id'] = 2;
        $data['page_tag'] = "Dashboard-Kayfa";
        $data['page_title'] = "Dashboard-Kayfa";
        $data['page_name'] = "dashboard";
        $data['page_functions_js'] = "functions_admin.js";

      
        $this->views->getView($this,"dashboard",$data);
    }

   

}



?>