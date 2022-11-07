<?php 
require_once("Models/TCategorias.php");
require_once("Models/TProducto.php");
	class Nosotros extends Controllers{
		
		public function __construct()
		{
			parent::__construct();
		}

		public function nosotros()
		{
			
			
			$data['page_tag'] = "KayfaStore | Acerca de";
			$data['page_title'] ="Acerca de nosotros";
			$data['page_name'] = "nosotros";
            
			$this->views->getView($this,"nosotros",$data);
		}
    
		

	}
 ?>