<?php 

	class Foro extends Controllers{
		
		public function __construct()
		{
			parent::__construct();
            session_start();
		}

		public function foro()
		{
			
			
			$data['page_tag'] = "KayfaStore | foro";
			$data['page_title'] ="foro";
			$data['page_name'] = "Foro";
			$data['post'] =  $this->model->selectPost();
            
			$this->views->getView($this,"foro",$data);
		}


        public function setForo(){

            if($_POST){
                if(empty($_POST['titulo']) || empty($_POST['descripcion']) || empty($_POST['contenido']) || empty($_POST['autor']) || empty($_POST['fecha']) )
				{
					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
				}else{
                    $strTitulo = strClean($_POST['titulo']);
					$strDescripcion = strClean($_POST['descripcion']);
					$strContenido = strClean($_POST['contenido']);
					$strAutor = ucwords(strClean($_POST['autor']));
					$strFecha = strClean($_POST['fecha']);

                    $request_post = $this->model->insertPost($strTitulo,
																			$strDescripcion, 
																			$strContenido, 
																			$strAutor, 
																			$strFecha );
				if($request_post >0 ){
                    $arrResponse = array('status' => true, 'msg' => 'datos guardados correctamente.');
                }else if ($request_post =='exist') {
                    $arrResponse = array('status' => false, 'msg' => 'ya existe');
                }else{
                    $arrResponse = array('status' => true, 'msg' => 'datos guardados correctamente.');
                }

                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            
            die();
        }



		public function post($id){

			$data['page_tag'] = "KayfaStore | foro";
			$data['page_title'] ="post";
			$data['page_name'] = "Post";
			$data['post'] =  $this->model->selectPos($id);
			$data['come'] =  $this->model->selectComentarios($id);
			$this->views->getView($this,"post",$data);

		}


		public function setComentario($id){
			//dep($_POST);
			//die();
            if($_POST){

                    $strUsuario= strClean($_SESSION['userData']['nombres']);
					$strComentario = strClean($_POST['comentario']);
					$strpostID = intval($id);
					$strFecha = strClean(date('d-m-Y H:i:s'));
					$strEstado = strClean('no');

                    $request_post = $this->model->insertComentario($strUsuario,$strComentario, $strpostID,$strFecha,$strEstado);
				//dep($request_post);

				//die();
				if($request_post >0 ){
                    $arrResponse = array('status' => true, 'msg' => 'datos guardados correctamente.');
                }else if ($request_post =='exist') {
                    $arrResponse = array('status' => false, 'msg' => 'ya existe');
                }else{
                    $arrResponse = array('status' => true, 'msg' => 'error no es posible almacenar los datos');
                }

                
                //echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			$data['page_tag'] = "KayfaStore | foro";
			$data['page_title'] ="post";
			$data['page_name'] = "Post";
			$data['post'] =  $this->model->selectPos($id);
			$data['come'] =  $this->model->selectComentarios($id);
			$this->views->getView($this,"post",$data);
            }
            
            die();
        }

		
	

	
    
		

	}
 ?>