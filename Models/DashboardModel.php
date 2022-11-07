<?php 
	class DashboardModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function cantUsuarios(){
			$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}
		public function cantClientes(){
			$sql = "SELECT COUNT(*) as total FROM persona WHERE status != 0 AND rolid = ".RCLIENTES;
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}
		public function cantProductos(){
			$sql = "SELECT COUNT(*) as total FROM producto WHERE status != 0 ";
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}
		public function cantPedidos(){
			$rolid = $_SESSION['userData']['idrol'];
			$idUser = $_SESSION['userData']['idpersona'];
			$where = "";
			if($rolid == RCLIENTES ){
				$where = " WHERE personaid = ".$idUser;
			}

			$sql = "SELECT COUNT(*) as total FROM pedido ".$where;
			$request = $this->select($sql);
			$total = $request['total']; 
			return $total;
		}
		public function lastOrders(){
			$rolid = $_SESSION['userData']['idrol'];
			$idUser = $_SESSION['userData']['idpersona'];
			$where = "";
			if($rolid == RCLIENTES ){
				$where = " WHERE p.personaid = ".$idUser;
			}

			$sql = "SELECT p.idpedido, CONCAT(pr.nombres,' ',pr.apellidos) as nombre, p.monto, p.status 
					FROM pedido p
					INNER JOIN persona pr
					ON p.personaid = pr.idpersona
					$where
					ORDER BY p.idpedido DESC LIMIT 10 ";
			$request = $this->select_all($sql);
			return $request;
		}	
	
	}
 ?>