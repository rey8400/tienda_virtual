<?php headerForo($data);
//getModal('modalPost',$data); 
$arrPost = $data['post'];
$arraComentarios = $data['come'];
//dep($arraComentarios) ;

?>

<hr>
<div class="row justify-content-center mx-0 mb-4">
    <div class="card row " style="width: 50rem;">
      <h5 class="card-title">Titulo: <br></h5>
      <h4 class="lead"><?=$arrPost['tutulo'];?></h4><br>
   
      <div class="card-body">
        <h5 class="card-title">Descripcion</h5>
        <h6 class="lead "><?=$arrPost['descripcion'];?></h6><br>
        <h5 class="card-title">Contenido </h5>
        <p class="lead "><?=$arrPost['contenido'];?></p>
        <div class="row ">
          <div class="col-md-8">
            <h5 class="card-title text-muted">Autor: </h5>
            <p class="lead text-muted "><?=$arrPost['autor'];?></p>
          </div>
          <div class="col-md-4">
            <h5 class="card-title text-muted">Fecha: </h5>
            <p class="lead text-muted "><?=$arrPost['fecha'];?></p>
          </div>
        </div>
        <!--Antigo formulario iba aqui-->
      </div>
    </div>


    <div class="row justify-content-center mt-4 shadow p-3 mb-5 bg-white rounded " style="width: 50rem;">
      <div class="col-11 main mt-5">
        
          <!--Archivo para comentar y mostrar comentarios-->
    
  <div class="container">
            <form action="<?=base_url();?>/Foro/setComentario/<?=$arrPost['id']?>" method="post">
            <label for="exampleFormControlInput1" >Escriba un comentario</label>
              <input class="form-control "  type="text" name="comentario" placeholder="comentario" required><br>
              <input class="btn btn-success" name="comentar" type="submit"  value="comentar"><br><br>
            </form>
          </div>

        </div>

    
          <h2>Comentarios</h2>

          <?php 
         foreach ($arraComentarios as $post) {
            
         ?>
          <div class="card w-100 border-0">
                <div class="card-body">
                  <h5 class="card-title"><?=$post['usuario'];?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?=$post['fecha'];?></h6>
                  <p class="card-text"><?=$post['cometario'];?></p>
                </div>
              </div>
         </div>

           <?php }?>
         </div>
    </div>

  </div>




<?php footerTienda($data); ?>