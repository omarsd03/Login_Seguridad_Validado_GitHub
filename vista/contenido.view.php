<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenido</title>

	<link href='img/logo.png' rel='shortcut icon' type='image/png'>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="icomoon/style.css">
	<link rel="stylesheet" href="css/menu_estilos.css">
	<link rel="stylesheet" href="css/index_style.css">

	<link rel="stylesheet" href="skeleton204/css/normalize.css">
	<link rel="stylesheet" href="skeleton204/css/skeleton.css">
</head>
<body>
	
	<?php include 'extras/header.php'; ?>

	<h3><span class="bienvenido"><i class="icon icon-user-check"></i></span> Bienvenid@ <?php echo $_SESSION['usuario']; ?> </h3>

	<div>
		<a href="cerrar.php" class="btn btn-warning"><span class="cerrar_sesion"><i class="icon icon-switch"></i></span> Cerrar Sesion</a>
	</div>

	<div class="container-fluid">
		<section class="main row">
			<aside class="col-sm-4 col-md-3 col-lg-3">
				<h3>Aside</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo odio repellendus dignissimos veniam recusandae magnam, dolor omnis eveniet laboriosam quas culpa voluptate, at, officia in natus assumenda beatae illo. A!
				</p>
			</aside>

			<article class="col-sm-8 col-md-9 col-lg-9">
				<h3>Novedades e Informes</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro voluptatibus omnis nulla quis mollitia dicta quasi, voluptatum totam labore doloremque ea fugit consectetur itaque ab et, odio est iusto recusandae.
				</p>
			</article>
		</section>

		<div class="row">  
			<div class="dinero_actual col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h3>Dinero En Cartera Actual</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus minima nulla quasi porro sunt suscipit quibusdam velit itaque voluptates soluta, quaerat. Quisquam rerum enim nulla quia, sapiente magnam quos ad.
				</p>
			</div>
			<div class="dinero_abonado col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<h3>Dinero Abonado</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur aliquid dolor voluptatum, nulla impedit hic aliquam beatae tempora, id enim, perspiciatis incidunt necessitatibus voluptas. Ipsum ducimus, veritatis laboriosam eveniet ipsa?
				</p>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<h3>Footer</h3>
		</div>
	</footer>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/menu.js"></script>

</body>
</html>