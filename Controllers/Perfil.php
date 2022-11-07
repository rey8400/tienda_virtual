<?php 

	class Perfil extends Controllers{
		
		public function __construct()
		{
			parent::__construct();
            session_start();
		}

		public function perfil()
		{
			
			$usuario=$_SESSION['userData'];
			$data['page_tag'] = "KayfaStore | Perfil";
			$data['page_title'] ="perfil";
			$data['page_name'] = "Perfil Usuario";
			


			$this->views->getView($this,"perfil",$data);

          
		}

		public function getPedidos(){

			$idpersona = $_SESSION['userData']['idpersona'];

			$arrData = $this->model->selectPedidos($idpersona);

			for ($i=0; $i < count($arrData); $i++) {
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';

				$arrData[$i]['transaccion'] = $arrData[$i]['referenciacobro'];
				if($arrData[$i]['idtransaccionpaypal'] != ""){
					$arrData[$i]['transaccion'] = $arrData[$i]['idtransaccionpaypal'];
				}

				$arrData[$i]['monto'] = SMONEY.formatMoney($arrData[$i]['monto']);

				
				
					
					$btnView .= ' <a title="Ver Detalle" href="'.base_url().'/perfil/orden/'.$arrData[$i]['idpedido'].'" target="_blanck" class="btn btn-info btn-sm"> Ver Detalles</i> </a>

						<a title="Generar PDF" href="'.base_url().'/factura/generarFactura/'.$arrData[$i]['idpedido'].'" target="_blanck" class="btn btn-danger btn-sm" style ="display: none"> <i class="fas fa-file-pdf"></i> </a> ';

					if($arrData[$i]['idtipopago'] == 1){
						$btnView .= '<a title="Ver Transacción" href="'.base_url().'/pedidos/transaccion/'.$arrData[$i]['idtransaccionpaypal'].'" target="_blanck" class="btn btn-info btn-sm" style ="display: none"> <i class="fa fa-paypal" aria-hidden="true"></i> </a> ';
					}else{
						$btnView .= '<button class="btn btn-secondary btn-sm" disabled="" style ="display: none"><i class="fa fa-paypal" aria-hidden="true"></i></button> ';
					}
				
				
					
			
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

			die();
		}


		public function orden($idpedido){
			if(!is_numeric($idpedido)){
				header("Location:".base_url().'/perfil');
			}
	
			$idpersona = "";
			if( $_SESSION['userData']['idrol'] == RCLIENTES ){
				$idpersona = $_SESSION['userData']['idpersona'];
			}
			
			$data['page_tag'] = "Pedido - Tienda Virtual";
			$data['page_title'] = "PEDIDO <small>Tienda Virtual</small>";
			$data['page_name'] = "pedido";
			$data['arrPedido'] = $this->model->selectPedido($idpedido,$idpersona);
			$this->views->getView($this,"ordenCliente",$data);
		}
	
			
	}


	
 ?>