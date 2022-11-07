<!-- Footer -->
<footer id="footer">
  

<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categorias
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04" data-filter=".women">
								PC
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Accesorios
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Mantenimiento
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Oficina
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Foro
					</h4>

					<ul>

					<?php 
						
						if(isset($_SESSION['login'])){
						?>

							<li class="p-b-10">
								<a href="<?=base_url();?>/foro" class="stext-107 cl7 hov-cl1 trans-04">Foro</a>
							</li>

						<?php }else{ ?>

							<li class="p-b-10">
								<a href="#"  onclick="openModal2();" class="stext-107 cl7 hov-cl1 trans-04">Foro</a>
							</li>
						
						<?php }?>
				</div>

				<div class="col-sm-6 col-lg-4 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contactanos
					</h4>

					<p class="stext-107 cl7 size-201">
						Alguna pregunta? Contactanos en nuestras redes sociales
					</p>

					<div class="p-t-27">
						<a href="https://www.facebook.com/KAYFASTORE" target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="https://www.instagram.com/kayfastore_oficial_/" target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="https://www.youtube.com/c/Kayfastore" target="_blanck" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-youtube"></i>
						</a>
					</div>
				</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="<?=media();?>/tienda/images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?=media();?>/tienda/images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?=media();?>/tienda/images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?=media();?>/tienda/images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?=media();?>/tienda/images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
				

				</p>
			</div>
		</div>
	</footer>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<script>
  const base_url  = "<?=base_url();?>";
  const smony = "<?=SMONEY;?>";
</script>


<!--===============================================================================================-->	
	<script src="<?=media();?>/tienda/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=media();?>/tienda/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/select2/select2.min.js"></script>

<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/slick/slick.min.js"></script>
	<script src="<?=media();?>/tienda/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/parallax100/parallax100.js"></script>

<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>

<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/sweetalert/sweetalert.min.js"></script>

<!--===============================================================================================-->
	<script src="<?=media();?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

<!--===============================================================================================-->
 <!-- Data table plugin-->
 
 <script type="text/javascript" src="<?php echo media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo media(); ?>/js/plugins/bootstrap-select.min.js"></script>


	<script src="<?=media();?>/tienda/js/functions.js"></script>	
	<script src="<?=media();?>/tienda/js/main.js"></script>
	<script src="<?=media();?>/tienda/js/pedidoCliente.js"></script>
	<script src="<?= media();?>/js/functions_admin.js"></script>
	<script src="<?= media() ?>/js/functions_login.js"></script>
	<script src="<?= media() ?>/js/functions_foro.js"></script>

</body>
</html>