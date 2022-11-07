<?php headerForo($data);
getModal('modalPost',$data); 

$arrPost = $data['post'];



?>
<br><br><br>
<hr>
<div class="container">
 
<h4 class="mtext-109 cl22 p-b-30">Foro Consultas/Preguntas</h4>
    <div class="row">
        <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">

        <?php 
        foreach ($arrPost as $post) {
            
        ?>
            <div class="container">
                <div class="card">
                    <h5 class="card-header">Titulo:<?=$post['tutulo'];?></h5>
                    <div class="card-body">
                        <h5 class="card-title">Autor:<?=$post['autor'];?></h5>
                        <p class="card-text">Descripcion:<?=$post['descripcion'];?></p>
                        <p class="card-text"><small class="text-muted">fecha:<?=$post['fecha'];?></small></p>
                        <a href="<?=base_url();?>/foro/post/<?=$post['id'];?>" class="btn btn-primary">Ver mas</a>
                    </div>
                </div>
            </div><br>

            <?php }?>


        </div>
        <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50"><br> </div>
 
    </div>

</div>




<?php footerTienda($data); ?>