<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
    }
?>
<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/login.css">

	<!--<link href='global.css' rel='stylesheet'>-->
	<title></title>
</head>
<body>
	<?php include_once 'layouts/navbar.php'; ?>
	
	<section id="stand">
		<h2 class="text-center">Ver oferta por edificio y salon</h2>
		
		<div class="container">
			<div class="row return">
				<a href="index.php"> <i class="fa fa-reply" aria-hidden="true"></i> Regresar</a>
				<a href="login.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
			</div>
			<div class="row">
				<select name = "cal">
					<option value='2017a' selected>2017A</option>
				</select>
				<select name = "edificios"></select>
				<select name="aulas"></select>
				<button id="actualizar">Actualizar</button>
				<pre id = "oferta"></pre>
			</div>
		</div>
	</section>

	<script src="js/jquery-3.1.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/oferta.js"></script>
</body>
</html>