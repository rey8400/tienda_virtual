<?php headerTienda($data); 
	
    $arrUser = $_SESSION['userData'];
   
?>
<br><br><br><br><br>

<h1>Perfil de Usuario</h1><br><br>

<div class="container">
  <div class="row">
    <div class="col-4">
      <h4 class="">Datos Personales</h4>

      <img class="image" src="https://vignette3.wikia.nocookie.net/nation/images/6/61/Emblem_person_blue.png/revision/latest?cb=20120218131529"  alt="User Image">
      
      <div class="mt-4">
      <ul>
      <li><b>Nombre:</b> <?=$arrUser['nombres'];?></li>
      <li><b>Apellido:</b> <?=$arrUser['apellidos'];?></li>
      <li><b>Telefono:</b> <?=$arrUser['telefono'];?></li>
      <li><b>Email:</b> <?=$arrUser['email_user'];?></li>
      <li><b>Tipo:</b> <?=$arrUser['nombrerol'];?></li>
      </ul>
      </div>

    </div>
    <div class="col-8">
     <h4>Mis Pedidos</h4><br>

       <div id="divModal"></div>
    <main class="app-content">
  
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tablePedidos">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Ref. / Transacción</th>
                          <th>Fecha</th>
                          <th>Monto</th>
                          <th>Tipo pago</th>
                          <th>Estado</th>
                          <th>Acciones</th>
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
    </main>
    </div>
  </div>
</div>
<br><br><br><br>



<?php footerTienda($data); ?>