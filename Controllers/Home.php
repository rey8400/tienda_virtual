<?php 
require_once("Models/TCategorias.php");
require_once("Models/TProducto.php");
	class Home extends Controllers{
		use TCategorias, TProducto;
		public function __construct()
		{
			parent::__construct();
		}

		public function home()
		{
			
			
			$data['page_tag'] = "KayfaStore";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['slider']   = $this->getCategorias(CAT_SLIDER);
			$data['productos'] =  $this->getProductos(CAT_SLIDER);
			$this->views->getView($this,"home",$data);
		}

	}
 ?>