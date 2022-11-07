<?php 
require_once("Models/TCategorias.php");
require_once("Models/TProducto.php");
	class Contacto extends Controllers{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function contacto()
		{
			
			
			$data['page_tag'] = "KayfaStore | Contacto";
			$data['page_title'] ="forma de contacto";
			$data['page_name'] = "contacto";
            
			$this->views->getView($this,"contacto",$data);
		}
    
		

	}
 ?>