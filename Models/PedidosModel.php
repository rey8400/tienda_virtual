<?php 
	class PedidosModel extends Mysql
	{
		private $objCategoria;
		public function __construct()
		{
			parent::__construct();
		}

		public function selectPedidos($idpersona = null){
			$where = "";
			if($idpersona != null){
				$where = " WHERE p.personaid = ".$idpersona;
			}
			$sql = "SELECT p.idpedido,
							p.referenciacobro,
							p.idtransaccionpaypal,
							DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
							p.monto,
							tp.tipopago,
							tp.idtipopago,
							p.status 
					FROM pedido p 
					INNER JOIN tipopago tp
					ON p.tipopagoid = tp.idtipopago $where ";
			$request = $this->select_all($sql);
			return $request;

		}	

		public function selectPedido(int $idpedido, $idpersona = NULL){
			$busqueda = "";
			if($idpersona != NULL){
				$busqueda = " AND p.personaid =".$idpersona;
			}
			$request = array();
			$sql = "SELECT p.idpedido,
							p.referenciacobro,
							p.idtransaccionpaypal,
							p.personaid,
							DATE_FORMAT(p.fecha, '%d/%m/%Y') as fecha,
							p.costo_envio,
							p.monto,
							p.tipopagoid,
							t.tipopago,
							p.direccion_envio,
							p.status
					FROM pedido as p
					INNER JOIN tipopago t
					ON p.tipopagoid = t.idtipopago
					WHERE p.idpedido =  $idpedido ".$busqueda;
			$requestPedido = $this->select($sql);
			if(!empty($requestPedido)){
				$idpersona = $requestPedido['personaid'];
				$sql_cliente = "SELECT idpersona,
										nombres,
										apellidos,
										telefono,
										email_user,
										nit,
										nombrefiscal,
										direccionfiscal 
								FROM persona WHERE idpersona = $idpersona ";
				$requestcliente = $this->select($sql_cliente);
				$sql_detalle = "SELECT p.idproducto,
											p.nombre as producto,
											d.precio,
											d.cantidad
									FROM detalle_pedido d
									INNER JOIN producto p
									ON d.productoid = p.idproducto
									WHERE d.pedidoid = $idpedido";
				$requestProductos = $this->select_all($sql_detalle);
				$request = array('cliente' => $requestcliente,
								'orden' => $requestPedido,
								'detalle' => $requestProductos
								 );
			}
			return $request;
		}

		public function selectTransPaypal(string $idtransaccion, $idpersona = NULL){
			$busqueda = "";
			if($idpersona != NULL){
				$busqueda = " AND personaid =".$idpersona;
			}
			$objTransaccion = array();
			$sql = "SELECT datospaypal FROM pedido WHERE idtransaccionpaypal = '{$idtransaccion}' ".$busqueda;
			$requestData = $this->select($sql);
			if(!empty($requestData)){
				$objData = json_decode($requestData['datospaypal']);
				$urlTransaccion = $objData->purchase_units[0]->payments->captures[0]->links[0]->href;
				$urlOrden = $objData->purchase_units[0]->payments->captures[0]->links[2]->href;
				//$objTransaccion = CurlConnectionGet($urlOrden,"application/json",getTokenPaypal());
			}
			return $objTransaccion;
		}

		

		public function updatePedido(int $idpedido, $transaccion = NULL, $idtipopago = NULL, string $estado){
			if($transaccion == NULL){
				$query_insert  = "UPDATE pedido SET status = ?  WHERE idpedido = $idpedido ";
	        	$arrData = array($estado);
			}else{
				$query_insert  = "UPDATE pedido SET referenciacobro = ?, tipopagoid = ?,status = ? WHERE idpedido = $idpedido";
	        	$arrData = array($transaccion,
	        					$idtipopago,
	    						$estado
	    					);
			}
			$request_insert = $this->update($query_insert,$arrData);
        	return $request_insert;
		}
	}
 ?>