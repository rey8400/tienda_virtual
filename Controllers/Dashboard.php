<?php

class Dashboard extends Controllers{

    public function __construct(){
        
        parent::__construct(); //herencia de la clase Controllers


			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}

            if(!empty($_SESSION['userData'])){


               $usu =  $_SESSION['userData'];

               if($usu['nombrerol'] == "Cliente"){

                header('Location: '.base_url().'/home');
               }

            }
      
            getPermisos(1);
    }


    public function dashboard(){

        $data['id'] = 2;
        $data['page_tag'] = "Dashboard-Kayfa";
        $data['page_title'] = "Dashboard-Kayfa";
        $data['page_name'] = "dashboard";
        $data['page_functions_js'] = "functions_admin.js";



        $data['usuarios'] = $this->model->cantUsuarios();
			$data['clientes'] = $this->model->cantClientes();
			$data['productos'] = $this->model->cantProductos();
			$data['pedidos'] = $this->model->cantPedidos();
			$data['pedidos'] = $this->model->cantPedidos();
			$data['lastOrders'] = $this->model->lastOrders();
	

		
      
        $this->views->getView($this,"dashboard",$data);
    }

   

}



?>