<?php 
require_once("Models/TCategorias.php");
require_once("Models/TProducto.php");
	class Tienda extends Controllers{
		use TCategorias, TProducto;
		public function __construct()
		{
			parent::__construct();
		}

		public function tienda()
		{
			
			
			$data['page_tag'] = "KayfaStore";
			$data['page_title'] = "Todos los productos";
			$data['page_name'] = "tienda";
            $data['productos'] = $this->getProductos();
			$this->views->getView($this,"tienda",$data);
		}
        public function categoria($params){
            if(empty($params)){
                header("Location: ".base_url());
            }else{
                $categoria = strClean($params);
                $data['page_tag'] = "KayfaStore"." |  ".$categoria ;
			    $data['page_title'] = $categoria ;
			    $data['page_name'] = "categoria" ;
                $data['productos'] = $this->getProductosCategoriaT($categoria);
			    $this->views->getView($this,"categoria",$data);
            }

        }
		public function producto($params){
            if(empty($params)){
                header("Location: ".base_url());
            }else{
                $producto = strClean($params);
				$arrProducto =   $this->getProductoT($producto);
                $data['page_tag'] = "KayfaStore"." |  ".$producto ;
			    $data['page_title'] = $producto ;
			    $data['page_name'] = "producto" ;
				$data['producto'] =		$arrProducto;
                $data['productos'] = $this->getProductosRandom($arrProducto['categoriaid'],8,"r");
			    $this->views->getView($this,"producto",$data);
            }

        }

	}
 ?>