<?php headerTienda($data);

if(isset($_POST["enviar"])){
    $to = "pg19029@ues.edu.sv";
    $subject =  "Formulario contacto KayfaStore";
    $message = "De: " . $_POST["nombre"] . "Correo de "  . $_POST['correo']  .  " " . $_POST['mensaje'];
    $headers = "From : Contacto<carlosposada645@gmail.com>";

    mail($to,$subject,$message,$headers);
    echo "Correo enviado";
}



?>
<link rel="stylesheet" type="text/css" href="<?=media();?>/css/menu.css">
<link rel= "stylesheet" type= "text/css" herf= "https://fonts.googleapis.com/css2?family=Bangers&display=swap">
<link rel="stylesheet" href="<?=media();?>/css/estilocontacto.css">
<br><br><br>
<hr><br>
<form method = "POST" id="form">
    <h2 class="form_title">Contactanos envianos este formulario con tus datos y dudas</h2>
        <div class="form_container">
            <div class="form-group">
            <input type="text"  name="nombre"  id = "name" autocapitalize="words" autocomplete="off" class="form_input" placeholder=" ">
                <label for="name" class="form_label">Nombre: </label>
               
                
                <span class="form_line"></span>
            </div>

            <div class="form-group">
               
                <input type="text" name="correo" id = "correo" autocapitalize="words" autocomplete="off" class="form_input" placeholder=" ">
                
                <label for="correo" class="form_label">Tu correo: </label>
                <span class="form_line"></span>
            </div>

           

            <div class="form-group">
                
            <input type="text" id = "ayuda" class="form_input" hidden="true" placeholder=" ">
        
                <label for="ayuda" class="form_label1">En que  te podemos ayudar: </label>
                
                <textarea class="form-control" rows="4" name="mensaje"  autocapitalize="words" autocomplete="off" placeholder="Describe tu duda"></textarea>
                <span class="form_line"></span>
            </div>
                <button type="submit" class="form_submit" >Enviar</button>
        </div>
</form>
      <br><br>
<?php footerTienda($data); ?>
