<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=$data['page_tag']?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=media();?>/tienda/images/icons/perrfilimage.jpg"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?=media();?>/tienda/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=media();?>/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=media();?>/css/menu.css">
	
<!--===============================================================================================-->
</head>
<body class="animsition">


	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar" style="display:none;">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Bienvenido
					</div>

					<div class="right-top-bar flex-w h-full">
						

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							.
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
						.
						</a>

					</div>
				</div>
			</div>

			<div class="top-bar"">
				<nav class="content-topbar flex-sb-m h-full container">
					
					<!-- Logo desktop -->		
					<a href="<?=base_url();?>" class="logo">
						<img src="<?=media();?>/tienda/images/icons/perrfilimage.jpg" alt="IMG-LOGO">
					</a>

				
					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="<?=base_url();?>">Inicio</a>
				
							</li>



							<li>
								<a href="<?=base_url();?>/foro">Foro</a>
							</li>

							<li>
							<button class="btn btn-primary" type="button" onclick="openModal();" ><i class=""></i> Nuevo Post</button>
							</li>



						</ul>
					</div>	

					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?=base_url();?>"><img src="<?=media();?>/tienda/images/icons/perrfilimage.jpg" alt="IMG-LOGO"></a>
				
			</div>
	
			</div>

			<!-- Button show menu -->
			<div style="display:none" class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Bienvenido
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
					

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Mi Cuenta
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Iniciar Sesión
						</a>

						
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="<?=base_url();?>">Inicio</a>

					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>



				<li>
					<a href="<?=base_url();?>/foro">Foro</a>
				</li>

				<li>
					<a href="<?=base_url();?>/publicar">Publicar Consulta</a>
				</li>

			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?=media();?>/tienda/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Buscar...">
				</form>
			</div>
		</div>
	</header>

