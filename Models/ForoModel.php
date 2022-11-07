<?php
class ForoModel extends Mysql{
	private $idComentario;
        private $intIdUsuario;
		private $strTitulo;
		private $strDescripcion;
		private $strContenido;
		private $strAutor;
		private $strFecha;

		private  $strUsuario;
		private  $strComentario;
		private  $strIdpost;
		private  $strFechaC;
		private  $estado;


    public function __construct()
    {

        parent::__construct();
      
        
    }

    public function insertPost(string $titulo, string $descripcion,string $contenido,string $autor,string $fecha){
             $this->strTitulo = $titulo;
			$this->strDescripcion = $descripcion;
			$this->strContenido = $contenido;
			$this->strAutor = $autor;
			$this->strFecha = $fecha;
			$return = 0;

            $query_insert  = "INSERT INTO post(tutulo,descripcion,contenido,autor,fecha) 
								  VALUES(?,?,?,?,?)";
	        	$arrData = array($this->strTitulo,
        						$this->strDescripcion,
        						$this->strContenido,
        						$this->strAutor,
        						$this->strFecha);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
    }

    public function selectPost()
		{

			
			$sql = "SELECT p.id,p.tutulo,p.descripcion,p.contenido,p.autor,p.fecha 
					FROM post p";
					$request = $this->select_all($sql);
					return $request;
		}


        
		public function selectPos(int $id){
			$this->intIdUsuario = $id;
			$sql = "SELECT p.id,p.tutulo,p.descripcion,p.contenido,p.autor,p.fecha 
				FROM post p
					WHERE p.id = $this->intIdUsuario";
			$request = $this->select($sql);
			return $request;
		}
		
		
		public function insertComentario(string $usuario, string $comentario, string $idPost, string $fecha, string $estado){
			   /* $this->$strUsuario= $usuario;
				$this->$strComentario= $comentario;
				$this->$strIdpost= $idPost;
				$this->$strFechaC= $fecha;
				$this->$strestado= $estado;
				$return =0;*/
		
				$query_insert  = "INSERT INTO cometarios(usuario,cometario,id_post,fecha,estado) 
				VALUES(?,?,?,?,?)";
				$arrData = array($usuario,
				$comentario,
				$idPost,
				$fecha,
				$estado);
				$request_insert = $this->insert($query_insert,$arrData);
				$return = $request_insert;
		}
		
		public function selectComentarios(int $id){
			$this->idComentario = $id;
			$sql = "SELECT usuario,cometario,fecha FROM cometarios WHERE id_post =$id";
			$request = $this->select_all($sql);
			return $request;
		}
		

}


?>