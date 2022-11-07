<!-- MODAL UTILIZADO EN INDEX PARA CREAR NUEVO POST-->
<div class="modal fade" id= "modalMostrarPost" tabindex="-1">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
     <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <div class="modal-body">
           <div class = "row justify-content-center">
               <div class= "col-md-8">
               <form id="formPost" name="formPost" class="form-horizontal">
                      
                      Titulo: <input class="form-control" type="text" REQUIRED name="titulo" id="titulo"> <br>
                      Descripcion: <input class="form-control" type="text" REQUIRED name="descripcion" id="descripcion"> <br>
                      contenido: <input class="form-control" type="text" REQUIRED name="contenido" id="contenido"> <br>
                      autor: <input class="form-control" type="text" name="autor"  id="autor" readonly="readonly" value="<?= $_SESSION['userData']['nombres']; ?>">   <br>
                      fecha: <input class="form-control" type="text" name="fecha" id="fecha" readonly="readonly" value="<?php echo date('d-m-Y H:i:s') ?>"> <br>
                <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
                   </form>
               </div>
           </div>
       </div>
     </div>
   </div>
 </div>

 <!-- Modal -->
<div class="modal fade" id="modalViewPost" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">POST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div class="row justify-content-center mx-0 mb-4">
    <div class="card row " style="width: 50rem;">
    <h5 class="lead" id="nom"></h4><br>
      <h5 class="card-title">Titulo: <br></h5>
 
      <h4 class="lead" id="postTitulo"></h4><br>
      <div class="card-body">
        <h5 class="card-title">Descripcion</h5>
        <h6 class="lead "id="postDescripcion"></h6><br>
        <h5 class="card-title">Contenido </h5>
        <p class="lead "id="postContenido"></p>
        <div class="row ">
          <div class="col-md-8">
            <h5 class="card-title text-muted">Autor: </h5>
            <p class="lead text-muted " id="postAutor"></p>
          </div>
          <div class="col-md-4">
            <h5 class="card-title text-muted">Fecha: </h5>
            <p class="lead text-muted " id="postFecha"></p>
            <h5 class="lead" id="postEstado">no</h4><br>
          </div>
        </div>
        <!--Antigo formulario iba aqui-->
      </div>
    </div>


    <div class="row justify-content-center mt-4 shadow p-3 mb-5 bg-white rounded " style="width: 50rem;">
      <div class="col-11 main mt-5">


        
          <!--Archivo para comentar y mostrar comentarios-->
       <?php //require_once "../comentarios/logicaCometarios.php" ?>
     
       <div class="container">
            <form name="formComentario" id="formComentario" >
            <label for="exampleFormControlInput1" >Escriba un comentario</label>
            
             <input class="form-control "  type="text" id="usuarioC" name="usuarioC"  readonly="readonly" value="<?= $_SESSION['userData']['nombres']; ?>" required><br>
              <input class="form-control "  type="text" id="comentario" name="comentario" placeholder="comentario" required><br>
              <input class="form-control "  type="text" id="postID" name="postID"   readonly="readonly" required><br>
              <input class="form-control "  type="text" id="fechaC" name="fechaC"  readonly="readonly" value="<?php echo date('d-m-Y H:i:s') ?>"  required><br>
              <input class="form-control "  type="text" id="estadoC" name="estadoC" readonly="readonly" value="no"  required><br>
              <input class="btn btn-success" name="comentar" type="submit"  value="comentar"><br><br>
            </form>
          </div>

        </div>


        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableComentarios">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>usuario</th>
                          <th>comentario</th>
                          <th>id post</th>
                          <th>fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>

      </div>
    </div>

  </div>
       
      </div>
    </div>
  </div>
</div>