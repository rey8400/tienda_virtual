<?php headerTienda($data); 
	getModal('modalCarrito',$data);
	$arrSlider = $data['slider'];

	$arrProductos = $data['productos'];
	
?>
<link rel="stylesheet" type="text/css" href="<?=media();?>/css/menu.css">
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">

			<?php
				for($i=0; $i<count($arrSlider); $i++){
		
			?>
				<div class="item-slick1" style="background-image: url(<?= $arrSlider[$i]['portada']?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								<?=$arrSlider[$i]['descripcion']?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								<?=$arrSlider[$i]['nombre']?>
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="<?=base_url().'/tienda/categoria/'.$arrSlider[$i]['nombre']?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
								
								Ir a la tienda
								</a>
							</div>
						</div>
					</div>
				</div>

				<?php
				}
				?>
			</div>
		</div>
	</section>
	<hr></hr>
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Productos nuevos
				</h3>
			</div>
			<hr></hr>
			<div class="row isotope-grid">
				<?php
				for($p=0;$p<count($arrProductos);$p++){
					if(count($arrProductos[$p]['images'])>0){
							$portada = $arrProductos[$p]['images'][0]['url_image'];

					}else{
						$portada = media().'/images/uploads/portada_categoria.png';
					}

				
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?= $portada ?>" alt="<?= $arrProductos[$p]['nombre']?>">

							<a style="display: none;" href="<?=base_url().'/tienda/producto/'.$arrProductos[$p]['nombre'];?>" class="block2-btn flex-c-m stext-103 cl22 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								Ver  producto
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?=base_url().'/tienda/producto/'.$arrProductos[$p]['nombre']?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?= $arrProductos[$p]['nombre']?>
								</a>

								<span class="stext-105 cl3">
								<?= SMONEY.formatMoney( $arrProductos[$p]['precio'])?>
								</span>
							</div>

							<div style="display: none;" class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="<?=media();?>/tienda/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?=media();?>/tienda/images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>	
				<?php
				}
				?>
			</div>

			
		</div>
	</section>

	<?php footerTienda($data); ?>